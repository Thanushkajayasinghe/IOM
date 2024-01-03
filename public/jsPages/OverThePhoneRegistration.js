$(document).ready(function () {

    $('#dropOtherText').hide();
    $('#LangFlagDrop').on('change', function () {
        var lnlag = $('#LangFlagDrop').val();
        $('#dropOtherText').val("");
        if (lnlag == "Other") {
            $('#dropOtherText').show();
        } else {
            $('#dropOtherText').hide();
        }

    });

    $('#LangFlag').hide();

    $('#RequestInterpreter').on('click', function () {
        if ($('[id="RequestInterpreter"]').is(':checked')) {
            setVisible(true);
        } else {
            setVisible(false);
        }
    })

    function setVisible(status) {
        if (status == true) {
            $('#LangFlag').show();

        } else {
            $('#LangFlag').hide();

        }
    }

    // ========================================================
    //Noty Load
    Noty.overrideDefaults({
        theme: 'limitless',
        layout: 'topRight',
        type: 'alert',
        timeout: 1500
    });

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

    $('#AppointmentDate').on('click', function () {
        $('#myModal2').modal().show();
        $('.fc-month-button').click();
        loadHolidays();
    });

    ///load Apointment Date////
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

    //Time Interval Load
    $(document).on('click', '.ui-state-default', function () {

        if ($(this).parent().hasClass('ui-state-disabled')) {

        } else {

            if ($(this).parent().hasClass('highlightHoliday')) {

                new Noty({
                    text: 'Holiday!',
                    type: 'error'
                }).show();

            } else {

                wait();

                const $this = $(this);
                const day = parseInt($this.text());
                const month = parseInt($this.parent().attr('data-month')) + 1;
                const year = parseInt($this.parents('table').prev().find('.ui-datepicker-title .ui-datepicker-year').text());
                const date = "" + year + "-" + String("00" + month).slice(-2) + "-" + day + "";
                var membercount = $('#noOfFamilyMembers').val();

                // ======================Anjana==================================

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'LodeTimeOFTotal',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        date: date
                    },
                    success: function (data) {
                        var Total = data.result2;
                        var booking = data.result3;
                        $('#TotalAppoimentCount').text(Total);
                        $('#BookedAppoimentCount').text(booking);

                    }
                });


                //==================EnD====Anjana==================================


                // --------------------- Limit Token No -------------------------->
                var PriorityRequest = "";
                var MemberCount = 0;

                if ($('[id="appDetTypeFamily"]').is(':checked')) {
                    MemberCount = $('#noOfFamilyMembers').val();
                    MemberCount++;
                } else if ($('[id="appDetTypeIndividual"]').is(':checked')) {
                    MemberCount = 1;
                    $('#noOfFamilyMembers').val("");
                }

                if ($('[id="prioRequest"]').is(':checked')) {
                    PriorityRequest = "Yes Priority";
                } else {
                    PriorityRequest = "No Priority";
                }


                if (membercount == "" || membercount == null) {
                    membercount = 1;
                } else {
                    membercount = parseInt(membercount) + 1;
                }
                const noOfMembers = membercount;

                $.ajax({
                    url: 'OverThePhoneRegLoadTime',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    async: false,
                    data: { date: date },
                    success: function (data) {


                        var startTime = data.result.starttime;
                        var endtime = data.result.endtime;
                        var interval = data.result.timeslotperoneuser;

                        let a = moment("2019-01-23T" + startTime);
                        let b = moment("2019-01-23T" + endtime);
                        var diffTime = b.diff(a, 'hours');

                        var html = "";


                        $(timelineLabels(startTime, interval, 'm', diffTime)).each(function (k, v) {
                            html += "<tr class='available'><td id='clickTime'>" + v + "</td><td></td></tr>";
                        });

                        $('#timeTableBody').html("");
                        $('#timeTableBody').html(html);


                        $('#timeTableBody tr').each(function () {

                            const $this = $(this);
                            const time = $this.find('td:nth-child(1)').text();

                            $.ajax({
                                url: 'AppointmentCancelAndReschedule3',
                                type: 'POST',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: { date: date, time: time, function: 'statusCou' },
                                success: function (data) {

                                    const currentMembers = data.result;

                                    //  if (currentMembers == 0 && parseInt(noOfMembers) > 9) {

                                    //    } else {

                                    //       if ((parseInt(currentMembers) + parseInt(noOfMembers)) > 9) {
                                    //         $this.addClass('notavailable').removeClass('available');
                                    //      } else {
                                    $this.addClass('available').removeClass('notavailable');
                                    //        }
                                    //  }

                                }, complete: function () {
                                    closewait();
                                }
                            });
                        });

                    }, complete: function () {
                        $('.available').on('click', function () {
                            if ($(this).hasClass('available')) {
                                var T = $(this).text();
                                $('.available').attr('style', 'background-color:white');
                                $(this).attr('style', 'background-color:gray;border: 2px solid red');

                                $('#time').text($.trim(T) + ':00');
                                const day = parseInt($('.highlightCell a').text());
                                const month = parseInt($('.ui-state-default').parents('td.highlightCell').attr('data-month')) + 1;
                                const year = parseInt($('.ui-state-default').parents('td.highlightCell').parents('table').prev().find('.ui-datepicker-title .ui-datepicker-year').text());
                                const date = "" + year + "-" + String("00" + month).slice(-2) + "-" + day + "";
                                $('#AppointmentDate').val(date);
                            }
                        });

                    }
                });
                /*} else if (data == "Token Limit") {
                    $('#myModal2').modal('hide');
                    $('.modal-backdrop').remove();
                    $('#timeTableBody').html("");
                    $('#AppointmentDate').val("");
                    $('#time').text("");
                    $('#WaitBox').hide();

                    swal({
                        title: "Token Numbers Limit !",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonClass: 'btn-success',
                        confirmButtonText: 'OK!'
                    });
                }*/

                /*         }
                     });*/
            }
        }
    });

    //Highlight clicked date
    $(document).on('click', '.ui-datepicker-calendar tr td:not(.ui-datepicker-unselectable)', function () {

        $('.ui-datepicker-calendar tr td:not(.ui-datepicker-unselectable)').removeClass('highlightCell')
        $(this).addClass('highlightCell');
    });

    //Get Time Interval list between 2 times
    const timelineLabels = (desiredStartTime, interval, period, timeDiff) => {
        const periodsInADay = moment.duration(timeDiff, 'hours').as(period);

        const timeLabels = [];
        const startTimeMoment = moment(desiredStartTime, 'HH:mm');
        for (let i = 0; i <= periodsInADay; i += interval) {
            startTimeMoment.add(i === 0 ? 0 : interval, period);
            timeLabels.push(startTimeMoment.format('HH:mm '));
        }
        return timeLabels;
    };

    //Load Holidays to the Calender
    function loadHolidays() {

        var selectedYear = $("#calendar").find('.ui-datepicker-year').text();

        $.ajax({
            url: 'HolidayCalenderLoadData',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                year: selectedYear,
                function: 'loadHolidayCalenderDates'
            },
            success: function (data) {

                $(data.result).each(function (key, val) {

                    $('.ui-datepicker-calendar').each(function () {
                        $(this).find('td a').removeClass('ui-state-active');
                        $(this).find('td a').removeClass('ui-state-hover');
                    });


                    if (val.stat == "allSaturdaysDisabled") {
                        $('.ui-datepicker-calendar tbody tr').each(function () {
                            $(this).find('td:eq(6):not(.ui-state-disabled)').addClass('highlightHoliday');
                        });
                    }

                    if (val.stat == "allSundaysDisabled") {
                        $('.ui-datepicker-calendar tbody tr').each(function () {
                            $(this).find('td:eq(0):not(.ui-state-disabled)').addClass('highlightHoliday');
                        });
                    }

                    var months = ["January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"];

                    // var selectedMonthName = months[$("#calendar").datepicker('getDate').getMonth()];
                    var selectedMonthName = $("#calendar").find('.ui-datepicker-month').text();

                    $('#calendar').attr('attr-mon', selectedMonthName);

                    if (val.stat == null) {

                        let year = val.year;
                        let month = val.month;
                        let day = val.day;

                        $('[attr-mon="' + month + '"]').find('.ui-datepicker-calendar .ui-state-default').filter(function (index) {
                            return (parseInt(index) + 1) === day;
                        }).parent().addClass('highlightHoliday');
                    }
                });
            }, complete: function () {

            }
        });
    }

    $(document).on('click', '.ui-datepicker-next', function () {
        loadHolidays();
    });

    $(document).on('click', '.ui-datepicker-prev', function () {
        loadHolidays();
    });

    // ==========================================================================================================
    // Submit btn
    // ==========================================================================================================

    $('#btnsubmit').on('click', function () {

        if (validate('#divContainer')) {
            if (validate('#divContainer3')) {
                if (validate('#divdomi')) {
                    if (validate('#SponserDiv')) {
                        if (validate('#formvali')) {

                            var date = $('#AppointmentDate').val();
                            var PriorityRequest = "";
                            var MemberCount = 0;

                            if ($('[id="appDetTypeFamily"]').is(':checked')) {
                                MemberCount = $('#noOfFamilyMembers').val();
                                MemberCount++;
                            } else if ($('[id="appDetTypeIndividual"]').is(':checked')) {
                                MemberCount = 1;
                                $('#noOfFamilyMembers').val("");
                            }

                            if ($('[id="prioRequest"]').is(':checked')) {
                                PriorityRequest = "Yes Priority";
                            } else {
                                PriorityRequest = "No Priority";
                            }


                            Swal.fire({
                                title: 'Are you sure?',
                                text: "",
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, Submit!'
                            }).then((result) => {
                                if (result.value) {
                                    var PassportNo = $('#PassportNo').val();
                                    cheack_allready_exits(PassportNo);

                                    submitData();
                                }
                            });

                        }
                    }
                }
            }
        }
    });

    function submitData() {

        var members = $('#noOfFamilyMembers').val();
        if (members == "" || members == null) {
            members = 1;
        } else {
            members = parseInt($('#noOfFamilyMembers').val());
            members = parseInt(members) + 1;
        }
        var ApplicationType = "";
        if ($('[id="appDetTypeFamily"]').is(':checked')) {
            ApplicationType = "Family";
        } else if ($('[id="appDetTypeIndividual"]').is(':checked')) {
            ApplicationType = "Individual";
            $('#noOfFamilyMembers').val("");
        }

        var DateOfArrival = $('#DateOfArrival').val();
        var AppointmentDate = $('#AppointmentDate').val();
        var time = $('#time').text();
        var PriorityRequest = "No Priority";
        var CountryOfOrigin = $('#CountryOfOrigin').val();
        var EmailAddress = $('#Email').val();

        // Main Applicant Details
        var TitleOf = $('#TitleOf').val();
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var DateofBirth = $('#DOB').val();
        var Gender = $('#Gen').val();
        var Nationality = $('#Nationality').val();
        var PassportNumber = $('#PassportNo').val();
        var PreviousPassportifAny = $('#PreviousPPA').val();
        var CountryOfBirth = $('#COBirth').val();
        var CVDL3years = $('#CVDL3years').val().toString();
        var MainApplicantspecialMedicalNeedsCheck = "false";
        if ($('[id="MainApplicantspecialMedicalNeedsCheck"]').is(':checked')) {
            MainApplicantspecialMedicalNeedsCheck = "true";
        } else {
            MainApplicantspecialMedicalNeedsCheck = "false";
        }
        if (PassportNumber == "") {
            alert('Passport No can\'t be empty!')
            return;
        }

        // Address of the country of domicile
        var CdAddress = $('#CdAddress').val();
        var CdStree = $('#CdStreet').val();
        var CdCity = $('#CdCity').val();
        var CdPostalCode = $('#CdPostalCode').val();
        var CdCountry = $('#CdCountry').val();
        var txtContactNoHomeRes = $('#txtContactNoHomeRes').val();
        var txtContactNoMobileRes = $('#txtContactNoMobileRes').val();


        var PreferredContactMethod = '';
        if ($('[id="prefConModeEmail"]').is(':checked') && $('[id="prefConModeMobile"]').is(':checked')) {
            PreferredContactMethod = "Email/Mobile";
        } else if ($('[id="prefConModeEmail"]').is(':checked')) {
            PreferredContactMethod = "Email";
        } else if ($('[id="prefConModeMobile"]').is(':checked')) {
            PreferredContactMethod = "Mobile";
        }

        var SponsorName = $('#SponsorName').val();
        var SponsorTelephoneFixedLine = $('#SponsorTelephoneFixedLine').val();
        var SponsorEmailAddress = $('#SponsorEmailAddress').val();
        var SponsorMobile = $('#SponsorMobile').val();
        var SponsorAddress = $('#SponsorAddress').val();

        var StatusSaveOrSubmith = "Submit";

        var Age = parseInt(getAge($('#DOB').val()));
        var over60YearsCheck = "false";
        if (Age >= 60) {
            over60YearsCheck = "true";
        } else {
            over60YearsCheck = "false";
        }

        $.ajax({
            url: 'SaveOnlineRegData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {

                ApplicationType: ApplicationType,
                NoOfFamilyMembers: members,
                DateOfArrival: DateOfArrival,
                AppointmentDate: AppointmentDate,
                time: time,
                PriorityRequest: PriorityRequest,
                CountryOfOrigin: CountryOfOrigin,
                EmailAddress: EmailAddress,

                TitleOf: TitleOf,
                fname: fname,
                lname: lname,
                DateofBirth: DateofBirth,
                Gender: Gender,
                Nationality: Nationality,
                PassportNumber: PassportNumber,
                PreviousPassportifAny: PreviousPassportifAny,
                CountryOfBirth: CountryOfBirth,
                CVDL3years: CVDL3years,
                MainApplicantspecialMedicalNeedsCheck: MainApplicantspecialMedicalNeedsCheck,

                CdAddress: CdAddress,
                CdStree: CdStree,
                CdCity: CdCity,
                CdPostalCode: CdPostalCode,
                CdCountry: CdCountry,
                CdTelephoneFixedLine: txtContactNoHomeRes,
                CdMobile: txtContactNoMobileRes,

                PreferredContactMethod: PreferredContactMethod,

                SponsorName: SponsorName,
                SponsorTelephoneFixedLine: SponsorTelephoneFixedLine,
                SponsorEmailAddress: SponsorEmailAddress,
                SponsorMobile: SponsorMobile,
                SponsorAddress: SponsorAddress,

                StatusSaveOrSubmith: StatusSaveOrSubmith,
                over60YearsCheck: over60YearsCheck,

            },
            success: function (data) {

                var registerApplicantId = data.registerApplicantId
                var appno = data.appointment_no;
                var coun = 0;

                if (members > 0) {

                    $('.thumbnails').each(function () {
                        const $this = $(this);

                        coun++;
                        const titleMem = $this.attr('titleMem');
                        const firstNameMem = $this.attr('memfirstname');
                        const lastNameMem = $this.attr('memlastname');
                        const passportMem = $this.attr('mempassportnumber');
                        const dobMem = $this.attr('memdateofbirth');
                        const genderMem = $this.attr('memgender');
                        const pregnancyMem = $this.attr('mempregnancy');
                        const nationalityMem = $this.attr('memnationality');
                        const prevpassMem = $this.attr('memprevpass');
                        const countryofbirthMem = $this.attr('memcountryofbirth');
                        const countryvisitedduringlast3yearsMem = $this.attr('memcountryvisitedduringlast3years');
                        const over60yearscheckMem = $this.attr('memover60yearscheck');
                        const specialmedicalneedscheckwheelchairMem = $this.attr('memspecialmedicalneedscheckwheelchair');
                        const checkboxlablepreftypefeedroomMem = $this.attr('memcheckboxlablepreftypefeedroom');
                        const checkboxlablepreftypemomMem = $this.attr('memcheckboxlablepreftypemom');
                        const checkboxlablepreftypeotherMem = $this.attr('memcheckboxlablepreftypeother');

                        $.ajax({
                            url: 'InsertMembersOnlineDataApi',
                            type: 'post',
                            dataType: 'json',
                            data: {
                                registerApplicantId: registerApplicantId,
                                titleMem: titleMem,
                                firstNameMem: firstNameMem,
                                lastNameMem: lastNameMem,
                                passportMem: passportMem,
                                dobMem: dobMem,
                                genderMem: genderMem,
                                pregnancyMem: pregnancyMem,
                                nationalityMem: nationalityMem,
                                prevpassMem: prevpassMem,
                                countryofbirthMem: countryofbirthMem,
                                countryvisitedduringlast3yearsMem: countryvisitedduringlast3yearsMem,
                                over60yearscheckMem: over60yearscheckMem,
                                specialmedicalneedscheckwheelchairMem: specialmedicalneedscheckwheelchairMem,
                                checkboxlablepreftypefeedroomMem: checkboxlablepreftypefeedroomMem,
                                checkboxlablepreftypemomMem: checkboxlablepreftypemomMem,
                                checkboxlablepreftypeotherMem: checkboxlablepreftypeotherMem,
                                coun: coun
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            async: false,
                            success: function (data) {

                                data = JSON.parse(data);

                                if (data.result == true) {

                                } else {

                                    swal({
                                        title: "Not Saved!",
                                        type: "error",
                                        showCancelButton: false,
                                        confirmButtonClass: 'btn-success',
                                        confirmButtonText: 'OK!'
                                    });
                                }
                            }
                        });
                    });
                }

                if (data.result == true) {

                    Swal.fire({
                        type: 'success',
                        title: 'Data Submit Successfully!',
                        text: 'Appointment No -' + appno,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    })

                } else if (data.result == "NOT_AVAILABLE") {
                    swal({
                        title: "Not available this time!",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonClass: 'btn-success',
                        confirmButtonText: 'OK!'
                    });
                } else {

                    swal({
                        title: "Not Submit!",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonClass: 'btn-success',
                        confirmButtonText: 'OK!'
                    });

                }
            },
            complete: function (data) {

                var j = JSON.parse(data.responseText);

                if (j.result == true) {

                    var Appno = j.appointment_no;
                    var email = j.Email;

                    $.ajax({
                        url: 'SendEmailsApi',
                        type: 'POST',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            Appno: Appno,
                            email: email
                        },
                        success: function (data) {

                            swal({
                                title: 'Email Sent Successfully!',
                                showCancelButton: false,
                                showConfirmButton: true,
                                type: "success"
                            }).then(function () {
                                location.reload(true);
                            });

                        },
                        error: function (data) {

                            Swal(
                                'Email Send Error!',
                                '',
                                'error'
                            ).then((result) => {
                                if (result.value) {

                                    location.reload(true);
                                }
                            });
                        }
                    });


                    Swal.fire({
                        title: "Saved Successfully!",
                        text: 'Please wait for email confirmation!',
                        type: "success",
                        showCancelButton: false,
                        showConfirmButton: false,
                        confirmButtonClass: 'btn-success',
                        confirmButtonText: 'OK!',
                        allowOutsideClick: false,
                        onOpen: () => {
                            swal.showLoading();
                        }
                    });
                }
            }
        });

    }

    function getAge(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    function cheack_allready_exits(passportnumber) {

        $.ajax({
            url: 'CheckPassportApi',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                passportnumber: passportnumber
            },
            success: function (data) {

                var count = data.result;

                if (count == "WaitExpAppDate") {

                    $('#txtPassport').val("");

                    swal({
                        title: "Already have an appointment on '" + data.days + "'!",
                        text: "Please Try again after '" + data.days + "' or contact call center and cancel existing appointment!",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonClass: 'btn-success',
                        confirmButtonText: 'OK!'
                    });

                    return;
                }
            }
        });

    }

    $('#noOfFamilyMembers').on('keyup', function () {
        var sanitized = $(this).val().replace(/[^0-9]/g, '');
        $(this).val(sanitized);
    });

    var memCount = 0;
    $('#noOfFamilyMembers').on('change', function () {
        var value = $(this).val().replace(/[^0-9]/g, '');
        $(this).val(value);

        var html = "";
        for (var i = 0; i < value; i++) {
            var co = parseInt(i + 1);
            html += '<div class="col-md-6 form-group">';
            html += '<ul class="thumbnails" style="list-style: none;background: white;border: 1px solid #aba5a5;padding: 6px;">';
            html += '<li class="span5 clearfix"><div class="thumbnail clearfix row">';
            html += '<div class="col-md-2"><img src="' + imgPathBlade + '/' + co + '.png" class="pull-left span2 clearfix" style="width: 100%;"></div>';
            html += '<div class="col-md-8">';
            html += '<div style="font-size: 16px;"><b>Name: </b><span class="memberName"></span></div>';
            html += '<div style="font-size: 16px;"> <b>Country: </b><span class="memberCountry"></span></div>';
            html += '<div style="font-size: 16px;"> <b>Passport: </b><span class="memberPassport"></span></div></div>';
            html += '<div class="col-md-2"><a href="javascript:void(0);" class="btn btn-primary btn-sm form-group icon editMember"><span class="fa fa-pencil"></span>&nbsp;Edit</a>' +
                '<a href="javascript:void(0);" class="btn btn-danger btn-sm form-group deleteMember"><span class="fa fa-close"></span>&nbsp;Delete</a></div>';
            html += '</div></div></li></ul></div>';
        }

        $('#memberContainer').html("");
        $('#memberContainer').html(html);
    });

    $('#PassportNo').on('change', function () {
        const PassportNo = ($(this).val().toUpperCase()).trim();
        cheack_allready_exits(PassportNo);
    });


    loadCountryList();
    function loadCountryList() {

        $.ajax({
            url: 'LoadCountryList',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {},
            success: function (data) {

                var html = "";
                html += "<option></option>";
                $(data).each(function (key, val) {
                    html += "<option value='" + val.name + "'>" + val.name + "</option>";
                });

                $('.countryLi').html("");
                $('.countryLi').html(html);

                var htmlx = "";
                htmlx += "<option></option>";
                $(data).each(function (key, val) {
                    htmlx += "<option value='" + val.nationality + "'>" + val.nationality + "</option>";
                });

                $('.nationalityLi').html("");
                $('.nationalityLi').html(htmlx);
            }, complete: function () {
                $('.selectTo').select2({
                    dropdownAutoWidth: true,
                    width: '100%'
                });
            }
        });
    }

    $(document).on('click', '.deleteMember', function () {

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {

                const $this = $(this);
                memCount = memCount - 1;

                $this.parents('.thumbnails').parent().remove();

                swal({
                    title: "Deleted Successfully!",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'OK!'
                });
            }
        });
    });

    $(document).on('click', '.editMember', function () {

        clearModal();
        $('.thumbnails').removeClass('selectedMember');
        $(this).parents('.thumbnails').addClass('selectedMember');
        $('.memberEditModal').modal('show');

        // const memTitle = $(this).parents('.selectedMember').attr('titlemem');
        // if (memTitle != "null") {
        //     $('#memFirstName').val(memTitle);
        // }

        const memFirstName = $(this).parents('.selectedMember').attr('memFirstName');
        if (memFirstName != "null") {
            $('#memFirstName').val(memFirstName);
        }

        const memLastName = $(this).parents('.selectedMember').attr('memLastName');
        if (memLastName != "null") {
            $('#memLastName').val(memLastName);
        }

        const memDateOfbirth = $(this).parents('.selectedMember').attr('memDateOfbirth');
        if (memDateOfbirth != "null") {
            $('#memDOB').val(memDateOfbirth);
        }

        const memGender = $(this).parents('.selectedMember').attr('memGender');
        if (memGender != "null") {
            $('#memGender').val(memGender);
        }

        const memPregnancy = $(this).parents('.selectedMember').attr('memPregnancy');
        if (memPregnancy != "null") {
            $('#memPreg').val(memPregnancy);
        }

        const memnationality = $(this).parents('.selectedMember').attr('memnationality');
        if (memnationality != "null") {
            $('#memNationality').val(memnationality).trigger('change');
        }

        $('#memPassport').val($(this).parents('.selectedMember').attr('memPassportNumber'));
        if ($(this).parents('.selectedMember').attr('memPrevPass') != "null")
            $('#memPreviousPassportifAny').val($(this).parents('.selectedMember').attr('memPrevPass'));

        $('#memCountryOfBirth').val($('.selectedMember').attr('memCountryOfBirth')).trigger('change');

        var qwer = $('.selectedMember').attr('memcountryvisitedduringlast3years');
        var fsff = qwer.split(",");

        $('#memCountryvisitedduringlast3years').val(fsff.filter(filterValues)).trigger('change');

        function filterValues(val) {
            return val != "";
        }

    });

    function clearModal() {
        $('#memFirstName').val("");
        $('#memLastName').val("");
        $('#memPassport').val("");
        $('#memDOB').val("");
        $('#memGender').val("");
        $('#memPreg').val("");
        $('.memPregMessage').hide();
        $("#memNationality").val('').trigger('change');
        $('#memPreviousPassportifAny').val("");
        $('#memCountryOfBirth').val("").trigger('change');
        $("#memCountryvisitedduringlast3years").val('').trigger('change');
    }

    $('#save').on('click', function () {

        const nameFirst = $('#memFirstName').val();
        const nameLast = $('#memLastName').val();
        const passportNumber = $('#memPassport').val();
        const dateOfbirth = $('#memDOB').val();
        const gender = $('#memGender').val();
        const pregnancy = $('#memPreg').val();
        const nationality = $('#memNationality').val();
        const prevPass = $('#memPreviousPassportifAny').val();
        const countryOfBirth = $('#memCountryOfBirth').val();
        const countryVisitedDuringLast3Years = $('#memCountryvisitedduringlast3years').val();

        if (passportNumber == "") {
            alert('Passport No can\'t be empty!')
            return;
        }

        var over60YearsCheck = '';
        var Age = parseInt(getAge(dateOfbirth));
        if (Age >= 60) {
            over60YearsCheck = "true";
        } else {
            over60YearsCheck = "false";
        }

        var specialMedicalNeedsCheckWheelChair = false;
        if ($('[id="chkWheelChairAccessMem"]').is(':checked')) {
            specialMedicalNeedsCheckWheelChair = "true";
        }

        var checkboxLablePrefTypeFeedRoom = false;
        if ($('[id="chkFeedingRoomMem"]').is(':checked')) {
            checkboxLablePrefTypeFeedRoom = "true";
        }

        var checkboxLablePrefTypeMom = false;
        if ($('[id="chkMotherWithChildrenLess5Mem"]').is(':checked')) {
            checkboxLablePrefTypeMom = "true";
        }

        var checkboxLablePrefTypeOther = "";
        if ($('#chkOtherMem').is(':checked')) {
            checkboxLablePrefTypeOther = $('#txtOtherSpecialRequestMem').val();
        }

        $('.selectedMember').attr('memFirstName', nameFirst);
        $('.selectedMember').attr('memLastName', nameLast);
        $('.selectedMember').attr('memPassportNumber', passportNumber);
        $('.selectedMember').attr('memDateOfbirth', dateOfbirth);
        $('.selectedMember').attr('memGender', gender);
        $('.selectedMember').attr('memPregnancy', pregnancy);
        $('.selectedMember').attr('memNationality', nationality);
        $('.selectedMember').attr('memPrevPass', prevPass);
        $('.selectedMember').attr('memCountryOfBirth', countryOfBirth);
        $('.selectedMember').attr('memCountryVisitedDuringLast3Years', countryVisitedDuringLast3Years);
        $('.selectedMember').attr('memOver60YearsCheck', over60YearsCheck);
        $('.selectedMember').attr('memSpecialMedicalNeedsCheckWheelChair', specialMedicalNeedsCheckWheelChair);
        $('.selectedMember').attr('memCheckboxLablePrefTypeFeedRoom', checkboxLablePrefTypeFeedRoom);
        $('.selectedMember').attr('memCheckboxLablePrefTypeMom', checkboxLablePrefTypeMom);
        $('.selectedMember').attr('memCheckboxLablePrefTypeOther', checkboxLablePrefTypeOther);

        $('.selectedMember').find('.memberName').text(nameFirst + " " + nameLast);
        $('.selectedMember').find('.memberCountry').text(countryOfBirth);
        $('.selectedMember').find('.memberPassport').text(passportNumber);

        $('.selectedMember').addClass('completedMember');

        $('.memberEditModal').modal('hide');

        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
        });

        Toast.fire({
            type: 'success',
            title: 'Saved Successfully'
        })

    });

    function getAge(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

});
