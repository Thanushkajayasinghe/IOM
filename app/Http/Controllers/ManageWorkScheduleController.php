<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageWorkScheduleController extends Controller
{
    public function InsertData(Request $request)
    {
        $date = $request->dateSelected;
        $status = $request->status;
        $timeArray = $request->time;

        if ($status == "timeSlots") {

            foreach ($timeArray as $time) {
                DB::table('manageworkschedule')->insert(
                    [
                        'date' => $date,
                        'status' => $status,
                        'timeslots' => $time
                    ]
                );
            }
        } elseif ($status == "wholeDay") {

            DB::table('manageworkschedule')->insert(
                [
                    'date' => $date,
                    'status' => $status
                ]
            );
        }

        return response()->json(['result' => true]);
    }

    public function savemanageworkscheduletime(Request $request)
    {
        $dateArray = $request->dateArray;
        $members = $request->members;
        $timeArray = $request->time;

        if ($members == "") {
            $members = DB::table('master_settings')
                ->where('effectivedate', '<=', date('Y-m-d'))
                ->orderBy('effectivedate', 'desc')
                ->first(['usersperslot']);

            $members = $members->usersperslot;
        }        

        foreach ($dateArray as $date) {

            DB::table('scheduledaystime')
                ->where('date', $date)
                ->update(
                    [
                        'date' => $date,
                        'members' =>  $members,
                        'slot1' => $timeArray[0],
                        'slot2' => $timeArray[1],
                        'slot3' => $timeArray[2],
                        'slot4' => $timeArray[3],
                        'slot5' => $timeArray[4],
                        'slot6' => $timeArray[5],
                        'slot7' => $timeArray[6],
                        'slot8' => $timeArray[7],
                        'slot9' => $timeArray[8],
                        'slot10' => $timeArray[9],
                        'slot11' => $timeArray[10],
                        'slot12' => $timeArray[11],
                        'slot13' => $timeArray[12],
                        'slot14' => $timeArray[13],
                        'slot15' => $timeArray[14],
                        'slot16' => $timeArray[15],
                        'slot17' => $timeArray[16],
                        'slot18' => $timeArray[17],
                        'slot19' => $timeArray[18]
                    ]
                );
        }

        return response()->json(['result' => true]);
    }

    public function LoadTimeAvailable(Request $request)
    {

        // if (date("w", strtotime($date)) == 4) {
        //     $timeList = ["08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00"];
        // }
        $timeList = [
            "08:00", "08:30", "09:00", "09:30", "10:00", "10:30",
            "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00"
        ];

        return response()->json($timeList);
    }

    public function notAvailableDates(Request $request)
    {
        $result = DB::table('manageworkschedule')
            ->where('status', '=', 'wholeDay')
            ->get();

        return response()->json(['result' => $result]);
    }

    public function removeClosedDayWorkSchedule(Request $request)
    {
        $date = $request->date;

        $result = DB::table('manageworkschedule')
            ->where('status', '=', 'wholeDay')
            ->whereDate('date', '=', $date)
            ->delete();

        return response()->json(['result' => $result]);
    }
}
