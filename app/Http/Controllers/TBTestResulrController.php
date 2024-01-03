<?php

namespace App\Http\Controllers;

use App\tbTestResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TBTestResulrController extends Controller
{

//page view
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.TBTestResult')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }


//Save form data
    public function saveData(Request $request)
    {

        $labno = $request->labno;
		$appNo = $request->appNo;
        $genexpert = $request->genexpert;
        $afb = $request->afb;
        $liquidculture = $request->liquidculture;
        $solidculture = $request->solidculture;
        $drugsensitivity = $request->drugsensitivity;
        $drugdetail = $request->drugdetail;
        $date = $request->date;
        $time = $request->time;


        $user = DB::table('tb_test_results')->where('barcode', $labno)->first();

        if ($user == "") {
            DB::table('tb_test_results')->insert(
                ['barcode' => "$labno", 'appointment_no' => $appNo, 'genexpert' => "$genexpert", 'afb' => "$afb",
                    'liquidculture' => "$liquidculture", 'solidculture' => "$solidculture", 'drugsensitivity' => "$drugsensitivity",
                    'drugdetail' => "$drugdetail", 'date' => $date, 'time' => $time]
            );
			

            return response()->json(['result' => true]);
        } else {
            return response()->json(['result' => false]);
        }


    }
}
