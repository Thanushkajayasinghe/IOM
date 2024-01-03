$(document).ready(function () {


});



//Appointment No Change
$('#RegisterNo').on('change', function () {
    var val = $(this).val();
    SearchMemberDetails(val);
});


function loadCheckBox(AppNO) {

    var AppNO = AppNO;

    $.ajax({
        url: 'ConsultationLoadData',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        async: false,
        data: {
            command: 'Loadchkbox',
            AppNo: AppNO
        },
        success: function (data) {
            $(data.result).each(function (key, val) {
                if (val.rr_single_fibrous_streak == 1) {
                    $('#rchkbox1').prop('checked', true).uniform('refresh');
                }
                if (val.rr_bony_islets == 1) {
                    $('#rchkbox2').prop('checked', true).uniform('refresh');
                }
                if (val.rr_pleural_capping == 1) {
                    $('#rchkbox3').prop('checked', true).uniform('refresh');
                }
                if (val.rr_unilateral_bilateral == 1) {
                    $('#rchkbox4').prop('checked', true).uniform('refresh');
                }
                if (val.rr_calcified_nodule == 1) {
                    $('#rchkbox5').prop('checked', true).uniform('refresh');
                }

                if (val.rr_solitary_granuloma_hilum == 1) {
                    $('#rchkbox6').prop('checked', true).uniform('refresh');
                }
                if (val.rr_solitary_granuloma_enlarged == 1) {
                    $('#rchkbox7').prop('checked', true).uniform('refresh');
                }
                if (val.rr_single_multi_calc_pulmonary == 1) {
                    $('#rchkbox8').prop('checked', true).uniform('refresh');
                }
                if (val.rr_calcified_pleural_lesions == 1) {
                    $('#rchkbox9').prop('checked', true).uniform('refresh');
                }
                if (val.rr_costophrenic_angle == 1) {
                    $('#rchkbox10').prop('checked', true).uniform('refresh');
                }

                if (val.rr_notable_apical == 1) {
                    $('#rchkbox11').prop('checked', true).uniform('refresh');
                }
                if (val.rr_aplcal_fbronodualar == 1) {
                    $('#rchkbox12').prop('checked', true).uniform('refresh');
                }
                if (val.rr_multi_single_pulmonary_nodu_micronodules == 1) {
                    $('#rchkbox13').prop('checked', true).uniform('refresh');
                }
                if (val.rr_isolated_hilar == 1) {
                    $('#rchkbox14').prop('checked', true).uniform('refresh');
                }
                if (val.rr_multi_single_pulmonary_nodu_masses == 1) {
                    $('#rchkbox15').prop('checked', true).uniform('refresh');
                }
                if (val.rr_non_calcified_pleural_fibrosos == 1) {
                    $('#rchkbox16').prop('checked', true).uniform('refresh');
                }
                if (val.rr_interstltial_fbrosos == 1) {
                    $('#rchkbox17').prop('checked', true).uniform('refresh');
                }
                if (val.rr_any_cavitating_lesion == 1) {
                    $('#rchkbox18').prop('checked', true).uniform('refresh');
                }

                if (val.rr_skeleton_soft_issue == 1) {
                    $('#rchkbox19').prop('checked', true).uniform('refresh');
                }
                if (val.rr_cardiac_major_vessels == 1) {
                    $('#rchkbox20').prop('checked', true).uniform('refresh');
                }
                if (val.rr_lung_fields == 1) {
                    $('#rchkbox21').prop('checked', true).uniform('refresh');
                }
                if (val.rr_other == 1) {
                    $('#rchkbox22').prop('checked', true).uniform('refresh');
                }
            });

            $(data.result2).each(function (key, val) {

                $('#drpCategory').val(val.category);
                var ty1 = val.cm_cough;
                $('input[name="ty1"]').prop('checked', false).uniform('refresh');
                $('input[name="ty1"][value=' + ty1 + ']').prop('checked', true).uniform('refresh');
                // ================================================================
                var ty2 = val.cm_haemoptysis;
                $('input[name="ty2"]').prop('checked', false).uniform('refresh');
                $('input[name="ty2"][value=' + ty2 + ']').prop('checked', true).uniform('refresh');
                // ================================================================
                var ty3 = val.cm_night_sweats;
                $('input[name="ty3"]').prop('checked', false).uniform('refresh');
                $('input[name="ty3"][value=' + ty3 + ']').prop('checked', true).uniform('refresh');
                // ================================================================
                var ty4 = val.cm_weight_loss;
                $('input[name="ty4"]').prop('checked', false).uniform('refresh');
                $('input[name="ty4"][value=' + ty4 + ']').prop('checked', true).uniform('refresh');
                // ================================================================
                var ty5 = val.cm_fever;
                $('input[name="ty5"]').prop('checked', false).uniform('refresh');
                $('input[name="ty5"][value=' + ty5 + ']').prop('checked', true).uniform('refresh');
                // ================================================================
                var tyr1 = val.cm_any;
                $('input[name="tyr1"]').prop('checked', false).uniform('refresh');
                $('input[name="tyr1"][value=' + tyr1 + ']').prop('checked', true).uniform('refresh');
                // ================================================================
                var tyr2 = val.cm_prev_thor_surgery;
                $('input[name="tyr2"]').prop('checked', false).uniform('refresh');
                $('input[name="tyr2"][value=' + tyr2 + ']').prop('checked', true).uniform('refresh');
                // ================================================================
                var tyr3 = val.cm_cyanosis;
                $('input[name="tyr3"]').prop('checked', false).uniform('refresh');
                $('input[name="tyr3"][value=' + tyr3 + ']').prop('checked', true).uniform('refresh');
                // ================================================================
                var tyr4 = val.cm_resp_insufficient;
                $('input[name="tyr4"]').prop('checked', false).uniform('refresh');
                $('input[name="tyr4"][value=' + tyr4 + ']').prop('checked', true).uniform('refresh');
                // ================================================================
                var tyg1 = val.cm_history_tb;
                $('input[name="tyg1"]').prop('checked', false).uniform('refresh');
                $('input[name="tyg1"][value=' + tyg1 + ']').prop('checked', true).uniform('refresh');
                // ================================================================
                var tyg2 = val.cm_household_tb;
                $('input[name="tyg2"]').prop('checked', false).uniform('refresh');
                $('input[name="tyg2"][value=' + tyg2 + ']').prop('checked', true).uniform('refresh');
                // ================================================================
                var tyg3 = val.cm_active_tb;
                $('input[name="tyg3"]').prop('checked', false).uniform('refresh');
                $('input[name="tyg3"][value=' + tyg3 + ']').prop('checked', true).uniform('refresh');
                // ================================================================
                var cm_exams_results = val.cm_exams_results;
                $('#examsresults').val(cm_exams_results);


                if (val.cm_single_fibrous_streak == 1) {
                    $('#chkbox1').prop('checked', true).uniform('refresh');
                }
                if (val.cm_bony_islets == 1) {
                    $('#chkbox2').prop('checked', true).uniform('refresh');
                }
                if (val.cm_pleural_capping == 1) {
                    $('#chkbox3').prop('checked', true).uniform('refresh');
                }
                if (val.cm_unilateral_bilateral == 1) {
                    $('#chkbox4').prop('checked', true).uniform('refresh');
                }
                if (val.cm_calcified_nodule == 1) {
                    $('#chkbox5').prop('checked', true).uniform('refresh');
                }

                if (val.cm_solitary_granuloma_hilum == 1) {
                    $('#chkbox6').prop('checked', true).uniform('refresh');
                }
                if (val.cm_solitary_granuloma_enlarged == 1) {
                    $('#chkbox7').prop('checked', true).uniform('refresh');
                }
                if (val.cm_single_multi_calc_pulmonary == 1) {
                    $('#chkbox8').prop('checked', true).uniform('refresh');
                }
                if (val.cm_calcified_pleural_lesions == 1) {
                    $('#chkbox9').prop('checked', true).uniform('refresh');
                }
                if (val.cm_costophrenic_angle == 1) {
                    $('#chkbox10').prop('checked', true).uniform('refresh');
                }

                if (val.cm_notable_apical == 1) {
                    $('#chkbox11').prop('checked', true).uniform('refresh');
                }
                if (val.cm_aplcal_fbronodualar == 1) {
                    $('#chkbox12').prop('checked', true).uniform('refresh');
                }
                if (val.cm_multi_single_pulmonary_nodu_micronodules == 1) {
                    $('#chkbox13').prop('checked', true).uniform('refresh');
                }
                if (val.cm_isolated_hilar == 1) {
                    $('#chkbox14').prop('checked', true).uniform('refresh');
                }
                if (val.cm_multi_single_pulmonary_nodu_masses == 1) {
                    $('#chkbox15').prop('checked', true).uniform('refresh');
                }
                if (val.cm_non_calcified_pleural_fibrosos == 1) {
                    $('#chkbox16').prop('checked', true).uniform('refresh');
                }
                if (val.cm_interstltial_fbrosos == 1) {
                    $('#chkbox17').prop('checked', true).uniform('refresh');
                }
                if (val.cm_any_cavitating_lesion == 1) {
                    $('#chkbox18').prop('checked', true).uniform('refresh');
                }

                if (val.cm_skeleton_soft_issue == 1) {
                    $('#chkbox19').prop('checked', true).uniform('refresh');
                }
                if (val.cm_cardiac_major_vessels == 1) {
                    $('#chkbox20').prop('checked', true).uniform('refresh');
                }
                if (val.cm_lung_fields == 1) {
                    $('#chkbox21').prop('checked', true).uniform('refresh');
                }
                if (val.cm_other == 1) {
                    $('#chkbox22').prop('checked', true).uniform('refresh');
                }
                $('#cm_dpp_comment').val(val.cm_dpp_comment);
                $('#CXRay').val(val.cm_cxray);
                // -----------------------------------------------------
                if (val.cm_hiv_1 == 1) {
                    $('#chkbox70').prop('checked', true).uniform('refresh');
                }
                if (val.cm_hiv_2 == 1) {
                    $('#chkbox71').prop('checked', true).uniform('refresh');
                }
                if (val.cm_hiv_3 == 1) {
                    $('#chkbox72').prop('checked', true).uniform('refresh');
                }
                if (val.cm_hiv_4_1 == 1) {
                    $('#chkbox73').prop('checked', true).uniform('refresh');
                }
                if (val.cm_hiv_4_2 == 1) {
                    $('#chkbox74').prop('checked', true).uniform('refresh');
                }
                if (val.cm_hiv_5_0 == 1) {
                    $('#chkbox75').prop('checked', true).uniform('refresh');
                }
                if (val.cm_hiv_5_1 == 1) {
                    $('#chkbox76').prop('checked', true).uniform('refresh');
                }
                if (val.cm_hiv_6 == 1) {
                    $('#chkbox77').prop('checked', true).uniform('refresh');
                }
                if (val.cm_hiv_7 == 1) {
                    $('#chkbox78').prop('checked', true).uniform('refresh');
                }
                if (val.cm_hiv_8 == 1) {
                    $('#chkbox79').prop('checked', true).uniform('refresh');
                }
                if (val.cm_hiv_9_0 == 1) {
                    $('#chkbox80').prop('checked', true).uniform('refresh');
                }
                if (val.cm_hiv_9_1 == 1) {
                    $('#chkbox81').prop('checked', true).uniform('refresh');
                }
                if (val.cm_hiv_10 == 1) {
                    $('#chkbox82').prop('checked', true).uniform('refresh');
                }
                if (val.cm_hiv_11 == 1) {
                    $('#chkbox83').prop('checked', true).uniform('refresh');
                }
                if (val.cm_hiv_12 == 1) {
                    $('#chkbox84').prop('checked', true).uniform('refresh');
                }
                if (val.cm_hiv_13 == 1) {
                    $('#chkbox85').prop('checked', true).uniform('refresh');
                }


                if (val.cm_Malaria_14 == 1) {
                    $('#rchkbox86').prop('checked', true).uniform('refresh');
                }
                if (val.cm_Malaria_15 == 1) {
                    $('#rchkbox87').prop('checked', true).uniform('refresh');
                }
                if (val.cm_Malaria_16 == 1) {
                    $('#rchkbox88').prop('checked', true).uniform('refresh');
                }
                if (val.cm_Malaria_17 == 1) {
                    $('#rchkbox89').prop('checked', true).uniform('refresh');
                }
                if (val.cm_Malaria_18 == 1) {
                    $('#rchkbox90').prop('checked', true).uniform('refresh');
                }
                if (val.cm_Malaria_19 == 1) {
                    $('#rchkbox91').prop('checked', true).uniform('refresh');
                }
                if (val.cm_Malaria_20 == 1) {
                    $('#chkbox92').prop('checked', true).uniform('refresh');
                }
                if (val.cm_Filaria_21 == 1) {
                    $('#chkbox93').prop('checked', true).uniform('refresh');
                }
                if (val.cm_Filaria_22 == 1) {
                    $('#chkbox94').prop('checked', true).uniform('refresh');
                }
                if (val.cm_Filaria_23 == 1) {
                    $('#chkbox95').prop('checked', true).uniform('refresh');
                }
                if (val.cm_Filaria_24 == 1) {
                    $('#chkbox96').prop('checked', true).uniform('refresh');
                }
                if (val.cm_Filaria_25 == 1) {
                    $('#chkbox97').prop('checked', true).uniform('refresh');
                }
                if (val.cm_Filaria_26 == 1) {
                    $('#chkbox98').prop('checked', true).uniform('refresh');
                }


            });
        }
    });
}

function SearchMemberDetails(valx) {

    $.ajax({
        url: 'ConsultationLoadData',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            command: 'data',
            appointment: valx
        },
        success: function (data) {
            $('#registration_id').val(valx);
            $('#NameInFull').val(data[1] + ' ' + data[31]);
            $('#AppointmentDate').val(data[2]);
            $('#PassportNumber').val(data[4]);
            $('#PreviousPassportIfAny').val(data[5]);
            $('#birthdayCon').val(data[6]);
            $('#Country2').val(data[14])
            $('#ethnicity').val(data[8]);
            $('#CdAddress').val(data[9]);
            $('#CdStree').val(data[10]);
            $('#CdCity').val(data[11]);
            $('#CdStateProvince').val(data[12]);
            $('#CdPostalCode').val(data[13]);
            $('#CdCountry').val(data[14]);
            $('#CdTelephoneFixedLine').val(data[15]);
            $('#CdMobile').val(data[16]);
            $('#SlAddress').val(data[17]);
            $('#SlStreet').val(data[18]);
            $('#SlCity').val(data[19]);
            $('#SlStateProvince').val(data[20]);
            $('#SlPostalCode').val(data[21]);
            $('#srilanka').val(data[22]);
            $('#SlTelephoneFixedLine').val(data[23]);
            $('#SlMobile').val(data[24]);
            $('#PreferredContactMethod').val(data[25]);
            $('#SponsorName').val(data[26]);
            $('#SponsorTelephoneFixedLine').val(data[27]);
            $('#SponsorEmailAddress').val(data[28]);
            $('#SponsorMobile').val(data[29]);
            $('#AppointmentNumber').val(data[30]);
            $('#rad_comment2').val(data[55]);
            $('#dateOfarrival').val(data[56]);

            var img = '';
            if (data[54] != null && data[54] != "") {
                img = imgPath + '/' + data[54];
            } else {
                img = imgPathBlade + '/imgcou.png';
            }

            $('#img').attr('src', img);
            var dob1 = data[54];
            var dob = $.datepicker.formatDate('yy-mm-dd', new Date(dob1));
            var str = dob.split('-');
            var firstdate = new Date(str[0], str[1], str[2]);
            var today = new Date();
            var dayDiff = Math.ceil(today.getTime() - firstdate.getTime()) / (1000 * 60 * 60 * 24 * 365);
            var age = parseInt(dayDiff);

            if (age <= 15) {
                $('.hidpan').show();
            } else {
                $('.hidpan').hide();
                $('.chil').prop('checked', false).uniform('refresh');
            }

            var i;
            var j;
            for (i = 1; i <= 22; i++) {
                for (j = 32; j <= 54; j++) {
                    $('#rchkbox' + i).prop('checked', false).uniform('refresh');
                }
            }

            var table = $('#rapidTestResultsTbl').DataTable();
            table.destroy();
            $.ajax({
                url: 'ConsultationLoadData',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    command: 'loadTestResults',
                    appointment: valx
                },
                success: function (data) {
                    if (data.result != null) {
                        var html = "";
                        var co = 0;
                        $(data.result).each(function (key, val) {
                            co++;
                            if (val.prtr_result == "Positive") {
                                html += "<tr style='background: #e6c395 !important;'>";
                            } else {
                                html += "<tr>";
                            }
                            html += "<td style='display: none;'" + val.prtr_id + "</td>";
                            html += "<td>" + co + "</td>";
                            html += "<td>" + val.prtr_test + "</td>";
                            html += "<td>" + val.prtr_result + "</td>";
                            html += "<td><input class=\"form-control\" type=\"text\" id='txtComment" + key + "' value='" + val.prtr_comment + "'></td>";
                            html += "</tr>";
                        });

                        $('#rapidTestResultsTBody').html();
                        $('#rapidTestResultsTBody').html(html);
                        $('#tableContainer').show();

                        loadCheckBox(valx);
                    }
                }, complete: function () {
                    loadDataTable();
                }
            });
        }
    });
}
