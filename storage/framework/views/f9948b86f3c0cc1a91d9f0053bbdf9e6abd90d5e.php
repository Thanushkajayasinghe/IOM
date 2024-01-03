<?php $__env->startSection('title', 'MHAC Queue Update'); ?>

<?php if($readWrite == 'true'): ?>

<?php $__env->startSection('header'); ?>
<link href="<?php echo e(asset('css/3dbuttons.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - MHAC Queue Update
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">MHAC Queue Update
                </span>
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

                    <div class="col-md-12 form-group text-center">
                        <div class="row justify-content-center">

                            <div class="col-md-2 form-group text-left">
                                <label>Floor:</label>
                                <select class="form-control" id="drpFloor">
                                    <option>--Select--</option>
                                    <option value="9">Floor 9</option>
                                    <option value="11">Floor 11</option>
                                </select>
                            </div>

                            <div class="col-md-1 form-group text-left">
                                <label>Country:</label>
                                <select class="form-control" id="drpCountry">
                                    <option value="0">--All--</option>
                                    <option>AU</option>
                                    <option>CA</option>
                                    <option>NZ</option>
                                    <option>UK</option>
                                    <option>OT</option>
                                </select>
                            </div>

                            <div class="col-md-2 form-group text-left">
                                <label>Token No Lookup:</label>
                                <input type="text" class="form-control" id="tokenNoLookUp" style="text-align: center;">
                            </div>                            

                        </div>
                    </div>

                    <div class="row justify-content-center form-group text-center">
                        <div class="col-2" style="display: inline-flex;">
                            <div
                                style="width: 25px;height: 23px;border: 1px solid; background: rgb(213, 222, 179);border-radius: 18px;padding-top: 1px;font-weight: bold;">
                                1
                            </div>&nbsp;&nbsp;Call Next
                        </div>

                        <div class="col-2" style="display: inline-flex;">
                            <div
                                style="width: 25px;height: 23px;border: 1px solid; background: rgb(213, 222, 179);border-radius: 18px;padding-top: 1px;font-weight: bold;">
                                2
                            </div>&nbsp;&nbsp;Recall
                        </div>

                        <div class="col-2" style="display: inline-flex;">
                            <div
                                style="width: 25px;height: 23px;border: 1px solid; background: rgb(213, 222, 179);border-radius: 18px;padding-top: 1px;font-weight: bold;">
                                3
                            </div>&nbsp;&nbsp;Not Available
                        </div>

                        <div class="col-2" style="display: inline-flex;">
                            <div
                                style="width: 25px;height: 23px;border: 1px solid; background: rgb(213, 222, 179);border-radius: 18px;padding-top: 1px;font-weight: bold;">
                                4
                            </div>&nbsp;&nbsp;Complete
                        </div>
                    </div>

                    <div class="col">

                        <div class="row">
                            <div id="tableContainer" class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped text-center"
                                        id="fultbl">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th nowrap>Passport No</th>
                                                <th nowrap>Appointment No</th>
                                                <th nowrap>Token No</th>
                                                <th nowrap>Registration</th>
                                                <th nowrap>Registration Counter</th>
                                                <th nowrap>Vital</th>
                                                <th nowrap>Vital Counter</th>
                                                <th nowrap>CXR</th>
                                                <th nowrap>CXR Counter</th>
                                                <th nowrap>Phlebotomy</th>
                                                <th nowrap>Phlebotomy Counter</th>
                                                <th nowrap>Consultation</th>
                                                <th nowrap>Consultation Counter</th>
                                            </tr>
                                        </thead>
                                        <tbody id="TBodyTempTable">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


            </div>
        </div>

    </div>


    <!------------------------->


</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!--JS files-->
<script src="<?php echo e(asset('plugins/notifications/noty.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/jquery.jstepper.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('jsPagesMhac/QueueUpdate.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php endif; ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pagesmhac/queueupdate.blade.php ENDPATH**/ ?>