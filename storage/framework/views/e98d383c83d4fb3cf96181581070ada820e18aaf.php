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

</style>


<div class="page" style="position: relative;">
    <div class="header">
        <div class="col-md-12 form-group row" style="height: 80px;">
            <div class="col-md-6" style="float: left;">
                <div class="col"></div>
                <img src="<?php echo e(asset('images/logonew2.jpg')); ?>"
                     style="height: 80px;display: inline-block;position: relative;">
                
            </div>
            <div class="col-md-6" style="float: right;">
                <div class="col"></div>
                <img src="<?php echo e(asset('images/IOM-Logo.jpg')); ?>"
                     style="height: 80px;display: inline-block;position: relative;margin-top: 5px;">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <p style="text-align: center"><b>HEALTH EXAMINATION SUMMARY</b></p>
        </div>
        <div class="col-md-12" style="text-align: center;margin-top: 20px;font-size: 15px;"><b>Confidential</b></div>
        <div class="col-md-12" style="text-align: center;margin-top: 7px;">(If found, please return to IHA Unit, c/o
            IOM, No. 80A, Elvitigala Mawatha, Colombo 08, Sri Lanka)
        </div>
    </div>
    <?php $__currentLoopData = $memberDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bodyContainer" style="margin-top: 20px;">
            <div class="col-md-12 form-group row">
                <div class="col-md-9 form-group"></div>
                <div class="col-md-3 form-group" style="height: 150px;">
                    <div class="col"></div>
                    <?php if($photo == null || $photo == ""): ?>
                        <img src="<?php echo e(asset('images/blank-user.jpg')); ?>" class="img-thumbnail"
                             style="border: 2px solid black;height: 150px;float: right;margin-right: 30px;">
                    <?php else: ?>
                        <img src="<?php echo e(asset('/tempFileUpload/photoBoothFiles/'. $photo)); ?>" class="img-thumbnail"
                             style="border: 2px solid black;height: 150px;float: right;margin-right: 30px;">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="col-md-12 details">
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>1.&nbsp;&nbsp;Full Name:&nbsp;&nbsp;</label>
                        <span><?php echo e(strtoupper($data->FirstName)); ?> <?php echo e(strtoupper($data->LastName)); ?></span>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>2.&nbsp;&nbsp;Passport number:&nbsp;&nbsp;</label>
                        <span><?php echo e($data->PassportNumber); ?></span>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>3.&nbsp;&nbsp;Passport country:&nbsp;&nbsp;</label>
                        <span><?php echo e($data->CountryOfBirth); ?></span>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>4.&nbsp;&nbsp;Date of Birth:&nbsp;&nbsp;</label>
                        <span><?php echo e($data->DateOfBirth); ?></span>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>5.&nbsp;&nbsp;IHA number:&nbsp;&nbsp;</label>
                        <span><?php echo e($data->AppointmentNumber); ?></span>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>6.&nbsp;&nbsp;Address while in Sri
                            Lanka:&nbsp;&nbsp;</label>
                        <?php if($data->SlAddress != null): ?>
                            <span><?php echo e($data->SlAddress); ?>, <?php echo e($data->SlStreet); ?>, <?php echo e($data->SlCity); ?></span>
                        <?php else: ?>
                            <span></span>
                        <?php endif; ?>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>7.&nbsp;&nbsp;Date of Entry:&nbsp;&nbsp;</label>
                        <span><?php echo e($data->DateOfArrival); ?></span>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>8.&nbsp;&nbsp;Examination Date:&nbsp;&nbsp;</label>
                        <span><?php echo e($data->AppointmentDate); ?></span>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="col-md-12 form-group">
                <div class="col-md-12 details">
                    <div class="col-md-12 form-group" style="
                    text-align: center;font-size: 15px;"><b>Health
                            examinations</b></div>
                    <br>
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>1.&nbsp;&nbsp;Details of any regular medications:&nbsp;&nbsp;</label>
                        <span></span>
                    </div>
                    <br>

                 

                    <?php if($examRemark != null): ?>
                        <div class="col-md-12 form-group row">
                            <label><span class="fa fa-users"></span>2.&nbsp;&nbsp;Medical
                                Examination:&nbsp;&nbsp;</label>
                            <span><?php echo e($examRemark); ?></span>
                        </div>
                        <br>

                    <?php else: ?>
                        <div class="col-md-12 form-group row">
                            <label><span class="fa fa-users"></span>2.&nbsp;&nbsp;Medical
                                Examination:&nbsp;&nbsp;</label>
                            <span></span>
                        </div>
                        <br>

                    <?php endif; ?>

                    <?php if($rr_comment2 != null): ?>
                        <div class="col-md-12 form-group row">
                            <label><span class="fa fa-users"></span>3.Chest x-ray Remark:&nbsp;&nbsp;</label>
                            <span><?php echo e($rr_comment2); ?></span>
                        </div>
                        <br>

                    <?php else: ?>
                        <div class="col-md-12 form-group row">
                            <label><span class="fa fa-users"></span>3.&nbsp;Chest x-ray Remark:&nbsp;&nbsp;</label>
                            <span></span>
                        </div>
                        <br>

                    <?php endif; ?>


                    <?php if($cm_dpp_comment != null): ?>
                        <div class="col-md-12 form-group row">
                            <label><span class="fa fa-users"></span>4.DPP'S Remark:&nbsp;&nbsp;</label>
                            <span><?php echo e($cm_dpp_comment); ?></span>
                        </div>
                        <br>

                    <?php else: ?>
                        <div class="col-md-12 form-group row">
                            <label><span class="fa fa-users"></span>4.DPP'S Remark:&nbsp;&nbsp;</label>
                            <span></span>
                        </div>
                        <br>

                    <?php endif; ?>

                    <?php if($cxrDet->count() > 0): ?>
                        <?php $__currentLoopData = $cxrDet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 form-group row">
                                <label><span class="fa fa-users"></span>5.&nbsp;&nbsp;Chest x-ray:&nbsp;&nbsp;</label>
                                <?php if($data->cxr_not_done == true): ?>
                                    <?php if($data->cxr_def == true): ?>
                                        <span>Deferred, </span>
                                    <?php endif; ?>
                                    <?php if($data->cxr_preg_sc == true): ?>
                                        <span>Pregnant/SC Instead, </span>
                                    <?php endif; ?>
                                    <?php if($data->cxr_app_dec == true): ?>
                                        <span>Applicant Decline CXR, </span>
                                    <?php endif; ?>
                                    <?php if($data->cxr_no_show == true): ?>
                                        <span>No Show, </span>
                                    <?php endif; ?>
                                    <?php if($data->cxr_child == true): ?>
                                        <span>Child Younger Than 11 Years Old, </span>
                                    <?php endif; ?>
                                    <?php if($data->cxr_unbl_unwill_sc == true): ?>
                                        <span>Unable/ Unwilling/ SC Instead, </span>
                                    <?php endif; ?>
                                    <?php if($data->not_done_other_text != null): ?>
                                        <span><?php echo e($data->not_done_other_text); ?></span>
                                    <?php endif; ?>
                                <?php elseif($data->cxr_done == true): ?>
                                    <?php if($data->cxr_done_plv_shld == true): ?>
                                        <span>With Pelvic Shielding, </span>
                                    <?php endif; ?>
                                    <?php if($data->cxr_done_dbl_abd_shield == true): ?>
                                        <span>Double Abdominal Shielding, </span>
                                    <?php endif; ?>
                                    <?php if($data->done_other_text != null): ?>
                                        <span><?php echo e($data->done_other_text); ?></span>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-md-12 form-group row">
                            <label><span class="fa fa-users"></span>5.&nbsp;&nbsp;Chest x-ray:&nbsp;&nbsp;</label>
                            <span>Not Done</span>
                        </div>
                        <br>
                    <?php endif; ?>
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>6.&nbsp;&nbsp;Any other (non-Tb) abnormality:&nbsp;&nbsp;</label>
                        <span></span>
                    </div>
                    <br>
                    <?php if($sputumDet->count() > 0): ?>
                        <?php $__currentLoopData = $sputumDet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 form-group row">
                                <label><span class="fa fa-users"></span>7.&nbsp;&nbsp;Sputum:&nbsp;&nbsp;</label>
                                <?php if($data->genexpert != null): ?>
                                    <span><?php echo e($data->genexpert); ?>, </span>
                                <?php endif; ?>
                                <?php if($data->liquidculture != null): ?>
                                    <span><?php echo e($data->liquidculture); ?>, </span>
                                <?php endif; ?>
                                <?php if($data->solidculture != null): ?>
                                    <span><?php echo e($data->solidculture); ?>, </span>
                                <?php endif; ?>
                            </div>
                            <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-md-12 form-group row">
                            <label><span class="fa fa-users"></span>7.&nbsp;&nbsp;Sputum:&nbsp;&nbsp;</label>
                            <span>Not Done</span>
                        </div>
                        <br>
                    <?php endif; ?>
                    
                    <?php if($age>15): ?>
                    <?php if($HIVres->count() > 0): ?>
                        <?php $__currentLoopData = $HIVres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 form-group row">
                                <label><span class="fa fa-users"></span>8.&nbsp;&nbsp;HIV ELISA:&nbsp;&nbsp;</label>
                                <span><?php echo e($data->prtr_result); ?></span>
                            </div>
                            <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-md-12 form-group row">
                            <label><span class="fa fa-users"></span>8.&nbsp;&nbsp;HIV ELISA:&nbsp;&nbsp;</label>
                            <span>Not Done</span>
                        </div>
                        <br>
                    <?php endif; ?>
                    <?php endif; ?>
                    
                    <?php if($Malres->count() > 0): ?>
                        <?php $__currentLoopData = $Malres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 form-group row">
                                <label><span class="fa fa-users"></span>9.&nbsp;&nbsp;Malaria:&nbsp;&nbsp;</label>
                                <span> <?php echo e($data->prtr_result); ?></span>
                            </div>
                            <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-md-12 form-group row">
                            <label><span class="fa fa-users"></span>9.&nbsp;&nbsp;Malaria:&nbsp;&nbsp;</label>
                            <span>Not Done</span>
                        </div>
                        <br>
                    <?php endif; ?>
                    <?php if($FilRes->count() > 0): ?>
                        <?php $__currentLoopData = $FilRes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 form-group row">
                                <label><span class="fa fa-users"></span>10.&nbsp;&nbsp;Filaria:&nbsp;&nbsp;</label>
                                <span><?php echo e($data->prtr_result); ?></span>
                            </div>
                            <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="col-md-12 form-group row">
                            <label><span class="fa fa-users"></span>10.&nbsp;&nbsp;Filaria:&nbsp;&nbsp;</label>
                            <span>Not Done</span>
                        </div>
                        <br>
                    <?php endif; ?>
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>11.&nbsp;&nbsp;Referrals:&nbsp;&nbsp;</label>
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
                        <span></span>
                    </div>
                    <br>
                    <?php if($prg_status == true): ?>
                        <div class="col-md-12 form-group row">
                            <label><span class="fa fa-users"></span>12.Tested for Pregnancy &nbsp;</label>
                            <span>Yes</span>
                        </div>
                        <br>

                    <?php else: ?>
                        <div class="col-md-12 form-group row">

                        </div>

                    <?php endif; ?>
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <div class="col-md-6" style="text-align: center;float: left;">
                            <span>.........................................................................</span>
                            <br>
                            <span>Signature - Panel Physician</span>
                        </div>
                        <div class="col-md-6" style="text-align: center;float: right;">
                            <span>......................................</span>
                            <br>
                            <span>Date</span>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <p style="text-align: left; font-size: 14px; border: 1px solid black; text-align: justify; padding: 10px;">
                            I have read and understood the instructions provided at the counselling session and
                            consented
                            for medical examination and laboratory investigations. I am aware for the fact that
                            my
                            medical examination and investigation results shall be shared with the Immigration
                            Health
                            Unit of Ministry of Health and Department of Immigration and Emigration.
                        </p>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <div class="col-md-6" style="text-align: center;float: left;">
                            <span>.........................................................................</span>
                            <br>
                            <span>Signature - Client</span>
                        </div>
                        <div class="col-md-6" style="text-align: center;float: right;">
                            <span>......................................</span>
                            <br>
                            <span>Date</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="footer" style="position: absolute;bottom: 0;right: 0;left: 0;">
    </div>
</div>


<?php $__env->startSection('scripts'); ?>

<script src="<?php echo e(asset('js/main/jquery.min.js')); ?>" type="text/javascript"></script>
<script>
    // ===============================

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

    // ========================================================================
</script>


<?php $__env->stopSection(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/SummaryReport.blade.php ENDPATH**/ ?>