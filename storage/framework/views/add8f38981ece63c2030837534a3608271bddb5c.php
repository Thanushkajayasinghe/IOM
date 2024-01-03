<style type="text/css">
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
    }

    td,
    th {
        border: 1px solid #2e2e2e;
        text-align: center;
        padding: 2px;
    }
</style>
<table width="100%" border="0">
    <tbody style="font-size:1rem;color: #1f3b79;">
        <tr>
            <th>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Emblem_of_Sri_Lanka.svg/1200px-Emblem_of_Sri_Lanka.svg.png"
                    alt="Goverment Logo Sri Lanka" title="Goverment Logo Sri Lanka" style="display:block; margin: auto"
                    width="80" height="100" data-auto-embed="attachment" />
            </th>
        </tr>
        <tr>
            <th style="text-align: center;">Ministry of Health, Nutrition & Indigenous Medicine, Sri Lanka</th>
        </tr>
        <tr>
            <th style="text-align: center;">Address: 80A, 10th floor, IBSL Building, Elvitigala Mawatha, Colombo 08, Sri
                Lanka</th>
        </tr>
        <th style="text-align:center">Email: <a href="mailto:ihacsl@iom.int" target="_blank">ihacsl@iom.int</a> &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tel: +94 112 209 600</th>
    </tbody>
</table>
<br>
<h3 style="
    color: grey;
">Health Assessment Registration Details At IHAC</h3>
Main Applicant passport no : <b style="color: #ff0a14;"><?php echo e($mainPassNo); ?></b> , <br><br>

Applicant Date : <b style="color: #1b4b72;"><?php echo e($appDate); ?></b> , <br><br>

Applicant Time : <b style="color: #1b4b72;"><?php echo e($appTime); ?></b> . <br><br><br>

<table width="100%">
    <thead style="background-color: darkslategray;color: wheat;">
        <tr>
            <th>Name</th>
            <th>Passport No</th>
            <th>Appointment No</th>
            <th>Barcode</th>
        </tr>
    </thead>
    <tbody>

        <?php $__currentLoopData = $datax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td> <?php echo e($row['name']); ?> </td>
            <td> <?php echo e($row['passportNo']); ?></td>
            <td> <?php echo e($row['appointmentNo']); ?></td>
            <td style="text-align: center"><img src="data:image/svg+xml;base64,<?php echo e($row['barcode']); ?>"
                    style="text-align: center; height: 35px; width:160px;" alt="Barcode - Not working with Gmail."
                    data-auto-embed="attachment" /></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
<p style="color: red;">* Please be present at the clinic 15 minutes prior to your appointment time.</p>


Address: 10th Floor, Institute of Bankers in Sri Lanka (IBSL) Building, Elwitigala Mawatha, Colombo 00800
Phone: +94 (0)11 2209600
Email: ihacsl@iom.int
</pre>
<br>
<span style="font-size: 13px;">This is an automatically generated email – please do not reply to it. If you have any
    queries regarding your appointment please email ihacsl@iom.int</span>
<br> <br> <br>
<br>
<p style="text-align: center;"><b>All rights reserved.<br />
        The material may not be reproduced, distributed or used commercially, in whole or in part, outside the Inbound
        Health<br />
        Assessment Centre.</b></p><?php /**PATH C:\wamp64\www\IOM\resources\views/emails/sendMailMhacAppointments.blade.php ENDPATH**/ ?>