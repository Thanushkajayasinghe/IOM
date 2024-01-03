<?php $__env->startSection('title', 'Applicant On Site Payment'); ?> 

<?php if($readWrite == 'true' || $readOnly == 'true'): ?>

<?php $__env->startSection('header'); ?>
<link href="<?php echo e(asset('css/3dbuttons.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>Applicant On Site
                Payment</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Applicant On Site Payment</span>
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
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row form-group">
                                    <div class="col-md-5">
                                        <label>Passport No.</label>
                                        <input type="text" class="form-control" name="PassportNo" id="PassportNo" value="">
                                    </div>
                                    <div class="col-md-5">
                                        <label>Appointment No.</label>
                                        <input type="text" class="form-control" name="AppointmentNo" id="AppointmentNo" value="">
                                    </div>
                                    <div class="col-md-2" style="margin-top: 2%;">
                                        <button type="button" class="btn-block btn-warning btn-lg btn3d" id="Verify">
                                            <span class="fa fa-search"></span>&nbsp;Search
                                        </button>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label>Name In Full</label>
                                        <input type="text" class="form-control" name="NameInFull" id="NameInFull" value="">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Appointment Date</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control dppicker" name="AppointmentDate" id="AppointmentDate" readonly value="">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><span class="fa fa-calendar"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-2">
                                        <label>Fee</label>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rs.</div>
                                            </div>
                                            <input id="pc_fee" type="text" class="form-control" readonly disabled="true">
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-2">
                                        <label>Payment Mode</label>
                                    </div>
                                    <div class="col-md-3">
                                        <select id="pc_pay_mode" class="form-control">
                                            <option value="">Select</option>
                                            <option selected="selected" value="cash">Cash</option>
                                            <option value="card">Card</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-7">
                                        <label>Receipt No</label>
                                        <input id="pc_receipt_no" type="text" class="form-control" readonly disabled="true">
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-5">
                                <label><b>Family Members List</b></label>
                                <table class="table table-bordered table-hover table-striped text-center" id="familyMemTable" style="">
                                    <thead style="background-color: darkslategray;color: wheat;">
                                        <tr>
                                            <th nowrap>Name</th>
                                            <th nowrap>Passport Number</th>
                                            <th nowrap>Amount (Rs.)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="addTabeleData">
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <div class="row justify-content-center">
                            <?php if($readOnly != 'true'): ?>
                            <div class="col-md-2">
                                <button type="button" class="btn-block btn-success btn-lg btn3d" id="save">
                                    <span class="fa fa-reply"></span>&nbsp;Submit
                                </button>
                            </div>
                            <?php endif; ?>
                            <div class="col-md-2">
                                <button type="button" class="btn-block btn-info btn-lg btn3d" id="btncler">
                                    <span class="fa fa-refresh"></span>&nbsp;Clear
                                </button>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
    <!-- /content area -->


</div>
<!-- /main content -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    var path = "<?php echo e(url('/')); ?>";
</script>
<script src=<?php echo e(asset('jsPages/ApplicantOnSitePayment.js')); ?> type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php endif; ?> 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/ApplicantOnSitePayment.blade.php ENDPATH**/ ?>