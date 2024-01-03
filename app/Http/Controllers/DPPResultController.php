<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DPPResultController extends Controller
{

    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.DPPResults')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function ViewPage2()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.DieViewDet')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function LoadData(Request $request)
    {
        $passport = $request->passport;
        $program = $request->program;

        $res1 = "";
        $res2 = "";
        $res3 = "";
        $res4 = "";

        if ($program == "TB") {

            $res1 = DB::table('tbtest')
                ->when($passport, function ($query) use ($passport) {
                    $query->where('passport', '=', $passport)
                        ->orWhereNull('passport');
                })
                ->where(function ($res1) use ($request) {
                    if ($request->dateFrom != "" && $request->dateTo != "") {
                        $res1->whereBetween('testdate', [$request->dateFrom, $request->dateTo]);
                    }
                })
                ->get();
        } elseif ($program == "HIV") {

            $res4 = DB::table('hivtest')
                ->when($passport, function ($query) use ($passport) {
                    $query->where('passport', '=', $passport)
                        ->orWhereNull('passport');
                })
                ->where(function ($res4) use ($request) {
                    if ($request->dateFrom != "" && $request->dateTo != "") {
                        $res4->whereBetween('testdate', [$request->dateFrom, $request->dateTo]);
                    }
                })
                ->get();
        } elseif ($program == "FILARIA") {

            $res2 = DB::table('filariatest')
                ->when($passport, function ($query) use ($passport) {
                    $query->where('passport', '=', $passport)
                        ->orWhereNull('passport');
                })
                ->where(function ($res2) use ($request) {
                    if ($request->dateFrom != "" && $request->dateTo != "") {
                        $res2->whereBetween('testdate', [$request->dateFrom, $request->dateTo]);
                    }
                })
                ->get();
        } elseif ($program == "MALARIA") {

            $res3 = DB::table('malariatest')
                ->when($passport, function ($query) use ($passport) {
                    $query->where('passport', '=', $passport)
                        ->orWhereNull('passport');
                })
                ->where(function ($res3) use ($request) {
                    if ($request->dateFrom != "" && $request->dateTo != "") {
                        $res3->whereBetween('testdate', [$request->dateFrom, $request->dateTo]);
                    }
                })
                ->get();
        } else {

            $res1 = DB::table('tbtest')
                ->when($passport, function ($query) use ($passport) {
                    $query->where('passport', '=', $passport)
                        ->orWhereNull('passport');
                })
                ->where(function ($res1) use ($request) {
                    if ($request->dateFrom != "" && $request->dateTo != "") {
                        $res1->whereBetween('testdate', [$request->dateFrom, $request->dateTo]);
                    }
                })
                ->get();

            $res2 = DB::table('filariatest')
                ->when($passport, function ($query) use ($passport) {
                    $query->where('passport', '=', $passport)
                        ->orWhereNull('passport');
                })
                ->where(function ($res2) use ($request) {
                    if ($request->dateFrom != "" && $request->dateTo != "") {
                        $res2->whereBetween('testdate', [$request->dateFrom, $request->dateTo]);
                    }
                })
                ->get();

            $res3 = DB::table('malariatest')
                ->when($passport, function ($query) use ($passport) {
                    $query->where('passport', '=', $passport)
                        ->orWhereNull('passport');
                })
                ->where(function ($res3) use ($request) {
                    if ($request->dateFrom != "" && $request->dateTo != "") {
                        $res3->whereBetween('testdate', [$request->dateFrom, $request->dateTo]);
                    }
                })
                ->get();

            $res4 = DB::table('hivtest')
                ->when($passport, function ($query) use ($passport) {
                    $query->where('passport', '=', $passport)
                        ->orWhereNull('passport');
                })
                ->where(function ($res4) use ($request) {
                    if ($request->dateFrom != "" && $request->dateTo != "") {
                        $res4->whereBetween('testdate', [$request->dateFrom, $request->dateTo]);
                    }
                })
                ->get();
        }


        return response()->json(['res1' => $res1, 'res2' => $res2, 'res3' => $res3, 'res4' => $res4]);
    }

    public function dataLoadDppResults(Request $request)
    {
        $barcode = $request->barcode;
        $program = $request->program;

        if ($program == "TB") {

            $res = DB::table('tbtest')
                ->where('barcode', '=', $barcode)
                ->get();
        } elseif ($program == "Filaria") {

            $res = DB::table('filariatest')
                ->where('barcode', '=', $barcode)
                ->get();
        } elseif ($program == "Malaria") {

            $res = DB::table('malariatest')
                ->where('barcode', '=', $barcode)
                ->get();
        } elseif ($program == "HIV") {

            $res = DB::table('hivtest')
                ->where('barcode', '=', $barcode)
                ->get();
        }

        return response()->json(['res' => $res]);
    }

    public function testDismiss(Request $request)
    {
        $serial = $request->serial;
        $program = $request->program;

        if ($program == "TB") {

            DB::table('tbtest')
                ->where('id', '=', $serial)
                ->update(['stat' => false]);
        } elseif ($program == "Filaria") {

            DB::table('filariatest')
                ->where('id', '=', $serial)
                ->update(['stat' => false]);
        } elseif ($program == "Malaria") {

            DB::table('malariatest')
                ->where('id', '=', $serial)
                ->update(['stat' => false]);
        } elseif ($program == "HIV") {

            DB::table('hivtest')
                ->where('id', '=', $serial)
                ->update(['stat' => false]);
        }

        return response()->json(['res' => true]);
    }

    public function passportLoadDrp(Request $request)
    {
        $res = DB::select("select max(ps_id) as id, ps_passp_no from tbl_phlebotomy_sample
left outer join tbl_consultation_main on tbl_phlebotomy_sample.ps_app_no = tbl_consultation_main.cm_app_no
where tbl_consultation_main.category != 'HOLD'
group by tbl_phlebotomy_sample.ps_passp_no");

        return response()->json(['result' => $res]);
    }

    public function appointmentsLoadDrp(Request $request)
    {
        $res = DB::select("select max(ps_id) as id, ps_app_no from tbl_phlebotomy_sample
left outer join tbl_consultation_main on tbl_phlebotomy_sample.ps_app_no = tbl_consultation_main.cm_app_no
where tbl_consultation_main.category != 'HOLD'
group by tbl_phlebotomy_sample.ps_app_no");

        return response()->json(['result' => $res]);
    }

    public function DIEViewDetLoadData(Request $request)
    {
        $id = $request->id;

        $res = DB::table('tbl_phlebotomy_sample')
            ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'tbl_phlebotomy_sample.ps_app_no')
            ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
            ->leftJoin('tbl_sputum_collection', 'tbl_sputum_collection.sc_app_no', '=', 'tbl_phlebotomy_sample.ps_app_no')
            ->leftJoin('tb_test_results', 'tb_test_results.labno', '=', 'tbl_sputum_collection.barcode')
            ->leftJoin('tbl_consultation_main', 'tbl_consultation_main.cm_app_no', '=', 'tbl_phlebotomy_sample.ps_app_no')
            ->select('*')
            ->where('tbl_phlebotomy_sample.ps_id', '=', $id)
            ->get();

        return response()->json(['result' => $res]);
    }

}
