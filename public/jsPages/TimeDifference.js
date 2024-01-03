$('#btnSearch').on('click', function () {

    var txtDateFrom = $('#txtDateFrom').val();

    $.ajax({
        url: 'ViewTimeDifference',
        type: 'post',
        dataType: 'json',
        async: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {txtDateFrom: txtDateFrom, txtDateTo: txtDateFrom},
        success: function (data) {

            var html = ' <thead style="background-color: darkslategray; color: wheat;"><tr><th>Token No</th><th>Passport No</th>\n' +
                ' <th>Appointment No</th><th>Start Time</th><th>End Time</th><th>Time Differnce (minutes)</th></tr></thead>';

            var avgArr = [];

            html += '<tbody>';
            $(data.result).each(function (key, val) {
                if (val.temp_token_no < 500) {
                    html += '<tr>';
                    html += '<td>' + val.temp_token_no + '</td>';
                    html += '<td>' + val.temp_passport + '</td>';
                    html += '<td>' + val.temp_app_no + '</td>';
                    html += '<td>' + val.regitration + '</td>';

                    if (val.consultation == null) {

                        html += '<td> - </td>';
                        html += '<td> - </td>';
                    } else {
                        html += '<td>' + val.consultation + '</td>';

                        var d1 = new Date(val.regitration);
                        var d2 = new Date(val.consultation);
                        var seconds = (d2.getTime() - d1.getTime()) / 1000;
                        var Min = (seconds / 60);
                        html += '<td>' + Min.toFixed(2) + '</td>';
                        if (Min.toFixed(2) < 400) {
                            avgArr.push(Min.toFixed(2));
                        }
                    }

                    html += '</tr>';
                }
            });

            var sum = 0;
            for (var i = 0; i < avgArr.length; i++) {
                sum += parseInt(avgArr[i], 10);
            }

            var avg = sum / avgArr.length;

            html += '</tbody>';
            html += ' <tfoot><tr><th colspan="5" style="text-align: right; font-size: 0.9rem; font-weight: bold;">Average Time:</th>\n' +
                ' <th style="font-size: 0.9rem; font-weight: bold;">' + avg.toFixed(2) + '</th></tr></tfoot>';

            $('#tblAvgTime').html("");
            $('#tblAvgTime').html(html);


            loadDataTable();

        }, complete: function () {


        }
    });
});


function loadDataTable() {
    $('#tblAvgTime').DataTable().destroy();
    var table = $('#tblAvgTime').DataTable({
        dom: 'Blfrtip',
        "pageLength": 25,
        "order": [[0, 'asc']]
    });
}
