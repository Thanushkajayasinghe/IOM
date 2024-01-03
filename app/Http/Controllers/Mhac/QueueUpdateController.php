<?php

namespace App\Http\Controllers\Mhac;

use Illuminate\Http\Request;
use App\Models\MhacTempTable;
use App\Http\Controllers\Controller;

class QueueUpdateController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.queueupdate')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function LoadMhacQueueUpdateData(Request $request)
    {
        $floor = $request->floor;
        $country = $request->country;

        $result = MhacTempTable::getFloorData($floor, $country);

        if (!empty($result)) {
            return response()->json(['result' => $result]);
        } else {
            return response()->json(false);
        }
    }

    public function UpdateStatusQueueUpdate(Request $request)
    {
        $appno = $request->appno;
        $type = $request->type;
        $stat = $request->stat;
        $val = $request->val;

        $result = MhacTempTable::updateQueueStatus($appno, $type, $stat, $val);
        return response()->json($result);
    }

    public function LoadMhacQueueUpdateDataPerToken(Request $request)
    {
        $floor = $request->floor;
        $country = $request->country;
        $tokenNo = $request->tokenNo;

        $result = MhacTempTable::getFloorDataWithTokenNo($floor, $country, $tokenNo);

        if (!empty($result)) {
            return response()->json(['result' => $result]);
        } else {
            return response()->json(false);
        }
    }
}
