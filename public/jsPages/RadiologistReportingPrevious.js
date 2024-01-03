$(document).ready(function () {

    //===============================================================================

    // setInterval(function () {
    loadAppoinmentNumbers();
    loadAppoinmentNumbersComplete();
    loadAppoinmentNumbersReviewed();
    // }, 1000);

    ////////////////////////- Schedule -///////////////////////////////

    function loadAppoinmentNumbers() {

        var table = $('#tblCxrComplete').DataTable();
        table.destroy();

        $.ajax({
            url: 'RadiologistReportingLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'loadCxrComplete'
            },
            success: function (data) {
                if (data.result.length != '') {
                    var html = '';
                    var co = 0;
                    $(data.result).each(function (key, val) {
                        co++;
                        html += '<tr class="appNum" style="cursor: pointer;">';
                        html += '<td>' + co + '</td>';
                        html += '<td>' + val.temp_token_no + '</td>';
                        html += '<td>' + val.temp_app_no + '</td>';
                        html += '<td>' + val.PassportNumber + '</td>';
                        html += '<td>' + val.FirstName + " " + val.LastName + '</td>';
                        html += '<td>' + val.DateOfBirth + '</td>';
                        html += '<td>' + val.Gender + '</td>';
                        html += '</tr>'
                    });
                    $('#appbody').html('');
                    $('#appbody').html(html);
                } else {
                    $('#appbody').html('');
                    $('#appbody').html('<tr><td colspan="6">No Appointment Numbers</td></tr>');
                }
            },
            complete: function (data) {
                loadDataTableCxrComplete();
            }
        });
    }

    //Data Table Plugin Initiate
    function loadDataTableCxrComplete() {
        var table1 = $('#tblCxrComplete').DataTable({
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
            "order": [[1, 'asc']]
        });

        table1.on('order.dt search.dt', function () {
            table1.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    }

    ////////////////////////- Reviewed -///////////////////////////////

    function loadAppoinmentNumbersReviewed() {

        var table = $('#tblReviwed').DataTable();
        table.destroy();

        $.ajax({
            url: 'RadiologistReportingLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'loadRadioReviewed'
            },
            success: function (data) {
                if (data.result.length != '') {
                    var html = '';
                    var co = 0;
                    $(data.result).each(function (key, val) {
                        co++;
                        html += '<tr class="appNum" style="cursor: pointer;">';
                        html += '<td>' + co + '</td>';
                        html += '<td>' + val.temp_token_no + '</td>';
                        html += '<td>' + val.temp_app_no + '</td>';
                        html += '<td>' + val.PassportNumber + '</td>';
                        html += '<td>' + val.FirstName + " " + val.LastName + '</td>';
                        html += '<td>' + val.DateOfBirth + '</td>';
                        html += '<td>' + val.Gender + '</td>';
                        html += '</tr>'
                    });
                    $('#reviewedappbody').html('');
                    $('#reviewedappbody').html(html);
                } else {
                    $('#reviewedappbody').html('');
                    $('#reviewedappbody').html('<tr><td colspan="6">No Appointment Numbers</td></tr>');
                }
            },
            complete: function (data) {
                loadDataTableReviwed();
            }
        });
    }

    //Data Table Plugin Initiate
    function loadDataTableReviwed() {
        var table1 = $('#tblReviwed').DataTable({
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
            "order": [[1, 'asc']]
        });

        table1.on('order.dt search.dt', function () {
            table1.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    }

    //appointment no onclick
    $(document).on('click', "tr.appNum", function () {

        $('tr.appNum').removeClass('clickedRow');
        $(this).addClass('clickedRow');

        var appno = $(this).find('td:nth-child(3)').text();
        window.open(urlPath + '/RadiologistReporting?appNo=' + appno);

    });

    ////////////////////////- Completed -///////////////////////////////

    function loadAppoinmentNumbersComplete() {

        var table = $('#tblRadioComplete').DataTable();
        table.destroy();

        $.ajax({
            url: 'RadiologistReportingLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'loadRadioComplete'
            },
            success: function (data) {
                if (data.result.length != '') {
                    var html = '';
                    var co = 0;
                    $(data.result).each(function (key, val) {
                        co++;
                        html += '<tr>';
                        html += '<td>' + co + '</td>';
                        html += '<td>' + val.temp_token_no + '</td>';
                        html += '<td>' + val.temp_app_no + '</td>';
                        html += '<td>' + val.PassportNumber + '</td>';
                        html += '<td>' + val.FirstName + " " + val.LastName + '</td>';
                        html += '<td>' + val.DateOfBirth + '</td>';
                        html += '<td>' + val.Gender + '</td>';
                        html += '<td><textarea class="form-control txtcom">' + val.rr_comment2 + '</textarea><button type="button" class="btn btn-warning btnsavecom2" style="margin-top: 5px;">Save</button></td>';
                        html += '</tr>'
                    });
                    $('#appbodyComplete').html('');
                    $('#appbodyComplete').html(html);
                } else {
                    $('#appbodyComplete').html('');
                    $('#appbodyComplete').html('<tr><td colspan="6">No Appointment Numbers</td></tr>');
                }
            },
            complete: function (data) {
                loadDataTableRadioComplete();
            }
        });
    }

    //Data Table Plugin Initiate
    function loadDataTableRadioComplete() {
        var table1 = $('#tblRadioComplete').DataTable({
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
            "order": [[1, 'asc']]
        });

        table1.on('order.dt search.dt', function () {
            table1.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    }

    $(document).on('click', '.btnsavecom2', function () {
        var appno = $(this).parents('tr').find('td:nth-child(3)').text();
        var comment = $(this).parents('tr').find('.txtcom').val();

        $.ajax({
            url: 'UpdateRadiologyComments',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                appno: appno,
                comment: comment
            },
            success: function (data) {
                swal({
                    title: "Updated Successfully!",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'OK!'
                });
            }
        });
    });

});
