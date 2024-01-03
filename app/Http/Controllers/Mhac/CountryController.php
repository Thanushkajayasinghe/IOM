<?php

namespace App\Http\Controllers\Mhac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CountryController extends Controller
{
    public function ViewpageLanding()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.country')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }
    public function AllFun(Request $request)
    { 
        $function = $request->function;

        if ($function == 'saveCountry') {
            $country = $request->country;
            $code = $request->code;
        
            // Check if the country name already exists
            $existingCountryName = DB::table('mhac_country')
               // ->where('country_name', $country)
                ->whereRaw('LOWER("country_name") = ?', [strtolower($country)])
                ->first();
            $existingCountryCode = DB::table('mhac_country')
           // ->where('code', '=', $code)
           ->whereRaw('LOWER("code") = ?', [strtolower($code)])
                ->first();    
        
            if ($existingCountryName) {
                // Country name already exists, return a response indicating the conflict
                return response()->json(['result' => false, 'message' => '1']);
            }
            if ($existingCountryCode) {
                return response()->json(['result' => false, 'message' => '2']);
            }
            // If the country name doesn't exist, proceed with the insertion
            $datetime = date('Y-m-d H:i:s');
            $createdBy = Session::get('id');
        
            DB::table('mhac_country')->insert(
                ['country_name' => $country, 'code' => $code, 'cby' => $createdBy, 'cdate' => $datetime]
            );
        
            return response()->json(['result' => true]);
        }
        
        
        elseif ($function == 'loadCountry') {

            $resp = DB::table('mhac_country')
                ->get();

            return response()->json(['result' => $resp]);
        }
        elseif ($function == 'deleteCountry') {
            $ID = $request->ID;
          //  dd($ID);
            DB::table('mhac_country')->where('id', $ID)->delete();
            $resp = DB::table('mhac_country')->get();
            return response()->json(['result' => $resp]);
        }
    }
}
