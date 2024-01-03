<?php $__env->startSection('title', 'IOM - Sample Collections'); ?>
<?php if($readWrite == 'true' || $readOnly == 'true'): ?>

<?php $__env->startSection('content'); ?>
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - SAMPLE
                    COLLECTIONS
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">
                        SAMPLE COLLECTIONS
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


                        <div class="col">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="col-md-12 form-group">
                                        <div class="form-group">
                                            <div class="col-md-4 table table-responsive">
                                                <table id="registration" class="table-bordered">
                                                    <thead>
                                                    <th style="background-color: #f98469">Passport No's
                                                        - <?php echo date('Y-m-d');?></th>
                                                    </thead>
                                                    <tbody id="sampleRow">

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-4">
                                                <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Registration
                                                    No</label>
                                                <div class="form-group">
                                                    <input type="text" name='AppointmentNo' id='AppointmentNo'
                                                           class="form-control" disabled="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Passport
                                                    No</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="PassportNo"
                                                           id='PassportNo' disabled="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label><span
                                                        class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Verify</label>
                                                <div class="form-group">
                                                    <select id="verify" class="form-control">
                                                        <option value="0">Please Verify</option>
                                                        <option value="1">OK</option>
                                                        <option value="2">Not OK</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                                <div class="col-md-2">
                                    <div class="col-md-12 form-group">
                                        <div class="col-md-12 form-group">
                                            <img style="border: 2px solid black;width: 200px;"
                                                 src=<?php echo e(asset('images/user_icon.png')); ?> >
                                        </div>
                                        <div class="col-md-12">
                                            <img style="border: 2px solid black;width: 200px;"
                                                 src=<?php echo e(asset('images/Fingerprint.jpg')); ?> >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-12 form-group text-center">
                        <a id="verifybutton">
                            <?php if($readOnly != 'true'): ?>
                                <button class="btn btn-primary btn-lg"><span class="fa fa-user-secret"></span>&nbsp;&nbsp;VERIFY
                                </button>
                            <?php endif; ?>
                        </a>
                        
                    </div>
                    <!-- <div id="gggg"> asasasasa</div> -->

                </div>
            </div>

        </div>


        <!------------------------->


    </div>
    </div>
    <!-- /page content -->
    <!-- /page content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src=<?php echo e(asset('jsPages/SampleCollection.js')); ?> type="text/javascript"></script>
    <script type="text/javascript">


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

<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/SampleCollection.blade.php ENDPATH**/ ?>