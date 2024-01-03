$(document).on("click", ".btnContry", function () {
    var country = $(this).attr("attr-country");
    if (country == "AU") {
        window.location.href = "Vitals/AU";
    } else if (country == "UK") {
        window.location.href = "Vitals/UK";
    } else if (country == "CA") {
        window.location.href = "Vitals/CA";
    } else if (country == "NZ") {
        window.location.href = "Vitals/NZ";
    } else if (country == "OT") {
        window.location.href = "Vitals/OT";
    }
});
