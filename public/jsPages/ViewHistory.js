$('input[type="radio"]').attr('disabled', true);

$('#txtPassNo').on('change', function () {

    var valuePass = $(this).val();

    $.ajax({
        url: 'GetAppointmentNoFromPassport',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { passport: valuePass },
        success: function (data) {

            var options = '';
            options += '<option selected="selected">Select</option>';
            $(data.result).each(function (key, val) {
                options += '<option value="' + val.temp_app_no + '">' + val.temp_app_no + ' - (' + new Date(val.createddate).toISOString().split("T")[0] + ')</option>';
            });

            $('#drpAppNo').html("");
            $('#drpAppNo').html(options);
        }
    });
});

$('#drpAppNo').on('change', function () {

    var appointmentNo = $(this).val();

    $.ajax({
        url: 'ConsultationLoadFormData',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            appointment: appointmentNo
        },
        success: function (data) {

            $('#NameInFull').val(data[1] + ' ' + data[31]);
            $('#AppointmentDate').val(data[2]);
            $('#PassportNumber').val(data[4]);
            $('#PreviousPassportIfAny').val(data[5]);
            $('#birthdayCon').val(data[6]);
            $('#Country2').val(data[14])
            $('#ethnicity').val(data[8]);
            $('#CdAddress').val(data[9]);
            $('#CdStree').val(data[10]);
            $('#CdCity').val(data[11]);
            $('#CdStateProvince').val(data[12]);
            $('#CdPostalCode').val(data[13]);
            $('#CdCountry').val(data[14]);
            $('#CdTelephoneFixedLine').val(data[15]);
            $('#CdMobile').val(data[16]);
            $('#SlAddress').val(data[17]);
            $('#SlStreet').val(data[18]);
            $('#SlCity').val(data[19]);
            $('#SlStateProvince').val(data[20]);
            $('#SlPostalCode').val(data[21]);
            $('#srilanka').val(data[22]);
            $('#SlTelephoneFixedLine').val(data[23]);
            $('#SlMobile').val(data[24]);
            $('#PreferredContactMethod').val(data[25]);
            $('#SponsorName').val(data[26]);
            $('#SponsorTelephoneFixedLine').val(data[27]);
            $('#SponsorEmailAddress').val(data[28]);
            $('#SponsorMobile').val(data[29]);
            $('#AppointmentNumber').val(data[30]);
            $('#rad_comment2').val(data[55]);
            $('#dateOfarrival').val(data[56]);

            var img = '';
            if (data[54] != null && data[54] != "") {
                img = imgPath + '/' + data[54];
            } else {
                img = imgPathBlade + '/imgcou.png';
            }

            $('#img').attr('src', img);

            var dob1 = data[54];
            var dob = $.datepicker.formatDate('yy-mm-dd', new Date(dob1));
            var str = dob.split('-');
            var firstdate = new Date(str[0], str[1], str[2]);
            var today = new Date();
            var dayDiff = Math.ceil(today.getTime() - firstdate.getTime()) / (1000 * 60 * 60 * 24 * 365);
            var age = parseInt(dayDiff);

            if (age <= 15) {
                $('.hidpan').show();
            } else {
                $('.hidpan').hide();
                $('.chil').prop('checked', false).uniform('refresh');
            }

            var i, j;
            for (i = 1; i <= 22; i++) {
                for (j = 32; j <= 54; j++) {
                    $('#rchkbox' + i).prop('checked', false).uniform('refresh');
                }
            }

            var table = $('#rapidTestResultsTbl').DataTable();
            table.destroy();

            $.ajax({
                url: 'ConsultationLoadTestResults',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    appointment: appointmentNo
                },
                success: function (data) {

                    if (data.result != null) {
                        var html = "";
                        var co = 0;
                        $(data.result).each(function (key, val) {
                            co++;
                            if (val.prtr_result == "Positive") {
                                html += "<tr style=\"background-color: #fb0101 !important;color: white;font-weight: bold;\">";
                            } else {
                                html += "<tr>";
                            }
                            html += "<td style='display: none;'" + val.prtr_id + "</td>";
                            html += "<td>" + co + "</td>";
                            html += "<td>" + val.prtr_test + "</td>";
                            html += "<td>" + val.prtr_result + "</td>";
                            html += "<td><input class=\"form-control\" type=\"text\" id='txtComment" + key + "' value='" + val.prtr_comment + "'></td>";
                            html += "</tr>";
                        });

                        $(data.result2).each(function (key, val) {
                            co++;
                            if (val.prtr_result == "Positive") {
                                html += "<tr style=\"background-color: #fb0101 !important;color: white;font-weight: bold;\">";
                            } else {
                                html += "<tr>";
                            }
                            html += "<td style='display: none;'" + val.prtr_id + "</td>";
                            html += "<td>" + co + "</td>";
                            html += "<td>" + val.prtr_test + "</td>";
                            html += "<td>" + val.prtr_result + "</td>";
                            html += "<td><input class=\"form-control\" type=\"text\" id='txtComment" + key + "' value='" + val.prtr_comment + "'></td>";
                            html += "</tr>";

                        });

                        $('#rapidTestResultsTBody').html();
                        $('#rapidTestResultsTBody').html(html);
                        $('#tableContainer').show();
                    }
                }
            });
        }
    });
});



$('#print').on('click', function () {

    var appNo = $('#drpAppNo').val();

    $.ajax({
        url: 'SummaryReport',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            appNo: appNo
        },
        success: function (data) {
        },
        complete: function (data) {
            window.open(urlPath + '/generateSummaryReport?appNo=' + appNo);
        }
    });

});

//print certificate 1
$('#printCertificate1').on('click', function () {

    var appNo = $('#drpAppNo').val();

    $.ajax({
        url: 'generateCertificate',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            appNo: appNo
        },
        success: function (data) {
        },
        complete: function (data) {
            window.open(urlPath + '/generateCertificate?appNo=' + appNo);
        }
    });

});

//print certificate 2
$('#printCertificate2').on('click', function () {

    var appNo = $('#drpAppNo').val();
    var CXRtyp = $('#CXRay').val();

    var RE = "";
    if (CXRtyp == "Normal") {
        RE = "NO";
    } else if (CXRtyp == "Abnormal") {
        RE = "AB";
    }

    window.open(urlPath + '/generateCertificate2?appNo=' + appNo + '&TR=' + RE);

});