$('#btnSearch').on('click', function () {

    serchDateWise();

});

var printtbody = "";

function serchDateWise() {
    var FromDate = $('#FromDate').val();
    var ToDate = $('#ToDate').val();
    var html = "";
    var i = 0;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'VeryfyAllData',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {FromDate: FromDate, ToDate: ToDate, funtion: "Load"},
        success: function (data) {
            printtbody = "";
            $(data.result).each(function (key, val) {
                i++;
                html += '<tr>';
                html += '<td style="display: none;">' + val.dtblabid + '</td>';
                html += '<td>' + i + '</td>';
                html += '<td>' + val.barcode + '</td>';
                html += '<td>';
                html += '<input class="form-control userPerSelect cb-element" name="tblchk" id="userPerSelectId' + i + '" onclick="addToArray(' + val.dtblabid + ')" type="checkbox">';
                html += '<label for="userPerSelectId' + i + '" style="padding: 7px 12px;"></label> ';
                html += '</div>';
                html += '</td>';
                html += '</tr>';


                printtbody += '<tr>';
                printtbody += '<td>' + i + '</td>';
                printtbody += '<td>' + val.barcode + '</td>';
                printtbody += '</tr>';

            });
        },
        complete: function () {
            $('#verifyStatTable').html("");
            $('#verifyStatTable').html(html);
        }
    });
}

// All Checkbox Select
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
            var fields = $("input[name='tblchk']").serializeArray();
            if (fields.length != 0) {

                CurrentTimeandDate();
                var approveDate = $('#appdroveDate').val();
                var approveTime = $('#appdroveTime').val();

                var arr = new Array();
                $('#verifyStatTable tr').each(function () {
                    if ($(this).find(':checkbox').is(':checked')) {
                        var idd = $(this).find('td:nth-child(1)').text();
                        arr.push([idd]);
                    }
                });
                var arrayToSend = JSON.stringify(arr);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: 'VeryfyAllData',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        arrayToSend: arrayToSend,
                        approveDate: approveDate,
                        approveTime: approveTime,
                        funtion: "approval"
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
                            serchDateWise();
                        }
                    }
                });
            } else {
                swal({
                    title: "Empty Select",
                    type: "warning",
                    showCancelButton: false,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'OK!'

                });
            }
        }
    });
});


CurrentTimeandDate();


// window.setInterval(function(){
//     /// call your function here
//     CurrentTimeandDate();
// }, 1000);

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


// Print button
$('#btnPrint').on('click', function () {
    // var FromDate = $('#FromDate').val();
    // var ToDate = $('#ToDate').val();
    //
    //
    // $.ajax({
    //     url: 'VeryfyAllData',
    //     type: 'POST',
    //     dataType: 'json',
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     },
    //     data: {FromDate: FromDate, ToDate: ToDate,funtion:"printtbl"},
    //     success: function (data) {
    //
    //         // var pdf= window.open("")
    //         // pdf.document.write("<iframe width='100%' height='100%'"+
    //         //     " src='data:application/pdf;base64, " + encodeURI(data)+"'></iframe>")
    //
    //
    //     }
    // });


    var headd = '<table border="1" style="border-collapse:collapse"><thead><tr><th>No</th><th>Barcode (Sample No)</th></tr></thead><tbody>';
    var fter = '</tbody></table>';
    var tot = headd + printtbody + fter;


    var winPrint = window.open('', 'left=0,top=0,width=800,height=600,toolbar=0,scrollbars=0,status=0');
    winPrint.document.write(tot);
    winPrint.document.close();
    winPrint.focus();
    winPrint.print();
    winPrint.close();

});