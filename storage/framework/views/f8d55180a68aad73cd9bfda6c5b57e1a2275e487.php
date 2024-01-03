<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="Thanushka Jayasinghe"/>
    <meta name="keywords" content="Thanushka Jayasinghe, IOM"/>
    <meta name="author" content="Thanushka Jayasinghe"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/vnd.microsoft.icon"/>

    <title>IOM | <?php echo $__env->yieldContent('title'); ?></title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="<?php echo e(asset('css/icons/icomoon/styles.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" id="bootstrapTh" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/bootstrap_limitlessDefault.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/layout.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/components.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/colors.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('plugins/fontawesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('css/3dbuttons.css')); ?>" rel="stylesheet" type="text/css">
</head>
<body>

<div class="page-content pt-0">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">


            <!-- Dashboard content -->
            <div class="row">
                <div class="col-xl-12">

                    <!-- Marketing campaigns -->
                    <div class="card">


                        <div class="row justify-content-center" style="margin-top: 20px;">
                            <!--<div class="col-md-12" style="text-align: center">-->
                            <div class="col-md-4" style="text-align: center">
                                <label style="font-size: 1rem;"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Main
                                    Applicant Appointment No / Passport No</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               style="font-size: 1rem;color: #042992;" id="token_issue">
                                    </div>
                                    <div class="row justify-content-center"
                                         style="text-align: center !important; margin-top: 35px;">
                                        <div class="col-md-8">
                                            <button class="btn-block btn-info btn-lg btn3d" id="tokenIssueNew"
                                                    style="font-size: 1.5rem;margin:auto;text-align: center;padding-top: 20px;padding-bottom: 20px;">
                                                Get Token
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--</div>-->
                        </div>

                        <div class="row" style="margin-top: 25px;">
                            <div class="col-md-12" style="text-align: center">
                                <label style="font-size: 1.2rem;">&nbsp;&nbsp;TOKEN NO</label>
                            </div>
                        </div>
                        <div class="row" id="Print_token" >
                            <div class="col-md-12" style="text-align: center; display: none;" id="title">
                                <span style="font-size: 14px;"><b>Welcome to International Organization for Migration Inbound Health Assessment Center</b></span>
                            </div>
                            <div class="col-md-12" style="text-align: center" id="tkn">
                                <label>&nbsp;Token Number</label>
                            </div>
                            <div class="col-md-12" style="text-align: center">
                                <label id="token_text" style="font-size: 4rem;">&nbsp;- </label>
                            </div>
                            <div class="col-md-12" style="text-align: left; display: none;" id="otherLable1">
                                <label style="font-size: 14px;">&nbsp;Date of Appointment:</label>
                                <label id="DateofAppointment" style="font-size: 14px;"></label>
                            </div>

                            <div class="col-md-12" style="text-align: left; display: none;" id="otherLable3">
                                <label style="font-size: 14px;">&nbsp;Time of token issue:</label>
                                <label id="Timeoftokenissue" style="font-size: 14px;"></label>
                            </div>

                        </div>
                        <div class="row justify-content-center" style="margin-bottom: 60px;">
                            <div class="col-md-12" style="text-align: center">
                                <button class="btn3d btn-magickblue" id="printButton"
                                        style="font-size: 2rem;padding: 8px 35px;border-radius: 5px;">
                                    Print
                                </button>
                                <button class="btn3d btn-magickred" id="clearButton"
                                        style="font-size: 2rem;padding: 8px 35px;border-radius: 5px;">
                                    Clear
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /dashboard content -->

        </div>

    </div>
</div>
<!-- /page content -->



<script src="<?php echo e(asset('js/main/jquery.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/main/bootstrap.bundle.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('plugins/jqueryUI/jquery-ui.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/app.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/common.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('jsPages/TokenIssue.js')); ?>" type="text/javascript"></script>

</body>
</html>



<?php /**PATH C:\wamp64\www\iom\resources\views/pages/TokenIssue.blade.php ENDPATH**/ ?>