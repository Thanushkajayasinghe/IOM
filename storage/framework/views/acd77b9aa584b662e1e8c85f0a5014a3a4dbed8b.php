<?php $__env->startSection('title', 'Make Appointments - NZ'); ?>

<?php $__env->startSection('header'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
    integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="<?php echo e(asset('css/3dbuttons.css')); ?>" rel="stylesheet" type="text/css">
<style>
    .selectedCell {
        background: burlywood;
    }

    td[title="Booked Out"] {
        background-color: #e38787 !important;
        border-radius: 6px !important;
        margin: 1px;
    }

    td[title="Booked Out"] span {
        color: black !important;
    }

    .holiDay span {
        background-color: #774105 !important;
        border-radius: 6px !important;
        color: white !important;
        margin: 1px;
    }

    td {
        position: relative;
    }

    td[title]:hover:after {
        content: attr(title);
        position: absolute;
        top: -60%;
        left: -20px;
        border: 1px solid black;
        background: black;
        color: white;
        z-index: 10000 !important;
        border-radius: 18px;
        padding: 1px 5px;
        width: 180% !important;
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

    .cardX>* {
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

    .cardX-1:hover~.bars>.stat>.bar-1>span {
        width: 10%;
    }

    .cardX-1:hover~.bars>.stat>.bar-2>span {
        width: 10%;
    }

    .cardX-1:hover~.bars>.stat>.bar-3>span {
        width: 10%;
    }

    .cardX-2:hover~.bars>.stat>.bar-1>span {
        width: 30%;
    }

    .cardX-2:hover~.bars>.stat>.bar-2>span {
        width: 60%;
    }

    .cardX-2:hover~.bars>.stat>.bar-3>span {
        width: 40%;
    }

    .cardX-3:hover~.bars>.stat>.bar-1>span {
        width: 100%;
    }

    .cardX-3:hover~.bars>.stat>.bar-2>span {
        width: 100%;
    }

    .cardX-3:hover~.bars>.stat>.bar-3>span {
        width: 100%;
    }

    .cardX-top {
        height: 10%;
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

    .cardX-info>* {
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

    .SelectedDate:not(.notAvaiDate) a {
        background-color: #bbce70 !important;
        border-radius: 6px !important;
    }

    .selectedTime {
        transform: scale(1.12);
    }

    .selectedTime .cardX-top {
        background: #d64000;
    }

    .selectedMember {
        background: #bcbcbc !important;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>Make Appointments</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Make Appointments - NZ</span>
            </div>
        </div>
    </div>
</div>
<!-- Page header -->


<!-- Page content -->
<div class="page-content pt-0">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">
            <div class="card border-y-2 border-top-slate border-bottom-slate rounded-0">
                <div class="card-header">

                    <div class="col-md-12 form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Appointment Details</h3>
                            </div>

                            <div class="col-md-2">
                                <input type="hidden" id="HidenComandUpdateORNewSave">
                                <label><span class="fa fa-newspaper-o"></span>&nbsp;&nbsp;Application
                                    Type</label>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check checkbox">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input-styled" checked
                                            id="appDetTypeIndividual" name="stacked-radio-left" data-fouc>
                                        Individual
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check checkbox">
                                    <label class="form-check-label">
                                        <input type="radio" id="appDetTypeFamily" class="form-check-input-styled"
                                            name="stacked-radio-left" data-fouc>
                                        Family
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <span id="noOfFamily" style="display: none;">
                                    <label><span class="fa fa-users"></span>&nbsp;&nbsp;Number of Family Members
                                        (Excluding the main applicant)</label>
                                    <div class="form-group">
                                        <input type="number" id="noOfFamilyMembers" min="1" max="100"
                                            class="form-control">
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button id="btnSelectAppointment" type="button"
                                        class="btn-block btn-brown btn-lg btn3d">
                                        <sapn class="fa fa-calendar-plus-o">&nbsp;&nbsp;&nbsp;</sapn>
                                        Select Appointment
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3" style="font-size: 15px;">
                                <label><span class="fa fa-calendar"></span>&nbsp;&nbsp;<b>Appointment
                                        Date: </b></label> <span id="selectedDate" style="color: #140cff;"></span><br />
                                <label><span class="fa fa-clock-o"></span>&nbsp;&nbsp;<b>Appointment
                                        Time: </b></label> <span id="selectedTime" style="color: #140cff;"></span>
                            </div>
                            <div class="col-md-3">
                                <label><span class="fa fa-envelope-open"></span>&nbsp;&nbsp;Email</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="txtEmail">
                                    </div>
                                    <div class="text-danger error"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Member Details</h3>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-pencil"></span>&nbsp;&nbsp;Title</label>
                                        <select class="form-control" id="drpTitle">
                                            <option value="">Select</option>
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                            <option value="Miss">Miss</option>
                                            <option value="Ms">Ms</option>
                                            <option value="Dr">Dr</option>
                                            <option>Reverent</option>
                                            <option>Thero</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-pencil"></span>&nbsp;&nbsp;First Name</label>
                                        <input type="text" class="form-control" id="txtFirstName" match="^.+$"
                                            validate="true" error="* required">
                                        <div class="text-danger error"></div>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-pencil"></span>&nbsp;&nbsp;Last Name</label>
                                        <input type="text" class="form-control" id="txtLastName" match="^.+$"
                                            validate="true" error="* required">
                                        <div class="text-danger error"></div>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-calendar"></span>&nbsp;&nbsp;Date of
                                            Birth</label>
                                        <input type="text" class="form-control dppicker" readonly id="txtDob"
                                            match="^.+$" validate="true" error="* required">
                                        <div class="text-danger error"></div>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-pencil"></span>&nbsp;&nbsp;Gender</label>
                                        <select class="form-control" id="drpGender">
                                            <option value="">Select</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-book"></span>&nbsp;&nbsp;Passport Number</label>
                                        <input type="text" class="form-control" id="txtMainPassNo" match="^.+$"
                                            validate="true" error="* required">
                                        <div class="text-danger error"></div>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <span id="Countryvisitedduringlast3yearse">
                                            <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Special
                                                Needs</label>
                                            <span class="checkbox">
                                                <input class="checkboxLablePrefType" type="checkbox"
                                                    id="MainApplicantspecialMedicalNeedsCheck">
                                                <label for="MainApplicantspecialMedicalNeedsCheck">
                                                    <strong>Special Medical Needs ( wheelchair accessibility, feeding
                                                        room etc.)</strong>
                                                </label>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Residential Details</h3>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Address Line
                                            1</label>
                                        <input type="text" class="form-control" id="txtMainAddLine1">
                                        <div class="text-danger error"></div>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-road"></span>&nbsp;&nbsp;Address Line 1</label>
                                        <input type="text" class="form-control" id="txtMainAddLine2">
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-building"></span>&nbsp;&nbsp;City</label>
                                        <input type="text" class="form-control" id="txtMainCity">
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-envelope"></span>&nbsp;&nbsp;Postal Code</label>
                                        <input type="text" class="form-control" id="txtMainPostalCode">
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-phone"></span>&nbsp;&nbsp;Contact No (Home)</label>
                                        <input type="text" class="form-control" id="txtMainContactNoHome">
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-mobile"></span>&nbsp;&nbsp;Contact No (Mobile)</label>
                                        <input type="text" class="form-control" id="txtMainContactNoMobile">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <div class="row" id="memberContainer">

                        </div>
                    </div>

                    <div class="col-md-12 form-group text-center">
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <button type="button" id="btnSave"
                                    class="btn-success btn-graygreen btn-lg btn3d btn-block"
                                    style="font-weight: bolder;">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>


<!-- Modal Select Appointment -->
<div class="modal" id="modalSelectAppointment">
    <div class="modal-dialog modal-lg" style="max-width: 99% !important;">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div>
                    <div class="col-md-12 form-group">

                        <div class="form-group text-center calenderDiv">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-md-12">
                                        <h4><strong>Schedule Appointment</strong> </h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div id='calenderPanelSel'
                                                style="box-shadow: 0 5px 5px -5px rgba(0, 0, 0, 0.1);border: 1px solid #f3dfdf;">
                                            </div>
                                            <div class="col-md-12 row" style="margin-top: 20px;">
                                                <?php $segment = request()->segment(count(request()->segments()));
                                                ?>
                                                <strong>Total Appointmets For <?php echo e($segment); ?>:&nbsp;<lable
                                                        id="totalAppointmentCount"></lable></strong>
                                            </div>
                                            <div class="col-md-12 row" style="margin-top: 10px;">
                                                <strong>Total Appointmets:&nbsp;<lable id="totalAppointmentCount">
                                                    </lable></strong>
                                            </div>
                                        </div>
                                        <div class="col-md-7" style="text-align: left">
                                            <label><span class='fa fa-hand-o-right'></span>&nbsp;Select
                                                Appointment Time :</label>
                                            <div id="timeContainer" class="row">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Close
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Edit Members -->
<div class="modal memberEditModal" style="border-color: #0f960b; overflow:auto;">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header"
                style="background-color: #5a8db5; color: white;border-radius: 0px;padding-bottom: 20px;">
                <div class="col-md-6">
                    <h4 class="modal-title">Member Details</h4>
                </div>
                <button type="button" class="close" data-dismiss="modal"><img src="<?php echo e(asset('images/colse.png')); ?>"
                        width="20px;" height="20px;" /></button>
            </div>

            <!-- Modal body -->
            <div class="card-body" id="MyD">
                <div class="col-md-12 form-group">

                    <div class="col-md-12 form-group">
                        <label for="drpTitle"><span class="fa fa-pencil"></span>&nbsp;&nbsp;Title</label>
                        <select class="form-control" id="drpOtherMemTitle">
                            <option value="">Select</option>
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Miss">Miss</option>
                            <option value="Ms">Ms</option>
                            <option value="Dr">Dr</option>
                            <option>Reverent</option>
                            <option>Thero</option>
                        </select>
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="memFirstName"><span class="fa fa-hand-o-right"></span>&nbsp;First&nbsp;Name </label>
                        <div class="form-group">
                            <input type="text" id="memFirstName" name="memFirstName" class="form-control" match="^.+$"
                                validate="true" error="* First Name required">
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="memLastName"><span class="fa fa-hand-o-right"></span>&nbsp;Last&nbsp;Name </label>
                        <div class="form-group">
                            <input type="text" id="memLastName" name="memLastName" class="form-control" match="^.+$"
                                validate="true" error="* Last Name required">
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="memDOB"><span class="fa fa-hand-o-right"></span>&nbsp;Date Of Birth</label>
                        <div class="input-group"><input type="text" class="form-control dppicker dateOfbirth100"
                                readonly id="memDOB">
                            <div class="input-group-append">
                                <div class="input-group-text"
                                    style="border: 1px solid rgb(221, 221, 221); padding: 0.4375rem 0.875rem;"> <span
                                        class="fa fa-calendar"></span></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <label for="memGender"><span class="fa fa-hand-o-right"></span>&nbsp;Gender</label>
                        <select class="form-control col-md-12" id="memGender">
                            <option disabled="" selected="">Select
                            </option>
                            <option value="Male">Male
                            </option>
                            <option value="Female">Female
                            </option>
                            <option value="Other">Other
                            </option>
                        </select>
                    </div>

                    <div class="col-md-12 form-group">
                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Passport Number
                            <small style="color: red;">*</small>
                        </label>
                        <div class="form-group">
                            <input type="text" id="memPassport" name="memPassport" class="form-control caps formS"
                                match="^.+$" validate="true" error="* Passport required">
                        </div>
                    </div>

                    <div class="col-md-12 form-group text-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            style="padding-top: 6px;padding-bottom: 6px;"><span
                                class="fa fa-close">&nbsp;&nbsp;Close</span></button>
                        <button type="button" class="btn btn-success" id="btnSaveMem"
                            style="padding-top: 6px;padding-bottom: 6px;"><span
                                class="fa fa-save">&nbsp;&nbsp;Save</span></button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    var path = "<?php echo e(url('/')); ?>";
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
    integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?php echo e(asset('jsPagesMhac/MakeAppointmentNz.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pagesmhac/makeappointmentsnz.blade.php ENDPATH**/ ?>