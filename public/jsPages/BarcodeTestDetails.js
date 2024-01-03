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
        url: 'LoadBarcodeTestDetails',
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
                "                                    <th></th>\n" +
                "                                    <th nowrap>Date</th>\n" +
                "                                    <th nowrap>Token No</th>\n" +
                "                                    <th nowrap>Appointment No</th>\n" +
                "                                    <th nowrap>Barcode</th>\n" +
                "                                    <th nowrap>Age</th>\n" +
                "                                    <th nowrap>Gender</th>\n" +
                "                                    <th nowrap>HIV</th>\n" +
                "                                    <th nowrap>Filaria</th>\n" +
                "                                    <th nowrap>Malaria</th>\n" +
                "                                    <th nowrap>SHCG</th>\n" +
                "                                </tr>\n" +
                "                                </thead> <tbody id=\"TBodyBarcodeList\">";

            $(data.result).each(function (key, val) {
                i++;
                html += '<tr>';
                html += '<td>' + i + '</td>';
                html += '<td>' + val.datec + '</td>';
                html += '<td>' + val.temp_token_no + '</td>';
                html += '<td>' + val.temp_app_no + '</td>';
                html += '<td>' + val.barcode + '</td>';
                html += '<td>' + val.Age + '</td>';
                html += '<td>' + val.Gender + '</td>';
                if (val.HIV == null) {
                    html += '<td> - </td>';
                } else {
                    html += '<td>' + val.HIV + '</td>';
                }
                if (val.Filaria == null) {
                    html += '<td> - </td>';
                } else {
                    html += '<td>' + val.Filaria + '</td>';
                }
                if (val.Malaria == null) {
                    html += '<td> - </td>';
                } else {
                    html += '<td>' + val.Malaria + '</td>';
                }
                if (val.SHCG == null) {
                    html += '<td> - </td>';
                } else {
                    html += '<td>' + val.SHCG + '</td>';
                }
                html += '</tr>';
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
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
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


// {
//     extend : 'pdfHtml5',
//         title : function() {
//     return "ABCDE List";
// },
//     orientation : 'landscape',
//         pageSize : 'LEGAL',
//     text : '<i class="fa fa-file-pdf-o"> PDF</i>',
//     titleAttr : 'PDF'
// }
