
$(document).on('click', '.btnContry', function () {
    var country = $(this).attr('attr-country');
    if (country == "IHAP") {
        window.location.href = "ApplicantOnSitePayment"; //PaymentCounter
    } else if (country == "AU") {
        window.location.href = "PaymentCounter/AU";
    } else if (country == "UK") {
        window.location.href = "PaymentCounter/UK";
    } else if (country == "CA") {
        window.location.href = "PaymentCounter/CA";
    } else if (country == "NZ") {
        window.location.href = "PaymentCounter/NZ";
    } else if (country == "OT") {
        window.location.href = "PaymentCounter/OT";
    }
});