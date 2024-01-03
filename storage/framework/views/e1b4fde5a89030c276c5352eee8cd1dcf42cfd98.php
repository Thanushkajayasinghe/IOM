<style type="text/css">
    img {
        padding-left: 20px;
    }
</style>

<h3 style="text-align: center;">Inbound Health Assessment Center</h3>
<h3 style="text-align: center;">80A, 10<sup>th</sup> Floor, IBSL Building, Elvitigala Mawatha, Colombo 08, Sri Lanka.
</h3>
<h2 style="text-align: center;">Payment Receipt</h2>
<br>
<div class="col-md-12 form-group">
    <div class="col-md-12">
        <span>
    Date : <?php echo e($date); ?>

        </span>
        <br>
        <span>
    Time : <?php echo e($time); ?>

        </span>
        <br>
        <span>
    User : <?php echo e(Session::get('title')); ?> <?php echo e(Session::get('firstName')); ?> <?php echo e(Session::get('lastName')); ?>

        </span>
        <br>
    </div>
    <br>
    <br>

    <div class="col-md-12">

        <table class="table table-hover table-striped nowrap text-center" width="100%">
            <thead style="border: 1px solid black;">
            <tr style="border: 1px solid black;">
                <th width="25%">Appointment No</th>
                <th width="25%">Passport</th>
                <th width="25%">Name</th>
                <th width="20%" style="text-align: right;">Amount (Rs.)</th>
            </tr>
            </thead>
            <tbody style="border: 1px solid black;">
            <?php $__currentLoopData = $familymembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="border: 1px solid black;">
                    <td> <?php echo e($data->AppointmentNumber); ?></td>
                    <td> <?php echo e($data->PassportNumber); ?></td>
                    <td> <?php echo e($data->FirstName); ?> <?php echo e($data->LastName); ?></td>
                    <td style="text-align: right;"> <?php echo e(number_format($paymentForEach, 2, '.', ',')); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <tr style="font-weight:900;">
                <td style="border-top:1px solid black;"></td>
                <td style="border-top:1px solid black;"></td>
                <td style="border-top:1px solid black;">Total</td>
                <td style="text-align: right;border-top:1px solid black;"> <?php echo e(number_format($total, 2, '.', ',')); ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>








<?php /**PATH C:\wamp64\www\iom\resources\views/pages/Receipt.blade.php ENDPATH**/ ?>