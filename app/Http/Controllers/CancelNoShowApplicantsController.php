<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CancelNoShowApplicantsController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.CancelApplicants')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function AllFun(Request $request)
    {
        $function = $request->function;

        if ($function == 'loadData') {

            $res = DB::table('temp_table')
                ->leftJoin('register_applicant_details', function ($join) {
                    $join->on('temp_table.temp_app_no', '=', 'register_applicant_details.AppointmentNumber');
                })
                ->where('temp_table.temp_reg', '=', 3)
                ->orWhere('temp_table.temp_counsel', '=', 3)
                ->orWhere('temp_table.temp_cxr', '=', 3)
                ->orWhere('temp_table.temp_phlebotomy', '=', 3)
                ->orWhere('temp_table.temp_payment', '=', 3)
                ->orWhere('temp_table.temp_consult', '=', 3)
                ->orWhere('temp_table.temp_sputum', '=', 3)
                ->orderBy('temp_table.temp_id', 'asc')
                ->get();

            return response()->json(['result' => $res]);

        } elseif ($function == 'loadDataUsingDateRange') {

            $dateFrom = $request->dateFrom;
            $dateTo = $request->dateTo;

            $res = DB::table('temp_table')
                ->leftJoin('register_applicant_details', function ($join) {
                    $join->on('temp_table.temp_app_no', '=', 'register_applicant_details.AppointmentNumber');
                })
//                ->whereBetween('temp_table.temp_date', array($dateFrom, $dateTo))
                ->where(function ($query) {
                    $query->where('temp_table.temp_reg', '=', 3)
                        ->orWhere('temp_table.temp_counsel', '=', 3)
                        ->orWhere('temp_table.temp_cxr', '=', 3)
                        ->orWhere('temp_table.temp_phlebotomy', '=', 3)
                        ->orWhere('temp_table.temp_payment', '=', 3)
                        ->orWhere('temp_table.temp_consult', '=', 3)
                        ->orWhere('temp_table.temp_sputum', '=', 3);
                })
                ->orderBy('temp_table.temp_id', 'asc')
                ->get();

            return response()->json(['result' => $res]);

        } elseif ($function == 'cancelNoShowApplicant') {

            $serial = $request->serial;
            $datetime = date('Y-m-d H:i:s');

            $res = DB::table('cancel_no_show_applicants')
                ->insert(
                    ['temp_id' => "$serial", 'created_at' => $datetime]
                );

            return response()->json(['result' => $res]);
        }
    }
}
