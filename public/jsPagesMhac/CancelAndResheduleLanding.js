
$(document).on('click', '.btnContry', function () {
    var country = $(this).attr('attr-country');
    if (country == "IHAP") {
        window.location.href = "AppointmentCancelandReschedule";
    } else if (country == "AU") {
        window.location.href = "CancelAndReshedule/AU";
    } else if (country == "UK") {
        window.location.href = "CancelAndReshedule/UK";
    } else if (country == "CA") {
        window.location.href = "CancelAndReshedule/CA";
    } else if (country == "NZ") {
        window.location.href = "CancelAndReshedule/NZ";
    } else if (country == "OT") {
        window.location.href = "CancelAndReshedule/OT";
    }
});