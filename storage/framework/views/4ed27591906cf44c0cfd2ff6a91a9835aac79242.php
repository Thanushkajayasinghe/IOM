<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        p {
            font-size: 17px;
            font-family: 'Calibri (Body)';
            margin: 0 0 0 0 !important;
        }

        label {
            font-size: 15px;
            font-family: 'Calibri (Body)';
        }

        span {
            font-size: 15px;
            font-family: 'Calibri (Body)';
        }

        .details {
            margin-top: 30px;
            margin-left: 18px;
        }

        table {
            border-collapse: collapse;
        }

        input[type='checkbox'] {
            position: relative;
            margin-top: 5px;
        }

        @page  {
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="page">

    <table width="100%">
        <tr style="width: 100%; text-align: center; ">
            <td style="text-align: center;">
                <img src="<?php echo e(asset('images/logonew2.jpg')); ?>"
                     style="height: 80px;display: inline-block;position: relative;">
            </td>
        </tr>
    </table>

    <table width="100%" style="margin-top: 10px;">
        <tr style="width: 100%; text-align: center; margin-top: 10px;">
            <td style="width: 100%; text-align: center; padding-top: 5px; padding-bottom: 8px; border: 1px solid black; background: black; color: white;">
                MINISTRY OF HEALTH, NUTRITION AND INDIGENOUS MEDICINE
            </td>
        </tr>
    </table>

    <table width="100%" style="margin-top: 10px;">
        <tr style="width: 100%; text-align: center; margin-top: 10px;">
            <td style="width: 20%"></td>
            <td style="width: 60%; text-align: center; padding-top: 5px; padding-bottom: 3px; border: 1px solid black; background: black; color: white;font-size: 15px;">
                INBOUND HEALTH ASSESSMENT CENTER
            </td>
            <td style="width: 20%"></td>
        </tr>
        <tr style="width: 100%; text-align: center; ">
            <td style="width: 20%"></td>
            <td style="width: 60%; text-align: center; padding-top: 5px; padding-bottom: 8px; border: 1px solid black; background: black; color: white; font-size: 10px;">
                No 80A, 10<sup>th</sup> Floor, IBSL Building, Elvitigala Mawatha, Colombo 08
            </td>
            <td style="width: 20%"></td>
        </tr>
    </table>

    <?php $__currentLoopData = $memberDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table style="width: 100%; margin-top: 25px;">
            <tr>
                <td width="25%" rowspan="5">
                    <?php if($photo == null || $photo == ""): ?>
                        <img src="<?php echo e(asset('images/blank-user.jpg')); ?>"
                             style="height: 140px; position: relative; border: 2px solid black;">
                    <?php else: ?>
                        <img src="<?php echo e(asset('/tempFileUpload/photoBoothFiles/'. $photo)); ?>"
                             style="height: 150px; width: 170px; position: relative; border: 2px solid black;">
                    <?php endif; ?>
                </td>
                <td width="15%" style="border: solid 1px black; border-right: 2px solid white; margin-left: 15px;">
                    <label><span class="fa fa-users"></span>&nbsp;&nbsp;Name&nbsp;&nbsp;</label>
                </td>
                <td width="60%" style="border: solid 1px black; border-left: 2px solid white;">
                    <label><span
                            style="font-weight:normal;">: <?php echo e(strtoupper($data->FirstName)); ?> <?php echo e(strtoupper($data->LastName)); ?></span></label>
                </td>
            </tr>
            <tr>
                <td width="15%" style="border: solid 1px black;">
                    <label><span class="fa fa-users"></span>&nbsp;&nbsp;Gender&nbsp;</label>
                </td>
                <td width="60%" style="border: solid 1px black;border-left: 2px solid white;">
                    <label><span style="font-weight:normal;">: <?php echo e($data->Gender); ?></span></label>
                </td>
            </tr>
            <tr>
                <td width="15%" style="border: solid 1px black;">
                    <label><span class="fa fa-users"></span>&nbsp;&nbsp;Date of Birth&nbsp;</label>
                </td>
                <td width="60%" style="border: solid 1px black;border-left: 2px solid white;">
                    <label><span style="font-weight:normal;">: <?php echo e($data->DateOfBirth); ?></span></label>
                </td>
            </tr>
            <tr>
                <td width="15%" style="border: solid 1px black;">
                    <label><span class="fa fa-users"></span>&nbsp;&nbsp;Passport No&nbsp;</label>
                </td>
                <td width="60%" style="border: solid 1px black;border-left: 2px solid white;">
                    <label><span style="font-weight:normal;">: <?php echo e($data->PassportNumber); ?></span></label>
                </td>
            </tr>
            <tr>
                <td width="15%" style="border: solid 1px black;">
                    <label><span class="fa fa-users"></span>&nbsp;&nbsp;Nationality</label>
                </td>
                <td width="60%" style="border: solid 1px black;border-left: 2px solid white;">
                    <label><span
                            style="font-weight:normal;">:   <?php if($data->Nationality != null): ?><?php echo e(ucfirst(trans($data->Nationality))); ?> <?php endif; ?></span></label>
                </td>
            </tr>
        </table>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <table style="width: 100%; margin-top: 10px;">
        <tr>
            <td style="width: 49%; float: left; border: 1px solid black;">
                <table style="width: 90%; margin-top: 6px; margin-bottom: 10px;" align="center">
                    <tr>
                        <td colspan="3"><p style="text-align: left; font-size: 15px;"><b><u>Status Of Rapid
                                        Tests</u></b>
                            </p></td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Malaria</td>
                        <?php if($Malres->count() > 0): ?>
                            <td style="width: 30%">
                                <label for="chkbox_001"><span
                                        class="fa fa-users"></span>Done</label>
                                <input id="chkbox_001" type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="" checked>
                            </td>
                            <td>
                                <label for="chkbox_002"><span
                                        class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Not Done</label>
                                <input id="chkbox_002" type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="">
                            </td>
                        <?php else: ?>
                            <td style="width: 30%">
                                <label for="chkbox_001"><span
                                        class="fa fa-users"></span>Done</label>
                                <input id="chkbox_001" type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="">
                            </td>
                            <td>
                                <label for="chkbox_002"><span
                                        class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Not Done</label>
                                <input id="chkbox_002" type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="" checked>
                            </td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td style="width: 40%">HIV</td>
                        <?php if($HIVres->count() > 0): ?>
                            <td style="width: 30%">
                                <label for="chkbox_001"><span
                                        class="fa fa-users"></span>Done</label>
                                <input id="chkbox_001" type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="" checked>
                            </td>
                            <td>
                                <label for="chkbox_002"><span
                                        class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Not Done</label>
                                <input id="chkbox_002" type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="">
                            </td>
                        <?php else: ?>
                            <td style="width: 30%">
                                <label for="chkbox_001"><span
                                        class="fa fa-users"></span>Done</label>
                                <input id="chkbox_001" type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="">
                            </td>
                            <td>
                                <label for="chkbox_002"><span
                                        class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Not Done</label>
                                <input id="chkbox_002" type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="" checked>
                            </td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td style="width: 40%">Filariasis</td>
                        <?php if($FilRes->count() > 0): ?>
                            <td style="width: 30%">
                                <label for="chkbox_001"><span
                                        class="fa fa-users"></span>Done</label>
                                <input id="chkbox_001" type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="" checked>
                            </td>
                            <td>
                                <label for="chkbox_002"><span
                                        class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Not Done</label>
                                <input id="chkbox_002" type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="">
                            </td>
                        <?php else: ?>
                            <td style="width: 30%">
                                <label for="chkbox_001"><span
                                        class="fa fa-users"></span>Done</label>
                                <input id="chkbox_001" type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="">
                            </td>
                            <td>
                                <label for="chkbox_002"><span
                                        class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Not Done</label>
                                <input id="chkbox_002" type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="" checked>
                            </td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td style="width: 40%">Other</td>
                        <td colspan="2" rowspan="2" style="width: 60%; vertical-align: bottom;">
                            ................................................
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </td>
            <td style="width: 1%;"></td>
            <td style="width: 50%; float: right; border: 1px solid black;">
                <table style="width: 90%; margin-top: 6px; margin-bottom: 10px;" align="center">
                    <tr>
                        <td colspan="3"><p style="text-align: left; font-size: 15px;"><b><u>Sputum Spot Test (Gene
                                        Xpert)</u></b></p></td>
                    </tr>
                    <tr>
                        <td style="width: 40%"></td>
                        <?php if($examRemark[0]->cm_order_sputum_sample): ?>
                            <td style="width: 30%">
                                <label><span
                                        class="fa fa-users"></span>Done</label>
                                <input type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="" checked>
                            </td>
                            <td style="width: 30%">
                                <label><span
                                        class="fa fa-users"></span>Not Done</label>
                                <input type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="">
                            </td>
                        <?php else: ?>
                            <td style="width: 30%">
                                <label><span
                                        class="fa fa-users"></span>Done</label>
                                <input type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="">
                            </td>
                            <td style="width: 30%">
                                <label><span
                                        class="fa fa-users"></span>Not Done</label>
                                <input type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="" checked>
                            </td>
                        <?php endif; ?>
                    </tr>
                    <tr style="visibility: hidden;">
                        <td colspan="3"><p style="text-align: left; font-size: 15px;"><b><u>for space</u></b>
                            </p></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p style="text-align: left; font-size: 15px;"><b><u>Sputum Collected for
                                        Culture</u></b>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Day 1</td>
                        <td style="width: 30%">
                            <label for="chkbox_001"><span
                                    class="fa fa-users"></span>Done</label>
                            <input id="chkbox_001" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc=""
                                   <?php if($examRemark[0]->cm_order_sputum_sample == 1): ?>
                                   checked
                                <?php endif; ?>>
                        </td>
                        <td style="width: 30%">
                            <label for="chkbox_002"><span
                                    class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Not Done</label>
                            <input id="chkbox_002" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc=""
                                   <?php if($examRemark[0]->cm_order_sputum_sample != 1): ?>
                                   checked
                                <?php endif; ?>>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%">Day 2</td>
                        <td style="width: 30%">
                            <label for="chkbox_001"><span
                                    class="fa fa-users"></span>Done</label>
                            <input id="chkbox_001" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        </td>
                        <td style="width: 30%">
                            <label for="chkbox_002"><span
                                    class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Not Done</label>
                            <input id="chkbox_002" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table style="width: 100%; margin-top: 10px;">
        <tr>
            <td style="width: 49%; float: left; border: 1px solid black;">
                <table style="width: 90%; margin-top: 6px; margin-bottom: 10px;" align="center">
                    <tr>
                        <td colspan="3"><p style="text-align: left; font-size: 15px;"><b><u>Radiology Test</u></b>
                            </p></td>
                    </tr>
                    <tr>
                        <td style="width: 40%"></td>
                        <td style="width: 30%">
                            <label for="chkbox_001"><span
                                    class="fa fa-users"></span>Done</label>
                            <input id="chkbox_001" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc=""
                                   <?php if($cxrDet[0]->cxr_done == true): ?>
                                   checked
                                <?php endif; ?>>
                        </td>
                        <td style="width: 30%">
                            <label for="chkbox_002"><span
                                    class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Not Done</label>
                            <input id="chkbox_002" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc=""
                                   <?php if($cxrDet[0]->cxr_not_done == true): ?>
                                   checked
                                <?php endif; ?>>
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 1%;"></td>
            <td style="width: 50%; float: right; border: 1px solid black;">
                <table style="width: 90%; margin-top: 6px; margin-bottom: 10px;" align="center">
                    <tr>
                        <td colspan="3"><p style="text-align: left; font-size: 15px;"><b><u>Referrals</u></b></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 40%"></td>
                        <?php if($HIVres->count() > 0): ?>
                            <?php if( $HIVres[0]->prtr_result == "Positive" || $Malres[0]->prtr_result == "Positive" || $FilRes[0]->prtr_result == "Positive"): ?>
                                <td style="width: 30%">
                                    <label for="chkbox_001"><span
                                            class="fa fa-users"></span>Done</label>
                                    <input id="chkbox_001" type="checkbox"
                                           class="form-check-input-styled"
                                           data-fouc="" checked>
                                </td>
                                <td style="width: 30%">
                                    <label for="chkbox_001"><span
                                            class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Not Done</label>
                                    <input id="chkbox_001" type="checkbox"
                                           class="form-check-input-styled"
                                           data-fouc="">
                                </td>
                            <?php else: ?>
                                <td style="width: 30%">
                                    <label for="chkbox_001"><span
                                            class="fa fa-users"></span>Done</label>
                                    <input id="chkbox_001" type="checkbox"
                                           class="form-check-input-styled"
                                           data-fouc="">
                                </td>
                                <td style="width: 30%">
                                    <label for="chkbox_001"><span
                                            class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Not Done</label>
                                    <input id="chkbox_001" type="checkbox"
                                           class="form-check-input-styled"
                                           data-fouc="" checked>
                                </td>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php if($Malres[0]->prtr_result == "Positive" || $FilRes[0]->prtr_result == "Positive"): ?>
                                <td style="width: 30%">
                                    <label for="chkbox_001"><span
                                            class="fa fa-users"></span>Done</label>
                                    <input id="chkbox_001" type="checkbox"
                                           class="form-check-input-styled"
                                           data-fouc="" checked>
                                </td>
                                <td style="width: 30%">
                                    <label for="chkbox_001"><span
                                            class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Not Done</label>
                                    <input id="chkbox_001" type="checkbox"
                                           class="form-check-input-styled"
                                           data-fouc="">
                                </td>
                            <?php else: ?>
                                <td style="width: 30%">
                                    <label for="chkbox_001"><span
                                            class="fa fa-users"></span>Done</label>
                                    <input id="chkbox_001" type="checkbox"
                                           class="form-check-input-styled"
                                           data-fouc="">
                                </td>
                                <td style="width: 30%">
                                    <label for="chkbox_001"><span
                                            class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Not Done</label>
                                    <input id="chkbox_001" type="checkbox"
                                           class="form-check-input-styled"
                                           data-fouc="" checked>
                                </td>
                            <?php endif; ?>
                        <?php endif; ?>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table style="width: 100%; margin-top: 10px;">
        <tr>
            <td style="width: 49%; float: left; border: 1px solid black;">
                <table style="width: 100%; margin-top: 6px; margin-bottom: 10px; margin-left: 13px;">
                    <tr>
                        <td><p style="text-align: left; font-size: 15px;"><b><u>DPP Comment</u></b></p></td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo e($examRemark[0]->cm_dpp_comment); ?>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <table style="width: 100%; margin-top: 40px;">
        <tr>
            <td width="50%" style="text-align: center;">
                <span>......................................................</span>
            </td>
            <td width="50%" style="text-align: center;">
                <span>..............................................</span>
            </td>
        </tr>
        <tr>
            <td width="50%" style="text-align: center;">
                <span>Signature - Official Stamp</span><br>Panel Physician
            </td>
            <td width="50%" style="text-align: center;">
                <span>Date</span>
            </td>
        </tr>
    </table>
    <br>
    <p style="text-align: left; font-size: 14px; border: 1px solid black; text-align: justify; padding: 10px; ">I have
        read and understood the instructions provided at the counselling session and consented for medical examination
        and laboratory investigations. I am aware for the fact that my medical examination and investigation results
        shall be shared with the Immigration Health Unit of Ministry of Health and Department of Immigration and
        Emigration.</p>
    <br><br>
    <table width="100%" >
        <tr>
            <td width="50%" style="text-align: center;">
                <span>......................................................</span>
            </td>
            <td width="50%" style="text-align: center;">
                <span>..............................................</span>
            </td>
        </tr>
        <tr>
            <td width="50%" style="text-align: center;">
                <span>Signature - Client</span>
            </td>
            <td width="50%" style="text-align: center;">
                <span>Date</span>
            </td>
        </tr>
    </table>
</div>
</body>

</html>

<?php /**PATH C:\wamp64\www\iom\resources\views/pages/Certificate.blade.php ENDPATH**/ ?>