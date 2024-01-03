<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfirmatoryTestResultsController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.ConfirmatoryTestResults')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function CRUD(Request $request)
    {
        $command = $request->command;

        if ($command == 'check') {

            $barcode = $request->barcode;

            $rowCountConfirmatory = DB::table('tbl_confirmatorytestresults')
                ->select('ctr_appno')
                ->where('ctr_barcode', $barcode)
                ->count();

            if ($rowCountConfirmatory == 0) {

                $BCcount = DB::table('tbl_phlrapidtestresults')
                    ->select('prtr_appno')
                    ->where('prtr_barcode', $barcode)
                    ->first();

                $ps_app_no = $BCcount->prtr_appno;

                $details2 = DB::table('register_applicant_details')
                    ->select('DateOfBirth', 'Gender')
                    ->where('AppointmentNumber', $ps_app_no)
                    ->first();

                $r2 = $details2->Gender;
                $r3 = $details2->DateOfBirth;

                //---------get malaria Test result-----------------------------------

                $malaria = DB::table('tbl_phlrapidtestresults')
                    ->select('prtr_appno', 'prtr_result', 'prtr_comment')
                    ->where('prtr_barcode', $barcode)
                    ->where('prtr_test', 'Malaria')
                    ->where('prtr_appno', $ps_app_no)
                    ->first();

                $HIV = DB::table('tbl_phlrapidtestresults')
                    ->select('prtr_appno', 'prtr_result', 'prtr_comment')
                    ->where('prtr_barcode', $barcode)
                    ->where('prtr_test', 'HIV')
                    ->where('prtr_appno', $ps_app_no)
                    ->first();

                $Filaria = DB::table('tbl_phlrapidtestresults')
                    ->select('prtr_appno', 'prtr_result', 'prtr_comment')
                    ->where('prtr_barcode', $barcode)
                    ->where('prtr_test', 'Filaria')
                    ->where('prtr_appno', $ps_app_no)
                    ->first();

                $SHCG = DB::table('tbl_phlrapidtestresults')
                    ->select('prtr_appno', 'prtr_result', 'prtr_comment')
                    ->where('prtr_barcode', $barcode)
                    ->where('prtr_test', 'SHCG')
                    ->where('prtr_appno', $ps_app_no)
                    ->first();

                return response()->json(['result2' => 'DataHave', 'r2' => $r2, 'r3' => $r3, 'malaria' => $malaria, 'HIV' => $HIV, 'Filaria' => $Filaria, 'SHCG' => $SHCG]);
            } else {

                return response()->json(['result2' => 'AlreadySaved']);
            }
        } else if ($command === 'save') {

            $Barcode = $request->Barcode;
            $appno = $request->appno;
            $reqArray = $request->rslt;

            $tableArrayData[] = array();
            $arrayData = json_decode($reqArray);
            $tableArrayData = $arrayData;

            foreach ($tableArrayData as $data) {

                $res = $data[0];
                $com = $data[1];
                $Test = $data[2];

                $count = DB::table('tbl_confirmatorytestresults')
                    ->select('ctr_appno')
                    ->where('ctr_appno', $appno)
                    ->where('ctr_test', $Test)
                    ->count();

                if ($count > 0) {

                    DB::table('tbl_confirmatorytestresults')
                        ->where('ctr_appno', $appno)
                        ->where('ctr_test', $Test)
                        ->update(
                            ['ctr_barcode' => $Barcode, 'ctr_result' => $res, 'ctr_comment' => $com, 'ctr_status' => 'OK',]
                        );
                } else {

                    DB::table('tbl_confirmatorytestresults')->insert([
                        [
                            'ctr_appno' => $appno,
                            'ctr_barcode' => $Barcode,
                            'ctr_test' => $Test,
                            'ctr_result' => $res,
                            'ctr_comment' => $com,
                            'ctr_status' => 'OK',
                        ]
                    ]);
                }
            }

            return response()->json(['Done']);
        } else if ($command == 'appBarload') {

            $appno = $request->appno;

            $row = DB::table('tbl_confirmatorytestresults')
                ->select('ctr_barcode')
                ->where('ctr_appno', $appno)
                ->first();

            return response()->json(['result' => $row]);
        }
    }
}
