//Noty Load
Noty.overrideDefaults({
    theme: 'limitless',
    layout: 'topRight',
    type: 'alert',
    timeout: 1500
});

$('#summernote').summernote();


//Load Years
var minOffset = 0, maxOffset = 5;
var thisYear = (new Date()).getFullYear();
var select = $('#drpYear');


for (var i = minOffset; i <= maxOffset; i++) {
    var year = thisYear + i;
    $('<option>', { value: year, text: year }).appendTo(select);
}


var selectedYear = (new Date()).getFullYear();
$('#drpYear').val(selectedYear);
loadHolidaysToCalender();


//Get Selected Year
$('#drpYear').on('change', function () {
    selectedYear = $(this).val();

    loadDatePicker();
    loadHolidaysToCalender()
});


//Load Work Schedule Table according to the date range
$('#drpMonth').on('change', function () {

    wait();

    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

    var abc = "";

    var lastday = function (y, m) {
        return new Date(selectedYear, m + 1, 0).getDate();
    }

    var month = $('#drpMonth').val();
    var nowdate = new Date("" + selectedYear + "/" + month + "/01");
    var monthStartDay = new Date(selectedYear, nowdate.getMonth(), 1);
    var monthEndDay = new Date(selectedYear, nowdate.getMonth() + 1, 0);
    var mo = parseInt(nowdate.getMonth()) + (1);
    mo = String("00" + mo).slice(-2);
    var from = "" + selectedYear + "-" + mo + "-01";
    var to = "" + selectedYear + "-" + mo + "-" + lastday(selectedYear, nowdate.getMonth()) + "";

    var itr = moment.twix(monthStartDay, monthEndDay).iterate("days");

    var workScheduleContainer = "";
    workScheduleContainer += '<div class="rna-table__td rna-matrix__cell"><span class="rna-room__info__name">Work Schedule</span></div>';

    var monthNameContainer = "";
    monthNameContainer += '<div class="rna-table__td rna-matrix__cell js-rna-sticky-cell-container rna-room__month__cell"><div class="rna-sticky-cell js-rna-sticky-cell" data-preserve-style-attr="" style="height: 20px;"></div></div>';

    var dayNameContainer = "";
    dayNameContainer = '<div class="rna-table__td rna-matrix__cell js-rna-sticky-cell-container rna-matrix__cell--half-bordered"><div class="rna-sticky-cell js-rna-sticky-cell" data-preserve-style-attr="" style="height: 40px;"></div></div>';

    var statusContainer = "";
    statusContainer += '<div class="rna-table__td rna-matrix__cell js-rna-sticky-cell-container"><div class="rna-sticky-cell js-rna-sticky-cell" data-preserve-style-attr="" style="height: 40px;"><div class="rna-room__row__heading text-center"><span class="rna-room__row__heading__label" style="position: relative;top: 6px;">Status</span></div></div><div class="rna-room__row__heading text-center"><span class="rna-room__row__heading__label" style="position: relative;top: 6px;">Status</span></div></div>\n\
                       <div class="rna-table__td rna-matrix__cell rna-matrix__cell--rounded rna-matrix__cell--bordered rna-matrix__cell--light rna-matrix__cell--first "><div class="rna-matrix__cell__content rna-matrix__cell__content--rounded rna-status--bookable rna-status--actionable rna-clickable-item "></div></div>';

    var regAppContainer = "";
    regAppContainer += ' <div class="rna-table__td rna-matrix__cell js-rna-sticky-cell-container "><div class="rna-sticky-cell js-rna-sticky-cell" data-preserve-style-attr="" style="height: 40px;"><div class="rna-room__row__heading text-center"><span class="rna-room__row__heading__label"> No Of Regular Appointments&nbsp;&nbsp;&nbsp;</span><span class="badge badge-info" style="position: relative;top: -10px;">Edit</span></div></div><div class="rna-room__row__heading text-center"><span class="rna-room__row__heading__label"> No Of Regular Appointments&nbsp;&nbsp;&nbsp;</span></div></div>';

    var priorityAppContainer = "";
    priorityAppContainer += ' <div class="rna-table__td rna-matrix__cell js-rna-sticky-cell-container "><div class="rna-sticky-cell js-rna-sticky-cell" data-preserve-style-attr="" style="height: 40px;"><div class="rna-room__row__heading text-center"><span class="rna-room__row__heading__label"> No Of Priority Appointments&nbsp;&nbsp;&nbsp;</span><span class="badge badge-info" style="position: relative;top: -10px;">Edit</span></div></div><div class="rna-room__row__heading text-center"><span class="rna-room__row__heading__label"> No Of Priority Appointments&nbsp;&nbsp;&nbsp;</span></div></div>';

    var noSputumContainer = "";
    noSputumContainer += ' <div class="rna-table__td rna-matrix__cell js-rna-sticky-cell-container "><div class="rna-sticky-cell js-rna-sticky-cell" data-preserve-style-attr="" style="height: 40px;"><div class="rna-room__row__heading text-center"><span class="rna-room__row__heading__label"> No Of Sputum Collections&nbsp;&nbsp;&nbsp;</span><span class="badge badge-info" style="position: relative;top: -10px; left: 20px;">Edit</span></div></div><div class="rna-room__row__heading text-center"><span class="rna-room__row__heading__label"> No Of Sputum Collections&nbsp;&nbsp;&nbsp;</span></div></div>';

    var noVisaExtentionsContainer = "";
    noVisaExtentionsContainer += ' <div class="rna-table__td rna-matrix__cell js-rna-sticky-cell-container "><div class="rna-sticky-cell js-rna-sticky-cell" data-preserve-style-attr="" style="height: 40px;"><div class="rna-room__row__heading text-center"><span class="rna-room__row__heading__label"> No Of Visa Extentions&nbsp;&nbsp;&nbsp;</span><span class="badge badge-info" style="position: relative;top: -10px; left: 20px;">Edit</span></div></div><div class="rna-room__row__heading text-center"><span class="rna-room__row__heading__label"> No Of Visa Extentions&nbsp;&nbsp;&nbsp;</span></div></div>';

    var countRec = 0;

    var noregularappointments;
    var nopriorityappointments;
    var nosputumcollections;
    var novisaextensions;

    $.ajax({
        url: 'GetDefaultValueFromMasterSettings',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        async: false,
        success: function (data) {

            noregularappointments = data.result.noregularappointments;
            nopriorityappointments = data.result.nopriorityappointments;
            nosputumcollections = data.result.nosputumcollections;
            novisaextensions = data.result.novisaextensions;
        }
    });

    while (itr.hasNext()) {

        countRec++;

        var dateCur = itr.next().format("YYYY-MM-DD");
        var d = new Date(dateCur);

        var year = selectedYear;
        var monthIndex = d.getMonth();
        var monthName = monthNames[monthIndex];
        var dayName = days[d.getDay()];
        var dayNum = d.getDate();

        //--------------Work Row----------------------------------------------------------------------------

        workScheduleContainer += '<div class="rna-table__td rna-matrix__cell"></div>';

        //--------------Month Row----------------------------------------------------------------------------

        if (monthName != abc) {
            monthNameContainer += '<div class="rna-table__td rna-room__month__cell--sticky"><div class="rna-matrix__cell__content"><span class="rna-date"><span class="rna-date__month">' + monthName + ' ' + year + '</span></span></div></div>';
            abc = monthName;
        } else {
            monthNameContainer += '<div class="rna-table__td rna-room__month__cell--sticky"><div class="rna-matrix__cell__content"><span class="rna-date"></span></div></div>';
        }

        //--------------Day Row----------------------------------------------------------------------------

        dayNameContainer += '<div class="rna-table__td rna-matrix__cell rna-matrix__cell--half-bordered"><div class="rna-matrix__cell__content"><span class="rna-date"><span class="rna-date__day">' + dayName + '</span><span class="rna-date__day-number">' + String("00" + dayNum).slice(-2) + '</span></span></div></div>';

        //--------------Status Row----------------------------------------------------------------------------

        if (countRec != 1 && countRec != 2) {
            statusContainer += '<div class="rna-table__td rna-matrix__cell rna-matrix__cell--rounded rna-matrix__cell--bordered rna-matrix__cell--light "><div class="rna-matrix__cell__content rna-matrix__cell__content--rounded rna-status--bookable rna-status--actionable rna-clickable-item "></div></div>';
        }

        //--------------No Of Regular Appointments Row----------------------------------------------------------------------------

        if (dayName == "Sun" || dayName == "Sat") {
            regAppContainer += ' <div class="rna-table__td rna-matrix__cell rna-matrix__cell--bordered rna-middle rna-matrix__cell--filled "><div class="rna-matrix__cell__content rna-wrap"><span class="rna-input-placeholder js-rna-input-placeholder"></span><input class="rna-input js-rna-input" type="number" min="0" disabled></div></div>';
        } else {
            regAppContainer += ' <div class="rna-data-cell rna-table__td rna-matrix__cell rna-matrix__cell--bordered rna-middle rna-matrix__cell--light "><div class="rna-matrix__cell__content rna-wrap"><span class="rna-input-placeholder js-rna-input-placeholder"></span><input class="rna-input js-rna-input" attr-type="regularAppointments" attr-date="' + dateCur + '" attr-year="' + year + '" attr-month="' + monthName + '" attr-day="' + dayNum + '" value="' + noregularappointments + '" type="number"  min="0"></div></div>';
        }

        //--------------No Of Priority Appointments Row----------------------------------------------------------------------------

        if (dayName == "Sun" || dayName == "Sat") {
            priorityAppContainer += ' <div class="rna-table__td rna-matrix__cell rna-matrix__cell--bordered rna-middle rna-matrix__cell--filled "><div class="rna-matrix__cell__content rna-wrap"><span class="rna-input-placeholder js-rna-input-placeholder"></span><input class="rna-input js-rna-input" type="number" min="0" disabled></div></div>';
        } else {
            priorityAppContainer += ' <div class="rna-data-cell rna-table__td rna-matrix__cell rna-matrix__cell--bordered rna-middle rna-matrix__cell--light "><div class="rna-matrix__cell__content rna-wrap"><span class="rna-input-placeholder js-rna-input-placeholder"></span><input class="rna-input js-rna-input" attr-type="priorityAppointments" attr-date="' + dateCur + '" attr-year="' + year + '" attr-month="' + monthName + '" attr-day="' + dayNum + '" value="' + nopriorityappointments + '" type="number" min="0"></div></div>';
        }

        //--------------No Of Sputum Collections Row----------------------------------------------------------------------------

        if (dayName == "Sun" || dayName == "Sat") {
            noSputumContainer += ' <div class="rna-table__td rna-matrix__cell rna-matrix__cell--bordered rna-middle rna-matrix__cell--filled "><div class="rna-matrix__cell__content rna-wrap"><span class="rna-input-placeholder js-rna-input-placeholder"></span><input class="rna-input js-rna-input" type="number" min="0" disabled></div></div>';
        } else {
            noSputumContainer += ' <div class="rna-data-cell rna-table__td rna-matrix__cell rna-matrix__cell--bordered rna-middle rna-matrix__cell--light "><div class="rna-matrix__cell__content rna-wrap"><span class="rna-input-placeholder js-rna-input-placeholder"></span><input class="rna-input js-rna-input" attr-type="sputumCollections" attr-date="' + dateCur + '" attr-year="' + year + '" attr-month="' + monthName + '" attr-day="' + dayNum + '" value="' + nosputumcollections + '" type="number" min="0"></div></div>';
        }

        //--------------No Of Visa Extensions Row----------------------------------------------------------------------------

        if (dayName == "Sun" || dayName == "Sat") {
            noVisaExtentionsContainer += ' <div class="rna-table__td rna-matrix__cell rna-matrix__cell--bordered rna-middle rna-matrix__cell--filled "><div class="rna-matrix__cell__content rna-wrap"><span class="rna-input-placeholder js-rna-input-placeholder"></span><input class="rna-input js-rna-input" type="number" min="0" disabled></div></div>';
        } else {
            noVisaExtentionsContainer += ' <div class="rna-data-cell rna-table__td rna-matrix__cell rna-matrix__cell--bordered rna-middle rna-matrix__cell--light "><div class="rna-matrix__cell__content rna-wrap"><span class="rna-input-placeholder js-rna-input-placeholder"></span><input class="rna-input js-rna-input" attr-type="visaExtentions" attr-date="' + dateCur + '" attr-year="' + year + '" attr-month="' + monthName + '" attr-day="' + dayNum + '" value="' + novisaextensions + '" type="number" min="0"></div></div>';
        }
    }

    statusContainer += '<div class="rna-table__td rna-matrix__cell rna-matrix__cell--rounded rna-matrix__cell--bordered rna-matrix__cell--light rna-matrix__cell--last "><div class="rna-matrix__cell__content rna-matrix__cell__content--rounded rna-status--bookable rna-status--actionable rna-clickable-item " ></div></div>';

    $('.rna-room__info').html("");
    $('.rna-room__info').html(workScheduleContainer);

    $('.rna-room__month').html("");
    $('.rna-room__month').html(monthNameContainer);

    $('.rna-room__dates').html("");
    $('.rna-room__dates').html(dayNameContainer);

    $('.rna-room__status').html("");
    $('.rna-room__status').html(statusContainer);

    $('.rna-room__noofregappointments').html("");
    $('.rna-room__noofregappointments').html(regAppContainer);

    $('.rna-room__noofpriorityappointments').html("");
    $('.rna-room__noofpriorityappointments').html(priorityAppContainer);

    $('.rna-room__noofsputumcollections').html("");
    $('.rna-room__noofsputumcollections').html(noSputumContainer);

    $('.rna-room__noofvisaextentions').html("");
    $('.rna-room__noofvisaextentions').html(noVisaExtentionsContainer);


    //Get Saved Data
    $.ajax({
        url: 'SetWorkScheduleLoadData',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { from: from, to: to },
        success: function (data) {

            var totalArray = [];

            $(data.result).each(function (key, val) {
                totalArray.push("" + val.type + "@" + val.value + "@" + val.date + "");
            });

            $(totalArray).each(function (key, val) {

                var string = val;
                var res = string.split("@");
                var type = res[0];
                var value = res[1];
                var date = res[2];

                $('.rna-data-cell').each(function () {

                    var $this = $(this).find('input');
                    if (type == $this.attr('attr-type') && date == $this.attr('attr-date')) {

                        $this.parent().append('<img style="width: 70%;position: absolute;z-index: 2;top: 7px;left: 5px;" src="images/loading.gif">').css({ "text-align": "center" });

                        $this.val(value);

                        setTimeout(function () {
                            $this.parent().find('img').remove();
                        }, 600);
                    }
                });
            });

        }, complete: function () {

            closewait();
        }
    });


    $.ajax({
        url: 'SetWorkScheduleDisableDates',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { year: selectedYear, month: $('#drpMonth option:selected').text() },
        success: function (data) {

            $(data.result).each(function (key, val) {
                const day = parseInt(val.day) + 1;

                $('.rna-room__status .rna-table__td:nth-child(' + day + ') .rna-matrix__cell__content').addClass('rna-status--closed');
                $('.rna-room__noofregappointments .rna-table__td:nth-child(' + day + ') input').attr('disabled', true).val("");
                $('.rna-room__noofpriorityappointments .rna-table__td:nth-child(' + day + ') input').attr('disabled', true).val("");
                $('.rna-room__noofsputumcollections .rna-table__td:nth-child(' + day + ') input').attr('disabled', true).val("");
                $('.rna-room__noofvisaextentions .rna-table__td:nth-child(' + day + ') input').attr('disabled', true).val("");
            });
        }
    });

});


//datepicker disable all dates after selected Start date
$('body').on('focus', "#endDate", function () {

    var startDate = $('#startDate').val();
    var previousDate = new Date(startDate);
    var month = previousDate.getMonth();
    var date = previousDate.getDate() + 1;
    var year = previousDate.getFullYear();

    $("#endDate").datepicker("destroy");

    $(this).datepicker({
        dateFormat: 'yy/mm/dd',
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+100",
        minDate: new Date(year, month, date)
    }).css({ "background-color": "white" });

});


//Save Changed Cell Data
$(document).on('change', '.rna-input', function () {

    const $this = $(this);
    const type = $this.attr('attr-type');
    const date = $this.attr('attr-date');
    const value = $this.val();

    $this.parent().append('<img style="width: 70%;position: absolute;z-index: 2;top: 7px;left: 5px;" src="images/loading.gif">').css({ "text-align": "center" });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: 'SetWorkScheduleInsertOrUpdate',
        type: 'post',
        dataType: 'json',
        data: { type: type, date: date, value: value },
        success: function (data) {

            if (data.result == true) {

                new Noty({
                    text: 'Data Saved Successfully!',
                    type: 'success'
                }).show();

            } else {

                new Noty({
                    text: 'Error Saving Data!',
                    type: 'error'
                }).show();

            }
        }, complete: function () {

            setTimeout(function () {
                $this.parent().find('img').remove();
            }, 400);
        }
    });
});


//Datepicker Initiate
loadDatePicker();


function loadDatePicker() {
    $(".dateHolder").datepicker("destroy");

    $('#datepickerJanuary').datepicker({
        dateFormat: 'yy-mm-dd',
        stepMonths: 0,
        defaultDate: new Date(selectedYear, 0, 1),
        onSelect: function (dateText, inst) {
            inst.show()
        },
        beforeShowDay: $.datepicker.noWeekends
    });

    $('#datepickerFebruary').datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: new Date(selectedYear, 1, 1),
        onSelect: function (dateText, inst) {
            inst.show()
        },
        beforeShowDay: $.datepicker.noWeekends
    });

    $('#datepickerMarch').datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: new Date(selectedYear, 2, 1),
        onSelect: function (dateText, inst) {
            inst.show()
        },
        beforeShowDay: $.datepicker.noWeekends
    });

    $('#datepickerApril').datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: new Date(selectedYear, 3, 1),
        onSelect: function (dateText, inst) {
            inst.show()
        },
        beforeShowDay: $.datepicker.noWeekends
    });

    $('#datepickerMay').datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: new Date(selectedYear, 4, 1),
        onSelect: function (dateText, inst) {
            inst.show()
        },
        beforeShowDay: $.datepicker.noWeekends
    });

    $('#datepickerJune').datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: new Date(selectedYear, 5, 1),
        onSelect: function (dateText, inst) {
            inst.show()
        },
        beforeShowDay: $.datepicker.noWeekends
    });

    $('#datepickerJuly').datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: new Date(selectedYear, 6, 1),
        onSelect: function (dateText, inst) {
            inst.show()
        },
        beforeShowDay: $.datepicker.noWeekends
    });

    $('#datepickerAugust').datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: new Date(selectedYear, 7, 1),
        onSelect: function (dateText, inst) {
            inst.show()
        },
        beforeShowDay: $.datepicker.noWeekends
    });

    $('#datepickerSeptember').datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: new Date(selectedYear, 8, 1),
        onSelect: function (dateText, inst) {
            inst.show()
        },
        beforeShowDay: $.datepicker.noWeekends
    });

    $('#datepickerOctomber').datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: new Date(selectedYear, 9, 1),
        onSelect: function (dateText, inst) {
            inst.show()
        },
        beforeShowDay: $.datepicker.noWeekends
    });

    $('#datepickerNovember').datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: new Date(selectedYear, 10, 1),
        onSelect: function (dateText, inst) {
            inst.show()
        },
        beforeShowDay: $.datepicker.noWeekends
    });

    $('#datepickerDecember').datepicker({
        dateFormat: 'yy-mm-dd',
        defaultDate: new Date(selectedYear, 11, 1),
        onSelect: function (dateText, inst) {
            inst.show()
        },
        beforeShowDay: $.datepicker.noWeekends
    });

    $('.ui-state-default').attr('href', 'javascript:void(0);');
}


//Disable all Saturdays
$('#disableSat').on('click', function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.ui-datepicker-calendar').each(function () {
        $(this).find('td:eq(6) a').removeClass('ui-state-active');
        $(this).find('td:eq(6) a').removeClass('ui-state-hover');
    });

    if ($(this).hasClass('bg-teal-400')) {

        $('#disableSat').removeClass('bg-teal-400').addClass('btn-danger');

        $('.ui-datepicker-calendar tbody tr').each(function () {
            $(this).find('td:eq(6):not(.ui-state-disabled)').addClass('highlightHoliday');
        });

        $.ajax({
            url: 'HolidayCalenderChangeDateStat',
            type: 'POST',
            dataType: 'json',
            data: { year: selectedYear, function: 'disableSaturdays' },
            success: function (data) {

                Swal(
                    'Data Saved Successfully!',
                    '',
                    'success'
                );
            }
        });

    } else if ($(this).hasClass('btn-danger')) {

        $('#disableSat').removeClass('btn-danger').addClass('bg-teal-400');

        $('.ui-datepicker-calendar tbody tr').each(function () {
            $(this).find('td:eq(6):not(.ui-state-disabled)').removeClass('highlightHoliday');
        });

        $.ajax({
            url: 'HolidayCalenderChangeDateStat',
            type: 'POST',
            dataType: 'json',
            data: { year: selectedYear, function: 'enableSaturdays' },
            success: function (data) {

                Swal(
                    'Status Changed!',
                    '',
                    'success'
                );
            }
        });
    }
});


//Disable all Sundays
$('#disableSun').on('click', function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.ui-datepicker-calendar').each(function () {
        $(this).find('td:eq(0) a').removeClass('ui-state-active');
        $(this).find('td:eq(0) a').removeClass('ui-state-hover');
    });

    if ($(this).hasClass('bg-teal-400')) {

        $('#disableSun').removeClass('bg-teal-400').addClass('btn-danger');

        $('.ui-datepicker-calendar tbody tr').each(function () {
            $(this).find('td:eq(0):not(.ui-state-disabled)').addClass('highlightHoliday');
        });

        $.ajax({
            url: 'HolidayCalenderChangeDateStat',
            type: 'POST',
            dataType: 'json',
            data: { year: selectedYear, function: 'disableSundays' },
            success: function (data) {

                Swal(
                    'Data Saved Successfully!',
                    '',
                    'success'
                );
            }
        });

    } else if ($(this).hasClass('btn-danger')) {

        $('#disableSun').removeClass('btn-danger').addClass('bg-teal-400');

        $('.ui-datepicker-calendar tbody tr').each(function () {
            $(this).find('td:eq(0):not(.ui-state-disabled)').removeClass('highlightHoliday');
        });


        $.ajax({
            url: 'HolidayCalenderChangeDateStat',
            type: 'POST',
            dataType: 'json',
            data: { year: selectedYear, function: 'enableSundays' },
            success: function (data) {

                Swal(
                    'Status Changed!',
                    '',
                    'success'
                );
            }
        });
    }
});


//Enable/ Disable Holidays
$(document).on('click', '#HolidayCalender .ui-datepicker-calendar tr td:not(.ui-datepicker-unselectable)', function () {

    const $this = $(this);
    const year = $this.parents('table').prev().find('.ui-datepicker-year').text();
    const month = $this.parents('table').prev().find('.ui-datepicker-month').text();
    const day = $this.find('a').text();

    var M = "";
    if (month == "January") {
        M = '01';
    } else if (month == "February") {
        M = '02';
    } else if (month == "March") {
        M = '03';
    } else if (month == "April") {
        M = '04';
    } else if (month == "May") {
        M = '05';
    } else if (month == "June") {
        M = '06';
    } else if (month == "July") {
        M = '07';
    } else if (month == "August") {
        M = '08';
    } else if (month == "September") {
        M = '09';
    } else if (month == "October") {
        M = '10';
    } else if (month == "November") {
        M = '11';
    } else if (month == "December") {
        M = '12';
    }
    var date = ""
    if ((day.length == 2)) {
        date = year + '-' + M + '-' + day;
    } else if ((day.length == 1)) {
        date = year + '-' + M + '-0' + day;
    }
    if ($this.hasClass('highlightHoliday')) {

        $this.removeClass('highlightHoliday');

        $.ajax({
            url: 'HolidayCalenderLoadData',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { year: year, month: month, day: day, function: 'deleteHoliday', date: date },
            success: function (data) {

                new Noty({
                    text: 'Holiday Removed Successfully!',
                    type: 'warning'
                }).show();
            }
        });

    } else {

        $this.addClass('highlightHoliday');

        $.ajax({
            url: 'HolidayCalenderLoadData',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { year: year, month: month, day: day, function: 'clickedDateSave', date: date },
            success: function (data) {

                new Noty({
                    text: 'Data Saved Successfully!',
                    type: 'success'
                }).show();
            }
        });
    }
});


//Load Holidays to the Calender
function loadHolidaysToCalender() {
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

            if (data.result.length != 0) {

                $(data.result).each(function (key, val) {

                    $('.ui-datepicker-calendar').each(function () {
                        $(this).find('td a').removeClass('ui-state-active');
                        $(this).find('td a').removeClass('ui-state-hover');
                    });

                    if (val.stat == "allSaturdaysDisabled") {
                        $('.ui-datepicker-calendar tbody tr').each(function () {
                            $(this).find('td:eq(6):not(.ui-state-disabled)').addClass('highlightHoliday');
                        });
                        $('#disableSat').removeClass('bg-teal-400');
                        $('#disableSat').addClass('btn-danger');
                    }

                    if (val.stat == "allSundaysDisabled") {
                        $('.ui-datepicker-calendar tbody tr').each(function () {
                            $(this).find('td:eq(0):not(.ui-state-disabled)').addClass('highlightHoliday');
                        });
                        $('#disableSun').removeClass('bg-teal-400');
                        $('#disableSun').addClass('btn-danger');
                    }

                    if (val.stat == null) {

                        let year = val.year;
                        let month = val.month;
                        let day = val.day;

                        $('[attr-mon="' + month + '"]').find('.ui-datepicker-calendar .ui-state-default').filter(function (index) {
                            return (parseInt(index) + 1) === day;
                        }).parent().addClass('highlightHoliday');
                    }
                });
            } else {

                $('#disableSat').removeClass('btn-danger').addClass('bg-teal-400');
                $('#disableSun').removeClass('btn-danger').addClass('bg-teal-400');
            }
        }, complete: function () {

            closewait();
        }
    });
}


//Master Settings Save/ Update
$('#mastersettingssave').on('click', function () {

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

            const noOfRegAppointments = $('#txtNoOfRegularAppointments').val();
            const noOfPriorityAppointments = $('#txtNoOfPriorityAppointments').val();
            const noOfSputumCollection = $('#txtNoOfSputumCollections').val();
            const noOfVisaExtension = $('#txtNoOfVisaExtensions').val();
            const timeSlotForOneUser = $('#txtTimeSlotForOneUser').val();
            const regStartTime = $('#txtRegStartTime').val();
            const regEndTime = $('#txtRegEndTime').val();
            const effectiveDate = $('#txtEffectiveDate').val();
            const expireTime = $('#txtTokenExpTime').val();
            const radiologyValidation = $('#radiologyValidation').is(':checked');

            const hiddenId = $('#hiddenIdMasterSettings').val();

            if (hiddenId == "") {

                $.ajax({
                    url: 'MasterSettings',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        noOfRegAppointments: noOfRegAppointments,
                        noOfPriorityAppointments: noOfPriorityAppointments,
                        noOfSputumCollection: noOfSputumCollection,
                        noOfVisaExtension: noOfVisaExtension,
                        timeSlotForOneUser: timeSlotForOneUser,
                        slots: regStartTime,
                        usersperslot: regEndTime,
                        effectiveDate: effectiveDate,
                        expireTime: expireTime,
                        radiologyValidation: radiologyValidation,

                        function: 'Insert'
                    },
                    success: function (data) {

                        if (data.result == true) {

                            Swal(
                                'Data Saved Successfully!',
                                '',
                                'success'
                            );

                        }
                    }, complete: function () {
                        clearForm();
                    }
                });

            } else {

                $.ajax({
                    url: 'MasterSettings',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        noOfRegAppointments: noOfRegAppointments,
                        noOfPriorityAppointments: noOfPriorityAppointments,
                        noOfSputumCollection: noOfSputumCollection,
                        noOfVisaExtension: noOfVisaExtension,
                        timeSlotForOneUser: timeSlotForOneUser,
                        slots: regStartTime,
                        usersperslot: regEndTime,
                        effectiveDate: effectiveDate,
                        expireTime: expireTime,
                        radiologyValidation: radiologyValidation,
                        hiddenId: hiddenId,
                        function: 'Update'
                    },
                    success: function (data) {
                        if (data.result == true) {
                            Swal(
                                'Data Updated Successfully!',
                                '',
                                'success'
                            );
                        }
                    }, complete: function () {
                        clearForm();
                    }
                });
            }
        }
    });

});


//Master Settings Load
$('#loadCurrentSettings').on('click', function () {

    $.ajax({
        url: 'MasterSettings',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            function: 'loadMasterSettings'
        },
        success: function (data) {

            $(data.result).each(function (key, val) {

                $('#txtNoOfRegularAppointments').val(val.noregularappointments);
                $('#txtNoOfPriorityAppointments').val(val.nopriorityappointments);
                $('#txtNoOfSputumCollections').val(val.nosputumcollections);
                $('#txtNoOfVisaExtensions').val(val.novisaextensions);
                $('#txtTimeSlotForOneUser').val(val.timeslotperoneuser);
                $('#txtRegStartTime').val(val.slots);
                $('#txtRegEndTime').val(val.usersperslot);
                $('#txtEffectiveDate').val(val.effectivedate);
                $('#txtTokenExpTime').val(val.expiretime);

                if (val.radiologyValidation == true) {
                    $('#radiologyValidation').prop('checked', true);
                } else {
                    $('#radiologyValidation').prop('checked', false);
                }

                $('#hiddenIdMasterSettings').val(val.mastersettingsid);
            });
        }
    });

});


//Clear Inputs
$('#btnClear').on('click', function () {

    clearForm();
});


function clearForm() {
    $('#txtNoOfRegularAppointments').val("");
    $('#txtNoOfPriorityAppointments').val("");
    $('#txtNoOfSputumCollections').val("");
    $('#txtNoOfVisaExtensions').val("");
    $('#txtTimeSlotForOneUser').val("");
    $('#txtRegStartTime').val("");
    $('#txtRegEndTime').val("");
    $('#txtEffectiveDate').val("");
    $('#txtTokenExpTime').val("");

    $('#hiddenIdMasterSettings').val("");
}


//Time Picker
$('.timePickerx').timepicker();


// Initialize
var selectedDate = "";
var closedArray = [];
loadScheCal();

function loadScheCal() {
    $.ajax({
        url: 'notAvailableDates',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {},
        success: function (data) {
            $(data.result).each(function (k, v) {
                closedArray.push(v.date);
            });
        }, complete: function () {

            $('#calenderPanelSel').datepicker('destroy');

            $('#calenderPanelSel').datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0,
                onSelect: function (dateText, inst) {
                    selectedDate = $(this).val();
                    inst.show()
                },
                beforeShowDay: function (date) {

                    var month = (date.getMonth() + 1);
                    if (date.getMonth() < 9)
                        month = "0" + month;

                    var day = (date.getDate());
                    if (date.getDate() < 10)
                        day = "0" + day;

                    var ymd = date.getFullYear() + "-" + month + "-" + day;

                    var noWeekend = $.datepicker.noWeekends(date);
                    if (noWeekend[0]) {

                        if ($.inArray(ymd, closedArray) != -1) {
                            return [false, "Closed", "Closed"];
                        }

                        return [$.inArray(ymd, closedArray) == -1];
                    } else
                        return noWeekend;

                }
            });

            $('#calenderPanelSel .ui-state-default').attr('href', 'javascript:void(0);');
        }
    });
}


$("#drpChangeType").on('change', function () {

    var valRadio = $(this).val();
    if (valRadio == "wholeDay") {
        $('#timeContainer').html("");
    }
});


$(document).on('click', '#calenderPanelSel .ui-state-default', function () {
    $('#calenderPanelSel .ui-state-default').attr('href', 'javascript:void(0);');

    var valRadio = $("#drpChangeType").val();

    var $this = $(this);

    $('#calenderPanelSel .ui-state-default').removeClass('selectedDateWorkSchedule');
    $this.addClass('selectedDateWorkSchedule');

    if ($this.parent().hasClass('Closed')) {

        Swal.fire({
            title: 'Are you sure you want to remove closed status?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Remove it!'
        }).then((result) => {
            if (result.value) {

                const monthNames = ["January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ];
                const day = parseInt($this.text());
                var month = parseInt($this.parents('table').prev().find('.ui-datepicker-title .ui-datepicker-month').text());
                var month = $.inArray(month, monthNames);
                const year = parseInt($this.parents('table').prev().find('.ui-datepicker-title .ui-datepicker-year').text());
                const date = "" + year + "-" + String("00" + month).slice(-2) + "-" + String("00" + day).slice(-2) + "";

                $.ajax({
                    url: 'removeClosedDayWorkSchedule',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { date: date },
                    success: function (data) {
                        Swal.fire(
                            'Deleted!',
                            '',
                            'success'
                        );

                        $this.parent().removeClass('ui-datepicker-unselectable ui-state-disabled Closed');
                        $this.parent().removeAttr('title');
                    }
                });

            }
        }
        )

    } else {
        if (valRadio == "timeSlots") {

            if (!$this.parent().hasClass('ui-state-disabled')) {


            }
        } else if (valRadio == "wholeDay") {

            $this.parent().addClass(' ui-datepicker-unselectable ui-state-disabled Closed');
            $this.parent().attr('title', 'Closed')
        }
    }

});


$(document).on('change', '.txtMem', function () {
    $(this).parents('tr').addClass('memChange');
});


$('#saveManageSchedule').on('click', function () {

    var valRadio = 'wholeDay';
    saveManageSchedules(valRadio);
});


function saveManageSchedules(valRadio) {
    var time = [];


    $.ajax({
        url: 'manageworkschedule',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            dateSelected: selectedDate,
            status: valRadio,
            time: time,
        },
        success: function (data) {

            if (data.result == true) {

                Swal(
                    'Data Saved Successfully!',
                    '',
                    'success'
                );
            }
        }, complete: function () {
            // clearForm();
        }
    });

}


$(document).on('change', '.checkboxLablePrefType', function () {
    var $this = $(this);
    if ($this.is(':checked') == true) {

        $(this).parents('tr').find('td:nth-child(3) input').attr('disabled', true);
    } else {

        $(this).parents('tr').find('td:nth-child(3) input').attr('disabled', false);
    }

});


$('#saveUpdateWebNotice').on('click', function () {
    var title = $('#titleweb').val();
    var content = $('#summernote').summernote('code');

    $.ajax({
        url: 'SaveWebNotice',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            title: title,
            content: content,
        },
        success: function (data) {

            if (data.result == true) {

                Swal(
                    'Data Saved Successfully!',
                    '',
                    'success'
                );
            }
        }, complete: function () {
        }
    });
});


$('#loadContent').on('click', function () {
    $.ajax({
        url: 'LoadWebNotice',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {},
        success: function (data) {
            $('#titleweb').val(data.title);
            $('#summernote').summernote('code', data.content);
        }
    });
});


$(".datepicker").datepicker({
    dateFormat: 'yy-mm-dd',
    minDate: 0,
    changeMonth: true,
    changeYear: true,
});


$('.chgDate').on('change', function () {

    if ($('#txtDateStartDate').val() != "" && $('#txtDateEndDate').val() == "") {
        return;
    } else {
        if ($('#txtDateStartDate').val() == "" || $('#txtDateEndDate').val() == "") {
            Swal(
                'Start & end dates required!',
                '',
                'error'
            );

            return;
        }
    }


    $.ajax({
        url: 'LoadTimeAvailableWorkSchedule',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {},
        success: function (data) {

            var html = "";
            $(data).each(function (k, v) {

                html += "<tr><td><span class=\"checkbox\"><input class=\"checkboxLablePrefType\" type=\"checkbox\" id=\"id" + k + "\"><label for=\"id" + k + "\" style=\"padding: 0 12px 6px;\"></label></span></td>";
                html += "<td style=\"text-align: center;\">" + v + "</td></tr>";
            });

            $('#timeContainer').html("");
            $('#timeContainer').html(html);
        }
    });
});


$('#saveManageScheduleTime').on('click', function () {

    var startdate = $('#txtDateStartDate').val();
    var enddate = $('#txtDateEndDate').val();
    var members = $('#txtMembers').val();

    var dateArray = getDates(new Date(startdate), new Date(enddate));
    var time = [];

    $('#timeContainer tr').each(function (k) {
        k++;
        var $this = $(this);
        if ($this.find('td:nth-child(1) .checkboxLablePrefType').is(':checked')) {
            time.push('off');
        } else {
            time.push('on');
        }
    });

    $.ajax({
        url: 'savemanageworkscheduletime',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            dateArray: dateArray,
            time: time,
            members: members,
        },
        success: function (data) {

            if (data.result == true) {

                Swal(
                    'Data Saved Successfully!',
                    '',
                    'success'
                );
            }
        }, complete: function () {
            $('#txtDateStartDate').val("");
            $('#txtDateEndDate').val("");
            $('#txtMembers').val("");
            $('#timeContainer').html("");
        }
    });

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
