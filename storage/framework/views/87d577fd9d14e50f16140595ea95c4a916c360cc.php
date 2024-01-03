<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Thanushka Jayasinghe" />
    <meta name="keywords" content="Thanushka Jayasinghe, IOM" />
    <meta name="author" content="Thanushka Jayasinghe" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <link rel="shortcut icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/vnd.microsoft.icon" />

    <title>IOM | <?php echo $__env->yieldContent('title'); ?></title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="<?php echo e(asset('css/icons/icomoon/styles.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" id="bootstrapTh" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/bootstrap_limitlessDefault.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/layout.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/components.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/colors.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('plugins/fontawesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('plugins/Select2/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('plugins/iziModal-master/css/iziModal.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('css/offCanvesEffect.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('js/DataTables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('js/DataTables/Buttons-1.5.4/css/buttons.bootstrap4.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('css/offCanvesEffect.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('css/icons/Animate.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('css/checkboxes.css')); ?>" rel="stylesheet" type="text/css" />

    <?php echo $__env->yieldContent('header'); ?>

    <style>
        #icon-profile1:hover img {
            -webkit-animation: shake 1s;
            animation: bounce 1s;
        }

        #icon-calendar1:hover img {
            -webkit-animation: shake 1s;
            animation: zoomIn 1s;
        }

        #icon-phone-wave1:hover img {
            -webkit-animation: shake 1s;
            animation: tada 1s;
        }

        #icon-user-cancel1:hover img {
            -webkit-animation: shake 1s;
            animation: jello 1s;
        }

        #icon-list21:hover img {
            -webkit-animation: shake 1s;
            animation: zoomIn 1s;
        }

        #icon-shredder1:hover img {
            -webkit-animation: shake 1s;
            animation: flipInY 1s;
        }

        #icon-drawer-out1:hover img {
            -webkit-animation: shake 1s;
            animation: bounce 1s;
        }

        #icon-paste21:hover img {
            -webkit-animation: shake 1s;
            animation: flip 1s;
        }

        #icon-file-minus21:hover img {
            -webkit-animation: shake 1s;
            animation: hinge 1s;
        }

        #icon-equalizer31:hover img {
            -webkit-animation: shake 1s;
            animation: lightSpeedIn 1s;
        }

        #icon-equalizer41:hover img {
            -webkit-animation: shake 1s;
            animation: lightSpeedIn 1s;
        }

        #icon-display1:hover img {
            -webkit-animation: shake 1s;
            animation: zoomIn 1s;
        }

        #icon-users41:hover img {
            -webkit-animation: shake 1s;
            animation: jello 1s;
        }

        #icon-cash31:hover img {
            -webkit-animation: shake 1s;
            animation: tada 1s;
        }

        #iconcw21:hover img {
            -webkit-animation: shake 1s;
            animation: rotateInDownLeft 1s;
        }

        #icon-gradient1:hover img {
            -webkit-animation: shake 1s;
            animation: zoomIn 1s;
        }

        #icon-printer41:hover img {
            -webkit-animation: shake 1s;
            animation: jello 1s;
        }

        #icon-chart1:hover img {
            -webkit-animation: shake 1s;
            animation: flip 1s;
        }

        #iconemplate1:hover img {
            -webkit-animation: shake 1s;
            animation: zoomIn 1s;
        }

        #icon-add-to-list1:hover img {
            -webkit-animation: shake 1s;
            animation: zoomIn 1s;
        }

        #icon-eyedropper31:hover img {
            -webkit-animation: shake 1s;
            animation: bounce 1s;
        }

        #icon-hammer-wrench1:hover img {
            -webkit-animation: shake 1s;
            animation: lightSpeedIn 1s;
        }

        #icon-ipad1:hover img {
            -webkit-animation: shake 1s;
            animation: zoomIn 1s;
        }

        #icon-brain1:hover img {
            -webkit-animation: shake 1s;
            animation: tada 1s;
        }

        #icon-droplet1:hover img {
            -webkit-animation: shake 1s;
            animation: jello 1s;
        }

        #icon-price-tag21:hover img {
            -webkit-animation: shake 1s;
            animation: zoomIn 1s;
        }

        #icon-price-tags1:hover img {
            -webkit-animation: shake 1s;
            animation: zoomIn 1s;
        }

        #icon-stack1:hover img {
            -webkit-animation: shake 1s;
            animation: zoomIn 1s;
        }

        #icon-lab1:hover img {
            -webkit-animation: shake 1s;
            animation: jello 1s;
        }

        #icon-clipboard51:hover img {
            -webkit-animation: shake 1s;
            animation: zoomIn 1s;
        }

        #icon-atom21:hover img {
            -webkit-animation: shake 1s;
            animation: rotateIn 1s;
        }

        #icon-download71:hover img {
            -webkit-animation: shake 1s;
            animation: bounce 1s;
        }

        #icon-stack-text1:hover img {
            -webkit-animation: shake 1s;
            animation: zoomIn 1s;
        }

        #icon-tree51:hover img {
            -webkit-animation: shake 1s;
            animation: tada 1s;
        }

        #icon-tree61:hover img {
            -webkit-animation: shake 1s;
            animation: zoomIn 1s;
        }

        #icon-airplane4:hover img {
            -webkit-animation: shake 1s;
            animation: jello 1s;
        }

        #icon-merge1:hover img {
            -webkit-animation: shake 1s;
            animation: lightSpeedIn 1s;
        }

        #icon-link21:hover img {
            -webkit-animation: shake 1s;
            animation: tada 1s;
        }

        #icon-pulse21:hover img {
            -webkit-animation: shake 1s;
            animation: zoomIn 1s;
        }

        #icon-airplane31:hover img {
            -webkit-animation: shake 1s;
            animation: bounce 1s;
        }

        #icon-airplane41:hover img {
            -webkit-animation: shake 1s;
            animation: bounce 1s;
        }

        #icon-checkbox-checked1:hover img {
            -webkit-animation: shake 1s;
            animation: zoomIn 1s;
        }

        #icon-checkmark41:hover img {
            -webkit-animation: shake 1s;
            animation: zoomIn 1s;
        }

        #icon-stack-check1:hover img {
            -webkit-animation: shake 1s;
            animation: jello 1s;
        }

        #icon-stairs-up1:hover img {
            -webkit-animation: shake 1s;
            animation: bounce 1s;
        }

        .disabledLi {
            pointer-events: none;
            opacity: 0.6;
        }
    </style>


    <style>
        /*Page Loader*/
        #page-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #ffffff;
        }

        .sk-folding-cube {
            position: relative;
            width: 40px;
            height: 40px;
            margin-top: 50px;
            -webkit-transform: rotateZ(45deg);
            transform: rotateZ(45deg);
        }

        .sk-folding-cube .sk-cube {
            position: relative;
            float: left;
            width: 50%;
            height: 50%;
            -webkit-transform: scale(1.1);
            -ms-transform: scale(1.1);
            transform: scale(1.1);
        }

        .sk-folding-cube .sk-cube:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #0030a1;
            border: 1px solid #5b9db7;
            -webkit-animation: sk-fold 2.4s infinite linear both;
            animation: sk-fold 2.4s infinite linear both;
            -webkit-transform-origin: 100% 100%;
            -ms-transform-origin: 100% 100%;
            transform-origin: 100% 100%;
        }

        .sk-folding-cube .sk-cube2 {
            -webkit-transform: scale(1.1) rotateZ(90deg);
            transform: scale(1.1) rotateZ(90deg);
        }

        .sk-folding-cube .sk-cube3 {
            -webkit-transform: scale(1.1) rotateZ(180deg);
            transform: scale(1.1) rotateZ(180deg);
        }

        .sk-folding-cube .sk-cube4 {
            -webkit-transform: scale(1.1) rotateZ(270deg);
            transform: scale(1.1) rotateZ(270deg);
        }

        .sk-folding-cube .sk-cube2:before {
            -webkit-animation-delay: 0.3s;
            animation-delay: 0.3s;
        }

        .sk-folding-cube .sk-cube3:before {
            -webkit-animation-delay: 0.6s;
            animation-delay: 0.6s;
        }

        .sk-folding-cube .sk-cube4:before {
            -webkit-animation-delay: 0.9s;
            animation-delay: 0.9s;
        }

        #page-loader.dimissloader {
            opacity: 0;
            visibility: hidden;
            transition: opacity 1s, visibility 0s 1s;
        }

        @-webkit-keyframes sk-fold {

            0%,
            10% {
                -webkit-transform: perspective(140px) rotateX(-180deg);
                transform: perspective(140px) rotateX(-180deg);
                opacity: 0;
            }

            25%,
            75% {
                -webkit-transform: perspective(140px) rotateX(0deg);
                transform: perspective(140px) rotateX(0deg);
                opacity: 1;
            }

            90%,
            100% {
                -webkit-transform: perspective(140px) rotateY(180deg);
                transform: perspective(140px) rotateY(180deg);
                opacity: 0;
            }
        }

        @keyframes  sk-fold {

            0%,
            10% {
                -webkit-transform: perspective(140px) rotateX(-180deg);
                transform: perspective(140px) rotateX(-180deg);
                opacity: 0;
            }

            25%,
            75% {
                -webkit-transform: perspective(140px) rotateX(0deg);
                transform: perspective(140px) rotateX(0deg);
                opacity: 1;
            }

            90%,
            100% {
                -webkit-transform: perspective(140px) rotateY(180deg);
                transform: perspective(140px) rotateY(180deg);
                opacity: 0;
            }
        }

        html.hidescrollbar {
            overflow: hidden;
        }

        html.hidescrollbar body {
            overflow: hidden;
        }
    </style>

</head>

<body class="navbar-top">

    <!--Loader-->
    <div id="page-loader">
        <div class="page-loader__logo text-center">
            <img src="<?php echo e(asset('images/loaderImage.png')); ?>" alt="Logo" style="width: 24%;">
        </div><!-- .page-loader__logo -->

        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div><!-- .sk-folding-cube -->
    </div>
    <!--Loader-->

    
    <div id="menucol" class="navbar navbar-dark navbar-expand-md fixed-top navbar-expand-xl navbar-component rounded"
        style="z-index: 26;">
        <div class="navbar-brand wmin-0 mr-2" style="padding: 2px;">
            <a href="<?php echo e(url('/home')); ?>" class="d-inline-block">
                <img src="<?php echo e(asset('images/logoTransparent2.png')); ?>" alt="" style="height: 50px;display: inline;">
                <img src="<?php echo e(asset('images/logo.png')); ?>"
                    style="height: 50px;display: inline-block;position: relative;left: 14px;top: -3px;">
            </a>
        </div>

        <div class="d-xl-none">
            <button type="button" class="navbar-toggler collapsed" data-toggle="collapse"
                data-target="#navbar-navigation-icons" aria-expanded="false">
                <i class="icon-menu"></i>
            </button>
        </div>

        <div class="navbar-collapse collapse" id="navbar-navigation-icons" style="">
            <ul class="navbar-nav" style="position: relative;left: 10px;">
                <?php if(Session::get('GroupName') != "Tab Counter 1"): ?>
                <li class="nav-item" style="margin-top: 0;">
                    <a href="javascript:void(0);" class="navbar-nav-link legitRipple cd-nav-trigger" style="margin: 0;">
                        <i class="icon-grid-alt"></i>
                        <span class="ml-2">Menu</span>
                    </a>
                </li>
                <?php endif; ?>

                <li class="nav-item dropdown">
                    <?php if(Session::get('GroupName') != "Tab Counter 1"): ?>
                    <a href="#" class="navbar-nav-link dropdown-toggle legitRipple" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="icon-quill2"></i>
                        Color
                        <div class="legitRipple-ripple"
                            style="left: 76.9604%; top: 54.1667%; transform: translate3d(-50%, -50%, 0px); width: 213.25%; opacity: 0;">
                        </div>
                    </a>
                    <?php endif; ?>
                    <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                        <div class="dropdown-content-body p-2">
                            <div class="row no-gutters">

                                <div class="col-12 col-sm-4">
                                    <a href=""
                                        class="d-block text-default text-center ripple-dark rounded p-3 legitRipple colorchange"
                                        name="LimedSpruce" id="LimedSpruce">
                                        <i class="icon-snowflake icon-2x" style="color: #324148"></i>
                                        <div class="font-size-sm font-weight-semibold text-uppercase mt-2">Limed Spruce
                                        </div>
                                    </a>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <a href=""
                                        class="d-block text-default text-center ripple-dark rounded p-3 legitRipple colorchange"
                                        name="JungleGreen" id="JungleGreen">
                                        <i class="icon-snowflake icon-2x" style="color: #26A69A"></i>
                                        <div class="font-size-sm font-weight-semibold text-uppercase mt-2">Jungle Green
                                        </div>
                                    </a>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <a href=""
                                        class="d-block text-default text-center ripple-dark rounded p-3 legitRipple colorchange"
                                        name="Cerulean" id="Cerulean">
                                        <i class="icon-snowflake icon-2x" style="color: #03A9F4"></i>
                                        <div class="font-size-sm font-weight-semibold text-uppercase mt-2">Cerulean
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                </li>

            </ul>

            <span class="ml-md-3 mr-md-auto"></span>

            <ul class="navbar-nav">

                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle"
                        data-toggle="dropdown">
                        <img src="<?php echo e(asset('images/user.jpg')); ?>" class="rounded-circle mr-2" height="34" alt="">
                        <span><?php echo e(Session::get('title')); ?> <?php echo e(Session::get('firstName')); ?>

                            <?php echo e(Session::get('lastName')); ?></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                class="icon-switch2 logout"></i>
                            <?php echo e(__('Logout')); ?>

                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </li>
            </ul>

        </div>
    </div>

    <?php echo $__env->yieldContent('content'); ?>

    
    <div class="navbar navbar-expand-lg navbar-light">
        <div class="text-center d-lg-none w-100">
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                data-target="#navbar-footer">
                <i class="icon-unfold mr-2"></i>
                Footer
            </button>
        </div>

        <div class="navbar-collapse collapse text-center" id="navbar-footer">
            <span class="navbar-text col">
                Copyright &COPY; - <?php echo e(date("Y")); ?> IOM | Design by <a href="http://www.sciencelandit.com/"
                    target="_blank" style="color: #db4343;">SLIT</a>
            </span>
        </div>
    </div>

    
    <nav class="cd-nav-container" id="cd-nav">
        <header>
            <h3>Main Menu</h3>
            <a href="#0" class="cd-close-nav">Close</a>
        </header>
        <ul class="cd-nav list-unstyled">
            <?php if(in_array('1',$pages)): ?>
            <li class="cd-selected" data-menu="index">
                <a href="<?php echo e(url('/dashboard')); ?>" id="icon-profile1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/dashboard.png')); ?>" style="width: 70px;height: 60px;" />
                    </span>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="cd-selected" data-menu="index">
                <a href="<?php echo e(url('/ResidentVisaDetailsFromDie')); ?>" id="icon-profile1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/pass.png')); ?>" style="width: 70px;height: 60px;" />
                    </span>
                    <p>Resident Visa Details From DIE</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('2',$pages)): ?>
            <li data-menu="inbox">
                <a href="<?php echo e(url('/SetWorkSchedule')); ?>" id="icon-calendar1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/systemconfig.png')); ?>" style="width: 60px;height: 60px;" />
                    </span>
                    <p>System Configurations</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('3',$pages)): ?>
            <li data-menu="#">
                <a href="<?php echo e(url('/OverThePhoneRegistration')); ?>" id="icon-phone-wave1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/overthephone.png')); ?>" style="width: 55px;height: 50px;" />
                    </span>
                    <p>Booking an Appointment - Over the Phone</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('84',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/MakeAppointmentLanding')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/overthephone.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Make Appointment</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('89',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/CancelAndResheduleLanding')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/cancelorreschedule.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Appointment Cancel/Re Schedule List</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('7',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/UpdateAppointmentLanding')); ?>" id="icon-drawer-out1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/userdetailupdate.png')); ?>"
                            style="width: 55px;height: 50px;" />
                    </span>
                    <p>Update Appointment Details</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('46',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/RegistrationMainDisplay')); ?>" id="icon-drawer-out1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/displays.png')); ?>" style="width: 55px;height: 50px;" />
                    </span>
                    <p>Registration Main Display</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('8',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/MhacRegistrationLanding')); ?>" id="icon-paste21">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/registration.png')); ?>" style="width: 55px;height: 50px;" />
                    </span>
                    <p>Registration</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('9',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/CancelApplicants')); ?>" id="icon-file-minus21">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/cancelNoShow.png')); ?>" style="width: 55px;height: 56px;" />
                    </span>
                    <p>Cancel No Show Applicants</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('10',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/QueueManagementSettings')); ?>" id="icon-equalizer31">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/QueueManagementSettings.png')); ?>"
                            style="width: 55px;height: 50px;" />
                    </span>
                    <p>Queue Management Settings</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('11',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/CounselingSettings')); ?>" id="icon-equalizer41">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/counsellingSettings.png')); ?>"
                            style="width: 55px;height: 50px;" />
                    </span>
                    <p>Counseling Settings</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('12',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/CounselingMainDisplay')); ?>" id="icon-display1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/displays.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Counseling Main Display</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('13',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/Counselling')); ?>" id="icon-users41">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/counselling.png')); ?>" style="width: 66px; height: 50px;" />
                    </span>
                    <p>Counseling</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('14',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ApplicantOnSitePayment')); ?>" id="icon-cash31">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/paymentcounter.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Payment Counter</p>
                </a>
            </li>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ApplicantOnSitePaymentReprint')); ?>" id="icon-cash31">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/paymentcounter.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Payment Counter Reprint </p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('15',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ChangeProcessOrder')); ?>" id="iconcw21">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/changeProcessOrder.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Change Process Order</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('45',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/CXRMainDisplay')); ?>" id="icon-display">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/displays.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>CXR Main Display</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('16',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/CXRInternal')); ?>" id="icon-gradient1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/cxrInternal.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>CXR Internal</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('17',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/CXRExternal')); ?>" id="icon-printer41">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/cxrExternal.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>CXR External</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('50',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/RadiologistReportingPrevious')); ?>" id="icon-chart1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/radiologistReporting.png')); ?>"
                            style="width: 60px; height: 64px;" />
                    </span>
                    <p>Radiologist Reporting</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('52',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/RadiologistReportingCOM')); ?>" id="icon-chart1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/radiologistReportingCOM.png')); ?>"
                            style="width: 60px; height: 64px;" />
                    </span>
                    <p>Radiologist Reporting - COM Approval</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('19',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/SampleCollectionDisplay')); ?>" id="iconemplate1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/displays.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Sample Collection Display</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('20',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/PhlebotomySampleCollection')); ?>" id="icon-add-to-list1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/phlebotomy.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Phlebotomy Sample Collection</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('78',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/SputumCollectionList')); ?>" id="icon-eyedropper31">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/sputumCollection.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Sputum Collection List</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('21',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/PhlebotomyRapidTestResults')); ?>" id="icon-eyedropper31">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/rapidtestresults.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Phlebotomy Rapid Test Results</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('21',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/PhlebotomyResultAuthorize')); ?>" id="icon-eyedropper31">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/testresultapprove.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Phlebotomy Results Approval</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('82',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ConfirmatoryTestResults')); ?>" id="icon-eyedropper31">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/rapidtestresults.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Confirmatory Test Results</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('23',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ConsultionMainDisplay')); ?>" id="icon-ipad1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/displays.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Consultation Main Display</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('24',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/Consultation')); ?>" id="icon-brain1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/consultation.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Consultation</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('25',$pages)): ?>
            <li data-menu="calendar" style="display: none;">
                <a href="<?php echo e(url('/SampleCollection')); ?>" id="icon-price-tags1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/sputumCollection.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Sputum Collection</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('26',$pages)): ?>
            <li data-menu="calendar" style="display: none;">
                <a href="<?php echo e(url('/SputumSampleDipatchToTbLab')); ?>" id="icon-lab1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/Dispatchtolab.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Sputum Sample Dispatch To Tb Lab</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('27',$pages)): ?>
            <li data-menu="calendar" style="display: none;">
                <a href="<?php echo e(url('/SputumSampleDipatchToTbLabApprovel')); ?>" id="icon-clipboard51">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/testresultapprove.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Sputum Sample Dispatch To Tb Lab Approval</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('28',$pages)): ?>
            <li data-menu="calendar" style="display: none;">
                <a href="<?php echo e(url('/TBSputumRecive')); ?>" id="icon-download71">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/sputumCollection.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>TB Sputum Receive</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('29',$pages)): ?>
            <li data-menu="calendar" style="display: none;">
                <a href="<?php echo e(url('/ViewTBSputmSampleDetails')); ?>" id="icon-stack-text1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/sputumCollection.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>View TB Sputum Sample Details</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('30',$pages)): ?>
            <li data-menu="calendar" style="display: none;">
                <a href="<?php echo e(url('/TBTestResult')); ?>" id="icon-pulse21">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/rapidtestresults.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>TB Test Result</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('31',$pages)): ?>
            <li data-menu="calendar" style="display: none;">
                <a href="<?php echo e(url('/BloodSampleDispatchForMalaria')); ?>" id="icon-airplane31">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/Dispatchtolab.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Blood Sample Dispatch For Malaria</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('32',$pages)): ?>
            <li data-menu="calendar" style="display: none;">
                <a href="<?php echo e(url('/BloodSampleReceiveMalaria')); ?>" id="icon-airplane41">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/bloodsample.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Blood Sample Receive Malaria</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('33',$pages)): ?>
            <li data-menu="calendar" style="display: none;">
                <a href="<?php echo e(url('/MalariaTestResult')); ?>" id="icon-atom21">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/rapidtestresults.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Malaria Test Result</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('34',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/RefferToAFC')); ?>" id="icon-link21">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/referTo.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Refer To AFC</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('35',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ReferToNSACPhivElisa')); ?>" id="icon-tree51">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/ReferToHIV.jpg')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Refer To NSACP (HIV Elisa)</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('36',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ReferToMalaria')); ?>" id="icon-tree61">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/ReferToMalaria.jpg')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Refer To Malaria</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('37',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/RefferToTB')); ?>" id="icon-merge1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/RefertoTb.png')); ?>" style="width: 55px; height: 50px;" />

                    </span>
                    <p>Refer To TB</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('38',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ReferralApproval')); ?>" id="icon-checkbox-checked1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/referralApproal.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Referral Approvals</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('39',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ReferralApprovalIHU')); ?>" id="icon-checkbox-checked1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/referralApproal.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Referral Approvals - IHU</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('40',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ihuRecommendation')); ?>" id="icon-checkmark41">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/recommendation.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>IHU Recommendation</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('41',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/Recommendation')); ?>" id="icon-stack-check1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/recommendation.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Recommendation</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('42',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/FloorManager')); ?>" id="icon-stairs-up1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/floorManager.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Floor Manager</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('43',$pages)): ?>
            <?php endif; ?>
            <?php if(in_array('44',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ControlPanel')); ?>" id="icon-stairs-up1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/control-panel.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Control Panel</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('47',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ihuRecommendationHistory')); ?>" id="icon-stairs-up1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/recommondationHistory.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>IHU - Recommendation History</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('49',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/InterpreterDateWiseDetails')); ?>" id="icon-stairs-up1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/datewisereport.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Interpreter Date Wise Details- Report</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('51',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/UserSignature')); ?>" id="icon-stairs-up1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/sign.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>User Signature</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('51',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ihuRecommendationUpdate')); ?>" id="icon-stairs-up1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/upp.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Ihu Recommendation Update</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('54',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/PhlebotomySearch')); ?>" id="icon-stairs-up1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/verifyList.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Verify Applicant Report / Barcode Re-Print</p>
                </a>
            </li>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/AppointmentNoStatus')); ?>" id="icon-stairs-up1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/trackStatus.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Appointment No Status</p>
                </a>
            </li>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/PaymentSetting')); ?>" id="icon-stairs-up1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/payment.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Payment Setting</p>
                </a>
            </li>

            <li data-menu="calendar">
                <a href="<?php echo e(url('/PaymentHistory')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/paymentHistory.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Payment History</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('77',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/IHUReport')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/verifyList.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>IHU Report</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('64',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/DieReport')); ?>" id="icon-stairs-up1">
                    <span>
                        
                        <img src="<?php echo e(asset('images/menuIcon/verifyList.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>DIE Report</p>
                </a>
            </li>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/TBReport')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/verifyList.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>TB Report</p>
                </a>
            </li>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/MalariaReport')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/verifyList.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Malaria Report</p>
                </a>
            </li>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/HIVReport')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/verifyList.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>HIV Report</p>
                </a>
            </li>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/FilariaReport')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/verifyList.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Filaria Report</p>
                </a>
            </li>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/RePrintReport')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/print.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>RePrint Report</p>
                </a>
            </li>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ChangeStatus')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/reload.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Queue Update</p>
                </a>
            </li>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/BarcodeListSummaryReport')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/reload.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Barcode List Summary Report</p>
                </a>
            </li>

            <li data-menu="calendar">
                <a href="<?php echo e(url('/PendingTokens')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/tokenissue.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Pending Tokens</p>
                </a>
            </li>


            <li data-menu="calendar">
                <a href="<?php echo e(url('/FamilyBreakdown')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/familybreak.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Family Break Down</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('66',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/dailyApplicantDetails')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/applicantDetails.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Load All Applicant Details</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('67',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/TBInter')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/tb.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>TB</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('68',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/MalariaInter')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/malaria.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Malaria</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('69',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/FilariaInter')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/filaria.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Filaria</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('70',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/HIVInter')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/hiv.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>HIV</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('71',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/DPPResults')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/dppResult.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>DPP Results</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('72',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/TBViewDet')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/dppResult.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>TB View Details</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('73',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/FilariaViewDet')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/dppResult.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Filaria View Details</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('74',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/MalariaViewDet')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/dppResult.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Malaria View Details</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('75',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/HivViewDet')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/dppResult.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Hiv View Details</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('76',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/DieViewDet')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/dppResult.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Die View Details</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('79',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/TokenAverageTime')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/timezone.jpg')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Token Average Time </p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('80',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ApplicantWiseAuditTrail')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/referralApproal.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Applicant Wise Audit Trail</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('81',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/BarcodeTestDetails')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/barcodeTest.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Barcode & Test Details</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('83',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/DistributionByAgeReport')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/DistributionbyAge.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Distribution by Age Report</p>
                </a>
            </li>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ViewHistory')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/recommondationHistory.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>View History</p>
                </a>
            </li>

            <li data-menu="calendar">
                <a href="<?php echo e(url('/WeeklyData')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/verifyList.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Weekly Data</p>
                </a>
            </li>
            <?php endif; ?>

            

            <?php if(in_array('86',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/Country')); ?>" id="icon-stairs-up1">

                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/country.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Country</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('87',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/MhacTokenIssue')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/cancelorreschedule.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Token Issue</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('90',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/VitalsLanding')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/vitals.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Vitals</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('91',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/CXRLanding')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/cxrInternal.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>CXR</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('92',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/AddLabTestResults')); ?>" id="icon-eyedropper31">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/rapidtestresults.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Add Test Results</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('93',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ApproveTestResults')); ?>" id="icon-eyedropper31">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/testresultapprove.png')); ?>"
                            style="width: 55px; height: 50px;" />
                    </span>
                    <p>Approve Test Results</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('94',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/PhlebotomyLanding')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/phlebotomy.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Phlebotomy</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('95',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/UserAuditLog')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/audit.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>User Audit Log</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('96',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/MhacQueueUpdate')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/reload.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>MHAC Queue Update</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('96',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/MhacPendingTokens')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/tokenissue.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Mhac Pending Tokens</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('97',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/MhacPendingTokens')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/tokenissue.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Mhac Pending Tokens</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('98',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/ConsultationLanding')); ?>" id="icon-brain1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/consultation.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Consultation</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('99',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/PaymentCounterLanding')); ?>" id="icon-brain1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/consultation.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Payment Counter</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('100',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/MhacAppointmentNoStatus')); ?>" id="icon-stairs-up1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/trackStatus.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>MHAC Appointment No Status</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('101',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/PaymentCounterReprintLanding')); ?>" id="icon-brain1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/consultation.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>Payment Counter Reprint</p>
                </a>
            </li>
            <?php endif; ?>
            <?php if(in_array('102',$pages)): ?>
            <li data-menu="calendar">
                <a href="<?php echo e(url('/MHACPaymentHistory')); ?>" id="icon-brain1">
                    <span>
                        <img src="<?php echo e(asset('images/menuIcon/consultation.png')); ?>" style="width: 55px; height: 50px;" />
                    </span>
                    <p>MHAC Payement History</p>
                </a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>

    <div class="cd-overlay"></div>

    
    <div class="modal fade" id="PopupAlert">
        <div class="modal-dialog modal-md" style="width: 400px; position: relative; top: 80px;">
            <div class="modal-content" style="border-radius: 10px;">
                <div class="modal-header text-center"
                    style="background-color: #F8D78A; height: 50px; border-radius: 10px;">
                    <h4 class="modal-title" style="position: relative;">&nbsp;<span id="PopupAlertTitle"
                            style="position: relative; top: 5px; color: #9F4F15;"></span>
                    </h4>
                </div>
                <div class="modal-body" id="PopupModalMessage" style="height: 80px;">

                </div>
                <div class="modal-footer" style="height: 60px;">
                    <button id="btnYes" name="logoutOk" class="btn btn-primary col-md-4 btn-sm pull-right"
                        style="position: relative; top: -2px;">Yes
                    </button>
                    <button id="btnOK" class="btn btn-primary" data-dismiss="modal">OK</button>
                    <button id="btnNo" class="btn btn-danger btn-sm col-md-4" data-dismiss="modal"
                        style="position: relative; top: -2px;">No
                    </button>
                    <button id="btnCancel" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Wait Box Modal -->
    <div class="modal fade" id="WaitBox" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body" id="PopupModalMessage">
                    <div class="text-center">
                        <img src="<?php echo e(asset('images/waiting.gif')); ?>" height="70"> <br />
                        <span class="WaitBox"
                            style="font-family: Segoe Print !important;font-size: 1.1rem !important;">Please
                            Wait...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <script src="<?php echo e(asset('js/main/jquery.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/main/bootstrap.bundle.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/jqueryUI/jquery-ui.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/loaders/blockui.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/Select2/select2.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/DataTables/datatables.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/forms/styling/uniform.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/forms/styling/switchery.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/forms/styling/switch.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/visualization/d3/d3.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/visualization/d3/d3_tooltip.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/ui/ripple.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/sweetalert/sweetalert.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/forms/styling/switchery.min.js')); ?>" type="text/javascript"></script>

    <script src="<?php echo e(asset('js/app.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/common.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/iziModal-master/js/iziModal.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/formCheckboxesRadios.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/offCanvesEffect.js')); ?>" type="text/javascript"></script>

    <?php $version = time(); ?>

    <script>
        const version = "<?php echo e($version); ?>";     
    </script>

    <?php echo $__env->yieldContent('scripts'); ?>

    <script>

        (function () {
            var startTime = new Date(),
                minTime = 200,
                elapsedTime;

            $('html').addClass('hidescrollbar');

            window.addEventListener('load', function () { // when page loads
                elapsedTime = new Date() - startTime; // get time elapsed once page has loaded
                var hidePageTime = (elapsedTime > minTime) ? 0 : minTime - elapsedTime;

                setTimeout(function () {
                    $('#page-loader').addClass('dimissloader'); // dismiss transition
                }, hidePageTime);

                setTimeout(function () {
                    $('html').removeClass('hidescrollbar');
                }, hidePageTime + 100); // 100 is the duration of the fade out effect

            }, false);
        })();

        const userGroupName = "<?php echo e(Session::get('GroupName')); ?>";

        // if (userGroupName == 'Floor Manager') {

        //     document.write('<script src="http://code.responsivevoice.org/responsivevoice.js"></sc' + 'ript>');
        //     var co = 0;
        //     setInterval(function () {

        //         $.ajax({
        //             url: 'FloorManagerGetData',
        //             type: 'post',
        //             dataType: 'json',
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             data: {
        //                 command: 'getNoty'
        //             },
        //             success: function (data) {

        //                 if (data.result.length > 0) {

        //                     co++;

        //                     if (co == 1) {

        //                         var counterGroupSerial = 8;

        //                         if (data.result[0].temp_counsel_counter == 8) {

        //                             responsiveVoice.speak("Requesting help from Counselling Counter 1", "US English Female", {
        //                                 rate: 0.8
        //                             });

        //                             Swal.fire({
        //                                 title: 'Requesting help from Counselling Counter 1',
        //                                 type: 'warning',
        //                                 showCancelButton: false,
        //                                 allowOutsideClick: false
        //                             }).then((result) => {
        //                                 if (result.value) {

        //                                     updateNoty(counterGroupSerial)
        //                                 }
        //                             });
        //                         } else if (data.result[0].temp_counsel_counter == 9) {

        //                             responsiveVoice.speak("Requesting help from Counselling Counter 2", "US English Female", {
        //                                 rate: 0.8
        //                             });

        //                             Swal.fire({
        //                                 title: 'Requesting help from Counselling Counter 2',
        //                                 type: 'warning',
        //                                 showCancelButton: false,
        //                                 allowOutsideClick: false
        //                             }).then((result) => {
        //                                 if (result.value) {

        //                                     updateNoty(counterGroupSerial)
        //                                 }
        //                             });
        //                         }
        //                     }

        //                 }
        //             }
        //         });
        //     }, 5000);


        //     function updateNoty(counterGroupSerial) {
        //         $.ajax({
        //             url: 'FloorManagerGetData',
        //             type: 'post',
        //             dataType: 'json',
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             },
        //             data: {
        //                 counterGroupSerial: counterGroupSerial,
        //                 command: 'updateNoty'
        //             },
        //             success: function (data) {

        //                 co = 0;
        //             }
        //         });
        //     }
        // }


        $('.input-group-text').css({
            "border": "1px solid #ddd",
            "padding": ".4375rem .875rem"
        });


        //Menu change color
        $(".colorchange").on('click', function () {
            var colnam = $(this).attr('name');
            if (colnam == "LimedSpruce") {
                $('#menucol').removeClass('');
                $('#menucol').addClass('navbar navbar-dark navbar-expand-md fixed-top navbar-expand-xl navbar-component rounded');
                localStorage.setItem("ColMenu", "LimedSpruce");
            } else if (colnam == "Cerulean") {
                $('#menucol').removeClass('');
                $('#menucol').addClass('navbar navbar-dark bg-blue navbar-expand-md fixed-top navbar-expand-xl navbar-component rounded');
                localStorage.setItem("ColMenu", "Cerulean");
            } else if (colnam == "JungleGreen") {
                $('#menucol').removeClass('');
                $('#menucol').addClass('navbar navbar-dark bg-teal-400 navbar-expand-md fixed-top navbar-expand-xl navbar-component rounded');
                localStorage.setItem("ColMenu", "JungleGreen");
            } else if (colnam == "WhiteIce") {
                $('#menucol').removeClass('');
                $('#menucol').addClass('navbar navbar-light alpha-info border-info navbar-expand-md fixed-top navbar-expand-xl navbar-component rounded');
                localStorage.setItem("ColMenu", "WhiteIce");
            }
        });


        var colnamx = localStorage.getItem("ColMenu");
        if (colnamx == "LimedSpruce") {
            $('#menucol').removeClass('');
            $('#menucol').addClass('navbar navbar-dark navbar-expand-md fixed-top navbar-expand-xl navbar-component rounded');
        } else if (colnamx == "Cerulean") {
            $('#menucol').removeClass('');
            $('#menucol').addClass('navbar navbar-dark bg-blue navbar-expand-md fixed-top navbar-expand-xl navbar-component rounded');
        } else if (colnamx == "JungleGreen") {
            $('#menucol').removeClass('');
            $('#menucol').addClass('navbar navbar-dark bg-teal-400 navbar-expand-md fixed-top navbar-expand-xl navbar-component rounded');
        }


        //jQuery datepicker
        $(".dppicker").datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+100"
        });


        ///SelectTo Plugin Script////////////////////////
        $('.selectTo').select2({
            dropdownAutoWidth: true,
            width: 'resolve'
        });
        $('.select2-container').css({
            "width": "100%"
        });


        var rev = "fwd";

        function titlebar(val) {
            var msg = "IOM | <?php echo $__env->yieldContent('title'); ?>";
            var res = "IOM | <?php echo $__env->yieldContent('title'); ?>";
            var speed = 130;
            var speed2 = 1500;
            var pos = val;
            msg = "IOM | <?php echo $__env->yieldContent('title'); ?>";
            var le = msg.length;
            if (rev == "fwd") {
                if (pos < le) {
                    pos = pos + 1;
                    scroll = msg.substr(0, pos);
                    document.title = scroll;
                    timer = window.setTimeout("titlebar(" + pos + ")", speed);
                } else {
                    rev = "bwd";
                    timer = window.setTimeout("titlebar(" + pos + ")", speed);
                }
            } else {
                if (pos > 0) {
                    pos = pos - 1;
                    var ale = le - pos;
                    scrol = msg.substr(ale, le);
                    document.title = scrol;
                    timer = window.setTimeout("titlebar(" + pos + ")", speed);
                } else {
                    rev = "fwd";
                    timer = window.setTimeout("titlebar(" + pos + ")", speed2);
                }
            }
            if (pos == 0) {
                pos = res;
                document.title = pos;
            }
        }

        titr(0);
    </script>

</body>

</html><?php /**PATH C:\wamp64\www\IOM\resources\views/layout.blade.php ENDPATH**/ ?>