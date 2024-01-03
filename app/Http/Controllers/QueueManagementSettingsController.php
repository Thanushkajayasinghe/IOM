<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class QueueManagementSettingsController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.QueueManagementSettings')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function CUD(Request $request)
    {


        $command = $request->command;
        //========================== New update 2/13 ===================================
        if ($command == 'on') {

            $todaytime = date('H:i:s');
            $counter = $request->counter;
            $id = '1';

            $posts = DB::table('tbl_queue_mgt_set')
                ->select('qms_in_operation')
                ->where('qms_counter', '=', $counter)
                ->where('qms_in_operation', '=', 'true')
                ->where('qms_counter_no', '=', $id)
                ->where('qms_start_time', '<=', $todaytime)
                ->where('qms_end_time', '>=', $todaytime)
                ->get();
            foreach ($posts as $post) {
                return response()->json($post->qms_in_operation);
            }
            return response()->json('false');
            //========================== End New update 2/13 ===============================
        } else if ($command === 'delete') {
            $qmsid = $request->qms_id;

            DB::table('tbl_queue_mgt_set')
                ->where('qms_id', '=', $qmsid)
                ->delete();
            //return response()->json(['result' => 'DOne DOne']);
        } else if ($command === 'Registration') {

            $posts = DB::table('tbl_queue_mgt_set')
                ->where('qms_counter', '=', 'Registration')
                ->where('qms_status', 1)
                ->get();
            return response()->json($posts);

        } else if ($command === 'Counseling') {

            $posts = DB::table('tbl_queue_mgt_set')
                ->where('qms_counter', '=', 'Counseling')
                ->where('qms_status', 1)
                ->get();
            return response()->json($posts);

        } else if ($command === 'Radiography') {

            $posts = DB::table('tbl_queue_mgt_set')
                ->where('qms_counter', '=', 'Radiography')
                ->where('qms_status', 1)
                ->get();
            return response()->json($posts);

        } else if ($command === 'Radiology') {

            $posts = DB::table('tbl_queue_mgt_set')
                ->where('qms_counter', '=', 'Radiology')
                ->where('qms_status', 1)
                ->get();
            return response()->json($posts);

        } else if ($command === 'Rhlebotomy') {

            $posts = DB::table('tbl_queue_mgt_set')
                ->where('qms_counter', '=', 'Rhlebotomy')
                ->where('qms_status', 1)
                ->get();
            return response()->json($posts);

        } else if ($command === 'Consultation') {

            $posts = DB::table('tbl_queue_mgt_set')
                ->where('qms_counter', '=', 'Consultation')
                ->where('qms_status', 1)
                ->get();
            return response()->json($posts);

        } else if ($command === 'save') {
            $plc = $request->qms_counter;
            $starttime = $request->qms_start_time;
            $endtime = $request->qms_end_time;
            $new = $request->qms_new;
//return response()->json($request->qms_new);
            if ($new === 'new') {
                DB::table('tbl_queue_mgt_set')->insert(
                    [
                        'qms_id' => rand(1000, 100000),
                        'qms_counter' => $plc,
                        'qms_counter_no' => $request->qms_counter_no,
                        'qms_start_time' => $starttime,
                        'qms_end_time' => $endtime,
                        'qms_in_operation' => $request->qms_in_operation,
                        'qms_status' => 1
                    ]
                );
            } else {
                DB::table('tbl_queue_mgt_set')
                    ->where('qms_id', $new)
                    ->update([
                        'qms_in_operation' => $request->qms_in_operation,
                        'qms_start_time' => $starttime,
                        'qms_end_time' => $endtime
                    ]);
            }
        } else if ($command === 'pendingToken') {

            $posts = DB::table('temp_table')->distinct()->where('temp_reg', '=', 1)->count(['temp_token_no']);

            return response()->json(['result' => $posts]);
        }
    }
}
