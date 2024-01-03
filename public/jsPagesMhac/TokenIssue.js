$(document).ready(function () {
    $("#tokenIssueNew").on('click', function () {
        var appointOrPassportNo = $("#token_issue").val();
        $.ajax({
            url: 'MhacTokenIssue',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { appointOrPassportNo: appointOrPassportNo, function: 'checkNo' },
            success: function (data) {
                if (data.message == '0') {
                    //  $("#token_text").html(data.token_number);
                    Swal.fire({
                        type: 'error',
                        title: 'Invalid Appointment Number or Passport Number!',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'ok'
                    });
                }
                 if (data.message == '1') {
                    //  $("#token_text").html(data.token_number);
                    Swal.fire({
                        type: 'error',
                        title: 'Please use the Main member Appointment Number or Passport Number!',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'ok'
                    });
                }
                if (data.message == '2') {
                    //  $("#token_text").html(data.token_number);
                    Swal.fire({
                        type: 'error',
                        title: 'Invalid appoinment date!',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'ok'
                    });
                }
                 if (data.message == '3') {
                    //  $("#token_text").html(data.token_number);
                    Swal.fire({
                        type: 'error',
                        title: 'You can obtain the token within 30 min!',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'ok'
                    });
                }
                 if (data.message == '4') {
                    $("#token_text").html(data.token_number);
                }
                if (data.message == '5') {
                    Swal.fire({
                        type: 'error',
                        title: 'The token has been already obtained!',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'ok'
                    });
                }

            },
            error: function (data) {
                alert("error" + JSON.stringify(data));
            }, complete: function () {

            }
        });
    });
    $("#printButton").click(function () {
        var appointOrPassportNo = $("#token_issue").val();
        var tokenText = $("#token_text").html();
        if (tokenText == '&nbsp;- ') {
            Swal.fire({
                type: 'error',
                title: 'Please get token!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ok'
            });
        }
        else {
            $.ajax({
                url: 'MhacTokenIssue',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { appointOrPassportNo: appointOrPassportNo, function: 'printNo' },
                success: function (data) {
                    if (data.message == 7) {
                       
                        newWin = window.open("");
                        newWin.document.write('<link rel="stylesheet" media="screen,print" href="css/TokenIssue.css" type="text/css" />');
                        newWin.document.write("<body style='width: 7.62cm; height: 300px; font-size: 30px;'>");
                        // Title
                        var titleText = $('#title').text();
                        newWin.document.write('<div style="text-align: center; font-size: 14px;"><b>' + titleText + '</b></div>');
                        // Token Number
                        var tokenText = $('#token_text').text();
                        newWin.document.write('<label style="text-align: center; font-size: 4rem; display: block; margin: 10px auto;">&nbsp;' + tokenText + '</label>');
                        // Date of Appointment
                        newWin.document.write('<label style="text-align: center; font-size: 14px;  margin: 10px auto;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of Appointment: ' + data.appoinment_date + '</label><div></div>');
                        // Time of Token Issue
                        newWin.document.write('<label style="text-align: center; font-size: 14px;  margin: 10px auto;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Time of token issue : ' + data.issue_time + '</label><div></div>');
                        // Appointment Time
                        newWin.document.write('<label style="text-align: center; font-size: 14px;  margin: 10px auto;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Appointment Time : ' + data.appoinment_time + '</label><div></div>');
                        // Floor
                        newWin.document.write('<label style="text-align: center; font-size: 14px;  margin: 10px auto;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Floor : ' + data.floor + '</label><div></div>');
                        newWin.document.write("</body>");
                        newWin.print();
                    }
                },
                error: function (data) {
                    alert("error" + JSON.stringify(data));
                }, complete: function () {

                }
            });
        }



    });

    $("#clearButton").click(function () {
        $("#token_text").html('-');
    });


});