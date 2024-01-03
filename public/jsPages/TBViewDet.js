loadPassport();
function loadPassport() {
    $.ajax({
        url: 'tbViewDetPassportDrpLoad',
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
                options += '<option value="' + val.id + '">' + val.ps_passp_no + '</option>';
            });

            $('#drpPassportNo').html("");
            $('#drpPassportNo').html(options);
        }
    });
}


loadAppointments();
function loadAppointments() {
    $.ajax({
        url: 'tbViewDetAppointmentsDrpLoad',
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
                options += '<option value="' + val.id + '">' + val.ps_app_no + '</option>';
            });

            $('#drpAppointmentNo').html("");
            $('#drpAppointmentNo').html(options);
        }
    });
}


$('#drpAppointmentNo').on('change', function () {
    var value = $(this).val();

    $('#drpPassportNo').val(value).trigger('change.select2');
});


$('#drpPassportNo').on('change', function () {
    var value = $(this).val();

    $('#drpAppointmentNo').val(value).trigger('change.select2');
});


$('#btnRefresh').on('click', function (){
    location.reload();
});


$('#btnSearch').on('click', function () {

    var passport = $('#drpPassportNo option:selected').text();
    if(passport == "Select"){
        passport = "";
    }
    var appointment = $('#drpAppointmentNo').val();
    var program = $('#drpProgram').val();
    var dateFrom = $('#txtDateFrom').val();
    var dateTo = $('#txtDateTo').val();

    $.ajax({
        url: 'dppresultload',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {passport: passport, appointment: appointment, program: program, dateFrom: dateFrom, dateTo: dateTo},
        success: function (data) {

            var html = "";
            $(data.res1).each(function (key, val) {
                html += '<tr class="trClickable">';
                html += '<td>' + val.barcode + '</td>';
                html += '<td>' + val.passport + '</td>';
                html += '<td>TB</td>';
                html += '<td>' + val.testdate + '</td>';
                html += '<td style="display: none">' + val.id + '</td>';
                html += '<td class="text-center"><button class="btn btn-warning btn-sm btnDismiss" type="button" style="padding: 2px 8px;">End</button></td>';
                html += '</tr>';
            });

            $(data.res4).each(function (key, val) {
                html += '<tr class="trClickable">';
                html += '<td>' + val.barcode + '</td>';
                html += '<td>' + val.passport + '</td>';
                html += '<td>HIV</td>';
                html += '<td>' + val.testdate + '</td>';
                html += '<td style="display: none">' + val.id + '</td>';
                html += '<td class="text-center"><button class="btn btn-warning btn-sm btnDismiss" type="button" style="padding: 2px 8px;">End</button></td>';
                html += '</tr>';
            });

            $('#testLoadingTbody').html("");
            $('#testLoadingTbody').html(html);
        }
    });
});


$(document).on('click', '.trClickable', function () {

    wait();

    var password = $(this).find('td:nth-child(2)').text();

    $.ajax({
        url: 'tbViewDetLoadData',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {password: password},
        success: function (data) {

            closewait();

            $('#txtFirstName').val(data.result[0].FirstName);
            $('#txtLastName').val(data.result[0].LastName);

            var dob = data.result[0].DateOfBirth;
            dob = new Date(dob);
            var today = new Date();
            var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));

            $('#txtAge').val(age);
            $('#txtGender').val(data.result[0].Gender);
            $('#txtCountryOfOrigin').val(data.result[0].CountryOfOrigin);
            $('#txtAddress').val(data.result[0].SlAddress + ', ' + data.result[0].SlStreet + ', ' + data.result[0].SlCity);
            $('#txtSponsorName').val(data.result[0].SponsorName);
            $('#txtSponsorAddress').val(data.result[0].SponsorAddress);
            $('#txtXray').val(data.result[0].cm_exams_results);
            $('#txtGeneXpert').val(data.result[0].genexpert);
            $('#txtSutumCollected').val(data.result[0].liquidculture);
        }
    });
});




