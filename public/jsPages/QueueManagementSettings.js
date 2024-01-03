//============================= Multidimentional Arry ==========================
//==============================================================================
//==============================================================================

function Create2DArray(rows) {
    var arr = [];
    for (var i = 0; i < rows; i++) {
        arr[i] = [];
    }
    return arr;
}

function timepicker(id) {

    $('.Time').timepicker({
        timeFormat: 'HH:mm:ss',
        stepHour: 1,
        stepMinute: 1,
        stepSecond: 1
    });

    new Switchery($(".js-switch[attr-id='" + id + "']")[0], {color: '#08cc4c', secondaryColor: '#f70e22'});
}

//==============================================================================
//==============================================================================
//==============================================================================

//============================= Registration ===================================
//==============================================================================
//==============================================================================

$("#Registration_Add").click(function () {
    var numItems = $('.Registration_row').length;
    if (numItems == 0) {
        numItems = 1;
    } else {
        numItems++;
    }
    var id = "A" + numItems + "";
    $("#Registration_Body").append('<div class="col form-group Registration_row"> <div class="row"> <div class="col-4" style="padding: 0;"> <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm"> <label class="form-check-label"> <input type="checkbox" class="form-input-switchery" checked data-fouc> Registration ' + numItems + ': </label> </div> </div> <div class="col-2"> <div class="form-check form-check-switchery form-check-switchery-double" style="display: hide;" > <input class="reg_hidden" id="" name="new" type="hidden" value="new"> <label class="form-check-label"> <input type="checkbox" attr-id="' + id + '" class="js-switch r_c_1" checked /> </label> </div> </div> <div class="col-6"> <div class="row"> <div class="col-6"> <label>FROM</label> <input type="text" value="" class="form-control Time r_s_1" style="height: 0;" > </div> <div class="col-6"> <label>TO</label> <input type="text" class="form-control Time r_e_1" style="height: 0;" > </div> </div> </div> </div> </div>');

    timepicker(id);
});

$("#Registration_Remove").click(function () {

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

            $.ajax({
                url: 'QueueManagementSettingsSaveData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                data: {
                    command: 'delete',
                    qms_id: $('#Registration_Body .Registration_row:last .reg_hidden').val(),
                },

                success: function (data) {
                    Swal('Completed!', '', 'success');

                },
                error: function (data) {
                    // Swal('Unknown Error', '', 'error');
                }, complete: function () {
                    $('#Registration_Body .Registration_row:last').remove();
                }
            });
        }
    });

});

//==============================================================================
//==============================================================================
//==============================================================================


//============================= Counseling ===================================
//==============================================================================
//==============================================================================

$("#Counseling_Add").click(function () {
    var numItems = $('.Counseling_row').length;
    if (numItems == 0) {
        numItems = 1;
    } else {
        numItems++;
    }
    var id = "B" + numItems + "";
    $("#Counseling_Body").append('<div class="col form-group Counseling_row"> <div class="row"> <div class="col-4" style="padding: 0;"> <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm"> <label class="form-check-label"> <input type="checkbox" class="form-input-switchery" checked data-fouc> Counseling ' + numItems + ': </label> </div> </div> <div class="col-2"> <div class="form-check form-check-switchery form-check-switchery-double" style="display: hide;" > <input class="reg_hidden_1" id="" name="new" type="hidden" value="new">  <label class="form-check-label"> <input type="checkbox" attr-id="' + id + '" class="js-switch r_c_2" checked /> </label> </div> </div> <div class="col-6"> <div class="row"> <div class="col-6"> <label>FROM</label> <input type="text" value="" class="form-control Time r_s_2" style="height: 0;" > </div> <div class="col-6"> <label>TO</label> <input type="text" class="form-control Time r_e_2" style="height: 0;" > </div> </div> </div> </div> </div>');

    timepicker(id);
});

$("#Counseling_Remove").click(function () {

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
            $.ajax({
                url: 'QueueManagementSettingsSaveData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                data: {
                    command: 'delete',
                    qms_id: $('#Counseling_Body .Counseling_row:last .reg_hidden_1').val(),
                },

                success: function (data) {
                    Swal('Completed!', '', 'success');
                },
                error: function (data) {
                    // Swal('Unknown Error', '', 'error');
                }, complete: function () {
                    $('#Counseling_Body .Counseling_row:last').remove();
                }
            });
        }
    });

});

//==============================================================================
//==============================================================================
//==============================================================================


//============================= Radiography ===================================
//==============================================================================
//==============================================================================

$("#Radiography_Add").click(function () {
    var numItems = $('.Radiography_row').length;
    if (numItems == 0) {
        numItems = 1;
    } else {
        numItems++;
    }
    var id = "C" + numItems + "";
    $("#Radiography_Body").append('<div class="col form-group Radiography_row"> <div class="row"> <div class="col-4" style="padding: 0;"> <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm"> <label class="form-check-label"> <input type="checkbox" class="form-input-switchery" checked data-fouc> Radiography ' + numItems + ': </label> </div> </div> <div class="col-2"> <div class="form-check form-check-switchery form-check-switchery-double" style="display: hide;" > <input class="reg_hidden_2" id="" name="new" type="hidden" value="new">  <label class="form-check-label"> <input type="checkbox" attr-id="' + id + '" class="js-switch r_c_3" checked /> </label> </div> </div> <div class="col-6"> <div class="row"> <div class="col-6"> <label>FROM</label> <input type="text" value="" class="form-control Time r_s_3" style="height: 0;" > </div> <div class="col-6"> <label>TO</label> <input type="text" class="form-control Time r_e_3" style="height: 0;" > </div> </div> </div> </div> </div>');
    timepicker(id);
});

$("#Radiography_Remove").click(function () {

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
            $.ajax({
                url: 'QueueManagementSettingsSaveData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                data: {
                    command: 'delete',
                    qms_id: $('#Radiography_Body .Radiography_row:last .reg_hidden_2').val(),
                },

                success: function (data) {
                    Swal('Completed!', '', 'success');

                },
                error: function (data) {

                }, complete: function () {
                    $('#Radiography_Body .Radiography_row:last').remove();
                }
            });
        }
    });
});

//==============================================================================
//==============================================================================
//==============================================================================


//============================= Radiology ===================================
//==============================================================================
//==============================================================================

$("#Radiology_Add").click(function () {
    var numItems = $('.Radiology_row').length;
    if (numItems == 0) {
        numItems = 1;
    } else {
        numItems++;
    }
    var id = "D" + numItems + "";
    $("#Radiology_Body").append('<div class="col form-group Radiology_row"> <div class="row"> <div class="col-4" style="padding: 0;"> <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm"> <label class="form-check-label"> <input type="checkbox" class="form-input-switchery" checked data-fouc> Radiology ' + numItems + ': </label> </div> </div> <div class="col-2"> <div class="form-check form-check-switchery form-check-switchery-double" style="display: hide;" > <input class="reg_hidden_3" id="" name="new" type="hidden" value="new">  <label class="form-check-label"> <input type="checkbox" attr-id="' + id + '" class="js-switch r_c_4" checked /> </label> </div> </div> <div class="col-6"> <div class="row"> <div class="col-6"> <label>FROM</label> <input type="text" value="" class="form-control Time r_s_4" style="height: 0;" > </div> <div class="col-6"> <label>TO</label> <input type="text" class="form-control Time r_e_4" style="height: 0;" > </div> </div> </div> </div> </div>');
    timepicker(id);
});

$("#Radiology_Remove").click(function () {

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
            $.ajax({
                url: 'QueueManagementSettingsSaveData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                data: {
                    command: 'delete',
                    qms_id: $('#Radiology_Body .Radiology_row:last .reg_hidden_3').val(),
                },

                success: function (data) {
                    Swal('Completed!', '', 'success');

                },
                error: function (data) {

                }, complete: function () {
                    $('#Radiology_Body .Radiology_row:last').remove()
                }
            });
        }
    });
});

//==============================================================================
//==============================================================================
//==============================================================================


//============================= Phlebotomy ===================================
//==============================================================================
//==============================================================================

$("#Phlebotomy_Add").click(function () {
    var numItems = $('.Phlebotomy_row').length;
    if (numItems == 0) {
        numItems = 1;
    } else {
        numItems++;
    }
    var id = "E" + numItems + "";
    $("#Phlebotomy_Body").append('<div class="col form-group Phlebotomy_row"> <div class="row"> <div class="col-4" style="padding: 0;"> <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm"> <label class="form-check-label"> <input type="checkbox" class="form-input-switchery" checked data-fouc> Phlebotomy ' + numItems + ': </label> </div> </div> <div class="col-2"> <div class="form-check form-check-switchery form-check-switchery-double" style="display: hide;" > <input class="reg_hidden_4" id="" name="new" type="hidden" value="new">  <label class="form-check-label"> <input type="checkbox" attr-id="' + id + '" class="js-switch r_c_5" checked /> </label> </div> </div> <div class="col-6"> <div class="row"> <div class="col-6"> <label>FROM</label> <input type="text" value="" class="form-control Time r_s_5" style="height: 0;" > </div> <div class="col-6"> <label>TO</label> <input type="text" class="form-control Time r_e_5" style="height: 0;" > </div> </div> </div> </div> </div>');
    timepicker(id);
});

$("#Phlebotomy_Remove").click(function () {

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

            $.ajax({
                url: 'QueueManagementSettingsSaveData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                data: {
                    command: 'delete',
                    qms_id: $('#Phlebotomy_Body .Phlebotomy_row:last .reg_hidden_4').val(),
                },

                success: function (data) {
                    Swal('Completed!', '', 'success');

                },
                error: function (data) {
                    //Swal('Unknown Error', '', 'error');
                }, complete: function () {
                    $('#Phlebotomy_Body .Phlebotomy_row:last').remove();
                }
            });
        }
    });
});

//==============================================================================
//==============================================================================
//==============================================================================


//============================= Consultation ===================================
//==============================================================================
//==============================================================================

$("#Consultation_Add").click(function () {
    var numItems = $('.Consultation_row').length;
    if (numItems == 0) {
        numItems = 1;
    } else {
        numItems++;
    }
    var id = "F" + numItems + "";
    $("#Consultation_Body").append('<div class="col form-group Consultation_row"> <div class="row"> <div class="col-4" style="padding: 0;"> <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm"> <label class="form-check-label"> <input type="checkbox" class="form-input-switchery" checked data-fouc> Consultation ' + numItems + ': </label> </div> </div> <div class="col-2"> <div class="form-check form-check-switchery form-check-switchery-double" style="display: hide;" > <input class="reg_hidden_5" id="" name="new" type="hidden" value="new">  <label class="form-check-label"> <input type="checkbox" attr-id="' + id + '" class="js-switch r_c_6" checked /> </label> </div> </div> <div class="col-6"> <div class="row"> <div class="col-6"> <label>FROM</label> <input type="text" value="" class="form-control Time r_s_6" style="height: 0;" > </div> <div class="col-6"> <label>TO</label> <input type="text" class="form-control Time r_e_6" style="height: 0;" > </div> </div> </div> </div> </div>');
    timepicker(id);
});

$("#Consultation_Remove").click(function () {

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

            $.ajax({
                url: 'QueueManagementSettingsSaveData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                data: {
                    command: 'delete',
                    qms_id: $('#Consultation_Body .Consultation_row:last .reg_hidden_5').val(),
                },

                success: function (data) {
                    Swal('Completed!', '', 'success');

                },
                error: function (data) {
                    //Swal('Unknown Error', '', 'error');
                }, complete: function () {

                    $('#Consultation_Body .Consultation_row:last').remove();
                }
            });


        }
    });
});

//==============================================================================
//==============================================================================
//==============================================================================


$("#saveQMSettings").click(function () {

    Swal.fire({
        title: 'Are you sure?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Submit!'
    }).then((result) => {
        if (result.value) {

            //============================Registration====================================
            //============================================================================
            //============================================================================
            var row = $('.Registration_row').length;
            var registrationArry = Create2DArray(row);

            $(".r_c_1").each(function (index, value) {
                if ($(value).is(':checked')) {
                    registrationArry[index][0] = 1;
                } else {
                    registrationArry[index][0] = 0;
                }
            });

            $(".r_s_1").each(function (index, value) {
                registrationArry[index][1] = $(value).val();
            });

            $(".r_e_1").each(function (index, value) {
                registrationArry[index][2] = $(value).val();
            });

            $(".reg_hidden").each(function (index, value) {
                registrationArry[index][3] = $(value).val();
            });

            //============================Counseling====================================
            //============================================================================
            //============================================================================
            var row = $('.Counseling_row').length;
            var counselingArry = Create2DArray(row);

            $(".r_c_2").each(function (index, value) {
                if ($(value).is(':checked')) {
                    counselingArry[index][0] = 1;
                } else {
                    counselingArry[index][0] = 0;
                }
            });

            $(".r_s_2").each(function (index, value) {
                counselingArry[index][1] = $(value).val();
            });

            $(".r_e_2").each(function (index, value) {
                counselingArry[index][2] = $(value).val();
            });
            $(".reg_hidden_1").each(function (index, value) {
                counselingArry[index][3] = $(value).val();
            });

            //============================Radiography=====================================
            //============================================================================
            //============================================================================
            var row = $('.Radiography_row').length;
            var radiographyArry = Create2DArray(row);

            $(".r_c_3").each(function (index, value) {
                if ($(value).is(':checked')) {
                    radiographyArry[index][0] = 1;
                } else {
                    radiographyArry[index][0] = 0;
                }
            });

            $(".r_s_3").each(function (index, value) {
                radiographyArry[index][1] = $(value).val();
            });

            $(".r_e_3").each(function (index, value) {
                radiographyArry[index][2] = $(value).val();
            });
            $(".reg_hidden_2").each(function (index, value) {
                radiographyArry[index][3] = $(value).val();
            });

            //============================Radiology====================================
            //============================================================================
            //============================================================================
            var row = $('.Radiology_row').length;
            var radiologyArry = Create2DArray(row);

            $(".r_c_4").each(function (index, value) {
                if ($(value).is(':checked')) {
                    radiologyArry[index][0] = 1;
                } else {
                    radiologyArry[index][0] = 0;
                }
            });

            $(".r_s_4").each(function (index, value) {
                radiologyArry[index][1] = $(value).val();
            });

            $(".r_e_4").each(function (index, value) {
                radiologyArry[index][2] = $(value).val();
            });
            $(".reg_hidden_3").each(function (index, value) {
                radiologyArry[index][3] = $(value).val();
            });

            //============================Phlebotomy====================================
            //============================================================================
            //============================================================================
            var row = $('.Phlebotomy_row').length;
            var rhlebotomyArry = Create2DArray(row);

            $(".r_c_5").each(function (index, value) {
                if ($(value).is(':checked')) {
                    rhlebotomyArry[index][0] = 1;
                } else {
                    rhlebotomyArry[index][0] = 0;
                }
            });

            $(".r_s_5").each(function (index, value) {
                rhlebotomyArry[index][1] = $(value).val();
            });

            $(".r_e_5").each(function (index, value) {
                rhlebotomyArry[index][2] = $(value).val();
            });
            $(".reg_hidden_4").each(function (index, value) {
                rhlebotomyArry[index][3] = $(value).val();
            });

            //============================Consultation====================================
            //============================================================================
            //============================================================================

            var row = $('.Consultation_row').length;
            var consultationArry = Create2DArray(row);
            //alert(row);
            $(".r_c_6").each(function (index, value) {
                if ($(value).is(':checked')) {
                    consultationArry[index][0] = 1;
                } else {
                    consultationArry[index][0] = 0;
                }
            });

            $(".r_s_6").each(function (index, value) {
                consultationArry[index][1] = $(value).val();
            });

            $(".r_e_6").each(function (index, value) {
                consultationArry[index][2] = $(value).val();
            });
            $(".reg_hidden_5").each(function (index, value) {
                consultationArry[index][3] = $(value).val();
            });


            $.ajax({
                url: 'QueueManagementSettingsSaveData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                data: {
                    command: 'delete',
                },

                success: function (data) {
                    Swal('Completed!', '', 'success');

                },
                error: function (data) {
                    //Swal('Unknown Error', '', 'error');
                }
            });

            for (i = 0; i < registrationArry.length; i++) {
                var ind = i;
                ind++;
                $.ajax({
                    url: 'QueueManagementSettingsSaveData',
                    type: 'post',
                    dataType: 'json',
                    async: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: {
                        command: 'save',
                        qms_counter: 'Registration',
                        qms_counter_no: ind,
                        qms_start_time: registrationArry[i][1],
                        qms_end_time: registrationArry[i][2],
                        qms_in_operation: registrationArry[i][0],
                        qms_new: registrationArry[i][3],
                    },

                    success: function (data) {
                        Swal('Completed!', '', 'success');
                    },
                    error: function (data) {
                        //Swal('Unknown Error', '', 'error');
                    }
                });
            }

            for (i = 0; i < counselingArry.length; i++) {
                var ind = i;
                ind++;
                $.ajax({
                    url: 'QueueManagementSettingsSaveData',
                    type: 'post',
                    dataType: 'json',
                    async: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: {
                        command: 'save',
                        qms_counter: 'Counseling',
                        qms_counter_no: ind,
                        qms_start_time: counselingArry[i][1],
                        qms_end_time: counselingArry[i][2],
                        qms_in_operation: counselingArry[i][0],
                        qms_new: counselingArry[i][3],
                    },

                    success: function (data) {
                        Swal('Completed!', '', 'success');
                    },
                    error: function (data) {
                        //Swal('Unknown Error', '', 'error');
                    }
                });
            }

            for (i = 0; i < radiographyArry.length; i++) {
                var ind = i;
                ind++;
                $.ajax({
                    url: 'QueueManagementSettingsSaveData',
                    type: 'post',
                    dataType: 'json',
                    async: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: {
                        command: 'save',
                        qms_counter: 'Radiography',
                        qms_counter_no: ind,
                        qms_start_time: radiographyArry[i][1],
                        qms_end_time: radiographyArry[i][2],
                        qms_in_operation: radiographyArry[i][0],
                        qms_new: radiographyArry[i][3],
                    },

                    success: function (data) {
                        Swal('Completed!', '', 'success');

                    },
                    error: function (data) {
                        //Swal('Unknown Error', '', 'error');
                    }
                });
            }

            for (i = 0; i < radiologyArry.length; i++) {
                var ind = i;
                ind++;
                $.ajax({
                    url: 'QueueManagementSettingsSaveData',
                    type: 'post',
                    dataType: 'json',
                    async: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: {
                        command: 'save',
                        qms_counter: 'Radiology',
                        qms_counter_no: ind,
                        qms_start_time: radiologyArry[i][1],
                        qms_end_time: radiologyArry[i][2],
                        qms_in_operation: radiologyArry[i][0],
                        qms_new: radiologyArry[i][3],
                    },

                    success: function (data) {

                    },
                    error: function (data) {
                        //Swal('Unknown Error', '', 'error');
                    }
                });
            }

            for (i = 0; i < rhlebotomyArry.length; i++) {
                var ind = i;
                ind++;
                $.ajax({
                    url: 'QueueManagementSettingsSaveData',
                    type: 'post',
                    dataType: 'json',
                    async: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: {
                        command: 'save',
                        qms_counter: 'Phlebotomy',
                        qms_counter_no: ind,
                        qms_start_time: rhlebotomyArry[i][1],
                        qms_end_time: rhlebotomyArry[i][2],
                        qms_in_operation: rhlebotomyArry[i][0],
                        qms_new: rhlebotomyArry[i][3],
                    },

                    success: function (data) {
                        Swal('Completed!', '', 'success');

                    },
                    error: function (data) {
                        //Swal('Unknown Error', '', 'error');
                    }
                });
            }

            for (i = 0; i < consultationArry.length; i++) {
                var ind = i;
                ind++;
                $.ajax({
                    url: 'QueueManagementSettingsSaveData',
                    type: 'post',
                    dataType: 'json',
                    async: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: {
                        command: 'save',
                        qms_counter: 'Consultation',
                        qms_counter_no: ind,
                        qms_start_time: consultationArry[i][1],
                        qms_end_time: consultationArry[i][2],
                        qms_in_operation: consultationArry[i][0],
                        qms_new: consultationArry[i][3],
                    },

                    success: function (data) {

                    },
                    error: function (data) {

                    }
                });
            }


            Swal.fire({
                title: "Completed",
                type: 'success'
            }).then((result) => {

                location.reload();
            });
        }
    });

});

$(document).ready(function () {
    wait();
    $.ajax({
        url: 'QueueManagementSettingsSaveData',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            command: 'Registration'
        },

        success: function (data) {

            $.each(data, function (key, val) {

                var numItems = $('.Registration_row').length;
                if (numItems == 0) {
                    numItems = 1;
                } else {
                    numItems++;
                }
                var checked;
                var id = "A" + numItems + "";

                //alert(val['qms_in_operation']);
                if (val['qms_in_operation']) {
                    checked = "checked";
                }

                $("#Registration_Body").append('<div class="col form-group Registration_row"> <div class="row"> <div class="col-4" style="padding: 0;"> <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm"> <label class="form-check-label"> <input type="checkbox" class="form-input-switchery" checked data-fouc> Registration ' + numItems + ': </label> </div> </div> <div class="col-2"> <div class="form-check form-check-switchery form-check-switchery-double" style="display: hide;" > <input class="reg_hidden" id="qmsrowid' + val['qms_id'] + '" name="qmsrowid' + val['qms_id'] + '" type="hidden" value="' + val['qms_id'] + '"> <label class="form-check-label"> <input type="checkbox" id="A1"attr-id="' + id + '" class="js-switch r_c_1" ' + checked + ' /> </label> </div> </div> <div class="col-6"> <div class="row"> <div class="col-6"> <label>FROM</label> <input type="text" value="' + val['qms_start_time'] + '" class="form-control Time r_s_1" style="height: 0;" > </div> <div class="col-6"> <label>TO</label> <input type="text" class="form-control Time r_e_1" style="height: 0;" value="' + val['qms_end_time'] + '"> </div> </div> </div> </div> </div>');

                timepicker(id);

            });


        },
        error: function (data) {
            //Swal('Unknown Error', '', 'error');
        },
        complete: function (data) {
            //////////////////////////////////////////////////////////////////////////////
            $.ajax({
                url: 'QueueManagementSettingsSaveData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                data: {
                    command: 'Counseling'
                },

                success: function (data) {

                    $.each(data, function (key, val) {

                        var numItems = $('.Counseling_row').length;
                        if (numItems == 0) {
                            numItems = 1;
                        } else {
                            numItems++;
                        }
                        var checked;
                        var id = "B" + numItems + "";

                        //alert(val['qms_in_operation']);
                        if (val['qms_in_operation']) {
                            checked = "checked";
                        }

                        $("#Counseling_Body").append('<div class="col form-group Counseling_row"> <div class="row"> <div class="col-4" style="padding: 0;"> <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm"> <label class="form-check-label"> <input type="checkbox" class="form-input-switchery" checked data-fouc> Counseling ' + numItems + ': </label> </div> </div> <div class="col-2"> <div class="form-check form-check-switchery form-check-switchery-double" style="display: hide;" > <input class="reg_hidden_1" id="qmsrowid' + val['qms_id'] + '" name="qmsrowid' + val['qms_id'] + '" type="hidden" value="' + val['qms_id'] + '"> <label class="form-check-label"> <input type="checkbox" attr-id="' + id + '" class="js-switch r_c_2" ' + checked + ' /> </label> </div> </div> <div class="col-6"> <div class="row"> <div class="col-6"> <label>FROM</label> <input type="text" value="' + val['qms_start_time'] + '" class="form-control Time r_s_2" style="height: 0;" > </div> <div class="col-6"> <label>TO</label> <input type="text" class="form-control Time r_e_2" style="height: 0;" value="' + val['qms_end_time'] + '"> </div> </div> </div> </div> </div>');

                        timepicker(id);

                    });


                },
                error: function (data) {
                    //Swal('Unknown Error', '', 'error');
                },
                complete: function (data) {
                    //////////////////////////////////////////////////////////////////////////////
                    $.ajax({
                        url: 'QueueManagementSettingsSaveData',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        data: {
                            command: 'Radiography'
                        },

                        success: function (data) {

                            $.each(data, function (key, val) {

                                var numItems = $('.Radiography_row').length;
                                if (numItems == 0) {
                                    numItems = 1;
                                } else {
                                    numItems++;
                                }
                                var checked;
                                var id = "C" + numItems + "";

                                //alert(val['qms_in_operation']);
                                if (val['qms_in_operation']) {
                                    checked = "checked";
                                }

                                $("#Radiography_Body").append('<div class="col form-group Radiography_row"> <div class="row"> <div class="col-4" style="padding: 0;"> <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm"> <label class="form-check-label"> <input type="checkbox" class="form-input-switchery" checked data-fouc> Radiography ' + numItems + ': </label> </div> </div> <div class="col-2"> <div class="form-check form-check-switchery form-check-switchery-double" style="display: hide;" > <input class="reg_hidden_2" id="qmsrowid' + val['qms_id'] + '" name="qmsrowid' + val['qms_id'] + '" type="hidden" value="' + val['qms_id'] + '"> <label class="form-check-label"> <input type="checkbox" attr-id="' + id + '" class="js-switch r_c_3" ' + checked + ' /> </label> </div> </div> <div class="col-6"> <div class="row"> <div class="col-6"> <label>FROM</label> <input type="text" value="' + val['qms_start_time'] + '" class="form-control Time r_s_3" style="height: 0;" > </div> <div class="col-6"> <label>TO</label> <input type="text" class="form-control Time r_e_3" style="height: 0;" value="' + val['qms_end_time'] + '"> </div> </div> </div> </div> </div>');

                                timepicker(id);
                            });


                        },
                        error: function (data) {
                            //Swal('Unknown Error', '', 'error');

                        },
                        complete: function (data) {
                            //////////////////////////////////////////////////////////////////////////////
                            $.ajax({
                                url: 'QueueManagementSettingsSaveData',
                                type: 'post',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },

                                data: {
                                    command: 'Radiology'
                                },

                                success: function (data) {

                                    $.each(data, function (key, val) {

                                        var numItems = $('.Radiology_row').length;
                                        if (numItems == 0) {
                                            numItems = 1;
                                        } else {
                                            numItems++;
                                        }
                                        var checked;
                                        var id = "D" + numItems + "";

                                        //alert(val['qms_in_operation']);
                                        if (val['qms_in_operation']) {
                                            checked = "checked";
                                        }

                                        $("#Radiology_Body").append('<div class="col form-group Radiology_row"> <div class="row"> <div class="col-4" style="padding: 0;"> <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm"> <label class="form-check-label"> <input type="checkbox" class="form-input-switchery" checked data-fouc> Radiology ' + numItems + ': </label> </div> </div> <div class="col-2"> <div class="form-check form-check-switchery form-check-switchery-double" style="display: hide;" > <input class="reg_hidden_3" id="qmsrowid' + val['qms_id'] + '" name="qmsrowid' + val['qms_id'] + '" type="hidden" value="' + val['qms_id'] + '"> <label class="form-check-label"> <input type="checkbox" attr-id="' + id + '" class="js-switch r_c_4" ' + checked + ' /> </label> </div> </div> <div class="col-6"> <div class="row"> <div class="col-6"> <label>FROM</label> <input type="text" value="' + val['qms_start_time'] + '" class="form-control Time r_s_4" style="height: 0;" > </div> <div class="col-6"> <label>TO</label> <input type="text" class="form-control Time r_e_4" style="height: 0;" value="' + val['qms_end_time'] + '"> </div> </div> </div> </div> </div>');


                                        timepicker(id);

                                    });


                                },
                                error: function (data) {
                                    //Swal('Unknown Error', '', 'error');
                                },
                                complete: function (data) {

                                    //////////////////////////////////////////////////////////////////////////////
                                    $.ajax({
                                        url: 'QueueManagementSettingsSaveData',
                                        type: 'post',
                                        dataType: 'json',
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },

                                        data: {
                                            command: 'Phlebotomy'
                                        },

                                        success: function (data) {

                                            $.each(data, function (key, val) {

                                                var numItems = $('.Phlebotomy_row').length;
                                                if (numItems == 0) {
                                                    numItems = 1;
                                                } else {
                                                    numItems++;
                                                }
                                                var checked;
                                                var id = "E" + numItems + "";

                                                //alert(val['qms_in_operation']);
                                                if (val['qms_in_operation']) {
                                                    checked = "checked";
                                                }

                                                $("#Phlebotomy_Body").append('<div class="col form-group Phlebotomy_row"> <div class="row"> <div class="col-4" style="padding: 0;"> <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm"> <label class="form-check-label"> <input type="checkbox" class="form-input-switchery" checked data-fouc> Phlebotomy ' + numItems + ': </label> </div> </div> <div class="col-2"> <div class="form-check form-check-switchery form-check-switchery-double" style="display: hide;" > <input class="reg_hidden_4" id="qmsrowid' + val['qms_id'] + '" name="qmsrowid' + val['qms_id'] + '" type="hidden" value="' + val['qms_id'] + '"> <label class="form-check-label"> <input type="checkbox" attr-id="' + id + '" class="js-switch r_c_5" ' + checked + ' /> </label> </div> </div> <div class="col-6"> <div class="row"> <div class="col-6"> <label>FROM</label> <input type="text" value="' + val['qms_start_time'] + '" class="form-control Time r_s_5" style="height: 0;" > </div> <div class="col-6"> <label>TO</label> <input type="text" class="form-control Time r_e_5" style="height: 0;" value="' + val['qms_end_time'] + '"> </div> </div> </div> </div> </div>');

                                                timepicker(id);
                                            });


                                        },
                                        error: function (data) {
                                            //Swal('Unknown Error', '', 'error');
                                        },
                                        complete: function (data) {
                                            //////////////////////////////////////////////////////////////////////////////
                                            $.ajax({
                                                url: 'QueueManagementSettingsSaveData',
                                                type: 'post',
                                                dataType: 'json',
                                                headers: {
                                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                },

                                                data: {
                                                    command: 'Consultation'
                                                },

                                                success: function (data) {

                                                    $.each(data, function (key, val) {

                                                        var numItems = $('.Consultation_row').length;
                                                        if (numItems == 0) {
                                                            numItems = 1;
                                                        } else {
                                                            numItems++;
                                                        }
                                                        var checked;
                                                        var id = "F" + numItems + "";

                                                        //alert(val['qms_in_operation']);
                                                        if (val['qms_in_operation']) {
                                                            checked = "checked";
                                                        }

                                                        $("#Consultation_Body").append('<div class="col form-group Consultation_row"> <div class="row"> <div class="col-4" style="padding: 0;"> <div class="form-check form-check-inline form-check-right form-check-switchery form-check-switchery-sm"> <label class="form-check-label"> <input type="checkbox" class="form-input-switchery" checked data-fouc> Consultation ' + numItems + ': </label> </div> </div> <div class="col-2"> <div class="form-check form-check-switchery form-check-switchery-double" style="display: hide;" > <input class="reg_hidden_5" id="qmsrowid' + val['qms_id'] + '" name="qmsrowid' + val['qms_id'] + '" type="hidden" value="' + val['qms_id'] + '"> <label class="form-check-label"> <input type="checkbox" attr-id="' + id + '" class="js-switch r_c_6" ' + checked + ' /> </label> </div> </div> <div class="col-6"> <div class="row"> <div class="col-6"> <label>FROM</label> <input type="text" value="' + val['qms_start_time'] + '" class="form-control Time r_s_6" style="height: 0;" > </div> <div class="col-6"> <label>TO</label> <input type="text" class="form-control Time r_e_6" style="height: 0;" value="' + val['qms_end_time'] + '"> </div> </div> </div> </div> </div>');

                                                        timepicker(id);

                                                    });


                                                },
                                                error: function (data) {
                                                    Swal('Unknown Error', '', 'error');
                                                },
                                                complete: function (data) {
                                                    closewait();
                                                }
                                            });

                                        }
                                    });
                                }
                            });
                        }
                    });
                }
            });
        }
    });
});
