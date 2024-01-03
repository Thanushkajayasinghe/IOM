<?php $__env->startSection('title', 'Blood Sample Receive - Malaria'); ?>

<?php if($readWrite == 'true' || $readOnly == 'true'): ?>

<?php $__env->startSection('content'); ?>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Blood Sample
                    Receive - Malaria</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="<?php echo e(url('/')); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Blood Sample Receive - Malaria</span>
                </div>
            </div>
        </div>
    </div>


    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <div class="content">
                <div class="card">
                    <div class="card-header">

                        <div class="col-md-12 form-group">
                            <div class="col-md-3">
                                <label><span class="fa fa-newspaper-o"></span>&nbsp;&nbsp;Barcode (Sample No)</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="barcode" name="barcode">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div id="tableContainer" class="table-responsive">
                                <table class="table table-bordered table-hover table-striped text-left"
                                       id="bloodSamRecForMalariaTbl">
                                    <thead style="background-color: darkslategray;color: wheat;">
                                    <tr>
                                        <th></th>
                                        <th style="display: none;"></th>
                                        <th nowrap>Barcode</th>
                                        <th nowrap>Collected Date</th>
                                        <th nowrap>Collected Time</th>
                                        <th nowrap>Age</th>
                                        <th nowrap>Gender</th>
                                        <th nowrap>Lab No</th>
                                    </tr>
                                    </thead>
                                    <tbody id="bloodSamRecForMalariaTbody">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Date</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control dppicker" id="date" name="date"
                                                   readonly disabled="">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><span class="fa fa-calendar"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label><span class="fa fa-clock-o"></span>&nbsp;&nbsp;Time</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="time" name="time" readonly
                                                   disabled="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br><br>
                        <div class="col-md-12 form-group text-center">
                            <?php if($readOnly != 'true'): ?>
                                <button class="btn btn-lg btn-success" id="receiveData" style="width: 15rem">Receive
                                </button>
                            <?php endif; ?>
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
    <script src="<?php echo e(asset('jsPages/BloodSampleReceiveMalaria.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/BloodSampleReceiveMalaria.blade.php ENDPATH**/ ?>