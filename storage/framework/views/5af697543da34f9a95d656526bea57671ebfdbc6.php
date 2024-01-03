<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="Thanushka Jayasinghe">
    <meta name="keywords" content="Thanushka Jayasinghe, IOM">
    <meta name="author" content="Thanushka Jayasinghe">
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/vnd.microsoft.icon"/>
    <title>IOM | Consultation Main Display</title>

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="<?php echo e(asset('css/icons/icomoon/styles.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" id="bootstrapTh" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/bootstrap_limitlessDefault.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/layout.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/components.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/colors.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('plugins/fontawesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('plugins/Select2/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('plugins/jqueryUI/jquery-ui.css')); ?>" rel="stylesheet" type="text/css"/>
    <style>
        .ww {
            padding-top: 3%;
            padding-bottom: 3%;
            border-bottom: 2px solid #bcb9b9;
        }

        .aaa {
            display: inline-block;
            vertical-align: middle;
        }
    </style>
</head>
<body style="background: linear-gradient(to right, #cdde254d, #d9edf3, #529f3080);">
<?php if($readWrite == 'true'): ?>

    

    <div class="content" style="position: absolute;top: -5px;right: 0;bottom: 0;width: 100%;">
        <div class="cardx">
            <div class="col-md-10 offset-md-1" style="padding: 30px 0 30px;">

                <div class="row">
                    <div class="col-md-6">
                        <h1 style="font-size: 4rem;"><span class="badge badge-primary"
                                                           style="padding: 14px; border-radius: 35px;">CONSULTATION CENTER</span>
                        </h1>
                    </div>
                    <div class="col-md-6 text-center">
                        <h1 style="font-size: 4rem;"><span class="badge badge-info"
                                                           style="padding: 14px; border-radius: 35px;">TOKEN NO</span>
                        </h1>
                    </div>
                </div>

                <div class="row align-items-center" id="Diplay">

                </div>
            </div>
        </div>
    </div>

    
    <script src="<?php echo e(asset('js/main/jquery.min.js')); ?>" type="text/javascript"></script>
    <script src="http://code.responsivevoice.org/responsivevoice.js"></script>
    <script src="<?php echo e(asset('jsPages/ConsultationMainDisplay.js')); ?>" type="text/javascript"></script>
    <script>
        var path = '<?php echo e(url('/plugins/ding-dong.mp3')); ?>'
    </script>

<?php endif; ?>
</body>
</html>
<?php /**PATH C:\wamp64\www\IOM\resources\views/pages/ConsultionMainDisplay.blade.php ENDPATH**/ ?>