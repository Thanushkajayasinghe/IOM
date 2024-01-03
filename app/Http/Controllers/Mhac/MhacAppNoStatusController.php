<?php

namespace App\Http\Controllers\Mhac;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MhacAppNoStatusController extends Controller
{
    public function loadTable(Request $request)
    {
        $res = DB::table('mhac_temp_table')
        ->leftJoin('mhac_audittrail', 'mhac_audittrail.appno', '=', 'mhac_temp_table.appointment_no')
        ->leftJoin('mhac_payment_counter', 'mhac_payment_counter.pc_app_no', '=', 'mhac_temp_table.appointment_no')
        ->orderBy('mhac_temp_table.id', 'asc')
        ->get();
    
    return response()->json(['result' => $res]);
    
    }
} 
