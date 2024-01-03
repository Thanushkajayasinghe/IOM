<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class ReferToTBController extends Controller
{
    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.RefferToTB')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function AllFunReferToTB(Request $request)
    {
        $function = $request->function;

        if ($function == 'loadRegNo') {
            $resp = DB::table('register_applicant_details')
                ->select('id', 'AppointmentNumber')
                ->orderBy('id')
                ->get();

            return response()->json(['result' => $resp]);

        } elseif ($function == 'loadPassportNo') {
            $regSerial = $request->regSerial;

            $resp = DB::table('register_applicant_details')
                ->select('PassportNumber')
                ->where('register_applicant_details.id', '=', $regSerial)
                ->get();

            return response()->json(['result' => $resp]);
        } else if ($function == 'save') {

            $regNo = $request->regNo;
            $passNo = $request->passNo;
            $passprtNo = Crypt::encryptString($passNo);
            $refferd = $request->refferd;
            $testRes = $request->testRes;
            $comment = $request->comment;
            $remark = $request->remark;
            $datetime = date('Y-m-d H:i:s');
            $createdBy = Auth::user()->id;

            DB::table('refer_to_tb')->insert(
                ['registration_no' => "$regNo", 'passport_no' => "$passprtNo", 'refferd' => "$refferd", 'test_result' => "$testRes", 'comment' => "$comment", 'remark' => "$remark", 'created_by' => "$createdBy", 'created_at' => $datetime]
            );

            return response()->json(['result' => true]);

        } else if ($function == 'saveOther') {

            $regNo = $request->regNo;
            $docName = $request->docName;
            $institute = $request->institute;
            $remark = $request->remark;
            $datetime = date('Y-m-d H:i:s');
            $createdBy = Auth::user()->id;

            DB::table('tbl_refer_to_other')->insert(
                ['reg_no' => "$regNo", 'doctor_name' => "$docName", 'institute' => "$institute", 'remark' => "$remark", 'created_by' => "$createdBy", 'created_at' => $datetime]
            );

            return response()->json(['result' => true]);
        }

    }
}
