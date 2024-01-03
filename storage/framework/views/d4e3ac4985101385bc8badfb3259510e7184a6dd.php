<?php $__env->startSection('title', 'Applicant Wise Audit Trail'); ?>

<?php $__env->startSection('header'); ?>
    <link href="<?php echo e(asset('css/3dbuttons.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Applicant
                    Wise Audit Trail
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Applicant Wise Audit Trail</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Page content -->
    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <div class="content">

                <div class="card">
                    <div class="card-body">

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Date: </label>
                                    <input type="text" id="txtDateSelect" class="form-control date-pick" readonly="readonly">
                                </div>
                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Appointment No: </label>
                                    <select id="drpAppointmentNo" class="form-control selectTo"></select>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 table-responsive" style="margin-top: 30px;">
                            <table id="tableCoN"
                                   class="table table-bordered table-hover table-striped text-center dataTable">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Appointment No</th>
                                    <th>Passport No</th>
                                    <th>Registration Counter</th>
                                    <th>Time</th>
                                    <th>Counselling Counter</th>
                                    <th>Time</th>
                                    <th>CXR Counter</th>
                                    <th>Time</th>
                                    <th>Phlebotomy Counter</th>
                                    <th>Time</th>
                                    <th>Consultation Counter</th>
                                    <th>Time</th>
                                </tr>
                                </thead>
                                <tbody id="appNoStatTbody">

                                </tbody>
                            </table>
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
    <script src="<?php echo e(asset('jsPages/AuditTrail.js')); ?>" type="text/javascript"></script>
    <script>
        var imgPathBlade = '<?php echo e(url('images/')); ?>';
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/AuditTrail.blade.php ENDPATH**/ ?>