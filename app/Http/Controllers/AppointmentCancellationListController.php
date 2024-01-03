<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentCancellationListController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.AppointmentCancellationList')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function LoadTable(Request $request)
    {
        $date = $request->date;

        $res = DB::table('appointment_cancel_and_reschedule_availability')
            ->join('register_applicant_details', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
            ->join('users', 'users.id', '=', 'appointment_cancel_and_reschedule_availability.created_by')
            ->select('appointment_cancel_and_reschedule_availability.*', 'register_applicant_details.FirstName', 'register_applicant_details.PassportNumber', 'users.name')
            ->whereDate('appointment_cancel_and_reschedule_availability.date', '=', $date)
            ->where(function ($query) {
                $query->orWhere('appointment_cancel_and_reschedule_availability.status', '=', 'Canceled')
                    ->orWhere('appointment_cancel_and_reschedule_availability.status', '=', 'Reschedule');
            })
            ->get();

        return response()->json(['result' => $res]);
    }
}
