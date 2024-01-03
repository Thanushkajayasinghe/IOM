$(document).ready(function () {

    $('#Hide').hide()

    $('#Gender').on('change', function () {
        var Gender = $('#Gender').val();
        if (Gender == "Female") {
            $('#Hide').show();
        } else {
            $('#Hide').hide();
        }
    });

    //IHU Recommendation Save
    $('#btnSaveIHUReco').on('click', function () {

        var AppointmentNumberNo=$('#UpdateIHUapp').val();

        var Nameinfull=$('#NameInFull').val();
        var LastName=$('#LastName').val();
        var CurrentPassportNumber=$('#CurrentPassportNo').val();
        var PreviousPassportNumberIfAny= $('#PrePassportNo').val();
        var Country=$('#Country').val();
        var City=$('#City').val();
        var DateOfBirth=$('#DateofBirth').val();
        var Gender=$('#Gender').val();
        var AddressIfTheCountryOfDomicile=$('#AddressifDomicile').val();
        var Telephone=$('#Telephone').val();
        var Mobile=$('#Mobile').val();
        var Email= $('#Email').val();
        var SponsorName=$('#SponsorName').val();
        var AddressDuringStayingInSriLanka=$('#AddressSriLankaSponsor').val();
        var Nationality=$('#Nationality').val();

        var cxr_preg=$('#cxr_preg').val();
        var cxr_test_date=$('#cxr_test_date').val();
        var cxr_lmp_date=$('#cxr_lmp_date').val();
        var cxr_result= $('#cxr_result').val();
        var cxr_preg_test_off=$('#cxr_preg_test_off').is(":checked");
        var cxr_counsel=$('#cxr_counsel').is(":checked");

        var cxr_done=$('#cxr_done').is(":checked");
        var cxr_not_done=$('#cxr_not_done').is(":checked");
        var cxr_def=$('#cxr_def').is(":checked");
        var cxr_preg_sc=$('#cxr_preg_sc').is(":checked");
        var cxr_app_dec=$('#cxr_app_dec').is(":checked");
        var cxr_no_show=$('#cxr_no_show').is(":checked");
        var cxr_child=$('#cxr_child').is(":checked");
        var cxr_unbl_unwill_sc=$('#cxr_unbl_unwill_sc').is(":checked");
        var cxr_not_done_others=$('#cxr_not_done_other').is(":checked");
        var not_done_other_text=$('#not_done_other_text').val();
        var cxr_done_plv_shld=$('#cxr_done_plv_shld').is(":checked");
        var cxr_done_dbl_abd_shield=$('#cxr_done_dbl_abd_shield').is(":checked");
        var cxr_done_other=$('#cxr_done_other').is(":checked");
        var cxr_done_others_details= $('#cxr_done_others_details').val();

        var ty1= document.querySelector('input[name=ty1]:checked').value;
        var ty2= document.querySelector('input[name=ty2]:checked').value;
        var ty3= document.querySelector('input[name=ty3]:checked').value;
        var ty4= document.querySelector('input[name=ty4]:checked').value;
        var ty5= document.querySelector('input[name=ty5]:checked').value;

        var tyr1= document.querySelector('input[name=tyr1]:checked').value;
        var tyr2= document.querySelector('input[name=tyr2]:checked').value;
        var tyr3= document.querySelector('input[name=tyr3]:checked').value;
        var tyr4= document.querySelector('input[name=tyr4]:checked').value;

        var tyg1= document.querySelector('input[name=tyg1]:checked').value;
        var tyg2= document.querySelector('input[name=tyg2]:checked').value;
        var tyg3= document.querySelector('input[name=tyg3]:checked').value;

        var chkbox1=0;
        if($('#chkbox1').is(":checked")){
            chkbox1=1;
        }else{
            chkbox1=0;
        }
        var chkbox2=0;
        if($('#chkbox2').is(":checked")){
            chkbox2=1;
        }else{
            chkbox2=0;
        }
        var chkbox3=0;
        if($('#chkbox3').is(":checked")){
            chkbox3=1;
        }else{
            chkbox3=0;
        }
        var chkbox4=0;
        if($('#chkbox4').is(":checked")){
            chkbox4=1;
        }else{
            chkbox4=0;
        }
        var chkbox5=0;
        if($('#chkbox5').is(":checked")){
            chkbox5=1;
        }else{
            chkbox5=0;
        }
        var chkbox6=0;
        if($('#chkbox6').is(":checked")){
            chkbox6=1;
        }else {
            chkbox6 = 0;
        }

        var chkbox7=0;
        if($('#chkbox7').is(":checked")){
            chkbox7=1;
        }else {
            chkbox7 = 0;
        }

        var chkbox8=0;
        if($('#chkbox8').is(":checked")){
            chkbox8=1;
        }else {
            chkbox8= 0;
        }

        var chkbox9=0;
        if($('#chkbox9').is(":checked")){
            chkbox9=1;
        }else {
            chkbox9 = 0;
        }
        var chkbox10=0;
        if($('#chkbox10').is(":checked")){
            chkbox10=1;
        }else {
            chkbox10 = 0;
        }
        var chkbox11=0;
        if($('#chkbox11').is(":checked")){
            chkbox11=1;
        }else {
            chkbox11 = 0;
        }

        var chkbox12=0;
        if($('#chkbox12').is(":checked")){
            chkbox12=1;
        }else {
            chkbox12 = 0;
        }
        var chkbox13=0;
        if($('#chkbox13').is(":checked")){
            chkbox13=1;
        }else {
            chkbox13 = 0;
        }
        var chkbox14=0;
        if($('#chkbox14').is(":checked")){
            chkbox14=1;
        }else {
            chkbox14= 0;
        }
        var chkbox15=0;
        if($('#chkbox15').is(":checked")){
            chkbox15=1;
        }else {
            chkbox15 = 0;
        }
        var chkbox16=0;
        if($('#chkbox16').is(":checked")){
            chkbox16=1;
        }else {
            chkbox16 = 0;
        }
        var chkbox17=0;
        if($('#chkbox17').is(":checked")){
            chkbox17=1;
        }else {
            chkbox17 = 0;
        }
        var chkbox18=0;
        if($('#chkbox18').is(":checked")){
            chkbox18=1;
        }else {
            chkbox18= 0;
        }
        var chkbox19=0;
        if($('#chkbox19').is(":checked")){
            chkbox19=1;
        }else {
            chkbox19 = 0;
        }
        var chkbox20=0;
        if($('#chkbox20').is(":checked")){
            chkbox20=1;
        }else {
            chkbox20 = 0;
        }
        var chkbox21=0;
        if($('#chkbox21').is(":checked")){
            chkbox21=1;
        }else {
            chkbox21 = 0;
        }
        var chkbox22=0;
        if($('#chkbox22').is(":checked")){
            chkbox22=1;
        }else {
            chkbox22 = 0;
        }

        var cxr_def1=$('#cxr_def1').is(":checked");
        var cxr_def2=$('#cxr_def2').is(":checked");
        var cxr_def3=$('#cxr_def3').is(":checked");
        var cxr_def4=$('#cxr_def4').is(":checked");







        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'ihuRecommendationUpdateProcess',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                function:'UpdateIhuRecomendation',
                AppointmentNumberNo:AppointmentNumberNo,

                Nameinfull:Nameinfull,
                LastName:LastName,
                CurrentPassportNumber:CurrentPassportNumber,
                PreviousPassportNumberIfAny:PreviousPassportNumberIfAny,
                Country:Country,
                City:City,
                DateOfBirth:DateOfBirth,
                Gender:Gender,
                AddressIfTheCountryOfDomicile:AddressIfTheCountryOfDomicile,
                Telephone:Telephone,
                Mobile:Mobile,
                Email:Email,
                SponsorName:SponsorName,
                AddressDuringStayingInSriLanka:AddressDuringStayingInSriLanka,
                Nationality:Nationality,

                cxr_preg:cxr_preg,
                cxr_test_date:cxr_test_date,
                cxr_lmp_date:cxr_lmp_date,
                cxr_result:cxr_result,
                cxr_preg_test_off:cxr_preg_test_off,
                cxr_counsel:cxr_counsel,
                cxr_done:cxr_done,
                cxr_not_done:cxr_not_done,
                cxr_def:cxr_def,
                cxr_preg_sc:cxr_preg_sc,
                cxr_app_dec:cxr_app_dec,
                cxr_no_show:cxr_no_show,
                cxr_child:cxr_child,
                cxr_unbl_unwill_sc:cxr_unbl_unwill_sc,
                cxr_not_done_others:cxr_not_done_others,
                not_done_other_text:not_done_other_text,
                cxr_done_plv_shld:cxr_done_plv_shld,
                cxr_done_dbl_abd_shield:cxr_done_dbl_abd_shield,
                cxr_done_other:cxr_done_other,
                cxr_done_others_details:cxr_done_others_details,

                ty1:ty1,
                ty2:ty2,
                ty3:ty3,
                ty4:ty4,
                ty5:ty5,

                tyr1:tyr1,
                tyr2:tyr2,
                tyr3:tyr3,
                tyr4:tyr4,

                tyg1:tyg1,
                tyg2:tyg2,
                tyg3:tyg3,

                chkbox1:chkbox1,
                chkbox2:chkbox2,
                chkbox3:chkbox3,
                chkbox4:chkbox4,
                chkbox5:chkbox5,
                chkbox6:chkbox6,
                chkbox7:chkbox7,
                chkbox8:chkbox8,
                chkbox9:chkbox9,
                chkbox10:chkbox10,
                chkbox11:chkbox11,
                chkbox12:chkbox12,
                chkbox13:chkbox13,
                chkbox14:chkbox14,
                chkbox15:chkbox15,
                chkbox16:chkbox16,
                chkbox17:chkbox17,
                chkbox18:chkbox18,
                chkbox19:chkbox19,
                chkbox20:chkbox20,
                chkbox21:chkbox21,
                chkbox22:chkbox22,

                cxr_def1:cxr_def1,
                cxr_def2:cxr_def2,
                cxr_def3:cxr_def3,
                cxr_def4:cxr_def4,
    },
            success: function (data) {

                if(data.result==true){
                    swal({
                        title: "Update Successfully!",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonClass: 'btn-success',
                        confirmButtonText: 'OK!'

                    });
                }else{
                    swal({
                        title: "Not Data Saved!",
                        type: "warning",
                        showCancelButton: false,
                        confirmButtonClass: 'btn-success',
                        confirmButtonText: 'OK!'

                    });
                }
            }
        });

     });


    //View Passport Number wise Details
    $('#btnSearch').on('click', function () {
        SearchMemberDetails();
    });

    $('#btnSearch2').on('click', function () {
        SearchMemberDetails2();
    });

    $('#cxr_not_done').on('click',function () {
        $('#cxr_no_show').prop("checked", false).uniform('refresh');
        $('#cxr_preg_sc').prop("checked", false).uniform('refresh');
        $('#cxr_app_dec').prop("checked", false).uniform('refresh');
        $('#cxr_no_show').prop("checked", false).uniform('refresh')
        $('#cxr_child').prop("checked", false).uniform('refresh');
        $('#cxr_unbl_unwill_sc').prop("checked", false).uniform('refresh');
        $('#cxr_not_done_others').prop("checked", false).uniform('refresh');
        $('#cxr_not_done_other').prop("checked", false).uniform('refresh');
        $('#cxr_done_plv_shld').prop("checked", false).uniform('refresh');
        $('#cxr_done_dbl_abd_shield').prop("checked", false).uniform('refresh');
        $('#cxr_done_other').prop("checked", false).uniform('refresh');

    });

    $('#cxr_done').on('click',function () {
        $('#cxr_no_show').prop("checked", false).uniform('refresh');
        $('#cxr_preg_sc').prop("checked", false).uniform('refresh');
        $('#cxr_app_dec').prop("checked", false).uniform('refresh');
        $('#cxr_no_show').prop("checked", false).uniform('refresh')
        $('#cxr_child').prop("checked", false).uniform('refresh');
        $('#cxr_unbl_unwill_sc').prop("checked", false).uniform('refresh');
        $('#cxr_not_done_others').prop("checked", false).uniform('refresh');
        $('#cxr_not_done_other').prop("checked", false).uniform('refresh');
        $('#cxr_done_plv_shld').prop("checked", false).uniform('refresh');
        $('#cxr_done_dbl_abd_shield').prop("checked", false).uniform('refresh');
        $('#cxr_done_other').prop("checked", false).uniform('refresh');
      ;
         });

});


function clear() {

    $('#NameInFull').val("");
    $('#CurrentPassportNo').val("");
    $('#PrePassportNo').val("");
    $('#Country').val("").trigger('change');
    $('#City').val("");
    $('#DateofBirth').val("");
    $('#Gender').val("").trigger('change');
    ;
    $('#AddressifDomicile').val("");
    $('#AddressSriLankaSponsor').val("");
    $('#Telephone').val("");
    $('#Mobile').val("");
    $('#Email').val("");
    $('#SponsorName').val("");
    $('#Nationality').val("");

    // $('#Ethnicity').val("");
    // $('#ClivilStatus').val("").trigger('change');
}

$('#PassportNo').on('change', function () {
    SearchMemberDetails();
});

//RegisterNo
$('#RegisterNo').on('change', function () {
    SearchMemberDetails2();
});

function SearchMemberDetails2() {
    $('#descript2').html("");
    $('#descript3').html("");
    var AppoimentNo = $('#RegisterNo').val();

    clear();
    $('#PassportNo').val("");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'ihuRecommendationUpdateProcess',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {function: 'ViewDetails2', AppoimentNo: AppoimentNo},
        success: function (data) {
            $(data.result).each(function (key, val) {
                $('#UpdateIHUapp').val('');
                $('#UpdateIHUapp').val(val.AppointmentNumber);
                $('#PassportNo').val(val.PassportNumber);
                $('#NameInFull').val(val.FirstName);
                $('#LastName').val(val.FirstName);
                $('#CurrentPassportNo').val(val.PassportNumber);
                $('#PrePassportNo').val(val.PreviousPassportIfAny);
                $('#Country').val(val.CountryOfBirth).trigger('change');
                $('#City').val(val.CdCity);
                $('#DateofBirth').val(val.DateOfBirth);
                $('#Gender').val(val.Gender).trigger('change');

                $('#AddressifDomicile').val(val.CdAddress);
                $('#AddressSriLankaSponsor').val(val.SlAddress);
                $('#Telephone').val(val.SlTelephoneFixedLine);
                $('#Mobile').val(val.SlMobile);
                $('#Email').val(val.EmailAddress);
                $('#SponsorName').val(val.SponsorName);
                $('#Nationality').val(val.Nationality);

                if (val.Gender == "Female") {
                    $('#Hide').show();
                } else {
                    $('#Hide').hide();
                }

            });
            // cxr Details set///

            $(data.cxr).each(function (key, val) {

                $('#cxr_preg').val(val.cxr_preg);
                $('#cxr_test_date').val(val.cxr_test_date);
                $('#cxr_lmp_date').val(val.cxr_lmp_date);
                $('#cxr_result').val(val.cxr_result);
                // -----------------------------------------------------------------------
                if (val.cxr_preg_test_off == true) {
                    $('#cxr_preg_test_off').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_preg_test_off').prop("checked", false).uniform('refresh');
                }
                if (val.cxr_counsel == true) {
                    $('#cxr_counsel').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_counsel').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_done == true) {
                    $('#cxr_done').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_done').prop("checked", false).uniform('refresh');
                }
                if (val.cxr_not_done == true) {
                    $('#cxr_not_done').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_not_done').prop("checked", false).uniform('refresh');
                }
                // ---------------------------------------------------------------------
                if (val.cxr_def == true) {
                    $('#cxr_def').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_def').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_preg_sc == true) {
                    $('#cxr_preg_sc').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_preg_sc').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_app_dec == true) {
                    $('#cxr_app_dec').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_app_dec').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_no_show == true) {
                    $('#cxr_no_show').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_no_show').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_child == true) {
                    $('#cxr_child').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_child').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_unbl_unwill_sc == true) {
                    $('#cxr_unbl_unwill_sc').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_unbl_unwill_sc').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_not_done_others == true) {
                    $('#not_done_other_text').show();

                    $('#cxr_not_done_other').prop("checked", true).uniform('refresh');
                    $('#not_done_other_text').val(val.not_done_other_text);
                } else {
                    $('#cxr_not_done_other').prop("checked", false).uniform('refresh');
                    $('#not_done_other_text').val("");
                }
                // ----------------------------------------------------------------------------
                // -------------------------------------------------------------------------
                if (val.cxr_done_plv_shld == true) {
                    $('#cxr_done_plv_shld').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_done_plv_shld').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_done_dbl_abd_shield == true) {
                    $('#cxr_done_dbl_abd_shield').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_done_dbl_abd_shield').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_done_other == true) {
                    $('#cxr_done_others_details').show();

                    $('#cxr_done_other').prop("checked", true).uniform('refresh');
                    $('#cxr_done_others_details').val(val.done_other_text);
                } else {
                    $('#cxr_done_other').prop("checked", false).uniform('refresh');
                    $('#cxr_done_others_details').val("")//not_done_other_text
                }

            });
            // =========================================================================================================
            $(data.consult).each(function (key, val) {
                // ---------------------------------------------------------------------------------
                $('input[name="ty1"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_cough == 1) {
                    $('input[name="ty1"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_cough == 2) {
                    $('input[name="ty1"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="ty1"][value="3"]').prop('checked', true).uniform('refresh');
                }
                //ty2
                $('input[name="ty2"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_haemoptysis == 1) {
                    $('input[name="ty2"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_haemoptysis == 2) {
                    $('input[name="ty2"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="ty2"][value="3"]').prop('checked', true).uniform('refresh');
                }
                //ty3
                $('input[name="ty3"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_night_sweats == 1) {
                    $('input[name="ty3"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_night_sweats == 2) {
                    $('input[name="ty3"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="ty3"][value="3"]').prop('checked', true).uniform('refresh');
                }
                //ty4
                $('input[name="ty4"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_weight_loss == 1) {
                    $('input[name="ty4"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_weight_loss == 2) {
                    $('input[name="ty4"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="ty4"][value="3"]').prop('checked', true).uniform('refresh');
                }
                //ty5
                $('input[name="ty5"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_fever == 1) {
                    $('input[name="ty5"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_fever == 2) {
                    $('input[name="ty5"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="ty5"][value="3"]').prop('checked', true).uniform('refresh');

                }

                //tyr1
                $('input[name="tyr1"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_any == 1) {
                    $('input[name="tyr1"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_any == 2) {
                    $('input[name="tyr1"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="tyr1"][value="3"]').prop('checked', true).uniform('refresh');
                }

                //tyr2
                $('input[name="tyr2"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_prev_thor_surgery == 1) {
                    $('input[name="tyr2"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_prev_thor_surgery == 2) {
                    $('input[name="tyr2"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="tyr2"][value="3"]').prop('checked', true).uniform('refresh');
                }

                //tyr3
                $('input[name="tyr3"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_cyanosis == 1) {
                    $('input[name="tyr3"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_cyanosis == 2) {
                    $('input[name="tyr3"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="tyr3"][value="3"]').prop('checked', true).uniform('refresh');
                }

                //tyr4
                $('input[name="tyr4"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_resp_insufficient == 1) {
                    $('input[name="tyr4"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_resp_insufficient == 2) {
                    $('input[name="tyr4"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="tyr4"][value="3"]').prop('checked', true).uniform('refresh');
                }

                //tyg1
                $('input[name="tyg1"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_history_tb == 1) {
                    $('input[name="tyg1"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_history_tb == 2) {
                    $('input[name="tyg1"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="tyg1"][value="3"]').prop('checked', true).uniform('refresh');
                }
                //tyg2
                $('input[name="tyg2"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_household_tb == 1) {
                    $('input[name="tyg2"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_household_tb == 2) {
                    $('input[name="tyg2"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="tyg2"][value="3"]').prop('checked', true).uniform('refresh');
                }
                //tyg3
                $('input[name="tyg3"][value="3"]').prop('checked', false).uniform('refresh');

                if (val.cm_active_tb == 1) {
                    $('input[name="tyg3"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_active_tb == 2) {
                    $('input[name="tyg3"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="tyg3"][value="3"]').prop('checked', true).uniform('refresh');
                }

                // ------------------------------

                if(val.cm_single_fibrous_streak==1){
                    $('#chkbox1').prop("checked", true).uniform('refresh');
                }else{
                    $('#chkbox1').prop("checked", false).uniform('refresh');
                }

                if(val.cm_bony_islets==1){
                    $('#chkbox2').prop("checked", true).uniform('refresh');
                }else{
                    $('#chkbox2').prop("checked", false).uniform('refresh');
                }

                if(val.cm_pleural_capping==1){
                    $('#chkbox3').prop("checked", true).uniform('refresh');
                }else{
                    $('#chkbox3').prop("checked", false).uniform('refresh');
                }
                if(val.cm_unilateral_bilateral==1){
                    $('#chkbox4').prop("checked", true).uniform('refresh');
                }else{
                    $('#chkbox4').prop("checked", false).uniform('refresh');
                }

                if(val.cm_calcified_nodule==1){
                    $('#chkbox5').prop("checked", true).uniform('refresh');
                }else{
                    $('#chkbox5').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_calcified_nodule==1){
                    $('#chkbox6').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox6').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_solitary_granuloma_enlarged==1){
                    $('#chkbox7').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox7').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_single_multi_calc_pulmonary==1){
                    $('#chkbox8').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox8').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_calcified_pleural_lesions==1){
                    $('#chkbox9').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox9').prop("checked", false).uniform('refresh');
                }
                // --------------------------------
                if(val.cm_costophrenic_angle==1){
                    $('#chkbox10').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox10').prop("checked", false).uniform('refresh');
                }


                // --------------------------------
                if(val.cm_notable_apical==1){
                    $('#chkbox11').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox11').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_aplcal_fbronodualar==1){
                    $('#chkbox12').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox12').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_multi_single_pulmonary_nodu_micronodules==1){
                    $('#chkbox13').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox13').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_isolated_hilar==1){
                    $('#chkbox14').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox14').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_multi_single_pulmonary_nodu_masses==1){
                    $('#chkbox15').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox15').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_non_calcified_pleural_fibrosos==1){
                    $('#chkbox16').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox16').prop("checked", false).uniform('refresh');
                }
                // --------------------------------
                if(val.cm_interstltial_fbrosos==1){
                    $('#chkbox17').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox17').prop("checked", false).uniform('refresh');
                }
                // --------------------------------
                if(val.cm_any_cavitating_lesion==1){
                    $('#chkbox18').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox18').prop("checked", false).uniform('refresh');
                }
                // --------------------------------
                if(val.cm_skeleton_soft_issue==1){
                    $('#chkbox19').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox19').prop("checked", false).uniform('refresh');
                }
                // --------------------------------
                if(val.cm_cardiac_major_vessels==1){
                    $('#chkbox20').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox20').prop("checked", false).uniform('refresh');
                }
                // --------------------------------
                if(val.cm_lung_fields==1){
                    $('#chkbox21').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox21').prop("checked", false).uniform('refresh');
                }
                // --------------------------------
                if(val.cm_other==1){
                    $('#chkbox22').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox22').prop("checked", false).uniform('refresh');
                }

            });


            // =========================================================================================================

            //phlebotomy set Click Check Box :)
            $(data.phlebotomy).each(function (key, val) {

                if (val.ps_hiv_elisa == true) {
                    $("#cxr_def1").prop("checked", true).uniform('refresh');
                } else {
                    $("#cxr_def1").prop("checked", false).uniform('refresh');
                }

                if (val.ps_malaria == true) {
                    $("#cxr_def2").prop("checked", true).uniform('refresh');
                } else {
                    $("#cxr_def2").prop("checked", false).uniform('refresh');
                }

                if (val.ps_filaria == true) {
                    $("#cxr_def3").prop("checked", true).uniform('refresh');
                } else {
                    $("#cxr_def3").prop("checked", false).uniform('refresh');
                }

                if (val.ps_shcg == true) {
                    $("#cxr_def4").prop("checked", true).uniform('refresh');
                } else {
                    $("#cxr_def4").prop("checked", false).uniform('refresh');
                }

            });
            // -----------------------------------


        }
    });
}

function SearchMemberDetails() {

    var passportNumber = $('#PassportNo').val();
    clear();
    $('#RegisterNo').val("");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'ihuRecommendationUpdateProcess',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {function: 'ViewDetails', passportNumber: passportNumber},
        success: function (data) {
            $('#descript2').html("");
            $('#descript3').html("");
            $(data.result).each(function (key, val) {
                $('#UpdateIHUapp').val('');
                $('#UpdateIHUapp').val(val.AppointmentNumber);
                $('#RegisterNo').val(val.AppointmentNumber);
                $('#NameInFull').val(val.FirstName);
                $('#LastName').val(val.FirstName);
                $('#CurrentPassportNo').val(val.PassportNumber);
                $('#PrePassportNo').val(val.PreviousPassportIfAny);
                $('#Country').val(val.CountryOfBirth).trigger('change');
                $('#City').val(val.CdCity);
                $('#DateofBirth').val(val.DateOfBirth);
                $('#Gender').val(val.Gender).trigger('change');
                ;
                $('#AddressifDomicile').val(val.CdAddress);
                $('#AddressSriLankaSponsor').val(val.SlAddress);
                $('#Telephone').val(val.SlTelephoneFixedLine);
                $('#Mobile').val(val.SlMobile);
                $('#Email').val(val.EmailAddress);
                $('#SponsorName').val(val.SponsorName);
                $('#Nationality').val(val.Nationality);


                if (val.Gender == "Female") {
                    $('#Hide').show();
                } else {
                    $('#Hide').hide();
                }

            });

            // cxr Details set///

            $(data.cxr).each(function (key, val) {

                $('#cxr_preg').val(val.cxr_preg);
                $('#cxr_test_date').val(val.cxr_test_date);
                $('#cxr_lmp_date').val(val.cxr_lmp_date);
                $('#cxr_result').val(val.cxr_result);
                // -----------------------------------------------------------------------
                if (val.cxr_preg_test_off == true) {
                    $('#cxr_preg_test_off').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_preg_test_off').prop("checked", false).uniform('refresh');
                }
                if (val.cxr_counsel == true) {
                    $('#cxr_counsel').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_counsel').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_done == true) {
                    $('#cxr_done').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_done').prop("checked", false).uniform('refresh');
                }
                if (val.cxr_not_done_others == true) {
                    $('#cxr_not_done').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_not_done').prop("checked", false).uniform('refresh');
                }
                // ---------------------------------------------------------------------
                if (val.cxr_def == true) {
                    $('#cxr_def').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_def').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_preg_sc == true) {
                    $('#cxr_preg_sc').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_preg_sc').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_app_dec == true) {
                    $('#cxr_app_dec').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_app_dec').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_no_show == true) {
                    $('#cxr_no_show').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_no_show').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_child == true) {
                    $('#cxr_child').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_child').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_unbl_unwill_sc == true) {
                    $('#cxr_unbl_unwill_sc').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_unbl_unwill_sc').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_not_done_others == true) {
                    $('#not_done_other_text').show();

                    $('#cxr_not_done_other').prop("checked", true).uniform('refresh');
                    $('#not_done_other_text').val(val.not_done_other_text);
                } else {
                    $('#cxr_not_done_other').prop("checked", false).uniform('refresh');
                    $('#not_done_other_text').val("");
                }
                // ----------------------------------------------------------------------------
                // -------------------------------------------------------------------------
                if (val.cxr_done_plv_shld == true) {
                    $('#cxr_done_plv_shld').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_done_plv_shld').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_done_dbl_abd_shield == true) {
                    $('#cxr_done_dbl_abd_shield').prop("checked", true).uniform('refresh');
                } else {
                    $('#cxr_done_dbl_abd_shield').prop("checked", false).uniform('refresh');
                }
                // -------------------------------------------------------------------------
                if (val.cxr_done_other == true) {
                    $('#cxr_done_others_details').show();

                    $('#cxr_done_other').prop("checked", true).uniform('refresh');
                    $('#cxr_done_others_details').val(val.done_other_text);
                } else {
                    $('#cxr_done_other').prop("checked", false).uniform('refresh');
                    $('#cxr_done_others_details').val("")//not_done_other_text
                }

            });
            // =========================================================================================================
            $(data.consult).each(function (key, val) {
                // ---------------------------------------------------------------------------------
                $('input[name="ty1"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_cough == 1) {
                    $('input[name="ty1"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_cough == 2) {
                    $('input[name="ty1"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="ty1"][value="3"]').prop('checked', true).uniform('refresh');
                }
                //ty2
                $('input[name="ty2"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_haemoptysis == 1) {
                    $('input[name="ty2"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_haemoptysis == 2) {
                    $('input[name="ty2"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="ty2"][value="3"]').prop('checked', true).uniform('refresh');
                }
                //ty3
                $('input[name="ty3"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_night_sweats == 1) {
                    $('input[name="ty3"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_night_sweats == 2) {
                    $('input[name="ty3"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="ty3"][value="3"]').prop('checked', true).uniform('refresh');
                }
                //ty4
                $('input[name="ty4"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_weight_loss == 1) {
                    $('input[name="ty4"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_weight_loss == 2) {
                    $('input[name="ty4"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="ty4"][value="3"]').prop('checked', true).uniform('refresh');
                }
                //ty5
                $('input[name="ty5"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_fever == 1) {
                    $('input[name="ty5"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_fever == 2) {
                    $('input[name="ty5"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="ty5"][value="3"]').prop('checked', true).uniform('refresh');

                }

                //tyr1
                $('input[name="tyr1"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_any == 1) {
                    $('input[name="tyr1"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_any == 2) {
                    $('input[name="tyr1"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="tyr1"][value="3"]').prop('checked', true).uniform('refresh');
                }

                //tyr2
                $('input[name="tyr2"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_prev_thor_surgery == 1) {
                    $('input[name="tyr2"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_prev_thor_surgery == 2) {
                    $('input[name="tyr2"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="tyr2"][value="3"]').prop('checked', true).uniform('refresh');
                }

                //tyr3
                $('input[name="tyr3"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_cyanosis == 1) {
                    $('input[name="tyr3"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_cyanosis == 2) {
                    $('input[name="tyr3"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="tyr3"][value="3"]').prop('checked', true).uniform('refresh');
                }

                //tyr4
                $('input[name="tyr4"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_resp_insufficient == 1) {
                    $('input[name="tyr4"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_resp_insufficient == 2) {
                    $('input[name="tyr4"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="tyr4"][value="3"]').prop('checked', true).uniform('refresh');
                }

                //tyg1
                $('input[name="tyg1"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_history_tb == 1) {
                    $('input[name="tyg1"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_history_tb == 2) {
                    $('input[name="tyg1"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="tyg1"][value="3"]').prop('checked', true).uniform('refresh');
                }
                //tyg2
                $('input[name="tyg2"][value="3"]').prop('checked', false).uniform('refresh');
                if (val.cm_household_tb == 1) {
                    $('input[name="tyg2"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_household_tb == 2) {
                    $('input[name="tyg2"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="tyg2"][value="3"]').prop('checked', true).uniform('refresh');
                }
                //tyg3
                $('input[name="tyg3"][value="3"]').prop('checked', false).uniform('refresh');

                if (val.cm_active_tb == 1) {
                    $('input[name="tyg3"][value="1"]').prop('checked', true).uniform('refresh');
                } else if (val.cm_active_tb == 2) {
                    $('input[name="tyg3"][value="2"]').prop('checked', true).uniform('refresh');
                } else {
                    $('input[name="tyg3"][value="3"]').prop('checked', true).uniform('refresh');
                }

                // ------------------------------

                if(val.cm_single_fibrous_streak==1){
                    $('#chkbox1').prop("checked", true).uniform('refresh');
                }else{
                    $('#chkbox1').prop("checked", false).uniform('refresh');
                }

                if(val.cm_bony_islets==1){
                    $('#chkbox2').prop("checked", true).uniform('refresh');
                }else{
                    $('#chkbox2').prop("checked", false).uniform('refresh');
                }

                if(val.cm_pleural_capping==1){
                    $('#chkbox3').prop("checked", true).uniform('refresh');
                }else{
                    $('#chkbox3').prop("checked", false).uniform('refresh');
                }
                if(val.cm_unilateral_bilateral==1){
                    $('#chkbox4').prop("checked", true).uniform('refresh');
                }else{
                    $('#chkbox4').prop("checked", false).uniform('refresh');
                }

                if(val.cm_calcified_nodule==1){
                    $('#chkbox5').prop("checked", true).uniform('refresh');
                }else{
                    $('#chkbox5').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_calcified_nodule==1){
                    $('#chkbox6').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox6').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_solitary_granuloma_enlarged==1){
                    $('#chkbox7').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox7').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_single_multi_calc_pulmonary==1){
                    $('#chkbox8').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox8').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_calcified_pleural_lesions==1){
                    $('#chkbox9').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox9').prop("checked", false).uniform('refresh');
                }
                // --------------------------------
                if(val.cm_costophrenic_angle==1){
                    $('#chkbox10').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox10').prop("checked", false).uniform('refresh');
                }


                // --------------------------------
                if(val.cm_notable_apical==1){
                    $('#chkbox11').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox11').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_aplcal_fbronodualar==1){
                    $('#chkbox12').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox12').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_multi_single_pulmonary_nodu_micronodules==1){
                    $('#chkbox13').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox13').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_isolated_hilar==1){
                    $('#chkbox14').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox14').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_multi_single_pulmonary_nodu_masses==1){
                    $('#chkbox15').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox15').prop("checked", false).uniform('refresh');
                }

                // --------------------------------
                if(val.cm_non_calcified_pleural_fibrosos==1){
                    $('#chkbox16').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox16').prop("checked", false).uniform('refresh');
                }
                // --------------------------------
                if(val.cm_interstltial_fbrosos==1){
                    $('#chkbox17').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox17').prop("checked", false).uniform('refresh');
                }
                // --------------------------------
                if(val.cm_any_cavitating_lesion==1){
                    $('#chkbox18').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox18').prop("checked", false).uniform('refresh');
                }
                // --------------------------------
                if(val.cm_skeleton_soft_issue==1){
                    $('#chkbox19').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox19').prop("checked", false).uniform('refresh');
                }
                // --------------------------------
                if(val.cm_cardiac_major_vessels==1){
                    $('#chkbox20').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox20').prop("checked", false).uniform('refresh');
                }
                // --------------------------------
                if(val.cm_lung_fields==1){
                    $('#chkbox21').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox21').prop("checked", false).uniform('refresh');
                }
                // --------------------------------
                if(val.cm_other==1){
                    $('#chkbox22').prop("checked", true).uniform('refresh');
                }else {
                    $('#chkbox22').prop("checked", false).uniform('refresh');
                }

                });


            // =========================================================================================================

            //phlebotomy set Click Check Box :)
            $(data.phlebotomy).each(function (key, val) {

                if (val.ps_hiv_elisa == true) {
                    $("#cxr_def1").prop("checked", true).uniform('refresh');
                } else {
                    $("#cxr_def1").prop("checked", false).uniform('refresh');
                }

                if (val.ps_malaria == true) {
                    $("#cxr_def2").prop("checked", true).uniform('refresh');
                } else {
                    $("#cxr_def2").prop("checked", false).uniform('refresh');
                }

                if (val.ps_filaria == true) {
                    $("#cxr_def3").prop("checked", true).uniform('refresh');
                } else {
                    $("#cxr_def3").prop("checked", false).uniform('refresh');
                }

                if (val.ps_shcg == true) {
                    $("#cxr_def4").prop("checked", true).uniform('refresh');
                } else {
                    $("#cxr_def4").prop("checked", false).uniform('refresh');
                }

            });
            // -----------------------------------


        }
    });


}

$('#cxr_not_done_other').on('change', function () {
    if ($('#cxr_not_done_other').is(":checked")) {
        $('#not_done_other_text').show();
    } else {
        $('#not_done_other_text').hide()
    }
});


$('#cxr_done_other').on('change', function () {

    if ($('#cxr_done_other').is(":checked")) {
        $('#cxr_done_others_details').show()

    } else {

        $('#cxr_done_others_details').hide();
    }
});


