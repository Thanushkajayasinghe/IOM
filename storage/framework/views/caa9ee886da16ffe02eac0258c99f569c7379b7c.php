<?php $__env->startSection('title', 'Malaria Test Result'); ?>

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
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Malaria Test
                    Result</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Malaria Test Result</span>
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

                        <div id="PRegvali">
                            <div class="col-md-12 form-group">
                                <div class="row form-group">
                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;Lab No</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="labno" match="^.+$"
                                                       validate="true" error="* Lab No required">
                                            </div>
                                            <div class="text-danger error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;Result</label>
                                        <div class="form-group">
                                            <select class="form-control" id="rslt">
                                                <option value="">Select</option>
                                                <option value="Positive">Positive</option>
                                                <option value="Negative">Negative</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;Date</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" readonly class="form-control dppicker" id="date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;Time</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" readonly class="form-control timePickerx" id="time">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label>&nbsp;&nbsp;Remark</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="remark">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br><br>
                            <div class="col-md-12 form-group text-center">
                                <?php if($readOnly != 'true'): ?>
                                    <button class="btn btn-lg btn-success" id="btnsave" style="width: 15rem">Save
                                    </button>
                                <?php endif; ?>
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
    <script src="<?php echo e(asset('jsPages/MalariaTestResult.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php endif; ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/MalariaTestResult.blade.php ENDPATH**/ ?>