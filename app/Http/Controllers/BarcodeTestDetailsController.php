<?php
/**
 * Created by PhpStorm.
 * User: Nishantha
 * Date: 2/5/2019
 * Time: 11:35 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarcodeTestDetailsController
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.BarcodeTestDetails')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function LoadBarcodeTestDetails(Request $request)
    {
        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;

        $res = DB::select("SELECT DATE(s.createddate) as Datec, temp_token_no, temp_passport, temp_app_no, u.barcode,
EXTRACT(YEAR from AGE(w.\"DateOfBirth\")) as \"Age\", w.\"Gender\", p.prtr_result as \"HIV\",
q.prtr_result as \"Filaria\", r.prtr_result as \"Malaria\", z.prtr_result as \"SHCG\"
from temp_new s
left outer join
(select prtr_appno, prtr_result from tbl_phlrapidtestresults
where prtr_test = 'HIV') as p  on p.prtr_appno = s.temp_app_no
left outer join
(select prtr_appno, prtr_result from tbl_phlrapidtestresults
where prtr_test = 'Filaria') as q  on q.prtr_appno = s.temp_app_no
left outer join
(select prtr_appno, prtr_result from tbl_phlrapidtestresults
where prtr_test = 'Malaria') as r  on r.prtr_appno = s.temp_app_no
left outer join
(select prtr_appno, prtr_result from tbl_phlrapidtestresults
where prtr_test = 'SHCG') as z  on z.prtr_appno = s.temp_app_no
inner join register_applicant_details w on w.\"AppointmentNumber\" = s.temp_app_no
inner join (
    select max(ps_id) as maxId, ps_app_no
    from tbl_phlebotomy_sample
    group by ps_app_no
  ) as y on y.ps_app_no = s.temp_app_no
inner join
(select coalesce(ps_hiv_barcode, ps_malaria_barcode, ps_filaria_barcode, ps_shcg_barcode) as barcode, ps_id from tbl_phlebotomy_sample) as u  on u.ps_id = y.maxId
where DATE(s.createddate) between '$dateFrom' and '$dateTo'
order by s.createddate, s.temp_token_no");

        return response()->json(['result' => $res]);


    }

}
