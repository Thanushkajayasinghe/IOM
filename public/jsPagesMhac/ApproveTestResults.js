LoadData();
function LoadData() {
    $.ajax({
        url: "LoadApproveDataLabTestReults",
        type: "POST",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            var html = "";
            $(data.results).each(function (k, v) {
                k++;

                if (
                    v.hiv_result == "Positive" ||
                    v.filaria_result == "Positive" ||
                    v.malaria_result == "Positive" ||
                    v.shcg_result == "Positive"
                ) {
                    html +=
                        '<tr attr-id="' +
                        v.id +
                        '" style="background-color: #890303 !important;color: white;font-weight: bold;">';
                } else {
                    html += '<tr attr-id="' + v.id + '">';
                }
                html += "<td>" + k + "</td>";
                html += "<td>";
                html +=
                    '<input class="form-control userPerSelect cb-element" name="tblchk" id="userPerSelectId' +
                    k +
                    '"  type="checkbox">';
                html +=
                    '<label for="userPerSelectId' +
                    k +
                    '" style="padding: 7px 12px;"></label> ';
                html += "</div>";
                html += "</td>";
                html += "<td>" + v.barcode + "</td>";
                html +=
                    "<td>" +
                    (v.hiv_result !== null ? v.hiv_result : " - ") +
                    "</td>";
                html +=
                    "<td>" +
                    (v.hiv_remark !== null ? v.hiv_remark : " - ") +
                    "</td>";
                html +=
                    "<td>" +
                    (v.filaria_result !== null ? v.filaria_result : " - ") +
                    "</td>";
                html +=
                    "<td>" +
                    (v.filaria_remark !== null ? v.filaria_remark : " - ") +
                    "</td>";
                html +=
                    "<td>" +
                    (v.malaria_result !== null ? v.malaria_result : " - ") +
                    "</td>";
                html +=
                    "<td>" +
                    (v.malaria_remark !== null ? v.malaria_remark : " - ") +
                    "</td>";
                html +=
                    "<td>" +
                    (v.urine_result !== null ? v.urine_result : " - ") +
                    "</td>";
                html +=
                    "<td>" +
                    (v.urine_remark !== null ? v.urine_remark : " - ") +
                    "</td>";
                html +=
                    "<td>" +
                    (v.shcg_result !== null ? v.shcg_result : " - ") +
                    "</td>";
                html +=
                    "<td>" +
                    (v.shcg_remark !== null ? v.shcg_remark : " - ") +
                    "</td>";
                html += "<td>" + (v.cdate !== null ? v.cdate : " - ") + "</td>";
                html += "</tr>";
            });

            $("#tbodyTestResults").html("");
            $("#tbodyTestResults").html(html);
        },
    });
}

$("#userPerSelectIdAll").on("click", function () {
    if ($("#userPerSelectIdAll").prop("checked") == true) {
        $("input:checkbox").prop("checked", true);
    } else {
        $("input:checkbox").prop("checked", false);
    }
});

$("#btnApproveResults").on("click", function () {
    var arr = [];
    $("#tbodyTestResults tr").each(function () {
        var $this = $(this);
        if ($this.find(":checkbox").is(":checked")) {
            var idd = $this.attr("attr-id");
            arr.push([idd]);
        }
    });

    var arrayToSend = JSON.stringify(arr);

    $.ajax({
        url: "ApproveTestResultsAvailable",
        type: "POST",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            arrayToSend: arrayToSend,
        },
        success: function (data) {
            if (data.result == true) {
                iziToast.success({
                    title: "OK",
                    message: "Successfully updated status!",
                    position: "topRight",
                });
            }
        },
        complete: function () {
            LoadData();
        },
    });
});

$("#btnClear").on("click", function () {
    location.reload();
});
