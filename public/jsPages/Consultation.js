$(document).ready(function () {

    var AppNum = '';
    $('#printRadiologistReport').hide();
    $('#Tempsave').hide();
    $('#drpCategory2').hide();

    var aaa = false;
    var objectToVeri = 0;

    if (usergroup == 14 || usergroup == 15 || usergroup == 16 || usergroup == 17) {



        // =========================================================================================================

        $('#next').on('click', function () {

            $('#statVerification').text("Pending").removeClass('badge-danger badge-success').addClass('badge-warning');
            $('.showFingerVeriPanel').hide();
            // $('#save').hide();
            $('#loadImageSavedVeri').attr('src', '');
            $('#loadImageSavedVeriCurrent img').remove();
            $('#responseText h2').remove();
            $('#img').attr('src', imgPathBlade + '/PhotoBooth.png');

            var currentTokenNo = $('#currentTokenNo').text().trim();
            if (currentTokenNo == "-") {

                LoadingData();
            } else {

                $.ajax({
                    url: 'ConsultationLoadCurrentTokenNo',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        tokNo: currentTokenNo
                    },
                    success: function (data) {


                        if (data == true) {
                            // --------------------------------------------------------------
                            Swal('please register in all members', '', 'warning');
                            // --------------------------------------------------------
                        } else if (data == false) {

                            LoadingData();
                        }
                    }, complete: function () {
                    }
                });
            }
            // ===========================================================================

        });

        // =========================================================================================================

        function LoadingData() {

            var preToken = $('#currentTokenNo').text();

            $.ajax({
                url: 'ConsultationCallNext',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    preToken: preToken
                },
                success: function (data) {

                    if (data == "No Token") {
                        Swal('There no More tokens.', '', 'error');
                    } else {

                        $('#currentTokenNo').text(data);

                        $.ajax({
                            url: 'ConsultationLoadAppointmentNo',
                            type: 'post',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },

                            data: {
                                token: data
                            },
                            success: function (data) {
                                $('#appbody').html('');
                                $.each(data, function (key, val) {
                                    $('#appbody').append('<tr class="appNum"> <td>' + val + '</td> </tr>');
                                });
                            }
                        });
                    }
                }, complete: function () {

                    $("#clearingID").show();

                    $('#refferdAFC').val('');
                    $('#testResAFC').val('');
                    $('#commentAFC').val('');
                    $('#remarkAFC').val('');
                    $('#referedNSACP').val('');
                    $('#remarkNSACP').val('');
                    $('#referedM').val('');
                    $('#testResM').val('');
                    $('#commentM').val('');
                    $('#remarkM').val('');
                    $('#refferdTB').val('');
                    $('#testResTB').val('');
                    $('#commentTB').val('');
                    $('#remarkTB').val('');
                    $('#DoctorName').val('');
                    $('#institute').val('');
                    $('#remarkOther').val('');
                    var img = imgPathBlade + '/imgcou.png';
                    $('#img').attr('src', img);
                }
            });
        }

        //================================ Calling the Data when click on Appointment Number =======================

        $(document).on('click', "tr.appNum", function () {

            $('#statVerification').text("Pending").removeClass('badge-danger badge-success').addClass('badge-warning');
            $('.showFingerVeriPanel').hide();
            $('#loadImageSavedVeri').attr('src', '');
            $('#loadImageSavedVeriCurrent img').remove();
            $('#responseText h2').remove();

            AppNum = $(this).text().trim();

            if (!$(this).hasClass('rowSaved')) {
                $('tr.appNum').removeClass('clickedRow');

                $(this).addClass('clickedRow').addClass('prevClicked');

                var $this = $(this);
                var appno = $this.text();

                $.ajax({
                    url: 'ConsultationLoadFormData',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        appointment: $this.text()
                    },
                    success: function (data) {
                        $('#registration_id').val(appno);
                        $('#NameInFull').val(data[1] + ' ' + data[31]);
                        $('#AppointmentDate').val(data[2]);
                        $('#PassportNumber').val(data[4]);
                        $('#PreviousPassportIfAny').val(data[5]);
                        $('#birthdayCon').val(data[6]);
                        $('#Country2').val(data[14])
                        $('#ethnicity').val(data[8]);
                        $('#CdAddress').val(data[9]);
                        $('#CdStree').val(data[10]);
                        $('#CdCity').val(data[11]);
                        $('#CdStateProvince').val(data[12]);
                        $('#CdPostalCode').val(data[13]);
                        $('#CdCountry').val(data[14]);
                        $('#CdTelephoneFixedLine').val(data[15]);
                        $('#CdMobile').val(data[16]);
                        $('#SlAddress').val(data[17]);
                        $('#SlStreet').val(data[18]);
                        $('#SlCity').val(data[19]);
                        $('#SlStateProvince').val(data[20]);
                        $('#SlPostalCode').val(data[21]);
                        $('#srilanka').val(data[22]);
                        $('#SlTelephoneFixedLine').val(data[23]);
                        $('#SlMobile').val(data[24]);
                        $('#PreferredContactMethod').val(data[25]);
                        $('#SponsorName').val(data[26]);
                        $('#SponsorTelephoneFixedLine').val(data[27]);
                        $('#SponsorEmailAddress').val(data[28]);
                        $('#SponsorMobile').val(data[29]);
                        $('#AppointmentNumber').val(data[30]);
                        $('#rad_comment2').val(data[55]);
                        $('#dateOfarrival').val(data[56]);

                        var img = '';
                        if (data[54] != null && data[54] != "") {
                            img = imgPath + '/' + data[54];
                        } else {
                            img = imgPathBlade + '/imgcou.png';
                        }

                        $('#img').attr('src', img);

                        var dob1 = data[54];
                        var dob = $.datepicker.formatDate('yy-mm-dd', new Date(dob1));
                        var str = dob.split('-');
                        var firstdate = new Date(str[0], str[1], str[2]);
                        var today = new Date();
                        var dayDiff = Math.ceil(today.getTime() - firstdate.getTime()) / (1000 * 60 * 60 * 24 * 365);
                        var age = parseInt(dayDiff);

                        if (age <= 15) {
                            $('.hidpan').show();
                        } else {
                            $('.hidpan').hide();
                            $('.chil').prop('checked', false).uniform('refresh');
                        }

                        var i, j;
                        for (i = 1; i <= 22; i++) {
                            for (j = 32; j <= 54; j++) {
                                $('#rchkbox' + i).prop('checked', false).uniform('refresh');
                            }
                        }

                        var table = $('#rapidTestResultsTbl').DataTable();
                        table.destroy();

                        $.ajax({
                            url: 'ConsultationLoadTestResults',
                            type: 'post',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                appointment: $this.text()
                            },
                            success: function (data) {

                                if (data.result != null) {
                                    var html = "";
                                    var co = 0;
                                    $(data.result).each(function (key, val) {
                                        co++;
                                        if (val.prtr_result == "Positive") {
                                            html += "<tr style=\"background-color: #fb0101 !important;color: white;font-weight: bold;\">";
                                        } else {
                                            html += "<tr>";
                                        }
                                        html += "<td style='display: none;'" + val.prtr_id + "</td>";
                                        html += "<td>" + co + "</td>";
                                        html += "<td>" + val.prtr_test + "</td>";
                                        html += "<td>" + val.prtr_result + "</td>";
                                        html += "<td><input class=\"form-control\" type=\"text\" id='txtComment" + key + "' value='" + val.prtr_comment + "'></td>";
                                        html += "</tr>";
                                    });

                                    $(data.result2).each(function (key, val) {
                                        co++;
                                        if (val.prtr_result == "Positive") {
                                            html += "<tr style=\"background-color: #fb0101 !important;color: white;font-weight: bold;\">";
                                        } else {
                                            html += "<tr>";
                                        }
                                        html += "<td style='display: none;'" + val.prtr_id + "</td>";
                                        html += "<td>" + co + "</td>";
                                        html += "<td>" + val.prtr_test + "</td>";
                                        html += "<td>" + val.prtr_result + "</td>";
                                        html += "<td><input class=\"form-control\" type=\"text\" id='txtComment" + key + "' value='" + val.prtr_comment + "'></td>";
                                        html += "</tr>";

                                    });

                                    $('#rapidTestResultsTBody').html();
                                    $('#rapidTestResultsTBody').html(html);
                                    $('#tableContainer').show();
                                    loadCheckBox(AppNum);
                                }
                            }, complete: function () {
                                loadDataTable();
                            }
                        });
                    }
                });

                var appNo = $this.text();
                appNo = appNo.replace(/\s/g, '');

                var value = $('#regNoAFC option').filter(function () {
                    return $(this).text() === appNo;
                }).val();
                $("#regNoAFC").val(value).change();
                $("#regNoNSACP").val(value).change();
                $("#regNoM").val(value).change();
                $("#regNoTB").val(value).change();
                $("#regNoOther").val(value).change();
            }
        });

        // =========================================================================================================

        //Data Table Plugin Initiate
        function loadDataTable() {
            var table1 = $('#rapidTestResultsTbl').DataTable({
                "pageLength": 25,
                "columnDefs": [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                }],
                dom: 'Blfrtip',
                buttons: [
                    'csv', 'excel'
                ],
                "order": [[1, 'asc']]
            });

            table1.on('order.dt search.dt', function () {
                table1.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();
        }

        // ==================================== Not Available ======================================================

        $('#notAvailable').on('click', function () {

            $('#img').attr('src', imgPathBlade + '/PhotoBooth.png');

            $.ajax({
                url: 'ConsultationLoadData',
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
        });

        // ==================================== Recall Not Available ===============================================

        $('#recall').on('click', function () {

            $('#img').attr('src', imgPathBlade + '/PhotoBooth.png');

            $.ajax({
                url: 'ConsultationLoadData',
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
                    $.each(data.result, function (key, val) {
                        // $('#appNotAvblBody').append('<tr class="appNotAvblNum"> <td>' + val + '</td> </tr>');
                        $('#appNotAvblBody').append('<tr class="appNotAvblNum"> <td attr-no="' + val.temp_consult + '">' + val.temp_token_no + '</td> </tr>');
                    });
                }
            });
            $('#noshow').iziModal('open');
        });

        $('#Temporary').on('click', function () {
            $('#img').attr('src', imgPathBlade + '/PhotoBooth.png');

            $.ajax({
                url: 'ConsultationLoadData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    command: 'tempData'
                },
                success: function (data) {
                    $('#appNotAvblBody2').html('');
                    $.each(data, function (key, val) {
                        $('#appNotAvblBody2').append('<tr class="appNotAvblNum"> <td>' + val + '</td> </tr>');
                    });
                }
            });
            $('#noshow2').iziModal('open');
        });

        $('#History').on('click', function () {
            $('#img').attr('src', imgPathBlade + '/PhotoBooth.png');

            $('#noshow3').iziModal('open');
        });

        $('#dateOfbHistory').on('click', function () {
            var Date = $('#dateOfbHistory').val();
            $.ajax({
                url: 'ConsultationLoadData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    command: 'tempDataHistory',
                    date: Date
                },
                success: function (data) {
                    $('#appNotAvblBody3').html('');
                    $.each(data, function (key, val) {
                        $('#appNotAvblBody3').append('<tr class="appNotAvblNum2"> <td>' + val + '</td> </tr>');
                    });
                }
            });
        });

        // ==================================== Selected Token from No Show ========================================

        $(document).on('click', "tr.appNotAvblNum", function () {
            const $this = $(this);
            var Pstatus = $this.find('td').attr('attr-no');

            $('#currentTokenNo').text($(this).text());

            $("#clearingID").show();


            // ================================
            if (Pstatus == 3) {

                $.ajax({
                    url: 'ConsultationLoadData',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        command: 'ChekTokNo',
                        token: $this.find('td').text(),
                    },
                    success: function (data) {
                        var result = data.result;
                        if (result != 0) {

                            $.ajax({
                                url: 'ConsultationLoadAppointmentNo',
                                type: 'post',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    token: $this.find('td').text()
                                },
                                success: function (data) {

                                    $('#appbody').html('');
                                    $.each(data, function (key, val) {
                                        $('#appbody').append('<tr class="appNum"> <td>' + val + '</td> </tr>');
                                    });
                                    $('#noshow').iziModal('close');
                                    $('#noshow2').iziModal('close');
                                    $('#noshow3').iziModal('close');
                                }
                            });

                        } else {
                            Swal('This token already called by counter!', '', 'warning');
                            $('#noshow').iziModal('close');
                        }

                    }
                });

            } else {

                $.ajax({
                    url: 'ConsultationLoadAppointmentNo',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        token: $(this).text()
                    },
                    success: function (data) {

                        $('#appbody').html('');
                        $.each(data, function (key, val) {
                            $('#appbody').append('<tr class="appNum"> <td>' + val + '</td> </tr>');
                        });
                        $('#noshow').iziModal('close');
                        $('#noshow2').iziModal('close');
                        $('#noshow3').iziModal('close');
                    }
                });
            }
            // ================================

        });


        $(document).on('click', "tr.appNotAvblNum2", function () {

            $("#clearingID").show();

            $.ajax({
                url: 'ConsultationLoadData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    command: 'AppointmentNo2',
                    minAppNo: $(this).text()
                },
                success: function (data) {

                    $('#appbody').html('');
                    $.each(data, function (key, val) {
                        $('#appbody').append('<tr class="appNum"> <td>' + val + '</td> </tr>');
                    });
                    $('#noshow').iziModal('close');
                    $('#noshow2').iziModal('close');
                    $('#noshow3').iziModal('close');
                }
            });
        });

        // =========================================== Save Data ===================================================

        $('#Tempsave').on('click', function () {
            if ($('#appbody tr').hasClass('clickedRow')) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Submit!'
                }).then((result) => {

                    //Save Code
                    if (result.value) {
                        var appnox = AppNum;

                        var chkbox1 = 0;
                        var chkbox2 = 0;
                        var chkbox3 = 0;
                        var chkbox4 = 0;
                        var chkbox5 = 0;
                        var chkbox6 = 0;
                        var chkbox7 = 0;
                        var chkbox8 = 0;
                        var chkbox9 = 0;
                        var chkbox10 = 0;
                        var chkbox11 = 0;
                        var chkbox12 = 0;
                        var chkbox13 = 0;
                        var chkbox14 = 0;
                        var chkbox15 = 0;
                        var chkbox16 = 0;
                        var chkbox17 = 0;
                        var chkbox18 = 0;
                        var chkbox19 = 0;
                        var chkbox20 = 0;
                        var chkbox21 = 0;
                        var chkbox22 = 0;


                        var chkbox70 = 0;
                        var chkbox71 = 0;
                        var chkbox72 = 0;
                        var chkbox73 = 0;
                        var chkbox74 = 0;
                        var chkbox75 = 0;
                        var chkbox76 = 0;
                        var chkbox77 = 0;
                        var chkbox78 = 0;
                        var chkbox79 = 0;
                        var chkbox80 = 0;
                        var chkbox81 = 0;
                        var chkbox82 = 0;
                        var chkbox83 = 0;

                        var chkbox84 = 0;
                        var chkbox85 = 0;
                        var chkbox86 = 0;
                        var chkbox87 = 0;
                        var chkbox88 = 0;
                        var chkbox89 = 0;
                        var chkbox90 = 0;

                        var chkbox91 = 0;
                        var chkbox92 = 0;
                        var chkbox93 = 0;
                        var chkbox94 = 0;
                        var chkbox95 = 0;
                        var chkbox96 = 0;
                        var chkbox97 = 0;
                        var chkbox98 = 0;


                        var cm_order_sputum_sample = 0;

                        if ($("#chkbox1").prop('checked') == true) {
                            chkbox1 = 1;
                        }
                        if ($("#chkbox2").prop('checked') == true) {
                            chkbox2 = 1;
                        }
                        if ($("#chkbox3").prop('checked') == true) {
                            chkbox3 = 1;
                        }
                        if ($("#chkbox4").prop('checked') == true) {
                            chkbox4 = 1;
                        }
                        if ($("chkbox5").prop('checked') == true) {
                            chkbox5 = 1;
                        }
                        if ($("#chkbox6").prop('checked') == true) {
                            chkbox6 = 1;
                        }
                        if ($("#chkbox7").prop('checked') == true) {
                            chkbox7 = 1;
                        }
                        if ($("#chkbox8").prop('checked') == true) {
                            chkbox8 = 1;
                        }
                        if ($("#chkbox9").prop('checked') == true) {
                            chkbox9 = 1;
                        }
                        if ($("#chkbox10").prop('checked') == true) {
                            chkbox10 = 1;
                        }
                        if ($("#chkbox11").prop('checked') == true) {
                            chkbox11 = 1;
                        }
                        if ($("#chkbox12").prop('checked') == true) {
                            chkbox12 = 1;
                        }
                        if ($("#chkbox13").prop('checked') == true) {
                            chkbox13 = 1;
                        }
                        if ($("#chkbox14").prop('checked') == true) {
                            chkbox14 = 1;
                        }
                        if ($("#chkbox15").prop('checked') == true) {
                            chkbox15 = 1;
                        }
                        if ($("#chkbox16").prop('checked') == true) {
                            chkbox16 = 1;
                        }
                        if ($("#chkbox17").prop('checked') == true) {
                            chkbox17 = 1;
                        }
                        if ($("#chkbox18").prop('checked') == true) {
                            chkbox18 = 1;
                        }
                        if ($("#chkbox19").prop('checked') == true) {
                            chkbox19 = 1;
                        }
                        if ($("#chkbox20").prop('checked') == true) {
                            chkbox20 = 1;
                        }
                        if ($("#chkbox21").prop('checked') == true) {
                            chkbox21 = 1;
                        }
                        if ($("#chkbox22").prop('checked') == true) {
                            chkbox22 = 1;
                        }
                        if ($("#cm_order_sputum_sample").prop('checked') == true) {
                            cm_order_sputum_sample = 1;
                        }

                        if ($("#chkbox70").prop('checked') == true) {
                            chkbox70 = 1;
                        }
                        if ($("#chkbox71").prop('checked') == true) {
                            chkbox71 = 1;
                        }
                        if ($("#chkbox72").prop('checked') == true) {
                            chkbox72 = 1;
                        }
                        if ($("#chkbox73").prop('checked') == true) {
                            chkbox73 = 1;
                        }
                        if ($("#chkbox74").prop('checked') == true) {
                            chkbox74 = 1;
                        }
                        if ($("#chkbox75").prop('checked') == true) {
                            chkbox75 = 1;
                        }
                        if ($("#chkbox76").prop('checked') == true) {
                            chkbox76 = 1;
                        }
                        if ($("#chkbox77").prop('checked') == true) {
                            chkbox77 = 1;
                        }
                        if ($("#chkbox78").prop('checked') == true) {
                            chkbox78 = 1;
                        }
                        if ($("#chkbox79").prop('checked') == true) {
                            chkbox79 = 1;
                        }

                        if ($("#chkbox80").prop('checked') == true) {
                            chkbox80 = 1;
                        }
                        if ($("#chkbox81").prop('checked') == true) {
                            chkbox81 = 1;
                        }
                        if ($("#chkbox82").prop('checked') == true) {
                            chkbox82 = 1;
                        }
                        if ($("#chkbox83").prop('checked') == true) {
                            chkbox83 = 1;
                        }
                        if ($("#chkbox84").prop('checked') == true) {
                            chkbox84 = 1;
                        }
                        if ($("#chkbox85").prop('checked') == true) {
                            chkbox85 = 1;
                        }
                        if ($("#chkbox86").prop('checked') == true) {
                            chkbox86 = 1;
                        }
                        if ($("#chkbox87").prop('checked') == true) {
                            chkbox87 = 1;
                        }
                        if ($("#chkbox88").prop('checked') == true) {
                            chkbox88 = 1;
                        }
                        if ($("#chkbox89").prop('checked') == true) {
                            chkbox89 = 1;
                        }
                        if ($("#chkbox90").prop('checked') == true) {
                            chkbox90 = 1;
                        }
                        if ($("#chkbox91").prop('checked') == true) {
                            chkbox91 = 1;
                        }
                        if ($("#chkbox92").prop('checked') == true) {
                            chkbox92 = 1;
                        }
                        if ($("#chkbox93").prop('checked') == true) {
                            chkbox93 = 1;
                        }
                        if ($("#chkbox94").prop('checked') == true) {
                            chkbox94 = 1;
                        }
                        if ($("#chkbox95").prop('checked') == true) {
                            chkbox95 = 1;
                        }
                        if ($("#chkbox96").prop('checked') == true) {
                            chkbox96 = 1;
                        }
                        if ($("#chkbox97").prop('checked') == true) {
                            chkbox97 = 1;
                        }
                        if ($("#chkbox98").prop('checked') == true) {
                            chkbox98 = 1;
                        }


                        var appointment = $('#AppointmentNumber').val();

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

                        var imagePathTemp = '/FPConsultation-' + appointmentNo + '-' + objectName + '-' + today + '.bmp';


                        $.ajax({
                            url: 'ConsultationLoadData',
                            type: 'post',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                command: 'TempSave',
                                imagePathTemp: imagePathTemp,
                                token: $('#currentTokenNo').text(),
                                appno: $('#AppointmentNumber').val(),
                                ppno: $('#PassportNumber').val(),
                                category: $('#drpCategory').val(),
                                cough: $('input[name=ty1]:checked').val(),
                                haemoptysis: $('input[name=ty2]:checked').val(),
                                nightsweats: $('input[name=ty3]:checked').val(),
                                weightloss: $('input[name=ty4]:checked').val(),
                                fever: $('input[name=ty5]:checked').val(),
                                chronicrespiratorydisease: $('input[name=tyr1]:checked').val(),
                                thoracic: $('input[name=tyr2]:checked').val(),
                                Cyanosis: $('input[name=tyr3]:checked').val(),
                                respiratoryinsufficient: $('input[name=tyr4]:checked').val(),
                                historytb: $('input[name=tyg1]:checked').val(),
                                householddiagnosedtb: $('input[name=tyg2]:checked').val(),
                                historyrecentcontact: $('input[name=tyg3]:checked').val(),
                                examsresults: $('#examsresults').val(),
                                CXRay: $('#CXRay').val(),
                                chkbox1: chkbox1,
                                chkbox2: chkbox2,
                                chkbox3: chkbox3,
                                chkbox4: chkbox4,
                                chkbox5: chkbox5,
                                chkbox6: chkbox6,
                                chkbox7: chkbox7,
                                chkbox8: chkbox8,
                                chkbox9: chkbox9,
                                chkbox10: chkbox10,
                                chkbox11: chkbox11,
                                chkbox12: chkbox12,
                                chkbox13: chkbox13,
                                chkbox14: chkbox14,
                                chkbox15: chkbox15,
                                chkbox16: chkbox16,
                                chkbox17: chkbox17,
                                chkbox18: chkbox18,
                                chkbox19: chkbox19,
                                chkbox20: chkbox20,
                                chkbox21: chkbox21,
                                chkbox22: chkbox22,

                                // ---------------
                                chkbox70: chkbox70,
                                chkbox71: chkbox71,
                                chkbox72: chkbox72,
                                chkbox73: chkbox73,
                                chkbox74: chkbox74,
                                chkbox75: chkbox75,
                                chkbox76: chkbox76,
                                chkbox77: chkbox77,
                                chkbox78: chkbox78,
                                chkbox79: chkbox79,
                                chkbox80: chkbox80,
                                chkbox81: chkbox81,
                                chkbox82: chkbox82,
                                chkbox83: chkbox83,
                                chkbox84: chkbox84,
                                chkbox85: chkbox85,
                                chkbox86: chkbox86,
                                chkbox87: chkbox87,
                                chkbox88: chkbox88,
                                chkbox89: chkbox89,
                                chkbox90: chkbox90,
                                chkbox91: chkbox91,
                                chkbox92: chkbox92,
                                chkbox93: chkbox93,
                                chkbox94: chkbox94,
                                chkbox95: chkbox95,
                                chkbox96: chkbox96,
                                chkbox97: chkbox97,
                                chkbox98: chkbox98,


                                // ----------------

                                cm_order_sputum_sample: cm_order_sputum_sample,
                                dppcomment: $('#cm_dpp_comment').val(),
                                day1: $('#cm_day1').val(),

                            },
                            success: function (data) {

                                Swal.fire({
                                    type: 'success',
                                    title: 'Data Saved Successfully!',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
                                });


                                // ==================================
                                $('#appbody  > tr.appNum').each(function () {

                                    if (appnox.trim() == $(this).text().trim()) {
                                        $(this).removeClass('clickedRow');
                                        $(this).removeClass('prevClicked');
                                        $(this).addClass('rowSaved');
                                    }
                                });
                                // ===========================================

                                $('#rapidTestResultsTBody tr').each(function () {

                                    var tr = $(this);
                                    var serial = tr.find('td:nth-child(1)').text();
                                    var comment = tr.find('td:nth-child(5)').find('input').val();

                                    $.ajax({
                                        url: 'ConsultationLoadData',
                                        type: 'post',
                                        dataType: 'json',
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data: {
                                            command: 'updateTestResults',
                                            serial: serial,
                                            comment: comment
                                        },
                                        success: function (data) {
                                        }
                                    });
                                });
                                clear();
                            },
                            complete: function () {

                                var appNo = $('#AppointmentNumber').val();

                                $.ajax({
                                    url: 'generateCard',
                                    type: 'post',
                                    dataType: 'json',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        appNo: appNo
                                    },
                                    success: function (data) {
                                    },
                                    complete: function (data) {
                                        window.open(urlPath + '/generateCard?appNo=' + appNo);
                                    }
                                });
                                AppNum = '';
                            }
                        });
                    }

                });

            } else {
                Swal('Please Select Appointment No!', '', 'warning');
            }

        });


        $('#save').on('click', function () {
            if ($('#appbody tr').hasClass('clickedRow')) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Submit!'
                }).then((result) => {

                    //Save Code
                    if (result.value) {
                        var appnox = AppNum;

                        var chkbox1 = 0;
                        var chkbox2 = 0;
                        var chkbox3 = 0;
                        var chkbox4 = 0;
                        var chkbox5 = 0;
                        var chkbox6 = 0;
                        var chkbox7 = 0;
                        var chkbox8 = 0;
                        var chkbox9 = 0;
                        var chkbox10 = 0;
                        var chkbox11 = 0;
                        var chkbox12 = 0;
                        var chkbox13 = 0;
                        var chkbox14 = 0;
                        var chkbox15 = 0;
                        var chkbox16 = 0;
                        var chkbox17 = 0;
                        var chkbox18 = 0;
                        var chkbox19 = 0;
                        var chkbox20 = 0;
                        var chkbox21 = 0;
                        var chkbox22 = 0;


                        var chkbox70 = 0;
                        var chkbox71 = 0;
                        var chkbox72 = 0;
                        var chkbox73 = 0;
                        var chkbox74 = 0;
                        var chkbox75 = 0;
                        var chkbox76 = 0;
                        var chkbox77 = 0;
                        var chkbox78 = 0;
                        var chkbox79 = 0;
                        var chkbox80 = 0;
                        var chkbox81 = 0;
                        var chkbox82 = 0;
                        var chkbox83 = 0;

                        var chkbox84 = 0;
                        var chkbox85 = 0;
                        var chkbox86 = 0;
                        var chkbox87 = 0;
                        var chkbox88 = 0;
                        var chkbox89 = 0;
                        var chkbox90 = 0;

                        var chkbox91 = 0;
                        var chkbox92 = 0;
                        var chkbox93 = 0;
                        var chkbox94 = 0;
                        var chkbox95 = 0;
                        var chkbox96 = 0;
                        var chkbox97 = 0;
                        var chkbox98 = 0;


                        var cm_order_sputum_sample = 0;

                        if ($("#chkbox1").prop('checked') == true) {
                            chkbox1 = 1;
                        }
                        if ($("#chkbox2").prop('checked') == true) {
                            chkbox2 = 1;
                        }
                        if ($("#chkbox3").prop('checked') == true) {
                            chkbox3 = 1;
                        }
                        if ($("#chkbox4").prop('checked') == true) {
                            chkbox4 = 1;
                        }
                        if ($("chkbox5").prop('checked') == true) {
                            chkbox5 = 1;
                        }
                        if ($("#chkbox6").prop('checked') == true) {
                            chkbox6 = 1;
                        }
                        if ($("#chkbox7").prop('checked') == true) {
                            chkbox7 = 1;
                        }
                        if ($("#chkbox8").prop('checked') == true) {
                            chkbox8 = 1;
                        }
                        if ($("#chkbox9").prop('checked') == true) {
                            chkbox9 = 1;
                        }
                        if ($("#chkbox10").prop('checked') == true) {
                            chkbox10 = 1;
                        }
                        if ($("#chkbox11").prop('checked') == true) {
                            chkbox11 = 1;
                        }
                        if ($("#chkbox12").prop('checked') == true) {
                            chkbox12 = 1;
                        }
                        if ($("#chkbox13").prop('checked') == true) {
                            chkbox13 = 1;
                        }
                        if ($("#chkbox14").prop('checked') == true) {
                            chkbox14 = 1;
                        }
                        if ($("#chkbox15").prop('checked') == true) {
                            chkbox15 = 1;
                        }
                        if ($("#chkbox16").prop('checked') == true) {
                            chkbox16 = 1;
                        }
                        if ($("#chkbox17").prop('checked') == true) {
                            chkbox17 = 1;
                        }
                        if ($("#chkbox18").prop('checked') == true) {
                            chkbox18 = 1;
                        }
                        if ($("#chkbox19").prop('checked') == true) {
                            chkbox19 = 1;
                        }
                        if ($("#chkbox20").prop('checked') == true) {
                            chkbox20 = 1;
                        }
                        if ($("#chkbox21").prop('checked') == true) {
                            chkbox21 = 1;
                        }
                        if ($("#chkbox22").prop('checked') == true) {
                            chkbox22 = 1;
                        }
                        if ($("#cm_order_sputum_sample").prop('checked') == true) {
                            cm_order_sputum_sample = 1;
                        }

                        if ($("#chkbox70").prop('checked') == true) {
                            chkbox70 = 1;
                        }
                        if ($("#chkbox71").prop('checked') == true) {
                            chkbox71 = 1;
                        }
                        if ($("#chkbox72").prop('checked') == true) {
                            chkbox72 = 1;
                        }
                        if ($("#chkbox73").prop('checked') == true) {
                            chkbox73 = 1;
                        }
                        if ($("#chkbox74").prop('checked') == true) {
                            chkbox74 = 1;
                        }
                        if ($("#chkbox75").prop('checked') == true) {
                            chkbox75 = 1;
                        }
                        if ($("#chkbox76").prop('checked') == true) {
                            chkbox76 = 1;
                        }
                        if ($("#chkbox77").prop('checked') == true) {
                            chkbox77 = 1;
                        }
                        if ($("#chkbox78").prop('checked') == true) {
                            chkbox78 = 1;
                        }
                        if ($("#chkbox79").prop('checked') == true) {
                            chkbox79 = 1;
                        }

                        if ($("#chkbox80").prop('checked') == true) {
                            chkbox80 = 1;
                        }
                        if ($("#chkbox81").prop('checked') == true) {
                            chkbox81 = 1;
                        }
                        if ($("#chkbox82").prop('checked') == true) {
                            chkbox82 = 1;
                        }
                        if ($("#chkbox83").prop('checked') == true) {
                            chkbox83 = 1;
                        }
                        if ($("#chkbox84").prop('checked') == true) {
                            chkbox84 = 1;
                        }
                        if ($("#chkbox85").prop('checked') == true) {
                            chkbox85 = 1;
                        }
                        if ($("#chkbox86").prop('checked') == true) {
                            chkbox86 = 1;
                        }
                        if ($("#chkbox87").prop('checked') == true) {
                            chkbox87 = 1;
                        }
                        if ($("#chkbox88").prop('checked') == true) {
                            chkbox88 = 1;
                        }
                        if ($("#chkbox89").prop('checked') == true) {
                            chkbox89 = 1;
                        }
                        if ($("#chkbox90").prop('checked') == true) {
                            chkbox90 = 1;
                        }
                        if ($("#chkbox91").prop('checked') == true) {
                            chkbox91 = 1;
                        }
                        if ($("#chkbox92").prop('checked') == true) {
                            chkbox92 = 1;
                        }
                        if ($("#chkbox93").prop('checked') == true) {
                            chkbox93 = 1;
                        }
                        if ($("#chkbox94").prop('checked') == true) {
                            chkbox94 = 1;
                        }
                        if ($("#chkbox95").prop('checked') == true) {
                            chkbox95 = 1;
                        }
                        if ($("#chkbox96").prop('checked') == true) {
                            chkbox96 = 1;
                        }
                        if ($("#chkbox97").prop('checked') == true) {
                            chkbox97 = 1;
                        }
                        if ($("#chkbox98").prop('checked') == true) {
                            chkbox98 = 1;
                        }


                        var appointment = $('#AppointmentNumber').val();

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

                        var imagePathTemp = '/FPConsultation-' + appointmentNo + '-' + objectName + '-' + today + '.bmp';


                        // ---------------------------------
                        if ($('#oldSpu').val() != "") {
                            var PP = $('#PassportNumber').val();
                            var AP = $('#registration_id').val();

                            $.ajax({
                                url: 'ConsultationLoadData',
                                type: 'post',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    PP: PP,
                                    AP: AP,
                                    command: 'SaveTempTbl'
                                },
                                success: function (data) {
                                }
                            });
                        }
                        // ---------------------------------

                        $.ajax({
                            url: 'ConsultationLoadData',
                            type: 'post',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                command: 'save',
                                buttonType: 'saveBtn',
                                imagePathTemp: imagePathTemp,
                                token: $('#currentTokenNo').text(),
                                appno: $('#AppointmentNumber').val(),
                                ppno: $('#PassportNumber').val(),
                                category: $('#drpCategory').val(),
                                cough: $('input[name=ty1]:checked').val(),
                                haemoptysis: $('input[name=ty2]:checked').val(),
                                nightsweats: $('input[name=ty3]:checked').val(),
                                weightloss: $('input[name=ty4]:checked').val(),
                                fever: $('input[name=ty5]:checked').val(),
                                chronicrespiratorydisease: $('input[name=tyr1]:checked').val(),
                                thoracic: $('input[name=tyr2]:checked').val(),
                                Cyanosis: $('input[name=tyr3]:checked').val(),
                                respiratoryinsufficient: $('input[name=tyr4]:checked').val(),
                                historytb: $('input[name=tyg1]:checked').val(),
                                householddiagnosedtb: $('input[name=tyg2]:checked').val(),
                                historyrecentcontact: $('input[name=tyg3]:checked').val(),
                                examsresults: $('#examsresults').val(),
                                CXRay: $('#CXRay').val(),
                                chkbox1: chkbox1,
                                chkbox2: chkbox2,
                                chkbox3: chkbox3,
                                chkbox4: chkbox4,
                                chkbox5: chkbox5,
                                chkbox6: chkbox6,
                                chkbox7: chkbox7,
                                chkbox8: chkbox8,
                                chkbox9: chkbox9,
                                chkbox10: chkbox10,
                                chkbox11: chkbox11,
                                chkbox12: chkbox12,
                                chkbox13: chkbox13,
                                chkbox14: chkbox14,
                                chkbox15: chkbox15,
                                chkbox16: chkbox16,
                                chkbox17: chkbox17,
                                chkbox18: chkbox18,
                                chkbox19: chkbox19,
                                chkbox20: chkbox20,
                                chkbox21: chkbox21,
                                chkbox22: chkbox22,

                                // ---------------
                                chkbox70: chkbox70,
                                chkbox71: chkbox71,
                                chkbox72: chkbox72,
                                chkbox73: chkbox73,
                                chkbox74: chkbox74,
                                chkbox75: chkbox75,
                                chkbox76: chkbox76,
                                chkbox77: chkbox77,
                                chkbox78: chkbox78,
                                chkbox79: chkbox79,
                                chkbox80: chkbox80,
                                chkbox81: chkbox81,
                                chkbox82: chkbox82,
                                chkbox83: chkbox83,
                                chkbox84: chkbox84,
                                chkbox85: chkbox85,
                                chkbox86: chkbox86,
                                chkbox87: chkbox87,
                                chkbox88: chkbox88,
                                chkbox89: chkbox89,
                                chkbox90: chkbox90,
                                chkbox91: chkbox91,
                                chkbox92: chkbox92,
                                chkbox93: chkbox93,
                                chkbox94: chkbox94,
                                chkbox95: chkbox95,
                                chkbox96: chkbox96,
                                chkbox97: chkbox97,
                                chkbox98: chkbox98,

                                // ----------------

                                cm_order_sputum_sample: cm_order_sputum_sample,
                                dppcomment: $('#cm_dpp_comment').val(),
                                day1: $('#cm_day1').val(),

                            },
                            success: function (data) {

                                Swal.fire({
                                    type: 'success',
                                    title: 'Data Saved Successfully!',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
                                });


                                // ==================================
                                $('#appbody  > tr.appNum').each(function () {

                                    if (appnox.trim() == $(this).text().trim()) {
                                        $(this).removeClass('clickedRow');
                                        $(this).removeClass('prevClicked');
                                        $(this).addClass('rowSaved');
                                    }
                                });
                                // ===========================================

                                $('#rapidTestResultsTBody tr').each(function () {

                                    var tr = $(this);
                                    var serial = tr.find('td:nth-child(1)').text();
                                    var comment = tr.find('td:nth-child(5)').find('input').val();

                                    $.ajax({
                                        url: 'ConsultationLoadData',
                                        type: 'post',
                                        dataType: 'json',
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data: {
                                            command: 'updateTestResults',
                                            serial: serial,
                                            comment: comment
                                        },
                                        success: function (data) {
                                        }
                                    });
                                });
                                clear();
                            },
                            complete: function () {

                                var appNo = $('#AppointmentNumber').val();

                                $.ajax({
                                    url: 'generateCard',
                                    type: 'post',
                                    dataType: 'json',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        appNo: appNo
                                    },
                                    success: function (data) {
                                    },
                                    complete: function (data) {
                                        // window.open(urlPath + '/generateCard?appNo=' + appNo);
                                    }
                                });
                                AppNum = '';
                            }
                        });
                    }

                });

            } else {
                Swal('Please Select Appointment No!', '', 'warning');
            }

        });

        // =========================================== Open Modal ==================================================

        $('#notyicon').on('click', function () {
            $('#listmodal').iziModal('open');
        });

        // =========================================================================================================

        $('#takephotobtn').on('click', function () {
            $('#ptomodal').iziModal('open');
        });

        // =========================================================================================================

        $('#takeBiometricsbtn').on('click', function () {
            $('#biomodal').iziModal('open');
        });

        // =========================================================================================================

        //print summary onclick
        $('#print').on('click', function () {
            if ($('#appbody tr').hasClass('clickedRow')) {
                var appNo = $('#AppointmentNumber').val();

                $.ajax({
                    url: 'SummaryReport',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        appNo: appNo
                    },
                    success: function (data) {
                    },
                    complete: function (data) {
                        window.open(urlPath + '/generateSummaryReport?appNo=' + appNo);
                    }
                });
            } else {
                Swal('Please Select Appointment No!', '', 'warning');
            }
        });

        // =========================================================================================================

        $('#printRadiologistReport').on('click', function () {

            var AppNo = $('#appbody .clickedRow td').text();

            window.open('/IOM/generatePdfRadiologistReporting?Appno=' + AppNo, '_blank');
        });

        //print certificate 1
        $('#printCertificate1').on('click', function () {

            if ($('#appbody tr').hasClass('clickedRow')) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Submit!'
                }).then((result) => {

                    //Save Code
                    if (result.value) {
                        var appnox = AppNum;

                        var chkbox1 = 0;
                        var chkbox2 = 0;
                        var chkbox3 = 0;
                        var chkbox4 = 0;
                        var chkbox5 = 0;
                        var chkbox6 = 0;
                        var chkbox7 = 0;
                        var chkbox8 = 0;
                        var chkbox9 = 0;
                        var chkbox10 = 0;
                        var chkbox11 = 0;
                        var chkbox12 = 0;
                        var chkbox13 = 0;
                        var chkbox14 = 0;
                        var chkbox15 = 0;
                        var chkbox16 = 0;
                        var chkbox17 = 0;
                        var chkbox18 = 0;
                        var chkbox19 = 0;
                        var chkbox20 = 0;
                        var chkbox21 = 0;
                        var chkbox22 = 0;


                        var chkbox70 = 0;
                        var chkbox71 = 0;
                        var chkbox72 = 0;
                        var chkbox73 = 0;
                        var chkbox74 = 0;
                        var chkbox75 = 0;
                        var chkbox76 = 0;
                        var chkbox77 = 0;
                        var chkbox78 = 0;
                        var chkbox79 = 0;
                        var chkbox80 = 0;
                        var chkbox81 = 0;
                        var chkbox82 = 0;
                        var chkbox83 = 0;

                        var chkbox84 = 0;
                        var chkbox85 = 0;
                        var chkbox86 = 0;
                        var chkbox87 = 0;
                        var chkbox88 = 0;
                        var chkbox89 = 0;
                        var chkbox90 = 0;

                        var chkbox91 = 0;
                        var chkbox92 = 0;
                        var chkbox93 = 0;
                        var chkbox94 = 0;
                        var chkbox95 = 0;
                        var chkbox96 = 0;
                        var chkbox97 = 0;
                        var chkbox98 = 0;

                        var cm_order_sputum_sample = 0;

                        if ($("#chkbox1").prop('checked') == true) {
                            chkbox1 = 1;
                        }
                        if ($("#chkbox2").prop('checked') == true) {
                            chkbox2 = 1;
                        }
                        if ($("#chkbox3").prop('checked') == true) {
                            chkbox3 = 1;
                        }
                        if ($("#chkbox4").prop('checked') == true) {
                            chkbox4 = 1;
                        }
                        if ($("chkbox5").prop('checked') == true) {
                            chkbox5 = 1;
                        }
                        if ($("#chkbox6").prop('checked') == true) {
                            chkbox6 = 1;
                        }
                        if ($("#chkbox7").prop('checked') == true) {
                            chkbox7 = 1;
                        }
                        if ($("#chkbox8").prop('checked') == true) {
                            chkbox8 = 1;
                        }
                        if ($("#chkbox9").prop('checked') == true) {
                            chkbox9 = 1;
                        }
                        if ($("#chkbox10").prop('checked') == true) {
                            chkbox10 = 1;
                        }
                        if ($("#chkbox11").prop('checked') == true) {
                            chkbox11 = 1;
                        }
                        if ($("#chkbox12").prop('checked') == true) {
                            chkbox12 = 1;
                        }
                        if ($("#chkbox13").prop('checked') == true) {
                            chkbox13 = 1;
                        }
                        if ($("#chkbox14").prop('checked') == true) {
                            chkbox14 = 1;
                        }
                        if ($("#chkbox15").prop('checked') == true) {
                            chkbox15 = 1;
                        }
                        if ($("#chkbox16").prop('checked') == true) {
                            chkbox16 = 1;
                        }
                        if ($("#chkbox17").prop('checked') == true) {
                            chkbox17 = 1;
                        }
                        if ($("#chkbox18").prop('checked') == true) {
                            chkbox18 = 1;
                        }
                        if ($("#chkbox19").prop('checked') == true) {
                            chkbox19 = 1;
                        }
                        if ($("#chkbox20").prop('checked') == true) {
                            chkbox20 = 1;
                        }
                        if ($("#chkbox21").prop('checked') == true) {
                            chkbox21 = 1;
                        }
                        if ($("#chkbox22").prop('checked') == true) {
                            chkbox22 = 1;
                        }
                        if ($("#cm_order_sputum_sample").prop('checked') == true) {
                            cm_order_sputum_sample = 1;
                        }

                        if ($("#chkbox70").prop('checked') == true) {
                            chkbox70 = 1;
                        }
                        if ($("#chkbox71").prop('checked') == true) {
                            chkbox71 = 1;
                        }
                        if ($("#chkbox72").prop('checked') == true) {
                            chkbox72 = 1;
                        }
                        if ($("#chkbox73").prop('checked') == true) {
                            chkbox73 = 1;
                        }
                        if ($("#chkbox74").prop('checked') == true) {
                            chkbox74 = 1;
                        }
                        if ($("#chkbox75").prop('checked') == true) {
                            chkbox75 = 1;
                        }
                        if ($("#chkbox76").prop('checked') == true) {
                            chkbox76 = 1;
                        }
                        if ($("#chkbox77").prop('checked') == true) {
                            chkbox77 = 1;
                        }
                        if ($("#chkbox78").prop('checked') == true) {
                            chkbox78 = 1;
                        }
                        if ($("#chkbox79").prop('checked') == true) {
                            chkbox79 = 1;
                        }

                        if ($("#chkbox80").prop('checked') == true) {
                            chkbox80 = 1;
                        }
                        if ($("#chkbox81").prop('checked') == true) {
                            chkbox81 = 1;
                        }
                        if ($("#chkbox82").prop('checked') == true) {
                            chkbox82 = 1;
                        }
                        if ($("#chkbox83").prop('checked') == true) {
                            chkbox83 = 1;
                        }
                        if ($("#chkbox84").prop('checked') == true) {
                            chkbox84 = 1;
                        }
                        if ($("#chkbox85").prop('checked') == true) {
                            chkbox85 = 1;
                        }
                        if ($("#chkbox86").prop('checked') == true) {
                            chkbox86 = 1;
                        }
                        if ($("#chkbox87").prop('checked') == true) {
                            chkbox87 = 1;
                        }
                        if ($("#chkbox88").prop('checked') == true) {
                            chkbox88 = 1;
                        }
                        if ($("#chkbox89").prop('checked') == true) {
                            chkbox89 = 1;
                        }
                        if ($("#chkbox90").prop('checked') == true) {
                            chkbox90 = 1;
                        }
                        if ($("#chkbox91").prop('checked') == true) {
                            chkbox91 = 1;
                        }
                        if ($("#chkbox92").prop('checked') == true) {
                            chkbox92 = 1;
                        }
                        if ($("#chkbox93").prop('checked') == true) {
                            chkbox93 = 1;
                        }
                        if ($("#chkbox94").prop('checked') == true) {
                            chkbox94 = 1;
                        }
                        if ($("#chkbox95").prop('checked') == true) {
                            chkbox95 = 1;
                        }
                        if ($("#chkbox96").prop('checked') == true) {
                            chkbox96 = 1;
                        }
                        if ($("#chkbox97").prop('checked') == true) {
                            chkbox97 = 1;
                        }
                        if ($("#chkbox98").prop('checked') == true) {
                            chkbox98 = 1;
                        }

                        var appointment = $('#AppointmentNumber').val();

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

                        var imagePathTemp = '/FPConsultation-' + appointmentNo + '-' + objectName + '-' + today + '.bmp';


                        // ---------------------------------
                        if ($('#oldSpu').val() != "") {
                            var PP = $('#PassportNumber').val();
                            var AP = $('#registration_id').val();

                            $.ajax({
                                url: 'ConsultationLoadData',
                                type: 'post',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    PP: PP,
                                    AP: AP,
                                    command: 'SaveTempTbl'
                                },
                                success: function (data) {
                                }
                            });
                        }
                        // ---------------------------------

                        $.ajax({
                            url: 'ConsultationLoadData',
                            type: 'post',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                command: 'save',
                                buttonType: 'Print1Btn',
                                imagePathTemp: imagePathTemp,
                                token: $('#currentTokenNo').text(),
                                appno: $('#AppointmentNumber').val(),
                                ppno: $('#PassportNumber').val(),
                                category: $('#drpCategory').val(),
                                cough: $('input[name=ty1]:checked').val(),
                                haemoptysis: $('input[name=ty2]:checked').val(),
                                nightsweats: $('input[name=ty3]:checked').val(),
                                weightloss: $('input[name=ty4]:checked').val(),
                                fever: $('input[name=ty5]:checked').val(),
                                chronicrespiratorydisease: $('input[name=tyr1]:checked').val(),
                                thoracic: $('input[name=tyr2]:checked').val(),
                                Cyanosis: $('input[name=tyr3]:checked').val(),
                                respiratoryinsufficient: $('input[name=tyr4]:checked').val(),
                                historytb: $('input[name=tyg1]:checked').val(),
                                householddiagnosedtb: $('input[name=tyg2]:checked').val(),
                                historyrecentcontact: $('input[name=tyg3]:checked').val(),
                                examsresults: $('#examsresults').val(),
                                CXRay: $('#CXRay').val(),
                                chkbox1: chkbox1,
                                chkbox2: chkbox2,
                                chkbox3: chkbox3,
                                chkbox4: chkbox4,
                                chkbox5: chkbox5,
                                chkbox6: chkbox6,
                                chkbox7: chkbox7,
                                chkbox8: chkbox8,
                                chkbox9: chkbox9,
                                chkbox10: chkbox10,
                                chkbox11: chkbox11,
                                chkbox12: chkbox12,
                                chkbox13: chkbox13,
                                chkbox14: chkbox14,
                                chkbox15: chkbox15,
                                chkbox16: chkbox16,
                                chkbox17: chkbox17,
                                chkbox18: chkbox18,
                                chkbox19: chkbox19,
                                chkbox20: chkbox20,
                                chkbox21: chkbox21,
                                chkbox22: chkbox22,

                                // ---------------
                                chkbox70: chkbox70,
                                chkbox71: chkbox71,
                                chkbox72: chkbox72,
                                chkbox73: chkbox73,
                                chkbox74: chkbox74,
                                chkbox75: chkbox75,
                                chkbox76: chkbox76,
                                chkbox77: chkbox77,
                                chkbox78: chkbox78,
                                chkbox79: chkbox79,
                                chkbox80: chkbox80,
                                chkbox81: chkbox81,
                                chkbox82: chkbox82,
                                chkbox83: chkbox83,
                                chkbox84: chkbox84,
                                chkbox85: chkbox85,
                                chkbox86: chkbox86,
                                chkbox87: chkbox87,
                                chkbox88: chkbox88,
                                chkbox89: chkbox89,
                                chkbox90: chkbox90,
                                chkbox91: chkbox91,
                                chkbox92: chkbox92,
                                chkbox93: chkbox93,
                                chkbox94: chkbox94,
                                chkbox95: chkbox95,
                                chkbox96: chkbox96,
                                chkbox97: chkbox97,
                                chkbox98: chkbox98,

                                // ----------------

                                cm_order_sputum_sample: cm_order_sputum_sample,
                                dppcomment: $('#cm_dpp_comment').val(),
                                day1: $('#cm_day1').val(),

                            },
                            success: function (data) {

                                // ==================================

                                // ===========================================

                                $('#rapidTestResultsTBody tr').each(function () {

                                    var tr = $(this);
                                    var serial = tr.find('td:nth-child(1)').text();
                                    var comment = tr.find('td:nth-child(5)').find('input').val();

                                    $.ajax({
                                        url: 'ConsultationLoadData',
                                        type: 'post',
                                        dataType: 'json',
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        data: {
                                            command: 'updateTestResults',
                                            serial: serial,
                                            comment: comment
                                        },
                                        success: function (data) {
                                        }
                                    });
                                });

                            }, complete: function () {

                                var appNo = $('#AppointmentNumber').val();
                                var CXRtyp = $('#CXRay').val();

                                var RE = "";
                                if (CXRtyp == "Normal") {
                                    RE = "NO";
                                } else if (CXRtyp == "Abnormal") {
                                    RE = "AB";
                                }

                                $.ajax({
                                    url: 'generateCertificate',
                                    type: 'post',
                                    dataType: 'json',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        appNo: appNo
                                    },
                                    success: function (data) {
                                    },
                                    complete: function (data) {
                                        window.open(urlPath + '/generateCertificate?appNo=' + appNo);
                                    }
                                });
                            }
                        });
                    }

                });

            } else {
                Swal('Please Select Appointment No!', '', 'warning');
            }


            if ($('#appbody tr').hasClass('clickedRow')) {


            } else {
                Swal('Please Select Appointment No!', '', 'warning');
            }


        });

        //print certificate 2
        $('#printCertificate2').on('click', function () {
            if ($('#appbody tr').hasClass('clickedRow')) {

                var appNo = $('#AppointmentNumber').val();
                var CXRtyp = $('#CXRay').val();

                var RE = "";
                if (CXRtyp == "Normal") {
                    RE = "NO";
                } else if (CXRtyp == "Abnormal") {
                    RE = "AB";
                }

                window.open(urlPath + '/generateCertificate2?appNo=' + appNo + '&TR=' + RE);

            } else {
                Swal('Please Select Appointment No!', '', 'warning');
            }
        });


        // =========================================================================================================

        function getPendingTokens() {
            $.ajax({
                url: 'ConsultationLoadData',
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

        // =========================================================================================================

        function getRecallListTokens() {

            $.ajax({
                url: 'ConsultationLoadData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    command: 'recallListCount'
                },
                success: function (data) {
                    $('#callAgainTokens').text("");
                    $('#callAgainTokens').text(data.result);
                }
            });
        }

        // =========================================================================================================

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
        }, 30000);

        // =========================================================================================================

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
        }, 60000);

        // =========================================================================================================

        $('#biometricAuth').on('click', function () {

            $('#biometricVerification').iziModal('open');
        });

        // =========================================================================================================

        $('#flatLeftThumbVerify').on('click', function () {

            var appointmentNo = $('#AppointmentNumber').val();

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

        // =========================================================================================================

        $('#flatRightThumbVerify').on('click', function () {

            var appointmentNo = $('#AppointmentNumber').val();

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

        // =========================================================================================================

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
                    var appointmentNo = $('#AppointmentNumber').val();
                    var objectName = data[0].ObjectName;

                    $.ajax({
                        url: 'ConsultationLoadData',
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

                                var imagePathTemp = fingerPrintPath + '/tempFingerPrint/FPConsultation-' + appointmentNo + '-' + objectName + '-' + today + '.bmp#' + new Date().getTime();

                                $('#loadImageSavedVeriCurrent').html("<img src=\"" + imagePathTemp + "\" class=\"img-fluid\" alt=\"\" style=\"height: 275.6px;\">");


                                $('#verAppNoVe').text(appointmentNo);
                                $('#fingerNameVe').text(objectName);
                            }
                        }, complete: function () {

                            const urlOrg = "/FingerPrintData/" + appointmentNo + "-" + today + "/FP-" + appointmentNo + "-" + objectName + "-" + today + ".bmp";
                            const urlTemp = '/tempFingerPrint/FPConsultation-' + appointmentNo + '-' + objectName + '-' + today + '.bmp';

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
                                        $('#save').show();
                                        // $('#Tempsave').show();
                                    } else if (data.toString() == "Finger Print Not Verified") {

                                        $('#responseText').html('<h2 class="text-center" style="text-align: center;color: #da5d43;font-weight: bold;font-size: 2rem;">' + data + '</h2>');
                                        $('#statVerification').text(data).removeClass('badge-warning badge-success').addClass('badge-danger');
                                        // $('#save').hide();
                                        // $('#Tempsave').show();
                                    }
                                }, complete: function () {

                                    $('#veriOk').show();
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

        // =========================================================================================================

        $('#veriOk').on('click', function () {

            $('#biometricVerification').iziModal('close');
        });

        // =========================================================================================================

    } else {

        Swal(
            'You don\'t have Permission!',
            'Please use Consultation Counter 1 - 4 logins.',
            'warning'
        );
    }

    // =====================================================================================

    function clear() {
        $('#registration_id').val("");
        $('#NameInFull').val("");
        $('#AppointmentDate').val("");
        $('#PassportNumber').val("");
        $('#PreviousPassportIfAny').val("");
        $('#CdCountry').val("");
        $('#CdCity').val("");
        $('#cm_dpp_comment').val("");
        $('#cm_day1').val("");
        $('#rapidTestResultsTBody').html("");

        $('#regNoAFC').val("");
        $('#passNoAFC').val("");
        $('#refferdAFC').val("");
        $('#regNoNSACP').val("");
        $('#passNoNSACP').val("");
        $('#referedNSACP').val("");
        $('#remarkNSACP').val("");

        $('#passNoM').val("");
        $('#referedM').val("");
        $('#testResM').val("");
        $('#commentM').val("");
        $('#remarkM').val("");
        $('#passNoTB').val("");
        $('#testResTB').val("");
        $('#commentTB').val("");
        $('#remarkTB').val("");
        $('#DoctorName').val("");
        $('#institute').val("");
        $('#remarkOther').val("");

        $('#ERcomment').val("");
        $('#DOCcomment').val("");

        $('#cm_order_sputum_sample').prop('checked', false).uniform('refresh');
        $('.chk').prop('checked', false).uniform('refresh');
        $('input[type="radio"]').prop('checked', false).uniform('refresh');

    }

    function loadCheckBox(AppNO) {
        var AppNO = AppNO;

        $.ajax({
            url: 'ConsultationLoadChkbox',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            async: false,
            data: {
                AppNo: AppNO
            },
            success: function (data) {
                $(data.result).each(function (key, val) {
                    if (val.rr_single_fibrous_streak == 1) {
                        $('#rchkbox1').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_bony_islets == 1) {
                        $('#rchkbox2').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_pleural_capping == 1) {
                        $('#rchkbox3').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_unilateral_bilateral == 1) {
                        $('#rchkbox4').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_calcified_nodule == 1) {
                        $('#rchkbox5').prop('checked', true).uniform('refresh');
                    }

                    if (val.rr_solitary_granuloma_hilum == 1) {
                        $('#rchkbox6').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_solitary_granuloma_enlarged == 1) {
                        $('#rchkbox7').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_single_multi_calc_pulmonary == 1) {
                        $('#rchkbox8').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_calcified_pleural_lesions == 1) {
                        $('#rchkbox9').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_costophrenic_angle == 1) {
                        $('#rchkbox10').prop('checked', true).uniform('refresh');
                    }

                    if (val.rr_notable_apical == 1) {
                        $('#rchkbox11').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_aplcal_fbronodualar == 1) {
                        $('#rchkbox12').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_multi_single_pulmonary_nodu_micronodules == 1) {
                        $('#rchkbox13').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_isolated_hilar == 1) {
                        $('#rchkbox14').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_multi_single_pulmonary_nodu_masses == 1) {
                        $('#rchkbox15').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_non_calcified_pleural_fibrosos == 1) {
                        $('#rchkbox16').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_interstltial_fbrosos == 1) {
                        $('#rchkbox17').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_any_cavitating_lesion == 1) {
                        $('#rchkbox18').prop('checked', true).uniform('refresh');
                    }

                    if (val.rr_skeleton_soft_issue == 1) {
                        $('#rchkbox19').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_cardiac_major_vessels == 1) {
                        $('#rchkbox20').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_lung_fields == 1) {
                        $('#rchkbox21').prop('checked', true).uniform('refresh');
                    }
                    if (val.rr_other == 1) {
                        $('#rchkbox22').prop('checked', true).uniform('refresh');
                    }
                });

                $(data.result2).each(function (key, val) {

                    $('#drpCategory').val(val.category);
                    var ty1 = val.cm_cough;
                    $('input[name="ty1"]').prop('checked', false).uniform('refresh');
                    $('input[name="ty1"][value=' + ty1 + ']').prop('checked', true).uniform('refresh');
                    // ================================================================
                    var ty2 = val.cm_haemoptysis;
                    $('input[name="ty2"]').prop('checked', false).uniform('refresh');
                    $('input[name="ty2"][value=' + ty2 + ']').prop('checked', true).uniform('refresh');
                    // ================================================================
                    var ty3 = val.cm_night_sweats;
                    $('input[name="ty3"]').prop('checked', false).uniform('refresh');
                    $('input[name="ty3"][value=' + ty3 + ']').prop('checked', true).uniform('refresh');
                    // ================================================================
                    var ty4 = val.cm_weight_loss;
                    $('input[name="ty4"]').prop('checked', false).uniform('refresh');
                    $('input[name="ty4"][value=' + ty4 + ']').prop('checked', true).uniform('refresh');
                    // ================================================================
                    var ty5 = val.cm_fever;
                    $('input[name="ty5"]').prop('checked', false).uniform('refresh');
                    $('input[name="ty5"][value=' + ty5 + ']').prop('checked', true).uniform('refresh');
                    // ================================================================
                    var tyr1 = val.cm_any;
                    $('input[name="tyr1"]').prop('checked', false).uniform('refresh');
                    $('input[name="tyr1"][value=' + tyr1 + ']').prop('checked', true).uniform('refresh');
                    // ================================================================
                    var tyr2 = val.cm_prev_thor_surgery;
                    $('input[name="tyr2"]').prop('checked', false).uniform('refresh');
                    $('input[name="tyr2"][value=' + tyr2 + ']').prop('checked', true).uniform('refresh');
                    // ================================================================
                    var tyr3 = val.cm_cyanosis;
                    $('input[name="tyr3"]').prop('checked', false).uniform('refresh');
                    $('input[name="tyr3"][value=' + tyr3 + ']').prop('checked', true).uniform('refresh');
                    // ================================================================
                    var tyr4 = val.cm_resp_insufficient;
                    $('input[name="tyr4"]').prop('checked', false).uniform('refresh');
                    $('input[name="tyr4"][value=' + tyr4 + ']').prop('checked', true).uniform('refresh');
                    // ================================================================
                    var tyg1 = val.cm_history_tb;
                    $('input[name="tyg1"]').prop('checked', false).uniform('refresh');
                    $('input[name="tyg1"][value=' + tyg1 + ']').prop('checked', true).uniform('refresh');
                    // ================================================================
                    var tyg2 = val.cm_household_tb;
                    $('input[name="tyg2"]').prop('checked', false).uniform('refresh');
                    $('input[name="tyg2"][value=' + tyg2 + ']').prop('checked', true).uniform('refresh');
                    // ================================================================
                    var tyg3 = val.cm_active_tb;
                    $('input[name="tyg3"]').prop('checked', false).uniform('refresh');
                    $('input[name="tyg3"][value=' + tyg3 + ']').prop('checked', true).uniform('refresh');
                    // ================================================================
                    var cm_exams_results = val.cm_exams_results;
                    $('#examsresults').val(cm_exams_results);


                    if (val.cm_single_fibrous_streak == 1) {
                        $('#chkbox1').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_bony_islets == 1) {
                        $('#chkbox2').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_pleural_capping == 1) {
                        $('#chkbox3').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_unilateral_bilateral == 1) {
                        $('#chkbox4').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_calcified_nodule == 1) {
                        $('#chkbox5').prop('checked', true).uniform('refresh');
                    }

                    if (val.cm_solitary_granuloma_hilum == 1) {
                        $('#chkbox6').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_solitary_granuloma_enlarged == 1) {
                        $('#chkbox7').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_single_multi_calc_pulmonary == 1) {
                        $('#chkbox8').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_calcified_pleural_lesions == 1) {
                        $('#chkbox9').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_costophrenic_angle == 1) {
                        $('#chkbox10').prop('checked', true).uniform('refresh');
                    }

                    if (val.cm_notable_apical == 1) {
                        $('#chkbox11').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_aplcal_fbronodualar == 1) {
                        $('#chkbox12').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_multi_single_pulmonary_nodu_micronodules == 1) {
                        $('#chkbox13').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_isolated_hilar == 1) {
                        $('#chkbox14').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_multi_single_pulmonary_nodu_masses == 1) {
                        $('#chkbox15').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_non_calcified_pleural_fibrosos == 1) {
                        $('#chkbox16').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_interstltial_fbrosos == 1) {
                        $('#chkbox17').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_any_cavitating_lesion == 1) {
                        $('#chkbox18').prop('checked', true).uniform('refresh');
                    }

                    if (val.cm_skeleton_soft_issue == 1) {
                        $('#chkbox19').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_cardiac_major_vessels == 1) {
                        $('#chkbox20').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_lung_fields == 1) {
                        $('#chkbox21').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_other == 1) {
                        $('#chkbox22').prop('checked', true).uniform('refresh');
                    }
                    $('#cm_dpp_comment').val(val.cm_dpp_comment);
                    $('#CXRay').val(val.cm_cxray);
                    // -----------------------------------------------------
                    if (val.cm_hiv_1 == 1) {
                        $('#chkbox70').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_hiv_2 == 1) {
                        $('#chkbox71').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_hiv_3 == 1) {
                        $('#chkbox72').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_hiv_4_1 == 1) {
                        $('#chkbox73').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_hiv_4_2 == 1) {
                        $('#chkbox74').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_hiv_5_0 == 1) {
                        $('#chkbox75').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_hiv_5_1 == 1) {
                        $('#chkbox76').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_hiv_6 == 1) {
                        $('#chkbox77').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_hiv_7 == 1) {
                        $('#chkbox78').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_hiv_8 == 1) {
                        $('#chkbox79').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_hiv_9_0 == 1) {
                        $('#chkbox80').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_hiv_9_1 == 1) {
                        $('#chkbox81').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_hiv_10 == 1) {
                        $('#chkbox82').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_hiv_11 == 1) {
                        $('#chkbox83').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_hiv_12 == 1) {
                        $('#chkbox84').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_hiv_13 == 1) {
                        $('#chkbox85').prop('checked', true).uniform('refresh');
                    }


                    if (val.cm_Malaria_14 == 1) {
                        $('#rchkbox86').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_Malaria_15 == 1) {
                        $('#rchkbox87').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_Malaria_16 == 1) {
                        $('#rchkbox88').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_Malaria_17 == 1) {
                        $('#rchkbox89').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_Malaria_18 == 1) {
                        $('#rchkbox90').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_Malaria_19 == 1) {
                        $('#rchkbox91').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_Malaria_20 == 1) {
                        $('#chkbox92').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_Filaria_21 == 1) {
                        $('#chkbox93').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_Filaria_22 == 1) {
                        $('#chkbox94').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_Filaria_23 == 1) {
                        $('#chkbox95').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_Filaria_24 == 1) {
                        $('#chkbox96').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_Filaria_25 == 1) {
                        $('#chkbox97').prop('checked', true).uniform('refresh');
                    }
                    if (val.cm_Filaria_26 == 1) {
                        $('#chkbox98').prop('checked', true).uniform('refresh');
                    }


                });
            }
        });
    }

    $('#btnVerify').on('click', function () {

        var PP = $('#txtPassportNo').val();
        var AP = $('#txtAppointmentNo').val();

        $.ajax({
            url: 'ConsultationLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                PP: PP,
                AP: AP,
                command: 'LoadSputumPatient'
            },
            success: function (data) {


                var html = "";
                var co = 0;
                $(data.appnos).each(function (k, val) {
                    var name = val.FirstName + " " + val.LastName;
                    co++;
                    html += "<tr class='trclick'>";
                    html += "<td style='display: none;'>" + val + "</td>";
                    html += "<td>" + co + "</td>";
                    html += "<td>" + val.AppointmentNumber + "</td>";
                    html += "<td>" + name + "</td>";
                    html += "<td>" + new Date(val.createddate).toISOString().split("T")[0] + "</td>";
                    html += "</tr>";
                });

                $('#verifyStatTable').html("");
                $('#verifyStatTable').html(html);


            }, complete: function () {
            }
        });

    });

    $(document).on('click', "tr.trclick", function () {

        $('#appbody').html("");


        var tr = $(this);
        var appnos = tr.find('td:nth-child(3)').text();

        $('#appbody').append('<tr class="appNum"> <td>' + appnos + '</td> </tr>');


        $("#clearingID").show();
        $('#noshow3').iziModal('close');

        $('#save').show();

        $('#oldSpu').val("YES");
        $('#txtPassportNo').val("");
        $('#txtAppointmentNo').val("");
        $('#verifyStatTable').html("");
    });

    $("#txtPassportNo").on("keyup", function (event) {
        $('#txtAppointmentNo').val("");
    });

    $("#txtAppointmentNo").on("keyup", function (event) {
        $('#txtPassportNo').val("");
    });

    $(".btnPrintRefLetter").on('click', function () {
        window.open(urlPath + '/generateReferralReport?appNo=' + AppNum);
    });

    $(".btnPrintRefLetterTb").on('click', function () {
        window.open(urlPath + '/generateReferralReport?appNo=' + AppNum);
        window.open(urlPath + '/generateOtherReferralReport?appNo=' + AppNum);
    });

    $(".btnPrintOtherRefLetter").on('click', function () {
        window.open(urlPath + '/generateOtherReferralReport?appNo=' + AppNum);
    });

    $(".btnPrintSystemLabRequest").on('click', function () {
        window.open(urlPath + '/generateSystemLabRequest?appNo=' + AppNum);
    });

    $('#btnUpdateComment').on('click', function () {
        var appointmentNo = $('#appbody tr.clickedRow td').text();
        var comment = $('#cm_dpp_comment').val();

        $.ajax({
            url: 'UpdateCommentConsultation',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                appno: appointmentNo,
                comment: comment
            },
            success: function (data) {
                swal({
                    title: "Updated Successfully!",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'OK!'
                });
            }
        });
    });

});
