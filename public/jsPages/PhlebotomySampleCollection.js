var arr = [];
var str = "No";
var printOK = 0;
var barcode = "";
var aaa = false;
var objectToVeri = 0;


if (usergroup == 12 || usergroup == 13) {



    var trr = 0;

    //================================= Calling the next token number ==============

    $('#next').on('click', function () {

        $('#statVerification').text("Pending").removeClass('badge-danger badge-success').addClass('badge-warning');
        $('.showFingerVeriPanel').hide();
        //$('#save').hide();
        $('#loadImageSavedVeri').attr('src', '');
        $('#loadImageSavedVeriCurrent img').remove();
        $('#responseText h2').remove();
        $('#MemberImgTag').attr('src', imgPathBlade + '/user_icon.png');

        var preToken = $('#currentTokenNo').text();

        str = "Yes";
        if (arr.length == 0) {

            $.ajax({
                url: 'PhlebotomyLoadData',
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

                        $('#currentTokenNo').text(data);

                        $.ajax({
                            url: 'PhlebotomyLoadData',
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
                                localStorage.setItem("samplecollect", 100);
                                $('#appbody').html('');
                                $.each(data, function (key, val) {
                                    $('#appbody').append('<tr class="appNum"> <td>' + val + '</td> </tr>');
                                });
                            }
                        });
                    }
                }, complete: function () {
                    $("#clearingID").show();
                }
            });
        } else {
            Swal('Please compelete this token first !', '', 'error');
        }
    });

    //=========== Calling the Data when click on Appointment Number ================

    $('#notAvailable').on('click', function () {

        $('#MemberImgTag').attr('src', imgPathBlade + '/user_icon.png');

        if (str.length > 2) {
            $.ajax({
                url: 'PhlebotomyLoadData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    command: 'notAvailable',
                    token: $('#currentTokenNo').text()
                },
                success: function (data) {
                    Swal('Added to Queue', '', 'success');
                }
            });
        } else {
            Swal('No Tokens', '', 'error');
        }
    });

    // ========================================================================

    $('#recall').on('click', function () {


        $.ajax({
            url: 'PhlebotomyLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'NoShow'
            },
            success: function (data) {

                $('#appNotAvblBody').html('');
                $.each(data, function (key, val) {
                    $('#appNotAvblBody').append('<tr class="appNotAvblNum"> <td>' + val + '</td> </tr>');
                });
            }
        });
        $('#noshow').iziModal('open');
    });

    // ========================================================================

    $(document).on('click', "tr.appNotAvblNum", function () {

        $('#currentTokenNo').text($(this).text());
        $("#clearingID").show();

        $.ajax({
            url: 'PhlebotomyLoadData',
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
                //alert(JSON.stringify(data));
                $('#appbody').html('');
                $.each(data, function (key, val) {
                    $('#appbody').append('<tr class="appNum"><td>' + val + '</td></tr>');
                });
                $('#noshow').iziModal('close');
            }
        });
    });

    // ========================================================================

    $(document).on('click', "tr.appNum", function () {

        $('#statVerification').text("Pending").removeClass('badge-danger badge-success').addClass('badge-warning');
        $('.showFingerVeriPanel').hide();
        //$('#save').hide();
        $('#loadImageSavedVeri').attr('src', '');
        $('#loadImageSavedVeriCurrent img').remove();
        $('#responseText h2').remove();

        if (!$(this).hasClass("rowSaved")) {


            $('tr.appNum').removeClass('clickedRow');
            $(this).addClass('clickedRow');

            $.ajax({
                url: 'PhlebotomyLoadData',
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

                    $('#AppointmentNo').val(data[0]);
                    $('#PassportNo').val(data[1]);
                    $('#Age').val(data[2]);
                    $('#ps_sample_col_1').val(data[3]);
                    $('#ps_sample_col_2').val(data[4]);

                    if (data[2] >= "15") {

                        $('#chkbox1').prop('checked', true);
                        $('#chkbox2').prop('checked', true);
                        $('#chkbox3').prop('checked', true);
                    } else {
                        $('#chkbox1').prop('checked', false);
                        $('#chkbox2').prop('checked', true);
                        $('#chkbox3').prop('checked', true);
                    }

                    $('#ageTxtHi').val(data[2]);
                    $('#genderTxtHi').val(data[6]);

                    var imgPath = "";
                    if (data[5] != null && data[5] != "") {
                        imgPath = path + '/' + data[5];
                    } else {
                        imgPath = imgPathBlade + '/user_icon.png';
                    }

                    $('#MemberImgTag').attr('src', imgPath);
                    //$('#ps_sample_col_2').val(data[3]);
                }
            });
        }
    });

    //============================ Save Data ======================================

    $('#save').on('click', function () {

        Swal.fire({
            title: 'Are you sure?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Submit!'
        }).then((result) => {
            if (result.value) {

                var AppointmentNo = $('#AppointmentNo').val();
                var PassportNo = $('#PassportNo').val();
                var barcode_hiv = "";
                var barcode_mal = "";
                var barcode_fil = "";
                var barcode_shcg = "";
                var hivcop = "";
                var malcop = "";
                var filcop = "";
                var shcgcop = "";

                if (AppointmentNo != "" && PassportNo != "") {

                    var appointment = $('#AppointmentNo').val();
                    var tokenNo = parseInt($('#currentTokenNo').text());

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

                    var imagePathTemp = '/FPPhl-' + appointmentNo + '-' + objectName + '-' + today + '.bmp';


                    if ($('#chkbox1').prop('checked') == true || $('#chkbox2').prop('checked') == true || $('#chkbox3').prop('checked') == true || $('#chkbox4').prop('checked') == true) {

                        var tokenBar = "";
                        var indexBar = "";
                        // =================
                        $.ajax({
                            url: 'PhlebotomyLoadData',
                            type: 'post',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                command: 'GenerateBCNO',
                                tokenNo: tokenNo
                            },
                            success: function (data) {
                                barcode = (data.result).trim();
                                tokenBar = (data.token);
                                indexBar = (data.index);
                            }, complete: function () {
                                
                                if ($('#chkbox1').prop('checked') == true) {
                                    barcode_hiv = barcode;
                                    hivcop = "true";
                                }
                                if ($('#chkbox2').prop('checked') == true) {
                                    barcode_mal = barcode;
                                    malcop = "true";
                                }
                                if ($('#chkbox3').prop('checked') == true) {
                                    barcode_fil = barcode;
                                    filcop = "true";
                                }
                                if ($('#chkbox4').prop('checked') == true) {
                                    barcode_shcg = barcode;
                                    shcgcop = "true";
                                }

                                // ===========================================================

                                $.ajax({
                                    url: 'PhlebotomyLoadData',
                                    type: 'post',
                                    dataType: 'json',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        command: 'save',
                                        imagePathTemp: imagePathTemp,
                                        appno: $('#AppointmentNo').val(),
                                        ps_passp_no: $('#PassportNo').val(),
                                        ps_hiv_elisa: hivcop,
                                        ps_hiv_no_copies: "",
                                        ps_hiv_test_kit: "",
                                        ps_malaria: malcop,
                                        ps_malaria_no_copies: "",
                                        ps_malaria_test_kit: "",
                                        ps_filaria: filcop,
                                        ps_filaria_no_copies: "",
                                        ps_filaria_test_kit: "",
                                        ps_shcg: shcgcop,
                                        ps_shcg_no_copies: "",
                                        ps_shcg_test_kit: "",
                                        barcode_hiv: barcode_hiv,
                                        barcode_mal: barcode_mal,
                                        barcode_fil: barcode_fil,
                                        barcode_shcg: barcode_shcg,
                                    },
                                    success: function (data) {

                                        $('#appbody  > tr.appNum').each(function () {

                                            if (AppointmentNo.trim() == $(this).text().trim()) {

                                                $(this).removeClass('clickedRow');
                                                $(this).removeClass('prevClicked');
                                                $(this).addClass('rowSaved');
                                            }
                                        });

                                        Swal.fire({
                                            type: 'success',
                                            title: 'Data Saved Successfully!',
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'OK'
                                        }).then((result) => {
                                            if (result.value) {

                                                $('.modalBarcode').modal('show');

                                                JsBarcode("#barcodeContainer", barcode, {
                                                    fontSize: 24,
                                                    height: 75,
                                                    marginTop: -80
                                                });

                                                $('#barcodeContainer').attr('height', '90px');
                                                $('#barcodeContainer').attr('viewBox', '0 0 354 3');

                                                var content = $('#barcodeContainer g').html();

                                                var gender = "";
                                                if ($('#genderTxtHi').val() == "Female") {
                                                    gender = "F";
                                                } else {
                                                    gender = "M";
                                                }

                                                var currentdate = new Date();
                                                var datetime = "" + currentdate.getFullYear() + "/"
                                                    + (currentdate.getMonth() + 1) + "/"
                                                    + currentdate.getDate() + " "
                                                    + ("00" + currentdate.getHours()).substr(-2) + ":"
                                                    + ("00" + currentdate.getMinutes()).substr(-2) + ":"
                                                    + ("00" + currentdate.getSeconds()).substr(-2);


                                                $('#barcodeContainer g').html(content + '<text style="font: 20px monospace; font-weight: bold;" text-anchor="middle" x="112" y="122">' + gender + ' ' + $('#ageTxtHi').val() + 'Y T' + tokenBar + ' ' + indexBar + '</text>' +
                                                    '<text style="font: 20px monospace; font-weight: bold;" text-anchor="middle" x="112" y="140">' + datetime + '</text>'
                                                );

                                                $('#AppointmentNo').val('');
                                                $('#PassportNo').val('');
                                                $('#Age').val('');
                                                $('#chkbox1').prop('checked', false);
                                                $('#chkbox2').prop('checked', false);
                                                $('#chkbox3').prop('checked', false);
                                                $('#chkbox4').prop('checked', false);
                                                barcode = "";
                                                trr = 0;

                                            }
                                        });
                                    }
                                });
                                // ===========================================================
                            }
                        });


                    } else {
                        Swal.fire('Test Empty!', '', 'warning');
                    }
                } else {
                    Swal.fire('Data Empty!', '', 'warning');
                }
            }
        });
    });

    // ========================================================================

    var aaa = false;

    // ========================================================================

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

    // ========================================================================

    function getPendingTokens() {
        $.ajax({
            url: 'PhlebotomyLoadData',
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

    // ========================================================================

    function getRecallListTokens() {

        $.ajax({
            url: 'PhlebotomyLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'recallCount'
            },
            success: function (data) {
                $('#callAgainTokens').text("");
                $('#callAgainTokens').text(data.result);
            }
        });
    }

    // ========================================================================

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

    $('#btnPrintBarcodeCon').on('click', function () {

        var DocumentContainer = document.getElementById('modalContainerPrintable');
        var WindowObject = window.open('', "PrintWindow", "width=500,height=200");
        WindowObject.document.writeln(DocumentContainer.innerHTML);
        WindowObject.document.close();
        WindowObject.focus();
        WindowObject.print();
        WindowObject.close();
    });





} else {

    Swal(
        'You don\'t have Permission!',
        'Please use Phlebotomy Counter 1 or Counter 2 logins.',
        'warning'
    );
}