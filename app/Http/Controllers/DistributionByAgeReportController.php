<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DistributionByAgeReportController extends Controller
{
    public function ViewPage()
    {
        $readOnly = \Request::get('readOnly');
        $readWrite = \Request::get('readWrite');

        return view('pages.DistributionByAgeReport')->with(['readOnly' => $readOnly, 'readWrite' => $readWrite]);
    }

    public function LoadAgeWiseDetails(Request $request)
    {
        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;

        $res = DB::select("SELECT initcap(w.\"Nationality\") as \"Nationality\", coalesce(min(j.LessThan18CountMale), 0) as \"LessThan18CountMale\", coalesce(min(p.GreaterThan18CountMale), 0) as \"GreaterThan18CountMale\",
coalesce(min(q.GreaterThan18CountFemale), 0) as \"GreaterThan18CountFemale\", coalesce(min(r.LessThan18CountFemale), 0) as \"LessThan18CountFemale\"
from register_applicant_details w

inner join tbl_consultation_main fd on fd.cm_app_no = w.\"AppointmentNumber\"

left outer join
(select initcap(s.\"Nationality\") as \"Nationality\", s.\"Gender\", count(s.\"Gender\") as LessThan18CountMale
from register_applicant_details s
inner join (
select \"FkId\", \"AppointmentNumber\" from register_applicant_details s
inner join tbl_consultation_main fd on fd.cm_app_no = s.\"AppointmentNumber\"
where (date(fd.\"Cdate\") between '$dateFrom' and '$dateTo')) as q1  on q1.\"FkId\" = s.\"FkId\"
where (s.\"Nationality\" is not null or s.\"Nationality\" != ' ') and s.\"Gender\" = 'Male' and (s.\"Gender\" is not null) and (EXTRACT(YEAR from AGE(s.\"DateOfBirth\"))) < 18
group by initcap(s.\"Nationality\"), s.\"Gender\"
order by initcap(s.\"Nationality\"), s.\"Gender\") as j  on j.\"Nationality\" = initcap(w.\"Nationality\")


left outer join
(select initcap(s.\"Nationality\") as \"Nationality\", s.\"Gender\", count(s.\"Gender\") as GreaterThan18CountMale
from register_applicant_details s
inner join (
select \"FkId\", \"AppointmentNumber\" from register_applicant_details s
inner join tbl_consultation_main fd on fd.cm_app_no = s.\"AppointmentNumber\"
where (date(fd.\"Cdate\") between '$dateFrom' and '$dateTo')) as q1  on q1.\"FkId\" = s.\"FkId\"
where (s.\"Nationality\" is not null or s.\"Nationality\" != ' ') and s.\"Gender\" = 'Male' and (s.\"Gender\" is not null) and (EXTRACT(YEAR from AGE(s.\"DateOfBirth\"))) > 18
group by initcap(s.\"Nationality\"), s.\"Gender\"
order by initcap(s.\"Nationality\"), s.\"Gender\") as p  on p.\"Nationality\" = initcap(w.\"Nationality\")


left outer join
(select initcap(s.\"Nationality\") as \"Nationality\", s.\"Gender\", count(s.\"Gender\") as LessThan18CountFemale
from register_applicant_details s
inner join (
select \"FkId\", \"AppointmentNumber\" from register_applicant_details s
inner join tbl_consultation_main fd on fd.cm_app_no = s.\"AppointmentNumber\"
where (date(fd.\"Cdate\") between '$dateFrom' and '$dateTo')) as q1  on q1.\"FkId\" = s.\"FkId\"
where (s.\"Nationality\" is not null or s.\"Nationality\" != ' ') and s.\"Gender\" = 'Female' and (s.\"Gender\" is not null) and (EXTRACT(YEAR from AGE(s.\"DateOfBirth\"))) < 18
group by initcap(s.\"Nationality\"), s.\"Gender\"
order by initcap(s.\"Nationality\"), s.\"Gender\") as r  on r.\"Nationality\" = initcap(w.\"Nationality\")


left outer join
(select initcap(s.\"Nationality\") as \"Nationality\", s.\"Gender\", count(s.\"Gender\") as GreaterThan18CountFemale
from register_applicant_details s
inner join (
select \"FkId\", \"AppointmentNumber\" from register_applicant_details s
inner join tbl_consultation_main fd on fd.cm_app_no = s.\"AppointmentNumber\"
where (date(fd.\"Cdate\") between '$dateFrom' and '$dateTo')) as q1  on q1.\"FkId\" = s.\"FkId\"
where (s.\"Nationality\" is not null or s.\"Nationality\" != ' ') and s.\"Gender\" = 'Female' and (s.\"Gender\" is not null) and (EXTRACT(YEAR from AGE(s.\"DateOfBirth\"))) >= 18
group by initcap(s.\"Nationality\"), s.\"Gender\"
order by initcap(s.\"Nationality\"), s.\"Gender\") as q  on q.\"Nationality\" = initcap(w.\"Nationality\")


inner join appointment_cancel_and_reschedule_availability acr on acr.appointment_no = w.\"AppointmentNumber\"
where acr.date between '$dateFrom' and '$dateTo' and acr.status != 'Cancelled' and w.\"Nationality\" is not null
group by initcap(w.\"Nationality\")
order by initcap(w.\"Nationality\")");

        $res1 = DB::select("SELECT distinct initcap(\"Nationality\") as \"Nationality\"
from register_applicant_details
where \"Nationality\" is not null
order by initcap(\"Nationality\")");

        return response()->json(['result' => $res, 'countryList' => $res1]);
    }



    public function LoadWeekData(Request $request)
    {
        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;

        $res = DB::select("select max(y.id) as \"Id\", a.temp_app_no as \"AppointmentNumber\", max(date(a.createddate)) as \"AppointmentDate\", max(b.\"DateOfBirth\") as \"DateOfBirth\", 
        max(date_part('year',age( b.\"DateOfBirth\"))) as \"Age\", max(y.\"CountryOfOrigin\") as \"CountryOfOrigin\", max(b.\"Gender\") as \"Gender\", max(INITCAP(b.\"Nationality\")) as \"Nationality\", 
        max(p.prtr_result) as \"HIV\", max(q.prtr_result) as \"Filaria\", max(r.prtr_result) as \"Malaria\", max(s.prtr_result) as \"SHCG\",
        max(z.cm_order_sputum_sample) as \"SputumDone\", max(v.ctr_result) as \"SputumResult\",
        max(e.\"refered\") as \"Malaria Refarral Date\", max(e.\"test_result\") as \"Malaria Result\", max(f.\"refered\") as \"HIV Refarral Date\", 
        max(f.\"status\") as \"HIV Refarral Status\", max(d.\"refferd\") as \"TB Refarral Date\", max(d.\"comment\") as \"TB Result\",
        max(g.\"rr_single_fibrous_streak\") as \"single_fibrous_streak\", max(g.\"rr_bony_islets\") as \"bony_islets\", max(g.\"rr_pleural_capping\") as \"pleural_capping\",
        max(g.\"rr_unilateral_bilateral\") as \"unilateral_bilateral\", max(g.\"rr_calcified_nodule\") as \"calcified_nodule\", 
        max(g.\"rr_solitary_granuloma_hilum\") as \"solitary_granuloma_hilum\", max(g.\"rr_solitary_granuloma_enlarged\") as \"solitary_granuloma_enlarged\",
        max(g.\"rr_single_multi_calc_pulmonary\") as \"rr_single_multi_calc_pulmonary\", max(g.\"rr_calcified_pleural_lesions\") as \"rr_calcified_pleural_lesions\", 
        max(g.\"rr_costophrenic_angle\") as \"rr_costophrenic_angle\", max(g.\"rr_notable_apical\") as \"rr_notable_apical\",
        max(g.\"rr_aplcal_fbronodualar\") as \"rr_aplcal_fbronodualar\", max(g.\"rr_multi_single_pulmonary_nodu_micronodules\") as \"rr_multi_single_pulmonary_nodu_micronodules\", 
        max(g.\"rr_isolated_hilar\") as \"rr_isolated_hilar\", max(g.\"rr_multi_single_pulmonary_nodu_masses\") as \"rr_multi_single_pulmonary_nodu_masses\",
        max(g.\"rr_non_calcified_pleural_fibrosos\") as \"rr_non_calcified_pleural_fibrosos\", max(g.\"rr_interstltial_fbrosos\") as \"rr_interstltial_fbrosos\",
        max(g.\"rr_any_cavitating_lesion\") as \"rr_any_cavitating_lesion\", max(g.\"rr_skeleton_soft_issue\") as \"rr_skeleton_soft_issue\",
        max(g.\"rr_cardiac_major_vessels\") as \"rr_cardiac_major_vessels\", max(g.\"rr_lung_fields\") as \"rr_lung_fields\", max(g.\"rr_comment2\") as \"radiologist_comment\",
        avg(h.\"cxr_done\"::int) as \"cxr_done\", avg(h.\"cxr_not_done\"::int) as \"cxr_not_done\", avg(h.\"cxr_def\"::int) as \"Deferred\", 
        avg(h.\"cxr_preg_sc\"::int) as \"Pregnant/SC Instead\", avg(h.\"cxr_app_dec\"::int) as \"Applicant Decline CXR\", 
        avg(h.\"cxr_no_show\"::int) as \"No Show\", avg(h.\"cxr_child\"::int) as \"Child <11 Years Old\",
        avg(h.\"cxr_unbl_unwill_sc\"::int) as \"Unable/ Unwilling/ SC Instead\", avg(h.\"cxr_done_other\"::int) as \"Other\", max(h.\"done_other_text\") as \"Other_Comment\"
        from temp_new a
        left outer join register_applicant_details b on b.\"AppointmentNumber\" = a.temp_app_no
        left outer join
        (select prtr_appno, prtr_result, prtr_comment from tbl_phlrapidtestresults
        where prtr_test = 'HIV') as p  on p.prtr_appno = a.temp_app_no
        left outer join
        (select prtr_appno, prtr_result, prtr_comment from tbl_phlrapidtestresults
        where prtr_test = 'Filaria') as q  on q.prtr_appno = a.temp_app_no
        inner join
        (select prtr_appno, prtr_result, prtr_comment from tbl_phlrapidtestresults
        where prtr_test = 'Malaria') as r  on r.prtr_appno = a.temp_app_no
        left outer join
        (select prtr_appno, prtr_result, prtr_comment from tbl_phlrapidtestresults
        where prtr_test = 'SHCG') as s  on s.prtr_appno = a.temp_app_no
        left outer join refer_to_tb d on  d.registration_no = a.temp_app_no
        left outer join refer_to_malaria e on  e.registration_no = a.temp_app_no
        left outer join refer_to_nsacp_hiv_elisa f on  f.registration_no = a.temp_app_no
        left outer join tbl_radiologists_reporting g on  g.rr_app_no = a.temp_app_no
        left outer join tbl_cxr h on  h.cxr_app_no = a.temp_app_no
        left outer join register_applicants y on  y.id = b.\"FkId\" 
        left outer join tbl_consultation_main z on  z.cm_app_no = a.temp_app_no
        left outer join tbl_confirmatorytestresults v on  v.ctr_appno = a.temp_app_no
        where a.\"createddate\" >= '$dateFrom' and a.\"createddate\" <= '$dateTo'
        group by a.temp_app_no");

        return response()->json($res);
    }
}
