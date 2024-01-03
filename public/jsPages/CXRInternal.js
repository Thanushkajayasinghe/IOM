var arr = [];
var str = "No";
var objectToVeri = 0;

$(document).ready(function () {

    var aaa = false;

    if (usergroup == 10 || usergroup == 11) {
        if (!(isOn())) {

            Swal('Counter Not Open. Please Enable!', '', 'error');

        } else {


            $('#cxrDone').hide();

            $('[name="stacked-radio-left"]').on('change', function () {
                if ($('#cxr_not_done').prop('checked')) {
                    $('#cxrNotDone').show();
                    $('.cxrdone').prop('checked', false);
                    $.uniform.update('.cxrdone');
                } else {
                    $('#cxrDone').show();
                    $('.notdone').prop('checked', false);
                    $.uniform.update('.notdone');
                }
            });

            //=============== Calling the next token number ================================

            $('#callNext').on('click', function () {

                $('#statVerification').text("Pending").removeClass('badge-danger badge-success').addClass('badge-warning');
                $('.showFingerVeriPanel').hide();
                $('#loadImageSavedVeri').attr('src', '');
                $('#loadImageSavedVeriCurrent img').remove();
                $('#responseText h2').remove();

                var preToken = $('#currentTokenNo').text();
                str = "Yes";

                $.ajax({
                    url: 'CXRLoadData',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        preToken: preToken,
                        command: 'next'
                    },
                    success: function (data) {

                        if (data == "No Token") {

                            Swal('There no More tokens.', '', 'error');
                        } else {

                            $('#clearingID').show();
                            $('#currentTokenNo').text(data);

                            $.ajax({
                                url: 'CXRLoadData',
                                type: 'post',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    command: 'AppointmentNo',
                                    token: data
                                },
                                success: function (data) {
                                    $('#appbody').html('');
                                    $.each(data, function (key, val) {
                                        $('#appbody').append('<tr class="appNum"> <td>' + val.temp_app_no + '</td> </tr>');
                                    });
                                }
                            });
                        }
                    }
                });
            });

            //=========== Calling the Data when click on Appointment Number ================

            $(document).on('click', "tr.appNum", function () {

                $('#statVerification').text("Pending").removeClass('badge-danger badge-success').addClass('badge-warning');
                $('.showFingerVeriPanel').hide();
                $('#loadImageSavedVeri').attr('src', '');
                $('#loadImageSavedVeriCurrent img').remove();
                $('#responseText h2').remove();
                $('#hideBarcodePanel').show();

                $('tr.appNum').removeClass('clickedRow');
                $(this).addClass('clickedRow');

                $.ajax({
                    url: 'CXRLoadData',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        command: 'data',
                        appointment: $(this).text()
                    },
                    success: function (data) {

                        var age = getAge(data[4]);

                        $('#cxr_app_no').val(data[0]);
                        $('#cxr_passp_no').val(data[1]);
                        $('#gen').val(data[2]);
                        $('#fullnam').val(data[3]);
                        $('#age').val(age);

                        var dateofbirth = $.datepicker.formatDate('mm/dd/yy', new Date(data[4]));
                        $('#dob').val(dateofbirth);

                        if (data[6] != '') {
                            $('#cxr_test_date').val(data[6]);
                        } else {
                            $('#cxr_test_date').val('');
                        }

                        if (data[7] != '') {
                            $('#cxr_preg').val(data[7]);
                        } else {
                            $('#cxr_preg').val('');
                        }

                        // =========================================
                        var imgPath = "";
                        if (data[5] != null && data[5] != "") {
                            imgPath = path + '/' + data[5];
                        } else {
                            imgPath = imgPathBlade + '/imgcou.png';
                        }

                        $('#MemberImgTag').attr('src', imgPath);


                        if (data[2] == "Male") {
                            $('.hidePanel').hide();
                        } else {
                            $('.hidePanel').show();
                        }


                        createbarcode();

                    },
                    error: function (data) {
                        Swal('Unknown Error', '', 'error');
                        $('#gen').val("");
                        $('#fullnam').val("");
                        $('#age').val("");
                    }
                });
            });

            function getAge(birthDateString) {
                var today = new Date();
                var birthDate = new Date(birthDateString);
                var age = today.getFullYear() - birthDate.getFullYear();
                var m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                return age;
            }

            //=========== Not Available ====================================================

            $('#notAvailable').on('click', function () {

                if (str.length > 2) {
                    $.ajax({
                        url: 'CXRLoadData',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            command: 'notAvailable',
                            usergroup: usergroup,
                            token: $('#currentTokenNo').text()
                        },
                        success: function (data) {
                            Swal('Added to Queue', '', 'success');

                            $('#statVerification').text("Pending").removeClass('badge-danger badge-success').addClass('badge-warning');
                        }
                    });
                } else {
                    Swal('No Tokens', '', 'error');
                }
            });

            //=========== Recall Not Available =============================================

            $('#recall').on('click', function () {

                $('#statVerification').text("Pending").removeClass('badge-danger badge-success').addClass('badge-warning');

                $.ajax({
                    url: 'CXRLoadData',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        command: 'NoShow'
                    },
                    success: function (data) {

                        str = "Yes";
                        $('#appNotAvblBody').html('');

                        $.each(data, function (key, val) {

                            $('#appNotAvblBody').append('<tr class="appNotAvblNum"> <td>' + val.temp_token_no + '</td> </tr>');
                        });
                    }, complete: function () {

                        $('#noshow').iziModal('open');
                    }
                });

            });

            //============================ Save Data ======================================

            $('#cxr_not_done_other').on('change', function (event) {
                var checkbox = event.target;
                if (checkbox.checked) {
                    $('#not_done_other_text').show();
                } else {
                    $('#not_done_other_text').hide();
                }
            });

            $('#cxr_done_other').on('change', function (event) {
                var checkbox = event.target;
                if (checkbox.checked) {
                    $('#cxr_done_others_details').show();
                } else {
                    $('#cxr_done_others_details').hide();
                }
            });

            $('#CXRCompleted').on('click', function () {

                if ($('#cxr_app_no').val() != "") {
                    Swal.fire({
                        title: 'Are you sure?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Submit!'
                    }).then((result) => {
                        if (result.value) {

                            var cxr_preg_test_off = false;
                            if ($('#cxr_preg_test_off').is(':checked')) {
                                cxr_preg_test_off = true;
                            }

                            var cxr_counsel = false;
                            if ($('#cxr_counsel').is(':checked')) {
                                cxr_counsel = true;
                            }

                            var cxr_done = false;
                            var cxr_not_done = false;
                            if ($("input:radio[name=stacked-radio-left]:checked").val() == 'Done') {
                                cxr_done = true;
                            } else if ($("input:radio[name=stacked-radio-left]:checked").val() == 'NotDone') {
                                cxr_not_done = true;
                            }

                            var cxr_def = false;
                            if ($('#cxr_def').is(':checked')) {
                                cxr_def = true;
                            }

                            var cxr_preg_sc = false;
                            if ($('#cxr_preg_sc').is(':checked')) {
                                cxr_preg_sc = true;
                            }

                            var cxr_app_dec = false;
                            if ($('#cxr_app_dec').is(':checked')) {
                                cxr_app_dec = true;
                            }

                            var cxr_no_show = false;
                            if ($('#cxr_no_show').is(':checked')) {
                                cxr_no_show = true;
                            }

                            var cxr_child = false;
                            if ($('#cxr_child').is(':checked')) {
                                cxr_child = true;
                            }

                            var cxr_unbl_unwill_sc = false;
                            if ($('#cxr_unbl_unwill_sc').is(':checked')) {
                                cxr_unbl_unwill_sc = true;
                            }

                            var cxr_not_done_other = false;
                            var not_done_other_text = '';
                            if ($('#cxr_not_done_other').is(':checked')) {
                                cxr_not_done_other = true;
                                not_done_other_text = $('#not_done_other_text').val();
                            }

                            var cxr_done_plv_shld = false;
                            if ($('#cxr_done_plv_shld').is(':checked')) {
                                cxr_done_plv_shld = true;
                            }

                            var cxr_done_dbl_abd_shield = false;
                            if ($('#cxr_done_dbl_abd_shield').is(':checked')) {
                                cxr_done_dbl_abd_shield = true;
                            }

                            var cxr_done_other = false;
                            var done_other_text = '';
                            if ($('#cxr_done_other').is(':checked')) {
                                cxr_done_other = true;
                                done_other_text = $('#cxr_done_others_details').val();
                            }

                            var appointment = $('#cxr_app_no').val();

                            var today = new Date();
                            var dd = today.getDate();
                            var mm = today.getMonth() + 1; //January is 0!

                            var yyyy = today.getFullYear();
                            if (dd < 10) {
                                dd = '0' + dd;
                            }
                            if (mm < 10) {
                                mm = '0' + mm;
                            }
                            var today = yyyy + "" + mm + "" + dd;

                            var appointmentNo = appointment;

                            var objectName = "Flat Right Thumb";
                            if (objectToVeri == 6) {
                                objectName = "Flat Left Thumb";
                            }

                            var imagePathTemp = '/FPCXR-' + appointmentNo + '-' + objectName + '-' + today + '.bmp';

                            if ($('#appbody  > tr.clickedRow').hasClass('extra')) {

                                $.ajax({
                                    url: 'CXRLoadData',
                                    type: 'post',
                                    dataType: 'json',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        command: 'saveAgain',
                                        imagePathTemp: imagePathTemp,
                                        appointment: appointment,
                                        passport: $('#cxr_passp_no').val(),
                                        cxr_preg: $('#cxr_preg').val(),
                                        cxr_test_date: $('#cxr_test_date').val(),
                                        cxr_lmp_date: $('#cxr_lmp_date').val(),
                                        cxr_result: $('#cxr_result').val(),
                                        cxr_preg_test_off: cxr_preg_test_off,
                                        cxr_counsel: cxr_counsel,
                                        cxr_done: cxr_done,
                                        cxr_not_done: cxr_not_done,
                                        cxr_def: cxr_def,
                                        cxr_preg_sc: cxr_preg_sc,
                                        cxr_app_dec: cxr_app_dec,
                                        cxr_no_show: cxr_no_show,
                                        cxr_child: cxr_child,
                                        cxr_unbl_unwill_sc: cxr_unbl_unwill_sc,
                                        cxr_not_done_other: cxr_not_done_other,
                                        not_done_other_text: not_done_other_text,
                                        cxr_done_plv_shld: cxr_done_plv_shld,
                                        cxr_done_dbl_abd_shield: cxr_done_dbl_abd_shield,
                                        cxr_done_other: cxr_done_other,
                                        done_other_text: done_other_text,
                                        cxr_app_no: $('#cxr_app_no').val()
                                    },
                                    success: function (data) {
                                        Swal('Data Saved', '', 'success');
                                        arr.splice($.inArray($('#cxr_app_no').val(), arr), 1);

                                        $('#appbody  > tr.appNum').each(function () {

                                            if (appointment.trim() == $(this).text().trim()) {

                                                $(this).removeClass('clickedRow');
                                                $(this).removeClass('prevClicked');
                                                $(this).addClass('rowSaved');
                                            }
                                        });

                                        $('#cxr_app_no').val('');
                                        $('#cxr_passp_no').val('');
                                        $('#cxr_test_date').val('');
                                        $('#cxr_lmp_date').val('');
                                        $('#cxr_result').val('');
                                        $('#cxr_preg_test_off').val('');
                                        $('#cxr_counsel').val('');
                                        // $('#cxr_done').val('');
                                        // $('#cxr_not_done').val('');
                                        $('#cxr_def').prop('checked', false).uniform('refresh');
                                        $('#cxr_preg_sc').prop('checked', false).uniform('refresh');
                                        $('#cxr_app_dec').prop('checked', false).uniform('refresh');
                                        $('#cxr_no_show').prop('checked', false).uniform('refresh');
                                        $('#cxr_child').prop('checked', false).uniform('refresh');
                                        $('#cxr_unbl_unwill_sc').prop('checked', false).uniform('refresh');
                                        $('#cxr_not_done_plv_shld').prop('checked', false).uniform('refresh');
                                        $('#cxr_done_other').prop('checked', false).uniform('refresh');
                                        $('#cxr_not_done_others').prop('checked', false).uniform('refresh');


                                        $('#cxr_done_plv_shld').prop('checked', false).uniform('refresh');
                                        $('#cxr_done_dbl_abd_shield').prop('checked', false).uniform('refresh');
                                        $('#cxr_done_others_details').val('');
                                        $('#not_done_other_text').val('');

                                        $('#cxr_done').prop('checked', false);
                                        $.uniform.update('#cxr_done');
                                        $('#cxr_not_done').prop('checked', true);
                                        $.uniform.update('#cxr_not_done');

                                        var imgPath = imgPathBlade + '/imgcou.png';
                                        $('#MemberImgTag').attr('src', imgPath);

                                        $('#apno').html("");
                                        $('#nm').html("");
                                        $('#ag').html("");
                                        $('#gn').html("");
                                        $('#fullnam').html("");
                                        $('#age').html("");
                                        $('#gen').html("");
                                        $('#dob').html("");
                                        $('#DOB').html("");
                                        $('#hideBarcodePanel').hide();
                                    }
                                });

                            } else {

                                $.ajax({
                                    url: 'CXRLoadData',
                                    type: 'post',
                                    dataType: 'json',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        command: 'save',
                                        imagePathTemp: imagePathTemp,
                                        appointment: appointment,
                                        passport: $('#cxr_passp_no').val(),
                                        cxr_preg: $('#cxr_preg').val(),
                                        cxr_test_date: $('#cxr_test_date').val(),
                                        cxr_lmp_date: $('#cxr_lmp_date').val(),
                                        cxr_result: $('#cxr_result').val(),
                                        cxr_preg_test_off: cxr_preg_test_off,
                                        cxr_counsel: cxr_counsel,
                                        cxr_done: cxr_done,
                                        cxr_not_done: cxr_not_done,
                                        cxr_def: cxr_def,
                                        cxr_preg_sc: cxr_preg_sc,
                                        cxr_app_dec: cxr_app_dec,
                                        cxr_no_show: cxr_no_show,
                                        cxr_child: cxr_child,
                                        cxr_unbl_unwill_sc: cxr_unbl_unwill_sc,
                                        cxr_not_done_other: cxr_not_done_other,
                                        not_done_other_text: not_done_other_text,
                                        cxr_done_plv_shld: cxr_done_plv_shld,
                                        cxr_done_dbl_abd_shield: cxr_done_dbl_abd_shield,
                                        cxr_done_other: cxr_done_other,
                                        done_other_text: done_other_text,
                                        cxr_app_no: $('#cxr_app_no').val()
                                    },
                                    success: function (data) {
                                        Swal('Data Saved', '', 'success');
                                        arr.splice($.inArray($('#cxr_app_no').val(), arr), 1);

                                        $('#appbody  > tr.appNum').each(function () {

                                            if (appointment.trim() == $(this).text().trim()) {

                                                $(this).removeClass('clickedRow');
                                                $(this).removeClass('prevClicked');
                                                $(this).addClass('rowSaved');
                                            }

                                        });

                                        $('#cxr_app_no').val('');
                                        $('#cxr_passp_no').val('');
                                        $('#cxr_test_date').val('');
                                        $('#cxr_lmp_date').val('');
                                        $('#cxr_result').val('');
                                        $('#cxr_preg_test_off').val('');
                                        $('#cxr_counsel').val('');
                                        // $('#cxr_done').val('');
                                        // $('#cxr_not_done').val('');
                                        $('#cxr_def').prop('checked', false).uniform('refresh');
                                        $('#cxr_preg_sc').prop('checked', false).uniform('refresh');
                                        $('#cxr_app_dec').prop('checked', false).uniform('refresh');
                                        $('#cxr_no_show').prop('checked', false).uniform('refresh');
                                        $('#cxr_child').prop('checked', false).uniform('refresh');
                                        $('#cxr_unbl_unwill_sc').prop('checked', false).uniform('refresh');
                                        $('#cxr_not_done_plv_shld').prop('checked', false).uniform('refresh');
                                        $('#cxr_done_other').prop('checked', false).uniform('refresh');
                                        $('#cxr_not_done_other').prop('checked', false).uniform('refresh');

                                        $('#cxr_done_plv_shld').prop('checked', false).uniform('refresh');
                                        $('#cxr_done_dbl_abd_shield').prop('checked', false).uniform('refresh');
                                        $('#cxr_done_others_details').val('');
                                        $('#not_done_other_text').val('');

                                        $('#cxr_done').prop('checked', false);
                                        $.uniform.update('#cxr_done');
                                        $('#cxr_not_done').prop('checked', true);
                                        $.uniform.update('#cxr_not_done');

                                        var imgPath = imgPathBlade + '/imgcou.png';
                                        $('#MemberImgTag').attr('src', imgPath);

                                        $('#apno').html("");
                                        $('#nm').html("");
                                        $('#ag').html("");
                                        $('#gn').html("");
                                        $('#fullnam').html("");
                                        $('#age').html("");
                                        $('#gen').html("");
                                        $('#dob').html("");
                                        $('#hideBarcodePanel').hide();
                                    }
                                });
                            }
                        }
                    });
                } else {
                    Swal('Please Select Appointment No', '', 'error');
                }
            });

            $(document).on('click', "tr.appNotAvblNum", function () {

                $('#statVerification').text("Pending").removeClass('badge-danger badge-success').addClass('badge-warning');

                $('#currentTokenNo').text($(this).text());
                $('#clearingID').show();

                $.ajax({
                    url: 'CXRLoadData',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        command: 'AppointmentNo',
                        token: $(this).text()
                    },
                    success: function (data) {

                        $('#appbody').html('');
                        $.each(data, function (key, val) {

                            $.ajax({
                                url: 'CXRLoadData',
                                type: 'post',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    command: 'CheckAppointmentAvailable',
                                    appNo: val.temp_app_no
                                },
                                async: false,
                                success: function (data) {

                                    if (data.result == true) {
                                        $('#appbody').append('<tr class="appNum rowSaved" > <td title="Already Saved Appointment No">' + val.temp_app_no + '</td> </tr>');
                                    } else {
                                        $('#appbody').append('<tr class="appNum"> <td>' + val.temp_app_no + '</td> </tr>');
                                    }
                                }
                            });
                        });
                        $('#noshow').iziModal('close');
                    }
                });
            });

            //============================ Open Modal ======================================

            $('#notyicon').on('click', function () {

                $.ajax({
                    url: 'CXRLoadData',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        command: 'extraViewLoad'
                    },
                    success: function (data) {
                        var html = '';
                        var co = 0;
                        $('#extraViewTbody').html('');
                        if (data.result.length != 0) {
                            $(data.result).each(function (key, val) {
                                co++;
                                html += "<tr>";
                                html += "<td>" + co + "</td>";
                                html += "<td>" + val.temp_passport + "</td>";
                                html += "<td style='display: none;'>" + val.temp_app_no + "</td>";
                                html += "<td>" + val.FirstName + " " + val.LastName + "</td>";
                                html += "<td>" + val.temp_token_no + "</td>";
                                if (val.rad_rep_comment != null) {
                                    html += "<td>" + val.rad_rep_comment + "</td>";
                                } else {
                                    html += "<td></td>";
                                }
                                html += "<td><button class=\"form-control btn-sm btn-info assign\" id='extra" + key + "'>Assign</button>" + "</td>";
                                html += "<td style='display: none;'>" + val.temp_id + "</td>";
                                html += "</tr>";
                            });
                            $('#extraViewTbody').html('');
                            $('#extraViewTbody').html(html);
                        } else {
                            $('#extraViewTbody').html('');
                            $('#extraViewTbody').html('<tr><td colspan="8">No data to view!</td></tr>');
                        }

                    },
                    complete: function (data) {
                        $('#listmodal').iziModal('open');
                    }
                });
            });

            //Assign button onclick
            $(document).on('click', '.assign', function () {

                var token = $(this).parent().parent().find('td:nth-child(5)').text();
                var appNo = $(this).parent().parent().find('td:nth-child(3)').text();

                $('#clearingID').show();
                $('#currentTokenNo').text(token);

                $('#appbody').html('');
                $('#appbody').html('<tr class="appNum extra"><td>' + appNo + '</td> </tr>');

                $('#listmodal').iziModal('close');
            });

            function createbarcode() {
                var barcodes = [];

                var Appno = $('#cxr_app_no').val();
                var Gen = $('#gen').val();
                var Fnm = $('#fullnam').val();
                var Age = $('#age').val();
                var DOB = $('#dob').val();

                barcodes.push([Appno, Gen, Fnm, Age, DOB]);
                var arrayToSend = JSON.stringify(barcodes);


                $.ajax({
                    url: 'CXRLoadData',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        command: 'CreateBC',
                        barcode: arrayToSend,
                    },
                    success: function (data) {

                        $('#hideBarcodePanel').show();
                        var image = new Image();
                        image.src = "data:image/jpg;base64," + data.Appno;
                        $('#apno').html(image);

                        var image1 = new Image();
                        image1.src = "data:image/jpg;base64," + data.Name;
                        $('#nm').html(image1);

                        var image2 = new Image();
                        image2.src = "data:image/jpg;base64," + data.Age;
                        $('#ag').html(image2);

                        var image3 = new Image();
                        image3.src = "data:image/jpg;base64," + data.Gender;
                        $('#gn').html(image3);

                        var image4 = new Image();
                        image4.src = "data:image/jpg;base64," + data.DOB;
                        $('#DOB').html(image4);
                    }
                });
            }

            function getPendingTokens() {
                $.ajax({
                    url: 'CXRLoadData',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        command: 'pendingToken',
                    },
                    success: function (data) {

                        $('#CTNumber').text(data.result);
                    }
                });
            }

            function getRecallListTokens() {

                $.ajax({
                    url: 'CXRLoadData',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        command: 'pendingRecallList'
                    },
                    success: function (data) {
                        $('#callAgainTokens').text("");
                        $('#callAgainTokens').text(data.result);
                    }
                });
            }

            var bar1 = new ProgressBar.Line('#pendingTokenProgress', {
                strokeWidth: 2,
                easing: 'easeInOut',
                duration: 3000,
                color: '#FFEA82',
                trailColor: '#eee',
                trailWidth: 1,
                svgStyle: { width: '100%', height: '100%' },
                from: { color: '#FFEA82' },
                to: { color: '#ED6A5A' },
                step: (state, bar) => {
                    bar.path.setAttribute('stroke', state.color);
                }
            });

            bar1.animate(1.0);

            setInterval(function () {
                getPendingTokens();
                bar1.set(0);
                bar1.animate(1);
            }, 3000);

            var bar2 = new ProgressBar.Line('#callAgainTokenProgress', {
                strokeWidth: 2,
                easing: 'easeInOut',
                duration: 6000,
                color: '#FFEA82',
                trailColor: '#eee',
                trailWidth: 1,
                svgStyle: { width: '100%', height: '100%' },
                from: { color: '#00838f' },
                to: { color: '#BBBA82' },
                step: (state, bar) => {
                    bar.path.setAttribute('stroke', state.color);
                }
            });

            bar2.animate(1.0);

            setInterval(function () {
                getRecallListTokens();
                bar2.set(0);
                bar2.animate(1);
            }, 6000);

            //======================================================================================

            $('#biometricAuth').on('click', function () {

                $('#biometricVerification').iziModal('open');
            });

            $('#flatLeftThumbVerify').on('click', function () {

                var appointmentNo = $('#cxr_app_no').val();

                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth() + 1; //January is 0!

                var yyyy = today.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd;
                }
                if (mm < 10) {
                    mm = '0' + mm;
                }
                var today = yyyy + "" + mm + "" + dd;

                const loadImageName = "" + appointmentNo + "-" + today + "/FP-" + appointmentNo + "-Flat Left Thumb-" + today + ".bmp";

                $('#loadImageSavedVeri').attr('src', fingerPrintPath + '/FingerPrintData/' + loadImageName);
                $('#verAppNo').text(appointmentNo);
                $('#fingerName').text('Flat Left Thumb');

                objectToVeri = 6;

                $('.showFingerVeriPanel').show();
            });

            $('#flatRightThumbVerify').on('click', function () {

                var appointmentNo = $('#cxr_app_no').val();

                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth() + 1; //January is 0!

                var yyyy = today.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd;
                }
                if (mm < 10) {
                    mm = '0' + mm;
                }
                var today = yyyy + "" + mm + "" + dd;

                const loadImageName = "" + appointmentNo + "-" + today + "/FP-" + appointmentNo + "-Flat Right Thumb-" + today + ".bmp";

                $('#loadImageSavedVeri').attr('src', fingerPrintPath + '/FingerPrintData/' + loadImageName);
                $('#verAppNo').text(appointmentNo);
                $('#fingerName').text('Flat Right Thumb');

                objectToVeri = 1;

                $('.showFingerVeriPanel').show();
            });

            $('#startFingerPrintProcessVerification').on('click', function () {

                var uri = "http://localhost:6463/api/Fingerprints/" + objectToVeri;

                $('#startFingerPrintProcessVerification').prop('disabled', true);

                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth() + 1; //January is 0!

                var yyyy = today.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd;
                }
                if (mm < 10) {
                    mm = '0' + mm;
                }
                var today = yyyy + "" + mm + "" + dd;

                $.ajax({
                    url: uri,
                    type: "GET",
                    success: function (obj) {

                        var data = JSON.parse(obj);

                        var imageData = data[0].Base64BMPImage;
                        var appointmentNo = $('#cxr_app_no').val();
                        var objectName = data[0].ObjectName;

                        $.ajax({
                            url: 'CXRLoadData',
                            type: 'post',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                command: 'fingerPrintTempSave',
                                appNo: appointmentNo,
                                imageData: imageData,
                                objectName: objectName
                            },
                            success: function (data) {

                                if (data.result == true) {

                                    $('#loadImageSavedVeriCurrent').html("");

                                    var imagePathTemp = fingerPrintPath + '/tempFingerPrint/FPCXR-' + appointmentNo + '-' + objectName + '-' + today + '.bmp#' + new Date().getTime();

                                    $('#loadImageSavedVeriCurrent').html("<img src=\"" + imagePathTemp + "\" class=\"img-fluid\" alt=\"\" style=\"height: 275.6px;\">");


                                    $('#verAppNoVe').text(appointmentNo);
                                    $('#fingerNameVe').text(objectName);
                                }
                            }, complete: function () {

                                const urlOrg = "/FingerPrintData/" + appointmentNo + "-" + today + "/FP-" + appointmentNo + "-" + objectName + "-" + today + ".bmp";
                                const urlTemp = '/tempFingerPrint/FPCXR-' + appointmentNo + '-' + objectName + '-' + today + '.bmp';

                                var uri = "http://192.168.100.6:8080/Values/GetString";

                                $.ajax({
                                    url: uri,
                                    type: "GET",
                                    data: { urlOrg: urlOrg, urlTemp: urlTemp },
                                    success: function (data) {

                                        $('#responseText').html("");

                                        if (data.toString() == "Finger Print Verified") {

                                            $('#responseText').html('<h2 class="text-center" style="text-align: center;color: #119611;font-weight: bold;font-size: 2rem;">' + data + '</h2>');
                                            $('#statVerification').text(data).removeClass('badge-warning badge-danger').addClass('badge-success');
                                        } else if (data.toString() == "Finger Print Not Verified") {

                                            $('#responseText').html('<h2 class="text-center" style="text-align: center;color: #da5d43;font-weight: bold;font-size: 2rem;">' + data + '</h2>');
                                            $('#statVerification').text(data).removeClass('badge-warning badge-success').addClass('badge-danger');
                                        }
                                    }, complete: function () {

                                        $('#veriOk').show();
                                    }, error: function () {

                                        Swal(
                                            'Verification Service is not running! ',
                                            'Please start it again.',
                                            'warning'
                                        );
                                    }
                                });
                            }
                        });


                        $('#startFingerPrintProcessVerification').prop('disabled', false);
                    },
                    error: function (response) {
                        if (response.readyState === 0)
                            alert("Connection Error.... Please check service.");
                        else
                            alert(response.responseText);
                    }
                });
            });

            $('#veriOk').on('click', function () {

                $('#biometricVerification').iziModal('close');
            });

        }
    } else {

        Swal(
            'You don\'t have Permission!',
            'Please use CXR Counter 1 or Counter 2 logins.',
            'warning'
        );
    }

    function isOn() {

        $.ajax({
            url: 'QueueManagementSettingsSaveData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            async: false,
            data: {
                command: 'on',
                counter: 'Radiology'
            },
            success: function (data) {


                aaa = true;

            }
        });
        return aaa;
    }


    // ------------------------------------------------------
    $('#notyicon02').on('click', function () {

        $.ajax({
            url: 'CXRLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'CXRExtraList'
            },
            success: function (data) {
                var html = '';
                var co = 0;
                $('#CXRExtraListTbody').html('');
                if (data.result.length != 0) {
                    $(data.result).each(function (key, val) {
                        co++;
                        html += "<tr>";
                        html += "<td>" + co + "</td>";
                        html += "<td>" + val.temp_app_no + "</td>";
                        html += "<td>" + val.FirstName + " " + val.LastName + "</td>";
                        html += "<td>" + val.temp_token_no + "</td>";
                        if (val.temp_radiology == 1) {
                            html += "<td style='color: crimson;'>Not completed</td>";
                        } else if (val.temp_radiology == 2) {
                            html += "<td style='color: orange'>Ongoing</td>";
                        } else if (val.temp_radiology == 4) {
                            html += "<td style='color: green;'>completed</td>";
                        }

                        if (val.rad_rep_status != null) {
                            if (val.cxr_extra_view == "done") {
                                html += "<td style='color: green;'>completed</td>";
                            } else {
                                html += "<td style='color: crimson'>Not completed</td>";
                            }
                        } else {
                            html += "<td></td>";
                        }


                        html += "</tr>";
                    });
                    $('#CXRExtraListTbody').html('');
                    $('#CXRExtraListTbody').html(html);
                } else {
                    $('#CXRExtraListTbody').html('');
                    $('#CXRExtraListTbody').html('<tr><td colspan="8">No data to view!</td></tr>');
                }
            },
            complete: function (data) {
                $('#listmodal02').iziModal('open');
            }
        });

    });


});
