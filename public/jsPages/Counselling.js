var arr = [];
var finalArray = [];
var tokenArr = [];
var comArr = [];
var aaa = false;
$('#ok').show();
if (usergroup == 8 || usergroup == 9) {

    if (!(isOn())) {

        Swal('Counter Not Open. Please Enable!', '', 'error');

    } else {

        $(document).on('click', "img.token-img", function () {

            $(".dataPanelToggle").show();
            $(".showBioVerify").hide();
            //$("#ok").hide();
            $(".showFingerVeriPanel").hide();
            fingerprintClear();

            var $this = $(this);
            var appointmentID = $(this).data("img");
            $('img.token-img').removeClass('selectedI');

            $.ajax({
                url: 'CounsellingLoadData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    command: 'individual',
                    appointmentID: appointmentID
                },
                success: function (data) {

                    $this.addClass('selectedI');
                    $('#RegisterNo').val(data[3]);
                    $('#NameInFull').val(data[1] + ' ' + data[22]);
                    $('#ApplicationDate').val(data[2]);
                    $('#ApponintmentNo').val(data[3]);
                    $('#CurrentPassportNo').val(data[4]);
                    $('#ApplicationDate2').val(data[5]);
                    $('#Country').val(data[6]);
                    $('#City').val(data[7]);
                    $('#Ethnicity').val(data[8]);
                    $('#DateofBirth').val(data[9]);
                    $('#Gender').val(data[10]);
                    $('#Civilstatus').val(data[11]);
                    $('#Address').val(data[12]);
                    $('#AddressLocal').val(data[13]);
                    $('#Telephone').val(data[14]);
                    $('#Mobile').val(data[15]);
                    $('#Email').val(data[16]);
                    $('#SponserName').val(data[17]);
                    $('#Nationality').val(data[18]);
                    $('#PassportNo').val(data[19]);
                    $('#TokenNo').val(data[20]);
                    if (data[21] != null && data[21] != "") {
                        $('#MemberImgTag').attr('src', path + '/' + data[21]);
                    } else {
                        $('#MemberImgTag').attr('src', imgPathBlade + '/imgcou.png');
                    }
                    $('#modal2').iziModal('open');
                }
            })
        });

        //==============================================================================

        $('#modal2').iziModal({
            headerColor: '#26A69A',
            width: '90%',
            overlayColor: 'rgba(0, 0, 0, 0.5)',
            fullscreen: true,
            transitionIn: 'fadeInUp',
            transitionOut: 'fadeOutDown'
        });

        //==============================================================================

        $('.iziModal').css({"z-index": "9999"});

        //==============================================================================

        $('#callNext').on('click', function () {

            $('#containerContent').show();

            fingerprintClear();

            var stringA = localStorage.getItem('appNo');
            if (stringA != null) {

                var clearArray = stringA.split(',');
                // for (var i = 0; i < clearArray.length; i++) {

                    // $.ajax({
                    //     url: 'CounsellingLoadData',
                    //     type: 'post',
                    //     dataType: 'json',
                    //     headers: {
                    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //     },
                    //     data: {
                    //         command: 'clearCenter',
                    //         appNo: clearArray[i]
                    //     },
                    //     success: function (data) {
                    //     }
                    // });
                // }
                localStorage.removeItem("appNo");
                localStorage.removeItem("appWithTab");
            }
            var Applicantcount=0;
            if (arr.length == 0) {

                $.ajax({
                    url: 'CounsellingLoadData',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        command: 'next'
                    },
                    success: function (data) {

                        if (data == "No Token") {
                            Swal('There are no more tokens.', '', 'error');
                        } else {

                            localStorage.setItem('Counseling', '1111');

                            $('#firstSet').html('');
                            $('#secondSet').html('');

                            $.each(data, function (key, val) {

                                tokenArr.push(val[0]);

                                var co = 0;
                                var fkid = val[4];
                                var fkidP = fkid + 1;
                                if (fkid != fkidP) {
                                    co++;
                                }

                                if (val[2] != null && val[2] != "") {
                                    var imgPath = path + '/' + val[2];
                                } else {
                                    var imgPath = imgPathBlade + '/imgcou.png';
                                }
                                Applicantcount++;
                                arr.push(val[3]);
                                var imageRUrl = "" + imgPathBlade + "/checkImage.png";

                                $('.allTab').append('<div style="margin-bottom: 20px;" class="col-2 singleTab" attr-fid="' + val[4] + '"><span class="badge badge-pill badge-warning tokenNo" style="width: 80%;margin-bottom: 4px;border: 2px solid black;">' + val[0] + '</span>' +
                                    '<div style="position: relative;top: 0;left: 0;" class="sedAdd">' +
                                    '<img src="' + imgPath + '" class="img-thumbnail token-img" id="" data-img="' + val[1] + '" style="width: 80%; height: 150px;" /> ' +
                                    '</div>' +
                                    '<div class="qwe" style="display: none">' +
                                    '<img class="image2" src="' + imageRUrl + '">' +
                                    '</div> ' +
                                    '<span class="badge badge-primary tabNo" style="width: 80%;margin-top: 4px;border: 2px solid black;"></span>' +
                                    '</div>');
                            });
                        }
                    },
                    complete: function (data) {

                        var uniqueNames = [];
                        $.each(tokenArr, function (i, el) {
                            if ($.inArray(el, uniqueNames) === -1) uniqueNames.push(el);
                        });
                        var i = 0;
                        $('#currentTokenNo').text(uniqueNames.join(', '));

                        Array.prototype.push.apply(finalArray, arr);

                        var strToken = '';
                        var co = 0;
                        $('.allTab .singleTab').each(function (key, val) {
                            var $this = $(this);

                            if (key == 0) {
                                strToken = $this.find('.tokenNo').text();
                                co++;
                            } else {
                                // if ($this.find('.tokenNo').text() == strToken) {
                                //
                                // } else {
                                    co++;
                                    strToken = $this.find('.tokenNo').text();
                                // }
                            }
                            // arr[i]=
                            $this.find('.tabNo').text('Tab No:' + co + '');
                            $this.find('.tabNo').attr('tab', co)

                        }).promise().done(function () {

                            $('.allTab .singleTab').each(function (key, val) {

                                var tokenNo = $(this).find('.tokenNo').text();
                                var tabNo = $(this).find('.tabNo').attr('tab');
                                var app = $(this).find('.token-img').attr('data-img');

                                comArr.push(app + '/' + tabNo);

                                $.ajax({
                                    url: 'CounsellingLoadData',
                                    type: 'post',
                                    dataType: 'json',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },

                                    data: {
                                        app:app,
                                        tokenNo: tokenNo,
                                        tabNo: tabNo,
                                        command: 'updateTabNo'
                                    },
                                    success: function (data) {
                                    }
                                });
                            });
                        });
                    }

                });
            } else {
                Swal('Please compelete this token first !', '', 'error');
            }
        });

        //==============================================================================

        $('#recall').on('click', function () {

            $.ajax({
                url: 'CounsellingLoadData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    command: 'recall'
                },
                success: function (data) {
                    if (data == "No Token") {
                        Swal('There are no more tokens to recall.', '', 'error');
                    } else {

                        $('#appNotAvblBody').html('');
                        var html = '';
                        var L = data.length;
                        $.each(data, function (key, val) {
                            if (key != (L - 1)) {
                                html += '' + val + ', ';
                            } else {
                                html += '' + val + '';
                            }
                        });
                        $('#appNotAvblBody').html('<tr class="appNotAvblNum" style="font-size: 28px;"><td class="tokn">' + html + '</td></tr>');
                        $('#noshow').iziModal('open');
                    }
                }
            });
        });

        //==============================================================================

        $('#startCounselling').on('click', function () {
            localStorage.setItem('appNo', finalArray);
            localStorage.setItem('appWithTab', comArr);

            // Web Storage (Member count)
            var MemCou = finalArray.length;
            localStorage.setItem("MemCount", MemCou);
        });

        //==============================================================================
        var CurrentapplicantCount=0;

        $('#notab').on('click', function () {
            $.ajax({
                url: 'CounsellingLoadData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                data: {command: 'notavailable', tokenNo: $('#TokenNo').val()},
                success: function (data) {

                    $('#modal2').iziModal('close');
                    arr.splice($.inArray($('#AppointmentNo').val(), arr), 1);
                    if (arr.length == 0) {
                        $("#startCounselling").show();
                    }
                    CurrentapplicantCount++;
                    $('.selectedI').parent().addClass('sed').next().show();
                    $('.selectedI').parent().next().find('.image2').attr('src', imgPathBlade + '/close_red.png');

                    Swal(
                        'Marked as No Show!',
                        '',
                        'success'
                    );
                }
            });

        });

        //==============================================================================
         $('#ok').on('click', function () {

            arr.splice($.inArray($('#AppointmentNo').val(), arr), 1);

            if (arr.length == 0) {
                $("#startCounselling").show();
            }

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

            var appointmentNo = $('#ApponintmentNo').val();

            var objectName = "Flat Right Thumb";
            if(objectToVeri == 6){
                objectName = "Flat Left Thumb";
            }

            var imagePathTemp = '/FPCounselling-' + appointmentNo + '-' + objectName + '-' + today + '.bmp';


            $.ajax({
                url: 'CounsellingLoadData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {command: 'ok', appno: $('#ApponintmentNo').val(), imagePathTemp: imagePathTemp},
                success: function (data) {

                    $('.selectedI').parent().addClass('sed').next().show();

                    $('#modal2').iziModal('close');
                    CurrentapplicantCount++;

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'center-end',
                        showConfirmButton: false,
                        timer: 5000
                    });

                    Toast.fire({
                        type: 'success',
                        title: 'Saved Successfully!'
                    })
                }
            });
        });

        //==============================================================================

        $(document).on('click', "tr.appNotAvblNum", function () {

            $('#statVerification').text("Pending").removeClass('badge-danger badge-success').addClass('badge-warning');
            $(".dataPanelToggle").show();
            $(".showBioVerify").hide();

            var stringA = localStorage.getItem('appNo');

            $('#containerContent').show();

            if (stringA != null) {
                var clearArray = stringA.split(',');
                for (var i = 0; i < clearArray.length; i++) {

                    $.ajax({
                        url: 'CounsellingLoadData',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            command: 'clearCenter',
                            appNo: clearArray[i]
                        },
                        success: function (data) {
                        }
                    });
                }
                localStorage.removeItem("appNo");
                localStorage.removeItem("appWithTab");
            }

            var tokens = $(this).find("td.tokn").text();
            $('#currentTokenNo').text(tokens);
            tokens = tokens.split(', ');

            $.ajax({
                url: 'CounsellingLoadData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    command: 'getBack',
                    token: tokens
                },
                success: function (data) {
                    var html = '';

                    $.each(data, function (key, val) {

                        var co = 0;
                        var fkid = val[4];
                        var fkidP = fkid + 1;
                        if (fkid != fkidP) {
                            co++;
                        }

                        if (val[2] != null && val[2] != "") {
                            var imgPath = path + '/' + val[2];
                        } else {
                            var imgPath = imgPathBlade + '/imgcou.png';
                        }

                        arr.push(val[3]);
                        var imageRUrl = "" + imgPathBlade + "/checkImage.png";
                        html += '<div style="margin-bottom: 20px;" class="col-2 singleTab" attr-fid="' + val[4] + '"><span class="badge badge-pill badge-warning tokenNo" style="width: 80%;margin-bottom: 4px;border: 2px solid black;">' + val[0] + '</span>' +
                            '<div style="position: relative;top: 0;left: 0;" class="sedAdd">' +
                            '<img src="' + imgPath + '" class="img-thumbnail token-img" id="" data-img="' + val[1] + '" style="width: 80%; height: 150px;" /> ' +
                            '</div>' +
                            '<div class="qwe" style="display: none">' +
                            '<img class="image2" src="' + imageRUrl + '">' +
                            '</div> ' +
                            '<span class="badge badge-primary tabNo" style="width: 80%;margin-top: 4px;border: 2px solid black;"></span>' +
                            '</div>';
                    });
                    $('.allTab').html('');
                    $('.allTab').html(html);
                    $('#noshow').iziModal('close');
                },
                complete: function (data) {
                    Array.prototype.push.apply(finalArray, arr);
                    var strToken = '';
                    var co = 0;
                    $('.allTab .singleTab').each(function (key, val) {
                        var $this = $(this);

                        if (key == 0) {
                            strToken = $this.find('.tokenNo').text();
                            co++;
                        } else {
                            // if ($this.find('.tokenNo').text() == strToken) {

                            // } else {
                                co++;
                                strToken = $this.find('.tokenNo').text();
                            // }
                        }
                        $this.find('.tabNo').text('Tab No:' + co + '');
                        $this.find('.tabNo').attr('tab', co);
                    }).promise().done(function () {
                        $('.allTab .singleTab').each(function (key, val) {

                            var tokenNo = $(this).find('.tokenNo').text();
                            var tabNo = $(this).find('.tabNo').attr('tab');
                            var app = $(this).find('.token-img').attr('data-img');

                            comArr.push(app + '/' + tabNo);

                            $.ajax({
                                url: 'CounsellingLoadData',
                                type: 'post',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    tokenNo: tokenNo,
                                    tabNo: tabNo,
                                    command: 'updateTabNo'
                                },
                                success: function (data) {
                                }
                            });
                        });
                    });
                }
            });
        });

        //==============================================================================

        $('#sosButton').on('click', function () {

            $.ajax({
                url: 'CounsellingLoadData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {command: 'sos', usergroup: usergroup},
                success: function (data) {

                    if (data.result == true) {
                        Swal(
                            'Request Sent!',
                            '',
                            'success'
                        );
                    }
                }
            });
        });

        //==============================================================================

        function getRecallListTokens() {

            $.ajax({
                url: 'CounsellingLoadData',
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
                    $('#callAgainTokens').text(data);
                }
            });
        }

        //==============================================================================

        function getPendingTokens() {
            $.ajax({
                url: 'CounsellingLoadData',
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

        var bar1 = new ProgressBar.Line('#pendingTokenProgress', {
            strokeWidth: 2,
            easing: 'easeInOut',
            duration: 3000,
            color: '#FFEA82',
            trailColor: '#eee',
            trailWidth: 1,
            svgStyle: {width: '100%', height: '100%'},
            from: {color: '#FFEA82'},
            to: {color: '#ED6A5A'},
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

        //==============================================================================

        var bar2 = new ProgressBar.Line('#callAgainTokenProgress', {
            strokeWidth: 2,
            easing: 'easeInOut',
            duration: 6000,
            color: '#FFEA82',
            trailColor: '#eee',
            trailWidth: 1,
            svgStyle: {width: '100%', height: '100%'},
            from: {color: '#00838f'},
            to: {color: '#BBBA82'},
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

        //===============================================================================

        $('#biometricAuth').on('click', function () {

            $(".dataPanelToggle").slideUp("slow");
            $(".showBioVerify").slideDown("slow");
        });

        //==============================================================================

        var objectToVeri = 0;

        $('#flatLeftThumbVerify').on('click', function () {

            var appointmentNo = $('#ApponintmentNo').val();

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

        //==============================================================================

        $('#flatRightThumbVerify').on('click', function () {

            var appointmentNo = $('#ApponintmentNo').val();

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

        //==============================================================================

        function fingerprintClear() {
            $('#statVerification').text("Pending").removeClass('badge-danger badge-success').addClass('badge-warning');
            $('#loadImageSavedVeri').attr('src', '');
            $('#loadImageSavedVeriCurrent img').remove();
            $('#responseText h2').remove();
        }

        //==============================================================================

        function captureFPVerification() {

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
                    var appointmentNo = $('#ApponintmentNo').val();
                    var objectName = data[0].ObjectName;

                    $.ajax({
                        url: 'CounsellingLoadData',
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

                                var imagePathTemp = fingerPrintPath + '/tempFingerPrint/FPCounselling-' + appointmentNo + '-' + objectName + '-' + today + '.bmp#' + new Date().getTime();

                                $('#loadImageSavedVeriCurrent').html("<img src=\"" + imagePathTemp + "\" class=\"img-fluid\" alt=\"\" style=\"height: 275.6px;\">");

                                $('#verAppNoVe').text(appointmentNo);
                                $('#fingerNameVe').text(objectName);
                            }
                        }, complete: function () {

                            const urlOrg = "/FingerPrintData/" + appointmentNo + "-" + today + "/FP-" + appointmentNo + "-" + objectName + "-" + today + ".bmp";
                            const urlTemp = '/tempFingerPrint/FPCounselling-' + appointmentNo + '-' + objectName + '-' + today + '.bmp';

                            var uri = "http://192.168.100.6:8080/Values/GetString";

                            $.ajax({
                                url: uri,
                                type: "GET",
                                data: {urlOrg: urlOrg, urlTemp: urlTemp},
                                success: function (data) {

                                    $('#responseText').html("");

                                    if (data.toString() == "Finger Print Verified") {

                                        $('#responseText').html('<h2 class="text-center" style="text-align: center;color: #119611;font-weight: bold;font-size: 2rem;">' + data + '</h2>');
                                        $('#statVerification').text(data).removeClass('badge-warning badge-danger').addClass('badge-success');
                                        $('#ok').show();
                                    } else if (data.toString() == "Finger Print Not Verified") {

                                        $('#responseText').html('<h2 class="text-center" style="text-align: center;color: #da5d43;font-weight: bold;font-size: 2rem;">' + data + '</h2>');
                                        $('#statVerification').text(data).removeClass('badge-warning badge-success').addClass('badge-danger');
                                      //  $('#ok').hide();
                                    }
                                }, complete: function () {

                                    closewait();
                                    $('#veriOk').show();
                                }, error: function(){

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
        }

        //==============================================================================

        $('#veriOk').on('click', function () {

            $(".dataPanelToggle").slideDown("slow");
            $(".showBioVerify").slideUp("slow");
        });

        //==============================================================================

    }
} else {

    Swal(
        'You don\'t have Permission!',
        'Please use counter 1 or counter 2 logins.',
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
            counter: 'Counseling'
        },
        success: function (data) {

            if (data == true) {
                aaa = true;
                console.log(aaa);
            } else {
                aaa = false;
                console.log(aaa);
            }
        }
    });
    return aaa;
}



