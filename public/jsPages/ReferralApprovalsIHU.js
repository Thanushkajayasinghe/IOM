$(document).ready(function () {

    loadTable();

    function loadTable() {
        //wait();
        $.ajax({
            url: 'ReferralApprovalIHU',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                function: 'loadData'
            },
            success: function (data) {

                var html = "";
                $(data.result).each(function (key, val) {
                    html += "<tr attr-status='" + val.status + "' attr-col='" + val.col + "'>";
                    html += "<td></td>";
                    html += "<td>" + val.refer + "</td>";
                    html += "<td>" + val.registration_no + "</td>";
                    if (val.status == "refer_to_nsacp_hiv_elisa") {
                        html += "<td attr-tbl='" + val.status + "'></td>";
                    } else {
                        html += "<td></td>";
                    }
                    if (val.status == "refer_to_afc") {
                        html += "<td attr-tbl='" + val.status + "'>" + val.test_result + "</td>";
                    } else {
                        html += "<td></td>";
                    }
                    if (val.status == "refer_to_malaria") {
                        html += "<td attr-tbl='" + val.status + "'>" + val.test_result + "</td>";
                    } else {
                        html += "<td></td>";
                    }
                    if (val.status == "refer_to_tb") {
                        html += "<td attr-tbl='" + val.status + "'>" + val.test_result + "</td>";
                    } else {
                        html += "<td></td>";
                    }
                    html += "<td><input class=\"form-control\" type=\"checkbox\" id='chkRefApIHU" + key + "'>" +
                        "<label for='chkRefApIHU" + key + "' style=\"font-weight: 700;\"></label></td>";
                    html += "<td style='display: none;'>" + val.serial + "</td>";
                    html += "</tr>";
                });

                $('#referralApprovalsIHUTbody').html();
                $('#referralApprovalsIHUTbody').html(html);
                //closewait();
            }, complete: function () {
                loadDataTable();
            }
        });
    }

    //Data Table Plugin Initiate
    function loadDataTable() {
        var table1 = $('.referralAppIHUTbl').DataTable({
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

    //Refer to AFC save
    $('#btnReferralAppIHU').on('click', function () {

        Swal.fire({
            title: 'Are you sure?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, verify it!'
        }).then((result) => {
            if (result.value) {
                var i = 0;

                $('#referralApprovalsIHUTbody tr').each(function () {
                    var tr = $(this);

                    if (tr.find('td:nth-child(8) input').is(':checked')) {
                        i++;
                        var serial = tr.find('td:nth-child(9)').text();
                        var table = tr.attr('attr-status');
                        var col = tr.attr('attr-col');

                        $.ajax({
                            url: 'ReferralApprovalIHU',
                            type: 'POST',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            async: false,
                            data: {serial: serial, table: table, col: col, function: 'approve'},
                            success: function (data) {
                                if (data.result == true) {
                                    if (i == 1) {
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
                                }
                            }
                        });
                    }
                });
            }
        });

    })


});