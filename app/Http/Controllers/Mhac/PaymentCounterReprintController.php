<?php

namespace App\Http\Controllers\Mhac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MhacRegistration;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PDF;

class PaymentCounterReprintController extends Controller
{
    public function ViewpageLanding()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.paymentcounterreprintlanding')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }
    public function ReprintVerify(Request $request)
    {
        $ppnop = $request->PassportNo;
        $appnop = $request->appid;
        $country = $request->country;
        $floor = Session::get('Floor');
        $data = null;
        $data2 = null;
        $date = date('Y-m-d');

        if (!empty($appnop)) {
            //if main member
            $data = DB::table('mhac_temp_table')
                ->join('mhac_appointments', 'mhac_temp_table.appointment_no', '=', 'mhac_appointments.main_mem_app_no')
                ->where('mhac_temp_table.appointment_no', $appnop)
                ->where('mhac_appointments.country', $country)
                ->where('mhac_temp_table.floor', $floor)
                ->where('mhac_temp_table.registration_status', 4)
                ->get();
                
        } else if (!empty($ppnop)) {
            $data = DB::table('mhac_temp_table')
                ->join('mhac_appointments', 'mhac_temp_table.passport_no', '=', 'mhac_appointments.passport_no')
                ->where('mhac_temp_table.passport_no', $ppnop)
                ->where('mhac_appointments.member_type', 'MainMember')
                ->where('mhac_appointments.country', $country)
                ->where('mhac_temp_table.floor', $floor)
                ->where('mhac_temp_table.registration_status', 4)
                ->first();
            if ($data) {
                $tokenNo = $data->token_no;

                $mainmemberappNo = $data->main_mem_app_no;
                $data = DB::table('mhac_temp_table')
                    ->join('mhac_appointments', 'mhac_temp_table.appointment_no', '=', 'mhac_appointments.main_mem_app_no')
                    ->where('mhac_temp_table.appointment_no', $mainmemberappNo)
                    ->where('mhac_appointments.country', $country)
                    ->where('mhac_temp_table.floor', $floor)
                    ->where('mhac_temp_table.registration_status', 4)
                    ->where('mhac_temp_table.token_no', $tokenNo)
                    ->get();
            }
        }
        // dd($data);
        if (empty($data)) {
            return response()->json(['message' => 'No data available!']);
        } else {
            $arr = array();
            if (!empty($appnop)) {
                $ReceiptNo = DB::table('mhac_payment_counter')
                ->select('pc_receipt_no')
                ->where('pc_app_no', $appnop)
                ->value('pc_receipt_no');
            }
            if (!empty($ppnop)) {
                $ReceiptNo = DB::table('mhac_payment_counter')
                ->select('pc_receipt_no')
                ->where('pc_passp_no', $ppnop)
                ->value('pc_receipt_no');
            }
           
         // dd($appnop);
            $paymentForEach = DB::table('mhac_payment_setting')
                ->where('Effective_Date', '<=', $date)
                ->orderBy('Effective_Date', 'desc')
                ->where('country', $country)
                ->value('Amount');
               

            foreach ($data as $appnodetails) {
                $arr[] = [
                    'passport_no' => $appnodetails->passport_no,
                    'first_name' => $appnodetails->first_name,
                    'last_name' => $appnodetails->last_name,
                    'appointment_date' => $appnodetails->appointment_date,
                    'appointment_no' => $appnodetails->appointment_no,
                    'payment' => $paymentForEach,
                    'receipt' => $ReceiptNo,
                ];
            }
            return response()->json($arr);

        }

    }
    public function Reprint(Request $request)
    {
        $pc_receipt_no = $request->pc_receipt_no;
        DB::table('mhac_payment_counter')
        ->where('pc_receipt_no', $pc_receipt_no)
        ->update(['pc_uby' =>  Session::get('id'), 'pc_udate' => date('Y-m-d H:i:s')]);
        return response()->json(['Done']);
            
        
    }
    /**
     * @param Request $request
     * @return mixed
     */
    public function reprintReceiptPaymentCounter(Request $request)
    {
        $appointmentno = $request->appointmentno;
       
        $country = $request->country;
       
        $floor = Session::get('Floor');
        $date = date('Y-m-d');
        $time = date('h:m:s');
        $data = DB::table('mhac_temp_table')
            ->join('mhac_appointments', 'mhac_temp_table.appointment_no', '=', 'mhac_appointments.main_mem_app_no')
            ->where('mhac_temp_table.appointment_no', $appointmentno)
            ->where('mhac_appointments.country', $country)
            ->where('mhac_temp_table.floor', $floor)
            ->where('mhac_temp_table.registration_status', 4)
            ->get();
           
        $count = DB::table('mhac_temp_table')
            ->join('mhac_appointments', 'mhac_temp_table.appointment_no', '=', 'mhac_appointments.main_mem_app_no')
            ->where('mhac_temp_table.appointment_no', $appointmentno)
            ->where('mhac_appointments.country', $country)
            ->where('mhac_temp_table.floor', $floor)
            ->where('mhac_temp_table.registration_status', 4)
            ->count();

        // Now $count contains the count of the results

        $arr = array();
        $paymentForEach = DB::table('mhac_payment_setting')
            ->where('Effective_Date', '<=', $date)
            ->orderBy('Effective_Date', 'desc')
            ->where('country', $country)
            ->value('Amount');
        foreach ($data as $appnodetails) {
            $arr[] = [
                'passport_no' => $appnodetails->passport_no,
                'first_name' => $appnodetails->first_name,
                'last_name' => $appnodetails->last_name,
                'appointment_date' => $appnodetails->appointment_date,
                'appointment_no' => $appnodetails->appointment_no,
                'payment' => $paymentForEach,
            ];
        }
        $total =$count*$paymentForEach;
        //dd($total);
        //$pdf = PDF::loadView('pages.Receipt', compact('date', 'time', 'total', 'familymembers', 'paymentForEach'));
        $pdf = PDF::loadView('pagesmhac.Receipt', compact('date', 'time', 'total', 'arr', 'paymentForEach'));

        return $pdf->stream('payment.pdf');
    }

}
