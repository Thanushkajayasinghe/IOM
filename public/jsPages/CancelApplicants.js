$(document).ready(function () {

    loadData();

    function loadData() {
        $.ajax({
            url: 'CancelNoShowApplicants',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                function: 'loadData'
            },
            success: function (data) {
                var html = "";
                var cou = 0;
                $(data.result).each(function (key, val) {
                    cou++;
                    html += "<tr><td></td>";
                    html += "<td style='display: none;'>" + val.temp_id + "</td>";
                    html += "<td>" + val.temp_app_no + "</td>";
                    html += "<td>" + val.temp_passport + "</td>";
                    html += "<td>" + val.FristName + ' ' + val.LastName + "</td>";
                    if (val.CountryOfBirth != null) {
                        html += "<td>" + val.CountryOfBirth + "</td>";
                    } else {
                        html += "<td></td>";
                    }
                    html += "<td></td>";
                    html += "<td><input class=\"form-control\" type=\"checkbox\" id='chkCancel" + cou + "'>" +
                        "<label for='chkCancel" + cou + "' style=\"font-weight: 700;\"></label></td>";
                    html += "</tr>";
                });

                $('#cancelNoShowAppTbody').html();
                $('#cancelNoShowAppTbody').html(html);
            },
            complete: function (data) {
                loadDataTable();
            }
        });
    }


    //Data Table Plugin Initiate
    function loadDataTable() {
        var table1 = $('#cancelNoShowAppTbl').DataTable({
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
            table1.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    }

    //search using date range
    $('#btnSearch').on('click', function () {
        var dateFrom = $('#appointmentDateFrom').val();
        var dateTo = $('#appointmentDateTo').val();

        var table = $('#cancelNoShowAppTbl').DataTable();
        table.destroy();

        $.ajax({
            url: 'CancelNoShowApplicants',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                dateFrom: dateFrom,
                dateTo: dateTo,
                function: 'loadDataUsingDateRange'
            },
            success: function (data) {
                var html = "";
                var cou = 0;
                $(data.result).each(function (key, val) {
                    cou++;
                    html += "<tr><td></td>";
                    html += "<td style='display: none;'>" + val.temp_id + "</td>";
                    html += "<td>" + val.temp_app_no + "</td>";
                    html += "<td>" + val.temp_passport + "</td>";
                    html += "<td>" + val.NameInFull + "</td>";
                    if (val.CountryOfBirth != null) {
                        html += "<td>" + val.CountryOfBirth + "</td>";
                    } else {
                        html += "<td></td>";
                    }
                    html += "<td></td>";
                    html += "<td><input class=\"form-control chkCancel\" type=\"checkbox\" id='chkCancel" + cou + "'>" +
                        "<label for='chkCancel" + cou + "' style=\"font-weight: 700;\"></label></td>";
                    html += "</tr>";
                });

                $('#cancelNoShowAppTbody').html();
                $('#cancelNoShowAppTbody').html(html);
            },
            complete: function (data) {
                loadDataTable();
            }
        });
    });

    //cancel no show applicants
    $('#btnCancel').on('click', function () {

        Swal.fire({
            title: 'Are you sure?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Submit!'
        }).then((result) => {
            if (result.value) {

                if (!$('#cancelNoShowAppTbody tr td').hasClass('dataTables_empty')) {

                    $('#cancelNoShowAppTbody tr').each(function () {

                        var tr = $(this);

                        if (tr.find('td:nth-child(8) input').is(':checked')) {
                            var serial = tr.find('td:nth-child(2)').text();

                            $.ajax({
                                url: 'CancelNoShowApplicants',
                                type: 'POST',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    serial: serial,
                                    function: 'cancelNoShowApplicant'
                                },
                                success: function (data) {
                                    Swal.fire({
                                        type: 'success',
                                        title: 'Data Saved Successfully!',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'ok'
                                    }).then((result) => {
                                        if (result.value) {
                                            location.reload();
                                        }
                                    });
                                }
                            });
                        }
                    })
                }
            }
        });
    })

});