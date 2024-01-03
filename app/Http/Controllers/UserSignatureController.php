<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSignatureController extends Controller
{

    public function Viewpage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.UserSignature')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function AllData(Request $request)
    {
        $function = $request->command;

        if ($function == 'Verify') {

            $UN = $request->UN;
            $PW = $request->PW;

            $credentials = array(
                'email' => $UN,
                'password' => $PW
            );

            if (Auth::attempt($credentials)) {
                return response()->json(['result' => true]);
            } else {
                return response()->json(['result' => false]);
            }
        } else if ($function == 'Save') {
            $UN = $request->UN;
            $sign = $request->sign;

            DB::table('users')
                ->where('email', '=', $UN)
                ->update(['signature' => $sign]);
            return response()->json(['result' => true]);
        }
    }

}
