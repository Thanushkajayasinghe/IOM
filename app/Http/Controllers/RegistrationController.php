<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class RegistrationController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.Registration')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function CRUD(Request $request)
    {
        $command = $request->command;

        if ($command === 'next') {

            $preToken = $request->preToken;

            $userGroupId = Session::get('userGroup');

            $tokenno = DB::table('temp_table')
                ->where('temp_reg', 1)
                ->min('temp_token_no');

            if ($preToken != "-" && $tokenno) {
                DB::table('temp_table')
                    ->where('temp_token_no', $preToken)
                    ->where('temp_reg', 4)
                    ->update(['temp_reg_counter' => 0]);
            }

            DB::table('temp_table')
                ->where('temp_token_no', $tokenno)
                ->update(['temp_reg' => 2, 'temp_reg_counter' => $userGroupId]);

            if (empty($tokenno)) {
                return response()->json("No Token");
            } else {
                return response()->json($tokenno);
            }

        } else if ($command === 'AppointmentNo') {

            $userGroupId = Session::get('userGroup');
            $token = $request->token;
            $array = array();
            $key = 0;

            $res = DB::table('temp_table')
                ->where('temp_token_no', $token)
                ->update(['temp_reg' => 2 ,'temp_reg_counter' => $userGroupId]);

            $appointmentno = DB::table('temp_table')
                ->select('temp_app_no')
                ->where('temp_token_no', $token)
                ->orderBy('temp_app_no', 'asc')
                ->get();

            foreach ($appointmentno as $valsappno) {
                $array[$key] = $valsappno->temp_app_no;
                $key++;
            }

            return response()->json($array);

        } else if ($command === 'CheckPassportNo') {

            $tokNo = $request->tokNo;

            $select = DB::table('temp_table')
                ->where('temp_token_no', $tokNo)
                ->whereNull('temp_passport')
                ->count();

            return response()->json($select);

        } else if ($command === 'data') {

            $appointment = $request->appointment;
            $arrappdetails = array();

            $appdetails = DB::table('register_applicant_details')
                ->select('PassportNumber', 'FirstName', 'LastName')
                ->where('AppointmentNumber', $appointment)
                ->get();

            $tokenfkid = DB::table('register_applicant_details')
                ->where('AppointmentNumber', $appointment)
                ->value('FkId');

            $appaddressdetails = DB::table('register_applicants')
                ->select('SlAddress', 'SlStreet', 'SlCity')
                ->where('id', $tokenfkid)
                ->get();

            $appointmentdate = DB::table('register_applicants')
                ->where('id', $tokenfkid)
                ->value('AppointmentDate');

            $arrappdetails[0] = $appointment;
            foreach ($appdetails as $appnodetails) {
                $arrappdetails[1] = $appnodetails->PassportNumber;
                $arrappdetails[2] = $appnodetails->FirstName;
                $arrappdetails[3] = $appnodetails->LastName;
            };
            $arrappdetails[4] = $appointmentdate;

            foreach ($appaddressdetails as $appointmentaddressdetails) {
                if ($appointmentaddressdetails->SlAddress != '' || $appointmentaddressdetails->SlStreet != '' || $appointmentaddressdetails->SlCity != '') {
                    $arrappdetails[5] =
                        $appointmentaddressdetails->SlAddress . ", " .
                        $appointmentaddressdetails->SlStreet . ", " .
                        $appointmentaddressdetails->SlCity;
                } else {
                    $arrappdetails[5] = '';
                }
            }

            return response()->json($arrappdetails);

        } else if ($command === 'notAvailable') {

            $token = $request->token;
            $userGroupId = Session::get('userGroup');

            $updateDetails = array(
                'temp_reg_counter' => $userGroupId,
                'temp_reg' => 3,
                'registrationAudio' => null
            );

            DB::table('temp_table')
                ->where('temp_token_no', '=', $token)
                ->update($updateDetails);

            return response()->json('Done');

        } else if ($command === 'NoShow') {

            $token = $request->token;

            DB::table('temp_table')
                ->where('temp_token_no', $token)
                ->update(['temp_reg' => 3, 'temp_reg_counter' => 0, 'registrationAudio' => null]);

            return response()->json(['Done']);

        } else if ($command == 'NoShowCount') {

            $userGroupId = Session::get('userGroup');

            $qry1 = DB::table('temp_table')
                ->select('temp_token_no','temp_reg')
                ->distinct('temp_token_no')
                ->where([
                    ['temp_reg', '=', 2],
                    ['temp_reg_counter', $userGroupId],
                ])
                ->get();

            $qry2 = DB::table('temp_table')
                ->select('temp_token_no','temp_reg')
                ->distinct('temp_token_no')
                ->where('temp_reg', '=', 3)
                ->get();

            $totresult = $qry1->merge($qry2)->count();

            return response()->json($totresult);

        } else if ($command === 'NoShowList') {

            $userGroupId = Session::get('userGroup');




            $qry1 = DB::table('temp_table')
                ->select('temp_token_no','temp_reg')
                ->distinct('temp_token_no')
                ->where([
                    ['temp_reg', '=', 2],
                    ['temp_reg_counter', $userGroupId],
                    ])
                ->get();

            $qry2 = DB::table('temp_table')
                ->select('temp_token_no','temp_reg')
                ->distinct('temp_token_no')
                ->where('temp_reg', '=', 3)
                ->get();

            $totresult = $qry1->merge($qry2);


            return response()->json(['result' => $totresult]);


        } else if ($command === 'save') {

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
            $path = public_path() . '/tempFileUpload/photoBoothFiles/' . $png_url;

            file_put_contents($path, $data);

            $reg_passport = DB::table('tbl_registration')
                ->where('reg_app_no', $appno)
                ->value('reg_passport');

            if (!empty($reg_passport)) {

                DB::table('tbl_registration')->where('reg_app_no', '=', $appno)->delete();
            }

            DB::table('tbl_registration')->insert([
                [
                    'reg_passport' => $ppno,
                    'reg_app_no' => $appno,
                    'reg_app_date' => $appdate,
                    'reg_priority_req_cat' => $prc,
                    'reg_photo_booth' => $png_url,
                    'reg_remarks' => $remarks,
                    'reg_priority_req_app' => $pra,
                    'reg_status' => 'n',
                ]
            ]);

            DB::table('temp_table')
                ->where('temp_app_no', $appno)
                ->update(['temp_reg' => 5]);

            $GetTokenNo = DB::table('temp_table')
                ->select('temp_token_no')
                ->where('temp_app_no', $appno)
                ->first();

            $Tok = $GetTokenNo->temp_token_no;

            $GetTokenNoCount = DB::table('temp_table')
                ->where('temp_token_no', $Tok)
                ->count();
                
            $GetTokenNoCount1 = DB::table('temp_table')
                ->where('temp_token_no', $Tok)
                ->where('temp_reg', 5)
                ->count();


            if ($GetTokenNoCount == $GetTokenNoCount1) {
                DB::table('temp_table')
                    ->where('temp_token_no', $Tok)
                    ->update(['temp_reg' => 4]);
            }

            DB::table('audittrail')->insert([
                [
                    'appno' => $appno,
                    'regitration' => date("Y-m-d H:i:s"),
                    'regcou' => strval(Auth::id())
                ]
            ]);

            DB::table('temp_table')
                ->where('temp_reg', 4)
                ->update(['temp_reg_counter' => 0]);

            return response()->json(['Done']);

        } else if ($command === 'fingerPrintSave') {

            $appNo = $request->appNo;
            $imageData = $request->imageData;
            $objectName = $request->objectName;

            $img = str_replace('data:image/bmp;base64,', '', $imageData);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);

            $wsq_url = "FP-" . $appNo . "-" . $objectName . "-" . date("Ymd") . ".bmp";
            $filePath = public_path() . '/tempFileUpload/FingerPrintData/' . $appNo . "-" . date("Ymd") . '/';
            if (!file_exists($filePath)) {
                File::makeDirectory($filePath);
            }

            $path = public_path() . '/tempFileUpload/FingerPrintData/' . $appNo . "-" . date("Ymd") . '/' . $wsq_url;

            file_put_contents($path, $data);

            return response()->json(['result' => true]);

        } else if ($command === 'CheckAppointmentAvailable') {

            $appNo = $request->appNo;

            $count = DB::table('tbl_registration')->where('reg_app_no', '=', $appNo)->count();

            $res = true;
            if ($count == 0) {
                $res = false;
            }

            return response()->json(['result' => $res]);


        }else if($command === 'ChekTokNo'){
            $token = $request->token;

            $res = DB::table('temp_table')
                ->where('temp_token_no', '=', $token)
                ->where('temp_reg_counter', '=', 0)
                ->count();

            return response()->json(['result' => $res]);

        }
    }
}
