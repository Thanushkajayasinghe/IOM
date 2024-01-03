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
        $('#time').val(Time);
    }


// Load Data
    LoadData();

    function LoadData() {

        $.ajax({
            url: 'TBRecLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {function: 'LoadData'},
            success: function (data) {

                var html = "";
                var no = 0;

                $(data.result).each(function (key, val) {
                    no++;
                    html += '<tr>';
                    html += '<td style="display: none">' + val.dtblabid + '</td>';
                    html += '<td>' + no + '</td>';
                    html += '<td>' + val.barcode + '</td>';
                    html += '<td></td>';
                    html += '<td>' + val.date + '</td>';
                    html += '<td>' + val.time + '</td>';
                    html += '<td><input type="text" class="form-control LN" placeholder="LAB No" name="LabNo' + no + '" id="LabNo' + no + '"></td>';
                    html += '</tr>';
                });
                $("#BC").focus();
                $('#verifyStatTable').html("");
                $('#verifyStatTable').html(html);
            }
        });

    }


    // Enter barcode and select chekbox
    $('#BC').on('change', function (e) {

        var typBarCode = $('#BC').val();
        var no = 0;
        var no1 = 0;
        $('#verifyStatTable tr').each(function () {
            no++;
            barcode = $(this).find('td:nth-child(3)').text();
            if (typBarCode == barcode) {
                $('#LabNo' + no + "").focus();
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


    // Table textfield press enter and forcus to barcode textfield
    $(document).on("keypress", ".LN", function (e) {
        if (e.which == 13) {
            $('#BC').focus();
        }
    });


    // Save Data
    $('#btnreceive').on('click', function () {

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
                var time = $('#time').val();

                var $nonempty = $('.LN').filter(function () {
                    return this.value != ''
                });

                if ($nonempty.length != 0) {
                    var arr = [];
                    var idd = 0;
                    var labnoo = "";

                    $('#verifyStatTable tr').each(function () {

                        var aa = $(this).find("td:nth-child(7) input").val();

                        if (aa != "") {
                            var idd = $(this).find('td:nth-child(1)').text();
                            var labno = $(this).find("td:nth-child(7) input").val();

                            arr.push([idd, labno]);
                        }

                    });


                    const date = $('#date').val();
                    const time = $('#time').val();
                    var arrayToSend = JSON.stringify(arr);

                    $.ajax({
                        url: 'TBRecLoadData',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            function: 'SaveData',
                            date: date,
                            time: time,
                            arrayToSend: arrayToSend,

                        },
                        success: function (data) {

                            if (data.result == true) {

                                Swal.fire({
                                    type: 'success',
                                    title: 'Data Receive Successfully!',
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
                        'All Lab No Empty',
                        '',
                        'warning'
                    )
                }
            }
        });

    });


});
