$(document).ready(function () {

    $('#datePref').on('change', function () {

        var date = $(this).val();

        $.ajax({
            url: 'IHUReportDataLoad',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                date: date
            },
            success: function (data) {

                var html = "";
                var no = 0;

                html += '<table class="table table-bordered table-hover table-striped text-center" id="tablewer">';
                html += '<thead style="background-color: darkslategray;color: wheat;">';
                html += '<tr>';
                html += '<th nowrap style="display: none;"></th>';
                html += '<th nowrap></th>';
				html += '<th nowrap>Date</th>';
				html += '<th nowrap>Passport No</th>';
				html += '<th nowrap>First Name</th>';
                html += '<th nowrap>Last Name</th>';     
				html += '<th nowrap style="display: none;">Appointment No</th>';				
                html += '<th nowrap>Country</th>';
                html += '<th nowrap>Sponsor Name</th>';
				html += '<th nowrap>Photo</th>';				
                html += '</tr>';
                html += '</thead>';
                html += '<tbody id="RTBody">';

                $(data.result).each(function (key, val) {

                    if (val.AppointmentNumber != null && val.reg_photo_booth != null) {

                        no++;
                        if (val.printcol == true) {
                            html += '<tr class="selected">';
                        } else {
                            html += '<tr>';
                        }
                        html += '<td style="display: none">' + val.id + '</td>';
                        html += '<td>' + no + '</td>';
						
						var currentTime = new Date(val.createddate);
						var month = currentTime.getMonth() + 1;
						var date = currentTime.getDate();
						var year = currentTime.getFullYear();
						const dateSelected = year + '/' + ("0" + month).slice(-2) + '/' +("0" + date).slice(-2); 

						html += '<td>' + dateSelected + '</td>';
                        html += '<td>' + val.PassportNumber + '</td>';
						html += '<td>' + val.FirstName + '</td>';
                        html += '<td>' + val.LastName + '</td>';
						html += '<td style="display:none;">' + val.AppointmentNumber + '</td>';
                        html += '<td>' + val.Nationality + '</td>';
                        html += '<td>' + val.SponsorName + '</td>';
                        html += '<td attr-photo="' + val.reg_photo_booth + '"><img style="width: 265px;height: 100px;" src="' + imgPathBlade + '/photoBoothFiles/' + val.reg_photo_booth + '" class="img-thumbnail" ><span></span></td>';
                        html += '</tr>';
                    }
                });
                html += '</tbody></table>';


                $('#familyMemTable').html("");
                $('#familyMemTable').html(html);

            }, complete: function () {

                var table1 = $('#tablewer').DataTable({
                    "bPaginate": false,
                    dom: 'Blfrtip',
                    select: {
                        style: 'multi'
                    },
                    "order": [[1, "asc"]],
                    buttons: [
                        'selectAll',
                        'selectNone',
                        {
                            extend: 'collection',
                            text: 'Export Selected',
                            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                            exportOptions: {
                                rows: {selected: true}
                            }
                        }
                    ],
                    "lengthMenu": [50, 100, 200]
                });
            }
        });

    });


    $('#btnSave').on('click', function () {

        var appNoOL = [];
        $('#RTBody tr.selected').each(function () {
            var $this = $(this);

            var appNo = $this.find('td:nth-child(7)').text();
            appNoOL.push(appNo);
        });

        $.ajax({
            url: 'IHUReportSave',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                appNo: appNoOL,
                date: $('#datePref').val()
            },
            success: function (data) {

                Swal('Successfully Saved!', '', 'success');

                var date = $('#datePref').val();
                window.open(urlPath + '/ihuReportGen?date=' + date);

                $('#familyMemTable').html("");
                $('#familyMemTable').html(html);
            }
        });

    });


    $('#btnPrint').on('click', function () {

        var date = $('#datePref').val();
        window.open(urlPath + '/ihuReportGen?date=' + date);
    });


});




