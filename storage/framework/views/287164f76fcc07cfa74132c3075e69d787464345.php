<?php $__env->startSection('title', 'Barcode List Summary Report'); ?>

<?php $__env->startSection('header'); ?>
    <style>
        .dataTables_wrapper {
            width: 95% !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>Barcode List
                    Summary Report
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="<?php echo e(url('/home')); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Barcode List Summary Report</span>
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

                        <div class="row justify-content-center form-group">
                            <div class="col-sm-3">
                                <label>Date From: </label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" readonly id="barcodeDateFrom">
                                    <div class="input-group-append" for="barcodeDate">
                                        <div class="input-group-text"><span class="fa fa-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label>Date To: </label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepicker" readonly id="barcodeDateTo">
                                    <div class="input-group-append" for="barcodeDate">
                                        <div class="input-group-text"><span class="fa fa-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <label style="visibility: hidden;">Date To: </label>
                                <button type="button" id="btnSearch" class="btn btn-warning btn-sm"><span class="fa fa-search"></span></button>
                            </div>
                        </div>

                        <div class="row justify-content-center" id="rtyu">






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
    <script src="<?php echo e(asset('jsPages/BarcodeListSummary.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/BarcodeListSummary.blade.php ENDPATH**/ ?>