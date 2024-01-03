<?php $__env->startSection('title', 'Appointment No Status'); ?>

<?php $__env->startSection('header'); ?>
    <link href="<?php echo e(asset('css/3dbuttons.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Appointment
                    No Status
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Appointment No Status</span>
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
                <div class="row" style="height: 5px;">
                    <div class="col">
                        <div id="pendingStat">

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="col-12 text-center">
                            <button type="button" class="btn-info" onclick="location.reload();" style="padding: 6px 16px;"><span
                                    class="fa fa-refresh"></span>&nbsp;&nbsp;Refresh
                            </button>
                        </div>
                        <div class="col-12">
                            <table id="tableCoN"
                                   class="table table-bordered table-hover table-striped text-center dataTable">
                                <thead>
                                <tr>
                                    <th rowspan="2">
                                        Token No
                                    </th>
                                    <th rowspan="2">
                                        Appointment No
                                    </th>
                                    <th colspan="6">
                                        Status
                                    </th>
                                </tr>
                                <tr>
                                    <th>Registration</th>
                                    <th>Counselling</th>
                                    <th>Payment</th>
                                    <th>CXR</th>
                                    <th>Radiology</th>
                                    <th>Phlebotomy</th>
                                    <th>Consultation</th>
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
    <script src="<?php echo e(asset('js/progressbar.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('jsPages/AppointmentNoStatus.js')); ?>" type="text/javascript"></script>
    <script>
        var imgPathBlade = '<?php echo e(url('images/')); ?>';
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iom\resources\views/pages/AppointmentNoStatus.blade.php ENDPATH**/ ?>