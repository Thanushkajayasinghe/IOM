<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MhacAddLabTestResults extends Model
{
    public $timestamps = false;

    protected $table = 'mhac_phlebotomy';

    protected $fillable = [
        'appointment_no',
        'passport_no',
        'country',
        'floor',
        'barcode',
        'hiv',
        'filaria',
        'malaria',
        'shcg',
        'urine',
        'datetime',
        'cby',
        'cdate',
        'uby',
        'udate',
    ];


    public static function getAvailbleTestsPhelabotomy($barcode)
    {
        return self::where('barcode', $barcode)
            ->first();
    }

}
