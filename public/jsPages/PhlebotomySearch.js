$(document).ready(function () {

    $('#btnSearch').on('click', function () {

        var table = $('.dataTablex').DataTable();
        table.destroy();

        var passportNo = $('#txtPassportNo').val();
        var appointmentNo = $('#txtAppointmentNo').val();
        var barcode = $('#txtBarcode').val();

        $.ajax({
            url: 'PhlebotomySearch',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                passportNo: passportNo,
                appointmentNo: appointmentNo,
                barcode: barcode,
                function: 'search'
            },
            success: function (data) {
                var html = '';

                $(data.result).each(function (key, val) {
                    html += "<tr>";
                    html += "<td>*</td>";
                    html += "<td>" + val.ps_passp_no + "</td>";
                    html += "<td>" + val.ps_app_no + "</td>";
                    if (val.ps_hiv_barcode != null) {
                        html += "<td>" + val.ps_hiv_barcode + "</td>";
                    } else if (val.ps_malaria_barcode != null) {
                        html += "<td>" + val.ps_malaria_barcode + "</td>";
                    } else if (val.ps_filaria_barcode != null) {
                        html += "<td>" + val.ps_filaria_barcode + "</td>";
                    } else if (val.ps_shcg_barcode) {
                        html += "<td>" + val.ps_shcg_barcode + "</td>";
                    }
                    html += "<td style=\"padding: 0;\">" +
                        " <button type='button' id='PrintBC'  class='btn-info btn-lg btn3d'  style='width: 6rem; position: relative;left: 7px; font-weight: bold;padding: 4px;'> "+
                        " <span class='fa fa-print'></span>&nbsp;&nbsp;Print"+
                        " </button>" +
                        "</td>";
                    html += "</tr>";
                });

                $('#phlebotomySearchTbody').html('');
                $('#phlebotomySearchTbody').html(html);
                $('#tableContainer').show();
            }, complete: function () {
                loadDataTable();
            }
        });

    });


    $(document).on('click','#PrintBC', function () {
        var bc = $(this).parent().parent().find('td:nth-child(4)').text();
        reprint(bc);
    });

    function reprint(barcode) {

        $.ajax({
            url: 'PhlebotomyLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'barcodeprint',
                barcod: barcode,
                appnum:'',
            },
            success: function (data) {
                var image = new Image();

                image.src = "data:image/jpg;base64," + data.r1;

                setTimeout(function () {

                    newWin = window.open("");
                    newWin.document.write(image.outerHTML + "<br>");
                    newWin.document.write("<span align='center'>Gender : " + data.r2);
                    newWin.document.write("/ Age : " + getAge(data.r3));
                    newWin.print();
                    newWin.close();
                }, 500);
            }
        });
    }
    function getAge(birthDateString) {
        var today = new Date();
        var birthDate = new Date(birthDateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }
    //Data Table Plugin Initiate
  /*  function loadDataTable() {
        var table1 = $('.dataTablex').DataTable({
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
    }*/

    $('#btnClear').on('click', function () {
        location.reload();
    });


});
