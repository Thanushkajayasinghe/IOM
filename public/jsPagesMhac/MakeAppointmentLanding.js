
$(document).on('click', '.btnContry', function () {
    var country = $(this).attr('attr-country');
    if (country == "IHAP") {
        window.location.href = "OverThePhoneRegistration";
    } else if (country == "AU") {
        window.location.href = "MakeAppointment/AU";
    } else if (country == "UK") {
        window.location.href = "MakeAppointment/UK";
    } else if (country == "CA") {
        window.location.href = "MakeAppointment/CA";
    } else if (country == "NZ") {
        window.location.href = "MakeAppointment/NZ";
    } else if (country == "OT") {
        window.location.href = "MakeAppointment/OT";
    }
});