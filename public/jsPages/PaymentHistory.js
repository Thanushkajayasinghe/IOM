$('#datePref').on('change', function () {

    wait();

    var date = $(this).val();
    $('#familyMemTable').DataTable().destroy();

    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    var todayDate = yyyy + "/" + mm + "/" + dd;

    $.ajax({
        url: 'LodePaymentHistory',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            function: 'LodePayment',
            date: date
        },
        success: function (data) {

            closewait();

            var html = "";
            var amount = data.amount;

            $(data.result).each(function (key, val) {

                if (val.PassportNumber != null) {
                    var today = new Date();
                    var birthDate = new Date(val.DateOfBirth);
                    var age = today.getFullYear() - birthDate.getFullYear();
                    var m = today.getMonth() - birthDate.getMonth();
                    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                        age--;
                    }

                    html += '<tr>';
                    html += '<td></td>';
                    html += '<td>' + date + '</td>';
                    html += '<td>' + val.PassportNumber + '</td>';
                    html += '<td>' + val.AppointmentNumber + '</td>';
                    html += '<td>' + val.FirstName + '</td>';
                    html += '<td>' + val.LastName + '</td>';
                    html += '<td>' + val.DateOfBirth + '</td>';
                    html += '<td>' + age + '</td>';
                    html += '<td>' + val.Gender + '</td>';
                    html += '<td>' + val.Nationality + '</td>';
                    html += '<td>' + amount + '</td>';
                    html += '</tr>';
                }
            });

            $('#RTBody').html("");
            $('#RTBody').html(html);


        }, complete: function () {
            loadDataTable();
        }

    });
});


//Data Table Plugin Initiate
function loadDataTable() {

    var table1 = $('#familyMemTable').DataTable({
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
