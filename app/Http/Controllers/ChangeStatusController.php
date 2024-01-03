<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChangeStatusController extends Controller
{

    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.ChangeStatus')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function AllData(Request $request)
    { 
        $command = $request->command;

        if ($command == 'LoadAllData') {

            $BCresult = DB::table('temp_table')
                ->orderBy('temp_token_no', 'ASC')
                ->orderBy('temp_app_no', 'ASC')
                ->get();

            if (!empty($BCresult)) {
                return response()->json(['result' => $BCresult]);
            } else if (empty($BCresult)) {
                return response()->json('Not Available');
            }

        } else if ($command == "UpdateCellData") {

            $appno = $request->appno;
            $val = $request->val;
            $Type = $request->Type;

            if ($Type == "RegisterStat") {

                DB::table('temp_table')
                    ->where('temp_app_no', $appno)
                    ->update(['temp_reg' => $val]);

                DB::table('temp_table')
                    ->where('temp_reg', 4)
                    ->update(['temp_reg_counter' => 0]);

            } else if ($Type == "RegistrationCounterStat") {

                DB::table('temp_table')
                    ->where('temp_app_no', $appno)
                    ->update(['temp_reg_counter' => $val]);

                DB::table('temp_table')
                    ->where('temp_reg', 4)
                    ->update(['temp_reg_counter' => 0]);

            } else if ($Type == "CounsellingStat") {

                DB::table('temp_table')
                    ->where('temp_app_no', $appno)
                    ->update(['temp_counsel' => $val]);

                DB::table('temp_table')
                    ->where('temp_counsel', 4)
                    ->update(['temp_counsel_counter' => 0]);

            } else if ($Type == "CounsellingCounterStat") {

                DB::table('temp_table')
                    ->where('temp_app_no', $appno)
                    ->update(['temp_counsel_counter' => $val]);

                DB::table('temp_table')
                    ->where('temp_counsel', 4)
                    ->update(['temp_counsel_counter' => 0]);

            } else if ($Type == "CounsellingTabStat") {

                DB::table('temp_table')
                    ->where('temp_app_no', $appno)
                    ->update(['tab_no' => $val]);

            } else if ($Type == "CXRStat") {

                DB::table('temp_table')
                    ->where('temp_app_no', $appno)
                    ->update(['temp_cxr' => $val]);

                DB::table('temp_table')
                    ->where('temp_cxr', 4)
                    ->update(['temp_cxr_counter' => 0]);

            } else if ($Type == "CXRCounterStat") {

                DB::table('temp_table')
                    ->where('temp_app_no', $appno)
                    ->update(['temp_cxr_counter' => $val]);

                DB::table('temp_table')
                    ->where('temp_cxr', 4)
                    ->update(['temp_cxr_counter' => 0]);

            } else if ($Type == "RadiologyStat") {

                DB::table('temp_table')
                    ->where('temp_app_no', $appno)
                    ->update(['temp_radiology' => $val]);

                DB::table('temp_table')
                    ->where('temp_radiology', 4)
                    ->update(['temp_radiology_counter' => 0]);

                DB::table('temp_table')
                    ->where('temp_radiology', 1)
                    ->update(['temp_radiology_counter' => null]);

            } else if ($Type == "RadiologyCounterStat") {

                if ($val == "") {
                    $val = null;
                }
                DB::table('temp_table')
                    ->where('temp_app_no', $appno)
                    ->update(['temp_radiology_counter' => $val]);

                DB::table('temp_table')
                    ->where('temp_radiology', 4)
                    ->update(['temp_cxr_counter' => 0]);

                DB::table('temp_table')
                    ->where('temp_radiology', 1)
                    ->update(['temp_radiology_counter' => null]);

            } else if ($Type == "PhlStat") {

                DB::table('temp_table')
                    ->where('temp_app_no', $appno)
                    ->update(['temp_phlebotomy' => $val]);

                DB::table('temp_table')
                    ->where('temp_cxr', 4)
                    ->update(['temp_phlebotomy_counter' => 0]);

            } else if ($Type == "PhlCounterStat") {

                DB::table('temp_table')
                    ->where('temp_app_no', $appno)
                    ->update(['temp_phlebotomy_counter' => $val]);

                DB::table('temp_table')
                    ->where('temp_phlebotomy', 4)
                    ->update(['temp_phlebotomy_counter' => 0]);

            } else if ($Type == "ConsultStat") {

                DB::table('temp_table')
                    ->where('temp_app_no', $appno)
                    ->update(['temp_consult' => $val]);

                DB::table('temp_table')
                    ->where('temp_consult', 4)
                    ->update(['temp_consult_counter' => 0]);

            } else if ($Type == "ConsultCounterStat") {

                DB::table('temp_table')
                    ->where('temp_app_no', $appno)
                    ->update(['temp_consult_counter' => $val]);

                DB::table('temp_table')
                    ->where('temp_consult', 4)
                    ->update(['temp_consult_counter' => 0]);

            }

            return response()->json(['result' => true]);


        } else if ($command == "tokenNoLookUp") {

            $tokenNo = $request->tokenNo;

            $BCresult = DB::table('temp_table')
                ->where('temp_token_no', $tokenNo)
                ->orderBy('temp_app_no', 'ASC')
                ->get();

            $Count = $BCresult->count();

            if ($Count > 0) {
                return response()->json(['result' => $BCresult]);
            } else {
                return response()->json('false');
            }

        } else if ($command == "GetBarcodeList") {

            $dateFrom = $request->dateFrom;
            $dateTo = $request->dateTo;

            $BCresult = DB::select('SELECT COALESCE(ps_hiv_barcode, ps_malaria_barcode, ps_filaria_barcode, ps_shcg_barcode) as barcode, ps_app_no, ps_passp_no, ps_sample_col_1, ps_sample_col_2 from tbl_phlebotomy_sample tps
                         where (ps_sample_col_1 between \'' . $dateFrom . '\' and \'' . $dateTo . '\') AND ');


            return response()->json(['result' => $BCresult]);

        }

    }

}
