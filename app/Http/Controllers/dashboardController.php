<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function LoadData(Request $request)
    {
        if ($request->command === 'countryChart') {

            $data = DB::table('tbl_registration')
                ->join('register_applicant_details', 'register_applicant_details.AppointmentNumber', '=', 'tbl_registration.reg_app_no')
                ->join('register_applicants', 'register_applicants.id', '=', 'register_applicant_details.FkId')
                ->select('register_applicants.CountryOfOrigin', DB::raw('count("register_applicants"."CountryOfOrigin") as count'))
                ->whereNotNull('register_applicants.CountryOfOrigin')
                ->groupBy('register_applicants.CountryOfOrigin')
                ->get();

            return response()->json($data);

        } elseif ($request->command == 'todayQueue') {

            $today = date("Y-m-d");
            $data = DB::table('appointment_cancel_and_reschedule_availability')
                ->select(DB::raw('count("date") as countTodayQueue'))
                ->whereDate('date', '=', $today)
                ->get();

            return response()->json(['result' => $data]);

        } elseif ($request->command == 'currentlyIssuedForToday') {

            $data = DB::table('temp_table')
                ->distinct()
                ->count(['temp_token_no']);

            return response()->json(['result' => $data]);

        } elseif ($request->command == 'currentlyServedForToday') {

            $data = DB::table('temp_table')
                ->distinct()
                ->where('temp_consult', 4)
                ->count(['temp_token_no']);

            return response()->json(['result' => $data]);

        } elseif ($request->command == 'notAvailableList') {

            $data = DB::table('temp_table')
                ->distinct()
                ->where('temp_reg', 3)
                ->count(['temp_token_no']);

            return response()->json(['result' => $data]);

        } elseif ($request->command == 'registrationCountersCurrentTokens') {

            $counter1 = DB::table('temp_table')
                ->where('temp_reg', 2)
                ->where('temp_reg_counter', 2)
                ->value('temp_token_no');

            $counter2 = DB::table('temp_table')
                ->where('temp_reg', 2)
                ->where('temp_reg_counter', 3)
                ->value('temp_token_no');

            $counter3 = DB::table('temp_table')
                ->where('temp_reg', 2)
                ->where('temp_reg_counter', 4)
                ->value('temp_token_no');

            $counter4 = DB::table('temp_table')
                ->where('temp_reg', 2)
                ->where('temp_reg_counter', 5)
                ->value('temp_token_no');

            $counter5 = DB::table('temp_table')
                ->where('temp_reg', 2)
                ->where('temp_reg_counter', 6)
                ->value('temp_token_no');

            $counter6 = DB::table('temp_table')
                ->where('temp_reg', 2)
                ->where('temp_reg_counter', 7)
                ->value('temp_token_no');

            return response()->json(['counter1' => $counter1, 'counter2' => $counter2, 'counter3' => $counter3, 'counter4' => $counter4, 'counter5' => $counter5, 'counter6' => $counter6]);

        } elseif ($request->command == 'counsellingCountersCurrentTokens') {

            $counter1 = DB::table('temp_table')
                ->distinct()
                ->where(function ($query) {
                    $query->where('temp_counsel', '=', 2)
                        ->orWhere('temp_counsel', '=', 5);
                })
                ->where('temp_counsel_counter', 8)
                ->get(['temp_token_no'])
                ->implode('temp_token_no', ', ');

            $counter2 = DB::table('temp_table')
                ->distinct()
                ->where(function ($query) {
                    $query->where('temp_counsel', '=', 2)
                        ->orWhere('temp_counsel', '=', 5);
                })
                ->where('temp_counsel_counter', 9)
                ->get(['temp_token_no'])
                ->implode('temp_token_no', ', ');

            return response()->json(['counter1' => $counter1, 'counter2' => $counter2]);

        } elseif ($request->command == 'cxrCountersCurrentTokens') {

            $counter1 = DB::table('temp_table')
                ->where('temp_cxr', 2)
                ->where('temp_cxr_counter', 10)
                ->value('temp_token_no');

            $counter2 = DB::table('temp_table')
                ->where('temp_cxr', 2)
                ->where('temp_cxr_counter', 11)
                ->value('temp_token_no');

            return response()->json(['counter1' => $counter1, 'counter2' => $counter2]);

        } elseif ($request->command == 'phlebotomyCountersCurrentTokens') {

            $counter1 = DB::table('temp_table')
                ->where('temp_phlebotomy', 2)
                ->where('temp_phlebotomy_counter', 12)
                ->value('temp_token_no');

            $counter2 = DB::table('temp_table')
                ->where('temp_phlebotomy', 2)
                ->where('temp_phlebotomy_counter', 13)
                ->value('temp_token_no');

            return response()->json(['counter1' => $counter1, 'counter2' => $counter2]);

        } elseif ($request->command == 'consultationCountersCurrentTokens') {

            $counter1 = DB::table('temp_table')
                ->where('temp_consult', 2)
                ->where('temp_consult_counter', 14)
                ->value('temp_token_no');

            $counter2 = DB::table('temp_table')
                ->where('temp_consult', 2)
                ->where('temp_consult_counter', 15)
                ->value('temp_token_no');

            $counter3 = DB::table('temp_table')
                ->where('temp_consult', 2)
                ->where('temp_consult_counter', 16)
                ->value('temp_token_no');

            $counter4 = DB::table('temp_table')
                ->where('temp_consult', 2)
                ->where('temp_consult_counter', 17)
                ->value('temp_token_no');

            return response()->json(['counter1' => $counter1, 'counter2' => $counter2, 'counter3' => $counter3, 'counter4' => $counter4]);

        }
    }
}
