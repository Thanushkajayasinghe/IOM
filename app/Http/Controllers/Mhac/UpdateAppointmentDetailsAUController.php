<?php

/**
 * Created by PhpStorm.
 * User: Nishantha
 * Date: 1/29/2019
 * Time: 10:22 AM
 */

namespace App\Http\Controllers\Mhac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UpdateAppointmentDetailsAUController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.changeupdateappointmentdetailsau')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function lodeAllMainApplicantAppoimentNumbers(Request $request)
    {
        $keyword = $request->search;

        $resp = DB::table('mhac_appointments')
            ->select('appointment_no', 'id')
            ->where([
                ['member_type', '=', 'MainMember'],
                ['country', '=', 'AU'],
            ])
            ->where('appointment_no', 'like', '%' . $keyword . '%')
            ->orderBy('appointment_no', 'asc')
            ->get();

        return response()->json($resp);
    }

    public function LodeDetailsAppnoWise(Request $request)
    {
        $appoinmentNo = $request->appoinmentNo;

        $registerApplicantsDetails = DB::table('mhac_appointments')
            ->where('appointment_no', $appoinmentNo)
            ->get();

        $id = $registerApplicantsDetails[0]->id;

        $registerApplicantsDetailsmember = DB::table('mhac_appointments')
        ->where('main_mem_app_no', $appoinmentNo)
        ->where('member_type', "OtherMember")
        ->get();

        // $id = $registerApplicantsDetails[0]->id;

        return response()->json(['registerApplicantsDetails' => $registerApplicantsDetails,'registerApplicantsmemberDetails' => $registerApplicantsDetailsmember]);
    }

  

    public function Update(Request $request)
    {
        $mainMemData = $request->input('mainMemData');
        $otherMemData = $request->input('otherMemData');

        $apponmentNo = $mainMemData['applinmentNo'];
        // $memberCount = $mainMemData['memberCount'];
        // $memType = $mainMemData['memType'];
        $passportNo = $mainMemData['passportNo'];

        $title = $mainMemData['title'];
        $firstName = $mainMemData['firstName'];
        $lastName = $mainMemData['lastName'];
        $dob = $mainMemData['dob'];
        $gender = $mainMemData['gender'];
        $medicalReq = $mainMemData['medicalReq'];
        $email = $mainMemData['email'];

        $mainAddLine1 = $mainMemData['mainAddLine1'];
        $mainAddLine2 = $mainMemData['mainAddLine2'];
        $mainCity = $mainMemData['mainCity'];
        $mainPostalCode = $mainMemData['mainPostalCode'];
        $mainContactNoHome = $mainMemData['mainContactNoHome'];
        $mainContactNoMobile = $mainMemData['mainContactNoMobile'];

        $uby = Auth::id();
        $dateTime = date('Y-m-d H:i:s');

        DB::table('mhac_appointments')->where('appointment_no',  $apponmentNo)->update(
            [
                'title' => $title,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'dob' => $dob,
                'gender' => $gender,
                'passport_no' => $passportNo,
                'address1' => $mainAddLine1,
                'address2' => $mainAddLine2,
                'city' => $mainCity,
                'postal_code' => $mainPostalCode,
                'contact_no_land' => $mainContactNoHome,
                'contact_no_mobile' => $mainContactNoMobile,
                'special_needs' => $medicalReq,
                'email' => $email,
                'uby' => $uby,
                'udate' => $dateTime,
            ]
        );

        DB::table('mhac_temp_table')->where('appointment_no',  $apponmentNo)->update(
            [
                'passport_no' => $passportNo,
            ]
            );

        if (!empty($otherMemData)) {

            
            foreach ($otherMemData as $row) {

                $id = $row['id'];
                $titleO = $row['title'];
                $firstNameO = $row['firstName'];
                $lastNameO = $row['lastName'];
                $dobO = $row['dob'];
                $genderO = $row['gender'];
                $passportNoO = $row['passportNo'];
                
                // Update mhac_appointments table
                DB::table('mhac_appointments')
                ->where('id', $id)
                ->update([
                    'title' => $titleO,
                    'first_name' => $firstNameO,
                    'last_name' => $lastNameO,
                    'dob' => $dobO,
                    'gender' => $genderO,
                    'passport_no' => $passportNoO,
                    'uby' => $uby,
                    'udate' => $dateTime,
                ]);

                // Update mhac_temp_table based on the mhac_appointments table
                DB::table('mhac_temp_table')
                ->join('mhac_appointments', 'mhac_appointments.appointment_no', '=', 'mhac_temp_table.appointment_no')
                ->where('mhac_appointments.id', $id)
                ->update([
                    'mhac_temp_table.passport_no' => $passportNoO,
                ]);
        
            }
        }
        return response()->json(['result' => true, 'appointmentno' => $apponmentNo]);

    }

}
