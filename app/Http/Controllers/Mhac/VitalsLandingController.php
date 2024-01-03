<?php

namespace App\Http\Controllers\Mhac;

use Illuminate\Http\Request;
use App\Models\MhacAppointment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Picqer\Barcode\BarcodeGeneratorSVG;

class VitalsLandingController extends Controller
{

    public function ViewpageLanding()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pagesmhac.vitalslanding')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

   

   
}
