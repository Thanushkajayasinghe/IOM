<?php

/**
 * Created by PhpStorm.
 * User: Nishantha
 * Date: 1/29/2019
 * Time: 10:22 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChangeUpdateAppointmentDetailsController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.ChangeUpdateAppointmentDetails')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function lodeAllMainApplicantAppoimentNumbers(Request $request)
    {
        $keyword = $request->search;

        $resp = DB::table('register_applicant_details')
            ->leftJoin('register_applicants', 'register_applicant_details.FkId', '=', 'register_applicants.id')
            ->select('register_applicant_details.AppointmentNumber', 'register_applicant_details.FkId')
            ->where([
                ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
                ['register_applicant_details.MemberStatus', '=', 'MainMember'],
            ])
            ->where('register_applicant_details.AppointmentNumber', 'like', '%' . $keyword . '%')
            ->orderBy('register_applicant_details.AppointmentNumber', 'asc')
            ->get();

        return response()->json($resp);
    }

    public function LodeDetailsAppnoWise(Request $request)
    {
        $appoinmentNo = $request->appoinmentNo;

        $registerApplicantsDetails = DB::table('register_applicant_details')
            ->where('AppointmentNumber', $appoinmentNo)
            ->get();

        $id = $registerApplicantsDetails[0]->FkId;

        $registerApplicants = DB::table('register_applicants')
            ->where('id', $id)
            ->get();

        $applicantCancelAndReschedule = DB::table('appointment_cancel_and_reschedule_availability')
            ->where('appointment_no', $appoinmentNo)
            ->get();

        $otherApplicantsDetails = DB::table('register_applicant_details')
            ->where('FkId', $id)
            ->where('MemberStatus', 'OtherMember')
            ->orderBy('id', 'asc')
            ->get();

        $temp = DB::table('temp_table')
            ->where('temp_app_no', $appoinmentNo)
            ->get();

        return response()->json(['registerApplicantsDetails' => $registerApplicantsDetails, 'registerApplicants' => $registerApplicants, 'applicantCancelAndReschedule' => $applicantCancelAndReschedule, 'otherApplicantsDetails' => $otherApplicantsDetails, 'temp' => $temp]);
    }

    public function deleteOnlineRegDataMem(Request $request)
    {
        $serial = $request->serial;
        $memRegAppNo = $request->memRegAppNo;

        $registerApplicantsDetails = DB::table('register_applicant_details')
            ->where('id', $serial)
            ->get();

        $id = $registerApplicantsDetails[0]->FkId;

        $mainMemAppNo = DB::table('register_applicant_details')
            ->where('FkId', $id)
            ->where('MemberStatus', 'MainMember')
            ->get();

        $appNoMain = $mainMemAppNo[0]->AppointmentNumber;

        $cancelAndRescheduleAvailability = DB::table('appointment_cancel_and_reschedule_availability')
            ->where('appointment_no', $appNoMain)
            ->get();

        $memCount = $cancelAndRescheduleAvailability[0]->no_members;

        DB::table('register_applicants')->where('id', $id)
            ->update(['NoOfFamilyMembers' => $memCount - 2]);

        DB::table('appointment_cancel_and_reschedule_availability')->where('appointment_no', $appNoMain)
            ->update(['no_members' => $memCount - 1]);

        DB::table('register_applicant_details')->where('id', $serial)->delete();

        DB::table('temp_table')->where('temp_app_no', $memRegAppNo)->delete();

        return response()->json(['result' => true]);
    }

    public function Update(Request $request)
    {
        $appNo = $request->appNo;
        $countryOfOrigin = $request->countryOfOrigin;

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

        $emailMain = $request->emailMain;
        $addressMain = $request->addressMain;
        $streetMain = $request->streetMain;
        $cityMain = $request->cityMain;
        $postalCodeMain = $request->postalCodeMain;
        $telFixedLineMain = $request->telFixedLineMain;
        $mobileMain = $request->mobileMain;

        $sponsorName = $request->sponsorName;
        $sponsorTelephoneFixed = $request->sponsorTelephoneFixed;
        $sponsorEmail = $request->sponsorEmail;
        $sponsorMobile = $request->sponsorMobile;
        $sponsorAddress = $request->sponsorAddress;

        $datetime = date('Y-m-d H:i:s');

        $registerApplicantsDetails = DB::table('register_applicant_details')
            ->where('AppointmentNumber', $appNo)
            ->get();

        DB::table('temp_table')
            ->where('temp_app_no', $appNo)
            ->update(['temp_passport' => $passportMain]);

        $id = $registerApplicantsDetails[0]->FkId;

        DB::table('register_applicants')->where('id', $id)->update(
            [
                'CountryOfOrigin' => $countryOfOrigin,
                'EmailAddress' => $emailMain, 'SlAddress' => $addressMain, 'SlStreet' => $streetMain, 'SlCity' => $cityMain,
                'SlPostalCode' => $postalCodeMain, 'SlTelephoneFixedLine' => $telFixedLineMain,
                'SlMobile' => $mobileMain, 'SponsorName' => $sponsorName,
                'SponsorTelephoneFixedLine' => $sponsorTelephoneFixed,
                'SponsorEmailAddress' => $sponsorEmail, 'SponsorMobile' => $sponsorMobile, 'SponsorAddress' => $sponsorAddress,
                'updated_at' => $datetime
            ]
        );


        DB::table('register_applicant_details')->where('AppointmentNumber', $appNo)->update(
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
                'MemberStatus' => "MainMember",
                'PregnancyStatus' => "",
                'status' => 'pending',
                'updated_at' => $datetime
            ]
        );

        return response()->json(['result' => true]);
    }

    public function UpdateOnlineRegDataMem(Request $request)
    {

        $id = $request->id;
        $memRegAppNo = $request->memRegAppNo;

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


        $datetime = date('Y-m-d H:i:s');

        DB::table('register_applicant_details')->where('id', $id)->update(
            [
                'Title' => "",
                'FirstName' => $firstNameMem,
                'LastName' => $lastNameMem,
                'DateOfBirth' => $dobMem,
                'Gender' => $genderMem,
                'Nationality' => $nationalityMem,
                'PassportNumber' => $passportMem,
                'PreviousPassportIfAny' => $prevpassMem,
                'CountryOfBirth' => $countryofbirthMem,
                'CountryVisitedDuringLast3Years' => $countryvisitedduringlast3yearsMem,
                'PregnancyStatus' => $pregnancyMem,
                'status' => 'pending',
                'updated_at' => $datetime
            ]
        );

        //       DB::table('temp_table')->where('temp_app_no', $memRegAppNo)->update(
        //          [
        //              'temp_passport' => $passportMem
        //          ]
        //      );

        DB::table('temp_table')
            ->where('temp_app_no', $memRegAppNo)
            ->update(['temp_passport' => $passportMem]);

        return response()->json(['result' => true]);
    }

    public function MainMemberChange(Request $request)
    {
        $appointmentNo = $request->appointmentNo;
        $mainAppointmentNo = $request->mainAppointmentNo;
        $mainPassportNo = $request->mainPassportNo;
        $fkId = $request->fkId;

        DB::table('register_applicant_details')->where('AppointmentNumber', $mainAppointmentNo)->delete();

        DB::table('temp_table')->where('temp_app_no', $mainAppointmentNo)->delete();

        DB::table('register_applicant_details')->where('AppointmentNumber', $appointmentNo)->update(
            [
                'MemberStatus' => 'MainMember'
            ]
        );

        DB::table('register_applicants')->where('id', $fkId)->update(
            [
                'NoOfFamilyMembers' => DB::raw('"NoOfFamilyMembers" - 1')
            ]
        );

        DB::table('appointment_cancel_and_reschedule_availability')->where('appointment_no', $mainAppointmentNo)->update(
            [
                'appointment_no' => $appointmentNo,
                'no_members' => DB::raw('no_members - 1')
            ]
        );

        $date = date('Y-m-d  h:i:sa');
        $Cby = Auth::id();

        DB::table('memberchange')->insert(
            [
                'appointmentno' => $mainAppointmentNo,
                'passportno' => $mainPassportNo,
                'remark' => 'Main Member appointment no changed from ' . $mainAppointmentNo . ' to ' . $appointmentNo . '',
                'cby' => $Cby,
                'cdate' => $date
            ]
        );


        return response()->json(['result' => true]);
    }

    public function ChangeMemberPhoto(Request $request)
    {

        $command = $request->command;
        $appointmentNo = $request->appointmentNo;

        if ($command == "LoadAppNo") {


            $sch_qry = DB::table('register_applicant_details')
                ->where('AppointmentNumber', $appointmentNo)
                ->get();

            $fkid = $sch_qry[0]->FkId;

            $AllAppNo = DB::table('register_applicant_details')
                ->where('FkId', $fkid)
                ->get();

            return response()->json(['result' => $AllAppNo]);
        } else if ($command == "LoadCurrentPhoto") {

            $photoBooth = DB::table('tbl_registration')
                ->where('reg_app_no', $appointmentNo)
                ->value('reg_photo_booth');

            return response()->json(['result' => $photoBooth]);
        } else if ($command == "SavePhoto") {

            $png_url = $request->ImageName;
            $photobooth = $request->photobooth;

            $img = str_replace('data:image/jpeg;base64,', '', $photobooth);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);

            $path = public_path() . '\\tempFileUpload\\photoBoothFiles\\' . $png_url;

            file_put_contents($path, $data);

            return response()->json(['result' => true]);
        }
    }

    public function InsertMembersData(Request $request)
    {
        $date = date('Y-m-d  h:i:sa');

        $registerApplicantId = $request->registerApplicantId;
        $mainAppNo = $request->mainAppNo;

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

        $tokenNo = $request->tokenNo;

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

        DB::table('register_applicants')->where('id', $registerApplicantId)
            ->update(['NoOfFamilyMembers' => $coun, 'ApplicationType' => 'Family']);

        DB::table('appointment_cancel_and_reschedule_availability')->where('appointment_no', $mainAppNo)
            ->update(['no_members' => $coun + 1]);

        DB::table('temp_table')->insert(
            [
                'temp_passport' => $passportMem,
                'temp_app_no' => $appointmentNumber,
                'temp_token_no' => $tokenNo,
                'temp_reg' => 1,
                'temp_reg_counter' => 0,
                'temp_counsel' => 1,
                'temp_counsel_counter' => 0,
                'temp_cxr' => 1,
                'temp_cxr_counter' => 0,
                'temp_phlebotomy' => 1,
                'temp_phlebotomy_counter' => 0,
                'temp_payment' => 1,
                'temp_payment_counter' => 0,
                'temp_consult' => 1,
                'temp_consult_counter' => 0,
                'temp_sputum' => 1,
                'temp_sputum_counter' => 0,
                'temp_radiology' => 1
            ]
        );


        return response()->json(['result' => true]);
    }
}
