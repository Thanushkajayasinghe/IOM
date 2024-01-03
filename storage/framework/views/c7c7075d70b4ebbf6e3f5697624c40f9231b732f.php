<?php $__env->startSection('title', 'DIE'); ?>
<?php if($readWrite == 'true'): ?>

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Token Average Time
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Token Average Time</span>
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

                <div class="card border-y-2 border-top-slate border-bottom-slate rounded-0">
                    <div class="card-header">
                        <h6 class="card-title"><span class="font-weight-semibold"></span></h6>
                    </div>
                    <div class="card-body">

                        <!-- Content area -->
                        <div class="col-md-12 form-group">
                            <div class="row">


                                <div class="col-md-2">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Date From: </label>
                                    <input type="text" class="form-control dppicker " readonly id="txtDateFrom">
                                </div>



                                <div class="col-md-1" style="position: relative;">
                                    <button type="button" id="btnSearch" class="btn btn-warning btn-sm"
                                            style="position: absolute;bottom: 4px;"><span
                                            class="fa fa-search"></span></button>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="table-responsive">
                                    <table id="Table" class="table table-bordered table-hover table-striped text-center">
                                                                   <thead style="background-color: darkslategray; color: wheat;">
                                        <tr>
                                            <th style="display: none;"></th>
                                            <th>Token No</th>
                                            <th>Passport No</th>
                                            <th>Appointment No</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Time Differnce Minutes</th>
                                            <th>Time Differnce Hours</th>
                                        </tr>
                                        </thead>
                                        <tbody id="tableTimeDiff">

                                        </tbody>
                                        <tfoot>
                                            <td colspan="8">
                                                <table  style="color: #150fff; text-align: center; font-size: 14px; border: #060bff solid 2px;">
                                                    <tr >
                                                        <td rowspan="2">Token Average Time Difference</td>
                                                        <td rowspan="2">=</td>
                                                        <td>Total TimeDifference</td>
                                                        <td rowspan="2">=</td>
                                                        <td><label id="totTime">0.0</label></td>
                                                        <td rowspan="2">=</td>
                                                        <td rowspan="2"><lable id="answer">0.0</lable></td>
                                                        <td rowspan="2" style="border-left: #060bff 1px solid;"><lable id="answer2">0.0</lable></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="border-top: solid 1px black;">Token Count</td>
                                                        <td style="border-top: solid 1px black;"><lable id="Count">0</lable></td>

                                                    </tr>
                                                </table>
                                            </td>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>







                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src=<?php echo e(asset('jsPages/TimeDifference.js')); ?> type="text/javascript"></script>
    <script type="text/javascript">
        var imgPathBlade = '<?php echo e(url('images/')); ?>';
    </script>
<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/TokenAverageTime.blade.php ENDPATH**/ ?>