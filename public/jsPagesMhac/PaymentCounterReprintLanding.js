
$(document).on('click', '.btnContry', function () {
    var country = $(this).attr('attr-country');
    if (country == "IHAP") {
        window.location.href = "ApplicantOnSitePaymentReprint"; //PaymentCounter
    } else if (country == "AU") {
        window.location.href = "PaymentCounterReprint/AU";
    } else if (country == "UK") {
        window.location.href = "PaymentCounterReprint/UK";
    } else if (country == "CA") {
        window.location.href = "PaymentCounterReprint/CA";
    } else if (country == "NZ") {
        window.location.href = "PaymentCounterReprint/NZ";
    } else if (country == "OT") {
        window.location.href = "PaymentCounterReprint/OT";
    }
});