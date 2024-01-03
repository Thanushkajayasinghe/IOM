<?php

namespace App\Http\Controllers\Mhac;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAuditLogController extends Controller
{
    public function ViewpageLanding()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.userauditlog')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function LoadAuditLogData(Request $request)
    {

        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;

           $records = DB::table('mhac_userauditlog')
           ->select(
            'mhac_userauditlog.id as id',
            'users.id as userid',
            'users.name',
            'users.email',
            'mhac_counters.counter_name',
            'mhac_counters.counter_no',
            'mhac_counters.floor',
            'mhac_userauditlog.datetime'
        )
            ->join('users', 'mhac_userauditlog.userid', '=', 'users.id')
             ->join('mhac_counters', 'mhac_userauditlog.counter_id', '=', 'mhac_counters.id')
             ->whereRaw("DATE(mhac_userauditlog.datetime) BETWEEN '$dateFrom' AND '$dateTo'")
             ->get()
             ->toArray(); // Convert the collection to array

           

          // Return the result as JSON
            return response()->json(['result' => $records]);
       
    }

    public function LoadCurrentAuditLogData()
    {

          // Get the current date in the required format (assuming 'Y-m-d H:i:s' format)
    $currentDate = date('Y-m-d');
    $records = DB::table('mhac_userauditlog')
        ->select(
            'mhac_userauditlog.id as id',
            'users.id as userid',
            'users.name',
            'users.email',
            'mhac_counters.counter_name',
            'mhac_counters.counter_no',
            'mhac_counters.floor',
            'mhac_userauditlog.datetime'
        )
        ->join('users', 'mhac_userauditlog.userid', '=', 'users.id')
        ->join('mhac_counters', 'mhac_userauditlog.counter_id', '=', 'mhac_counters.id')
        ->whereRaw("DATE(mhac_userauditlog.datetime) = '$currentDate'")
        ->get()
        ->toArray(); // Convert the collection to array

    // Return the result as JSON
    return response()->json(['result' => $records]);
       
    }
}
?>
