<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SputumCollectionListController extends Controller
{

    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.SputumCollectionList')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function loadSputumCollectionList(Request $request)
    {
        $res = DB::select("select coalesce(e.ps_hiv_barcode, e.ps_malaria_barcode, e.ps_filaria_barcode) as barcode, p.cm_app_no, p.cm_pass_no, s.\"FirstName\", s.\"LastName\", s.\"DateOfBirth\", s.\"Gender\"
from tbl_consultation_main p
left outer join register_applicant_details s on s.\"AppointmentNumber\" = p.cm_app_no
left outer join tbl_phlebotomy_sample e on e.\"ps_app_no\" = p.cm_app_no
where p.cm_order_sputum_sample = '1' and e.ps_malaria_barcode NOT IN (SELECT barcode FROM tb_test_results)");

        return response()->json(['result' => $res]);

    }

}

