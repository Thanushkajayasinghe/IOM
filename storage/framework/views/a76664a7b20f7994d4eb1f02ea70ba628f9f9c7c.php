<?php $__env->startSection('title', 'CXR Internal'); ?>
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
            pointer-events: none;
        }

        #noshow {
            width: 40% !important;
        }

        .hidePanel {
            display: none;
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

        <div class="content-wrapper">

            <div class="row justify-content-center">

                <div class="col-sm-3">
                    <div
                            class="card border-top-3 border-top-warning border-bottom-3 border-bottom-warning rounded-0">
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
                    <div
                            class="card border-top-3 border-top-success border-bottom-3 border-bottom-success rounded-0">
                        <div class="card-header" style="padding: 8px;">
                            <h2 class="card-title text-center" style="font-size: 2rem;">SECTION</h2>
                        </div>
                        <div class="card-body" style="padding: 12px;">
                            <h2 class="card-title text-center" style="font-size: 2rem; color: green;">CXR</h2>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div
                            class="card border-top-3 border-top-slate border-bottom-3 border-bottom-slate rounded-0">
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
                    <button type="button" class="btn-block btn-danger btn-lg btn3d" id="notAvailable">
                        <span class="fa fa-close" style="font-size: 2rem;display: block;"></span> <span
                                style="font-size: 2rem;display: block;position: relative;top: 4px;">No Show</span>
                    </button>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn-block btn-brown btn-lg btn3d" id="notyicon"
                            style="padding: 15px 0 15px;">
                <span style="display: block;">
                    <img src="<?php echo e(asset('images/radiology-icon.png')); ?>" style="width: 53px;"/>
                </span>
                        <span style="font-size: 10px;display: block;position: relative;top: 5px">Extra View List</span>
                    </button>
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn-block btn-brown btn-lg btn3d" id="notyicon02"
                            style="padding: 15px 0 15px;">
                <span style="display: block;">
                    <img src="<?php echo e(asset('images/list.png')); ?>" style="width: 53px;"/>
                </span>
                        <span
                                style="font-size: 10px;display: block;position: relative;top: 5px;">CXR List</span>
                    </button>
                </div>

                <div class="col-md-3">
                    <div class="row row-tile no-gutters">
                        <div class="col-6">
                            <button type="button" class="btn btn-light btn-block btn-float m-0"
                                    style="padding: 6px;">
                                <i class="icon-hour-glass text-warning-400 icon-2x mt-1"></i>
                                <span style="font-size: 1rem;padding: 4px;">Pending Tokens</span>
                                <span style="font-size: 1.5rem;padding: 1px;" id="CTNumber"> - </span>
                                <div id="pendingTokenProgress" style="margin-top: 4px;"></div>
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-light btn-block btn-float m-0"
                                    style="padding: 6px;">
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
                <div id="clearingID" class="col-md-11" style="display: none">
                    <div class="content" style="padding: 1.25rem 0;">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-md-12 row">

                                    <div class="col-md-10">

                                        <div class="col-md-12 form-group">
                                            <div class="row justify-content-center"
                                                 style="font-size: 1rem;text-align: center;">
                                                <div class="col-md-4">
                                                    <div class="card card-table">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th style="background-color: #f98469">Appointment No
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="appbody">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row form-group">

                                                <input type="hidden" id="fullnam" value="">
                                                <input type="hidden" id="age" value="">
                                                <input type="hidden" id="gen" value="">
                                                <input type="hidden" id="dob" value="">

                                                <div class="col-md-3">
                                                    <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Appointment
                                                        No</label>
                                                    <input id="cxr_app_no" type="text" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Passport
                                                        No</label>
                                                    <input id="cxr_passp_no" type="text" class="form-control">
                                                </div>

                                                <div class="col-md-2 hidePanel">
                                                    <label>&nbsp;Pregnancy</label>
                                                    <select id="cxr_preg" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                        <option value="Possibly">Possibly</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-2 hidePanel">
                                                    <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Test
                                                        Date</label>
                                                    <div class="input-group">
                                                        <input id="cxr_test_date" type="text"
                                                               class="form-control dppicker">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text"><span
                                                                        class="fa fa-calendar"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-2 hidePanel">
                                                    <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;LMP
                                                        Date</label>
                                                    <div class="input-group">
                                                        <input id="cxr_lmp_date" type="text"
                                                               class="form-control dppicker">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text"><span
                                                                        class="fa fa-calendar"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group hidePanel">
                                                <div class="col-md-3 ">
                                                    <label>&nbsp;Is the applicant pregnant</label>
                                                    <select id="cxr_result" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-3 hidePanel" style="padding: 6px 9px;">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input id="cxr_preg_test_off" type="checkbox"
                                                                   class="form-check-input-styled" data-fouc>
                                                            Pregnancy Test Offered
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input id="cxr_counsel" type="checkbox"
                                                                   class="form-check-input-styled"
                                                                   data-fouc>
                                                            Counseling Done
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="row form-group">
                                                <div class="col-md-4">
                                                    <img style="border: 1px solid black; width: 100%;"
                                                         src="<?php echo e(url('/images/xray.png')); ?> "
                                                         height="300rem">
                                                </div>

                                                <div class="col-md-4 offset-md-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input id="cxr_not_done" type="radio" checked
                                                                   class="form-check-input-styled"
                                                                   name="stacked-radio-left" value="NotDone" data-fouc>
                                                            CXR Not Done
                                                        </label>
                                                    </div>

                                                    <div id="cxrNotDone">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_def" type="checkbox"
                                                                       class="form-check-input-styled notdone"
                                                                       data-fouc>
                                                                Deferred
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_preg_sc" type="checkbox"
                                                                       class="form-check-input-styled notdone"
                                                                       data-fouc>
                                                                Pregnant/SC Instead
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_app_dec" type="checkbox"
                                                                       class="form-check-input-styled notdone"
                                                                       data-fouc>
                                                                Applicant Decline CXR
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_no_show" type="checkbox"
                                                                       class="form-check-input-styled notdone"
                                                                       data-fouc>
                                                                No Show
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_child" type="checkbox"
                                                                       class="form-check-input-styled notdone"
                                                                       data-fouc>
                                                                Child <11 Years Old
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_unbl_unwill_sc" type="checkbox"
                                                                       class="form-check-input-styled notdone"
                                                                       data-fouc>
                                                                Unable/ Unwilling/ SC Instead
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_not_done_other" type="checkbox"
                                                                       class="form-check-input-styled notdone"
                                                                       data-fouc>
                                                                Other
                                                            </label>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                   id="not_done_other_text"
                                                                   style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input id="cxr_done" type="radio"
                                                                   class="form-check-input-styled"
                                                                   name="stacked-radio-left" value="Done" data-fouc>
                                                            CXR Done
                                                        </label>
                                                    </div>

                                                    <div id="cxrDone">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_done_plv_shld" type="checkbox"
                                                                       class="form-check-input-styled cxrdone"
                                                                       data-fouc>
                                                                With Pelvic Shielding
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_done_dbl_abd_shield" type="checkbox"
                                                                       class="form-check-input-styled cxrdone"
                                                                       data-fouc>
                                                                Double Abdominal Shielding
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_done_other" type="checkbox"
                                                                       class="form-check-input-styled cxrdone"
                                                                       data-fouc>
                                                                Other
                                                            </label>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                   id="cxr_done_others_details"
                                                                   style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <br><br>

                                        <div class="col-md-12 form-group" id="hideBarcodePanel" style="display: none;">

                                            <div class="card alpha-success border-success">
                                                <div class="card-body text-center">
                                                    <div id="apno"></div>
                                                </div>
                                            </div>

                                            <div class="card alpha-success border-success">
                                                <div class="card-body text-center">
                                                    <div id="nm"></div>
                                                </div>
                                            </div>

                                            <div class="card alpha-success border-success">
                                                <div class="card-body text-center">
                                                    <div id="ag"></div>
                                                </div>
                                            </div>

                                            <div class="card alpha-success border-success">
                                                <div class="card-body text-center">
                                                    <div id="gn"></div>
                                                </div>
                                            </div>

                                            <div class="card alpha-success border-success">
                                                <div class="card-body text-center">
                                                    <div id="DOB"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 form-group text-center">
                                            <button class="btn-lg btn-success btn-graygreen btn3d "
                                                    style="width: 13rem; font-weight: bold; "
                                                    id="CXRCompleted">CXR
                                                Completed
                                            </button>
                                        </div>

                                    </div>

                                    

                                    <div class="col-md-2">
                                        <div class="row align-items-center">

                                            <div>
                                                <div class="col-md-12 form-group" style="padding: 0;">
                                                    <img id="MemberImgTag" class="img-thumbnail"
                                                         src="<?php echo e(url('images/PhotoBooth.png')); ?>"
                                                         style="border: 2px solid black;height: 210px;">
                                                </div>
                                            </div>

                                            <div>
                                                <img src="<?php echo e(asset('images/Biometric_Authentication.png')); ?>"
                                                     class="img-thumbnail"
                                                     id="biometricAuth"
                                                     style="height: 210px; margin-top: 10px;cursor: pointer;"/>
                                                <span id="statVerification" class="badge badge-warning"
                                                      style="width: 100%;">Pending</span>
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
    </div>



    <div id="listmodal" data-izimodal-group="group11" data-izimodal-loop=""
         data-izimodal-title="CXR - Extra View Request Details"
         data-izimodal-subtitle="Extra View Request Details">
        <div class="card">
            <div class="card-body">

                <div class="col-md-12 form-group">
                    <div id="tableContainer" class="table-responsive">
                        <table class="table table-bordered table-hover table-striped text-center"
                               id="extraViewTbl" style="">
                            <thead style="background-color: darkslategray;color: wheat;">
                            <tr>
                                <th></th>
                                <th nowrap>Passport No</th>
                                <th style="display: none;">Passport No</th>
                                <th nowrap>Full Name</th>
                                <th nowrap>Token No</th>
                                
                                <th nowrap>Comment</th>
                                <th nowrap></th>
                                <th style="display: none;"></th>
                            </tr>
                            </thead>
                            <tbody id="extraViewTbody">
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    

    <div id="listmodal02" data-izimodal-group="group102" data-izimodal-loop=""
         data-izimodal-title="CXR Details"
         data-izimodal-subtitle="Extra Details">
        <div class="card">
            <div class="card-body">

                <div class="col-md-12 form-group">
                    <div id="tableContainer" class="table-responsive">

                        <table class="table table-bordered table-hover table-striped text-center"
                               id="CXRExtraList" style="">
                            <thead style="background-color: darkslategray;color: wheat;">
                            <tr>
                                <th>No</th>
                                <th nowrap>Appointment No</th>
                                <th nowrap>Full Name</th>
                                <th nowrap>Token No</th>
                                <th nowrap>Radiology Status</th>
                                <th nowrap>Extra View Status</th>
                            </tr>
                            </thead>
                            <tbody id="CXRExtraListTbody">
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="noshow" data-izimodal-group="group12" data-izimodal-loop=""
         data-izimodal-title="Notavailble Tokens"
         data-izimodal-subtitle="Not Available">
        <div class="col-md-12 form-group">
            <div class="row" style="font-size: 1rem;text-align: center;">
                <table class="table table-bordered">
                    <tbody id="appNotAvblBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="biometricVerification" data-izimodal-group="group13" data-izimodal-loop=""
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
    <script src=<?php echo e(asset('jsPages/OverThePhoneRegistration.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('jsPages/CXRInternal.js')); ?> type="text/javascript"></script>
    <script type="text/javascript">
        var path = '<?php echo e(url('/tempFileUpload/photoBoothFiles')); ?>';
        var imgPathBlade = '<?php echo e(url('images/')); ?>';
        var fingerPrintPath = '<?php echo e(url('/tempFileUpload/')); ?>';
        const usergroup = "<?php echo e(Session::get('userGroup')); ?>";
        var usergroupname = ("<?php echo e(Session::get('GroupName')); ?>").replace('CXR Counter', '');
        $('#curCounter').text(usergroupname)

        $('#listmodal').iziModal({
            headerColor: '#26A69A',
            width: '90%',
            overlayColor: 'rgba(0, 0, 0, 0.5)',
            fullscreen: true,
            transitionIn: 'fadeInUp',
            transitionOut: 'fadeOutDown'
        });

        $('#listmodal02').iziModal({
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

        $('#biometricVerification').iziModal({
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

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iom\resources\views/pages/CXRInternal.blade.php ENDPATH**/ ?>