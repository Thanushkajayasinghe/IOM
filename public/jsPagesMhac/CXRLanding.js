$(document).on("click", ".btnContry", function () {
    var country = $(this).attr("attr-country");
    if (country == "IHAP") {
        window.location.href = "CXRInternal";
    } else if (country == "AU") {
        window.location.href = "CXR/AU";
    } else if (country == "UK") {
        window.location.href = "CXR/UK";
    } else if (country == "CA") {
        window.location.href = "CXR/CA";
    } else if (country == "NZ") {
        window.location.href = "CXR/NZ";
    } else if (country == "OT") {
        window.location.href = "CXR/OT";
    }
});
