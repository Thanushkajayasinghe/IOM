<?php

/**
 * Created by PhpStorm.
 * User: Nishantha
 * Date: 3/13/2019
 * Time: 3:53 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class InterpreterDateWiseDetailsController
{
    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.InterpreterDateWiseDetails')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function Search(Request $request)
    {
        $function = $request->function;

        if ($function == "ViewDetails") {

            $date = $request->date;

            $resp1 = DB::table('register_applicant_details')
                ->leftJoin('appointment_cancel_and_reschedule_availability', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
                ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->select(
                    'register_applicants.id'
                )
                ->where('appointment_cancel_and_reschedule_availability.date', '=', $date)
                ->where('appointment_cancel_and_reschedule_availability.status', '!=', 'Canceled')
                ->where('appointment_cancel_and_reschedule_availability.status', '!=', 'Cancelled')
                ->where('register_applicants.StatusSaveOrSubmith', '=', 'Submit')
                ->get();

            $arr = array();

            foreach ($resp1 as $data) {

                $fk = $data->id;
                array_push($arr, $fk);
            }


            $resp = DB::table('register_applicant_details')
                ->leftJoin('appointment_cancel_and_reschedule_availability', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
                ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->select(
                    'register_applicant_details.MemberStatus',
                    'register_applicant_details.FirstName',
                    'register_applicant_details.LastName',
                    'register_applicant_details.PassportNumber',
                    'register_applicants.CountryOfOrigin',
                    'register_applicant_details.AppointmentNumber',
                    'register_applicant_details.DateOfBirth',
                    'register_applicants.CdAddress',
                    'register_applicants.CdStree',
                    'register_applicants.CdCity',
                    'register_applicants.CdPostalCode',
                    'register_applicants.SponsorName',
                    'register_applicants.SponsorMobile',
                    'register_applicants.AppointmentDate',
                    'register_applicants.NoOfFamilyMembers',
                    'appointment_cancel_and_reschedule_availability.date',
                    'appointment_cancel_and_reschedule_availability.time',
                    'register_applicants.InterpretationStatus',
                    'register_applicants.InterpretationLanguage',
                    'register_applicant_details.FkId',                    
                    'register_applicant_details.wheelChairAccess',
                    'register_applicant_details.feedingRoom',
                    'register_applicant_details.motherWithChildrenLess5',
                    'register_applicant_details.otherNeeds'
                )
                ->whereIn('register_applicant_details.FkId', $arr)
                ->orderBy('register_applicant_details.FkId', 'ASC')
                ->orderBy('register_applicant_details.MemberStatus')
                ->get();

            return response()->json(['result' => $resp]);
        }
    }
}
