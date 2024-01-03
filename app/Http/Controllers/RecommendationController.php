<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecommendationController extends Controller
{

    //View Page
    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.Recommendation')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function DIEViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.DieReport')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function TBViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.TBReport')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function MalariaViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.MalariaReport')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function HivViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.HIVReport')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function FilariaViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.FilariaReport')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }


    //All funtions
    public function AllData(Request $request)
    {
        $function = $request->function;

//Load Data
        if ($function == 'LoadData') {

            $res = DB::table('ihu_recommendation')
                ->select('*')
                ->where('status', '=', 'IHURecomend')
                ->get();

            return response()->json(['result' => $res]);


        } else if ($function == 'SaveData') {

            $reqArray = $request->arrayToSend;

            $tableArrayData[] = array();
            $arrayData = json_decode($reqArray);
            $tableArrayData = $arrayData;


            foreach ($tableArrayData as $data) {
                $id = $data;

                DB::table('ihu_recommendation')->where('id', $id)->update(['status' => "Verify"]);

            }
            return response()->json(['result' => true]);

        } else if ($function == 'LoadDataDieReport') {

            $appDate = $request->date;

            $res = DB::table('ihu_recommendation')
                ->leftJoin('tbl_registration', 'tbl_registration.reg_app_no', '=', 'ihu_recommendation.AppointmentNumberNo')
                ->leftJoin('tbl_consultation_main', 'tbl_consultation_main.cm_app_no', '=', 'ihu_recommendation.AppointmentNumberNo')
                ->select('*')
                ->where('category', '!=', 'HOLD')
                ->where('reg_app_date', '=', $appDate)
                ->get();

            return response()->json(['result' => $res]);
        } else if ($function == 'LoadDataTBReport') {

            $appDate = $request->date;

            $res = DB::table('refer_to_tb')
                ->leftJoin('tbl_registration', 'tbl_registration.reg_app_no', '=', 'refer_to_tb.registration_no')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'refer_to_tb.registration_no')
                ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->leftJoin('tbl_sputum_collection', 'tbl_sputum_collection.sc_app_no', '=', 'refer_to_tb.registration_no')
                ->leftJoin('tb_test_results', 'tb_test_results.labno', '=', 'tbl_sputum_collection.barcode')
                ->leftJoin('tbl_consultation_main', 'tbl_consultation_main.cm_app_no', '=', 'refer_to_tb.registration_no')
                ->select('*')
                ->where('reg_app_date', '=', $appDate)
                ->get();

            return response()->json(['result' => $res]);
        } else if ($function == 'LoadDataMalariaReport') {

            $appDate = $request->date;

            $res = DB::table('refer_to_malaria')
                ->leftJoin('tbl_registration', 'tbl_registration.reg_app_no', '=', 'refer_to_malaria.registration_no')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'refer_to_malaria.registration_no')
                ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->select('*')
                ->where('reg_app_date', '=', $appDate)
                ->get();

            return response()->json(['result' => $res]);
        } else if ($function == 'LoadDataHIVReport') {

            $appDate = $request->date;

            $res = DB::table('refer_to_nsacp_hiv_elisa')
                ->leftJoin('tbl_registration', 'tbl_registration.reg_app_no', '=', 'refer_to_nsacp_hiv_elisa.registration_no')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'refer_to_nsacp_hiv_elisa.registration_no')
                ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->select('*')
                ->where('reg_app_date', '=', $appDate)
                ->get();

            return response()->json(['result' => $res]);
        } else if ($function == 'LoadDataFilariaReport') {

            $appDate = $request->date;

            $res = DB::table('refer_to_afc')
                ->leftJoin('tbl_registration', 'tbl_registration.reg_app_no', '=', 'refer_to_afc.registration_no')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'refer_to_afc.registration_no')
                ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->select('*')
                ->where('reg_app_date', '=', $appDate)
                ->get();

            return response()->json(['result' => $res]);
        }
    }

}
