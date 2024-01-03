<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IHUReportController extends Controller
{
    //View Page
    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.IHUReport')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function LoadData(Request $request)
    {
        $appDate = $request->date;

        $res = DB::table('temp_new')
            ->leftJoin('tbl_consultation_main', 'tbl_consultation_main.cm_app_no', '=', 'temp_new.temp_app_no')
            ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'temp_new.temp_app_no')
            ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
            ->leftJoin('tbl_registration', 'tbl_registration.reg_app_no', '=', 'temp_new.temp_app_no')
            ->select('*')
            ->whereDate('temp_new.createddate', '=', $appDate)            
            ->get();

        return response()->json(['result' => $res]);
    }

    public function SaveData(Request $request)
    {
        $appNo = $request->appNo;
        $date = $request->date;

        DB::table('temp_new')->whereDate('createddate', $date)->update(
            [
                'printcol' => false
            ]
        );

        DB::table('temp_new')->whereIn('temp_app_no', $appNo)->update(
            [
                'printcol' => true
            ]
        );

        return response()->json(['result' => true]);
    }

    public function ihuReportGen(Request $request)
    {
        $appDate = $request->date;

        $res = DB::table('temp_new')
            ->leftJoin('tbl_consultation_main', 'tbl_consultation_main.cm_app_no', '=', 'temp_new.temp_app_no')
            ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'temp_new.temp_app_no')
            ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
            ->leftJoin('tbl_registration', 'tbl_registration.reg_app_no', '=', 'temp_new.temp_app_no')
            ->select('*')
            ->whereDate('temp_new.createddate', '=', $appDate)
            ->where('cm_order_sputum_sample', '=', '0')
            ->where('printcol', '=', true)
            ->get();

        $pdf = PDF::loadView('Reports.IHUReport', compact('res'));
        return $pdf->stream('IHU_Report.pdf');
    }


}
