<?php $__env->startSection('title', 'Refer To NSACP -( HIV ELISA)'); ?>

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
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Refer To
                    NSACP -( HIV )
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="<?php echo e(url('/')); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Refer To NSACP -( HIV )
                </span>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
                <div class="card">
                    <div class="card-header">
                        <div id="validateDiv">
                            <div class="col">

                                <div class="row form-group">
                                    <div class="col-md-12 row">
                                        <div class="col-md-2">
                                            <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Registration
                                                No</label>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control selectTo" id="regNo" name="regNo"
                                                    validate="true"
                                                    error="* Registration No required." onchange="checkValio();">
                                                
                                                
                                                
                                            </select>
                                            <div class="text-danger error"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12 row">
                                        <div class="col-md-2">
                                            <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Passport
                                                No</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="passNo" name="passNo"
                                                   validate="true" match="^.+$" error="* Passport No required."
                                                   onkeyup="checkValio();"/>
                                        </div>
                                        <div class="text-danger error"></div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12 row">
                                        <div class="col-md-2">
                                            <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Refered</label>
                                        </div>
                                        <div class="col-md-3">

                                            <div class="input-group">
                                                <input type="text" class="form-control dppicker" name="refered"
                                                       id='refered'>
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><span class="fa fa-calendar"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 row">
                                        <div class="col-md-2">
                                            <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Remark</label>
                                        </div>
                                        <div class="col-md-5">
                                    <textarea class="form-control" rows="3" id="remark" name="remark">
                                    </textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br><br>
                            <div class="col-md-12 form-group text-center">
                                <?php if($readOnly != 'true'): ?>
                                    <button id="btnSaveNSACP" class="btn btn-lg btn-success" style="width: 15rem">Save
                                    </button>
                                <?php endif; ?>
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
    <script src="<?php echo e(asset('plugins/jqueryUI/jquery-ui-timepicker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('jsPages/ReferToNSACP.js')); ?>" type="text/javascript"></script>

    <script>
        function checkValio() {
            validate('#validateDiv');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php endif; ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/ReferToNSACPhivElisa.blade.php ENDPATH**/ ?>