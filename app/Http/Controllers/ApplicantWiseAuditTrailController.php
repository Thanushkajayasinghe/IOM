<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApplicantWiseAuditTrailController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.AuditTrail')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function loadDataAppNo(Request $request)
    {
        $result = DB::table('audittrail')
            ->get();

        return response()->json(['result' => $result]);
    }

    public function loadData(Request $request)
    {
        $appno = $request->appNo;
        $dateSel = $request->dateSel;

        $result = DB::table('audittrail')
            ->join('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'audittrail.appno')
            ->join('user_details as reg', 'reg.user_serial', '=', 'audittrail.regcou')
            ->join('user_details as cou', 'cou.user_serial', '=', 'audittrail.coucou')
            ->join('user_details as cxr', 'cxr.user_serial', '=', 'audittrail.cxrcou')
            ->join('user_details as phl', 'phl.user_serial', '=', 'audittrail.phlcou')
            ->join('user_details as con', 'con.user_serial', '=', 'audittrail.concou')
            ->whereDate('audittrail.regitration', '=', $dateSel)
            ->when($appno, function ($query) use ($appno) {
                $query->where('audittrail.appno', '=', $appno);
            })
            ->get(['audittrail.appno', 'register_applicant_details.PassportNumber', 'audittrail.regitration', 'audittrail.counselling', 'audittrail.cxr', 'audittrail.phlbotomy', 'audittrail.consultation', 'reg.user_id as reguserid', 'cou.user_id as couuserid', 'cxr.user_id as cxruserid', 'phl.user_id as phluserid', 'con.user_id as conuserid']);

        return response()->json(['result' => $result]);
    }
}
