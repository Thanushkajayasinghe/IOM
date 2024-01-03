$(document).ready(function () {

    //Noty Load
    Noty.overrideDefaults({
        theme: 'limitless',
        layout: 'topRight',
        type: 'alert',
        timeout: 1500
    });


    //Reload button on click
    $('#btnReload').on('click', function () {
        wait();
        LoadData();
    });


    function LoadData() {

        $.ajax({
            url: 'LoadChangeStatus',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {command: "LoadAllData"},
            success: function (data) {

                var html = "";
                var i = 0;
                $(data.result).each(function (key, val) {
                    i++;
                    html += '<tr>';
                    html += '<td>' + i + '</td>';
                    html += '<td>' + val.temp_passport + '</td>';
                    html += '<td>' + val.temp_app_no + '</td>';
                    html += '<td>' + val.temp_token_no + '</td>';
                    html += '<td align="center"><input type="text" class="form-control rna-input stat currentRegStat" value="' + val.temp_reg + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';

                    var regCounter = val.temp_reg_counter;
                    if (regCounter == "2") {
                        regCounter = 1;
                    } else if (regCounter == "3") {
                        regCounter = 2;
                    } else if (regCounter == "4") {
                        regCounter = 3;
                    } else if (regCounter == "5") {
                        regCounter = 4;
                    } else if (regCounter == "6") {
                        regCounter = 5;
                    }
                    html += '<td align="center"><input type="text" class="form-control rna-input currentRegCounterStat" value="' + regCounter + '"  style="height:  26px !important;text-align: center; width: 70px;"></td>';
                    html += '<td align="center"><input type="text" class="form-control rna-input currentCounsellingStat" value="' + val.temp_counsel + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';

                    var couCounter = val.temp_counsel_counter;
                    if (couCounter == "8") {
                        couCounter = 1;
                    } else if (couCounter == "9") {
                        couCounter = 2;
                    }
                    html += '<td align="center"><input type="text" class="form-control rna-input currentCounsellingCounterStat" value="' + couCounter + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';
                    if (val.tab_no != null) {
                        html += '<td align="center"><input type="text" class="form-control rna-input currentCounsellingTabStat" value="' + val.tab_no + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';
                    } else {
                        html += '<td align="center"><input type="text" class="form-control r2na-input currentCounsellingTabStat" style="height:  26px !important;text-align: center; width: 70px;"></td>';
                    }
                    html += '<td align="center"><input type="text" class="form-control rna-input stat currentCXRStat" value="' + val.temp_cxr + '" style="height:  26px !important;text-align: center;width: 70px;"></td>';

                    var cxrCounter = val.temp_cxr_counter;
                    if (cxrCounter == "10") {
                        cxrCounter = 1;
                    } else if (cxrCounter == "11") {
                        cxrCounter = 2;
                    }
                    html += '<td align="center"><input type="text" class="form-control rna-input currentCXRCounterStat" value="' + cxrCounter + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';
                    html += '<td align="center"><input type="text" class="form-control rna-input stat currentRadiologyStat" value="' + val.temp_radiology + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';

                    var radCounter = val.temp_radiology_counter;
                    if (radCounter == "32") {
                        radCounter = 1;
                    } else if (radCounter == "33") {
                        radCounter = 2;
                    } else if (radCounter == null) {
                        radCounter = 0;
                    }
                    html += '<td align="center"><input type="text" class="form-control rna-input currentRadiologyCounterStat" value="' + radCounter + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';
                    html += '<td align="center"><input type="text" class="form-control rna-input stat currentPhlStat" value="' + val.temp_phlebotomy + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';

                    var phlCounter = val.temp_phlebotomy_counter;
                    if (phlCounter == "12") {
                        phlCounter = 1;
                    } else if (phlCounter == "13") {
                        phlCounter = 2;
                    }
                    html += '<td align="center"><input type="text" class="form-control rna-input currentPhlCounterStat" value="' + phlCounter + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';
                    html += '<td align="center"><input type="text" class="form-control rna-input stat currentConsultStat" value="' + val.temp_consult + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';

                    var conCounter = val.temp_consult_counter;
                    if (conCounter == "14") {
                        conCounter = 1;
                    } else if (conCounter == "15") {
                        conCounter = 2;
                    } else if (conCounter == "16") {
                        conCounter = 3;
                    } else if (conCounter == "17") {
                        conCounter = 4;
                    } else {
                        conCounter = 0;
                    }
                    html += '<td align="center"><input type="text" class="form-control rna-input currentConsultCounterStat" value="' + conCounter + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';
                    html += '</tr>';
                });

                $('#TBodyTempTable').html("");
                $('#TBodyTempTable').html(html);


                closewait();

                //Validate Input within range
                $('.stat').jStepper({minValue: 1, maxValue: 4, minLength: 1});
                $('.currentCounsellingStat').jStepper({minValue: 0, maxValue: 5, minLength: 1});
                $('.currentRegCounterStat').jStepper({minValue: 0, maxValue: 5, minLength: 1});
                $('.currentCounsellingCounterStat').jStepper({minValue: 0, maxValue: 2, minLength: 1});
                // $('.currentCounsellingTabStat').jStepper({minValue: 0, maxValue: 10, minLength: 1});
                $('.currentCXRCounterStat').jStepper({minValue: 0, maxValue: 2, minLength: 1});
                $('.currentPhlCounterStat').jStepper({minValue: 0, maxValue: 2, minLength: 1});
                $('.currentConsultCounterStat').jStepper({minValue: 0, maxValue: 4, minLength: 1});
            }, complete: function (data) {


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

        $this.parent().css({"position": "relative", "text-align": "fff"});
        $this.parent().append('<img style="width: 48px;position: absolute;z-index: 2;top: 7px;left: 30px;" src="images/loading.gif">').css({"text-align": "center"});
        var type = "";
        var val = $this.val();

        if ($this.hasClass('currentRegStat')) {
            type = "RegisterStat";
        } else if ($this.hasClass('currentRegCounterStat')) {
            type = "RegistrationCounterStat";

            if (val == "1") {
                val = 2;
            } else if (val == "2") {
                val = 3;
            } else if (val == "3") {
                val = 4;
            } else if (val == "4") {
                val = 5;
            } else if (val == "5") {
                val = 6;
            }
        } else if ($this.hasClass('currentCounsellingStat')) {
            type = "CounsellingStat";
        } else if ($this.hasClass('currentCounsellingCounterStat')) {
            type = "CounsellingCounterStat";

            if (val == "1") {
                val = 8;
            } else if (val == "2") {
                val = 9;
            }
        } else if ($this.hasClass('currentCounsellingTabStat')) {
            type = "CounsellingTabStat";
        } else if ($this.hasClass('currentCXRStat')) {
            type = "CXRStat";
        } else if ($this.hasClass('currentCXRCounterStat')) {
            type = "CXRCounterStat";

            if (val == "1") {
                val = 10;
            } else if (val == "2") {
                val = 11;
            }
        } else if ($this.hasClass('currentRadiologyStat')) {
            type = "RadiologyStat";
        } else if ($this.hasClass('currentRadiologyCounterStat')) {
            type = "RadiologyCounterStat";

            if (val == "1") {
                val = 32;
            } else if (val == "2") {
                val = 33;
            } else if (val == "0") {
                val = "";
            }
        } else if ($this.hasClass('currentPhlStat')) {
            type = "PhlStat";
        } else if ($this.hasClass('currentPhlCounterStat')) {
            type = "PhlCounterStat";

            if (val == "1") {
                val = 12;
            } else if (val == "2") {
                val = 13;
            }
        } else if ($this.hasClass('currentConsultStat')) {
            type = "ConsultStat";
        } else if ($this.hasClass('currentConsultCounterStat')) {
            type = "ConsultCounterStat";

            if (val == "1") {
                val = 14;
            } else if (val == "2") {
                val = 15;
            } else if (val == "3") {
                val = 16;
            } else if (val == "4") {
                val = 17;
            }
        }

        $.ajax({
            url: 'LoadChangeStatus',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {command: "UpdateCellData", appno: appNo, Type: type, val: val},
            success: function (data) {

                new Noty({
                    text: 'Successfully Updated!',
                    type: 'success'
                }).show();

            }, complete: function () {

                setTimeout(function () {
                    $this.parent().find('img').remove();
                }, 400);

                if ($('#tokenNoLookUp').val() == "") {
                    LoadData();
                } else {
                    tokenNoLookup($('#tokenNoLookUp').val());
                }
            }
        });

    });


    //Token No Lookup
    $(document).on('change', "#tokenNoLookUp", function () {

        wait();

        const tokenNo = $(this).val();

        tokenNoLookup(tokenNo);
    });


    function tokenNoLookup(tokenNo) {

        $.ajax({
            url: 'LoadChangeStatus',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {command: "tokenNoLookUp", tokenNo: tokenNo},
            success: function (data) {

                var html = "";
                var i = 0;
                $(data.result).each(function (key, val) {
                    i++;
                    html += '<tr>';
                    html += '<td>' + i + '</td>';
                    html += '<td>' + val.temp_passport + '</td>';
                    html += '<td>' + val.temp_app_no + '</td>';
                    html += '<td>' + val.temp_token_no + '</td>';
                    html += '<td align="center"><input type="text" class="form-control rna-input stat currentRegStat" value="' + val.temp_reg + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';

                    var regCounter = val.temp_reg_counter;
                    if (regCounter == "2") {
                        regCounter = 1;
                    } else if (regCounter == "3") {
                        regCounter = 2;
                    } else if (regCounter == "4") {
                        regCounter = 3;
                    } else if (regCounter == "5") {
                        regCounter = 4;
                    } else if (regCounter == "6") {
                        regCounter = 5;
                    }
                    html += '<td align="center"><input type="text" class="form-control rna-input currentRegCounterStat" value="' + regCounter + '"  style="height:  26px !important;text-align: center; width: 70px;"></td>';
                    html += '<td align="center"><input type="text" class="form-control rna-input currentCounsellingStat" value="' + val.temp_counsel + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';

                    var couCounter = val.temp_counsel_counter;
                    if (couCounter == "8") {
                        couCounter = 1;
                    } else if (couCounter == "9") {
                        couCounter = 2;
                    }
                    html += '<td align="center"><input type="text" class="form-control rna-input currentCounsellingCounterStat" value="' + couCounter + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';
                    if (val.tab_no != null) {
                        html += '<td align="center"><input type="text" class="form-control rna-input currentCounsellingTabStat" value="' + val.tab_no + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';
                    } else {
                        html += '<td align="center"><input type="text" class="form-control r2na-input currentCounsellingTabStat" style="height:  26px !important;text-align: center; width: 70px;"></td>';
                    }
                    html += '<td align="center"><input type="text" class="form-control rna-input stat currentCXRStat" value="' + val.temp_cxr + '" style="height:  26px !important;text-align: center;width: 70px;"></td>';

                    var cxrCounter = val.temp_cxr_counter;
                    if (cxrCounter == "10") {
                        cxrCounter = 1;
                    } else if (cxrCounter == "11") {
                        cxrCounter = 2;
                    }
                    html += '<td align="center"><input type="text" class="form-control rna-input currentCXRCounterStat" value="' + cxrCounter + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';
                    html += '<td align="center"><input type="text" class="form-control rna-input stat currentPhlStat" value="' + val.temp_phlebotomy + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';

                    var radCounter = val.temp_radiology_counter;
                    if (radCounter == "32") {
                        radCounter = 1;
                    } else if (radCounter == "33") {
                        radCounter = 2;
                    } else if (radCounter == null) {
                        radCounter = 0;
                    }
                    html += '<td align="center"><input type="text" class="form-control rna-input currentRadiologyCounterStat" value="' + radCounter + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';
                    html += '<td align="center"><input type="text" class="form-control rna-input stat currentPhlStat" value="' + val.temp_phlebotomy + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';

                    var phlCounter = val.temp_phlebotomy_counter;
                    if (phlCounter == "12") {
                        phlCounter = 1;
                    } else if (phlCounter == "13") {
                        phlCounter = 2;
                    }
                    html += '<td align="center"><input type="text" class="form-control rna-input currentPhlCounterStat" value="' + phlCounter + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';
                    html += '<td align="center"><input type="text" class="form-control rna-input stat currentConsultStat" value="' + val.temp_consult + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';

                    var conCounter = val.temp_consult_counter;
                    if (conCounter == "14") {
                        conCounter = 1;
                    } else if (conCounter == "15") {
                        conCounter = 2;
                    } else if (conCounter == "16") {
                        conCounter = 3;
                    } else if (conCounter == "17") {
                        conCounter = 4;
                    }
                    html += '<td align="center"><input type="text" class="form-control rna-input currentConsultCounterStat" value="' + conCounter + '" style="height:  26px !important;text-align: center; width: 70px;"></td>';
                    html += '</tr>';
                });

                $('#TBodyTempTable').html("");
                $('#TBodyTempTable').html(html);

            }, complete: function (data) {

                closewait();

                //Validate Input within range
                $('.stat').jStepper({minValue: 1, maxValue: 4, minLength: 1});
                $('.currentCounsellingStat').jStepper({minValue: 0, maxValue: 5, minLength: 1});
                $('.currentRegCounterStat').jStepper({minValue: 0, maxValue: 5, minLength: 1});
                $('.currentCounsellingCounterStat').jStepper({minValue: 0, maxValue: 2, minLength: 1});
                // $('.currentCounsellingTabStat').jStepper({minValue: 0, maxValue: 10, minLength: 1});
                $('.currentCXRCounterStat').jStepper({minValue: 0, maxValue: 2, minLength: 1});
                $('.currentPhlCounterStat').jStepper({minValue: 0, maxValue: 2, minLength: 1});
                $('.currentConsultCounterStat').jStepper({minValue: 0, maxValue: 4, minLength: 1});
            }
        });
    }

});
