//On Page Load
$(function () {

    loadTableData();
});


function loadTableData() {

    wait();

    $.ajax({
        url: 'ReferralApprovals',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {command: 'loadData'},
        success: function (data) {

            var html = "";
            var i = 0;
            $(data.result).each(function (key, val) {

                i++;
                html += "<tr arrt-status='" + val.status + "' attr-col='" + val.col + "'>";
                html += "<td></td>";
                html += "<td>" + val.refer + "</td>";
                html += "<td>" + val.registration_no + "</td>";
                html += "<td></td>";
                if (val.status == "refer_to_afc") {
                    html += "<td>" + val.test_result + "</td>";
                } else {
                    html += "<td></td>";
                }
                if (val.status == "refer_to_malaria") {
                    html += "<td>" + val.test_result + "</td>";
                } else {
                    html += "<td></td>";
                }
                if (val.status == "refer_to_tb") {
                    html += "<td>" + val.test_result + "</td>";
                } else {
                    html += "<td></td>";
                }
                html += "<td><input class=\"form-control\" type=\"checkbox\" id=\"chkDateReq" + i + "\">" +
                    "<label for=\"chkDateReq" + i + "\" style=\"font-weight: 700;\"></label></td>";
                html += "<td style='display: none;'>" + val.serial + "</td>";
                html += "</tr>";
            });

            $('#referralApprovalsTbody').html();
            $('#referralApprovalsTbody').html(html);

        }, complete: function () {
            closewait();
            loadDataTable();
        }
    });
}


//Data Table Plugin Initiate
function loadDataTable() {
    var table1 = $('.dataTablex').DataTable({
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


//On Approve Button Click
$('#btnApprove').on('click', function () {

    Swal.fire({
        title: 'Are you sure?',
        // text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, verify it!'
    }).then((result) => {
        if (result.value) {

            var co = 0;
            $('#referralApprovalsTbody tr').each(function () {

                const $this = $(this);

                if ($this.find('td:nth-child(8) input').is(':checked')) {

                    const serial = $this.find('td:nth-child(9)').text();
                    const table = $this.attr('arrt-status');
                    const col = $this.attr('attr-col');

                    $.ajax({
                        url: 'ReferralApprovals',
                        type: 'POST',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        async: false,
                        data: {serial: serial, table: table, col: col, command: 'approve'},
                        success: function (data) {
                            if (data.result == true) {

                                co++;
                            }
                        }
                    });
                }
            });


            if (co > 0) {
                Swal(
                    'Saved Successfully!',
                    '',
                    'success'
                );

                $('.dataTablex').DataTable().destroy();
                loadTableData();
            }
        }
    });
});

