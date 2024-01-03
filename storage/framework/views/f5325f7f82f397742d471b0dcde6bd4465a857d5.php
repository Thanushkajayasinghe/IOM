<html>
<body>
<h5 style="text-align: center">NOTIFICATION OF SCREENING POSITIVE APPLICANTS TO IMMIGRATION HEALTH UNIT</h5>
<table border="1" width="100%">
    <tr>
        <td rowspan="4" width="50%" style="vertical-align: middle;">Disease</td>
        <td width="10%" style="vertical-align: middle; height: 4%;">Malaria</td>
        <td width="40%">
            <?php $__currentLoopData = $labDet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($data->prtr_test == "Malaria"): ?>
                    <?php echo e($data->prtr_result); ?> - <?php echo e($data->prtr_comment); ?>

                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
    </tr>
    <tr>
        <td style="vertical-align: middle; height: 4%;">Filariasis</td>
        <td>
            <?php $__currentLoopData = $labDet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($data->prtr_test == "Filaria"): ?>
                    <?php echo e($data->prtr_result); ?> - <?php echo e($data ->prtr_comment); ?>

                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
    </tr>
    <tr>
        <td style="vertical-align: middle; height: 4%;">HIV</td>
        <td>
            <?php $__currentLoopData = $labDet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($data->prtr_test == "HIV"): ?>
                    <?php echo e($data->prtr_result); ?> - <?php echo e($data->prtr_comment); ?>

                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
    </tr>

    <tr>
        <td style="vertical-align: middle; height: 4%;">TB</td>
        <td>
            <?php if($tbDet != null): ?>
                <?php if($tbDet[0]->genexpert == "" || $tbDet[0]->genexpert == null): ?>
                <?php else: ?>
                    <?php echo e($tbDet[0]->genexpert); ?>

                <?php endif; ?>
            <?php endif; ?>
        </td>
    </tr>

    <tr>
        <td width="50%" style="vertical-align: middle; height: 4%;">Renewal / New Arrival and Details</td>
        <td colspan="2">
            <?php if($memberDetails[0]->visaRenewalOrNot == null || $memberDetails[0]->visaRenewalOrNot  == ""): ?>
                <?php echo e($memberDetails[0]->visaRenewalOrNot); ?>

            <?php else: ?>
                <?php echo e($memberDetails[0]->visaRenewalOrNot); ?>

            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td width="50%" style="vertical-align: middle; height: 4%;">Name</td>
        <td colspan="2"><?php echo e($memberDetails[0]->FirstName); ?> <?php echo e($memberDetails[0]->LastName); ?></td>
    </tr>
    <tr>
        <td width="50%" style="vertical-align: middle; height: 4%;">Date of Birth</td>
        <td colspan="2"><?php echo e($memberDetails[0]->DateOfBirth); ?></td>
    </tr>
    <tr>
        <td width="50%" style="vertical-align: middle; height: 4%;">Passport Number</td>
        <td colspan="2"><?php echo e($memberDetails[0]->PassportNumber); ?></td>
    </tr>
    <tr>
        <td width="50%" style="vertical-align: middle; height: 4%;">Nationality</td>
        <td colspan="2"><?php echo e($memberDetails[0]->Nationality); ?></td>
    </tr>
    <tr>
        <td width="50%" style="vertical-align: middle; height: 4%;">Applicant Address</td>
        <td colspan="2"><?php echo e($memberDetails[0]->SlAddress); ?></td>
    </tr>
    <tr>
        <td width="50%" style="vertical-align: middle; height: 4%;">Applicant Contact Number</td>
        <td colspan="2"><?php echo e($memberDetails[0]->SlMobile); ?></td>
    </tr>
    <tr>
        <td width="50%" style="vertical-align: middle; height: 4%;">Sponsor</td>
        <td colspan="2"><?php echo e($memberDetails[0]->SponsorName); ?></td>
    </tr>
    <tr>
        <td width="50%" style="vertical-align: middle; height: 4%;">Sponsor Address</td>
        <td colspan="2"><?php echo e($memberDetails[0]->SponsorAddress); ?></td>
    </tr>
    <tr>
        <td width="50%" style="vertical-align: middle; height: 4%;">Sponsor Contact Number</td>
        <td colspan="2"><?php echo e($memberDetails[0]->SponsorMobile); ?></td>
    </tr>
</table>


<table width="100%" style="margin-top: 80px;">
    <tr>
        <td width="50%">..................................................</td>
        <td width="50%"></td>
    </tr>
    <tr>
        <td width="50%">Designated Panel Physician</td>
        <td width="50%" style="text-align: right;">Date: <?php echo e(date("Y-m-d")); ?></td>
    </tr>
</table>
</body>
</html>


<?php /**PATH C:\wamp64\www\IOM\resources\views/Reports/referToAfc.blade.php ENDPATH**/ ?>