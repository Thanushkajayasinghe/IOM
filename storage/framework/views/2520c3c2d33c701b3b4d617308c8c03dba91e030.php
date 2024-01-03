<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .page {
            width: 85.60mm;
            height: 53.98mm;
            border: 1px solid !important;
        }
    </style>
</head>
<body>
<div class="page">
    <table width="100%">
        <tr>
            <td style="width: 50%;" style="text-align: left;">
                <?php if($photo == null || $photo == ""): ?>
                    <img src="<?php echo e(asset('images/blank-user.jpg')); ?>"
                         style="height: 50px;border: 2px solid black;">
                <?php else: ?>
                    <img src="<?php echo e(asset('/tempFileUpload/photoBoothFiles/'. $photo)); ?>"
                         style="height: 50px;border: 2px solid black;">
                <?php endif; ?>
            </td>
            <td style="width: 50%;" style="text-align: right;">
                <img src="<?php echo e(asset('images/IOM-Logo.jpg')); ?>"
                     style="height: 50px;float:right;">
            </td>
        </tr>
    </table>
    <?php $__currentLoopData = $memberDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <table width="100%">
            <tr>
                <td style="width: 30%;">
                    <span>First Name&nbsp;&nbsp;&nbsp;: </span>
                </td>
                <td style="width: 70%" style="text-align: left;">
                    <span><?php echo e($data->FirstName); ?></span>
                </td>
            </tr>
            <tr>
                <td style="width: 30%;">
                    <span>Last Name&nbsp;&nbsp;&nbsp;: </span>
                </td>
                <td style="width: 70%" style="text-align: left;">
                    <span><?php echo e($data->LastName); ?></span>
                </td>
            </tr>
            <tr>
                <td style="width: 30%;">
                    <span>Passport No&nbsp;: </span>
                </td>
                <td style="width: 70%" style="text-align: left;">
                    <span><?php echo e($data->PassportNumber); ?></span>
                </td>
            </tr>
            <tr>
                <td style="width: 30%;">
                    <span>Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </span>
                </td>
                <td style="width: 70%" style="text-align: left;">
                    <span><?php echo e($category); ?></span>
                </td>
            </tr>
        </table>
        <br>
        <table width="100%" style="text-align: right;">
            <tr>
                <td style="width: 50%">
                </td>
                <td style="width: 50%">
                    <span>
                        Date :
                    </span>
                    <span><?php echo e($date); ?></span>
                </td>
            </tr>
        </table>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="footer" style="position: absolute;bottom: 0;right: 0;left: 0;">
    </div>
</div>
</body>
</html>

<?php /**PATH C:\wamp64\www\IOM\resources\views/pages/DetailCard.blade.php ENDPATH**/ ?>