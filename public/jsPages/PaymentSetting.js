$(document).ready(function () {
    var updateID = 0;
    // Save button
    $('#btnSave').on('click', function () {
        var date = $('#txtEffectiveDate').val();
        var amount = $('#txtPayment').val();

        // Save
        if (updateID == 0) {

            if (date != "" && amount > 0) {

                $.ajax({
                    url: 'PaymentSettingLoad',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        function: 'Save',
                        date: date,
                        amount: amount
                    },
                    success: function (data) {

                        if (data.result == true) {
                            Swal.fire({
                                type: 'success',
                                title: 'Data Save Successfully!',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ok'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            })
                        } else if (data.result == false) {
                            swal('Effective Date Already Exists', '', 'warning')
                        }

                    }
                });
            } else {
                swal('Empty Data', '', 'warning')
            }

            // Update
        } else {

            if (date != "" && amount > 0) {

                $.ajax({
                    url: 'PaymentSettingLoad',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        function: 'Update',
                        id: updateID,
                        amount: amount
                    },
                    success: function (data) {

                        if (data.result == true) {
                            Swal.fire({
                                type: 'success',
                                title: 'Data Update Successfully!',
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
                swal('Empty Data', '', 'warning')
            }

        }
    });
    //Master Settings Load
    $('#loadCurrentSettings').on('click', function () {

        $("#txtEffectiveDate").prop('disabled', true);

        $.ajax({
            url: 'PaymentSettingLoad',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                function: 'load'
            },
            success: function (data) {
                var date = data.date;
                var amount = data.amount;
                var id = data.id;

                $('#txtEffectiveDate').val(date);
                $('#txtPayment').val(amount);
                updateID = id;
            }
        });
    });

    //Clear button
    $('#btnclear').on('click', function () {

        $('#txtEffectiveDate').val("");
        $('#txtPayment').val("");
        updateID = 0;
        $("#txtEffectiveDate").prop('disabled', false);

    });

    //////////////////////////////////////////////////////////////////////////////////////////////////////////
    //Mhac
   
    $('#datehide').hide();
    
    // Save button
    $('#btnSaveMhac').on('click', function () {
        var date = $('#txtEffectiveDateMhac').val();
        var amount = $('#txtPaymentMhac').val();
        var country = $('#dropdownCountry').val();
        // Save
          if (date != "" && amount > 0) {

                $.ajax({
                    url: 'MhacPaymentSettingSaveURL',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        date: date,
                        amount: amount,
                        country: country
                    },
                    success: function (data) {

                        if (data.result == true) {
                            Swal.fire({
                                type: 'success',
                                title: 'Data Save Successfully!',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ok'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            })
                        } else if (data.result == false) {
                            swal('Effective Date Already Exists', '', 'warning')
                        }

                    }
                });
            } else {
                swal('Empty Data', '', 'warning')
            }

    });
    $('#btnSaveMhacModal').on('click', function () {
        var date = $('#txtEffectiveDateMhacModal').val();
        var amount = $('#txtPaymentMhacModal').val();
        var country = $('#dropdownCountryMhacModal').val();
       
            if (date != "" && amount > 0) {
                $.ajax({
                    url: 'PaymentSettingUpdateURL',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                         id:  $('#txtidMhacModal').val(),
                         amount: amount
                    },
                    success: function (data) {

                        if (data.result == true) {
                            Swal.fire({
                                type: 'success',
                                title: 'Data Update Successfully!',
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
                swal('Empty Data', '', 'warning')
            }

    });
    $('#loadCurrentSettingsMhac').on('click', function () {
        $('#loadModal').iziModal('open');
    });
    $('#dropdownCountryMhacModal').on('change', function () {
         var countryNew = $('#dropdownCountryMhacModal').val();
         $("#txtEffectiveDateMhacModal").prop('disabled', true);
        if (countryNew == "") {
            Swal.fire({
                type: 'warning',
                title: 'Please Select Country!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ok'
            })
        }
        else {
           
            $('#txtEffectiveDateMhacModal').val("");
            $('#txtPaymentMhacModal').val("");
            var selectedValue = $(this).val();
          //  $("#txtEffectiveDateMhac").prop('disabled', true);
            $.ajax({
                url: 'PaymentSettingLoadMhacURL',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    country: selectedValue
                },
                success: function (data) {
                    var date = data.date;
                    var amount = data.amount;
                    var id = data.id;
                    var country = data.country;
                    $('#txtEffectiveDateMhacModal').val(date);
                    $('#txtPaymentMhacModal').val(amount);
                    $('#dropdownCountryMhacModal').val(country);
                    $('#txtidMhacModal').val(id);
                   
                }
            });
        }
    });
    $('#btnclearMhac').on('click', function () {
        $('#txtEffectiveDateMhac').val("");
        $('#txtPaymentMhac').val("");
        updateIDMhac = 0;
        $("#txtEffectiveDateMhac").prop('disabled', false);
        $('#dropdownCountry').val("");
    });
    $('#btnclearMhacModal').on('click', function () {
        $('#txtEffectiveDateMhacModal').val("");
        $('#txtPaymentMhacModal').val("");
        updateIDMhac = 0;
        $("#txtEffectiveDateMhacModal").prop('disabled', false);
        $('#dropdownCountryMhacModal').val("");
    });
});

