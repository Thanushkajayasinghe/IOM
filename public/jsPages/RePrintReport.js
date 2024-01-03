$(document).ready(function () {

    loadAppointmentNo();

    function loadAppointmentNo() {

        $.ajax({
            url: 'LoadRePrintReports',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                function: 'loadAppointments'
            },
            success: function (data) {

                var option = "<option selected='selected' value='' disabled='disabled'>--Select--</option>";

                $(data.result).each(function (key, val) {

                    option += '<option value='+val.appointment_no+'>' +val.appointment_no+ '</option>';

                });


                $("#appno").html(option);


            }
        });
    }


    $("#paymentCounter").on('click', function () {

        var appno = $("#appno").val();

        if(appno != "" && appno != null) {
            var pa = '/IOM/generateReceipt?appointmentno=' + appno;
            window.open(pa, '');
        }

    });


    $("#RadiologistReporting").on('click', function () {

        var appno = $("#appno").val();

        if(appno != "" && appno != null) {
            var pa = '/IOM/generatePdf?Appno=' + appno;
            window.open(pa, '');
        }

    });




    $("#ConsultantPtint").on('click', function () {

        var appno = $("#appno").val();

        if(appno != "" && appno != null){

            var pa = '/IOM/generateCertificate?appNo=' + appno;
            window.open(pa, '');

        }


    });


    $("#ConsultantSummery").on('click', function () {

        var appno = $("#appno").val();

        if(appno != "" && appno != null){

            var pa = '/IOM/generateSummaryReport?appNo=' + appno;
            window.open(pa, '');

        }


    });



    $("#appno").on('change', function(){

        var appno = $("#appno").val();

        $("#appname").text("");
        $("#apptime").text("");
        $("#appdate").text("");

        if(appno != "" && appno != null){


            $.ajax({
                url: 'LoadRePrintReports',
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    function: 'loadDetails',
                    appno:appno
                },
                success: function (data) {

                    $(data.result).each(function (key, val) {

                        $("#appname").text(val.FirstName + ' ' + val.LastName);
                        $("#apptime").text(val.time);
                        $("#appdate").text(val.date);

                    });




                    $('.panelname').show();
                }
            });



        }

    });




});