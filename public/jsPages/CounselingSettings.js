$("#addDescription").click(
    function () {
        var valIn = $('#descriptionInput').val();
        //alert(valIn.length);
        if (valIn.length > 0) {
            $("#CheckListItems").append('<tr class="CheckListItemsRow"> <td><p class="CheckListItemsValues">' + $('#descriptionInput').val() + '</p></td> <td><button type="button" class="removeDescription btn btn-danger" style="padding: .3rem 0.6rem;"><span class="fa fa-close"></span></button></td> </tr>');
        }
        $('#descriptionInput').val('');
    });

$(document).on('click', '.removeDescription', function (event) {
    $(this).closest('tr').remove();
});

//////////////////////////////////////////////////==============================
//////////////////////////////////////////////////==============================
//////////////////////////////////////////////////==============================
//////////////////////////////////////////////////==============================
$('#addMainDesplay').click(
    function () {
        var valIn = $('#addMainDesplayInput').val();
        //alert(valIn.length);
        if (valIn.length > 0) {
            $("#MainDisplayMessages").append('<tr class="mainDisplayRow"> <td><p class="MainDesplayValues">' + valIn + '</p></td> <td><button type="button" class="removeDescription btn btn-danger" style="padding: .3rem 0.6rem;"><span class="fa fa-close"></span></button></td> </tr>');
        }
        $('#addMainDesplayInput').val('');
    });

//////////////////////////////////////////////////==============================
//////////////////////////////////////////////////==============================
//////////////////////////////////////////////////==============================
//////////////////////////////////////////////////==============================
$("#addRecordings").click(function () {

    var langVal = $('#UploadRecordingsLanguageInput').val();
    var disVal = $('#DisplayDescriptionInput').val();

    var allowedFiles = [".mp3", ".png", ".gif", ".jpg", ".jpeg", ".bmp"]; //[".doc", ".docx"] add more file types
    var fileUpload = $("#upload");

    var formObj = new FormData();
    formObj.append('upload', $('#upload')[0].files[0]);

    if ($('#upload').val() != "") {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'IOMFileupload',
            type: 'POST',
            dataType: 'json',
            cache: true,
            async: false,
            processData: false,
            contentType: false,
            data: formObj,
            success: function (data) {

                $("#addTabeleData").append('<tr class="mp3tableRow"><td><p class="MainLangTBValues">' + langVal + '</p></td> <td><p class="MainDesplayTBValues">' + disVal + '</p></td> <td><audio controls><source src="' + path + '/' + data.result + '" type="audio/mpeg">Your browser does not support the audio element. </audio> <input type="hidden" value="' + data.result + '" class="mp3"></td> <td><button type="button" class="btn btn-danger removeDescription" style="padding: .3rem 0.6rem;"><span class="fa fa-close"></span></button></td> </tr>');
            }, error: function (data) {
                alert(data.result);
            }
        });
    }

});


$('#csSave').click(function () {

    Swal.fire({
        title: 'Are you sure?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Submit!'
    }).then((result) => {
        if (result.value) {

            var row = $('.CheckListItemsRow').length;
            var checkListItemsValues = [];

            $(".CheckListItemsValues").each(function (index, value) {
                checkListItemsValues[index] = $(value).text();
                //alert($(value).text());
            });


            var row = $('.mainDisplayRow').length;
            var mainDisplayRow = [];

            $(".MainDesplayValues").each(function (index, value) {
                mainDisplayRow[index] = $(value).text();
                //alert($(value).text());
                //
            });


            var row = $('.mp3tableRow').length;
            var mp3tableRow = Create2DArray(row);

            $(".MainLangTBValues").each(function (index, value) {
                mp3tableRow[index][0] = $(value).text();
                //
            });


            $(".MainDesplayTBValues").each(function (index, value) {
                mp3tableRow[index][1] = $(value).text();
                //
            });


            $(".mp3").each(function (index, value) {
                mp3tableRow[index][2] = $(value).val();
                //
            });

            for (i = 0; i < checkListItemsValues.length; i++) {
                var ind = i;
                ind++;
                $.ajax({
                    url: 'CounselingSettingsCRUD',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: {
                        command: 'saveCheckList',
                        save_check_list: checkListItemsValues[i]
                    },

                    success: function (data) {
                        console.log(data);

                        //alert(JSON.stringify(data));
                        //$.each(data, function(key, val){
                        //alert(val);
                        //});
                    },
                    error: function (data) {
                        console.log(data);
                        //alert(JSON.stringify(data));
                    }
                });
            }


            for (i = 0; i < mainDisplayRow.length; i++) {
                var ind = i;
                ind++;
                $.ajax({
                    url: 'CounselingSettingsCRUD',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: {
                        command: 'saveMainDisplay',
                        maindisplay: mainDisplayRow[i]
                    },

                    success: function (data) {
                        console.log(data);

                        //alert(JSON.stringify(data));
                        //$.each(data, function(key, val){
                        //alert(val);
                        //});
                    },
                    error: function (data) {
                        console.log(data);
                        //alert(JSON.stringify(data));
                    }
                });
            }

            for (i = 0; i < mp3tableRow.length; i++) {
                var ind = i;
                ind++;
                $.ajax({
                    url: 'CounselingSettingsCRUD',
                    type: 'post',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    data: {
                        command: 'saveLangFile',
                        lang: mp3tableRow[i][0],
                        desc: mp3tableRow[i][1],
                        mp3file: mp3tableRow[i][2]
                    },

                    success: function (data) {
                        console.log(data);

                        //alert(JSON.stringify(data));
                        //$.each(data, function(key, val){
                        //alert(val);
                        //});
                    },
                    error: function (data) {
                        console.log(data);
                        //alert(JSON.stringify(data));
                    }
                });
            }

            var allowedFiles = [".mp3", ".png", ".gif", ".jpg", ".jpeg", ".bmp"]; //[".doc", ".docx"] add more file types
            var fileUpload = $("#fileOne");

            var formObj = new FormData();
            formObj.append('upload', $('#fileOne')[0].files[0]);

            var fileOne = '';
            if ($('#fileOne').val() != "") {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'IOMFileupload',
                    type: 'POST',
                    dataType: 'json',
                    cache: true,
                    async: false,
                    processData: false,
                    contentType: false,
                    data: formObj,
                    success: function (data) {
                        fileOne = data.result;
                        //alert(data.result)

                    }, error: function () {
                        alert(data.result);
                    }
                });
            }

            var allowedFiles = [".mp3", ".png", ".gif", ".jpg", ".jpeg", ".bmp"]; //[".doc", ".docx"] add more file types
            var fileUpload = $("#fileTwo");

            var formObj = new FormData();
            formObj.append('upload', $('#fileTwo')[0].files[0]);

            var fileTwo = '';
            if ($('#fileTwo').val() != "") {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'IOMFileupload',
                    type: 'POST',
                    dataType: 'json',
                    cache: true,
                    async: false,
                    processData: false,
                    contentType: false,
                    data: formObj,
                    success: function (data) {
                        fileTwo = data.result;
                        //alert(data.result)

                    }, error: function () {
                        alert(data.result);
                    }
                });
            }

            $.ajax({
                url: 'CounselingSettingsCRUD',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                data: {
                    command: 'saveScriptFile',
                    fileOne: fileOne,
                    fileTwo: fileTwo
                },

                success: function (data) {
                    console.log(data);

                    //alert(JSON.stringify(data));
                    //$.each(data, function(key, val){
                    //alert(val);
                    //});
                },
                error: function (data) {
                    console.log(data);
                    //alert(JSON.stringify(data));
                }
            });

            alert('Data Saved');
        }
    });

});
//////////////////////////////////////////////////==============================
//////////////////////////////////////////////////==============================
//////////////////////////////////////////////////==============================
//////////////////////////////////////////////////==============================

function Create2DArray(rows) {
    var arr = [];
    for (var i = 0; i < rows; i++) {
        arr[i] = [];
    }
    return arr;
}

//==============================On document ready===============================
//==============================================================================
//==============================================================================
//==============================================================================


$(document).ready(function () {


    $.ajax({
        url: 'CounselingSettingsCRUD',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {command: 'tbl_counselling_description_report'},

        success: function (data) {
            //alert(JSON.stringify(data));
            $.each(data, function (key, val) {
                $("#CheckListItems").append('<tr class="CheckListItemsRow"> <td><p class="CheckListItemsValues">' + val['csdr_desc'] + '</p></td> <td><button type="button" class="removeDescription btn btn-danger" style="padding: .3rem 0.6rem;"><span class="fa fa-close"></span></button></td> </tr>');
            });
        },
        error: function (data) {
            alert(JSON.stringify(data));
        }
    });

    //============================================================================

    $.ajax({
        url: 'CounselingSettingsCRUD',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {command: 'tbl_counselling_maindisplay'},

        success: function (data) {
            //alert(JSON.stringify(data));
            $.each(data, function (key, val) {
                $("#MainDisplayMessages").append('<tr class="mainDisplayRow"> <td><p class="MainDesplayValues">' + val['csmd_desc'] + '</p></td> <td><button type="button" class="removeDescription btn btn-danger" style="padding: .3rem 0.6rem;"><span class="fa fa-close"></span></button></td> </tr>');
            });
        },
        error: function (data) {
            alert(JSON.stringify(data));
        }
    });

    //============================================================================

    //============================================================================

    $.ajax({
        url: 'CounselingSettingsCRUD',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {command: 'tbl_counselling_record'},

        success: function (data) {
            //alert(JSON.stringify(data));
            $.each(data, function (key, val) {
                $("#addTabeleData").append('<tr class="mp3tableRow"><td><p class="MainLangTBValues">' + val['csr_lang'] + '</p></td> <td><p class="MainDesplayTBValues">' + val['csr_desc'] + '</p></td> <td><audio controls><source  src="' + path + '/' + val['csr_file'] + '" type="audio/mpeg">Your browser does not support the audio element. </audio> <input type="hidden" value="' + data.result + '" class="mp3"></td> <td><button type="button" class="btn btn-danger removeDescription" style="padding: .3rem 0.6rem;"><span class="fa fa-close"></span></button></td> </tr>');
            });
        },
        error: function (data) {
            alert(JSON.stringify(data));
        }
    });
    //============================================================================

    $.ajax({
        url: 'CounselingSettingsCRUD',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {command: 'tbl_counselling_settings'},

        success: function (data) {
            //alert(JSON.stringify(data));
            $.each(data, function (key, val) {

                $("#showFileOne").append('<a href="' + path + '/' + val['cs_script'] + '" target="_blank">File One</a>');
                $("#showFilTwo").append('<a href="' + path + '/' + val['cs_inst'] + '" target="_blank">File Two</a>');
                //alert(val);
            });
        },
        error: function (data) {
            alert(JSON.stringify(data));
        }
    });


});
