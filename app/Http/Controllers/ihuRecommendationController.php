<?php
/**
 * Created by PhpStorm.
 * User: Nishantha
 * Date: 2/6/2019
 * Time: 9:58 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ihuRecommendationController
{
    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.ihuRecommendation')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }
    public function Viewpage2()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.ihuRecommendationHistory')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }
    //ihuRecommendationUpdate
    public function Viewpage3()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.ihuRecommendationUpdate')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function process(Request $request)
    {
        $function = $request->function;
        $Cby = Auth::id();
        if ($function == 'ViewDetails') {
            $passportNumber = $request->passportNumber;
            $resp = DB::table('register_applicant_details')
                ->leftJoin('register_applicants', 'register_applicant_details.FkId', '=', 'register_applicants.id')
                ->leftJoin('tbl_consultation_main', 'tbl_consultation_main.cm_app_no', '=', 'register_applicant_details.AppointmentNumber')
                ->select(
                    'register_applicant_details.AppointmentNumber',
                    'register_applicant_details.FirstName',
                    'register_applicant_details.LastName',
                    'register_applicant_details.PassportNumber',
                    'register_applicant_details.PreviousPassportIfAny',
                    'register_applicant_details.CountryOfBirth',
                    'register_applicants.CdCity',
                    'register_applicant_details.DateOfBirth',
                    'register_applicant_details.Gender',
                    'register_applicant_details.Gender',
                    'register_applicant_details.Gender',
                    'register_applicants.CdAddress',
                    'register_applicants.SlAddress',
                    'register_applicants.SlTelephoneFixedLine',
                    'register_applicants.SlMobile',
                    'register_applicants.EmailAddress',
                    'register_applicants.SponsorName',
                    'register_applicant_details.Nationality',
                    'tbl_consultation_main.cm_exams_results',
                    'tbl_consultation_main.cm_dpp_comment'

                )
                ->where([
                    ['register_applicant_details.PassportNumber', '=', $passportNumber],
                    ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
                    ['register_applicant_details.status', '=', 'pending'],
                ])
                ->get();
//                ----get test result details------------------------------------------------------------------
            $resp2 = "";
            if (!empty($resp)) {
                $resp2 = DB::table('tbl_phlrapidtestresults')
                    ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'tbl_phlrapidtestresults.prtr_appno')
                    ->select(
                        'tbl_phlrapidtestresults.prtr_test',
                        'tbl_phlrapidtestresults.prtr_result',
                        'tbl_phlrapidtestresults.prtr_comment'

                    )
                    ->where(
                        'register_applicant_details.PassportNumber', '=', $passportNumber
                    )
                    ->get();
            }

//            ================================================================================
            $resp3 = DB::table('tbl_counseling_details')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'tbl_counseling_details.cd_app_no')
                 ->select(
                    'tbl_counseling_details.cd_remarks'
                 )
                ->where(
                    'register_applicant_details.PassportNumber', '=', $passportNumber
                )
                ->get();

            return response()->json(['result' => $resp, 'result2' => $resp2,'result3' => $resp3]);

        }else if ($function == 'ViewDetails2') {
            $AppoimentNo = $request->AppoimentNo;
            $resp = DB::table('register_applicant_details')
                ->leftJoin('register_applicants', 'register_applicant_details.FkId', '=', 'register_applicants.id')
                ->leftJoin('tbl_consultation_main', 'tbl_consultation_main.cm_app_no', '=', 'register_applicant_details.AppointmentNumber')
                ->select(
                    'register_applicant_details.AppointmentNumber',
                    'register_applicant_details.FirstName',
                    'register_applicant_details.LastName',
                    'register_applicant_details.PassportNumber',
                    'register_applicant_details.PreviousPassportIfAny',
                    'register_applicant_details.CountryOfBirth',
                    'register_applicants.CdCity',
                    'register_applicant_details.DateOfBirth',
                    'register_applicant_details.Gender',
                    'register_applicant_details.Gender',
                    'register_applicant_details.Gender',
                    'register_applicants.CdAddress',
                    'register_applicants.SlAddress',
                    'register_applicants.SlTelephoneFixedLine',
                    'register_applicants.SlMobile',
                    'register_applicants.EmailAddress',
                    'register_applicants.SponsorName',
                    'register_applicant_details.Nationality',
                    'tbl_consultation_main.cm_exams_results',
                    'tbl_consultation_main.cm_dpp_comment'

                )
                ->where([
                    ['register_applicant_details.AppointmentNumber', '=', $AppoimentNo],
                    ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
                    ['register_applicant_details.status', '=', 'pending'],
                ])
                ->get();
//                ----get test result details------------------------------------------------------------------
            $resp2 = "";
            if (!empty($resp)) {
                $resp2 = DB::table('tbl_phlrapidtestresults')
                    ->select(
                        'tbl_phlrapidtestresults.prtr_test',
                        'tbl_phlrapidtestresults.prtr_result',
                        'tbl_phlrapidtestresults.prtr_comment'

                    )
                    ->where('tbl_phlrapidtestresults.prtr_appno', '=', $AppoimentNo)
                    ->get();
            }

//            ================================================================================

                      $resp3 = DB::table('tbl_counseling_details')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'tbl_counseling_details.cd_app_no')
                ->select(
                    'tbl_counseling_details.cd_remarks'
                )
                ->where(
                    'register_applicant_details.AppointmentNumber', '=', $AppoimentNo
                )
                ->get();

            return response()->json(['result' => $resp, 'result2' => $resp2,'result3' => $resp3]);



        }else if ($function == 'ViewDetails3') {
        $passportNumber = $request->passportNumber;
        $resp = DB::table('register_applicant_details')
            ->leftJoin('register_applicants', 'register_applicant_details.FkId', '=', 'register_applicants.id')
            ->leftJoin('tbl_consultation_main', 'tbl_consultation_main.cm_app_no', '=', 'register_applicant_details.AppointmentNumber')
            ->select(
                'register_applicant_details.AppointmentNumber',
                'register_applicant_details.FirstName',
                'register_applicant_details.LastName',
                'register_applicant_details.PassportNumber',
                'register_applicant_details.PreviousPassportIfAny',
                'register_applicant_details.CountryOfBirth',
                'register_applicants.CdCity',
                'register_applicant_details.DateOfBirth',
                'register_applicant_details.Gender',
                'register_applicant_details.Gender',
                'register_applicant_details.Gender',
                'register_applicants.CdAddress',
                'register_applicants.SlAddress',
                'register_applicants.SlTelephoneFixedLine',
                'register_applicants.SlMobile',
                'register_applicants.EmailAddress',
                'register_applicants.SponsorName',
                'register_applicant_details.Nationality',
                'tbl_consultation_main.cm_exams_results',
                'tbl_consultation_main.cm_dpp_comment'

            )
            ->where([
                ['register_applicant_details.PassportNumber', '=', $passportNumber],
                ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],

            ])
            ->get();
//                ----get test result details------------------------------------------------------------------
        $resp2 = "";
        if (!empty($resp)) {
            $resp2 = DB::table('tbl_phlrapidtestresults')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'tbl_phlrapidtestresults.prtr_appno')
                ->select(
                    'tbl_phlrapidtestresults.prtr_test',
                    'tbl_phlrapidtestresults.prtr_result',
                    'tbl_phlrapidtestresults.prtr_comment'

                )
                ->where(
                    'register_applicant_details.PassportNumber', '=', $passportNumber
                )
                ->get();
        }

//            ================================================================================
            $resp3 = DB::table('tbl_counseling_details')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'tbl_counseling_details.cd_app_no')
                ->select(
                    'tbl_counseling_details.cd_remarks'
                )
                ->where(
                    'register_applicant_details.PassportNumber', '=', $passportNumber
                )
                ->get();

            return response()->json(['result' => $resp, 'result2' => $resp2,'result3' => $resp3]);

    }else if ($function == 'ViewDetails4') {
            $AppoimentNo = $request->AppoimentNo;
            $resp = DB::table('register_applicant_details')
                ->leftJoin('register_applicants', 'register_applicant_details.FkId', '=', 'register_applicants.id')
                ->leftJoin('tbl_consultation_main', 'tbl_consultation_main.cm_app_no', '=', 'register_applicant_details.AppointmentNumber')
                ->select(
                    'register_applicant_details.AppointmentNumber',
                    'register_applicant_details.FirstName',
                    'register_applicant_details.LastName',
                    'register_applicant_details.PassportNumber',
                    'register_applicant_details.PreviousPassportIfAny',
                    'register_applicant_details.CountryOfBirth',
                    'register_applicants.CdCity',
                    'register_applicant_details.DateOfBirth',
                    'register_applicant_details.Gender',
                    'register_applicant_details.Gender',
                    'register_applicant_details.Gender',
                    'register_applicants.CdAddress',
                    'register_applicants.SlAddress',
                    'register_applicants.SlTelephoneFixedLine',
                    'register_applicants.SlMobile',
                    'register_applicants.EmailAddress',
                    'register_applicants.SponsorName',
                    'register_applicant_details.Nationality',
                    'tbl_consultation_main.cm_exams_results',
                    'tbl_consultation_main.cm_dpp_comment'

                )
                ->where([
                    ['register_applicant_details.AppointmentNumber', '=', $AppoimentNo],
                    ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
               ])
                ->get();
//                ----get test result details------------------------------------------------------------------
            $resp2 = "";
            if (!empty($resp)) {
                $resp2 = DB::table('tbl_phlrapidtestresults')
                    ->select(
                        'tbl_phlrapidtestresults.prtr_test',
                        'tbl_phlrapidtestresults.prtr_result',
                        'tbl_phlrapidtestresults.prtr_comment'

                    )
                    ->where('tbl_phlrapidtestresults.prtr_appno', '=', $AppoimentNo)
                    ->get();
            }


            $resp3 = DB::table('tbl_counseling_details')
                ->leftJoin('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'tbl_counseling_details.cd_app_no')
                ->select(
                    'tbl_counseling_details.cd_remarks'
                )
                ->where(
                    'register_applicant_details.AppointmentNumber', '=', $AppoimentNo
                )
                ->get();

            return response()->json(['result' => $resp, 'result2' => $resp2,'result3' => $resp3]);

        } else if ($function == 'SaveIhuRecomendationDetails') {
            $datetime = date('Y-m-d H:i:s');
            $AppointmentNumberNo = $request->AppointmentNumberNo;
            $Nameinfull = $request->Nameinfull;
            $LastName = $request->LastName;
            $CurrentPassportNumber = $request->CurrentPassportNumber;
            $PreviousPassportNumberIfAny = $request->PreviousPassportNumberIfAny;
            $Country = $request->Country;
            $City = $request->City;
            $DateOfBirth = $request->DateOfBirth;
            $Gender = $request->Gender;
            $AddressIfTheCountryOfDomicile = $request->AddressIfTheCountryOfDomicile;
            $Telephone = $request->Telephone;
            $Mobile = $request->Mobile;
            $Email = $request->Email;
            $SponsorName = $request->SponsorName;
            $AddressDuringStayingInSriLanka = $request->AddressDuringStayingInSriLanka;
            $Nationality = $request->Nationality;
            $CounsellingDetails = $request->CounsellingDetails;
            $ConsultationDetails = $request->ConsultationDetails;
            $TestResultDetails = $request->TestResultDetails;
            $FinalReview = $request->FinalReview;
            $Remark = $request->Remark;
            $status = $request->status;


            DB::table('ihu_recommendation')->insert(
                ['AppointmentNumberNo' => $AppointmentNumberNo,
                    'FirstName' => $Nameinfull,
                    'LastName' => $LastName,
                    'CurrentPassportNumber' => $CurrentPassportNumber,
                    'PreviousPassportNumberIfAny' => $PreviousPassportNumberIfAny,
                    'Country' => $Country,
                    'City' => $City,
                    'DateOfBirth' => $DateOfBirth,
                    'Gender' => $Gender,
                    'AddressIfTheCountryOfDomicile' => $AddressIfTheCountryOfDomicile,
                    'Telephone' => $Telephone,
                    'Mobile' => $Mobile,
                    'Email' => $Email,
                    'SponsorName' => $SponsorName,
                    'AddressDuringStayingInSriLanka' => $AddressDuringStayingInSriLanka,
                    'Nationality' => $Nationality,
//                        'CounsellingDetails' => $CounsellingDetails,
//                        'ConsultationDetails' => $ConsultationDetails,
//                        'TestResultDetails' => $TestResultDetails,
                    'FinalReview' => $FinalReview,
                    'Remark' => $Remark,
                    'status' => $status,
                    'created_by' => $Cby,
                    'created_at' => $datetime
                ]
            );

            DB::table('register_applicant_details')->where([
                ['AppointmentNumber', $AppointmentNumberNo],
                ['register_applicant_details.status', '=', 'pending'],
            ])->update(
                ['status' => 'completed']
            );

            return response()->json(['result' => TRUE]);
        }else if($function=="CheckAllredaySved"){
            /////////////////////////////////////////////////////////////////////////////////
            $passportnumber=$request->passportnumber;

            $AlreadySubmitted  = DB::table('register_applicants')
                ->leftJoin('register_applicant_details', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->leftJoin('appointment_cancel_and_reschedule_availability', 'appointment_cancel_and_reschedule_availability.appointment_no', '=','register_applicant_details.AppointmentNumber' )
                ->select('register_applicants.id')
                ->where([
                    ['register_applicant_details.PassportNumber', '=', $passportnumber],
                    ['register_applicant_details.MemberStatus', '=', 'MainMember'],
                    ['register_applicants.StatusSaveOrSubmith', '=', 'Submit'],
                    ['appointment_cancel_and_reschedule_availability.status', '!=', 'Cancelled'],
                ])
                ->count();
            return response()->json(['result' => $AlreadySubmitted]);
            ////////////////////////////////////////////////////////////////////////////////
        }
    }
}
