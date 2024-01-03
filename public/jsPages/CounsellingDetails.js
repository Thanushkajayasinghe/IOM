$(document).ready(function () {
    // $('#completeCoun').hide();
    loadMembers();


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
                $("#CheckListItems").append('<tr style="line-height: 0.1cm;" class="CheckListItemsRow"> <td style="text-align: center;" class="checkVal">' + val['csdr_desc'] + ' </td> <td style="text-align: center;"> <input type="radio" id="chklistClicked_' + key + '" name="a_' + key + '" value="true" class="radio"/> </td> <td style="text-align: center;"> <input  class="radio" type="radio" id="chklistClicked2_' + key + '" name="a_' + key + '" value="false" checked/> </td> </tr>');
            });
        },
        error: function (data) {
            alert(JSON.stringify(data));
        },
        complete: function (data) {
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
                $.get(path + '/' + val['cs_script'], function (data) {
                    $("#CounselingScript").val(data);
                }, 'text');
                $.get(path + '/' + val['cs_inst'], function (data) {
                    $("#Instructions").val(data);
                }, 'text');
                //alert(val);
            });
        },
        error: function (data) {
            alert(JSON.stringify(data));
        }
    });


    // ----------------------------------------
    // ----------------------------------------
    var co = 0;
    // setInterval(loadCount, 3000);

    // function loadCount() {
    //     if (co == 0) {
    //         $.ajax({
    //             url: 'CounselingSettingsCRUD',
    //             type: 'post',
    //             dataType: 'json',
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             data: {command: 'loadMemberCount'},
    //             success: function (data) {
    //                 ;var webstore = localStorage.getItem("MemCount");
    //
    //
    //                 if (data == webstore) {
    //
    //                         $('#completeCoun').show();
    //                         co = 1;
    //
    //                 }
    //
    //
    //             }
    //         });
    //     }
    // }


});


var chkboxcount = 0;
var chkboxstatus = "";
var ii = 0;


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
          //  $("#addTabeleData").append('<tr class="mp3tableRow"> <td><p class="MainDesplayTBValues">' + val['csr_desc'] + '</p></td> <td><audio controls><source src="http://127.0.0.1:8000/tempFileUpload/' + val['csr_file'] + '" type="audio/mpeg">Your browser does not support the audio element. </audio> <input type="hidden" value="' + data.result + '" class="mp3"></td></tr>');

            $("#addTabeleData").append('<tr class="mp3tableRow"> <td><p class="MainDesplayTBValues">' + val['csr_desc'] + '</p></td> <td><audio controls><source src="'+ pathAudio +'/'+ val['csr_file'] + '" type="audio/mpeg">Your browser does not support the audio element. </audio> <input type="hidden" value="' + data.result + '" class="mp3"></td></tr>');

        });
    },
    error: function (data) {
        alert(JSON.stringify(data));
    }
});

//============================================================================

$('#notcompleteCoun').click(function () {


    $.ajax({
        url: 'CounsellingDetailsLoadData',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            command: 'saveMaster',
            // appointment:Array,
            remark: $("#Remark").val(),
            signture: "",
            complete: 'false'
        },

        success: function (data) {
            console.log(data);
        },
        error: function (data) {
            console.log(data);
        }
    });
});


$('#completeCoun').click(function () {
    // alert(localStorage.getItem('appWithTab'));

    var finalArray = [];
    var stringA = '';
    stringA = localStorage.getItem('appNo');
    if (stringA != null) {
        finalArray = stringA.split(',');
    }
    var row = $('.CheckListItemsRow').length;
    var checkListItemsRow = Create2DArray(row);


    $.each($(".CheckListItemsRow"), function (key, val) {
        var nam = "#chklistClicked_" + key + "";
        var v = $(this).find(nam).is(':checked');

        var chkVal = ".checkVal";
        var v2 = $(this).find(chkVal).html();
        //alert(v2);
        checkListItemsRow[key][0] = v2;
        checkListItemsRow[key][1] = v;
    });


//====================== Save Data =============================================


    for (i = 0; i < checkListItemsRow.length; i++) {
        $.ajax({
            url: 'CounsellingDetailsLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            data: {
                command: 'check',
                check: checkListItemsRow[i][0],
                value: checkListItemsRow[i][1]
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

    var Array = [];
    var string = '';
    // string = localStorage.getItem('appNo')
    string = localStorage.getItem('appWithTab');
    Array = string.split(',');
    // alert(Array);

    $.ajax({
        url: 'CounsellingDetailsLoadData',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data: {
            command: 'saveMaster',
            appointment: Array,
            remark: $("#Remark").val(),
            signture: "",
            complete: 'true'
        },

        success: function (data) {

            Swal.fire({
                type: 'success',
                title: 'Data Saved Successfully!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ok'
            }).then((result) => {
                if (result.value) {
                    window.location = 'Counselling';
                }
            });

            localStorage.removeItem("MemCount");
        }
    });

    for (var i = 0; i < finalArray.length; i++) {

        $.ajax({
            url: 'CounsellingDetailsLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'updateAppno',
                appNo: finalArray[i]
            },

            success: function (data) {
            }
        });
    }


});


function Create2DArray(rows) {
    var arr = [];
    for (var i = 0; i < rows; i++) {
        arr[i] = [];
    }
    return arr;
}


$('#sosButton').on('click', function () {

    $.ajax({
        url: 'CounsellingLoadData',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {command: 'sos', usergroup: usergroup},
        success: function (data) {

            if (data.result == true) {
                Swal(
                    'Request Sent!',
                    '',
                    'success'
                );
            }
        }
    });
});


function loadMembers() {
    var t = localStorage.getItem('appNo').split(",");
    $.each(t, function (i) {
        var appno = t[i];

        $.ajax({
            url: 'CounsellingLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {command: 'loadMembers', appno: appno},
            success: function (data) {

                $(data.result).each(function (key, val) {
                    var r = "";

                    var aryap = localStorage.getItem('appWithTab').split(",");
                    for (var u = 0; u < aryap.length; u++) {

                        var ap = aryap[u].split('/')[0];
                        var tb = aryap[u].split('/')[1];
                        if (val.AppointmentNumber == ap) {
                            r = tb;
                        }

                    }


                    var html = '';
                    ii++;
                    html += '<tr>';
                    html += '<td>' + ii + '</td>';
                    html += '<td>' + val.AppointmentNumber + '</td>';
                    html += '<td>' + val.PassportNumber + '</td>';
                    html += '<td>' + val.FirstName + " " + val.LastName + '</td>';
                    html += '<td>' + val.Gender + '</td>';
                    html += '<td>' + val.CountryOfBirth + '</td>';
                    html += '<td>' + r + '</td>';
                    html += '<td><input disabled class="form-control userPerSelect cb-element chk" name="tblchk" id="chkbx' + val.AppointmentNumber + '" type="checkbox"><label for="chkbx' + val.AppointmentNumber + '" style="padding: 7px 12px;"></label> </td>';
                    html += '<td><button id="btn_' + val.AppointmentNumber + '" class="btn btn-sm btn-info btnskip" style="padding: 2px 10px;">Skip  <span class="icon-next"></span></button></td>';
                    html += '</tr>';

                    $('#membertbdy').append(html);
                });


            }
        });

    });

}

setInterval(function () {
    loadchkbx();
}, 3000);

function loadchkbx() {
    var t = localStorage.getItem('appNo').split(",");
    $.each(t, function (i) {
        var appno = t[i];

        $.ajax({
            url: 'CounsellingLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {command: 'loadchkbx', appno: appno},
            success: function (data) {

                if (data.result == true) {
                    $("#chkbx" + appno).removeAttr("disabled");
                }

            }
        });

    });

}

// Load Signature
loadsignature();
function loadsignature() {

    $.ajax({
        url: 'CounsellingLoadData',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {command: 'loadsignature'},
        success: function (data) {
            var img = data.result;
            $("#signimg").attr('src', img);

        }
    });


}

// Table Chekbox
$(document).on('click', '.chk', function () {
    var app = $(this).attr('id');
    var str = app.replace(/chkbx/g, '');


    if ($(this).prop('checked') == true) {
        chkboxcount++;
        $.ajax({
            url: 'CounsellingLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {command: 'updateTok', str: str},
            success: function (data) {

            }
        });

    } else {
        chkboxcount--;
        $.ajax({
            url: 'CounsellingLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {command: 'updateUnchek', str: str},
            success: function (data) {

            }
        });
    }

    // if (ii == chkboxcount) {
    //     chkboxstatus = "OK";
    //     $('#completeCoun').show();
    // } else {
    //     chkboxstatus = "";
    //     $('#completeCoun').hide();
    // }






});



// Skip button
$(document).on('click','.btnskip',function () {
    var Tid = this.id.split('_')[1];
    // $("#chkbx" + Tid).removeAttr("disabled");
    $("#chkbx" + Tid).prop('checked',true);
    chkboxcount++;
    $.ajax({
        url: 'CounsellingLoadData',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {command: 'CompletedCounseling', app_no: Tid},
        success: function (data) {

        }
    });

    if (ii == chkboxcount) {
        // $('#completeCoun').show();
    }
});