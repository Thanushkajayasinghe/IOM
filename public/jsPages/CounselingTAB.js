//--------Lode Recoeding (Anjana Added)--------------------------------------

$.ajax({
    url: 'CounselingSettingsCRUD',
    type: 'post',
    dataType: 'json',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },

    data: {command: 'tbl_counselling_record'},

    success: function (data) {
        $.each(data, function (key, val) {

            $("#addTabeleData").append('<tr class="mp3tableRow"> <td><p class="MainDesplayTBValues">' + val['csr_desc'] + '</p></td> <td><audio controls><source src="'+ path+'/'+ val['csr_file'] + '" type="audio/mpeg">Your browser does not support the audio element. </audio> <input type="hidden" value="' + data.result + '" class="mp3"></td></tr>');

        });
    },
    error: function (data) {
        alert(JSON.stringify(data));
    }
});

function Lode_PDF()
{
    window.open(
         pdfPath+"/IOMIMHAPInformedConsentForm_Final05222019.pdf",
        '_blank'
    );

}






//  ------------------------------ Sign Code ------------------------------------------------------
var canvas = document.getElementById('signature-pad');

function resizeCanvas() {
    var ratio = Math.max(window.devicePixelRatio || 1, 1);
    canvas.width = canvas.offsetWidth * ratio;
    canvas.height = canvas.offsetHeight * ratio;
    canvas.getContext("2d").scale(ratio, ratio);
}

window.onresize = resizeCanvas;
resizeCanvas();

var signaturePad = new SignaturePad(canvas, {
    backgroundColor: 'rgb(255, 255, 255)' // necessary for saving image as JPEG; can be removed is only saving as PNG or SVG
});

document.getElementById('Sinclear').addEventListener('click', function () {
    signaturePad.clear();
});

// --------------------- END Sign ----------------------------------------------------------------------


$('#congif').hide();
$('#btnAllSave').hide();

var Sarray = [];
var funtioncallcount = 0;
var arraylength = 0;
var current_no = 0;
loadProgressBar();


setInterval(function () {
    if (funtioncallcount == 0) {
        loadProgressBar();
    }
}, 5000);


// Load members
function LoadMember() {

    $.ajax({
        url: 'CounsellingTabLoadAllData',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            command: 'Load'
        },
        success: function (data) {

            if (data.result != "") {
                $('#con').show();
                $('#congif').hide();

                current_no = 1;
                var opt = "";
                var memnum = 0;

                $(data.result).each(function (key, val) {
                    memnum++;
                    Sarray.push([val.AppointmentNumber, val.FirstName, val.LastName, val.DateOfBirth, val.Gender, val.PassportNumber, val.CountryOfBirth])
                    opt += '<div class="stepwizard-step" ><a type="button" attr-appno="' + val.AppointmentNumber + '" attr-remark="" attr-sign="" class="btn btn-primary btn-circle tit" disabled="disabled"><span class="fa fa-user"></span></a><p>Member ' + memnum + '</p></div>';
                });
                $('#membrsicon').html(opt);


                if (memnum == 1) {
                    $('#btnsavenext').hide();
                    $('#btnAllSave').show();
                }

            } else {
                $('#con').hide();
                $('#congif').show();
            }
        }, complete: function () {
            arraylength = Sarray.length;


            for (var i = 0; i < Sarray.length; ++i) {
                if (i == 0) {
                    $('#regno').text(Sarray[i][0]);
                    $('#ppno').text(Sarray[i][5]);
                    $('#country').text(Sarray[i][6]);
                    $('#DOB').text(Sarray[i][3]);
                    $('#gender').text(Sarray[i][4]);
                    $('#NameInFull').text(Sarray[i][1] + " " + Sarray[i][2]);
                }

            }
        }, error: function (e) {

        }

    });

}


// User Icon Click
$(document).on('click', '.tit', function () {
    clear();
    var ss = $(this).attr('attr-appno');
    var RM = $(this).attr('attr-remark');
    var SIN = $(this).attr('attr-sign');


    $('.tit').removeClass('btn-warning').addClass('btn-primary');
    $(this).removeClass('btn-primary').addClass('btn-warning');

    // img bytecode set canvas
    var canvas = document.getElementById("signature-pad");
    var ctx = canvas.getContext("2d");
    var image = new Image();
    image.onload = function () {
        ctx.drawImage(image, 0, 0);
    };
    image.src = SIN;


    for (var i = 0; i < Sarray.length; ++i) {
        var loopary = Sarray[i][0];
        if (ss == loopary) {

            current_no = i + 1;

            $('#regno').text(Sarray[i][0]);
            $('#ppno').text(Sarray[i][5]);
            $('#country').text(Sarray[i][6]);
            $('#DOB').text(Sarray[i][3]);
            $('#gender').text(Sarray[i][4]);
            $('#NameInFull').text(Sarray[i][1] + " " + Sarray[i][2]);
            $('#txtremark').val(RM);
            signaturePad.clear();

            // $(this).attr("attr-remark", "20");
        }
    }

// Next Button & Complete Button show/hide
    if (current_no == arraylength) {
        $('#btnAllSave').show();
        $('#btnsavenext').hide();
    } else {
        $('#btnAllSave').hide();
        $('#btnsavenext').show();
    }

});


// Save and Next Button Click
$('#btnsavenext').on('click', function () {

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

            if (signaturePad.isEmpty()) {
                Swal.fire(
                    'Please provide a signature first.',
                    '',
                    'warning'
                )
            } else {

                current_no = current_no + 1;
                var regno = $('#regno').text();
                var remark = $('#txtremark').val();
                var data = signaturePad.toDataURL('image/png');


                $('[attr-appno="' + regno + '"]').attr("attr-remark", remark);
                $('[attr-appno="' + regno + '"]').attr("attr-sign", data);


                $('[attr-appno="' + regno + '"]').removeClass('btn-primary').addClass('btn-success');

                // Next Button & Complete Button show/hide
                if (current_no == arraylength) {
                    $('#btnAllSave').show();
                    $('#btnsavenext').hide();
                } else {
                    $('#btnAllSave').hide();
                    $('#btnsavenext').show();
                }

                for (var i = 0; i < Sarray.length; ++i) {
                    var loopary = current_no - 1;
                    if (i == loopary) {
                        clear();
                        $('#regno').text(Sarray[i][0]);
                        $('#ppno').text(Sarray[i][5]);
                        $('#country').text(Sarray[i][6]);
                        $('#DOB').text(Sarray[i][3]);
                        $('#gender').text(Sarray[i][4]);
                        $('#NameInFull').text(Sarray[i][1] + " " + Sarray[i][2]);
                        $('#txtremark').val(RM);


                    }
                }

                // $.ajax({
                //     url: 'CounsellingTabLoadAllData',
                //     type: 'post',
                //     dataType: 'json',
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     },
                //     data: {
                //         regno: regno,
                //         txtremark: txtremark,
                //         sin: data,
                //         command: 'save'
                //     },
                //     success: function (data) {
                //
                //         $('#regno').val("");
                //         $('#ppno').val("");
                //         $('#country').val("");
                //         $('#DOB').val("");
                //         $('#gender').val("");
                //         $('#email').val("");
                //         $('#NameInFull').val("");
                //         $('#txtremark').val("");
                //         $('#sin').val("");
                //         signaturePad.clear();
                //     }
                // });
            }
        }
    });

});


// Complete Button Click
$('#btnAllSave').on('click', function () {
    var signOK = 0;
    var arr = [];
    var regno = $('#regno').text();
    var remark = $('#txtremark').val();
    var data = signaturePad.toDataURL('image/png');

    $('[attr-appno="' + regno + '"]').attr("attr-remark", remark);

    if (!signaturePad.isEmpty()) {
        $('[attr-appno="' + regno + '"]').attr("attr-sign", data);
    }


    $('.tit').each(function () {
        var RNO = $(this).attr('attr-appno');
        var RM = $(this).attr('attr-remark');
        var SIN = $(this).attr('attr-sign');

        arr.push([RNO, RM, SIN]);

        if (SIN == "") {
            signOK++;
        }

    });


    if (signOK == 0) {

        var arrayToSend = JSON.stringify(arr);
        $.ajax({
            url: 'CounsellingTabLoadAllData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                arrayToSend: arrayToSend,
                command: 'save'
            },
            success: function (data) {
                location.reload();
            }
        });
    } else {
        Swal.fire(
            'Please provide a signature first.',
            '',
            'warning'
        )
    }

});


function loadProgressBar() {

    $('#con').hide();
    $('#congif').show();

    $.ajax({
        url: 'CounsellingTabLoadAllData',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            command: 'LoadProgress'
        },
        success: function (data) {
            if (data.result != "") {
                var resultTOT = data.RTOT;
                var countt = data.cou;

                var d = 100 / countt;
                var valu = d * resultTOT;

                $('#prgBar').css('width', valu + '%').attr('aria-valuenow', valu);
                $('#prgBar').text(valu + "% Complete");

                if (resultTOT == countt) {
                    setTimeout(function () {
                        funtioncallcount++;
                        LoadMember();
                    }, 1000);

                }

            }
        }

    });
}

function clear() {

    $('#regno').text("");
    $('#ppno').text("");
    $('#country').text("");
    $('#DOB').text("");
    $('#gender').text("");
    $('#email').text("");
    $('#NameInFull').text("");
    $('#txtremark').val("");
    $('#sin').val("");
    signaturePad.clear();
}
