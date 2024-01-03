<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $allPages = \Request::get('pages');

        return view('pages.home1');
    }

    public function generatePDF()
    {
        $data = DB::table('register_applicant_details')->get();
        $title = date('Y-m-d');

        $pdf = PDF::loadView('pages.myPDF', compact('data', 'title'));
        return $pdf->stream('firstPdf.pdf');
    }
}
