<?php
/**
 * Created by PhpStorm.
 * User: Nishantha
 * Date: 2/1/2019
 * Time: 12:05 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewTBSputmSampleDetailsController
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.ViewTBSputmSampleDetails')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function SearchLabNo(Request $request)
    {

        $SearchLabbNos = DB::table('dispatch_to_tb_lab')
            ->distinct()
            ->select(
                'dispatch_to_tb_lab.labno'
            )
            ->where([
                ['dispatch_to_tb_lab.status', '=', 'Receive'],
                ['dispatch_to_tb_lab.labno', '!=', null]
            ])
            ->get();
        return response()->json(['result' => $SearchLabbNos]);
    }


    public function SearchLabNoWise(Request $request)
    {
        $Labno = $request->LabNo;
        $SearchDetailsAll = DB::table('dispatch_to_tb_lab')
            ->leftJoin('tbl_sputum_collection', 'tbl_sputum_collection.sc_id', '=', 'dispatch_to_tb_lab.samplecollectionid')
            ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'tbl_sputum_collection.sc_app_no')
            ->select(
                'dispatch_to_tb_lab.labno',
                'dispatch_to_tb_lab.barcode',
                'dispatch_to_tb_lab.date',
                'dispatch_to_tb_lab.time',
                'register_applicant_details.Gender'


            )
            ->where([
                ['dispatch_to_tb_lab.status', '=', 'Receive'],
                ['dispatch_to_tb_lab.labno', '=', $Labno]
            ])
            ->get();
        return response()->json(['result' => $SearchDetailsAll]);
    }
}