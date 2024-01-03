<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CounselingTABController extends Controller
{


    public function Alldata(Request $request)
    {
        $command = $request->command;

        if ($command == "save") {

            $reqArray = $request->arrayToSend;
//            $regno = $request->regno;
//            $remark = $request->txtremark;
//            $sin = $request->sin;
            $datetime = date('Y-m-d H:i:s');
            $Cby = Auth::id();

            $tableArrayData[] = array();
            $arrayData = json_decode($reqArray);
            $tableArrayData = $arrayData;


            foreach ($tableArrayData as $data) {
                $appno = $data[0];
                $RM = $data[1];
                $SIN = $data[2];

                DB::table('counselling_tab')->insert([
                    [
                        'registration_no' => $appno,
                        'remark' => $RM,
                        'signature' => $SIN,
                        'cby' => $Cby,
                        'created_at' => $datetime
                    ]
                ]);

                DB::table('temp_table')->where([
                    ['temp_app_no', '=', $appno]
                ])->update(['tab_no' => "0",'tab_status'=>'1','tab_complete_date'=>$datetime]);

            }


            return response()->json(['Done']);

        } else if ($command == "Load") {

            $Tabname = Session::get('userName');
//            $TAB_NO = str_replace('tab', '', $Tabname);
            $TAB_NO = $request->session()->get('userName');


            $resp = DB::table('temp_table')
                ->leftJoin('register_applicant_details', 'temp_table.temp_app_no', '=', 'register_applicant_details.AppointmentNumber')
                ->select('register_applicant_details.*')
                ->where([
                    ['temp_table.tab_no', '=', $TAB_NO],
                    ['temp_table.temp_counsel', '=', '5'],
                ])
//                ->orderBy('register_applicant_details.AppointmentNumber', 'asc')
                ->get();

            return response()->json(['result' => $resp]);

        } else if ($command == "LoadProgress") {

            $TAB_NO = $request->session()->get('userName');


            $resp = DB::table('temp_table')
//                ->leftJoin('register_applicant_details', 'temp_table.temp_app_no', '=', 'register_applicant_details.AppointmentNumber')
//                ->select('register_applicant_details.*')
                ->where('temp_table.tab_no', $TAB_NO)
                ->where('temp_table.temp_counsel', 5)
                ->get();

            $tokenNO = 0;
            $resultTOT = 0;
            foreach ($resp as $user) {
                $resultTOT++;
                $tokenNO = $user->temp_token_no;
            }

//            $cou = DB::table('temp_table')
//                ->where([
//                    ['temp_table.temp_token_no', '=', $tokenNO]
//                ])->count();


            return response()->json(['result' => $resp,'cou'=> 1,'RTOT'=> $resultTOT]);

        }

    }


}
