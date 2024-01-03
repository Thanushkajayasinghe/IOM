$('#dateHolder').on('change', function () {
    loadDate();
});

function loadDate() {

    const date = $('#dateHolder').val();

    $('#verifyStatTable').html("");

    $.ajax({
        url: 'AppointmentCancellationListLoadTable',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {date: date},
        success: function (data) {

            var html = "";
            var co = 0;
            $(data.result).each(function (key, val) {
                co++;
                var reDate = '';
                var reTime = '';
                if (val.reschedule_date != null) {
                    reDate = val.reschedule_date;
                }

                if (val.reschedule_time != null) {
                    reTime = val.reschedule_time;
                }

                html += "<tr>" +
                    "<td>" + co + "</td>" +
                    "<td>" + val.status + "</td>" +
                    "<td>" + val.appointment_no + "</td>" +
                    "<td>" + val.PassportNumber + "</td>" +
                    "<td>" + val.FirstName + "</td>" +
                    "<td>" + val.date + "</td>" +
                    "<td>" + val.time + "</td>" +
                    "<td>" + reDate + "</td>" +
                    "<td>" + reTime + "</td>" +
                    "<td>" + val.name + "</td>" +
                    "</tr>";
            });

            $('#verifyStatTable').html("");
            $('#verifyStatTable').html(html);
        }

    });
}


//print record history
$('#btnPrintList').on('click', function () {

    var onePage = "";
    var trs = "";
    var bodyElHeight = 0;
    var count = 1;
    var headerHeight = 74;
    var footerHeight = 15;
    var header = '<div class="col-md-12"><p style="border-bottom: 1px solid; font-weight: bold;" align="center">APPOINTMENT CANCEL/RE SCHEDULE LIST</p></div>';
    var tHead = $('#tblList thead').html();
    var a4page = ((3.779528 * 297) - (headerHeight + footerHeight));
    var pageCount = Math.ceil($('#verifyStatTable').height() / a4page);


    $('#verifyStatTable tr').each(function () {

        var $this = $(this);
        bodyElHeight += parseFloat($this.height());

        trs += $this[0].outerHTML;

        var pageNext = $this.next().height();
        var total = bodyElHeight + pageNext;

        if ((a4page * count) < total) {
            onePage += '<div class="pageL ' + count + '" style="position: relative;"><div class="header" style="min-height: 20px; border-bottom: 1px solid;">' + header + '</div><div class="bodyContainer"><table class="table table-bordered table-striped table-condensed" style="margin-bottom: 0;"><thead>' + tHead + '</thead><tbody>' + trs + '</tbody></table></div><div class="footer" style="position: absolute;bottom: 0;right: 0;left: 0;"><div style="text-align: center;">Page ' + count + ' Of ' + pageCount + '</div></div></div>';
            count++;
            trs = "";
        }
    });

    if (trs != "") {
        onePage += '<div class="pageL ' + count + '" style="position: relative;"><div class="header" style="min-height: 20px; border-bottom: 1px solid;">' + header + '</div><div class="bodyContainer"><table class="table table-bordered table-striped table-condensed" style="margin-bottom: 0;"><thead>' + tHead + '</thead><tbody>' + trs + '</tbody></table></div><div class="footer" style="position: absolute;bottom: 0;right: 0;left: 0;"><div style="text-align: center;">Page ' + count + ' Of ' + pageCount + '</div></div></div>';
    }

    newWin = window.open("");
    newWin.document.write('<!DOCTYPE html><html><head><title></title>');
    newWin.document.write('<link rel="stylesheet" media="screen,print" href="' + urlPath + '/css/bootstrap.min.css" type="text/css" />');
    newWin.document.write('<link rel="stylesheet" media="screen,print" href="' + urlPath + '/css/printTableReceivedList.css" type="text/css" />');
    newWin.document.write('<link rel="stylesheet" media="screen,print" href="' + urlPath + '/css/modern.css" type="text/css" />');
    newWin.document.write('</head><body>');
    newWin.document.write(onePage);
    newWin.document.write('</body></html>');
    newWin.document.close();
    newWin.focus();

    setTimeout(function () {
        newWin.print();
    }, 800);

});

