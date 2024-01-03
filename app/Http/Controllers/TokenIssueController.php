<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class TokenIssueController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.TokenIssue')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function tokenAllocate(Request $request)
    {
        $gappno = $request->appno;
        $systoken = $request->token;

        $date = DB::table('appointment_cancel_and_reschedule_availability')
            ->where('appointment_no', $gappno)
            ->value('date');

        $tokenfkid = DB::table('register_applicant_details')
            ->where('AppointmentNumber', $gappno)
            ->value('FkId');

        $tokenissues = DB::table('register_applicant_details')
            ->where('FkId', $tokenfkid)
            ->get();

        $todaydate = date('Y-m-d');

        DB::table('table_token')
            ->where('token_date', $todaydate)
            ->update(['token_no' => $systoken]);

        foreach ($tokenissues as $tokenissue) {
            DB::table('temp_table')->insert(
                [
                    'temp_passport' => $tokenissue->PassportNumber,
                    'temp_app_no' => $tokenissue->AppointmentNumber,
                    'temp_token_no' => $systoken,
                    'temp_reg' => 1,
                    'temp_reg_counter' => 0,
                    'temp_counsel' => 1,
                    'temp_counsel_counter' => 0,
                    'temp_cxr' => 1,
                    'temp_cxr_counter' => 0,
                    'temp_phlebotomy' => 1,
                    'temp_phlebotomy_counter' => 0,
                    'temp_payment' => 1,
                    'temp_payment_counter' => 0,
                    'temp_consult' => 1,
                    'temp_consult_counter' => 0,
                    'temp_sputum' => 1,
                    'temp_sputum_counter' => 0,
                    'temp_radiology'=>1,
                ]
            );
        }       

        $tokendate = DB::table('register_applicants')
            ->select('register_applicants.AppointmentDate')
            ->where('id', $tokenfkid)
            ->get();
//        --------------------------------------------------
        return response()->json(['result' =>"Done", 'result2' => $tokendate]); 

    }


    public function CRUD(Request $request)
    {
        $id = strtoupper($request->id);

        $appno = DB::table('register_applicant_details')
            ->where('AppointmentNumber', $id)
            ->value('AppointmentNumber');


        $apptno = DB::table('register_applicant_details')
            ->where('PassportNumber', $id)
            ->value('AppointmentNumber');

        if ($apptno != null || $appno != null) {

            if ($apptno != null) {
                $gappno = $apptno;
            } else {
                $gappno = $appno;
            }

            $tokenfkid = DB::table('temp_table')
                ->where('temp_app_no', $gappno)
                ->value('temp_token_no');

            if (!empty($tokenfkid)) {
                return response()->json(['This number has already registered !', '0']);
            }

            $date = DB::table('appointment_cancel_and_reschedule_availability')
                ->where('appointment_no', $gappno)
                ->value('date');

            $time = DB::table('appointment_cancel_and_reschedule_availability')
                ->where('appointment_no', $gappno)
                ->value('time');

            $todaydate = date('Y-m-d');
            $todaytime = date('H:i:s');
            $interval = strtotime($time) - strtotime($todaytime);

            $member = DB::table('register_applicant_details')
                ->where('AppointmentNumber', $gappno)
                ->value('MemberStatus');

            if (strtotime($todaydate) != strtotime($date)) {
                return response()->json(['Appointment not valid for today', '0']);
            } else if ((0 <= ($interval / 60)) && (($interval / 60) >= 30)) {
                return response()->json(["You can obtain the token with 30 min ", '0']);
            } else if ($member != 'MainMember') {
                return response()->json(['Please use the Main member Appointment Number or Passport Number !', '0']);
            } else {

                $systoken = 1;
                $checkavailabletokeno = DB::table('table_token')
                    ->where('token_date', $todaydate)
                    ->value('token_date');

                if (empty($checkavailabletokeno)) {
                    DB::table('table_token')->insert(
                        [
                            'token_date' => $todaydate,
                            'token_no' => 1
                        ]);
                } else {
                    $systoken = DB::table('table_token')
                        ->where('token_date', $todaydate)
                        ->value('token_no');

                    $systoken = $systoken + 1;
                }

                return response()->json([$systoken, $gappno]);
            }
        } else {
            return response()->json(['Please enter a correct appointment or passport number!', '0']);
        }
    }


}
