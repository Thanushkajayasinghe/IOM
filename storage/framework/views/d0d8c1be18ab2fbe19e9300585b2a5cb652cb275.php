<?php $__env->startSection('title', 'Floor Manager'); ?>

<?php if($readWrite == 'true' || $readOnly == 'true'): ?>

<?php $__env->startSection('header'); ?>
    <link href="<?php echo e(asset('css/3dbuttons.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - FLOOR MANAGER
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Floor Manager</span>
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
                    <div class="card-header">
                        <div id="valifrm">

                            <div class="col-md-12 form-group">
                                <div class="row form-group">

                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;Token No :</label>
                                        <select id="drpTokenNo" class="form-control" validate="true"
                                                error="* This field required">
                                            <option>Select</option>
                                        </select>
                                        <div class="text-danger error" style="display: block;"></div>
                                    </div>

                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;Current Queue :</label>
                                        <input id="txtCurrentQueue" type="text" class="form-control" readonly
                                               style="pointer-events: none; background-color: #eee;">
                                    </div>

                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;Change Priority :</label>
                                        <select id="drpChangePriority" class="form-control" validate="true"
                                                error="* This field required">
                                            <option disabled='disabled' selected='selected' value="">Select</option>
                                            <option>Regular</option>
                                            <option>VIP</option>
                                        </select>
                                        <div class="text-danger error" style="display: block;"></div>
                                    </div>

                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;Change Queue :</label>
                                        <select id="drpQueue" class="form-control" validate="true"
                                                error="* This field required">
                                        </select>
                                        <div class="text-danger error" style="display: block;"></div>
                                    </div>

                                </div>
                            </div>

                            <br><br>
                            <div class="col-md-12 form-group text-center">
                                <center>
                                    <input type="hidden" name="appno" id="appno" value="">
                                    <?php if($readOnly != 'true'): ?>
                                        <div class="col-md-4" style="margin-bottom: 15px;">
                                            <button type="button" id="btnSave"
                                                    class="btn-block btn-lg btn-success btn3d">
                                        <span class="fa fa-floppy-o"
                                              style="font-size: 1.5rem;display: block;position: relative;top: 4px;">&nbsp;Save</span>
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                    <div class="col-md-4" style="margin-bottom: 15px;">
                                        <button type="button" id="btnCancel" class="btn-block btn-lg btn-warning btn3d">
                                            <span class="fa fa-refresh" style="font-size: 1.5rem;display: block;">&nbsp;Clear</span>
                                        </button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" id="btnCancelApp"
                                                class="btn-block btn-lg btn-danger btn3d">
                                        <span class="fa fa-close"
                                              style="font-size: 1.5rem;display: block;">&nbsp;Cancel Token</span>
                                        </button>
                                    </div>
                                </center>
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
    <script src="http://code.responsivevoice.org/responsivevoice.js"></script>
    <script src="<?php echo e(asset('jsPages/FloorManager.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iom\resources\views/pages/FloorManager.blade.php ENDPATH**/ ?>