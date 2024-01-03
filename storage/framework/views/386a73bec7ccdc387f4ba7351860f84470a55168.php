<?php $__env->startSection('title', 'Referral Approval'); ?>

<?php if($readWrite == 'true' || $readOnly == 'true'): ?>

<?php $__env->startSection('header'); ?>
    <style>
        .form-check {
            padding: 0px !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - REFERRAL
                    APPROVAL</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Referral Approval</span>
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
                            <div id="tableContainer" class="table-responsive">
                                <table class="table table-bordered table-hover table-striped text-center dataTablex"
                                       style="">
                                    <thead style="background-color: darkslategray;color: wheat;">
                                    <tr>
                                        <th></th>
                                        <th>Referred Date</th>
                                        <th>Registration No</th>
                                        <th>NSACP(HIV)</th>
                                        <th>AFC</th>
                                        <th>Malaria</th>
                                        <th>TB</th>
                                        <th></th>
                                        <th style="display: none;">serial</th>
                                    </tr>
                                    </thead>
                                    <tbody id="referralApprovalsTbody">

                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <br><br>
                        <div class="col-md-12 form-group text-center">
                            <?php if($readOnly != 'true'): ?>
                                <button id="btnApprove" class="btn btn-lg btn-success" style="width: 15rem"><span
                                            class="fa fa-check"></span>&nbsp;&nbsp;Approve
                                </button>
                            <?php endif; ?>
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
    <script src="<?php echo e(asset('jsPages/ReferralApprovals.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iom\resources\views/pages/ReferalApprovals.blade.php ENDPATH**/ ?>