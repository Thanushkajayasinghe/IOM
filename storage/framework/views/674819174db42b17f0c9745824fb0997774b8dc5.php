<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="Thanushka Jayasinghe" />
        <meta name="keywords" content="Thanushka Jayasinghe, IOM" />
        <meta name="author" content="Thanushka Jayasinghe" />
        <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/vnd.microsoft.icon" />
        <title>IOM | Vital Display</title>

        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" id="bootstrapTh" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('css/bootstrap_limitlessDefault.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('css/layout.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('css/components.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('css/colors.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('plugins/fontawesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" >       
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            .ww {
                padding-top: 1%;
                padding-bottom: 1%;
                border-bottom: 2px solid #bcb9b9;
            }

            .aaa {
                display: inline-block;
                vertical-align: middle;
            }

            .tokenPlaceHolder h2{
                font-size: 3.5em;
                font-weight: bold;
            }
        </style>
    </head>

    <body style="position: relative; text-align: center; background: linear-gradient(to right, #fff, #e6c38e, #fff);">
        
    <div class="content" style="position: absolute;top: -5px;right: 0;bottom: 0;width: 100%;">
        <div class="cardx">
            <div class="row justify-content-center">
                <div class="col-md-11" style="padding: 0px 0 0px;">

                    <div class="row">
                        <div class="col-12 row" style="border-bottom: 2px solid #bcb9b9;">
                            <div class="col-md-6">
                                <h1 style="font-size: 3rem;"><span class="badge badge-primary"
                                        style="padding: 14px; border-radius: 35px;">VITAL CENTER</span>
                                </h1>
                            </div>
                            <div class="col-md-6 text-center">
                                <h1 style="font-size: 3rem;"><span class="badge badge-info"
                                        style="padding: 14px; border-radius: 35px;">TOKEN NO</span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <div class="row align-items-center" id="Diplay">
                        <div class="col-12 row ww align-items-center">
                            <div class="col-md-6 eachDiv" attr-group="2">
                                <div class="col" style="font-size: 2.5rem; font-weight: bold;"><span
                                        class="aaa">Vital Counter 1</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-center tokenPlaceHolder">
                                <h2>-</h2>
                            </div>
                        </div>
                        <div class="col-12 row ww align-items-center">
                            <div class="col-md-6 eachDiv" attr-group="3">
                                <div class="col" style="font-size: 2.5rem; font-weight: bold;"><span
                                        class="aaa">Vital Counter 2</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-center tokenPlaceHolder">
                                <h2>-</h2>
                            </div>
                        </div>                        
                    </div>

                </div>
            </div>
        </div>
    </div>

        
        <?php $version = time(); ?>
        <script src="<?php echo e(asset('js/main/jquery.min.js')); ?>" type="text/javascript"></script>
        <script src="https://code.responsivevoice.org/responsivevoice.js?key=ADeQhcku"></script>
        <script src="https://cdn.socket.io/4.0.1/socket.io.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="<?php echo e(asset('jsPagesMhac/VitalDisplay.js')); ?>?v=<?php echo e($version); ?>" type="text/javascript"></script>
        <script>
            var url = "<?php echo e(url('')); ?>";   
            var path = "<?php echo e(url('/plugins/ding-dong.mp3')); ?>";
            window.addEventListener("load", function () {
                setTimeout(function () {
                    // This hides the address bar:
                    window.scrollTo(0, 1);
                }, 0);
            });
        </script>
    </body>
</html>
<?php /**PATH C:\wamp64\www\IOM\resources\views/pagesmhac/vitalsdisplay.blade.php ENDPATH**/ ?>