<?php $__env->startSection('title', 'Token Issue'); ?>

<?php if($readWrite == 'true' || $readOnly == 'true'): ?>

<?php $__env->startSection('header'); ?>
<link href="<?php echo e(asset('css/strength-meter.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('css/iziToast.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('css/3dbuttons.css')); ?>" rel="stylesheet" type="text/css">
<style>
    .image-upload>input {
        display: none;
    }

    .image-upload img {
        width: 80px;
        cursor: pointer;
    }

    .kv-verdict>.label {
        background: white !important;
    }

    .list-group {
        overflow: hidden;
        border-left: 1px solid rgb(221, 221, 221);
        border-right: 1px solid rgb(221, 221, 221);
    }

    .list-group-item:first-child,
    .list-group-item:last-child {
        border-top-right-radius: 0px;
        border-top-left-radius: 0px;
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 0px;
        overflow: hidden;
    }

    .list-group-item {
        border-left: 0px solid rgb(221, 221, 221);
        border-right: 0px solid rgb(221, 221, 221);
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        -ms-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .list-group-item>.show-menu {
        position: absolute;
        height: 100%;
        width: 24px;
        top: 0px;
        right: 0px;
        background-color: rgba(51, 51, 51, 0.2);
        cursor: pointer;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        -ms-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .list-group-item>.show-menu>span {
        position: absolute;
        top: 50%;
        margin-top: -7px;
        padding: 0px 5px;
    }

    .list-group-submenu {
        position: absolute;
        top: 0px;
        right: -88px;
        white-space: nowrap;
        list-style: none;
        padding-left: 0px;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        -ms-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .list-group-submenu .list-group-submenu-item {
        float: right;
        white-space: nowrap;
        display: block;
        padding: 10px 15px;
        margin-bottom: -1px;
        background-color: rgb(51, 51, 51);
        color: rgb(235, 235, 235);
    }

    .list-group-item.open {
        margin-left: -88px;
    }

    .list-group-item.open>.show-menu {
        right: 88px;
    }

    .list-group-item.open .list-group-submenu {
        right: 0px;
    }

    .list-group-submenu .list-group-submenu-item.primary {
        color: rgb(255, 255, 255);
        background-color: rgb(50, 118, 177);
    }

    .list-group-submenu .list-group-submenu-item.success {
        color: rgb(255, 255, 255);
        background-color: rgb(92, 184, 92);
    }

    .list-group-submenu .list-group-submenu-item.info {
        color: rgb(255, 255, 255);
        background-color: rgb(57, 179, 215);
    }

    .list-group-submenu .list-group-submenu-item.warning {
        color: rgb(255, 255, 255);
        background-color: rgb(240, 173, 78);
    }

    .list-group-submenu .list-group-submenu-item.danger {
        color: rgb(255, 255, 255);
        background-color: rgb(217, 83, 79);
    }

    .ActiveClaz {
        background-color: gainsboro;
    }

    .hideCell {
        display: none;
    }

    .btn-xs {
        padding: .25rem .4rem;
        font-size: .875rem;
        line-height: .5;
        border-radius: .2rem;
    }

    .table td {
        padding: 0.2rem 1.25rem;
    }

    .list-group-item {
        border: 1px;
        border-bottom: 1px solid #d2c5c5;
        padding: .62rem 1.25rem;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Token Issue
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <a href="<?php echo e(url('/')); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Token Issue</span>
            </div>
        </div>
    </div>
</div>


<div class="page-content pt-0">

    <!-- Main content -->
    <div class="content-wrapper">

        <div class="content">
            <div class="card border-y-2 border-top-slate border-bottom-slate rounded-0">
                <div class="card-header">
                    <h6 class="card-title"><span class="font-weight-semibold"></span></h6>
                </div>
                <div class="card-body">
                    <!-- Content area -->
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

                            <div class="col-md-12" style="text-align: left; display: none;" id="otherLable5">
                                <label style="font-size: 14px;">&nbsp;Appoinment Time:</label>
                                <label id="apptime" style="font-size: 14px;"></label>
                            </div>
                            <div class="col-md-12" style="text-align: left; display: none;" id="otherLable4">
                                <label style="font-size: 14px;">&nbsp;Floor:</label>
                                <label id="floorid" style="font-size: 14px;"></label>
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
    </div>

</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!--JS files-->
<script src="<?php echo e(asset('js/iziToast.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('plugins/jqueryUI/jquery-ui-timepicker.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('jsPagesMhac/TokenIssue.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/strength-meter.min.js')); ?>" type="text/javascript"></script>

<script>
   
    $(document).on('mouseover', '.list-group-item', function (event) {
        event.preventDefault();
        $(this).closest('li').addClass('open');
    });
    $(document).on('mouseout', '.list-group-item', function (event) {
        event.preventDefault();
        $(this).closest('li').removeClass('open');
    });


    $(document).on('click', '.list-group-item', function () {
        $('.hideCell').show();
        $('.hideCell').attr('style', 'text-align: center; display: table-cell;border-right: 1px solid rgb(221, 221, 221);');
    });

</script>

<?php $__env->stopSection(); ?>

<?php endif; ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pagesmhac/mhactokenissue.blade.php ENDPATH**/ ?>