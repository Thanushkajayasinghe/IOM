<?php $__env->startSection('title', 'Phlebotomy Sample Collection'); ?>

<?php if($readWrite == 'true'): ?>

<?php $__env->startSection('header'); ?>
    <link href="<?php echo e(asset('css/3dbuttons.css')); ?>" rel="stylesheet" type="text/css">
    <style>
        .clickedRow {
            background-color: aquamarine;
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

        .chektext {
            margin-top: 3%;
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
                            <h2 class="card-title text-center" style="font-size: 2rem; color: green;">Phlebotomy</h2>
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
                <div id="clearingID" class="col-md-9" style="display: none">
                    <div class="content" style="padding: 1.25rem 0;">
                        <div class="card">
                            <div class="card-header">

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
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row justify-content-center">
                                        <div class="col-md-9">
                                            <div class="col-md-12 form-group">
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Appointment
                                                            No</label>
                                                        <div class="form-group">
                                                            <input type="text" name='AppointmentNo' id='AppointmentNo'
                                                                   class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Passport
                                                            No</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="PassportNo"
                                                                   id='PassportNo' readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label><span
                                                                class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Age</label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="Age" id='Age'
                                                                   readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-md-12 form-group">
                                                <div class="row form-group">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <input id="chkbox1" class="form-control chkbtt"
                                                                       type="checkbox">
                                                                <label for="chkbox1" style="font-weight: 700;">HIV
                                                                    ELISA</label>
                                                            </div>
                                                            <div class="col-3">
                                                                <input id="chkbox2" class="form-control chkbtt"
                                                                       type="checkbox">
                                                                <label for="chkbox2"
                                                                       style="font-weight: 700;">MALARIA</label>
                                                            </div>
                                                            <div class="col-3">
                                                                <input id="chkbox3" class="form-control chkbtt"
                                                                       type="checkbox">
                                                                <label for="chkbox3"
                                                                       style="font-weight: 700;">FILARIA</label>
                                                            </div>
                                                            <div class="col-3">
                                                                <input id="chkbox4" class="form-control chkbtt"
                                                                       type="checkbox">
                                                                <label for="chkbox4"
                                                                       style="font-weight: 700;">S.HCG</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-3">
                                            <div class="col-md-12 form-group">
                                                <div class="col-md-12 form-group">
                                                    <img id="MemberImgTag" class="img-thumbnail"
                                                         src="<?php echo e(asset('images/user_icon.png')); ?>"
                                                         style="border: 2px solid black;height: 210px;max-width: 118%;">
                                                </div>
                                                <div class="col-md-12">
                                                    <img src="<?php echo e(asset('images/Biometric_Authentication.png')); ?>"
                                                         class="img-thumbnail"
                                                         id="biometricAuth"
                                                         style="height: 210px; margin-top: 10px;cursor: pointer; max-width: 118%;"/>
                                                    <span id="statVerification" class="badge badge-warning"
                                                          style="width: 118%;">Pending</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card-body">
                                <center>
                                    <button type="button" id="save"
                                            class="btn-success btn-lg btn3d"
                                            style="width: 15rem; color: #e9e4e4;position: relative;left: 7px; font-weight: bold; ">
                                        <span class="fa fa-save"></span>&nbsp;&nbsp;Save
                                    </button>
                                    
                                            
                                            
                                        
                                    
                                </center>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <div id="noshow" data-izimodal-group="group11" data-izimodal-loop="" data-izimodal-title="Call Again Tokens"
         data-izimodal-subtitle="Call Again">
        <div class="col-md-12 form-group">
            <div class="row" style="font-size: 1rem;text-align: center;">
                <table class="table table-bordered text-center">
                    <tbody id="appNotAvblBody">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="biometricVerification" data-izimodal-group="group12" data-izimodal-loop=""
         data-izimodal-title="Biometric Verification"
         data-izimodal-subtitle="Finger Print Verify">
        <div class="card">
            <div class="card-body">

                <div class="col-md-12 row form-group" style="margin-top: 2%;">
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
                            <button type="button" class="btn-warning btn-lg btn3d"
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/progressbar.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript">
        var objectToVeri = 0;
        var path = '<?php echo e(url('/tempFileUpload/photoBoothFiles')); ?>';
        var imgPathBlade = '<?php echo e(url('images/')); ?>';
        var fingerPrintPath = '<?php echo e(url('/tempFileUpload/')); ?>';
        const usergroup = "<?php echo e(Session::get('userGroup')); ?>";
        var usergroupname = ("<?php echo e(Session::get('GroupName')); ?>").replace('Phlebotomy Counter', '');
        $('#curCounter').text(usergroupname)
    </script>
    <script src=<?php echo e(asset('jsPages/PhlebotomySampleCollection.js')); ?> type="text/javascript"></script>
    <script>
        $('#noshow').iziModal({
            headerColor: '#26A69A',
            width: '90%',
            overlayColor: 'rgba(0, 0, 0, 0.5)',
            fullscreen: true,
            transitionIn: 'fadeInUp',
            transitionOut: 'fadeOutDown'
        });

        $('#biometricVerification').iziModal({
            headerColor: '#26A69A',
            width: '90%',
            overlayColor: 'rgba(0, 0, 0, 0.5)',
            fullscreen: true,
            transitionIn: 'fadeInUp',
            transitionOut: 'fadeOutDown'
        });
    </script>
    <script>
        $('#biometricAuth').on('click', function () {

            $('#biometricVerification').iziModal('open');
        });

        $('#flatLeftThumbVerify').on('click', function () {

            var appointmentNo = $('#AppointmentNo').val();
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!

            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }
            var today = yyyy + "" + mm + "" + dd;

            const loadImageName = "" + appointmentNo + "-" + today + "/FP-" + appointmentNo + "-Flat Left Thumb-" + today + ".bmp";

            $('#loadImageSavedVeri').attr('src', fingerPrintPath + '/FingerPrintData/' + loadImageName);
            $('#verAppNo').text(appointmentNo);
            $('#fingerName').text('Flat Left Thumb');

            objectToVeri = 6;

            $('.showFingerVeriPanel').show();
        });

        $('#flatRightThumbVerify').on('click', function () {

            var appointmentNo = $('#AppointmentNo').val();

            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!

            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }
            var today = yyyy + "" + mm + "" + dd;

            const loadImageName = "" + appointmentNo + "-" + today + "/FP-" + appointmentNo + "-Flat Right Thumb-" + today + ".bmp";

            $('#loadImageSavedVeri').attr('src', fingerPrintPath + '/FingerPrintData/' + loadImageName);
            $('#verAppNo').text(appointmentNo);
            $('#fingerName').text('Flat Right Thumb');

            objectToVeri = 1;

            $('.showFingerVeriPanel').show();
        });

        $('#startFingerPrintProcessVerification').on('click', function () {

            var uri = "http://localhost:6463/api/Fingerprints/" + objectToVeri;

            $('#startFingerPrintProcessVerification').prop('disabled', true);

            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!

            var yyyy = today.getFullYear();
            if (dd < 10) {
                dd = '0' + dd;
            }
            if (mm < 10) {
                mm = '0' + mm;
            }
            var today = yyyy + "" + mm + "" + dd;

            $.ajax({
                url: uri,
                type: "GET",
                success: function (obj) {

                    var data = JSON.parse(obj);

                    var imageData = data[0].Base64BMPImage;
                    var appointmentNo = $('#AppointmentNo').val();
                    var objectName = data[0].ObjectName;

                    $.ajax({
                        url: 'PhlebotomyLoadData',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            command: 'fingerPrintTempSave',
                            appNo: appointmentNo,
                            imageData: imageData,
                            objectName: objectName
                        },
                        success: function (data) {

                            if (data.result == true) {

                                $('#loadImageSavedVeriCurrent').html("");

                                var imagePathTemp = fingerPrintPath + '/tempFingerPrint/FPPhl-' + appointmentNo + '-' + objectName + '-' + today + '.bmp#' + new Date().getTime();

                                $('#loadImageSavedVeriCurrent').html("<img src=\"" + imagePathTemp + "\" class=\"img-fluid\" alt=\"\" style=\"height: 275.6px;\">");


                                $('#verAppNoVe').text(appointmentNo);
                                $('#fingerNameVe').text(objectName);
                            }
                        }, complete: function () {

                            const urlOrg = "/FingerPrintData/" + appointmentNo + "-" + today + "/FP-" + appointmentNo + "-" + objectName + "-" + today + ".bmp";
                            const urlTemp = '/tempFingerPrint/FPPhl-' + appointmentNo + '-' + objectName + '-' + today + '.bmp';

                            var uri = "http://172.23.147.20:8080/Values/GetString";

                            $.ajax({
                                url: uri,
                                type: "GET",
                                data: {urlOrg: urlOrg, urlTemp: urlTemp},
                                success: function (data) {

                                    $('#responseText').html("");

                                    if (data.toString() == "Finger Print Verified") {

                                        $('#responseText').html('<h2 class="text-center" style="text-align: center;color: #119611;font-weight: bold;font-size: 2rem;">' + data + '</h2>');
                                        $('#statVerification').text(data).removeClass('badge-warning badge-danger').addClass('badge-success');
                                        $('#save').show();
                                    } else if (data.toString() == "Finger Print Not Verified") {

                                        $('#responseText').html('<h2 class="text-center" style="text-align: center;color: #da5d43;font-weight: bold;font-size: 2rem;">' + data + '</h2>');
                                        $('#statVerification').text(data).removeClass('badge-warning badge-success').addClass('badge-danger');
                                        $('#save').hide();
                                    }
                                }, complete: function () {

                                    $('#veriOk').show();
                                }
                            });
                        }
                    });


                    $('#startFingerPrintProcessVerification').prop('disabled', false);
                },
                error: function (response) {
                    if (response.readyState === 0)
                        alert("Connection Error.... Please check service.");
                    else
                        alert(response.responseText);
                }
            });
        });

        $('#veriOk').on('click', function () {

            $('#biometricVerification').iziModal('close');
        });
    </script>
<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iom\resources\views/pages/PhlebotomySampleCollection.blade.php ENDPATH**/ ?>