<?php

namespace App\Http\Controllers\Mhac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateAppointmentController extends Controller
{
    public function ViewPageLanding()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.updateappointmentlanding')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.makeappointment')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }
}
