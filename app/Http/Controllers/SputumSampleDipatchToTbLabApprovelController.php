<?php
/**
 * Created by PhpStorm.
 * User: Nishantha
 * Date: 1/31/2019
 * Time: 3:40 PM
 */

namespace App\Http\Controllers;

use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SputumSampleDipatchToTbLabApprovelController extends Controller
{

    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.SputumSampleDipatchToTbLabApprovel')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function VeryfyAllData(Request $request)
    {
        $funtion = $request->funtion;

        if ($funtion == "Load") {

            $FromDate = $request->FromDate;
            $ToDate = $request->ToDate;
            $SearchVeryfyAll = DB::table('dispatch_to_tb_lab')
                ->select(
                    'dispatch_to_tb_lab.dtblabid',
                    'dispatch_to_tb_lab.samplecollectiondate',
                    'dispatch_to_tb_lab.barcode'
                )
                ->whereBetween('dispatch_to_tb_lab.samplecollectiondate', [$FromDate, $ToDate])
                ->where('dispatch_to_tb_lab.status', 'Verify')
                ->get();
            return response()->json(['result' => $SearchVeryfyAll]);

        } else if ($funtion == "approval") {

            //get Array
            $approval_Cby = Auth::id();
            $approveDate = $request->approveDate;
            $approveTime = $request->approveTime;
            $reqArray = $request->arrayToSend;
            $tableArrayData[] = array();
            $arrayData = json_decode($reqArray);
            $tableArrayData = $arrayData;
            //////////////////////////
            $datetime = date('Y-m-d H:i:s');


            foreach ($tableArrayData as $data) {
                $id = $data[0];

                DB::table('dispatch_to_tb_lab')->where('dtblabid', $id)->update(
                    [
                        'status' => 'Approval',
                        'approvaldate' => $approveDate,
                        'approvaltime' => $approveTime,
                        'approval_Cby' => $approval_Cby,
                        'updated_at' => $datetime
                    ]
                );
            }
            return response()->json(['result' => true]);

        } else if ($funtion == "printtbl") {

            $FromDate = $request->FromDate;
            $ToDate = $request->ToDate;
            $SearchVeryfyAll = DB::table('dispatch_to_tb_lab')
                ->select(
                    'dispatch_to_tb_lab.dtblabid',
                    'dispatch_to_tb_lab.samplecollectiondate',
                    'dispatch_to_tb_lab.barcode'
                )
                ->whereBetween('dispatch_to_tb_lab.samplecollectiondate', [$FromDate, $ToDate])
                ->where('dispatch_to_tb_lab.status', 'Verify')
                ->get();


            $pdf = PDF::loadView('pages.SputumSampleDispatchApprovalPrintPage', compact('SearchVeryfyAll'));
            return $pdf->stream('SPUTUM_SAMPLE_DISPATCH_APPROVAL.pdf');
//            return response()->json([ 'result'=>$SearchVeryfyAll ]);

        }
    }

    ////////////////////////////////////////////////////////////////////////////////////
//SearchVeryfyAll
//    public function SearchVeryfyAll(Request $request){
//
//        $FromDate = $request->FromDate;
//        $ToDate = $request->ToDate;
//        $SearchVeryfyAll = DB::table('dispatch_to_tb_lab')
//            ->select(
//                'dispatch_to_tb_lab.dtblabid',
//                'dispatch_to_tb_lab.samplecollectiondate',
//                'dispatch_to_tb_lab.barcode'
//             )
//            ->whereBetween('dispatch_to_tb_lab.samplecollectiondate', [$FromDate, $ToDate])
//            ->where('dispatch_to_tb_lab.status','Verify')
//            ->get();
//        return response()->json([ 'result'=>$SearchVeryfyAll ]);
//
//    }
//
//    public function Approve(Request $request){
//        //get Array
//        $approval_Cby=Auth::id();
//        $approveDate=$request->approveDate;
//        $approveTime=$request->approveTime;
//        $reqArray = $request->arrayToSend;
//        $tableArrayData[] = array();
//        $arrayData = json_decode($reqArray);
//        $tableArrayData = $arrayData;
//        //////////////////////////
//        $datetime = date('Y-m-d H:i:s');
//
//
//        foreach ($tableArrayData as $data) {
//                $id = $data[0];
//
//            DB::table('dispatch_to_tb_lab')->where('dtblabid', $id)->update(
//                [
//                    'status' => 'Approval',
//                    'approvaldate'=>$approveDate,
//                    'approvaltime'=>$approveTime,
//                    'approval_Cby'=>$approval_Cby,
//                    'updated_at'=>$datetime
//                 ]
//            );
//        }
//        return response()->json(['result' => true]);
//    }
}