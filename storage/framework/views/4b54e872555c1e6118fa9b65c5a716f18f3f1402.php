<?php $__env->startSection('title', 'Over The Phone Registration'); ?>

<?php if($readWrite == 'true'): ?>

<?php $__env->startSection('header'); ?>
<link href="<?php echo e(asset('css/3dbuttons.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(asset('plugins/fullCalender/fullcalendar.min.css')); ?>" rel="stylesheet" type="text/css" />

<style>
    .available td:nth-child(2) {
        background: #67d1b7 !important;
    }

    .notavailable td:nth-child(2) {
        background: #d16767 !important;
    }

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
        background: burlywood;
    }

    .highlightCell .ui-state-highlight {
        background-color: cornflowerblue !important;
    }
</style>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>Applicant Over The
                Phone Registration</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <a href="<?php echo e(url('/home')); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Applicant Over The Phone Registration</span>
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

                    <div id="formvali">
                        <div class="col-md-12 form-group">
                            <div class="row ">
                                <div class="col-12 col-lg-2">
                                    <input type="hidden" id="HidenComandUpdateORNewSave">
                                    <label><span class="fa fa-newspaper-o"></span>&nbsp;&nbsp;Application
                                        Type</label>
                                </div>
                                <div class="col-6 col-lg-2">
                                    <div class="form-check checkbox">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input-styled" checked id="appDetTypeIndividual" name="stacked-radio-left" data-fouc>
                                            Individual
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-2">
                                    <div class="form-check checkbox">
                                        <label class="form-check-label">
                                            <input type="radio" id="appDetTypeFamily" class="form-check-input-styled" name="stacked-radio-left" data-fouc>
                                            Family
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <span id="noOfFamily" style="display: none;">
                                        <label><span class="fa fa-users"></span>&nbsp;&nbsp;Number of Family Members (Excluding the main applicant)</label>
                                        <div class="form-group">
                                            <input type="number" id="noOfFamilyMembers" min="1" max="100" class="form-control">
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 form-group row" style="display: none;">
                            <div class="col-md-2" data-toggle="tooltip" data-placement="bottom" title="This will take five to seven working days for the interpreter to be arranged!">
                                
                                <label><span class="fa fa-language"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

                                <span class="checkbox">
                                    <input class="checkboxLablePrefType" type="checkbox" id="RequestInterpreter">
                                    <label for="RequestInterpreter">
                                        <strong>Request Interpreter&nbsp;&nbsp;&nbsp;<span class="icon icon-question4"></span>&nbsp;&nbsp;&nbsp;</strong>
                                    </label>
                                </span>

                                
                            </div>
                            <div class="col-md-2 row " id="LangFlag">
                                <div class="col-md-12">
                                    <label><span class="fa fa-flag"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

                                    <select class="form-control" id="LangFlagDrop">
                                        <option value="English">
                                            Arabic
                                        </option>
                                        <option value="Chinese">
                                            Chinese
                                        </option>
                                        <option value="French">
                                            French
                                        </option>
                                        <option value="German">
                                            German
                                        </option>
                                        <option value="Hindi">
                                            Hindi
                                        </option>
                                        <option value="Japanese">
                                            Japanese
                                        </option>

                                        <option value="Russian">
                                            Russian
                                        </option>
                                        <option value="Spanish">
                                            Spanish
                                        </option>
                                        <option value="Other">
                                            Other
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-12" style="margin-top: 10px;">
                                    <input type="text" id="dropOtherText" class="form-control" placeholder="Type Other ..." />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group" id="divContainer">

                        <div class="row form-group">

                            <div class="col-md-3">
                                <label><span class="fa fa-calendar-times-o"></span>&nbsp;&nbsp;Date Of
                                    Arrival</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control dppicker" readonly id="DateOfArrival" match="^.+$" validate="true" error="* required">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><span class="fa fa-calendar"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-danger error"></div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Appointment
                                    Date</label> <span id="time" style="color: #140cff;"></span>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" readonly id="AppointmentDate" match="^.+$" validate="true" error="* required">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><span class="fa fa-calendar"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-danger error"></div>
                                </div>
                            </div>

                            <div class="col-md-3" style="display: none;">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" id="prioRequest" data-fouc>
                                        Priority Request<br>
                                        <small style="color: #1b92f3">(Additional charges may be apply)
                                        </small>
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label><span class="fa fa-globe"></span>&nbsp;&nbsp;Country Of Origin</label>
                                <select class="form-control countryLi selectTo" id="CountryOfOrigin">

                                </select>
                            </div>

                            <div class="col-md-3">
                                <label><span class="fa fa-envelope-open"></span>&nbsp;&nbsp;Email</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="Email" match="^.+$" validate="true" error="* required" onchange="checkVali();">
                                    </div>
                                    <div class="text-danger error"></div>
                                </div>
                            </div>

                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <h2>Member Details</h2>
                            </div>

                            <div class="col-md-12">

                                <div class="row">

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-pencil"></span>&nbsp;&nbsp;Title</label>
                                        <select class="form-control" id="TitleOf">
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
                                        <input type="text" class="form-control" id="fname" match="^.+$" validate="true" error="* required">
                                        <div class="text-danger error"></div>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-pencil"></span>&nbsp;&nbsp;Last Name</label>
                                        <input type="text" class="form-control" id="lname" match="^.+$" validate="true" error="* required">
                                        <div class="text-danger error"></div>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-calendar"></span>&nbsp;&nbsp;Date of
                                            Birth</label>
                                        <input type="text" class="form-control dppicker" readonly id="DOB" match="^.+$" validate="true" error="* required">
                                        <div class="text-danger error"></div>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-gears"></span>&nbsp;&nbsp;Gender</label>
                                        <select class="form-control" id="Gen">
                                            <option value="">Select</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-flag"></span>&nbsp;&nbsp;Nationality</label>
                                        <select name="Nationality" validate="true" error="* Nationality required" onchange="checkVali();" class="form-control selectTo nationalityLi" id="Nationality" validate="true" error="* Nationality required">

                                        </select>
                                        <div class="text-danger error"></div>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-book"></span>&nbsp;&nbsp;Passport Number</label>
                                        <input type="text" class="form-control" id="PassportNo" match="^.+$" validate="true" error="* required">
                                        <div class="text-danger error"></div>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-arrows-h"></span>&nbsp;&nbsp;Previous Passport
                                            if Any</label>
                                        <input type="text" class="form-control" id="PreviousPPA">
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-flash"></span>&nbsp;&nbsp;Country Of
                                            Birth</label>
                                        <select class="form-control countryLi selectTo" id="COBirth">

                                        </select>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-arrow-circle-o-right"></span>&nbsp; Countries visited during the last three years</label>
                                        <select class="form-control countryLi form-control-select2-icons selectTo" multiple="multiple" id="CVDL3years">

                                        </select>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <span id="Countryvisitedduringlast3yearse">
                                            <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Special Needs</label>
                                            <span class="checkbox">
                                                <input class="checkboxLablePrefType" type="checkbox" id="MainApplicantspecialMedicalNeedsCheck">
                                                <label for="MainApplicantspecialMedicalNeedsCheck">
                                                    <strong>Special Medical Needs ( wheelchair accessibility, feeding room etc.)</strong>
                                                </label>
                                            </span>
                                        </span>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <h2>Residential Details</h2>
                            </div>

                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Address</label>
                                        <input type="text" class="form-control" id="CdAddress">
                                        <div class="text-danger error"></div>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-road"></span>&nbsp;&nbsp;Street</label>
                                        <input type="text" class="form-control" id="CdStreet">
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-building"></span>&nbsp;&nbsp;City</label>
                                        <input type="text" class="form-control" id="CdCity">
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-envelope"></span>&nbsp;&nbsp;Postal Code</label>
                                        <input type="text" class="form-control" id="CdPostalCode">
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-phone"></span>&nbsp;&nbsp;Contact No (Home)</label>
                                        <input type="text" class="form-control" id="txtContactNoHomeRes">
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-mobile"></span>&nbsp;&nbsp;Contact No (Mobile)</label>
                                        <input type="text" class="form-control" id="txtContactNoMobileRes">
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="row form-group">

                            <div class="col-md-2">
                                <label><span class="fa fa-share-alt"></span>&nbsp;&nbsp;Preferred Contact
                                    Method</label>
                            </div>
                            <div class="col-md-1">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" id="prefConModeEmail" data-fouc>
                                        Email
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input-styled" id="prefConModeMobile" data-fouc>
                                        Mobile
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <h2>Sponsor Details</h2>
                            </div>

                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-handshake-o"></span>&nbsp;&nbsp;Sponsor
                                            Name</label>
                                        <input type="text" class="form-control" id="SponsorName" match="^.+$" validate="true" error="* required" onchange="checkVali();">
                                        <div class="text-danger error"></div>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-phone-square"></span>&nbsp;&nbsp;Telephone -
                                            Fixed Line</label>
                                        <input type="text" class="form-control" id="SponsorTelephoneFixedLine">
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-envelope-open"></span>&nbsp;&nbsp;Email</label>
                                        <input type="text" class="form-control" id="SponsorEmailAddress" match="^.+$" validate="true" error="* required" onchange="checkVali();">
                                        <div class="text-danger error"></div>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-mobile"></span>&nbsp;&nbsp;Mobile</label>
                                        <input type="text" class="form-control" id="SponsorMobile" match="^.+$" validate="true" error="* required" onchange="checkVali();">
                                        <div class="text-danger error"></div>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label><span class="fa fa-address-book"></span>&nbsp;&nbsp;Address</label>
                                        <input type="text" class="form-control" id="SponsorAddress" match="^.+$" validate="true" error="* required" onchange="checkVali();">
                                        <div class="text-danger error"></div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <h2>Add Members</h2>
                            </div>

                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-12 row" id="memberContainer">

                                    </div>

                                </div>
                            </div>

                        </div>


                        <div class="col-md-12 form-group text-center">
                            <div class="row justify-content-center">
                                <div class="col-md-2">
                                    <button type="button" class="btn-success btn-graygreen btn-lg btn3d btn-block" style="font-weight: bolder;" id="btnsubmit">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- /content area -->


        <!--//////////////////////////////////////////////////////////////////////////////////////////////////-->

        <div class="modal" id="myModal2">
            <div class="modal-dialog">
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
                                            <div class="col-md-12 row">
                                                <div class="col-md-6"><strong>Booking Appoiment Count :&nbsp;<lable id="BookedAppoimentCount"></lable></strong></div>
                                                <div class="col-md-6"><strong>Schedule Appointment Count :&nbsp;<lable id="TotalAppoimentCount"></lable></strong></div>

                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-7 col-12">
                                                    <div id='calendar' style="box-shadow: 0 5px 5px -5px rgba(0, 0, 0, 0.1);border: 1px solid #f3dfdf;"></div>
                                                </div>
                                                <div class="col-md-5 col-12" style="max-height: 300px;overflow: auto;">
                                                    <table class="table table-bordered table-hover">
                                                        <thead style="background: cadetblue;color: white;">
                                                            <tr>
                                                                <th>Time</th>
                                                                <th style="width: 10%;">Availability</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="timeTableBody">

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

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" style="width: 100px;">
                            OK
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal modalAddData" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <span class="checkbox">
                                    <input class="checkboxLablePrefType" type="checkbox" id="interPretServicesCheck">
                                    <label for="interPretServicesCheck">
                                        <strong>Interpretation Services</strong>
                                    </label>
                                </span>
                            </div>
                            <div class="col-md-12">
                                <span class="checkbox">
                                    <input class="checkboxLablePrefType" type="checkbox" id="over60YearsCheck">
                                    <label for="over60YearsCheck">
                                        <strong>Over 60 Years</strong>
                                    </label>
                                </span>
                            </div>
                            <div class="col-md-12">
                                <span class="checkbox">
                                    <input class="checkboxLablePrefType" type="checkbox" id="specialMedicalNeedsCheck">
                                    <label for="specialMedicalNeedsCheck">
                                        <strong>Special Medical Needs</strong>
                                    </label>
                                </span>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <span class="checkbox">
                                            <input class="checkboxLablePrefType" type="checkbox" id="otherCheck">
                                            <label for="otherCheck">
                                                <strong>Other</strong>
                                            </label>
                                        </span>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal memberEditModal" style="border-color: #0f960b; overflow:auto;">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header" style="background-color: #5a8db5; color: white;border-radius: 0px;padding-bottom: 20px;">
                        <div class="col-md-6">
                            <h4 class="modal-title">Member Details</h4>
                        </div>
                        <button type="button" class="close" data-dismiss="modal"><img src="<?php echo e(asset('images/colse.png')); ?>" width="20px;" height="20px;" /></button>
                    </div>

                    <!-- Modal body -->
                    <div class="card-body" id="MyD">
                        <div class="col-md-12 form-group">

                            <div class="col-md-12 form-group">
                                <label for="memFirstName"><span class="fa fa-hand-o-right"></span>&nbsp;First&nbsp;Name </label>
                                <div class="form-group">
                                    <input type="text" id="memFirstName" name="memFirstName" class="form-control" match="^.+$" validate="true" error="* First Name required">
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="memLastName"><span class="fa fa-hand-o-right"></span>&nbsp;Last&nbsp;Name </label>
                                <div class="form-group">
                                    <input type="text" id="memLastName" name="memLastName" class="form-control" match="^.+$" validate="true" error="* Last Name required">
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="memDOB"><span class="fa fa-hand-o-right"></span>&nbsp;Date Of Birth</label>
                                <div class="input-group"><input type="text" class="form-control dppicker dateOfbirth100" readonly id="memDOB">
                                    <div class="input-group-append">
                                        <div class="input-group-text" style="border: 1px solid rgb(221, 221, 221); padding: 0.4375rem 0.875rem;"> <span class="fa fa-calendar"></span></div>
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
                                <label for="memPreg"><span class="fa fa-hand-o-right"></span>&nbsp;Pregnancy </label>
                                <div class="form-group">
                                    <select class="form-control inpt-control select" id="memPreg">
                                        <option selected="selected">No</option>
                                        <option>Yes</option>
                                    </select>

                                </div>
                                <strong id="memPregMessage" style="display: none;">Please bring along with you a
                                    recommendation
                                    from your gynecologist to undergo a Chest X-Ray with double abdominal shielding</strong>
                            </div>

                            <div class="col-md-12  form-group">
                                <label for="memNationality"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Nationality</label>
                                <div class="form-group">
                                    <select name="memNationality" id="memNationality" class="form-control selectTo nationalityLi inpt-control select">

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Passport Number
                                    <small style="color: red;">*</small>
                                </label>
                                <div class="form-group">
                                    <input type="text" id="memPassport" name="memPassport" class="form-control caps formS" match="^.+$" validate="true" error="* Passport required">
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="memPreviousPassportifAny"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Previous Passport if Any</label>
                                <div class="form-group">
                                    <input type="text" id="memPreviousPassportifAny" name="memPreviousPassportifAny" class="form-control caps formS">
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="memCountryOfBirth"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Country
                                    Of
                                    Birth</label>
                                <div class="form-group">
                                    <select name="memCountryOfBirth" class="selectTo countryLi form-control inpt-control select" id="memCountryOfBirth">

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="memCountryvisitedduringlast3years"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Country/countries
                                    visited during the
                                    last three years</label>
                                <div class="form-group">
                                    <select name="memCountryvisitedduringlast3years" class="selectTo countryLi form-control" multiple="multiple" id="memCountryvisitedduringlast3years">

                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="inpt-form-group">
                                    <label for="drpSpecialRequest"><span class="fa fa-hand-o-right"></span>&nbsp;Special
                                        Requests</label>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="checkbox">
                                                <input class="chkWheelChairAccessMem" type="checkbox" id="chkWheelChairAccessMem">
                                                <label for="chkWheelChairAccessMem" style="padding-left: 26px;padding-top: 3px;">
                                                    <strong>Wheelchair accessibility</strong></label>
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="checkbox">
                                                <input class="chkFeedingRoomMem" type="checkbox" id="chkFeedingRoomMem">
                                                <label for="chkFeedingRoomMem" style="padding-left: 26px;padding-top: 3px;">
                                                    <strong>Feeding Room</strong></label>
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="checkbox">
                                                <input class="chkMotherWithChildrenLess5Mem" type="checkbox" id="chkMotherWithChildrenLess5Mem">
                                                <label for="chkMotherWithChildrenLess5Mem" style="padding-left: 26px;padding-top: 2px;">
                                                    <strong>Mother with children less than 5 years of age</strong></label>
                                            </span>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="checkbox">
                                                <input class="chkOtherMem" type="checkbox" id="chkOtherMem">
                                                <label for="chkOtherMem" style="padding-left: 26px;padding-top: 3px;">
                                                    <strong>Other</strong></label>
                                            </span>

                                            <div class="form-group">
                                                <label for="txtOtherSpecialRequestMem">*
                                                    Please Specify
                                                </label>
                                                <div class="inpt-group">
                                                    <input type="text" name="txtOtherSpecialRequestMem" id="txtOtherSpecialRequestMem" class="form-control" placeholder="Please Specify">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group text-center">
                                <button type="button" class="btn btn-danger" data-dismiss="modal" style="padding-top: 6px;padding-bottom: 6px;"><span class="fa fa-close">&nbsp;&nbsp;Close</span></button>
                                <button type="button" class="btn btn-success" id="save" style="padding-top: 6px;padding-bottom: 6px;"><span class="fa fa-save">&nbsp;&nbsp;Save</span></button>
                            </div>

                        </div>
                    </div>


                    <!-- Modal footer -->
                    <div class="modal-footer">

                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<!--JS files-->
<script src="<?php echo e(asset('plugins/fullCalender/moment.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('plugins/fullCalender/fullcalendar.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('plugins/notifications/noty.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('jsPages/OverThePhoneRegistration.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('js/common.js')); ?>" type="text/javascript"></script>

<script>
    $(".dppicker").datepicker({
        dateFormat: 'yy/mm/dd',
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+100"
    });

    var imgPathBlade = "<?php echo e(url('/images/numbers/')); ?>";

    function checkVali() {
        validate('#formvali');
    }

    $('input[type=text]').change(function() {
        validate('#divContainer');
        validate('#divContainer3');
        validate('#divdomi');
        validate('#SponserDiv');

    });
    $('#CdCountry').on('change', function() {
        validate('#divContainer');
        validate('#divContainer3');
        validate('#divdomi');
        validate('#SponserDiv');

        var options = $('option:selected', this).attr('name');
        options = '+' + options;
        $('#CNCode').text(options);
        validate('#formvali');

    });

    $('#DateOfArrival').on('change', function() {
        validate('#divContainer');
        validate('#divContainer3');
        validate('#divdomi');
        validate('#SponserDiv');
        validate('#formvali');
    });
    $('#AppointmentDate').on('change', function() {
        validate('#divContainer');
        validate('#divContainer3');
        validate('#divdomi');
        validate('#SponserDiv');
        validate('#formvali');
    });
    // ------------------------------TELE PHONE NUMBER VALIDATION-------------------

    document.querySelector("#SponsorMobile").addEventListener("keypress", function(e) {
        var allowedChars = '0123456789+';

        function contains(stringValue, charValue) {
            return stringValue.indexOf(charValue) > -1;
        }

        var invalidKey = e.key.length === 1 && !contains(allowedChars, e.key) || e.key === '.' && contains(e.target.value, '.');
        invalidKey && e.preventDefault();
    });
    // ---------------------------------------------------------------------------------------------
    document.querySelector("#SponsorTelephoneFixedLine").addEventListener("keypress", function(e) {
        var allowedChars = '0123456789+';

        function contains(stringValue, charValue) {
            return stringValue.indexOf(charValue) > -1;
        }

        var invalidKey = e.key.length === 1 && !contains(allowedChars, e.key) || e.key === '.' && contains(e.target.value, '.');
        invalidKey && e.preventDefault();
    });
    // ---------------------------------------------------------------------------------------------
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    // --------------------------------------------------------------
    $('#msg').hide();

    $('#prg1').on('change', function() {

        var prg1 = $('#prg1').val();
        if (prg1 == "Yes") {
            $('#msg').show();
        } else {
            $('#msg').hide();
        }
    });


    // -----------------------------------------------------------------------------


    $('#IdDomicile').hide();
</script>
<?php $__env->stopSection(); ?>

<?php endif; ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/OverThePhoneRegistration.blade.php ENDPATH**/ ?>