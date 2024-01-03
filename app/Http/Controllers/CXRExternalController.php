<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CXRExternalController extends Controller
{

    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.CXRExternal')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function cxrsave(Request $request)
    {
        $function = $request->function;

        if ($function == "Insert") {

            $RegistrationNo = $request->RegistrationNo;
            $CXRID = $request->CXRID;
            $PassportNo = $request->PassportNo;
            $Pregnancy = $request->Pregnancy;
            $TestDate = $request->TestDate;
            $LMPDate = $request->LMPDate;
            $Result = $request->Result;
            $NotDoneothertxt = $request->NotDoneothertxt;
            $Doneothertxt = $request->Doneothertxt;
            $PregnancyTestOffered = $request->PregnancyTestOffered;
            $CounselingDone = $request->CounselingDone;

            $Deferred = $request->Deferred;
            $Pregnant = $request->Pregnant;
            $Applicant = $request->Applicant;
            $noShow = $request->noShow;
            $Child = $request->Child;
            $Unable = $request->Unable;
            $NotDoneother = $request->NotDoneother;
            $Shielding = $request->Shielding;
            $DONEother = $request->DONEother;

            DB::table('cxr_external')->insert(
                ['registrationno' => "$RegistrationNo", 'cxrid' => "$CXRID", 'passportno' => "$PassportNo",
                    'pregnancy' => "$Pregnancy", 'testdate' => $TestDate, 'lmpdate' => $LMPDate,
                    'result' => "$Result", 'pregnancytestoffered' => "$PregnancyTestOffered", 'counselingdone' => "$CounselingDone",
                    'deferred' => "$Deferred", 'pregnant' => "$Pregnant", 'applicant' => "$Applicant",
                    'noshow' => "$noShow", 'childlessthan11' => "$Child", 'unable' => "$Unable",
                    'cxrnotdoneother' => "$NotDoneother", 'cxrnotdoneothertxt' => "$NotDoneothertxt", 'Shielding' => "$Shielding",
                    'cxrdoneothers' => "$DONEother", 'cxrdoneotherstxt' => "$Doneothertxt"]
            );


            $res = true;
            return response()->json(['result' => $res]);

        }
    }

}
