$(document).ready(function () {
///////////////////load completed to COM//////////////////////
    loadAppoinmentNumbersCompleteCOM();

    function loadAppoinmentNumbersCompleteCOM() {

        $.ajax({
            url: 'RadiologistReportingLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'loadRadioCompleteCOM'
            },
            success: function (data) {
                var co = 0;
                if (data.result.length != '') {
                    var html = '';
                    $(data.result).each(function (key, val) {
                        co++;
                        html += '<tr class="appNum" style="cursor: pointer;">';
                        html += '<td>' + co + '</td>'
                        html += '<td>' + val.temp_app_no + '</td>';
                        html += '<td>' + val.PassportNumber + '</td>';
                        html += '<td>' + val.FirstName + " " + val.LastName + '</td>';
                        html += '<td>' + val.DateOfBirth + '</td>';
                        html += '<td>' + val.Gender + '</td>';
                        html += '</tr>'
                    });
                    $('#appbodyCompleteCOM').html('');
                    $('#appbodyCompleteCOM').html(html);
                } else {
                    $('#appbodyCompleteCOM').html('');
                    $('#appbodyCompleteCOM').html('<tr><td colspan="6">No Appointment Numbers</td></tr>');
                }
            },
            complete: function (data) {
                loadDataTable();
            }
        });

    }

    //Data Table Plugin Initiate
    function loadDataTable() {
        var table1 = $('#tblCompleteCOM').DataTable({
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

    //appointment no onclick
    $(document).on('click', "tr.appNum", function () {

        $('tr.appNum').removeClass('clickedRow');
        $(this).addClass('clickedRow');

        var appno = $(this).find('td:nth-child(2)').text();
        localStorage.setItem('appNoCOM', appno);
        window.open(urlPath + '/RadiologistReporting');

    });


});