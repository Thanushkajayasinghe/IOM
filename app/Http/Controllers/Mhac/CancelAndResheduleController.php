<?php

namespace App\Http\Controllers\Mhac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Picqer\Barcode\BarcodeGeneratorSVG;
use Illuminate\Support\Facades\Mail;

class CancelAndResheduleController extends Controller
{
    public function ViewpageLanding()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        // return view('pagesmhac.cancelandreshedule')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function loadAppointment(Request $request)
    {
        $passport = $request->passport;
        $country = $request->country;
        
        
            $res = DB::table('mhac_appointments')
                ->where('passport_no', $passport)
                ->where('country', $country)
                ->orderBy('cdate', 'desc')
                ->value('appointment_no');
            if ($res !== null) {
                return response()->json([
                    'appointment_no' => $res,
                ]);
            }
            if (!$res) {
                return response()->json([
                    'result' => '1',
                ]);
            }
        

    }


    public function loadPassport(Request $request)
    {
        $country = $request->country;
        $appoinmentNo = $request->appoinmentNo;
        $res = DB::table('mhac_appointments')
            ->where('appointment_no', $appoinmentNo)
            ->where('country', $country)
            ->value('passport_no');

        if ($res !== null) {
            return response()->json([
                'passport_no' => $res,
            ]);
        }
        if (!$res) {
            return response()->json([
                'result' => '1',
            ]);
        }

    }
    public function Verify(Request $request)
    {
        $passportNo = $request->passportNo;

        $appointmentNo = $request->appointmentNo;
        $function = $request->function;
        $res = "";
        $countX = DB::table('mhac_appointments')
            ->where([
                    ['passport_no', '=', $passportNo],
                    ['appointment_no', '=', $appointmentNo],
                    ['member_type', '=', 'MainMember']
                ])
            ->count();

        if ($countX == 1) {
            $res = true;
            return response()->json([
                'result' => $res,
            ]);

        } else {
            $res = false;
            return response()->json([
                'result' => $res,
            ]);
        }
    }

    public function loadData(Request $request)
    {
        $passportNo = $request->passportNo;
        $appointmentNo = $request->appointmentNo;
        $function = $request->function;
        $res = "";
        $res = DB::table('mhac_appointments')

            ->where([
                ['appointment_no', '=', $appointmentNo],
                // ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
                ['appointment_status', '!=', 'Cancelled']
            ])->first();

        if (!$res) {

            $res = DB::table('mhac_appointments')
                ->where([
                        ['appointment_no', '=', $appointmentNo],
                    ])->first();

            $res = 'NotSubmitted';

        }

        return response()->json([
            'result' => $res,
        ]);

    }

    public function loadTime(Request $request)
    {
        $date = $request->date;
        $country = $request->country;

        $appointmentCount = DB::table('mhac_appointments')
            ->where([
                    ['appointment_status', '!=', 'Cancelled'],
                    ['appointment_date', '=', $date],
                    ['member_type', '=', 'MainMember'],
                    // Uncomment the line below if needed
                    // ['StatusSaveOrSubmith', '=', 'Submit']
                ])
            ->count();

        $appointmentCountCountry = DB::table('mhac_appointments')
            ->where([
                    ['appointment_status', '!=', 'Cancelled'],
                    ['appointment_date', '=', $date],
                    ['country', '=', $country],
                    ['member_type', '=', 'MainMember'],
                    // Uncomment the line below if needed
                    // ['StatusSaveOrSubmith', '=', 'Submit']
                ])
            ->count() ?? 0;
        // dd($appointmentCountCountry);

        $memberCount = DB::table('mhac_appointments')
            ->whereDate('appointment_date', '=', $date)
            ->where('appointment_status', '!=', 'Cancelled')
            ->where('member_type', '=', 'MainMember')
            // ->where('register_applicants.StatusSaveOrSubmith', '=', 'Submit')
            ->sum('no_members');

        $memberCountCountry = DB::table('mhac_appointments')
            ->whereDate('appointment_date', '=', $date)
            ->where('appointment_status', '!=', 'Cancelled')
            ->where('country', '=', $country)
            ->where('member_type', '=', 'MainMember')
            // ->where('register_applicants.StatusSaveOrSubmith', '=', 'Submit')
            ->sum('no_members');

        $arrayTimes = array();
        $timeList = ["08:00", "08:30", "09:00", "09:30", "10:00", "10:30", "11:00", "11:30", "12:00", "12:30", "13:00", "13:30", "14:00", "14:30", "15:00", "15:30"];


        foreach ($timeList as $timex) {

            $result = DB::table('mhac_appointments')
                ->where([
                        ['appointment_status', '!=', 'Cancelled'],
                        ['appointment_date', '=', $date],
                        ['appointment_time', '=', $timex],
                        ['country', '=', $country],
                        ['member_type', '=', 'MainMember'],
                        //  ['register_applicants.StatusSaveOrSubmith', '=', 'Submit']
                    ])->count();

            $resultWithoutCountry = DB::table('mhac_appointments')
                ->where([
                        ['appointment_status', '!=', 'Cancelled'],
                        ['appointment_date', '=', $date],
                        ['appointment_time', '=', $timex],
                        ['member_type', '=', 'MainMember'],
                    ])->count();
            // array_push($arrayTimes, $timex . "-" . $resultWithoutCountry);
            array_push($arrayTimes, $timex . "-" . $result . "-" . $resultWithoutCountry);

        }


        return response()->json(['result' => $arrayTimes, 'appointmentCount' => $appointmentCount, 'memberCount' => $memberCount, 'countryAppoinments' => $appointmentCountCountry, 'memberCountcountry' => $memberCountCountry]);


    }

    public function RescheduleAppointment(Request $request)
    {

        $dateReschedule = $request->dateReschedule;
        $timeReschedule = $request->timeReschedule;
        $appointmentNo = $request->appointmentNo;
        $datetime = date('Y-m-d H:i:s');
        $createdBy = Auth::user()->id;

        DB::table('mhac_appointments')
            ->where('main_mem_app_no', $appointmentNo)
            ->update([
                    'appointment_date' => $dateReschedule,
                    'appointment_time' => $timeReschedule,
                    'uby' => $createdBy,
                    'appointment_status' => 'Reschedule',
                    'udate' => $datetime
                ]);



        $res = true;
        return response()->json([
            'result' => $res,
        ]);
    }
    public function SendEmailsApi(Request $request)
    {
        $mainAppointmentNo = $request->Appno;

        $Email = $request->email;

        $subject = 'IOM Registration';
        $sendersTo = $Email;

        $ApplicantDetails = DB::table('mhac_appointments')
            ->select(
                'id',
                'appointment_time',
                'appointment_date',
                'passport_no',
                'main_mem_app_no'
            )->where([
                    ['appointment_no', '=', $mainAppointmentNo],
                    ['member_type', '=', 'MainMember'],
                    //['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
                ])->first();

        //---------------------------   Get Member Details   -----------------------------------------------------------

        $ApplicantId = $ApplicantDetails->main_mem_app_no;
        $mainPassportNumber = $ApplicantDetails->passport_no;
        $Date = $ApplicantDetails->appointment_date;
        $Time = $ApplicantDetails->appointment_time;

        $getMemberDetails = DB::table('mhac_appointments')
            ->select(
                'first_name',
                'last_name',
                'passport_no',
                'appointment_no'
            )
            ->where('main_mem_app_no', '=', $ApplicantId)
            ->get();
        // dd("member". $getMemberDetails);
        //Barcode Generate
        $getMemberDetails = $getMemberDetails->each(function ($item, $key) {
            $appNo = $item->appointment_no;

            $barcode = new BarcodeGeneratorPNG();
            $code = base64_encode($barcode->getBarcode($appNo, $barcode::TYPE_CODE_128));

            $item->barcode = $code;
        });

        $data = ['MainpassportNumber' => $mainPassportNumber, 'date' => $Date, 'time' => $Time, 'result2' => $getMemberDetails];
        Mail::send('emails.sendMhacMail', $data, function ($message) use ($sendersTo, $subject) {

            $message->from('ihacsl@iom.int', 'IOM');
            $message->to($sendersTo)->subject($subject);
        });

        return response()->json(['result' => 'Email has been sent to ' . $sendersTo]);
    }
    public function Cancelled(Request $request)
    {
        $appointmentNo = $request->appointmentNo;
        $createdBy = Auth::user()->id;
        $datetime = date('Y-m-d H:i:s');
        DB::table('mhac_appointments')
            ->where('main_mem_app_no', $appointmentNo)
            ->update([
                    'appointment_status' => 'Cancelled',
                    'uby' => $createdBy,
                    'udate' => $datetime
                ]);

        $res = true;

        return response()->json(['result' => $res]);
    }
    public function SendEmailsApiAppointmentCancel(Request $request)
    {
        $mainAppointmentNo = $request->Appno;
        $Email = $request->email;

        $subject = 'IOM Registration - Appointment Cancelled.';
        $sendersTo = $Email;

        $ApplicantDetails = DB::table('mhac_appointments')
            ->select(
                'id',
                'appointment_time',
                'appointment_date',
                'passport_no',
                'main_mem_app_no'
            )->where([
                    ['appointment_no', '=', $mainAppointmentNo],
                    ['member_type', '=', 'MainMember'],
                    // ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
                ])->first();

        //---------------------------   Get Member Details   -----------------------------------------------------------

        $ApplicantId = $ApplicantDetails->main_mem_app_no;
        $mainPassportNumber = $ApplicantDetails->passport_no;
        $Date = $ApplicantDetails->appointment_date;
        $Time = $ApplicantDetails->appointment_time;

        $getMemberDetails = DB::table('mhac_appointments')
            ->select(
                'first_name',
                'last_name',
                'passport_no',
                'appointment_no'
            )
            ->where('main_mem_app_no', '=', $ApplicantId)
            ->get();

        //Barcode Generate
        $getMemberDetails = $getMemberDetails->each(function ($item, $key) {
            $appNo = $item->appointment_no;

            $barcode = new BarcodeGeneratorPNG();
            $code = base64_encode($barcode->getBarcode($appNo, $barcode::TYPE_CODE_128));

            $item->barcode = $code;
        });

        $data = ['MainpassportNumber' => $mainPassportNumber, 'date' => $Date, 'time' => $Time, 'result2' => $getMemberDetails];

        Mail::send('emails.sendMhacMailCancel', $data, function ($message) use ($sendersTo, $subject) {

            $message->from('appointment@ihapsl.org', 'IOM');
            $message->to($sendersTo)->subject($subject);
        });

        return response()->json(['result' => 'Email has been sent to ' . $sendersTo]);
    }




    // if ($function == "statusCou") {

    //     $date = $request->date;
    //     $time = $request->time;

    //     $resp = DB::table('appointment_cancel_and_reschedule_availability')
    //         ->where([
    //             ['date', '=', $date], ['time', '=', $time], ['status','!=','Cancelled']
    //         ])
    //         ->sum('no_members');

    //     $res = $resp;
    // }
    public function LoadTime2(Request $request)
    {
        $date = $request->date;
        $res = DB::table('master_settings')
            ->where('effectivedate', '<=', $date)
            ->orderBy('effectivedate', 'desc')
            ->first();

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
                    ['status', '!=', 'Cancelled']
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
            ->where('status', '!=', 'Cancelled')
            ->sum('no_members');

        return response()->json(['result' => $sum]);
    }
}
