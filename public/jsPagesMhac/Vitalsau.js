$(document).ready(function () {
    var str = "No";
    var arr = [];
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

    //==========================================================================================================

    function getPendingTokens() {
        $.ajax({
            url: `/${getUrl()}/VitalsLoadData`,
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

    //==========================================================================================================

    $("#next").on("click", function () {
        str = "Yes";
        $.ajax({
            url: `/${getUrl()}/VitalsLoadData`, // URL to your backend endpoint
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

    //==========================================================================================================

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

    getRecallListTokens();
    setInterval(function () {
        getRecallListTokens();
        bar2.set(0);
        bar2.animate(1);
    }, 40000);

    //==========================================================================================================

    function getRecallListTokens() {
        $.ajax({
            url: `/${getUrl()}/VitalsLoadData`,
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

                if (data) {
                    $("#callAgainTokens").text(data);
                } else {
                    $("#callAgainTokens").text("-");
                }
            },
        });
    }

    //=========== Recall =============================================

    $("#recall").on("click", function () {
        str = "Yes";
        $.ajax({
            url: `/${getUrl()}/VitalsLoadData`,
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
                $("#appNotAvblBody").html("");
                $.each(data.result, function (key, val) {
                    $("#appNotAvblBody").append(
                        '<tr class="appNotAvblNum"> <td attr-no="' +
                            val.vital_status +
                            '">' +
                            val.token_no +
                            "</td> </tr>"
                    );
                });
            },
        });
        $("#noshow").iziModal("open");
    });

    //=========== Calling the Data when click on Appointment Number ================

    $(document).on("click", "tr.appNum", function () {
        var appointment = $(this).find("td:first-child").text();
        if (!$(this).hasClass("rowSaved")) {
            $("tr.appNum").removeClass("clickedRow");
            $(this).addClass("clickedRow").addClass("prevClicked");
            $.ajax({
                url: `/${getUrl()}/VitalsLoadData`,
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
                            url: `/${getUrl()}/VitalsLoadData`,
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
                                var age = getAge(data[2]);
                                $("#AppointmentNo").val(data[0]);
                                $("#PassportNo").val(data[1]);
                                $("#Age").val(age);

                                // =========================================
                                var imgPath = "";
                                if (data[3] != null && data[3] != "") {
                                    imgPath = path + "/" + data[3];
                                } else {
                                    imgPath = imgPathBlade + "/imgcou.png";
                                }

                                $("#photoBoothImgChange").attr("src", imgPath);
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
            url: `/${getUrl()}/VitalsLoadData`,
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
                        url: `/${getUrl()}/VitalsLoadData`,
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
                                    url: `/${getUrl()}/VitalsLoadData`,
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
    //=========== Not Available ====================================================

    $("#notAvailable").on("click", function () {
        if (str.length > 2) {
            $.ajax({
                url: `/${getUrl()}/VitalsLoadData`,
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
                    $(".showHideDiv").hide();
                    getRecallListTokens();
                },
            });
        } else {
            Swal("No Tokens", "", "error");
        }
    });

    //==========save vitals ======================================================

    $("#btnSave").on("click", function () {
        Swal.fire({
            title: "Are you sure?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Submit!",
        }).then((result) => {
            if (result.value) {
                if (validate("#clearingID")) {
                    var weight = $("#weight").val();
                    var height = $("#height").val();
                    var bmi = $("#bmi").val();
                    var bp = $("#bloodpressure").val();
                    var appointmentno = $("#AppointmentNo").val();
                    var passportno = $("#PassportNo").val();

                    if (weight == "" || height == "" || bmi == "" || bp == "") {
                        Swal("Please fill all the fields", "", "error");
                    } else {
                        $.ajax({
                            url: `/${getUrl()}/VitalsLoadData`,
                            type: "post",
                            dataType: "json",
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },

                            data: {
                                command: "save",
                                country: country,
                                token: $("#currentTokenNo").text(),
                                weight: weight,
                                height: height,
                                bmi: bmi,
                                bp: bp,
                                appointmentno: appointmentno,
                                passportno: passportno,
                            },

                            success: function (data) {
                                $("#appbody tr.clickedRow.prevClicked")
                                    .removeClass("clickedRow prevClicked")
                                    .addClass("rowSaved");

                                Swal(
                                    "Vitals Saved Successfully",
                                    "",
                                    "success"
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
                                $("#weight").val("");
                                $("#height").val("");
                                $("#bmi").val("");
                                $("#bloodpressure").val("");
                                $("#Age").val("");
                            },
                        });
                    }
                }
            }
        });
    });

    //==========cancel vitals ======================================================

    $("#btnCancle").on("click", function () {
        location.reload(true);
    });
});
