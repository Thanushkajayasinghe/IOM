$(document).on("click", ".btnContry", function () {
    var country = $(this).attr("attr-country");
    if (country == "IHAP") {
        window.location.href = "OverThePhoneRegistration";
    } else if (country == "AU") {
        window.location.href = "Phlebotomy/AU";
    } else if (country == "UK") {
        window.location.href = "Phlebotomy/UK";
    } else if (country == "CA") {
        window.location.href = "Phlebotomy/CA";
    } else if (country == "NZ") {
        window.location.href = "Phlebotomy/NZ";
    } else if (country == "OT") {
        window.location.href = "Phlebotomy/OT";
    }
});
