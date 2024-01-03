<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use PDF;

class ConsultationController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.Consultation')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function ConsultationLoadCurrentTokenNo(Request $request)
    {
        $tokNo = $request->tokNo;

        $tokFullCount = DB::table('temp_table')
            ->where('temp_token_no', $tokNo)
            ->count();

        $Count = DB::table('temp_table')
            ->where([
                ['temp_token_no', $tokNo],
                ['temp_consult', 4]
            ])->count();

        if ($tokFullCount == $Count) {
            return response()->json(false);
        } else {
            return response()->json(true);
        }
    }

    public function ConsultationCallNext(Request $request)
    {
        $userGroupId = Session::get('userGroup');

        $preToken = $request->preToken;

        $currentOrder = DB::table('change_process_order')->first();
        $tokenno = "";
        $date = date('Y-m-d');

        $radiologyVali = DB::table('master_settings')->where('effectivedate', '<=', $date)->orderBy('effectivedate', 'desc')->first();

        if ($currentOrder->type == "1") {

            if ($radiologyVali->radiologyValidation) {

                $tokenno = DB::table('temp_table')
                    ->where('temp_phlebotomy', 4)
                    ->where('temp_radiology', 4)
                    ->where('temp_consult', 1)
                    ->min('temp_token_no');
            } else {

                $tokenno = DB::table('temp_table')
                    ->where('temp_phlebotomy', 4)
                    ->where('temp_consult', 1)
                    ->min('temp_token_no');
            }
        } else if ($currentOrder->type == "2") {

            if ($radiologyVali->radiologyValidation) {

                $tokenno = DB::table('temp_table')
                    ->where('temp_cxr', 4)
                    ->where('temp_radiology', 4)
                    ->where('temp_phlebotomy', 4)
                    ->where('temp_consult', 1)
                    ->min('temp_token_no');
            } else {

                $tokenno = DB::table('temp_table')
                    ->where('temp_cxr', 4)
                    ->where('temp_phlebotomy', 4)
                    ->where('temp_consult', 1)
                    ->min('temp_token_no');
            }
        }

        DB::table('temp_table')
            ->where('temp_token_no', $tokenno)
            ->update(['temp_consult' => 2, 'temp_consult_counter' => $userGroupId]);

        if (empty($tokenno)) {
            return response()->json("No Token");
        } else {
            return response()->json($tokenno);
        }
    }

    public function ConsultationLoadAppointmentNo(Request $request)
    {
        $token = $request->token;
        $userGroupId = Session::get('userGroup');
        $array = array();
        $key = 0;

        DB::table('temp_table')
            ->where('temp_token_no', $token)
            ->update(['temp_consult' => 2, 'temp_consult_counter' => $userGroupId]);

        $appointmentno = DB::table('temp_table')
            ->select('temp_app_no')
            ->where('temp_token_no', $token)
            ->get();

        foreach ($appointmentno as $valsappno) {
            $array[$key] = $valsappno->temp_app_no;
            $key++;
        }

        return response()->json($array);
    }

    public function ConsultationLoadFormData(Request $request)
    {
        $appointment = $request->appointment;
        $arrappdetails = array();

        $registrationno = DB::table('tbl_registration')
            ->where('reg_app_no', $appointment)
            ->value('registration_id');

        $appdetails = DB::table('register_applicant_details')
            ->select('FirstName', 'LastName', 'PassportNumber', 'PreviousPassportIfAny', 'DateOfBirth', 'CountryOfBirth')
            ->where('AppointmentNumber', $appointment)
            ->get();

        $tokenfkid = DB::table('register_applicant_details')
            ->where('AppointmentNumber', $appointment)
            ->value('FkId');

        $appaddressdetails = DB::table('register_applicants')->select(
            'CdAddress',
            'CdStree',
            'CdCity',
            'CdStateProvince',
            'CdPostalCode',
            'CdCountry',
            'CdTelephoneFixedLine',
            'CdMobile',
            'SlAddress',
            'SlStreet',
            'SlCity',
            'SlStateProvince',
            'SlPostalCode',
            'SlTelephoneFixedLine',
            'SlMobile',
            'PreferredContactMethod',
            'DateOfArrival',
            'SponsorName',
            'SponsorTelephoneFixedLine',
            'SponsorEmailAddress',
            'SponsorMobile'
        )->where('id', $tokenfkid)
            ->get();

        $appointmentdate = DB::table('register_applicants')
            ->where('id', $tokenfkid)
            ->value('AppointmentDate');

        $radiologistdetails = DB::table('tbl_radiologists_reporting')
            ->where('rr_app_no', $appointment)
            ->get();

        $photoBooth = DB::table('tbl_registration')
            ->where('reg_app_no', $appointment)
            ->value('reg_photo_booth');

        $arrappdetails[30] = $appointment;
        $arrappdetails[0] = $registrationno;
        $arrappdetails[2] = $appointmentdate;
        foreach ($appdetails as $appnodetails) {
            $arrappdetails[1] = $appnodetails->FirstName;
            $arrappdetails[31] = $appnodetails->LastName;
            $arrappdetails[4] = $appnodetails->PassportNumber;
            $arrappdetails[5] = $appnodetails->PreviousPassportIfAny;
            $arrappdetails[8] = 'ethinicityexample';
            $arrappdetails[6] = $appnodetails->DateOfBirth;
            $arrappdetails[14] = $appnodetails->CountryOfBirth;
        }
        ;

        foreach ($appaddressdetails as $appointmentaddressdetails) {
            $arrappdetails[9] = $appointmentaddressdetails->CdAddress;
            $arrappdetails[10] = $appointmentaddressdetails->CdStree;
            $arrappdetails[11] = $appointmentaddressdetails->CdCity;
            $arrappdetails[12] = $appointmentaddressdetails->CdStateProvince;
            $arrappdetails[13] = $appointmentaddressdetails->CdPostalCode;

            $arrappdetails[15] = $appointmentaddressdetails->CdTelephoneFixedLine;
            $arrappdetails[16] = $appointmentaddressdetails->CdMobile;
            $arrappdetails[17] = $appointmentaddressdetails->SlAddress;
            $arrappdetails[18] = $appointmentaddressdetails->SlStreet;
            $arrappdetails[19] = $appointmentaddressdetails->SlCity;
            $arrappdetails[20] = $appointmentaddressdetails->SlStateProvince;
            $arrappdetails[21] = $appointmentaddressdetails->SlPostalCode;
            $arrappdetails[22] = 'SriLanka';
            $arrappdetails[23] = $appointmentaddressdetails->SlTelephoneFixedLine;
            $arrappdetails[24] = $appointmentaddressdetails->SlMobile;
            $arrappdetails[25] = $appointmentaddressdetails->PreferredContactMethod;
            $arrappdetails[26] = $appointmentaddressdetails->SponsorName;
            $arrappdetails[27] = $appointmentaddressdetails->SponsorTelephoneFixedLine;
            $arrappdetails[28] = $appointmentaddressdetails->SponsorEmailAddress;
            $arrappdetails[29] = $appointmentaddressdetails->SponsorMobile;
            $arrappdetails[56] = $appointmentaddressdetails->DateOfArrival;
        }
        ;

        foreach ($radiologistdetails as $radiologistsdetails) {
            $arrappdetails[32] = $radiologistsdetails->rr_single_fibrous_streak;
            $arrappdetails[33] = $radiologistsdetails->rr_bony_islets;
            $arrappdetails[34] = $radiologistsdetails->rr_pleural_capping;
            $arrappdetails[35] = $radiologistsdetails->rr_unilateral_bilateral;
            $arrappdetails[36] = $radiologistsdetails->rr_calcified_nodule;
            $arrappdetails[37] = $radiologistsdetails->rr_solitary_granuloma_hilum;
            $arrappdetails[38] = $radiologistsdetails->rr_solitary_granuloma_enlarged;
            $arrappdetails[39] = $radiologistsdetails->rr_single_multi_calc_pulmonary;
            $arrappdetails[40] = $radiologistsdetails->rr_calcified_pleural_lesions;
            $arrappdetails[41] = $radiologistsdetails->rr_costophrenic_angle;
            $arrappdetails[42] = $radiologistsdetails->rr_notable_apical;
            $arrappdetails[43] = $radiologistsdetails->rr_aplcal_fbronodualar;
            $arrappdetails[44] = $radiologistsdetails->rr_multi_single_pulmonary_nodu_micronodules;
            $arrappdetails[45] = $radiologistsdetails->rr_isolated_hilar;
            $arrappdetails[46] = $radiologistsdetails->rr_multi_single_pulmonary_nodu_masses;
            $arrappdetails[47] = $radiologistsdetails->rr_non_calcified_pleural_fibrosos;
            $arrappdetails[48] = $radiologistsdetails->rr_interstltial_fbrosos;
            $arrappdetails[49] = $radiologistsdetails->rr_any_cavitating_lesion;
            $arrappdetails[50] = $radiologistsdetails->rr_skeleton_soft_issue;
            $arrappdetails[51] = $radiologistsdetails->rr_cardiac_major_vessels;
            $arrappdetails[52] = $radiologistsdetails->rr_lung_fields;
            $arrappdetails[53] = $radiologistsdetails->rr_other;
            $arrappdetails[55] = $radiologistsdetails->rr_comment2;
        }
        ;

        $arrappdetails[54] = $photoBooth;

        return response()->json($arrappdetails);
    }

    public function ConsultationLoadTestResults(Request $request)
    {
        $appointment = $request->appointment;

        $rowCountConfirmatory = DB::table('tbl_confirmatorytestresults')
            ->select('ctr_appno')
            ->where('ctr_appno', $appointment)
            ->count();

        if ($rowCountConfirmatory == 0) {

            $res = DB::table('tbl_phlrapidtestresults')
                ->where('prtr_appno', $appointment)
                ->where('prtr_test', '!=', 'HIV')
                ->get();

            $res2 = DB::table('tbl_phlrapidtestresults')
                ->where('prtr_appno', '=', $appointment)
                ->where('prtr_test', '=', 'HIV')
                ->where('prtr_result', '!=', null)
                ->orderBy('prtr_id', 'desc')->take(1)
                ->get();
        } else {

            $res = DB::table('tbl_confirmatorytestresults')
                ->select('ctr_result as prtr_result', 'ctr_id as prtr_id', 'ctr_test as prtr_test', 'ctr_comment as prtr_comment')
                ->where('ctr_appno', $appointment)
                ->get();

            $res2 = null;
        }

        return response()->json(['result' => $res, 'result2' => $res2]);
    }

    public function ConsultationLoadChkbox(Request $request)
    {
        $AppNo = $request->AppNo;

        $result = DB::table('tbl_radiologists_reporting')
            ->where('rr_app_no', $AppNo)
            ->get();

        $result2 = DB::table('tbl_consultation_main')
            ->where('cm_app_no', $AppNo)
            ->get();

        return response()->json(['result' => $result, 'result2' => $result2]);
    }

    public function CRUD(Request $request)
    {
        $command = $request->command;

        if ($command === 'notAvailable') {

            $token = $request->token;

            $userGroupId = Session::get('userGroup');

            $updateDetails = array(
                'temp_consult_counter' => 0,
                'temp_consult' => 3,
                'consultationAudio' => null
            );

            DB::table('temp_table')
                ->where('temp_token_no', $token)
                ->update($updateDetails);

            return response()->json('Done');
        } else if ($command === 'tempData') {

            $notavailabletokens = array();
            $userGroupId = Session::get('userGroup');


            $appdetails = DB::table('temp_table')
                //                ->leftJoin('temp_table', 'temp_table.temp_app_no', '=', 'tbl_consultation_main.cm_app_no')
                ->select('temp_token_no')
                ->distinct('temp_token_no')
                ->where('temp_consult', '=', 5)
                ->get();
            //            ------------------------------------------------


            foreach ($appdetails as $na) {
                array_push($notavailabletokens, $na->temp_token_no);
            }

            $tokens = array_unique($notavailabletokens);

            return response()->json($tokens);
        } else if ($command === "tempDataHistory") {
            $date = $request->date;
            $notavailabletokens = array();
            $appdetails = DB::table('appointment_cancel_and_reschedule_availability')
                ->select('appointment_no')
                ->distinct('appointment_no')
                ->where('date', '=', $date)
                ->get();
            foreach ($appdetails as $na) {
                array_push($notavailabletokens, $na->appointment_no);
            }
            $tokens = array_unique($notavailabletokens);

            return response()->json($tokens);
        } else if ($command === 'NoShow') {

            $notavailabletokens = array();
            $userGroupId = Session::get('userGroup');

            $qry1 = DB::table('temp_table')
                ->select('temp_token_no', 'temp_consult')
                ->distinct('temp_token_no')
                ->where([
                    ['temp_consult', '=', 2],
                    ['temp_consult_counter', $userGroupId],
                ])
                ->get();

            $totresult = $qry1;

            return response()->json(['result' => $totresult]);

            //NoShowCount
        } else if ($command === 'NoShowCount') {

            $userGroupId = Session::get('userGroup');

            $appdetails = DB::table('tbl_consultation_main')
                ->select('temp_token_no')
                ->distinct('temp_token_no')
                ->where('temp_consult_counter', $userGroupId)
                ->where('temp_consult', 2)
                ->count();

            return response()->json($appdetails);
        } else if ($command === 'ChekTokNo') {

            $token = $request->token;

            $res = DB::table('temp_table')
                ->where('temp_token_no', '=', $token)
                ->where('temp_consult_counter', '=', 0)
                ->count();

            return response()->json(['result' => $res]);
        } else if ($command === 'TempSave') {

            $imagePathTemp = $request->imagePathTemp;
            //Search Alredy Exits.
            //            ======================================
            $ConCount = DB::table('tbl_consultation_main')
                ->select('cm_app_no')
                ->where('cm_app_no', $request->appno)
                ->count();
            //            =====================================
            if ($ConCount != 0) {
                DB::table('tbl_consultation_main')
                    ->where('cm_app_no', $request->appno)
                    ->update([
                        'category' => $request->category,
                        'cm_cough' => $request->cough,
                        'cm_haemoptysis' => $request->haemoptysis,
                        'cm_night_sweats' => $request->nightsweats,
                        'cm_weight_loss' => $request->weightloss,
                        'cm_fever' => $request->fever,
                        'cm_any' => $request->chronicrespiratorydisease,
                        'cm_prev_thor_surgery' => $request->thoracic,
                        'cm_cyanosis' => $request->Cyanosis,
                        'cm_resp_insufficient' => $request->respiratoryinsufficient,
                        'cm_history_tb' => $request->historytb,
                        'cm_household_tb' => $request->householddiagnosedtb,
                        'cm_active_tb' => $request->historyrecentcontact,
                        'cm_exams_results' => $request->examsresults,
                        'cm_single_fibrous_streak' => $request->chkbox1,
                        'cm_bony_islets' => $request->chkbox2,
                        'cm_pleural_capping' => $request->chkbox3,
                        'cm_unilateral_bilateral' => $request->chkbox4,
                        'cm_calcified_nodule' => $request->chkbox5,
                        'cm_solitary_granuloma_hilum' => $request->chkbox6,
                        'cm_solitary_granuloma_enlarged' => $request->chkbox7,
                        'cm_single_multi_calc_pulmonary' => $request->chkbox8,
                        'cm_calcified_pleural_lesions' => $request->chkbox9,
                        'cm_costophrenic_angle' => $request->chkbox10,
                        'cm_notable_apical' => $request->chkbox11,
                        'cm_aplcal_fbronodualar' => $request->chkbox12,
                        'cm_multi_single_pulmonary_nodu_micronodules' => $request->chkbox13,
                        'cm_isolated_hilar' => $request->chkbox14,
                        'cm_multi_single_pulmonary_nodu_masses' => $request->chkbox15,
                        'cm_non_calcified_pleural_fibrosos' => $request->chkbox16,
                        'cm_interstltial_fbrosos' => $request->chkbox17,
                        'cm_any_cavitating_lesion' => $request->chkbox18,
                        'cm_skeleton_soft_issue' => $request->chkbox19,
                        'cm_cardiac_major_vessels' => $request->chkbox20,
                        'cm_lung_fields' => $request->chkbox21,
                        'cm_other' => $request->chkbox22,
                        'cm_dpp_comment' => $request->dppcomment,
                        'cm_order_sputum_sample' => $request->cm_order_sputum_sample,
                        'cm_cxray' => $request->CXRay,

                        'cm_hiv_1' => $request->chkbox70,
                        'cm_hiv_2' => $request->chkbox71,
                        'cm_hiv_3' => $request->chkbox72,
                        'cm_hiv_4_1' => $request->chkbox73,
                        'cm_hiv_4_2' => $request->chkbox74,
                        'cm_hiv_5_0' => $request->chkbox75,
                        'cm_hiv_5_1' => $request->chkbox76,
                        'cm_hiv_6' => $request->chkbox77,
                        'cm_hiv_7' => $request->chkbox78,
                        'cm_hiv_8' => $request->chkbox79,
                        'cm_hiv_9_0' => $request->chkbox80,
                        'cm_hiv_9_1' => $request->chkbox81,
                        'cm_hiv_10' => $request->chkbox82,
                        'cm_hiv_11' => $request->chkbox83,
                        'cm_hiv_12' => $request->chkbox84,
                        'cm_hiv_13' => $request->chkbox85,

                        'cm_Malaria_14' => $request->chkbox86,
                        'cm_Malaria_15' => $request->chkbox87,
                        'cm_Malaria_16' => $request->chkbox88,
                        'cm_Malaria_17' => $request->chkbox89,
                        'cm_Malaria_18' => $request->chkbox90,
                        'cm_Malaria_19' => $request->chkbox91,
                        'cm_Malaria_20' => $request->chkbox92,

                        'cm_Filaria_21' => $request->chkbox93,
                        'cm_Filaria_22' => $request->chkbox94,
                        'cm_Filaria_23' => $request->chkbox95,
                        'cm_Filaria_24' => $request->chkbox96,
                        'cm_Filaria_25' => $request->chkbox97,
                        'cm_Filaria_26' => $request->chkbox78,


                        'cm_day1' => $request->day1,
                    ]);
            } else {
                DB::table('tbl_consultation_main')->insert([
                    [
                        'cm_app_no' => $request->appno,
                        'cm_pass_no' => $request->ppno,
                        'category' => $request->category,
                        'cm_cough' => $request->cough,
                        'cm_haemoptysis' => $request->haemoptysis,
                        'cm_night_sweats' => $request->nightsweats,
                        'cm_weight_loss' => $request->weightloss,
                        'cm_fever' => $request->fever,
                        'cm_any' => $request->chronicrespiratorydisease,
                        'cm_prev_thor_surgery' => $request->thoracic,
                        'cm_cyanosis' => $request->Cyanosis,
                        'cm_resp_insufficient' => $request->respiratoryinsufficient,
                        'cm_history_tb' => $request->historytb,
                        'cm_household_tb' => $request->householddiagnosedtb,
                        'cm_active_tb' => $request->historyrecentcontact,
                        'cm_exams_results' => $request->examsresults,
                        'cm_single_fibrous_streak' => $request->chkbox1,
                        'cm_bony_islets' => $request->chkbox2,
                        'cm_pleural_capping' => $request->chkbox3,
                        'cm_unilateral_bilateral' => $request->chkbox4,
                        'cm_calcified_nodule' => $request->chkbox5,
                        'cm_solitary_granuloma_hilum' => $request->chkbox6,
                        'cm_solitary_granuloma_enlarged' => $request->chkbox7,
                        'cm_single_multi_calc_pulmonary' => $request->chkbox8,
                        'cm_calcified_pleural_lesions' => $request->chkbox9,
                        'cm_costophrenic_angle' => $request->chkbox10,
                        'cm_notable_apical' => $request->chkbox11,
                        'cm_aplcal_fbronodualar' => $request->chkbox12,
                        'cm_multi_single_pulmonary_nodu_micronodules' => $request->chkbox13,
                        'cm_isolated_hilar' => $request->chkbox14,
                        'cm_multi_single_pulmonary_nodu_masses' => $request->chkbox15,
                        'cm_non_calcified_pleural_fibrosos' => $request->chkbox16,
                        'cm_interstltial_fbrosos' => $request->chkbox17,
                        'cm_any_cavitating_lesion' => $request->chkbox18,
                        'cm_skeleton_soft_issue' => $request->chkbox19,
                        'cm_cardiac_major_vessels' => $request->chkbox20,
                        'cm_lung_fields' => $request->chkbox21,
                        'cm_other' => $request->chkbox22,
                        'cm_dpp_comment' => $request->dppcomment,
                        'cm_order_sputum_sample' => $request->cm_order_sputum_sample,
                        'cm_cxray' => $request->CXRay,

                        'cm_hiv_1' => $request->chkbox70,
                        'cm_hiv_2' => $request->chkbox71,
                        'cm_hiv_3' => $request->chkbox72,
                        'cm_hiv_4_1' => $request->chkbox73,
                        'cm_hiv_4_2' => $request->chkbox74,
                        'cm_hiv_5_0' => $request->chkbox75,
                        'cm_hiv_5_1' => $request->chkbox76,
                        'cm_hiv_6' => $request->chkbox77,
                        'cm_hiv_7' => $request->chkbox78,
                        'cm_hiv_8' => $request->chkbox79,
                        'cm_hiv_9_0' => $request->chkbox80,
                        'cm_hiv_9_1' => $request->chkbox81,
                        'cm_hiv_10' => $request->chkbox82,
                        'cm_hiv_11' => $request->chkbox83,
                        'cm_hiv_12' => $request->chkbox84,
                        'cm_hiv_13' => $request->chkbox85,

                        'cm_Malaria_14' => $request->chkbox86,
                        'cm_Malaria_15' => $request->chkbox87,
                        'cm_Malaria_16' => $request->chkbox88,
                        'cm_Malaria_17' => $request->chkbox89,
                        'cm_Malaria_18' => $request->chkbox90,
                        'cm_Malaria_19' => $request->chkbox91,
                        'cm_Malaria_20' => $request->chkbox92,

                        'cm_Filaria_21' => $request->chkbox93,
                        'cm_Filaria_22' => $request->chkbox94,
                        'cm_Filaria_23' => $request->chkbox95,
                        'cm_Filaria_24' => $request->chkbox96,
                        'cm_Filaria_25' => $request->chkbox97,
                        'cm_Filaria_26' => $request->chkbox78,


                        'cm_day1' => $request->day1,
                    ]
                ]);
            }

            $checkTempTable = DB::table('temp_table')
                ->select('temp_app_no')
                ->where('temp_app_no', $request->appno)
                ->count();


            if ($checkTempTable > 0) {
                DB::table('temp_table')
                    ->where('temp_app_no', $request->appno)
                    ->update(['temp_consult' => 5]);

                DB::table('temp_table')
                    ->where('temp_consult', 5)
                    ->update(['temp_consult_counter' => 0]);
            }

            File::delete(public_path() . '/tempFileUpload/tempFingerPrint/' . $imagePathTemp);

            return response()->json(['Done']);
        } else if ($command === 'save') {

            $cby = Auth::id();
            $cdate = date('Y-m-d  h:i:sa');

            $imagePathTemp = $request->imagePathTemp;
            //Search Alredy Exits.
            //            ======================================
            $ConCount = DB::table('tbl_consultation_main')
                ->select('cm_app_no')
                ->where('cm_app_no', $request->appno)
                ->count();
            //            =====================================
            if ($ConCount != 0) {
                DB::table('tbl_consultation_main')
                    ->where('cm_app_no', $request->appno)
                    ->update([
                        'category' => $request->category,
                        'cm_cough' => $request->cough,
                        'cm_haemoptysis' => $request->haemoptysis,
                        'cm_night_sweats' => $request->nightsweats,
                        'cm_weight_loss' => $request->weightloss,
                        'cm_fever' => $request->fever,
                        'cm_any' => $request->chronicrespiratorydisease,
                        'cm_prev_thor_surgery' => $request->thoracic,
                        'cm_cyanosis' => $request->Cyanosis,
                        'cm_resp_insufficient' => $request->respiratoryinsufficient,
                        'cm_history_tb' => $request->historytb,
                        'cm_household_tb' => $request->householddiagnosedtb,
                        'cm_active_tb' => $request->historyrecentcontact,
                        'cm_exams_results' => $request->examsresults,
                        'cm_single_fibrous_streak' => $request->chkbox1,
                        'cm_bony_islets' => $request->chkbox2,
                        'cm_pleural_capping' => $request->chkbox3,
                        'cm_unilateral_bilateral' => $request->chkbox4,
                        'cm_calcified_nodule' => $request->chkbox5,
                        'cm_solitary_granuloma_hilum' => $request->chkbox6,
                        'cm_solitary_granuloma_enlarged' => $request->chkbox7,
                        'cm_single_multi_calc_pulmonary' => $request->chkbox8,
                        'cm_calcified_pleural_lesions' => $request->chkbox9,
                        'cm_costophrenic_angle' => $request->chkbox10,
                        'cm_notable_apical' => $request->chkbox11,
                        'cm_aplcal_fbronodualar' => $request->chkbox12,
                        'cm_multi_single_pulmonary_nodu_micronodules' => $request->chkbox13,
                        'cm_isolated_hilar' => $request->chkbox14,
                        'cm_multi_single_pulmonary_nodu_masses' => $request->chkbox15,
                        'cm_non_calcified_pleural_fibrosos' => $request->chkbox16,
                        'cm_interstltial_fbrosos' => $request->chkbox17,
                        'cm_any_cavitating_lesion' => $request->chkbox18,
                        'cm_skeleton_soft_issue' => $request->chkbox19,
                        'cm_cardiac_major_vessels' => $request->chkbox20,
                        'cm_lung_fields' => $request->chkbox21,
                        'cm_other' => $request->chkbox22,
                        'cm_dpp_comment' => $request->dppcomment,
                        'cm_order_sputum_sample' => $request->cm_order_sputum_sample,
                        'cm_cxray' => $request->CXRay,
                        'Cby' => $cby,
                        'Cdate' => $cdate,

                        'cm_hiv_1' => $request->chkbox70,
                        'cm_hiv_2' => $request->chkbox71,
                        'cm_hiv_3' => $request->chkbox72,
                        'cm_hiv_4_1' => $request->chkbox73,
                        'cm_hiv_4_2' => $request->chkbox74,
                        'cm_hiv_5_0' => $request->chkbox75,
                        'cm_hiv_5_1' => $request->chkbox76,
                        'cm_hiv_6' => $request->chkbox77,
                        'cm_hiv_7' => $request->chkbox78,
                        'cm_hiv_8' => $request->chkbox79,
                        'cm_hiv_9_0' => $request->chkbox80,
                        'cm_hiv_9_1' => $request->chkbox81,
                        'cm_hiv_10' => $request->chkbox82,
                        'cm_hiv_11' => $request->chkbox83,
                        'cm_hiv_12' => $request->chkbox84,
                        'cm_hiv_13' => $request->chkbox85,

                        'cm_Malaria_14' => $request->chkbox86,
                        'cm_Malaria_15' => $request->chkbox87,
                        'cm_Malaria_16' => $request->chkbox88,
                        'cm_Malaria_17' => $request->chkbox89,
                        'cm_Malaria_18' => $request->chkbox90,
                        'cm_Malaria_19' => $request->chkbox91,
                        'cm_Malaria_20' => $request->chkbox92,

                        'cm_Filaria_21' => $request->chkbox93,
                        'cm_Filaria_22' => $request->chkbox94,
                        'cm_Filaria_23' => $request->chkbox95,
                        'cm_Filaria_24' => $request->chkbox96,
                        'cm_Filaria_25' => $request->chkbox97,
                        'cm_Filaria_26' => $request->chkbox78,


                        'cm_day1' => $request->day1,
                    ]);
            } else {
                DB::table('tbl_consultation_main')->insert([
                    [
                        'cm_app_no' => $request->appno,
                        'cm_pass_no' => $request->ppno,
                        'category' => $request->category,
                        'cm_cough' => $request->cough,
                        'cm_haemoptysis' => $request->haemoptysis,
                        'cm_night_sweats' => $request->nightsweats,
                        'cm_weight_loss' => $request->weightloss,
                        'cm_fever' => $request->fever,
                        'cm_any' => $request->chronicrespiratorydisease,
                        'cm_prev_thor_surgery' => $request->thoracic,
                        'cm_cyanosis' => $request->Cyanosis,
                        'cm_resp_insufficient' => $request->respiratoryinsufficient,
                        'cm_history_tb' => $request->historytb,
                        'cm_household_tb' => $request->householddiagnosedtb,
                        'cm_active_tb' => $request->historyrecentcontact,
                        'cm_exams_results' => $request->examsresults,
                        'cm_single_fibrous_streak' => $request->chkbox1,
                        'cm_bony_islets' => $request->chkbox2,
                        'cm_pleural_capping' => $request->chkbox3,
                        'cm_unilateral_bilateral' => $request->chkbox4,
                        'cm_calcified_nodule' => $request->chkbox5,
                        'cm_solitary_granuloma_hilum' => $request->chkbox6,
                        'cm_solitary_granuloma_enlarged' => $request->chkbox7,
                        'cm_single_multi_calc_pulmonary' => $request->chkbox8,
                        'cm_calcified_pleural_lesions' => $request->chkbox9,
                        'cm_costophrenic_angle' => $request->chkbox10,
                        'cm_notable_apical' => $request->chkbox11,
                        'cm_aplcal_fbronodualar' => $request->chkbox12,
                        'cm_multi_single_pulmonary_nodu_micronodules' => $request->chkbox13,
                        'cm_isolated_hilar' => $request->chkbox14,
                        'cm_multi_single_pulmonary_nodu_masses' => $request->chkbox15,
                        'cm_non_calcified_pleural_fibrosos' => $request->chkbox16,
                        'cm_interstltial_fbrosos' => $request->chkbox17,
                        'cm_any_cavitating_lesion' => $request->chkbox18,
                        'cm_skeleton_soft_issue' => $request->chkbox19,
                        'cm_cardiac_major_vessels' => $request->chkbox20,
                        'cm_lung_fields' => $request->chkbox21,
                        'cm_other' => $request->chkbox22,
                        'cm_dpp_comment' => $request->dppcomment,
                        'cm_order_sputum_sample' => $request->cm_order_sputum_sample,
                        'cm_cxray' => $request->CXRay,
                        'Cby' => $cby,
                        'Cdate' => $cdate,

                        'cm_hiv_1' => $request->chkbox70,
                        'cm_hiv_2' => $request->chkbox71,
                        'cm_hiv_3' => $request->chkbox72,
                        'cm_hiv_4_1' => $request->chkbox73,
                        'cm_hiv_4_2' => $request->chkbox74,
                        'cm_hiv_5_0' => $request->chkbox75,
                        'cm_hiv_5_1' => $request->chkbox76,
                        'cm_hiv_6' => $request->chkbox77,
                        'cm_hiv_7' => $request->chkbox78,
                        'cm_hiv_8' => $request->chkbox79,
                        'cm_hiv_9_0' => $request->chkbox80,
                        'cm_hiv_9_1' => $request->chkbox81,
                        'cm_hiv_10' => $request->chkbox82,
                        'cm_hiv_11' => $request->chkbox83,
                        'cm_hiv_12' => $request->chkbox84,
                        'cm_hiv_13' => $request->chkbox85,

                        'cm_Malaria_14' => $request->chkbox86,
                        'cm_Malaria_15' => $request->chkbox87,
                        'cm_Malaria_16' => $request->chkbox88,
                        'cm_Malaria_17' => $request->chkbox89,
                        'cm_Malaria_18' => $request->chkbox90,
                        'cm_Malaria_19' => $request->chkbox91,
                        'cm_Malaria_20' => $request->chkbox92,

                        'cm_Filaria_21' => $request->chkbox93,
                        'cm_Filaria_22' => $request->chkbox94,
                        'cm_Filaria_23' => $request->chkbox95,
                        'cm_Filaria_24' => $request->chkbox96,
                        'cm_Filaria_25' => $request->chkbox97,
                        'cm_Filaria_26' => $request->chkbox78,


                        'cm_day1' => $request->day1,
                    ]
                ]);
            }

            $checkTempTable = DB::table('temp_table')
                ->select('temp_app_no')
                ->where('temp_app_no', $request->appno)
                ->count();

            if ($request->buttonType == "saveBtn") {

                if ($checkTempTable > 0) {
                    DB::table('temp_table')
                        ->where('temp_app_no', $request->appno)
                        ->update(['temp_consult' => 4]);

                    DB::table('audittrail')
                        ->where('appno', $request->appno)
                        ->update(['consultation' => date("Y-m-d H:i:s"), 'concou' => strval(Auth::id())]);

                    DB::table('temp_table')
                        ->where('temp_consult', 4)
                        ->update(['temp_consult_counter' => 0]);
                }
            }


            File::delete(public_path() . '/tempFileUpload/tempFingerPrint/' . $imagePathTemp);

            return response()->json(['Done']);
        } else if ($command === 'pendingToken') {

            $currentOrder = DB::table('change_process_order')->first();
            $date = date('Y-m-d');
            $radiologyVali = DB::table('master_settings')->where('effectivedate', '<=', $date)->orderBy('effectivedate', 'desc')->first();

            if ($currentOrder->type == "1") {

                if ($radiologyVali->radiologyValidation) {

                    $posts = DB::table('temp_table')
                        ->distinct()
                        ->where('temp_radiology', 4)
                        ->where([
                            ['temp_phlebotomy', '=', 4],
                            ['temp_consult', '=', 1]
                        ])->count(['temp_token_no']);
                } else {

                    $posts = DB::table('temp_table')
                        ->distinct()
                        ->where([
                            ['temp_phlebotomy', '=', 4],
                            ['temp_consult', '=', 1]
                        ])->count(['temp_token_no']);
                }
            } else {

                if ($radiologyVali->radiologyValidation) {

                    $posts = DB::table('temp_table')
                        ->distinct()
                        ->where('temp_radiology', 4)
                        ->where([
                            ['temp_cxr', '=', 4],
                            ['temp_phlebotomy', '=', 4],
                            ['temp_consult', '=', 1]
                        ])
                        ->count(['temp_token_no']);
                } else {

                    $posts = DB::table('temp_table')
                        ->distinct()
                        ->where([
                            ['temp_cxr', '=', 4],
                            ['temp_phlebotomy', '=', 4],
                            ['temp_consult', '=', 1]
                        ])
                        ->count(['temp_token_no']);
                }
            }

            return response()->json(['result' => $posts]);
        } else if ($command == 'recallListCount') {

            $userGroupId = Session::get('userGroup');

            $appdetails = DB::table('temp_table')
                ->select('temp_token_no')
                ->distinct('temp_token_no')
                ->where('temp_consult_counter', $userGroupId)
                ->where('temp_consult', 2)
                ->count();

            $qry1 = DB::table('temp_table')
                ->select('temp_token_no', 'temp_consult')
                ->distinct('temp_token_no')
                ->where([
                    ['temp_consult', '=', 2],
                    ['temp_consult_counter', $userGroupId],
                ])
                ->get();

            $totresult = $qry1->count();

            return response()->json(['result' => $totresult]);
        } else if ($command == 'updateTestResults') {

            $serial = $request->serial;
            $comment = $request->comment;

            $COUNT = DB::table('tbl_phlrapidtestresults')
                ->select('prtr_id')
                ->where('prtr_id', $serial)
                ->count();

            if ($COUNT > 0) {

                DB::table('tbl_phlrapidtestresults')
                    ->where('prtr_id', $serial)
                    ->update(['prtr_comment' => $comment]);

                return response()->json('Done');
            } else {
                return response()->json('NotUpdatedNotData');
            }
        } else if ($command == 'fingerPrintTempSave') {

            $appNo = $request->appNo;
            $imageData = $request->imageData;
            $objectName = $request->objectName;

            $img = str_replace('data:image/bmp;base64,', '', $imageData);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);

            $wsq_url = "FPConsultation-" . $appNo . "-" . $objectName . "-" . date("Ymd") . ".bmp";

            $path = public_path() . '/tempFileUpload/tempFingerPrint/' . $wsq_url;

            file_put_contents($path, $data);

            return response()->json(['result' => true]);
        } else if ($command == 'LoadSputumPatient') {

            $PP = $request->PP;

            $data = DB::table('temp_new')
                ->join('register_applicants', 'register_applicant_details.AppointmentNumber', '=', 'temp_new.temp_app_no')
                ->where('temp_new.temp_passport', '=', $PP)
                ->get();

            return response()->json(['result' => $data]);
        } else if ($command == 'SaveTempTbl') {

            $PP = $request->PP;
            $AP = $request->AP;

            $res = DB::table('temp_table')
                ->where('temp_passport', '=', $PP)
                ->where('temp_app_no', '=', $AP)
                ->count();

            if ($res == 0) {
                $res1 = DB::table('temp_table')
                    ->where('temp_token_no', '>=', 500)
                    ->count();

                if ($res1 == 0) {
                    DB::table('temp_table')->insert(
                        [
                            'temp_passport' => $PP,
                            'temp_app_no' => $AP,
                            'temp_token_no' => 500,
                            'temp_reg' => 4,
                            'temp_reg_counter' => 0,
                            'temp_counsel' => 4,
                            'temp_counsel_counter' => 0,
                            'temp_cxr' => 4,
                            'temp_cxr_counter' => 0,
                            'temp_phlebotomy' => 4,
                            'temp_phlebotomy_counter' => 0,
                            'temp_payment' => 1,
                            'temp_payment_counter' => 0,
                            'temp_consult' => 4,
                            'temp_consult_counter' => 0,
                            'temp_sputum' => 4,
                            'temp_sputum_counter' => 0,
                            'temp_radiology' => 4,
                        ]
                    );
                } else {
                    $maxID = DB::table('temp_table')
                        ->max('temp_token_no');
                    $maxID++;

                    DB::table('temp_table')->insert(
                        [
                            'temp_passport' => $PP,
                            'temp_app_no' => $AP,
                            'temp_token_no' => $maxID,
                            'temp_reg' => 4,
                            'temp_reg_counter' => 0,
                            'temp_counsel' => 4,
                            'temp_counsel_counter' => 0,
                            'temp_cxr' => 4,
                            'temp_cxr_counter' => 0,
                            'temp_phlebotomy' => 4,
                            'temp_phlebotomy_counter' => 0,
                            'temp_payment' => 1,
                            'temp_payment_counter' => 0,
                            'temp_consult' => 4,
                            'temp_consult_counter' => 0,
                            'temp_sputum' => 4,
                            'temp_sputum_counter' => 0,
                            'temp_radiology' => 4,
                        ]
                    );
                }
            }
        }
    }

    public function generateSummaryReport(Request $request)
    {

        $appointmentno = $request->appNo;

        $memberDetails = DB::table('register_applicant_details')
            ->join('register_applicants', 'register_applicant_details.FkId', '=', 'register_applicants.id')
            ->where('AppointmentNumber', $appointmentno)
            ->get();

        $HIVres = DB::table('tbl_phlrapidtestresults')
            ->where('prtr_appno', '=', $appointmentno)
            ->where('prtr_test', '=', 'HIV')
            ->where('prtr_result', '!=', null)
            ->orderBy('prtr_id')
            ->get();

        $Malres = DB::table('tbl_phlrapidtestresults')
            ->where('prtr_appno', '=', $appointmentno)
            ->where('prtr_test', '=', 'Malaria')
            ->where('prtr_result', '!=', null)
            ->orderBy('prtr_id')
            ->get();

        $FilRes = DB::table('tbl_phlrapidtestresults')
            ->where('prtr_appno', '=', $appointmentno)
            ->where('prtr_test', '=', 'Filaria')
            ->where('prtr_result', '!=', null)
            ->orderBy('prtr_id')
            ->get();

        $examRemark = DB::table('tbl_consultation_main')
            ->select('cm_exams_results')
            ->where('cm_app_no', '=', $appointmentno)
            ->value('cm_exams_results');

        $cm_dpp_comment = DB::table('tbl_consultation_main')
            ->select('cm_dpp_comment')
            ->where('cm_app_no', '=', $appointmentno)
            ->value('cm_dpp_comment');


        $sputumDet = DB::table('tb_test_results')
            ->select('tb_test_results.genexpert', 'tb_test_results.liquidculture', 'tb_test_results.solidculture')
            ->where('tb_test_results.appointmentno', $appointmentno)
            ->get();

        $refTb = DB::table('refer_to_tb')
            ->where('registration_no', '=', $appointmentno)
            ->value('remark');

        $photo = DB::table('tbl_registration')
            ->where('reg_app_no', $appointmentno)
            ->value('reg_photo_booth');

        $refOther = DB::table('tbl_refer_to_other')
            ->where('reg_no', '=', $appointmentno)
            ->value('remark');

        foreach ($memberDetails as $member) {
            $AppointmentDate = $member->AppointmentDate;
        }

        $rr_comment2 = DB::table('tbl_radiologists_reporting')
            ->where('rr_app_no', $appointmentno)
            ->value('rr_comment2');
        //
        $prg_status = DB::table('tbl_phlebotomy_sample')
            ->where('ps_app_no', $appointmentno)
            ->value('ps_shcg');

        $cxrDet = DB::table('tbl_cxr')
            ->select('cxr_not_done', 'cxr_def', 'cxr_preg_sc', 'cxr_app_dec', 'cxr_no_show', 'cxr_child', 'cxr_unbl_unwill_sc', 'not_done_other_text', 'cxr_done', 'cxr_done_plv_shld', 'cxr_done_dbl_abd_shield', 'done_other_text')
            ->where('cxr_app_no', '=', $appointmentno)
            ->get();
        $DateOfBirth = DB::table('register_applicant_details')
            ->where('AppointmentNumber', '=', $appointmentno)
            ->value('DateOfBirth');


        //2018-04-08
        //explode the date to get month, day and year
        $birthDate = explode("-", $DateOfBirth);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
            ? ((date("Y") - $birthDate[0]) - 1)
            : (date("Y") - $birthDate[0]));


        $pdf = PDF::loadView('pages.SummaryReport', compact('memberDetails', 'HIVres', 'Malres', 'FilRes', 'cxrDet', 'examRemark', 'sputumDet', 'refTb', 'refOther', 'photo', 'rr_comment2', 'cm_dpp_comment', 'prg_status', 'age'));
        return $pdf->stream('summary.pdf');
    }

    public function generateCertificate(Request $request)
    {
        $appointmentno = $request->appNo;

        $memberDetails = DB::table('register_applicant_details')
            ->join('register_applicants', 'register_applicant_details.FkId', '=', 'register_applicants.id')
            ->where('AppointmentNumber', $appointmentno)
            ->get();

        $HIVres = DB::table('tbl_phlrapidtestresults')
            ->where('prtr_appno', '=', $appointmentno)
            ->where('prtr_test', '=', 'HIV')
            ->get(['prtr_result']);

        $Malres = DB::table('tbl_phlrapidtestresults')
            ->where('prtr_appno', '=', $appointmentno)
            ->where('prtr_test', '=', 'Malaria')
            ->get(['prtr_result']);

        $FilRes = DB::table('tbl_phlrapidtestresults')
            ->where('prtr_appno', '=', $appointmentno)
            ->where('prtr_test', '=', 'Filaria')
            ->get(['prtr_result']);

        $examRemark = DB::table('tbl_consultation_main')
            ->where('cm_app_no', '=', $appointmentno)
            ->get();

        $photo = DB::table('tbl_registration')
            ->where('reg_app_no', $appointmentno)
            ->value('reg_photo_booth');

        $cxrDet = DB::table('tbl_cxr')
            ->where('cxr_app_no', '=', $appointmentno)
            ->get();


        $pdf = PDF::loadView('pages.Certificate', compact('memberDetails', 'HIVres', 'Malres', 'FilRes', 'examRemark', 'photo', 'cxrDet'));

        return $pdf->stream('certificate.pdf');
    }

    public function generateCard(Request $request)
    {
        $appointmentno = $request->appNo;

        $memberDetails = DB::table('register_applicant_details')
            ->where('AppointmentNumber', $appointmentno)
            ->get();

        $category = DB::table('tbl_consultation_main')
            ->where('cm_app_no', '=', $appointmentno)
            ->value('category');

        $photo = DB::table('tbl_registration')
            ->where('reg_app_no', $appointmentno)
            ->value('reg_photo_booth');

        $date = date('Y-m-d');

        $pdf = PDF::loadView('pages.DetailCard', compact('memberDetails', 'date', 'category', 'photo'));
        return $pdf->stream('card.pdf');
    }

    public function dieReportGen(Request $request)
    {
        $appDate = $request->date;

        $res = DB::table('ihu_recommendation')
            ->leftJoin('tbl_registration', 'tbl_registration.reg_app_no', '=', 'ihu_recommendation.AppointmentNumberNo')
            ->select('*')
            ->where('reg_app_date', '=', $appDate)
            ->get();

        $pdf = PDF::loadView('pages.DieReportPDF', compact('res'));
        return $pdf->stream('DIE Report.pdf');
    }

    public function generateCertificate2(Request $request)
    {
        $appointmentno = $request->appNo;
        $TR = $request->TR;

        $memberDetails = DB::table('register_applicant_details')
            ->join('register_applicants', 'register_applicant_details.FkId', '=', 'register_applicants.id')
            ->where('AppointmentNumber', $appointmentno)
            ->get();

        $rowCountConfirmatory = DB::table('tbl_confirmatorytestresults')
            ->select('ctr_appno')
            ->where('ctr_appno', $appointmentno)
            ->count();

        if ($rowCountConfirmatory == 0) {

            $HIVres = DB::table('tbl_phlrapidtestresults')
                ->where('prtr_appno', '=', $appointmentno)
                ->where('prtr_test', '=', 'HIV')
                ->where('prtr_result', '!=', null)
                ->orderBy('prtr_id', 'desc')->take(1)
                ->get();

            $Malres = DB::table('tbl_phlrapidtestresults')
                ->where('prtr_appno', '=', $appointmentno)
                ->where('prtr_test', '=', 'Malaria')
                ->where('prtr_result', '!=', null)
                ->orderBy('prtr_id')
                ->get();

            $FilRes = DB::table('tbl_phlrapidtestresults')
                ->where('prtr_appno', '=', $appointmentno)
                ->where('prtr_test', '=', 'Filaria')
                ->where('prtr_result', '!=', null)
                ->orderBy('prtr_id')
                ->get();
        } else {

            $HIVres = DB::table('tbl_confirmatorytestresults')
                ->select('ctr_result as prtr_result')
                ->where('ctr_appno', '=', $appointmentno)
                ->where('ctr_test', '=', 'HIV')
                ->where('ctr_result', '!=', null)
                ->orderBy('ctr_id', 'desc')->take(1)
                ->get();

            $Malres = DB::table('tbl_confirmatorytestresults')
                ->select('ctr_result as prtr_result')
                ->where('ctr_appno', '=', $appointmentno)
                ->where('ctr_test', '=', 'Malaria')
                ->where('ctr_result', '!=', null)
                ->orderBy('ctr_id')
                ->get();

            $FilRes = DB::table('tbl_confirmatorytestresults')
                ->select('ctr_result as prtr_result')
                ->where('ctr_appno', '=', $appointmentno)
                ->where('ctr_test', '=', 'Filaria')
                ->where('ctr_result', '!=', null)
                ->orderBy('ctr_id')
                ->get();
        }


        $examRemark = DB::table('tbl_consultation_main')
            ->where('cm_app_no', '=', $appointmentno)
            ->value('cm_exams_results');

        $sputumDet = DB::table('tb_test_results')
            ->select('tb_test_results.genexpert', 'tb_test_results.liquidculture', 'tb_test_results.solidculture')
            ->where('tb_test_results.appointmentno', $appointmentno)
            ->get();

        $refTb = DB::table('refer_to_tb')
            ->where('registration_no', '=', $appointmentno)
            ->value('remark');

        $photo = DB::table('tbl_registration')
            ->where('reg_app_no', $appointmentno)
            ->value('reg_photo_booth');

        $refOther = DB::table('tbl_refer_to_other')
            ->where('reg_no', '=', $appointmentno)
            ->value('remark');

        foreach ($memberDetails as $member) {
            $arrivalDate = $member->DateOfArrival;
        }

        $cxrDet = DB::table('tbl_cxr')
            ->select('cxr_not_done', 'cxr_def', 'cxr_preg_sc', 'cxr_app_dec', 'cxr_no_show', 'cxr_child', 'cxr_unbl_unwill_sc', 'not_done_other_text', 'cxr_done', 'cxr_done_plv_shld', 'cxr_done_dbl_abd_shield', 'done_other_text')
            ->where('cxr_app_no', '=', $appointmentno)
            ->get();

        $cm_dpp_comment = DB::table('tbl_consultation_main')
            ->where('cm_app_no', '=', $appointmentno)
            ->value('cm_dpp_comment');

        $rdio_rsl = DB::table('tbl_consultation_main')
            ->where('cm_app_no', '=', $appointmentno)
            ->value('cm_cxray');

        $DateOfBirth = DB::table('register_applicant_details')
            ->where('AppointmentNumber', '=', $appointmentno)
            ->value('DateOfBirth');


        //2018-04-08
        //explode the date to get month, day and year
        $birthDate = explode("-", $DateOfBirth);
        //get age from date or birthdate
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
            ? ((date("Y") - $birthDate[0]) - 1)
            : (date("Y") - $birthDate[0]));


        $pdf = PDF::loadView('pages.Certificate2', compact('memberDetails', 'HIVres', 'Malres', 'FilRes', 'cxrDet', 'examRemark', 'sputumDet', 'refTb', 'refOther', 'photo', 'cm_dpp_comment', 'rdio_rsl', 'age', 'TR'));

        return $pdf->stream('certificate.pdf');
    }

    public function referTo(Request $request)
    {
        $appointmentno = $request->appNo;

        $memberDetails = DB::table('register_applicant_details')
            ->join('register_applicants', 'register_applicant_details.FkId', '=', 'register_applicants.id')
            ->where('AppointmentNumber', $appointmentno)
            ->get();

        $rowCountConfirmatory = DB::table('tbl_confirmatorytestresults')
            ->select('ctr_appno')
            ->where('ctr_appno', $appointmentno)
            ->count();

        if ($rowCountConfirmatory == 0) {

            $labDet = DB::table('tbl_phlrapidtestresults')
                ->where('prtr_appno', $appointmentno)
                ->get();
        } else {

            $labDet = DB::table('tbl_confirmatorytestresults')
                ->select('ctr_result as prtr_result', 'ctr_id as prtr_id', 'ctr_test as prtr_test', 'ctr_comment as prtr_comment')
                ->where('ctr_appno', $appointmentno)
                ->get();
        }

        $tbDet = DB::table('tb_test_results')
            ->where('appointmentno', $appointmentno)
            ->get();

        if ($tbDet->isEmpty()) {
            $tbDet = null;
        }

        $pdf = PDF::loadView('Reports.referToAfc', compact('memberDetails', 'labDet', 'tbDet'));

        return $pdf->stream('ReferralReport.pdf');
    }

    public function referToOthers(Request $request)
    {
        $appointmentno = $request->appNo;

        $memberDetails = DB::table('register_applicant_details')
            ->join('register_applicants', 'register_applicant_details.FkId', '=', 'register_applicants.id')
            ->where('AppointmentNumber', $appointmentno)
            ->get();

        $labDet = DB::table('tbl_phlrapidtestresults')
            ->where('prtr_appno', $appointmentno)
            ->get();


        $radiologistReporting = DB::table('tbl_radiologists_reporting')
            ->where('rr_app_no', $appointmentno)
            ->pluck('rr_comment2');


        if ($radiologistReporting->count() == 0) {
            $radiologistReporting = ['-'];
        }

        $pdf = PDF::loadView('Reports.SystemReferralFormSpecialist', compact('memberDetails', 'labDet', 'radiologistReporting'));

        return $pdf->stream('SystemReferralFormSpecialist.pdf');
    }

    public function referSystemLabRequest(Request $request)
    { 
        $appointmentno = $request->appNo;

        $memberDetails = DB::table('register_applicant_details')
            ->join('register_applicants', 'register_applicant_details.FkId', '=', 'register_applicants.id')
            ->where('AppointmentNumber', $appointmentno)
            ->get();

        $labDet = DB::table('tbl_phlrapidtestresults')
            ->where('prtr_appno', $appointmentno)
            ->get();

        $tbDet = DB::table('tbtest')
            ->where('barcode', $appointmentno)
            ->get();

        $radiologistReporting = DB::table('tbl_radiologists_reporting')
            ->where('rr_app_no', $appointmentno)
            ->get();

        $pdf = PDF::loadView('Reports.SystemLabRequest', compact('memberDetails', 'labDet', 'tbDet', 'radiologistReporting'));

        return $pdf->stream('SystemLabRequest.pdf');
    }

    public function UpdateCommentConsultation(Request $request)
    {
        $appno = $request->appno;
        $comment = $request->comment;

        DB::table('tbl_consultation_main')
            ->where('cm_app_no', $appno)
            ->update(['cm_dpp_comment' => $comment]);

        return response()->json(true);
    }
}
