<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FloorManagerController extends Controller
{

    //View Page
    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.FloorManager')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function FloorManagerGetData(Request $request)
    {

        $command = $request->command;
        $res = "";

        if ($command == "loadToken") {

            $date = date('Y-m-d');
            $res = DB::table('temp_table')
                ->distinct()
                ->get(['temp_token_no',]);

        } else if ($command == "loadQueue") {

            $date = date('Y-m-d');

            $res = DB::table('tbl_queue_mgt_set')
                ->whereDate('qms_status', '=', $date)
                ->get();
        } else if ($command == "getNoty") {

            $res = DB::table('temp_table')
                ->where('temp_counsel_panic', '=', 1)
                ->get();

        } else if ($command == "updateNoty") {

            $counterGroupSerial = $request->counterGroupSerial;

            $res = DB::table('temp_table')
                ->where('temp_counsel_counter', '=', $counterGroupSerial)
                ->update(['temp_counsel_panic' => 0]);

        } else if ($command == "Insert") {

            $tokenNo = $request->tokenNo;
            $CurrentQueue = $request->CurrentQueue;
            $changePriority = $request->changePriority;
            $changeQueue = $request->changeQueue;
            $appno = $request->appno;
            $reqArray = $request->arrayToSend;
            $createdBy = Session::get('id');
            $datetime = date('Y-m-d H:i:s');
            $Prio = "No Priority";


            $tableArrayData[] = array();
            $arrayData = json_decode($reqArray);
            $tableArrayData = $arrayData;

            foreach ($tableArrayData as $data) {

                if ($data == "Registration") {
                    $resw = DB::table('temp_table')
                        ->where('temp_token_no', $tokenNo)
                        ->update(['temp_reg' => 1]);
                } else if ($data == "Counseling") {
                    $couns = DB::table('temp_table')
                        ->where('temp_token_no', $tokenNo)
                        ->update(['temp_counsel' => 1]);
                } else if ($data == "Radiology") {
                    $radio = DB::table('temp_table')
                        ->where('temp_token_no', $tokenNo)
                        ->update(['temp_cxr' => 1]);
                } else if ($data == "Lab") {
                    $lab = DB::table('temp_table')
                        ->where('temp_token_no', $tokenNo)
                        ->update(['temp_phlebotomy' => 1]);
                } else if ($data == "Consultation") {
                    $consult = DB::table('temp_table')
                        ->where('temp_token_no', $tokenNo)
                        ->update(['temp_consult' => 1]);
                }

            }


            if ($changePriority == "VIP") {
                $Prio = "Yes Priority";
            } else if ($changePriority == "Regular") {
                $Prio = "No Priority";
            }

            $resss = DB::table('register_applicant_details')
                ->select('FkId')
                ->where('AppointmentNumber', '=', $appno)
                ->first();
            $schFkId = $resss->FkId;

            $rr = DB::table('register_applicants')
                ->where('id', $schFkId)
                ->update(array('PriorityRequest' => $Prio));


            $res = DB::table('floor_manager')
                ->insert(
                    ['token_no' => $tokenNo, 'current_queue' => $CurrentQueue, 'change_priority' => $changePriority, 'change_queue' => $changeQueue, 'status' => 'Save', 'created_by' => $createdBy, 'created_at' => $datetime]
                );


        } else if ($command == "loadCurrentQueue") {

            $tokenNo = $request->tokno;

            $res = DB::table('temp_table')
                ->select('temp_table.*')
                ->where([['temp_token_no', '=', $tokenNo]])
                ->first();

        } else if ($command == "loadChangeQueue") {

            $res = DB::table('change_process_order')
                ->select('type')
                ->get();

        } else if ($command == 'cancelTokenNo') {

            $tokenNo = $request->tokenNo;

            $res = DB::table('temp_table')
                ->where('temp_token_no', '=', $tokenNo)
                ->delete();
        }

        return response()->json(['result' => $res]);

    }
}
