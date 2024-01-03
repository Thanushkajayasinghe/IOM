var appNo = 0;
var token = 0;
$('#title').hide();
$('#otherLable1').hide();
$('#otherLable2').hide();
$('#otherLable3').hide();
$('#otherLable4').hide();
$('#tkn').hide();

$("#clearButton").click(function () {
    $("#token_text").html('-');
});


$("#tokenIssueNew").on('click', function () {

    if ($("#token_issue").val().length > 0) {
        wait();

        $.ajax({
            url: 'TokenIssueLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {id: $("#token_issue").val()},
            success: function (data) {

                $("#token_text").html(data[0]);
                token = data[0];
                appNo = data[1];
            },
            error: function (data) {
                alert("error" + JSON.stringify(data));
            }, complete: function () {
                closewait();
            }
        });
    }

});


$("#printButton").click(function () {

    $('#Print_token').hide();
    $('#title').show();
    $('#otherLable1').show();
    $('#otherLable2').show();
    $('#otherLable3').show();
    $('#otherLable4').show();
    $('#tkn').show();


    $.ajax({
        url: 'TokenIssueTokenAllocate',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            appno: appNo,
            token: token
        },

        success: function (data) {

            $(data.result2).each(function (key, val) {
                $('#DateofAppointment').text(val.AppointmentDate);
            });
            var dt = new Date();
            var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
            $('#Timeoftokenissue').text(time);

            var divToPrint = document.getElementById("Print_token");
            newWin = window.open("");
            //C:\wamp\www\IOM\public\css\TokenIssue.css
            newWin.document.write('<link rel="stylesheet" media="screen,print" href="css/TokenIssue.css" type="text/css" />');
            newWin.document.write("<body   style='width: 7.62cm; height: 480px; font-size: 30px;'>");
            var T = $('#title').text();
            newWin.document.write('<div class="col-md-12" style="text-align: center" id="title"><span style="font-size: 14px;"><b>' + T + '</b></span></div>');

            newWin.document.write('<div class="col-md-12" style="text-align: center"  id="tkn"><label>Token Number</label></div>');
            var TokenNumber = $('#token_text').text();
            newWin.document.write('<div class="col-md-12" style="text-align: center"  id="token_text"><label style="font-size: 4rem;">&nbsp;' + TokenNumber + '</label></div>');
            var DateofAppointment = $('#DateofAppointment').text();
            newWin.document.write('<div class="col-md-12" style="text-align: center" id="otherLable1">\n' +
                '                                    <label style="font-size: 14px;">&nbsp;Date of Appointment:</label>\n' +
                '                                    <label id="DateofAppointment" style="font-size: 14px;">' + DateofAppointment + '</label>\n' +
                '                                </div>');


            newWin.document.write('<div class="col-md-12" style="text-align: center" id="otherLable3">\n' +
                '                                    <label style="font-size: 14px;">&nbsp;Time of token issue:</label>\n' +
                '                                    <label id="Timeoftokenissue" style="font-size: 14px;">' + time + '</label>\n' +
                '                                </div>');
            newWin.document.write("</body>");

            newWin.print();
            // newWin.close();


        },
        complete: function () {
            $("#token_text").html('-');
            $("#DateofAppointment").html('');
            $("#Timeoftokenissue").html('');
            $("#token_issue").val('');
            $('#title').html("");
            $('#otherLable1').html("");
            $('#otherLable2').html("");
            $('#otherLable3').html("");
            $('#otherLable4').html("");
            $('#tkn').html("");
            $('#Print_token').show();
        },

        error: function (data) {
            alert("erro" + JSON.stringify(data));

        }
    });

});
