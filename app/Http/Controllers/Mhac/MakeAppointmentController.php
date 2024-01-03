<?php

namespace App\Http\Controllers\Mhac;

use Illuminate\Http\Request;
use App\Models\MhacAppointment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Picqer\Barcode\BarcodeGeneratorSVG;

class MakeAppointmentController extends Controller
{

    public function ViewpageLanding()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.makeappointmentlanding')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function SaveMakeAppointment(Request $request)
    {
        $mainMemData = $request->input('mainMemData');
        $otherMemData = $request->input('otherMemData');

        $applicationType = $mainMemData['applicationType'];
        $memberCount = $mainMemData['memberCount'];
        $memType = $mainMemData['memType'];
        $passportNo = $mainMemData['passportNo'];
        $appointmentDate = $mainMemData['appointmentDate'];
        $appointmentTime = $mainMemData['appointmentTime'];
        $country = $mainMemData['country'];

        $title = $mainMemData['title'];
        $firstName = $mainMemData['firstName'];
        $lastName = $mainMemData['lastName'];
        $dob = $mainMemData['dob'];
        $gender = $mainMemData['gender'];
        $medicalReq = $mainMemData['medicalReq'];
        $email = $mainMemData['email'];

        $mainAddLine1 = $mainMemData['mainAddLine1'];
        $mainAddLine2 = $mainMemData['mainAddLine2'];
        $mainCity = $mainMemData['mainCity'];
        $mainPostalCode = $mainMemData['mainPostalCode'];
        $mainContactNoHome = $mainMemData['mainContactNoHome'];
        $mainContactNoMobile = $mainMemData['mainContactNoMobile'];

        $cby = Auth::id();
        $dateTime = date('Y-m-d H:i:s');

        $appointment = new MhacAppointment();
        $appointment->application_type = $applicationType;
        $appointment->no_members = $memberCount;
        $appointment->member_type = $memType;

        $memberCountA = MhacAppointment::getMemberCountForToday($appointmentDate);
        $appointmentNo = MhacAppointment::generateAppointmentNo($country, $memberCountA);

        $appointment->appointment_no = $appointmentNo;
        $appointment->passport_no = $passportNo;
        $appointment->main_mem_app_no = $appointmentNo;
        $appointment->country = $country;
        $appointment->appointment_date = $appointmentDate;
        $appointment->appointment_time = $appointmentTime;
        $appointment->appointment_status = 'New';
        $appointment->title = $title;
        $appointment->first_name = $firstName;
        $appointment->last_name = $lastName;
        $appointment->dob = $dob;
        $appointment->gender = $gender;
        $appointment->nationality = '';
        $appointment->email = $email;
        $appointment->address1 = $mainAddLine1;
        $appointment->address2 = $mainAddLine2;
        $appointment->city = $mainCity;
        $appointment->postal_code = $mainPostalCode;
        $appointment->contact_no_land = $mainContactNoHome;
        $appointment->contact_no_mobile = $mainContactNoMobile;
        $appointment->special_needs = $medicalReq;
        $appointment->cby = $cby;
        $appointment->cdate = $dateTime;

        $appointment->save();

        $barcode = new BarcodeGeneratorSVG();
        $code = base64_encode($barcode->getBarcode($appointmentNo, $barcode::TYPE_CODE_128));

        $combinedData[] = array(
            'name' => $title . ' ' . $firstName . ' ' . $lastName,
            'appointmentNo' => $appointmentNo,
            'passportNo' => $passportNo,
            'barcode' => $code
        );

        $generatedAppointmentNumbers = [];
        $generatedAppointmentNumbers[] = $appointmentNo;

        //Other Member Details =================================================
        if (!empty($otherMemData)) {

            $coC = 1;
            $otherMembersAppointments = [];
            foreach ($otherMemData as $row) {

                $titleO = $row['title'];
                $firstNameO = $row['firstName'];
                $lastNameO = $row['lastName'];
                $dobO = $row['dob'];
                $genderO = $row['gender'];
                $passportNoO = $row['passportNo'];

                $memberCountO = $memberCountA + $coC;
                $appointmentNoO = MhacAppointment::generateAppointmentNo($country, $memberCountO);

                $appointmentData = [
                    'application_type' => $applicationType,
                    'no_members' => $memberCount,
                    'member_type' => 'OtherMember',
                    'title' => $titleO,
                    'first_name' => $firstNameO,
                    'last_name' => $lastNameO,
                    'dob' => $dobO,
                    'gender' => $genderO,
                    'appointment_no' => $appointmentNoO,
                    'passport_no' => $passportNoO,
                    'main_mem_app_no' => $appointmentNo,
                    'country' => $country,
                    'appointment_date' => $appointmentDate,
                    'appointment_time' => $appointmentTime,
                    'appointment_status' => 'New',
                    'cby' => $cby,
                    'cdate' => $dateTime
                ];

                $codeO = base64_encode($barcode->getBarcode($appointmentNoO, $barcode::TYPE_CODE_128));

                $combinedData[] = array(
                    'name' => $titleO . ' ' . $firstNameO . ' ' . $lastNameO,
                    'appointmentNo' => $appointmentNoO,
                    'passportNo' => $passportNoO,
                    'barcode' => $codeO
                );

                $generatedAppointmentNumbers[] = $appointmentNoO;
                $otherMembersAppointments[] = $appointmentData;
                $coC++;
            }

            MhacAppointment::insert($otherMembersAppointments);
        }

        $subject = 'IOM Registration';
        $sendersTo = $email;

        $data = [
            'mainPassNo' => $passportNo,
            'appDate' => $appointmentDate,
            'appTime' => $appointmentTime,
            'datax' => $combinedData
        ];

        Mail::send('emails.sendMailMhacAppointments', $data, function ($message) use ($sendersTo, $subject) {

            $message->from('ihacsl@iom.int', 'IOM');
            $message->to($sendersTo)->subject($subject);
        });

        return response()->json(['result' => true, 'appointmentno' => $generatedAppointmentNumbers]);
    }

    public function LoadTimeAvailableMhac(Request $request)
    {
        $date = $request->date;
        $country = $request->country;

        $arrayTimes = array();
        $timeList = ["08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30", "16:00"];

        foreach ($timeList as $time) {
            $data = MhacAppointment::getMemberCountForSelectedDateTime($date, $time, $country);
            array_push($arrayTimes, $time . "-" . $data['count'] . "-" . $data['allcountries']);
        }

        return response()->json(['result' => $arrayTimes]);
    }
}
