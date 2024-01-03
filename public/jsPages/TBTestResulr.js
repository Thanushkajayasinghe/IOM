$(document).ready(function () {

    var barcode = localStorage.getItem("barcode");
	var appNo = localStorage.getItem("appnoSputum");
    localStorage.removeItem("barcode");
	localStorage.removeItem("appnoSputum");

    if (barcode != null) {

        $("#labno").val(barcode);
		$("#appNoTxt").val(appNo);
    }

    //auto load received date
    loadDate();

    function loadDate() {

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        var hour = today.getHours();
        var minute = today.getMinutes();
        var second = today.getSeconds();

        if (mm.toString().length == 1) {
            mm = '0' + mm;
        }
        if (dd.toString().length == 1) {
            dd = '0' + dd;
        }

        var d = yyyy + "/" + mm + "/" + dd;
        var t = hour + ':' + minute + ':' + second;

        $('#date').val(d);
        $('#time').val(t);
    }

    // Save
    $('#btnsave').on('click', function () {

        Swal.fire({
            title: 'Are you sure?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Save it!'
        }).then((result) => {
            if (result.value) {

                if (validate('#pvali')) {

                    var barcode = $('#labno').val();
					var appNo = $('#appNoTxt').val();
                    var genexpert = $('#genexpert').val();
                    var afb = $('#afb').val();
                    var liquidculture = $('#liquidculture').val();
                    var solidculture = $('#solidculture').val();
                    var drugsensitivity = $('#drugsensitivity').val();
                    var drugdetail = $('#drugdetail').val();
                    var date = $('#date').val();
                    var time = $('#time').val();

                    $.ajax({
                        url: 'TBformsave',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            barcode: barcode,
							appNo: appNo,
                            genexpert: genexpert,
                            afb: afb,
                            liquidculture: liquidculture,
                            solidculture: solidculture,
                            drugsensitivity: drugsensitivity,
                            drugdetail: drugdetail,
                            date: date,
                            time: time
                        },
                        success: function (data) {

                            if (data.result == true) {

                                Swal.fire({
                                    type: 'success',
                                    title: 'Data Saved Successfully!',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.value) {
                                        window.open('SputumCollectionList', '_self');
                                    }
                                })

                            } else {

                                Swal.fire(
                                    'Lab No Already Exist',
                                    '',
                                    'warning'
                                )
                            }
                        }
                    });
                }
            }
        });
    });


//Time Picker
    $('.timePickerx').timepicker();
});
