<?php

namespace App\Http\Controllers\Mhac;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use PDF;

class ConsultationController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.Consultationmh')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function CRUD(Request $request)
    {
        $command = $request->command;

        if($command === 'pendingToken'){
            $floor = Session::get('Floor');
            
            $counter = Session::get('counterid');
            $country = $request->country;
            $counterid = DB::table('mhac_counters')
            ->distinct()
            ->where('id', $counter)
            ->first();
            $counter_no = $counterid->counter_no;
           
            $token = DB::table('mhac_temp_table')
                ->distinct()
                ->where('floor', $floor)
                ->where(function ($query) use ($country) {
                    $query->where(function ($innerQuery) use ($country) {
                        $innerQuery->where(DB::raw("substring(token_no from '^([^-]+)')"), '=', 'UK');
                    })
                    ->orWhere(function ($innerQuery) use ($country) {
                        if ($country !== 'UK') {
                            $innerQuery->where('phlebotomy_status', '=', 4)
                                       ->where(DB::raw("substring(token_no from '^([^-]+)')"), '=', $country);
                        }
                    });
                })
                ->where('cxr_status', '=', 4)
                ->where('doctor_status', '=', 1)
                ->where('floor', '=', Session::get('Floor'))
                ->where(DB::raw("substring(token_no from '^([^-]+)')"), '=', $country)
                ->count('token_no');
            return response()->json(['result' => $token, 'counter' => $counter_no]);
            
        }else if ($command === 'next') {

            $array = array();
            $key = 0;
            $counterid = Session::get('counterid');

            $counterNoRecord = DB::table('mhac_counters')
            ->where('id', $counterid)
            ->value('counter_no');
           
        
            $floor = Session::get('Floor');
            $country =  $request->country;

            // Retrieve the token_no from the mhac_temp_table based on the floor, registration_status, payment_status, vital_status and country
            $tokenRecord = DB::table('mhac_temp_table')
                ->where('floor', $floor)
                ->where(function ($query) use ($country) {
                    $query->where(function ($innerQuery) use ($country) {
                        $innerQuery->where(DB::raw("substring(token_no from '^([^-]+)')"), '=', 'UK');
                    })
                    ->orWhere(function ($innerQuery) use ($country) {
                        if ($country !== 'UK') {
                            $innerQuery->where('phlebotomy_status', '=', 4)
                                       ->where(DB::raw("substring(token_no from '^([^-]+)')"), '=', $country);
                        }
                    });
                })
                ->where('cxr_status', '=', 4)
                ->where('doctor_status', '=', 1)
                ->where(DB::raw("substring(token_no from '^([^-]+)')"), '=', $country)
                ->orderBy('id')
                ->first();
        
            if ($tokenRecord) {
                // Retrieve the ID based on the token_no from the retrieved token record
                $token = $tokenRecord->token_no;
        
                $appointmentno = DB::table('mhac_temp_table')
                            ->select('appointment_no')
                            ->where('token_no', $token)
                            ->where('floor', $floor)
                            ->orderBy('appointment_no', 'asc')
                            ->get();
                
                foreach ($appointmentno as $valsappno) {
                                $array[$key] = $valsappno->appointment_no;
                                $key++;
                            }

                    // Update the vital_status for the fetched record using its id
                    DB::table('mhac_temp_table')
                    ->where('token_no', $token)
                    ->where('floor', $floor)
                        ->update(['doctor_status' => 2, 'doctor_counter' => $counterNoRecord]);   
              
                
                    return response()->json([
                        'tokenName' => $token,
                        'appointmentNo' => $array,
                    ]);
                }
           
        
            // Return a default response if no token or token record found
            return response()->json(['tokenName' => null]);

        }else if ($command === 'NoShowList') {
           
            $floor = Session::get('Floor');
            $country =  $request->input('country');

                $qry1 = DB::table('mhac_temp_table')
                ->select('token_no','doctor_status')
                ->distinct('token_no')
                ->where([
                    ['floor', $floor],
                    [DB::raw("substring(token_no from '^([^-]+)')"), $country],
                
                    ])
                    ->whereIn('doctor_status', [2, 3])
                ->get();
    
                $totresult = ($qry1);
    
    
                return response()->json(['result' => $totresult]);

        }else if ($command == 'NoShowCount') {

            $floor = Session::get('Floor');
            $country =  $request->input('country');

            //retrieve  vitals status 2 /3
            $qry1 = DB::table('mhac_temp_table')
            ->select('token_no','doctor_status')
            ->distinct('token_no')
            ->where([
                ['floor', $floor],
               
                ['cxr_status', 4],
                [DB::raw("substring(token_no from '^([^-]+)')"), $country],
            
                ])
                ->whereIn('doctor_status', [2, 3])
            ->get();

                $totresult = ($qry1)->count();

                return response()->json($totresult);

        }else if ($command === 'CheckAppointmentAvailable') {

            $appNo = $request->appNo;
            $count = DB::table('mhac_temp_table')
            ->where('appointment_no', '=', $appNo)
            ->where('doctor_status', '=', 5)
            ->count();
            $res = true;
            if ($count == 0) {
                    $res = false;
                }
            return response()->json(['result' => $res]);


        }else if ($command === 'notAvailable') {
            $token = $request->token;
            

            DB::table('mhac_temp_table')
                ->where('token_no', $token)
                ->update(['doctor_status' => 3]);

            return response()->json(['Done']);
            

        }else if($command === 'ChekTokNo'){
            $token = $request->token;

            $res = DB::table('mhac_temp_table')
                ->where('token_no', '=', $token)
                ->count();

            return response()->json(['result' => $res]);

        }else if ($command === 'AppointmentNo') {

            $token = $request->token;
            $array = array();
            $key = 0;

            $floor = Session::get('Floor');
            $counterid = Session::get('counterid');

            $counterNoRecord = DB::table('mhac_counters')
            ->where('id', $counterid)
            ->value('counter_no');

           

                $apparray = DB::table('mhac_temp_table')
                ->select('appointment_no')
                ->where('token_no', $token)
                ->where('floor', $floor)
                ->orderBy('appointment_no', 'asc')
                ->get();

            foreach ($apparray as $valsappno) {
                $array[$key] = $valsappno->appointment_no;
                $key++;
            }

            return response()->json($array);

        }else if ($command === 'data') {

            $appointment = $request->appointment;
            
            $appdetails = DB::table('mhac_appointments')
            ->select('passport_no', 'gender', 'first_name', 'last_name', 'dob', 'address1', 'address2', 'city', 'postal_code', 'contact_no_land', 'contact_no_mobile')
            ->where('appointment_no', $appointment)
            ->get();

        

                $image = DB::table('mhac_appointments')->where('appointment_no', $appointment)->value('image');
          

            foreach ($appdetails as $appnodetails) {

                $fullname = $appnodetails->first_name . " " . $appnodetails->last_name;
                $arrappdetails[0] = $appointment;
                $arrappdetails[1] = $appnodetails->passport_no;
                $arrappdetails[2] = $appnodetails->gender;
                $arrappdetails[3] = $fullname;
                $arrappdetails[4] = $appnodetails->dob;
                $arrappdetails[5] = $image;
                $arrappdetails[6] = $appnodetails->address1;
                $arrappdetails[7] = $appnodetails->address2;
                $arrappdetails[8] = $appnodetails->city;
                $arrappdetails[9] = $appnodetails->postal_code;
                $arrappdetails[10] = $appnodetails->contact_no_land;
                $arrappdetails[11] = $appnodetails->contact_no_mobile;
            }

            return response()->json($arrappdetails);
            

        }else if ($command === 'save') {

            $cby = Auth::id();
            $cdate = date('Y-m-d  h:i:sa');

            $counterid = Session::get('counterid');
            $floor = Session::get('Floor');

            $appno = $request->appno;

                DB::table('mhac_doctorroom')->updateOrInsert(
                    [ 'cm_app_no' => $request->appno],
                    [
                        'cm_pass_no' => $request->ppno,
                        'cm_cough' => $request->cough,
                        'cm_haemoptysis' => $request->haemoptysis,
                        'cm_night_sweats' => $request->nightsweats,
                        'cm_weight_loss' => $request->weightloss,
                        'cm_fever' => $request->fever,
                        'cm_any' => $request->chronicrespiratorydisease,
                        'cm_prev_thor_surgery' => $request->thoracic,
                        'cm_cyanosis' => $request->Cyanosis,
                        'cm_resp_insufficient' => $request->respiratoryinsufficient,
                        'cm_history_tb' => $request->historytb,
                        'cm_household_tb' => $request->householddiagnosedtb,
                        'cm_active_tb' => $request->historyrecentcontact,
                        'cm_exams_results' => $request->examsresults,
                        'cm_single_fibrous_streak' => $request->chkbox1,
                        'cm_bony_islets' => $request->chkbox2,
                        'cm_pleural_capping' => $request->chkbox3,
                        'cm_unilateral_bilateral' => $request->chkbox4,
                        'cm_calcified_nodule' => $request->chkbox5,
                        'cm_solitary_granuloma_hilum' => $request->chkbox6,
                        'cm_solitary_granuloma_enlarged' => $request->chkbox7,
                        'cm_single_multi_calc_pulmonary' => $request->chkbox8,
                        'cm_calcified_pleural_lesions' => $request->chkbox9,
                        'cm_costophrenic_angle' => $request->chkbox10,
                        'cm_notable_apical' => $request->chkbox11,
                        'cm_aplcal_fbronodualar' => $request->chkbox12,
                        'cm_multi_single_pulmonary_nodu_micronodules' => $request->chkbox13,
                        'cm_isolated_hilar' => $request->chkbox14,
                        'cm_multi_single_pulmonary_nodu_masses' => $request->chkbox15,
                        'cm_non_calcified_pleural_fibrosos' => $request->chkbox16,
                        'cm_interstltial_fbrosos' => $request->chkbox17,
                        'cm_any_cavitating_lesion' => $request->chkbox18,
                        'cm_skeleton_soft_issue' => $request->chkbox19,
                        'cm_cardiac_major_vessels' => $request->chkbox20,
                        'cm_lung_fields' => $request->chkbox21,
                        'cm_other' => $request->chkbox22,
                        'cm_dpp_comment' => $request->dppcomment,
                        'cm_rad_comment' => $request->radcomment,
                        'cm_cxray' => $request->CXRay,
                        'Cby' => $cby,
                        'Cdate' => $cdate,

                        'cm_hiv_1' => $request->chkbox70,
                        'cm_hiv_2' => $request->chkbox71,
                        'cm_hiv_3' => $request->chkbox72,
                        'cm_hiv_4_1' => $request->chkbox73,
                        'cm_hiv_4_2' => $request->chkbox74,
                        'cm_hiv_5_0' => $request->chkbox75,
                        'cm_hiv_5_1' => $request->chkbox76,
                        'cm_hiv_6' => $request->chkbox77,
                        'cm_hiv_7' => $request->chkbox78,
                        'cm_hiv_8' => $request->chkbox79,
                        'cm_hiv_9_0' => $request->chkbox80,
                        'cm_hiv_9_1' => $request->chkbox81,
                        'cm_hiv_10' => $request->chkbox82,
                        'cm_hiv_11' => $request->chkbox83,
                        'cm_hiv_12' => $request->chkbox84,
                        'cm_hiv_13' => $request->chkbox85,

                        'cm_Malaria_14' => $request->chkbox86,
                        'cm_Malaria_15' => $request->chkbox87,
                        'cm_Malaria_16' => $request->chkbox88,
                        'cm_Malaria_17' => $request->chkbox89,
                        'cm_Malaria_18' => $request->chkbox90,
                        'cm_Malaria_19' => $request->chkbox91,
                        'cm_Malaria_20' => $request->chkbox92,

                        'cm_Filaria_21' => $request->chkbox93,
                        'cm_Filaria_22' => $request->chkbox94,
                        'cm_Filaria_23' => $request->chkbox95,
                        'cm_Filaria_24' => $request->chkbox96,
                        'cm_Filaria_25' => $request->chkbox97,
                        'cm_Filaria_26' => $request->chkbox78,
                    ]
                );

                $counterNoRecord = DB::table('mhac_counters')
                ->where('id', $counterid)
                ->value('counter_no');
        
                DB::table('mhac_temp_table')
                ->where('appointment_no', $appno)
                ->update(['doctor_status' => 5]);
    
            $GetTokenNo = DB::table('mhac_temp_table')
                ->select('token_no')
                ->where('appointment_no', $appno)
                ->where('floor', '=', Session::get('Floor'))
                ->first();
    
            $Tok = $GetTokenNo->token_no;
    
            $GetTokenNoCount = DB::table('mhac_temp_table')
                ->where('token_no', $Tok)
                ->where('floor', '=', Session::get('Floor'))
                ->count();
            // dd($GetTokenNoCount);
            $GetTokenNoCount1 = DB::table('mhac_temp_table')
                ->where('token_no', $Tok)
                ->where('floor', '=', Session::get('Floor'))
                ->where('doctor_status', 5)
                ->count();
    
            if ($GetTokenNoCount == $GetTokenNoCount1) {
                DB::table('mhac_temp_table')
                    ->where('token_no', $Tok)
                    ->where('floor', '=', Session::get('Floor'))
                    ->update(['doctor_status' => 4]);
            }
            
    
            //update mhac_audittrail table
             DB::table('mhac_audittrail')
                    ->where('appno', $appno)
                    ->update(['doctor' => date("Y-m-d H:i:s"), 'doctor_user' => strval(Auth::id()), 'doctor_room' => $counterNoRecord]);    
    
                return response()->json(['Done']);
        }else if ($command === 'generateCard') {
            $appointmentno = $request->appNo;

            $memberDetails = DB::table('tbl_consultation_main')
                ->where('cm_app_no', $appointmentno)
                ->get();
    
            $date = date('Y-m-d');
    
            $pdf = PDF::loadView('pagesmhac.DetailCard', compact('memberDetails', 'date'));
            return $pdf->stream('card.pdf');
        
            $appointmentno = $request->appNo;

            $memberDetails = DB::table('mhac_temp_table')
            ->join('mhac_appointments', 'mhac_temp_table.appointment_no', '=', 'mhac_appointments.appointment_no')
            ->join('mhac_doctorroom', 'mhac_temp_table.appointment_no', '=', 'mhac_doctorroom.cm_app_no')
            ->where('mhac_temp_table.appointment_no', $appointmentno)
            ->get();


            $pdf = PDF::loadView('pagesmhac.Certificate2', compact('memberDetails'));
            return $pdf->stream('summary.pdf');
        }else if ($command === 'ConsultationLoadTestResults') {
            $appointment = $request->appointment;

                $rowCountConfirmatory = DB::table('mhac_phlebotomy')
                    ->select('appointment_no')
                    ->where('appointment_no', $appointment)
                    ->count();

                if ($rowCountConfirmatory == 0) {

                    $res = DB::table('mhac_phlebotomy')
                        ->where('appointment_no', $appointment)
                        ->get();


                    $res2 = DB::table('mhac_test_results')
                        ->where('appointment_no', $appointment)
                        ->get();

                    
                } else {

                    $res = DB::table('mhac_phlebotomy')
                        ->where('appointment_no', $appointment)
                        ->get();


                    $res2 = DB::table('mhac_test_results')
                        ->where('appointment_no', $appointment)
                        ->get();
                }

                return response()->json(['result' => $res, 'result2' => $res2]);
        }else if ($command == 'LoadSputumPatient') {

            $PP = $request->PP;
            $AP = $request->AP;

            $data = DB::table('mhac_temp_table')
                ->join('mhac_appointments', 'mhac_temp_table.appointment_no', '=', 'mhac_appointments.appointment_no')
                ->where('mhac_temp_table.passport_no', '=', $PP)
                ->orWhere('mhac_temp_table.appointment_no', '=', $AP)
                ->get();

            return response()->json(['result' => $data]);
        }else if ($command == 'ConsultationLoadChkbox') {

            $AppNo = $request->AppNo;

    
            $result2 = DB::table('mhac_doctorroom')
                ->where('cm_app_no', $AppNo)
                ->get();
    
            return response()->json(['result2' => $result2]);
        }else if ($command == 'updateTestResults') {

            $serial = $request->serial;
            $name = $request->name;
            $comment = $request->comment;

            if($name == "HIV"){
                DB::table('mhac_test_results')
                ->where('id', $serial)
                ->update(['hiv_remark' => $comment]);

                return response()->json('Done');
            }else if($name == "Filaria"){
                DB::table('mhac_test_results')
                ->where('id', $serial)
                ->update(['filaria_remark' => $comment]);

                return response()->json('Done');
            }else if($name == "Malaria"){
                DB::table('mhac_test_results')
                ->where('id', $serial)
                ->update(['malaria_remark' => $comment]);

                return response()->json('Done');
            }else if($name == "SHCG"){
                DB::table('mhac_test_results')
                ->where('id', $serial)
                ->update(['shcg_remark' => $comment]);

                return response()->json('Done');
            }else if($name == "Urine"){
                DB::table('mhac_test_results')
                ->where('id', $serial)
                ->update(['urine_remark' => $comment]);

                return response()->json('Done');
            }
           
        }
    }

    public function generateSummaryReport(Request $request)
        {

            $appointmentno = $request->appNo;

            $memberDetails = DB::table('mhac_temp_table')
                ->join('mhac_appointments', 'mhac_temp_table.appointment_no', '=', 'mhac_appointments.appointment_no')
                ->join('mhac_doctorroom', 'mhac_temp_table.appointment_no', '=', 'mhac_doctorroom.cm_app_no')
                ->where('mhac_temp_table.appointment_no', $appointmentno)
                ->get();

        
            $pdf = PDF::loadView('pagesmhac.SummaryReport', compact('memberDetails'));
            return $pdf->stream('summary.pdf');
        }

    public function generateCertificate(Request $request)
        {
            $appointmentno = $request->appNo;

            $memberDetails = DB::table('mhac_temp_table')
            ->join('mhac_appointments', 'mhac_temp_table.appointment_no', '=', 'mhac_appointments.appointment_no')
            ->join('mhac_doctorroom', 'mhac_temp_table.appointment_no', '=', 'mhac_doctorroom.cm_app_no')
            ->where('mhac_temp_table.appointment_no', $appointmentno)
            ->get();

            $results = DB::table('mhac_test_results')
            ->where('appointment_no', $appointmentno)
            ->get();

            $DateOfBirth = DB::table('mhac_appointments')
            ->where('appointment_no', '=', $appointmentno)
            ->value('dob');


                //2018-04-08
                //explode the date to get month, day and year
                $birthDate = explode("-", $DateOfBirth);
                //get age from date or birthdate
                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
                    ? ((date("Y") - $birthDate[0]) - 1)
                    : (date("Y") - $birthDate[0]));

// dd($memberDetails);
        
            $pdf = PDF::loadView('pagesmhac.Certificate', compact('memberDetails' , 'age', 'results'));

            return $pdf->stream('certificate.pdf');
        }

    public function generateCertificate2(Request $request)
        {
            $appointmentno = $request->appNo;

            $memberDetails = DB::table('mhac_temp_table')
            ->join('mhac_appointments', 'mhac_temp_table.appointment_no', '=', 'mhac_appointments.appointment_no')
            ->join('mhac_doctorroom', 'mhac_temp_table.appointment_no', '=', 'mhac_doctorroom.cm_app_no')
            ->where('mhac_temp_table.appointment_no', $appointmentno)
            ->get();

            $results = DB::table('mhac_test_results')
            ->where('appointment_no', $appointmentno)
            ->get();

            $DateOfBirth = DB::table('mhac_appointments')
                ->where('appointment_no', '=', $appointmentno)
                ->value('dob');


            //2018-04-08
            //explode the date to get month, day and year
            $birthDate = explode("-", $DateOfBirth);
            //get age from date or birthdate
            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
                ? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));

        
            $pdf = PDF::loadView('pagesmhac.Certificate2', compact('memberDetails' , 'age' , 'results'));

            return $pdf->stream('certificate2.pdf');
        }
}
