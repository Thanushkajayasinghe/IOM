<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BloodSampleReceiveMalariaController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.BloodSampleReceiveMalaria')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function AllFun(Request $request)
    {
        $function = $request->function;

        if ($function == 'loadData') {

            $res = DB::table('dispatch_to_maleria_labs')
                ->where('status', '=', 'Dispatch')
                ->orderBy('dtblabid', 'asc')
                ->get();

            return response()->json(['result' => $res]);

        } elseif ($function == 'receiveData') {

            $serial = $request->serial;
            $labNo = $request->labNo;
            $date = $request->date;
            $time = $request->time;
            $Cby = Auth::id();
            $datetime = date('Y-m-d H:i:s');

            DB::table('dispatch_to_maleria_labs')
                ->where('dtblabid', '=', $serial)
                ->update(['status' => 'Received', 'labno' => $labNo, 'receivedate' => $date, 'receivetime' => $time, 'receive_Cby' => $Cby, 'updated_at' => $datetime]);

            return response()->json(['result' => true]);

        }
    }
}
