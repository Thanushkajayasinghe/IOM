$(document).ready(function () {
    var TKN = 0;
    var arr = [];
    var str = "No";
    //pending token
    getPendingTokens();
    function getPendingTokens() {
        var country = $("#country").text();
        $.ajax({
            url: `/${getUrl()}/PendingTokensURL`,
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                country: location.href.substring(
                    location.href.lastIndexOf("/") + 1
                ),
            },
            success: function (data) {
                $("#CTNumber").text(data.result);
                $("#curCounter").text(data.counter);
            },
        });
    }
    //call again token
    getCallAgainTokens();
    function getCallAgainTokens() {
        $.ajax({
            url: `/${getUrl()}/CallAgainURL`,
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                country: location.href.substring(
                    location.href.lastIndexOf("/") + 1
                ),
            },
            success: function (data) {
                $("#callAgainTokens").text("");

                if (data) {
                    $("#callAgainTokens").text(data);
                } else {
                    $("#callAgainTokens").text("-");
                }
            },
        });
    }
    // call next////
    $("#next").on("click", function () {
        var preToken = $("#currentTokenNo").text();
        var country = $("#country").text();
        str = "Yes";
        $("#clearingID").trigger("reset").show();

        $("#objToScan").val("").trigger("change");
        $("#result").html("");
        if (arr.length == 0) {
            var Array_app_no = [];
            var Array_member_type = [];

            $.ajax({
                url: `/${getUrl()}/NextURL`,
                type: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    preToken: preToken,
                    country: location.href.substring(
                        location.href.lastIndexOf("/") + 1
                    ),
                },
                success: function (data) {
                    if (data == "No Token") {
                        Swal("There are no more tokens.", "", "error");
                    } else {
                        $("#currentTokenNo").text(data);
                        getPendingTokens();
                        $.ajax({
                            url: `/${getUrl()}/LoadAppointmentNoURL`,
                            type: "post",
                            dataType: "json",
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            data: {
                                token: data,
                                country: location.href.substring(
                                    location.href.lastIndexOf("/") + 1
                                ),
                            },
                            success: function (data) {
                                $("#appbody").html("");
                                $.each(data, function (key, val) {
                                    arr[key] = val;
                                    Array_app_no.push(val.appointment_no); // Assuming 'appointment_no' is a property of the object
                                    Array_member_type.push(val.member_type); // Assuming 'member_type' is a property of the object

                                    // Append a table row with both appointment_no and member_type
                                    $("#appbody").append(
                                        '<tr class="appNum"> <td>' +
                                            val.appointment_no +
                                            '</td> <td style="display:none">' +
                                            val.member_type +
                                            "</td> </tr>"
                                    );
                                });
                            },
                            complete: function () {},
                        });
                    }
                },
            });
        } else {
            Swal("Please complete this token first!", "", "error");
        }
    });
    //this is for call nex and call again --> load personal detail according to appointment number
    $(document).on("click", "tr.appNum", function () {
        var appointment = $(this).find("td:first-child").text();
        if (!$(this).hasClass("rowSaved")) {
            $("tr.appNum").removeClass("clickedRow");

            $(this).addClass("clickedRow").addClass("prevClicked");
            $.ajax({
                url: `/${getUrl()}/CheckCallAgainAppNoURL`,
                type: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    appNo: $(this).find("td:first-child").text(),
                },
                success: function (data) {
                    if (data.result == false) {
                        $.ajax({
                            url: `/${getUrl()}/LoadAppointmentNoDataURL`,
                            type: "post",
                            dataType: "json",
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            data: {
                                appointment: appointment,
                            },
                            success: function (data) {
                                $("#AppointmentNo").val(data.appointment_no);
                                $("#PassportNo").val(data.passport_no);
                                $("#NameInFull").val(data.first_name || "");
                                $("#NameLast").val(data.last_name || "");
                                $("#AppointmentDate").val(
                                    data.appointment_date || ""
                                );
                                $("#AddressLocal").val(
                                    (data.address1 || "") +
                                        " " +
                                        (data.address2 || "") +
                                        " " +
                                        (data.city || "")
                                );

                                // if (data[5] == 0) {
                                //     $('#AddressLocal').val(data[5]);
                                // } else {
                                //     Swal('This applicant has gone through the health assessment process before ', '', 'info');
                                // }
                                $(".showHideDiv").show();
                            },
                        });
                    }
                    if (data.result == true) {
                        Swal.fire({
                            title: "Already Saved",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                        });
                    }
                },
            });
        }
    });
    //call again
    $("#recall").on("click", function () {
        str = "Yes";
        $.ajax({
            url: `/${getUrl()}/CallAgainListURL`,
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                country: location.href.substring(
                    location.href.lastIndexOf("/") + 1
                ),
            },
            success: function (data) {
                $("#appNotAvblBody").html("");
                $.each(data.result, function (key, val) {
                    $("#appNotAvblBody").append(
                        '<tr class="appNotAvblNum"> <td attr-no="' +
                            val.registration_status +
                            '">' +
                            val.token_no +
                            "</td> </tr>"
                    );
                });
            },
        });
        $("#noshow").iziModal("open");
    });
    $(document).on("click", "tr.appNotAvblNum", function () {
        const $this = $(this);
        var token = $this.find("td").text();
        $("#photoBoothImgChange").attr("src", imgPathBlade + "/PhotoBooth.png");
        $("#biometricAuthenticationImgChange").attr(
            "src",
            imgPathBlade + "/BiometricAuthentication.png"
        );
        $("#clearingID").show();
        $("#currentTokenNo").text($this.find("td").text());
        var Pstatus = $this.find("td").attr("attr-no");
        var Array_app_no = [];
        var Array_member_type = [];
        $.ajax({
            url: `/${getUrl()}/LoadAppointmentNoURL2`,
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                token: token,
                country: location.href.substring(
                    location.href.lastIndexOf("/") + 1
                ),
                Pstatus: Pstatus,
            },
            success: function (data) {
                $("#appbody").html("");
                if (data.count == undefined) {
                    combinedArray = data.appointments;
                    $.each(data.appointments, function (key, val) {
                        arr[key] = val;
                        Array_app_no.push(val.appointment_no);
                        Array_member_type.push(val.member_type);
                        $("#appbody").append(
                            '<tr class="appNum"> <td>' +
                                val.appointment_no +
                                '</td> <td style="display:none">' +
                                val.member_type +
                                "</td> </tr>"
                        );
                    });
                } else {
                    combinedArray = data.appointments.concat(data.count);
                    var uniqueAppointments = [];
                    $.each(combinedArray, function (key, val) {
                        arr[key] = val;
                        var isDuplicate = uniqueAppointments.some(function (
                            item
                        ) {
                            return item.appointment_no === val.appointment_no;
                        });
                        if (!isDuplicate) {
                            uniqueAppointments.push(val);
                            Array_app_no.push(val.appointment_no);
                            Array_member_type.push(val.member_type);
                            var rowSaved = "";
                            if (
                                data.count.some(
                                    (countItem) =>
                                        countItem.appointment_no ===
                                        val.appointment_no
                                )
                            ) {
                                $("#appbody").append(
                                    '<tr class="appNum  rowSaved"> <td>' +
                                        val.appointment_no +
                                        '</td> <td style="display:none">' +
                                        val.member_type +
                                        "</td> </tr>"
                                );
                            } else {
                                $("#appbody").append(
                                    '<tr class="appNum"> <td>' +
                                        val.appointment_no +
                                        '</td> <td style="display:none">' +
                                        val.member_type +
                                        "</td> </tr>"
                                );
                            }
                        }
                    });
                }

                $("#noshow").iziModal("close");
            },
        });
    });
    //no show
    $("#notAvailable").on("click", function () {
        if (str.length > 2) {
            $.ajax({
                url: `/${getUrl()}/NoShowURL`,
                type: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },

                data: {
                    command: "NoShow",
                    token: $("#currentTokenNo").text(),
                },

                success: function (data) {
                    Swal("Added to Queue", "", "success");
                    $("#currentTokenNo").text("-");
                    $("#appbody").html("");
                    arr = [];
                    // $('#maindiveid').hide();
                    getCallAgainTokens();
                    $(".showHideDiv").hide();
                },
            });
        } else {
            Swal("No Tokens", "", "error");
        }
    });

    // photo booth
    $("#takephotobtn").on("click", function () {
        $("#ptomodal").iziModal("open");
    });
    $(document).on("click", "#editPhoto", function () {
        $("#captureImage").addClass("editedImg");
        var $image = $("#captureImage");
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
                $image.cropper("setCanvasData", 0, 0, 150, 150);
                $image.cropper("setCropBoxData", 0, 0, 150, 150);
            },
        });

        $("#captureImage").show();
        $("#showEditedImage").hide();
    });
    $(document).on("click", "#cancelPhoto", function () {
        $("#captureImage").removeClass("editedImg");
        $("#captureImage").cropper("destroy");
        $("#captureImage").show();
        $("#showEditedImage").hide();
    });
    $(document).on("click", "#savePhoto", function () {
        var canvas = "";
        if ($("#captureImage").hasClass("editedImg")) {
            canvas = $("#captureImage").cropper("getCroppedCanvas");
            $("#captureImage").cropper("destroy");
        } else {
            canvas = document.getElementById("captureImage");
        }

        var base64Url = canvas.toDataURL("image/jpeg");

        $("#captureImage").hide();
        $("#showEditedImage").show();
        $("#showEditedImage")
            .attr("src", base64Url)
            .css({ width: "440px", height: "330px" });

        photoBoothStat = true;
        $("#photoBoothImgChange").attr(
            "src",
            imgPathBlade + "/PhotoBoothOk.png"
        );
    });

    //save
    $("#registerButton").on("click", function () {
        Swal.fire({
            title: "Are you sure?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Submit!",
        }).then((result) => {
            if (result.value) {
                var appnox = $("#AppointmentNo").val();
                var tokenNo = $("#currentTokenNo").text();

                if (validate("#clearingID")) {
                    var photoBooth = $("#showEditedImage").attr("src");
                    if (photoBooth == undefined) {
                        Swal.fire({
                            title: "Photo Is Reqiured",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                        });
                    } else {
                        $.ajax({
                            url: `/${getUrl()}/SaveURL`,
                            type: "post",
                            dataType: "json",
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            data: {
                                token: tokenNo,
                                appno: $("#AppointmentNo").val(),
                                ppno: $("#PassportNo").val(),
                                prc: $("#PRC").val(),
                                remarks: $("#Remarks").val(),
                                pra: $("#PRA").val(),
                                appdate: $("#AppointmentDate").val(),
                                photobooth: photoBooth,
                            },
                            success: function (data) {
                                $("#appbody tr.appNum").each(function () {
                                    var $this = $(this);
                                    if (
                                        appnox.trim() ==
                                        $this
                                            .find("td:nth-child(1)")
                                            .text()
                                            .trim()
                                    ) {
                                        $this.removeClass("clickedRow");
                                        $this.removeClass("prevClicked");
                                        $this.addClass("rowSaved");
                                    }
                                });

                                Swal("Data Saved", "", "success");
                                arr.splice(
                                    $.inArray($("#AppointmentNo").val(), arr),
                                    1
                                );
                            },
                            complete: function () {
                                $("#AppointmentNo").val("");
                                $("#PassportNo").val("");
                                $("#NameInFull").val("");
                                $("#NameLast").val("");
                                $("#AppointmentDate").val("");
                                $("#AddressLocal").val("");
                                $("#PRA").val("");
                                $("#PRC").val("");
                                $("#Remarks").val("");
                                $(".showHideDiv").hide();
                                $("#imagePlaceHolder img").attr("src", "");
                                $("#imageHolderCropped img").attr("src", "");
                                $("#imagePlaceHolder img").cropper("destroy");
                                $("#imagePlaceHolder").show();
                                $("#imagePlaceHolderCropped").hide();
                                // $('#showEditedImage').attr('src', '');
                                $("#photoBoothImgChange").attr(
                                    "src",
                                    imgPathBlade + "/PhotoBooth.png"
                                );
                            },
                        });
                    }
                }
            }
        });
    });
    // send to update
    $("#btnUpdateDetails").on("click", function () {
        var appointmentNo;
        var memberType;
        $("#appbody tr").each(function (index, row) {
            // Extract data from the current row

            memberType = $(row).find("td:nth-child(2)").text();
            if (memberType == "MainMember") {
                appointmentNo = $(row).find("td:first-child").text();
            }
        });

        //alert(appointmentNo);
        //var appointment = $('#appbody tr:nth-child(1) td').text();
        // var appointmentmember = $('#appbody tr:nth-child(2) td').text();

        localStorage.setItem("appointmentMHackNo", appointmentNo);
        var country = location.href.substring(
            location.href.lastIndexOf("/") + 1
        );
        var win = window.open(
            `/${getUrl()}/UpdateAppointment/` + country,
            `_blank`
        );

        win.focus();
    });
});
