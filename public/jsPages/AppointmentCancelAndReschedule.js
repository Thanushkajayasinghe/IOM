//Noty Load
Noty.overrideDefaults({
    theme: 'limitless',
    layout: 'topRight',
    type: 'alert',
    timeout: 1500
});


//Datepicker Initiate
$(function () {
    $('#calendar').datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: 0,
        onSelect: function (dateText, inst) {
            inst.show()
        }
    });

    $('.ui-state-default').attr('href', 'javascript:void(0);');
});


//PassportNo onchange
$('#txtPassportNo').on('change', function () {
    var passport = $(this).val();
    loadApp(passport);
});

function loadApp(x) {
    $.ajax({
        url: 'AppointmentCancelAndReschedule',
        type: 'post',
        dataType: 'json',
        async: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            passport: x,
            function: 'loadAppointment'
        },
        success: function (data) {
            $('#txtAppointmentNo').val(data.result[0].AppointmentNumber);
        }
    });
}


//AppointmentNo onchange
$('#txtAppointmentNo').on('change', function () {
    var appoinmentNo = $(this).val();

    loadPass(appoinmentNo);
});

function loadPass(x) {
    $.ajax({
        url: 'AppointmentCancelAndReschedule',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            appoinmentNo: x,
            function: 'loadPassport'
        },
        async: false,
        success: function (data) {
            $('#txtPassportNo').val(data.result.PassportNumber);
        }
    });
}


$('.dppicker').datepicker({
    dateFormat: 'yy/mm/dd',
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+1",
    minDate: 0
});


//Verify Button on click
$('#btnVerify').on('click', function () {

    var passportNo = $('#txtPassportNo').val();
    var appointmentNo = $('#txtAppointmentNo').val();
    if (passportNo == "") {
        loadPass(appointmentNo);
    }

    if (appointmentNo == "") {
        loadApp(passportNo);
    }

    $.ajax({
        url: 'AppointmentCancelAndReschedule',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            passportNo: passportNo,
            appointmentNo: appointmentNo,
            function: 'verify'
        },
        success: function (data) {

            if (data.result == true) {

                $('#verfiBox').val('Verify Success!').css({ 'color': '#148414' });
                $('#btnReschedule').addClass('Vefify');

                $.ajax({
                    url: 'AppointmentCancelAndReschedule',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        passportNo: passportNo,
                        appointmentNo: appointmentNo,
                        function: 'loadData'
                    },
                    success: function (data) {

                        if (data.result == "NotSubmitted") {

                            Swal(
                                'Appointment Not Submitted Or Canceled!',
                                '',
                                'error'
                            );

                            $('#txtPassportNo').val('');
                            $('#txtAppointmentNo').val('');
                            $('#verfiBox').val('');

                        } else {

                            var title = data.result.Title;
                            if (title == null || title == "null" || title == "") {
                                title = "";
                            }
                            $('#txtNameInFull').val(title + ' ' + data.result.FirstName + ' ' + data.result.LastName);
                            $('#txtAppointmentDate').val(data.result.date);
                            $('#txtAppointmentTime').val(data.result.time);
                            $('#txtAppointmentStatus').val(data.result.status);
                            $('#txtEmail').val(data.result.EmailAddress);
                        }
                    }
                });

            } else {

                $('#verfiBox').val('Verify Failed!').css({ 'color': '#e44040' });
                $('#btnReschedule').removeClass('Vefify');
                $('#txtNameInFull').val("");
                $('#txtAppointmentDate').val("");
                $('.calenderDiv').hide();
            }
        }, complete: function () {

        }
    });

});


$('#txtRescheduleDate').on('change', function () {

    wait();
    var date = $(this).val();

    $.ajax({
        url: 'AppointmentCancelAndReschedule',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            date: date,
            function: 'loadTime'
        },
        success: function (data) {

            $('#appointmentCount').text(data.appointmentCount);
            $('#membersCount').text(data.memberCount);

            var html = "";
            $(data.result).each(function (k, v) {

                const time = v.split("-")[0];
                const currentMembers = v.split("-")[1];
                var usersPerTimeSlot = 9;

                html += '<div class="col-md-2 col-lg-2 col-md-4 col-sm-6 col-xs-6 form-group">';

                if ((parseInt(currentMembers)) > usersPerTimeSlot) {
                    html += '<div class="cardX cardX-1">';
                    html += '<div class="cardX-top notAvailable"> Not Available</div>';
                } else {
                    html += '<div class="cardX cardX-1">';
                    html += '<div class="cardX-top available">  Available</div>';
                }

                html += '<div class="cardX-info">';
                html += '<div class="cardX-cost" style="margin-top: 5px;">';
                html += '<div class="cardX-value">' + time + '</div>';
                html += '</div>';
                html += '<div class="cardX-lines">';
                html += '<div class="progressLineContainer">';
                var styleWidth = ((100 / usersPerTimeSlot) * currentMembers);
                if (styleWidth > 99) {
                    styleWidth = 100;
                }

                html += '<div class="progressLine" style="width: ' + styleWidth + '%;"></div>';
                html += '</div>';
                html += '<span class="">' + currentMembers + '/' + usersPerTimeSlot + ' Applicants</span>';
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
            html += '<span class="">0/0</span>';
            html += '</div></div></div></div>';

            $('#timeContainer').html("");
            $('#timeContainer').html(html);


            closewait();
        }
    });
});


var selectedime = "";
$(document).on('click', '.cardX', function () {

    $('.cardX').removeClass('selectedTime');
    $(this).addClass('selectedTime');
    const time = $(this).find('.cardX-value').text();

    selectedime = time;
});

function monthDiff(dateFrom, dateTo) {
    return dateTo.getMonth() - dateFrom.getMonth() +
        (12 * (dateTo.getFullYear() - dateFrom.getFullYear()))
}

//Re-Schedule button on click
$('#btnReschedule').on('click', function () {

    var appdate = $('#txtAppointmentDate').val();

    if (monthDiff(new Date(appdate), new Date()) > 4) {

        Swal.fire({
            title: 'Can\'t reschedule this appointment',
            text: 'Old Appointment no',
            type: 'error',
        })
    } else {
        Swal.fire({
            title: 'Are you sure?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Submit!'
        }).then((result) => {
            if (result.value) {


                const timeReschedule = selectedime;
                const appointmentNo = $('#txtAppointmentNo').val();
                const dateReschedule = $('#txtRescheduleDate').val();

                $.ajax({
                    url: 'AppointmentCancelAndReschedule',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        dateReschedule: dateReschedule,
                        timeReschedule: timeReschedule,
                        appointmentNo: appointmentNo,
                        function: 'RescheduleAppointment'
                    },
                    success: function (data) {

                        //------------------  Send Email  -------------------------------------//
                        var appNo = $('#txtAppointmentNo').val();
                        var email = $('#txtEmail').val();

                        $.ajax({
                            url: 'SendEmailsApi',
                            type: 'POST',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: { Appno: appNo, email: email },
                            success: function (data) {

                                Swal(
                                    'Email Send Successfully!',
                                    data.result,
                                    'success'
                                );
                            }, error: function (data) {

                                Swal(
                                    'Email Send Error!',
                                    '',
                                    'error'
                                );
                            }
                        });


                        Swal.fire({
                            title: "Saved Successfully!",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonClass: 'btn-success',
                            confirmButtonText: 'OK!'
                        }).then((result) => {
                            if (result.value) {

                            }
                        });

                    }
                });

            }
        });
    }
});


//Clear form
$('#btnClear').on('click', function () {
    location.reload();
});


// Cancel Appointment form
$('#cancelAppointment').on('click', function () {

    Swal.fire({
        title: 'Are you sure?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Submit!'
    }).then((result) => {
        if (result.value) {

            var appointmentNo = $('#txtAppointmentNo').val();

            $.ajax({
                url: 'AppointmentCancelAndRescheduleCancelled',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    appointmentNo: appointmentNo
                },
                success: function (data) {

                    if (data.result == true) {

                        //------------------  Send Email  -------------------------------------//
                        var appNo = $('#txtAppointmentNo').val();
                        var email = $('#txtEmail').val();

                        $.ajax({
                            url: 'SendEmailsApiAppointmentCancel',
                            type: 'POST',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: { Appno: appNo, email: email },
                            success: function (data) {

                                Swal(
                                    'Email Send Successfully!',
                                    data.result,
                                    'success'
                                );
                            }, error: function (data) {

                                Swal(
                                    'Email Send Error!',
                                    '',
                                    'error'
                                );
                            }
                        });


                        Swal(
                            'Appointment Canceled!',
                            '',
                            'success'
                        );

                    }


                }
            });
        }
    });
});


$('.formS').bind('input', function () {
    $(this).val(function (_, v) {
        return v.replace(/\s+/g, '');
    });
});

$('.caps').keyup(function () {
    $(this).val($(this).val().toUpperCase());
});
