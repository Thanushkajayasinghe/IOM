<?php
namespace App\Http\Controllers\Mhac;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;



class MhacPaymentHistoryController extends Controller
{
    public function ViewpageLanding()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.mhacpaymenthistory')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }
    public function LoadPaymentHistory(Request $request)
    {
        $date = $request->date;
        $country = $request->country;
        if ($country==0) {
            $resp = DB::table('mhac_payment_counter')
            ->join('mhac_appointments', 'mhac_appointments.appointment_no', '=', 'mhac_payment_counter.pc_app_no')
            ->orderBy('mhac_payment_counter.id')
            ->select(
               'mhac_appointments.passport_no',
                'mhac_appointments.first_name',
                'mhac_appointments.last_name',
                'mhac_payment_counter.pc_app_no',
                'mhac_appointments.dob',
                'mhac_appointments.gender',
                'mhac_appointments.country',
                'mhac_appointments.appointment_date'
            )
           // ->where('temp_new.temp_payment', '=', 4)
            ->whereDate('mhac_payment_counter.pc_cdate', '=', $date)
           // ->where('temp_token_no', '<', '500')
            ->get();


        $date = date('Y-m-d');
        $Pay = DB::table('mhac_payment_setting')
            ->select('Amount')
            ->where('Effective_Date', '<=', $date)
            ->orderBy('Effective_Date', 'desc')
            ->first();

        $amount = $Pay->Amount;

        return response()->json(['result' => $resp, 'amount' => $amount]);
        }
        if ($country!=0 && $country!="") {
            $resp = DB::table('mhac_payment_counter')
            ->join('mhac_appointments', 'mhac_appointments.appointment_no', '=', 'mhac_payment_counter.pc_app_no')
            ->orderBy('mhac_payment_counter.id')
            ->select(
               'mhac_appointments.passport_no',
                'mhac_appointments.first_name',
                'mhac_appointments.last_name',
                'mhac_payment_counter.pc_app_no',
                'mhac_appointments.dob',
                'mhac_appointments.gender',
                'mhac_appointments.country',
                'mhac_appointments.appointment_date'
            )
           // ->where('temp_new.temp_payment', '=', 4)
            ->whereDate('mhac_payment_counter.pc_cdate', '=', $date)
            ->where('mhac_payment_counter.country', $country)
           // ->where('temp_token_no', '<', '500')
            ->get();


        $date = date('Y-m-d');
        $Pay = DB::table('mhac_payment_setting')
            ->select('Amount')
            ->where('Effective_Date', '<=', $date)
            ->orderBy('Effective_Date', 'desc')
            ->first();

        $amount = $Pay->Amount;

        return response()->json(['result' => $resp, 'amount' => $amount]);
        }

    }

}
