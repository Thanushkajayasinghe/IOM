<?php $__env->startSection('title', 'Sputum Collection List'); ?>

<?php if($readWrite == 'true'): ?>
<?php $__env->startSection('header'); ?>
    <style>
        .rowClickable{
            cursor: pointer;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Sputum
                    Collection List</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Sputum Collection List</span>
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
                    <div class="card-header"></div>

                    <div class="card-body">

                        <div class="panel-body">
                            <!--Tab Content Starts Here-->
                            <div class="col-md-12 form-group">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card card-table" style="padding: 6px;">
                                            <table class="table table-bordered" id="tblSputumCollList">
                                                <thead>
                                                <tr>
                                                    <th style="background-color: #f98469"></th>
                                                    <th style="background-color: #f98469">Appointment No</th>
                                                    <th style="background-color: #f98469">Passport No</th>
                                                    <th style="background-color: #f98469">Barcode No</th>
                                                    <th style="background-color: #f98469">Full Name</th>
                                                    <th style="background-color: #f98469">Date Of Birth</th>
                                                    <th style="background-color: #f98469">Gender</th>
                                                </tr>
                                                </thead>
                                                <tbody id="appbody">
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

        </div>

    </div>
    <!-- /page content -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script>
        var urlPath = '<?php echo e(url('/')); ?>';
    </script>
    <script src=<?php echo e(asset('jsPages/SputumCollectionList.js')); ?> type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/SputumCollectionList.blade.php ENDPATH**/ ?>