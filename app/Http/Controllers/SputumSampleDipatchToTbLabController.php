<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SputumSampleDipatchToTbLabController extends Controller
{
//    view page
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.SputumSampleDipatchToTbLab')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }


//    table data load
//    public function loadData(Request $request)
//    {
//        $date = $request->date;
//
//        $res = DB::table('test_sample_collection')
//            ->select('*')
//            ->where('date', '=', $date)
//            ->where('status', '=', 'Active')
//            ->get();
//
//        return response()->json(['result' => $res]);
//    }


//    Save data
//    public function SaveData(Request $request)
//    {
//
//        $colldat = $request->colldat;
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
//            $barcod = $data[1];
//
//            DB::table('test_sample_collection')->where('samcollid', $id)->update(['status' => "Verify"]);
//
//            DB::table('dispatch_to_tb_lab')->insert(
//                ['samplecollectiondate' => "$colldat", 'barcode' => "$barcod", 'samplecollectionid' => "$id",
//                    'date' => "$date", 'time' => $time, 'status' => "Verify", 'verify_Cby' => $Cby]
//            );
//
//        }
//        return response()->json(['result' => true]);
//
//    }


    public function AllData(Request $request)
    {
        $function = $request->function;

//        Load Data
        if ($function == 'LoadData') {
            $date = $request->date;

            $res = DB::table('tbl_sputum_collection')
                ->select('*')
                ->where('date', '=', $date)
                ->where('sc_ok', '=', '1')
                ->get();

            return response()->json(['result' => $res]);


//      Save Data
        } else if ($function == 'SaveData') {
            $colldat = $request->colldat;
            $date = $request->date;
            $time = $request->time;
            $reqArray = $request->arrayToSend;
            $Cby = Auth::id();

            $tableArrayData[] = array();
            $arrayData = json_decode($reqArray);
            $tableArrayData = $arrayData;


            foreach ($tableArrayData as $data) {
                $id = $data[0];
                $barcod = $data[1];

                DB::table('tbl_sputum_collection')->where('sc_id', $id)->update(['sc_ok' => "3"]);

                DB::table('dispatch_to_tb_lab')->insert(
                    ['samplecollectiondate' => "$colldat", 'barcode' => "$barcod", 'samplecollectionid' => "$id",
                        'date' => "$date", 'time' => $time, 'status' => "Verify", 'verify_Cby' => $Cby]
                );

            }
            return response()->json(['result' => true]);

        }
    }

}
