$('#CollectedDate').on('change', function () {
    var Date = $('#CollectedDate').val();
    Lode_Date_wise_All_Active_Sample(Date);
});

function Lode_Date_wise_All_Active_Sample(Date) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'BloodSampleDispatchForMalariaa',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {function: 'LodeActiveSample', selectedDate: Date},
        success: function (data) {

            var html = '';
            var i = 0;
            $('#familyMemTBody').html("");
            $(data.result).each(function (key, val) {

                if (val.ps_hiv_barcode != null && val.ps_hiv_barcode != "") {
                    if (val.hiv_status == "Active") {
                        i++;
                        html += "<tr><td style='display: none'>" + val.ps_id + "</td>";
                        html += "<td>" + i + "</td>";
                        html += "<td>" + val.ps_app_no + "</td>";
                        html += "<td>" + val.ps_passp_no + "</td>";
                        html += "<td>" + val.ps_hiv_barcode + "</td>";
                        html += "<td > " +
                            "<input class='form-control userPerSelect cb-element' name='tblchk' id='Q" + i + "' type='checkbox'><label for='Q" + i + "' style='padding: 7px 12px;'></label>" +
                            "</td></tr>";
                    }
                }

                if (val.ps_malaria_barcode != null && val.ps_malaria_barcode != "") {
                    if (val.malaria_status == "Active") {
                        i++;
                        html += "<tr><td style='display: none'>" + val.ps_id + "</td>";
                        html += "<td>" + i + "</td>";
                        html += "<td>" + val.ps_app_no + "</td>";
                        html += "<td>" + val.ps_passp_no + "</td>";
                        html += "<td>" + val.ps_malaria_barcode + "</td>";
                        html += "<td > " +
                            "<input class='form-control userPerSelect cb-element' name='tblchk' id='Q" + i + "' type='checkbox'><label for='Q" + i + "' style='padding: 7px 12px;'></label>" +
                            "</td></tr>";
                    }
                }
                if (val.ps_filaria_barcode != null && val.ps_filaria_barcode != "") {
                    if (val.filaria_status == "Active") {
                        i++;
                        html += "<tr><td style='display: none'>" + val.ps_id + "</td>";
                        html += "<td>" + i + "</td>";
                        html += "<td>" + val.ps_app_no + "</td>";
                        html += "<td>" + val.ps_passp_no + "</td>";
                        html += "<td>" + val.ps_filaria_barcode + "</td>";
                        html += "<td > " +
                            "<input class='form-control userPerSelect cb-element' name='tblchk' id='Q" + i + "' type='checkbox'><label for='Q" + i + "' style='padding: 7px 12px;'></label>" +
                            "</td></tr>";

                    }
                }


            });
            $('#familyMemTBody').html(html);

        }
    });

}

$("#userPerSelectIdAll").on('click', function () {
    if ($("#userPerSelectIdAll").prop('checked') == true) {
        $("input:checkbox").prop('checked', true);
    } else {
        $("input:checkbox").prop('checked', false);
    }
})


$('#btnDispatch').on('click', function () {

    Swal.fire({
        title: 'Are you sure?',
        // text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, verify it!'
    }).then((result) => {
        if (result.value) {

            CurrentTimeandDate();
            var approveDate = $('#appdroveDate').val();
            var approveTime = $('#appdroveTime').val();
            var arr = new Array();

            $('#familyMemTBody tr').each(function () {

                if ($(this).find(':checkbox').is(':checked')) {
                    var idd = $(this).find('td:nth-child(1)').text();
                    var barcode = $(this).find('td:nth-child(5)').text();
                    arr.push([idd, barcode]);

                }
            });

            var arrayToSend = JSON.stringify(arr);


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                url: 'BloodSampleDispatchForMalariaa',
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    function: 'DispatchMalaria',
                    arrayToSend: arrayToSend,
                    approveDate: approveDate,
                    approveTime: approveTime
                },
                success: function (data) {
                    if (data.result == true) {
                        swal({
                            title: "Dispatch Successfully!",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonClass: 'btn-success',
                            confirmButtonText: 'OK!'

                        });
                    } else {
                        swal({
                            title: "Not Dispatch!",
                            type: "warning",
                            showCancelButton: false,
                            confirmButtonClass: 'btn-success',
                            confirmButtonText: 'OK!'

                        });
                    }
                },
                complete: function (data) {
                    var j = JSON.parse(data.responseText);
                    if (j.result == true) {
                        var Date = $('#CollectedDate').val();
                        Lode_Date_wise_All_Active_Sample(Date);
                    }
                }
            });
        }
    });

})
CurrentTimeandDate();

function CurrentTimeandDate() {
    var d = new Date();
    var h = d.getHours();
    var m = d.getMinutes();
    var s = d.getSeconds();
    if (h.length == 1) {
        h = '0' + h;
    }

    if (m.length == 1) {
        m = '0' + m;
    }

    if (s.length == 1) {
        s = '0' + s;
    }
    $('#appdroveTime').val(h + ':' + m + ':' + s);
    var month = d.getMonth() + 1;
    var day = d.getDate();

    var output = d.getFullYear() + '/' +
        (month < 10 ? '0' : '') + month + '/' +
        (day < 10 ? '0' : '') + day;
    $('#appdroveDate').val(output);
}

// Enter barcode and select chekbox
$('#BC').on('change', function () {

    var typBarCode = $('#BC').val();
    var no = 0;
    var no1 = 0;
    $('#familyMemTBody tr').each(function () {
        no++;
        var barcode = $(this).find('td:nth-child(5)').text();


        if (typBarCode == barcode) {
            $("#Q" + no + "").prop("checked", true);
            $('#BC').val("");

        } else {
            no1++;
        }
    });

    var rowCount = $('#familyMemTBody tr').length;
    if (rowCount == no1) {

        Swal.fire({
            type: 'error',
            title: 'Barcode Number Not Found!',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'ok'
        }).then((result) => {
            if (result.value) {
                $('#BC').val("");
            }
        })

    }
});