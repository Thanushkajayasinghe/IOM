$(document).ready(function () {

    var co = 0;

    $('#datePref').on('change', function () {

        // co++;
        // if (co > 1) {
        //     $('.dataTable').DataTable().destroy();
        // }


        var date = $(this).val();

        $.ajax({
            url: 'RecommendationLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                function: 'LoadDataHIVReport',
                date: date
            },
            success: function (data) {

                var html = "";
                var no = 0;

                $(data.result).each(function (key, val) {

                    var dob = val.DateOfBirth;
                    dob = new Date(dob);
                    var today = new Date();
                    var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));

                    no++;
                    html += '<tr>';
                    html += '<td></td>';
                    html += '<td>' + date + '</td>';
                    html += '<td>' + val.FirstName + '</td>';
                    html += '<td>' + val.LastName + '</td>';
                    html += '<td>' + val.reg_passport + '</td>';
                    html += '<td>' + age + '</td>';
                    html += '<td>' + val.Gender + '</td>';
                    html += '<td>' + val.CountryOfOrigin + '</td>';
                    html += '<td>' + val.CdAddress + '</td>';
                    html += '<td>' + val.SponsorName + '</td>';
                    html += '<td>' + val.SponsorAddress + '</td>';
                    html += '</tr>';
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
            "order": [[1, 'asc']]
        });

        table1.on('order.dt search.dt', function () {
            table1.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    }


});
