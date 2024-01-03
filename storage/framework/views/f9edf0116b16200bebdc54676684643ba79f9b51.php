<?php $__env->startSection('title', 'Radiologists Reporting'); ?>

<?php if($readWrite == 'true'): ?>
<?php $__env->startSection('content'); ?>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Radiologist
                    Reporting</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Radiologist Reporting</span>
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

                        <!--                    <div class="col-md-12 form-group">
                                                <div class="row align-items-center">

                                                    <div class="col-md-3">
                                                        <button class="btn btn-lg btn-success align-middle" style="width: 10rem;">Next Applicant</button>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <h1 style="font-size: 5rem;">001</h1>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <button class="btn btn-lg btn-danger" style="width: 10rem;">Not Available</button>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <button class="btn btn-lg btn-info" style="width: 10rem;">Recall</button>
                                                    </div>

                                                </div>
                                            </div>-->


                        <div class="col-md-12 form-group">
                            
                            
                            
                            
                            
                            
                            
                            
                            

                            <div class="row">

                                <div class="col-md-3">
                                    <label><span class="fa fa-address-card"></span>&nbsp;Registration No</label>
                                    <div class="form-group">
                                        <input id="registration_no" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label><span class="fa fa-address-card"></span>&nbsp;Passport No</label>
                                    <div class="form-group">
                                        <input id="passport_no" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label><span class="fa fa-address-card"></span>&nbsp;Name</label>
                                    <div class="form-group">
                                        <input id="Name" type="text" class="form-control" readonly>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label><span class="fa fa-calendar-times-o"></span>&nbsp;&nbsp;Date Of Birth</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="birthDay" readonly>
                                            <div class="input-group-append">
                                                <div class="input-group-text"><span class="fa fa-calendar"></span>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label><span class="fa fa-gears"></span>&nbsp;&nbsp;Gender</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="Gen" readonly>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="row justify-content-center" style="margin-top: 50px;">
                                    <div class="col-md-2">
                                        <button type="button" data-toggle="modal" data-target="#myModal"
                                                id="btnDiscussedWithDr" name="btnDiscussedWithDr"
                                                class="btn btn-outline-danger"
                                                style="border: 2px solid black; border-radius: 20px;">
                                            <img class="img-thumbnail"
                                                 src="<?php echo e(url('/images/Lungs1.png')); ?>"/>
                                        </button>
                                    </div>
                                    <div class="col-md-2 offset-md-2">
                                        <img id="xrayExtender" src="<?php echo e(url('/images/xray.png')); ?>" width="200px"
                                             height="200px"
                                             style="border: 2px solid black; -moz-user-select: text; cursor: pointer; border-radius: 20px;">
                                    </div>

                                </div>
                                <div class="row" style="margin-top: 30px;">
                                    <div class="col-md-4">
                                        <label><b>Minor findings</b></label>

                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox1" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>1.1 Single fibrous streak/band/scar</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox2" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>1.2 Bony islets</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox3" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>2.1 Pleural capping with a smooth inferior border(&lt;1cm thick
                                                        at all points)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox4" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>2.2 Unilateral or bilateral costophrenic angle blunting (below
                                                        the horizontal)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox5" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>2.3 calcified nodule(s) in the hilum/ mediastinum with no
                                                        pulmonary granulomas</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <label><b>Minor Finding(occasionally assoclated with TB infection)</b></label>

                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox6" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>3.1 Solitary granuloma(&lt;1cm and of any lobe) with an
                                                        unremarkable hilum</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox7" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>3.2 Solitary granuloma(&lt;1cm and of any lobe) with calcified/
                                                        enlarged hllar lymph nodes</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox8" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>3.3 Single/ Multiple calcified pulmonary nodules/micronodules
                                                        with distinct borders</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox9" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>3.4 Calcified pleural lesions</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox10" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>3.5 Costophrenic Angle blunting(either side above the
                                                        horizontal)</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <label><b>Findings sometines seen in active TB(or other conditions)</b></label>

                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox11" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>4.0 Notable apical pleural capping(rough or rangged inferior
                                                        borderand/or_&gt;1cm thick at any point)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox12" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>4.1 Aplcal fbronodualar/ fibrocalcific lesions or apical
                                                        microcalcifications</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox13" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>4.2 Multiple/ single pulmonary nodules/ micronodules(noncalcified
                                                        or poorly defined)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox14" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>4.3 Isolated hilar or mediastinal
                                                        mass/lymphadenopathy(noncalcified)</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox15" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>4.4 Single / Multiple pulmonary noduies/ masses _&gt;1cm</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox16" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>4.5 Non-calcified pleural fibrosos and/ or effuslon</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox17" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>4.6 Interstltial fbrosos/parenchymal lung disease/ acute
                                                        pulmoneary disease</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox18" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>4.7 Any cavitating lesion OR "lluffy" or "Soft" lesions felt
                                                        likely to represent active TB</p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="col-md-5">
                                        <label><b>Other findings (describr the abnormality in descriptlv
                                                findings/comments below)</b></label>

                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox19" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>Skeleton and soft issue</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox20" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>cardiac or major vessels</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox21" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>lung fields</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <div><span><input id="chkbox22" type="checkbox"
                                                                              class="form-check-input-styled"
                                                                              data-fouc=""></span></div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <p>other</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="row" style="margin-top: 40px;">
                                <div class="col-md-12">
                                    <label><span class="fa fa-address-card"></span>&nbsp;Comment</label>
                                    <div class="form-group">
                                        <textarea id="rr_comment1" class="form-control"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row" style="margin-top: 20px;">
                                <div class="col-md-3">
                                    <button class="btn btn-warning" attr-vl="" id="reqaddiview">Request Additional
                                        View
                                    </button>
                                </div>

                            </div>

                            <div class="row" style="margin-top: 40px;">
                                <div class="col-md-12">
                                    <label><span class="fa fa-address-card"></span>&nbsp;Comment</label>
                                    <div class="form-group">
                                        <textarea id="rr_comment2" class="form-control"></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <br><br>

                        <div class="col-md-12 form-group text-center">
                            <input type="hidden" id="hiddenSerial" value="">
                            
                            <button id="save" class="btn btn-lg btn-success" style="width: 15rem">X-Ray Reporting
                                Completed
                            </button>
                        </div>

                    </div>
                </div>

            </div>

            <!-- Image Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-body col-md-12 col-sm-12">

                            <div class="row">
                                <div class="col-md-12">

                                    
                                    <div id="editor"
                                         style="width:100%; height:500px; border: 1px solid; float: left;background: url('<?php echo e(asset('/images/Lungs1.png')); ?>') center center / contain no-repeat;"></div>
                                    <input type="hidden" ID="txtdata" runat="server" BorderStyle="None"
                                           ForeColor="white"/>

                                </div>
                            </div>
                            <div class="row" style="margin-top: 23px;">
                                <div class="col-md-12">
                                    <center>
                                        <button type="button" class="btn btn-outline-warning " id="clearimg"
                                                value="Clear"><span
                                                class="fa fa-close">Clear</span></button>
                                        <button type="button" class="btn btn-outline-success" data-dismiss="modal"><span
                                                class="fa fa-save">OK</span></button>
                                    </center>
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
    <script src=<?php echo e(asset('plugins/SketchPad/jqueryOld.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('plugins/SketchPad/raphael-2.0.1.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('plugins/SketchPad/json2.min.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('plugins/SketchPad/raphael.sketchpad.js')); ?> type="text/javascript"></script>
    <script src=<?php echo e(asset('jsPages/RadiologistReporting.js')); ?> type="text/javascript"></script>
    <script>
        $('#xrayExtender').on('click', function () {
            var registration_no = $('#registration_no').val();
            window.open("rhjnlp:%7B%22msgType%22%3A%22MSG_LAUNCHJNLP_RQ%22%2C%22dataMap%22%3A%7B%22jnlpURL%22%3A%22http%3A%2F%2F172.23.147.15%2FLPW%2FREV%2FlaunchRemotEye%3FpatientIDsList%3D" + registration_no + "%26auth%3DeNorTi4xMDfJtLAoyzTPNjE1MjA1skwpTDc1MwUAavEHhw%253D%253D%22%7D%7D", '_blank');
        });
    </script>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iom\resources\views/pages/RadiologistReporting.blade.php ENDPATH**/ ?>