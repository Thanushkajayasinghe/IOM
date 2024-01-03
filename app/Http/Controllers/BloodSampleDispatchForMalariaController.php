<?php
/**
 * Created by PhpStorm.
 * User: Nishantha
 * Date: 2/5/2019
 * Time: 11:35 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BloodSampleDispatchForMalariaController
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.BloodSampleDispatchForMalaria')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }


    public function Process(Request $request)
    {

        $function = $request->function;


        if ($function == 'LodeActiveSample') {

            $selectedDate = $request->selectedDate;

            $resp = DB::table('tbl_phlebotomy_sample')
                ->select('tbl_phlebotomy_sample.ps_id',
                    'tbl_phlebotomy_sample.ps_app_no',
                    'tbl_phlebotomy_sample.ps_passp_no',
                    'tbl_phlebotomy_sample.ps_hiv_barcode',
                    'tbl_phlebotomy_sample.ps_malaria_barcode',
                    'tbl_phlebotomy_sample.ps_filaria_barcode',
                    'tbl_phlebotomy_sample.hiv_status',
                    'tbl_phlebotomy_sample.malaria_status',
                    'tbl_phlebotomy_sample.filaria_status'
                )
                ->whereDate('tbl_phlebotomy_sample.ps_sample_col_1', '=', $selectedDate)
                ->where(function ($query) {
                    $query->orWhere('hiv_status', '=', 'Active')
                        ->orWhere('malaria_status', '=', 'Active')
                        ->orWhere('filaria_status', '=', 'Active');
                })
                ->get();


            return response()->json(['result' => $resp]);


        } else if ($function == 'DispatchMalaria') {
            $reqArray = $request->arrayToSend;
            $approveDate = $request->approveDate;
            $approveTime = $request->approveTime;
            $datetime = date('Y-m-d H:i:s');
            $Cby = Auth::id();

            $tableArrayData[] = array();
            $arrayData = json_decode($reqArray);
            $tableArrayData = $arrayData;


            foreach ($tableArrayData as $data) {
                $id = $data[0];
                $barcode = $data[1];
                $barcode_first_chr = substr($barcode, 0, 1);

                if ($barcode_first_chr == "H") {
                    DB::table('tbl_phlebotomy_sample')->where('ps_id', $id)->update(['hiv_status' => "Dispatch"]);
                } else if ($barcode_first_chr == "M") {
                    DB::table('tbl_phlebotomy_sample')->where('ps_id', $id)->update(['malaria_status' => "Dispatch"]);
                } else if ($barcode_first_chr == "F") {
                    DB::table('tbl_phlebotomy_sample')->where('ps_id', $id)->update(['filaria_status' => "Dispatch"]);
                }

//               DB::table('tbl_phlebotomy_sample')->where('ps_id', $id)->update(['status' => "Dispatch"]);

                DB::table('dispatch_to_maleria_labs')->insert(
                    ['samplecollectiondate' => "$approveDate", 'samplecollectionid' => "$id", 'barcode' => "$barcode",
                        'date' => "$approveDate", 'time' => $approveTime, 'status' => "Dispatch", 'verify_Cby' => $Cby
                        , 'created_at' => $datetime
                    ]
                );

            }
            return response()->json(['result' => true]);
        }


    }
}