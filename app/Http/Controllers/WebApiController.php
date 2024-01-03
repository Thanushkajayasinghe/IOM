<?php

namespace App\Http\Controllers;

use Carbon\Carbon; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Picqer\Barcode\BarcodeGeneratorSVG;

class WebApiController extends Controller
{

    public function getHolidayCountApi(Request $request)
    {
        $d1 = $request->d1;
        $d2 = $request->d2;

        $res = DB::table('holiday_calender')
            ->whereBetween('holiday', [$d1, $d2])
            ->count();

        return response()->json(['result' => $res]);
    }


    public function checkLimitExceedingAppointment(Request $request)
    {
        $MemberCount = $request->MemberCount;
        $date = $request->date;

        $applicantCount = DB::table('appointment_cancel_and_reschedule_availability')
            ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'appointment_cancel_and_reschedule_availability.appointment_no')
            ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
            ->where([
                ['appointment_cancel_and_reschedule_availability.date', '=', $date],
                ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
                ['appointment_cancel_and_reschedule_availability.status', '!=', 'Cancelled']
            ])->sum('appointment_cancel_and_reschedule_availability.no_members');


        $timestamp = strtotime($date);
        $thursday = date("l", $timestamp);



        //     if ($thursday == "Thursday") {
        //         $availableAppointments = DB::table('master_settings')->select(DB::raw('(10 * usersperslot) as avilAppCount'))->where('effectivedate', '<=', date('Y-m-d'))->orderBy('effectivedate', 'desc')->first();
        //      } else {
        $availableAppointments = DB::table('master_settings')->select(DB::raw('(slots * usersperslot) as avilAppCount'))->where('effectivedate', '<=', date('Y-m-d'))->orderBy('effectivedate', 'desc')->first();
        //    }

        //if($date >= '2020-09-01'){

        //	 $availableAppointments = DB::table('master_settings')->select(DB::raw('(slots * 9) as avilAppCount'))->where('effectivedate', '<=', date('Y-m-d'))->orderBy('effectivedate', 'desc')->first();
        //}
        $availableAppointmentsCount = $availableAppointments->avilappcount;

        if ($availableAppointmentsCount > $applicantCount) {
            return response()->json(true);
        } else {
            return response()->json("Token Limit");
        }
    }


    public function LoadTime(Request $request)
    {
        $date = $request->date;
        $res = DB::table('master_settings')
            ->where([
                ['effectivedate', '<=', $date]
            ])
            ->orderBy('effectivedate', 'desc')->first();

        return response()->json(['result' => $res]);
    }


    public function LoadTimeAvailable(Request $request)
    {
        $date = $request->date;

        $arrayTimes = array();

        $timeList = ["08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00", "16:30", "17:00"];

        foreach ($timeList as $timex) {

            $result = DB::table('appointment_cancel_and_reschedule_availability')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'appointment_cancel_and_reschedule_availability.appointment_no')
                ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->where([
                    ['appointment_cancel_and_reschedule_availability.date', '=', $date],
                    ['appointment_cancel_and_reschedule_availability.time', '=', $timex],
                    ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
                    ['appointment_cancel_and_reschedule_availability.status', '!=', 'Cancelled']
                ])->sum('appointment_cancel_and_reschedule_availability.no_members');

            array_push($arrayTimes, $timex . "-" . $result);
        }

        $members = DB::table('scheduledaystime')
            ->where('date', $date)
            ->first();

        return response()->json(['result' => $arrayTimes, 'mem' => $members]);
    }


    public function InsertOnlineDataApi(Request $request)
    {
        $appStat = $request->appStat;
        $familyType = $request->familyType;
        $familyMembers = $request->familyMembers;
        $arrivalDate = $request->arrivalDate;
        $countryOfOrigin = $request->countryOfOrigin;
        $appointmentDate = $request->appointmentDate;
        $appointmentTime = $request->appointmentTime;

        $titleMain = $request->titleMain;
        $genderMain = $request->genderMain;
        $dobMain = $request->dobMain;
        $firstNameMain = $request->firstNameMain;
        $lastNameMain = $request->lastNameMain;
        $nationalityMain = $request->nationalityMain;
        $passportMain = $request->passportMain;
        $prevPassportMain = $request->prevPassportMain;
        $countryMain = $request->countryMain;
        $countryLast3YearsMain = $request->countryLast3YearsMain;
        $chkWheelChairAccessMain = $request->chkWheelChairAccessMain;
        $chkFeedingRoomMain = $request->chkFeedingRoomMain;
        $chkMotherWithChildrenLess5Main = $request->chkMotherWithChildrenLess5Main;
        $chkOtherMain = $request->chkOtherMain;
        $emailMain = $request->emailMain;
        $prefLanguageMain = $request->prefLanguageMain;
        $emergencyContactNo = $request->emergencyContactNo;
        $addressMain = $request->addressMain;
        $streetMain = $request->streetMain;
        $cityMain = $request->cityMain;
        $postalCodeMain = $request->postalCodeMain;
        $telFixedLineMain = $request->telFixedLineMain;
        $mobileMain = $request->mobileMain;
        $preferredContactMethod = $request->preferredContactMethod;
        $over60YearsCheckMain = $request->over60YearsCheckMain;

        $sponsorName = $request->sponsorName;
        $sponsorTelephoneFixed = $request->sponsorTelephoneFixed;
        $sponsorEmail = $request->sponsorEmail;
        $sponsorMobile = $request->sponsorMobile;
        $sponsorAddress = $request->sponsorAddress;

        $status = $request->status;

        $datetime = date('Y-m-d H:i:s');

        $res = DB::table('register_applicant_details')
            ->join('appointment_cancel_and_reschedule_availability', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
            ->where([
                ['register_applicant_details.PassportNumber', '=', $passportMain],
                ['register_applicant_details.MemberStatus', '=', 'MainMember'],
                ['appointment_cancel_and_reschedule_availability.status', '!=', 'Cancelled']
            ])->first();

        if (!empty($res)) {
            $appointmentDatex = strtotime($res->date);

            $now = time();
            $difference = $appointmentDatex - $now;
            $days = floor($difference / (60 * 60 * 24));


            $AlreadySubmitted = "";

            if ($days >= 0) {

                $AlreadySubmitted = "WaitExpAppDate";

                return response()->json(['result' => $AlreadySubmitted, 'days' => $days]);
            } else {

                $registerApplicantId = DB::table('register_applicants')->insertGetId(
                    [
                        'visaRenewalOrNot' => $appStat, 'ApplicationType' => $familyType, 'NoOfFamilyMembers' => $familyMembers,
                        'DateOfArrival' => $arrivalDate,
                        'AppointmentDate' => $appointmentDate, 'PriorityRequest' => 'No Priority',
                        'CountryOfOrigin' => $countryOfOrigin, 'EmailAddress' => $emailMain,
                        'emergencyContactNo' => $emergencyContactNo, 'SlAddress' => $addressMain,
                        'SlStreet' => $streetMain, 'SlCity' => $cityMain, 'SlPostalCode' => $postalCodeMain,
                        'SlTelephoneFixedLine' => $telFixedLineMain, 'SlMobile' => $mobileMain,
                        'PreferredContactMethod' => $preferredContactMethod, 'SponsorName' => $sponsorName,
                        'SponsorTelephoneFixedLine' => $sponsorTelephoneFixed,
                        'SponsorEmailAddress' => $sponsorEmail, 'SponsorMobile' => $sponsorMobile,
                        'SponsorAddress' => $sponsorAddress, 'Cby' => 'Online',
                        'StatusSaveOrSubmith' => $status,
                        'InterpretationLanguage' => $prefLanguageMain, 'created_at' => $datetime, 'updated_at' => $datetime
                    ]
                );

                $date = date('Y-m-d  h:i:sa');
                $wordCount = 1;
                $rand = rand(10, 99);
                $appointmentNumber = (strtotime($date) * 1000) . $rand . $wordCount;

                DB::table('register_applicant_details')->insert(
                    [
                        'FkId' => $registerApplicantId,
                        'AppointmentNumber' => $appointmentNumber,
                        'Title' => $titleMain,
                        'FirstName' => $firstNameMain,
                        'LastName' => $lastNameMain,
                        'DateOfBirth' => $dobMain,
                        'Gender' => $genderMain,
                        'Nationality' => $nationalityMain,
                        'PassportNumber' => $passportMain,
                        'PreviousPassportIfAny' => $prevPassportMain,
                        'CountryOfBirth' => $countryMain,
                        'CountryVisitedDuringLast3Years' => $countryLast3YearsMain,
                        'over60YearsCheck' => $over60YearsCheckMain,
                        'wheelChairAccess' => $chkWheelChairAccessMain,
                        'feedingRoom' => $chkFeedingRoomMain,
                        'motherWithChildrenLess5' => $chkMotherWithChildrenLess5Main,
                        'otherNeeds' => $chkOtherMain,
                        'MemberStatus' => "MainMember",
                        'Cby' => 'Online',
                        'PregnancyStatus' => "",
                        'status' => 'pending',
                        'created_at' => $datetime,
                        'updated_at' => $datetime
                    ]
                );

                $noOfMembers = $familyMembers + 1;

                DB::table('appointment_cancel_and_reschedule_availability')->insert(
                    [
                        'appointment_no' => $appointmentNumber, 'date' => $appointmentDate,
                        'time' => $appointmentTime, 'no_members' => $noOfMembers, 'status' => 'New',
                        'created_by' => 'Online', 'created_at' => $datetime, 'updated_at' => $datetime
                    ]
                );

                return response()->json(['result' => true, 'registerApplicantId' => $registerApplicantId, 'mainAppointmentNo' => $appointmentNumber]);
            }
        } else {

            $registerApplicantId = DB::table('register_applicants')->insertGetId(
                [
                    'visaRenewalOrNot' => $appStat, 'ApplicationType' => $familyType, 'NoOfFamilyMembers' => $familyMembers,
                    'DateOfArrival' => $arrivalDate,
                    'AppointmentDate' => $appointmentDate, 'PriorityRequest' => 'No Priority',
                    'CountryOfOrigin' => $countryOfOrigin, 'EmailAddress' => $emailMain,
                    'SlAddress' => $addressMain, 'SlStreet' => $streetMain, 'SlCity' => $cityMain, 'SlPostalCode' => $postalCodeMain,
                    'SlTelephoneFixedLine' => $telFixedLineMain, 'SlMobile' => $mobileMain,
                    'PreferredContactMethod' => $preferredContactMethod, 'SponsorName' => $sponsorName,
                    'SponsorTelephoneFixedLine' => $sponsorTelephoneFixed,
                    'SponsorEmailAddress' => $sponsorEmail, 'SponsorMobile' => $sponsorMobile,
                    'SponsorAddress' => $sponsorAddress, 'Cby' => 'Online',
                    'StatusSaveOrSubmith' => $status,
                    'InterpretationLanguage' => $prefLanguageMain, 'created_at' => $datetime, 'updated_at' => $datetime
                ]
            );

            $date = date('Y-m-d  h:i:sa');
            $wordCount = 1;
            $rand = rand(10, 99);
            $appointmentNumber = (strtotime($date) * 1000) . $rand . $wordCount;

            DB::table('register_applicant_details')->insert(
                [
                    'FkId' => $registerApplicantId,
                    'AppointmentNumber' => $appointmentNumber,
                    'Title' => $titleMain,
                    'FirstName' => $firstNameMain,
                    'LastName' => $lastNameMain,
                    'DateOfBirth' => $dobMain,
                    'Gender' => $genderMain,
                    'Nationality' => $nationalityMain,
                    'PassportNumber' => $passportMain,
                    'PreviousPassportIfAny' => $prevPassportMain,
                    'CountryOfBirth' => $countryMain,
                    'CountryVisitedDuringLast3Years' => $countryLast3YearsMain,
                    'over60YearsCheck' => $over60YearsCheckMain,
                    'wheelChairAccess' => $chkWheelChairAccessMain,
                    'feedingRoom' => $chkFeedingRoomMain,
                    'motherWithChildrenLess5' => $chkMotherWithChildrenLess5Main,
                    'otherNeeds' => $chkOtherMain,
                    'MemberStatus' => "MainMember",
                    'Cby' => 'Online',
                    'PregnancyStatus' => "",
                    'status' => 'pending',
                    'created_at' => $datetime,
                    'updated_at' => $datetime
                ]
            );

            $noOfMembers = $familyMembers + 1;

            DB::table('appointment_cancel_and_reschedule_availability')->insert(
                [
                    'appointment_no' => $appointmentNumber, 'date' => $appointmentDate,
                    'time' => $appointmentTime, 'no_members' => $noOfMembers, 'status' => 'New',
                    'created_by' => 'Online', 'created_at' => $datetime, 'updated_at' => $datetime
                ]
            );

            return response()->json(['result' => true, 'registerApplicantId' => $registerApplicantId, 'mainAppointmentNo' => $appointmentNumber]);
        }
    }


    public function InsertMembersOnlineDataApi(Request $request)
    {
        $date = date('Y-m-d  h:i:sa');

        $registerApplicantId = $request->registerApplicantId;

        $coun = $request->coun;
        $wordCount = $registerApplicantId + $coun;
        $appointmentNumber = (strtotime($date) * 1000) . rand(10, 99) . $wordCount;

        $titleMem = $request->titleMem;
        $firstNameMem = $request->firstNameMem;
        $lastNameMem = $request->lastNameMem;
        $passportMem = $request->passportMem;
        $dobMem = $request->dobMem;
        $genderMem = $request->genderMem;
        $pregnancyMem = $request->pregnancyMem;
        $nationalityMem = $request->nationalityMem;
        $prevpassMem = $request->prevpassMem;
        $countryofbirthMem = $request->countryofbirthMem;
        $countryvisitedduringlast3yearsMem = $request->countryvisitedduringlast3yearsMem;
        $over60yearscheckMem = $request->over60yearscheckMem;
        $specialmedicalneedscheckwheelchairMem = $request->specialmedicalneedscheckwheelchairMem;
        $checkboxlablepreftypefeedroomMem = $request->checkboxlablepreftypefeedroomMem;
        $checkboxlablepreftypemomMem = $request->checkboxlablepreftypemomMem;
        $checkboxlablepreftypeotherMem = $request->checkboxlablepreftypeotherMem;


        $datetime = date('Y-m-d H:i:s');

        DB::table('register_applicant_details')->insert(
            [
                'FkId' => $registerApplicantId,
                'AppointmentNumber' => $appointmentNumber,
                'Title' => $titleMem,
                'FirstName' => $firstNameMem,
                'LastName' => $lastNameMem,
                'DateOfBirth' => $dobMem,
                'Gender' => $genderMem,
                'Nationality' => $nationalityMem,
                'PassportNumber' => $passportMem,
                'PreviousPassportIfAny' => $prevpassMem,
                'CountryOfBirth' => $countryofbirthMem,
                'CountryVisitedDuringLast3Years' => $countryvisitedduringlast3yearsMem,
                'over60YearsCheck' => $over60yearscheckMem,
                'wheelChairAccess' => $specialmedicalneedscheckwheelchairMem,
                'feedingRoom' => $checkboxlablepreftypefeedroomMem,
                'motherWithChildrenLess5' => $checkboxlablepreftypemomMem,
                'otherNeeds' => $checkboxlablepreftypeotherMem,
                'MemberStatus' => "OtherMember",
                'Cby' => 'Online',
                'PregnancyStatus' => $pregnancyMem,
                'status' => 'pending',
                'created_at' => $datetime,
                'updated_at' => $datetime
            ]
        );


        return response()->json(['result' => true]);
    }


    public function SendEmailsApi(Request $request)
    {
        $mainAppointmentNo = $request->Appno;
        $Email = $request->email;

        $subject = 'IOM Registration';
        $sendersTo = $Email;

        $ApplicantDetails = DB::table('register_applicants')
            ->leftJoin('register_applicant_details', 'register_applicants.id', '=', 'register_applicant_details.FkId')
            ->leftJoin('appointment_cancel_and_reschedule_availability', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
            ->select(
                'register_applicants.id',
                'appointment_cancel_and_reschedule_availability.time',
                'appointment_cancel_and_reschedule_availability.date',
                'register_applicant_details.PassportNumber'
            )->where([
                ['register_applicant_details.AppointmentNumber', '=', $mainAppointmentNo],
                ['register_applicant_details.MemberStatus', '=', 'MainMember'],
                ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
            ])->first();

        //---------------------------   Get Member Details   -----------------------------------------------------------

        $ApplicantId = $ApplicantDetails->id;
        $mainPassportNumber = $ApplicantDetails->PassportNumber;
        $Date = $ApplicantDetails->date;
        $Time = $ApplicantDetails->time;

        $getMemberDetails = DB::table('register_applicant_details')
            ->select(
                'register_applicant_details.FirstName',
                'register_applicant_details.LastName',
                'register_applicant_details.PassportNumber',
                'register_applicant_details.AppointmentNumber'
            )
            ->where('register_applicant_details.FkId', '=', $ApplicantId)
            ->get();

        //Barcode Generate
        $getMemberDetails = $getMemberDetails->each(function ($item, $key) {
            $appNo = $item->AppointmentNumber;

            $barcode = new BarcodeGeneratorPNG();
            $code = base64_encode($barcode->getBarcode($appNo, $barcode::TYPE_CODE_128));

            $item->barcode = $code;
        });

        $data = ['MainpassportNumber' => $mainPassportNumber, 'date' => $Date, 'time' => $Time, 'result2' => $getMemberDetails];

        Mail::send('emails.sendMail', $data, function ($message) use ($sendersTo, $subject) {

            $message->from('ihacsl@iom.int', 'IOM');
            $message->to($sendersTo)->subject($subject);
        });

        return response()->json(['result' => 'Email has been sent to ' . $sendersTo]);
    }


    public function SendEmailsApiSave(Request $request)
    {
        $mainAppointmentNo = $request->Appno;
        $Email = $request->email;

        $subject = 'IOM Registration';
        $sendersTo = $Email;

        $ApplicantDetails = DB::table('register_applicants')
            ->leftJoin('register_applicant_details', 'register_applicants.id', '=', 'register_applicant_details.FkId')
            ->leftJoin('appointment_cancel_and_reschedule_availability', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
            ->select(
                'register_applicants.id',
                'appointment_cancel_and_reschedule_availability.time',
                'appointment_cancel_and_reschedule_availability.date',
                'register_applicant_details.PassportNumber'
            )->where([
                ['register_applicant_details.AppointmentNumber', '=', $mainAppointmentNo],
                ['register_applicant_details.MemberStatus', '=', 'MainMember']
            ])->first();

        //---------------------------   Get Member Details   -----------------------------------------------------------

        $ApplicantId = $ApplicantDetails->id;
        $mainPassportNumber = $ApplicantDetails->PassportNumber;
        $Date = $ApplicantDetails->date;
        $Time = $ApplicantDetails->time;

        $getMemberDetails = DB::table('register_applicant_details')
            ->select(
                'register_applicant_details.FirstName',
                'register_applicant_details.LastName',
                'register_applicant_details.PassportNumber',
                'register_applicant_details.AppointmentNumber'
            )
            ->where('register_applicant_details.FkId', '=', $ApplicantId)
            ->get();

        //Barcode Generate
        $getMemberDetails = $getMemberDetails->each(function ($item, $key) {
            $appNo = $item->AppointmentNumber;

            $barcode = new BarcodeGeneratorPNG();
            $code = base64_encode($barcode->getBarcode($appNo, $barcode::TYPE_CODE_128));

            $item->barcode = $code;
        });

        $data = ['MainpassportNumber' => $mainPassportNumber, 'date' => $Date, 'time' => $Time, 'result2' => $getMemberDetails];

        Mail::send('emails.sendSavedMail', $data, function ($message) use ($sendersTo, $subject) {

            $message->from('ihacsl@iom.int', 'IOM');
            $message->to($sendersTo)->subject($subject);
        });

        return response()->json(['result' => 'Email has been sent to ' . $sendersTo]);
    }


    public function CheckPassportApi(Request $request)
    {
        $passportnumber = $request->passportnumber;

        $res = DB::SELECT("select * from register_applicant_details a
inner join appointment_cancel_and_reschedule_availability b on b.appointment_no = a.\"AppointmentNumber\"
where b.status != 'Cancelled' and  a.id = (select max(id) from register_applicant_details where \"PassportNumber\" = '$passportnumber')");

        $AlreadySubmitted = null;
        $daysx = null;

        if ($res != null) {

            $daysx = $res[0]->date;
            $appointmentDate = strtotime($daysx);

            $now = time();
            $difference = $appointmentDate - $now;
            $days = floor($difference / (60 * 60 * 24));

            if ($days >= 0) {

                $AlreadySubmitted = "WaitExpAppDate";
            } else {

                $AlreadySubmitted = DB::table('register_applicant_details')
                    ->leftJoin('appointment_cancel_and_reschedule_availability', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
                    ->where([
                        ['register_applicant_details.PassportNumber', '=', $passportnumber],
                        ['appointment_cancel_and_reschedule_availability.status', '!=', 'Cancelled'],
                    ])->count();
            }
        }

        return response()->json(['result' => $AlreadySubmitted, 'days' => $daysx]);
    }


    public function GeneratePDF(Request $request)
    {
        $mainAppointmentNo = $request->mainAppointmentNo;

        $ApplicantDetails = DB::table('register_applicants')
            ->leftJoin('register_applicant_details', 'register_applicants.id', '=', 'register_applicant_details.FkId')
            ->leftJoin('appointment_cancel_and_reschedule_availability', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
            ->select(
                'register_applicants.id',
                'appointment_cancel_and_reschedule_availability.time',
                'appointment_cancel_and_reschedule_availability.date',
                'register_applicant_details.PassportNumber'
            )->where([
                ['register_applicant_details.AppointmentNumber', '=', $mainAppointmentNo],
                ['register_applicant_details.MemberStatus', '=', 'MainMember'],
                ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
            ])->first();

        //---------------------------   Get Member Details   -----------------------------------------------------------

        $ApplicantId = $ApplicantDetails->id;
        $mainPassportNumber = $ApplicantDetails->PassportNumber;
        $date = $ApplicantDetails->date;
        $time = $ApplicantDetails->time;

        $getMemberDetails = DB::table('register_applicant_details')
            ->select(
                'register_applicant_details.FirstName',
                'register_applicant_details.LastName',
                'register_applicant_details.PassportNumber',
                'register_applicant_details.AppointmentNumber'
            )->where('register_applicant_details.FkId', '=', $ApplicantId)
            ->get();

        $getMemberDetails = $getMemberDetails->each(function ($item, $key) {

            $appNo = $item->AppointmentNumber;

            $barcode = new BarcodeGeneratorSVG();
            $code = base64_encode($barcode->getBarcode($appNo, $barcode::TYPE_CODE_128));

            $item->barcode = $code;
        });

        return response()->json(['mainPassportNumber' => $mainPassportNumber, 'date' => $date, 'time' => $time, 'getMemberDetails' => $getMemberDetails]);
    }


    public function GenerateSavedPDF(Request $request)
    {
        $mainAppointmentNo = $request->mainAppointmentNo;

        $ApplicantDetails = DB::table('register_applicants')
            ->leftJoin('register_applicant_details', 'register_applicants.id', '=', 'register_applicant_details.FkId')
            ->leftJoin('appointment_cancel_and_reschedule_availability', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
            ->select(
                'register_applicants.id',
                'appointment_cancel_and_reschedule_availability.time',
                'appointment_cancel_and_reschedule_availability.date',
                'register_applicant_details.PassportNumber'
            )->where([
                ['register_applicant_details.AppointmentNumber', '=', $mainAppointmentNo],
                ['register_applicant_details.MemberStatus', '=', 'MainMember']
            ])->first();

        //---------------------------   Get Member Details   -----------------------------------------------------------

        $ApplicantId = $ApplicantDetails->id;
        $mainPassportNumber = $ApplicantDetails->PassportNumber;
        $date = $ApplicantDetails->date;
        $time = $ApplicantDetails->time;

        $getMemberDetails = DB::table('register_applicant_details')
            ->select(
                'register_applicant_details.FirstName',
                'register_applicant_details.LastName',
                'register_applicant_details.PassportNumber',
                'register_applicant_details.AppointmentNumber'
            )->where('register_applicant_details.FkId', '=', $ApplicantId)
            ->get();

        $getMemberDetails = $getMemberDetails->each(function ($item, $key) {

            $appNo = $item->AppointmentNumber;

            $barcode = new BarcodeGeneratorSVG();
            $code = base64_encode($barcode->getBarcode($appNo, $barcode::TYPE_CODE_128));

            $item->barcode = $code;
        });

        return response()->json(['mainPassportNumber' => $mainPassportNumber, 'date' => $date, 'time' => $time, 'getMemberDetails' => $getMemberDetails]);
    }

 
    public function HolidayCalenderLoadDataApi(Request $request)
    {
        $minDateSend = date($request->minDateSend);
        $maxDateSend = date($request->maxDateSend);
        $dateArray = $request->dateArray;

        $availabledates = array();
        $notAvailabledates = array();

        $res = DB::table('holiday_calender')
			->whereDate('holiday','>=', $minDateSend)
            ->whereDate('holiday','<=', $maxDateSend)
            ->pluck('holiday')->toArray();

        $co = 0;
        foreach ($dateArray as $date) {		
			

            $countOnSlot = DB::select("SELECT 
            (((case when slot1='on' then 1 else 0 end) + (case when slot2='on' then 1 else 0 end) + (case when slot3='on' then 1 else 0 end) +
            (case when slot4='on' then 1 else 0 end) + (case when slot5='on' then 1 else 0 end) + (case when slot6='on' then 1 else 0 end) + 
            (case when slot7='on' then 1 else 0 end) + (case when slot8='on' then 1 else 0 end) + (case when slot9='on' then 1 else 0 end) +
            (case when slot10='on' then 1 else 0 end) + (case when slot11='on' then 1 else 0 end) + (case when slot12='on' then 1 else 0 end) +
            (case when slot13='on' then 1 else 0 end) + (case when slot14='on' then 1 else 0 end) + (case when slot15='on' then 1 else 0 end) +
            (case when slot16='on' then 1 else 0 end) + (case when slot17='on' then 1 else 0 end) + (case when slot18='on' then 1 else 0 end) +
            (case when slot19='on' then 1 else 0 end)) * members::int) as count
            FROM scheduledaystime
            WHERE date = '$date'")[0]->count;
			

            $availableAppointmentsCount = $countOnSlot;

            $sumAmount = DB::table('appointment_cancel_and_reschedule_availability')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'appointment_cancel_and_reschedule_availability.appointment_no')
                ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->where([
                    ['appointment_cancel_and_reschedule_availability.date', '=', $date],
                    ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
                    ['appointment_cancel_and_reschedule_availability.status', '!=', 'Cancelled']
                ])->sum('appointment_cancel_and_reschedule_availability.no_members');

            if ($availableAppointmentsCount > $sumAmount) {

                //============================Enable if Available dates also need==========================================
                //                $co++;
                //                
                //                if ($co <= 5) {
                //                    if (!in_array($date, $res)) {
                //                        array_push($availabledates, $date);
                //                    }
                //                }
                //=========================================================================================================

            } else {
                array_push($notAvailabledates, $date);
            }
        }

        $closed = DB::table('manageworkschedule')
            ->where('status', 'wholeDay')
            ->whereBetween('date', [$minDateSend, $maxDateSend])
            ->get();


        return response()->json(['holidays' => $res, 'closeddates' => $closed, 'availDates' => $availabledates, 'notAvailDates' => $notAvailabledates]);
    }

    //==================================================================

    public function SearchPassportNoWiseDetails(Request $request)
    {
        $appointmentNo = $request->appointmentNo;

        $registerApplicantsDetails = DB::table('register_applicant_details')
            ->where('AppointmentNumber', $appointmentNo)
            ->get();

        if ($registerApplicantsDetails->count() != 0) {

            $id = $registerApplicantsDetails[0]->FkId;

            $otherApplicantsDetails = DB::table('register_applicant_details')
                ->where('FkId', $id)
                ->where('MemberStatus', 'OtherMember')
                ->get();

            $registerApplicants = DB::table('register_applicants')
                ->where('id', $id)
                ->get();

            $applicantCancelAndReschedule = DB::table('appointment_cancel_and_reschedule_availability')
                ->where('appointment_no', $appointmentNo)
                ->get();

            return response()->json(['result' => true, 'registerApplicantsDetails' => $registerApplicantsDetails, 'registerApplicants' => $registerApplicants, 'applicantCancelAndReschedule' => $applicantCancelAndReschedule, 'otherApplicantsDetails' => $otherApplicantsDetails]);
        } else {

            return response()->json(['result' => false]);
        }
    }


    public function UpdateOnlineDataApi(Request $request)
    {
        $appointmentNoText = $request->appointmentNoText;

        $familyType = $request->familyType;
        $familyMembers = $request->familyMembers;
        $arrivalDate = $request->arrivalDate;
        $countryOfOrigin = $request->countryOfOrigin;
        $appointmentDate = $request->appointmentDate;
        $appointmentTime = $request->appointmentTime;

        $titleMain = $request->titleMain;
        $genderMain = $request->genderMain;
        $dobMain = $request->dobMain;
        $firstNameMain = $request->firstNameMain;
        $lastNameMain = $request->lastNameMain;
        $nationalityMain = $request->nationalityMain;
        $passportMain = $request->passportMain;
        $prevPassportMain = $request->prevPassportMain;
        $countryMain = $request->countryMain;
        $countryLast3YearsMain = $request->countryLast3YearsMain;
        $chkWheelChairAccessMain = $request->chkWheelChairAccessMain;
        $chkFeedingRoomMain = $request->chkFeedingRoomMain;
        $chkMotherWithChildrenLess5Main = $request->chkMotherWithChildrenLess5Main;
        $chkOtherMain = $request->chkOtherMain;
        $emailMain = $request->emailMain;
        $prefLanguageMain = $request->prefLanguageMain;
        $emergencyContactNo = $request->emergencyContactNo;
        $addressMain = $request->addressMain;
        $streetMain = $request->streetMain;
        $cityMain = $request->cityMain;
        $postalCodeMain = $request->postalCodeMain;
        $telFixedLineMain = $request->telFixedLineMain;
        $mobileMain = $request->mobileMain;
        $preferredContactMethod = $request->preferredContactMethod;
        $over60YearsCheckMain = $request->over60YearsCheckMain;

        $sponsorName = $request->sponsorName;
        $sponsorTelephoneFixed = $request->sponsorTelephoneFixed;
        $sponsorEmail = $request->sponsorEmail;
        $sponsorMobile = $request->sponsorMobile;
        $sponsorAddress = $request->sponsorAddress;

        $status = $request->status;
        $datetime = date('Y-m-d H:i:s');

        $registerApplicantsDetails = DB::table('register_applicant_details')
            ->where('AppointmentNumber', $appointmentNoText)
            ->get();

        $id = $registerApplicantsDetails[0]->FkId;

        DB::table('register_applicants')->where('id', $id)->update(
            [
                'ApplicationType' => $familyType,
                'NoOfFamilyMembers' => $familyMembers, 'DateOfArrival' => $arrivalDate,
                'AppointmentDate' => $appointmentDate, 'PriorityRequest' => 'No Priority', 'CountryOfOrigin' => $countryOfOrigin,
                'EmailAddress' => $emailMain, 'emergencyContactNo' => $emergencyContactNo,
                'SlAddress' => $addressMain, 'SlStreet' => $streetMain, 'SlCity' => $cityMain,
                'SlPostalCode' => $postalCodeMain, 'SlTelephoneFixedLine' => $telFixedLineMain,
                'SlMobile' => $mobileMain, 'PreferredContactMethod' => $preferredContactMethod, 'SponsorName' => $sponsorName,
                'SponsorTelephoneFixedLine' => $sponsorTelephoneFixed,
                'SponsorEmailAddress' => $sponsorEmail, 'SponsorMobile' => $sponsorMobile, 'SponsorAddress' => $sponsorAddress,
                'Cby' => 'Online', 'StatusSaveOrSubmith' => $status, 'InterpretationLanguage' => $prefLanguageMain,
                'updated_at' => $datetime
            ]
        );

        $noOfMembers = $familyMembers + 1;

        DB::table('appointment_cancel_and_reschedule_availability')
            ->where('appointment_no', $appointmentNoText)
            ->update(
                ['date' => $appointmentDate, 'time' => $appointmentTime, 'no_members' => $noOfMembers, 'status' => 'New', 'updated_at' => $datetime]
            );


        DB::table('register_applicant_details')->where('AppointmentNumber', $appointmentNoText)->update(
            [
                'Title' => $titleMain,
                'FirstName' => $firstNameMain,
                'LastName' => $lastNameMain,
                'DateOfBirth' => $dobMain,
                'Gender' => $genderMain,
                'Nationality' => $nationalityMain,
                'PassportNumber' => $passportMain,
                'PreviousPassportIfAny' => $prevPassportMain,
                'CountryOfBirth' => $countryMain,
                'CountryVisitedDuringLast3Years' => $countryLast3YearsMain,
                'over60YearsCheck' => $over60YearsCheckMain,
                'wheelChairAccess' => $chkWheelChairAccessMain,
                'feedingRoom' => $chkFeedingRoomMain,
                'motherWithChildrenLess5' => $chkMotherWithChildrenLess5Main,
                'otherNeeds' => $chkOtherMain,
                'MemberStatus' => "MainMember",
                'Cby' => 'Online',
                'PregnancyStatus' => "",
                'status' => 'pending',
                'updated_at' => $datetime
            ]
        );

        return response()->json(['result' => true]);
    }


    public function UpdateOnlineRegDataMemApi(Request $request)
    {
        $id = $request->id;

        $titleMem = $request->titleMem;
        $firstNameMem = $request->firstNameMem;
        $lastNameMem = $request->lastNameMem;
        $passportMem = $request->passportMem;
        $dobMem = $request->dobMem;
        $genderMem = $request->genderMem;
        $pregnancyMem = $request->pregnancyMem;
        $nationalityMem = $request->nationalityMem;
        $prevpassMem = $request->prevpassMem;
        $countryofbirthMem = $request->countryofbirthMem;
        $countryvisitedduringlast3yearsMem = $request->countryvisitedduringlast3yearsMem;
        $over60yearscheckMem = $request->over60yearscheckMem;
        $specialmedicalneedscheckwheelchairMem = $request->specialmedicalneedscheckwheelchairMem;
        $checkboxlablepreftypefeedroomMem = $request->checkboxlablepreftypefeedroomMem;
        $checkboxlablepreftypemomMem = $request->checkboxlablepreftypemomMem;
        $checkboxlablepreftypeotherMem = $request->checkboxlablepreftypeotherMem;

        $datetime = date('Y-m-d H:i:s');

        DB::table('register_applicant_details')->where('id', $id)
            ->update([
                'Title' => $titleMem,
                'FirstName' => $firstNameMem,
                'LastName' => $lastNameMem,
                'DateOfBirth' => $dobMem,
                'Gender' => $genderMem,
                'Nationality' => $nationalityMem,
                'PassportNumber' => $passportMem,
                'PreviousPassportIfAny' => $prevpassMem,
                'CountryOfBirth' => $countryofbirthMem,
                'CountryVisitedDuringLast3Years' => $countryvisitedduringlast3yearsMem,
                'over60YearsCheck' => $over60yearscheckMem,
                'wheelChairAccess' => $specialmedicalneedscheckwheelchairMem,
                'feedingRoom' => $checkboxlablepreftypefeedroomMem,
                'motherWithChildrenLess5' => $checkboxlablepreftypemomMem,
                'otherNeeds' => $checkboxlablepreftypeotherMem,
                'MemberStatus' => "OtherMember",
                'Cby' => 'Online',
                'PregnancyStatus' => $pregnancyMem,
                'status' => 'pending',
                'updated_at' => $datetime
            ]);

        return response()->json(['result' => true]);
    }

    //==================================================================

    public function VerifyApplicantApi(Request $request)
    {
        $passportnumber = $request->passportnumber;

        $registerApplicantsDetails = DB::table('register_applicant_details')
            ->leftJoin('appointment_cancel_and_reschedule_availability', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
            ->where('register_applicant_details.PassportNumber', $passportnumber)
            ->whereDate('appointment_cancel_and_reschedule_availability.date', '>=', Carbon::now())
            ->first();

        if (!empty($registerApplicantsDetails)) {

            $id = $registerApplicantsDetails->FkId;
            $appointmentNo = $registerApplicantsDetails->AppointmentNumber;

            $otherApplicantsDetails = DB::table('register_applicant_details')
                ->where('FkId', $id)
                ->where('MemberStatus', 'OtherMember')
                ->orderBy('id', 'asc')
                ->get();

            $registerApplicants = DB::table('register_applicants')
                ->where('id', $id)
                ->get();

            $applicantCancelAndReschedule = DB::table('appointment_cancel_and_reschedule_availability')
                ->where('appointment_no', $appointmentNo)
                ->get();

            return response()->json(['result' => true, 'registerApplicantsDetails' => $registerApplicantsDetails, 'registerApplicants' => $registerApplicants, 'applicantCancelAndReschedule' => $applicantCancelAndReschedule, 'otherApplicantsDetails' => $otherApplicantsDetails]);
        } else {

            return response()->json(['result' => false]);
        }
    }

    //==================================================================

    public function ControlPanelLoginApi(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $credentials = array(
            'email' => $username,
            'password' => $password
        );

        $resp = DB::table('users')
            ->leftJoin('user_details', function ($join) {
                $join->on('users.user_serial', '=', 'user_details.user_serial');
            })
            ->leftJoin('user_group', function ($join) {
                $join->on('users.user_group', '=', 'user_group.group_serial');
            })
            ->where('users.email', $username)
            ->first();

        if (Auth::attempt($credentials)) {

            $groupname = $resp->group_name;
            $userGroup = $resp->user_group;
            $userSerial = $resp->user_serial;

            Session::put('title', $resp->title);
            Session::put('firstName', $resp->first_name);
            Session::put('lastName', $resp->last_name);
            Session::put('id', $resp->user_serial);
            Session::put('userGroup', $resp->user_group);
            Session::put('userName', $username);
            Session::put('GroupName', $groupname);

            return response()->json(['result' => true, 'res' => $resp, 'userGroup' => $userGroup, 'userSerial' => $userSerial, 'GN' => $groupname]);
        } else {
            return response()->json(['result' => false]);
        }
    }


    public function ControlPanelTabLoadApi(Request $request)
    {
        $Tabname = $request->userName;
        $TAB_NO = $request->userName;

        $resp = DB::table('temp_table')
            ->leftJoin('register_applicant_details', 'temp_table.temp_app_no', '=', 'register_applicant_details.AppointmentNumber')
            ->select('register_applicant_details.*')
            ->where([
                ['temp_table.tab_no', '=', $TAB_NO],
                ['temp_table.temp_counsel', '=', '5'],
            ])
            ->get();

        return response()->json(['result' => $resp]);
    }


    public function TabCompleteApi(Request $request)
    {
        $datetime = date('Y-m-d H:i:s');
        $appno = $request->appno;
        $RM = $request->remark;
        $SIN = $request->signature;


        DB::table('counselling_tab')->insert([
            [
                'registration_no' => $appno,
                'remark' => $RM,
                'signature' => $SIN,
                'created_at' => $datetime
            ]
        ]);

        DB::table('temp_table')->where([
            ['temp_app_no', '=', $appno]
        ])->update(['tab_no' => "0", 'tab_status' => '1', 'tab_complete_date' => $datetime]);


        return response()->json(['Done']);
    }


    public function TabLoadDescriptionApi(Request $request)
    {
        $posts = DB::table('tbl_counselling_record')->get();
        return response()->json(['result' => $posts]);
    }


    public function CheckTabLoadApi(Request $request)
    {
        $TAB_NO = $request->userName;

        $resp = DB::table('temp_table')
            ->where([
                ['temp_table.tab_no', '=', $TAB_NO],
                ['temp_table.temp_counsel', '=', '5'],
            ])
            ->get(['tab_no', 'temp_id']);

        return response()->json(['result' => $resp]);
    }

    public function LoadCountryList(Request $request)
    {
        $res = DB::table('countries')
            ->get();

        return response()->json($res);
    }

    public function LoadWebNotice(Request $request)
    {
        $res = DB::table('webnotice')
            ->first();

        return response()->json($res);
    }
}
