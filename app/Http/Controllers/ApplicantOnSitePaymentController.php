<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use PDF;

class ApplicantOnSitePaymentController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.ApplicantOnSitePayment')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function CRUD(Request $request)
    {
        $command = $request->command;

        if ($command === 'Verify') {

            $ppnop = $request->PassportNo;
            $appnop = $request->appid;
            $data = null;

            if (!empty($appnop)) {
                $data = DB::table('temp_table')
                    ->where('temp_app_no', $appnop)
                    ->where('temp_counsel', 4)
                    ->value('temp_app_no');
            } else if (!empty($ppnop)) {
                $data = DB::table('temp_table')
                    ->where('temp_passport', $ppnop)
                    ->where('temp_counsel', 4)
                    ->value('temp_app_no');
            }

            if (empty($data)) {
                return response()->json('Please enter a correct appointment number or passport number!');
            } else {
                $arrappdetails = array();

                $key = 0;
                $appdate = DB::table('register_applicants')
                    ->join('register_applicant_details', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                    ->where('AppointmentNumber', $data)->value('AppointmentDate');
                $appdetails = DB::table('register_applicant_details')
                    ->select('PassportNumber', 'FirstName', 'LastName', 'AppointmentNumber')
                    ->where('AppointmentNumber', $data)
                    ->where('MemberStatus', "MainMember")
                    ->get();

                foreach ($appdetails as $appnodetails) {
                    $arrappdetails[0] = $appnodetails->PassportNumber;
                    $arrappdetails[1] = $appnodetails->FirstName;
                    $arrappdetails[4] = $appnodetails->LastName;
                    $arrappdetails[2] = $appdate;
                    $arrappdetails[3] = $appnodetails->AppointmentNumber;
                }
                return response()->json($arrappdetails);
            }
        } elseif ($command === 'VerifyReprint') {

            $ppnop = $request->PassportNo;
            $appnop = $request->appid;
            $data = null;

            if (!empty($appnop)) {
                $data = DB::table('temp_new')
                    ->where('temp_app_no', $appnop)
                    ->where('temp_counsel', 4)
                    ->value('temp_app_no');
            } else if (!empty($ppnop)) {
                $data = DB::table('temp_new')
                    ->where('temp_passport', $ppnop)
                    ->where('temp_counsel', 4)
                    ->max('temp_app_no');
            }

            if (empty($data)) {
                return response()->json('Please enter a correct appointment number or passport number!');
            } else {
                $arrappdetails = array();

                $key = 0;
                $appdate = DB::table('register_applicants')
                    ->join('register_applicant_details', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                    ->where('AppointmentNumber', $data)->value('AppointmentDate');

                $appdetails = DB::table('register_applicant_details')
                    ->select('PassportNumber', 'FirstName', 'LastName', 'AppointmentNumber')
                    ->where('AppointmentNumber', $data)
                    ->where('MemberStatus', "MainMember")
                    ->get();

                foreach ($appdetails as $appnodetails) {
                    $arrappdetails[0] = $appnodetails->PassportNumber;
                    $arrappdetails[1] = $appnodetails->FirstName;
                    $arrappdetails[4] = $appnodetails->LastName;
                    $arrappdetails[2] = $appdate;
                    $arrappdetails[3] = $appnodetails->AppointmentNumber;
                }
                return response()->json($arrappdetails);
            }
        } else if ($command === 'family') {

            $fappno = $request->appointmentno;
            $date = date('Y-m-d');

            $rowid = DB::table('register_applicant_details')
                ->where('AppointmentNumber', $fappno)
                ->value('FkId');

            $familydetails = array();
            $next = array();
            $familymembers = DB::table('register_applicant_details')
                ->select('FirstName', 'LastName', 'PassportNumber')
                ->join('register_applicants', 'register_applicant_details.FkId', '=', 'register_applicants.id')
                ->where('FkId', $rowid)->get();

            $paymentForEach = DB::table('payment_setting')
                ->where('Effective_Date', '<=', $date)
                ->orderBy('Effective_Date', 'desc')
                ->value('Amount');

            foreach ($familymembers as $fam) {
                $next = array($fam->FirstName, $fam->LastName, $fam->PassportNumber, $paymentForEach);
                array_push($familydetails, $next);
            }

            return response()->json($familydetails);
        } else if ($command == 'loadPayment') {

            $appointmentno = $request->appointmentno;
            $date = date('Y-m-d');

            $noofmembers = DB::table('appointment_cancel_and_reschedule_availability')
                ->where('appointment_no', $appointmentno)
                ->value('no_members');

            $paymentForEach = DB::table('payment_setting')
                ->where('Effective_Date', '<=', $date)
                ->orderBy('Effective_Date', 'desc')
                ->value('Amount');

            $fullPayment = ($paymentForEach * $noofmembers);

            $max = DB::table('tbl_payment_counter')
                ->max('pc_id');

            return response()->json(['result' => $fullPayment, 'maxNo' => $max]);
        } else if ($command == 'loadPaymentreprint') {

            $appointmentno = $request->appointmentno;
            $date = date('Y-m-d');

            $noofmembers = DB::table('appointment_cancel_and_reschedule_availability')
                ->where('appointment_no', $appointmentno)
                ->value('no_members');

            $paymentForEach = DB::table('payment_setting')
                ->where('Effective_Date', '<=', $date)
                ->orderBy('Effective_Date', 'desc')
                ->value('Amount');

            $fullPayment = ($paymentForEach * $noofmembers);

            $receiptno = DB::table('tbl_payment_counter')
                ->where('pc_app_no', $appointmentno)
                ->value('pc_receipt_no');

            return response()->json(['result' => $fullPayment, 'receiptno' => $receiptno]);
        } else if ($command === 'save') {

            $appoimentNumber = $request->appno;
            $passNo = $request->passNo;

            $alreedyExit = DB::table('tbl_payment_counter')
                ->where('pc_app_no', $appoimentNumber)
                ->count();

            if ($alreedyExit == 0) {

                $CBy = Session::get('id');
                $datetime = date('Y-m-d H:i:s');

                $AppDate = DB::table('appointment_cancel_and_reschedule_availability')
                    ->where('appointment_no', $appoimentNumber)
                    ->value('date');

                $tokennof = DB::table('temp_table')
                    ->where('temp_app_no', $appoimentNumber)
                    ->value('temp_token_no');

                DB::table('temp_table')
                    ->where('temp_token_no', $tokennof)
                    ->update(['temp_payment' => 4, 'temp_payment_counter' => $CBy]);


                DB::table('tbl_payment_counter')->insert([
                    [
                        'pc_passp_no' => $passNo,
                        'pc_fee' => $request->pc_fee,
                        'pc_pay_mode' => $request->pc_pay_mode,
                        'pc_receipt_no' => $request->pc_receipt_no,
                        'pc_app_date' => $AppDate,
                        'pc_app_no' => $appoimentNumber,
                        'pc_cby' => $CBy,
                        'pc_cdate' => $datetime
                    ]
                ]);

                return response()->json(['Done']);
            } else {
                return response()->json(['AlredyExit']);
            }
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function generateReceipt(Request $request)
    {
        $appointmentno = $request->appointmentno;
        $date = date('Y-m-d');
        $time = date('h:m:s');

        $rowid = DB::table('register_applicant_details')
            ->where('AppointmentNumber', $appointmentno)
            ->value('FkId');

        $familydetails = array();
        $next = array();

        $familymembers = DB::table('register_applicant_details')
            ->select('AppointmentNumber', 'PassportNumber', 'FirstName', 'LastName')
            ->join('register_applicants', 'register_applicant_details.FkId', '=', 'register_applicants.id')
            ->where('FkId', $rowid)
            ->get();

        $paymentForEach = DB::table('payment_setting')
            ->where('Effective_Date', '<=', $date)
            ->orderBy('Effective_Date', 'desc')
            ->value('Amount');

        $co = 0;
        foreach ($familymembers as $fam) {
            $co++;
        }

        $total = ($paymentForEach * $co);

        $pdf = PDF::loadView('pages.Receipt', compact('date', 'time', 'total', 'familymembers', 'paymentForEach'));
        return $pdf->stream('firstPdf.pdf');
    }
}
