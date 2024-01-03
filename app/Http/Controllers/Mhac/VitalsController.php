<?php

namespace App\Http\Controllers\Mhac;

use DateTime;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VitalsController extends Controller
{
    
    public function ViewpageLanding()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.vitalslanding')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }
    //=================CRUD=====================================

    public function CRUD(Request $request)
    {
        $command = $request->command;

        if($command === 'pendingToken'){
            
            $counter = Session::get('counterid');
            $country = $request->country;
            $counterid = DB::table('mhac_counters')
            ->distinct()
            ->where('id', $counter)
            ->first();
            $counter_no = $counterid->counter_no;
           
            $token = DB::table('mhac_temp_table')
                ->distinct()
                ->where('registration_status', '=', 4)
                ->where('payment_status', '=', 4)
                ->where('vital_status', '=', 1)
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
                ->where('registration_status', 4)
                ->where('payment_status', 4)
                ->where('vital_status', 1)
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
                        ->update(['vital_status' => 2, 'vital_counter' => $counterNoRecord]);   
              
                
                    return response()->json([
                        'tokenName' => $token,
                        'appointmentNo' => $array,
                    ]);
                }
           
        
            // Return a default response if no token or token record found
            return response()->json(['tokenName' => null]);

        }  else if ($command === 'data') {

            $appointment = $request->appointment;
            
            $appdetails = DB::table('mhac_appointments')
            ->select('passport_no', 'dob')
            ->where('appointment_no', $appointment)
            ->get();

                //set user image///
            $getImage = DB::table('mhac_appointments')->select('image')->where('appointment_no', $appointment)->count();

            $image = '';

                $image = DB::table('mhac_appointments')->where('appointment_no', $appointment)->value('image');
          

            foreach ($appdetails as $appnodetails) {

                $arrappdetails[0] = $appointment;
                $arrappdetails[1] = $appnodetails->passport_no;
                $arrappdetails[2] = $appnodetails->dob;
                $arrappdetails[3] = $image;
            }

            return response()->json($arrappdetails);
            

        } else if ($command === 'notAvailable') {
            $token = $request->token;
            

            DB::table('mhac_temp_table')
                ->where('token_no', $token)
                ->update(['vital_status' => 3]);

            return response()->json(['Done']);
            

        } else if ($command == 'NoShowCount') {

            $floor = Session::get('Floor');
            $country =  $request->input('country');

            //retrieve  vitals status 2 /3
            $qry1 = DB::table('mhac_temp_table')
            ->select('token_no','vital_status')
            ->distinct('token_no')
            ->where([
                ['floor', $floor],
                ['registration_status', 4],
                ['payment_status', 4],
                [DB::raw("substring(token_no from '^([^-]+)')"), $country],
            
                ])
                ->whereIn('vital_status', [2, 3])
            ->get();

                $totresult = ($qry1)->count();

                return response()->json($totresult);

        } else if ($command === 'NoShowList') {
           
            $floor = Session::get('Floor');
            $country =  $request->input('country');

                $qry1 = DB::table('mhac_temp_table')
                ->select('token_no','vital_status')
                ->distinct('token_no')
                ->where([
                    ['floor', $floor],
                    ['registration_status', 4],
                    ['payment_status', 4],
                    [DB::raw("substring(token_no from '^([^-]+)')"), $country],
                
                    ])
                    ->whereIn('vital_status', [2, 3])
                ->get();
    
                $totresult = ($qry1);
    
    
                return response()->json(['result' => $totresult]);

        }else if ($command === 'CheckAppointmentAvailable') {

            $appNo = $request->appNo;
            $count = DB::table('mhac_temp_table')
            ->where('appointment_no', '=', $appNo)
            ->where('vital_status', '=', 5)
            ->count();
            $res = true;
            if ($count == 0) {
                    $res = false;
                }
            return response()->json(['result' => $res]);


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

        } else if ($command === 'save') {
        $token = $request->token;
        $appointmentno = $request->appointmentno;
        $passport_no = $request->passportno;
        $height = $request->height;
        $weight = $request->weight;
        $bp = $request->bp;
        $bmi = $request->bmi;
        $country =  $request->input('country');
        $cby = Auth::id();
        $dateTime = date('Y-m-d H:i:s');

        $counterid = Session::get('counterid');
        $floor = Session::get('Floor');

        //
        $counterNoRecord = DB::table('mhac_counters')
        ->where('id', $counterid)
        ->value('counter_no');

       

        DB::table('mhac_vitals')->updateOrInsert(
            ['appointment_no' => $appointmentno],
            [
                'passport_no' => $passport_no,
                'country' => $country,
                'height' => $height,
                'weight' => $weight,
                'bmi' => $bmi,
                'bloodpressure' => $bp,
                'cby' => $cby,
                'cdate' => $dateTime,
            ]
        );
        

        DB::table('mhac_temp_table')
            ->where('appointment_no', $appointmentno)
            ->update(['vital_status' => 5]);

        $GetTokenNo = DB::table('mhac_temp_table')
            ->select('token_no')
            ->where('appointment_no', $appointmentno)
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
            ->where('vital_status', 5)
            ->count();

        if ($GetTokenNoCount == $GetTokenNoCount1) {
            DB::table('mhac_temp_table')
                ->where('token_no', $Tok)
                ->where('floor', '=', Session::get('Floor'))
                ->update(['vital_status' => 4]);
        }
        

        //update mhac_audittrail table
         DB::table('mhac_audittrail')
                ->where('appno', $appointmentno)
                ->update(['vital' => date("Y-m-d H:i:s"), 'vital_user' => strval(Auth::id()), 'vital_counter' => $counterNoRecord]);    

            return response()->json(['Done']);

        }
}

}

    
?>
