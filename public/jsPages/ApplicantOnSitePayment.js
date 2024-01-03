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
                command: 'Verify',
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
                            command: 'loadPayment',
                            appointmentno: $('#AppointmentNo').val()
                        },
                        success: function (data) {
                            $('#pc_fee').val(data.result);
                            var receiptNo = '';

                            if (data.maxNo == null) {
                                receiptNo = 'R-1';
                            } else {
                                receiptNo = 'R-' + (parseInt((data.maxNo)) + parseInt(1)) + '';
                            }

                            $('#pc_receipt_no').val(receiptNo);
                        }
                    });
                }
            }
        });
    } else {
        Swal('Passport No / Appointment No Empty', '', 'warning');
    }
});


$('#save').on('click', function () {

    Swal.fire({
        title: 'Are you sure?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Submit!'
    }).then((result) => {
        if (result.value) {

            var PayMode = $('#pc_pay_mode').val();
            if (PayMode == '') {

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'center',
                    showConfirmButton: false,
                    timer: 3000
                });

                Toast.fire({
                    type: 'warning',
                    title: 'please select payment method..?'
                })

            }else{

                var appno = $('#AppointmentNo').val();
                var PassportNo = $('#PassportNo').val();
                var NameInFull = $('#NameInFull').val();
                var pc_receipt_no = $('#pc_receipt_no').val();
                var pc_fee = $('#pc_fee').val();

                if (appno == "" && PassportNo == "" && NameInFull == "" && pc_receipt_no == "" && pc_fee == "") {
                    Swal('Data Empty', '', 'warning');
                } else {

                    $.ajax({
                        url: 'PaymentLoadData',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            command: 'save',
                            appno: $('#AppointmentNo').val(),
							passNo: $('#PassportNo').val(),
                            pc_fee: $('#pc_fee').val(),
                            pc_pay_mode: $('#pc_pay_mode').val(),
                            pc_receipt_no: $('#pc_receipt_no').val()
                        },
                        success: function (data) {
                            if (data=="Done"){

                                Swal('Data Saved', '', 'success');

                                Swal.fire({
                                    type: 'success',
                                    title: 'Data Saved Successfully!',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'ok'
                                }).then((result) => {
                                    if (result.value) {                                    

                                        $('#AppointmentNo').val("");
                                        $('#PassportNo').val("");
                                        $('#AppointmentDate').val("");
                                        $('#NameInFull').val("");
                                        $('#pc_receipt_no').val("");
                                        $('#pc_pay_mode').val("");
                                        $('#pc_fee').val("");
                                        $('#addTabeleData').html("");

                                        $.ajax({
                                            url: 'Receipt',
                                            type: 'post',
                                            dataType: 'json',
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            data: {
                                                appointmentno: $('#AppointmentNo').val()
                                            },
                                            success: function (data) {

                                            }, complete: function (data) {
                                                var pa = path + '/generateReceipt?appointmentno=' + appno;
                                                window.open(pa, '');
                                            }
                                        });
                                    }
                                })
                            }else if(data=="AlredyExit"){
                                Swal('Already payed!', '', 'warning');
                            }
                        }
                    });
                }
            }
        }
    });
});


// clear button
$('#btncler').on('click', function () {
    location.reload();
});
