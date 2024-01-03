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
        <tr width="100%">
            <td width="30%"></td>
            <td width="40%" style="text-align: center;">
                <img src="<?php echo e(asset('images/logonew2.jpg')); ?>"
                     style="height: 80px;display: inline-block;position: relative;">
            </td>
            <td width="30%"></td>
        </tr>
        <tr width="100%">
            <td width="10%"></td>
            <td width="80%" style="text-align: center;">
                <p style="text-align: center"><b>HEALTH EXAMINATION SUMMARY</b></p>
                <span style="text-align: center; margin-top: 5px;"><b>Confidential</b></span>
                <div style="text-align: center;margin-top: 7px;">(If found, please return to IHA Unit, c/o
                    IOM, No. 80A, Elvitigala Mawatha, Colombo 08, Sri Lanka)
                </div>
            </td>
            <td width="10%"></td>
        </tr>
    </table>
    <br>


    <?php $__currentLoopData = $memberDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table width="100%">
            <tr width="100%">
                <td width="25%" rowspan="5" style="border: solid 1px black ; ">
                    <center>
                        <?php if($photo == null || $photo == ""): ?>
                            <img src="<?php echo e(asset('images/blank-user.jpg')); ?>"
                                 style="height: 140px;display: inline-block;position: relative;border: 2px solid black;">
                        <?php else: ?>
                            <img src="<?php echo e(asset('/tempFileUpload/photoBoothFiles/'. $photo)); ?>"
                                 style="height: 140px;position: relative;border: 2px solid black;">
                        <?php endif; ?>
                    </center>
                </td>
                <td width="15%" style="border: solid 1px black; border-right: 2px solid white; margin-left: 15px;">
                    <label><span class="fa fa-users"></span>Name&nbsp;&nbsp;</label>
                </td>
                <td width="60%" style="border: solid 1px black; border-left: 2px solid white;">
                    <label><span
                            style="font-weight:normal;">: <?php echo e(strtoupper($data->FirstName)); ?> <?php echo e(strtoupper($data->LastName)); ?></span></label>
                </td>
            </tr>
            <tr width="100%">
                <td width="15%" style="border: solid 1px black;">
                    <label><span class="fa fa-users"></span>Gender&nbsp;</label>

                </td>
                <td width="60%" style="border: solid 1px black;border-left: 2px solid white;">
                    <label><span style="font-weight:normal;">: <?php echo e($data->Gender); ?></span></label>
                </td>

            </tr>
            <tr width="100%">
                <td width="15%" style="border: solid 1px black;">
                    <label><span class="fa fa-users"></span>Date of Birth&nbsp;</label>

                </td>
                <td width="60%" style="border: solid 1px black;border-left: 2px solid white;">
                    <label><span style="font-weight:normal;">: <?php echo e($data->DateOfBirth); ?></span></label>
                </td>

            </tr>
            <tr width="100%">
                <td width="15%" style="border: solid 1px black;">
                    <label><span class="fa fa-users"></span>Passport No&nbsp;</label>

                </td>
                <td width="60%" style="border: solid 1px black;border-left: 2px solid white;">
                    <label><span style="font-weight:normal;">: <?php echo e($data->PassportNumber); ?></span></label>
                </td>
            </tr>
            <tr width="100%">
                <td width="15%" style="border: solid 1px black;">
                    <label><span class="fa fa-users"></span>Nationality</label>
                </td>
                <td width="60%" style="border: solid 1px black;border-left: 2px solid white;">
                    <label><span
                            style="font-weight:normal;">: <?php if($data->Nationality != null): ?><?php echo e(ucfirst(trans($data->Nationality))); ?><?php endif; ?></span></label>
                </td>

            </tr>
        </table>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <table width="100%" style="margin-top: 10px;">
        <tr width="100%">
            <td width="45%" style="border: 1px solid #0c0c0c;padding: 5px;">
                <p style="text-align: left;"><b><u>Rapid Test Results</u></b></p>
                <label><span
                        class="fa fa-users"></span>Malaria&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <?php if($Malres->count() > 0): ?>
                    <?php $__currentLoopData = $Malres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($data->prtr_result == 'Negative'): ?>
                            <label for="chkbox_001"><span
                                    class="fa fa-users"></span>Negative</label>
                            <input id="chkbox_001" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                            <label for="chkbox_002"><span
                                    class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                            <input id="chkbox_002" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php elseif($data->prtr_result == 'Positive'): ?>
                            <label for="chkbox_001"><span
                                    class="fa fa-users"></span>Negative</label>
                            <input id="chkbox_001" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                            <label for="chkbox_002"><span
                                    class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                            <input id="chkbox_002" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <label for="chkbox_001"><span
                            class="fa fa-users"></span>Negative</label>
                    <input id="chkbox_001" type="checkbox"
                           class="form-check-input-styled"
                           data-fouc="">
                    <label for="chkbox_002"><span
                            class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                    <input id="chkbox_002" type="checkbox"
                           class="form-check-input-styled"
                           data-fouc="">
                <?php endif; ?>
                <br>

                
                <?php if($age>15): ?>
                    <label><span class="fa fa-users">
                        </span>HIV &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <?php if($HIVres->count() > 0): ?>
                        <?php $__currentLoopData = $HIVres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data->prtr_result == 'Negative'): ?>
                                <label for="chkbox_003"><span
                                        class="fa fa-users"></span>Negative</label>
                                <input id="chkbox_003" type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="" checked>

                                <label for="chkbox_004"><span
                                        class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                                <input id="chkbox_004" type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="">
                            <?php elseif($data->prtr_result == 'Positive'): ?>
                                <label for="chkbox_003"><span
                                        class="fa fa-users"></span>Negative</label>
                                <input id="chkbox_003" type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="">
                                <label for="chkbox_004"><span
                                        class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                                <input id="chkbox_004" type="checkbox"
                                       class="form-check-input-styled"
                                       data-fouc="" checked>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <label for="chkbox_003"><span
                                class="fa fa-users"></span>Negative</label>
                        <input id="chkbox_003" type="checkbox"
                               class="form-check-input-styled"
                               data-fouc="">
                        <label for="chkbox_004"><span
                                class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                        <input id="chkbox_004" type="checkbox"
                               class="form-check-input-styled"
                               data-fouc="">
                    <?php endif; ?>
                    <br>
                <?php endif; ?>
                
                <label><span class="fa fa-users"></span>Filariasis&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <?php if($FilRes->count() > 0): ?>
                    <?php $__currentLoopData = $FilRes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($data->prtr_result == 'Negative'): ?>
                            <label for="chkbox_005"><span
                                    class="fa fa-users"></span>Negative</label>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                            <label for="chkbox_006"><span
                                    class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                            <input id="chkbox_006" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                        <?php elseif($data->prtr_result == 'Positive'): ?>
                            <label for="chkbox_005"><span
                                    class="fa fa-users"></span>Negative</label>
                            <input id="chkbox_005" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="">
                            <label for="chkbox_006"><span
                                    class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                            <input id="chkbox_006" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <label for="chkbox_005"><span
                            class="fa fa-users"></span>Negative</label>
                    <input id="chkbox_005" type="checkbox"
                           class="form-check-input-styled"
                           data-fouc="">
                    <label for="chkbox_006"><span
                            class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                    <input id="chkbox_006" type="checkbox"
                           class="form-check-input-styled"
                           data-fouc="">
                <?php endif; ?>

                
                <p style="text-align: left;"><b><u>Radiology Results</u></b></p>
                <label><span class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

                <label for="chkbox_007"><span
                        class="fa fa-users"></span>Normal</label>
                <input id="chkbox_007" type="checkbox"
                       class="form-check-input-styled"
                       data-fouc=""
                       <?php if($TR == 'NO'): ?>
                       checked
                    <?php endif; ?>
                >

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <label for="chkbox_008"><span
                        class="fa fa-users"></span>Abnormal</label>
                <input id="chkbox_008" type="checkbox"
                       class="form-check-input-styled"
                       data-fouc=""
                       <?php if($TR == 'AB'): ?>
                       checked
                    <?php endif; ?>
                >

                

            </td>
            <td width="10%"></td>
            <td width="45%" style="border: 1px solid #0c0c0c;padding: 5px;">
                <p style="text-align: left;"><b><u>Sputum Spot Test Results (Gene Xpert)</u></b></p>
                <?php if($sputumDet->count() > 0): ?>
                    <?php $__currentLoopData = $sputumDet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($data->genexpert == 'Positive'): ?>
                            <label for="chkbox_007"><span
                                    class="fa fa-users"></span>Positive</label>
                            <input id="chkbox_007" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php elseif($data->genexpert == 'Negative'): ?>
                            <label for="chkbox_008"><span
                                    class="fa fa-users"></span>Negative</label>
                            <input id="chkbox_008" type="checkbox"
                                   class="form-check-input-styled"
                                   data-fouc="" checked>l
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <label for="chkbox_007"><span
                            class="fa fa-users"></span>Positive</label>
                    <input id="chkbox_007" type="checkbox"
                           class="form-check-input-styled"
                           data-fouc="">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="chkbox_008"><span
                            class="fa fa-users"></span>Negative</label>
                    <input id="chkbox_008" type="checkbox"
                           class="form-check-input-styled"
                           data-fouc="">
                <?php endif; ?>
                <p style="text-align: left;"><b><u>Sputum Collected for Culture</u></b></p>
                <label>Day1</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="chkbox_009"><span
                        class="fa fa-users"></span>Yes</label>
                <input id="chkbox_009" type="checkbox"
                       class="form-check-input-styled"
                       data-fouc="">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="chkbox_0010"><span
                        class="fa fa-users"></span>No</label>
                <input id="chkbox_0010" type="checkbox"
                       class="form-check-input-styled"
                       data-fouc="">
                <br>
                <label>Day2</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="chkbox_0011"><span
                        class="fa fa-users"></span>Yes</label>
                <input id="chkbox_0011" type="checkbox"
                       class="form-check-input-styled"
                       data-fouc="">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label for="chkbox_0012"><span
                        class="fa fa-users"></span>No</label>
                <input id="chkbox_0012" type="checkbox"
                       class="form-check-input-styled"
                       data-fouc="">
            </td>
        </tr>

    </table>
    <table width="100%" style="margin-top: 10px;">
        <tr width="100%">
            <td width="100%" style="border: 1px solid #0c0c0c;padding: 5px;">
                <p style="text-align: left;"><b><u>DPP'S Remarks</u></b></p>
                <?php if($cm_dpp_comment != null): ?>
                    <span style="font-weight:normal;"><?php echo e($cm_dpp_comment); ?></span>
                <?php else: ?>
                    <span style="font-weight:normal;">&nbsp;&nbsp;</span>
                <?php endif; ?>
                <p style="text-align: left;"><b><u>Other Remarks</u></b></p>
                <?php if($examRemark != null): ?>
                    <span style="font-weight:normal;"><?php echo e($examRemark); ?></span>
                <?php else: ?>
                    <span style="font-weight:normal;">&nbsp;&nbsp;</span>
                <?php endif; ?>
            </td>
        </tr>
    </table>

    <table width="100%" style="margin-top: 10px;">
        <tr width="100%">
            <td width="100%" style="border: 1px solid #0c0c0c;padding: 5px;">
                <p style="text-align: left;"><b><u>Referrals</u></b></p>
                <ol type="a">
                    <?php if($refTb != null): ?>
                        <li> Tb: <span><?php echo e(/*$refTb*/); ?></span></li>
                    <?php else: ?>
                        <li> Tb: <span></span></li>
                    <?php endif; ?>

                    
                    <?php if($age>15): ?>
                        <?php if($HIVres->count() > 0): ?>
                            <?php $__currentLoopData = $HIVres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($data->prtr_result == 'Negative'): ?>
                                    <li> HIV: <span>Not Done</span></li>
                                <?php elseif($data->prtr_result == 'Positive'): ?>
                                    <li> HIV: <span>Referred</span>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <li> HIV: <span>Not Done</span></li>
                        <?php endif; ?>
                    <?php endif; ?>

                    

                    <?php if($Malres->count() > 0): ?>
                        <?php $__currentLoopData = $Malres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data->prtr_result == 'Negative'): ?>
                                <li> Malaria: <span>Not Done</span></li>
                            <?php elseif($data->prtr_result == 'Positive'): ?>
                                <li> Malaria: <span>Referred</span></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <li> Malaria: <span>Not Done</span></li>
                    <?php endif; ?>
                    
                    <?php if($FilRes->count() > 0): ?>
                        <?php $__currentLoopData = $FilRes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($data->prtr_result == 'Negative'): ?>
                                <li> Filariasis: <span>Not Done</span></li>
                            <?php elseif($data->prtr_result == 'Positive'): ?>
                                <li> Filariasis: <span>Referred</span></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <li> Filariasis: <span>Not Done</span></li>
                    <?php endif; ?>
                    

                    <?php if($refOther != null): ?>
                        <li> Any other: <span><?php echo e($refOther); ?></span></li>
                    <?php else: ?>
                        <li> Any other: <span>Not Done</span></li>
                    <?php endif; ?>
                </ol>
            </td>
        </tr>
    </table>
    <br>
    <table style="width: 100%; margin-top: 13px;">
        <tr>
            <td width="50%" style="text-align: center;">
                <span>.........................................................................</span>
                <br>
                <span>Signature - Panel Physician</span>
            </td>
            <td width="50%" style="text-align: center;">
                <span>......................................</span>
                <br>
                <span>Date</span>
            </td>
        </tr>
    </table>

    <p style="text-align: left; font-size: 14px; border: 1px solid black; text-align: justify; padding: 5px;">
        I have read and understood the instructions provided at the
        counselling session and
        consented
        for medical examination and laboratory investigations. I am aware for the fact that
        my
        medical examination and investigation results shall be shared with the Immigration
        Health
        Unit of Ministry of Health and Department of Immigration and Emigration.
    </p>

    <table style="width: 100%; margin-top: 22px;">
        <tr>
            <td width="50%" style="text-align: center;">
                <span>.........................................................................</span>
                <br>
                <span>Signature - Client</span>
            </td>
            <td width="50%" style="text-align: center;">
                <span>......................................</span>
                <br>
                <span>Date</span>
            </td>
        </tr>
    </table>
    <div class="footer" style="position: absolute;bottom: 0;right: 0;left: 0;">
    </div>
</div>
</body>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/formCheckboxesRadios.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/main/jquery.min.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

</html>

<?php /**PATH C:\wamp64\www\iom\resources\views/pages/Certificate2.blade.php ENDPATH**/ ?>