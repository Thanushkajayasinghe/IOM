$('.checkbox').on('click', function () {
    if ($(this).find('input').attr('id') == "appDetTypeFamily") {
        if ($('#appDetTypeFamily').is(':checked')) {
            $('#noOfFamily').show();
            $('#noOfFamilyMembers').val("");
        } else {
            $('#noOfFamily').hide();
            $('#noOfFamilyMembers').val("");
        }
    } else if ($(this).find('input').attr('id') == "appDetTypeIndividual") {
        $('#noOfFamily').hide();
        $('#noOfFamilyMembers').val("");
    }
});

$('#btnSelectAppointment').on('click', function () {

    var dateSelected = new Date();
    dateSelected.setDate(dateSelected.getDate() + parseInt(0));
    var monthx = (dateSelected.getMonth() + 1);
    if (dateSelected.getMonth() < 9)
        monthx = "0" + monthx;

    var dayx = (dateSelected.getDate());
    if (dateSelected.getDate() < 10)
        dayx = "0" + dayx;

    var dateSelected = dateSelected.getFullYear() + "-" + monthx + "-" + dayx;

    var date = new Date(dateSelected);
    date.setDate(date.getDate() + parseInt(40));
    var nextDate = date.getFullYear() + "-" + LPad(date.getMonth() + 1, 2) + "-" + LPad(date.getDate(), 2);

    var dateArray = getDates(new Date(dateSelected), new Date(nextDate));

    $.ajax({
        url: '/IOM/HolidayCalenderLoadDataApi',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            minDateSend: dateSelected,
            maxDateSend: nextDate,
            dateArray: dateArray
        },
        success: function (data) {

            var holiday = [];
            var notAvailableDates = [];
            var closeddates = [];

            const dataX = (data);

            $.each(dataX.holidays, function (key, val) {
                holiday.push(new Date(val));
            });

            $.each(dataX.closeddates, function (key, val) {
                var closeddate = new Date(val.date);
                var wer = closeddate.getDate() + "-" + (closeddate.getMonth() + 1) + "-" + closeddate.getFullYear();
                closeddates.push(wer);
            });

            const startDate = new Date(dateSelected);
            var endDate = startDate,
                noOfDaysToAdd = 100,
                count = 0;

            while (count < noOfDaysToAdd) {
                endDate.setDate(endDate.getDate() + 1);
                if (endDate.getDay() != 0 && endDate.getDay() != 6 && !isHoliday(endDate, holiday)) {
                    count++;
                }
            }

            $('#calenderPanelSel').datepicker('destroy');

            // Initialize
            $('#calenderPanelSel').datepicker({
                dateFormat: 'yy-mm-dd',
                onSelect: function (dateText, inst) {
                    selectedDate = $(this).val();
                    inst.show()
                },
                beforeShowDay: function (date) {

                    var unavailableDates = closeddates;

                    var dateTime = new Date();
                    var hour = dateTime.getHours();

                    if (hour > 14) {
                        dateTime.setDate(dateTime.getDate() + 1);
                        let addTomorrowAsUnavailable = dateTime.getDate() + "-" + (dateTime.getMonth() + 1) + "-" + dateTime.getFullYear();
                        unavailableDates.push(addTomorrowAsUnavailable);
                    }

                    dmy = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();

                    if ($.inArray(dmy, unavailableDates) < 0) {
                        var month = (date.getMonth() + 1);
                        if (date.getMonth() < 9)
                            month = "0" + month;

                        var day = (date.getDate());
                        if (date.getDate() < 10)
                            day = "0" + day;

                        var ymd = date.getFullYear() + "-" + month + "-" + day;

                        var noWeekend = $.datepicker.noWeekends(date);
                        if (noWeekend[0]) {

                            if ($.inArray(ymd, dataX.holidays) != -1) {
                                return [false, "holiDay", "Holiday"];
                            }

                            return [$.inArray(ymd, dataX.holidays) == -1];
                        } else {
                            return noWeekend;
                        }

                    } else {
                        return [false, "", "Booked Out"];
                    }
                }
            });

            //Set minDate
            if (dateSelected != '') {
                $('#calenderPanelSel').datepicker('option', 'minDate', new Date(dateSelected));
            }

            if (new Date(dateSelected).getTime() <= new Date().getTime()) {

                $('#calenderPanelSel').datepicker('option', 'minDate', 1);
            }

            //Set maxDate
            if (endDate != '') {
                $('#calenderPanelSel').datepicker('option', 'maxDate', new Date(endDate));
            }

            $('.ui-state-default').attr('href', 'javascript:void(0);');
        }
    });

    $('#timeContainer').html("");
    $('#modalSelectAppointment').modal().show();
});

$(document).on('click', '.ui-datepicker-next', function () {
    setTimeout(function () {
        $('.ui-state-default').attr('href', 'javascript:void(0);');
    }, 1500);
});

$(document).on('click', '.ui-datepicker-prev', function () {
    setTimeout(function () {
        $('.ui-state-default').attr('href', 'javascript:void(0);');
    }, 1500);
});

function LPad(sValue, iPadBy) {
    sValue = sValue.toString();
    return sValue.length < iPadBy ? LPad("0" + sValue, iPadBy) : sValue;
}

Date.prototype.addDays = function (days) {
    var dat = new Date(this.valueOf())
    dat.setDate(dat.getDate() + days);
    return dat;
}

function getDates(startDate, stopDate) {
    var dateArray = new Array();
    var currentDate = startDate;
    while (currentDate <= stopDate) {
        dateArray.push(formatDate(currentDate))
        currentDate = currentDate.addDays(1);
    }
    return dateArray;
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}

function isHoliday(dt, arr) {
    var bln = false;
    for (var i = 0; i < arr.length; i++) {
        if (compare(dt, arr[i])) {
            //If days are not holidays
            bln = true;
            break;
        }
    }
    return bln;
}

function compare(dt1, dt2) {
    var equal = false;
    if (dt1.getDate() == dt2.getDate() && dt1.getMonth() == dt2.getMonth() && dt1.getFullYear() == dt2.getFullYear()) {
        equal = true;
    }
    return equal;
}

var timeArray = [];
var selectedDateVar = "";
$(document).on('click', '.ui-state-default', function () {

    $('#timeContainer').html("");
    $('#selectedDate').text("");
    $('#selectedTime').text("");

    if (!$(this).parent().hasClass('ui-state-disabled')) {

        const $this = $(this);

        //Highlight Selected Date
        $('.ui-datepicker-calendar tbody tr td').removeClass('SelectedDate');
        $this.parent().addClass('SelectedDate');

        const day = parseInt($this.text());
        const month = parseInt($this.parent().attr('data-month')) + 1;
        const year = parseInt($this.parents('table').prev().find('.ui-datepicker-title .ui-datepicker-year').text());
        const date = "" + year + "-" + String("00" + month).slice(-2) + "-" + String("00" + day).slice(-2) + "";

        var myDate = new Date();
        myDate.setDate(myDate.getDate() + 1);
        var tommorwDate = myDate.getFullYear() + "-" + ("0" + (myDate.getMonth() + 1)).slice(-2) + "-" + ("0" + myDate.getDate()).slice(-2);
        if (tommorwDate == date) {

            var now = new Date();
            var closeTime = new Date();
            closeTime.setHours(15);
            if (now.getTime() >= closeTime.getTime()) {
                swal({
                    title: "Cannot book for tommorrow after 3 o'clock",
                    text: "Please select another date",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'OK!'
                }).then(function () {
                    closewait();
                });

                return;
            }
        }

        selectedDateVar = date;

        var MemberCount = 0;
        if ($('[id="appDetTypeFamily"]').is(':checked')) {
            MemberCount = $('#noOfFamilyMembers').val();
            MemberCount++;
        } else if ($('[id="appDetTypeIndividual"]').is(':checked')) {
            MemberCount = 1;
        }

        const noOfMembers = MemberCount;

        $.ajax({
            url: '/IOM/LoadTimeAvailableMhac',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                date: date,
                country: location.href.substring(location.href.lastIndexOf('/') + 1)
            },
            success: function (data) {

                var html = "";
                $(data.result).each(function (k, v) {

                    var co = k + 1;

                    const time = v.split("-")[0];
                    var count = parseInt(v.split("-")[1]);
                    var countAll = parseInt(v.split("-")[2]);


                    html += '<div class="col-md-2 col-lg-2 col-md-4 col-sm-6 col-xs-6 form-group timePanel" style="padding: 0;">';
                    html += '<div class="cardX cardX-1">';
                    html += '<div class="cardX-top available"></div>';

                    timeArray.push(time);
                    html += '<div class="cardX-info">';
                    html += '<div class="cardX-cost" style="padding-top: 22px;">';
                    html += '<div class="cardX-value">' + time + '</div>';
                    html += '</div>';
                    html += '<div class="cardX-lines">';
                    html += '<div class="progressLineContainer">';
                    html += '<div class="progressLine" style="width: 0%;"></div>';
                    html += '</div>';
                    html += '<span class="">' + location.href.substring(location.href.lastIndexOf('/') + 1) + ': ' + count + '</span>';
                    html += '<span class="">Total: ' + countAll + '</span>';
                    html += '</div></div></div></div>';

                });


                html += '<div class="col-md-2 col-lg-2 col-md-4 col-sm-6 col-xs-6 form-group" style="display: none;">';
                html += '<div class="cardX cardX-1" style="pointer-events: none;">';
                html += '<div class="cardX-top notAvailable"> Not Available</div>';
                html += '<div class="cardX-info">';
                html += '<div class="cardX-cost" style="margin-top: 5px;">';
                html += '<div class="cardX-value">notime</div>';
                html += '</div>';
                html += '<div class="cardX-lines">';
                html += '<div class="progressLineContainer">';
                html += '<div class="progressLine" ></div>';
                html += '</div>';
                html += '<span class="">0/7</span>';
                html += '</div></div></div></div>';

                $('#timeContainer').html("");
                $('#timeContainer').html(html);
            }
        });
    }
});

var selectedime = "";
$(document).on('click', '.cardX', function () {

    if ($('[id="appDetTypeFamily"]').is(':checked')) {
        if ($('#noOfFamilyMembers').val() == "") {
            Swal(
                'No Of Members Cannot be empty!',
                ``,
                'error'
            )

            return;
        }
    }

    $('.cardX').removeClass('selectedTime');
    $(this).addClass('selectedTime');
    const time = $(this).parent().index();

    $('#selectedDate').text(selectedDateVar);
    $('#selectedTime').text(timeArray[time]);

    selectedime = timeArray[time];
});

var memCount = 0;
$('#noOfFamilyMembers').on('change', function () {
    var value = $(this).val().replace(/[^0-9]/g, '');
    $(this).val(value);

    var html = `<div class="col-md-12">
    <h2>Members Details</h2>
    </div>

    <div class="col-md-12">
    <div class="row">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped text-center">
            <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Passport No</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tbodyMem">`;

    for (var i = 0; i < value; i++) {
        var co = parseInt(i + 1);
        html += `<tr>
        <td>${co}</td><td></td><td></td><td></td><td></td><td></td><td></td>
        <td><span class="fa fa-pencil btnMemEdit" style="color: blue; font-size: 1.5rem; cursor: pointer;"></span></td>
        <td><span class="fa fa-close btnMemDelete" style="color: red; font-size: 1.5rem; cursor: pointer;"></span></td>
        </tr>`;
    }

    html += `</tbody></table></div></div></div>`;

    $('#memberContainer').html("");
    $('#memberContainer').html(html);
});

$(document).on('click', '.btnMemEdit', function () {

    $('#drpOtherMemTitle').val("");
    $('#memFirstName').val("");
    $('#memLastName').val("");
    $('#memDOB').val("");
    $('#memGender').val("");
    $('#memPassport').val("");

    $('#tbodyMem tr').removeClass('selectedMember');
    $(this).parents('tr').addClass('selectedMember');
    $('.memberEditModal').modal('show');
});

$(document).on('click', '.btnMemDelete', function () {
    $(this).parents('tr').remove();
});

$('#btnSaveMem').on('click', function () {
    let title = $('#drpOtherMemTitle').val();
    let firstName = $('#memFirstName').val();
    let lastName = $('#memLastName').val();
    let dob = $('#memDOB').val();
    let gender = $('#memGender').val();
    let passport = $('#memPassport').val();

    $('tr.selectedMember').find('td:nth-child(2)').text(title);
    $('tr.selectedMember').find('td:nth-child(3)').text(firstName);
    $('tr.selectedMember').find('td:nth-child(4)').text(lastName);
    $('tr.selectedMember').find('td:nth-child(5)').text(dob);
    $('tr.selectedMember').find('td:nth-child(6)').text(gender);
    $('tr.selectedMember').find('td:nth-child(7)').text(passport);

    $('.memberEditModal').modal('hide');
});

$('#btnSave').on('click', function () {
    $('#btnSave').attr('disabled', true).text('Please Wait!');

    var applicationType = "";
    var memberCount = 0;
    if ($('[id="appDetTypeFamily"]').is(':checked')) {
        applicationType = "Family";
        memberCount = $('#noOfFamilyMembers').val();
        memberCount++;
    } else if ($('[id="appDetTypeIndividual"]').is(':checked')) {
        applicationType = "Individual";
        memberCount = 1;
    }
    var memType = "MainMember";
    var passportNo = $('#txtMainPassNo').val();
    if (passportNo == "") {
        $('#btnSave').attr('disabled', false).text('Save');
        iziToast.error({ title: 'Error', message: 'Passport No Required!', position: 'topRight' });
        return;
    }
    var country = location.href.substring(location.href.lastIndexOf('/') + 1);
    var appointmentDate = $('#selectedDate').text();
    if (appointmentDate == "") {
        $('#btnSave').attr('disabled', false).text('Save');
        iziToast.error({ title: 'Error', message: 'Appointment Date Required!', position: 'topRight' });
        return;
    }
    var appointmentTime = $('#selectedTime').text();
    if (appointmentTime == "") {
        $('#btnSave').attr('disabled', false).text('Save');
        iziToast.error({ title: 'Error', message: 'Appointment Time Required!', position: 'topRight' });
        return;
    }

    var title = $('#drpTitle').val();
    var firstName = $('#txtFirstName').val();
    if (firstName == "") {
        $('#btnSave').attr('disabled', false).text('Save');
        iziToast.error({ title: 'Error', message: 'First Naame Required!', position: 'topRight' });
        return;
    }
    var lastName = $('#txtLastName').val();
    var dob = $('#txtDob').val();
    var gender = $('#drpGender').val();
    var MainApplicantspecialMedicalNeedsCheck = "false";
    if ($('[id="MainApplicantspecialMedicalNeedsCheck"]').is(':checked')) {
        MainApplicantspecialMedicalNeedsCheck = "true";
    } else {
        MainApplicantspecialMedicalNeedsCheck = "false";
    }
    var email = $('#txtEmail').val();

    var mainAddLine1 = $('#txtMainAddLine1').val();
    var mainAddLine2 = $('#txtMainAddLine2').val();
    var mainCity = $('#txtMainCity').val();
    var mainPostalCode = $('#txtMainPostalCode').val();
    var mainContactNoHome = $('#txtMainContactNoHome').val();
    var mainContactNoMobile = $('#txtMainContactNoMobile').val();

    var mainMemData = {
        applicationType: applicationType,
        memberCount: memberCount,
        memType: memType,
        passportNo: passportNo,
        appointmentDate: appointmentDate,
        appointmentTime: appointmentTime,
        country: country,

        title: title,
        firstName: firstName,
        lastName: lastName,
        dob: dob,
        gender: gender,
        medicalReq: MainApplicantspecialMedicalNeedsCheck,
        email: email,

        mainAddLine1: mainAddLine1,
        mainAddLine2: mainAddLine2,
        mainCity: mainCity,
        mainPostalCode: mainPostalCode,
        mainContactNoHome: mainContactNoHome,
        mainContactNoMobile: mainContactNoMobile
    };

    var otherMemData = [];
    if ($('#tbodyMem tr').length > 0) {
        $('#tbodyMem tr').each(function () {
            var $this = $(this);

            var omemTitle = $this.find('td:nth-child(2)').text();
            var omemFirstName = $this.find('td:nth-child(3)').text();
            var omemLastName = $this.find('td:nth-child(4)').text();
            var omemDob = $this.find('td:nth-child(5)').text();
            var omemGender = $this.find('td:nth-child(6)').text();
            var omemPassportNo = $this.find('td:nth-child(7)').text();

            var rowData = {
                title: omemTitle,
                firstName: omemFirstName,
                lastName: omemLastName,
                dob: omemDob,
                gender: omemGender,
                passportNo: omemPassportNo
            };

            otherMemData.push(rowData);
        });
    }


    var requestData = {
        mainMemData: mainMemData,
        otherMemData: otherMemData
    };

    $.ajax({
        url: '/IOM/SaveMakeAppointment',
        type: 'post', 
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: requestData,
        success: function (data) {
            if (data.result == true) {

                $('#btnSave').attr('disabled', false).text('Save');

                Swal.fire({
                    type: 'success',
                    title: 'Data Saved Successfully!',
                    text: 'Main Applicant Appointment No - ' + data.appointmentno[0],
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    location.reload(true);
                });
            }
        }
    });
});

