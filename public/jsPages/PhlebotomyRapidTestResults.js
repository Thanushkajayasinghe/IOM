$("#BC").focus();
var appno = "";
var aryy = [];
$("#genbar").hide();

var barcode = localStorage.getItem("barcode");
localStorage.removeItem("barcode");

if (barcode != null) {
    $("#BC").val(barcode);
    barcodeChange();
}

$("#savePlbe").on("click", function () {
    if (validate("#validateDiv")) {
        if (appno != "") {
            Swal.fire({
                title: "Are you sure?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Submit!",
            }).then((result) => {
                if (result.value) {
                    aryy = [];

                    var HResult = "";
                    var MResult = "";
                    var FResult = "";
                    var SResult = "";
                    var HComment = "";
                    var MComment = "";
                    var FComment = "";
                    var SComment = "";

                    var HResult = $("#Hres").val();
                    var MResult = $("#Mres").val();
                    var FResult = $("#Fres").val();
                    var SResult = $("#Sres").val();
                    var HComment = $("#Hcom").val();
                    var MComment = $("#Mcom").val();
                    var FComment = $("#Fcom").val();
                    var SComment = $("#Scom").val();

                    if (HResult != null || HComment != "") {
                        aryy.push([HResult, HComment, "HIV"]);
                    }
                    if (MResult != null || MComment != "") {
                        aryy.push([MResult, MComment, "Malaria"]);
                    }
                    if (FResult != null || FComment != "") {
                        aryy.push([FResult, FComment, "Filaria"]);
                    }
                    if (SResult != null || SComment != "") {
                        aryy.push([SResult, SComment, "SHCG"]);
                    }

                    if (aryy.length != 0) {
                        var arrayToSend = JSON.stringify(aryy);

                        $.ajax({
                            url: "PhlebotomyRapidTestResultsLoadData",
                            type: "post",
                            dataType: "json",
                            headers: {
                                "X-CSRF-TOKEN": $(
                                    'meta[name="csrf-token"]'
                                ).attr("content"),
                            },
                            data: {
                                command: "save",
                                Barcode: $("#BC").val(),
                                appno: appno,
                                rslt: arrayToSend,
                            },
                            success: function (data) {
                                Swal.fire({
                                    type: "success",
                                    title: "Data Saved Successfully!",
                                    confirmButtonColor: "#3085d6",
                                    confirmButtonText: "ok",
                                }).then((result) => {
                                    if (result.value) {
                                        location.reload();
                                    }
                                });
                            },
                            complete: function () {
                                clear();
                            },
                            error: function (data) {
                                Swal("Unknown Error", "", "error");
                            },
                        });
                    } else {
                        Swal("Data Empty", "", "error");
                    }
                }
            });
        } else {
            Swal("Barcode Error", "", "error");
        }
    }
});

/////////////////////////////////////////

// Barcode change
$("#BC").on("change", function () {
    barcodeChange();
});

function barcodeChange() {
    $("#genbar").show();
    if ($("#BC").val().length > 0) {
        $("#Hres").val("");
        $("#Mres").val("");
        $("#Fres").val("");
        $("#Sres").val("");
        $("#Hcom").val("");
        $("#Mcom").val("");
        $("#Fcom").val("");
        $("#Scom").val("");

        $("#hivHeader").hide();
        $("#hivRes").hide();
        $("#hivRemark").hide();
        $("#malariaHeader").hide();
        $("#malariaRes").hide();
        $("#malRemark").hide();
        $("#filariaHeader").hide();
        $("#filariaRes").hide();
        $("#filaRemark").hide();
        $("#shcgHeader").hide();
        $("#shcgRes").hide();
        $("#shcgRemark").hide();

        $.ajax({
            url: "PhlebotomyRapidTestResultsLoadData",
            type: "post",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                command: "check",
                barcode: $("#BC").val(),
            },
            success: function (data) {
                if (data.result2 == "DataHave") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "center-end",
                        showConfirmButton: false,
                        timer: 5000,
                    });
                    Toast.fire({
                        type: "error",
                        title: "Barcode No Already Exists!",
                    });

                    $("#gen").text(data.r2);
                    $("#age").text(getAge(data.r3));

                    if (data.malaria != null) {
                        $("#malariaHeader").show();
                        $("#malariaRes").show();
                        $("#malRemark").show();
                        $("#Mres").val("Negative");
                        $(data.malaria).each(function (key, val) {
                            appno = val.prtr_appno;
                            $("#Mres").val(val.prtr_result);
                            $("#Mcom").val(val.prtr_comment);
                        });
                    } else {
                        $("#Mres").attr("validate", "false");
                    }

                    if (data.HIV != null) {
                        $("#hivHeader").show();
                        $("#hivRes").show();
                        $("#hivRemark").show();
                        $("#Hres").val("Negative");
                        $(data.HIV).each(function (key, val) {
                            appno = val.prtr_appno;

                            $("#Hres").val(val.prtr_result);
                            $("#Hcom").val(val.prtr_comment);
                        });
                    } else {
                        $("#Hres").attr("validate", "false");
                    }

                    if (data.Filaria != null) {
                        $("#filariaHeader").show();
                        $("#filariaRes").show();
                        $("#filaRemark").show();
                        $("#Fres").val("Negative");
                        $(data.Filaria).each(function (key, val) {
                            appno = val.prtr_appno;
                            $("#Fres").val(val.prtr_result);
                            $("#Fcom").val(val.prtr_comment);
                        });
                    } else {
                        $("#Fres").attr("validate", "false");
                    }

                    if (data.SHCG != null) {
                        $("#shcgHeader").show();
                        $("#shcgRes").show();
                        $("#shcgRemark").show();
                        $("#Sres").val("Negative");
                        $(data.SHCG).each(function (key, val) {
                            appno = val.prtr_appno;
                            $("#Sres").val(val.prtr_result);
                            $("#Scom").val(val.prtr_comment);
                        });
                    } else {
                        $("#Sres").attr("validate", "false");
                    }
                    $("#savePlbe").text("Update");
                } else {
                    $("#savePlbe").text("Save");
                    if (data.result == "") {
                        Swal("Barcode does not exist", "", "error");
                        appno = 0;

                        $("#BC").addClass("border-danger");

                        $("#BClable").removeClass("badge-success");
                        $("#BClable").addClass("badge-danger");
                        $("#BClable").text("Barcode Not Matched");
                        $("#genbar").show();

                        clear();
                    } else {
                        $(data.result).each(function (key, val) {
                            appno = val.ps_app_no;
                            if (val.ps_hiv_barcode != null) {
                                $("#hivHeader").show();
                                $("#hivRes").show();
                                $("#hivRemark").show();
                                $("#Hres").val("Negative");
                            } else {
                                $("#Hres").attr("validate", "false");
                            }
                            if (val.ps_malaria_barcode != null) {
                                $("#malariaHeader").show();
                                $("#malariaRes").show();
                                $("#malRemark").show();
                                $("#Mres").val("Negative");
                            } else {
                                $("#Mres").attr("validate", "false");
                            }
                            if (val.ps_filaria_barcode != null) {
                                $("#filariaHeader").show();
                                $("#filariaRes").show();
                                $("#filaRemark").show();
                                $("#Fres").val("Negative");
                            } else {
                                $("#Fres").attr("validate", "false");
                            }
                            if (val.ps_shcg_barcode != null) {
                                $("#shcgHeader").show();
                                $("#shcgRes").show();
                                $("#shcgRemark").show();
                                $("#Sres").val("Negative");
                            } else {
                                $("#Sres").attr("validate", "false");
                            }
                        });

                        $("#gen").text(data.r2);
                        $("#age").text(getAge(data.r3));
                        $("#BC").removeClass("border-danger");
                        $("#BC").addClass("border-success");

                        $("#BClable").removeClass("badge-danger");
                        $("#BClable").addClass("badge-success");
                        $("#BClable").text("Barcode Matched");
                    }
                }
            },
        });
    }
}

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

// clear button
$("#btnclear").on("click", function () {
    location.reload();
});

function clear() {
    $("#BC").val("");
    $("#Hres").val("");
    $("#Mres").val("");
    $("#Fres").val("");
    $("#Sres").val("");
    $("#Hcom").val("");
    $("#Mcom").val("");
    $("#Fcom").val("");
    $("#Scom").val("");

    $("#hivHeader").hide();
    $("#hivRes").hide();
    $("#hivRemark").hide();
    $("#malariaHeader").hide();
    $("#malariaRes").hide();
    $("#malRemark").hide();
    $("#filariaHeader").hide();
    $("#filariaRes").hide();
    $("#filaRemark").hide();
    $("#shcgHeader").hide();
    $("#shcgRes").hide();
    $("#shcgRemark").hide();

    appno = "";
    aryy = [];
}
