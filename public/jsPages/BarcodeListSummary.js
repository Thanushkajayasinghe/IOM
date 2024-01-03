//jQuery datepicker
$(".datepicker").datepicker({
    dateFormat: 'yy-mm-dd',
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+100"
});

$("#btnSearch").on('click', function () {

    const dateFrom = $('#barcodeDateFrom').val();
    const dateTo = $('#barcodeDateTo').val();

    if ($.fn.DataTable.isDataTable('#dataTableBarcode')) {
        $('#dataTableBarcode').DataTable().clear().destroy();
    }

    $.ajax({
        url: 'LoadChangeStatus',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {command: "GetBarcodeList", dateFrom: dateFrom, dateTo: dateTo},
        success: function (data) {

            var html = "";
            var i = 0;
            html += " <table class=\"table table-bordered table-hover table-striped text-center dataTable\" id=\"dataTableBarcode\"> <thead>\n" +
                "                                <tr>\n" +
                "                                    <th></th>\n" +
                "                                    <th nowrap>Passport No</th>\n" +
                "                                    <th nowrap>Appointment No</th>\n" +
                "                                    <th nowrap>Barcode</th>\n" +
                "                                    <th nowrap>Entered Date</th>\n" +
                "                                    <th nowrap>Entered Time</th>\n" +
                "                                </tr>\n" +
                "                                </thead> <tbody id=\"TBodyBarcodeList\">";

            $(data.result).each(function (key, val) {
                i++;
                html += '<tr>';
                html += '<td>' + i + '</td>';
                html += '<td>' + val.ps_passp_no + '</td>';
                html += '<td>' + val.ps_app_no + '</td>';
                html += '<td>' + val.barcode + '</td>';
                html += '<td>' + val.ps_sample_col_1 + '</td>';
                html += '<td>' + val.ps_sample_col_2 + '</td>';
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
        buttons: [
            'csv', 'excel'
        ],
        "order": [[0, 'asc']]
    });

}



