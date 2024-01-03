<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReferralApprovalController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.ReferalApprovals')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function ReferralApprovals(Request $request)
    {
        $command = $request->command;
        $res = "";

        if ($command == 'loadData') {

            $referToAfc = DB::table('refer_to_afc')->select(\DB::raw("registration_no, refer, test_result, 'refer_to_afc' as status, \"afcId\" as serial, 'afcId' as col"))->whereNull('status');
            $referToMalaria = DB::table('refer_to_malaria')->select(\DB::raw("registration_no, refered as refer, test_result, 'refer_to_malaria' as status, \"malariaRefId\" as serial, 'malariaRefId' as col"))->whereNull('status');
            $referToNsacpHivElisa = DB::table('refer_to_nsacp_hiv_elisa')->select(\DB::raw("registration_no, refered as refer, '' as test_result, 'refer_to_nsacp_hiv_elisa' as status, \"nsacpRefId\" as serial, 'nsacpRefId' as col"))->whereNull('status');

            $res = DB::table('refer_to_tb')->select(\DB::raw("registration_no, refferd as refer, test_result, 'refer_to_tb' as status, \"tbId\" as serial, 'tbId' as col"))->whereNull('status')
                ->union($referToAfc)
                ->union($referToMalaria)
                ->union($referToNsacpHivElisa)
                ->get();

        } else if ($command == 'approve') {

            $serial = $request->serial;
            $table = $request->table;
            $col = $request->col;

            DB::table($table)->where([
                [$col, '=', $serial]
            ])->update(['status' => "Approved"]);

            $res = true;
        }


        return response()->json(['result' => $res]);
    }
}
