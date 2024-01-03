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

class PaymentCounterController extends Controller
{
    public function ViewpageLanding()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.paymentcounterlanding')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }
    public function Verify(Request $request)
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
            $paymentForEach = DB::table('mhac_payment_setting')
                ->where('Effective_Date', '<=', $date)
                ->orderBy('Effective_Date', 'desc')
                ->where('country', $country)
                ->value('Amount');
            // dd($paymentForEach);
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
            return response()->json($arr);

        }

    }
    public function SavePaymentCounter(Request $request)
    {
        $appoimentNumber = $request->appno;
        $passNo = $request->passNo;
        $AppDate = $request->AppDate;
        $lastReceiptNumber = null;
        // $pc_fee = $request->pc_fee;
        // $pc_pay_mode = $request->pc_pay_mode;
        // $pc_receipt_no = $request->pc_receipt_no;



        $alreedyExit = DB::table('mhac_payment_counter')
            ->where('pc_app_no', $appoimentNumber)
            ->count();
        $lastReceiptNo = DB::table('mhac_payment_counter')
            ->orderBy('pc_receipt_no', 'desc')
            ->select('pc_receipt_no')
            ->first();

        if ($lastReceiptNo) {
            $lastReceiptNumber = $lastReceiptNo->pc_receipt_no;
            $lastReceiptNumber++;
        } else {
            // Handle the case where there are no records in the table
            $lastReceiptNumber = 1;
        }

        if ($alreedyExit == 0) {
            $counter = Session::get('counterid');
            $CBy = Session::get('id');
            $datetime = date('Y-m-d H:i:s');

            // $AppDate = DB::table('appointment_cancel_and_reschedule_availability')
            //     ->where('appointment_no', $appoimentNumber)
            //     ->value('date');

            $tokennof = DB::table('mhac_temp_table')
                ->where('appointment_no', $appoimentNumber)
                ->value('token_no');

            DB::table('mhac_temp_table')
                ->where('token_no', $tokennof)
                ->update(['payment_status' => 4, 'payment_counter' => $counter]);


            DB::table('mhac_payment_counter')->insert([
                [
                    'pc_passp_no' => $passNo,
                    'pc_fee' => $request->pc_fee,
                    'pc_pay_mode' => $request->pc_pay_mode,
                    'pc_receipt_no' => $lastReceiptNumber,
                    'pc_app_date' => $AppDate,
                    'pc_app_no' => $appoimentNumber,
                    'country' => $request->country,
                    'floor' => Session::get('Floor'),
                    'pc_cby' => $CBy,
                    'pc_cdate' => $datetime
                ]
            ]);

            return response()->json(['Done']);
            
        } else {
            return response()->json(['AlredyExit']);
        }
    }
    /**bb
     * @param Request $request
     * @return mixed
     */
    public function generateReceiptPaymentCounter(Request $request)
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
