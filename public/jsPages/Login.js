$(document).ready(function () {


    //On Enter Key Press page log
    $(document).keypress(function (e) {
        if (e.which == 13) {
            systemLogin();
        }
    });

    function systemLogin() {

        var username = $('#usernameid').val();
        var password = $('#passwordid').val();

        $.ajax({
            url: 'ControlPanel',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                username: username,
                password: password,
                function: 'login'
            },
            success: function (data) {
                console.log(data.result);
                if (data.result == true) {

                    if (data.GN == "Tab Counter 1" || data.GN == "Tab Counter 2" ) {
                        window.location = CoTabPath;
                    } else {
                        window.location = path;
                    }

                } else {
                    swal({
                        title: "Wrong Username Or Password!",
                        type: "error",
                        showCancelButton: false,
                        confirmButtonClass: 'btn-danger',
                        confirmButtonText: 'OK!'
                    });
                }
            }
        });
    }

    $('#btnlogin').on('click', function () {
        systemLogin();
    });

    setTimeout(function () {

        if ($('#usernameid').val() != "") {
            $('#usernameid').addClass('has-val');
        } else {
            $('#usernameid').removeClass('has-val');
        }


        if ($('#passwordid').val() != "") {
            $('#passwordid').addClass('has-val');
        } else {
            $('#passwordid').removeClass('has-val');
        }

        /*==================================================================
        [ Focus input ]*/
        $('.input100').each(function () {
            $(this).on('blur', function () {
                if ($(this).val().trim() != "") {
                    $(this).addClass('has-val');
                } else {
                    $(this).removeClass('has-val');
                }
            })
        });
    }, 500);


});







