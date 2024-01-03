$(document).ready(function () {


    // Save
    $('#btnsave').on('click', function () {
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

                if (validate('#PRegvali')) {

                    var labno = $('#labno').val();
                    var rslt = $('#rslt').val();
                    var date = $('#date').val();
                    var time = $('#time').val();
                    var remark = $('#remark').val();


                    $.ajax({
                        url: 'Malformsave',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            labno: labno,
                            rslt: rslt,
                            date: date,
                            time: time,
                            remark: remark,
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

                            } else {

                                Swal.fire(
                                    'Lab No Already Exist',
                                    '',
                                    'warning'
                                )
                            }
                        }
                    });

                }
            }
        });
    });


//Time Picker
    $('.timePickerx').timepicker();
});
