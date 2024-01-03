<html>
<body>
<h3 style="text-align: center">INBOUND HEALTH ASSESSMENT CENTER</h3>

<p style="text-align: center"><u><b>Laboratory Investigation Request Form</b></u></p>

<table border="1" width="100%" style="margin-top: 10px;">
    <tr>
        <th width="30%" style="vertical-align: middle; height: 2%;">Name Of Patient</th>
        <td colspan="2"><?php echo e($memberDetails[0]->FirstName); ?> <?php echo e($memberDetails[0]->LastName); ?></td>
    </tr>
    <tr>
        <th width="30%" style="vertical-align: middle; height: 2%;">Date of Birth</th>
        <td colspan="2"><?php echo e($memberDetails[0]->DateOfBirth); ?></td>
    </tr>
    <tr>
        <th width="30%" style="vertical-align: middle; height: 2%;">Age</th>
        <td colspan="2"><?php echo e((date('Y') - date('Y',strtotime($memberDetails[0]->DateOfBirth)))); ?></td>
    </tr>
    <tr>
        <th width="30%" style="vertical-align: middle; height: 2%;">Sex</th>
        <td colspan="2"><?php echo e($memberDetails[0]->Gender); ?></td>
    </tr>
    <tr>
        <th width="30%" style="vertical-align: middle; height: 2%;">Passport No</th>
        <td colspan="2"><?php echo e($memberDetails[0]->PassportNumber); ?></td>
    </tr>
    <tr>
        <th width="30%" style="vertical-align: middle; height: 2%;">Date Of Appointment</th>
        <td colspan="2"><?php echo e($memberDetails[0]->DateOfArrival); ?></td>
    </tr>
</table>

<table border="1" width="100%" style="margin-top: 20px;">
    <tr>
        <th width="60%" style="vertical-align: middle; height: 2%;">Reason for referral :</th>
    </tr>
    <tr>
        <td width="60%" style="vertical-align: middle; height: 6%;"></td>
    </tr>
</table>

<table border="0" width="100%" style="margin-top: 20px;">
    <tr>
        <th></th>
        <th width="40%" style="vertical-align: middle; height: 2%;">Investigations Requested :</th>
        <th style="vertical-align: middle; height: 2%;" colspan="2"></th>
    </tr>
    <?php echo e($no = 0); ?>

    <?php $__currentLoopData = $tbDet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($no++); ?>;
        <tr>
            <td style="vertical-align: bottom; text-align: center; width: 4%;"><?php echo e($no); ?>.</td>
            <td style="vertical-align: bottom;"><?php echo e($data->test); ?></td>
            <td style="text-align: center; width: 8%;"><div style="border: 1px solid; padding: 10px 3px; height: 10px;"></div></td>
            <td style="vertical-align: bottom;">.......................................</td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<table width="100%" style="margin-top: 80px;">
    <tr>
        <td width="88%">..................................................</td>
        <td width="" style="text-align: left;"><?php echo e(date("Y-m-d")); ?></td>
    </tr>
    <tr>
        <td width="88%">Designated Panel Physician</td>
        <td width="" style="text-align: left;">Date</td>
    </tr>
</table>
</body>
</html>


<?php /**PATH C:\wamp64\www\IOM\resources\views/Reports/SystemLabRequest.blade.php ENDPATH**/ ?>