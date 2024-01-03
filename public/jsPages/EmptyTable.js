$(document).ready(function () {


    // Empty Table
    $('#btnTruncate').on('click', function () {

        var mn = $('#MenuName').val();

        if (mn != "") {

            var ary = [];

            if (mn == "CXR External") {
                var ary = ["cxr_external"];
            } else if (mn == "Appointment Cancel/Re Schedule") {
                var ary = ["cxr_external", "set_work_schedule"];
            } else if (mn == "Booking an Appointment - Over the Phone/Online") {
                var ary = ["appointment_cancel_and_reschedule_availability","register_applicants","register_applicant_details"];
            } else if (mn == "System Configurations") {
                var ary = ["holiday_calender","master_settings","set_work_schedule"];
            } else if (mn == "Resident Visa Details From DIE") {
                var ary = ["resident_visa_details"];
            }


            $.ajax({
                url: 'TblEmty',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    function: ary
                },
                success: function (data) {

                    if (data.result == true) {

                        Swal.fire({
                            type: 'success',
                            title: 'Table Empty Successfully!',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ok'
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        })

                    }
                }, complete: function () {

                }
            });

        } else {
            Swal.fire({
                type: 'warning',
                title: 'Please Select Menu Name!',
            })
        }
    });

});
