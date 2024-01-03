<?php
/**
 * Created by PhpStorm.
 * User: Nishantha
 * Date: 4/29/2019
 * Time: 11:28 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ihuRecommendationUpdateController
{




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
//                ----get phlebotomy result details------------------------------------------------------------------

              $tbl_phlebotomy_sample  = DB::table('tbl_phlebotomy_sample')
                ->select('tbl_phlebotomy_sample.ps_hiv_elisa','tbl_phlebotomy_sample.ps_malaria',
                    'tbl_phlebotomy_sample.ps_filaria','tbl_phlebotomy_sample.ps_shcg'
                )
                ->where([
                    ['tbl_phlebotomy_sample.ps_passp_no', '=',$passportNumber],

                ])
                ->get();
           // ---------- get tbl_cxr Details -------------------
            $tbl_cxr  = DB::table('tbl_cxr')
                ->select('tbl_cxr.cxr_passp_no',
                    'tbl_cxr.cxr_app_no',
                    'tbl_cxr.cxr_preg',
                    'tbl_cxr.cxr_test_date',
                    'tbl_cxr.cxr_lmp_date',
                    'tbl_cxr.cxr_result',
                    'tbl_cxr.cxr_preg_test_off',
                    'tbl_cxr.cxr_counsel',
                    'tbl_cxr.cxr_done',
                    'tbl_cxr.cxr_not_done',

                    'tbl_cxr.cxr_def',
                    'tbl_cxr.cxr_preg_sc',
                    'tbl_cxr.cxr_app_dec',
                    'tbl_cxr.cxr_no_show',
                    'tbl_cxr.cxr_child',
                    'tbl_cxr.cxr_unbl_unwill_sc',
                    'tbl_cxr.cxr_not_done_others',
                    'tbl_cxr.not_done_other_text',

                    'tbl_cxr.cxr_done_plv_shld',
                    'tbl_cxr.cxr_done_dbl_abd_shield',
                    'tbl_cxr.cxr_done_other',
                    'tbl_cxr.done_other_text',

                    'tbl_cxr.cxr_radiology',
                    'tbl_cxr.cxr_extra_view'

                )
                ->where([
                    ['tbl_cxr.cxr_passp_no', '=',$passportNumber],

                ])
                ->get();
//            -------------------  Counsultation Details----------------------------------------------

            //                ----get phlebotomy result details------------------------------------------------------------------

            $tbl_consultation_main  = DB::table('tbl_consultation_main')
                ->select('tbl_consultation_main.cm_app_no',
                    'tbl_consultation_main.cm_pass_no',
                    'tbl_consultation_main.category',
                    'tbl_consultation_main.cm_cough',
                    'tbl_consultation_main.cm_haemoptysis',
                    'tbl_consultation_main.cm_night_sweats',
                    'tbl_consultation_main.cm_weight_loss',
                    'tbl_consultation_main.cm_fever',
                    'tbl_consultation_main.cm_any',
                    'tbl_consultation_main.cm_prev_thor_surgery',
                    'tbl_consultation_main.cm_cyanosis',
                    'tbl_consultation_main.cm_resp_insufficient',
                    'tbl_consultation_main.cm_history_tb',
                    'tbl_consultation_main.cm_household_tb',
                    'tbl_consultation_main.cm_active_tb',
                    'tbl_consultation_main.cm_exams_results',
                    'tbl_consultation_main.cm_single_fibrous_streak',
                    'tbl_consultation_main.cm_bony_islets',
                    'tbl_consultation_main.cm_pleural_capping',
                    'tbl_consultation_main.cm_unilateral_bilateral',
                    'tbl_consultation_main.cm_calcified_nodule',
                    'tbl_consultation_main.cm_solitary_granuloma_hilum' ,
                   'tbl_consultation_main.cm_solitary_granuloma_enlarged',
                    'tbl_consultation_main.cm_single_multi_calc_pulmonary',
                    'tbl_consultation_main.cm_calcified_pleural_lesions',
                    'tbl_consultation_main.cm_costophrenic_angle',
                    'tbl_consultation_main.cm_aplcal_fbronodualar',
                    'tbl_consultation_main.cm_multi_single_pulmonary_nodu_micronodules',
                    'tbl_consultation_main.cm_isolated_hilar',
                    'tbl_consultation_main.cm_multi_single_pulmonary_nodu_masses',
                    'tbl_consultation_main.cm_non_calcified_pleural_fibrosos',
                    'tbl_consultation_main.cm_interstltial_fbrosos',
                    'tbl_consultation_main.cm_any_cavitating_lesion',
                    'tbl_consultation_main.cm_skeleton_soft_issue',
                    'tbl_consultation_main.cm_cardiac_major_vessels',
                    'tbl_consultation_main.cm_lung_fields',
                    'tbl_consultation_main.cm_other',
                    'tbl_consultation_main.cm_dpp_comment',
                    'tbl_consultation_main.cm_order_sputum_sample'

                )
                ->where([
                    ['tbl_consultation_main.cm_pass_no', '=',$passportNumber],

                ])
                ->get();



            return response()->json(['result' => $resp,'phlebotomy'=>$tbl_phlebotomy_sample,'cxr'=>$tbl_cxr,'consult'=>$tbl_consultation_main]);

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
               $tbl_phlebotomy_sample  = DB::table('tbl_phlebotomy_sample')
                   ->select('tbl_phlebotomy_sample.ps_hiv_elisa','tbl_phlebotomy_sample.ps_malaria',
                       'tbl_phlebotomy_sample.ps_filaria','tbl_phlebotomy_sample.ps_shcg'
                   )
                  ->where([
                      ['tbl_phlebotomy_sample.ps_app_no', '=',$AppoimentNo],

                ])
                 ->get();

            // ---------- get tbl_cxr Details -------------------
            $tbl_cxr  = DB::table('tbl_cxr')
                ->select('tbl_cxr.cxr_passp_no',
                    'tbl_cxr.cxr_app_no',
                    'tbl_cxr.cxr_preg',
                    'tbl_cxr.cxr_test_date',
                    'tbl_cxr.cxr_lmp_date',
                    'tbl_cxr.cxr_result',
                    'tbl_cxr.cxr_preg_test_off',
                    'tbl_cxr.cxr_counsel',
                    'tbl_cxr.cxr_done',
                    'tbl_cxr.cxr_not_done',
                    'tbl_cxr.cxr_def',
                    'tbl_cxr.cxr_preg_sc',
                    'tbl_cxr.cxr_app_dec',
                    'tbl_cxr.cxr_no_show',
                    'tbl_cxr.cxr_child',
                    'tbl_cxr.cxr_unbl_unwill_sc',
                    'tbl_cxr.cxr_done_other',
                    'tbl_cxr.done_other_text',
                    'tbl_cxr.cxr_done_plv_shld',
                    'tbl_cxr.cxr_done_plv_shld',
                    'tbl_cxr.cxr_done_dbl_abd_shield',
                    'tbl_cxr.cxr_not_done_others',
                    'tbl_cxr.not_done_other_text',
                    'tbl_cxr.done_other_text',
                    'tbl_cxr.cxr_radiology',
                    'tbl_cxr.cxr_extra_view'

                )
                ->where([
                    ['tbl_cxr.cxr_app_no', '=',$AppoimentNo],

                ])
                ->get();


            $tbl_consultation_main  = DB::table('tbl_consultation_main')
                ->select(
                    'tbl_consultation_main.cm_app_no',
                    'tbl_consultation_main.cm_pass_no',
                    'tbl_consultation_main.category',

                    'tbl_consultation_main.cm_cough',
                    'tbl_consultation_main.cm_haemoptysis',
                    'tbl_consultation_main.cm_night_sweats',
                    'tbl_consultation_main.cm_weight_loss',
                    'tbl_consultation_main.cm_fever',

                    'tbl_consultation_main.cm_any',
                    'tbl_consultation_main.cm_prev_thor_surgery',
                    'tbl_consultation_main.cm_cyanosis',
                    'tbl_consultation_main.cm_resp_insufficient',

                    'tbl_consultation_main.cm_history_tb',
                    'tbl_consultation_main.cm_household_tb',
                    'tbl_consultation_main.cm_active_tb',

                    'tbl_consultation_main.cm_exams_results',

                    'tbl_consultation_main.cm_single_fibrous_streak',
                    'tbl_consultation_main.cm_bony_islets',
                    'tbl_consultation_main.cm_pleural_capping',
                    'tbl_consultation_main.cm_unilateral_bilateral',
                    'tbl_consultation_main.cm_calcified_nodule',

                    'tbl_consultation_main.cm_solitary_granuloma_hilum' ,
                    'tbl_consultation_main.cm_solitary_granuloma_enlarged',
                    'tbl_consultation_main.cm_single_multi_calc_pulmonary',
                    'tbl_consultation_main.cm_calcified_pleural_lesions',
                    'tbl_consultation_main.cm_costophrenic_angle',

                    'tbl_consultation_main.cm_notable_apical',
                    'tbl_consultation_main.cm_aplcal_fbronodualar',
                    'tbl_consultation_main.cm_multi_single_pulmonary_nodu_micronodules',
                    'tbl_consultation_main.cm_isolated_hilar',
                    'tbl_consultation_main.cm_multi_single_pulmonary_nodu_masses',
                    'tbl_consultation_main.cm_non_calcified_pleural_fibrosos',
                    'tbl_consultation_main.cm_interstltial_fbrosos',
                    'tbl_consultation_main.cm_any_cavitating_lesion',

                    'tbl_consultation_main.cm_skeleton_soft_issue',
                    'tbl_consultation_main.cm_cardiac_major_vessels',
                    'tbl_consultation_main.cm_lung_fields',
                    'tbl_consultation_main.cm_other',

                    'tbl_consultation_main.cm_dpp_comment',
                    'tbl_consultation_main.cm_order_sputum_sample'

                )
                ->where([
                    ['tbl_consultation_main.cm_app_no', '=',$AppoimentNo],

                ])
                ->get();



            return response()->json(['result' => $resp,'phlebotomy'=>$tbl_phlebotomy_sample,'cxr'=>$tbl_cxr,'consult'=>$tbl_consultation_main]);




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
                    ['register_applicant_details.status', '=', 'pending'],
                    ['appointment_cancel_and_reschedule_availability.status', '!=', 'Canceled']
                ])
                ->count();
            return response()->json(['result' => $AlreadySubmitted]);
            ////////////////////////////////////////////////////////////////////////////////
        }else if($function=="UpdateIhuRecomendation"){
            $AppointmentNumberNo=$request->AppointmentNumberNo;

            $Nameinfull=$request->Nameinfull;
            $LastName=$request->LastName;
            $CurrentPassportNumber=$request->CurrentPassportNumber;
            $PreviousPassportNumberIfAny=$request->PreviousPassportNumberIfAny;
            $Country=$request->Country;
            $City=$request->City;
            $DateOfBirth=$request->DateOfBirth;
            $Gender=$request->Gender;
            $AddressIfTheCountryOfDomicile=$request->AddressIfTheCountryOfDomicile;
            $Telephone=$request->Telephone;
            $Mobile=$request->Mobile;
            $Email=$request->Email;
            $SponsorName=$request->SponsorName;
            $AddressDuringStayingInSriLanka=$request->AddressDuringStayingInSriLanka;
            $Nationality=$request->Nationality;
           //=====================PROFILE UPDATE CODE=============================
            DB::table('register_applicant_details')
                ->leftJoin('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->where('register_applicant_details.AppointmentNumber', $AppointmentNumberNo)
                ->update(
                [
                    'register_applicant_details.FirstName' => $Nameinfull,
                    'register_applicant_details.LastName'=>$LastName,
                    'register_applicant_details.PassportNumber'=>$CurrentPassportNumber,
                    'register_applicant_details.PreviousPassportIfAny'=>$PreviousPassportNumberIfAny,
                    'register_applicant_details.CountryOfBirth'=>$Country,
                    'register_applicant_details.DateOfBirth'=>$DateOfBirth,
                    'register_applicant_details.Gender'=>$Gender,
                    'register_applicant_details.Nationality'=>$Nationality
                ]
            );

            DB::table('register_applicants')
                ->leftJoin('register_applicant_details', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->where('register_applicant_details.AppointmentNumber', $AppointmentNumberNo)
                ->update(
                    [
                    'register_applicants.CdCity'=>$City,
                    'register_applicants.CdAddress'=>$AddressIfTheCountryOfDomicile,
                    'register_applicants.SlAddress'=>$AddressDuringStayingInSriLanka,
                    'register_applicants.SlTelephoneFixedLine'=>$Telephone,
                    'register_applicants.SlMobile'=>$Mobile,
                    'register_applicants.EmailAddress'=>$Email,
                    'register_applicants.SponsorName'=>$SponsorName

                    ]
                );

//           =======================END PROFILE UPDATED============================
            $cxr_preg=$request->cxr_preg;
            $cxr_test_date=$request->cxr_test_date;
            $cxr_lmp_date=$request->cxr_lmp_date;
            $cxr_result=$request->cxr_result;
            $cxr_preg_test_off=$request->cxr_preg_test_off;
            $cxr_counsel=$request->cxr_counsel;
            $cxr_done=$request->cxr_done;
            $cxr_not_done=$request->cxr_not_done;
            $cxr_def=$request->cxr_def;
            $cxr_preg_sc=$request->cxr_preg_sc;
            $cxr_app_dec=$request->cxr_app_dec;
            $cxr_no_show=$request->cxr_no_show;
            $cxr_child=$request->cxr_child;
            $cxr_unbl_unwill_sc=$request->cxr_unbl_unwill_sc;
            $cxr_not_done_others=$request->cxr_not_done_others;
            $not_done_other_text=$request->not_done_other_text;
            $cxr_done_plv_shld=$request->cxr_done_plv_shld;
            $cxr_done_dbl_abd_shield=$request->cxr_done_dbl_abd_shield;
            $cxr_done_other=$request->cxr_done_other;
            $cxr_done_others_details=$request->cxr_done_others_details;
//            ===================CXR UPDATE CODE==============================
          DB::table('tbl_cxr')->where('cxr_app_no', $AppointmentNumberNo)->update(
                [
                    'cxr_preg'=>$cxr_preg,
                    'cxr_test_date'=>$cxr_test_date,
                    'cxr_lmp_date'=>$cxr_lmp_date,
                    'cxr_preg_test_off'=>$cxr_preg_test_off,
                    'cxr_counsel'=>$cxr_counsel,
                    'cxr_result'=>$cxr_result,
                    'cxr_done'=>$cxr_done,
                    'cxr_not_done'=>$cxr_not_done,
                    'cxr_def'=>$cxr_def,
                    'cxr_preg_sc'=>$cxr_preg_sc,
                    'cxr_app_dec'=>$cxr_app_dec,
                    'cxr_no_show'=>$cxr_no_show,
                    'cxr_child'=>$cxr_child,
                    'cxr_unbl_unwill_sc'=>$cxr_unbl_unwill_sc,
                    'cxr_done_other'=>$cxr_done_other,
                    'done_other_text'=>$cxr_done_others_details,
                    'cxr_done_plv_shld'=>$cxr_done_plv_shld,
                    'cxr_done_dbl_abd_shield'=>$cxr_done_dbl_abd_shield,
                    'cxr_not_done_others'=>$cxr_not_done_others,
                    'not_done_other_text'=>$not_done_other_text

                ]
            );https://chocolatey.org/

//            =======================END CXR UPDATE CODE=================


            $ty1=$request->ty1;
            $ty2=$request->ty2;
            $ty3=$request->ty3;
            $ty4=$request->ty4;
            $ty5=$request->ty5;

            $tyr1=$request->tyr1;
            $tyr2=$request->tyr2;
            $tyr3=$request->tyr3;
            $tyr4=$request->tyr4;

            $tyg1=$request->tyg1;
            $tyg2=$request->tyg2;
            $tyg3=$request->tyg3;

            $chkbox1=$request->chkbox1;
            $chkbox2=$request->chkbox2;
            $chkbox3=$request->chkbox3;
            $chkbox4=$request->chkbox4;
            $chkbox5=$request->chkbox5;
            $chkbox6=$request->chkbox6;
            $chkbox7=$request->chkbox7;
            $chkbox8=$request->chkbox8;
            $chkbox9=$request->chkbox9;
            $chkbox10=$request->chkbox10;
            $chkbox11=$request->chkbox11;
            $chkbox12=$request->chkbox12;
            $chkbox13=$request->chkbox13;
            $chkbox14=$request->chkbox14;
            $chkbox15=$request->chkbox15;
            $chkbox16=$request->chkbox16;
            $chkbox17=$request->chkbox17;
            $chkbox18=$request->chkbox18;
            $chkbox19=$request->chkbox19;
            $chkbox20=$request->chkbox20;
            $chkbox21=$request->chkbox21;
            $chkbox22=$request->chkbox22;
//            ===========================Update Consultation================================
           DB::table('tbl_consultation_main')->where('cm_app_no', $AppointmentNumberNo)->update(
                [


                    'cm_cough'=>$ty1,
                    'cm_haemoptysis'=>$ty2,
                    'cm_night_sweats'=>$ty3,
                    'cm_weight_loss'=>$ty4,
                    'cm_fever'=>$ty5,

                    'cm_any'=>$tyr1,
                    'cm_prev_thor_surgery'=>$tyr2,
                    'cm_cyanosis'=>$tyr3,
                    'cm_resp_insufficient'=>$tyr4,

                    'cm_history_tb'=>$tyg1,
                    'cm_household_tb'=>$tyg2,
                    'cm_active_tb'=>$tyg3,


                    'cm_single_fibrous_streak'=>$chkbox1,
                    'cm_bony_islets'=>$chkbox2,
                    'cm_pleural_capping'=>$chkbox3,
                    'cm_unilateral_bilateral'=>$chkbox4,
                    'cm_calcified_nodule'=>$chkbox5,

                    'cm_solitary_granuloma_hilum'=>$chkbox6,
                    'cm_solitary_granuloma_enlarged'=>$chkbox7,
                    'cm_single_multi_calc_pulmonary'=>$chkbox8,
                    'cm_calcified_pleural_lesions'=>$chkbox9,
                    'cm_costophrenic_angle'=>$chkbox10,

                    'cm_notable_apical'=>$chkbox11,
                    'cm_aplcal_fbronodualar'=>$chkbox12,
                    'cm_multi_single_pulmonary_nodu_micronodules'=>$chkbox13,
                    'cm_isolated_hilar'=>$chkbox14,
                    'cm_multi_single_pulmonary_nodu_masses'=>$chkbox15,
                    'cm_non_calcified_pleural_fibrosos'=>$chkbox16,
                    'cm_interstltial_fbrosos'=>$chkbox17,
                    'cm_any_cavitating_lesion'=>$chkbox18,

                    'cm_skeleton_soft_issue'=>$chkbox19,
                    'cm_cardiac_major_vessels'=>$chkbox20,
                    'cm_lung_fields'=>$chkbox21,
                    'cm_other'=>$chkbox22,


                ]
            );

//            ==========================Updated Consultation==================================

            $cxr_def1=$request->cxr_def1;
            $cxr_def2=$request->cxr_def2;
            $cxr_def3=$request->cxr_def3;
            $cxr_def4=$request->cxr_def4;

//            ==================================Update Phl result=========================


            DB::table('tbl_phlebotomy_sample')->where('ps_app_no', $AppointmentNumberNo)->update(
                [
                    'ps_hiv_elisa'=>$cxr_def1,
                    'ps_malaria'=>$cxr_def2,
                    'ps_filaria'=>$cxr_def3,
                    'ps_shcg'=>$cxr_def4,

                ]
            );

//            ===================================Updated phl result===========

            return response()->json(['result' => true]);
        }

    }

//---------------------------------------------------------


}