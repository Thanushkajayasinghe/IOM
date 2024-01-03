<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        body{
            font-size: 10px;
        }
    </style>
</head>
<body>
<h1 style="text-align: center">IHU Report</h1>
<table>
    <tr>
        <th></th>
		<th style="text-align: center;">Date</th>
        <th style="text-align: center;">Passport No</th>
		<th style="text-align: center;">First Name</th>
        <th style="text-align: center;">Last Name</th>
        <th style="text-align: center;">Country</th>
		<th style="text-align: center;">Sponsor Name</th>  
        <th style="text-align: center;">Photo</th>              
    </tr>
    <?php echo e($no = 0); ?>

    <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($no++); ?>;
        <tr>
            <td style="text-align: center;"><?php echo e($no); ?></td>				
			<td><?php echo e($date = (new DateTime($data->createddate))->format('Y/m/d')); ?></td>
            <td><?php echo e($data->PassportNumber); ?></td>            
            <td><?php echo e($data->FirstName); ?></td>
            <td><?php echo e($data->LastName); ?></td>
			<td><?php echo e($data->Nationality); ?></td>
			<td><?php echo e($data->SponsorName); ?></td>
            <td style="text-align: center;"><img src="<?php echo e(asset('tempFileUpload/photoBoothFiles/')); ?>/<?php echo e($data->reg_photo_booth); ?>" width="70"/></td>                        
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

</body>
</html>


<?php /**PATH C:\wamp64\www\IOM\resources\views/Reports/IHUReport.blade.php ENDPATH**/ ?>