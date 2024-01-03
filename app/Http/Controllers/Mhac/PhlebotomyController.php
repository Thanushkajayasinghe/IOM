<?php

namespace App\Http\Controllers\Mhac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MhacAppointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Picqer\Barcode\BarcodeGeneratorSVG;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Datetime;

class PhlebotomyController extends Controller
{
    public function ViewpageLanding()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.phlebotomylanding')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function CRUD(Request $request)
    {

        $command = $request->command;

        if ($command === 'pendingToken') {

            $country = $request->input('country');
            $counterid = DB::table('mhac_counters')
                ->distinct()
                ->where('id', Session::get('counterid'))
                ->first();
            $counter_no = $counterid->counter_no;
            $token = DB::table('mhac_temp_table')
                ->distinct()
                ->where('registration_status', '=', 4)
                ->where('payment_status', '=', 4)
                ->where('vital_status', '=', 4)
                ->where('phlebotomy_status', '=', 1)
                ->where('floor', '=', Session::get('Floor'))
                ->where(DB::raw("substring(token_no from '^([^-]+)')"), '=', $country)
                ->count('token_no');
            return response()->json(['result' => $token, 'counter' => $counter_no]);


        } else if ($command === 'next') {
            $array = array();
            $key = 0;
            $counterid = Session::get('counterid');

            $counterNoRecord = DB::table('mhac_counters')
                ->where('id', $counterid)
                ->value('counter_no');
            $floor = Session::get('Floor');
            $country = $request->input('country');

            // Retrieve the token_no from the mhac_temp_table based on the floor, registration_status, payment_status, vital_status and country
            $tokenRecord = DB::table('mhac_temp_table')
                ->where('floor', $floor)
                ->where('registration_status', 4)
                ->where('payment_status', 4)
                ->where('vital_status', 4)
                ->where('phlebotomy_status', 1)
                ->where(DB::raw("substring(token_no from '^([^-]+)')"), '=', $country)
                ->orderBy('id')
                ->first();

            if ($tokenRecord) {
                // Retrieve the ID based on the token_no from the retrieved token record
                $token = $tokenRecord->token_no;

                // Update the vital_status for the fetched record using its id
                DB::table('mhac_temp_table')
                    ->where('token_no', $token)
                    ->where('floor', $floor)
                    ->update(['phlebotomy_status' => 2, 'phlebotomy_counter' => $counterNoRecord]);

                $appointmentno = DB::table('mhac_temp_table')
                    ->select('appointment_no')
                    ->where('token_no', $token)
                    ->where('floor', $floor)
                    ->orderBy('appointment_no', 'asc')
                    ->get();

                foreach ($appointmentno as $valsappno) {
                    $array[$key] = $valsappno->appointment_no;
                    $key++;
                }
                return response()->json([
                    'tokenName' => $token,
                    'appointmentNo' => $array,
                ]);

            }
            // Return a default response if no token or token record found
            return response()->json(['tokenName' => null]);

        } else if ($command == 'NoShowCount') {
            $floor = Session::get('Floor');
            $country = $request->input('country');


            //retrieve  vitals status 2 /3
            $qry1 = DB::table('mhac_temp_table')
                ->select('token_no', 'phlebotomy_status')
                ->distinct('token_no')
                ->where([
                    ['floor', $floor],
                    ['registration_status', 4],
                    ['payment_status', 4],
                    ['vital_status', 4],
                    [DB::raw("substring(token_no from '^([^-]+)')"), $country],
                ])
                ->whereIn('phlebotomy_status', [2, 3])
                ->get();
            $totresult = ($qry1)->count();

            return response()->json($totresult);

        } else if ($command === 'NoShowList') {

            $floor = Session::get('Floor');
            $country = $request->input('country');

            $qry1 = DB::table('mhac_temp_table')
                ->select('token_no', 'phlebotomy_status')
                ->distinct('token_no')
                ->where([
                    ['floor', $floor],
                    ['registration_status', 4],
                    ['payment_status', 4],
                    ['vital_status', 4],
                    [DB::raw("substring(token_no from '^([^-]+)')"), $country],
                ])
                ->whereIn('phlebotomy_status', [2, 3])
                ->get();
            $totresult = ($qry1);

            return response()->json(['result' => $totresult]);

        } else if ($command === 'NoShow') {
            $token = $request->token;

            DB::table('mhac_temp_table')
                ->where('token_no', $token)
                ->update(['phlebotomy_status' => 3]);

            return response()->json(['Done']);

        } else if ($command === 'data') {

            $appointment = $request->appointment;
            $appdetails = DB::table('mhac_appointments')
                ->select('passport_no', 'dob', 'gender')
                ->where('appointment_no', $appointment)
                ->get();

            //set user image///
            $getImage = DB::table('mhac_appointments')->select('image')->where('appointment_no', $appointment)->count();
            $image = '';
            $image = DB::table('mhac_appointments')->where('appointment_no', $appointment)->value('image');

            foreach ($appdetails as $appnodetails) {
                $arrappdetails[0] = $appointment;
                $arrappdetails[1] = $appnodetails->passport_no;
                $arrappdetails[2] = $appnodetails->dob;
                $arrappdetails[3] = $appnodetails->gender;
                $arrappdetails[4] = $image;
            }

            return response()->json($arrappdetails);

        } else if ($command === 'ChekTokNo') {
            $token = $request->token;

            $res = DB::table('mhac_temp_table')
                ->where('token_no', '=', $token)
                ->count();

            return response()->json(['result' => $res]);

        } else if ($command === 'AppointmentNo') {

            $token = $request->token;
            $array = array();
            $key = 0;

            $counterid = Session::get('counterid');

            $counterNoRecord = DB::table('mhac_counters')
                ->where('id', $counterid)
                ->value('counter_no');

            $appointmentno = DB::table('mhac_temp_table')
                ->select('appointment_no')
                ->where('token_no', $token)
                ->where('floor', Session::get('Floor'))
                ->orderBy('appointment_no', 'asc')
                ->get();

            foreach ($appointmentno as $valsappno) {
                $array[$key] = $valsappno->appointment_no;
                $key++;
            }

            return response()->json($array);

        } else if ($command === 'CheckAppointmentAvailable') {

            $appNo = $request->appNo;
            $count = DB::table('mhac_temp_table')
                ->where('appointment_no', $appNo)
                ->where('phlebotomy_status', 5)
                ->count();
            $res = true;
            if ($count == 0) {
                $res = false;
            }
            return response()->json(['result' => $res]);

        } else if ($command === 'save') {

            $BC = "";
            $tokenNo = $request->tokenNo;
            $currentDate = date('Y-m-d');
            $todaydate = date('ymd');

            $result = DB::table('mhac_phlebotomy')
                ->whereDate('datetime', $currentDate)
                ->count('id');

            $tokenPad = str_pad($tokenNo, 3, "0", STR_PAD_LEFT);

            $ind = 001;
            if ($result == 0) {

                $LastIndex = str_pad(1, 3, "0", STR_PAD_LEFT);
                $BC = $todaydate . '' . $tokenPad . '' . $LastIndex;
            } else {

                $ind = str_pad(((int) $result + 1), 3, "0", STR_PAD_LEFT);
                $BC = $todaydate . '' . $tokenPad . '' . $ind;
            }

            //return response()->json(['result' => $BC, 'token' => $tokenPad, 'index' => $ind]);


            $token = $request->token;
            $appointment_no = $request->appointmentno;
            $passport_no = $request->passportno;
            $barcode = $request->barcode;
            $hiv = $request->hiv;
            $filaria = $request->filaria;
            $malaria = $request->malaria;
            $shcg = $request->shcg;
            $urine = $request->urine;
            $country = $request->country;
            $cby = Auth::id();
            $dateTime = date('Y-m-d H:i:s');
            $floor = Session::get('Floor');
            $counterid = Session::get('counterid');
            $counterNoRecord = DB::table('mhac_counters')
                ->where('id', $counterid)
                ->value('counter_no');

            //Update the phlebotomy_status
            DB::table('mhac_temp_table')
                ->where([
                    ['token_no', $token],
                    ['appointment_no', $appointment_no],
                    ['passport_no', $passport_no]
                ])
                ->update(['phlebotomy_status' => 5, 'phlebotomy_counter' => $counterNoRecord,]);
            //The status of the "phlebotomy_status" is set to "5" since the samples are sent to the Laboratory for testing purposes

            //insert the record into mhac_phlebotomy table
            DB::table('mhac_phlebotomy')->updateOrInsert(
                [
                    'appointment_no' => $appointment_no,
                ],
                [
                    'passport_no' => $passport_no,
                    'country' => $country,
                    'floor' => $floor,
                    'hiv' => $hiv,
                    'filaria' => $filaria,
                    'malaria' => $malaria,
                    'shcg' => $shcg,
                    'urine' => $urine,
                    'datetime' => $dateTime,
                    'cby' => $cby,
                    'cdate' => $dateTime,
                    'barcode' => $BC,
                ]
            );
            return response()->json(['result' => true, 'barcode' => $BC, 'token' => $tokenPad, 'index' => $ind]);

            //update mhac_audittrail table
            DB::table('mhac_audittrail')
                ->where('appno', $appointment_no)
                ->update(['phelabotomy' => date("Y-m-d H:i:s"), 'phelabotomy_user' => strval(Auth::id()), 'phelabotomy_counter' => $counterNoRecord]);

        }
    }
}
