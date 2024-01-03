$("#desPanelShowHide").hide();
$("#panelHiv").hide();
$("#panelMalaria").hide();
$("#panelFilaria").hide();
$("#panelSHCG").hide();
$("#panelUrine").hide();

$("#txtBarcode").on("change", function () {
    if ($(this).val().length > 0) {
        $("#drpHivResult").val("");
        $("#txtHivRemark").val("");
        $("#drpMalariaResult").val("");
        $("#txtHivRemark").val("");
        $("#drpFilariaResult").val("");
        $("#txtFilariaRemark").val("");
        $("#drpShcgResult").val("");
        $("#txtShcgRemark").val("");
        $("#txtUrineResult").val("");
        $("#txtUrineRemark").val("");
        $("#panelHiv").hide();
        $("#panelMalaria").hide();
        $("#panelFilaria").hide();
        $("#panelSHCG").hide();
        $("#panelUrine").hide();

        $.ajax({
            url: "GetAvailbleTestsPhelabotomy",
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                barcode: $("#txtBarcode").val(),
            },
            success: function (data) {
                if (data == "Result Already Added!") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "center-end",
                        showConfirmButton: false,
                        timer: 5000,
                    });

                    Toast.fire({
                        type: "error",
                        title: data,
                    });

                    $("#desPanelShowHide").hide();
                    $("#txtBarcode").val("");

                    return;
                } else {
                    $("#lblStatusBarcode")
                        .removeClass("badge-danger")
                        .addClass("badge-success");
                    $("#lblStatusBarcode").text("Barcode Matched");

                    $("#lblGen").text(data.gender);
                    $("#lblAppno").text(data.result.appointment_no);
                    $("#lblPass").text(data.result.passport_no);
                    $("#lblAge").text(getAge(data.dob));
                    $("#desPanelShowHide").show();

                    if (data.result.hiv == true) {
                        $("#panelHiv").show();
                    } else {
                        $("#panelHiv").hide();
                    }
                    if (data.result.malaria == true) {
                        $("#panelMalaria").show();
                    } else {
                        $("#panelMalaria").hide();
                    }
                    if (data.result.filaria == true) {
                        $("#panelFilaria").show();
                    } else {
                        $("#panelFilaria").hide();
                    }
                    if (data.result.shcg == true) {
                        $("#panelSHCG").show();
                    } else {
                        $("#panelSHCG").hide();
                    }
                    if (data.result.urine == true) {
                        $("#panelUrine").show();
                    } else {
                        $("#panelUrine").hide();
                    }
                }
            },
            error: function () {
                $("#lblStatusBarcode")
                    .removeClass("badge-success")
                    .addClass("badge-danger");
                $("#lblStatusBarcode").text("Barcode Not Matched");
                $("#desPanelShowHide").hide();
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

$("#btnClear").on("click", function () {
    location.reload();
});

$("#btnSaveResults").on("click", function () {
    $("#btnSaveResults").attr("disabled", true).text("Wait!");

    var barcode = $("#txtBarcode").val();
    if (barcode == "") {
        alert("Barcode Required!");
        $("#btnSaveResults").attr("disabled", false).text("Save");
        return;
    }

    var hivResult = $("#drpHivResult").val();
    var hivRemark = $("#txtHivRemark").val();
    if ($("#panelHiv").is(":visible")) {
        if (hivResult == "" || hivResult == null) {
            $("#btnSaveResults").attr("disabled", false).text("Save");
            iziToast.error({
                title: "Error!",
                message: "HIV Result Required.",
            });
            return;
        }
    }
    var malariaResult = $("#drpMalariaResult").val();
    var malariaRemark = $("#txtMalariaRemark").val();
    if ($("#panelMalaria").is(":visible")) {
        $("#btnSaveResults").attr("disabled", false).text("Save");
        if (malariaResult == "" || malariaResult == null) {
            iziToast.error({
                title: "Error!",
                message: "Malaria Result Required.",
            });
            return;
        }
    }
    var filariaResult = $("#drpFilariaResult").val();
    var filariaRemark = $("#txtFilariaRemark").val();
    if ($("#panelFilaria").is(":visible")) {
        if (filariaResult == "" || filariaResult == null) {
            $("#btnSaveResults").attr("disabled", false).text("Save");
            iziToast.error({
                title: "Error!",
                message: "Filaria Result Required.",
            });
            return;
        }
    }
    var shcgResult = $("#drpShcgResult").val();
    var shcgRemark = $("#txtShcgRemark").val();
    if ($("#panelSHCG").is(":visible")) {
        if (shcgResult == "" || shcgResult == null) {
            $("#btnSaveResults").attr("disabled", false).text("Save");
            iziToast.error({
                title: "Error!",
                message: "S.HCG Result Required.",
            });
            return;
        }
    }
    var urineResult = $("#txtUrineResult").val();
    var urineRemark = $("#txtUrineRemark").val();
    if ($("#panelUrine").is(":visible")) {
        if (urineResult == "") {
            $("#btnSaveResults").attr("disabled", false).text("Save");
            iziToast.error({
                title: "Error!",
                message: "Urine Result Required.",
            });
            return;
        }
    }

    $.ajax({
        url: "SaveLabTestResults",
        type: "post",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            appointmentNo: $("#lblAppno").text(),
            passport: $("#lblPass").text(),
            barcode: barcode,
            hivResult: hivResult,
            hivRemark: hivRemark,
            malariaResult: malariaResult,
            malariaRemark: malariaRemark,
            filariaResult: filariaResult,
            filariaRemark: filariaRemark,
            shcgResult: shcgResult,
            shcgRemark: shcgRemark,
            urineResult: urineResult,
            urineRemark: urineRemark,
        },
        success: function (data) {
            if (data.result == true) {
                $("#btnSaveResults").attr("disabled", false).text("Save");

                Swal.fire({
                    type: "success",
                    title: "Data Saved Successfully!",
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK",
                }).then((result) => {
                    location.reload(true);
                });
            }
        },
    });
});
