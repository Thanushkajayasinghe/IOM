<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhlebotomyRapidTestResultsController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.PhlebotomyRapidTestResults')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function CRUD(Request $request)
    {
        $command = $request->command;
        if ($command == 'check') {

            $barcode = $request->barcode;

            $BCcount = DB::table('tbl_phlrapidtestresults')
                ->where('prtr_barcode', $barcode)
                ->count();

            if ($BCcount == 0) {

                $result = DB::table('tbl_phlebotomy_sample')
                    ->select('ps_app_no', 'ps_hiv_barcode', 'ps_malaria_barcode', 'ps_filaria_barcode', 'ps_shcg_barcode')
                    ->where('ps_hiv_barcode', $barcode)
                    ->orWhere('ps_malaria_barcode', $barcode)
                    ->orWhere('ps_filaria_barcode', $barcode)
                    ->orWhere('ps_shcg_barcode', $barcode)
                    ->get();

                if (!empty($result)) {
                    $Appno = DB::table('tbl_phlebotomy_sample')
                        ->select('ps_app_no')
                        ->where(function ($query) use ($barcode) {
                            $query->where('ps_hiv_barcode', '=', $barcode)
                                ->orWhere('ps_filaria_barcode', '=', $barcode)
                                ->orWhere('ps_shcg_barcode', '=', $barcode)
                                ->orWhere('ps_malaria_barcode', '=', $barcode);
                        })
                        ->first();

                    $ps_app_no = $Appno->ps_app_no;
                    $details = DB::table('register_applicant_details')
                        ->select('DateOfBirth', 'Gender')
                        ->where('AppointmentNumber', $ps_app_no)
                        ->first();

                    $r2 = $details->Gender;
                    $r3 = $details->DateOfBirth;
                    return response()->json(['result' => $result, 'r2' => $r2, 'r3' => $r3]);
                } else if (empty($result)) {
                    return response()->json('Not Available');
                }

            } else {

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
//                    ---------get malaria Test result-----------------------------------
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

                $count = DB::table('tbl_phlrapidtestresults')
                    ->select('prtr_appno')
                    ->where('prtr_appno', $appno)
                    ->where('prtr_test', $Test)
                    ->count();

                if ($count > 0) {
                    DB::table('tbl_phlrapidtestresults')
                        ->where('prtr_appno', $appno)
                        ->where('prtr_test', $Test)
                        ->update(
                            ['prtr_barcode' => $Barcode, 'prtr_result' => $res, 'prtr_comment' => $com, 'status' => 'OK',]
                        );
                } else {
                    DB::table('tbl_phlrapidtestresults')->insert([
                        [
                            'prtr_appno' => $appno,
                            'prtr_barcode' => $Barcode,
                            'prtr_test' => $Test,
                            'prtr_result' => $res,
                            'prtr_comment' => $com,
                            'status' => 'OK',
                        ]
                    ]);
                }

            }

            return response()->json(['Done']);
        }
    }


}
