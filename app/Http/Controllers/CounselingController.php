<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class CounselingController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.Counseling')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function CRUD(Request $request)
    {
        $req = $request->command;

        if ($req === 'individual') {

            $appointmentID = $request->appointmentID;

            $individualarray = array();

            $individualdetails = DB::table('register_applicant_details')
                ->select('FirstName', 'LastName', 'PassportNumber', 'PreviousPassportIfAny', 'CountryOfBirth', 'DateOfBirth', 'Gender')
                ->where('AppointmentNumber', $appointmentID)
                ->get();

            $individual = DB::table('register_applicants')
                ->select('AppointmentDate', 'SlCity', 'CdAddress', 'SlAddress', 'CdTelephoneFixedLine', 'CdMobile', 'EmailAddress', 'SponsorName', 'Nationality', 'PassportNumber')
                ->join('register_applicant_details', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->where('AppointmentNumber', $appointmentID)
                ->get();

            $reg_no = DB::table('tbl_registration')
                ->where('reg_app_no', $appointmentID)
                ->value('registration_id');

            $Token_no = DB::table('temp_table')
                ->where('temp_app_no', $appointmentID)
                ->value('temp_token_no');


            //Anjana
            $ImageName = DB::table('tbl_registration')->where('reg_app_no', $appointmentID)->value('reg_photo_booth');
            ///End Anjana


            foreach ($individualdetails as $individualdetails) {
                $individualarray[1] = $individualdetails->FirstName;
                $individualarray[22] = $individualdetails->LastName;
                $individualarray[4] = $individualdetails->PassportNumber;
                $individualarray[5] = $individualdetails->PreviousPassportIfAny;
                $individualarray[6] = $individualdetails->CountryOfBirth;
                $individualarray[9] = $individualdetails->DateOfBirth;
                $individualarray[10] = $individualdetails->Gender;
            }
            foreach ($individual as $individual) {
                $individualarray[2] = $individual->AppointmentDate;
                $individualarray[7] = $individual->SlCity;
                $individualarray[12] = $individual->CdAddress;
                $individualarray[13] = $individual->SlAddress;
                $individualarray[14] = $individual->CdTelephoneFixedLine;
                $individualarray[15] = $individual->CdMobile;
                $individualarray[16] = $individual->EmailAddress;
                $individualarray[17] = $individual->SponsorName;
                $individualarray[18] = $individual->Nationality;
                $individualarray[19] = $individual->PassportNumber;
            }

            $individualarray[0] = $reg_no;
            $individualarray[3] = $appointmentID;
            $individualarray[8] = 'ethinicity';
            $individualarray[11] = 'married';
            $individualarray[20] = $Token_no;
            $individualarray[21] = $ImageName;


            return response()->json($individualarray);

        } else if ($req === 'pendingToken') {

            $posts = DB::table('temp_table')
                ->distinct()
                ->where([
                    ['temp_reg', '=', 4],
                    ['temp_counsel', '=', 1]
                ])
                ->count(['temp_token_no']);

            return response()->json(['result' => $posts]);
        } else if ($req === 'next') {
            $count = 8;
            $next = array();
            $allToken = array();
            $tokenDistinct = array();

            $token = DB::table('temp_table')
                ->select('temp_token_no')
                ->where('temp_reg', 4)
                ->where('temp_counsel', 1)
                ->orderBy('temp_token_no')
                ->limit(8)
                ->get();

            if ($token->isEmpty()) {
                return response()->json("No Token");
            } else {

                $lastValue = $token->last()->temp_token_no;

                $lastCount = DB::table('temp_table')
                    ->where('temp_token_no', '=', $lastValue)
                    ->count();

                $addedCount = $token->where('temp_token_no', '=', $lastValue)->count();

                if ($lastCount != $addedCount) {

                    if ($lastCount > 1) {
                        $remainCount = $lastCount - $addedCount;

                        $fullCount = ($remainCount + $count);

                        if ($fullCount <= 10) {
                            $tokensAll = DB::table('temp_table')
                                ->where('temp_reg', 4)
                                ->where('temp_counsel', 1)
                                ->orderBy('temp_token_no', 'asc')
                                ->orderBy('temp_id', 'asc')
                                ->limit($fullCount)
                                ->get();


                        } else {
                            $limit = $count - $addedCount;

                            $tokensAll = DB::table('temp_table')
                                ->where('temp_reg', 4)
                                ->where('temp_counsel', 1)
                                ->orderBy('temp_token_no', 'asc')
                                ->orderBy('temp_id', 'asc')
                                ->limit($limit)
                                ->get();
                        }
                    }
                } else {
                    $tokensAll = DB::table('temp_table')
                        ->where('temp_reg', 4)
                        ->where('temp_counsel', 1)
                        ->orderBy('temp_token_no', 'asc')
                        ->orderBy('temp_id', 'asc')
                        ->limit(8)
                        ->get();
                }

                foreach ($tokensAll as $item) {
                    array_push($tokenDistinct, $item->temp_token_no);
                }

                $uniqueArray = array_unique($tokenDistinct, SORT_REGULAR);

                foreach ($uniqueArray as $uniqueToken) {

                    DB::table('temp_table')
                        ->where('temp_token_no', $uniqueToken)
                        ->update([
                            'temp_counsel' => 2,
                            'temp_counsel_counter' => Session::get('userGroup'),
                        ]);
                }

                foreach ($tokensAll as $appno) {
                    //set user image///
                    $getImage = DB::table('tbl_registration')->select('reg_photo_booth')->where('reg_app_no', $appno->temp_app_no)->count();
                    //End user Image (Anjana)//
                    $image = '';
                    if ($getImage == 0) {
                        $image = DB::table('register_applicant_details')->where('AppointmentNumber', $appno->temp_app_no)->value('PassportImgPath');
                    } else {
                        $image2 = DB::table('tbl_registration')->where('reg_app_no', $appno->temp_app_no)->value('reg_photo_booth');
                        if ($image2 != null && $image2 != '') {
                            $image = $image2;
                        }
                    }
                    $fkid = DB::table('register_applicant_details')->where('AppointmentNumber', $appno->temp_app_no)->value('FkId');
                    $next = array($appno->temp_token_no, $appno->temp_app_no, $image, $appno->temp_app_no, $fkid);
                    array_push($allToken, $next);
                }

                return response()->json($allToken);
            }


        } else if ($req === 'recallCount') {

            $usergroup = Session::get('userGroup');

            $tokenCount = DB::table('temp_table')
                ->distinct()
                ->where('temp_counsel_counter', '=', $usergroup)
                ->where('temp_reg', 4)
                ->where(function ($query) {
                    $query->where('temp_counsel', '=', 3)
                        ->orWhere('temp_counsel', '=', 2);
                })
                ->count();

            return response()->json($tokenCount);

        } else if ($req === 'recall') {

            $usergroup = Session::get('userGroup');
            $count = 8;
            $next = array();
            $allToken = array();
            $tokenDistinct = array();

            $token = DB::table('temp_table')
                ->select('temp_token_no')
                ->where('temp_counsel_counter', '=', $usergroup)
                ->where('temp_reg', 4)
                ->where(function ($query) {
                    $query->where('temp_counsel', '=', 3)
                        ->orWhere('temp_counsel', '=', 2);
                })
                ->orderBy('temp_token_no')
                ->limit(8)
                ->get();

            if ($token->isEmpty()) {
                return response()->json("No Token");
            } else {

                $lastValue = $token->last()->temp_token_no;

                $lastCount = DB::table('temp_table')
                    ->where('temp_token_no', '=', $lastValue)
                    ->count();

                $addedCount = $token->where('temp_token_no', '=', $lastValue)->count();

                if ($lastCount != $addedCount) {

                    if ($lastCount > 1) {
                        $remainCount = $lastCount - $addedCount;

                        $fullCount = ($remainCount + $count);

                        if ($fullCount <= 8) {
                            $tokensAll = DB::table('temp_table')
                                ->where('temp_counsel_counter', '=', $usergroup)
                                ->where('temp_reg', 4)
                                ->where(function ($query) {
                                    $query->where('temp_counsel', '=', 3)
                                        ->orWhere('temp_counsel', '=', 2);
                                })
                                ->orderBy('temp_token_no', 'asc')
                                ->orderBy('temp_id', 'asc')
                                ->limit($fullCount)
                                ->get();


                        } else {
                            $limit = $count - $addedCount;

                            $tokensAll = DB::table('temp_table')
                                ->where('temp_counsel_counter', '=', $usergroup)
                                ->where('temp_reg', 4)
                                ->where(function ($query) {
                                    $query->where('temp_counsel', '=', 3)
                                        ->orWhere('temp_counsel', '=', 2);
                                })
                                ->orderBy('temp_token_no', 'asc')
                                ->orderBy('temp_id', 'asc')
                                ->limit($limit)
                                ->get();
                        }
                    }
                } else {
                    $tokensAll = DB::table('temp_table')
                        ->where('temp_counsel_counter', '=', $usergroup)
                        ->where('temp_reg', 4)
                        ->where(function ($query) {
                            $query->where('temp_counsel', '=', 3)
                                ->orWhere('temp_counsel', '=', 2);
                        })
                        ->orderBy('temp_token_no', 'asc')
                        ->orderBy('temp_id', 'asc')
                        ->limit(8)
                        ->get();
                }

                foreach ($tokensAll as $item) {
                    array_push($tokenDistinct, $item->temp_token_no);
                }

                $uniqueArray = array_unique($tokenDistinct, SORT_REGULAR);

                return response()->json($uniqueArray);
            }

        } else if ($req === 'updateTabNo') {

            $app = $request->app;
            $tokenNo = $request->tokenNo;
            $tabNo = $request->tabNo;
            $GName = Session::get('userGroup');
            $nm = "";

            if ($GName == 8) {
                $nm = "C1tab";
            } else if ($GName == 9) {
                $nm = "C2tab";
            }

            $tabNo = $nm . '' . $tabNo;

            DB::table('temp_table')
                ->where('temp_app_no', $app)
                ->update(['tab_no' => $tabNo]);
            return response()->json(['result' => 'done']);

        } else if ($req === 'startCounselling') {
            $appNos = $request->arr;

            return redirect()->route('pages.CounsellingDetails', ['appNos' => $appNos]);

        } else if ($req === 'notavailable') {
            $tokenNo = $request->tokenNo;

            $updateDetails = array(
                'temp_counsel_counter' => Session::get('userGroup'),
                'temp_counsel' => 3,
                'counsellingAudio' => null
            );

            DB::table('temp_table')
                ->where('temp_token_no', $tokenNo)
                ->update($updateDetails);

            return response()->json(['result' => 'done']);

        } else if ($req === 'ok') {

            $appointmentno = $request->appno;
            $imagePathTemp = $request->imagePathTemp;

            DB::table('temp_table')
                ->where('temp_app_no', $appointmentno)
                ->update(['temp_counsel' => 5]);

            File::delete(public_path() . '/tempFileUpload/tempFingerPrint/' . $imagePathTemp);

            return response()->json(['result' => 'done']);

        } else if ($req === 'getBack') {

            $tokens = $request->token;

            foreach ($tokens as $token) {
                DB::table('temp_table')
                    ->where('temp_token_no', $token)
                    ->update([
                        'temp_counsel' => 2,
                        'temp_counsel_counter' => Session::get('userGroup'),
                    ]);
            }

            $appointmentno = DB::table('temp_table')
                ->whereIn('temp_token_no', $tokens)
                ->orderBy('temp_token_no')
                ->get();

            $next = array();
            $allToken = array();
            foreach ($appointmentno as $appno) {
//                $image = DB::table('register_applicant_details')->where('AppointmentNumber', $appno->temp_app_no)->value('PassportImgPath');
//               ====================Anjana=============================
                //set user image///
                $getImage = DB::table('tbl_registration')->select('reg_photo_booth')->where('reg_app_no', $appno->temp_app_no)->count();
                //End user Image (Anjana)//
                $image = '';
                if ($getImage == 0) {
                    $image = DB::table('register_applicant_details')->where('AppointmentNumber', $appno->temp_app_no)->value('PassportImgPath');
                } else {
                    $image2 = DB::table('tbl_registration')->where('reg_app_no', $appno->temp_app_no)->value('reg_photo_booth');
                    if ($image2 != null && $image2 != '') {
                        $image = $image2;
                    }
                }
//               ================================Anjana End=============
                $fkid = DB::table('register_applicant_details')->where('AppointmentNumber', $appno->temp_app_no)->value('FkId');
                $next = array($appno->temp_token_no, $appno->temp_app_no, $image, $appno->temp_app_no, $fkid);
                array_push($allToken, $next);
            }

            return response()->json($allToken);

        } else if ($req == 'clearCenter') {

            $appNo = $request->appNo;

            DB::table('temp_table')
                ->where('temp_app_no', $appNo)
                ->update(['temp_counsel_counter' => 0]);
            return response()->json(['Done']);

        } else if ($req == 'sos') {

            $usergroup = $request->usergroup;

            DB::table('temp_table')
                ->where('temp_counsel_counter', $usergroup)
                ->update(['temp_counsel_panic' => 1]);

            return response()->json(['result' => true]);

            //-------------------------------------
        } else if ($req == 'loadMembers') {

            $appno = $request->appno;

            $res = DB::table('register_applicant_details')
                ->where('AppointmentNumber', $appno)
                ->orderBy('AppointmentNumber', 'desc')
                ->get();

            return response()->json(['result' => $res]);

        } else if ($req == 'loadchkbx') {

            $appno = $request->appno;

            $resch = DB::table('temp_table')
                ->where([
                    ['temp_app_no', '=', $appno],
                    ['tab_status', '=', 1]
                ])->first();

            if ($resch) {
                return response()->json(['result' => true]);
            } else {
                return response()->json(['result' => false]);
            }


            //load user signature
        } else if ($req == 'loadsignature') {
            $idd = Session::get('id');

            $resch = DB::table('users')
                ->where([
                    ['id', '=', $idd],
                ])->first();

            $sign = $resch->signature;
            if ($resch) {
                return response()->json(['result' => $sign]);
            } else {
                return response()->json(['result' => false]);
            }
        } else if ($req == 'fingerPrintTempSave') {

            $appNo = $request->appNo;
            $imageData = $request->imageData;
            $objectName = $request->objectName;

            $img = str_replace('data:image/bmp;base64,', '', $imageData);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);

            $wsq_url = "FPCounselling-" . $appNo . "-" . $objectName . "-" . date("Ymd") . ".bmp";

            $path = public_path() . '/tempFileUpload/tempFingerPrint/' . $wsq_url;

            file_put_contents($path, $data);

            return response()->json(['result' => true]);

        } else if ($req == 'updateTok') {
            $appNo = $request->str;

            DB::table('temp_table')
                ->where('temp_app_no', $appNo)
                ->update(['temp_counsel_counter' => 0, 'temp_counsel' => 4, 'tab_no' => 0]);

            DB::table('audittrail')
                ->where('appno', $appNo)
                ->update(['counselling' =>  date("Y-m-d H:i:s"), 'coucou' => strval(Auth::id())]);

        } else if ($req == 'updateUnchek') {
            $appNo = $request->str;
            $CID = Auth::id();

            DB::table('temp_table')
                ->where('temp_app_no', $appNo)
                ->update(['temp_counsel_counter' => $CID, 'temp_counsel' => 2]);

        } else if ($req == 'CompletedCounseling') {
            $app_no = $request->app_no;
            DB::table('temp_table')
                ->where('temp_app_no', $app_no)
                ->update(['temp_counsel_counter' => 0, 'temp_counsel' => 4, 'tab_no' => 0]);

            DB::table('audittrail')
                ->where('appno', $app_no)
                ->update(['counselling' =>  date("Y-m-d H:i:s"), 'coucou' => strval(Auth::id())]);

        }


    }

}
