$(document).ready(function () {
	
	var tknNo = localStorage.getItem("tokenno");
	localStorage.removeItem("tokenno");
	
	if(tknNo != null){
		loadTokenNo(tknNo);
	}
	
	function loadTokenNo(tknNo){
		
		 $("#clearingID").show();
		$.ajax({
                        url: 'RegistrationLoadData',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            command: 'AppointmentNo',
                            token: tknNo
                        },
                        success: function (data) {

                            $('#appbody').html('');
                            $.each(data, function (key, val) {

                                $.ajax({
                                    url: 'RegistrationLoadData',
                                    type: 'post',
                                    dataType: 'json',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        command: 'CheckAppointmentAvailable',
                                        appNo: val
                                    },
                                    async: false,
                                    success: function (data) {

                                        if (data.result == true) {

                                            $('#appbody').append('<tr class="appNum rowSaved"> <td>' + val + '</td> </tr>');
                                            arr.splice($.inArray(val, arr), 1);
                                        } else {

                                            $('#appbody').append('<tr class="appNum"> <td>' + val + '</td> </tr>');
                                        }
                                    },
                                });
                            });                           
                        }
                    });
	}
	
	console.log(tknNo)

    var aaa = false;
    var photoBoothStat = false;
    var biometricStat = false;
    var FPData = null;


    if (usergroup == 2 || usergroup == 3 || usergroup == 4 || usergroup == 5 || usergroup == 6 || usergroup == 7) {

        if (!(isOn())) {

            Swal('Counter Not Open. Please Enable!', '', 'error');

        } else {

            var TKN = 0;
            var arr = [];
            var str = "No";

            //==========================================================================================================
			
			
			

            function load() {

                //==========================================Load Device Name============================================================

                var uri = "http://localhost:6463/api/Devices";

                $.ajax({
                    url: uri,
                    type: "GET",
                    success: function (obj) {

                        var data = JSON.parse(obj);

                        var deviceName = data[0].DeviceName + ' - ' + data[0].SerialNumber;

                        $('#deviceName').text("");
                        $('#deviceName').text(deviceName);


                        //=========================================Load Objects types to Scan===================================================

                        var uri = "http://localhost:6463/api/Devices/?serialnum=";

                        var SrNo = data[0].SerialNumber;

                        $.ajax({
                            url: uri + SrNo,
                            type: "PUT",
                            data: {serialnum: SrNo},
                            success: function (obj) {

                                var data = JSON.parse(obj);

                                $.each(data, function (val, text) {
                                    $('#objToScan').append(new Option(text.ObjectName, text.ObjectID));
                                });
                            },
                            error: function (response) {
                                if (response.readyState === 0)
                                    alert("Connection Error.... Please check service.");
                            }
                        })
                    },
                    error: function (response) {

                        if (response.readyState === 0)
                            alert("Connection Error.... Please check service.");
                        else
                            alert(response.responseText);
                        $('#deviceName').text("No attached scanner found");
                    }
                });
            }

            //==========================================================================================================

            $('#startFingerPrintProcess').on('click', function () {
                if ($("#objToScan").val().toString() != "") {

                    var objectId = $("#objToScan").val().toString();

                    var uri = "http://localhost:6463/api/Fingerprints/" + objectId;

                    var result = "";

                    $('#startFingerPrintProcess').prop('disabled', true);

                    $.ajax({
                        url: uri,
                        type: "GET",
                        success: function (obj) {

                            var data = JSON.parse(obj);
                            FPData = data;

                            $.each(data, function (val, text) {

                                result += "<div class='col-md-4'>";
                                result += "<a href='javascript:void(0);' class='btn-success col-md-12 btn-block btn-sm' style='text-align:center;cursor: pointer;'>" + text.ObjectName + "</a>";
                                result += "<p class='table-bordered col-md-12' id='" + text.ObjectID + "'>";
                                result += "<img ";
                                result += "src='data:image/bmp;base64," + text.Base64BMPImage + "' ";
                                result += "alt='DDS Fingerprints' class='img-responsive col-md-12'>";
                                result += "</p></div>";
                            });

                            document.getElementById('result').innerHTML = result;
                            $('#startFingerPrintProcess').prop('disabled', false);
                        },
                        error: function (response) {
                            if (response.readyState === 0)
                                alert("Connection Error.... Please check service.");
                            else
                                alert(response.responseText);
                            $('#capture').prop('disabled', false);
                        }
                    })

                } else {

                    Swal(
                        'Please Select Object To Scan!',
                        '',
                        'warning'
                    );
                }
            });

            //==========================================================================================================

            $('#saveBiometricData').on('click', function () {

                if (FPData == null) {
                    alert("Image data not found...");
                    return;
                }

                var appNo = $('#appbody tr.clickedRow td').text();
                var co = 0;

                $.each(FPData, function (val, text) {

                    var objectName = text.ObjectName;

                    if (objectName == "Flat Left Four Fingers" || objectName == "Flat Right Four Fingers" || objectName == "Flat Two Thumbs") {

                    } else {

                        var imageData = text.Base64BMPImage;

                        $.ajax({
                            url: 'RegistrationLoadData',
                            type: 'post',
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                command: 'fingerPrintSave',
                                appNo: appNo,
                                imageData: imageData,
                                objectName: objectName
                            },
                            success: function (data) {

                                if (data.result == true) {
                                    co++;

                                    Swal(
                                        'Saved Successfully!',
                                        'Finger Prints: ' + co + '',
                                        'success'
                                    );

                                    if (co == 10) {
                                        biometricStat = true;
                                        $('#biometricAuthenticationImgChange').attr('src', imgPathBlade + '/BiometricAuthenticationOk.png');
                                    }
                                }
                            }
                        });
                    }

                });


            });

            //==========================================================================================================

            function testFP() {

                $.ajax({
                    url: 'http://localhost:8080/Products/GetProduct',
                    type: 'GET',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {},
                    success: function (data) {

                        console.log(data)
                    }
                });


            }

            //==========================================================================================================
 
            $('#btnUpdateDetails').on('click', function () {

                var appNum = $('#appbody tr:nth-child(1) td').text();
                localStorage.setItem("appointment", appNum);
				localStorage.setItem("tokenno", $('#currentTokenNo').text());
				localStorage.setItem("tokenStatus", '');
				
				
				setInterval(function(){
					
					var stat = localStorage.getItem("tokenStatus");
					console.log(stat)
					if(stat == "complete"){					
						
						location.reload();
					}
				}, 2000);
				
                var win = window.open('ChangeUpdateAppointmentDetails', '_blank');
                win.focus();
            });

            //================================= Calling the next token number ==============

            $('#next').on('click', function () {

                var preToken = $('#currentTokenNo').text();
                str = "Yes";
                $("#clearingID").trigger("reset").show();

                $("#objToScan").val('').trigger('change');
                $('#result').html("");
                $('#photoBoothImgChange').attr('src', imgPathBlade + '/PhotoBooth.png');
                $('#biometricAuthenticationImgChange').attr('src', imgPathBlade + '/BiometricAuthentication.png');

                if (arr.length == 0) {

                    var Array_app_no = [];

                    $.ajax({
                        url: 'RegistrationLoadData',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            command: 'next',
                            preToken: preToken
                        },
                        success: function (data) {

                            if (data == "No Token") {

                                Swal('There are no more tokens.', '', 'error');
                            } else {

                                $('#currentTokenNo').text(data);

                                $.ajax({
                                    url: 'RegistrationLoadData',
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
                                            arr[key] = val;
                                            Array_app_no.push(val);
                                            $('#appbody').append('<tr class="appNum"> <td>' + val + '</td> </tr>');
                                        });

                                    }, complete: function () {

                                        $.ajax({
                                            url: 'RegistrationLoadData',
                                            type: 'post',
                                            dataType: 'json',
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            data: {
                                                command: 'CheckPassportNo',
                                                tokNo: data,
                                            },
                                            success: function (data) {

                                                var Qty = parseInt(data);
                                                if (Qty > 0) {

                                                    Swal(
                                                        '* Please update all member details before continuing!',
                                                        '',
                                                        'warning'
                                                    );
                                                }
                                            }

                                        });
                                    }
                                });

                                // ============================================================

                            }
                        }
                    });

                } else {
                    Swal('Please complete this token first!', '', 'error');
                }

            });

            //=========== Calling the Data when click on Appointment Number ================

            $(document).on('click', "tr.appNum", function () {

                $('#photoBoothImgChange').attr('src', imgPathBlade + '/PhotoBooth.png');
                $('#biometricAuthenticationImgChange').attr('src', imgPathBlade + '/BiometricAuthentication.png');

                if (!$(this).hasClass('rowSaved')) {
                    $('tr.appNum').removeClass('clickedRow');

                    $(this).addClass('clickedRow').addClass('prevClicked');

                    $.ajax({
                        url: 'RegistrationLoadData', 
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
                            $('#NameInFull').val(data[2]);
                            $('#NameLast').val(data[3]);
                            $('#AppointmentDate').val(data[4]);
                            if (data[5] != '') {
                                $('#AddressLocal').val(data[5]);
                            } else {
                                $('#AddressLocal').val('');
                            }

                            // if (data[5] == 0) {
                            //     $('#AddressLocal').val(data[5]);
                            // } else {
                            //     Swal('This applicant has gone through the health assessment process before ', '', 'info');
                            // }
                            $('.showHideDiv').show();
                        }
                    });
                }
            });

            //=========== Not Available ====================================================

            $('#notAvailable').on('click', function () {

                if (str.length > 2) {
                    $.ajax({
                        url: 'RegistrationLoadData',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        data: {
                            command: 'NoShow',
                            token: $('#currentTokenNo').text()
                        },

                        success: function (data) {
                            Swal('Added to Queue', '', 'success');
                            $('#currentTokenNo').text("-");
                            $('#appbody').html("");
                            arr = [];
                        }
                    });
                } else {
                    Swal('No Tokens', '', 'error');
                }

            });

            //=========== Recall =============================================

            $('#recall').on('click', function () {
                $.ajax({
                    url: 'RegistrationLoadData',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        command: 'NoShowList'
                    },
                    success: function (data) {

                        $('#appNotAvblBody').html('');
                        $.each(data.result, function (key, val) {
                            $('#appNotAvblBody').append('<tr class="appNotAvblNum"> <td attr-no="' + val.temp_reg + '">' + val.temp_token_no + '</td> </tr>');
                        });
                    }
                });
                $('#noshow').iziModal('open');
            });

            //=========== Selected Token from No Show ======================================

            $(document).on('click', "tr.appNotAvblNum", function () {

                const $this = $(this);

                $('#photoBoothImgChange').attr('src', imgPathBlade + '/PhotoBooth.png');
                $('#biometricAuthenticationImgChange').attr('src', imgPathBlade + '/BiometricAuthentication.png');

                $("#clearingID").show();
                $('#currentTokenNo').text($this.find('td').text());
                var Pstatus = $this.find('td').attr('attr-no');

                // =================================

                if (Pstatus == 3) {

                    $.ajax({
                        url: 'RegistrationLoadData',
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
                                    url: 'RegistrationLoadData',
                                    type: 'post',
                                    dataType: 'json',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        command: 'AppointmentNo',
                                        token: $this.find('td').text()
                                    },
                                    success: function (data) {

                                        $('#appbody').html('');
                                        $.each(data, function (key, val) {

                                            $.ajax({
                                                url: 'RegistrationLoadData',
                                                type: 'post',
                                                dataType: 'json',
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                },
                                                data: {
                                                    command: 'CheckAppointmentAvailable',
                                                    appNo: val
                                                },
                                                async: false,
                                                success: function (data) {

                                                    if (data.result == true) {

                                                        $('#appbody').append('<tr class="appNum rowSaved"> <td>' + val + '</td> </tr>');
                                                        arr.splice($.inArray(val, arr), 1);
                                                    } else {

                                                        $('#appbody').append('<tr class="appNum"> <td>' + val + '</td> </tr>');
                                                    }
                                                },
                                            });
                                        });

                                        $('#noshow').iziModal('close');
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
                        url: 'RegistrationLoadData',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            command: 'AppointmentNo',
                            token: $this.find('td').text()
                        },
                        success: function (data) {

                            $('#appbody').html('');
                            $.each(data, function (key, val) {

                                $.ajax({
                                    url: 'RegistrationLoadData',
                                    type: 'post',
                                    dataType: 'json',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        command: 'CheckAppointmentAvailable',
                                        appNo: val
                                    },
                                    async: false,
                                    success: function (data) {

                                        if (data.result == true) {

                                            $('#appbody').append('<tr class="appNum rowSaved"> <td>' + val + '</td> </tr>');
                                            arr.splice($.inArray(val, arr), 1);
                                        } else {

                                            $('#appbody').append('<tr class="appNum"> <td>' + val + '</td> </tr>');
                                        }
                                    },
                                });
                            });

                            $('#noshow').iziModal('close');
                        }
                    });

                }


                // =================================


            });

            //============================ Save Data =======================================

            $('#registerButton').on('click', function () {

                // if (photoBoothStat == true && biometricStat == true) {

                Swal.fire({
                    title: 'Are you sure?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Submit!'
                }).then((result) => {
                    if (result.value) {

                        var appnox = $('#AppointmentNo').val();
                        var tokenNo = $('#currentTokenNo').text();

                        if (validate('#clearingID')) {

                            var photoBooth = $('#showEditedImage').attr('src');

                            $.ajax({
                                url: 'RegistrationLoadData',
                                type: 'post',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    command: 'save',
                                    token: tokenNo,
                                    appno: $('#AppointmentNo').val(),
                                    ppno: $('#PassportNo').val(),
                                    prc: $('#PRC').val(),
                                    remarks: $('#Remarks').val(),
                                    pra: $('#PRA').val(),
                                    appdate: $('#AppointmentDate').val(),
                                    photobooth: photoBooth
                                },
                                success: function (data) {

                                    $('#appbody  > tr.appNum').each(function () {

                                        if (appnox.trim() == $(this).text().trim()) {

                                            $(this).removeClass('clickedRow');
                                            $(this).removeClass('prevClicked');
                                            $(this).addClass('rowSaved');
                                        }
                                    });

                                    Swal('Data Saved', '', 'success');
                                    arr.splice($.inArray($('#AppointmentNo').val(), arr), 1);
                                },
                                complete: function () {

                                    $('#AppointmentNo').val('');
                                    $('#PassportNo').val('');
                                    $('#NameInFull').val('');
                                    $('#NameLast').val('');
                                    $('#AppointmentDate').val('');
                                    $('#AddressLocal').val('');
                                    $('#PRA').val('');
                                    $('#PRC').val('');
                                    $('#Remarks').val('');
                                    $('.showHideDiv').hide();
                                    $('#imagePlaceHolder img').attr('src', '');
                                    $('#imageHolderCropped img').attr('src', '');
                                    $("#imagePlaceHolder img").cropper("destroy");
                                    $("#imagePlaceHolder").show();
                                    $("#imagePlaceHolderCropped").hide();
                                }
                            });
                        }
                    }
                });

            });

            //============================ Open Modal =====================================

            $('#notyicon').on('click', function () {
                $('#listmodal').iziModal('open');
            });

            //==========================================================================================================

            $('#takephotobtn').on('click', function () {
                $('#ptomodal').iziModal('open');
            });

            //==========================================================================================================

            $('#takeBiometricsbtn').on('click', function () {
                $('#biomodal').iziModal('open');
            });

            //==========================================================================================================

            $('#PRC').on('change', function () {
                validate('#clearingID');
                if ($('#PRC option:selected').text() === 'None') {
                    $('#PRA').val("No").change();
                }
            });

            //==========================================================================================================

            $('#PRA').on('change', function () {
                validate('#clearingID');
            });

            //==========================================================================================================

            $('input[type=text]').change(function () {
                validate('#clearingID');
            });

            //==========================================================================================================

            function getPendingTokens() {
                $.ajax({
                    url: 'QueueManagementSettingsSaveData',
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

            //==========================================================================================================

            function getRecallListTokens() {

                $.ajax({
                    url: 'RegistrationLoadData',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        command: 'NoShowCount'
                    },
                    success: function (data) {

                        $('#callAgainTokens').text("");

                        if (data) {
                            $('#callAgainTokens').text(data);
                        } else {
                            $('#callAgainTokens').text('-');
                        }

                    }
                });
            }

            //==========================================================================================================

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

            getPendingTokens();
            setInterval(function () {
                getPendingTokens();
                bar1.set(0);
                bar1.animate(1);
            }, 3000);

            //==========================================================================================================

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

            getRecallListTokens();
            setInterval(function () {
                getRecallListTokens();
                bar2.set(0);
                bar2.animate(1);
            }, 6000);

            //==========================================================================================================

            $('#editPhoto').on('click', function () {

                $('#captureImage').addClass('editedImg');
                // $('#captureImage').cropper({
                //     cropBoxResizable: false
                // });


                var $image = $('#captureImage');

                $image.cropper({
                    aspectRatio: 1 / 1,
                    autoCropArea: 0,
                    strict: false,
                    guides: false,
                    highlight: true,
                    cropBoxResizable: false,
                    background: false,
                    dragCrop: false,
                    resizable: false,
                    minCropBoxWidth: 150,
                    minCropBoxHeight: 150,
                    built: function () {

                        $image.cropper('setCanvasData', 0, 0, 150, 150);
                        $image.cropper('setCropBoxData', 0, 0, 150, 150);

                    }
                });

                $("#captureImage").show();
                $("#showEditedImage").hide();
            });

            //==========================================================================================================

            $('#cancelPhoto').on('click', function () {

                $('#captureImage').removeClass('editedImg');
                $("#captureImage").cropper("destroy");
                $("#captureImage").show();
                $("#showEditedImage").hide();
            });

            //==========================================================================================================

            $('#savePhoto').on('click', function () {

                var canvas = "";
                if ($('#captureImage').hasClass('editedImg')) {
                    canvas = $('#captureImage').cropper('getCroppedCanvas');
                    $("#captureImage").cropper("destroy");
                } else {
                    canvas = document.getElementById("captureImage");
                }

                var base64Url = canvas.toDataURL('image/jpeg');

                $("#captureImage").hide();
                $("#showEditedImage").show();
                $("#showEditedImage").attr('src', base64Url).css({"width": '440px', "height": '330px'});


                photoBoothStat = true;
                $('#photoBoothImgChange').attr('src', imgPathBlade + '/PhotoBoothOk.png');
            });

            //==========================================================================================================

            $('#takeBiometricsbtn').on('click', function () {
                load();
            });

            //==========================================================================================================

        }
    } else {

        Swal(
            'You don\'t have Permission!',
            'Please use Registration Counter 1 - 6 logins.',
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
                counter: 'Registration'
            },
            success: function (data) {

                if (data == true) {
                    aaa = true;
                } else {
                    aaa = true;
                }
            }
        });
        return aaa;
    }

});
