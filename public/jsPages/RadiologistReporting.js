$.noConflict();

$(document).ready(function () {


    var sketchpad = Raphael.sketchpad("editor", {
        width: '100%',
        height: 500,
        editing: true
    });

    sketchpad.change(function () {
        $("#txtdata").val(sketchpad.json());
    });

    function loadImage() {
        sketchpad.json($('#txtdata').val());
    }

    sketchpad.pen().width(2);
    sketchpad.pen().color('#ff0000');

    $('#clearimg').on('click', function () {
        sketchpad.clear();
        $('#txtdata').val("");
    });

    //==============================================================================
    loadRegisterAndPassport();

    function loadRegisterAndPassport() {

        var appno = location.href.split('?appNo=')[1];
        $('#registration_no').val(appno);
        $.ajax({
            url: 'RadiologistReportingLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                appno: appno,
                command: 'loadPassportNo'
            },
            success: function (data) {
                $('#passport_no').val(data.result.temp_passport);
                $('#Name').val(data.result.FirstName + " " + data.result.LastName);
                $('#birthDay').val(data.result.DateOfBirth);
                $('#Gen').val(data.result.Gender);
                $('#rr_comment1').val(data.result.rad_rep_comment);
            }
        });
    }

    /////////////////////////////////////
    loadDataToCOM();

    function loadDataToCOM() {
        var appno = localStorage.getItem('appNoCOM');

        if (appno) {
            $('#registration_no').val(appno);
            $('#reqaddiview').hide();

            $.ajax({
                url: 'RadiologistReportingLoadData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    appno: appno,
                    command: 'loadCompleteData'
                },
                success: function (data) {
                    $('#passport_no').val(data.result.temp_passport);
                    $('#Name').val(data.result.FirstName + " " + data.result.LastName);
                    $('#birthDay').val(data.result.DateOfBirth);
                    $('#Gen').val(data.result.Gender);
                    $('#hiddenSerial').val(data.result.rr_id);
                    if (data.result.rr_single_fibrous_streak == 1) {
                        $('#chkbox1').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox1').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_bony_islets == 1) {
                        $('#chkbox2').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox2').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_pleural_capping == 1) {
                        $('#chkbox3').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox3').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_unilateral_bilateral == 1) {
                        $('#chkbox4').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox4').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_calcified_nodule == 1) {
                        $('#chkbox5').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox5').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_solitary_granuloma_hilum == 1) {
                        $('#chkbox6').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox6').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_solitary_granuloma_enlarged == 1) {
                        $('#chkbox7').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox7').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_single_multi_calc_pulmonary == 1) {
                        $('#chkbox8').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox8').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_calcified_pleural_lesions == 1) {
                        $('#chkbox9').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox9').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_costophrenic_angle == 1) {
                        $('#chkbox10').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox10').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_notable_apical == 1) {
                        $('#chkbox11').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox11').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_aplcal_fbronodualar == 1) {
                        $('#chkbox12').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox12').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_multi_single_pulmonary_nodu_micronodules == 1) {
                        $('#chkbox13').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox13').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_isolated_hilar == 1) {
                        $('#chkbox14').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox14').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_multi_single_pulmonary_nodu_masses == 1) {
                        $('#chkbox15').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox15').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_non_calcified_pleural_fibrosos == 1) {
                        $('#chkbox16').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox16').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_interstltial_fbrosos == 1) {
                        $('#chkbox17').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox17').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_any_cavitating_lesion == 1) {
                        $('#chkbox18').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox18').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_skeleton_soft_issue == 1) {
                        $('#chkbox19').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox19').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_cardiac_major_vessels == 1) {
                        $('#chkbox20').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox20').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_lung_fields == 1) {
                        $('#chkbox21').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox21').prop('checked', false).uniform('refresh');
                    }

                    if (data.result.rr_other == 1) {
                        $('#chkbox22').prop('checked', true).uniform('refresh');
                    } else {
                        $('#chkbox22').prop('checked', false).uniform('refresh');
                    }

                    $('#rr_comment1').val(data.result.rr_comment1);
                    $('#rr_comment2').val(data.result.rr_comment2);
                }
            });
        }
    }

    //================================= Calling the next token number ==============
    //==============================================================================

    $('#next').on('click', function () {
        // alert("hello");
        $.ajax({
            url: 'RadiologistReportingLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'next'
            },
            success: function (data) {
                $('h1').text(data);
                $.ajax({
                    url: 'RadiologistReportingLoadData',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: {
                        command: 'next'
                    },
                    success: function (data) {
                        $('#registration_no').val(data['temp_app_no']);
                        $('#passport_no').val(data['temp_passport']);
                    },
                    error: function (data) {
                        alert(JSON.stringify(data));
                    }
                });
            },
            error: function (data) {
                alert(JSON.stringify(data));
            }
        });
    });


    //============================ Save Data ======================================
    //==============================================================================
    //==============================================================================
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
                if ($("#chkbox5").prop('checked') == true) {
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

                var status = $('#reqaddiview').attr('attr-vl');
                var AppNo = $('#registration_no').val();

                var serial = $('#hiddenSerial').val();

                if (serial == '') {
                    $.ajax({
                        url: 'RadiologistReportingLoadData',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            command: 'save',
                            appno: $('#registration_no').val(),
                            ppno: $('#passport_no').val(),
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
                            rr_comment1: $('#rr_comment1').val(),
                            rr_comment2: $('#rr_comment2').val(),
                            txtdata: $('#txtdata').val(),
                            status: status,
                        },
                        success: function (data) {
                            swal({
                                title: "Saved Successfully!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: 'btn-success',
                                confirmButtonText: 'OK!'

                            });

                            window.open(urlPath + '/generatePdfRadiologistReporting?Appno=' + AppNo);                            
                            AppNo = "";
                        }
                    });
                } else {
                    $.ajax({
                        url: 'RadiologistReportingLoadData',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            command: 'update',
                            serial: serial,
                            appno: $('#registration_no').val(),
                            ppno: $('#passport_no').val(),
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
                            rr_comment1: $('#rr_comment1').val(),
                            rr_comment2: $('#rr_comment2').val()
                        },
                        success: function (data) {
                            swal({
                                title: "Updated Successfully!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: 'btn-success',
                                confirmButtonText: 'OK!'
                            });
                            window.open(urlPath + '/generatePdfRadiologistReporting?Appno=' + AppNo);
                            AppNo = "";
                            localStorage.removeItem('appNoCOM');
                        }
                    });
                }
            }
        });
    });

    //reqaddiview
    $('#reqaddiview').on('click', function () {

        $.ajax({
            url: 'RadiologistReportingLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'RadiRepo',
                appno: $('#registration_no').val(),
                comment1:$('#rr_comment1').val()
            },
            success: function (data) {
                $('#reqaddiview').attr('attr-vl', 'ReqOK');
                $('#save').hide();
                swal({
                    title: "Request Successfully!",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'OK!'
                });
            }
        });
    });

});
