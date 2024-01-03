$(document).ready(function () {

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

    //load Data
    loadData();

    function loadData() {
        $.ajax({
            url: 'BloodSampleReceiveMalaria',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                function: 'loadData'
            },
            success: function (data) {
                var html = "";
                var cou = 0;
                $(data.result).each(function (key, val) {
                    cou++;
                    html += "<tr><td></td>";
                    html += "<td style='display: none;'>" + val.dtblabid + "</td>";
                    html += "<td>" + val.barcode + "</td>";
                    html += "<td>" + val.date + "</td>";
                    html += "<td>" + val.time + "</td>";
                    html += "<td></td>";
                    html += "<td></td>";
                    html += "<td><input type='text' class='form-control LN' placeholder='LAB No' name='LabNo" + cou + "' id='LabNo" + cou + "'></td>";
                    html += "</tr>";
                });

                $('#bloodSamRecForMalariaTbody').html();
                $('#bloodSamRecForMalariaTbody').html(html);
            },
            complete: function (data) {
                loadDataTable();
            }
        });
    }


    // Enter barcode and select chekbox
    $('#barcode').on('change', function (e) {

        var typBarCode = $('#barcode').val();
        var no = 0;
        var no1 = 0;
        $('#bloodSamRecForMalariaTbody tr').each(function () {
            no++;
            barcode = $(this).find('td:nth-child(3)').text();
            if (typBarCode == barcode) {
                $('#LabNo' + no + "").focus();
                $('#barcode').val("");
            } else {
                no1++;
            }

        });

        var rowCount = $('#bloodSamRecForMalariaTbody tr').length;
        if (rowCount == no1) {

            Swal.fire({
                type: 'error',
                title: 'Barcode Number Not Found!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ok'
            }).then((result) => {
                if (result.value) {
                    $('#barcode').val("");
                }
            })

        }

    });

    //barcode read function
    // $(document).on("paste", function (e) {
    //     $("#barcode").val("");
    //     var data1 = e.originalEvent.clipboardData.getData('Text');
    //     $("#barcode").focus();
    //
    //     var barcode = '';
    //     //setTimeout(function () {
    //     $("#barcode").val(data1);
    //     barcode = $("#barcode").val();
    //     //}, 500);
    //
    //     var co = 0;
    //
    //     if (!$('#bloodSamRecForMalariaTbody tr td').hasClass('dataTables_empty')) {
    //
    //         $('#bloodSamRecForMalariaTbody tr').each(function () {
    //             co++;
    //             var tr = $(this);
    //             var barcodeNo = tr.find('td:nth-child(3)').text();
    //
    //             if (barcode === barcodeNo) {
    //                 tr.find('#LabNo' + co + '').focus();
    //             }
    //         });
    //
    //     } else {
    //         Swal.fire({
    //             type: 'error',
    //             title: 'Barcode Number Not Found!',
    //             confirmButtonColor: '#3085d6',
    //             confirmButtonText: 'ok'
    //         }).then((result) => {
    //             if (result.value) {
    //                 $('#barcode').val("");
    //             }
    //         });
    //     }
    // });

    //Data Table Plugin Initiate
    function loadDataTable() {
        var table1 = $('#bloodSamRecForMalariaTbl').DataTable({
            "pageLength": 25,
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            dom: 'Blfrtip',
            buttons: [
                'csv', 'excel'
            ],
            "order": [[1, 'asc']]
        });

        table1.on('order.dt search.dt', function () {
            table1.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    }


    //Receive Data
    $('#receiveData').on('click', function () {

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
                var msg = 0;
                var date = $('#date').val();
                var time = $('#time').val();

                if (!$('#bloodSamRecForMalariaTbody tr td').hasClass('dataTables_empty')) {
                    $('#bloodSamRecForMalariaTbody tr').each(function () {
                        var tr = $(this);

                        if (tr.find('.LN').val() != '') {
                            msg++;
                            var labNo = tr.find('.LN').val();
                            var serial = tr.find('td:nth-child(2)').text();

                            $.ajax({
                                url: 'BloodSampleReceiveMalaria',
                                type: 'POST',
                                dataType: 'json',
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                data: {
                                    serial: serial,
                                    labNo: labNo,
                                    date: date,
                                    time: time,
                                    function: 'receiveData'
                                },
                                success: function (data) {
                                    //if (msg != 0) {
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
                                    //}
                                }
                            });
                        }
                    });

                    if (msg == 0) {
                        Swal.fire({
                            type: 'warning',
                            title: 'Lab Numbers Are Empty!',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ok'
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        });
                    }
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'No Samples To Receive!',
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
    });


});