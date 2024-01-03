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

    <title>IOM | Login</title>

    <!-- Fonts -->
    <link href="//fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('plugins/fontawesome/css/font-awesome.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/login.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('plugins/sweetalert/sweetalert.min.css')); ?>" rel="stylesheet">

</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background: url('<?php echo e(asset('images/banner1.jpg')); ?>');">
        <div class="wrap-login100">
            
            

            <div class="row p-b-10">
                <div class="col"><img src="<?php echo e(asset('images/IOM-Logo.jpg')); ?>"
                                      style="width: auto;height: 100px;margin-left: auto;margin-right: auto;display: block;">
                </div>
            </div>

            <span class="login100-form-title p-b-65">IOM Login</span>

            <div class="wrap-input100">
                <input class="input100" id="usernameid" type="text" name="email">
                <span class="focus-input100" data-placeholder="Username"></span>
            </div>

            <div class="wrap-input100 validate-input">
                <input class="input100" id="passwordid" type="password" name="password">
                <span class="focus-input100" data-placeholder="Password"></span>
            </div>

            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button type="submit" id="btnlogin" value=" <?php echo e(__('Login')); ?>" class="login100-form-btn">
                        Login
                    </button>
                </div>
            </div>

            <div class="text-center p-t-115">
						<span class="txt1">
						 <p>Copyright &COPY; - <?php echo e(date("Y")); ?> IOM | Design by <a href="http://www.sciencelandit.com/"
                                                                                  target="_blank"
                                                                                  style="color: #db4343;">SLIT</a>
						</span>
            </div>
            
        </div>
    </div>
</div>

<!-- Scripts -->

<script src="<?php echo e(asset('js/main/jquery.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('plugins/sweetalert/sweetalert.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('jsPages/Login.js')); ?>" type="text/javascript"></script>


    <script>
        var path = "<?php echo e(url('/home')); ?>"
        var CoTabPath = "<?php echo e(url('/CounsellingTab')); ?>"
    </script>


</body>
</html>
<?php /**PATH C:\wamp64\www\iom\resources\views/auth/login.blade.php ENDPATH**/ ?>