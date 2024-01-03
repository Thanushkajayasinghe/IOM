<?php $__env->startSection('title', 'Counselling Details'); ?>

<?php $__env->startSection('header'); ?>
    <link href="<?php echo e(asset('css/3dbuttons.css')); ?>" rel="stylesheet" type="text/css">
    <style>
        .active-pink-textarea.md-form label.active {
            color: #f48fb1;
        }

        .pink-textarea textarea.md-textarea:focus:not([readonly]) {
            border-bottom: 1px solid #f48fb1;
            box-shadow: 0 1px 0 0 #f48fb1;
        }

        .pink-textarea.md-form .prefix.active {
            color: #f48fb1;
        }

        .active-amber-textarea.md-form label.active {
            color: #ffa000;
        }

        .amber-textarea textarea.md-textarea:focus:not([readonly]) {
            border-bottom: 1px solid #ffa000;
            box-shadow: 0 1px 0 0 #ffa000;
        }

        .amber-textarea.md-form .prefix.active {
            color: #ffa000;
        }

        .active-pink-textarea-2 textarea.md-textarea {
            border-bottom: 1px solid #f48fb1;
            box-shadow: 0 1px 0 0 #f48fb1;
        }

        .active-pink-textarea-2.md-form label.active {
            color: #f48fb1;
        }

        .active-pink-textarea-2.md-form label {
            color: #f48fb1;
        }

        .active-pink-textarea-2.md-form .prefix {
            color: #f48fb1;
        }

        .active-amber-textarea-2 textarea.md-textarea {
            border-bottom: 1px solid #ffa000;
            box-shadow: 0 1px 0 0 #ffa000;
        }

        .active-amber-textarea-2.md-form label.active {
            color: #ffa000;
        }

        .active-amber-textarea-2.md-form label {
            color: #ffa000;
        }

        .active-amber-textarea-2.md-form .prefix {
            color: #ffa000;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page content -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - COUNSELLING
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active"> COUNSELLING DETAILS
                </span>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">


                <!-- Dashboard content -->
                <div class="row">
                    <div class="col-xl-12">

                        <!-- Marketing campaigns -->
                        <div class="card" style="padding-left: 20px; padding-top: 20px;">

                            <div class="col-md-12 row">
                                <div class="col-md-5">
                                    <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Instructions</lable>
                                    <textarea class="form-control" id="Instructions"></textarea>
                                </div>
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-5">
                                    <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Counseling Script</lable>
                                    <textarea class="form-control" id="CounselingScript"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12 row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Check List</lable>
                                    <div class="table-responsive table-scrollable " style="margin-top: 10px;">
                                        <table class="table table-bordered table-striped">
                                            <thead
                                                    style="background-color: #002665; color: white; border-radius:10px 0 0 10px;">
                                            <tr style="line-height: 0.1cm;">
                                                <th style="text-align: center;">Description</th>
                                                <th style="text-align: center;">Y</th>
                                                <th style="text-align: center;">N</th>
                                            </tr>
                                            </thead>
                                            <tbody id="CheckListItems">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-5">
                                    <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Play Back Recoding
                                    </lable>
                                    <div class="table-responsive table-scrollable " style="margin-top: 10px;">
                                        <table class="table table-bordered table-striped">
                                            <thead
                                                    style="background-color: #002665; color: white; border-radius:10px 0 0 10px;">
                                            <tr style="line-height: 0.1cm;">
                                                <th style="text-align: center;">Description</th>
                                                <th style="text-align: center;"></th>
                                            </tr>
                                            </thead>
                                            <tbody id="addTabeleData">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Remark</lable>
                                    <textarea class="form-control" placeholder="Remark" id="Remark"></textarea>
                                </div>
                                <div class="col-md-2">
                                </div>
                                
                                    
                                    
                                
                            </div>


                            <div class="col-md-12 row" style="margin-top: 30px;">
                                <table class="table table-bordered table-striped text-center">
                                    <thead
                                            style="background-color: #087a19; color: white; border-radius:10px 0 0 10px;">
                                    <tr style="line-height: 0.1cm;">
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Appointment No</th>
                                        <th style="text-align: center;">Passport No</th>
                                        <th style="text-align: center;">Full Name</th>
                                        <th style="text-align: center;">Gender</th>
                                        <th style="text-align: center;">Country of Birth</th>
                                        <th style="text-align: center;">Tab No</th>
                                        <th style="text-align: center;"></th>
                                        <th style="text-align: center;"></th>
                                    </tr>
                                    </thead>

                                    <tbody id="membertbdy">
                                    </tbody>

                                </table>
                            </div>

                            <div class="col-md-12 row" style="margin-top: 30px;">
                                <div class="col-md-12">
                                    <label><b>User Signature</b></label><br>
                                </div>
                                <div class="col-md-12 tex">
                                    <img src="" id="signimg" width="30%" height="120px;"
                                         style="border: 1px solid black">
                                </div>
                            </div>


                            <div class="col-md-12 row justify-content-center" style="margin-top: 10px;">
                                
                                    
                                        
                                        
                                    
                                
                                
                                    
                                            
                                        
                                        
                                    
                                
                                <div class="col-md-3 form-group">
                                    <button id="sosButton" type="button"
                                            class="btn-block btn-brown btn-lg btn3d">
                                        <sapn class="icon-bell-check">&nbsp;&nbsp;&nbsp;</sapn>
                                        Notify Floor Manager
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /dashboard content -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
    <script>
        var path = '<?php echo e(url('/tempFileUpload')); ?>';
        var pathAudio = '<?php echo e(url('/tempFileUpload/')); ?>';
        const usergroup = "<?php echo e(Session::get('userGroup')); ?>";
    </script>
    <script src=<?php echo e(asset('jsPages/CounsellingDetails.js')); ?> type="text/javascript"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iom\resources\views/pages/CounsellingDetails.blade.php ENDPATH**/ ?>