
$(document).on('click', '.btnContry', function () {
    var country = $(this).attr('attr-country');
    if (country == "IHAP") {
      window.location.href = "Registration";
    } else if (country == "AU") {
        window.location.href = "MhacRegistration/AU";
    } else if (country == "UK") {
        window.location.href = "MhacRegistration/UK";
    } else if (country == "CA") {
        window.location.href = "MhacRegistration/CA";
    } else if (country == "NZ") {
        window.location.href = "MhacRegistration/NZ";
    } else if (country == "OT") {
        window.location.href = "MhacRegistration/OT";
    }
});