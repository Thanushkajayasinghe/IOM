$('#txtBarcodeNo').on('change', function () {

    wait();

    var value = $(this).val();

    $.ajax({
        url: 'HIVInterLoadPrevData',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            barcode: value
        },
        success: function (data) {

            $('#txtPassportNo').val(data.result[0].ps_passp_no);

            var html = "";
            var i = 0;
            $(data.res).each(function (key, val) {
                i++;
                html += '<tr>';
                html += '<td>' + val.testdate + '</td>';
                html += '<td>' + val.test + '</td>';
                html += '<td>' + val.testresult + '</td>';
                html += '</tr>';
            });

            $('#testAddTbodyHistory').html("");
            $('#testAddTbodyHistory').html(html);

            closewait();

        }
    });
});

$('#btnAddToGrid').on('click', function () {

    var txtTestDate = $('#txtTestDate').val();
    var txtTest = $('#drpTest').val();
    var txtTestResult = $('#drpTestResult').val();

    if (txtTestDate != "" && txtTest != "" && txtTestResult != "") {

        $('#testAddTbody').append('<tr>' +
            '<td>' + txtTestDate + '</td>' +
            '<td>' + txtTest + '</td>' +
            '<td>' + txtTestResult + '</td>' +
            '</tr>'
        );

        $('#txtTestDate').val("");
        $('#drpTest').val("");
        $('#drpTestResult').val("");
    } else {
        Swal(
            'All Fields Required!',
            '',
            'error'
        );
    }
});

$('#btnSave').on('click', function () {

    var barcode = $('#txtBarcodeNo').val();
    var passportNo = $('#txtPassportNo').val();
    var refereedDate = $('#txtRefereedDate').val();

    $('#testAddTbody tr').each(function () {

        var testDate = $(this).find('td:nth-child(1)').text();
        var test = $(this).find('td:nth-child(2)').text();
        var result = $(this).find('td:nth-child(3)').text();

        $.ajax({
            url: 'HIVInterSave',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                barcode: barcode,
                passportNo: passportNo,
                refereedDate: refereedDate,
                testDate: testDate,
                test: test,
                result: result
            },
            success: function (data) {

                Swal('Successfully Saved!', '', 'success');

                $('#txtBarcodeNo').val("");
                $('#txtPassportNo').val("");
                $('#txtRefereedDate').val("");
            }
        });
    });
});
