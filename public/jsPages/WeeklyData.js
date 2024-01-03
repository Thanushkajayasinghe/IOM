//jQuery datepicker
$(".datepicker").datepicker({
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+100",
    maxDate: 0
});


//jQuery datepicker
$(".datepickerSe").datepicker({
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+100",
    maxDate: 0
});

$("#btnSearch").on('click', function () {

    const dateFrom = $('#dateFrom').val();
    const dateTo = $('#dateTo').val();

    $.ajax({
        url: 'LoadWeekData',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { dateFrom: dateFrom, dateTo: dateTo },
        success: function (data) {


            var html = "";
            var i = 0;
            html += " <table class=\"table table-bordered table-hover table-striped dataTable nowrap\" id=\"dataTableBarcode\"> <thead>\n" +
                "                                <tr>\n" +
                "                                    <th></th>\n" +
                "                                    <th>ID</th>\n" +
                "                                    <th>Appoinment No</th>\n" +
                "                                    <th>Appointment Date</th>\n" +
                "                                    <th>Date Of Birth</th>\n" +
                "                                    <th>Age</th>\n" +
                "                                    <th>Country Of Origin</th>\n" +
                "                                    <th>Gender</th>\n" +
                "                                    <th>Nationality</th>\n" +
                "                                    <th>HIV</th>\n" +
                "                                    <th>Filaria</th>\n" +
                "                                    <th>Malaria</th>\n" +
                "                                    <th>SHCG</th>\n" +
                "                                    <th>Sputum Done</th>\n" +
                "                                    <th>Sputum Result</th>\n" +
                "                                    <th>Malaria Refarral Date</th>\n" +
                "                                    <th>Malaria Result</th>\n" +
                "                                    <th>HIV Refarral Date</th>\n" +
                "                                    <th>HIV Refarral Status</th>\n" +
                "                                    <th>TB Refarral Date</th>\n" +
                "                                    <th>TB Result</th>\n" +
                "                                    <th>Single Fibrous Streak</th>\n" +
                "                                    <th>Bony Islets</th>\n" +
                "                                    <th>Pleural Capping</th>\n" +
                "                                    <th>Unilateral Bilateral</th>\n" +
                "                                    <th>Calcified Nodule</th>\n" +
                "                                    <th>Solitary Granuloma Hilum</th>\n" +
                "                                    <th>Solitary Granuloma Enlarged</th>\n" +
                "                                    <th>Single Multi Calc Pulmonary</th>\n" +
                "                                    <th>Calcified Pleural Lesions</th>\n" +
                "                                    <th>Costophrenic Angle</th>\n" +
                "                                    <th>Notable Apical</th>\n" +
                "                                    <th>Aplcal Fbronodualar</th>\n" +
                "                                    <th>Multi Single Pulmonary Nodu Micronodules</th>\n" +
                "                                    <th>Isolated Hilar</th>\n" +
                "                                    <th>Multi Single Pulmonary Nodu Masses</th>\n" +
                "                                    <th>Non Calcified Pleural Fibrosos</th>\n" +
                "                                    <th>Interstltial Fbrosos</th>\n" +
                "                                    <th>Any Cavitating Lesion</th>\n" +
                "                                    <th>Skeleton Soft Issue</th>\n" +
                "                                    <th>Cardiac Major Vessels</th>\n" +
                "                                    <th>Lung Fields</th>\n" +
                "                                    <th>Radiologist Comment</th>\n" +
                "                                    <th>CXR Done</th>\n" +
                "                                    <th>CXR Not Done</th>\n" +
                "                                    <th>Deferred</th>\n" +
                "                                    <th>Pregnant/SC Instead</th>\n" +
                "                                    <th>Applicant Decline CXR</th>\n" +
                "                                    <th>No Show</th>\n" +
                "                                    <th>Child < 11 Years Old</th>\n" +
                "                                    <th>Unable/ Unwilling/ SC Instead</th>\n" +
                "                                    <th>Other</th>\n" +
                "                                    <th>Other_Comment</th>\n" +
                "                                </tr>\n" +
                "                                </thead> <tbody id=\"TBodyBarcodeList\">";


            $(data).each(function (k, v) {
                i++;
                html += '<tr>';
                html += '<td>' + i + '</td>';
                html += '<td>' + v.Id + '</td>';
                html += '<td>' + v.AppointmentNumber + '</td>';
                html += '<td>' + v.AppointmentDate + '</td>';
                html += '<td>' + v.DateOfBirth + '</td>';
                html += '<td>' + v.Age + '</td>';
                html += '<td>' + v.CountryOfOrigin + '</td>';
                html += '<td>' + v.Gender + '</td>';
                html += '<td>' + v.Nationality + '</td>';
                html += '<td>' + v.HIV + '</td>';
                html += '<td>' + v.Filaria + '</td>';
                html += '<td>' + v.Malaria + '</td>';
                if (v.SHCG == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v.SHCG + '</td>';
                }
                html += '<td>' + v.SputumDone + '</td>';
                if (v.SputumResult == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v.SputumResult + '</td>';
                }
                if (v['Malaria Refarral Date'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['Malaria Refarral Date'] + '</td>';
                }
                if (v['Malaria Result'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['Malaria Result'] + '</td>';
                }
                if (v['HIV Refarral Date'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['HIV Refarral Date'] + '</td>';
                }
                if (v['HIV Refarral Status'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['HIV Refarral Status'] + '</td>';
                }
                if (v['TB Refarral Date'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['TB Refarral Date'] + '</td>';
                }
                if (v['TB Result'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['TB Result'] + '</td>';
                }
                if (v['single_fibrous_streak'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['single_fibrous_streak'] + '</td>';
                }
                if (v['bony_islets'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['bony_islets'] + '</td>';
                }
                if (v['pleural_capping'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['pleural_capping'] + '</td>';
                }
                if (v['unilateral_bilateral'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['unilateral_bilateral'] + '</td>';
                }
                if (v['calcified_nodule'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['calcified_nodule'] + '</td>';
                }
                if (v['solitary_granuloma_hilum'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['solitary_granuloma_hilum'] + '</td>';
                }
                if (v['solitary_granuloma_enlarged'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['solitary_granuloma_enlarged'] + '</td>';
                }
                if (v['rr_single_multi_calc_pulmonary'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['rr_single_multi_calc_pulmonary'] + '</td>';
                }
                if (v['rr_calcified_pleural_lesions'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['rr_calcified_pleural_lesions'] + '</td>';
                }
                if (v['rr_costophrenic_angle'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['rr_costophrenic_angle'] + '</td>';
                }
                if (v['rr_notable_apical'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['rr_notable_apical'] + '</td>';
                }
                if (v['rr_aplcal_fbronodualar'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['rr_aplcal_fbronodualar'] + '</td>';
                }
                if (v['rr_multi_single_pulmonary_nodu_micronodules'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['rr_multi_single_pulmonary_nodu_micronodules'] + '</td>';
                }
                if (v['rr_isolated_hilar'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['rr_isolated_hilar'] + '</td>';
                }
                if (v['rr_multi_single_pulmonary_nodu_masses'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['rr_multi_single_pulmonary_nodu_masses'] + '</td>';
                }
                if (v['rr_non_calcified_pleural_fibrosos'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['rr_non_calcified_pleural_fibrosos'] + '</td>';
                }
                if (v['rr_interstltial_fbrosos'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['rr_interstltial_fbrosos'] + '</td>';
                }
                if (v['rr_any_cavitating_lesion'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['rr_any_cavitating_lesion'] + '</td>';
                }
                if (v['rr_skeleton_soft_issue'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['rr_skeleton_soft_issue'] + '</td>';
                }
                if (v['rr_cardiac_major_vessels'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['rr_cardiac_major_vessels'] + '</td>';
                }
                if (v['rr_lung_fields'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['rr_lung_fields'] + '</td>';
                }
                if (v['radiologist_comment'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['radiologist_comment'] + '</td>';
                }
                if (v['cxr_done'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + parseInt(v['cxr_done']) + '</td>';
                }
                if (v['cxr_not_done'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + parseInt(v['cxr_not_done']) + '</td>';
                }
                if (v['Deferred'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + parseInt(v['Deferred']) + '</td>';
                }
                if (v['Pregnant/SC Instead'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + parseInt(v['Pregnant/SC Instead']) + '</td>';
                }
                if (v['Applicant Decline CXR'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + parseInt(v['Applicant Decline CXR']) + '</td>';
                }
                if (v['No Show'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + parseInt(v['No Show']) + '</td>';
                }
                if (v['Child <11 Years Old'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + parseInt(v['Child <11 Years Old']) + '</td>';
                }
                if (v['Unable/ Unwilling/ SC Instead'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + parseInt(v['Unable/ Unwilling/ SC Instead']) + '</td>';
                }
                if (v['Other'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + parseInt(v['Other']) + '</td>';
                }
                if (v['Other_Comment'] == null) {
                    html += '<td></td>';
                } else {
                    html += '<td>' + v['Other_Comment'] + '</td>';
                }

                html += '</tr>';
            });

            html += '</tbody> </table>';

            $('#weeklydatacontainer').html("");
            $('#weeklydatacontainer').html(html);

        }, complete: function () {
            loadDataTable();
        }
    });
});


//Data Table Plugin Initiate
function loadDataTable() {

    var table1 = $('.dataTable').DataTable({
        "pageLength": 25,
        dom: 'Blfrtip',
        "order": [[0, 'asc']],
        buttons: [{
            extend: 'copy'
        }, {
            extend: 'excel'
        }, {
            extend: 'csv'
        }, {
            extend: 'print'
        }]
    });

}
