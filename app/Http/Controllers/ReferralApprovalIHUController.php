<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReferralApprovalIHUController extends Controller
{
    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.ReferralApprovalIHU')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function ReferralApprovalsIHU(Request $request)
    {
        $function = $request->function;
        $res = "";

        if ($function == 'loadData') {

            $referToAfc = DB::table('refer_to_afc')->select(\DB::raw("registration_no, refer, test_result, 'refer_to_afc' as status, \"afcId\" as serial, 'afcId' as col"))
                ->where([
                    ['status', '=', 'Approved'],
                    ['status_ihu', '=', null],
                ]);
            $referToMalaria = DB::table('refer_to_malaria')->select(\DB::raw("registration_no, refered as refer, test_result, 'refer_to_malaria' as status, \"malariaRefId\" as serial, 'malariaRefId' as col"))
                ->where([
                    ['status', '=', 'Approved'],
                    ['status_ihu', '=', null],
                ]);
            $referToNsacpHivElisa = DB::table('refer_to_nsacp_hiv_elisa')->select(\DB::raw("registration_no, refered as refer, '' as test_result, 'refer_to_nsacp_hiv_elisa' as status, \"nsacpRefId\" as serial, 'nsacpRefId' as col"))
                ->where([
                    ['status', '=', 'Approved'],
                    ['status_ihu', '=', null],
                ]);

            $res = DB::table('refer_to_tb')->select(\DB::raw("registration_no, refferd as refer, test_result, 'refer_to_tb' as status, \"tbId\" as serial, 'tbId' as col"))
                ->where([
                    ['status', '=', 'Approved'],
                    ['status_ihu', '=', null],
                ])
                ->union($referToAfc)
                ->union($referToMalaria)
                ->union($referToNsacpHivElisa)
                ->get();

        } elseif ($function == 'approve') {
            $serial = $request->serial;
            $table = $request->table;
            $col = $request->col;

            DB::table($table)->where([
                [$col, '=', $serial]
            ])->update(['status_ihu' => "Approved"]);

            $res = true;
        }

        return response()->json(['result' => $res]);
    }
}
