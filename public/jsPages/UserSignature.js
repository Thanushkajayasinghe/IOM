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


$('.dd').hide();


// Verify button
$('#Vbtn').on('click', function () {

    Swal.fire({
        title: 'Are you sure?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Submit!'
    }).then((result) => {
        if (result.value) {
            var UN = $('#Uun').val();
            var PW = $('#Upw').val();

            $.ajax({
                url: 'UserSignatureLoad',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    UN: UN,
                    PW: PW,
                    command: 'Verify'
                },
                success: function (data) {
                    if (data.result == true) {
                        $('.dd').show();
                    } else {
                        $('.dd').hide();
                        Swal.fire({
                            type: 'warning',
                            title: 'Error User Name & Password',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ok'
                        });
                        $('#Uun').val("");
                        $('#Upw').val("");
                    }
                }
            });
        }
    });
});


// Save button
$('#btnsave').on('click', function () {
    var UN = $('#Uun').val();
    var sign = signaturePad.toDataURL('image/png');

    if (!signaturePad.isEmpty()) {
        $.ajax({
            url: 'UserSignatureLoad',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                UN: UN,
                sign: sign,
                command: 'Save'
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
                    });
                }
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
