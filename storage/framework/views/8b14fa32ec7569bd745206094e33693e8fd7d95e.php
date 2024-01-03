<?php $__env->startSection('title', 'Queue Management Settings'); ?>

<?php if($readWrite == 'true'): ?>

<?php $__env->startSection('header'); ?>
<link href="<?php echo e(asset('css/jQueryIUtimePicker.css')); ?>" rel="stylesheet" type="text/css"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>



<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>Queue Management Settings</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Queue Management Settings</span>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->

<!-- Page content -->
<div class="page-content pt-0">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">
            <div class="card">
                <div class="card-header">

                    <div class="col-md-12 form-group">

<!--                        <div class="row form-group">
                            <div class="col-md-3">
                                <label><span class="fa fa-calendar-times-o"></span>&nbsp;&nbsp;Date</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control dppicker" >
                                        <div class="input-group-append">
                                            <div class="input-group-text"><span class="fa fa-calendar"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="row form-group">
                            <div class="col-md-6" id="Registration_Body">
                                <h2><span class="badge badge-primary">Registration</span></h2>

                                <div class="col form-group">
                                    <button type="button" id="Registration_Add" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span></button>
                                    <button type="button" id="Registration_Remove" class="btn btn-danger btn-sm"><span class="fa fa-close"></span></button>
                                </div>

                            </div>

                            <div class="col-md-6" id="Counseling_Body">
                                <h2><span class="badge badge-secondary">Counseling</span></h2>

                                <div class="col form-group">
                                    <button type="button" id="Counseling_Add" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span></button>
                                    <button type="button" id="Counseling_Remove" class="btn btn-danger btn-sm"><span class="fa fa-close"></span></button>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                          <div class="col-md-6" id="Radiography_Body">
                              <h2><span class="badge badge-secondary">Radiography</span></h2>

                              <div class="col form-group">
                                  <button type="button" id="Radiography_Add" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span></button>
                                  <button type="button" id="Radiography_Remove" class="btn btn-danger btn-sm"><span class="fa fa-close"></span></button>
                              </div>
                          </div>
                          <div class="col-md-6" id="Radiology_Body">
                              <h2><span class="badge badge-secondary">Radiology</span></h2>

                              <div class="col form-group">
                                  <button type="button" id="Radiology_Add" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span></button>
                                  <button type="button" id="Radiology_Remove" class="btn btn-danger btn-sm"><span class="fa fa-close"></span></button>
                              </div>
                          </div>
                        </div>

                        <div class="row form-group">
                          <div class="col-md-6" id="Phlebotomy_Body">
                              <h2><span class="badge badge-secondary">Phlebotomy</span></h2>

                              <div class="col form-group">
                                  <button type="button" id="Phlebotomy_Add" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span></button>
                                  <button type="button" id="Phlebotomy_Remove" class="btn btn-danger btn-sm"><span class="fa fa-close"></span></button>
                              </div>
                          </div>
                          <div class="col-md-6" id="Consultation_Body">
                              <h2><span class="badge badge-secondary">Consultation</span></h2>

                              <div class="col form-group">
                                  <button type="button" id="Consultation_Add" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span></button>
                                  <button type="button" id="Consultation_Remove" class="btn btn-danger btn-sm"><span class="fa fa-close"></span></button>
                              </div>
                          </div>
                        </div>

                    </div>

                    <div class="col-md-12 form-group text-center">
                        <button type="button" class="btn btn-success " id="saveQMSettings">Save</button>
                    </div>

                </div>
            </div>

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!--JS files-->
    <script src="<?php echo e(asset('plugins/jqueryUI/jquery-ui-timepicker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/OverThePhoneRegistration.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('jsPages/QueueManagementSettings.js')); ?>" type="text/javascript"></script>

<script>
    $('.Time').timepicker({
        timeFormat: 'HH:mm:ss',
        stepHour: 1,
        stepMinute: 1,
        stepSecond: 1
    });

</script>

<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/QueueManagementSettings.blade.php ENDPATH**/ ?>