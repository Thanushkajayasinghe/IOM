var ary = [];

$(function () {

    loadChangeQueue();


    setTimeout(function () {

        $('#drpQueue option').filter(function () {
            return $(this).index() >= 0;
        }).prop('disabled', true);

    }, 1000);


    //Token No Load
    $.ajax({
        url: 'FloorManagerGetData',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            command: 'loadToken'
        },
        success: function (data) {

            var options = '';
            options += '<option disabled="disabled" selected="selected">Select</option>';
            $(data.result).each(function (key, val) {
                options += '<option value="' + val.temp_token_no + '">' + val.temp_token_no + '</option>';
            });

            $('#drpTokenNo').html("");
            $('#drpTokenNo').html(options);
        }
    });


    // Token No Change funtion
    $('#drpTokenNo').on('change', function () {
        var tno = $(this).val();
        $('#drpQueue').val("");

        $.ajax({
            url: 'FloorManagerGetData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'loadCurrentQueue',
                tokno: tno
            },
            success: function (data) {
                var CurrentQueue = "";
                $(data.result).each(function (key, val) {
                    $('#appno').val(val.temp_app_no);

                    if (val.temp_reg < 4) {
                        CurrentQueue = "Registration";
                    } else if (val.temp_counsel < 4) {
                        CurrentQueue = "Counseling";
                    } else if (val.temp_cxr < 4) {
                        CurrentQueue = "Radiology";
                    } else if (val.temp_phlebotomy < 4) {
                        CurrentQueue = "Lab";
                    } else if (val.temp_consult < 4) {
                        CurrentQueue = "Consultation";
                    }

                });

                $('#txtCurrentQueue').val("");
                $('#txtCurrentQueue').val(CurrentQueue);


////////////////////////////// Dropdown Disabled / Enable //////////////////////////////////////////
                $('#drpQueue option').filter(function () {

                    return $(this).index() > 0;

                }).prop('disabled', false);

                var chgQind = 0;
                $('#drpQueue option').filter(function () {

                    var currQ = $('#txtCurrentQueue').val();
                    var chgQ = $(this).val();

                    if (currQ == chgQ) {
                        chgQind = $(this).index();
                    }
                    if (chgQind != 0) {
                        return $(this).index() >= chgQind;
                    }

                }).prop('disabled', true);
////////////////////////////////////////////////////////////////////////

            }
        });

    });


    function loadChangeQueue() {
        $.ajax({
            url: 'FloorManagerGetData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'loadChangeQueue'
            },
            success: function (data) {
                var option = "";
                $(data.result).each(function (key, val) {
                    if (val.type == 1) {
                        option += "<option disabled='disabled' selected='selected' value=''>Select</option>";
                        option += "<option>Registration</option>";
                        option += "<option>Counseling</option>";
                        option += "<option>Radiology</option>";
                        option += "<option>Lab</option>";
                        option += "<option>Consultation</option>";
                    } else {

                        option += "<option disabled='disabled' selected='selected' value=''>Select</option>";
                        option += "<option>Registration</option>";
                        option += "<option>Counseling</option>";
                        option += "<option>Lab</option>";
                        option += "<option>Radiology</option>";
                        option += "<option>Consultation</option>";

                    }
                });


                $('#drpQueue').html("");
                $('#drpQueue').append(option);

            }
        });
    }


    $('#drpQueue').on('change', function () {

        ary = [];
        var ee = 0;
        var thisval = $(this).val();

        if (thisval != "") {

            ary.push(thisval);

            $('#drpQueue option').filter(function () {

                var currQ = $('#txtCurrentQueue').val();
                var chgQ = $(this).val();

                if (currQ == chgQ) {
                    ee = $(this).index();
                }
                if (ee != 0) {
                    ary.push($(this).val());
                }

            });

        }
    });
});


$('#btnSave').on('click', function () {

    Swal.fire({
        title: 'Are you sure?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Submit!'
    }).then((result) => {
        if (result.value) {

            if (validate('#valifrm')) {

                const tokenNo = $('#drpTokenNo').val();
                const txtCurrentQueue = $('#txtCurrentQueue').val();
                const changePriority = $('#drpChangePriority').val();
                const changeQueue = $('#drpQueue').val();
                const appno = $('#appno').val();

                var arrayToSend = JSON.stringify(ary);

                $.ajax({
                    url: 'FloorManagerGetData',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        tokenNo: tokenNo,
                        CurrentQueue: txtCurrentQueue,
                        changePriority: changePriority,
                        changeQueue: changeQueue,
                        appno: appno,
                        arrayToSend: arrayToSend,
                        command: 'Insert'
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

});


$('#btnCancel').on('click', function () {

    $('#drpTokenNo').val("");
    $('#txtCurrentQueue').val("");
    $('#drpChangePriority').val("");
    $('#drpQueue').val("");
    $('#appno').val("");
});


$('#btnCancelApp').on('click', function () {

    Swal.fire({
        title: 'Are you sure?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Submit!'
    }).then((result) => {
        if (result.value) {

            if ($('#drpTokenNo').val() != '') {

                var tokenNo = $('#drpTokenNo').val();

                $.ajax({
                    url: 'FloorManagerGetData',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        tokenNo: tokenNo,
                        command: 'cancelTokenNo'
                    },
                    success: function (data) {
                        if (data.result) {
                            Swal.fire({
                                type: 'success',
                                title: 'Appointment Cancel Successfully!',
                                text: '',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ok'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        }
                    }
                });
            }
        }
    });

});

