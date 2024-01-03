<?php $__env->startSection('title', 'Counselling'); ?>

<?php if($readWrite == 'true'): ?>

<?php $__env->startSection('header'); ?>

    <link href="<?php echo e(asset('css/3dbuttons.css')); ?>" rel="stylesheet" type="text/css">
    <style>
        .btn-arrow-right,
        .btn-arrow-left {
            position: relative;
            padding-left: 18px;
            padding-right: 18px;
        }

        .btn-arrow-right {
            padding-left: 36px;
        }

        .btn-arrow-left {
            padding-right: 36px;
        }

        .btn-arrow-right:before,
        .btn-arrow-right:after,
        .btn-arrow-left:before,
        .btn-arrow-left:after { /* make two squares (before and after), looking similar to the button */
            content: "";
            position: absolute;
            top: 5px; /* move it down because of rounded corners */
            width: 24px; /* same as height */
            height: 25px; /* button_outer_height / sqrt(2) */
            background: inherit; /* use parent background */
            border: inherit; /* use parent border */
            border-left-color: transparent; /* hide left border */
            border-bottom-color: transparent; /* hide bottom border */
            border-radius: 0px 4px 0px 0px; /* round arrow corner, the shorthand property doesn't accept "inherit" so it is set to 4px */
            -webkit-border-radius: 0px 4px 0px 0px;
            -moz-border-radius: 0px 4px 0px 0px;
        }

        .btn-arrow-right:before,
        .btn-arrow-right:after {
            transform: rotate(45deg); /* rotate right arrow squares 45 deg to point right */
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
        }

        .btn-arrow-left:before,
        .btn-arrow-left:after {
            transform: rotate(225deg); /* rotate left arrow squares 225 deg to point left */
            -webkit-transform: rotate(225deg);
            -moz-transform: rotate(225deg);
            -o-transform: rotate(225deg);
            -ms-transform: rotate(225deg);
        }

        .btn-arrow-right:before,
        .btn-arrow-left:before { /* align the "before" square to the left */
            left: -13px;
        }

        .btn-arrow-right:after,
        .btn-arrow-left:after { /* align the "after" square to the right */
            right: -13px;
        }

        .btn-arrow-right:after,
        .btn-arrow-left:before { /* bring arrow pointers to front */
            z-index: 1;
        }

        .btn-arrow-right:before,
        .btn-arrow-left:after { /* hide arrow tails background */
            background-color: white;
        }

        .btn-arrow-right.legitRipple {
            overflow: unset;
            z-index: unset;
        }

        .btn-arrow-left.legitRipple {
            overflow: unset;
            z-index: unset;
        }

        .sed:after {
            content: "";
            background: #ffffff80;
            position: absolute;
            display: block;
            width: 80%;
            top: 0;
            bottom: 0;
        }

        .qwe img {
            position: absolute;
            top: 25%;
            left: 18%;
            width: 50%;
            height: 50%;
        }

        #noshow {
            width: 40% !important;
        }

        .swingimage {
            clip-path: polygon(3% 0, 7% 1%, 11% 0%, 16% 2%, 20% 0, 23% 2%, 28% 2%, 32% 1%, 35% 1%, 39% 3%, 41% 1%, 45% 0%, 47% 2%, 50% 2%, 53% 0, 58% 2%, 60% 2%, 63% 1%, 65% 0%, 67% 2%, 69% 2%, 73% 1%, 76% 1%, 79% 0, 82% 1%, 85% 0, 87% 1%, 89% 0, 92% 1%, 96% 0, 98% 3%, 99% 3%, 99% 6%, 100% 11%, 98% 15%, 100% 21%, 99% 28%, 100% 32%, 99% 35%, 99% 40%, 100% 43%, 99% 48%, 100% 53%, 100% 57%, 99% 60%, 100% 64%, 100% 68%, 99% 72%, 100% 75%, 100% 79%, 99% 83%, 100% 86%, 100% 90%, 99% 94%, 99% 98%, 95% 99%, 92% 99%, 89% 100%, 86% 99%, 83% 100%, 77% 99%, 72% 100%, 66% 98%, 62% 100%, 59% 99%, 54% 99%, 49% 100%, 46% 98%, 43% 100%, 40% 98%, 38% 100%, 35% 99%, 31% 100%, 28% 99%, 25% 99%, 22% 100%, 19% 99%, 16% 100%, 13% 99%, 10% 99%, 7% 100%, 4% 99%, 2% 97%, 1% 97%, 0% 94%, 1% 89%, 0% 84%, 1% 81%, 0 76%, 0 71%, 1% 66%, 0% 64%, 0% 61%, 0% 59%, 1% 54%, 0% 49%, 1% 45%, 0% 40%, 1% 37%, 0% 34%, 1% 29%, 0% 23%, 2% 20%, 1% 17%, 1% 13%, 0 10%, 1% 6%, 1% 3%);
            background-image: linear-gradient(#bdc3a0 33%, #d1b248 66%);
            padding: 2px;
        }

        .token-img {
            cursor: pointer;
        }

        .swal2-container {
            z-index: 99999 !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page content -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">

            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">

                </div>
            </div>
        </div>
    </div>


    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper" style="padding: 0 5px;">

            <div class="row justify-content-center">
                <div class="col-sm-5">
                    <div class="card border-top-3 border-top-warning border-bottom-3 border-bottom-warning rounded-0">
                        <div class="card-header" style="padding: 8px;">
                            <h2 class="card-title text-center" style="font-size: 2rem;">CURRENT TOKEN/S</h2>
                        </div>
                        <div class="card-body" style="padding: 0;">
                            <h2 class="card-title text-center" id="currentTokenNo"
                                style="font-size: 3rem;font-weight: 900;color: #e4a525;"> - </h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card border-top-3 border-top-success border-bottom-3 border-bottom-success rounded-0">
                        <div class="card-header" style="padding: 8px;">
                            <h2 class="card-title text-center" style="font-size: 2rem;">SECTION</h2>
                        </div>
                        <div class="card-body" style="padding: 12px;">
                            <h2 class="card-title text-center" style="font-size: 2rem; color: green;">COUNSELLING</h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card border-top-3 border-top-slate border-bottom-3 border-bottom-slate rounded-0">
                        <div class="card-header" style="padding: 8px;">
                            <h2 class="card-title text-center" style="font-size: 2rem;">COUNTER</h2>
                        </div>
                        <div class="card-body" style="padding: 0;">
                            <h2 class="card-title text-center" id="curCounter"
                                style="font-size: 3rem;font-weight: 900;color: #e4a525;"> - </h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-md-2">
                    <button type="button" class="btn-block btn-success btn-lg btn3d" id="callNext">
                        <span class="fa fa-arrow-right" style="font-size: 2rem;display: block;"></span> <span
                            style="font-size: 2rem;display: block;position: relative;top: 4px;">Call Next</span>
                    </button>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn-block btn-info btn-lg btn3d" id="recall">
                        <span class="fa fa-volume-up" style="font-size: 2rem;display: block;"></span> <span
                            style="font-size: 2rem;display: block;position: relative;top: 4px;">Call Again</span>
                    </button>
                </div>
                
                <div class="col-md-2">
                    <button type="button" class="btn-block btn-brown btn-lg btn3d" id="sosButton"
                            style="padding: 19px 0;">
                        <span class="icon-bell-check" style="font-size: 2rem;display: block;"></span> <span
                            style="font-size: 18px;display: block;position: relative;top: 5px;">Notify Floor Manager</span>
                    </button>
                </div>

                <div class="col-md-3">
                    <div class="row row-tile no-gutters">
                        <div class="col-6">
                            <button type="button" class="btn btn-light btn-block btn-float m-0" style="padding: 6px;">
                                <i class="icon-hour-glass text-warning-400 icon-2x mt-1"></i>
                                <span style="font-size: 1rem;padding: 4px;">Pending Tokens</span>
                                <span style="font-size: 1.5rem;padding: 1px;" id="CTNumber"> - </span>
                                <div id="pendingTokenProgress" style="margin-top: 4px;"></div>
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-light btn-block btn-float m-0" style="padding: 6px;">
                                <i class="icon-volume-high text-pink-400 icon-2x mt-1"></i>
                                <span style="font-size: 1rem;padding: 4px;">Call Again Tokens</span>
                                <span style="font-size: 1.5rem;padding: 1px;" id="callAgainTokens"> - </span>
                                <div id="callAgainTokenProgress" style="margin-top: 4px;"></div>
                            </button>
                        </div>
                    </div>

                </div>

            </div>

            <!-- Content area -->
            <div class="row justify-content-center">
                <div id="containerContent" class="col-md-11" style="display: none;">
                    <div class="row">
                        <div class="col-12" style="margin-top: 30px;">

                            <div class="card">
                                <div class="container" style="margin-top: 10px;">
                                    <div class="row form-group justify-content-center allTab">

                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <a href="<?php echo e(url('/CounsellingDetails')); ?>" type="button"
                                           class="btn-block btn-yellowgreen btn-lg btn3d" id="startCounselling"
                                           style="padding: 20px;font-size: 1.5rem; display: none;text-align: center;font-weight: 700;">
                                            <span class="fa fa-play"></span>&nbsp;Start Counselling</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    <div id="modalForCounseling">
        <div id="modal2" class="iziModal" data-izimodal-group="group1" data-izimodal-loop=""
             data-izimodal-title="Counseling" data-izimodal-subtitle="">
            <div class="card" id="maindiv2">
                <div class="col-md-12 row dataPanelToggle" style="margin-top: 2%;">
                    <div class="col-md-9">
                        <div class="col-md-12 row form-group">
                            <div class="col-md-3">
                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Registration No.</lable>
                                <input type="text" class="form-control" name="RegisterNo" id="RegisterNo" value=""
                                       readonly/>
                                <input type="hidden" class="form-control" name="TokenNo" id="TokenNo" readonly=""/>
                            </div>
                        </div>
                        <div class="col-md-12 row form-group">
                            <div class="col-md-4">
                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Name in full</lable>
                                <input type="text" class="form-control" name="NameInFull" id="NameInFull" readonly=""/>
                            </div>
                            <div class="col-md-4">
                                <lable><span class="fa fa-calendar"></span>&nbsp;&nbsp;Appointment Date</lable>
                                <input type="text" class="form-control" name="ApplicationDate"
                                       id="ApplicationDate" readonly="">
                            </div>
                            <div class="col-md-4">
                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Appointment No</lable>
                                <input type="text" class="form-control " readonly="" name="ApponintmentNo"
                                       id="ApponintmentNo">
                            </div>
                        </div>
                        <div class="col-md-12 row form-group">
                            <div class="col-md-4">
                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Current passport number
                                </lable>
                                <input type="text" class="form-control" name="CurrentPassportNo" id="CurrentPassportNo"
                                       readonly=""/>
                            </div>
                            <div class="col-md-4">
                                <lable><span class="fa fa fa-hand-o-right"></span>&nbsp;&nbsp;Previous passport
                                    number,If Any
                                </lable>
                                <input type="text" class="form-control" name="ApplicationDate" id="ApplicationDate2"
                                       readonly="">
                            </div>
                        </div>
                        <div class="col-md-12 row form-group">
                            <div class="col-md-4">
                                <lable><span class="fa fa fa-hand-o-right"></span>&nbsp;&nbsp;Country</lable>
                                <input type="text" class="form-control" name="Country" id="Country" readonly="">

                            </div>
                            <div class="col-md-4">
                                <lable><span class="fa fa fa-hand-o-right"></span>&nbsp;&nbsp;City</lable>
                                <input type="text" class="form-control" name="City" id="City" readonly="">
                            </div>
                        </div>
                        <div class="col-md-12 row form-group">
                            <div class="col-md-4">
                                <lable><span class="fa fa-calendar"></span>&nbsp;&nbsp;Date of birth</lable>
                                <input type="text" class="form-control" name="DateofBirth" id="DateofBirth" readonly="">
                            </div>
                            <div class="col-md-4">
                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Gender</lable>
                                <select class="form-control" id="Gender" disabled="">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Civil status</lable>
                                <input type="text" class="form-control" name="Civilstatus" id="Civilstatus" readonly="">
                            </div>
                        </div>
                        <div class="col-md-12 row form-group">
                            <div class="col-md-4">
                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Address if the country of
                                    domicile
                                </lable>
                                <input type="text" class="form-control " name="Address" id="Address" readonly="">
                            </div>
                            <div class="col-md-8">
                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Address,during staying in sri
                                    lanka
                                </lable>
                                <input type="text" class="form-control " name="AddressLocal" id="AddressLocal"
                                       readonly="">
                            </div>
                        </div>
                        <div class="col-md-12 row form-group">
                            <div class="col-md-4">
                                <lable><span class="fa fa-phone"></span>&nbsp;&nbsp;Telephone</lable>
                                <input type="text" class="form-control " name="Telephone" id="Telephone" readonly="">
                            </div>
                            <div class="col-md-4">
                                <lable><span class="fa fa-mobile"></span>&nbsp;&nbsp;Mobile</lable>
                                <input type="text" class="form-control " name="Mobile" id="Mobile" readonly="">
                            </div>
                            <div class="col-md-4">
                                <lable><span class="fa fa-mail-forward"></span>&nbsp;&nbsp;Email</lable>
                                <input type="text" class="form-control" name="Email" id="Email" readonly="">
                            </div>
                        </div>
                        <div class="col-md-12 row form-group">
                            <div class="col-md-4">
                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Sponser name</lable>
                                <input type="text" class="form-control " name="SponserName" id="SponserName"
                                       readonly="">
                            </div>
                        </div>
                        <div class="col-md-12 row form-group">
                            <div class="col-md-4">
                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Nationality</lable>
                                <input type="text" class="form-control " name="Nationality" id="Nationality"
                                       readonly="">
                            </div>
                            <div class="col-md-4">
                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Passport No</lable>
                                <input type="text" class="form-control " name="PassportNo" id="PassportNo" readonly="">
                            </div>
                        </div>
                        <div class="col-md-12 row form-group justify-content-center">
                            <div class="col-md-2">
                                <button type="button" class="btn-block btn-success btn-lg btn3d" id="ok">
                                    <span class="fa fa-check"></span>&nbsp;OK
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn-block btn-danger btn-lg btn3d" id="notab">
                                    <span class="fa fa-close"></span>&nbsp;Not Available
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <img src="<?php echo e(asset('images/imgcou.png')); ?>" id="MemberImgTag" class="img-thumbnail"
                             style="width: 80%; height: 200px;  margin-top: 10px;"/>
                        <img src="<?php echo e(asset('images/Biometric_Authentication.png')); ?>" class="img-thumbnail"
                             id="biometricAuth"
                             style="width: 80%; height: 200px; margin-top: 10px;cursor: pointer;"/>
                        <span id="statVerification" class="badge badge-warning" style="width: 80%;">Pending</span>
                    </div>
                </div>
                <div class="col-md-12 row showBioVerify form-group" style="margin-top: 2%; display: none;">

                    <div class="col-md-4 offset-md-4 form-group">
                        <div class="row row-tile no-gutters">
                            <div class="col-6">
                                <button id="flatRightThumbVerify" type="button"
                                        class="btn btn-light btn-block btn-float m-0">
                                    <i class="icon-thumbs-up2 text-blue-400 icon-2x"></i>
                                    <span>Flat Right Thumb</span>
                                </button>
                            </div>
                            <div class="col-6">
                                <button id="flatLeftThumbVerify" type="button"
                                        class="btn btn-light btn-block btn-float m-0">
                                    <i class="icon-thumbs-up2 text-success-400 icon-2x"
                                       style="transform: scaleX(-1);"></i>
                                    <span>Flat Left Thumb</span>
                                </button>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 showFingerVeriPanel" style="display: none;">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-3">
                                <div class="card">
                                    <a href="javascript:void(0);">
                                        <img id="loadImageSavedVeri" class="img-fluid" alt="">
                                    </a>

                                    <div class="card-body">
                                        <div class="list-feed">
                                            <div class="list-feed-item border-warning-400">
                                                <div class="text-muted font-size-sm mb-1">Appointment Number:</div>
                                                <span id="verAppNo"></span>
                                            </div>

                                            <div class="list-feed-item border-warning-400">
                                                <div class="text-muted font-size-sm mb-1"></div>
                                                <span id="fingerName"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <button type="button" onclick="captureFPVerification()" class="btn-warning btn-lg btn3d"
                                        id="startFingerPrintProcessVerification"
                                        style="width: 15rem; color: black;position: relative;left: 7px; font-weight: bold;">
                                    <span class="fa fa-play"></span>&nbsp;&nbsp;Start Process
                                </button>


                                <button type="button" id="veriOk"
                                        class="btn-success btn-lg btn3d"
                                        style="width: 15rem; color: black;position: relative;left: 7px; font-weight: bold; display: none;">
                                    <span class="fa fa-check"></span>&nbsp;&nbsp;OK
                                </button>
                            </div>
                            <div class="col-3">
                                <div class="card">
                                    <a href="javascript:void(0);" id="loadImageSavedVeriCurrent"
                                       style="text-align: center;">

                                    </a>

                                    <div class="card-body">
                                        <div class="list-feed">
                                            <div class="list-feed-item border-warning-400">
                                                <div class="text-muted font-size-sm mb-1">Appointment Number:</div>
                                                <span id="verAppNoVe"></span>
                                            </div>

                                            <div class="list-feed-item border-warning-400">
                                                <div class="text-muted font-size-sm mb-1"></div>
                                                <span id="fingerNameVe"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center justify-content-center">
                            <div class="col-12" id="responseText">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="noshow" data-izimodal-group="group1" data-izimodal-loop="" data-izimodal-title="Call Again Tokens"
         data-izimodal-subtitle="Call Again Tokens">
        <div class="col-md-12 form-group">
            <div class="row" style="font-size: 1rem;text-align: center;">
                <table class="table table-bordered">
                    <tbody id="appNotAvblBody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/progressbar.js')); ?>" type="text/javascript"></script>
    <script>
        var path = '<?php echo e(url('/tempFileUpload/photoBoothFiles/')); ?>';

        var fingerPrintPath = '<?php echo e(url('/tempFileUpload/')); ?>';
        var imgPathBlade = '<?php echo e(url('images/')); ?>';
        const usergroup = "<?php echo e(Session::get('userGroup')); ?>";
        var usergroupname = ("<?php echo e(Session::get('GroupName')); ?>").replace('Counselling Counter', '');
        $('#curCounter').text(usergroupname)
    </script>
    <script src=<?php echo e(asset('jsPages/Counselling.js')); ?> type="text/javascript"></script>
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

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/Counseling.blade.php ENDPATH**/ ?>