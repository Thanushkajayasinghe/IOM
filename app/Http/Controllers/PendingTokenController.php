<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendingTokenController extends Controller
{
    //page view
    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.PendingTokens')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function PendingTokensLoad(Request $request)
    {
        $currentOrder = DB::table('change_process_order')->first();

        $cxr = "";
        $phl = "";
        $con = "";

        if ($currentOrder->type == "1") {

            $cxr = DB::table('temp_table')
                ->distinct()
                ->where([
                    ['temp_counsel', '=', 4],
                    ['temp_payment', '=', 4],
                    ['temp_cxr', '=', 1]
                ])
                ->get(['temp_token_no']);

            $phl = DB::table('temp_table')
                ->distinct()
                ->where([
                    ['temp_cxr', '=', 4],
                    ['temp_payment', '=', 4],
                    ['temp_phlebotomy', '=', 1]
                ])
                ->get(['temp_token_no']);

            $date = date('Y-m-d');
            $radiologyVali = DB::table('master_settings')->where('effectivedate', '<=', $date)->orderBy('effectivedate', 'desc')->first();

            if ($radiologyVali->radiologyValidation) {

                $con = DB::table('temp_table')
                    ->distinct()
                    ->where('temp_radiology', 4)
                    ->where([
                        ['temp_phlebotomy', '=', 4],
                        ['temp_consult', '=', 1]
                    ])->count(['temp_token_no']);

            } else {

                $con = DB::table('temp_table')
                    ->distinct()
                    ->where([
                        ['temp_phlebotomy', '=', 4],
                        ['temp_consult', '=', 1]
                    ])->count(['temp_token_no']);
            }

        } else if ($currentOrder->type == "2") {

            $cxr = DB::table('temp_table')
                ->distinct()
                ->where([
                    ['temp_payment', '=', 4],
                    ['temp_cxr', '=', 1]
                ])
                ->where(function ($q) {
                    $q->where('temp_phlebotomy', 5)
                        ->orWhere('temp_phlebotomy', 4);
                })
                ->get(['temp_token_no']);

            $phl = DB::table('temp_table')
                ->distinct()
                ->where([
                    ['temp_counsel', '=', 4],
                    ['temp_payment', '=', 4],
                    ['temp_phlebotomy', '=', 1]
                ])
                ->get(['temp_token_no']);

            $date = date('Y-m-d');
            $radiologyVali = DB::table('master_settings')->where('effectivedate', '<=', $date)->orderBy('effectivedate', 'desc')->first();

            if ($radiologyVali->radiologyValidation) {

                $con = DB::table('temp_table')
                    ->distinct()
                    ->where('temp_radiology', 4)
                    ->where([
                        ['temp_cxr', '=', 4],
                        ['temp_phlebotomy', '=', 4],
                        ['temp_consult', '=', 1]
                    ])
                    ->get(['temp_token_no']);
            } else {

                $con = DB::table('temp_table')
                    ->distinct()
                    ->where([
                        ['temp_cxr', '=', 4],
                        ['temp_phlebotomy', '=', 4],
                        ['temp_consult', '=', 1]
                    ])
                    ->get(['temp_token_no']);
            }
        }

        return response()->json(['cxr' => $cxr, 'phl' => $phl, 'con' => $con]);
    }
}
