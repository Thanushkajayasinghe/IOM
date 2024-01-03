var appno = localStorage.getItem("appointment");
var sessionStorage = localStorage.getItem("appointment");
localStorage.removeItem("appointment");

var appNox = "";

if (appno != null) {
    loadformdatal(appno);

    appNox = appno;

    $.ajax({
        url: 'dropMainUserAppointmentNo',
        type: 'get',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { search: appno },
        success: function (data) {

            var fkid = data[0].FkId;
            console.log(fkid)

            $("#dropMainUserAppointmentNo").select2({
                ajax: {
                    url: "dropMainUserAppointmentNo",
                    delay: 250,
                    processResults: processData
                },
                data: processData([{ "Id": fkid, "Description": appno }]).results,
                minimumInputLength: 4,
                escapeMarkup: function (m) { return m; },
                templateSelection: myCustomTemplate
            });

            function processData(data) {

                var mapdata = $.map(data, function (obj) {
                    obj.id = obj.Id;
                    obj.text = obj.Description;
                    return obj;
                });
                return { results: mapdata };
            }

            function myCustomTemplate(item) {
                return item.Description;
            }
        }
    });

}


var ImageName = "";
$('#dropMainUserAppointmentNo').select2({
    ajax: {
        url: 'dropMainUserAppointmentNo',
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                search: params.term
            };
        },
        processResults: function (data, params) {
            var resData = [];
            data.forEach(function (value) {
                if (value.AppointmentNumber.indexOf(params.term) != -1)
                    resData.push(value)
            })
            return {
                results: $.map(resData, function (item) {
                    return {
                        text: item.AppointmentNumber,
                        id: item.FkId
                    }
                })
            };
        },
        cache: true,

    },
    minimumInputLength: 5
});

$('.selectToDiv').select2({
    dropdownParent: $('#MyD'),
    dropdownAutoWidth: true,
    width: '100%'
});

//========================================  Appointment no change  =======================================================
var memCount = 0;
$('#dropMainUserAppointmentNo').on('change', function () {

    var appoimentNo = $('#dropMainUserAppointmentNo option:selected').text();
    appNox = appoimentNo;
    loadformdatal(appoimentNo);
});

function loadformdatal(appoimentNo) {
    LoadPhotoPopupAppNo(appoimentNo);
    Clear();

    $.ajax({
        url: 'SearchAppointmentNoWiseDetails',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { appoinmentNo: appoimentNo },
        success: function (data) {

            var tr = "";
            if (data.temp[0] != null) {
                $('#token').val(data.temp[0].temp_token_no);
            }
            $('#DateOfArrival').val(data.registerApplicants[0].DateOfArrival);
            $('#AppointmentDate').val(data.applicantCancelAndReschedule[0].date);
            $('#timePlaceholder').text(data.applicantCancelAndReschedule[0].time);
            $('#CountryOfOrigin').val(data.registerApplicants[0].CountryOfOrigin).trigger('change');

            tr += "<tr class='mainMemberTr' attr_fkid='" + data.registerApplicantsDetails[0].FkId + "'><td>" + data.registerApplicantsDetails[0].AppointmentNumber + "</td><td>" + data.registerApplicantsDetails[0].PassportNumber + "</td><td>Main</td><td></td></tr>";

            $('#drpTitle').val(data.registerApplicantsDetails[0].Title).css({ "color": "rgb(85, 85, 85)" });
            $('#gender').val(data.registerApplicantsDetails[0].Gender).css({ "color": "rgb(85, 85, 85)" });
            $('#txtDob').val(data.registerApplicantsDetails[0].DateOfBirth);
            $('#txtFirstName').val(data.registerApplicantsDetails[0].FirstName);
            $('#txtLastName').val(data.registerApplicantsDetails[0].LastName);
            $('#drpNationality').val(data.registerApplicantsDetails[0].Nationality).trigger('change');
            $('#txtPassport').val(data.registerApplicantsDetails[0].PassportNumber);
            $('#txtPrevPassport').val(data.registerApplicantsDetails[0].PreviousPassportIfAny);
            $('#drpCountry').val(data.registerApplicantsDetails[0].CountryOfBirth).trigger('change');
            if (data.registerApplicantsDetails[0].CountryVisitedDuringLast3Years != null) {
                var qwer = data.registerApplicantsDetails[0].CountryVisitedDuringLast3Years.split(",");
                $('#drpCountriesLast3Years').val(qwer).trigger('change');
            }

            $('#EmailAdd').val(data.registerApplicants[0].EmailAddress);

            $('#SlAddress').val(data.registerApplicants[0].SlAddress);
            $('#SlStreet').val(data.registerApplicants[0].SlStreet);
            $('#SlCity').val(data.registerApplicants[0].SlCity);
            $('#SlPostalCode').val(data.registerApplicants[0].SlPostalCode);
            $('#SlTelephoneFixedLine').val(data.registerApplicants[0].SlTelephoneFixedLine);
            $('#SlMobile').val(data.registerApplicants[0].SlMobile);

            $('#SponsorName').val(data.registerApplicants[0].SponsorName);
            $('#SponsorTelephoneFixedLine').val(data.registerApplicants[0].SponsorTelephoneFixedLine);
            $('#SponsorEmailAddress').val(data.registerApplicants[0].SponsorEmailAddress);
            $('#SponsorMobile').val(data.registerApplicants[0].SponsorMobile);
            $('#SponsorAddress').val(data.registerApplicants[0].SponsorAddress);

            var html = "";
            var i = 0;
            $(data.otherApplicantsDetails).each(function (k, v) {

                i = parseInt(i + 1);
                memCount = i;
                tr += "<tr><td>" + v.AppointmentNumber + "</td><td>" + v.PassportNumber + "</td><td>Other</td><td><button type='button' class='btn btn-warning btn-sm setMainMemberBtn'>Set as Main Member</button></td> </tr>";

                html += '<div class="col-md-6 form-group">';
                html += '<ul class="thumbnails" memRegisterApplicantDetails="' + v.id + '" memRegAppNo="' + v.AppointmentNumber + '" titleMem="' + v.Title + '" memFirstName="' + v.FirstName + '" memLastName="' + v.LastName + '" memPassportNumber="' + v.PassportNumber + '" memDateOfbirth="' + v.DateOfBirth + '" memGender="' + v.Gender + '" memPregnancy="' + v.PregnancyStatus + '"  memNationality="' + v.Nationality + '"  memPrevPass="' + v.PreviousPassportIfAny + '"  memCountryOfBirth="' + v.CountryOfBirth + '"  memCountryVisitedDuringLast3Years="' + v.CountryVisitedDuringLast3Years + '"   memSpecialMedicalNeedsCheckWheelChair="' + v.wheelChairAccess + '"  memCheckboxLablePrefTypeFeedRoom="' + v.feedingRoom + '" memCheckboxLablePrefTypeMom="' + v.motherWithChildrenLess5 + '"  memCheckboxLablePrefTypeOther="' + v.otherNeeds + '" \
                memOtherSpName="'+ v.sponsorname + '" memOtherSpTF="' + v.telephonefixedline + '" memOtherSpTM="' + v.telephonemobile + '" memOtherSpEmail="' + v.spemail + '" memOtherSpAddress="' + v.spaddress + '" style="list-style: none;background: white;border: 1px solid #aba5a5;padding: 6px;">';
                html += '<li class="span5 clearfix"><div class="thumbnail clearfix row">';
                html += '<div class="col-md-2"><img src="' + imgPathBlade + '/' + i + '.png" class="pull-left span2 clearfix" style="width: 100%;"></div>';
                html += '<div class="col-md-8">';
                var firstNamex = v.FirstName;
                if (firstNamex == null || firstNamex == "null") {
                    firstNamex = "";
                }
                var lastNamex = v.LastName;
                if (lastNamex == null || lastNamex == "null") {
                    lastNamex = "";
                }
                html += '<div style="font-size: 16px;"><b>Name: </b><span class="memberName">' + firstNamex + ' ' + lastNamex + '</span></div>';
                var countryOfBirthx = v.CountryOfBirth;
                if (countryOfBirthx == null || countryOfBirthx == "null") {
                    countryOfBirthx = "";
                }
                html += '<div style="font-size: 16px;"> <b>Country: </b><span class="memberCountry">' + countryOfBirthx + '</span></div>';
                var passportNumberx = v.PassportNumber;
                if (passportNumberx == null || passportNumberx == "null") {
                    passportNumberx = "";
                }
                html += '<div style="font-size: 16px;"> <b>Passport: </b><span class="memberPassport">' + passportNumberx + '</span></div></div>';
                html += '<div class="col-md-2"><a href="javascript:void(0);" class="btn btn-primary btn-sm form-group icon editMember"><span class="fa fa-pencil"></span>&nbsp;Edit</a>' +
                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm form-group deleteMember"><span class="fa fa-close"></span>&nbsp;Delete</a></div>';
                html += '</div></div></li></ul></div>';

            });
            $('#memberContainer').html("");
            $('#memberContainer').html(html);

            $('#appNoList').html("");
            $('#appNoList').html(tr);
        }
    });
}

//========================================  Update data  =======================================================
$('#UpdateDetails').on('click', function () {

    wait();

    const appNo = appNox;
    const countryOfOrigin = $('#CountryOfOrigin').val();

    //---------------------------------Main Applicant Details--------------------------------------------
    const titleMain = $('#drpTitle').val();
    const genderMain = $('#gender').val();
    const dobMain = $("#txtDob").val();
    const firstNameMain = $('#txtFirstName').val();
    const lastNameMain = $('#txtLastName').val();
    const nationalityMain = $('#drpNationality').val();
    const passportMain = $('#txtPassport').val();
    const prevPassportMain = $('#txtPrevPassport').val();
    const countryMain = $('#drpCountry').val();
    const countryLast3YearsMain = $('#drpCountriesLast3Years').val();

    const emailMain = $('#EmailAdd').val();
    const addressMain = $('#SlAddress').val();
    const streetMain = $('#SlStreet').val();
    const cityMain = $('#SlCity').val();
    const postalCodeMain = $('#SlPostalCode').val();
    const telFixedLineMain = $('#SlTelephoneFixedLine').val();
    const mobileMain = $('#SlMobile').val();

    //---------------------------------Sponsor Details--------------------------------------------
    const sponsorName = $('#SponsorName').val();
    const sponsorTelephoneFixed = $('#SponsorTelephoneFixedLine').val();
    const sponsorEmail = $('#SponsorEmailAddress').val();
    const sponsorMobile = $('#SponsorMobile').val();
    const sponsorAddress = $('#SponsorAddress').val();

    const tokenNo = $('#token').val();

    //===============================================================================================
    $.ajax({
        url: 'UpdateOnlineRegData',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            appNo: appNo,
            countryOfOrigin: countryOfOrigin,

            titleMain: titleMain,
            genderMain: genderMain,
            dobMain: dobMain,
            firstNameMain: firstNameMain,
            lastNameMain: lastNameMain,
            nationalityMain: nationalityMain,
            passportMain: passportMain,
            prevPassportMain: prevPassportMain,
            countryMain: countryMain,
            countryLast3YearsMain: countryLast3YearsMain.toString(),

            emailMain: emailMain,
            addressMain: addressMain,
            streetMain: streetMain,
            cityMain: cityMain,
            postalCodeMain: postalCodeMain,
            telFixedLineMain: telFixedLineMain,
            mobileMain: mobileMain,

            sponsorName: sponsorName,
            sponsorTelephoneFixed: sponsorTelephoneFixed,
            sponsorEmail: sponsorEmail,
            sponsorMobile: sponsorMobile,
            sponsorAddress: sponsorAddress
        },
        success: function (data) {

            if (data.result == true) {

                //---------------------------------Member Details--------------------------------------------
                var coun = 0;
                if ($('.thumbnails').length > 0) {

                    $('.thumbnails').each(function () {
                        const $this = $(this);

                        coun++;

                        var id = $this.attr('memregisterapplicantdetails');
                        const memRegAppNo = $this.attr('memRegAppNo');

                        const titleMem = $this.attr('titleMem');
                        const firstNameMem = $this.attr('memfirstname');
                        const lastNameMem = $this.attr('memlastname');
                        const passportMem = $this.attr('mempassportnumber');
                        const dobMem = $this.attr('memdateofbirth');
                        const genderMem = $this.attr('memgender');
                        const pregnancyMem = $this.attr('mempregnancy');
                        const nationalityMem = $this.attr('memnationality');
                        const prevpassMem = $this.attr('memprevpass');
                        const countryofbirthMem = $this.attr('memcountryofbirth');
                        const countryvisitedduringlast3yearsMem = $this.attr('memcountryvisitedduringlast3years');
                        const over60yearscheckMem = $this.attr('memover60yearscheck');
                        const specialmedicalneedscheckwheelchairMem = $this.attr('memspecialmedicalneedscheckwheelchair');
                        const checkboxlablepreftypefeedroomMem = $this.attr('memcheckboxlablepreftypefeedroom');
                        const checkboxlablepreftypemomMem = $this.attr('memcheckboxlablepreftypemom');
                        const checkboxlablepreftypeotherMem = $this.attr('memcheckboxlablepreftypeother');

                        const memOtherSpName = $this.attr('memOtherSpName');
                        const memOtherSpTF = $this.attr('memOtherSpTF');
                        const memOtherSpTM = $this.attr('memOtherSpTM');
                        const memOtherSpEmail = $this.attr('memOtherSpEmail');
                        const memOtherSpAddress = $this.attr('memOtherSpAddress');

                        if (id == "" || id == null || id == undefined) {

                            $.ajax({
                                url: 'InsertMembersData',
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    mainAppNo: appNo,
                                    registerApplicantId: $('#dropMainUserAppointmentNo').val(),
                                    titleMem: titleMem,
                                    firstNameMem: firstNameMem,
                                    lastNameMem: lastNameMem,
                                    passportMem: passportMem,
                                    dobMem: dobMem,
                                    genderMem: genderMem,
                                    pregnancyMem: pregnancyMem,
                                    nationalityMem: nationalityMem,
                                    prevpassMem: prevpassMem,
                                    countryofbirthMem: countryofbirthMem,
                                    countryvisitedduringlast3yearsMem: countryvisitedduringlast3yearsMem,
                                    over60yearscheckMem: over60yearscheckMem,
                                    specialmedicalneedscheckwheelchairMem: specialmedicalneedscheckwheelchairMem,
                                    checkboxlablepreftypefeedroomMem: checkboxlablepreftypefeedroomMem,
                                    checkboxlablepreftypemomMem: checkboxlablepreftypemomMem,
                                    checkboxlablepreftypeotherMem: checkboxlablepreftypeotherMem,
                                    coun: coun,
                                    tokenNo: tokenNo,

                                    memOtherSpName: memOtherSpName,
                                    memOtherSpTF: memOtherSpTF,
                                    memOtherSpTM: memOtherSpTM,
                                    memOtherSpEmail: memOtherSpEmail,
                                    memOtherSpAddress: memOtherSpAddress
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                async: false,
                                success: function (data) {

                                    data = JSON.parse(data);

                                    if (data.result == true) {

                                    } else {

                                        swal({
                                            title: "Not Saved!",
                                            type: "error",
                                            showCancelButton: false,
                                            confirmButtonClass: 'btn-success',
                                            confirmButtonText: 'OK!'
                                        });
                                    }
                                }
                            });
                        } else {

                            $.ajax({
                                url: 'UpdateOnlineRegDataMem',
                                type: 'post',
                                dataType: 'json',
                                data: {
                                    id: id,
                                    memRegAppNo: memRegAppNo,
                                    firstNameMem: firstNameMem,
                                    lastNameMem: lastNameMem,
                                    passportMem: passportMem,
                                    dobMem: dobMem,
                                    genderMem: genderMem,
                                    pregnancyMem: pregnancyMem,
                                    nationalityMem: nationalityMem,
                                    prevpassMem: prevpassMem,
                                    countryofbirthMem: countryofbirthMem,
                                    countryvisitedduringlast3yearsMem: countryvisitedduringlast3yearsMem,
                                    over60yearscheckMem: over60yearscheckMem,
                                    specialmedicalneedscheckwheelchairMem: specialmedicalneedscheckwheelchairMem,
                                    checkboxlablepreftypefeedroomMem: checkboxlablepreftypefeedroomMem,
                                    checkboxlablepreftypemomMem: checkboxlablepreftypemomMem,
                                    checkboxlablepreftypeotherMem: checkboxlablepreftypeotherMem,

                                    memOtherSpName: memOtherSpName,
                                    memOtherSpTF: memOtherSpTF,
                                    memOtherSpTM: memOtherSpTM,
                                    memOtherSpEmail: memOtherSpEmail,
                                    memOtherSpAddress: memOtherSpAddress
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function (data) {

                                    if (data.result == true) {

                                    } else {

                                        swal({
                                            title: "Not Saved!",
                                            type: "error",
                                            showCancelButton: false,
                                            confirmButtonClass: 'btn-success',
                                            confirmButtonText: 'OK!'

                                        });
                                    }
                                }
                            });
                        }

                    });
                }
            }
        }, complete: function () {

            closewait();

            swal({
                title: "Saved Successfully!",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: 'btn-success',
                confirmButtonText: 'OK!'
            }).then((result) => {
                if (result.value) {

                    // var appNo = localStorage.getItem("appointment").trim();
                    // localStorage.removeItem("appointment");

                    // if (appNo != "") {
                    //     window.close();
                    // }

                    if (sessionStorage != "") {
                        localStorage.setItem("tokenStatus", 'complete');
                        window.close();
                    }

                }
            });
        }
    });
});


//========================================  Save Member Details  =======================================
$('#save').on('click', function () {

    const nameFirst = $('#memFirstName').val();
    const nameLast = $('#memLastName').val();
    const passportNumber = $('#memPassport').val();
    const dateOfbirth = $('#memDOB').val();
    const gender = $('#memGender').val();
    const pregnancy = $('#memPreg').val();
    const nationality = $('#memNationality').val();
    const prevPass = $('#memPreviousPassportifAny').val();
    const countryOfBirth = $('#memCountryOfBirth').val();
    const countryVisitedDuringLast3Years = $('#memCountryvisitedduringlast3years').val();

    var over60YearsCheck = '';
    var Age = parseInt(getAge(dateOfbirth));
    if (Age >= 60) {
        over60YearsCheck = "true";
    } else {
        over60YearsCheck = "false";
    }

    var specialMedicalNeedsCheckWheelChair = false;
    if ($('[id="specialMedicalNeedsCheckWheelChair"]').is(':checked')) {
        specialMedicalNeedsCheckWheelChair = "true";
    }

    var checkboxLablePrefTypeFeedRoom = false;
    if ($('[id="checkboxLablePrefTypeFeedRoom"]').is(':checked')) {
        checkboxLablePrefTypeFeedRoom = "true";
    }

    var checkboxLablePrefTypeMom = false;
    if ($('[id="checkboxLablePrefTypeMom"]').is(':checked')) {
        checkboxLablePrefTypeMom = "true";
    }

    var checkboxLablePrefTypeOther = "";
    if ($('#checkboxLablePrefTypeOther').is(':checked')) {
        checkboxLablePrefTypeOther = $('#specialReqMemOtherText').val();
    }

    $('.selectedMember').attr('memFirstName', nameFirst);
    $('.selectedMember').attr('memLastName', nameLast);
    $('.selectedMember').attr('memPassportNumber', passportNumber);
    $('.selectedMember').attr('memDateOfbirth', dateOfbirth);
    $('.selectedMember').attr('memGender', gender);
    $('.selectedMember').attr('memPregnancy', pregnancy);
    $('.selectedMember').attr('memNationality', nationality);
    $('.selectedMember').attr('memPrevPass', prevPass);
    $('.selectedMember').attr('memCountryOfBirth', countryOfBirth);
    $('.selectedMember').attr('memCountryVisitedDuringLast3Years', countryVisitedDuringLast3Years);
    $('.selectedMember').attr('memOver60YearsCheck', over60YearsCheck);
    $('.selectedMember').attr('memSpecialMedicalNeedsCheckWheelChair', specialMedicalNeedsCheckWheelChair);
    $('.selectedMember').attr('memCheckboxLablePrefTypeFeedRoom', checkboxLablePrefTypeFeedRoom);
    $('.selectedMember').attr('memCheckboxLablePrefTypeMom', checkboxLablePrefTypeMom);
    $('.selectedMember').attr('memCheckboxLablePrefTypeOther', checkboxLablePrefTypeOther);

    $('.selectedMember').find('.memberName').text(nameFirst + " " + nameLast);
    $('.selectedMember').find('.memberCountry').text(countryOfBirth);
    $('.selectedMember').find('.memberPassport').text(passportNumber);

    $('.selectedMember').attr('memOtherSpName', $('#memOtherSpName').val());
    $('.selectedMember').attr('memOtherSpTF', $('#memOtherSpTF').val());
    $('.selectedMember').attr('memOtherSpTM', $('#memOtherSpTM').val());
    $('.selectedMember').attr('memOtherSpEmail', $('#memOtherSpEmail').val());
    $('.selectedMember').attr('memOtherSpAddress', $('#memOtherSpAddress').val());

    $('.selectedMember').addClass('completedMember');

    $('.memberEditModal').modal('hide');

    const Toast = Swal.mixin({
        toast: true,
        position: 'center',
        showConfirmButton: false,
        timer: 3000
    });

    Toast.fire({
        type: 'success',
        title: 'Saved Successfully'
    })

});

function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}


//================================  Edit Members  =============================================================
$(document).on('click', '.editMember', function () {

    clearModal();
    $('.thumbnails').removeClass('selectedMember');
    $(this).parents('.thumbnails').addClass('selectedMember');
    $('.memberEditModal').modal('show');

    // const memTitle = $(this).parents('.selectedMember').attr('titlemem');
    // if (memTitle != "null") {
    //     $('#memFirstName').val(memTitle);
    // }

    const memFirstName = $(this).parents('.selectedMember').attr('memFirstName');
    if (memFirstName != "null") {
        $('#memFirstName').val(memFirstName);
    }

    const memLastName = $(this).parents('.selectedMember').attr('memLastName');
    if (memLastName != "null") {
        $('#memLastName').val(memLastName);
    }

    const memDateOfbirth = $(this).parents('.selectedMember').attr('memDateOfbirth');
    if (memDateOfbirth != "null") {
        $('#memDOB').val(memDateOfbirth);
    }

    const memGender = $(this).parents('.selectedMember').attr('memGender');
    if (memGender != "null") {
        $('#memGender').val(memGender);
    }

    const memPregnancy = $(this).parents('.selectedMember').attr('memPregnancy');
    if (memPregnancy != "null") {
        $('#memPreg').val(memPregnancy);
    }

    const memnationality = $(this).parents('.selectedMember').attr('memnationality');
    if (memnationality != "null") {
        $('#memNationality').val(memnationality).trigger('change');
    }

    $('#memOtherSpName').val($(this).parents('.selectedMember').attr('memOtherSpName'));
    $('#memOtherSpTF').val($(this).parents('.selectedMember').attr('memOtherSpTF'));
    $('#memOtherSpTM').val($(this).parents('.selectedMember').attr('memOtherSpTM'));
    $('#memOtherSpEmail').val($(this).parents('.selectedMember').attr('memOtherSpEmail'));
    $('#memOtherSpAddress').val($(this).parents('.selectedMember').attr('memOtherSpAddress'));

    $('#memPassport').val($(this).parents('.selectedMember').attr('memPassportNumber'));
    if ($(this).parents('.selectedMember').attr('memPrevPass') != "null")
        $('#memPreviousPassportifAny').val($(this).parents('.selectedMember').attr('memPrevPass'));

    $('#memCountryOfBirth').val($('.selectedMember').attr('memCountryOfBirth')).trigger('change');

    var qwer = $('.selectedMember').attr('memcountryvisitedduringlast3years');
    var fsff = qwer.split(",");

    $('#memCountryvisitedduringlast3years').val(fsff.filter(filterValues)).trigger('change');

    function filterValues(val) {
        return val != "";
    }

});

function clearModal() {
    $('#memFirstName').val("");
    $('#memLastName').val("");
    $('#memPassport').val("");
    $('#memDOB').val("");
    $('#memGender').val("");
    $('#memPreg').val("");
    $('.memPregMessage').hide();
    $("#memNationality").val('').trigger('change');
    $('#memPreviousPassportifAny').val("");
    $('#memCountryOfBirth').val("").trigger('change');
    $("#memCountryvisitedduringlast3years").val('').trigger('change');
}


$("#btnChangeMainMember").on('click', function () {

    $('.changeMemberModal').modal('show');
});

$("#btnChangeMemberPhoto").on('click', function () {
    $('.changeMemberPhoteModal').modal('show');

});

$(document).on('click', '.setMainMemberBtn', function () {

    wait();

    var appointmentNo = $(this).parents('tr').find('td:nth-child(1)').text().trim();
    var mainAppointmentNo = $('#appNoList tr.mainMemberTr').find('td:nth-child(1)').text().trim();
    var mainPassportNo = $('#appNoList tr.mainMemberTr').find('td:nth-child(2)').text().trim();
    var fkId = $('#appNoList tr.mainMemberTr').attr('attr_fkid').trim();

    $.ajax({
        url: 'MainMemberChange',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            appointmentNo: appointmentNo,
            mainAppointmentNo: mainAppointmentNo,
            mainPassportNo: mainPassportNo,
            fkId: fkId
        },
        success: function (data) {

            closewait();

            swal({
                title: "Main member successfully changed!",
                type: "success",
                showCancelButton: false,
                confirmButtonClass: 'btn-success',
                confirmButtonText: 'OK!'
            }).then((result) => {
                if (result.value) {

                    location.reload();
                }
            });

        }
    });
});


// Photo popup Load App No--------------
function LoadPhotoPopupAppNo(appno) {

    $.ajax({
        url: 'ChangeMemberPhoto',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            command: "LoadAppNo",
            appointmentNo: appno,
        },
        success: function (data) {
            var html = "";
            html += "<option selected value='' disabled>- Select -</option>";
            $(data.result).each(function (key, val) {
                html += "<option>" + val.AppointmentNumber + "</option>";
            });

            $('#photoAppNo').html("");
            $('#photoAppNo').html(html);
        }
    });
}


// Photo popup Change App No--------------
$('#photoAppNo').on('change', function () {

    var appoimentNo = $('#photoAppNo option:selected').text();
    $('#CrPtoView').show();
    $('#savebtnView').show();
    $('#img').attr('src', '');

    $.ajax({
        url: 'ChangeMemberPhoto',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            command: "LoadCurrentPhoto",
            appointmentNo: appoimentNo
        },
        async: false,
        success: function (data) {

            var img = '';
            if (data.result != null && data.result != "") {
                img = path + '/' + data.result;
                ImageName = data.result;
            } else {
                img = path + '/noimage.png';
                ImageName = "";
            }


            $('#img').attr('src', img + '?foo=' + new Date().getTime());

        }
    });

});


//==========================================================================================================

$('#editPhoto').on('click', function () {

    $('#captureImage').addClass('editedImg');
    $('#captureImage').cropper();

    $("#captureImage").show();
    $("#showEditedImage").hide();
});

//==========================================================================================================

$('#cancelPhoto').on('click', function () {

    $('#captureImage').removeClass('editedImg');
    $("#captureImage").cropper("destroy");
    $("#captureImage").show();
    $("#showEditedImage").hide();
});

//==========================================================================================================

$('#savePhoto').on('click', function () {

    var canvas = "";
    if ($('#captureImage').hasClass('editedImg')) {
        canvas = $('#captureImage').cropper('getCroppedCanvas');
        $("#captureImage").cropper("destroy");
    } else {
        canvas = document.getElementById("captureImage");
    }

    var base64Url = canvas.toDataURL('image/jpeg');

    $("#captureImage").hide();
    $("#showEditedImage").show();
    $("#showEditedImage").attr('src', base64Url).css({ "width": '350px', "height": '330px' });


    photoBoothStat = true;
    $('#photoBoothImgChange').attr('src', imgPathBlade + '/PhotoBoothOk.png');
});

//==========================================================================================================

$('#changePhotoSaveBtn').on('click', function () {

    Swal.fire({
        title: 'Are you sure?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Submit!'
    }).then((result) => {
        if (result.value) {


            var photoBooth = $('#showEditedImage').attr('src');

            if (photoBooth != "") {

                $.ajax({
                    url: 'ChangeMemberPhoto',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        command: 'SavePhoto',
                        ImageName: ImageName,
                        photobooth: photoBooth
                    },
                    success: function (data) {

                        if (data.result == true) {
                            Swal('Image Saved', '', 'success');
                        }
                    },
                    complete: function () {

                        Clear();
                        // $('#AppointmentNo').val('');
                        // $('#PassportNo').val('');
                        // $('#NameInFull').val('');
                        // $('#NameLast').val('');
                        // $('#AppointmentDate').val('');
                        // $('#AddressLocal').val('');
                        // $('#PRA').val('');
                        // $('#PRC').val('');
                        // $('#Remarks').val('');
                        // $('.showHideDiv').hide();
                        // $('#imagePlaceHolder img').attr('src', '');
                        // $('#imageHolderCropped img').attr('src', '');
                        // $("#imagePlaceHolder img").cropper("destroy");
                        // $("#imagePlaceHolder").show();
                        // $("#imagePlaceHolderCropped").hide();
                    }
                });
            } else {
                Swal('Empty Image', '', 'warning');
            }
        }
    });

});


$('#UploadPhotoBtn').on('click', function () {
    $('#photoUpload').trigger('click');
    $('#ptoView').hide();
});


$('#photoUpload').on('change', function () {

    // JPG file format cheak---------->
    var fileName = document.getElementById("photoUpload").value;
    var idxDot = fileName.lastIndexOf(".") + 1;
    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
    if (extFile == "jpg") {

        var outImage = "img";
        var outImage1 = "showEditedImage";

        // Hidden img tage set image------>
        if (FileReader) {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function (e) {
                var image = new Image();
                image.src = e.target.result;
                image.onload = function () {
                    document.getElementById(outImage).src = image.src;
                    document.getElementById(outImage1).src = image.src;
                };
            }
        }

    } else {
        Swal('Only JPG files are allowed!', '', 'warning');
    }

});


function Clear() {
    $('.changeMemberPhoteModal').modal('hide');
    $('#photoAppNo').val("").trigger('change');
    $('#ptoView').hide();
    $('#CrPtoView').hide();
    $('#savebtnView').hide();
    $('#img img').attr('src', '');

    $('#CountryOfOrigin').val("").trigger('change');
    $('#drpNationality').val("").trigger('change');
    $('#drpCountry').val("").trigger('change');
    $('#drpCountriesLast3Years').val("").trigger('change');
    $('#txtPrevPassport').val("");
    $('#txtPassport').val("");
    $('#txtFirstName').val("");
    $('#txtLastName').val("");
    $('#drpTitle').val("");
    $('#gender').val("");
    $('#txtDob').val("");

    $('#SlAddress').val("");
    $('#SlStreet').val("");
    $('#SlCity').val("");
    $('#SlPostalCode').val("");
    $('#SlTelephoneFixedLine').val("");
    $('#SlMobile').val("");

    $('#SponsorName').val("");
    $('#SponsorTelephoneFixedLine').val("");
    $('#SponsorEmailAddress').val("");
    $('#SponsorMobile').val("");
    $('#SponsorAddress').val("");


}


//=========================================  Add Members   =============================================================
$('#addMembers').on('click', function () {

    memCount = memCount + 1;

    var html = "";
    html += '<div class="col-md-6 form-group">';
    html += '<ul class="thumbnails" style="list-style: none;background: white;border: 1px solid #aba5a5;padding: 6px;">';
    html += '<li class="span5 clearfix"><div class="thumbnail clearfix row">';
    html += '<div class="col-md-2"><img src="' + imgPathBlade + '/' + memCount + '.png" class="pull-left span2 clearfix" style="width: 100%;"></div>';
    html += '<div class="col-md-8">';
    html += '<div style="font-size: 16px;"><b>Name: </b><span class="memberName"></span></div>';
    html += '<div style="font-size: 16px;"> <b>Country: </b><span class="memberCountry"></span></div>';
    html += '<div style="font-size: 16px;"> <b>Passport: </b><span class="memberPassport"></span></div></div>';
    html += '<div class="col-md-2"><a href="javascript:void(0);" class="btn btn-primary btn-sm form-group icon editMember"><span class="fa fa-pencil"></span>&nbsp;Edit</a>' +
        '<a href="javascript:void(0);" class="btn btn-danger btn-sm form-group deleteMember"><span class="fa fa-close"></span>&nbsp;Delete</a></div>';
    html += '</div></div></li></ul></div>';

    $('#memberContainer').append(html);
});


$(document).on('click', '.deleteMember', function () {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {

            const $this = $(this);
            memCount = memCount - 1;

            if ($this.parents('.thumbnails').attr('memregisterapplicantdetails') == undefined) {

                $this.parents('.thumbnails').parent().remove();

                swal({
                    title: "Deleted Successfully!",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'OK!'
                });

            } else {

                const serial = $this.parents('.thumbnails').attr('memregisterapplicantdetails');
                const memRegAppNo = $this.parents('.thumbnails').attr('memRegAppNo');

                $.ajax({
                    url: 'deleteOnlineRegDataMem',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        serial: serial,
                        memRegAppNo: memRegAppNo
                    },
                    success: function (data) {

                        if (data.result == true) {

                            $this.parents('.thumbnails').parent().remove();

                            swal({
                                title: "Deleted Successfully!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: 'btn-success',
                                confirmButtonText: 'OK!'
                            });
                        }
                    }
                });
            }
        }
    });
});

loadCountryList();
function loadCountryList() {

    $.ajax({
        url: 'LoadCountryList',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {},
        success: function (data) {
            var html = "";
            html += "<option></option>";
            $(data).each(function (key, val) {
                html += "<option value='" + val.name + "'>" + val.name + "</option>";
            });

            $('.countryLi').html("");
            $('.countryLi').html(html);

            var htmlx = "";
            htmlx += "<option></option>";
            $(data).each(function (key, val) {
                htmlx += "<option value='" + val.nationality + "'>" + val.nationality + "</option>";
            });

            $('.nationalityLi').html("");
            $('.nationalityLi').html(htmlx);
        }, complete: function () {
            $('.selectTo').select2({
                dropdownAutoWidth: true,
                width: '100%'
            });
        }
    });
}


