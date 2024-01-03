<?php $__env->startSection('title', 'Appointment Cancel/Re-schedule List'); ?>

<?php if($readWrite == 'true'): ?>

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page content -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - APPOINTMENT
                    CANCEL/RE SCHEDULE LIST
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="<?php echo e(url('/')); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active"> APPOINTMENT
                    CANCEL/RE SCHEDULE LIST
                </span>
                </div>
            </div>
        </div>
    </div>


    <!-- Page content -->
    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
                <div class="card">
                    <div class="card-header">

                        <div class="row form-group">
                            <div class="col-xl-3 col-md-3">
                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Date</lable>
                                <input type="text" id="dateHolder" class="form-control dppicker">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12 form-group">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped table-condensed text-center dataTable"
                                           style="" id="tblList">
                                        <thead style="background-color: darkslategray;color: wheat;">
                                        <tr>
                                            <th></th>
                                            <th nowrap>Type (C/R)</th>
                                            <th nowrap>Appointment No</th>
                                            <th nowrap>Passport No</th>
                                            <th nowrap>Applicant Name</th>
                                            <th nowrap>Appointment Date</th>
                                            <th nowrap>Appointment Time</th>
                                            <th nowrap>Re-Schedule Date</th>
                                            <th nowrap>Re-Schedule Time</th>
                                            <th nowrap>Officer Name</th>
                                        </tr>
                                        </thead>
                                        <tbody id="verifyStatTable" style="">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <center>
                            <button type="button" class="btn btn-warning" id="btnPrintList"><span class="fa fa-print"></span>&nbsp;&nbsp;Print
                            </button>
                        </center>
                    </div>

                </div>
            </div>

        </div>
        <!-- /content area -->

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!--JS files-->
    <script>
        var urlPath = '<?php echo e(url('/')); ?>';
    </script>
    <script src="<?php echo e(asset('jsPages/AppointmentCancellationList.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iom\resources\views/pages/AppointmentCancellationList.blade.php ENDPATH**/ ?>