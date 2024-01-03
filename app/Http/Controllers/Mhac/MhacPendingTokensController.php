<?php

namespace App\Http\Controllers\Mhac;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MhacPendingTokensController extends Controller
{
   //page view
   public function ViewpageLanding()
   {
       $readOnly = \Request::get('readOnly');
       $readWrite = \Request::get('readWrite');

       return view('pagesmhac.mhacpendingtokens')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
   }

   public function LoadMhacPendingTokens(Request $request)
   {
       
       $reg = "";
       $vitals = "";
       $cxr = "";
       $phl = "";
       $con = "";

       $reg = DB::table('mhac_temp_table')
       ->distinct()
       ->where('registration_status', '=', 1)
       ->get(['token_no']);

       $vitals = DB::table('mhac_temp_table')
         ->distinct()
         ->where('registration_status', '=', 4)
         ->where('payment_status', '=', 4)
         ->where('vital_status', '=', 1)
         ->get(['token_no']);

         $cxr = DB::table('mhac_temp_table')
         ->distinct()
         ->where('registration_status', '=', 4)
         ->where('payment_status', '=', 4)
         ->where('cxr_status', '=', 1)
         ->get(['token_no']);

         $phl = DB::table('mhac_temp_table')
        ->distinct()
        ->where('registration_status', '=', 4)
        ->where('payment_status', '=', 4)
        ->where('vital_status', '=', 4)
        ->where('phlebotomy_status', '=', 1)
        ->get(['token_no']);

        

        $con = DB::table('mhac_temp_table')
        ->distinct()
        ->where('cxr_status', '=', 4)
        ->where('doctor_status', '=', 1)
        ->where(function ($query) {
            $query->where(DB::raw("substring(token_no from '^([^-]+)')"), '=', 'UK')
                ->orWhere('phlebotomy_status', '=', 4);
        })
        ->get(['token_no']);
        
         return response()->json(['reg' => $reg, 'vitals' => $vitals, 'cxr' => $cxr, 'phl' => $phl, 'con' => $con]);
      
   }
}
