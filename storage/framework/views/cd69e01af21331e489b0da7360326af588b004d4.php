<style type="text/css">
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
    }

    td, th {
        border: 1px solid #2e2e2e;
        text-align: center;
        padding: 2px;
    }
</style>
<br>
Main Applicant passport no : <b style="color: #ff0a14;"><?php echo e($MainpassportNumber); ?></b> , <br><br>

Applicant Date : <b style="color: #1b4b72;"><?php echo e($date); ?></b> , <br><br>

Applicant Time : <b style="color: #1b4b72;"><?php echo e($time); ?></b> . <br><br>

<h2>Your appointment has been cancelled.</h2>

<table width="100%">
    <thead style="background-color: darkslategray;color: wheat;">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Passport No</th>
        <th>Appointment No</th>
        <th>Barcode</th>
    </tr>
    </thead>
    <tbody>

    <?php $__currentLoopData = $result2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td> <?php echo e($data->FirstName); ?> </td>
            <td> <?php echo e($data->LastName); ?> </td>
            <td> <?php echo e($data->PassportNumber); ?></td>
            <td> <?php echo e($data->AppointmentNumber); ?></td>
            <td style="text-align: center"><img src="data:image/png;base64,<?php echo e($data->barcode); ?>"
                                                style="text-align: center; height: 35px; width:130px;"
                                                alt="Barcode - Not working with Gmail."/></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>


<br>
<span style="font-size: 13px;">This is an automatically generated email – please do not reply to it. If you have any queries regarding your appointment please email ihacsl@iom.int</span>
<br> <br> <br>
<br>


<?php /**PATH C:\wamp64\www\IOM\resources\views/emails/sendMailCancel.blade.php ENDPATH**/ ?>