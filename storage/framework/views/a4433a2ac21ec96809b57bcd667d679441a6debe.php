<?php $__env->startSection('title', 'Appointment Cancel/Re Schedule'); ?>

<?php if($readWrite == 'true' || $readOnly == 'true'): ?>

<?php $__env->startSection('header'); ?>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Blood Sample
                    Dispatch For Malaria</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Blood Sample Dispatch For Malaria</span>
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
                            <div class="col-md-3">
                                <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Collected Date</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control dppicker" readonly id="CollectedDate">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><span class="fa fa-calendar"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3" style="margin-top: 20px;">
                                <label><span class="fa fa-low-vision"></span>&nbsp;&nbsp;Barcode No</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="BC">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><span class="fa fa-search"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 form-group">
                            <div id="tableContainer" class="table-responsive"
                                 style="max-height: 500px; overflow: auto;">
                                <table class="table table-bordered table-hover table-striped text-center"
                                       id="familyMemTable" style="">
                                    <thead style="background-color: darkslategray;color: wheat;">
                                    <tr>
                                        <th style="display: none"></th>
                                        <th></th>
                                        <th nowrap>Appointment No</th>
                                        <th nowrap>Passport No</th>
                                        <th nowrap>Barcode(Sample No)</th>
                                        <th nowrap>
                                            
                                            <div class="form-check">
                                                <input class='form-control userPerSelect cb-element' name='tblchk'
                                                       id='userPerSelectIdAll' type='checkbox'><label
                                                        for='userPerSelectIdAll' style='padding: 7px 12px;'></label>
                                            </div>
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody id="familyMemTBody">


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
                                            <input type="text" id="appdroveDate" class="form-control dppicker" readonly
                                                   disabled="">
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
                                            <input type="text" id="appdroveTime" class="form-control" readonly
                                                   disabled="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br><br>
                        <div class="col-md-12 form-group text-center">
                            <?php if($readOnly != 'true'): ?>
                                <button class="btn btn-lg btn-success" style="width: 15rem" id="btnDispatch">Dispatch
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
    <script src="<?php echo e(asset('plugins/fullCalender/moment.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/notifications/noty.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/jqueryUI/jquery-ui-timepicker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('jsPages/BloodSampleDispatchForMalaria.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/BloodSampleDispatchForMalaria.blade.php ENDPATH**/ ?>