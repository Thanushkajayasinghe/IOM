<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;

class PhlebotomyResultAuthorizeController extends Controller
{

    public function alldata(Request $request)
    {

        $command = $request->command;

        if ($command == 'Load') {

            $BCresult = DB::table('tbl_phlrapidtestresults')
                ->distinct()
                ->where('status', 'OK')
                ->get(['prtr_barcode']);


            if (!empty($BCresult)) {
                return response()->json(['BCresult' => $BCresult]);
            } else if (empty($BCresult)) {
                return response()->json('Not Available');
            }


        } else if ($command == "BCsearch") {
            $BC = $request->BC;

            $HIVresult = DB::table('tbl_phlrapidtestresults')
                ->where('status', 'OK')
                ->where('prtr_test', 'HIV')
                ->where('prtr_barcode', $BC)
                ->get();
            $FILresult = DB::table('tbl_phlrapidtestresults')
                ->where('status', 'OK')
                ->where('prtr_test', 'Filaria')
                ->where('prtr_barcode', $BC)
                ->get();
            $MALresult = DB::table('tbl_phlrapidtestresults')
                ->where('status', 'OK')
                ->where('prtr_test', 'Malaria')
                ->where('prtr_barcode', $BC)
                ->get();
            $HCGresult = DB::table('tbl_phlrapidtestresults')
                ->where('status', 'OK')
                ->where('prtr_test', 'SHCG')
                ->where('prtr_barcode', $BC)
                ->get();

            return response()->json(['HIVresult' => $HIVresult, 'FILresult' => $FILresult, 'MALresult' => $MALresult, 'HCGresult' => $HCGresult]);


        } else if ($command == "loadDataTj") {

            $BC = $request->BC;

            $res = DB::select("select u.barcode, p.prtr_result as \"HIV\", p.prtr_comment as \"HIVComment\", q.prtr_result as \"Filaria\", q.prtr_comment as \"FilariaComment\",
r.prtr_result as \"Malaria\", r.prtr_comment as \"MalariaComment\", z.prtr_result as \"SHCG\", z.prtr_comment as \"SHCGComment\"
from temp_new s
left outer join
(select prtr_appno, prtr_result, prtr_comment from tbl_phlrapidtestresults
where prtr_test = 'HIV' and status = 'OK') as p  on p.prtr_appno = s.temp_app_no
left outer join
(select prtr_appno, prtr_result, prtr_comment from tbl_phlrapidtestresults
where prtr_test = 'Filaria' and status = 'OK') as q  on q.prtr_appno = s.temp_app_no
left outer join
(select prtr_appno, prtr_result, prtr_comment from tbl_phlrapidtestresults
where prtr_test = 'Malaria' and status = 'OK') as r  on r.prtr_appno = s.temp_app_no
left outer join
(select prtr_appno, prtr_result, prtr_comment from tbl_phlrapidtestresults
where prtr_test = 'SHCG' and status = 'OK') as z  on z.prtr_appno = s.temp_app_no
inner join register_applicant_details w on w.\"AppointmentNumber\" = s.temp_app_no
inner join (
    select max(ps_id) as maxId, ps_app_no
    from tbl_phlebotomy_sample
    group by ps_app_no
  ) as y on y.ps_app_no = s.temp_app_no
inner join
(select coalesce(ps_hiv_barcode, ps_malaria_barcode, ps_filaria_barcode, ps_shcg_barcode) as barcode, ps_id from tbl_phlebotomy_sample) as u  on u.ps_id = y.maxId
where q.prtr_result is not null and r.prtr_result is not null
order by s.createddate, s.temp_token_no");

            return response()->json(['res' => $res]);

        } else if ($command == "approval") {

            $reqArray = $request->arrayToSend;
            $tableArrayData[] = array();
            $arrayData = json_decode($reqArray);
            $tableArrayData = $arrayData;

            foreach ($tableArrayData as $data) {
                $id = $data[0];

                DB::table('tbl_phlrapidtestresults')->where('prtr_barcode', $id)->update(
                    ['status' => 'Approval']
                );

                $apno = DB::table('tbl_phlrapidtestresults')
                    ->select('prtr_appno')
                    ->where('prtr_barcode', $id)
                    ->first();

                $appnoo = $apno->prtr_appno;

                DB::table('temp_table')
                    ->where('temp_app_no', $appnoo)
                    ->update(['temp_phlebotomy' => 4]);

                DB::table('audittrail')
                    ->where('appno', $appnoo)
                    ->update(['lab' => date("Y-m-d H:i:s")]);
            }
            return response()->json(['result' => true]);

        }

    }

}
