<?php

namespace App\Http\Controllers\Mhac;

use Illuminate\Http\Request;
use App\Models\MhacAppointment;
use App\Models\MhacTestResults;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\MhacAddLabTestResults;

class AddLabTestResultsController extends Controller
{

    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.addlabtestresults')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function GetAvailbleTestsPhelabotomy(Request $request)
    {
        $barcode = $request->barcode;

        $count = MhacTestResults::getCountIfTestAvailable($barcode);

        if ($count == 0) {

            $result = MhacAddLabTestResults::getAvailbleTestsPhelabotomy($barcode);
            $appointmentNo = $result->appointment_no;

            $data = MhacAppointment::getAppointmentData($appointmentNo);
            $gender = $data->gender;
            $dob = $data->dob;

            return response()->json(['result' => $result, 'gender' => $gender, 'dob' => $dob]);
        } else {
            return response()->json('Result Already Added!');
        }

    }

    public function SaveLabTestResults(Request $request)
    {
        $appointmentNo = $request->appointmentNo;
        $passport = $request->passport;
        $barcode = $request->barcode;
        $hivResult = $request->hivResult;
        $hivRemark = $request->hivRemark;
        $malariaResult = $request->malariaResult;
        $malariaRemark = $request->malariaRemark;
        $filariaResult = $request->filariaResult;
        $filariaRemark = $request->filariaRemark;
        $shcgResult = $request->shcgResult;
        $shcgRemark = $request->shcgRemark;
        $urineResult = $request->urineResult;
        $urineRemark = $request->urineRemark;

        $cby = Auth::id();
        $dateTime = date('Y-m-d H:i:s');

        $data = new MhacTestResults();
        $data->appointment_no = $appointmentNo;
        $data->passport_no = $passport;
        $data->barcode = $barcode;
        $data->hiv_result = $hivResult;
        $data->hiv_remark = $hivRemark;
        $data->malaria_result = $malariaResult;
        $data->malaria_remark = $malariaRemark;
        $data->filaria_result = $filariaResult;
        $data->filaria_remark = $filariaRemark;
        $data->shcg_result = $shcgResult;
        $data->shcg_remark = $shcgRemark;
        $data->urine_result = $urineResult;
        $data->urine_remark = $urineRemark;
        $data->status = "Pending";
        $data->cby = $cby;
        $data->cdate = $dateTime;

        $data->save();

        return response()->json(['result' => true]);
    }
}
