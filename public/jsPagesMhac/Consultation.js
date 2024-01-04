$(document).ready(function () {
    var AppNum = "";
    // Get the current URL from the address bar
    const currentURL = window.location.href;

    // Split the URL by "/"
    const parts = currentURL.split("/");

    // Get the last part of the URL
    const lastPart = parts[parts.length - 1];

    // Get the last two letters
    const lastTwoLetters = lastPart.slice(-2);

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

    bar1.animate(1.0);

    getPendingTokens();
    setInterval(function () {
        getPendingTokens();
        bar1.set(0);
        bar1.animate(1);
    }, 20000);

    bar2.animate(1.0);

    getRecallListTokens();
    setInterval(function () {
        getRecallListTokens();
        bar2.set(0);
        bar2.animate(1);
    }, 40000);

    function getPendingTokens() {
        $.ajax({
            url: `/${getUrl()}/DoctorLoadData`,
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                country: lastTwoLetters,
                command: "pendingToken",
            },

            success: function (response) {
                $("#CTNumber").text(response.result);
                $("#curCounter").text(response.counter);
            },
        });
    }

    function getRecallListTokens() {
        $.ajax({
            url: `/${getUrl()}/DoctorLoadData`,
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                country: lastTwoLetters,
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

    //============ Next ===============================================
    $("#next").on("click", function () {
        AppNum = "";
        str = "Yes";
        $.ajax({
            url: `/${getUrl()}/DoctorLoadData`, // URL to your backend endpoint
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                country: lastTwoLetters,
                command: "next",
            },
            success: function (response) {
                $("#currentTokenNo").text(response.tokenName);
                $("#clearingID").show();
                $(".detailbody").hide();
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

    //=========== Recall =============================================

    $("#recall").on("click", function () {
        str = "Yes";
        AppNum = "";
        $.ajax({
            url: `/${getUrl()}/DoctorLoadData`,
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                country: lastTwoLetters,
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
        $(".detailbody").hide();
    });

    $(document).on("click", "tr.appNum", function () {
        var appointment = $(this).find("td:first-child").text();
        AppNum = "";
        AppNum = appointment;
        if (!$(this).hasClass("rowSaved")) {
            $("tr.appNum").removeClass("clickedRow");
            $(this).addClass("clickedRow").addClass("prevClicked");
            $.ajax({
                url: `/${getUrl()}/DoctorLoadData`,
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
                            url: `/${getUrl()}/DoctorLoadData`,
                            type: "post",
                            dataType: "json",
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            data: {
                                country: lastTwoLetters,
                                command: "data",
                                appointment: appointment,
                            },
                            success: function (data) {
                                var age = getAge(data[4]);
                                $("#registration_id").val(data[0]);
                                $("#PassportNumber").val(data[1]);
                                $("#NameInFull").val(data[3]);
                                $("#age").val(age);
                                $("#birthdayCon").val(data[4]);
                                $("#gender").val(data[2]);

                                $("#SlAddress").val(data[6]);
                                $("#SlStreet").val(data[7]);
                                $("#SlCity").val(data[8]);
                                $("#SlPostalCode").val(data[9]);

                                $("#SlTelephoneFixedLine").val(data[10]);
                                $("#SlMobile").val(data[11]);
                                // =========================================
                                var imgPath = "";
                                if (data[5] != null && data[5] != "") {
                                    imgPath = path + "/" + data[5];
                                } else {
                                    imgPath = imgPathBlade + "/imgcou.png";
                                }

                                $("#img").attr("src", imgPath);
                                $(".detailbody").show();
                            },
                        });
                    } else {
                        $.ajax({
                            url: `/${getUrl()}/DoctorLoadData`,
                            type: "post",
                            dataType: "json",
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            data: {
                                country: lastTwoLetters,
                                command: "data",
                                appointment: appointment,
                            },
                            success: function (data) {
                                var age = getAge(data[4]);
                                $("#registration_id").val(data[0]);
                                $("#PassportNumber").val(data[1]);
                                $("#NameInFull").val(data[3]);
                                $("#age").val(age);
                                $("#birthdayCon").val(data[4]);
                                $("#gender").val(data[2]);

                                $("#SlAddress").val(data[6]);
                                $("#SlStreet").val(data[7]);
                                $("#SlCity").val(data[8]);
                                $("#SlPostalCode").val(data[9]);

                                $("#SlTelephoneFixedLine").val(data[10]);
                                $("#SlMobile").val(data[11]);
                                // =========================================
                                var imgPath = "";
                                if (data[5] != null && data[5] != "") {
                                    imgPath = path + "/" + data[5];
                                } else {
                                    imgPath = imgPathBlade + "/imgcou.png";
                                }

                                $("#img").attr("src", imgPath);
                                $(".detailbody").show();
                            },
                        });
                    }
                },
            });

            $.ajax({
                url: `/${getUrl()}/DoctorLoadData`,
                type: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    command: "ConsultationLoadTestResults",
                    appointment: appointment,
                },
                success: function (data) {
                    if (data.result != null) {
                        var html = "";
                        var co = 0;
                        $(data.result).each(function (key, val) {
                            if (val.hiv == true) {
                                co++;
                                $(data.result2).each(function (key, val2) {
                                    if (val2.hiv_result == "Positive") {
                                        html +=
                                            '<tr style="background-color: #fb0101 !important;color: white;font-weight: bold;">';
                                        html +=
                                            "<td style='display: none;'>" +
                                            val2.id +
                                            "</td>";
                                        html += "<td>" + co + "</td>";
                                        html += "<td>HIV</td>";
                                        html +=
                                            "<td>" + val2.hiv_result + "</td>";
                                        html +=
                                            '<td><input class="form-control" type="text" id=\'txtComment' +
                                            key +
                                            "' value='" +
                                            val2.hiv_remark +
                                            "'></td>";
                                        html += "</tr>";
                                        html += "<tr>";
                                    } else {
                                        html += "<tr>";
                                        html +=
                                            "<td style='display: none;'>" +
                                            val2.id +
                                            "</td>";
                                        html += "<td>" + co + "</td>";
                                        html += "<td>HIV</td>";
                                        html +=
                                            "<td>" + val2.hiv_result + "</td>";
                                        html +=
                                            '<td><input class="form-control" type="text" id=\'txtComment' +
                                            key +
                                            "' value='" +
                                            val2.hiv_remark +
                                            "'></td>";
                                        html += "</tr>";
                                        html += "<tr>";
                                    }
                                });
                            }
                            if (val.filaria == true) {
                                co++;
                                $(data.result2).each(function (key, val2) {
                                    if (val2.filaria_result == "Positive") {
                                        html +=
                                            '<tr style="background-color: #fb0101 !important;color: white;font-weight: bold;">';
                                        html +=
                                            "<td style='display: none;'>" +
                                            val2.id +
                                            "</td>";
                                        html += "<td>" + co + "</td>";
                                        html += "<td>Filaria</td>";
                                        html +=
                                            "<td>" +
                                            val2.filaria_result +
                                            "</td>";
                                        html +=
                                            '<td><input class="form-control" type="text" id=\'txtComment' +
                                            key +
                                            "' value='" +
                                            val2.filaria_remark +
                                            "'></td>";
                                        html += "</tr>";
                                        html += "<tr>";
                                    } else {
                                        html += "<tr>";
                                        html +=
                                            "<td style='display: none;'>" +
                                            val2.id +
                                            "</td>";
                                        html += "<td>" + co + "</td>";
                                        html += "<td>Filaria</td>";
                                        html +=
                                            "<td>" +
                                            val2.filaria_result +
                                            "</td>";
                                        html +=
                                            '<td><input class="form-control" type="text" id=\'txtComment' +
                                            key +
                                            "' value='" +
                                            val2.filaria_remark +
                                            "'></td>";
                                        html += "</tr>";
                                        html += "<tr>";
                                    }
                                });
                            }
                            if (val.malaria == true) {
                                co++;
                                $(data.result2).each(function (key, val2) {
                                    if (val2.malaria_result == "Positive") {
                                        html +=
                                            '<tr style="background-color: #fb0101 !important;color: white;font-weight: bold;">';
                                        html +=
                                            "<td style='display: none;'>" +
                                            val2.id +
                                            "</td>";
                                        html += "<td>" + co + "</td>";
                                        html += "<td>Malaria</td>";
                                        html +=
                                            "<td>" +
                                            val2.malaria_result +
                                            "</td>";
                                        html +=
                                            '<td><input class="form-control" type="text" id=\'txtComment' +
                                            key +
                                            "' value='" +
                                            val2.malaria_remark +
                                            "'></td>";
                                        html += "</tr>";
                                        html += "<tr>";
                                    } else {
                                        html += "<tr>";
                                        html +=
                                            "<td style='display: none;'>" +
                                            val2.id +
                                            "</td>";
                                        html += "<td>" + co + "</td>";
                                        html += "<td>Malaria</td>";
                                        html +=
                                            "<td>" +
                                            val2.malaria_result +
                                            "</td>";
                                        html +=
                                            '<td><input class="form-control" type="text" id=\'txtComment' +
                                            key +
                                            "' value='" +
                                            val2.malaria_remark +
                                            "'></td>";
                                        html += "</tr>";
                                        html += "<tr>";
                                    }
                                });
                            }
                            if (val.shcg == true) {
                                co++;
                                $(data.result2).each(function (key, val2) {
                                    if (val2.shcg_result == "Positive") {
                                        html +=
                                            '<tr style="background-color: #fb0101 !important;color: white;font-weight: bold;">';
                                        html +=
                                            "<td style='display: none;'>" +
                                            val2.id +
                                            "</td>";
                                        html += "<td>" + co + "</td>";
                                        html += "<td>SHCG</td>";
                                        html +=
                                            "<td>" + val2.shcg_result + "</td>";
                                        html +=
                                            '<td><input class="form-control" type="text" id=\'txtComment' +
                                            key +
                                            "' value='" +
                                            val2.shcg_remark +
                                            "'></td>";
                                        html += "</tr>";
                                        html += "<tr>";
                                    } else {
                                        html += "<tr>";
                                        html +=
                                            "<td style='display: none;'>" +
                                            val2.id +
                                            "</td>";
                                        html += "<td>" + co + "</td>";
                                        html += "<td>SHCG</td>";
                                        html +=
                                            "<td>" + val2.shcg_result + "</td>";
                                        html +=
                                            '<td><input class="form-control" type="text" id=\'txtComment' +
                                            key +
                                            "' value='" +
                                            val2.shcg_remark +
                                            "'></td>";
                                        html += "</tr>";
                                        html += "<tr>";
                                    }
                                });
                            }
                            if (val.urine == true) {
                                co++;
                                $(data.result2).each(function (key, val2) {
                                    if (val2.urine_result == "Positive") {
                                        html +=
                                            '<tr style="background-color: #fb0101 !important;color: white;font-weight: bold;">';
                                        html +=
                                            "<td style='display: none;'>" +
                                            val2.id +
                                            "</td>";
                                        html += "<td>" + co + "</td>";
                                        html += "<td>Urine</td>";
                                        html +=
                                            "<td>" +
                                            val2.urine_result +
                                            "</td>";
                                        html +=
                                            '<td><input class="form-control" type="text" id=\'txtComment' +
                                            key +
                                            "' value='" +
                                            val2.urine_remark +
                                            "'></td>";
                                        html += "</tr>";
                                        html += "<tr>";
                                    } else {
                                        html += "<tr>";
                                        html +=
                                            "<td style='display: none;'>" +
                                            val2.id +
                                            "</td>";
                                        html += "<td>" + co + "</td>";
                                        html += "<td>Urine</td>";
                                        html +=
                                            "<td>" +
                                            val2.urine_result +
                                            "</td>";
                                        html +=
                                            '<td><input class="form-control" type="text" id=\'txtComment' +
                                            key +
                                            "' value='" +
                                            val2.urine_remark +
                                            "'></td>";
                                        html += "</tr>";
                                        html += "<tr>";
                                    }
                                });
                            }
                        });
                    } else {
                        $("#tableContainer").hide();
                    }
                    $("#rapidTestResultsTBody").html();
                    $("#rapidTestResultsTBody").html(html);
                    $("#tableContainer").show();

                    loadCheckBox(AppNum);
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

    function loadCheckBox(AppNO) {
        var AppNO = AppNO;

        $.ajax({
            url: `/${getUrl()}/DoctorLoadData`,
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            async: false,
            data: {
                AppNo: AppNO,
                command: "ConsultationLoadChkbox",
            },
            success: function (data) {
                $(data.result2).each(function (key, val) {
                    var ty1 = val.cm_cough;
                    $('input[name="ty1"]')
                        .prop("checked", false)
                        .uniform("refresh");
                    $('input[name="ty1"][value=' + ty1 + "]")
                        .prop("checked", true)
                        .uniform("refresh");
                    // ================================================================
                    var ty2 = val.cm_haemoptysis;
                    $('input[name="ty2"]')
                        .prop("checked", false)
                        .uniform("refresh");
                    $('input[name="ty2"][value=' + ty2 + "]")
                        .prop("checked", true)
                        .uniform("refresh");
                    // ================================================================
                    var ty3 = val.cm_night_sweats;
                    $('input[name="ty3"]')
                        .prop("checked", false)
                        .uniform("refresh");
                    $('input[name="ty3"][value=' + ty3 + "]")
                        .prop("checked", true)
                        .uniform("refresh");
                    // ================================================================
                    var ty4 = val.cm_weight_loss;
                    $('input[name="ty4"]')
                        .prop("checked", false)
                        .uniform("refresh");
                    $('input[name="ty4"][value=' + ty4 + "]")
                        .prop("checked", true)
                        .uniform("refresh");
                    // ================================================================
                    var ty5 = val.cm_fever;
                    $('input[name="ty5"]')
                        .prop("checked", false)
                        .uniform("refresh");
                    $('input[name="ty5"][value=' + ty5 + "]")
                        .prop("checked", true)
                        .uniform("refresh");
                    // ================================================================
                    var tyr1 = val.cm_any;
                    $('input[name="tyr1"]')
                        .prop("checked", false)
                        .uniform("refresh");
                    $('input[name="tyr1"][value=' + tyr1 + "]")
                        .prop("checked", true)
                        .uniform("refresh");
                    // ================================================================
                    var tyr2 = val.cm_prev_thor_surgery;
                    $('input[name="tyr2"]')
                        .prop("checked", false)
                        .uniform("refresh");
                    $('input[name="tyr2"][value=' + tyr2 + "]")
                        .prop("checked", true)
                        .uniform("refresh");
                    // ================================================================
                    var tyr3 = val.cm_cyanosis;
                    $('input[name="tyr3"]')
                        .prop("checked", false)
                        .uniform("refresh");
                    $('input[name="tyr3"][value=' + tyr3 + "]")
                        .prop("checked", true)
                        .uniform("refresh");
                    // ================================================================
                    var tyr4 = val.cm_resp_insufficient;
                    $('input[name="tyr4"]')
                        .prop("checked", false)
                        .uniform("refresh");
                    $('input[name="tyr4"][value=' + tyr4 + "]")
                        .prop("checked", true)
                        .uniform("refresh");
                    // ================================================================
                    var tyg1 = val.cm_history_tb;
                    $('input[name="tyg1"]')
                        .prop("checked", false)
                        .uniform("refresh");
                    $('input[name="tyg1"][value=' + tyg1 + "]")
                        .prop("checked", true)
                        .uniform("refresh");
                    // ================================================================
                    var tyg2 = val.cm_household_tb;
                    $('input[name="tyg2"]')
                        .prop("checked", false)
                        .uniform("refresh");
                    $('input[name="tyg2"][value=' + tyg2 + "]")
                        .prop("checked", true)
                        .uniform("refresh");
                    // ================================================================
                    var tyg3 = val.cm_active_tb;
                    $('input[name="tyg3"]')
                        .prop("checked", false)
                        .uniform("refresh");
                    $('input[name="tyg3"][value=' + tyg3 + "]")
                        .prop("checked", true)
                        .uniform("refresh");
                    // ================================================================
                    var cm_exams_results = val.cm_exams_results;
                    $("#examsresults").val(cm_exams_results);

                    if (val.cm_single_fibrous_streak == 1) {
                        $("#chkbox1").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_bony_islets == 1) {
                        $("#chkbox2").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_pleural_capping == 1) {
                        $("#chkbox3").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_unilateral_bilateral == 1) {
                        $("#chkbox4").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_calcified_nodule == 1) {
                        $("#chkbox5").prop("checked", true).uniform("refresh");
                    }

                    if (val.cm_solitary_granuloma_hilum == 1) {
                        $("#chkbox6").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_solitary_granuloma_enlarged == 1) {
                        $("#chkbox7").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_single_multi_calc_pulmonary == 1) {
                        $("#chkbox8").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_calcified_pleural_lesions == 1) {
                        $("#chkbox9").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_costophrenic_angle == 1) {
                        $("#chkbox10").prop("checked", true).uniform("refresh");
                    }

                    if (val.cm_notable_apical == 1) {
                        $("#chkbox11").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_aplcal_fbronodualar == 1) {
                        $("#chkbox12").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_multi_single_pulmonary_nodu_micronodules == 1) {
                        $("#chkbox13").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_isolated_hilar == 1) {
                        $("#chkbox14").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_multi_single_pulmonary_nodu_masses == 1) {
                        $("#chkbox15").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_non_calcified_pleural_fibrosos == 1) {
                        $("#chkbox16").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_interstltial_fbrosos == 1) {
                        $("#chkbox17").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_any_cavitating_lesion == 1) {
                        $("#chkbox18").prop("checked", true).uniform("refresh");
                    }

                    if (val.cm_skeleton_soft_issue == 1) {
                        $("#chkbox19").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_cardiac_major_vessels == 1) {
                        $("#chkbox20").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_lung_fields == 1) {
                        $("#chkbox21").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_other == 1) {
                        $("#chkbox22").prop("checked", true).uniform("refresh");
                    }
                    $("#rad_comment2").val(val.cm_rad_comment);
                    $("#cm_dpp_comment").val(val.cm_dpp_comment);
                    $("#CXRay").val(val.cm_cxray);
                    // -----------------------------------------------------
                    if (val.cm_hiv_1 == 1) {
                        $("#chkbox70").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_hiv_2 == 1) {
                        $("#chkbox71").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_hiv_3 == 1) {
                        $("#chkbox72").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_hiv_4_1 == 1) {
                        $("#chkbox73").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_hiv_4_2 == 1) {
                        $("#chkbox74").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_hiv_5_0 == 1) {
                        $("#chkbox75").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_hiv_5_1 == 1) {
                        $("#chkbox76").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_hiv_6 == 1) {
                        $("#chkbox77").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_hiv_7 == 1) {
                        $("#chkbox78").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_hiv_8 == 1) {
                        $("#chkbox79").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_hiv_9_0 == 1) {
                        $("#chkbox80").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_hiv_9_1 == 1) {
                        $("#chkbox81").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_hiv_10 == 1) {
                        $("#chkbox82").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_hiv_11 == 1) {
                        $("#chkbox83").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_hiv_12 == 1) {
                        $("#chkbox84").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_hiv_13 == 1) {
                        $("#chkbox85").prop("checked", true).uniform("refresh");
                    }

                    if (val.cm_Malaria_14 == 1) {
                        $("#rchkbox86")
                            .prop("checked", true)
                            .uniform("refresh");
                    }
                    if (val.cm_Malaria_15 == 1) {
                        $("#rchkbox87")
                            .prop("checked", true)
                            .uniform("refresh");
                    }
                    if (val.cm_Malaria_16 == 1) {
                        $("#rchkbox88")
                            .prop("checked", true)
                            .uniform("refresh");
                    }
                    if (val.cm_Malaria_17 == 1) {
                        $("#rchkbox89")
                            .prop("checked", true)
                            .uniform("refresh");
                    }
                    if (val.cm_Malaria_18 == 1) {
                        $("#rchkbox90")
                            .prop("checked", true)
                            .uniform("refresh");
                    }
                    if (val.cm_Malaria_19 == 1) {
                        $("#rchkbox91")
                            .prop("checked", true)
                            .uniform("refresh");
                    }
                    if (val.cm_Malaria_20 == 1) {
                        $("#chkbox92").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_Filaria_21 == 1) {
                        $("#chkbox93").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_Filaria_22 == 1) {
                        $("#chkbox94").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_Filaria_23 == 1) {
                        $("#chkbox95").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_Filaria_24 == 1) {
                        $("#chkbox96").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_Filaria_25 == 1) {
                        $("#chkbox97").prop("checked", true).uniform("refresh");
                    }
                    if (val.cm_Filaria_26 == 1) {
                        $("#chkbox98").prop("checked", true).uniform("refresh");
                    }
                });
            },
        });
    }

    //=========== Selected Token from No Show ======================================

    $(document).on("click", "tr.appNotAvblNum", function () {
        const $this = $(this);

        $("#clearingID").show();
        $("#currentTokenNo").text($this.find("td").text());

        $.ajax({
            url: `/${getUrl()}/DoctorLoadData`,
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                country: lastTwoLetters,
                command: "ChekTokNo",
                token: $this.find("td").text(),
            },
            success: function (data) {
                var result = data.result;
                if (result != 0) {
                    $.ajax({
                        url: `/${getUrl()}/DoctorLoadData`,
                        type: "post",
                        dataType: "json",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        data: {
                            country: lastTwoLetters,
                            command: "AppointmentNo",
                            token: $this.find("td").text(),
                        },
                        success: function (data) {
                            $("#appbody").html("");
                            $.each(data, function (key, val) {
                                $.ajax({
                                    url: `/${getUrl()}/DoctorLoadData`,
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
                url: `/${getUrl()}/DoctorLoadData`,
                type: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },

                data: {
                    country: lastTwoLetters,
                    command: "notAvailable",
                    token: $("#currentTokenNo").text(),
                },

                success: function (data) {
                    Swal("Added to Queue", "", "success");
                    $("#currentTokenNo").text("-");
                    $("#appbody").html("");
                    arr = [];
                    AppNum = "";
                    $(".showHideDiv").hide();
                    getRecallListTokens();
                },
            });
        } else {
            Swal("No Tokens", "", "error");
        }
    });

    $("#save").on("click", function () {
        if ($("#appbody tr").hasClass("clickedRow")) {
            Swal.fire({
                title: "Are you sure?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Submit!",
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

                    if ($("#chkbox1").prop("checked") == true) {
                        chkbox1 = 1;
                    }
                    if ($("#chkbox2").prop("checked") == true) {
                        chkbox2 = 1;
                    }
                    if ($("#chkbox3").prop("checked") == true) {
                        chkbox3 = 1;
                    }
                    if ($("#chkbox4").prop("checked") == true) {
                        chkbox4 = 1;
                    }
                    if ($("chkbox5").prop("checked") == true) {
                        chkbox5 = 1;
                    }
                    if ($("#chkbox6").prop("checked") == true) {
                        chkbox6 = 1;
                    }
                    if ($("#chkbox7").prop("checked") == true) {
                        chkbox7 = 1;
                    }
                    if ($("#chkbox8").prop("checked") == true) {
                        chkbox8 = 1;
                    }
                    if ($("#chkbox9").prop("checked") == true) {
                        chkbox9 = 1;
                    }
                    if ($("#chkbox10").prop("checked") == true) {
                        chkbox10 = 1;
                    }
                    if ($("#chkbox11").prop("checked") == true) {
                        chkbox11 = 1;
                    }
                    if ($("#chkbox12").prop("checked") == true) {
                        chkbox12 = 1;
                    }
                    if ($("#chkbox13").prop("checked") == true) {
                        chkbox13 = 1;
                    }
                    if ($("#chkbox14").prop("checked") == true) {
                        chkbox14 = 1;
                    }
                    if ($("#chkbox15").prop("checked") == true) {
                        chkbox15 = 1;
                    }
                    if ($("#chkbox16").prop("checked") == true) {
                        chkbox16 = 1;
                    }
                    if ($("#chkbox17").prop("checked") == true) {
                        chkbox17 = 1;
                    }
                    if ($("#chkbox18").prop("checked") == true) {
                        chkbox18 = 1;
                    }
                    if ($("#chkbox19").prop("checked") == true) {
                        chkbox19 = 1;
                    }
                    if ($("#chkbox20").prop("checked") == true) {
                        chkbox20 = 1;
                    }
                    if ($("#chkbox21").prop("checked") == true) {
                        chkbox21 = 1;
                    }
                    if ($("#chkbox22").prop("checked") == true) {
                        chkbox22 = 1;
                    }

                    if ($("#chkbox70").prop("checked") == true) {
                        chkbox70 = 1;
                    }
                    if ($("#chkbox71").prop("checked") == true) {
                        chkbox71 = 1;
                    }
                    if ($("#chkbox72").prop("checked") == true) {
                        chkbox72 = 1;
                    }
                    if ($("#chkbox73").prop("checked") == true) {
                        chkbox73 = 1;
                    }
                    if ($("#chkbox74").prop("checked") == true) {
                        chkbox74 = 1;
                    }
                    if ($("#chkbox75").prop("checked") == true) {
                        chkbox75 = 1;
                    }
                    if ($("#chkbox76").prop("checked") == true) {
                        chkbox76 = 1;
                    }
                    if ($("#chkbox77").prop("checked") == true) {
                        chkbox77 = 1;
                    }
                    if ($("#chkbox78").prop("checked") == true) {
                        chkbox78 = 1;
                    }
                    if ($("#chkbox79").prop("checked") == true) {
                        chkbox79 = 1;
                    }

                    if ($("#chkbox80").prop("checked") == true) {
                        chkbox80 = 1;
                    }
                    if ($("#chkbox81").prop("checked") == true) {
                        chkbox81 = 1;
                    }
                    if ($("#chkbox82").prop("checked") == true) {
                        chkbox82 = 1;
                    }
                    if ($("#chkbox83").prop("checked") == true) {
                        chkbox83 = 1;
                    }
                    if ($("#chkbox84").prop("checked") == true) {
                        chkbox84 = 1;
                    }
                    if ($("#chkbox85").prop("checked") == true) {
                        chkbox85 = 1;
                    }
                    if ($("#chkbox86").prop("checked") == true) {
                        chkbox86 = 1;
                    }
                    if ($("#chkbox87").prop("checked") == true) {
                        chkbox87 = 1;
                    }
                    if ($("#chkbox88").prop("checked") == true) {
                        chkbox88 = 1;
                    }
                    if ($("#chkbox89").prop("checked") == true) {
                        chkbox89 = 1;
                    }
                    if ($("#chkbox90").prop("checked") == true) {
                        chkbox90 = 1;
                    }
                    if ($("#chkbox91").prop("checked") == true) {
                        chkbox91 = 1;
                    }
                    if ($("#chkbox92").prop("checked") == true) {
                        chkbox92 = 1;
                    }
                    if ($("#chkbox93").prop("checked") == true) {
                        chkbox93 = 1;
                    }
                    if ($("#chkbox94").prop("checked") == true) {
                        chkbox94 = 1;
                    }
                    if ($("#chkbox95").prop("checked") == true) {
                        chkbox95 = 1;
                    }
                    if ($("#chkbox96").prop("checked") == true) {
                        chkbox96 = 1;
                    }
                    if ($("#chkbox97").prop("checked") == true) {
                        chkbox97 = 1;
                    }
                    if ($("#chkbox98").prop("checked") == true) {
                        chkbox98 = 1;
                    }

                    $.ajax({
                        url: `/${getUrl()}/DoctorLoadData`,
                        type: "post",
                        dataType: "json",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                        data: {
                            command: "save",
                            token: $("#currentTokenNo").text(),
                            appno: $("#registration_id").val(),
                            ppno: $("#PassportNumber").val(),
                            cough: $("input[name=ty1]:checked").val(),
                            haemoptysis: $("input[name=ty2]:checked").val(),
                            nightsweats: $("input[name=ty3]:checked").val(),
                            weightloss: $("input[name=ty4]:checked").val(),
                            fever: $("input[name=ty5]:checked").val(),
                            chronicrespiratorydisease: $(
                                "input[name=tyr1]:checked"
                            ).val(),
                            thoracic: $("input[name=tyr2]:checked").val(),
                            Cyanosis: $("input[name=tyr3]:checked").val(),
                            respiratoryinsufficient: $(
                                "input[name=tyr4]:checked"
                            ).val(),
                            historytb: $("input[name=tyg1]:checked").val(),
                            householddiagnosedtb: $(
                                "input[name=tyg2]:checked"
                            ).val(),
                            historyrecentcontact: $(
                                "input[name=tyg3]:checked"
                            ).val(),
                            examsresults: $("#examsresults").val(),
                            radcomment: $("#rad_comment2").val(),
                            CXRay: $("#CXRay").val(),
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

                            dppcomment: $("#cm_dpp_comment").val(),
                        },
                        success: function (data) {
                            $("#rapidTestResultsTBody tr").each(function () {
                                var tr = $(this);
                                var serial = tr.find("td:nth-child(1)").text();
                                var name = tr.find("td:nth-child(3)").text();
                                var comment = tr
                                    .find("td:nth-child(5)")
                                    .find("input")
                                    .val();

                                $.ajax({
                                    url: `/${getUrl()}/DoctorLoadData`,
                                    type: "post",
                                    dataType: "json",
                                    headers: {
                                        "X-CSRF-TOKEN": $(
                                            'meta[name="csrf-token"]'
                                        ).attr("content"),
                                    },
                                    data: {
                                        command: "updateTestResults",
                                        serial: serial,
                                        name: name,
                                        comment: comment,
                                    },
                                    success: function (data) {},
                                });
                            });

                            Swal.fire({
                                type: "success",
                                title: "Data Saved Successfully!",
                                confirmButtonColor: "#3085d6",
                                confirmButtonText: "OK",
                            });

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

                            // ==================================
                            $("#appbody  > tr.appNum").each(function () {
                                if (appnox.trim() == $(this).text().trim()) {
                                    $(this).removeClass("clickedRow");
                                    $(this).removeClass("prevClicked");
                                    $(this).addClass("rowSaved");
                                }
                            });

                            $("#registration_id").val("");
                            $("#NameInFull").val("");
                            $("#PassportNumber").val("");
                            $("#cm_dpp_comment").val("");
                            $("#rapidTestResultsTBody").html("");

                            $("#birthdayCon").val("");
                            $("#gender").val("");
                            $("#age").val("");
                            $("#SlAddress").val("");
                            $("#SlStreet").val("");
                            $("#SlCity").val("");
                            $("#SlPostalCode").val("");
                            $("#SlTelephoneFixedLine").val("");
                            $("#SlTelephoneFixedLine").val("");
                            $("#SlMobile").val("");

                            $("#cm_order_sputum_sample")
                                .prop("checked", false)
                                .uniform("refresh");
                            $(".chk").prop("checked", false).uniform("refresh");
                            $('input[type="radio"]')
                                .prop("checked", false)
                                .uniform("refresh");
                        },
                        complete: function () {
                            var appNo = $("#registration_id").val();

                            $.ajax({
                                url: `/${getUrl()}/DoctorLoadData`,
                                type: "post",
                                dataType: "json",
                                headers: {
                                    "X-CSRF-TOKEN": $(
                                        'meta[name="csrf-token"]'
                                    ).attr("content"),
                                },
                                data: {
                                    command: "generateCard",
                                    appNo: appNo,
                                },
                                success: function (data) {},
                                complete: function (data) {
                                    // window.open(urlPath + '/generateCard?appNo=' + appNo);
                                },
                            });
                        },
                    });
                }
            });
        } else {
            Swal("Please Select Appointment No!", "", "warning");
        }
    });

    $("#print").on("click", function () {
        if ($("#appbody tr").hasClass("clickedRow") || AppNum != "") {
            if ($("#registration_id").val() == "") {
                var appNo = AppNum;
            } else {
                var appNo = $("#registration_id").val();
            }

            window.open(urlPath + "/generateSummaryReportmhack?appNo=" + appNo);
        } else {
            Swal("Please Select Appointment No!", "", "warning");
        }
    });

    $("#printCertificate1").on("click", function () {
        if ($("#appbody tr").hasClass("clickedRow") || AppNum != "") {
            if ($("#registration_id").val() == "") {
                var appNo = AppNum;
            } else {
                var appNo = $("#registration_id").val();
            }

            window.open(urlPath + "/generateCertificatemhac?appNo=" + appNo);
        } else {
            Swal("Please Select Appointment No!", "", "warning");
        }
    });

    $("#printCertificate2").on("click", function () {
        if ($("#appbody tr").hasClass("clickedRow") || AppNum != "") {
            if ($("#registration_id").val() == "") {
                var appNo = AppNum;
            } else {
                var appNo = $("#registration_id").val();
            }

            window.open(urlPath + "/generateCertificatemhac2?appNo=" + appNo);
        } else {
            Swal("Please Select Appointment No!", "", "warning");
        }
    });

    $("#History").on("click", function () {
        $("#img").attr("src", imgPathBlade + "/PhotoBooth.png");

        $("#noshow3").iziModal("open");
    });

    $("#btnVerify").on("click", function () {
        var PP = $("#txtPassportNo").val();
        var AP = $("#txtAppointmentNo").val();

        $.ajax({
            url: `/${getUrl()}/DoctorLoadData`,
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                PP: PP,
                AP: AP,
                command: "LoadSputumPatient",
            },
            success: function (data) {
                $("#verifyStatTable").html("");

                var html = "";
                var co = 0;
                data.result.forEach(function (val) {
                    var name = val.first_name + " " + val.last_name;
                    co++;
                    html += "<tr class='trclick'>";
                    html += "<td style='display: none;'>" + val.id + "</td>";
                    html += "<td>" + co + "</td>";
                    html += "<td>" + val.appointment_no + "</td>";
                    html += "<td>" + name + "</td>";
                    html += "<td>" + val.cdate.split(" ")[0] + "</td>";
                    html += "</tr>";
                });

                $("#verifyStatTable").empty().append(html);
            },
            complete: function () {},
        });
    });

    $(document).on("click", "tr.trclick", function () {
        $("#appbody").html("");
        AppNum = "";

        var tr = $(this);
        var appnos = tr.find("td:nth-child(3)").text();

        $("#appbody").append(
            '<tr class="appNum"> <td>' + appnos + "</td> </tr>"
        );

        $("#clearingID").show();
        $("#noshow3").iziModal("close");
    });
});
