<?php $__env->startSection('title', 'Appointment Cancel/Re Schedule'); ?>
<?php if($readWrite == 'true' || $readWrite = 'true'): ?>

<?php $__env->startSection('header'); ?>
    <style xmlns="">
        .available td:nth-child(2) {
            background: #67d1b7 !important;
        }

        .notavailable td:nth-child(2) {
            background: #d16767 !important;
        }

        .highlightCell {
            background: cornflowerblue;
            color: white !important;
            font-weight: bold;
            border-radius: 22px;
        }

        .highlightHoliday {
            background-color: #e38b8b;
            border-radius: 20px;
            width: 0px;
        }

        .selectedCell {
            background: #de4f49;
        }

        .highlightCell .ui-state-highlight {
            background-color: cornflowerblue !important;
        }


        .cardX {
            background: white;
            height: 85%;
            width: 88%;
            justify-self: center;
            display: flex;
            flex-direction: column;
            box-shadow: 1px 1px 10px rgba(128, 128, 128, 0.4);
            border-radius: 0.3rem;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .cardX:first-child {
            margin-left: 1rem;
        }

        .cardX:nth-child(3) {
            margin-right: 1rem;
        }

        .cardX > * {
            transition: all 0.3s ease-in-out;
        }

        .cardX:hover {
            -webkit-transform: scale(1.04);
            transform: scale(1.04);
        }

        .cardX:hover .cardX-top {
            background: #d64000;
        }

        .cardX:hover .cardX-value {
            color: #d64000;
        }

        .cardX-1:hover ~ .bars > .stat > .bar-1 > span {
            width: 10%;
        }

        .cardX-1:hover ~ .bars > .stat > .bar-2 > span {
            width: 10%;
        }

        .cardX-1:hover ~ .bars > .stat > .bar-3 > span {
            width: 10%;
        }

        .cardX-2:hover ~ .bars > .stat > .bar-1 > span {
            width: 30%;
        }

        .cardX-2:hover ~ .bars > .stat > .bar-2 > span {
            width: 60%;
        }

        .cardX-2:hover ~ .bars > .stat > .bar-3 > span {
            width: 40%;
        }

        .cardX-3:hover ~ .bars > .stat > .bar-1 > span {
            width: 100%;
        }

        .cardX-3:hover ~ .bars > .stat > .bar-2 > span {
            width: 100%;
        }

        .cardX-3:hover ~ .bars > .stat > .bar-3 > span {
            width: 100%;
        }

        .cardX-top {
            height: 25%;
            width: 100%;
            color: white;
            font-weight: 600;
            border-top-left-radius: 0.3rem;
            border-top-right-radius: 0.3rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .cardX-top.available {
            background: #488656;
        }

        .cardX-top.notAvailable {
            background: red;
        }

        .cardX-info {
            height: 75%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .cardX-info > * {
            text-align: center;
        }

        .cardX-value {
            font-weight: 700;
            font-size: 1.6rem;
        }

        .cardX-month {
            font-size: 0.8rem;
        }

        .cardX-lines {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-bottom: 10px;
            width: 95%;
        }

        .cardX-line {
            margin-bottom: 3px;
            height: 4px;
            background: #e0e0e0;
        }

        .progressLineContainer {
            width: 100%;
            background-color: #ddd;
        }

        .progressLine {
            width: 1%;
            height: 5px;
            background-color: #E04242;
        }

        .selectedTime {
            transform: scale(1.12);
        }

        .selectedTime .cardX-top {
            background: #d64000;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page content -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - APPOINTMENT
                    CANCEL/RE SCHEDULE
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="<?php echo e(url('/')); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active"> APPOINTMENT CANCEL/RE SCHEDULE
                </span>
                </div>
            </div>
        </div>
    </div>


    <!-- Page content -->
    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
                <div class="card">
                    <div class="card-header">

                        <div class="row justify-content-md-center">
                            <div class="col-md-12 form-group">
                                <div class="row">
                                    <div class="col-md-3 offset-md-3">
                                        <label for="txtAppointmentNo"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                            Appointment No (Main Applicant)</label>
                                        <div class="form-group">
                                            <input type="text" id="txtAppointmentNo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="txtPassportNo"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                            Passport No (Main Applicant)</label>
                                        <div class="form-group">
                                            <input type="text" id="txtPassportNo" class="form-control formS caps">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <label>&nbsp;&nbsp;</label>
                                        <div class="form-group">
                                            <button type="button" id="btnVerify" class="btn btn-warning btn-sm"
                                                    title="Verify">
                                                <span class="fa fa-check"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>&nbsp;&nbsp;</label>
                                        <div class="form-group">
                                            <input class="form-control" id="verfiBox" readonly="readonly"
                                                   style="border: 0;pointer-events: none;font-size: 1.5rem;text-align: center;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="row justify-content-center">
                                    <div class="col-md-3">
                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Name
                                            In Full:</label>
                                        <div class="form-group">
                                            <input type="text" id="txtNameInFull" class="form-control"
                                                   readonly="readonly" style="background: #eee;pointer-events: none;">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Appointment
                                            Date:</label>
                                        <div class="form-group">
                                            <input type="text" id="txtAppointmentDate" class="form-control"
                                                   readonly="readonly" style="background: #eee;pointer-events: none;">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Appointment
                                            Time:</label>
                                        <div class="form-group">
                                            <input type="text" id="txtAppointmentTime" class="form-control"
                                                   readonly="readonly" style="background: #eee;pointer-events: none;">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Status:</label>
                                        <div class="form-group">
                                            <input type="text" id="txtAppointmentStatus" class="form-control"
                                                   readonly="readonly" style="background: #eee;pointer-events: none;">
                                            <input type="text" id="txtEmail" class="form-control"
                                                   readonly="readonly" style="display: none;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="row justify-content-left">
                                    <div class="col-md-3">
                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Reschedule Date
                                            :</label>
                                        <div class="form-group">
                                            <input type="text" id="txtRescheduleDate" class="form-control dppicker"
                                                   readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-md-8 ">
                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Appointment
                                            Time:</label>

                                        <div id="timeContainer" class="row">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 form-group">
                            <div class="row justify-content-center">
                                <div class="col-5">
                                    <div class="card card-body">
                                        <div class="row text-center">

                                            <div class="col-6">
                                                <p><i class="fa fa-id-card fa-2x d-inline-block text-info"></i></p>
                                                <h5 class="font-weight-semibold mb-0"><span
                                                        id="appointmentCount"></span></h5>
                                                <span class="text-muted font-size-sm" style="font-size: 20px;">Appointments</span>
                                            </div>

                                            <div class="col-6">
                                                <p><i class="fa fa-users fa-2x d-inline-block text-warning"></i></p>
                                                <h5 class="font-weight-semibold mb-0"><span id="membersCount"></span>
                                                </h5>
                                                <span class="text-muted font-size-sm"
                                                      style="font-size: 20px;">Members</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-md-center">
                            <div class="col-md-6 form-group">
                                <div class="col text-center">
                                    <center>
                                        <div class="form-group">
                                            <?php if($readOnly != 'true'): ?>
                                                <button id="btnReschedule" type="button" class="btn btn-success"
                                                        style="margin-top: 5px;">
                                                    <span class="fa fa-calendar-check-o"></span>&nbsp;Re-Schedule
                                                </button>
                                                <button id="cancelAppointment" type="button" class="btn btn-danger"
                                                        style="margin-top: 5px;">
                                                    <span class="fa fa-close"></span>&nbsp;Cancel Appointment
                                                </button>
                                            <?php endif; ?>
                                            <button id="btnClear" type="button" class="btn btn-primary"
                                                    style="margin-top: 5px;">
                                                <span class="fa fa-refresh"></span>&nbsp;Clear
                                            </button>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!--JS files-->
    <script src="<?php echo e(asset('plugins/fullCalender/moment.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/notifications/noty.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/jqueryUI/jquery-ui-timepicker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('jsPages/AppointmentCancelAndReschedule.js')); ?>" type="text/javascript"></script>
    <script>
        var urlFile = '<?php echo e(url('')); ?>';
    </script>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iom\resources\views/pages/AppointmentCancelandReschedule.blade.php ENDPATH**/ ?>