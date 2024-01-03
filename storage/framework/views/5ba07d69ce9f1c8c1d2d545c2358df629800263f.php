<?php $__env->startSection('title', 'TB Test Result'); ?>

<?php if($readWrite == 'true' || $readOnly == 'true'): ?>

<?php $__env->startSection('header'); ?>
    <style>
        .ui_tpicker_unit_hide {
            display: none;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Interpreter
                    Date Wise Details
                    Result</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Interpreter Date Wise Details</span>
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
                        <div class="form-group col-md-12 row">
                            <div class="col-md-2">
                                <strong>Appointment Date</strong>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="text" id="AppointmentDate" class="form-control" readonly/>
                                    <div class="input-group-append" id="btnSearch2">

                                        <div class="input-group-text"><span class="fa fa-search"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="form-group col-md-12">
                        <div id="tableContainer" class="table-responsive">
                            <div class="table-responsive" >
                                <table id="descript2"
                                       class="table table-bordered table-hover table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Passport Number</th>
                                        <th>Country Of Origin</th>
                                        <th>Appointment No</th>
                                        <th>Birth Day</th>
                                        <th>Age</th>
                                        <th>Address</th>
                                        <th>Street</th>
                                        <th>City</th>
                                        <th>Postal Code</th>
                                        <th>Sponsor Name</th>
                                        <th>Sponsor Mobile</th>
                                        <th>Appointment Date</th>
                                        <th>Members Status</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Interpretation Status</th>
                                        <th>Interpretation Language</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    </div>
    <!-- /page content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!--JS files-->

    <script src="<?php echo e(asset('plugins/jqueryUI/jquery-ui-timepicker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('jsPages/InterpreterDateWiseDetails.js')); ?>" type="text/javascript"></script>
    <script>
        $('#AppointmentDate').datepicker({
            dateFormat: 'yy-mm-dd',
            //maxDate: 0

        });
    </script>
<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iom\resources\views/pages/InterpreterDateWiseDetails.blade.php ENDPATH**/ ?>