<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Picqer\Barcode\BarcodeGeneratorPNG;

class AppointmentCancelAndRescheduleController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.AppointmentCancelandReschedule')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);;
    }

    public function Verify(Request $request)
    {
        $passportNo = $request->passportNo;
        $appointmentNo = $request->appointmentNo;
        $function = $request->function;
        $res = "";

        if ($function == "verify") {

            $countX = DB::table('register_applicant_details')
                ->where([
                    ['PassportNumber', '=', $passportNo],
                    ['AppointmentNumber', '=', $appointmentNo],
                    ['MemberStatus', '=', 'MainMember']                    
                ])
                ->count();

            if ($countX == 1) {
                $res = true;
            } else {
                $res = false;
            }
        } else if ($function == "loadData") {

            $res = DB::table('appointment_cancel_and_reschedule_availability')
                ->leftJoin('register_applicant_details', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
                ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->select('register_applicants.EmailAddress', 'register_applicant_details.Title', 'register_applicant_details.FirstName', 'register_applicant_details.LastName', 'appointment_cancel_and_reschedule_availability.*')
                ->orderBy('acrAvailablityId', 'desc')
                ->where([
                    ['appointment_cancel_and_reschedule_availability.appointment_no', '=', $appointmentNo],
                    ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
                    ['appointment_cancel_and_reschedule_availability.status', '!=', 'Cancelled']
                ])->first();

            if (empty($res)) {

                $res = DB::table('appointment_cancel_and_reschedule_availability')
                    ->leftJoin('register_applicant_details', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
                    ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                    ->select('register_applicant_details.Title', 'register_applicant_details.FirstName', 'register_applicant_details.LastName', 'appointment_cancel_and_reschedule_availability.*')
                    ->where([
                        ['appointment_cancel_and_reschedule_availability.appointment_no', '=', $appointmentNo]
                    ])->first();

                $res = 'NotSubmitted';
            }


        } else if ($function == "loadTime") {

            $date = $request->date;

            $appointmentCount = DB::table('appointment_cancel_and_reschedule_availability')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'appointment_cancel_and_reschedule_availability.appointment_no')
                ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->where([
					['appointment_cancel_and_reschedule_availability.status', '!=', 'Cancelled'],
                    ['appointment_cancel_and_reschedule_availability.date', '=', $date],
                    ['register_applicants.StatusSaveOrSubmith', '=', 'Submit']
                ])->count();

            $memberCount = DB::table('appointment_cancel_and_reschedule_availability')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'appointment_cancel_and_reschedule_availability.appointment_no')
                ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->whereDate('appointment_cancel_and_reschedule_availability.date', '=', $date)
				->where('appointment_cancel_and_reschedule_availability.status', '!=', 'Cancelled')
                ->where('register_applicants.StatusSaveOrSubmith', '=', 'Submit')
                ->sum('no_members');

            $arrayTimes = array();

            //if (date("w", strtotime($date)) == 4) {

            //    $timeList = ["08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "12:00", "13:00", "13:30", "14:00"];
           // } else {

                $timeList = ["08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30"];
           // }

            foreach ($timeList as $timex) {

                $result = DB::table('appointment_cancel_and_reschedule_availability')
                    ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'appointment_cancel_and_reschedule_availability.appointment_no')
                    ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                    ->where([
						['appointment_cancel_and_reschedule_availability.status', '!=', 'Cancelled'],
                        ['appointment_cancel_and_reschedule_availability.date', '=', $date],
                        ['appointment_cancel_and_reschedule_availability.time', '=', $timex],
                        ['register_applicants.StatusSaveOrSubmith', '=', 'Submit']
                    ])->sum('appointment_cancel_and_reschedule_availability.no_members');

                array_push($arrayTimes, $timex . "-" . $result);
            }

            return response()->json(['result' => $arrayTimes, 'appointmentCount' => $appointmentCount, 'memberCount' => $memberCount]);

        } else if ($function == "RescheduleAppointment") {

            $dateReschedule = $request->dateReschedule;
            $timeReschedule = $request->timeReschedule;
            $appointmentNo = $request->appointmentNo;
            $datetime = date('Y-m-d H:i:s');
            $createdBy = Auth::user()->id;

            DB::table('appointment_cancel_and_reschedule_availability')
                ->where('appointment_no', $appointmentNo)
                ->update([
                    'date' => $dateReschedule,
                    'time' => $timeReschedule,
                    'created_by' => $createdBy,
                    'status' => 'Reschedule',
                    'updated_at' => $datetime
                ]);

            $resk = DB::table('register_applicant_details')
                ->where([
                    ['AppointmentNumber', '=', $appointmentNo]
                ])->get();

            $fkId = $resk[0]->FkId;

            DB::table('register_applicants')
                ->where('id', $fkId)
                ->update([
                    'AppointmentDate' => $dateReschedule
                ]);

            $res = true;

        } else if ($function == "statusCou") {

            $date = $request->date;
            $time = $request->time;

            $resp = DB::table('appointment_cancel_and_reschedule_availability')
                ->where([
                    ['date', '=', $date], ['time', '=', $time], ['status','!=','Cancelled']
                ])
                ->sum('no_members');

            $res = $resp;
        } elseif ($function == 'loadAppointment') {

            $passport = $request->passport;

                   $res = DB::SELECT("select * from register_applicant_details a
inner join appointment_cancel_and_reschedule_availability b on b.appointment_no = a.\"AppointmentNumber\"
where a.id = (select max(id) from register_applicant_details where \"PassportNumber\" = '$passport')");

            return response()->json(['result' => $res]);

        } elseif ($function == 'loadPassport') {

            $appoinmentNo = $request->appoinmentNo;

            $res = DB::table('register_applicant_details')
                ->leftJoin('appointment_cancel_and_reschedule_availability', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
                ->where([
                    ['register_applicant_details.AppointmentNumber', '=', $appoinmentNo],
                    ['appointment_cancel_and_reschedule_availability.status', '!=', 'Canceled'],
                ])
                ->first();

            return response()->json(['result' => $res]);

        } else if ($function == 'DeleteAppNo') {

            $serial = $request->serial;

            $appNo = DB::table('appointment_cancel_and_reschedule_availability')
                ->where([
                    ['acrAvailablityId', '=', $serial]
                ])
                ->value('appointment_no');

            $tokenNo = DB::table('temp_table')
                ->where([
                    ['temp_app_no', '=', $appNo]
                ])
                ->value('temp_token_no');

            $res = DB::table('temp_table')
                ->where('temp_token_no', '=', $tokenNo)
                ->delete();

        }

        return response()->json(['result' => $res]);
    }

    public function LoadTime(Request $request)
    {
        $date = $request->date;
        $res = DB::table('master_settings')
            ->where('effectivedate', '<=', $date)
            ->orderBy('effectivedate', 'desc')
            ->first();

        return response()->json(['result' => $res]);
    }

    public function Cancelled(Request $request)
    {
        $appointmentNo = $request->appointmentNo;

        DB::table('appointment_cancel_and_reschedule_availability')
            ->where('appointment_no', $appointmentNo)
            ->update([
                'status' => 'Cancelled'
            ]);

        $res = true;

        return response()->json(['result' => $res]);
    }

    public function GetTotalMemberCount(Request $request)
    {
        $date = $request->date;
        $type = $request->type;
        $res = "";

        $countX = DB::table('set_work_schedule')
            ->where([
                ['type', '=', $type],
                ['date', '=', $date],
				['status','!=','Cancelled']
            ])
            ->count();

        if ($countX == 1) {

            $res = DB::table('set_work_schedule')
                ->where([
                    ['type', '=', $type],
                    ['date', '=', $date]
                ])
                ->first();
        } else {
            $res = DB::table('master_settings')
                ->where('effectivedate', '<=', $date)
                ->orderBy('effectivedate', 'desc')
                ->first();
        }

        return response()->json(['result' => $res]);
    }

    public function GetTotalMemberCountForDay(Request $request)
    {
        $date = $request->date;

        $sum = DB::table('appointment_cancel_and_reschedule_availability')
            ->where('date', $date)
			->where('status','!=','Cancelled')
            ->sum('no_members');

        return response()->json(['result' => $sum]);
    }

    public function SendEmailsApiAppointmentCancel(Request $request)
    {
        $mainAppointmentNo = $request->Appno;
        $Email = $request->email;

        $subject = 'IOM Registration - Appointment Cancelled.';
        $sendersTo = $Email;

        $ApplicantDetails = DB::table('register_applicants')
            ->leftJoin('register_applicant_details', 'register_applicants.id', '=', 'register_applicant_details.FkId')
            ->leftJoin('appointment_cancel_and_reschedule_availability', 'appointment_cancel_and_reschedule_availability.appointment_no', '=', 'register_applicant_details.AppointmentNumber')
            ->select('register_applicants.id',
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

        Mail::send('emails.sendMailCancel', $data, function ($message) use ($sendersTo, $subject) {

            $message->from('appointment@ihapsl.org', 'IOM');
            $message->to($sendersTo)->subject($subject);
        });

        return response()->json(['result' => 'Email has been sent to ' . $sendersTo]);
    }

}
