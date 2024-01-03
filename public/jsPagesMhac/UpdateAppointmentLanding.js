
$(document).on('click', '.btnContry', function () {
    var country = $(this).attr('attr-country');
    if (country == "IHAP") {
        window.location.href = "ChangeUpdateAppointmentDetails";
    } else if (country == "AU") {
        window.location.href = "UpdateAppointment/AU";
    } else if (country == "UK") {
        window.location.href = "UpdateAppointment/UK";
    } else if (country == "CA") {
        window.location.href = "UpdateAppointment/CA";
    } else if (country == "NZ") {
        window.location.href = "UpdateAppointment/NZ";
    } else if (country == "OT") {
        window.location.href = "UpdateAppointment/OT";
    }
});