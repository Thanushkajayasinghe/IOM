<?php $__env->startSection('title', 'Registration'); ?>

<?php if($readWrite == 'true'): ?>

<?php $__env->startSection('header'); ?>
    <link href="<?php echo e(asset('css/3dbuttons.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('plugins/Cropper/cropper.min.css')); ?>" rel="stylesheet" type="text/css">
    <style>
        .clickedRow {
            background-color: aquamarine !important;
        }

        .prevClicked {
            background-color: #e0a57a;
        }

        .rowSaved {
            background-color: #ff0134;
        }

        #noshow {
            width: 40% !important;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page header -->
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
    <!-- /page header -->

    <!-- Page content -->
    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper" style="padding: 0 5px;">

            <div class="row justify-content-center">

                <div class="col-sm-3">
                    <div class="card border-top-3 border-top-warning border-bottom-3 border-bottom-warning rounded-0">
                        <div class="card-header" style="padding: 8px;">
                            <h2 class="card-title text-center" style="font-size: 2rem;">CURRENT TOKEN</h2>
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
                            <h2 class="card-title text-center" style="font-size: 2rem; color: green;">Registration</h2>
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
                    <button type="button" class="btn-block btn-success btn-lg btn3d" id="next">
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
                    <button type="button" class="btn-block btn-danger btn-lg btn3d" id="notAvailable">
                        <span class="fa fa-close" style="font-size: 2rem;display: block;"></span> <span
                            style="font-size: 2rem;display: block;position: relative;top: 4px;">No Show</span>
                    </button>
                </div>

                <div class="col-md-3 ">
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
                <div id="clearingID" class="col-md-9" style="display: none">
                    <div class="content" style="padding: 1.25rem 0;">
                        <div class="card">
                            <div class="card-header">

                                <div class="col-md-12 form-group">
                                    <div class="row">
                                        <div class="col col-lg-3">
                                <span id="noOfFamily" style="display: none;">
                                    <label><span class="fa fa-users"></span>&nbsp;&nbsp;No Of Family Members</label>
                                    <div class="form-group">
                                        <input type="number" id="noOfFamilyMembers" value="" min="1"
                                               class="form-control">
                                    </div>
                                </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 form-group">
                                    <div class="row justify-content-center" style="font-size: 1rem;text-align: center;">
                                        <div class="col-md-4">
                                            <div class="card card-table">
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th style="background-color: #f98469">Appointment No</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="appbody">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="btn-block btn-grr btn-lg btn3d"
                                                    id="btnUpdateDetails"
                                                    style="padding: 6%;font-size: 1.2rem;color: #322a2a;">
                                                <span class="icon-floppy-disks"></span>&nbsp;
                                                <span>Update Details</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="showHideDiv" style="display:none;">

                                    <div class="col-md-12 form-group">
                                        <div class="row justify-content-center">

                                            <div class="col-md-3 form-group">
                                                <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Appointment
                                                    No</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" disabled=""
                                                           id="AppointmentNo">
                                                </div>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Passport
                                                    No</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" disabled="disabled"
                                                           match="^.+$" validate="true" error="* required"
                                                           id="PassportNo">
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Appointment
                                                    Date</label>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control dppicker"
                                                               disabled="disabled"
                                                               id="AppointmentDate" match="^.+$" validate="true"
                                                               error="* required">
                                                        <div class="text-danger error"></div>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text"><span
                                                                    class="fa fa-calendar"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4 form-group">
                                                <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;First
                                                    Name</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" disabled="disabled"
                                                           id="NameInFull">
                                                </div>
                                            </div>
                                            <div class="col-md-1 form-group"></div>
                                            <div class="col-md-4 form-group">
                                                <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Last
                                                    Name</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" disabled="disabled"
                                                           id="NameLast">
                                                </div>
                                            </div>

                                            <div class="col-md-9 form-group">
                                                <label>
                                                    <span class="fa fa-address-card"></span>&nbsp;&nbsp;Address in Sri
                                                    Lanka
                                                </label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" disabled="disabled"
                                                           id="AddressLocal">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <div class="row align-items-center">

                                            <div class="col-md-6">
                                                <div class="col-md-6 offset-md-3 form-group">
                                                    <img id="photoBoothImgChange" src="<?php echo e(url('images/PhotoBooth.png')); ?>"
                                                         style="border: 2px solid black;width: 100%;">
                                                </div>

                                                <div class="col-md-12 text-center">
                                                    <button id="takephotobtn"
                                                            class="btn3d btn-magickred"
                                                            style="padding: 0.6rem;border-radius: 14px;">
                                                        Photo Booth
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="col-md-6 offset-md-3 form-group">
                                                    <img id="biometricAuthenticationImgChange"
                                                         src="<?php echo e(url('/images/BiometricAuthentication.png')); ?>"
                                                         style="border: 2px solid black;width: 100%;">
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <button id="takeBiometricsbtn"
                                                            class="btn3d btn-magickblue"
                                                            style="padding: 0.6rem;border-radius: 14px;">
                                                        Biometrics
                                                    </button>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-md-12 form-group">
                                        <div class="row">

                                            <div class="col-md-4">
                                                <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Priority
                                                    Request
                                                    Category</label>
                                                <div class="form-group">
                                                    
                                                    

                                                    <select class="form-control" id="PRC" match="^.+$"
                                                            validate="true" error="* required">
                                                        <option disabled selected value="">Select</option>
                                                        <option>None</option>
                                                        <option>Pregnant mothers</option>
                                                        <option>Mother with children less 7 yrs</option>
                                                        <option>Elderly( aged over 65 years)</option>
                                                        <option>Disabled</option>
                                                        <option>feeding room</option>
                                                        <option>Official passport holders</option>
                                                        <option>Wheelchair accessibility</option>
                                                        <option>Others who need expedited service with additional fee
                                                        </option>
                                                    </select>
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <label><span
                                                        class="fa fa-address-card"></span>&nbsp;&nbsp;Remarks</label>
                                                <div class="form-group">
                                                    <textarea type="text" class="form-control" id="Remarks"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <label><span class="fa fa-globe"></span>&nbsp;&nbsp;Priority Request
                                                    Approval</label>
                                                <div class="form-group">
                                                    <select class="form-control" id="PRA" match="^.+$" validate="true"
                                                            error="* required">
                                                        <option disabled selected value="">Select</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <br><br>

                                    <div class="col-md-12 form-group text-center">
                                        <button class="btn-success btn-lg btn3d btn-graygreen" id="registerButton"
                                                style="width: 15rem;">
                                            Register
                                        </button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="ptomodal" data-izimodal-group="group1c" data-izimodal-loop="" data-izimodal-title="Photo Booth"
                 data-izimodal-subtitle="Photo Booth">
                <div class="card">
                    <div class="card-body">

                        <div class="col-md-12 form-group">
                            <div class="row">

                                <div class="col-md-6">
                                    <p style="text-align: center;font-size: 1rem;font-weight: bold;">Live Feed</p>
                                    <div class="row justify-content-center">
                                        <div class='col-md-10'
                                             style="margin: 20px;padding: 20px;border: 4px solid #8c5136;background: #f5f5f5; text-align: center;">
                                            <div style="position: relative;">
                                                <video controls autoplay style="width: 440px; height: 330px;"></video>
                                                <canvas id="detectFace" width="440" height="330"
                                                        style="position: absolute; left: 0px; top: 0px;"></canvas>
                                            </div>
                                        </div>
                                        <div class='col-md-12'>
                                            <div class='col-md-4 offset-md-4'>
                                                <button type="button" class="btn-block btn-success btn-lg btn3d"
                                                        id="capturePhoto">
                                                    <span class="fa fa-camera" style=""></span>&nbsp;&nbsp;
                                                    <span style="">Capture</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p style="text-align: center;font-size: 1rem;font-weight: bold;">Captured Image</p>
                                    <div class="row justify-content-center">
                                        <div class='col-md-10'
                                             style="margin: 20px;padding: 20px;border: 4px solid #8c5136;background: #f5f5f5; text-align: center;">
                                            <canvas id="captureImage" style="width: 440px; height: 330px;"></canvas>
                                            <img id="showEditedImage"
                                                 style="width: 440px; height: 330px; display: none"/>
                                        </div>
                                        <div class='col-md-12'>
                                            <div class='row justify-content-center'>
                                                <div class='col-md-12 text-center'>
                                                    <button type="button" id="editPhoto"
                                                            class="btn-primary btn-lg btn3d"
                                                            style="padding-left: 24px; padding-right: 24px;"><i
                                                            class="fa fa-pencil"></i> <span>Edit</span></button>
                                                    <button type="button" id="savePhoto"
                                                            class="btn-success btn-lg btn3d"
                                                            style="padding-left: 20px; padding-right: 20px;"><i
                                                            class="fa fa-floppy-o"></i> <span>Save</span></button>
                                                    <button type="button" id="cancelPhoto"
                                                            class="btn-danger btn-lg btn3d"
                                                            style="padding-left: 15px; padding-right: 15px;"><i
                                                            class="fa fa-close"></i> <span>Cancel</span></button>
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

            <div id="biomodal" data-izimodal-group="group1x" data-izimodal-loop=""
                 data-izimodal-title="Biometrics Details" data-izimodal-subtitle="Biometrics">
                <div class="card">
                    <div class="card-body">

                        <div class="col-md-12 form-group">
                            <div class="row">

                                <div class="col-md-12 form-group" style="border-bottom: 2px solid #d8cdcd;">
                                    <div style="font-size: 1.5rem;">
                                        <label>
                                        <span>
                                            <img style="width: 45px;"
                                                 src="<?php echo e(asset('images/fingerprint-scanner.png')); ?>">
                                        </span>&nbsp;Detected Device:
                                        </label>
                                        <span id="deviceName" style="color: #aa2e2e;font-weight: bold;"></span>
                                    </div>
                                </div>

                                <div class="col-md-12 form-group">
                                    <div class="col-md-8 row " style="align-items: center;">
                                        <label class="col-md-2">
                                            Object To Scan:
                                        </label>
                                        <div class="col-md-5">
                                            <select class="form-control selectTo" id="objToScan" multiple>
                                                
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" onclick="captureFP()" class="btn-warning btn-lg btn3d"
                                                    id="startFingerPrintProcess"
                                                    style="width: 15rem; color: black;position: relative;left: 7px;">
                                                <span class="fa fa-play"></span>&nbsp;&nbsp;Start Process
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 form-group">
                                    <div class="row" id="result">

                                    </div>
                                </div>

                                <div class="col-md-12 form-group">
                                    <div class="row align-items-center" style="text-align: center;">
                                        <div class="col-md-12">
                                            <button type="button" id="saveBiometricData"
                                                    class="btn-lg btn3d btn-graygreen" style="width: 15rem;"><span
                                                    class="fa fa-floppy-o"></span>&nbsp;&nbsp;Save
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12 form-group">

                        </div>

                    </div>
                </div>
            </div>

            <div id="noshow" data-izimodal-group="group1p" data-izimodal-loop="" data-izimodal-title="Call Again Tokens"
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

        </div>

    </div>
    <!-- /page content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        const usergroup = "<?php echo e(Session::get('userGroup')); ?>";
        var usergroupname = ("<?php echo e(Session::get('GroupName')); ?>").replace('Registration Counter', '');
        $('#curCounter').text(usergroupname);
        var imgPathBlade = '<?php echo e(url('images/')); ?>';
    </script>
    <script src="<?php echo e(asset('js/FaceDetector.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/Cropper/cropper.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/progressbar.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('jsPages/Registration.js')); ?>" type="text/javascript"></script>

    <script type="text/javascript">

        $('#ptomodal').iziModal({
            headerColor: '#26A69A',
            width: '90%',
            overlayColor: 'rgba(0, 0, 0, 0.5)',
            fullscreen: true,
            transitionIn: 'fadeInUp',
            transitionOut: 'fadeOutDown',
            onOpening: function (modal) {

                loadWebCamera();

                //Face Detection
                setTimeout(function () {

                    var videoTag = document.getElementsByTagName("video")[0];
                    var canvas = document.querySelector("#detectFace");

                    var VIEW_WIDTH = 440;
                    var VIEW_HEIGHT = 330;

                    var faceDetector = new FaceDetector(
                        {
                            video: videoTag,
                            flipLeftRight: false,
                            flipUpsideDown: false
                        }
                    );

                    faceDetector.setOnFaceAddedCallback(function (addedFaces, detectedFaces) {
                        for (var i = 0; i < addedFaces.length; i++) {
                            console.log("[facedetector] New face detected id=" + addedFaces[i].faceId + " index=" + addedFaces[i].faceIndex);
                        }
                    });

                    faceDetector.setOnFaceLostCallback(function (lostFaces, detectedFaces) {
                        var ctx = canvas.getContext("2d");
                        ctx.clearRect(0, 0, VIEW_WIDTH, VIEW_HEIGHT);

                        for (var i = 0; i < lostFaces.length; i++) {
                            console.log("[facedetector] Face removed id=" + lostFaces[i].faceId + " index=" + lostFaces[i].faceIndex);
                        }
                    });

                    faceDetector.setOnFaceUpdatedCallback(function (detectedFaces) {

                        var ctx = canvas.getContext("2d");
                        ctx.clearRect(0, 0, VIEW_WIDTH, VIEW_HEIGHT);

                        ctx.strokeStyle = "red";
                        ctx.lineWidth = 3;
                        ctx.fillStyle = "red";
                        ctx.font = "italic small-caps bold 20px arial";

                        for (var i = 0; i < detectedFaces.length; i++) {

                            var face = detectedFaces[i];

                            // ctx.fillText(face.faceId, face.x * VIEW_WIDTH, face.y * VIEW_HEIGHT);
                            ctx.strokeRect(face.x * VIEW_WIDTH, face.y * VIEW_HEIGHT + 10, face.width * VIEW_WIDTH, face.height * VIEW_HEIGHT);
                        }
                    });

                    //after getUserMedia
                    faceDetector.startDetecting();
                }, 2000)
            }
        });

        function loadWebCamera() {

            // Put variables in global scope to make them available to the browser console.
            const video = document.querySelector('video');
            const canvas = window.canvas = document.querySelector('#captureImage');
            canvas.width = 480;
            canvas.height = 360;

            const button = document.querySelector('#capturePhoto');
            button.onclick = function () {
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;
                canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
            };

            const constraints = {
                audio: false,
                video: true
            };

            function handleSuccess(stream) {
                window.stream = stream;
                video.srcObject = stream;
            }

            function handleError(error) {
                console.log('navigator.MediaDevices.getUserMedia error: ', error.message, error.name);
            }

            navigator.mediaDevices.getUserMedia(constraints).then(handleSuccess).catch(handleError);
        }

        $('#biomodal').iziModal({
            headerColor: '#26A69A',
            width: '90%',
            overlayColor: 'rgba(0, 0, 0, 0.5)',
            fullscreen: true,
            transitionIn: 'fadeInUp',
            transitionOut: 'fadeOutDown'
        });

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

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/Registration.blade.php ENDPATH**/ ?>