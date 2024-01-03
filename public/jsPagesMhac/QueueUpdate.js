$(document).ready(function () {

    //Noty Load
    Noty.overrideDefaults({
        theme: 'limitless',
        layout: 'topRight',
        type: 'alert',
        timeout: 1500
    });


    $('#drpFloor').on('change', function () {
        var value = $(this).val();
        var country = $('#drpCountry').val();
        LoadData(value, country);
    });


    $('#drpCountry').on('change', function () {
        var value = $('#drpFloor').val();
        var country = $('#drpCountry').val();
        LoadData(value, country);
    });


    function LoadData(value, country) {

        $('#TBodyTempTable').html("");

        var floor = value;

        $.ajax({
            url: 'LoadMhacQueueUpdateData',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { floor: floor, country: country },
            success: function (data) {

                var html = "";
                var i = 0;

                $(data.result).each(function (key, val) {
                    i++;
                    html += '<tr>';
                    html += '<td>' + i + '</td>';
                    html += '<td>' + val.passport_no + '</td>';
                    html += '<td>' + val.appointment_no + '</td>';
                    html += '<td>' + val.token_no + '</td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="reg" attr-stat="status" class="form-control rna-input" value="' + val.registration_status + '" style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="reg" attr-stat="counter" class="form-control rna-input" value="' + val.registration_counter + '"  style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="vital" attr-stat="status" class="form-control rna-input" value="' + val.vital_status + '" style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="vital" attr-stat="counter" class="form-control rna-input" value="' + val.vital_counter + '" style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="cxr" attr-stat="status" class="form-control rna-input" value="' + val.cxr_status + '" style="height:  26px !important;text-align: center;width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="cxr" attr-stat="counter" class="form-control rna-input" value="' + val.cxr_counter + '" style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="phl" attr-stat="status" class="form-control rna-input" value="' + val.phlebotomy_status + '" style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="phl" attr-stat="counter" class="form-control rna-input" value="' + val.phlebotomy_counter + '" style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="doc" attr-stat="status" class="form-control rna-input" value="' + val.doctor_status + '" style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="doc" attr-stat="counter" class="form-control rna-input" value="' + val.doctor_counter + '" style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '</tr>';
                });

                $('#TBodyTempTable').html("");
                $('#TBodyTempTable').html(html);


                //Validate Input within range
                $('.rna-input').jStepper({ minValue: 0, maxValue: 5, minLength: 1 });
            }
        });
    }


    //Auto select text on focus
    $(document).on('click', 'input[type="text"]', function () {
        $(this).select();
    });


    //Save Changed Cell Data
    $(document).on('change', '.rna-input', function () {

        const $this = $(this);
        const appNo = $this.parents('tr').find('td:nth-child(3)').text();

        $this.parent().css({ "position": "relative", "text-align": "fff" });
        $this.parent().append('<img style="width: 48px;position: absolute;z-index: 2;top: 50%;left: 50%; transform: translate(-50%, -50%);" src="images/loading.gif">');
        var type = $this.attr('attr-type');
        var stat = $this.attr('attr-stat');
        var val = $this.val();

        $.ajax({
            url: 'UpdateStatusQueueUpdate',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { appno: appNo, type: type, stat: stat, val: val },
            success: function (data) {

                new Noty({
                    text: 'Successfully Updated!',
                    type: 'success'
                }).show();

            }, complete: function () {

                setTimeout(function () {
                    $this.parent().find('img').remove();
                }, 400);
            }
        });

    });


    //Token No Lookup
    $(document).on('change', "#tokenNoLookUp", function () {

        var floor = $('#drpFloor').val();

        if (floor == "--Select--") {
            alert('Plz Select Floor First!');
            return;
        }

        const tokenNo = $(this).val();

        var country = $('#drpCountry').val();
        tokenNoLookup(floor, country, tokenNo);
    });


    function tokenNoLookup(floor, country, tokenNo) {

        $.ajax({
            url: 'LoadMhacQueueUpdateDataPerToken',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { floor: floor, country: country, tokenNo: tokenNo },
            success: function (data) {

                var html = "";
                var i = 0;

                $(data.result).each(function (key, val) {
                    i++;
                    html += '<tr>';
                    html += '<td>' + i + '</td>';
                    html += '<td>' + val.passport_no + '</td>';
                    html += '<td>' + val.appointment_no + '</td>';
                    html += '<td>' + val.token_no + '</td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="reg" attr-stat="status" class="form-control rna-input" value="' + val.registration_status + '" style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="reg" attr-stat="counter" class="form-control rna-input" value="' + val.registration_counter + '"  style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="vital" attr-stat="status" class="form-control rna-input" value="' + val.vital_status + '" style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="vital" attr-stat="counter" class="form-control rna-input" value="' + val.vital_counter + '" style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="cxr" attr-stat="status" class="form-control rna-input" value="' + val.cxr_status + '" style="height:  26px !important;text-align: center;width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="cxr" attr-stat="counter" class="form-control rna-input" value="' + val.cxr_counter + '" style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="phl" attr-stat="status" class="form-control rna-input" value="' + val.phlebotomy_status + '" style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="phl" attr-stat="counter" class="form-control rna-input" value="' + val.phlebotomy_counter + '" style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="doc" attr-stat="status" class="form-control rna-input" value="' + val.doctor_status + '" style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '<td align="center"><span style="position: relative; display: inline-block;"><input type="text" attr-type="doc" attr-stat="counter" class="form-control rna-input" value="' + val.doctor_counter + '" style="height:  26px !important;text-align: center; width: 70px;"></span></td>';
                    html += '</tr>';
                });

                $('#TBodyTempTable').html("");
                $('#TBodyTempTable').html(html);


                //Validate Input within range
                $('.rna-input').jStepper({ minValue: 0, maxValue: 5, minLength: 1 });
            }
        });
    }

});
