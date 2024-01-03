<?php

namespace App\Http\Controllers\Mhac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class MhacTokenIssueController extends Controller
{
    public function ViewpageLanding()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.mhactokenissue')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function AllFun(Request $request)
    {
        $function = $request->function;
        $tokenNo = '';
        // $result = null;
        if ($function == 'checkNo') {
            $appointOrPassportNo = $request->appointOrPassportNo;
            $currentDate = now()->toDateString();
            $currentDateTime = Carbon::now(); // Get the current date and time
            $thirtyMinutesBefore = $currentDateTime->subMinutes(30)->format('H:i:s'); // 30 minutes before the current time

            $result = DB::table('mhac_appointments')
                ->where(function ($query) use ($appointOrPassportNo) {
                    $query->where('appointment_no', $appointOrPassportNo)
                        ->orWhere('passport_no', $appointOrPassportNo);
                })
                ->orderBy('cdate', 'desc') // Order by the entry timestamp in descending order
                ->first();
            if (!$result) {
                return response()->json([
                    'result' => true,
                    'message' => '0'

                ]);
            }
            if ($result) {
                if ($result->member_type != 'MainMember') {
                    return response()->json([
                        'result' => true,
                        'message' => '1'

                    ]);
                }
                if ($result->appointment_date != $currentDate) {
                    return response()->json([
                        'result' => true,
                        'message' => '2'

                    ]);
                }
                $todaytime = date('H:i:s');
                $interval = strtotime($result->appointment_time) - strtotime($todaytime);
                if ((0 <= ($interval / 60)) && (($interval / 60) >= 30)) {
                    // return response()->json(["You can obtain the token with 30 min ", '0']);
                    return response()->json([
                        'result' => true,
                        'message' => '3'

                    ]);
                } else {
                    $maxSerial = DB::table('mhac_temp_table')
                        ->leftJoin('mhac_appointments', function ($join) use ($appointOrPassportNo) {
                            $join->on('mhac_temp_table.appointment_no', '=', 'mhac_appointments.appointment_no')
                                ->orWhere('mhac_temp_table.passport_no', '=', 'mhac_appointments.passport_no');
                        })
                        ->where('mhac_appointments.country', $result->country)
                        ->where('mhac_temp_table.floor', Session::get('Floor'))
                        // ->where(function ($query) use ($appointOrPassportNo) {
                        //     $query->where('mhac_temp_table.appointment_no', $appointOrPassportNo)
                        //         ->orWhere('mhac_temp_table.passport_no', $appointOrPassportNo);
                        // })
                        ->select(DB::raw('COALESCE(MAX(mhac_temp_table.id), 0) as max_id'))
                        ->value('max_id');
                    $countryAndToken = DB::table('mhac_temp_table')
                        ->where('id', $maxSerial)
                        ->first();
                    $newTokenNo = 0;
                    if ($countryAndToken) {
                        $tokenParts = explode('-', $countryAndToken->token_no);
                        $newTokenNo = (int) $tokenParts[1] + 1;
                    }
                    if (!$countryAndToken) {
                        $newTokenNo = 1;
                    }
                    $country = $result->country;
                    $floor = Session::get('Floor');
                    $tokenNo = $country . '-' . $newTokenNo;
                    $checkapporPassportNoExsited = DB::table('mhac_temp_table')
                        ->where(function ($query) use ($appointOrPassportNo) {
                            $query->where('appointment_no', $appointOrPassportNo)
                                ->orWhere('passport_no', $appointOrPassportNo);
                        })
                        ->first();
                    if (!$checkapporPassportNoExsited) {
                        $mainMember = DB::table('mhac_appointments')
                            ->where('passport_no', $appointOrPassportNo)
                            ->first();
                            if($mainMember){
                                $tokenissues = DB::table('mhac_appointments')
                                ->where(function ($query) use ($appointOrPassportNo, $mainMember) {
                                    $query->where('main_mem_app_no', $appointOrPassportNo)
                                        ->orWhere('main_mem_app_no', $mainMember->main_mem_app_no);
                                })
                                ->get();
                            }
                        
                            if(!$mainMember){
                              $tokenissues = DB::table('mhac_appointments')
                            ->where(function ($query) use ($appointOrPassportNo) {
                                $query->where('main_mem_app_no', $appointOrPassportNo);
                                  
                            })
                            ->get();
                            }
                       

                        $memberCount = DB::table('mhac_appointments')
                            ->where(function ($query) use ($appointOrPassportNo) {
                                $query->where('appointment_no', $appointOrPassportNo)
                                    ->orWhere('passport_no', $appointOrPassportNo);
                            })
                            ->value('no_members');
                        ///   dd( $memberCount);
                        if ($memberCount == 1) {
                            DB::table('mhac_temp_table')->insert([
                                'appointment_no' => $result->appointment_no, // Assuming appointment_no is a string
                                'passport_no' => $result->passport_no,
                                'token_no' => $tokenNo,
                                'floor' => Session::get('Floor'),
                                'registration_status' => 1,
                                'registration_counter' => 0,
                                'payment_status' => 1,
                                'payment_counter' => 0,
                                'vital_status' => 1,
                                'vital_counter' => 0,
                                'phlebotomy_status' => 1,
                                'phlebotomy_counter' => 0,
                                'cxr_status' => 1,
                                'cxr_counter' => 0,
                                'doctor_status' => 1,
                                'doctor_counter' => 0,
                                'cby' => Session::get('id'), //     $CBy = Session::get('id');
                                'cdate' => now(),
                            ]);
                        }
                        if ($memberCount > 1) {
                            foreach ($tokenissues as $tokenissue) {
                                DB::table('mhac_temp_table')->insert(
                                    [

                                        'appointment_no' => $tokenissue->appointment_no, // Assuming appointment_no is a string
                                        'passport_no' => $tokenissue->passport_no,
                                        'token_no' => $tokenNo,
                                        'floor' => Session::get('Floor'),
                                        'registration_status' => 1,
                                        'registration_counter' => 0,
                                        'payment_status' => 1,
                                        'payment_counter' => 0,
                                        'vital_status' => 1,
                                        'vital_counter' => 0,
                                        'phlebotomy_status' => 1,
                                        'phlebotomy_counter' => 0,
                                        'cxr_status' => 1,
                                        'cxr_counter' => 0,
                                        'doctor_status' => 1,
                                        'doctor_counter' => 0,
                                        'cby' => Session::get('id'), //     $CBy = Session::get('id');
                                        'cdate' => now(),
                                    ]
                                );
                            }

                        }

                        return response()->json([
                            'result' => true,
                            'message' => '4',
                            'token_number' => $tokenNo,

                        ]);
                    } else {
                        return response()->json([
                            'result' => true,
                            'message' => '5',
                            'token_number' => $tokenNo,

                        ]);
                    }

                }

            }
        }
        if ($function == 'printNo') {
            $appointOrPassportNo = $request->appointOrPassportNo;
            $result = DB::table('mhac_appointments')
                ->where(function ($query) use ($appointOrPassportNo) {
                    $query->where('appointment_no', $appointOrPassportNo)
                        ->orWhere('passport_no', $appointOrPassportNo);
                })
                ->first();
            return response()->json([
                'result' => true,
                'message' => '7',
                'token_number' => $tokenNo,
                'appoinment_time' => $result->appointment_time,
                'appoinment_date' => $result->appointment_date,
                'floor' => Session::get('Floor'),
                'issue_time' => date('H:i:s')

            ]);
        }

    }






}
?>