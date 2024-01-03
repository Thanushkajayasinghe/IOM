$(document).ready(function () {

    $("#printbtn").hide();

    $("#verify").change(function () {
        if ($("#verify").val() == 2) {
            $("#printbtn").hide();
        } else if ($("#verify").val() == 1) {
            $("#printbtn").show();
        }
    });

    $(function () {
        $.ajax({
            url: 'SampleCollectionLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'load'
            },
            success: function (data) {

                $.each(data, function (key, val) {
                    $('#sampleRow').append('<tr class="appNum"> <td>' + val['cm_pass_no'] + '</td> </tr>');
                });
            },
            error: function (data) {
                alert(JSON.stringify(data));
            }
        });
    });

    $(document).on('click', "tr.appNum", function () {

        $('tr.appNum').removeClass('clickedRow');
        $(this).addClass('clickedRow');
        var passNum = $(this).text();
        $.ajax({
            url: 'SampleCollectionLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'data',
                appointment: passNum
            },
            success: function (data) {
                $('#AppointmentNo').val(data);
                $('#PassportNo').val(passNum);
            },
            error: function (data) {
                alert(JSON.stringify(data));
            }
        });

        $(this).hide();
    });

    $('#verifybutton').on('click', function () {

        var AppointmentNo = $('#AppointmentNo').val();
        var PassportNo = $('#PassportNo').val();

        if (AppointmentNo != "" & PassportNo != "") {


            Swal.fire({
                title: 'Are you sure?',
                // text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, verify it!'
            }).then((result) => {
                if (result.value) {
                    var barcode = new Date().valueOf();

                    $.ajax({
                        url: 'SampleCollectionLoadData',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            command: 'save',
                            appno: $('#AppointmentNo').val(),
                            ppno: $('#PassportNo').val(),
                            verified: $('#verify').val(),
                            barcode: barcode,

                        },
                        success: function (data) {

                            Swal.fire({
                                type: 'success',
                                title: 'Data Saved Successfully!',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ok'
                            }).then((result) => {
                                if (result.value) {

                                    var image = new Image();
                                    var im = "data:image/jpg;base64," + data;

                                    setTimeout(function () {
                                        newWin = window.open("");
                                        newWin.document.write('<img src="'+im+'" style="height:2cm;width:5.5cm;">');
                                        newWin.print();
                                        newWin.close();
                                    }, 500);

                                }
                            })

                            $('#AppointmentNo').val("");
                            $('#PassportNo').val("");
                            $('#verify').val("0");
                        },
                        error: function (data) {
                            alert(JSON.stringify(data));
                        }
                    });

                }
            })


        } else {
            Swal.fire({
                type: 'warning',
                title: 'Data Empty',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ok'
            });
        }
    });

});
