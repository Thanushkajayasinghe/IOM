<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimeDifferenceController extends Controller
{
    public function ViewPage2()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.TokenAverageTime')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }


    public function ViewTimeDifference(Request $request)
    {
        $txtDateFrom = $request->txtDateFrom . " 00:00:00";
        $txtDateTo = $request->txtDateTo . " 23:59:59";

        $result = DB::table('temp_new')
            ->select(
                'temp_new.temp_token_no',
                'temp_new.temp_passport',
                'temp_new.temp_app_no',
                'audittrail.regitration',
                'audittrail.consultation'
            )
            ->join('audittrail', 'audittrail.appno', '=', 'temp_new.temp_app_no')
            ->orderBy('temp_new.temp_id', 'asc')
            ->whereBetween('createddate', [$txtDateFrom, $txtDateTo])
            ->get();

        return response()->json(['result' => $result]);
    }


}
