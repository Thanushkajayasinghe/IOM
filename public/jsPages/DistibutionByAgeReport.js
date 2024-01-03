//jQuery datepicker
$(".datepickerSe").datepicker({
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+100",
    maxDate: 0
}); 

$("#btnSearch").on('click', function () {

    const dateFrom = $('#barcodeDateFrom').val();
    const dateTo = $('#barcodeDateTo').val();

    $.ajax({
        url: 'LoadAgeWiseDetails',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {dateFrom: dateFrom, dateTo: dateTo},
        success: function (data) {          


            var html = "";
            var i = 0;
            html += " <table class=\"table table-bordered table-hover table-striped text-center dataTable\" id=\"dataTableBarcode\"> <thead>\n" +
                "                                <tr>\n" +
                "                                    <th rowspan='2'></th>\n" +
                "                                    <th nowrap rowspan='2'>Country</th>\n" +
                "                                    <th nowrap colspan='3'>Less Than 18 Years</th>\n" +
                "                                    <th nowrap colspan='3'>18 Years and Above</th>\n" +
                "                                    <th nowrap colspan='3'>Total</th>\n" +
                "                                </tr>\n" +
                "                                <tr>\n" +
                "                                    <th>M</th>\n" +
                "                                    <th>F</th>\n" +
                "                                    <th>Total</th>\n" +
                "                                    <th>M</th>\n" +
                "                                    <th>F</th>\n" +
                "                                    <th>Total</th>\n" +
                "                                    <th>M</th>\n" +
                "                                    <th>F</th>\n" +
                "                                    <th>Total</th>\n" +
                "                                </tr>\n" +
                "                                </thead> <tbody id=\"TBodyBarcodeList\">";

            $(data.countryList).each(function (key, val) {

                const country = val.Nationality;

                $(data.result).each(function (k, v) {

                    if (country != '') {
                        if (country == v.Nationality) {
                            i++;
                            html += '<tr>';
                            html += '<td>' + i + '</td>';
                            html += '<td>' + v.Nationality + '</td>';

                            if (v.LessThan18CountMale != null) {
                                html += '<td>' + v.LessThan18CountMale + '</td>';
                            } else {
                                html += '<td> - </td>';
                            }
                            if (v.LessThan18CountFemale != null) {
                                html += '<td>' + v.LessThan18CountFemale + '</td>';
                            } else {
                                html += '<td> - </td>';
                            }
                            html += '<td>' + (parseInt(v.LessThan18CountMale) + parseInt(v.LessThan18CountFemale)) + '</td>';

                            if (v.GreaterThan18CountMale != null) {
                                html += '<td>' + v.GreaterThan18CountMale + '</td>';
                            } else {
                                html += '<td> - </td>';
                            }
                            if (v.GreaterThan18CountFemale != null) {
                                html += '<td>' + v.GreaterThan18CountFemale + '</td>';
                            } else {
                                html += '<td> - </td>';
                            }
                            html += '<td>' + (parseInt(v.GreaterThan18CountMale) + parseInt(v.GreaterThan18CountFemale)) + '</td>';

                            html += '<td>' + (parseInt(v.LessThan18CountMale) + parseInt(v.GreaterThan18CountMale)) + '</td>';
                            html += '<td>' + (parseInt(v.LessThan18CountFemale) + parseInt(v.GreaterThan18CountFemale)) + '</td>';
                            html += '<td>' + (parseInt((parseInt(v.LessThan18CountMale) + parseInt(v.GreaterThan18CountMale))) + parseInt((parseInt(v.LessThan18CountFemale) + parseInt(v.GreaterThan18CountFemale)))) + '</td>';
                            html += '</tr>';
                        }
                    }
                });
            });
            html += '</tbody> </table>';

            $('#rtyu').html("");
            $('#rtyu').html(html);

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
            extend: 'pdfHtml5',
            orientation: 'landscape',
            pageSize: 'A4',
        }, {
            extend: 'print'
        }]


    });

}
 