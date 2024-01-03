<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class DisplayController extends Controller
{

    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.SampleCollectionMainDisplay')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function ViewPageConsult()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.ConsultionMainDisplay')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function ViewPageCXR()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.CXRMainDisplay')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function ViewPageRegister()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.RegistrationMainDisplay')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function Read(Request $request)
    {
        if ($request->command === 'Coun') {

            $CounterNo = DB::table('tbl_queue_mgt_set')
                ->select('qms_counter_no')
                ->where('qms_counter', 'Counseling')
                ->get();
            return response()->json($CounterNo);

        } elseif ($request->command === 'cxr') {

            $CounterNo = DB::table('tbl_queue_mgt_set')
                ->select('qms_counter_no')
                ->where('qms_counter', 'Radiography')
                ->orderBy('qms_counter_no')
                ->get();
            return response()->json($CounterNo);

        } elseif ($request->command === 'sampleCol') {

            $CounterNo = DB::table('tbl_queue_mgt_set')
                ->select('qms_counter_no')
                ->where('qms_counter', 'Phlebotomy')
                ->orderBy('qms_counter_no')
                ->get();
            return response()->json($CounterNo);

        } elseif ($request->command === 'register') {

            $CounterNo = DB::table('tbl_queue_mgt_set')
                ->select('qms_counter_no')
                ->where('qms_counter', 'Registration')
                ->orderBy('qms_counter_no', 'asc')
                ->get();
            return response()->json($CounterNo);

        } elseif ($request->command === 'consultation') {

            $CounterNo = DB::table('tbl_queue_mgt_set')
                ->select('qms_counter_no')
                ->where('qms_counter', 'Consultation')
                ->orderBy('qms_counter_no')
                ->get();
            return response()->json($CounterNo);

        } elseif ($request->command === 'loadUserGroups') {

            $userGrpName = $request->userGrpName;

            $userGrp = DB::table('user_group')
                ->select('group_serial')
                ->where('group_name', '=', $userGrpName)
                ->get();

            return response()->json(['result' => $userGrp]);

        } elseif ($request->command === 'tokensCxr') {

            $process = DB::table('change_process_order')
                ->select('type')
                ->first();

            $proType = $process->type;

            if ($proType == 1) {

                $usergroup = $request->counter;

                $tokenno = DB::table('temp_table')->select('temp_token_no')
                    ->groupBy('temp_token_no')
                    ->where('temp_cxr_counter', $usergroup)
                    ->where('temp_counsel', 4)
                    ->where(function ($query) {
                        $query->where('temp_cxr', '=', 2)
                            ->orWhere('temp_cxr', '=', 4);
                    })
                    ->get();

                return response()->json(['result' => $tokenno]);

            } elseif ($proType == 2) {

                $usergroup = $request->counter;

                $tokenno = DB::table('temp_table')->select('temp_token_no')
                    ->groupBy('temp_token_no')
                    ->where('temp_cxr_counter', $usergroup)
                    ->where('temp_phlebotomy', 4)
                    ->where(function ($query) {
                        $query->where('temp_cxr', '=', 2)
                            ->orWhere('temp_cxr', '=', 4);
                    })
                    ->get();

                return response()->json(['result' => $tokenno]);

            }

        } elseif ($request->command === 'tokensSampleCol') {

            $process = DB::table('change_process_order')
                ->select('type')
                ->first();

            $proType = $process->type;

            if ($proType == 1) {

                $usergroup = $request->counter;

                $tokenno = DB::table('temp_table')->select('temp_token_no')
                    ->groupBy('temp_token_no')
                    ->where('temp_phlebotomy_counter', $usergroup)
                    ->where('temp_cxr', 4)
                    ->where(function ($query) {
                        $query->where('temp_phlebotomy', '=', 2)
                            ->orWhere('temp_phlebotomy', '=', 4);
                    })
                    ->get();

                return response()->json(['result' => $tokenno]);

            } else {

                $usergroup = $request->counter;

                $tokenno = DB::table('temp_table')->select('temp_token_no')
                    ->groupBy('temp_token_no')
                    ->where('temp_phlebotomy_counter', $usergroup)
                    ->where('temp_counsel', 4)
                    ->where(function ($query) {
                        $query->where('temp_phlebotomy', '=', 2)
                            ->orWhere('temp_phlebotomy', '=', 4);
                    })
                    ->get();

                return response()->json(['result' => $tokenno]);

            }
        } elseif ($request->command === 'tokensRegister') {

            $usergroup = $request->counter;

            $resp = DB::table('temp_table')
                ->groupBy('temp_token_no', 'temp_reg_counter')
                ->where('temp_reg_counter', $usergroup)
                ->where('temp_reg', 2)
                ->get(['temp_token_no', 'temp_reg_counter']);

            return response()->json(['result' => $resp]);

        } else if ($request->command === 'tokens') {

            $usergroup = $request->counter;

            $tokenno = DB::table('temp_table')->select('temp_token_no')
                ->groupBy('temp_token_no')
                ->where('temp_counsel_counter', $usergroup)
                ->where('temp_reg', 4)
                ->where(function ($query) {
                    $query->where('temp_counsel', '=', 2)
                        ->orWhere('temp_counsel', '=', 4)
                        ->orWhere('temp_counsel', '=', 5);
                })
                ->orderBy('temp_token_no')
                ->get();

            return response()->json(['result' => $tokenno]);

        } else if ($request->command === 'tokensCon') {

            $process = DB::table('change_process_order')
                ->select('type')
                ->first();

            $proType = $process->type;

            if ($proType == 1) {

                $usergroup = $request->counter;

                $tokenno = DB::table('temp_table')->select('temp_token_no')
                    ->groupBy('temp_token_no')
                    ->where('temp_consult_counter', $usergroup)
                    ->where('temp_phlebotomy', 4)
                    ->where(function ($query) {
                        $query->where('temp_consult', '=', 2)
                            ->orWhere('temp_consult', '=', 4);
                    })
                    ->get();

                return response()->json(['result' => $tokenno]);

            } else {

                $usergroup = $request->counter;

                $tokenno = DB::table('temp_table')->select('temp_token_no')
                    ->groupBy('temp_token_no')
                    ->where('temp_consult_counter', $usergroup)
                    ->where('temp_cxr', 4)
                    ->where(function ($query) {
                        $query->where('temp_consult', '=', 2)
                            ->orWhere('temp_consult', '=', 4);
                    })
                    ->get();

                return response()->json(['result' => $tokenno]);

            }
        } else if ($request->command === 'checkCounterOperating') {

            $counterName = $request->counterName;

            $counter = DB::table('tbl_queue_mgt_set')
                ->select('qms_counter_no')
                ->where('qms_counter', '=', $counterName)
                ->where('qms_in_operation', '=', false)
                ->get();

            return response()->json(['result' => $counter]);
        }

    }
}

/*
$tokenno = DB::table('temp_table')->select('temp_token_no','temp_counsel_counter')
->where('temp_counsel', 1)
->where('temp_reg',4)
->orderBy('temp_counsel_counter')
->get();
$counter
foreach ($tokenno as $tokenno) {
 $tokenno
}

return response()->json($tokenno);

foreach ($variable as $key => $value) {
// code...
}

 return response()->json($tokenno);


*/
