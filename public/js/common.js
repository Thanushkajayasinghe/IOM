// logout action
$('.logout').click(function () {
    Swal({
        title: 'Are you sure?',
        text: "Are you sure you want to Logout?",
        imageUrl: '../assets/images/logout.png',
        imageWidth: 100,
        imageHeight: 100,
        imageAlt: 'Custom image',
        //        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Log out!'
    }).then((result) => {
        if (result.value) {


            // $.ajax({
            //     url: '../Controller/logoutCon.php',
            //     type: 'POST',
            //     dataType: 'json',
            //     cache: false,
            //     async: false,
            //     data: {},
            //     success: function (data) {
            //         if (data.status == true) {
            //             window.location = '../index.php';
            //         }
            //     }
            // });
        }
    })


});

function wait() {
    $('#WaitBox').modal({ show: true });
}

function closewait() {
    $('#WaitBox').modal('hide');
}

function getUrl() {
    let currentURL = window.location.href;
    let pathname = new URL(currentURL).pathname;
    let parts = pathname.split('/').filter(part => part !== '');
    return parts[0];
}


function validate(parent) {
    var is_form_valid = true; //Assume form is valid

    //Loop through each textbox inside the parent & validate
    $(parent + ' input[type="text"][validate="true"]').each(function () {
        var pattern = $(this).attr('match');
        var txtvalue = $(this).val();

        /*var regexPattern = new RegExp(pattern,["i"]);
         -- Commented due to case insesitive validation has been added via Regex*/
        var regexPattern = new RegExp(pattern);
        var is_matched = regexPattern.exec(txtvalue);

        if ($(this).parent().hasClass('input-group')) {

            if (is_matched == null) {
                //Pattern is not matched.
                is_form_valid = false;
                var error = $(this).attr('error');
                $(this).parent().next('div .error').html(error).show(1000);
                $(this).closest('div').addClass('has-error');
            } else {
                $(this).parent().next('div .error').html("").hide(1000);
                $(this).closest('div').removeClass('has-error');
            }
        } else {

            if (is_matched == null) {
                //Pattern is not matched.
                is_form_valid = false;
                var error = $(this).attr('error');
                $(this).next('div .error').html(error).show(1000);
                $(this).closest('div').addClass('has-error');
            } else {
                $(this).next('div .error').html("").hide(1000);
                $(this).closest('div').removeClass('has-error');
            }

        }
    });


    $(parent + ' input[type="number"][validate="true"]').each(function () {
        var pattern = $(this).attr('match');
        var txtvalue = $(this).val();

        /*var regexPattern = new RegExp(pattern,["i"]);
         -- Commented due to case insesitive validation has been added via Regex*/
        var regexPattern = new RegExp(pattern);
        var is_matched = regexPattern.exec(txtvalue);
        if (is_matched == null) {
            //Pattern is not matched.
            is_form_valid = false;
            var error = $(this).attr('error');
            $(this).next('div .error').html(error).show(1000);
            $(this).closest('div').addClass('has-error');
        } else {
            $(this).next('div .error').html("").hide(1000);
            $(this).closest('div').removeClass('has-error');
        }
    });


    //Loop through each textbox inside the parent & validate
    $(parent + ' input[type="password"][validate="true"]').each(function () {
        var pattern = $(this).attr('match');
        var txtvalue = $(this).val();

        /*var regexPattern = new RegExp(pattern,["i"]);
         -- Commented due to case insesitive validation has been added via Regex*/
        var regexPattern = new RegExp(pattern);
        var is_matched = regexPattern.exec(txtvalue);
        if (is_matched == null) {
            //Pattern is not matched.
            is_form_valid = false;
            var error = $(this).attr('error');
            $(this).next('div .error').html(error).show(1000);
            $(this).closest('div').addClass('has-error');
        } else {
            $(this).next('div .error').html("").hide(1000);
            $(this).closest('div').removeClass('has-error');
        }
    });


    //Loop through each textarea inside the parent & validate
    $(parent + ' textarea[validate="true"]').each(function () {
        var pattern = $(this).attr('match');
        var txtvalue = $(this).val();

        /*var regexPattern = new RegExp(pattern,["i"]);
         -- Commented due to case insesitive validation has been added via Regex*/
        var regexPattern = new RegExp(pattern);
        var is_matched = regexPattern.exec(txtvalue);
        if (is_matched == null) {
            //Pattern is not matched.
            is_form_valid = false;
            var error = $(this).attr('error');
            $(this).next('div .error').html(error).show(1000);
            $(this).closest('div').addClass('has-error');
        } else {
            $(this).next('div .error').html("").hide(1000);
            $(this).closest('div').removeClass('has-error');
        }
    });


    //Validate Dropdown
    $(parent + ' select[validate="true"]').each(function () {
        var value = $(this).val();

        if ($(this).hasClass('selectTo')) {

            if (value == null || value == "") {
                is_form_valid = false;
                var error = $(this).attr('error');
                $(this).next().next().html(error).show(1000);
                $(this).next('div .select2-container').addClass('validateSelectTo')
            } else {
                $(this).next().next().html("").hide(1000);
                $(this).next('div .select2-container').removeClass('validateSelectTo');
            }
        } else {

            if (value == null) {
                is_form_valid = false;
                var error = $(this).attr('error');
                $(this).next('div .error').html(error).show(1000);
                $(this).closest('div').addClass('has-error');
            } else {
                $(this).next('div .error').html("").hide(1000);
                $(this).closest('div').removeClass('has-error');
            }
        }
    });


    //Validate Radios
    $(parent + ' input[type="radio"][validate="true"]').each(function () {
        var name = $(this).prop('name');
        var count = $('input[type="radio"][name="' + name + '"]:checked').length;
        if (count == 0) {
            is_form_valid = false;
            var error = $(this).attr('error');
            $(this).next('div .error').html(error).show(1000);
            $(this).closest('div').addClass('has-error');
        } else {
            $(this).next('div .error').html("").hide(1000);
            $(this).closest('div').removeClass('has-error');
        }
    });


    //Validate Checkbox
    $(parent + ' input[type="checkbox"][validate="true"]').each(function () {
        var name = $(this).prop('name');
        var count = $('input[type="checkbox"][name="' + name + '"]:checked').length;
        if (count == 0) {
            is_form_valid = false;
            var error = $(this).attr('error');
            $(this).next('div .error').html(error).show(1000);
            $(this).closest('div').addClass('has-error');
        } else {
            $(this).next('div .error').html("").hide(1000);
            $(this).closest('div').removeClass('has-error');
        }
    });

    return is_form_valid;
}

