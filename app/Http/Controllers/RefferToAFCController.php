<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class RefferToAFCController extends Controller
{
    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.RefferToAFC')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function LoadRegistrationNumber(Request $request)
    {
        $resp = DB::table('register_applicant_details')
            ->select('id', 'AppointmentNumber')
            ->orderBy('id')
            ->get();

        return response()->json(['result' => $resp]);
    }

    public function LoadPassportNumber(Request $request)
    {
        $regSerial = $request->regSerial;

        $resp = DB::table('register_applicant_details')
            ->select('PassportNumber')
            ->where('register_applicant_details.id', '=', $regSerial)
            ->get();

        return response()->json(['result' => $resp]);
    }


    public function Save(Request $request)
    {
        $regNo = $request->regNo;
        $passNo = $request->passNo;
        $passprtNo = Crypt::encryptString($passNo);
        $refferd = $request->refferd;
        $testRes = $request->testRes;
        $comment = $request->comment;
        $remark = $request->remark;
        $datetime = date('Y-m-d H:i:s');
        $createdBy = Auth::user()->id;

        DB::table('refer_to_afc')->insert(
            ['registration_no' => "$regNo", 'passport_no' => "$passprtNo", 'refer' => "$refferd", 'test_result' => "$testRes", 'comment' => "$comment", 'remark' => "$remark", 'created_by' => "$createdBy", 'created_at' => $datetime]
        );

        return response()->json(['result' => true]);
    }

    public function AllSave(Request $request)
    {
        $command = $request->command;


        if ($command == "ER") {

            $regNo = $request->regNo;
            $comment = $request->comment;
            $datetime = date('Y-m-d H:i:s');
            $createdBy = Auth::user()->id;

            DB::table('refer_to_emergency_referral')->insert(
                ['reg_no' => "$regNo", 'comment' => "$comment", 'created_by' => "$createdBy", 'created_at' => $datetime]
            );

            return response()->json(['result' => true]);

        } else if ($command == "DOC") {

            $regNo = $request->regNo;
            $comment = $request->comment;
            $datetime = date('Y-m-d H:i:s');
            $createdBy = Auth::user()->id;

            DB::table('refer_to_duty_of_care')->insert(
                ['reg_no' => "$regNo", 'comment' => "$comment", 'created_by' => "$createdBy", 'created_at' => $datetime]
            );

            return response()->json(['result' => true]);
        }


    }


}
