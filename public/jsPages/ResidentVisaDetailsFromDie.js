$('#csvcon').hide();
$('#Mancon').hide();
$('#datecon').hide();
$('#residentVisaDetailsTable').hide();
$('#btnSave').hide();

$('#btnmanual').on('click', function () {
    $('#csvcon').hide();
    $('#Mancon').show();
    $('#datecon').show();
    $('#residentVisaDetailsTable').show();
    $('#btnSave').show();
    dataclear();
});
$('#btncsv').on('click', function () {
    $('#csvcon').show();
    $('#Mancon').hide();
    $('#residentVisaDetailsTable').show();
    $('#btnSave').show();
    $('#datecon').show();
    dataclear();
});

//Add button on click
$('#btnSlStoreDocUpload').on('click', function () {
    if (validate('#frmvali')) {
        const passportNo = $('#txtPassport').val();
        const firstName = $('#txtFirstName').val();
        const lastName = $('#txtLastName').val();
        const country = $('#txtCountry').val();
        const visaNo = $('#txtVisaNo').val();
        const visaIssueDate = $('#txtVisaIssueDate').val();

        var currentNo = $('#tBodyOrderMainStReports tr:last td:first').text();

        if (currentNo == "NaN" || currentNo == "No data available in table") {
            currentNo = 0;
        }
        currentNo++;

        var table = $('#residentVisaDetailsTable').DataTable();
        table.destroy();

        $('#tBodyOrderMainStReports').append('<tr>' +
            '<td>' + currentNo + '</td>' +
            '<td>' + passportNo + '</td>' +
            '<td>' + firstName + '</td>' +
            '<td>' + lastName + '</td>' +
            '<td>' + country + '</td>' +
            '<td>' + visaNo + '</td>' +
            '<td>' + visaIssueDate + '</td>' +
            '<td style="display: none;">0</td>' +
            '<td style="text-align: center;"><span class="deleteCat"><span style="color:red;font-size: 20px;" class="fa fa-close"></span></span></td>' +
            '</tr>');

        $('#txtPassport').val("");
        $('#txtFirstName').val("");
        $('#txtLastName').val("");
        $('#txtCountry').val("");
        $('#txtVisaNo').val("");
        $('#txtVisaIssueDate').val("");
        $('#fileUpload').val("");

    }
});


//Save button on click
$('#btnSave').on('click', function () {

    var rowCount = $('#residentVisaDetailsTable >tbody >tr').length;
    var rowText = $('#residentVisaDetailsTable >tbody >tr').text();
    var txtdate = $('#date').val();

    if (rowCount != 0 && rowText != "No data available in table") {
        if (txtdate != "") {

            var co = 0;
            const date = $('#date').val();

            $('#residentVisaDetailsTable tbody tr').each(function () {

                const $this = $(this);

                if ($this.find('td:nth-child(8)').text() == 0) {
                    const passportNo = $this.find('td:nth-child(2)').text();
                    const firstName = $this.find('td:nth-child(3)').text();
                    const lastName = $this.find('td:nth-child(4)').text();
                    const country = $this.find('td:nth-child(5)').text();
                    const visaNo = $this.find('td:nth-child(6)').text();
                    const visaIssueDate = $this.find('td:nth-child(7)').text();

                    $.ajax({
                        url: 'ResidentVisaDetails',
                        type: 'POST',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        async: false,
                        data: {
                            date: date,
                            passportNo: passportNo,
                            firstName: firstName,
                            lastName: lastName,
                            country: country,
                            visaNo: visaNo,
                            visaIssueDate: visaIssueDate,
                            function: 'insert'
                        },
                        success: function (data) {

                            if (data.result == true) {
                                co++;
                            }
                        }
                    });
                }
            });

            if (co > 0) {

                Swal.fire({
                    type: 'success',
                    title: 'Data Saved Successfully!',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'ok'
                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    }
                })

            }

            loadTable(date);
        } else {
            Swal.fire(
                'Please Select Date!',
                '',
                'warning'
            )
        }
    } else {
        Swal.fire(
            'Table Empty.!',
            '',
            'warning'
        )
    }

});


//Date input on change
$('#date').on('change', function () {

    const dateVal = $(this).val();
    loadTable(dateVal);
});


//Load Table
function loadTable(dateVal) {

    $.ajax({
        url: 'ResidentVisaDetails',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            date: dateVal,
            function: 'loadTable'
        },
        success: function (data) {
            var cp = 0;
            var html = "";
            $(data.result).each(function (key, val) {
                cp++;
                html += "<tr>" +
                    "<td>" + cp + "</td>" +
                    "<td>" + val.passport_no + "</td>" +
                    "<td>" + val.first_name + "</td>" +
                    "<td>" + val.last_name + "</td>" +
                    "<td>" + val.country + "</td>" +
                    "<td>" + val.visa_no + "</td>" +
                    "<td>" + val.visa_issue_date + "</td>" +
                    "<td style='display: none;'>" + val.resident_visa_details_id + "</td>" +
                    "<td style='text-align: center;'><span class='deleteCat'><span style='color:red;font-size: 20px;' class='fa fa-close'></span></span></td>" +
                    "</tr>";
            });

            var table = $('#residentVisaDetailsTable').DataTable();
            table.destroy();

            $('#tBodyOrderMainStReports').html();
            $('#tBodyOrderMainStReports').html(html);
            loadDataTable();
        }
    });
}

//Delete tbl td
$(document).on('click', '.deleteCat', function () {
    var $this = $(this);
    var hiddID = $this.parents('tr').find('td:nth-child(8)').text();

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

            if (hiddID == 0) {
                $this.parent().parent().remove();
            } else {
                $.ajax({
                    url: 'ResidentVisaDetails',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        serial: hiddID,
                        function: 'DeleteVisaDet'
                    },
                    success: function (data) {

                        $this.parent().parent().remove();

                    }
                });
            }

            // Swal.fire(
            //     'Deleted!',
            //     'Record has been deleted successfully.',
            //     'success'
            // )

            setTimeout(function () {
                swal.close();
            }, 800);
        }
    })

});


// Load Data Table
function loadDataTable() {
    var table = $('#residentVisaDetailsTable').DataTable({
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'csv',
                footer: true,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }

            },
            {
                extend: 'excel',
                footer: true,
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6]
                }

            }

        ],
        "order": [[1, 'DESC']]
    });

    table.on('order.dt search.dt', function () {
        table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
}


////////////////////////////////////////////////////////////////////////

$("#upload").bind("click", function () {
    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.csv)$/;
    var aa = "";
    if (regex.test($("#fileUpload").val().toLowerCase())) {
        if (typeof (FileReader) != "undefined") {
            var reader = new FileReader();
            reader.onload = function (e) {
                var table = $("<table/>");
                var rows = e.target.result.split("\n");
                for (var i = 0; i < rows.length; i++) {
                    var row = $("<tr/>");
                    var cells = rows[i].split(",");

                    if (cells.length > 1) {
                        for (var j = 0; j < cells.length; j++) {
                            var cell = $("<td/>");
                            cell.html(cells[j]);
                            // row.append(cell);

                            if (j == 0) {
                                aa += "<tr>";
                                aa += "<td>" + cells[j] + "</td>";

                            } else if (j == 6) {
                                // var date = cells[j];
                                // var elem = date.split('/');
                                // var a1 = elem[0];
                                // var a2 = elem[1];
                                // var a3 = elem[2];
                                // var totdat = "";
                                //
                                // if (a3.length == 5) {
                                //     totdat = a3 + "/" + a2 + "/" + a1;
                                // } else if (aa.length == 5) {
                                //     totdat = a1 + "/" + a2 + "/" + a3;
                                // }

                                aa += "<td>" + cells[j] + "</td>";
                                aa += "<td style='text-align: center;'><span class='deleteCat'><span style='color:red;font-size: 20px;' class='fa fa-close'></span></span></td>";
                                aa += "</tr>";
                            } else {
                                aa += "<td>" + cells[j] + "</td>";
                            }


                        }
                        // table.append(row);
                    }
                }

                $("#tBodyOrderMainStReports").html('');
                $("#tBodyOrderMainStReports").html(aa);

                // loadDataTable();
            }
            reader.readAsText($("#fileUpload")[0].files[0]);

        } else {
            // alert("");
            Swal.fire(
                'This browser does not support HTML5!',
                '',
                'warning'
            )
        }
    } else {
        // alert(".");
        Swal.fire(
            'Please upload a valid CSV file!',
            '',
            'warning'
        )
    }

    $('#fileUpload').val("");
});


function dataclear() {
    $('#date').val("");
    $('#txtPassport').val("");
    $('#txtFirstName').val("");
    $('#txtLastName').val("");
    $('#txtCountry').val("");
    $('#txtVisaNo').val("");
    $('#txtVisaIssueDate').val("");
    $('#fileUpload').val("");

    var table = $('#residentVisaDetailsTable').DataTable();
    table.destroy();
    $('#tBodyOrderMainStReports').html("");

}

