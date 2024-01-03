<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class ReferToNSACP extends Controller
{
    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.ReferToNSACPhivElisa')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function AllFunReferToNSACP(Request $request)
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
            $refered = $request->refered;
            $remark = $request->remark;
            $datetime = date('Y-m-d H:i:s');
            $createdBy = Auth::user()->id;

            DB::table('refer_to_nsacp_hiv_elisa')->insert(
                ['registration_no' => "$regNo", 'passport_no' => "$passprtNo", 'refered' => "$refered", 'remark' => "$remark", 'created_by' => "$createdBy", 'created_at' => $datetime]
            );

            return response()->json(['result' => true]);
        }

    }
}
