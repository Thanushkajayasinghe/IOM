<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RePrintReportController extends Controller
{

    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.RePrintReport')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);;
    }

    public  function  Alldata(Request $request){

        $function = $request->function;

        if($function == "loadAppointments"){

            $list = DB::table('appointment_cancel_and_reschedule_availability')
                ->select("appointment_no")
                ->orderBy("appointment_no","asc")
                ->get();


            return response()->json(["result"=> $list]);

        }elseif ($function == "loadDetails"){

            $appno = $request->appno;

            $details = DB::table('appointment_cancel_and_reschedule_availability')
                -> leftJoin("register_applicant_details","register_applicant_details.AppointmentNumber","=","appointment_cancel_and_reschedule_availability.appointment_no")
                -> select("appointment_cancel_and_reschedule_availability.date","appointment_cancel_and_reschedule_availability.time","register_applicant_details.FirstName","register_applicant_details.LastName")
                -> where("appointment_cancel_and_reschedule_availability.appointment_no","=",$appno)
                -> get();

            return response()->json(["result" => $details]);


        }


    }

}
