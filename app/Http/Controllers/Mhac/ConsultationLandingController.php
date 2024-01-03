<?php

namespace App\Http\Controllers\Mhac;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsultationLandingController extends Controller
{
    public function ViewPageLanding()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.consultationlanding')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

}
