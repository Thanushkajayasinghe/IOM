<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MhacTempTable extends Model
{
    protected $table = 'mhac_temp_table';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'appointment_no',
        'passport_no',
        'token_no',
        'floor',
        'registration_status',
        'registration_counter',
        'payment_status',
        'payment_counter',
        'vital_status',
        'vital_counter',
        'phlebotomy_status',
        'phlebotomy_counter',
        'cxr_status',
        'cxr_counter',
        'doctor_status',
        'doctor_counter',
        'cby',
        'cdate',
    ];


    public static function getFloorData($floor, $country)
    {
        if ($country == "0") {
            return self::where('floor', $floor)
                ->orderBy('token_no', 'asc')
                ->get();
        } else {
            return self::where('floor', $floor)
                ->where(DB::raw("substring(token_no from '^([^-]+)')"), $country)
                ->orderBy('token_no', 'asc')
                ->get();
        }
    }

    public static function updateQueueStatus($appno, $type, $stat, $val)
    {
        $column = '';

        switch ($type) {
            case 'reg':
                $column = ($stat == 'status') ? 'registration_status' : 'registration_counter';
                break;
            case 'vital':
                $column = ($stat == 'status') ? 'vital_status' : 'vital_counter';
                break;
            case 'cxr':
                $column = ($stat == 'status') ? 'cxr_status' : 'cxr_counter';
                break;
            case 'phl':
                $column = ($stat == 'status') ? 'phlebotomy_status' : 'phlebotomy_counter';
                break;
            case 'doc':
                $column = ($stat == 'status') ? 'doctor_status' : 'doctor_counter';
                break;
            default:
                break;
        }

        if (!empty($column)) {
            DB::table('mhac_temp_table')
                ->where('appointment_no', $appno)
                ->update([$column => $val]);
        }

    }

    public static function getFloorDataWithTokenNo($floor, $country, $tokenNo)
    {
        if ($country == "0") {
            return self::where('floor', $floor)
                ->where('token_no', $tokenNo)
                ->orderBy('token_no', 'asc')
                ->get();
        } else {
            return self::where('floor', $floor)
                ->where('token_no', $tokenNo)
                ->where(DB::raw("substring(token_no from '^([^-]+)')"), $country)
                ->orderBy('token_no', 'asc')
                ->get();
        }
    }
}
