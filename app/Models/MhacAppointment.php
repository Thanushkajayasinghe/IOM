<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MhacAppointment extends Model
{
    public $timestamps = false;

    protected $table = 'mhac_appointments';

    protected $fillable = [
        'application_type',
        'no_members',
        'member_type',
        'appointment_no',
        'passport_no',
        'main_mem_app_no',
        'country',
        'appointment_date',
        'appointment_time',
        'appointment_status',
        'title',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'nationality',
        'email',
        'address1',
        'address2',
        'city',
        'postal_code',
        'contact_no_land',
        'contact_no_mobile',
        'special_needs',
        'cby',
        'cdate',
        'uby',
        'udate',
    ];



    public static function getMemberCountForToday($appointmentDate)
    {
        return self::whereDate('appointment_date', $appointmentDate)
            ->where('member_type', 'MainMember')
            ->sum('no_members');
    }

    public static function generateAppointmentNo($countryCode, $memberCount)
    {
        $timestamp = date('Y-m-d  h:i:sa');
        //$digits = 10;
        //$randNo = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
        $timestampX = (strtotime($timestamp) * 1000);
        $appointmentNo = $timestampX . ($memberCount + 1);
        return $appointmentNo;
    }

    public static function getMemberCountForSelectedDateTime($date, $time, $country)
    {
        $results = self::whereDate('appointment_date', $date)
            ->where('member_type', 'MainMember')
            ->where('country', $country)
            ->where('appointment_time', $time)
            ->count('no_members');

        $resultsAll = self::whereDate('appointment_date', $date)
            ->where('member_type', 'MainMember')
            ->where('appointment_time', $time)
            ->count('no_members');

        $response = [
            'count' => $results,
            'allcountries' => $resultsAll,
        ];

        return $response;
    }

    public static function getAppointmentData($appointmentNo)
    {
        return self::where('appointment_no', $appointmentNo)->first();
    }

}
