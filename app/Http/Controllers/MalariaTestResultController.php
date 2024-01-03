<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MalariaTestResultController extends Controller
{
    //page view
    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.MalariaTestResult')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function saveData(Request $request)
    {

        $labno = $request->labno;
        $rslt = $request->rslt;
        $date = $request->date;
        $time = $request->time;
        $remark = $request->remark;


        $labb = DB::table('malaria_test_results')->where('labno', $labno)->first();

        if ($labb == "") {
            DB::table('malaria_test_results')->insert(
                ['labno' => "$labno", 'result' => "$rslt", 'date' => $date, 'time' => $time, 'remark' => "$remark"]
            );


            return response()->json(['result' => true]);
        } else {
            return response()->json(['result' => false]);
        }

    }
}
