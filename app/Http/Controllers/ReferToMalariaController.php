<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class ReferToMalariaController extends Controller
{
    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.ReferToMalaria')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }


    public function LoadRegistrationNumber(Request $request)
    {
        $resp = DB::table('register_applicant_details')
            ->select('id', 'AppointmentNumber')
            ->orderBy('id')
            ->get();

        return response()->json(['result' => $resp]);
    }

    public function Save(Request $request)
    {
        $regNo = $request->regNo;
        $passNo = $request->passNo;
        $passprtNo = Crypt::encryptString($passNo);
        $refered = $request->refered;
        $testRes = $request->testRes;
        $comment = $request->comment;
        $remark = $request->remark;
        $datetime = date('Y-m-d H:i:s');
        $createdBy = Auth::user()->id;

//        $user_info = DB::table('usermetas')
//            ->select('browser', DB::raw('count(*) as total'))
//            ->groupBy('browser')
//            ->get();

//        $posts = DB::table('temp_table')
//            ->select('temp_token_no', \DB::raw('count(*) as total'))
//            ->where('temp_reg', '=', 1)
//            ->groupBy('temp_token_no')
//            ->get();

//        dd($posts);

        DB::table('refer_to_malaria')->insert(
            ['registration_no' => "$regNo", 'passport_no' => "$passprtNo", 'refered' => "$refered", 'test_result' => "$testRes", 'comment' => "$comment", 'remark' => "$remark", 'created_by' => "$createdBy", 'created_at' => $datetime]
        );

        return response()->json(['result' => true]);

    }
}
