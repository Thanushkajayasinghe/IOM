var arr = [];
var str = "No";

$(document).ready(function () {
    var bar1 = new ProgressBar.Line("#pendingTokenProgress", {
        strokeWidth: 2,
        easing: "easeInOut",
        duration: 20000,
        color: "#FFEA82",
        trailColor: "#eee",
        trailWidth: 1,
        svgStyle: { width: "100%", height: "100%" },
        from: { color: "#FFEA82" },
        to: { color: "#ED6A5A" },
        step: (state, bar) => {
            bar.path.setAttribute("stroke", state.color);
        },
    });

    bar1.animate(1.0);

    getPendingTokens();
    setInterval(function () {
        getPendingTokens();
        bar1.set(0);
        bar1.animate(1);
    }, 20000);

    //========================================

    function getPendingTokens() {
        $.ajax({
            url: "/IOM/MhacCXRLoadData",
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                country: country,
                command: "pendingToken",
            },
            success: function (data) {
                $("#CTNumber").text(data.result);
                $("#curCounter").text(data.counter);
            },
        });
    }

    //==================================================================

    var bar2 = new ProgressBar.Line("#callAgainTokenProgress", {
        strokeWidth: 2,
        easing: "easeInOut",
        duration: 40000,
        color: "#FFEA82",
        trailColor: "#eee",
        trailWidth: 1,
        svgStyle: { width: "100%", height: "100%" },
        from: { color: "#00838f" },
        to: { color: "#BBBA82" },
        step: (state, bar) => {
            bar.path.setAttribute("stroke", state.color);
        },
    });

    bar2.animate(1.0);

    setInterval(function () {
        getRecallListTokens();
        bar2.set(0);
        bar2.animate(1);
    }, 40000);

    //====================================================================

    function getRecallListTokens() {
        $.ajax({
            url: "/IOM/MhacCXRLoadData",
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                country: country,
                command: "NoShowCount",
            },
            success: function (data) {
                $("#callAgainTokens").text("");
                $("#callAgainTokens").text(data);
            },
        });
    }

    //=============== Calling the next token number ================================

    $("#next").on("click", function () {
        str = "Yes";
        $.ajax({
            url: "/IOM/MhacCXRLoadData", // URL to your backend endpoint
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                country: country,
                command: "next",
            },
            success: function (response) {
                $("#currentTokenNo").text(response.tokenName);
                $("#clearingID").show();
                $("#appbody").html(""); // Ensure it's appBody instead of appbody (case-sensitive)

                if (response.appointmentNo.length > 0) {
                    $.each(response.appointmentNo, function (key, val) {
                        // Append each appointment number to the table body
                        $("#appbody").append(
                            '<tr class="appNum"> <td>' + val + "</td> </tr>"
                        );
                    });
                }
            },
            error: function (error) {
                console.error("Error:", error);
            },
        });
    });

    //=========== Not Available ====================================================

    $("#notAvailable").on("click", function () {
        if (str.length > 2) {
            $.ajax({
                url: "/IOM/MhacCXRLoadData",
                type: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },

                data: {
                    country: country,
                    command: "notAvailable",
                    token: $("#currentTokenNo").text(),
                },

                success: function (data) {
                    Swal("Added to Queue", "", "success");
                    $("#currentTokenNo").text("-");
                    $("#appbody").html("");
                    arr = [];
                },
            });
        } else {
            Swal("No Tokens", "", "error");
        }
    });

    //=========== Recall Not Available =============================================

    $("#recall").on("click", function () {
        $.ajax({
            url: "/IOM/MhacCXRLoadData",
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                country: country,
                command: "NoShowList",
            },
            success: function (data) {
                str = "Yes";
                $("#appNotAvblBody").html("");

                $.each(data.result, function (key, val) {
                    $("#appNotAvblBody").append(
                        '<tr class="appNotAvblNum"> <td attr-no="' +
                            val.cxr_status +
                            '">' +
                            val.token_no +
                            "</td> </tr>"
                    );
                });
            },
            complete: function () {
                $("#noshow").iziModal("open");
            },
        });
    });

    //=========== Calling the Data when click on Appointment Number ================

    $(document).on("click", "tr.appNum", function () {
        var appointment = $(this).find("td:first-child").text();
        if (!$(this).hasClass("rowSaved")) {
            $("tr.appNum").removeClass("clickedRow");
            $(this).addClass("clickedRow").addClass("prevClicked");
            $.ajax({
                url: "/IOM/MhacCXRLoadData",
                type: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    command: "CheckAppointmentAvailable",
                    appNo: appointment,
                },
                success: function (data) {
                    if (data.result == false) {
                        $.ajax({
                            url: "/IOM/MhacCXRLoadData",
                            type: "post",
                            dataType: "json",
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            data: {
                                country: country,
                                command: "data",
                                appointment: appointment,
                            },
                            success: function (data) {
                                var age = getAge(data[4]);
                                $("#AppointmentNo").val(data[0]);
                                $("#PassportNo").val(data[1]);
                                $("#Age").val(age);
                                $("#gen").val(data[2]);
                                $("#fullnam").val(data[3]);

                                var dateofbirth = $.datepicker.formatDate(
                                    "mm/dd/yy",
                                    new Date(data[4])
                                );
                                $("#dob").val(dateofbirth);

                                // =========================================
                                var imgPath = "";
                                if (data[5] != null && data[5] != "") {
                                    imgPath = path + "/" + data[5];
                                } else {
                                    imgPath = imgPathBlade + "/imgcou.png";
                                }

                                $("#MemberImgTag").attr("src", imgPath);

                                $(".showHideDiv").show();
                            },
                        });
                    } else {
                        Swal("Appointment No Already Saved", "", "success");
                    }
                },
            });
        }
    });

    //===============================================================================

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

    //=========== Selected Token from No Show ======================================

    $(document).on("click", "tr.appNotAvblNum", function () {
        const $this = $(this);

        $("#clearingID").show();
        $("#currentTokenNo").text($this.find("td").text());

        $.ajax({
            url: "/IOM/MhacCXRLoadData",
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                country: country,
                command: "ChekTokNo",
                token: $this.find("td").text(),
            },
            success: function (data) {
                var result = data.result;
                if (result != 0) {
                    $.ajax({
                        url: "/IOM/MhacCXRLoadData",
                        type: "post",
                        dataType: "json",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        data: {
                            country: country,
                            command: "AppointmentNo",
                            token: $this.find("td").text(),
                        },
                        success: function (data) {
                            $("#appbody").html("");
                            $.each(data, function (key, val) {
                                $.ajax({
                                    url: "/IOM/MhacCXRLoadData",
                                    type: "post",
                                    dataType: "json",
                                    headers: {
                                        "X-CSRF-TOKEN": $(
                                            'meta[name="csrf-token"]'
                                        ).attr("content"),
                                    },
                                    data: {
                                        command: "CheckAppointmentAvailable",
                                        appNo: val,
                                    },
                                    async: false,
                                    success: function (data) {
                                        if (data.result == true) {
                                            $("#appbody").append(
                                                '<tr class="appNum rowSaved"> <td>' +
                                                    val +
                                                    "</td> </tr>"
                                            );
                                            arr.splice($.inArray(val, arr), 1);
                                        } else {
                                            $("#appbody").append(
                                                '<tr class="appNum"> <td>' +
                                                    val +
                                                    "</td> </tr>"
                                            );
                                        }
                                    },
                                });
                            });

                            $("#noshow").iziModal("close");
                        },
                    });
                } else {
                    Swal(
                        "This token already called by counter!",
                        "",
                        "warning"
                    );
                    $("#noshow").iziModal("close");
                }
            },
        });
    });
    // ============================================================================

    //============================ Save Data ======================================

    $("#cxr_not_done_other").on("change", function (event) {
        var checkbox = event.target;
        if (checkbox.checked) {
            $("#not_done_other_text").show();
        } else {
            $("#not_done_other_text").hide();
        }
    });

    $("#cxr_done_other").on("change", function (event) {
        var checkbox = event.target;
        if (checkbox.checked) {
            $("#cxr_done_others_details").show();
        } else {
            $("#cxr_done_others_details").hide();
        }
    });

    $("#CXRCompleted").on("click", function () {
        if ($("#AppointmentNo").val() != "") {
            Swal.fire({
                title: "Are you sure?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Submit!",
            }).then((result) => {
                if (result.value) {
                    var cxr_done = false;
                    var cxr_not_done = false;
                    if (
                        $(
                            "input:radio[name=stacked-radio-left]:checked"
                        ).val() == "Done"
                    ) {
                        cxr_done = true;
                    } else if (
                        $(
                            "input:radio[name=stacked-radio-left]:checked"
                        ).val() == "NotDone"
                    ) {
                        cxr_not_done = true;
                    }

                    var cxr_def = false;
                    if ($("#cxr_def").is(":checked")) {
                        cxr_def = true;
                    }

                    var cxr_preg_sc = false;
                    if ($("#cxr_preg_sc").is(":checked")) {
                        cxr_preg_sc = true;
                    }

                    var cxr_app_dec = false;
                    if ($("#cxr_app_dec").is(":checked")) {
                        cxr_app_dec = true;
                    }

                    var cxr_no_show = false;
                    if ($("#cxr_no_show").is(":checked")) {
                        cxr_no_show = true;
                    }

                    var cxr_child = false;
                    if ($("#cxr_child").is(":checked")) {
                        cxr_child = true;
                    }

                    var cxr_unbl_unwill_sc = false;
                    if ($("#cxr_unbl_unwill_sc").is(":checked")) {
                        cxr_unbl_unwill_sc = true;
                    }

                    var cxr_not_done_other = false;
                    var not_done_other_text = "";
                    if ($("#cxr_not_done_other").is(":checked")) {
                        cxr_not_done_other = true;
                        not_done_other_text = $("#not_done_other_text").val();
                    }

                    var cxr_done_plv_shld = false;
                    if ($("#cxr_done_plv_shld").is(":checked")) {
                        cxr_done_plv_shld = true;
                    }

                    var cxr_done_dbl_abd_shield = false;
                    if ($("#cxr_done_dbl_abd_shield").is(":checked")) {
                        cxr_done_dbl_abd_shield = true;
                    }

                    var cxr_done_other = false;
                    var done_other_text = "";
                    if ($("#cxr_done_other").is(":checked")) {
                        cxr_done_other = true;
                        done_other_text = $("#cxr_done_others_details").val();
                    }

                    var appointment = $("#AppointmentNo").val();
                    var token = $("#currentTokenNo").text();

                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth() + 1; //January is 0!

                    var yyyy = today.getFullYear();
                    if (dd < 10) {
                        dd = "0" + dd;
                    }
                    if (mm < 10) {
                        mm = "0" + mm;
                    }
                    var today = yyyy + "" + mm + "" + dd;

                    $.ajax({
                        url: "/IOM/MhacCXRLoadData",
                        type: "post",
                        dataType: "json",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        data: {
                            command: "save",
                            country: country,
                            token: token,
                            appointment: appointment,
                            passport: $("#PassportNo").val(),
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
                            AppointmentNo: $("#AppointmentNo").val(),
                        },
                        success: function (data) {
                            $("#appbody tr.clickedRow.prevClicked")
                                .removeClass("clickedRow prevClicked")
                                .addClass("rowSaved");

                            Swal("Data Saved", "", "success");
                            arr.splice(
                                $.inArray($("#AppointmentNo").val(), arr),
                                1
                            );

                            var allRowsHaveClasses = true;

                            $("#appbody tr").each(function () {
                                if (!$(this).hasClass("rowSaved")) {
                                    allRowsHaveClasses = false;
                                    return false; // Break out of the loop early if a row doesn't have the classes
                                }
                            });

                            if (allRowsHaveClasses) {
                                $("#currentTokenNo").text("-");
                                location.reload();
                            }
                        },
                        complete: function () {
                            $("#AppointmentNo").val("");
                            $("#PassportNo").val("");
                            $("#cxr_def")
                                .prop("checked", false)
                                .uniform("refresh");
                            $("#cxr_preg_sc")
                                .prop("checked", false)
                                .uniform("refresh");
                            $("#cxr_app_dec")
                                .prop("checked", false)
                                .uniform("refresh");
                            $("#cxr_no_show")
                                .prop("checked", false)
                                .uniform("refresh");
                            $("#cxr_child")
                                .prop("checked", false)
                                .uniform("refresh");
                            $("#cxr_unbl_unwill_sc")
                                .prop("checked", false)
                                .uniform("refresh");
                            $("#cxr_not_done_plv_shld")
                                .prop("checked", false)
                                .uniform("refresh");
                            $("#cxr_done_other")
                                .prop("checked", false)
                                .uniform("refresh");
                            $("#cxr_not_done_other")
                                .prop("checked", false)
                                .uniform("refresh");

                            $("#cxr_done_plv_shld")
                                .prop("checked", false)
                                .uniform("refresh");
                            $("#cxr_done_dbl_abd_shield")
                                .prop("checked", false)
                                .uniform("refresh");
                            $("#cxr_done_others_details").val("");
                            $("#not_done_other_text").val("");
                            $("#cxr_done_others_details").hide();
                            $("#not_done_other_text").hide();

                            $("#cxr_done").prop("checked", false);
                            $.uniform.update("#cxr_done");
                            $("#cxr_not_done").prop("checked", true);
                            $.uniform.update("#cxr_not_done");

                            $("#fullnam").val("");
                            $("#Age").val("");
                            $("#gen").val("");
                            $("#dob").val("");
                        },
                    });
                }
            });
        } else {
            Swal("Please Select Appointment No", "", "error");
        }
    });
});
