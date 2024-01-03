<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TBSputumReciveController extends Controller
{
//View Page
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.TBSputumRecive')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }


//table data load
//    public function loadData(Request $request)
//    {
//
//        $res = DB::table('dispatch_to_tb_lab')
//            ->where('status', '=', 'Approval')
//            ->orderBy('dtblabid', 'asc')
//            ->get();
//
//        return response()->json(['result' => $res]);
//    }


//Save data
//    public function SaveData(Request $request)
//    {
//
//
//        $date = $request->date;
//        $time = $request->time;
//        $reqArray = $request->arrayToSend;
//        $Cby = Auth::id();
//
//        $tableArrayData[] = array();
//        $arrayData = json_decode($reqArray);
//        $tableArrayData = $arrayData;
//
//
//        foreach ($tableArrayData as $data) {
//            $id = $data[0];
//            $labno = $data[1];
//
//            DB::table('dispatch_to_tb_lab')->where('dtblabid', $id)->update(['status' => "Receive", 'labno' => $labno, 'receivedate' => $date, 'receivetime' => $time, 'receive_Cby' => $Cby]);
//
//        }
//        return response()->json(['result' => true]);
//
//    }


    public function AllData(Request $request)
    {
        $function = $request->function;

//      Load Data
        if ($function == 'LoadData') {
            $res = DB::table('dispatch_to_tb_lab')
                ->where('status', '=', 'Approval')
                ->orderBy('dtblabid', 'asc')
                ->get();

            return response()->json(['result' => $res]);


//      Save Data
        } else if ($function == 'SaveData') {

            $date = $request->date;
            $time = $request->time;
            $reqArray = $request->arrayToSend;
            $Cby = Auth::id();

            $tableArrayData[] = array();
            $arrayData = json_decode($reqArray);
            $tableArrayData = $arrayData;


            foreach ($tableArrayData as $data) {
                $id = $data[0];
                $labno = $data[1];

                DB::table('dispatch_to_tb_lab')->where('dtblabid', $id)->update(['status' => "Receive", 'labno' => $labno, 'receivedate' => $date, 'receivetime' => $time, 'receive_Cby' => $Cby]);

            }
            return response()->json(['result' => true]);
        }
    }

}
