<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FamilyBreakdownController extends Controller
{
    //page view
    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.FamilyBreakdown')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function loadFamilyAppointmentNo(Request $request)
    {
        $resp = DB::table('register_applicant_details')
            ->leftJoin('register_applicants', 'register_applicant_details.FkId', '=', 'register_applicants.id')
            ->select('register_applicant_details.AppointmentNumber', 'register_applicant_details.FkId')
            ->where([
                ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
                ['register_applicant_details.MemberStatus', '=', 'MainMember'],
                ['register_applicants.ApplicationType', '=', 'Family']
            ])
            ->orderBy('register_applicant_details.AppointmentNumber', 'asc')
            ->get();

        return response()->json(['result' => $resp]);
    }

    public function loadMemAppointmentNo(Request $request)
    {
        $appNoMain = $request->appNo;

        $FkId = DB::table('register_applicant_details')
            ->where([
                ['register_applicant_details.MemberStatus', '=', 'MainMember'],
                ['register_applicant_details.AppointmentNumber', '=', $appNoMain]
            ])
            ->first();

        $resp = DB::table('register_applicant_details')
            ->where([
                ['register_applicant_details.FkId', '=', $FkId->FkId]
            ])
            ->orderBy('AppointmentNumber', 'asc')
            ->get();

        $others = DB::table('appointment_cancel_and_reschedule_availability')
            ->where([
                ['appointment_no', '=', $appNoMain]
            ])
            ->get();

        $registerApplicant = DB::table('register_applicants')
            ->where([
                ['id', '=', $FkId->FkId]
            ])
            ->get();

        return response()->json(['result' => $resp, 'other' => $others, 'regApp' => $registerApplicant]);
    }

    public function SeparateFamily(Request $request)
    {
        $appointment_no = $request->appNo;
        $date = $request->date;
        $time = $request->time;
        $fkid = $request->fkid;
        $mainCurrentAppNo = $request->mainCurrentAppNo;

        $arrivalDate = $request->arrivalDate;
        $countryOfOrigin = $request->countryOfOrigin;
        $emailAddress = $request->emailAddress;
        $SlAddress = $request->SlAddress;
        $SlStreet = $request->SlStreet;
        $SlCity = $request->SlCity;
        $SlPostalCode = $request->SlPostalCode;
        $SlTelephoneFixedLine = $request->SlTelephoneFixedLine;
        $SlMobile = $request->SlMobile;
        $SponsorName = $request->SponsorName;
        $SponsorTelephoneFixedLine = $request->SponsorTelephoneFixedLine;
        $SponsorEmailAddress = $request->SponsorEmailAddress;
        $SponsorMobile = $request->SponsorMobile;
        $SponsorAddress = $request->SponsorAddress;
        $StatusSaveOrSubmith = $request->StatusSaveOrSubmith;
        $visaRenewalOrNot = $request->visaRenewalOrNot;
        $emergencyContactNo = $request->emergencyContactNo;
        $cby = strval(Auth::id());

        //Insert into appointment_cancel_and_reschedule_availability
        DB::table('appointment_cancel_and_reschedule_availability')->insert([
            [
                'appointment_no' => $appointment_no,
                'date' => $date,
                'time' => $time,
                'no_members' => 1,
                'status' => 'New',
                'created_by' => 'Separated',
                'created_at' => date('Y-m-d h:i:sa')
            ]
        ]);

        //Insert into register_applicants
        $regId = DB::table('register_applicants')->insertGetId([
            'ApplicationType' => 'Individual',
            'NoOfFamilyMembers' => 0,
            'DateOfArrival' => $arrivalDate,
            'AppointmentDate' => $date,
            'PriorityRequest' => 'No Priority',
            'CountryOfOrigin' => $countryOfOrigin,
            'EmailAddress' => $emailAddress,
            'SlAddress' => $SlAddress,
            'SlStreet' => $SlStreet,
            'SlCity' => $SlCity,
            'SlPostalCode' => $SlPostalCode,
            'SlTelephoneFixedLine' => $SlTelephoneFixedLine,
            'SlMobile' => $SlMobile,
            'SponsorName' => $SponsorName,
            'SponsorTelephoneFixedLine' => $SponsorTelephoneFixedLine,
            'SponsorEmailAddress' => $SponsorEmailAddress,
            'SponsorMobile' => $SponsorMobile,
            'SponsorAddress' => $SponsorAddress,
            'Cby' => $cby,
            'StatusSaveOrSubmith' => $StatusSaveOrSubmith,
            'created_at' => date('Y-m-d h:i:sa'),
            'visaRenewalOrNot' => $visaRenewalOrNot,
            'emergencyContactNo' => $emergencyContactNo
        ]);

        //Update register_applicant_details member status and fkid
        DB::table('register_applicant_details')
            ->where('AppointmentNumber', '=', $appointment_no)
            ->update(['MemberStatus' => 'MainMember', 'FkId' => $regId]);

        DB::table('appointment_cancel_and_reschedule_availability')
            ->where('appointment_no', '=', $mainCurrentAppNo)
            ->update(['no_members' => 1]);

        DB::table('register_applicants')
            ->where('id', '=', $fkid)
            ->update(['NoOfFamilyMembers' => 0, 'ApplicationType' => 'Individual']);

        DB::table('temp_table')->where('temp_app_no', $mainCurrentAppNo)->delete();
    }
}
