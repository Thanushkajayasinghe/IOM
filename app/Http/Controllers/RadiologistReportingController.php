<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class RadiologistReportingController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.RadiologistReporting')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);;
    }

    public function ViewPagePrevious()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.RadiologistReportingPrevious')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);;
    }

    public function ViewPageCOM()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.RadiologistReportingCOM')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);;
    }

    public function CRUD(Request $request)
    {
        $userGroupId = Session::get('userGroup');
        $command = $request->command;
        if ($command === 'next') {
            $aarrayvalues = array();
            $appno = DB::table('temp_table')
                ->select('temp_app_no', 'temp_passport')
                ->where('temp_cxr', 4)
                ->where('temp_radiology', 1) //add new column to temp table & also token controller add 'temp_radiology' => 1 on insert
                ->orderBy('temp_token_no', 'asc')
                ->first();

            DB::table('temp_table')
                ->where('temp_app_no', $request->appno)
                ->update(['temp_radiology' => 2]);
            return response()->json($appno);
        } else if ($command === 'save') {

            DB::table('tbl_radiologists_reporting')->insert([
                [
                    'rr_app_no' => $request->appno,
                    'rr_pass_no' => $request->ppno,
                    'rr_single_fibrous_streak' => $request->chkbox1,
                    'rr_bony_islets' => $request->chkbox2,
                    'rr_pleural_capping' => $request->chkbox3,
                    'rr_unilateral_bilateral' => $request->chkbox4,
                    'rr_calcified_nodule' => $request->chkbox5,
                    'rr_solitary_granuloma_hilum' => $request->chkbox6,
                    'rr_solitary_granuloma_enlarged' => $request->chkbox7,
                    'rr_single_multi_calc_pulmonary' => $request->chkbox8,
                    'rr_calcified_pleural_lesions' => $request->chkbox9,
                    'rr_costophrenic_angle' => $request->chkbox10,
                    'rr_notable_apical' => $request->chkbox11,
                    'rr_aplcal_fbronodualar' => $request->chkbox12,
                    'rr_multi_single_pulmonary_nodu_micronodules' => $request->chkbox13,
                    'rr_isolated_hilar' => $request->chkbox14,
                    'rr_multi_single_pulmonary_nodu_masses' => $request->chkbox15,
                    'rr_non_calcified_pleural_fibrosos' => $request->chkbox16,
                    'rr_interstltial_fbrosos' => $request->chkbox17,
                    'rr_any_cavitating_lesion' => $request->chkbox18,
                    'rr_skeleton_soft_issue' => $request->chkbox19,
                    'rr_cardiac_major_vessels' => $request->chkbox20,
                    'rr_lung_fields' => $request->chkbox21,
                    'rr_other' => $request->chkbox22,
                    'rr_comment1' => $request->rr_comment1,
                    'rr_comment2' => $request->rr_comment2,
                    'cby' => Auth::id(),
                    'cdate' => date('Y-m-d H:i:s')
                ]
            ]);

            $st = $request->status;
            if ($st == "ReqOK") {
                DB::table('temp_table')
                    ->where('temp_app_no', $request->appno)
                    ->update(['temp_radiology' => 4]);
            } else {
                DB::table('temp_table')
                    ->where('temp_app_no', $request->appno)
                    ->update(['temp_radiology' => 4, 'rad_rep_status' => 4]);
            }
            return response()->json(['Done']);
        } else if ($command === 'update') {

            $serial = $request->serial;

            DB::table('tbl_radiologists_reporting')
                ->where('rr_id', '=', $serial)
                ->update([
                    'rr_app_no' => $request->appno,
                    'rr_pass_no' => $request->ppno,
                    'rr_single_fibrous_streak' => $request->chkbox1,
                    'rr_bony_islets' => $request->chkbox2,
                    'rr_pleural_capping' => $request->chkbox3,
                    'rr_unilateral_bilateral' => $request->chkbox4,
                    'rr_calcified_nodule' => $request->chkbox5,
                    'rr_solitary_granuloma_hilum' => $request->chkbox6,
                    'rr_solitary_granuloma_enlarged' => $request->chkbox7,
                    'rr_single_multi_calc_pulmonary' => $request->chkbox8,
                    'rr_calcified_pleural_lesions' => $request->chkbox9,
                    'rr_costophrenic_angle' => $request->chkbox10,
                    'rr_notable_apical' => $request->chkbox11,
                    'rr_aplcal_fbronodualar' => $request->chkbox12,
                    'rr_multi_single_pulmonary_nodu_micronodules' => $request->chkbox13,
                    'rr_isolated_hilar' => $request->chkbox14,
                    'rr_multi_single_pulmonary_nodu_masses' => $request->chkbox15,
                    'rr_non_calcified_pleural_fibrosos' => $request->chkbox16,
                    'rr_interstltial_fbrosos' => $request->chkbox17,
                    'rr_any_cavitating_lesion' => $request->chkbox18,
                    'rr_skeleton_soft_issue' => $request->chkbox19,
                    'rr_cardiac_major_vessels' => $request->chkbox20,
                    'rr_lung_fields' => $request->chkbox21,
                    'rr_other' => $request->chkbox22,
                    'rr_comment1' => $request->rr_comment1,
                    'rr_comment2' => $request->rr_comment2,
                    'cby' => Auth::id(),
                    'cdate' => date('Y-m-d H:i:s')
                ]);

            return response()->json(['Done']);
        } else if ($command === 'reqaddet') {

            DB::table('tbl_radiologists_reporting')
                ->where('rr_app_no', $request->appno)
                ->update(['rr_req_add_details' => true]);
        } else if ($command == 'loadCxrComplete') {

            $appointmentno = DB::table('temp_table')
                ->select('temp_app_no')
                ->where('temp_cxr', '=', 4)
                ->where('temp_radiology', '=', 1)
                ->get(); 

            foreach ($appointmentno as $key => $app) {
                $appointment = $app->temp_app_no;

                DB::table('temp_table')
                    ->where('temp_app_no', '=', $appointment)
                    ->update(['temp_radiology_counter' => 32]);
            }

            $selectedAppNo = DB::table('temp_table')
                ->leftJoin('register_applicant_details', 'temp_table.temp_app_no', '=', 'register_applicant_details.AppointmentNumber')
                ->select(
                    'temp_table.temp_token_no',
                    'temp_table.temp_app_no',
                    'register_applicant_details.FirstName',
                    'register_applicant_details.LastName',
                    'register_applicant_details.Gender',
                    'register_applicant_details.DateOfBirth',
                    'register_applicant_details.PassportNumber'
                )
                ->where('temp_cxr', '=', 4)
                ->where('temp_radiology', '=', 1)
                ->where('temp_radiology_counter', '=', $userGroupId)
                ->get();

            return response()->json(['result' => $selectedAppNo]);
        } elseif ($command == 'loadPassportNo') {

            $appno = $request->appno;

            $passportno = DB::table('temp_table')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'temp_table.temp_app_no')
                ->select(
                    'temp_passport',
                    'register_applicant_details.FirstName',
                    'register_applicant_details.LastName',
                    'register_applicant_details.DateOfBirth',
                    'register_applicant_details.Gender',
                    'temp_table.rad_rep_comment'
                )
                ->where('temp_app_no', '=', $appno)
                ->first();

            return response()->json(['result' => $passportno]);
        } else if ($command == 'loadCompleteData') {

            $appno = $request->appno;

            $dataAll = DB::table('temp_table')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'temp_table.temp_app_no')
                ->leftJoin('tbl_radiologists_reporting', 'tbl_radiologists_reporting.rr_app_no', '=', 'temp_table.temp_app_no')
                ->select(
                    'temp_passport',
                    'register_applicant_details.FirstName',
                    'register_applicant_details.LastName',
                    'register_applicant_details.DateOfBirth',
                    'register_applicant_details.Gender',
                    'tbl_radiologists_reporting.*'
                )
                ->where('temp_app_no', '=', $appno)
                ->first();

            return response()->json(['result' => $dataAll]);
        } else if ($command == 'loadRadioComplete') {

            $AppNo = DB::table('temp_table')
                ->leftJoin('register_applicant_details', 'temp_table.temp_app_no', '=', 'register_applicant_details.AppointmentNumber')
                ->leftJoin('tbl_radiologists_reporting', 'temp_table.temp_app_no', '=', 'tbl_radiologists_reporting.rr_app_no')
                ->select(
                    'temp_table.temp_token_no',
                    'temp_table.temp_app_no',
                    'register_applicant_details.FirstName',
                    'register_applicant_details.LastName',
                    'register_applicant_details.Gender',
                    'register_applicant_details.DateOfBirth',
                    'register_applicant_details.PassportNumber',
                    'tbl_radiologists_reporting.rr_comment2'
                )
                ->where('temp_radiology', '=', 4)
                ->where('temp_radiology_counter', '=', $userGroupId)
                ->get();

            return response()->json(['result' => $AppNo]);
        } else if ($command == 'loadRadioReviewed') {

            $AppNo = DB::table('temp_table')
                ->leftJoin('register_applicant_details', 'temp_table.temp_app_no', '=', 'register_applicant_details.AppointmentNumber')
                ->select(
                    'temp_table.temp_token_no',
                    'temp_table.temp_app_no',
                    'register_applicant_details.FirstName',
                    'register_applicant_details.LastName',
                    'register_applicant_details.Gender',
                    'register_applicant_details.DateOfBirth',
                    'register_applicant_details.PassportNumber'
                )
                ->where('temp_cxr', '=', 4)
                ->where('rad_rep_status', '=', 2)
                ->where('temp_radiology_counter', '=', $userGroupId)
                ->get();

            return response()->json(['result' => $AppNo]);
        } else if ($command == 'RadiRepo') {
            $appointment = $request->appno;
            $comment1 = $request->comment1;
            DB::table('temp_table')
                ->where('temp_app_no', '=', $appointment)
                ->update(['rad_rep_status' => 1, 'rad_rep_comment' => $comment1]);

            DB::table('tbl_cxr')
                ->where('cxr_app_no', '=', $appointment)
                ->update(['cxr_extra_view' => null,]);

            return response()->json(['result' => true]);
        } else if ($command == 'loadRadioCompleteCOM') {

            $AppNo = DB::table('temp_table')
                ->leftJoin('register_applicant_details', 'temp_table.temp_app_no', '=', 'register_applicant_details.AppointmentNumber')
                ->select(
                    'temp_table.temp_app_no',
                    'register_applicant_details.FirstName',
                    'register_applicant_details.LastName',
                    'register_applicant_details.Gender',
                    'register_applicant_details.DateOfBirth',
                    'register_applicant_details.PassportNumber'
                )
                ->where('temp_radiology', '=', 4)
                ->get();

            return response()->json(['result' => $AppNo]);
        }
    }


    public function UpdateRadiologyComments(Request $request)
    {
        $appno = $request->appno;
        $comment = $request->comment;

        DB::table('tbl_radiologists_reporting')
            ->where('rr_app_no', $appno)
            ->update(['rr_comment2' => $comment]);

        return response()->json(true);
    }
}
