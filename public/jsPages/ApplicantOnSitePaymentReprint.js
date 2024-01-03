$('#Verify').on('click', function () {

    var PassportNo = $('#PassportNo').val();
    var appid = $('#AppointmentNo').val();

    if (PassportNo != "" || appid != "") {

        $.ajax({
            url: 'PaymentLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'VerifyReprint',
                PassportNo: $('#PassportNo').val(),
                appid: $('#AppointmentNo').val()
            },
            success: function (data) {
                if (data == "Please enter a correct appointment number or passport number!") {
                    Swal(data, '', 'warning');
                } else {

                    $('#PassportNo').val(data[0]);
                    $('#NameInFull').val(data[1]);
                    $('#AppointmentDate').val(data[2]);
                    $('#AppointmentNo').val(data[3]);

                    $.ajax({
                        url: 'PaymentLoadData',
                        type: 'post',
                        dataType: 'json',
                        async: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            command: 'family',
                            appointmentno: $('#AppointmentNo').val()
                        },
                        success: function (data) {
                            $("#addTabeleData").html('');
                            $.each(data, function (key, val) {
                                $("#addTabeleData").append('<tr> <td>' + val[0] + ' ' + val[1] + '</td> <td>' + val[2] + '</td><td>' + val[3] + '</td></tr>');
                            });
                        }
                    });

                    $.ajax({
                        url: 'PaymentLoadData',
                        type: 'post',
                        dataType: 'json',
                        async: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            command: 'loadPaymentreprint',
                            appointmentno: $('#AppointmentNo').val()
                        },
                        success: function (data) {
                            $('#pc_fee').val(data.result);
                            $('#pc_receipt_no').val(data.receiptno);
                        }
                    });
                }
            }
        });
    } else {
        Swal('Passport No / Appointment No Empty', '', 'warning');
    }
});

$('#btnReprint').on('click', function () {
    var pa = path + '/generateReceipt?appointmentno=' + $('#AppointmentNo').val();
    window.open(pa, '');
});

$('#btncler').on('click', function () {
    location.reload();
});



