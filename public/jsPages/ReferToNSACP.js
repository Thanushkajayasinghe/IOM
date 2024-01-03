$(document).ready(function () {

    loadRegNo();

    function loadRegNo() {
        $.ajax({
            url: 'ReferToNSACP',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {function: 'loadRegNo'},
            success: function (data) {
                var options = '';
                options += '<option disabled="disabled" selected="selected">Select</option>';
                $(data.result).each(function (key, val) {
                    options += '<option value="' + val.id + '">' + val.AppointmentNumber + '</option>';
                });

                $('#regNo').html("");
                $('#regNo').html(options);
            }
        });
    }

    //reg no onchange
    $('#regNo').on('change', function () {

        const regSerial = $(this).val();

        $.ajax({
            url: 'ReferToNSACP',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                regSerial: regSerial,
                function: 'loadPassportNo'
            },
            success: function (data) {
                $(data.result).each(function (key, val) {
                    $('#passNo').val(val.PassportNumber).keyup();
                })
            }
        });
    });

    //Reffer to AFC save
    $('#btnSaveNSACP').on('click', function () {

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

                if (validate('#validateDiv')) {
                    const regNo = $('#regNo option:selected').text();
                    const passNo = $('#passNo').val();
                    const refered = $('#refered').val();
                    const remark = $('#remark').val();

                    $.ajax({
                        url: 'ReferToNSACP',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            regNo: regNo,
                            passNo: passNo,
                            refered: refered,
                            remark: remark,
                            function: 'save'
                        },
                        success: function (data) {

                            if (data.result == true) {

                                Swal.fire({
                                    type: 'success',
                                    title: 'Data Saved Successfully!',
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

                }
            }
        });

    })


});