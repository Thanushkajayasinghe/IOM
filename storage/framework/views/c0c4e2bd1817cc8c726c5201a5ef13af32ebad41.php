<?php $__env->startSection('title', 'Phlebotomy Sample Collection'); ?>

<?php $__env->startSection('header'); ?>
    <link href="<?php echo e(asset('css/3dbuttons.css')); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - VERIFY
                    APPLICANT REPORT / BARCODE RE-PRINT
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="<?php echo e(url('/')); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active"> VERIFY APPLICANT REPORT / BARCODE RE-PRINT
                </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="page-content pt-0">

        <div class="content-wrapper" style="padding: 0 5px;">

            <div class="content">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">

                        <div class="row justify-content-md-center">
                            <div class="col-md-12 form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="txtPassportNo"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                            Passport No: </label>
                                        <div class="form-group">
                                            <input type="text" id="txtPassportNo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="txtAppointmentNo"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                            Appointment No: </label>
                                        <div class="form-group">
                                            <input type="text" id="txtAppointmentNo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="txtBarcode"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                            Barcode : </label>
                                        <div class="form-group">
                                            <input type="text" id="txtBarcode" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 form-group" style="text-align: center;">
                                <button id="btnSearch" type="button" class="btn btn-warning legitRipple"
                                        style="margin-top: 5px;">
                                    <span class="fa fa-search"></span>&nbsp;Search
                                </button>
                                <button id="btnClear" type="button" class="btn btn-primary legitRipple"
                                        style="margin-top: 5px;">
                                    <span class="fa fa-refresh"></span>&nbsp;Clear
                                </button>
                            </div>
                            <div class="col-md-12 form-group" style="text-align: center;">
                                <div id="tableContainer" class="table-responsive" style="display: none;">
                                    <table class="table table-bordered table-hover table-striped text-center dataTablex"
                                           style="">
                                        <thead style="background-color: darkslategray;color: wheat;">
                                        <tr>
                                            <th></th>
                                            <th>Passport No</th>
                                            <th>Appointment No</th>
                                            <th>Barcode</th>
                                            <th>Reprint Barcode</th>
                                        </tr>
                                        </thead>
                                        <tbody id="phlebotomySearchTbody">
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
    <!-- /page content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        var usergroupname = ("<?php echo e(Session::get('GroupName')); ?>").replace('Phlebotomy Counter', '');
        $('#curCounter').text(usergroupname)
    </script>
    <script src=<?php echo e(asset('jsPages/PhlebotomySearch.js')); ?> type="text/javascript"></script>
    <script>
        $('#noshow').iziModal({
            headerColor: '#26A69A',
            width: '90%',
            overlayColor: 'rgba(0, 0, 0, 0.5)',
            fullscreen: true,
            transitionIn: 'fadeInUp',
            transitionOut: 'fadeOutDown'
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/PhlebotomySearch.blade.php ENDPATH**/ ?>