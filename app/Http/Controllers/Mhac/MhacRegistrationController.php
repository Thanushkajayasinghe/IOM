<?php

namespace App\Http\Controllers\Mhac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MhacRegistration;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MhacRegistrationController extends Controller
{
    public function ViewpageLanding()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.mhacregistrationlanding')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }
    //pending token count
    public function PendingTokens(Request $request)
    {
        $counter = Session::get('counterid');
        $country = $request->country;
        $counterid = DB::table('mhac_counters')
            ->distinct()
            ->where('id', $counter)
            ->first();
        $counter_no = $counterid->counter_no;
        $token = DB::table('mhac_temp_table')
            ->distinct()
            ->where('registration_status', '=', 1)
            ->where('floor', '=', Session::get('Floor'))
            ->where(DB::raw("substring(token_no from '^([^-]+)')"), '=', $country)
            ->count('token_no');
        return response()->json(['result' => $token, 'counter' => $counter_no]);
    }
    //call again token count//////////////////////////
    public function CallAgain(Request $request)
    {
        $country = $request->country;
        $counter = Session::get('counterid');
        $counterid = DB::table('mhac_counters')
            ->distinct()
            ->where('id', $counter)
            ->first();
        $counter_no = $counterid->counter_no;

        $qry2 = DB::table('mhac_temp_table')
            ->select('token_no', 'registration_status')
            ->distinct('token_no')
            ->whereIn('registration_status', [2, 3])
            ->where('floor', '=', Session::get('Floor'))
            ->where(DB::raw("substring(token_no from '^([^-]+)')"), '=', $country)
            ->where('registration_counter', $counter_no)
            ->get();

        $totresult = ($qry2)->count();
        return response()->json($totresult);

    }
    //CallNext
    public function Next(Request $request)
    {
        $country = $request->country;
        $counter = Session::get('counterid');
        $counterid = DB::table('mhac_counters')
            ->distinct()
            ->where('id', $counter)
            ->first();
        $counter_no = $counterid->counter_no;

        $tokenno = DB::table('mhac_temp_table')
            ->where('registration_status', 1)
            ->where('floor', '=', Session::get('Floor'))
            ->where(DB::raw("substring(token_no from '^([^-]+)')"), '=', $country)
            ->min('token_no');



        DB::table('mhac_temp_table')
            ->where('token_no', $tokenno)
            ->where('floor', '=', Session::get('Floor'))
            ->where(DB::raw("substring(token_no from '^([^-]+)')"), '=', $country)
            ->update(['registration_status' => 2, 'registration_counter' => $counter_no]);

        if (empty($tokenno)) {
            return response()->json("No Token");
        } else {
            return response()->json($tokenno);
        }

    }
    public function LoadAppointmentNo(Request $request)
    {
        $counter = Session::get('counterid');
        $country = $request->country;
        $token = $request->token;
        $array = array();
        $key = 0;
        $appointmentno = DB::table('mhac_temp_table')
            ->select('mhac_temp_table.appointment_no', 'mhac_appointments.member_type')
            ->join('mhac_appointments', 'mhac_temp_table.appointment_no', '=', 'mhac_appointments.appointment_no')
            ->where('mhac_temp_table.token_no', $token)
            ->where('mhac_temp_table.floor', Session::get('Floor'))
            //   ->where('registration_status','=' ,$Pstatus)
            ->where(DB::raw("substring(mhac_temp_table.token_no from '^([^-]+)')"), $country)
            ->orderBy('mhac_temp_table.appointment_no', 'asc')
            ->get();
        // $appointmentno = DB::table('mhac_temp_table')
        //     ->select('appointment_no')
        //     ->where('token_no', $token)
        //     ->where('floor', '=', Session::get('Floor'))
        //     ->where(DB::raw("substring(token_no from '^([^-]+)')"), '=', $country)
        //     ->orderBy('appointment_no', 'asc')
        //     ->get();
        foreach ($appointmentno as $valsappno) {
            // $array[$key] = $valsappno->appointment_no;
            // $key++;
            $array[] = [
                'appointment_no' => $valsappno->appointment_no,
                'member_type' => $valsappno->member_type,
            ];
        }

        return response()->json($array);

    }
    //  //this is for call nex and call again --> load personal detail according to appointment number
    public function LoadAppointmentNoData(Request $request)
    {
        $appointment = $request->appointment;
        $arrappdetails = array();
        $appdetails = DB::table('mhac_appointments')
            //  ->select('passport_no', 'first_name', 'last_name', 'address1', 'city', 'appointment_date')
            ->where('appointment_no', $appointment)
            ->first(); // Use first() instead of get() to retrieve a single object
        if ($appdetails) {
            return response()->json([
                'passport_no' => $appdetails->passport_no,
                'appointment_no' => $appdetails->appointment_no,
                'first_name' => $appdetails->first_name,
                'last_name' => $appdetails->last_name,
                'address1' => $appdetails->address1,
                'address2' => $appdetails->address2,
                'city' => $appdetails->city,
                'appointment_date' => $appdetails->appointment_date,
            ]);
        } else {
            return response()->json(['error' => 'No record found for the given appointment']);
        }

    }
    //CallAgain
    public function CallAgainList(Request $request)
    {
        $country = $request->country;
        $counter = Session::get('counterid');
        $counterid = DB::table('mhac_counters')
            ->distinct()
            ->where('id', $counter)
            ->first();
        $counter_no = $counterid->counter_no;

        $qry3 = DB::table('mhac_temp_table')
            ->select('token_no', 'registration_status')
            ->distinct('token_no')
            //    ->where('member_type', 'MainMember')
            // ->distinct('registration_status')
            ->whereIn('registration_status', [2, 3])
            ->where('floor', '=', Session::get('Floor'))
            ->where(DB::raw("substring(token_no from '^([^-]+)')"), '=', $country)
            ->where('registration_counter', $counter_no)
            ->get();


        $totresult = ($qry3);
        return response()->json(['result' => $totresult]);
    }
    public function CallAgainAppNo(Request $request)
    {
        $token = $request->token;
        $counter = Session::get('counterid');
        $counterid = DB::table('mhac_counters')
            ->distinct()
            ->where('id', $counter)
            ->first();
        $counter_no = $counterid->counter_no;
        $res = DB::table('mhac_temp_table')
            ->where('token_no', '=', $token)
            ->where('registration_counter', '=', $counter_no)
            ->count();

        return response()->json(['result' => $res]);
    }
    //load appoinment number list in call again 
    public function LoadAppointmentNo2(Request $request)
    {
        $counter = Session::get('counterid');
        $country = $request->country;
        $Pstatus = $request->Pstatus;
        $token = $request->token;
        $array = array();
        $key = 0;
        //     $appointmentno = DB::table('mhac_temp_table')
        //         ->select('mhac_temp_table.appointment_no', 'mhac_appointments.member_type')
        //         ->join('mhac_appointments', 'mhac_temp_table.appointment_no', '=', 'mhac_appointments.appointment_no')
        //         ->where('mhac_temp_table.token_no', $token)
        //         ->where('mhac_temp_table.floor', Session::get('Floor'))
        //         //->where('registration_status', '=', $Pstatus)
        //         ->where(DB::raw("substring(mhac_temp_table.token_no from '^([^-]+)')"), $country)
        //         ->orderBy('mhac_temp_table.appointment_no', 'asc')
        //         ->get();
        //        
        //    foreach ($appointmentno as $valsappno) {
        //          $array[] = [
        //             'appointment_no' => $valsappno->appointment_no,
        //             'member_type' => $valsappno->member_type,
        //         ];
        //     }
        //     
        //     return response()->json($array);

        $appointmentno = DB::table('mhac_temp_table')
            ->select('mhac_temp_table.appointment_no', 'mhac_appointments.member_type')
            ->join('mhac_appointments', 'mhac_temp_table.appointment_no', '=', 'mhac_appointments.appointment_no')
            ->where('mhac_temp_table.token_no', $token)
            ->where('mhac_temp_table.floor', Session::get('Floor'))
            ->where(DB::raw("substring(mhac_temp_table.token_no from '^([^-]+)')"), $country)
            ->orderBy('mhac_temp_table.appointment_no', 'asc')
            ->get();
        foreach ($appointmentno as $valsappno) {
            $array[] = [
                'appointment_no' => $valsappno->appointment_no,
                'member_type' => $valsappno->member_type,
            ];
        }
        $alreadySavedapp = DB::table('mhac_temp_table')
            ->select('mhac_temp_table.appointment_no', 'mhac_appointments.member_type')
            ->join('mhac_appointments', 'mhac_temp_table.appointment_no', '=', 'mhac_appointments.appointment_no')
            ->where('mhac_temp_table.token_no', $token)
            ->where('mhac_temp_table.floor', Session::get('Floor'))
            ->where(DB::raw("substring(mhac_temp_table.token_no from '^([^-]+)')"), $country)
            ->where('registration_status', '=', 5)
            ->orderBy('mhac_temp_table.appointment_no', 'asc')
            ->get();
            
        if($alreadySavedapp->isNotEmpty()){
            foreach ($alreadySavedapp as $valsappno1) {
                $array2[] = [
                    'appointment_no' => $valsappno1->appointment_no,
                    //'member_type' => $valsappno1->member_type,
                ];
            }
            $responseData = [
                'appointments' => $array,
                'count' => $array2,
            ];
           
        }
        else{
            $responseData = [
                'appointments' => $array,
            ];
        }

        return response()->json($responseData);
}
    public function CheckCallAgainAppNo(Request $request)
    {
        $appNo = $request->appNo;
        $count = DB::table('mhac_temp_table')
            ->where('appointment_no', '=', $appNo)
            ->where('registration_status', '=', 5)
            ->count();
        $res = true;
        if ($count == 0) {
            $res = false;
        }
        return response()->json(['result' => $res]);
    }
    // public function CheckCallAgainAppNoUsingToken(Request $request)
    // {
    //     $token = $request->token;
    //     $appointmentNo = DB::table('mhac_temp_table')
    //     ->where('token_no', '=', $token)
    //     ->where('registration_status', '=', 5)
    //     ->select('appointment_no')
    //     ->first();

    //     return response()->json(['result' => $appointmentNo->appointment_no]);
    // }
    //NoShow
    public function NoSHOW(Request $request)
    {
        $token = $request->token;
        $counter = Session::get('counterid');
        $counterid = DB::table('mhac_counters')
            ->distinct()
            ->where('id', $counter)
            ->first();
        $counter_no = $counterid->counter_no;
        DB::table('mhac_temp_table')
            ->where('token_no', $token)
            ->where('floor', '=', Session::get('Floor'))
            ->update(['registration_status' => 3, 'registration_counter' => $counter_no]);

        return response()->json(['Done']);

    }
    //save
    public function Save(Request $request)
    {
        $tokensave = $request->token;
        $prc = $request->prc;
        $remarks = $request->remarks;
        $pra = $request->pra;
        $appdate = $request->appdate;
        $appno = $request->appno;
        $ppno = $request->ppno;
        $photobooth = $request->photobooth;

        $img = str_replace('data:image/jpeg;base64,', '', $photobooth);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);

        $png_url = "photoBooth-" . $appno . "-" . Session::get('userGroup') . "-" . time() . ".jpg";

        $path = public_path() . '/mhacPhotobooth/' . $png_url;
        file_put_contents($path, $data);

        // $reg_passport = DB::table('tbl_registration')
        //     ->where('reg_app_no', $appno)
        //     ->value('reg_passport');

        // if (!empty($reg_passport)) {

        //     DB::table('tbl_registration')->where('reg_app_no', '=', $appno)->delete();
        // }

        DB::table('mhac_appointments')
            ->where('appointment_no', $appno)
            ->update([
                'appointment_date' => $appdate,
                'image' => $png_url,
                'remark' => $remarks,
            ]);

        DB::table('mhac_temp_table')
            ->where('appointment_no', $appno)
            ->update(['registration_status' => 5]);

        $GetTokenNo = DB::table('mhac_temp_table')
            ->select('token_no')
            ->where('appointment_no', $appno)
            ->where('floor', '=', Session::get('Floor'))
            ->first();

        $Tok = $GetTokenNo->token_no;

        $GetTokenNoCount = DB::table('mhac_temp_table')
            ->where('token_no', $Tok)
            ->where('floor', '=', Session::get('Floor'))
            ->count();
        // dd($GetTokenNoCount);
        $GetTokenNoCount1 = DB::table('mhac_temp_table')
            ->where('token_no', $Tok)
            ->where('floor', '=', Session::get('Floor'))
            ->where('registration_status', 5)
            ->count();

        if ($GetTokenNoCount == $GetTokenNoCount1) {
            DB::table('mhac_temp_table')
                ->where('token_no', $Tok)
                ->where('floor', '=', Session::get('Floor'))
                ->update(['registration_status' => 4]);
        }
        $counter = Session::get('counterid');
        $counterid = DB::table('mhac_counters')
            ->distinct()
            ->where('id', $counter)
            ->first();
        $counter_no = $counterid->counter_no;
        DB::table('mhac_audittrail')->insert([
            'appno' => $appno,
            'registration' => date("Y-m-d H:i:s"),
            'registration_user' => strval(Auth::id()),
            'registration_counter' => $counter_no,
            'floor'=> Session::get('Floor')
        ]);



        return response()->json(['Done']);


    }





}
