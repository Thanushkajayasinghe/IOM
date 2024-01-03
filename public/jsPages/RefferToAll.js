$(document).ready(function () {

    loadRegNo();

    function loadRegNo() {
        $.ajax({
            url: 'RefferToAFCLoadRegistrationNumber',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {},
            success: function (data) {
                var options = '';
                options += '<option disabled="disabled" selected="selected">Select</option>';
                $(data.result).each(function (key, val) {
                    options += '<option value="' + val.id + '">' + val.AppointmentNumber + '</option>';
                });

                $('#regNoAFC').html("");
                $('#regNoAFC').html(options);

                $('#regNoNSACP').html("");
                $('#regNoNSACP').html(options);

                $('#regNoM').html("");
                $('#regNoM').html(options);

                $('#regNoTB').html("");
                $('#regNoTB').html(options);

                $('#regNoTB').html("");
                $('#regNoTB').html(options);

                $('#regNoOther').html("");
                $('#regNoOther').html(options);
            }
        });
    }

    //reg no onchange
    $('#regNoAFC').on('change', function () {

        const regSerial = $(this).val();

        $.ajax({
            url: 'RefferToAFCLoadPassportNumber',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {regSerial: regSerial},
            success: function (data) {
                $(data.result).each(function (key, val) {
                    $('#passNoAFC').val(val.PassportNumber).keyup();
                })
            }
        });
    });

    $('#regNoNSACP').on('change', function () {

        const regSerial = $(this).val();

        $.ajax({
            url: 'RefferToAFCLoadPassportNumber',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {regSerial: regSerial},
            success: function (data) {
                $(data.result).each(function (key, val) {
                    $('#passNoNSACP').val(val.PassportNumber).keyup();
                })
            }
        });
    });

    $('#regNoM').on('change', function () {

        const regSerial = $(this).val();

        $.ajax({
            url: 'RefferToAFCLoadPassportNumber',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {regSerial: regSerial},
            success: function (data) {
                $(data.result).each(function (key, val) {
                    $('#passNoM').val(val.PassportNumber).keyup();
                })
            }
        });
    });

    $('#regNoTB').on('change', function () {

        const regSerial = $(this).val();

        $.ajax({
            url: 'RefferToAFCLoadPassportNumber',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {regSerial: regSerial},
            success: function (data) {
                $(data.result).each(function (key, val) {
                    $('#passNoTB').val(val.PassportNumber).keyup();
                })
            }
        });
    });


//Reffer to AFC save
    $('#btnSaveAFCnew').on('click', function () {

        if (validate('#validateDivAFC')){
            const regNo = $('#regNoAFC option:selected').text();
            const passNo = $('#passNoAFC').val();
            const refferd = $('#refferdAFC').val();
            const testRes = $('#testResAFC').val();
            const comment = $('#commentAFC').val();
            const remark = $('#remarkAFC').val();

            $.ajax({
                url: 'RefferToAFCSave',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    regNo: regNo,
                    passNo: passNo,
                    refferd: refferd,
                    testRes: testRes,
                    comment: comment,
                    remark: remark,
                },
                success: function (data) {

                    if (data.result == true) {
                        Swal.fire({
                            type: 'success',
                            title: 'Data Saved Successfully!',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ok'
                        });
                    }

                }
            });
        }
    });

//Refer to NSACP save
    $('#btnSaveNSACPnew').on('click', function () {

        if (validate('#validateDivNSACP')) {
            const regNo = $('#regNoNSACP option:selected').text();
            const passNo = $('#passNoNSACP').val();
            const refered = $('#referedNSACP').val();
            const remark = $('#remarkNSACP').val();

            $.ajax({
                url: 'ReferToNSACP',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    regNo: regNo,
                    passNo: passNo,
                    refered: refered,
                    remark: remark,
                    function: 'save'
                },
                success: function (data) {

                    if (data.result == true) {

                        Swal.fire({
                            type: 'success',
                            title: 'Data Saved Successfully!',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ok'
                        });
                    }

                }
            });

        }

    })

//Reffer to Malaria save
    $('#btnSaveReferToMalarianew').on('click', function () {

        if (validate('#validateDivM')) {
            const regNo = $('#regNoM option:selected').text();
            const passNo = $('#passNoM').val();
            const refered = $('#referedM').val();
            const testRes = $('#testResM').val();
            const comment = $('#commentM').val();
            const remark = $('#remarkM').val();

            $.ajax({
                url: 'ReferToMalariaSave',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    regNo: regNo,
                    passNo: passNo,
                    refered: refered,
                    testRes: testRes,
                    comment: comment,
                    remark: remark,
                    function: 'Save'
                },
                success: function (data) {

                    if (data.result == true) {

                        Swal.fire({
                            type: 'success',
                            title: 'Data Saved Successfully!',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ok'
                        });
                    }

                }
            });
        }
    });

//Refer to TB save
    $('#btnSaveReferToTBnew').on('click', function () {

        if (validate('#validateDivTB')) {
            const regNo = $('#regNoTB option:selected').text();
            const passNo = $('#passNoTB').val();
            const refferd = $('#refferdTB').val();
            const testRes = $('#testResTB').val();
            const comment = $('#commentTB').val();
            const remark = $('#remarkTB').val();

            $.ajax({
                url: 'ReferToTB',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    regNo: regNo,
                    passNo: passNo,
                    refferd: refferd,
                    testRes: testRes,
                    comment: comment,
                    remark: remark,
                    function: 'save'
                },
                success: function (data) {

                    if (data.result == true) {

                        Swal.fire({
                            type: 'success',
                            title: 'Data Saved Successfully!',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ok'
                        });
                    }

                }
            });
        }
    });

    //Refer to other save
    $('#btnSaveReferToOther').on('click', function () {

        if (validate('#validateDivOther')) {
            const regNo = $('#regNoOther option:selected').text();
            const docName = $('#DoctorName').val();
            const institute = $('#institute').val();
            const remark = $('#remarkOther').val();

            $.ajax({
                url: 'ReferToTB',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    regNo: regNo,
                    docName: docName,
                    institute: institute,
                    remark: remark,
                    function: 'saveOther'
                },
                success: function (data) {

                    if (data.result == true) {

                        Swal.fire({
                            type: 'success',
                            title: 'Data Saved Successfully!',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ok'
                        });
                    }

                }
            });
        }

    });


// ----------------------------------------------------------
// ----------------------------------------------------------
// ER data save
    $('#btnSaveReferToER').on('click', function () {

        const regNo = $('#registration_id').val();
        const comment = $('#ERcomment').val();

        if (ins != "" || comment != "") {

            $.ajax({
                url: 'RefferToAllSave',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    regNo: regNo,
                    comment: comment,
                    command: "ER",
                },
                success: function (data) {

                    if (data.result == true) {
                        Swal.fire({
                            type: 'success',
                            title: 'Data Saved Successfully!',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ok'
                        });
                        $('#ERcomment').val("");
                    }

                }
            });
        }else{
            Swal.fire({
                type: 'warning',
                title: 'Data Empty!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ok'
            });
        }

    });

    // DOC data save
    $('#btnSaveReferToDOC').on('click', function () {

        const regNo = $('#registration_id').val();
        const comment = $('#DOCcomment').val();

        if (ins != "" || comment != "") {
            $.ajax({
                url: 'RefferToAllSave',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    regNo: regNo,
                    comment: comment,
                    command: "DOC",
                },
                success: function (data) {

                    if (data.result == true) {
                        Swal.fire({
                            type: 'success',
                            title: 'Data Saved Successfully!',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ok'
                        });
                        $('#DOCcomment').val("");
                    }

                }
            });
        }else {
            Swal.fire({
                type: 'warning',
                title: 'Data Empty!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ok'
            });
        }
    });

});