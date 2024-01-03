<?php

namespace App\Http\Controllers;

use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class PhlebotomySampleCollectionController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.PhlebotomySampleCollection')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);;
    }

    public function CRUD(Request $request)
    {
        $command = $request->command;

        if ($command === 'next') {

            $currentOrder = DB::table('change_process_order')->first();
            $preToken = $request->preToken;

            $tokenno = "";
            $userGroupId = Session::get('userGroup');

            if ($currentOrder->type == "1") {

                $tokenno = DB::table('temp_table')
                    ->where('temp_cxr', 4)
                    ->Where('temp_phlebotomy', '=', 1)
                    ->where('temp_payment', 4)
                    ->orderBy('temp_token_no', 'asc')
                    ->min('temp_token_no');
            } else if ($currentOrder->type == "2") {

                $tokenno = DB::table('temp_table')
                    ->where('temp_counsel', 4)
                    ->where('temp_payment', 4)
                    ->Where('temp_phlebotomy', '=', 1)
                    ->orderBy('temp_token_no', 'asc')
                    ->min('temp_token_no');
            }

            DB::table('temp_table')
                ->where('temp_token_no', $tokenno)
                ->update(['temp_phlebotomy' => 2, 'temp_phlebotomy_counter' => $userGroupId]);

            if (empty($tokenno)) {
                return response()->json("No Token");
            } else {
                return response()->json($tokenno);
            }
        } else if ($command === 'AppointmentNo') {
            $token = $request->token;
            $array = array();
            $key = 0;
            $appointmentno = DB::table('temp_table')
                ->select('temp_app_no')
                ->where('temp_token_no', $token)
                ->get();
            foreach ($appointmentno as $valsappno) {
                $array[$key] = $valsappno->temp_app_no;
                $key++;
            }
            return response()->json($array);
        } else if ($command === 'data') {

            $appointment = $request->appointment;
            $arrappdetails = array();
            $passport = DB::table('register_applicant_details')
                ->where('AppointmentNumber', $appointment)
                ->value('PassportNumber');

            $todaydate = date('Y-m-d');
            $todayTime = date("h:i:sa");

            $userDob = DB::table('register_applicant_details')
                ->where('AppointmentNumber', $appointment)
                ->value('DateOfBirth');

            $gender = DB::table('register_applicant_details')
                ->where('AppointmentNumber', $appointment)
                ->value('Gender');

            $count = DB::table('tbl_consultation_main')
                ->where('cm_app_no', $appointment)
                ->count();

            //$userDob = '1987-04-02';
            $dob = new DateTime($userDob);
            $now = new DateTime();


            $difference = $now->diff($dob);
            $age = $difference->y;
            if ($age == 0) {
                $now = date_format($now, "Y-m-d");
                $age = (int)abs((strtotime($userDob) - strtotime($now)) / (60 * 60 * 24 * 30));
                $age = $age . " Months";
            }

            //               ====================Anjana=============================
            //set user image///
            $getImage = DB::table('tbl_registration')->select('reg_photo_booth')->where('reg_app_no', $appointment)->count();
            //End user Image (Anjana)//
            $image = '';
            if ($getImage == 0) {
                $image = DB::table('register_applicant_details')->where('AppointmentNumber', $appointment)->value('PassportImgPath');
            } else {
                $image2 = DB::table('tbl_registration')->where('reg_app_no', $appointment)->value('reg_photo_booth');
                if ($image2 != null && $image2 != '') {
                    $image = $image2;
                }
            }
            //               ================================Anjana End=============

            $arrappdetails[0] = $appointment;
            $arrappdetails[1] = $passport;
            $arrappdetails[2] = $age;
            $arrappdetails[3] = $todaydate;
            $arrappdetails[4] = $todayTime;
            $arrappdetails[5] = $image;
            $arrappdetails[6] = $gender;
            $arrappdetails[7] = $count;

            return response()->json($arrappdetails);
        } else if ($command === 'save') {

            $appointmentno = $request->appno;
            $passportno = $request->ps_passp_no;
            $imagePathTemp = $request->imagePathTemp;

            $tokensave = DB::table('temp_table')
                ->where('temp_app_no', $appointmentno)
                ->value('temp_token_no');

            $todaydate = date('Y-m-d');
            $todayTime = date("h:i:sa");
            DB::table('tbl_phlebotomy_sample')->insert([
                [
                    'ps_passp_no' => $passportno,
                    'ps_app_no' => $appointmentno,
                    'ps_hiv_elisa' => $request->ps_hiv_elisa,
                    'ps_hiv_no_copies' => $request->ps_hiv_no_copies,
                    'ps_hiv_test_kit' => $request->ps_hiv_test_kit,
                    'ps_malaria' => $request->ps_malaria,
                    'ps_malaria_no_copies' => $request->ps_malaria_no_copies,
                    'ps_malaria_test_kit' => $request->ps_malaria_test_kit,
                    'ps_filaria' => $request->ps_filaria,
                    'ps_filaria_no_copies' => $request->ps_filaria_no_copies,
                    'ps_filaria_test_kit' => $request->ps_filaria_test_kit,
                    'ps_shcg' => $request->ps_shcg,
                    'ps_shcg_no_copies' => $request->ps_shcg_no_copies,
                    'ps_shcg_test_kit' => $request->ps_shcg_test_kit,
                    'ps_hiv_barcode' => $request->barcode_hiv,
                    'ps_malaria_barcode' => $request->barcode_mal,
                    'ps_filaria_barcode' => $request->barcode_fil,
                    'ps_shcg_barcode' => $request->barcode_shcg,
                    'ps_sample_col_1' => $todaydate,
                    'ps_sample_col_2' => $todayTime,
                    'hiv_status' => "Active",
                    'malaria_status' => "Active",
                    'filaria_status' => "Active",
                    'shcg_status' => "Active"
                ]
            ]);

            DB::table('temp_table')
                ->where('temp_app_no', $appointmentno)
                ->update(['temp_phlebotomy' => 5]);

            DB::table('audittrail')
                ->where('appno', $appointmentno)
                ->update(['phlbotomy' => date("Y-m-d H:i:s"), 'phlcou' => strval(Auth::id())]);

            DB::table('temp_table')
                ->where('temp_phlebotomy', 4)
                ->update(['temp_phlebotomy_counter' => 0]);

            File::delete(public_path() . '/tempFileUpload/tempFingerPrint/' . $imagePathTemp);

            return response()->json(['Done']);
        } else if ($command === 'barcodeprint') {

            $barcod = $request->barcod;
            $barcode = new BarcodeGenerator();
            $barcode->setText($barcod);
            $barcode->setType(BarcodeGenerator::Code128);
            $barcode->setScale(1.2);
            $barcode->setThickness(22);
            $barcode->setFontSize(14);
            $code = $barcode->generate();

            $appnum = $request->appnum;

            if ($appnum == '' || $appnum == null) {
                $Appno = DB::table('tbl_phlebotomy_sample')
                    ->select('ps_app_no')
                    ->where(function ($query) use ($barcod) {
                        $query->where('ps_hiv_barcode', '=', $barcod)
                            ->orWhere('ps_filaria_barcode', '=', $barcod)
                            ->orWhere('ps_shcg_barcode', '=', $barcod)
                            ->orWhere('ps_malaria_barcode', '=', $barcod);
                    })
                    ->first();
                $ps_app_no = $Appno->ps_app_no;
            } else {
                $ps_app_no = $appnum;
            }

            $details = DB::table('register_applicant_details')
                ->select('DateOfBirth', 'Gender')
                ->where('AppointmentNumber', $ps_app_no)
                ->first();

            $r2 = $details->Gender;
            $r3 = $details->DateOfBirth;

            return response()->json(['r1' => $code, 'r2' => $r2, 'r3' => $r3]);
        } else if ($command === 'pendingToken') {

            $currentOrder = DB::table('change_process_order')->first();

            if ($currentOrder->type == "1") {
                $posts = DB::table('temp_table')
                    ->distinct()
                    ->where([
                        ['temp_cxr', '=', 4],
                        ['temp_payment', '=', 4],
                        ['temp_phlebotomy', '=', 1]
                    ])
                    ->count(['temp_token_no']);
            } else if ($currentOrder->type == "2") {
                $posts = DB::table('temp_table')
                    ->distinct()
                    ->where([
                        ['temp_counsel', '=', 4],
                        ['temp_payment', '=', 4],
                        ['temp_phlebotomy', '=', 1]
                    ])
                    ->count(['temp_token_no']);
            }

            return response()->json(['result' => $posts]);
        } else if ($command === 'recallCount') {

            $usergroup = Session::get('userGroup');

            $posts = DB::table('temp_table')
                ->distinct()
                ->where('temp_phlebotomy_counter', '=', $usergroup)
                ->where(function ($query) {
                    $query->where('temp_phlebotomy', '=', 3)
                        ->orWhere('temp_phlebotomy', '=', 2);
                })
                ->count(['temp_token_no']);

            return response()->json(['result' => $posts]);
        } else if ($command === 'notAvailable') {

            $token = $request->token;

            DB::table('temp_table')
                ->where('temp_token_no', $token)
                ->update(['temp_phlebotomy' => 3, 'phlebotomyAudio' => null]);

            return response()->json('Done');
        } else if ($command === 'NoShow') {
            $usergroup = Session::get('userGroup');

            $notavailabletokens = array();
            $appdetails = DB::table('temp_table')
                ->select('temp_token_no')
                ->where('temp_phlebotomy_counter', '=', $usergroup)
                ->where(function ($query) {
                    $query->where('temp_phlebotomy', '=', 3)
                        ->orWhere('temp_phlebotomy', '=', 2);
                })
                ->get();
            foreach ($appdetails as $na) {
                array_push($notavailabletokens, $na->temp_token_no);
            }
            $tokens = array_unique($notavailabletokens);

            return response()->json($tokens);
        } else if ($command === 'AppointmentNo') {
            $token = $request->token;
            $array = array();
            $key = 0;
            $appointmentno = DB::table('temp_table')
                ->select('temp_app_no')
                ->where('temp_token_no', $token)
                ->get();
            foreach ($appointmentno as $valsappno) {
                $array[$key] = $valsappno->temp_app_no;
                $key++;
            }
            return response()->json($array);
        } else if ($command == 'fingerPrintTempSave') {

            $appNo = $request->appNo;
            $imageData = $request->imageData;
            $objectName = $request->objectName;

            $img = str_replace('data:image/bmp;base64,', '', $imageData);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);

            $wsq_url = "FPPhl-" . $appNo . "-" . $objectName . "-" . date("Ymd") . ".bmp";

            $path = public_path() . '/tempFileUpload/tempFingerPrint/' . $wsq_url;

            file_put_contents($path, $data);

            return response()->json(['result' => true]);
        } else if ($command == 'GenerateBCNO') {

            $BC = "";
            $tokenNo = $request->tokenNo;
            $currentDate = date('Y-m-d');
            $todaydate = date('ymd');

            $result = DB::table('tbl_phlebotomy_sample')
                ->whereDate('ps_sample_col_1', $currentDate)
                ->count('ps_id');

            $tokenPad = str_pad($tokenNo, 3, "0", STR_PAD_LEFT);

            $ind = 001;
            if ($result == 0) {

                $LastIndex = str_pad(1, 3, "0", STR_PAD_LEFT);
                $BC = $todaydate . '' . $tokenPad . '' . $LastIndex;
            } else {

                $ind = str_pad(((int)$result + 1), 3, "0", STR_PAD_LEFT);
                $BC = $todaydate . '' . $tokenPad . '' . $ind;
            }

            return response()->json(['result' => $BC, 'token' => $tokenPad, 'index' => $ind]);
        }
    }

    public function Search(Request $request)
    {

        $function = $request->function;

        if ($function == 'search') {

            $passportNo = $request->passportNo;
            $appointmentNo = $request->appointmentNo;
            $barcode = $request->barcode;

            if ($barcode != null) {
                $details = DB::table('tbl_phlebotomy_sample')
                    ->where(function ($query) use ($barcode) {
                        $query->where('ps_hiv_barcode', '=', $barcode)
                            ->orWhere('ps_filaria_barcode', '=', $barcode)
                            ->orWhere('ps_shcg_barcode', '=', $barcode)
                            ->orWhere('ps_malaria_barcode', '=', $barcode);
                    })
                    ->orWhere('ps_app_no', '=', $appointmentNo)
                    ->orWhere('ps_passp_no', '=', $passportNo)
                    ->get();
            } else {
                $details = DB::table('tbl_phlebotomy_sample')
                    ->orWhere('ps_app_no', '=', $appointmentNo)
                    ->orWhere('ps_passp_no', '=', $passportNo)
                    ->get();
            }

            return response()->json(['result' => $details]);
        }
    }
}
