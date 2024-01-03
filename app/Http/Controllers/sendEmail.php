<?php

namespace App\Http\Controllers;


use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class sendEmail extends Controller
{

    public function sendEmailer(Request $request)
    {
        $MainpassportNumber = $request->Appno;
        $Email = $request->email;
//
        $subject = 'IOM Registration';
        $sendersTo = $Email;

        //////////////////////////////////////////////

        $ApplicantDetails = DB::table('register_applicants')
            ->leftJoin('register_applicant_details', 'register_applicants.id', '=', 'register_applicant_details.FkId')
            ->leftJoin('appointment_cancel_and_reschedule_availability', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
            ->select('register_applicants.id',
                'appointment_cancel_and_reschedule_availability.time',
                'appointment_cancel_and_reschedule_availability.date'
            )
            ->where([
                ['register_applicant_details.PassportNumber', '=', $MainpassportNumber],
                ['register_applicant_details.MemberStatus', '=', 'MainMember'],
                ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
            ])
            ->first();
//      --------------------Get Member Dertails---------------------------------------------------------------------
        $ApplicantId = $ApplicantDetails->id;
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

        $getMemberDetails = $getMemberDetails->each(function ($item, $key) {
            $appNo = $item->AppointmentNumber;
            $barcode = new BarcodeGenerator();
            $barcode->setText($appNo);
            $barcode->setType(BarcodeGenerator::Code128);
            $barcode->setScale(2);
            $barcode->setThickness(25);
            $barcode->setFontSize(10);
            $code = $barcode->generate();
            $item->barcode = $code;
        });

        $data = ['MainpassportNumber' => $MainpassportNumber, 'date' => $Date, 'time' => $Time, 'result2' => $getMemberDetails];


        Mail::send('pages.sendMail', $data, function ($message) use ($sendersTo, $subject) {
            $message->from('appointment@ihapsl.org', 'IOM');
            $message->to($sendersTo)->subject($subject);
        });

        return 'Email has been sent to ' . $sendersTo;
    }

}
