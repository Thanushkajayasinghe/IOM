$(document).ready(function () {

    $(".date-pick").datepicker({
        dateFormat: 'yy/mm/dd',
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+100"
    }).datepicker("setDate", new Date());

    loadAppointments();

    function loadAppointments() {
        $.ajax({
            url: 'ApplicantWiseAuditTrailLoadAppNo',
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
                    options += '<option value="' + val.appno + '">' + val.appno + '</option>';
                });

                $('#drpAppointmentNo').html("");
                $('#drpAppointmentNo').html(options);
            }
        });
    }

    wait();
    loadTable(null);

    $('#drpAppointmentNo').on('change', function () {
        var val = $(this).val();
        loadTable(val);
    });

    $('#txtDateSelect').on('change', function () {
        var val = $('#drpAppointmentNo').val();
        loadTable(val);
    });

    function loadTable(x) {

        $.ajax({
            url: 'ApplicantWiseAuditTrail',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {appNo: x, dateSel: $('#txtDateSelect').val()},
            success: function (data) {

                var html = "";

                $(data.result).each(function (key, val) {

                    html += "<tr>";
                    html += "<td></td>";
                    html += "<td>" + val.appno + "</td>";
                    html += "<td>" + val.PassportNumber + "</td>";

                    html += "<td>" + val.reguserid + "</td>";
                    var dt = new Date(val.regitration);
                    var timeReg = (dt.getHours() < 10 ? "0" : "") + dt.getHours() + ":" + (dt.getMinutes() < 10 ? "0" : "") + dt.getMinutes() + ":" + (dt.getSeconds() < 10 ? "0" : "") + dt.getSeconds();
                    html += "<td>" + timeReg + "</td>";

                    html += "<td>" + val.couuserid + "</td>";
                    var dtCou = new Date(val.counselling);
                    var timeCou = (dtCou.getHours() < 10 ? "0" : "") + dtCou.getHours() + ":" + (dtCou.getMinutes() < 10 ? "0" : "") + dtCou.getMinutes() + ":" + (dtCou.getSeconds() < 10 ? "0" : "") + dtCou.getSeconds();
                    html += "<td>" + timeCou + "</td>";

                    html += "<td>" + val.cxruserid + "</td>";
                    var dtCxr = new Date(val.cxr);
                    var timeCxr = (dtCxr.getHours() < 10 ? "0" : "") + dtCxr.getHours() + ":" + (dtCxr.getMinutes() < 10 ? "0" : "") + dtCxr.getMinutes() + ":" + (dtCxr.getSeconds() < 10 ? "0" : "") + dtCxr.getSeconds();
                    html += "<td>" + timeCxr + "</td>";

                    html += "<td>" + val.phluserid + "</td>";
                    var dtPhl = new Date(val.phlbotomy);
                    var timePhl = (dtPhl.getHours() < 10 ? "0" : "") + dtPhl.getHours() + ":" + (dtPhl.getMinutes() < 10 ? "0" : "") + dtPhl.getMinutes() + ":" + (dtPhl.getSeconds() < 10 ? "0" : "") + dtPhl.getSeconds();
                    html += "<td>" + timePhl + "</td>";

                    html += "<td>" + val.conuserid + "</td>";
                    var dtCon = new Date(val.consultation);
                    var timeCon = (dtCon.getHours() < 10 ? "0" : "") + dtCon.getHours() + ":" + (dtCon.getMinutes() < 10 ? "0" : "") + dtCon.getMinutes() + ":" + (dtCon.getSeconds() < 10 ? "0" : "") + dtCon.getSeconds();
                    html += "<td>" + timeCon + "</td>";

                    html += "</tr>";
                });

                var table = $('#tableCoN').DataTable();
                table.destroy();
                $('#appNoStatTbody').html('');
                $('#appNoStatTbody').html(html);
                closewait();

            }, complete: function () {
                loadDataTable();
            }
        });
    }

    //Data Table Plugin Initiate
    function loadDataTable() {
        var table = $('#tableCoN').DataTable({
            "pageLength": 25,
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            dom: 'Blfrtip'
        });

        table.on('order.dt search.dt', function () {
            table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    }



});
