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
<table width="100%" border="0">
    <tbody style="font-size:1rem;color: #1f3b79;">
	<tr><th>
	<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Emblem_of_Sri_Lanka.svg/1200px-Emblem_of_Sri_Lanka.svg.png" alt="Goverment Logo Sri Lanka" title="Goverment Logo Sri Lanka" style="display:block; margin: auto" width="80" height="100" data-auto-embed="attachment"/>
	</th>
	</tr>
	<tr><th style="text-align: center;">Ministry of Health, Nutrition & Indigenous Medicine, Sri Lanka</th></tr>
	<tr><th style="text-align: center;">Address: 80A, 10th floor, IBSL Building, Elvitigala Mawatha, Colombo 08, Sri Lanka</th></tr>
	<th style="text-align:center">Email: <a href="mailto:ihacsl@iom.int" target="_blank">ihacsl@iom.int</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tel: +94 112 209 600</th>
	</tbody>
</table>
<br>
<h3 style="
    color: grey;
">Health Assessment Registration Details At IHAC</h3>
Main Applicant passport no : <b style="color: #ff0a14;"><?php echo e($MainpassportNumber); ?></b> , <br><br>

Applicant Date : <b style="color: #1b4b72;"><?php echo e($date); ?></b> , <br><br>

Applicant Time : <b style="color: #1b4b72;"><?php echo e($time); ?></b> . <br><br><br>

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
                                                alt="Barcode - Not working with Gmail." data-auto-embed="attachment"/></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
<h3>All passengers arriving Sri Lanka are required to undergo 14-days mandatory facility quarantine and 14-day self-isolation. Both quarantine certificates are required to be be produced to enter the inbound health assessment center.</h3>
<p style="color: red;">* Please be present at the clinic 15 minutes prior to your appointment time. You will not be
    admitted to the Assessment
    Center if you have passed 45 minutes from your appointment time slot, since arriving after your scheduled
    appointment time will require you to reschedule your appointment for another date.</p>

<pre style="font-family: inherit;">
General Advice regarding Health Assessments
    1.	Fasting before assessment is not required.
    2.	In the case you need to undergo an examination during the health assessment, Examining Physician will
        request you to take off all clothes except your underwear. You will be provided a gown to wear and you
        will be examined in a respectful manner as per medical ethics.
    3.	You may request a chaperon to be present during your physical examination, especially if you are to be examined
        by a physician of the opposite sex.
    4.	Do not conceal medical conditions since most of the medical conditions are admissible, though some
        may require additional tests.
    5.	Do not conceal pregnancy. Pregnancy will not affect your immigration prospects.
    6.	Postpone or re-schedule your appointment if you or your children are ill with fever or rash.
    7.	Health case Submissions and Furtherance related inquires can be directed to ihacsl@iom.int.
    8.	There are no parking spaces available for the applicants at the assessment center.

Also please bring the following documents
•	Original passport
•	In the case the passport is with the Immigration, a document stating this. (A certified copy of the passport will be helpful)
•	Copy of the passport information page
Please note that only cash payments will be accepted. The current exchange rate is available online and displayed
    at the center. The fee for the assessment is $ 75 and only accepted in Sri Lankan rupees.
If you have any feedback or concerns, please feel free to contact us at:  ihacsl@iom.int

Address: 10th Floor, Institute of Bankers in Sri Lanka (IBSL) Building, Elwitigala Mawatha, Colombo 00800
Phone: +94 (0)11 2209600
Email: ihacsl@iom.int
</pre>
<br>
<span style="font-size: 13px;">This is an automatically generated email – please do not reply to it. If you have any queries regarding your appointment please email ihacsl@iom.int</span>
<br> <br> <br>
<br>
<p style="text-align: center;"><b>All rights reserved.<br/>
The material may not be reproduced, distributed or used commercially, in whole or in part, outside the Inbound Health<br/>
Assessment Centre.</b></p>


<?php /**PATH C:\wamp64\www\IOM\resources\views/emails/sendMail.blade.php ENDPATH**/ ?>