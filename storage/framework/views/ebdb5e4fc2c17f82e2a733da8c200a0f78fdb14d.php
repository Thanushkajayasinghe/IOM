<style type="text/css">
    img {
        padding-left: 20px;
    }
</style>
<br>
Main Applicant passport no : <b style="color: #ff0a14;"><?php echo e($MainpassportNumber); ?></b> , <br><br>

Applicant Date : <b style="color: #1b4b72;"><?php echo e($date); ?></b>. <br><br>

Applicant Time : <b style="color: #1b4b72;"><?php echo e($time); ?></b>. <br><br><br>


<table class="table table-bordered table-hover table-striped text-center">
    <thead style="background-color: darkslategray;color: wheat;">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Passport No </th>
        <th>Appointment No</th>
        <th>Member Barcode</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $result2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td> <?php echo e($data->FirstName); ?> </td>
            <td> <?php echo e($data->LastName); ?> </td>
            <td> <?php echo e($data->PassportNumber); ?></td>
            <td> <?php echo e($data->AppointmentNumber); ?></td>
            <td><img src="data:image/png;base64,<?php echo e($data->barcode); ?>"  style="display: block; width: 15%;" alt="Barcode"/></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>


<br>
<br>
<br>
<span style="font-size: 13px;">This is an automatically generated email – please do not reply to it. If you have any queries regarding your order please email impersonal_slow_generic_helpdesk@bingobob.com</span>
<br> <br> <br>
<br>
<br>
<br>
<br>

<?php /**PATH C:\wamp64\www\iom\resources\views/pages/sendMail.blade.php ENDPATH**/ ?>