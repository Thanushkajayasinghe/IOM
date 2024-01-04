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
        svgStyle: {
            width: "100%",
            height: "100%",
        },
        from: {
            color: "#FFEA82",
        },
        to: {
            color: "#ED6A5A",
        },
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
            url: `/${getUrl()}/MhacPhlebotomyLoadData`,
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

    $("#notAvailable").on("click", function () {
        if (str.length > 2) {
            $.ajax({
                url: `/${getUrl()}/MhacPhlebotomyLoadData`,
                type: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },

                data: {
                    country: country,
                    command: "NoShow",
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

    //==========================================================================================================

    $("#next").on("click", function () {
        str = "Yes";
        $.ajax({
            url: `/${getUrl()}/MhacPhlebotomyLoadData`, // URL to your backend endpoint
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                country: country,
                command: "next",
            },
            success: function (data) {
                $("#currentTokenNo").text(data.tokenName);
                $("#clearingID").show();
                $("#appbody").html(""); // Ensure it's appBody instead of appbody (case-sensitive)

                if (data.appointmentNo.length > 0) {
                    $.each(data.appointmentNo, function (key, val) {
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
        svgStyle: {
            width: "100%",
            height: "100%",
        },
        from: {
            color: "#00838f",
        },
        to: {
            color: "#BBBA82",
        },
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
            url: `/${getUrl()}/MhacPhlebotomyLoadData`,
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
            url: `/${getUrl()}/MhacPhlebotomyLoadData`,
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
                            val.phlebotomy_status +
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
                url: `/${getUrl()}/MhacPhlebotomyLoadData`,
                type: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    command: "data",
                    appointment: $(this).text(),
                },
                success: function (data) {
                    var age = getAge(data[2]);
                    $("#AppointmentNo").val(data[0]);
                    $("#PassportNo").val(data[1]);
                    $("#Age").val(age);
                    $("#genderTxtHi").val(data[3]);

                    var imgPath = "";
                    if (data[4] != null && data[4] != "") {
                        imgPath = path + "/" + data[4];
                    } else {
                        imgPath = imgPathBlade + "/imgcou.png";
                    }
                    $("#photoBoothImgChange").attr("src", imgPath);

                    $(".showHideDiv").show();
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
            url: `/${getUrl()}/MhacPhlebotomyLoadData`,
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
                        url: `/${getUrl()}/MhacPhlebotomyLoadData`,
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
                                    url: `/${getUrl()}/MhacPhlebotomyLoadData`,
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
                    var HivCheck = "false";
                    var MalariaCheck = "false";
                    var FilariaCheck = "false";
                    var ShcgCheck = "false";
                    var UrineCheck = "false";

                    if ($('[id="hiv_check"]').is(":checked")) {
                        HivCheck = "true";
                    } else {
                        HivCheck = "false";
                    }

                    if ($('[id="malaria_check"]').is(":checked")) {
                        MalariaCheck = "true";
                    } else {
                        MalariaCheck = "false";
                    }

                    if ($('[id="filaria_check"]').is(":checked")) {
                        FilariaCheck = "true";
                    } else {
                        FilariaCheck = "false";
                    }

                    if ($('[id="shcg_check"]').is(":checked")) {
                        ShcgCheck = "true";
                    } else {
                        ShcgCheck = "false";
                    }

                    if ($('[id="urine_check"]').is(":checked")) {
                        UrineCheck = "true";
                    } else {
                        UrineCheck = "false";
                    }

                    var hiv = HivCheck;
                    var filaria = FilariaCheck;
                    var malaria = MalariaCheck;
                    var shcg = ShcgCheck;
                    var urine = UrineCheck;
                    var appointmentno = $("#AppointmentNo").val();
                    var passportno = $("#PassportNo").val();

                    if (
                        HivCheck == false ||
                        FilariaCheck == false ||
                        MalariaCheck == false
                    ) {
                        Swal(
                            "Please Check HIV, Filaria and Malaria",
                            "",
                            "error"
                        );
                    } else {
                        $.ajax({
                            url: `/${getUrl()}/MhacPhlebotomyLoadData`,
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
                                hiv: hiv,
                                filaria: filaria,
                                malaria: malaria,
                                shcg: shcg,
                                urine: urine,
                                appointmentno: appointmentno,
                                passportno: passportno,
                            },

                            success: function (data) {
                                Swal.fire({
                                    type: "success",
                                    title: "Data Saved Successfully!",
                                    confirmButtonColor: "#3085d6",
                                    confirmButtonText: "OK",
                                }).then((result) => {
                                    if (result.value) {
                                        $(".modalBarcode").modal("show");

                                        barcode = data.barcode.trim();
                                        tokenBar = data.token;
                                        indexBar = data.index;

                                        JsBarcode(
                                            "#barcodeContainer",
                                            barcode,
                                            {
                                                fontSize: 24,
                                                height: 75,
                                                marginTop: -80,
                                            }
                                        );

                                        $("#barcodeContainer").attr(
                                            "height",
                                            "90px"
                                        );
                                        $("#barcodeContainer").attr(
                                            "viewBox",
                                            "0 0 354 3"
                                        );

                                        var content = $(
                                            "#barcodeContainer g"
                                        ).html();

                                        var gender = "";
                                        if (
                                            $("#genderTxtHi").val() == "Female"
                                        ) {
                                            gender = "F";
                                        } else {
                                            gender = "M";
                                        }

                                        var currentdate = new Date();
                                        var datetime =
                                            "" +
                                            currentdate.getFullYear() +
                                            "/" +
                                            (currentdate.getMonth() + 1) +
                                            "/" +
                                            currentdate.getDate() +
                                            " " +
                                            (
                                                "00" + currentdate.getHours()
                                            ).substr(-2) +
                                            ":" +
                                            (
                                                "00" + currentdate.getMinutes()
                                            ).substr(-2) +
                                            ":" +
                                            (
                                                "00" + currentdate.getSeconds()
                                            ).substr(-2);

                                        $("#barcodeContainer g").html(
                                            content +
                                                '<text style="font: 20px monospace; font-weight: bold;" text-anchor="middle" x="112" y="122">' +
                                                gender +
                                                " " +
                                                $("#ageTxtHi").val() +
                                                "Y T" +
                                                tokenBar +
                                                " " +
                                                indexBar +
                                                "</text>" +
                                                '<text style="font: 20px monospace; font-weight: bold;" text-anchor="middle" x="112" y="140">' +
                                                datetime +
                                                "</text>"
                                        );

                                        $("#AppointmentNo").val("");
                                        $("#PassportNo").val("");
                                        $("#Age").val("");
                                        $("#shcg_check").prop("checked", false);
                                        $("#urine_check").prop(
                                            "checked",
                                            false
                                        );
                                        barcode = "";
                                        trr = 0;

                                        $("#appbody tr.clickedRow.prevClicked")
                                            .removeClass(
                                                "clickedRow prevClicked"
                                            )
                                            .addClass("rowSaved");

                                        $(".showHideDiv").hide();
                                    }
                                });

                                //location.reload();
                                arr = [];
                            },
                            complete: function () {},
                        });
                    }
                } //
            }
        });
    });

    $("#btnPrintBarcodeCon").on("click", function () {
        var DocumentContainer = document.getElementById(
            "modalContainerPrintable"
        );
        var WindowObject = window.open(
            "",
            "PrintWindow",
            "width=500,height=200"
        );
        WindowObject.document.writeln(DocumentContainer.innerHTML);
        WindowObject.document.close();
        WindowObject.focus();
        WindowObject.print();
        WindowObject.close();
    });

    $("#btnCancle").on("click", function () {
        location.reload(true);
    });
});
