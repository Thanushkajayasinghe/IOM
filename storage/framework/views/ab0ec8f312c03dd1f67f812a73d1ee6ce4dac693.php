<?php $__env->startSection('title', 'TB'); ?>
<?php if($readWrite == 'true'): ?>

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Malaria
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Malaria</span>
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
                                <div class="col-md-3 ">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Barcode No: </label>
                                    <input type="text" class="form-control" id="txtBarcodeNo">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Passport No: </label>
                                    <input type="text" class="form-control" readonly id="txtPassportNo"
                                           style="pointer-events: none; background-color: #eee;">
                                </div>
                                <div class="col-md-3 ">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Refereed Date: </label>
                                    <input type="text" class="form-control dppicker" id="txtRefereedDate">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Test Date: </label>
                                    <input type="text" class="form-control dppicker" id="txtTestDate">
                                </div>
                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Test: </label>
                                    <select id="drpTest" class="form-control">
                                        <option disabled selected value="">-- Select --</option>
                                        <option>Gene Xpert</option>
                                        <option>AFB</option>
                                        <option>Culture - Liquid</option>
                                        <option>Culture - Solid</option>
                                        <option>Drug Sensitivity</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Test Result: </label>
                                    <select id="drpTestResult" class="form-control">
                                        <option disabled selected value="">-- Select --</option>
                                        <option>Negative</option>
                                        <option>Positive</option>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <label style="visibility: hidden;"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Teuy:
                                    </label>
                                    <button id="btnAddToGrid" class="btn btn-primary btn-sm" type="button"><span
                                            class="fa fa-plus"></span></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead style="background-color: darkslategray; color: wheat;">
                                        <tr>
                                            <th>Test Date</th>
                                            <th>Test</th>
                                            <th>Result</th>
                                        </tr>
                                        </thead>
                                        <tbody id="testAddTbody">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="text-center">
                                <button type="button" id="btnSave" class="btn btn-success"><span
                                        class="fa fa-floppy-o"></span>&nbsp;Save
                                </button>
                            </div>
                        </div>


                        <div class="col-md-12 form-group">
                            <div class="row">
                                <h3>History</h3>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead style="background-color: darkslategray; color: wheat;">
                                        <tr>
                                            <th>Test Date</th>
                                            <th>Test</th>
                                            <th>Result</th>
                                        </tr>
                                        </thead>
                                        <tbody id="testAddTbodyHistory">

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


<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script src=<?php echo e(asset('jsPages/MalariaInter.js')); ?> type="text/javascript"></script>
    <script type="text/javascript">
        var imgPathBlade = '<?php echo e(url('images/')); ?>';
    </script>
<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/MalariaInter.blade.php ENDPATH**/ ?>