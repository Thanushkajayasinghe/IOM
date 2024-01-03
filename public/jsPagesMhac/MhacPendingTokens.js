$(document).ready(function () {
    loadPendingTokens();
});

var bar1 = new ProgressBar.Line(".progressBar", {
    strokeWidth: 2,
    easing: "easeInOut",
    duration: 60000,
    color: "#FFEA82",
    trailColor: "#eee",
    trailWidth: 1,
    svgStyle: { width: "100%", height: "25%" },
    from: { color: "#000" },
    to: { color: "#ED6A5A" },
    step: (state, bar) => {
        bar.path.setAttribute("stroke", state.color);
    },
});

bar1.animate(1.0);

setInterval(function () {
    loadPendingTokens();
    bar1.set(0);
    bar1.animate(1);
}, 60000);

function loadPendingTokens() {
    $.ajax({
        url: "LoadMhacPendingTokens",
        type: "post",
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function (data) {
            var reg = "";
            $(data.reg).each(function (key, val) {
                reg += "<tr><td>" + val.token_no + "</td></tr>";
            });

            $("#regPendingTokenTbody").html("");
            $("#regPendingTokenTbody").html(reg);

            var vitals = "";
            $(data.vitals).each(function (key, val) {
                vitals += "<tr><td>" + val.token_no + "</td></tr>";
            });

            $("#vitalsPendingTokenTbody").html("");
            $("#vitalsPendingTokenTbody").html(vitals);

            var cxr = "";
            $(data.cxr).each(function (key, val) {
                cxr += "<tr><td>" + val.token_no + "</td></tr>";
            });

            $("#cxrPendingTokenTbody").html("");
            $("#cxrPendingTokenTbody").html(cxr);

            var phl = "";
            $(data.phl).each(function (key, val) {
                phl += "<tr><td>" + val.token_no + "</td></tr>";
            });

            $("#phlPendingTokenTbody").html("");
            $("#phlPendingTokenTbody").html(phl);

            var con = "";
            $(data.con).each(function (key, val) {
                con += "<tr><td>" + val.token_no + "</td></tr>";
            });

            $("#conPendingTokenTbody").html("");
            $("#conPendingTokenTbody").html(con);
        },
    });
}
