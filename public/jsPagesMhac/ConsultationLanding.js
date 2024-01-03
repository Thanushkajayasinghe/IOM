
$(document).on('click', '.btnContry', function () {
    var country = $(this).attr('attr-country');
    if (country == "IHAP") {
        window.location.href = "Consultation";
    } else if (country == "AU") {
        window.location.href = "ConsultationMh/AU";
    } else if (country == "UK") {
        window.location.href = "ConsultationMh/UK";
    } else if (country == "CA") {
        window.location.href = "ConsultationMh/CA";
    } else if (country == "NZ") {
        window.location.href = "ConsultationMh/NZ";
    } else if (country == "OT") {
        window.location.href = "ConsultationMh/OT";
    }
});