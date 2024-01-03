//Load a All Main Applicant Appointment Numbers
loadAppointmentNumbers();

function loadAppointmentNumbers() {

    $.ajax({
        url: 'loadFamilyAppointmentNo',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {},
        success: function (data) {

            var html = "";
            html += "<option></option>";
            $(data.result).each(function (key, val) {
                html += "<option attr_fkid='" + val.FkId + "'>" + val.AppointmentNumber + "</option>";
            });

            $('#dropMainUserAppointmentNo').html("");
            $('#dropMainUserAppointmentNo').html(html);

        }
    });
}

var arrivalDate = "";
var countryOfOrigin = "";
var emailAddress = "";
var SlAddress = "";
var SlStreet = "";
var SlCity = "";
var SlPostalCode = "";
var SlTelephoneFixedLine = "";
var SlMobile = "";
var SponsorName = "";
var SponsorTelephoneFixedLine = "";
var SponsorEmailAddress = "";
var SponsorMobile = "";
var SponsorAddress = "";
var StatusSaveOrSubmith = "";
var visaRenewalOrNot = "";
var emergencyContactNo = "";

//Load Member Appointments on drop down change
$('#dropMainUserAppointmentNo').on('change', function () {

    const appNo = $(this).val();

    $.ajax({
        url: 'loadMemAppointmentNo',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {appNo: appNo},
        success: function (data) {

            var html = "";
            $.each(data.result, function (key, val) {

                html += "<div class='col-md-2 form-group memAppPanel' attr-mem-stat='" + val.MemberStatus + "'>";
                html += "<div class='row form-group'>";
                html += "<div class='col-md-11' style=\"background: linear-gradient(135deg,#6394ff 0%,#284380 100%);padding: 8px 12px 0px;color: white;text-align: center;border-radius: 9px;border: 2px solid #ffb3b3;\">";
                html += "<p>" + val.AppointmentNumber + "</p>";
                html += "</div>";
                html += "</div>";
                html += "</div>";
            });

            $('#memContainer').html("");
            $('#memContainer').html(html);


            $('#appDate').val(data.other[0].date);
            $('#appTime').val(data.other[0].time);
            arrivalDate = data.regApp[0].DateOfArrival;
            countryOfOrigin = data.regApp[0].CountryOfOrigin;
            emailAddress = data.regApp[0].EmailAddress;
            SlAddress = data.regApp[0].SlAddress;
            SlStreet = data.regApp[0].SlStreet;
            SlCity = data.regApp[0].SlCity;
            SlPostalCode = data.regApp[0].SlPostalCode;
            SlTelephoneFixedLine = data.regApp[0].SlTelephoneFixedLine;
            SlMobile = data.regApp[0].SlMobile;
            SponsorName = data.regApp[0].SponsorName;
            SponsorTelephoneFixedLine = data.regApp[0].SponsorTelephoneFixedLine;
            SponsorEmailAddress = data.regApp[0].SponsorEmailAddress;
            SponsorMobile = data.regApp[0].SponsorMobile;
            SponsorAddress = data.regApp[0].SponsorAddress;
            StatusSaveOrSubmith = data.regApp[0].StatusSaveOrSubmith;
            visaRenewalOrNot = data.regApp[0].visaRenewalOrNot;
            emergencyContactNo = data.regApp[0].emergencyContactNo;
        }
    });
});

//Save
$('#separate').on('click', function () {

    $('.memAppPanel').each(function () {
        var $this = $(this);
        if ($this.attr('attr-mem-stat') == "OtherMember") {

            var appNo = $this.find('p').text();
            var date = $('#appDate').val();
            var time = $('#appTime').val();
            var fkid = $('#dropMainUserAppointmentNo option:selected').attr('attr_fkid');
            var mainCurrentAppNo = $('#dropMainUserAppointmentNo').val();

            $.ajax({
                url: 'SeparateFamily',
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    appNo: appNo,
                    date: date,
                    time: time,
                    fkid: fkid,
                    mainCurrentAppNo: mainCurrentAppNo,
                    arrivalDate: arrivalDate,
                    countryOfOrigin: countryOfOrigin,
                    emailAddress: emailAddress,
                    SlAddress: SlAddress,
                    SlStreet: SlStreet,
                    SlCity: SlCity,
                    SlPostalCode: SlPostalCode,
                    SlTelephoneFixedLine: SlTelephoneFixedLine,
                    SlMobile: SlMobile,
                    SponsorName: SponsorName,
                    SponsorTelephoneFixedLine: SponsorTelephoneFixedLine,
                    SponsorEmailAddress: SponsorEmailAddress,
                    SponsorMobile: SponsorMobile,
                    SponsorAddress: SponsorAddress,
                    StatusSaveOrSubmith: StatusSaveOrSubmith,
                    visaRenewalOrNot: visaRenewalOrNot,
                    emergencyContactNo: emergencyContactNo
                },
                success: function (data) {


                }, complete: function () {

                    Swal.fire({
                        type: 'success',
                        title: 'Data Saved Successfully!',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    });
                }
            });
        }
    });
});



