<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetWorkScheduleController extends Controller
{

    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.SetWorkSchedule')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);;
    }


    public function InsertOrUpdate(Request $request)
    {
        $type = $request->type;
        $date = $request->date;
        $value = $request->value;
        $datetime = date('Y-m-d H:i:s');

        $countX = DB::table('set_work_schedule')->where([
            ['type', '=', $type],
            ['date', '=', $date],
        ])->count();

        if ($countX == 1) {

            DB::table('set_work_schedule')->where([
                ['type', '=', $type],
                ['date', '=', $date]
            ])->update(['value' => $value]);
        } else {

            DB::table('set_work_schedule')->insert(
                ['type' => $type, 'date' => $date, 'value' => $value, 'created_at' => $datetime]
            );
        }

        return response()->json(['result' => true]);
    }

    public function LoadData(Request $request)
    {
        $from = $request->from;
        $to = $request->to;

        $users = DB::table('set_work_schedule')->whereBetween('date', array($from, $to))->get();

        return response()->json(['result' => $users]);
    }

    public function ChangeDateStatus(Request $request)
    {
        $function = $request->function;
        $year = $request->year;

        if ($function == "disableSaturdays") {

            DB::table('holiday_calender')->insert(
                ['year' => $year, 'stat' => 'allSaturdaysDisabled']
            );
        } else if ($function == "disableSundays") {

            DB::table('holiday_calender')->insert(
                ['year' => $year, 'stat' => 'allSundaysDisabled']
            );
        } else if ($function == "enableSaturdays") {

            DB::table('holiday_calender')->where([
                ['year', '=', $year],
                ['stat', '=', 'allSaturdaysDisabled']
            ])->delete();
        } else if ($function == "enableSundays") {

            DB::table('holiday_calender')->where([
                ['year', '=', $year],
                ['stat', '=', 'allSundaysDisabled']
            ])->delete();
        }

        return response()->json(['result' => true]);
    }

    public function HolidayCalenderLoadData(Request $request)
    {
        $function = $request->function;
        $res = "";

        if ($function == "loadHolidayCalenderDates") {

            $year = $request->year;
            $res = DB::table('holiday_calender')->where('year', '=', $year)->get();
        } else if ($function == "clickedDateSave") {

            $year = $request->year;
            $month = $request->month;
            $day = $request->day;
            $date = $request->date;
            $datetime = date('Y-m-d H:i:s');

            DB::table('holiday_calender')->insert(
                ['year' => $year, 'month' => $month, 'day' => $day, 'created_at' => $datetime, 'holiday' => $date]
            );

            $res = true;
        } else if ($function == "deleteHoliday") {

            $year = $request->year;
            $month = $request->month;
            $day = $request->day;

            DB::table('holiday_calender')->where([
                ['year', '=', $year],
                ['month', '=', $month],
                ['day', '=', $day]
            ])->delete();

            $res = true;
        }

        return response()->json(['result' => $res]);
    }

    public function WorkScheduleDisableForHolidays(Request $request)
    {
        $year = $request->year;
        $month = $request->month;

        $res = DB::table('holiday_calender')->where([
            ['year', '=', $year],
            ['month', '=', $month]
        ])->get();

        return response()->json(['result' => $res]);
    }

    public function MasterSettings(Request $request)
    {
        $function = $request->function;
        $res = "";
        $datetime = date('Y-m-d H:i:s');
        $date = date('Y-m-d');

        if ($function == "Insert") {

            $noOfRegAppointments = $request->noOfRegAppointments;
            $noOfPriorityAppointments = $request->noOfPriorityAppointments;
            $noOfSputumCollection = $request->noOfSputumCollection;
            $noOfVisaExtension = $request->noOfVisaExtension;
            $timeSlotForOneUser = $request->timeSlotForOneUser;
            $slots = $request->slots;
            $usersperslot = $request->usersperslot;
            $effectiveDate = $request->effectiveDate;
            $expireTime = $request->expireTime;
            $radiologyValidation = $request->radiologyValidation;

            DB::table('master_settings')->insert(
                [
                    'noregularappointments' => $noOfRegAppointments, 'nopriorityappointments' => $noOfPriorityAppointments, 'nosputumcollections' => $noOfSputumCollection,
                    'novisaextensions' => $noOfVisaExtension, 'timeslotperoneuser' => $timeSlotForOneUser, 'slots' => $slots, 'usersperslot' => $usersperslot,
                    'effectivedate' => $effectiveDate, 'expiretime' => $expireTime, 'radiologyValidation' => $radiologyValidation, 'created_at' => $datetime
                ]
            );

            $res = true;
        } else if ($function == "loadMasterSettings") {

            $res = DB::table('master_settings')->where('effectivedate', '<=', $date)->orderBy('effectivedate', 'desc')->first();
        } else if ($function == "Update") {

            $noOfRegAppointmentsx = $request->noOfRegAppointments;
            $noOfPriorityAppointmentsx = $request->noOfPriorityAppointments;
            $noOfSputumCollectionx = $request->noOfSputumCollection;
            $noOfVisaExtensionx = $request->noOfVisaExtension;
            $timeSlotForOneUserx = $request->timeSlotForOneUser;
            $slots = $request->slots;
            $usersperslot = $request->usersperslot;
            $effectiveDatex = $request->effectiveDate;
            $expireTimex = $request->expireTime;
            $radiologyValidation = $request->radiologyValidation;

            $hiddenId = $request->hiddenId;

            DB::table('master_settings')->where('mastersettingsid', $hiddenId)->update(
                [
                    'noregularappointments' => $noOfRegAppointmentsx,
                    'nopriorityappointments' => $noOfPriorityAppointmentsx,
                    'nosputumcollections' => $noOfSputumCollectionx,
                    'novisaextensions' => $noOfVisaExtensionx,
                    'timeslotperoneuser' => $timeSlotForOneUserx,
                    'slots' => $slots,
                    'usersperslot' => $usersperslot,
                    'effectivedate' => $effectiveDatex,
                    'expiretime' => $expireTimex,
                    'radiologyValidation' => $radiologyValidation
                ]
            );

            $res = true;
        }

        return response()->json(['result' => $res]);
    }

    public function GetDefaultValueFromMasterSettings(Request $request)
    {
        $date = date('Y-m-d');

        $res = DB::table('master_settings')->where('effectivedate', '<=', $date)->orderBy('effectivedate', 'desc')->first();

        return response()->json(['result' => $res]);
    }

    public function SaveWebNotice(Request $request)
    {
        $title = $request->title;
        $content = $request->content;

        DB::table('webnotice')->delete();

        DB::table('webnotice')->insert(
            ['title' => $title, 'content' => $content]
        );

        return response()->json(['result' => true]);
    }
}
