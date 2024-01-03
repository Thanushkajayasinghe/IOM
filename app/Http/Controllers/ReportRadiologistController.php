<?php
/**
 * Created by PhpStorm.
 * User: Nishantha
 * Date: 3/27/2019
 * Time: 11:35 AM
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;

class ReportRadiologistController
{
    public function generatePDF(Request $request)
    {
        $Appno=$request->Appno;

        $ReportName='Radiologist Reporting';

        $ApplicantDetails = DB::table('tbl_radiologists_reporting')
            ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'tbl_radiologists_reporting.rr_app_no')
            ->select(
                'register_applicant_details.AppointmentNumber',
                'register_applicant_details.FirstName',
                'register_applicant_details.LastName',
                'register_applicant_details.DateOfBirth',
                'register_applicant_details.Gender',
                'register_applicant_details.PassportNumber',

                'tbl_radiologists_reporting.rr_single_fibrous_streak',
                'tbl_radiologists_reporting.rr_bony_islets',
                'tbl_radiologists_reporting.rr_pleural_capping',
                'tbl_radiologists_reporting.rr_unilateral_bilateral',
                'tbl_radiologists_reporting.rr_calcified_nodule',

                'tbl_radiologists_reporting.rr_solitary_granuloma_hilum',
                'tbl_radiologists_reporting.rr_solitary_granuloma_enlarged',
                'tbl_radiologists_reporting.rr_single_multi_calc_pulmonary',
                'tbl_radiologists_reporting.rr_calcified_pleural_lesions',
                'tbl_radiologists_reporting.rr_costophrenic_angle',

                'tbl_radiologists_reporting.rr_notable_apical',
                'tbl_radiologists_reporting.rr_aplcal_fbronodualar',
                'tbl_radiologists_reporting.rr_multi_single_pulmonary_nodu_micronodules',
                'tbl_radiologists_reporting.rr_isolated_hilar',
                'tbl_radiologists_reporting.rr_multi_single_pulmonary_nodu_masses',

                'tbl_radiologists_reporting.rr_non_calcified_pleural_fibrosos',
                'tbl_radiologists_reporting.rr_interstltial_fbrosos',
                'tbl_radiologists_reporting.rr_any_cavitating_lesion',
                'tbl_radiologists_reporting.rr_skeleton_soft_issue',
                'tbl_radiologists_reporting.rr_cardiac_major_vessels',

                'tbl_radiologists_reporting.rr_lung_fields',
                'tbl_radiologists_reporting.rr_other',

                'tbl_radiologists_reporting.rr_comment1',
                'tbl_radiologists_reporting.rr_comment2',
                'tbl_radiologists_reporting.xrayimgpath'
            )
            ->where('rr_app_no', '=', $Appno)
            ->orderBy('rr_id', 'DESC')
            ->first();

        $IDD = Auth::id();

        $bcode = DB::table('users')
            ->where('id', '=', $IDD)
            ->value('signature');


        $pdf = PDF::loadView('pages.RadiologistReportingPDF', compact('ReportName','ApplicantDetails','bcode' ));
        return $pdf->stream('RadiologistReportingPDF.pdf');
    }
}
