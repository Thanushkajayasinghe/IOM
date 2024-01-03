<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="Thanushka Jayasinghe"/>
    <meta name="keywords" content="Thanushka Jayasinghe, IOM"/>
    <meta name="author" content="Thanushka Jayasinghe"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>

    <title>IOM | Radiologist Reporting </title>


    <style>
        body {
            font-size: 12px;
            height: 21cm;
        }
    </style>

</head>


<table style="width: 100%;">
    <thead>
    <tr style="width: 100%;">
        <td style="width: 15%;">Passport No</td>
        <td style="width: 20%;"><label><?php echo e($ApplicantDetails->PassportNumber); ?></label></td>
        <td style="width: 10%;">Name</td>


        <td style="width: 45%;" colspan="3"><label
                id="name"><?php echo e($ApplicantDetails->FirstName); ?> <?php echo e($ApplicantDetails->LastName); ?></label></td>

    </tr>
    <tr style="width: 100%;">
        <td style="width: 15%;">Registration No</td>
        <td style="width: 20%;"><label><?php echo e($ApplicantDetails->AppointmentNumber); ?></label></td>
        <td style="width: 10%;">Date Of Birth</td>
        <td style="width: 15%;"><label><?php echo e($ApplicantDetails->DateOfBirth); ?></label></td>
        <td style="width: 10%;">Gender</td>
        <td style="width: 20%;"><label><?php echo e($ApplicantDetails->Gender); ?></label></td>

    </tr>
    </thead>
</table>

<div class="col-md-12">
    <div class="row" style="margin-top: 30px;">
        <div class="col-md-4">
            <label><b>Minor findings</b></label>

            <table style="width: 100%;">
                <tr>
                    <td style="width: 5%;">


                        <?php if($ApplicantDetails->rr_single_fibrous_streak==1): ?>
                            <input id="chkbox_001" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_001" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td style="width: 95%;">
                        1.1 Single fibrous streak/band/scar
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_bony_islets==1): ?>
                            <input id="chkbox_002" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_002" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        1.2 Bony islets
                    </td>
                </tr>
                <tr>
                    <td style="width: 5%;">
                        <?php if($ApplicantDetails->rr_pleural_capping==1): ?>
                            <input id="chkbox_003" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_003" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td style="width: 95%;">
                        2.1 Pleural capping with a smooth inferior border( &lt; 1cm thick at all points)
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_unilateral_bilateral==1): ?>
                            <input id="chkbox_004" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>

                            <input id="chkbox_004" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        2.2 Unilateral or bilateral costophrenic angle blunting (below the horizontal)
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_calcified_nodule==1): ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        2.3 calcified nodule(s) in the hilum/ mediastinum with no pulmonary granulomas
                    </td>
                </tr>
            </table>


        </div>
        
        <div class="col-md-4" style="margin-top: 10px;">
            <label><b>Minor Finding(occasionally assoclated with TB infection)</b></label>

            <table style="width: 100%;">
                <tr>
                    <td style="width: 5%;">
                        <?php if($ApplicantDetails->rr_solitary_granuloma_hilum==1): ?>
                            <input id="chkbox_006" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td style="width: 95%;">
                        3.1 Solitary granuloma(&lt;1cm and of any lobe) with an unremarkable hilum
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_solitary_granuloma_enlarged==1): ?>
                            <input id="chkbox_007" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        3.2 Solitary granuloma(&lt; 1cm and of any lobe) with calcified/ enlarged hllar lymph nodes
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_single_multi_calc_pulmonary==1): ?>
                            <input id="chkbox_008" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        3.3 Single/ Multiple calcified pulmonary nodules/micronodules with distinct borders
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_calcified_pleural_lesions==1): ?>
                            <input id="chkbox_009" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        3.4 Calcified pleural lesions
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_costophrenic_angle==1): ?>
                            <input id="chkbox_0010" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        3.5 Costophrenic Angle blunting(either side above the horizontal)
                    </td>
                </tr>
            </table>


        </div>
        

        <div class="col-md-4" style="margin-top: 10px;">
            <label><b>Findings sometines seen in active TB(or other conditions)</b></label>

            <table style="width: 100%;">
                <tr>
                    <td style="width: 5%;">
                        <?php if($ApplicantDetails->rr_notable_apical==1): ?>
                            <input id="chkbox_0011" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td style="width: 95%;">
                        4.0 Notable apical pleural capping(rough or rangged inferior borderand/or_>1cm thick at any
                        point)
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_aplcal_fbronodualar==1): ?>
                            <input id="chkbox_0012" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        4.1 Aplcal fbronodualar/ fibrocalcific lesions or apical microcalcifications
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_multi_single_pulmonary_nodu_micronodules==1): ?>
                            <input id="chkbox_0013" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        4.2 Multiple/ single pulmonary nodules/ micronodules(noncalcified or poorly defined)
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_isolated_hilar==1): ?>
                            <input id="chkbox_0014" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        4.3 Isolated hilar or mediastinal mass/lymphadenopathy(noncalcified)
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_multi_single_pulmonary_nodu_masses==1): ?>
                            <input id="chkbox_0015" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        4.4 Single / Multiple pulmonary noduies/ masses _>1cm
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_non_calcified_pleural_fibrosos==1): ?>
                            <input id="chkbox_0016" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        4.5 Non-calcified pleural fibrosos and/ or effuslon
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_interstltial_fbrosos==1): ?>
                            <input id="chkbox_0017" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        4.6 Interstltial fbrosos/parenchymal lung disease/ acute pulmoneary disease
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_any_cavitating_lesion==1): ?>
                            <input id="chkbox_0018" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        4.7 Any cavitating lesion OR "lluffy" or "Soft" lesions felt likely to represent active TB
                    </td>
                </tr>
            </table>


        </div>
        
        <div class="col-md-4" style="margin-top: 10px;">
            <label><b>Other findings (describr the abnormality in descriptlv findings/comments below)</b></label>

            <table style="width: 100%;">
                <tr>
                    <td style="width: 5%;">
                        <?php if($ApplicantDetails->rr_skeleton_soft_issue==1): ?>
                            <input id="chkbox_0019" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td style="width: 95%;">
                        Skeleton and soft issue
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_cardiac_major_vessels==1): ?>
                            <input id="chkbox_0020" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        cardiac or major vessels
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_lung_fields==1): ?>
                            <input id="chkbox_0021" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        lung fields

                    </td>
                </tr>
                <tr>
                    <td>
                        <?php if($ApplicantDetails->rr_other==1): ?>
                            <input id="chkbox_0022" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php else: ?>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php endif; ?>
                    </td>
                    <td>
                        other
                    </td>
                </tr>

            </table>


        </div>
        

        
        
        <div class="col-md-4" style="margin-top: 10px;">
            Comment01:
            <lable><?php echo e($ApplicantDetails->rr_comment1); ?></lable>
        </div>
        
        <div class="col-md-4" style="margin-top: 10px;">
            Comment02:
            <lable><?php echo e($ApplicantDetails->rr_comment2); ?></lable>
        </div>
        <div class="col-md-12" style="margin-top: 10px;">
            <table style="width: 100%;">
                <tr>
                    <td style="width: 70%;">

                    </td>
                    <td style="width: 20%;">
                        <strong>Signature</strong>
                    </td>
                </tr>
                <tr style="margin-top: 20px;">
                    <td style="width: 70%;">

                    </td>
                    <td style="width: 30%;">
                        <img id="IMGsignature" src="<?php echo e($bcode); ?>" style="height: 60px; width: 150px;padding: 0;"/>
                    </td>
                </tr>
                <tr style="margin-top: 20px;">
                    <td style="width: 70%;">

                    </td>
                    <td style="width: 30%;">
                        <strong>..................................</strong>
                    </td>
                </tr>
                <tr style="margin-top: 20px;">
                    <td style="width: 70%;">

                    </td>
                    <td style="width: 30%;">
                        <?php echo e($cby= Session::get('firstName')." ".$cby= Session::get('lastName')); ?>

                    </td>
                </tr>
            </table>
        </div>

    </div>
</div>

</html>
<?php /**PATH C:\wamp64\www\IOM\resources\views/pages/RadiologistReportingPDF.blade.php ENDPATH**/ ?>