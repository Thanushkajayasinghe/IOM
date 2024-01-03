$(document).ready(function () {

    loadPassport();
    function loadPassport() {
        $.ajax({
            url: 'malariaViewDetPassportDrpLoad',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {},
            success: function (data) {

                var options = '';
                options += '<option disabled="disabled" selected="selected">Select</option>';
                $(data.result).each(function (key, val) {
                    options += '<option value="' + val.ps_passp_no + '">' + val.ps_passp_no + '</option>';
                });

                $('#drpPassportNo').html("");
                $('#drpPassportNo').html(options);
            }
        });
    }

    loadAppointments();
    function loadAppointments() {
        $.ajax({
            url: 'malariaViewDetAppointmentsDrpLoad',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {},
            success: function (data) {
                var options = '';
                options += '<option disabled="disabled" selected="selected">Select</option>';
                $(data.result).each(function (key, val) {
                    options += '<option value="' + val.ps_app_no + '">' + val.ps_app_no + '</option>';
                });

                $('#drpAppointmentNo').html("");
                $('#drpAppointmentNo').html(options);
            }
        });
    }


    $('#btnSearch').on('click', function () {

        var passport = $('#drpPassportNo').val();
        var appointment = $('#drpAppointmentNo').val();
        var program = $('#drpProgram').val();
        var dateFrom = $('#txtDateFrom').val();
        var dateTo = $('#txtDateTo').val();

        $.ajax({
            url: 'dppresultload',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {passport: passport, appointment: appointment, program: program, dateFrom: dateFrom, dateTo: dateTo},
            success: function (data) {

                var html = "";
                $(data.res1).each(function (key, val) {
                    html += '<tr class="trClickable">';
                    html += '<td>' + val.barcode + '</td>';
                    html += '<td>' + val.passport + '</td>';
                    html += '<td>TB</td>';
                    html += '<td>' + val.testdate + '</td>';
                    html += '<td style="display: none">' + val.id + '</td>';
                    html += '<td class="text-center"><button class="btn btn-warning btn-sm btnDismiss" type="button"  style="padding: 2px 8px;">Dismiss</button></td>';
                    html += '</tr>';
                });

                $(data.res2).each(function (key, val) {
                    html += '<tr class="trClickable">';
                    html += '<td>' + val.barcode + '</td>';
                    html += '<td>' + val.passport + '</td>';
                    html += '<td>Filaria</td>';
                    html += '<td>' + val.testdate + '</td>';
                    html += '<td style="display: none">' + val.id + '</td>';
                    html += '<td class="text-center"><button class="btn btn-warning btn-sm btnDismiss" type="button"  style="padding: 2px 8px;">Dismiss</button></td>';
                    html += '</tr>';
                });

                $(data.res3).each(function (key, val) {
                    html += '<tr class="trClickable">';
                    html += '<td>' + val.barcode + '</td>';
                    html += '<td>' + val.passport + '</td>';
                    html += '<td>Malaria</td>';
                    html += '<td>' + val.testdate + '</td>';
                    html += '<td style="display: none">' + val.id + '</td>';
                    html += '<td class="text-center"><button class="btn btn-warning btn-sm btnDismiss" type="button"  style="padding: 2px 8px;">Dismiss</button></td>';
                    html += '</tr>';
                });

                $(data.res4).each(function (key, val) {
                    html += '<tr class="trClickable">';
                    html += '<td>' + val.barcode + '</td>';
                    html += '<td>' + val.passport + '</td>';
                    html += '<td>HIV</td>';
                    html += '<td>' + val.testdate + '</td>';
                    html += '<td style="display: none">' + val.id + '</td>';
                    html += '<td class="text-center"><button class="btn btn-warning btn-sm btnDismiss" type="button" style="padding: 2px 8px;">Dismiss</button></td>';
                    html += '</tr>';
                });

                $('#testLoadingTbody').html("");
                $('#testLoadingTbody').html(html);
            }
        });
    });


    $(document).on('click', '.trClickable', function () {

        wait();

        var barcode = $(this).find('td:nth-child(1)').text();
        var program = $(this).find('td:nth-child(3)').text();

        $.ajax({
            url: 'dataLoadDppResults',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {barcode: barcode, program: program},
            success: function (data) {

                var html = "";
                $(data.res).each(function (key, val) {
                    html += '<tr>';
                    html += '<td>' + val.testdate + '</td>';
                    html += '<td>' + val.test + '</td>';
                    html += '<td>' + val.testresult + '</td>';
                    html += '</tr>';
                });

                closewait();

                $('#testAddTbody').html('');
                $('#testAddTbody').html(html);
            }
        });
    });


    $('#txtBarcodeNo').on('change', function () {

        var value = $(this).val();

        $.ajax({
            url: 'FilariaInterLoadPrevData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                barcode: value
            },
            success: function (data) {

                var options = '';
                options += '<option disabled="disabled" selected="selected">Select</option>';
                $(data.res).each(function (key, val) {
                    options += '<option>' + val.testdate + '</option>';
                });

                $('#drpDates').html("");
                $('#drpDates').html(options);
            }
        });
    });


    $('#drpDates').on('change', function () {

        var barcode = $('#txtBarcodeNo').val();
        var date = $(this).val();

        $.ajax({
            url: 'dataLoadDppResults',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {barcode: barcode, date: date},
            success: function (data) {

                var html = "";
                $(data.res).each(function (key, val) {
                    html += '<tr>';
                    html += '<td>' + val.testdate + '</td>';
                    html += '<td>' + val.test + '</td>';
                    html += '<td>' + val.testresult + '</td>';
                    html += '</tr>';
                });

                closewait();

                $('#testAddTbody').html('');
                $('#testAddTbody').html(html);
            }
        });
    });


    $(document).on('click', '.btnDismiss', function (e) {

        e.stopPropagation();
        var serial = $(this).parents('tr').find('td:nth-child(5)').text();
        var program = $(this).parents('tr').find('td:nth-child(3)').text();

        $.ajax({
            url: 'testDismiss',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {serial: serial, program: program},
            success: function (data) {


                if (data.res == true) {
                    Swal(
                        'Updated Successfully!',
                        '',
                        'success'
                    );
                }
                loadTable();
            }
        });

    });

});


