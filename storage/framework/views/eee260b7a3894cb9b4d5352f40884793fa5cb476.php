<?php $__env->startSection('title', 'Payment Setting'); ?>

<?php if($readWrite == 'true'): ?>

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page content -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Payment Setting
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="<?php echo e(url('/')); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active"> Payment Setting
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


                <!-- Dashboard content -->
                <div class="row">
                    <div class="col-xl-12">

                        <!-- Marketing campaigns -->
                        <div class="card" style="padding-left: 20px;">


                            <div class="col-md-12 form-group text-center" style="margin-top: 20px;">
                            </div>



                            <div id="Mancon">
                                <div id="frmvali">
                                    <div class="col-xl-12 col-md-12 row form-group">
                                        <div class="col-xl-3 col-md-3">
                                            <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Effective Date:
                                            </lable>
                                            <div class="col-12">
                                                <input id="txtEffectiveDate" type="text" readonly class="form-control dppicker">
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-3">
                                            <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Payment Amount for each person:
                                            </lable>
                                            <div class="col-12 input-group">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"
                                                         style="border: 1px solid rgb(221, 221, 221); padding: 0.4375rem 0.875rem;">
                                                        Rs.
                                                    </div>
                                                </div>
                                                <input type="number" class="form-control" id="txtPayment" placeholder="0.00" required name="price"
                                                       min="0"  step="0.01" title="Currency">
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>


                            <div class="col-xl-12 col-md-12 row form-group">
                                <div class="col" style="margin-top: 20px; text-align: center;">
                                    <button type="button" id="btnSave" class="btn btn-primary"><span
                                                class="fa fa-send"></span>&nbsp;Save
                                    </button>
                                    <button type="button" id="loadCurrentSettings" class="btn btn-warning"><span
                                                class="fa fa-cogs"></span>&nbsp;Load Current Settings
                                    </button>
                                    <button type="button" id="btnclear" class="btn btn-info"><span
                                                class="fa fa-flash"></span>&nbsp;Clear
                                    </button>

                                </div>
                            </div>

                        </div>


                    </div>
                </div>
                <!-- /dashboard content -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!--JS files-->
    <script src="<?php echo e(asset('jsPages/PaymentSetting.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/paymentSetting.blade.php ENDPATH**/ ?>