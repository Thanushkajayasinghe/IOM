<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MhacTestResults extends Model
{
    public $timestamps = false;

    protected $table = 'mhac_test_results';

    protected $fillable = [
        'appointment_no',
        'passport_no',
        'barcode',
        'hiv_result',
        'hiv_remark',
        'malaria_result',
        'malaria_remark',
        'filaria_result',
        'filaria_remark',
        'shcg_result',
        'shcg_remark',
        'urine_result',
        'urine_remark',
        'status',
        'cby',
        'cdate',
        'uby',
        'udate',
    ];


    public static function getCountIfTestAvailable($barcode)
    {
        return self::where('barcode', $barcode)
            ->count();
    }

    public static function getAvailbleTestsForApproval()
    {
        return self::where('status', 'Pending')
            ->get();
    }

    public static function approveTestResultsAvailable($tableArrayData)
    {
        foreach ($tableArrayData as $data) {
            $id = $data[0];

            $result = self::where('id', $id)
                ->update(
                    ['status' => 'Approved']
                );

            if ($result) {
                $updatedRow = self::find($id);
                $appointment_no = $updatedRow->appointment_no;

                DB::table('mhac_temp_table')
                    ->where('appointment_no', $appointment_no)
                    ->update(['phlebotomy_status' => 4]);

                DB::table('mhac_audittrail')
                    ->where('appno', $appointment_no)
                    ->update(['lab' => date("Y-m-d H:i:s")]);
            }
        }

        return true;
    }
}
