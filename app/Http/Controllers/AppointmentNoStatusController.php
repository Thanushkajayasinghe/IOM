<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentNoStatusController extends Controller
{
    public function loadTable(Request $request)
    {
        $res = DB::table('temp_table')
            ->join('audittrail', 'audittrail.appno', '=', 'temp_table.temp_app_no')
            ->orderBy('temp_table.temp_id', 'asc')
            ->get();

        return response()->json(['result' => $res]);
    }
}
