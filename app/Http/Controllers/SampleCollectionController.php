<?php

namespace App\Http\Controllers;

use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SampleCollectionController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.SampleCollection')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function CRUD(Request $request)
    {
        $command = $request->command;

        if ($command === 'data') {

            $appointment = $request->appointment;
            $passport = DB::table('tbl_consultation_main')
                ->where('cm_pass_no', $appointment)
                ->value('cm_app_no');
            return response()->json($passport);


        } else if ($command === 'load') {
            $today = date('Y-m-d');
            $appno = DB::table('tbl_consultation_main')
                ->select('cm_pass_no')
                ->where('cm_day1', $today)
//                ->orWhere('cm_day2', $today)
//                ->orWhere('cm_day3', $today)
                ->get();
            return response()->json($appno);


        } else if ($command === 'save') {
            DB::table('tbl_sputum_collection')->insert([
                [
                    'sc_app_no' => $request->appno,
                    'sc_ppno_no' => $request->ppno,
                    'sc_ok' => $request->verified,
                    'barcode' => $request->barcode,
                    'date' => date('Y-m-d')
                ]
            ]);

            DB::table('temp_table')
                ->where('temp_app_no', $request->appno)
                ->update(['temp_sputum' => 4]);

            $barcod = $request->barcode;
            $barcode = new BarcodeGenerator();
            $barcode->setText($barcod);
            $barcode->setType(BarcodeGenerator::Code128);
            $barcode->setScale(2);
            $barcode->setThickness(25);
            $barcode->setFontSize(10);
            $code = $barcode->generate();

            return response()->json([$code]);

//      return response()->json(['Done']);
        }


    }
}
