$(document).ready(function () {
    //load data table
    loadData();

    function loadData() {
        $.ajax({
            url: "/IOM/LoadCurrentAuditLogData",
            type: "POST",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {},
            success: function (data) {
                var html = "";
                var cou = 0;
                $(data.result).each(function (key, val) {
                    cou++;
                    html += "<tr><td></td>";
                    html += "<td style='display: none;'>" + val.id + "</td>";
                    html += "<td>" + val.name + "</td>";
                    html += "<td>" + val.email + "</td>";
                    html += "<td>" + val.userid + "</td>";
                    html += "<td>" + val.counter_name + "</td>";
                    html += "<td>" + val.counter_no + "</td>";
                    html += "<td>" + val.floor + "</td>";
                    html += "<td>" + val.datetime + "</td>";
                    html += "</tr>";
                });

                $("#userauditAppBody").html("");
                $("#userauditAppBody").html(html);
            },
            complete: function (data) {
                loadDataTable();
            },
        });
    }
    //search using date range
    $("#btnSearch").on("click", function () {
        var dateFrom = $("#FromDate").val();
        var dateTo = $("#ToDate").val();

        var table = $("#userauditlogTbl").DataTable();
        table.destroy();

        $.ajax({
            url: "/IOM/LoadAuditLogData",
            type: "POST",
            dataType: "json",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: {
                dateFrom: dateFrom,
                dateTo: dateTo,
            },
            success: function (data) {
                var html = "";
                var cou = 0;
                $(data.result).each(function (key, val) {
                    cou++;
                    html += "<tr><td></td>";
                    html += "<td style='display: none;'>" + val.id + "</td>";
                    html += "<td>" + val.name + "</td>";
                    html += "<td>" + val.email + "</td>";
                    html += "<td>" + val.userid + "</td>";
                    html += "<td>" + val.counter_name + "</td>";
                    html += "<td>" + val.counter_no + "</td>";
                    html += "<td>" + val.floor + "</td>";
                    html += "<td>" + val.datetime + "</td>";
                    html += "</tr>";
                });

                $("#userauditAppBody").html("");
                $("#userauditAppBody").html(html);
            },
            complete: function (data) {
                loadDataTable();
            },
        });
    });

    //Data Table Plugin Initiate
    function loadDataTable() {
        var table1 = $("#userauditlogTbl").DataTable({
            pageLength: 25,
            columnDefs: [
                {
                    searchable: false,
                    orderable: false,
                    targets: 0,
                },
            ],
            dom: "Blfrtip",
            buttons: ["csv", "excel"],
            order: [[1, "asc"]],
        });

        table1
            .on("order.dt search.dt", function () {
                table1
                    .column(0, { search: "applied", order: "applied" })
                    .nodes()
                    .each(function (cell, i) {
                        cell.innerHTML = i + 1;
                    });
            })
            .draw();
    }
    //cancel no show applicants
    $("#btnCancel").on("click", function () {
        location.reload();
        // $("#userauditAppBody").html("");
        // $("#FromDate").val("");
        // $("#ToDate").val("");
    });
});
