$(document).ready(function () {

    $("input.group1").prop("disabled", true);
    $("input.group2").prop("disabled", true);


    $('input:radio[name="CXRTyp"]').change(
        function () {
            if (this.checked && this.value == 'yes') {
                $('#Deferred').prop('checked', false).uniform('refresh');
                $('#Pregnant').prop('checked', false).uniform('refresh');
                $('#Applicant ').prop('checked', false).uniform('refresh');
                $('#noShow').prop('checked', false).uniform('refresh');
                $('#Child').prop('checked', false).uniform('refresh');
                $('#Unable').prop('checked', false).uniform('refresh');
                $('#NotDoneother').prop('checked', false).uniform('refresh');
                $('#NotDoneothertxt ').val("");

                $("input.group1").prop("disabled", true);
                $("input.group2").prop("disabled", false);

            } else {
                $('#Shielding').prop('checked', false).uniform('refresh');
                $('#DONEother').prop('checked', false).uniform('refresh');
                $('#Doneothertxt').val("");

                $("input.group2").prop("disabled", true);
                $("input.group1").prop("disabled", false);

            }
        });


    // Save
    $('#btnCompleted').on('click', function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Submit!'
        }).then((result) => {
            if (result.value) {
                if (validate('#PRegvali')) {

                    var RegistrationNo = $('#Registrationno').val();
                    var CXRID = $('#CXRid').val();
                    var PassportNo = $('#Passportno').val();
                    var Pregnancy = $('#Pregnancy').val();
                    var TestDate = $('#Testdate').val();
                    var LMPDate = $('#LMPdate').val();
                    var Result = $('#Result').val();
                    var NotDoneothertxt = $('#NotDoneothertxt').val();
                    var Doneothertxt = $('#Doneothertxt').val();
                    var PregnancyTestOffered = "NO";
                    var CounselingDone = "NO";

                    var Deferred = "NO";
                    var Pregnant = "NO";
                    var Applicant = "NO";
                    var noShow = "NO";
                    var Child = "NO";
                    var Unable = "NO";
                    var NotDoneother = "NO";
                    var Shielding = "NO";
                    var DONEother = "NO";


                    if ($('#PregnancyTestOffered').is(':checked')) {
                        PregnancyTestOffered = "Yes";
                    }
                    if ($('#CounselingDone').is(':checked')) {
                        CounselingDone = "Yes";
                    }
                    if ($('#Deferred').is(':checked')) {
                        Deferred = "Yes";
                    }
                    if ($('#Pregnant').is(':checked')) {
                        Pregnant = "Yes";
                    }
                    if ($('#Applicant').is(':checked')) {
                        Applicant = "Yes";
                    }
                    if ($('#noShow').is(':checked')) {
                        noShow = "Yes";
                    }
                    if ($('#Child').is(':checked')) {
                        Child = "Yes";
                    }
                    if ($('#Unable').is(':checked')) {
                        Unable = "Yes";
                    }
                    if ($('#NotDoneother').is(':checked')) {
                        NotDoneother = "Yes";
                    }
                    if ($('#Shielding').is(':checked')) {
                        Shielding = "Yes";
                    }
                    if ($('#DONEother').is(':checked')) {
                        DONEother = "Yes";
                    }


                    $.ajax({
                        url: 'CXREx',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            RegistrationNo: RegistrationNo,
                            CXRID: CXRID,
                            PassportNo: PassportNo,
                            Pregnancy: Pregnancy,
                            TestDate: TestDate,
                            LMPDate: LMPDate,
                            Result: Result,
                            NotDoneothertxt: NotDoneothertxt,
                            Doneothertxt: Doneothertxt,
                            PregnancyTestOffered: PregnancyTestOffered,
                            CounselingDone: CounselingDone,
                            Deferred: Deferred,
                            Pregnant: Pregnant,
                            Applicant: Applicant,
                            noShow: noShow,
                            Child: Child,
                            Unable: Unable,
                            NotDoneother: NotDoneother,
                            Shielding: Shielding,
                            DONEother: DONEother,

                            function: 'Insert'
                        },
                        success: function (data) {

                            if (data.result == true) {

                                Swal.fire({
                                    type: 'success',
                                    title: 'Data Saved Successfully!',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'ok'
                                }).then((result) => {
                                    if (result.value) {
                                        location.reload();
                                    }
                                })

                            }
                        }, complete: function () {

                        }
                    });

                }
            }
        });
    });

});
