var appno = localStorage.getItem("appointmentMHackNo");
var sessionStorage = localStorage.getItem("appointmentMHackNo");
localStorage.removeItem("appointmentMHackNo");

var appNox = "";

if (appno != null) {
    loadformdatal(appno);

    appNox = appno;

    $.ajax({
        url: '/IOM/dropUpdateMainUserAppointmentNoUK',
        type: 'get',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { search: appno },
        success: function (data) {

            var id = data[0].id;

            $("#dropMainUserAppointmentNo").select2({
                ajax: {
                    url: "/IOM/dropUpdateMainUserAppointmentNoUK",
                    delay: 250,
                    processResults: processData
                },
                data: processData([{ "Id": id, "Description": appno }]).results,
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


$('#dropMainUserAppointmentNo').select2({
    ajax: {
        url: '/IOM/dropUpdateMainUserAppointmentNoUK',
        type: 'GET',
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
                if (value.appointment_no.indexOf(params.term) != -1)
                    resData.push(value)
            })
            return {
                results: $.map(resData, function (item) {
                    return {
                        text: item.appointment_no,
                        id: item.id
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
    Clear();

    $.ajax({
        url: '/IOM/searchAppointmentNoWiseDetailsUK',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { appoinmentNo: appoimentNo },
        success: function (data) {

            var tr = "";
           
            
            $('#selectedDate').text(data.registerApplicantsDetails[0].appointment_date);
            $('#selectedTime').text(data.registerApplicantsDetails[0].appointment_time);

           
            // const individualRadioButton = $('#appDetTypeIndividual');
            // const familyRadioButton = $('#appDetTypeFamily');

            if (data.registerApplicantsDetails[0].application_type === 'Individual') {
                $("#noOfFamily").hide();
                $('#applicationtype').text("Individual");
                // $('#appDetTypeIndividual').prop('checked', true);
                // $('#appDetTypeFamily').prop('checked', false);
                // document.getElementById('appDetTypeIndividual').checked = true;
                // document.getElementById('appDetTypeFamily').checked = false;
                $('#memberContainer').html("");
            } else if (data.registerApplicantsDetails[0].application_type === 'Family') {
                $("#noOfFamily").show();
                $('#noOfFamilyMembers').val((data.registerApplicantsDetails[0].no_members)-1);
                $('#applicationtype').text("Family");
                // $('#appDetTypeIndividual').prop('checked', false);
                // $('#appDetTypeFamily').prop('checked', true);
                // document.getElementById('appDetTypeIndividual').checked = false;
                // document.getElementById('appDetTypeFamily').checked = true;


                var html = `<div class="col-md-12">
                <h2>Members Details</h2>
                </div>
            
                <div class="col-md-12">
                <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped text-center">
                        <thead>
                        <tr>
                            <th style="display:none;">id</th>
                            <th>No</th>
                            <th>Title</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>DOB</th>
                            <th>Gender</th>
                            <th>Passport No</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tbodyMem">`;
            
                    let co=1;
                    $(data.registerApplicantsmemberDetails).each(function (k, v)
                    {
                        html += `<tr>
                        <td style="display:none;">${v.id || ''}</td>
                        <td>${co}</td>
                        <td>${v.title || ''}</td>
                        <td>${v.first_name || ''}</td>
                        <td>${v.last_name || ''}</td>
                        <td>${v.dob || ''}</td>
                        <td>${v.gender || ''}</td>
                        <td>${v.passport_no || ''}</td>
                        <td><span class="fa fa-pencil btnMemEdit" style="color: blue; font-size: 1.5rem; cursor: pointer;"></span></td>
                        </tr>`;
                        co++;
                    })
               
            
                html += `</tbody></table></div></div></div>`;
            
                $('#memberContainer').html("");
                $('#memberContainer').html(html);
            }

            tr += "<tr class='mainMemberTr' attr_fkid='" + data.registerApplicantsDetails[0].id + "'><td>" + data.registerApplicantsDetails[0].AppointmentNumber + "</td><td>" + data.registerApplicantsDetails[0].PassportNumber + "</td><td>Main</td><td></td></tr>";
            $('#Email').val(data.registerApplicantsDetails[0].email);
            $('#TitleOf').val(data.registerApplicantsDetails[0].title).css({ "color": "rgb(85, 85, 85)" });
            $('#Gen').val(data.registerApplicantsDetails[0].gender).css({ "color": "rgb(85, 85, 85)" });
            $('#DOB').val(data.registerApplicantsDetails[0].dob);
            $('#fname').val(data.registerApplicantsDetails[0].first_name);
            $('#lname').val(data.registerApplicantsDetails[0].last_name);
            $('#drpNationality').val(data.registerApplicantsDetails[0].nationality).trigger('change');
            $('#PassportNo').val(data.registerApplicantsDetails[0].passport_no);
           // Get the checkbox element
            const checkbox = document.getElementById('MainApplicantspecialMedicalNeedsCheck');
            if (data.registerApplicantsDetails[0].special_needs == "true") {
                checkbox.checked = true;
            } else {
                checkbox.checked = false;
            }
            $('#txtMainAddLine1').val(data.registerApplicantsDetails[0].address1);
            $('#txtMainAddLine2').val(data.registerApplicantsDetails[0].address2);
            $('#txtMainCity').val(data.registerApplicantsDetails[0].city);
            $('#txtMainPostalCode').val(data.registerApplicantsDetails[0].postal_code);
            $('#txtMainContactNoHome').val(data.registerApplicantsDetails[0].contact_no_land);
            $('#txtMainContactNoMobile').val(data.registerApplicantsDetails[0].contact_no_mobile);
            
        }
    });
}

$(document).on('click', '.btnMemEdit', function () {

    $('#drpOtherMemTitle').val("");
    $('#memFirstName').val("");
    $('#memLastName').val("");
    $('#memDOB').val("");
    $('#memGender').val("");
    $('#memPassport').val("");

    var $clickedRow = $(this).closest('tr');
    var rowData = {
        title: $clickedRow.find('td:eq(2)').text(), // Adjust index for each column as per your table structure
        first_name: $clickedRow.find('td:eq(3)').text(),
        last_name: $clickedRow.find('td:eq(4)').text(),
        dob: $clickedRow.find('td:eq(5)').text(),
        gender: $clickedRow.find('td:eq(6)').text(),
        passport_no: $clickedRow.find('td:eq(7)').text()
    };

    // Set the values in the modal fields
    if (!rowData.title) {
    } else {
        $('#drpOtherMemTitle').val(rowData.title);
    }
    
    $('#memFirstName').val(rowData.first_name || '');
    $('#memLastName').val(rowData.last_name || '');
    $('#memDOB').val(rowData.dob || '');
    $('#memGender').val(rowData.gender || '');
    $('#memPassport').val(rowData.passport_no || '');
    

    $('#tbodyMem tr').removeClass('selectedMember');
    $(this).parents('tr').addClass('selectedMember');
    $('.memberEditModal').modal('show');
});

$('#btnSaveMem').on('click', function () {
    let title = $('#drpOtherMemTitle').val();
    let firstName = $('#memFirstName').val();
    let lastName = $('#memLastName').val();
    let dob = $('#memDOB').val();
    let gender = $('#memGender').val();
    let passport = $('#memPassport').val();

    $('tr.selectedMember').find('td:nth-child(3)').text(title);
    $('tr.selectedMember').find('td:nth-child(4)').text(firstName);
    $('tr.selectedMember').find('td:nth-child(5)').text(lastName);
    $('tr.selectedMember').find('td:nth-child(6)').text(dob);
    $('tr.selectedMember').find('td:nth-child(7)').text(gender);
    $('tr.selectedMember').find('td:nth-child(8)').text(passport);

    $('.memberEditModal').modal('hide');
});

// $(document).on('click', '.btnMemDelete', function () {
//     $(this).parents('tr').remove();
// });

$('#btnUpdate').on('click', function () {
    var appoimentNo = $('#dropMainUserAppointmentNo option:selected').text();
    var applicationType = "";
    var memberCount = 0;
    if ($('[id="appDetTypeFamily"]').is(':checked')) {
        applicationType = "Family";
        memberCount = $('#noOfFamilyMembers').val();
        memberCount++;
    } else if ($('[id="appDetTypeIndividual"]').is(':checked')) {
        applicationType = "Individual";
        memberCount = 1;
    }
    var memType = "MainMember";
    var passportNo = $('#PassportNo').val();
    if (passportNo == "") {
        iziToast.error({ title: 'Error', message: 'Passport No Required!', position: 'topRight' });
        return;
    }
    var country = "AU"; //==========================================================================
   

    var title = $('#TitleOf').val();
    var firstName = $('#fname').val();
    if (firstName == "") {
        iziToast.error({ title: 'Error', message: 'First Naame Required!', position: 'topRight' });
        return;
    }
    var lastName = $('#lname').val();
    var dob = $('#DOB').val();
    var gender = $('#Gen').val();
    var MainApplicantspecialMedicalNeedsCheck = "false";
    if ($('[id="MainApplicantspecialMedicalNeedsCheck"]').is(':checked')) {
        MainApplicantspecialMedicalNeedsCheck = "true";
    } else {
        MainApplicantspecialMedicalNeedsCheck = "false";
    }
    var email = $('#Email').val();

    var mainAddLine1 = $('#txtMainAddLine1').val();
    var mainAddLine2 = $('#txtMainAddLine2').val();
    var mainCity = $('#txtMainCity').val();
    var mainPostalCode = $('#txtMainPostalCode').val();
    var mainContactNoHome = $('#txtMainContactNoHome').val();
    var mainContactNoMobile = $('#txtMainContactNoMobile').val();

    var mainMemData = {
        applinmentNo: appoimentNo,
        applicationType: applicationType,
        memberCount: memberCount,
        memType: memType,
        passportNo: passportNo,
        country: country,

        title: title,
        firstName: firstName,
        lastName: lastName,
        dob: dob,
        gender: gender,
        medicalReq: MainApplicantspecialMedicalNeedsCheck,
        email: email,

        mainAddLine1: mainAddLine1,
        mainAddLine2: mainAddLine2,
        mainCity: mainCity,
        mainPostalCode: mainPostalCode,
        mainContactNoHome: mainContactNoHome,
        mainContactNoMobile: mainContactNoMobile
    };

    var otherMemData = [];
    if ($('#tbodyMem tr').length > 0) {
        $('#tbodyMem tr').each(function () {
            var $this = $(this);

            var id = $this.find('td:nth-child(1)').text();
            var omemTitle = $this.find('td:nth-child(3)').text();
            var omemFirstName = $this.find('td:nth-child(4)').text();
            var omemLastName = $this.find('td:nth-child(5)').text();
            var omemDob = $this.find('td:nth-child(6)').text();
            var omemGender = $this.find('td:nth-child(7)').text();
            var omemPassportNo = $this.find('td:nth-child(8)').text();

            var rowData = {
                id: id,
                title: omemTitle,
                firstName: omemFirstName,
                lastName: omemLastName,
                dob: omemDob,
                gender: omemGender,
                passportNo: omemPassportNo
            };

            otherMemData.push(rowData);
        });
    }


    var requestData = {
        mainMemData: mainMemData,
        otherMemData: otherMemData
    };

    $.ajax({
        url: '/IOM/SaveUpdateAppointmentUK',
        type: 'post', 
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: requestData,
        success: function (data) {
            if (data.result == true) {

                Swal.fire({
                    type: 'success',
                    title: 'Data Updated Successfully!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    location.reload(true);
                });
            }
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









