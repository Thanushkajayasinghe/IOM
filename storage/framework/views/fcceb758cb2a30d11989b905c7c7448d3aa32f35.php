<?php $__env->startSection('title', 'DIE'); ?>
<?php if($readWrite == 'true'): ?>

<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - DIE
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">DIE</span>
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
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Passport No: </label>
                                    <select id="drpPassportNo" class="form-control selectTo"></select>
                                </div>

                                <div class="col-md-3 ">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Appointment No: </label>
                                    <select id="drpAppointmentNo" class="form-control selectTo"></select>
                                </div>

                                <div class="col-md-1">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Program: </label>
                                    <select id="drpProgram" class="form-control">
                                        <option selected value="">-- All --</option>
                                        <option>TB</option>
                                        <option>HIV</option>
                                        <option>FILARIA</option>
                                        <option>MALARIA</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Date From: </label>
                                    <input type="text" class="form-control dppicker " id="txtDateFrom">
                                </div>

                                <div class="col-md-2">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Date To: </label>
                                    <input type="text" class="form-control dppicker " id="txtDateTo">
                                </div>

                                <div class="col-md-1" style="position: relative;">
                                    <button type="button" id="btnSearch" class="btn btn-warning btn-sm"
                                            style="position: absolute;bottom: 4px;"><span
                                            class="fa fa-search"></span></button>
                                    <button type="button" id="btnRefresh" class="btn btn-info btn-sm"
                                            style="position: absolute;bottom: 4px;right: 0;"><span
                                            class="fa fa-refresh"></span></button>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped text-center">
                                        <thead style="background-color: darkslategray; color: wheat;">
                                        <tr>
                                            <th>Barcode No</th>
                                            <th>Passport No</th>
                                            <th>Program</th>
                                            <th>Result Date</th>
                                            <th style="display: none">Id</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id="testLoadingTbody">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;First Name: </label>
                                    <input type="text" class="form-control" id="txtFirstName"
                                           style="pointer-events: none;background-color: #eee;"/>
                                </div>

                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Last Name: </label>
                                    <input type="text" class="form-control" id="txtLastName"
                                           style="pointer-events: none;background-color: #eee;"/>
                                </div>

                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Age: </label>
                                    <input type="text" class="form-control" id="txtAge"
                                           style="pointer-events: none;background-color: #eee;"/>
                                </div>

                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Gender: </label>
                                    <input type="text" class="form-control" id="txtGender"
                                           style="pointer-events: none;background-color: #eee;"/>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Country Of Origin:
                                    </label>
                                    <input type="text" class="form-control" id="txtCountryOfOrigin"
                                           style="pointer-events: none;background-color: #eee;"/>
                                </div>

                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Address (Sri Lanka):
                                    </label>
                                    <input type="text" class="form-control" id="txtAddress"
                                           style="pointer-events: none;background-color: #eee;"/>
                                </div>

                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Sponsor Name: </label>
                                    <input type="text" class="form-control" id="txtSponsorName"
                                           style="pointer-events: none;background-color: #eee;"/>
                                </div>

                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Sponsor Address: </label>
                                    <input type="text" class="form-control" id="txtSponsorAddress"
                                           style="pointer-events: none;background-color: #eee;"/>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;X-Ray: </label>
                                    <input type="text" class="form-control" id="txtXray"
                                           style="pointer-events: none;background-color: #eee;"/>
                                </div>

                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Gene Xpert: </label>
                                    <input type="text" class="form-control" id="txtGeneXpert"
                                           style="pointer-events: none;background-color: #eee;"/>
                                </div>

                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Sputum Collected:
                                    </label>
                                    <input type="text" class="form-control" id="txtSutumCollected"
                                           style="pointer-events: none;background-color: #eee;"/>
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
    <script src=<?php echo e(asset('jsPages/DieViewDet.js')); ?> type="text/javascript"></script>
    <script type="text/javascript">
        var imgPathBlade = '<?php echo e(url('images/')); ?>';
    </script>
<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/DieViewDet.blade.php ENDPATH**/ ?>