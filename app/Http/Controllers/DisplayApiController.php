<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DisplayApiController extends Controller
{

    public function RegistrationMainDisplayApi(Request $request)
    {
        $resp = DB::table('temp_table')
            ->groupBy('temp_token_no', 'temp_reg_counter')
            ->where('temp_reg', 2)
            ->get(['temp_token_no', 'temp_reg_counter']);

        return response()->json(['result' => $resp]);
    }


    public function RegistrationMainDisplayApiAudio(Request $request)
    {
        $resp = DB::table('temp_table')
            ->orderBy('temp_token_no')
            ->where('temp_reg', 2)
            ->where('temp_reg_counter', '!=', 0)
            ->whereNull('registrationAudio')
            ->distinct()
            ->first(['temp_token_no', 'temp_reg_counter', 'temp_id']);

        return response()->json(['result' => $resp]);
    }


    public function RegistrationMainDisplayApiAudio_Complete(Request $request)
    {
        $tokenNo = $request->appToken;

        DB::table('temp_table')->where([
            ['temp_token_no', '=', $tokenNo]
        ])->update(['registrationAudio' => "1"]);

    }


    // ----------------------------------------------------------------------------------------------------------------------------------------


    public function CounselingMainDisplayApi(Request $request)
    {
        $tokenno = DB::table('temp_table')
            ->groupBy('temp_token_no', 'temp_counsel_counter', 'counsellingAudio')
            ->where('temp_reg', 4)
            ->where(function ($query) {
                $query->where('temp_counsel', '=', 2)
                    ->orWhere('temp_counsel', '=', 4)
                    ->orWhere('temp_counsel', '=', 5);
            })
            ->orderBy('temp_token_no')
            ->get(['temp_token_no', 'temp_counsel_counter', 'counsellingAudio']);

        return response()->json(['result' => $tokenno]);

    }


    public function CounselingMainDisplayApiAudio(Request $request)
    {

        $resp = DB::table('temp_table')
            ->groupBy('temp_token_no', 'temp_counsel_counter')
            ->where('temp_reg', 4)
            ->whereNull('counsellingAudio')
            ->where(function ($query) {
                $query->where('temp_counsel', '=', 2)
                    ->orWhere('temp_counsel', '=', 4)
                    ->orWhere('temp_counsel', '=', 5);
            })
            ->orderBy('temp_token_no')
            ->get(['temp_token_no', 'temp_counsel_counter']);

        return response()->json(['result' => $resp]);

    }


    public function CounselingMainDisplayApiAudio_Complete(Request $request)
    {
        $tokenNo = $request->appToken;

        DB::table('temp_table')->where([
            ['temp_token_no', '=', $tokenNo]
        ])->update(['counsellingAudio' => "1"]);

    }


    // ----------------------------------------------------------------------------------------------------------------------------------------


    public function CXRMainDisplayApi(Request $request)
    {

        $process = DB::table('change_process_order')
            ->select('type')
            ->first();

        $proType = $process->type;

        if ($proType == 1) {

            $tokenno = DB::table('temp_table')
                ->groupBy('temp_token_no', 'temp_cxr_counter')
                ->where('temp_counsel', 4)
                ->where('temp_cxr', 2)
                ->get(['temp_token_no', 'temp_cxr_counter']);

            return response()->json(['result' => $tokenno]);

        } elseif ($proType == 2) {


            $tokenno = DB::table('temp_table')
                ->groupBy('temp_token_no', 'temp_cxr_counter')
                ->where(function ($query) {
                    $query->where('temp_phlebotomy', '=', 5)
                        ->orWhere('temp_phlebotomy', '=', 4);
                })
                ->where(function ($query) {
                    $query->where('temp_cxr', '=', 2);
                })
                ->get(['temp_token_no', 'temp_cxr_counter']);


            return response()->json(['result' => $tokenno]);

        }
    }


    public function CXRMainDisplayApiAudio(Request $request)
    {
        $process = DB::table('change_process_order')
            ->select('type')
            ->first();

        $proType = $process->type;


        if ($proType == 1) {


            $tokenno = DB::table('temp_table')
                ->orderBy('temp_token_no')
                ->where('temp_counsel', 4)
                ->where('temp_cxr_counter', '!=', 0)
                ->whereNull('cxrAudio')
                ->where('temp_cxr', 2)
                ->distinct()
                ->first(['temp_token_no', 'temp_cxr_counter', 'temp_id']);

            return response()->json(['result' => $tokenno]);

        } elseif ($proType == 2) {


            $tokenno = DB::table('temp_table')
                ->orderBy('temp_token_no')
                ->where('temp_cxr_counter', '!=', 0)
                ->where(function ($query) {
                    $query->where('temp_phlebotomy', '=', 5)
                        ->orWhere('temp_phlebotomy', '=', 4);
                })
                ->whereNull('cxrAudio')
                ->where('temp_cxr', 2)
                ->distinct()
                ->first(['temp_token_no', 'temp_cxr_counter', 'temp_id']);

            return response()->json(['result' => $tokenno]);

        }


    }


    public function CXRMainDisplayApiAudio_Complete(Request $request)
    {
        $tokenNo = $request->appToken;

        DB::table('temp_table')->where([
            ['temp_token_no', '=', $tokenNo]
        ])->update(['cxrAudio' => "1"]);

    }


    // ----------------------------------------------------------------------------------------------------------------------------------------


    public function SampleCollectionDisplayApi(Request $request)
    {

        $process = DB::table('change_process_order')
            ->select('type')
            ->first();

        $proType = $process->type;

        if ($proType == 1) {
            
            $tokenno = DB::table('temp_table')
                ->groupBy('temp_token_no', 'temp_phlebotomy_counter')
                ->where('temp_cxr', 4)
                ->where('temp_phlebotomy', 2)
                ->get(['temp_token_no', 'temp_phlebotomy_counter']);

            return response()->json(['result' => $tokenno]);

        } else {

            $tokenno = DB::table('temp_table')
                ->groupBy('temp_token_no', 'temp_phlebotomy_counter')
                ->where('temp_counsel', 4)
                ->where('temp_phlebotomy', 2)
                ->get(['temp_token_no', 'temp_phlebotomy_counter']);

            return response()->json(['result' => $tokenno]);
        }
    }


    public function SampleCollectionMainDisplayApiAudio(Request $request)
    {

        $process = DB::table('change_process_order')
            ->select('type')
            ->first();

        $proType = $process->type;


        if ($proType == 1) {

            $usergroup = $request->counter;

            $tokenno = DB::table('temp_table')
                ->orderBy('temp_token_no')
                ->where('temp_phlebotomy_counter', '!=', 0)
                ->whereNull('phlebotomyAudio')
                ->where('temp_cxr', 4)
                ->where('temp_phlebotomy', 2)
                ->distinct()
                ->first(['temp_token_no', 'temp_phlebotomy_counter', 'temp_id']);

            return response()->json(['result' => $tokenno]);

        } else {

            $usergroup = $request->counter;

            $tokenno = DB::table('temp_table')
                ->orderBy('temp_token_no')
                ->where('temp_phlebotomy_counter', '!=', 0)
                ->whereNull('phlebotomyAudio')
                ->where('temp_counsel', 4)
                ->where('temp_phlebotomy', 2)
                ->distinct()
                ->first(['temp_token_no', 'temp_phlebotomy_counter', 'temp_id']);

            return response()->json(['result' => $tokenno]);

        }

    }


    public function SampleCollectionDisplayApiAudio_Complete(Request $request)
    {
        $tokenNo = $request->appToken;

        DB::table('temp_table')->where([
            ['temp_token_no', '=', $tokenNo]
        ])->update(['phlebotomyAudio' => "1"]);


    }


    // ----------------------------------------------------------------------------------------------------------------------------------------


    public function ConsultationMainDisplayApi(Request $request)
    {
        $process = DB::table('change_process_order')
            ->select('type')
            ->first();

        $proType = $process->type;

        if ($proType == 1) {

            $usergroup = $request->counter;

            $tokenno = DB::table('temp_table')
                ->groupBy('temp_token_no', 'temp_consult_counter')
                ->where('temp_phlebotomy', 4)
                ->where('temp_consult', 2)
                ->get(['temp_token_no', 'temp_consult_counter']);

            return response()->json(['result' => $tokenno]);

        } else {

            $usergroup = $request->counter;

            $tokenno = DB::table('temp_table')
                ->groupBy('temp_token_no', 'temp_consult_counter')
                ->where('temp_cxr', 4)
                ->where('temp_phlebotomy', 4)
                ->where('temp_consult', 2)
                ->get(['temp_token_no', 'temp_consult_counter']);

            return response()->json(['result' => $tokenno]);

        }
    }


    public function ConsultationMainDisplayApiAudio(Request $request)
    {
        $process = DB::table('change_process_order')
            ->select('type')
            ->first();

        $proType = $process->type;

        if ($proType == 1) {

            $usergroup = $request->counter;

            $tokenno = DB::table('temp_table')
                ->orderBy('temp_token_no')
                ->where('temp_consult_counter', '!=', 0)
                ->whereNull('consultationAudio')
                ->where('temp_phlebotomy', 4)
                ->where('temp_consult', 2)
                ->distinct()
                ->first(['temp_token_no', 'temp_consult_counter', 'temp_id']);

            return response()->json(['result' => $tokenno]);

        } else {

            $usergroup = $request->counter;

            $tokenno = DB::table('temp_table')
                ->orderBy('temp_token_no')
                ->where('temp_consult_counter', '!=', 0)
                ->whereNull('consultationAudio')
                ->where('temp_cxr', 4)
                ->where('temp_phlebotomy', 4)
                ->where('temp_consult', 2)
                ->distinct()
                ->first(['temp_token_no', 'temp_consult_counter', 'temp_id']);

            return response()->json(['result' => $tokenno]);

        }
    }


    public function ConsultationMainDisplayApiAudio_Complete(Request $request)
    {
        $tokenNo = $request->appToken;

        DB::table('temp_table')->where([
            ['temp_token_no', '=', $tokenNo]
        ])->update(['consultationAudio' => "1"]);


    }

}
