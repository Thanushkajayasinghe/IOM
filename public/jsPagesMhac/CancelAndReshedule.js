$(document).ready(function () {
    //PassportNo onchange
    $('#txtPassportNo').on('change', function () {
        var passport = $(this).val();
        loadAppoinmentNo(passport);
    });
    function loadAppoinmentNo(x) {
        $.ajax({
            url: `/${getUrl()}/CancelAndResheduleLoadAppoimnet`,
            type: 'post',
            dataType: 'json',
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                passport: x,
                country: location.href.substring(location.href.lastIndexOf('/') + 1),
                function: 'loadAppointment'
            },
            success: function (data) {
                
                if (data.result == '1') {
                    Swal(
                        'Passport number is not relevant to the country!',
                        '',
                        'error'
                    );
                } else {
                    var appointment = data.appointment_no
                    $('#txtAppointmentNo').val(appointment);
                }

            }
        });
    }
    //AppointmentNo onchange
    $('#txtAppointmentNo').on('change', function () {
        var appoinmentNo = $(this).val();

        loadPassportNo(appoinmentNo);
    });
    function loadPassportNo(x) {
        $.ajax({
            url: `/${getUrl()}/CancelAndResheduleLoadPassport`,
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                appoinmentNo: x,
                country: location.href.substring(location.href.lastIndexOf('/') + 1),
                function: 'loadPassport'
            },
            async: false,
            success: function (data) {
                if (data.result == '1') {
                    Swal(
                        'Appoinment number is not relevant to the country!',
                        '',
                        'error'
                    );
                } else {
                    var passport = data.passport_no
                    $('#txtPassportNo').val(passport);
                }
            }
        });
    }
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
            url: `/${getUrl()}/CancelAndResheduleVerify`,
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
                        url: `/${getUrl()}/CancelAndResheduleLoadData`,
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

                            }

                            else {


                                $('#txtNameInFull').val(data.result.first_name + ' ' + data.result.last_name);
                                $('#txtAppointmentDate').val(data.result.appointment_date);
                                $('#txtAppointmentTime').val(data.result.appointment_time);
                                $('#txtAppointmentStatus').val(data.result.appointment_status);
                                $('#txtEmail').val(data.result.email);
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

       // wait();
        var date = $(this).val();

        $.ajax({
            url: `/${getUrl()}/CancelAndResheduleLoadTime`,
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                date: date,
                country: location.href.substring(location.href.lastIndexOf('/') + 1),
                function: 'loadTime'
            },
            success: function (data) {

                $('#appointmentCount').text(data.appointmentCount);
                $('#membersCount').text(data.memberCount);
                $('#CountryappointmentCount').text(data.countryAppoinments);
                $('#CountrymembersCount').text(data.memberCountcountry);
                $country = location.href.substring(location.href.lastIndexOf('/') + 1);
                var html = "";
                $(data.result).each(function (k, v) {

                    const time = v.split("-")[0];
                    const currentMembers = v.split("-")[1];
                    const allMembers = v.split("-")[2];
                    var usersPerTimeSlot = 9;
                 
                    html += '<div class="col-md-2 col-lg-2 col-md-4 col-sm-6 col-xs-6 form-group">';
                    html += '<div class="cardX cardX-1" >';
                    html += '<div class="cardX-top available">'+"   "+'</div>';
                    html += '<div class="cardX-info">';
                    html += '<div class="cardX-cost" style="padding-top: 22px;">';
                    html += '<div class="cardX-value">' + time + '</div>';
                    html += '</div>';
                    html += '<div class="cardX-lines">';
                    html += '<div class="progressLineContainer">';
                    var styleWidth = ((100 / usersPerTimeSlot) * currentMembers);
                    if (styleWidth =0) {
                        styleWidth = 0;
                    }

                    html += '<div class="progressLine" style="width: ' + styleWidth + '%;"></div>';
                    html += '</div>';
                    html += '<span class="">' + currentMembers + ' ' + $country + '</span>';
                    html += '<span class="" style="padding-bottom: 22px;">' + allMembers + ' Total</span>';
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


                //closewait();
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
        }
        else if ($('#txtAppointmentNo').val() == "") {
            Swal.fire({
                title: 'Please Select Appoinment Number',
                type: 'error',
            })
        }
        else if ($('#txtNameInFull').val() == "") {
            Swal.fire({
                title: 'Please Verify',
                type: 'error',
            })
        }
        else if (selectedime == "") {
            Swal.fire({
                title: 'Please Select Time',
                type: 'error',
            })
        }
        else {
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
                        url: `/${getUrl()}/CancelAndSetReshedule`,
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
                            if (data.result == true) {
                                //------------------  Send Email  -------------------------------------//
                                var appNo = $('#txtAppointmentNo').val();
                                var email = $('#txtEmail').val();

                                $.ajax({
                                    url: `/${getUrl()}/CancelAndResheduleEmail`,
                                    type: 'POST',
                                    dataType: 'json',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: { Appno: appNo, email: email, function: 'SendEmailsApi' },
                                    success: function (data) {

                                        Swal(
                                            'Email Send Successfully!',
                                            data.result,
                                            'success'
                                        );
                                        location.reload();
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



                        }
                    });

                }
            });
        }
    });
    // Cancel Appointment form
    $('#cancelAppointment').on('click', function () {
        if ($('#txtAppointmentNo').val() == "") {
            Swal.fire({
                title: 'Please Select Appoinment Number',
                type: 'error',
            })
        }
        else if ($('#txtNameInFull').val() == "") {
            Swal.fire({
                title: 'Please Verify',
                type: 'error',
            })
        }
        else {
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
                        url: `/${getUrl()}/CancelAndResheduleSetCancel`,
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
                                    url: `/${getUrl()}/CancelAndResheduleCancelEmail`,
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
                                        location.reload();
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
        }
       
    });
    //Clear form
    $('#btnClear').on('click', function () {
        location.reload();
    });
    $('.caps').keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });
    $('.formS').bind('input', function () {
        $(this).val(function (_, v) {
            return v.replace(/\s+/g, '');
        });
    });
    
    //Noty Load
    Noty.overrideDefaults({
        theme: 'limitless',
        layout: 'topRight',
        type: 'alert',
        timeout: 1500
    });
});