<?php


namespace App\Http\Controllers;

use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class CXRInternalController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.CXRInternal')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function CRUD(Request $request)
    {
 
        $command = $request->command;

        if ($command === 'next') {

            $userGroupId = Session::get('userGroup');
            $preToken = $request->preToken;

            $currentOrder = DB::table('change_process_order')->first();

            if ($currentOrder->type == "1") {

                $tokenno = DB::table('temp_table')
                    ->where('temp_counsel', 4)
                    ->where('temp_cxr', 1)
                    ->where('temp_payment', 4)
                    ->min('temp_token_no');

                DB::table('temp_table')
                    ->where('temp_token_no', $tokenno)
                    ->update(['temp_cxr' => 2, 'temp_cxr_counter' => $userGroupId]);

            } else if ($currentOrder->type == "2") {

                $tokenno = DB::table('temp_table')
                    ->where(function ($q) {
                        $q->where('temp_phlebotomy', 5)
                            ->orWhere('temp_phlebotomy', 4);
                    })
                    ->where('temp_cxr', 1)
                    ->where('temp_payment', 4)
                    ->min('temp_token_no');

                if ($preToken != "-" && $tokenno) {
                    DB::table('temp_table')
                        ->where('temp_token_no', $preToken)
                        ->where('temp_cxr', 4)
                        ->update(['temp_cxr_counter' => 0]);
                }

                DB::table('temp_table')
                    ->where('temp_token_no', $tokenno)
                    ->update(['temp_cxr' => 2, 'temp_cxr_counter' => $userGroupId]);
            }

            if (empty($tokenno)) {
                return response()->json("No Token");
            } else {
                return response()->json($tokenno);
            }

        } else if ($command === 'AppointmentNo') {

            $token = $request->token;

            $appointmentno = DB::table('temp_table')
                ->select('temp_app_no')
                ->where('temp_token_no', $token)
                ->orderBy('temp_id', 'asc')
                ->get();

            return response()->json($appointmentno);

        } else if ($command === 'pendingToken') {

            $currentOrder = DB::table('change_process_order')->first();

            if ($currentOrder->type == "1") {
                $posts = DB::table('temp_table')
                    ->distinct()
                    ->where([
                        ['temp_counsel', '=', 4],
                        ['temp_payment', '=', 4],
                        ['temp_cxr', '=', 1]
                    ])
                    ->count(['temp_token_no']);
            } else {
                $posts = DB::table('temp_table')
                    ->distinct()
                    ->where([
                        ['temp_payment', '=', 4],
                        ['temp_cxr', '=', 1]
                    ])
                    ->where(function ($q) {
                        $q->where('temp_phlebotomy', 5)
                            ->orWhere('temp_phlebotomy', 4);
                    })
                    ->count(['temp_token_no']);
            }

            return response()->json(['result' => $posts]);

        } else if ($command === 'pendingRecallList') {

            $userGroupId = Session::get('userGroup');

            $posts = DB::table('temp_table')
                ->distinct()
                ->where('temp_cxr_counter', '=', $userGroupId)
                ->where(function ($query) {
                    $query->where('temp_cxr', '=', 3)
                        ->orWhere('temp_cxr', '=', 2);
                })
                ->count(['temp_token_no']);

            return response()->json(['result' => $posts]);

        } else if ($command === 'data') {

            $appointment = $request->appointment;

            $appdetails = DB::table('register_applicant_details')
                ->select('PassportNumber', 'Gender', 'FirstName', 'LastName', 'DateOfBirth')
                ->where('AppointmentNumber', $appointment)
                ->get();

            $testDate = DB::table('tbl_cxr')
                ->where('cxr_app_no', $appointment)
                ->value('cxr_test_date');

            $pregnancyStatus = DB::table('register_applicant_details')
                ->where('AppointmentNumber', $appointment)
                ->value('PregnancyStatus');

            $pregnancy = '';
            if ($pregnancyStatus == 1) {
                $pregnancy = 'Yes';
            } else {
                $pregnancy = 'No';
            }

            //set user image///
            $getImage = DB::table('tbl_registration')->select('reg_photo_booth')->where('reg_app_no', $appointment)->count();

            $image = '';
            if ($getImage == 0) {
                $image = DB::table('register_applicant_details')->where('AppointmentNumber', $appointment)->value('PassportImgPath');
            } else {
                $image2 = DB::table('tbl_registration')->where('reg_app_no', $appointment)->value('reg_photo_booth');
                if ($image2 != null && $image2 != '') {
                    $image = $image2;
                }
            }

            foreach ($appdetails as $appnodetails) {

                $fullname = $appnodetails->FirstName . " " . $appnodetails->LastName;
                $arrappdetails[0] = $appointment;
                $arrappdetails[1] = $appnodetails->PassportNumber;
                $arrappdetails[2] = $appnodetails->Gender;
                $arrappdetails[3] = $fullname;
                $arrappdetails[4] = $appnodetails->DateOfBirth;
                $arrappdetails[5] = $image;
                $arrappdetails[6] = $testDate;
                $arrappdetails[7] = $pregnancy;
            }

            return response()->json($arrappdetails);

        } else if ($command === 'notAvailable') {

            $token = $request->token;
            $usergroup = $request->usergroup;

            $updateDetails = array(
                'temp_cxr_counter' => $usergroup,
                'temp_cxr' => 3,
                'cxrAudio' => null
            );

            DB::table('temp_table')
                ->where('temp_token_no', $token)
                ->update($updateDetails);

            return response()->json('Done');

        } else if ($command === 'NoShow') {

            $userGroupId = Session::get('userGroup');

            $appdetails = DB::table('temp_table')
                ->select('temp_token_no')
                ->distinct('temp_token_no')
                ->where('temp_cxr_counter', $userGroupId)
                ->where(function ($query) {
                    $query->where('temp_cxr', '=', 3)
                        ->orWhere('temp_cxr', '=', 2);
                })->get();

            return response()->json($appdetails);

        } else if ($command === 'save') {

            $appointmentno = $request->appointment;
            $passportno = $request->passport;
            $tokensave = $request->cxr_token_no;
            $imagePathTemp = $request->imagePathTemp;

            DB::table('tbl_cxr')->where('cxr_app_no', $appointmentno)->delete();

            DB::table('tbl_cxr')->insert([
                [
                    'cxr_passp_no' => $passportno,
                    'cxr_app_no' => $appointmentno,
                    'cxr_preg' => $request->cxr_preg,
                    'cxr_test_date' => $request->cxr_test_date,
                    'cxr_lmp_date' => $request->cxr_lmp_date,
                    'cxr_result' => $request->cxr_result,
                    'cxr_preg_test_off' => $request->cxr_preg_test_off,
                    'cxr_counsel' => $request->cxr_counsel,
                    'cxr_done' => $request->cxr_done,
                    'cxr_not_done' => $request->cxr_not_done,
                    'cxr_def' => $request->cxr_def,
                    'cxr_preg_sc' => $request->cxr_preg_sc,
                    'cxr_app_dec' => $request->cxr_app_dec,
                    'cxr_no_show' => $request->cxr_no_show,
                    'cxr_child' => $request->cxr_child,
                    'cxr_unbl_unwill_sc' => $request->cxr_unbl_unwill_sc,
                    'cxr_done_plv_shld' => $request->cxr_done_plv_shld,
                    'cxr_done_dbl_abd_shield' => $request->cxr_done_dbl_abd_shield,
                    'cxr_done_other' => $request->cxr_done_other,
                    'done_other_text' => $request->done_other_text,
                    'cxr_not_done_others' => $request->cxr_not_done_other,
                    'not_done_other_text' => $request->not_done_other_text,
                    'cxr_radiology' => '0'
                ]
            ]);

            $cxr = $request->cxr_not_done;

            if ($cxr == "true") {
                DB::table('temp_table')
                    ->where('temp_app_no', '=', $appointmentno)
                    ->update(['temp_radiology' => 4, 'temp_radiology_counter' => 0]);
            }

            DB::table('temp_table')
                ->where('temp_app_no', '=', $appointmentno)
                ->update(['temp_cxr' => 4]);

            DB::table('audittrail')
                ->where('appno', $appointmentno)
                ->update(['cxr' => date("Y-m-d H:i:s"), 'cxrcou' => strval(Auth::id())]);

            DB::table('temp_table')
                ->where('temp_cxr', 4)
                ->update(['temp_cxr_counter' => 0]);

            File::delete(public_path() . '/tempFileUpload/tempFingerPrint/' . $imagePathTemp);

            return response()->json(['Done']);

        } else if ($command == 'saveAgain') {
            $Cby = Auth::id();
            $cdate = date('Y-m-d h:i:sa');

            $appointmentno = $request->appointment;
            $passportno = $request->passport;
            $appsave = $request->cxr_app_no;
            $imagePathTemp = $request->imagePathTemp;

            DB::table('tbl_cxr')
                ->where('cxr_app_no', '=', $appointmentno)
                ->update([
                    'cxr_passp_no' => $passportno,
                    'cxr_app_no' => $appointmentno,
                    'cxr_preg' => $request->cxr_preg,
                    'cxr_test_date' => $request->cxr_test_date,
                    'cxr_lmp_date' => $request->cxr_lmp_date,
                    'cxr_result' => $request->cxr_result,
                    'cxr_preg_test_off' => $request->cxr_preg_test_off,
                    'cxr_counsel' => $request->cxr_counsel,
                    'cxr_done' => $request->cxr_done,
                    'cxr_not_done' => $request->cxr_not_done,
                    'cxr_def' => $request->cxr_def,
                    'cxr_preg_sc' => $request->cxr_preg_sc,
                    'cxr_app_dec' => $request->cxr_app_dec,
                    'cxr_no_show' => $request->cxr_no_show,
                    'cxr_child' => $request->cxr_child,
                    'cxr_unbl_unwill_sc' => $request->cxr_unbl_unwill_sc,
                    'cxr_done_plv_shld' => $request->cxr_done_plv_shld,
                    'cxr_done_dbl_abd_shield' => $request->cxr_done_dbl_abd_shield,
                    'cxr_done_other' => $request->cxr_done_other,
                    'done_other_text' => $request->done_other_text,
                    'cxr_not_done_others' => $request->cxr_not_done_other,
                    'not_done_other_text' => $request->not_done_other_text,
                    'cxr_radiology' => '0',
                    'cxr_extra_view' => 'done'
                ]);

//            DB::table('tbl_cxr')->insert([
//                [
//                    'cxr_passp_no' => $passportno,
//                    'cxr_app_no' => $appointmentno,
//                    'cxr_preg' => $request->cxr_preg,
//                    'cxr_test_date' => $request->cxr_test_date,
//                    'cxr_lmp_date' => $request->cxr_lmp_date,
//                    'cxr_result' => $request->cxr_result,
//                    'cxr_preg_test_off' => $request->cxr_preg_test_off,
//                    'cxr_counsel' => $request->cxr_counsel,
//                    'cxr_done' => $request->cxr_done,
//                    'cxr_not_done' => $request->cxr_not_done,
//                    'cxr_def' => $request->cxr_def,
//                    'cxr_preg_sc' => $request->cxr_preg_sc,
//                    'cxr_app_dec' => $request->cxr_app_dec,
//                    'cxr_no_show' => $request->cxr_no_show,
//                    'cxr_child' => $request->cxr_child,
//                    'cxr_unbl_unwill_sc' => $request->cxr_unbl_unwill_sc,
//                    'cxr_done_plv_shld' => $request->cxr_done_plv_shld,
//                    'cxr_done_dbl_abd_shield' => $request->cxr_done_dbl_abd_shield,
//                    'cxr_done_other' => $request->cxr_done_other,
//                    'done_other_text' => $request->done_other_text,
//                    'cxr_not_done_others' => $request->cxr_not_done_other,
//                    'not_done_other_text' => $request->not_done_other_text,
//                    'cxr_radiology' => '0',
//                    'cxr_extra_view' => 'done'
//                ]
//            ]);


            DB::table('tbl_extra_view')->insert([
                ['app_no' => $appointmentno,
                    'cby' => $Cby,
                    'cdate' => $cdate,
                ]
            ]);

            DB::table('temp_table')
                ->where('temp_app_no', '=', $appsave)
                ->update(['rad_rep_status' => 2]);

            File::delete(public_path() . '/tempFileUpload/tempFingerPrint/' . $imagePathTemp);

            return response()->json(['Done']);

        } else if ($command === 'CreateBC') {

            $reqArray = $request->barcode;

            $tableArrayData[] = array();
            $arrayData = json_decode($reqArray);
            $tableArrayData = $arrayData;

            $BCappno = "";
            $BCnam = "";
            $BCage = "";
            $BCgen = "";
            $BCdob = "";

            foreach ($tableArrayData as $data) {
                $apno = $data[0];
                $gn = $data[1];
                $fn = $data[2];
                $ag = $data[3];
                $dob = $data[4];


                $barcode = new BarcodeGenerator();
                $barcode->setText($apno);
                $barcode->setType(BarcodeGenerator::Code128);
                $barcode->setScale(2);
                $barcode->setThickness(25);
                $barcode->setFontSize(10);
                $BCappno = $barcode->generate();

                $barcode = new BarcodeGenerator();
                $barcode->setText($gn);
                $barcode->setType(BarcodeGenerator::Code128);
                $barcode->setScale(2);
                $barcode->setThickness(25);
                $barcode->setFontSize(10);
                $BCgen = $barcode->generate();

                $barcode = new BarcodeGenerator();
                $barcode->setText($fn);
                $barcode->setType(BarcodeGenerator::Code128);
                $barcode->setScale(2);
                $barcode->setThickness(25);
                $barcode->setFontSize(10);
                $BCnam = $barcode->generate();

                $barcode = new BarcodeGenerator();
                $barcode->setText($ag);
                $barcode->setType(BarcodeGenerator::Code128);
                $barcode->setScale(2);
                $barcode->setThickness(25);
                $barcode->setFontSize(10);
                $BCage = $barcode->generate();

                $barcode = new BarcodeGenerator();
                $barcode->setText($dob);
                $barcode->setType(BarcodeGenerator::Code128);
                $barcode->setScale(2);
                $barcode->setThickness(25);
                $barcode->setFontSize(10);
                $BCdob = $barcode->generate();
            }

            return response()->json(['Appno' => $BCappno, 'Name' => $BCnam, 'Age' => $BCage, 'Gender' => $BCgen, 'DOB' => $BCdob]);

        } else if ($command == 'extraViewLoad') {

//            $userGroupId = Session::get('userGroup');

            $tokenno = DB::table('temp_table')
                ->leftJoin('register_applicant_details', function ($join) {
                    $join->on('temp_table.temp_app_no', '=', 'register_applicant_details.AppointmentNumber');
                })
                ->leftJoin('tbl_radiologists_reporting', function ($join) {
                    $join->on('tbl_radiologists_reporting.rr_app_no', '=', 'temp_table.temp_app_no');
                })
//                ->where('temp_cxr_counter', '=', $userGroupId)
                ->where('rad_rep_status', '=', 1)
                ->where('temp_cxr', 4)
                ->get();


            $tokenno11 = DB::table('temp_table')
                ->leftJoin('register_applicant_details', function ($join) {
                    $join->on('temp_table.temp_app_no', '=', 'register_applicant_details.AppointmentNumber');
                })
                ->leftJoin('tbl_radiologists_reporting', function ($join) {
                    $join->on('tbl_radiologists_reporting.rr_app_no', '=', 'temp_table.temp_app_no');
                })
//                ->where('temp_cxr_counter', '=', $userGroupId)
                ->where('rad_rep_status', '=', 2)
                ->where('temp_cxr', 4)
                ->get();

            $rr = $tokenno->merge($tokenno11);

            return response()->json(['result' => $rr]);

        } else if ($command == 'fingerPrintTempSave') {

            $appNo = $request->appNo;
            $imageData = $request->imageData;
            $objectName = $request->objectName;

            $img = str_replace('data:image/bmp;base64,', '', $imageData);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);

            $wsq_url = "FPCXR-" . $appNo . "-" . $objectName . "-" . date("Ymd") . ".bmp";

            $path = public_path() . '/tempFileUpload/tempFingerPrint/' . $wsq_url;

            file_put_contents($path, $data);

            return response()->json(['result' => true]);

        } else if ($command === 'CheckAppointmentAvailable') {

            $appNo = $request->appNo;

            $count = DB::table('tbl_cxr')->where('cxr_app_no', '=', $appNo)->count();

            $res = true;
            if ($count == 0) {
                $res = false;
            }

            return response()->json(['result' => $res]);

//----------------
        } else if ($command === 'CXRExtraList') {

            $AllList = DB::table('temp_table')
                ->leftJoin('register_applicant_details', function ($join) {
                    $join->on('temp_table.temp_app_no', '=', 'register_applicant_details.AppointmentNumber');
                })
                ->leftJoin('tbl_radiologists_reporting', function ($join) {
                    $join->on('tbl_radiologists_reporting.rr_app_no', '=', 'temp_table.temp_app_no');
                })
                ->leftJoin('tbl_cxr', function ($join) {
                    $join->on('tbl_cxr.cxr_app_no', '=', 'tbl_radiologists_reporting.rr_app_no');
                })
                ->where('temp_cxr', 4)
//                ->whereNotNull('rad_rep_status')
                ->orderBy('temp_token_no', 'asc')
                ->get();


            return response()->json(['result' => $AllList]);

        }
    }
}
