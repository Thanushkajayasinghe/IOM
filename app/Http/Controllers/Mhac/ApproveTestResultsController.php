<?php

namespace App\Http\Controllers\Mhac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MhacTestResults;

class ApproveTestResultsController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.approvetestresults')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function LoadApproveDataLabTestReults(Request $request)
    {
        $result = MhacTestResults::getAvailbleTestsForApproval();
        return response()->json(['results' => $result]);
    }

    public function ApproveTestResultsAvailable(Request $request)
    {
        $tableArrayData = json_decode($request->arrayToSend);

        $result = MhacTestResults::approveTestResultsAvailable($tableArrayData);

        return response()->json(['result' => $result]);
    }
}
