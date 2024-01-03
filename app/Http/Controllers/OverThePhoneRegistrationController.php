<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OverThePhoneRegistrationController extends Controller
{

    public function ViewPage(Request $request)
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.OverThePhoneRegistration')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);;
    }

    public function Verify(Request $request)
    {
        $passportNo = $request->passportNo;
        $appointmentNo = $request->appointmentNo;
        $function = $request->function;
        $res = "";

        if ($function == "verify") {

            $countX = DB::table('register_applicant_details')->where([
                ['PassportNumber', '=', $passportNo],
                ['AppointmentNumber', '=', $appointmentNo]
            ])->count();

            if ($countX == 1) {
                $res = true;
            } else {
                $res = false;
            }
        } else if ($function == "loadData") {

            $resk = DB::table('register_applicants')
                ->join('register_applicant_details', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->select('register_applicants.*', 'register_applicant_details.*')
                ->where([
                    ['PassportNumber', '=', $passportNo],
                    ['AppointmentNumber', '=', $appointmentNo]
                ])
                ->first();

            $FkId = $resk->FkId;
            $MemberStatus = $resk->MemberStatus;
            $resoo = $resk;

            if ($MemberStatus == 'OtherMember') {

                $resoo = DB::table('register_applicants')
                    ->join('register_applicant_details', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                    ->select('register_applicants.*', 'register_applicant_details.*')
                    ->where([
                        ['FkId', '=', $FkId], ['MemberStatus', '=', 'MainMember']
                    ])
                    ->first();
            }

            $res = $resoo;
        } else if ($function == "statusCou") {

            $date = $request->date;
            $time = $request->time;

            $resp = DB::table('appointment_cancel_and_reschedule_availability')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'appointment_cancel_and_reschedule_availability.appointment_no')
                ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->where([
                    ['appointment_cancel_and_reschedule_availability.date', '=', $date],
                    ['appointment_cancel_and_reschedule_availability.time', '=', $time],
                    ['register_applicants.StatusSaveOrSubmith', '=', 'Submit']
                ])->sum('appointment_cancel_and_reschedule_availability.no_members');

            $res = $resp;
        }

        return response()->json(['result' => $res]);
    }

    // Load Time
    public function LoadTime(Request $request)
    {

        $date = $request->date;

        $res = DB::table('master_settings')->where([['effectivedate', '<=', $date],])
            ->orderBy('effectivedate', 'desc')->first();
        return response()->json(['result' => $res]);
    }


    public function TodayTimeBook(Request $request)
    {
        $date = $request->date;
        $Total = 0;

        $sw = DB::table('set_work_schedule')
            ->where([
                ['date', '=', $date],
                ['type', '=', 'regularAppointments']
            ])->first();

        if (empty($sw)) {

            $res = DB::table('master_settings')
                ->where('effectivedate', '<=', $date)
                ->orderBy('effectivedate', 'desc')
                ->first();

            $SWvalue = $res->noregularappointments;
            $Total = $SWvalue;
        } else {
            $SWvalue = $sw->value;
            $Total = $SWvalue;
        }

        $CountOfToday = DB::table('appointment_cancel_and_reschedule_availability')
            ->where([
                ['date', '=', $date],
                ['status', '!=', "Canceled"],
            ])
            ->sum('no_members');

        $CountOfToday = DB::table('appointment_cancel_and_reschedule_availability')
            ->leftJoin('register_applicant_details', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
            ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
            ->where([
                ['appointment_cancel_and_reschedule_availability.date', '=', $date],
                ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
                ['appointment_cancel_and_reschedule_availability.status', '!=', "Canceled"],
            ])->sum('no_members');


        return response()->json(['result2' => $Total, 'result3' => $CountOfToday]);
    }


    // Limit Token No
    public function LimitToken(Request $request)
    {
        $Priority = $request->Priority;
        $MemberCount = $request->MemberCount;
        $date = $request->date;

        //Yes Priority
        if ($Priority == "Yes Priority") {
            $todayPriorityCount = 0;

            $YesPriorityCount = DB::table('register_applicants')
                ->where([
                    ['PriorityRequest', '=', 'Yes Priority'],
                    ['AppointmentDate', '=', $date]
                ])
                ->count();

            $sw = DB::table('set_work_schedule')
                ->where([
                    ['date', '=', $date],
                    ['type', '=', 'priorityAppointments']
                ])
                ->first();

            if (empty($sw)) {
                $res = DB::table('master_settings')
                    ->where('effectivedate', '<=', $date)
                    ->orderBy('effectivedate', 'desc')
                    ->first();

                $SWvalue = $res->nopriorityappointments;
                $todayPriorityCount = $SWvalue;
            } else {
                $SWvalue = $sw->value;
                $todayPriorityCount = $SWvalue;
            }

            $YesPriorityCount = $YesPriorityCount + $MemberCount;

            if ($todayPriorityCount >= $YesPriorityCount) {
                return response()->json(true);
            } else {
                return response()->json("Token Limit");
            }
        } else if ($Priority == "No Priority") {

            $todayPriorityCount = 0;

            $NoPriorityCount = DB::table('register_applicants')
                ->where([
                    ['PriorityRequest', '=', 'No Priority'],
                    ['AppointmentDate', '=', $date]
                ])
                ->count();


            $sw = DB::table('set_work_schedule')
                ->where([
                    ['date', '=', $date],
                    ['type', '=', 'regularAppointments']
                ])
                ->first();

            if (empty($sw)) {
                $res = DB::table('master_settings')
                    ->where('effectivedate', '<=', $date)
                    ->orderBy('effectivedate', 'desc')
                    ->first();

                $SWvalue = $res->noregularappointments;
                $todayPriorityCount = $SWvalue;
            } else {
                $SWvalue = $sw->value;
                $todayPriorityCount = $SWvalue;
            }

            $NoPriorityCount = $NoPriorityCount + $MemberCount;


            if ($todayPriorityCount >= $NoPriorityCount) {
                return response()->json(true);
            } else {
                return response()->json("Token Limit");
            }
        }
    }


    //Save Form
    public function Insert(Request $request)
    {
        $datetime = date('Y-m-d H:i:s');

        $ApplicationType = $request->ApplicationType;
        $NoOfFamilyMembers = $request->NoOfFamilyMembers;
        if ($NoOfFamilyMembers == "" || $NoOfFamilyMembers == null) {
            $NoOfFamilyMembers = 0;
        }
        $DateOfArrival = $request->DateOfArrival;
        $AppointmentDate = $request->AppointmentDate;
        $time = $request->time;
        $PriorityRequest = $request->PriorityRequest;
        $CountryOfOrigin = $request->CountryOfOrigin;
        $EmailAddress = $request->EmailAddress;

        $TitleOf = $request->TitleOf;
        $fnames = $request->fname;
        $lnames = $request->lname;
        $DateofBirth = $request->DateofBirth;
        $Gender = $request->Gender;
        $Nationality = $request->Nationality;
        $PassportNumber = $request->PassportNumber;
        $PreviousPassportifAny = $request->PreviousPassportifAny;
        $CountryOfBirth = $request->CountryOfBirth;
        $CVDL3years = $request->CVDL3years;
        $MainApplicantspecialMedicalNeedsCheck = $request->MainApplicantspecialMedicalNeedsCheck;

        $CdAddress = $request->CdAddress;
        $CdStree = $request->CdStree;
        $CdCity = $request->CdCity;
        $CdPostalCode = $request->CdPostalCode;
        $CdTelephoneFixedLine = $request->CdTelephoneFixedLine;
        $CdMobile = $request->CdMobile;

        $PreferredContactMethod = $request->PreferredContactMethod;

        $SponsorName = $request->SponsorName;
        $SponsorTelephoneFixedLine = $request->SponsorTelephoneFixedLine;
        $SponsorEmailAddress = $request->SponsorEmailAddress;
        $SponsorMobile = $request->SponsorMobile;
        $SponsorAddress = $request->SponsorAddress;

        $Cby = Auth::id();
        $StatusSaveOrSubmith = $request->StatusSaveOrSubmith;
        $over60YearsCheck = $request->over60YearsCheck;

        $Fid = DB::table('register_applicants')->insertGetId(
            [
                'ApplicationType' => $ApplicationType,
                'NoOfFamilyMembers' => $NoOfFamilyMembers, 'DateOfArrival' => $DateOfArrival,
                'AppointmentDate' => $AppointmentDate, 'PriorityRequest' => $PriorityRequest,
                'CountryOfOrigin' => $CountryOfOrigin, 'EmailAddress' => $EmailAddress,
                'SlAddress' => $CdAddress, 'SlStreet' => $CdStree, 'SlCity' => $CdCity,
                'SlPostalCode' => $CdPostalCode, 'SlTelephoneFixedLine' => $CdTelephoneFixedLine,
                'SlMobile' => $CdMobile, 'PreferredContactMethod' => $PreferredContactMethod,
                'SponsorName' => $SponsorName, 'SponsorTelephoneFixedLine' => $SponsorTelephoneFixedLine,
                'SponsorEmailAddress' => $SponsorEmailAddress,
                'SponsorMobile' => $SponsorMobile, 'SponsorAddress' => $SponsorAddress, 'Cby' => $Cby,
                'StatusSaveOrSubmith' => $StatusSaveOrSubmith, 'visaRenewalOrNot' => 'New',
                'created_at' => $datetime, 'updated_at' => $datetime
            ]
        );

        $TodayMemberCounts = DB::table('register_applicant_details')
            ->select('register_applicant_details.FirstName')
            ->where([
                ['created_at', '>=', date('Y-m-d') . ' 00:00:00'],
                ['created_at', '<=', date('Y-m-d') . ' 23:59:59']
            ])
            ->get();

        $wordCount = count($TodayMemberCounts);
        $wordCount = $wordCount + 1;

        $date = date('Y-m-d  h:i:sa');
        $AppointmentNumber = (strtotime($date) * 1000) . $wordCount;

        DB::table('register_applicant_details')->insert(
            [
                'FkId' => $Fid,
                'AppointmentNumber' => $AppointmentNumber,
                'MemberStatus' => "MainMember",
                'Title' => $TitleOf,
                'FirstName' => $fnames,
                'LastName' => $lnames,
                'DateOfBirth' => $DateofBirth,
                'Gender' => $Gender,
                'Nationality' => $Nationality,
                'PassportNumber' => $PassportNumber,
                'PreviousPassportIfAny' => $PreviousPassportifAny,
                'CountryOfBirth' => $CountryOfBirth,
                'CountryVisitedDuringLast3Years' => $CVDL3years,
                'PassportImgPath' => "",
                'BiometricsImgPath' => "",
                'over60YearsCheck' => $over60YearsCheck,
                'specialMedicalNeedsCheck' => $MainApplicantspecialMedicalNeedsCheck,
                'status' => "pending",
                'Cby' => $Cby,
                'created_at' => $datetime,
                'updated_at' => $datetime
            ]
        );        

        $appointment_no = $AppointmentNumber;
        $date = $AppointmentDate;
        $time = $time;
        $NoOfFamily = $NoOfFamilyMembers;
        $noOfMembers = $NoOfFamily;
        $datetime = date('Y-m-d H:i:s');

        DB::table('appointment_cancel_and_reschedule_availability')->insert(
            ['appointment_no' => $appointment_no, 'date' => $date, 'time' => $time, 'no_members' => $noOfMembers, 'status' => 'New', 'created_at' => $datetime, 'updated_at' => $datetime]
        );

        return response()->json(['result' => TRUE, 'MainpassportNumber' => $PassportNumber, 'Email' => $EmailAddress, 'appointment_no' => $appointment_no, 'registerApplicantId' => $Fid]);
    }
}
