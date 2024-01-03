<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CounselingSettingsController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.CounselingSettings')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function CRUD(Request $request)
    {
        $command = $request->command;
        if ($command === 'delete') {
            //deletecounselling();
        } else if ($command === 'saveCheckList') {
            DB::table('tbl_counselling_description_report')->insert(
                [
                    'csdr_desc' => $request->save_check_list
                ]
            );
            return response()->json(['result' => Done]);

        } else if ($command === 'saveMainDisplay') {

            DB::table('tbl_counselling_maindisplay')->insert(
                [
                    'csmd_desc' => $request->maindisplay
                ]
            );
            return response()->json(['result' => Done]);

        } else if ($command === 'saveLangFile') {

            DB::table('tbl_counselling_record')->insert(
                [
                    'csr_lang' => $request->lang,
                    'csr_desc' => $request->desc,
                    'csr_file' => $request->mp3file
                ]
            );
            return response()->json(['result' => Done]);

        } else if ($command === 'saveScriptFile') {
            //deletecounselling();

            $scriptfile = $request->fileOne;
            $instfile = $request->fileTwo;

            DB::table('tbl_counselling_settings')->insert(
                [
                    'cs_script' => $scriptfile,
                    'cs_inst' => $instfile
                ]
            );
            return response()->json(['result' => Done]);

        } else if ($command === 'tbl_counselling_description_report') {
            $posts = DB::table('tbl_counselling_description_report')->get();
            return response()->json($posts);
        } else if ($command === 'tbl_counselling_maindisplay') {
            $posts = DB::table('tbl_counselling_maindisplay')->get();
            return response()->json($posts);
        } else if ($command === 'tbl_counselling_record') {
            $posts = DB::table('tbl_counselling_record')->get();
            return response()->json($posts);
        } else if ($command === 'tbl_counselling_settings') {
            $posts = DB::table('tbl_counselling_settings')->get();
            return response()->json($posts);

        } else if ($command === 'loadMemberCount') {
            $userGroupId = Session::get('userGroup');

            $res = DB::table('temp_table')
                ->where([
                    ['temp_counsel', '=', 5],
                    ['temp_counsel_counter', '=', $userGroupId],
                    ['tab_status', '=', 1],
                ])
                ->count();
            return response()->json($res);
        }



    }

    function deletecounselling()
    {
        DB::table('tbl_counselling_settings')->delete();
        DB::table('tbl_counselling_description_report')->delete();
        DB::table('tbl_counselling_maindisplay')->delete();
        DB::table('tbl_counselling_record')->delete();
    }

}
