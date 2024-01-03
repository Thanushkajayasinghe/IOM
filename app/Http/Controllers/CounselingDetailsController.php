<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CounselingDetailsController extends Controller
{
    public function CRUD(Request $request)
    {
        $command = $request->command;

        if ($command === 'saveMaster') {

            $appointment = $request->appointment;

            for ($i = 0; $i < count($appointment); $i++) {
                $Appno = explode('/', $appointment[$i])[0];
                $Tabno = explode('/', $appointment[$i])[1];
                $remark = $request->remark;
                $signature = $request->signture;
                $complete = $request->complete;

                DB::table('tbl_counseling_details')
                    ->insert([
                        [
                            'cd_app_no' => $Appno,
                            'cd_remarks' => $remark,
                            'cd_sign' => $signature,
                            'cd_complete' => $complete,
                            'cd_tab_no' => $Tabno,
                        ]
                    ]);
            }
            return response()->json(['Done']);

        } else if ($command === 'check') {

            $appointment = 'app10';
            $check = $request->check;
            $value = $request->value;

            DB::table('tbl_counseling_checklist')->insert([
                [
                    'cchk_app_no' => $appointment,
                    'cchk_desc' => $check,
                    'cchk_result' => $value
                ]
            ]);

        } else if ($command == 'updateAppno') {

            $appNo = $request->appNo;

            DB::table('temp_table')
                ->where('temp_app_no', $appNo)
                ->update(['temp_counsel' => 4, 'tab_no' => null]);
            return response()->json(['Done']);

        }

    }

}
