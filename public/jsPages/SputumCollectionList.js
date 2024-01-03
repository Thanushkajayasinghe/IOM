$(document).ready(function () {

    wait();

    $.ajax({
        url: 'loadSputumCollectionList',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {},
        success: function (data) {

            var html = "";
            $(data.result).each(function (key, val) {
                html += '<tr class="rowClickable">';
                html += '<td></td>';
                html += '<td>' + val.cm_app_no + '</td>';
                html += '<td>' + val.cm_pass_no + '</td>';
                html += '<td>' + val.barcode + '</td>';
                html += '<td>' + val.FirstName + ' ' + val.LastName + '</td>';
                html += '<td>' + val.DateOfBirth + '</td>';
                html += '<td>' + val.Gender + '</td>';
                html += '</tr>';
            });

            $('#appbody').html("");
            $('#appbody').html(html);

            closewait();
        }, complete: function () {
            loadDataTable();
        }
    });
});

// Load Data Table
function loadDataTable() {
    var table = $('#tblSputumCollList').DataTable({
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        dom: 'Blfrtip',
        "order": [[1, 'DESC']]
    });

    table.on('order.dt search.dt', function () {
        table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
}


$(document).on('click', '.rowClickable', function () {

    const barcode = $(this).find('td:nth-child(4)').text();
	const appNO = $(this).find('td:nth-child(2)').text();

    localStorage.setItem("barcode", barcode);
	localStorage.setItem("appnoSputum", appNO);

    window.open('TBTestResult', '_self');
});
