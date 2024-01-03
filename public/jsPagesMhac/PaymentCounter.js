$(document).ready(function() {
    $('#Verify').on('click', function () {
        var PassportNo = $('#PassportNo').val();
        var appid = $('#AppointmentNo').val();
        if (PassportNo != "" || appid != "") {
             $.ajax({
                url: '/IOM/VerifyURL',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                     PassportNo: $('#PassportNo').val(),
                    appid: $('#AppointmentNo').val(),
                    country: location.href.substring(location.href.lastIndexOf('/') + 1)
                },
                success: function (data) {
                    if (data.length == 0 || data.message  === "No data available!") {
                        Swal({
                            title: 'Warning',
                            text: 'Please enter a  main memebr correct appointment number or passport number!',
                            icon: 'warning',
                        });
                    }
                     else {
                        $('#PassportNo').val(data[0].passport_no);
                        $('#NameInFull').val(data[0].first_name + ' ' + data[0].last_name);
                        $('#AppointmentDate').val(data[0].appointment_date);
                        $('#AppointmentNo').val(data[0].appointment_no);
                
                        $("#addTabeleData").html('');
                        var rowCount = 0;
                        $.each(data, function (index, item) {
                            rowCount++; 
                            var fullName = (item.first_name || '') + ' ' + (item.last_name || '');
                            $("#addTabeleData").append('<tr><td>' +fullName+'</td><td>' + item.passport_no + '</td><td>' + item.payment + '</td></tr>');
                        });
                        var fullamount=rowCount*data[0].payment
                        $('#pc_fee').val(fullamount);
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
                     var country =location.href.substring(location.href.lastIndexOf('/') + 1)
                    if (appno == "" && PassportNo == "" && NameInFull == "" && pc_receipt_no == "" && pc_fee == "") {
                        Swal('Data Empty', '', 'warning');
                    } else {
    
                        $.ajax({
                            url: '/IOM/SaveURLPaymentCounter',
                            type: 'post',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                appno: $('#AppointmentNo').val(),
                                passNo: $('#PassportNo').val(),
                                pc_fee: $('#pc_fee').val(),
                                pc_pay_mode: $('#pc_pay_mode').val(),
                                AppDate:$('#AppointmentDate').val(),
                                country: location.href.substring(location.href.lastIndexOf('/') + 1)
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
                                            var pa = path + '/generateReceiptPaymentCounter?appointmentno=' + appno + '&country=' + country ;

                                                window.open(pa, '');
                                                $('#AppointmentNo').val("");
                                                $('#PassportNo').val("");
                                                $('#AppointmentDate').val("");
                                                $('#NameInFull').val("");
                                                $('#pc_receipt_no').val("");
                                                $('#pc_pay_mode').val("");
                                                $('#pc_fee').val("");
                                                $('#addTabeleData').html("");
                                            // $.ajax({
                                            //     url: 'MhacReceipt',
                                            //     type: 'post',
                                            //     dataType: 'json',
                                            //     headers: {
                                            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            //     },
                                            //     data: {
                                            //         appointmentno: $('#AppointmentNo').val()
                                            //     },
                                            //     success: function (data) {
    
                                            //     }, complete: function (data) {
                                            //         var pa = path + '/generateReceipt?appointmentno=' + appno;
                                            //         window.open(pa, '');
                                            //     }
                                            // });
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
});