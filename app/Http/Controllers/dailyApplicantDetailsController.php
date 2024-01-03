<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dailyApplicantDetailsController extends Controller
{

    public function ViewPage(Request $request)
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.dailyApplicantDetails')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function AllData(Request $request)
    {
        $function = $request->function;

        if ($function == "LodePayment") {

            $date = $request->date;

            $resp = DB::table('temp_new')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'temp_new.temp_app_no')
                ->leftJoin('register_applicants', 'register_applicant_details.FkId', '=', 'register_applicants.id')
                ->leftJoin('appointment_cancel_and_reschedule_availability', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
                ->leftJoin('tbl_registration', 'tbl_registration.reg_app_no', '=', 'register_applicant_details.AppointmentNumber')
                ->orderBy('temp_new.temp_id')
                ->select(

                    'register_applicant_details.FkId',
                    'register_applicant_details.PassportNumber',
                    'register_applicant_details.FirstName',
                    'register_applicant_details.LastName',
                    'register_applicant_details.AppointmentNumber',
                    'register_applicant_details.DateOfBirth',
                    'register_applicant_details.Gender',
                    'register_applicant_details.Nationality',
                    'appointment_cancel_and_reschedule_availability.date',
                    'register_applicants.CountryOfOrigin',
                    'register_applicants.SponsorName',
                    'register_applicants.SponsorTelephoneFixedLine',
                    'register_applicants.SponsorEmailAddress',
                    'register_applicants.SponsorMobile',
                    'register_applicants.SponsorAddress',
                    'tbl_registration.reg_photo_booth'
                )
                ->whereDate('temp_new.createddate', '=', $date)
                ->get();

            $date = date('Y-m-d');
            $Pay = DB::table('payment_setting')
                ->select('Amount')
                ->where('Effective_Date', '<=', $date)
                ->orderBy('Effective_Date', 'desc')
                ->first();

            $amount = $Pay->Amount;

            return response()->json(['result' => $resp, 'amount' => $amount]);
        }

    }

}
