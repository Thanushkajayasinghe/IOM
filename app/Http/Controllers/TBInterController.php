<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TBInterController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.TBInter')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function ViewPage2()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.TBViewDet')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function SaveRecords(Request $request)
    {
        $barcode = $request->barcode;
        $passportNo = $request->passportNo;
        $refereedDate = $request->refereedDate;
        $testDate = $request->testDate;
        $test = $request->test;
        $result = $request->result;
        $createdBy = Auth::user()->id;
        $datetime = date('Y-m-d H:i:s');


        DB::table('tbtest')->insert(
            ['barcode' => $barcode, 'passport' => $passportNo, 'reffereddate' => $refereedDate, 'testdate' => $testDate, 'test' => $test, 'testresult' => $result, 'cby' => "$createdBy", 'cdate' => $datetime]
        );

        return response()->json(['result' => true]);
    }

    public function LoadData(Request $request)
    {
        $barcode = $request->barcode;

        $res = DB::table('tbl_phlebotomy_sample')
            ->where('ps_malaria_barcode', '=', $barcode)
            ->get();

        $resx = DB::table('tbtest')
            ->where('barcode', '=', $barcode)
            ->get();

        return response()->json(['result' => $res, 'res' => $resx]);

    }

    public function passportLoadDrp(Request $request)
    {
        $res = DB::select("select max(ps_id) as id, ps_passp_no from tbl_phlebotomy_sample
                                  group by ps_passp_no");

        return response()->json(['result' => $res]);
    }

    public function appointmentsLoadDrp(Request $request)
    {
        $res = DB::select("select max(ps_id) as id, ps_app_no from tbl_phlebotomy_sample
                                        group by ps_app_no");

        return response()->json(['result' => $res]);
    }

    public function tbViewDetLoadData(Request $request)
    {
        $password = $request->password;

        $res = DB::table('tbl_phlebotomy_sample')
            ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'tbl_phlebotomy_sample.ps_app_no')
            ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
            ->leftJoin('tbl_sputum_collection', 'tbl_sputum_collection.sc_app_no', '=', 'tbl_phlebotomy_sample.ps_app_no')
            ->leftJoin('tb_test_results', 'tb_test_results.labno', '=', 'tbl_sputum_collection.barcode')
            ->leftJoin('tbl_consultation_main', 'tbl_consultation_main.cm_app_no', '=', 'tbl_phlebotomy_sample.ps_app_no')
            ->select('*')
            ->where('tbl_phlebotomy_sample.ps_passp_no', '=', $password)
            ->orderby('tbl_phlebotomy_sample.ps_passp_no', 'desc')
            ->get();

        return response()->json(['result' => $res]);
    }

}
