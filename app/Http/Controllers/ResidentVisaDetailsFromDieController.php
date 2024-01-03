<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class ResidentVisaDetailsFromDieController extends Controller
{

    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.ResidentVisaDetailsFromDie')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);;
    }

    public function ResidentVisaDetails(Request $request)
    {
        $function = $request->function;
        $res = "";

        if ($function == "insert") {

            $date = $request->date;
            $passportNo = $request->passportNo;
            $firstName = $request->firstName;
            $lastName = $request->lastName;
            $country = $request->country;
            $visaNo = $request->visaNo;
            $visaIssueDate = $request->visaIssueDate;
            $datetime = date('Y-m-d H:i:s');

            $users = DB::table('resident_visa_details')->select('resident_visa_details_id')
                ->where([
                    ['passport_no', '=', $passportNo],
                    ['first_name', '=', $firstName],
                    ['last_name', '=', $lastName],
                    ['country', '=', $country],
                    ['visa_no', '=', $visaNo],
                    ['visa_issue_date', '=', $visaIssueDate]])->get();

            if ($users->isEmpty()) {

                DB::table('resident_visa_details')->insert([
                    ['date' => $date,
                        'passport_no' => $passportNo,
                        'first_name' => $firstName,
                        'last_name' => $lastName,
                        'country' => $country,
                        'visa_no' => $visaNo,
                        'visa_issue_date' => $visaIssueDate,
                        'created_at' => $datetime]
                ]);


            } else {

            }


            $res = true;
        } else if ($function == "loadTable") {

            $date = $request->date;

            $res = DB::table('resident_visa_details')->whereDate('date', '=', $date)->get();

        } else
            if ($function == "DeleteVisaDet") {
                $serial = $request->serial;

                $res = DB::table('resident_visa_details')->where('resident_visa_details_id', $serial)->delete();
            }


        return response()->json(['result' => $res]);
    }
}




