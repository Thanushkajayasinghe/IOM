<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use PDF;

class ViewHistoryController extends Controller
{

    public function GetAppointmentNoFromPassport(Request $request)
    {
        $passport = $request->passport;

        $data = DB::table('temp_new')
            ->where('temp_passport', '=', $passport)
            ->get();

        return response()->json(['result' => $data]);
    }
}
