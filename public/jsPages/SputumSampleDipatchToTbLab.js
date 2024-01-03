$(document).ready(function () {
    SetDateTime();
    $("#BC").focus();

    function SetDateTime() {
        var now = new Date();
        var year = now.getFullYear();
        var month = now.getMonth() + 1;
        var day = now.getDate();
        var hour = now.getHours();
        var minute = now.getMinutes();
        var second = now.getSeconds();
        if (month.toString().length == 1) {
            month = '0' + month;
        }
        if (day.toString().length == 1) {
            day = '0' + day;
        }
        if (hour.toString().length == 1) {
            hour = '0' + hour;
        }
        if (minute.toString().length == 1) {
            minute = '0' + minute;
        }
        if (second.toString().length == 1) {
            second = '0' + second;
        }
        var date = year + '/' + month + '/' + day;
        var Time = hour + ':' + minute;

        $('#date').val(date);
        $('#Time').val(Time);
    }

    // Load Data
    $('#colldate').on('change', function () {
        var date = $('#colldate').val();

        $.ajax({
            url: 'TBSputumDispatchLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                function: 'LoadData',
                date: date,
            },
            success: function (data) {
                var html = "";
                var no = 0;

                $(data.result).each(function (key, val) {
                    no++;
                    html += '<tr>';
                    html += '<td>' + no + '</td>';
                    html += '<td style="display: none">' + val.sc_id + '</td>';
                    html += '<td>' + val.barcode + '</td>';
                    html += '<td><input class="form-control userPerSelect cb-element" name="tblchk" id="userPerSelectId' + no + '" type="checkbox"><label for="userPerSelectId' + no + '" style="padding: 7px 12px;"></label></td>';
                    html += '</tr>';
                });
                $("#BC").focus();
                $('#verifyStatTable').html("");
                $('#verifyStatTable').html(html);
            }
        });

    });

    // Save
    $('#verifybtn').on('click', function () {

        Swal.fire({
            title: 'Are you sure?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Submit!'
        }).then((result) => {
            if (result.value) {

                SetDateTime();
                var date = $('#date').val();
                var time = $('#Time').val();


                if (date != "" && time != "") {

                    var fields = $("input[name='tblchk']").serializeArray();

                    if (fields.length != 0) {
                        var arr = [];
                        var idd = 0;
                        var barcode = 0;
                        $('#verifyStatTable tr').each(function () {

                            if ($(this).find(':checkbox').is(':checked')) {
                                idd = $(this).find('td:nth-child(2)').text();
                                barcode = $(this).find('td:nth-child(3)').text();

                                arr.push([idd, barcode]);
                            }

                        });

                        const colldat = $('#colldate').val();
                        const date = $('#date').val();
                        const time = $('#Time').val();
                        var arrayToSend = JSON.stringify(arr);

                        $.ajax({
                            url: 'TBSputumDispatchLoadData',
                            type: 'post',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                function: 'SaveData',
                                colldat: colldat,
                                date: date,
                                time: time,
                                arrayToSend: arrayToSend,

                            },
                            success: function (data) {

                                if (data.result == true) {

                                    Swal.fire({
                                        type: 'success',
                                        title: 'Data Verify Successfully!',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'ok'
                                    }).then((result) => {
                                        if (result.value) {
                                            location.reload();
                                        }
                                    })

                                }
                            }
                        });

                    } else {
                        Swal.fire(
                            'Empty Select',
                            '',
                            'warning'
                        )
                    }
                } else {
                    Swal.fire(
                        'Date & Time Empty',
                        '',
                        'warning'
                    )
                }
            }
        });
    });


    // Enter barcode and select chekbox
    $('#BC').on('change', function (e) {

        var typBarCode = $('#BC').val();
        var no = 0;
        var no1 = 0;
        $('#verifyStatTable tr').each(function () {
            no++;
            barcode = $(this).find('td:nth-child(3)').text();
            if (typBarCode == barcode) {
                $("#userPerSelectId" + no + "").prop("checked", true);
                $('#BC').val("");
            } else {
                no1++;
            }

        });


        var rowCount = $('#verifyStatTable tr').length;
        if (rowCount == no1) {

            Swal.fire({
                type: 'error',
                title: 'Barcode Number Not Found!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ok'
            }).then((result) => {
                if (result.value) {
                    $('#BC').val("");
                }
            })

        }

    });


// table head chekbox
    $("#Alltblchk").on('click', function () {
        if ($("#Alltblchk").prop('checked') == true) {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        } else {
            $("input:checkbox").prop('checked', false);
        }
    })


//Time Picker
    $('.timePickerx').timepicker();
});
