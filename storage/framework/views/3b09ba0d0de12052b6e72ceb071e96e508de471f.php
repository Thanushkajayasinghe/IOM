<?php $__env->startSection('title', 'IHU - RECOMMENDATION'); ?>

<?php if($readWrite == 'true' || $readOnly == 'true'): ?>

<?php $__env->startSection('content'); ?>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IHU -
                    RECOMMENDATION
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="<?php echo e(url('/')); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">IHU - RECOMMENDATION
                </span>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <div class="content">


                <!-- Dashboard content -->
                <div class="row">
                    <div class="col-xl-12">

                        <!-- Marketing campaigns -->
                        <div class="card" style="padding-left: 20px; padding-top: 20px;">
                            <div class="col-md-12 col-xl-12 row">

                                <div class="col-md-12 form-group row">

                                    <div class="col-md-10">
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;AppointmentNumber
                                                    No.
                                                </lable>

                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="RegisterNo"
                                                           id="RegisterNo">
                                                    <div class="input-group-append" id="btnSearch2">
                                                        <div class="input-group-text"><span class="fa fa-search"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <lable><span class="fa fa-book"></span>&nbsp;&nbsp;Passport No.
                                                </lable>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="RegisterNo"
                                                           id="PassportNo">
                                                    <div class="input-group-append" id="btnSearch">
                                                        <div class="input-group-text"><span class="fa fa-search"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body" style="padding: 0px;">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="col-md-12 form-group">

                                                        <div class="row">
                                                            <div class="col-md-12 form-group">
                                                                <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Name
                                                                    In Full</label>
                                                                <div class="form-group">
                                                                    <input id="NameInFull" readonly type="text"
                                                                           class="form-control col-md-9">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Date
                                                                    Of Arrival</label>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <input id="dateOfarrival" readonly type="text"
                                                                               class="form-control ">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text"><span
                                                                                    class="fa fa-calendar"></span></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Appointment
                                                                    Date</label>
                                                                <div class="form-group">
                                                                    <div class="input-group">
                                                                        <input id="AppointmentDate" readonly type="text"
                                                                               class="form-control">
                                                                        <div class="input-group-append">
                                                                            <div class="input-group-text"><span
                                                                                    class="fa fa-calendar"></span></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Appointment
                                                                    No</label>
                                                                <div class="form-group">
                                                                    <input id="AppointmentNumber" readonly type="text"
                                                                           class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Current
                                                                    Passport Number</label>
                                                                <div class="form-group">
                                                                    <input id="PassportNumber" readonly type="text"
                                                                           class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Previous
                                                                    Passport Number, if any</label>
                                                                <div class="form-group">
                                                                    <input id="PreviousPassportIfAny" readonly
                                                                           type="text"
                                                                           class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <label><span
                                                                        class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Birthday</label>
                                                                <div class="form-group">
                                                                    <input type="text" readonly id="birthdayCon"
                                                                           class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <label><span
                                                                        class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Category</label>
                                                                <div class="form-group">
                                                                    <select class="form-control" id="drpCategory">
                                                                        <option>Select</option>
                                                                        <option>CATEGORY A</option>
                                                                        <option>CATEGORY B</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>


                                                    </div>


                                                    <div class="card card-collapsed">
                                                        <div class="card-header header-elements-inline">
                                                            <h6 class="card-title"><b>Additional Details</b></h6>
                                                            <div class="header-elements">
                                                                <div class="list-icons">
                                                                    <a class="list-icons-item"
                                                                       data-action="collapse"></a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-body">
                                                            <div class="col-md-12 form-group">
                                                                <div class="row form-group">

                                                                    <div class="col-md-6" style="padding-left: 0;">
                                                                        <div class="col-md-12">
                                                                            <h5>Address during staying in Sri Lanka</h5>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label><span
                                                                                    class="fa fa-address-card"></span>&nbsp;&nbsp;Address</label>
                                                                            <div class="form-group">
                                                                                <input id="SlAddress" type="text"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label><span
                                                                                    class="fa fa-road"></span>&nbsp;&nbsp;Street</label>
                                                                            <div class="form-group">
                                                                                <input id="SlStreet" type="text"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label><span
                                                                                    class="fa fa-building"></span>&nbsp;&nbsp;City</label>
                                                                            <div class="form-group">
                                                                                <input id="SlCity" type="text"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label><span
                                                                                    class="fa fa-address-book"></span>&nbsp;&nbsp;State/Province</label>
                                                                            <div class="form-group">
                                                                                <input id="SlStateProvince" type="text"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label><span class="fa fa-envelope"></span>&nbsp;&nbsp;Postal
                                                                                Code</label>
                                                                            <div class="form-group">
                                                                                <input id="SlPostalCode" type="text"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label><span
                                                                                    class="fa fa-globe"></span>&nbsp;&nbsp;Country</label>
                                                                            <div class="form-group">
                                                                                <input id="srilanka" type="text"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label><span class="fa fa-phone"></span>&nbsp;&nbsp;Telephone-Fixed
                                                                                Line</label>
                                                                            <div class="form-group">
                                                                                <input id="SlTelephoneFixedLine"
                                                                                       type="text"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <label><span
                                                                                    class="fa fa-mobile"></span>&nbsp;&nbsp;Mobile</label>
                                                                            <div class="form-group">
                                                                                <input id="SlMobile" type="text"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>


                                                            <div class="col-md-12 form-group" style="margin-top: 65px;">
                                                                <fieldset class="scheduler-border">
                                                                    <legend class="scheduler-border"><b>Sponsor
                                                                            Details</b>
                                                                    </legend>
                                                                    <div class="row form-group">
                                                                        <div class="col-md-6">
                                                                            <label><span
                                                                                    class="fa fa-handshake-o"></span>&nbsp;&nbsp;Sponsor
                                                                                Name</label>
                                                                            <div class="form-group">
                                                                                <input id="SponsorName" type="text"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label><span
                                                                                    class="fa fa-phone-square"></span>&nbsp;&nbsp;Telephone
                                                                                - Fixed Line</label>
                                                                            <div class="form-group">
                                                                                <input id="SponsorTelephoneFixedLine"
                                                                                       type="text"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label><span
                                                                                    class="fa fa-envelope-open"></span>&nbsp;&nbsp;Email</label>
                                                                            <div class="form-group">
                                                                                <input id="SponsorEmailAddress"
                                                                                       type="text"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label><span
                                                                                    class="fa fa-mobile"></span>&nbsp;&nbsp;Mobile</label>
                                                                            <div class="form-group">
                                                                                <input id="SponsorMobile" type="text"
                                                                                       class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="col-md-12 form-group">
                                                        <div class="col-md-12 form-group">
                                                            <img id="img" class="img-thumbnail"
                                                                 src="<?php echo e(url('images/PhotoBooth.png')); ?>"
                                                                 style="border: 2px solid black; height: 210px; width: 100%;">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-md-12 form-group">

                                                <div class="row form-group">
                                                    <div class="col-md-6 form-group">
                                                        <p>Has the applicant (or their child) had any of the following
                                                            symptoms in
                                                            the last
                                                            three months.</p>
                                                        <div class="row form-group">
                                                            <div class="col-2 form-group">
                                                                Yes
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                No
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                Unknown
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="ty1"
                                                                               value="1" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="ty1"
                                                                               value="2" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="ty1"
                                                                               value="3" checked data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 form-group">
                                                                <h4>Cough</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled radi"
                                                                               name="ty2"
                                                                               value="1" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled radi"
                                                                               name="ty2"
                                                                               value="2" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled radi"
                                                                               name="ty2"
                                                                               value="3" checked data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 form-group">
                                                                <h4>Haemoptysis</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="ty3"
                                                                               value="1" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="ty3"
                                                                               value="2" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="ty3"
                                                                               value="3" checked data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 form-group">
                                                                <h4>Night Sweats</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="ty4"
                                                                               value="1" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="ty4"
                                                                               value="2" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="ty4"
                                                                               value="3" checked data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 form-group">
                                                                <h4>Weight Loss</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="ty5"
                                                                               value="1" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="ty5"
                                                                               value="2" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="ty5"
                                                                               value="3" checked data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 form-group">
                                                                <h4>Fever</h4>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 form-group hidpan">
                                                        <p>For children only, is there any history of the following,</p>
                                                        <div class="row form-group">
                                                            <div class="col-md-2 form-group">
                                                                Yes
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                No
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                Unknown
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled chil"
                                                                               name="tyr1"
                                                                               value="1" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled chil"
                                                                               name="tyr1"
                                                                               value="2" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled chil"
                                                                               name="tyr1"
                                                                               value="3" checked data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 form-group">
                                                                <h4>Any chronic respiratory disease, such as cystic
                                                                    fibrosis</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled chil"
                                                                               name="tyr2"
                                                                               value="1" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled chil"
                                                                               name="tyr2"
                                                                               value="2" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled chil"
                                                                               name="tyr2"
                                                                               value="3" checked data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 form-group">
                                                                <h4>Previous thoracic surgery</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled chil"
                                                                               name="tyr3"
                                                                               value="1" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled chil"
                                                                               name="tyr3"
                                                                               value="2" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled chil"
                                                                               name="tyr3"
                                                                               value="3" checked data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 form-group">
                                                                <h4>Cyanosis</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled chil"
                                                                               name="tyr4"
                                                                               value="1" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled chil"
                                                                               name="tyr4"
                                                                               value="2" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled chil"
                                                                               name="tyr4"
                                                                               value="3" checked data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 form-group">
                                                                <h4>Respiratory insufficiency that limits activity</h4>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-md-12 form-group">
                                                        <p>For all applicants.</p>
                                                        <div class="row form-group">
                                                            <div class="col-2 form-group">
                                                                Yes
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                No
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                Unknown
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="tyg1"
                                                                               value="1" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="tyg1"
                                                                               value="2" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="tyg1"
                                                                               value="3" checked data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col form-group">
                                                                <h4>Is there any history of previous TB?</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="tyg2"
                                                                               value="1" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="tyg2"
                                                                               value="2" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="tyg2"
                                                                               value="3" checked data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col form-group">
                                                                <h4>Has anyone in the Household been diagnosed with TB
                                                                    in the past 2
                                                                    years?</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row form-group">
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="tyg3"
                                                                               value="1" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="tyg3"
                                                                               value="2" data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-2 form-group">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input type="radio"
                                                                               class="form-check-input-styled"
                                                                               name="tyg3"
                                                                               value="3" checked data-fouc>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col form-group">
                                                                <h4>Is there any history of recent contact with a case
                                                                    of active
                                                                    pulmonary
                                                                    TB
                                                                    (shared the same enclosed air space or household or
                                                                    other
                                                                    enclosed
                                                                    environment for prolonged period for days or weeks
                                                                    )?</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <div class="row form-group">
                                                    <div class="col-md-2">
                                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Examination
                                                            Remarks</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <textarea id="examsresults" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="checkbox-parent" class="col-md-12 form-group">
                                                <div class="row form-group">
                                                    <div class="col-md-2">
                                                        <div class="col-md-12 form-group">
                                                            <img class="img-thumbnail"
                                                                 style="width: 200px; height: 200px;"
                                                                 src=<?php echo e(asset('images/Lungs.png')); ?>>
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <img class="img-thumbnail"
                                                                 style="width: 200px; height: 200px;"
                                                                 src=<?php echo e(asset('images/xray.png')); ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row" style="margin-top: 30px;">
                                                            <div class="col-md-4">
                                                                <label><b>Minor findings</b></label>

                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox1"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox1"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
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
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox2"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox2"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
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
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox3"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox3"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p>2.1 Pleural capping with a smooth
                                                                                inferior border(&lt;1cm
                                                                                thick at all points)</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox4"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox4"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p>2.2 Unilateral or bilateral costophrenic
                                                                                angle
                                                                                blunting
                                                                                (below the horizontal)</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox5"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox5"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p>2.3 calcified nodule(s) in the hilum/
                                                                                mediastinum
                                                                                with no
                                                                                pulmonary granulomas</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-md-4">
                                                                <label><b>Minor Finding(occasionally assoclated with TB
                                                                        infection)</b></label>

                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox6"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox6"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p>3.1 Solitary granuloma(&lt;1cm and of any
                                                                                lobe) with
                                                                                an
                                                                                unremarkable hilum</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox7"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox7"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p>3.2 Solitary granuloma(&lt;1cm and of any
                                                                                lobe) with
                                                                                calcified/ enlarged hllar lymph
                                                                                nodes</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox8"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox8"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p>3.3 Single/ Multiple calcified pulmonary
                                                                                nodules/micronodules
                                                                                with distinct borders</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox9"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox9"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
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
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox10"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox10"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p>3.5 Costophrenic Angle blunting(either
                                                                                side above the
                                                                                horizontal)</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="col-md-4">
                                                                <label><b>Findings sometines seen in active TB(or other
                                                                        conditions)</b></label>

                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox11"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox11"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p>4.0 Notable apical pleural capping(rough
                                                                                or rangged
                                                                                inferior
                                                                                borderand/or_&gt;1cm thick at any
                                                                                point)</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox12"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox12"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p>4.1 Aplcal fbronodualar/ fibrocalcific
                                                                                lesions or
                                                                                apical
                                                                                microcalcifications</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox13"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox13"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p>4.2 Multiple/ single pulmonary nodules/
                                                                                micronodules(noncalcified or poorly
                                                                                defined)</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox14"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox14"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
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
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox15"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox15"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p>4.4 Single / Multiple pulmonary noduies/
                                                                                masses _&gt;1cm</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox16"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox16"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p>4.5 Non-calcified pleural fibrosos and/
                                                                                or
                                                                                effuslon</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox17"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox17"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p>4.6 Interstltial fbrosos/parenchymal lung
                                                                                disease/
                                                                                acute
                                                                                pulmoneary disease</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox18"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox18"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <p>4.7 Any cavitating lesion OR "fluffy" or
                                                                            "Soft"
                                                                            lesions felt
                                                                            likely to represent active TB</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                </div>


                                                            </div>

                                                            <div class="col-md-5">
                                                                <label><b>Other findings (describe the abnormality in
                                                                        descriptive
                                                                        findings/comments below)</b></label>

                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox19"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox19"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col">
                                                                            <p>Skeleton and soft tissue</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox20"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox20"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
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
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox21"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox21"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
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
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="rchkbox22"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                disabled
                                                                                                data-fouc=""></span>
                                                                                    </div>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <div
                                                                                        class="uniform-checker"><span><input
                                                                                                id="chkbox22"
                                                                                                type="checkbox"
                                                                                                class="form-check-input-styled chk"
                                                                                                data-fouc=""></span>
                                                                                    </div>
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
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label><span class="fa fa-hand-o-right"></span>&nbsp;
                                                                Comment</label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <textarea id="rad_comment2"
                                                                          class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-4">
                                                        <label><span
                                                                class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Chest
                                                            X-Ray</label>
                                                        <div class="form-group">
                                                            <select class="form-control" id="CXRay">
                                                                <option>Select</option>
                                                                <option selected>Normal</option>
                                                                <option>Abnormal</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 form-group" style="border: solid 1px black;">
                                                <div class="row form-group"></div>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <div class="row form-group">
                                                    <div class="col-md-12 row">
                                                        <div class="col-md-12">
                                                            <center><h4>History</h4></center>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h5><u>HIV</u></h5>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h5><u>Malaria</u></h5>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h5><u>Filaria</u></h5>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>1.Have you ever been tested for HIV, the virus that
                                                                    causes
                                                                    AIDS? </p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox70"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        

                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>2.Have you ever been screened for hepatitis or
                                                                    syphilis any time
                                                                    in the past?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox71"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>3.At any age have you engaged in casual unprotected
                                                                    oral,
                                                                    vaginal, or anal sex (with anyone other than spousal
                                                                    partner)
                                                                    ?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox72"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>4.If yes for 1.3: </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>i.have you used condom or any barrier methods?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox73"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>ii.Is he/she infected with sexually transmitted
                                                                    diseases? </p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox74"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>5.Does your partner engage in casual oral, vaginal,
                                                                    or anal sex
                                                                    with others ? </p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox75"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>i.have you used condom or any barrier methods?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox76"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>6.Have you ever received any injections with a
                                                                    potentially
                                                                    contaminated needle or syringe?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox77"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>7.Have you ever used drugs through shared needles
                                                                    ?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox78"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>8.Have you ever had sexual relationship with an
                                                                    injection drug
                                                                    user?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox79"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>9.Have you ever treated with blood or blood products
                                                                    ? </p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox80"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>If yes , do you know whether the blood or blood
                                                                    products have
                                                                    been tested for HIV ?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox81"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>10.Do you have tattoos or have undergone a tattoo
                                                                    with
                                                                    potentially contaminated tattoo needles or other
                                                                    skin-piercing
                                                                    instruments ?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox82"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>11.Are you a health care worker who come into contact
                                                                    with blood,
                                                                    blood products, unclean needles, or surgical
                                                                    instruments ?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox83"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>12.Were you born to a HIV infected mother ?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox84"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>13.Were you breast fed by a HIV infected mother ?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox85"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        


                                                    </div>

                                                    
                                                    <div class="col-md-4">
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>14. Do you have fever or had fever over the last one
                                                                    year ?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox86"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>15. Are you having headache, weakness, muscle pains
                                                                    and joint
                                                                    pains? </p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox87"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>16.Have travelled to or lived in a country with
                                                                    Malaria (endemic
                                                                    country) ?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox88"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>17. If yes; have you used insecticide-treated bed
                                                                    nets while in
                                                                    that country ?
                                                                </p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox89"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>18. Have you ever diagnosed with Malaria ?
                                                                </p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox90"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>19. If yes; have you undergone drug treatment ?

                                                                </p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox91"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>20. If yes; for how long have you been treated ?

                                                                </p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox92"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        

                                                    </div>
                                                    

                                                    <div class="col-md-4">
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>21. Have travelled to or lived in a country with
                                                                    Filariasis
                                                                    (endemic country) ?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox93"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>22. Have you ever diagnosed with Filariasis ?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox94"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>23. If yes; have you undergone drug treatment ?</p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox95"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p> 24. If yes; for how long have you been treated ?
                                                                </p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox96"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        

                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>25. Have you ever suffered from leg/ scrotal/ hand
                                                                    swelling in
                                                                    relation to Filariasis (Lymphoedema) ?
                                                                </p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox97"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        

                                                        
                                                        <div class="col-md-12 row">
                                                            <div class="col">
                                                                <p>26. Do you have dry cough and wheezing which worse at
                                                                    night?
                                                                </p>
                                                            </div>

                                                            <div class="col-1">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <div class="uniform-checker"><span><input
                                                                                    id="chkbox98"
                                                                                    type="checkbox"
                                                                                    class="form-check-input-styled chk"
                                                                                    data-fouc=""></span>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        


                                                    </div>


                                                </div>
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <div class="row form-group">
                                                    <div class="col-md-2">
                                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;DPP'S
                                                            Comment</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <textarea id="cm_dpp_comment"
                                                                      class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <div class="row form-group">
                                                    <div class="col-3">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <div class="uniform-checker"><span><input
                                                                            id="cm_order_sputum_sample"
                                                                            type="checkbox"
                                                                            class="form-check-input-styled"
                                                                            data-fouc=""></span></div>
                                                                <span>Order Sputum Sample</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <div class="row form-group">
                                                    <div class="col-md-3">
                                                        <label><span class="fa fa-calendar-times-o"></span>&nbsp;&nbsp;Day
                                                            #1</label>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input id="cm_day1" type="text"
                                                                       class="form-control dppicker">
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text"><span
                                                                            class="fa fa-calendar"></span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <div id="tableContainer" class="table-responsive"
                                                     style="display: none;">
                                                    <table
                                                        class="table table-bordered table-hover table-striped text-center"
                                                        id="rapidTestResultsTbl" style="">
                                                        <thead style="background-color: darkslategray;color: wheat;">
                                                        <tr>
                                                            <th style="display: none;"></th>
                                                            <th>No</th>
                                                            <th nowrap>Test</th>
                                                            <th nowrap>Result</th>
                                                            <th nowrap>Comment</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="rapidTestResultsTBody">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-md-12 form-group"
                                                 style="border: 2px solid black;padding: 20px;">
                                                <ul class="nav nav-pills nav-pills-bordered nav-pills-toolbar justify-content-center nav-justified"
                                                    id="controlPanelTabs" style="margin-top: 10px;">
                                                    <li class="nav-item"><a href="#referToIHU"
                                                                            class="nav-link legitRipple active show rounded-left-round"
                                                                            data-toggle="tab">CMO Approval</a></li>
                                                    <li class="nav-item"><a href="#referToER"
                                                                            class="nav-link legitRipple"
                                                                            data-toggle="tab">Emergency Referral</a>
                                                    </li>
                                                    <li class="nav-item"><a href="#referToDOC"
                                                                            class="nav-link legitRipple"
                                                                            data-toggle="tab">Duty of Care</a></li>


                                                </ul>


                                                <div class="panel-body">
                                                    <!--Tab Content Starts Here-->
                                                    <div id="" class="tab-content">

                                                        <!-- Refer To IHU -->
                                                        <div role="tabpanel" class="tab-pane active" id="referToIHU">
                                                            <div class="col-md-12">
                                                                <div id="validateDivAFC">
                                                                    <div class="col-md-12 form-group">
                                                                        <div class="row form-group">

                                                                            <div class="col-md-12 form-group">
                                                                                <ul class="nav nav-pills nav-pills-bordered nav-pills-toolbar justify-content-center nav-justified"
                                                                                    id="controlPanelTabs"
                                                                                    style="margin-top: 10px;">
                                                                                    <li class="nav-item"><a
                                                                                            href="#referToAFC"
                                                                                            class="nav-link legitRipple active show rounded-left-round"
                                                                                            data-toggle="tab">Refer
                                                                                            To
                                                                                            AFC</a></li>
                                                                                    <li class="nav-item"><a
                                                                                            href="#referToNSACP"
                                                                                            class="nav-link legitRipple"
                                                                                            data-toggle="tab">Refer
                                                                                            To NSACP
                                                                                            -( HIV )</a></li>
                                                                                    <li class="nav-item"><a
                                                                                            href="#referToMalaria"
                                                                                            class="nav-link legitRipple"
                                                                                            data-toggle="tab">Refer
                                                                                            to AMC</a></li>
                                                                                    <li class="nav-item"><a
                                                                                            href="#referToTB"
                                                                                            class="nav-link legitRipple"
                                                                                            data-toggle="tab">Refer
                                                                                            to NPTCCD</a></li>
                                                                                    <li class="nav-item"><a
                                                                                            href="#referToOther"
                                                                                            class="nav-link legitRipple rounded-right-round"
                                                                                            data-toggle="tab">Refer
                                                                                            To Other
                                                                                            Abnormalities</a></li>
                                                                                </ul>
                                                                                

                                                                                <div class="panel-body">
                                                                                    <!--Tab Content Starts Here-->
                                                                                    <div id="myTabContent"
                                                                                         class="tab-content">

                                                                                        <!-- Refer To AFC Tab -->
                                                                                        <div role="tabpanel"
                                                                                             class="tab-pane active"
                                                                                             id="referToAFC">
                                                                                            <div class="col-md-12">
                                                                                                <div
                                                                                                    id="validateDivAFC">
                                                                                                    <div
                                                                                                        class="col-md-12 form-group">
                                                                                                        <div
                                                                                                            class="row form-group">

                                                                                                            <div
                                                                                                                class="col-md-3">
                                                                                                                <label>&nbsp;&nbsp;Registration
                                                                                                                    No</label>
                                                                                                                <select
                                                                                                                    class="form-control"
                                                                                                                    id="regNoAFC"
                                                                                                                    name="regNoAFC"
                                                                                                                    validate="true"
                                                                                                                    error="* Registration No required."
                                                                                                                    onchange="checkValio();">
                                                                                                                    
                                                                                                                    
                                                                                                                    
                                                                                                                </select>
                                                                                                                <div
                                                                                                                    class="text-danger error"></div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-md-3">
                                                                                                                <label>&nbsp;&nbsp;Passport
                                                                                                                    No</label>
                                                                                                                <div
                                                                                                                    class="input-group">
                                                                                                                    <input
                                                                                                                        type="text"
                                                                                                                        class="form-control"
                                                                                                                        id="passNoAFC"
                                                                                                                        name="passNoAFC"
                                                                                                                        validate="true"
                                                                                                                        match="^.+$"
                                                                                                                        error="* Passport No required."
                                                                                                                        onkeyup="checkValio();">
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="text-danger error"></div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-md-3">
                                                                                                                <label>&nbsp;&nbsp;Refered</label>
                                                                                                                <div
                                                                                                                    class="input-group">
                                                                                                                    
                                                                                                                    <input
                                                                                                                        type="text"
                                                                                                                        class="form-control dppicker"
                                                                                                                        name="refferdAFC"
                                                                                                                        id="refferdAFC">
                                                                                                                    <div
                                                                                                                        class="input-group-append">
                                                                                                                        <div
                                                                                                                            class="input-group-text"><span
                                                                                                                                class="fa fa-calendar"></span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-md-3">
                                                                                                                <label>&nbsp;&nbsp;Test
                                                                                                                    Result</label>
                                                                                                                <select
                                                                                                                    class="form-control"
                                                                                                                    id="testResAFC"
                                                                                                                    name="testResAFC">
                                                                                                                    <option>
                                                                                                                        Select
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        value="Positive">
                                                                                                                        Positive
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        value="Negative">
                                                                                                                        Negative
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        value="N/A">
                                                                                                                        N/A
                                                                                                                    </option>
                                                                                                                </select>
                                                                                                            </div>

                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="row form-group">
                                                                                                            <div
                                                                                                                class="col-md-12">
                                                                                                                <label>&nbsp;&nbsp;Comment</label>
                                                                                                                <div
                                                                                                                    class="form-group">
                                                                                                                    <div
                                                                                                                        class="input-group">
                                                                <textarea class="form-control" id="commentAFC"
                                                                          name="commentAFC"></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="row form-group">
                                                                                                            <div
                                                                                                                class="col-md-12">
                                                                                                                <label>&nbsp;&nbsp;Remark</label>
                                                                                                                <div
                                                                                                                    class="form-group">
                                                                                                                    <div
                                                                                                                        class="input-group">
                                                                <textarea class="form-control" id="remarkAFC"
                                                                          name="remarkAFC"></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <br><br>
                                                                                                    <div
                                                                                                        class="col-md-12 form-group text-center">
                                                                                                        <?php if($readOnly != 'true'): ?>
                                                                                                            <button
                                                                                                                id="btnSaveAFCnew"
                                                                                                                class="btn btn-lg btn-default"
                                                                                                                style="width: 15rem;background-color: #a8a830;">
                                                                                                                Save
                                                                                                            </button>
                                                                                                        <?php endif; ?>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <!-- Refer To NSACP -( HIV ELISA) Tab -->
                                                                                        <div role="tabpanel"
                                                                                             class="tab-pane"
                                                                                             id="referToNSACP">
                                                                                            <div class="col-md-12">
                                                                                                <div
                                                                                                    id="validateDivNSACP">
                                                                                                    <div class="col">

                                                                                                        <div
                                                                                                            class="row form-group">
                                                                                                            <div
                                                                                                                class="col-md-12 row">
                                                                                                                <div
                                                                                                                    class="col-md-2">
                                                                                                                    <label><span
                                                                                                                            class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Registration
                                                                                                                        No</label>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-md-3">
                                                                                                                    <select
                                                                                                                        class="form-control selectTo"
                                                                                                                        id="regNoNSACP"
                                                                                                                        name="regNoNSACP"
                                                                                                                        validate="true"
                                                                                                                        error="* Registration No required."
                                                                                                                        onchange="checkValio();">
                                                                                                                        
                                                                                                                        
                                                                                                                        
                                                                                                                    </select>
                                                                                                                    <div
                                                                                                                        class="text-danger error"></div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="row form-group">
                                                                                                            <div
                                                                                                                class="col-md-12 row">
                                                                                                                <div
                                                                                                                    class="col-md-2">
                                                                                                                    <label><span
                                                                                                                            class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Passport
                                                                                                                        No</label>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-md-3">
                                                                                                                    <input
                                                                                                                        type="text"
                                                                                                                        class="form-control"
                                                                                                                        id="passNoNSACP"
                                                                                                                        name="passNoNSACP"
                                                                                                                        validate="true"
                                                                                                                        match="^.+$"
                                                                                                                        error="* Passport No required."
                                                                                                                        onkeyup="checkValio();"/>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="text-danger error"></div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="row form-group">
                                                                                                            <div
                                                                                                                class="col-md-12 row">
                                                                                                                <div
                                                                                                                    class="col-md-2">
                                                                                                                    <label><span
                                                                                                                            class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Refered</label>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-md-3">

                                                                                                                    <div
                                                                                                                        class="input-group">
                                                                                                                        <input
                                                                                                                            type="text"
                                                                                                                            class="form-control dppicker"
                                                                                                                            name="referedNSACP"
                                                                                                                            id='referedNSACP'>
                                                                                                                        <div
                                                                                                                            class="input-group-append">
                                                                                                                            <div
                                                                                                                                class="input-group-text"><span
                                                                                                                                    class="fa fa-calendar"></span>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="row form-group">
                                                                                                            <div
                                                                                                                class="col-md-12 row">
                                                                                                                <div
                                                                                                                    class="col-md-2">
                                                                                                                    <label><span
                                                                                                                            class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Remark</label>
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="col-md-5">
                                    <textarea class="form-control" rows="3" id="remarkNSACP" name="remarkNSACP">
                                    </textarea>

                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <br><br>
                                                                                                    <div
                                                                                                        class="col-md-12 form-group text-center">
                                                                                                        <?php if($readOnly != 'true'): ?>
                                                                                                            <button
                                                                                                                id="btnSaveNSACPnew"
                                                                                                                class="btn btn-lg btn-default"
                                                                                                                style="width: 15rem;background-color: #a8a830;">
                                                                                                                Save
                                                                                                            </button>
                                                                                                        <?php endif; ?>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <!--Refer To Malaria tab-->
                                                                                        <div role="tabpanel"
                                                                                             class="tab-pane"
                                                                                             id="referToMalaria">
                                                                                            <div class="col-md-12">
                                                                                                <div id="validateDivM">
                                                                                                    <div
                                                                                                        class="card-header">


                                                                                                        <div
                                                                                                            class="col">
                                                                                                            <div
                                                                                                                class="row form-group">
                                                                                                                <div
                                                                                                                    class="col-md-12 row">
                                                                                                                    <div
                                                                                                                        class="col-md-2">
                                                                                                                        <label><span
                                                                                                                                class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Registration
                                                                                                                            No</label>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-md-3">
                                                                                                                        <select
                                                                                                                            class="form-control selectTo"
                                                                                                                            id="regNoM"
                                                                                                                            name="regNoM"
                                                                                                                            validate="true"
                                                                                                                            error="* Registration No required."
                                                                                                                            onchange="checkValio();">
                                                                                                                            
                                                                                                                            
                                                                                                                            
                                                                                                                        </select>
                                                                                                                        <div
                                                                                                                            class="text-danger error"></div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div
                                                                                                                class="row form-group">
                                                                                                                <div
                                                                                                                    class="col-md-12 row">
                                                                                                                    <div
                                                                                                                        class="col-md-2">
                                                                                                                        <label><span
                                                                                                                                class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Passport
                                                                                                                            No</label>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-md-3">
                                                                                                                        <input
                                                                                                                            type="text"
                                                                                                                            class="form-control"
                                                                                                                            id="passNoM"
                                                                                                                            name="passNoM"
                                                                                                                            validate="true"
                                                                                                                            match="^.+$"
                                                                                                                            error="* Passport No required."
                                                                                                                            onkeyup="checkValio();"/>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="text-danger error"></div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                            <div
                                                                                                                class="row form-group">
                                                                                                                <div
                                                                                                                    class="col-md-12 row">
                                                                                                                    <div
                                                                                                                        class="col-md-2">
                                                                                                                        <label><span
                                                                                                                                class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Refered</label>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-md-3">

                                                                                                                        <div
                                                                                                                            class="input-group">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                class="form-control dppicker"
                                                                                                                                name="referedM"
                                                                                                                                id="referedM">
                                                                                                                            <div
                                                                                                                                class="input-group-append">
                                                                                                                                <div
                                                                                                                                    class="input-group-text"><span
                                                                                                                                        class="fa fa-calendar"></span>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="row form-group">
                                                                                                                <div
                                                                                                                    class="col-md-12 row">
                                                                                                                    <div
                                                                                                                        class="col-md-2">
                                                                                                                        <label><span
                                                                                                                                class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Test
                                                                                                                            Result</label>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-md-3">
                                                                                                                        
                                                                                                                        <select
                                                                                                                            class="form-control"
                                                                                                                            id="testResM"
                                                                                                                            name="testResM">
                                                                                                                            <option>
                                                                                                                                Select
                                                                                                                            </option>
                                                                                                                            <option
                                                                                                                                value="Positive">
                                                                                                                                Positive
                                                                                                                            </option>
                                                                                                                            <option
                                                                                                                                value="Negative">
                                                                                                                                Negative
                                                                                                                            </option>
                                                                                                                            
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="row form-group">
                                                                                                                <div
                                                                                                                    class="col-md-12 row">
                                                                                                                    <div
                                                                                                                        class="col-md-2">
                                                                                                                        <label><span
                                                                                                                                class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Comment</label>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-md-5">
                                    <textarea class="form-control" rows="3" id="commentM" name="commentM">
                                    </textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="row form-group">
                                                                                                                <div
                                                                                                                    class="col-md-12 row">
                                                                                                                    <div
                                                                                                                        class="col-md-2">
                                                                                                                        <label><span
                                                                                                                                class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Remark</label>
                                                                                                                    </div>
                                                                                                                    <div
                                                                                                                        class="col-md-5">
                                    <textarea class="form-control" rows="3" id="remarkM" name="remarkM">
                                    </textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>

                                                                                                        </div>

                                                                                                    </div>


                                                                                                    <div
                                                                                                        class="col-md-12 form-group text-center">
                                                                                                        <?php if($readOnly != 'true'): ?>
                                                                                                            <button
                                                                                                                id="btnSaveReferToMalarianew"
                                                                                                                class="btn btn-lg btn-default"
                                                                                                                style="width: 15rem;background-color: #a8a830;">
                                                                                                                Save
                                                                                                            </button>
                                                                                                        <?php endif; ?>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <!-- Refer To TB tab-->
                                                                                        <div role="tabpanel"
                                                                                             class="tab-pane"
                                                                                             id="referToTB">
                                                                                            <div class="col-md-12">
                                                                                                <div id="validateDivTB">
                                                                                                    <div
                                                                                                        class="col-md-12 form-group">
                                                                                                        <div
                                                                                                            class="row form-group">

                                                                                                            <div
                                                                                                                class="col-md-3">
                                                                                                                <label>&nbsp;&nbsp;Registration
                                                                                                                    No</label>
                                                                                                                <select
                                                                                                                    class="form-control selectTo"
                                                                                                                    id="regNoTB"
                                                                                                                    name="regNoTB"
                                                                                                                    validate="true"
                                                                                                                    error="* Registration No required."
                                                                                                                    onchange="checkValio();">
                                                                                                                    
                                                                                                                    
                                                                                                                    
                                                                                                                </select>
                                                                                                                <div
                                                                                                                    class="text-danger error"></div>
                                                                                                            </div>

                                                                                                            <div
                                                                                                                class="col-md-3">
                                                                                                                <label>&nbsp;&nbsp;Passport
                                                                                                                    No</label>
                                                                                                                <div
                                                                                                                    class="input-group">
                                                                                                                    <input
                                                                                                                        type="text"
                                                                                                                        class="form-control"
                                                                                                                        id="passNoTB"
                                                                                                                        name="passNoTB"
                                                                                                                        validate="true"
                                                                                                                        match="^.+$"
                                                                                                                        error="* Passport No required."
                                                                                                                        onkeyup="checkValio();">
                                                                                                                </div>
                                                                                                                <div
                                                                                                                    class="text-danger error"></div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-md-3">
                                                                                                                <label>&nbsp;&nbsp;Refered</label>
                                                                                                                <div
                                                                                                                    class="input-group">
                                                                                                                    
                                                                                                                    <input
                                                                                                                        type="text"
                                                                                                                        class="form-control dppicker"
                                                                                                                        name="refferdTB"
                                                                                                                        id="refferdTB">
                                                                                                                    <div
                                                                                                                        class="input-group-append">
                                                                                                                        <div
                                                                                                                            class="input-group-text"><span
                                                                                                                                class="fa fa-calendar"></span>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="col-md-3">
                                                                                                                <label>&nbsp;&nbsp;Test
                                                                                                                    Result</label>
                                                                                                                <select
                                                                                                                    class="form-control"
                                                                                                                    id="testResTB"
                                                                                                                    name="testResTB">
                                                                                                                    <option>
                                                                                                                        Select
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        value="Positive">
                                                                                                                        Positive
                                                                                                                    </option>
                                                                                                                    <option
                                                                                                                        value="Negative">
                                                                                                                        Negative
                                                                                                                    </option>
                                                                                                                    
                                                                                                                </select>
                                                                                                            </div>

                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="row form-group">
                                                                                                            <div
                                                                                                                class="col-md-12">
                                                                                                                <label>&nbsp;&nbsp;Comment</label>
                                                                                                                <div
                                                                                                                    class="form-group">
                                                                                                                    <div
                                                                                                                        class="input-group">
                                                                    <textarea class="form-control" id="commentTB"
                                                                              name="commentTB"></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="row form-group">
                                                                                                            <div
                                                                                                                class="col-md-12">
                                                                                                                <label>&nbsp;&nbsp;Remark</label>
                                                                                                                <div
                                                                                                                    class="form-group">
                                                                                                                    <div
                                                                                                                        class="input-group">
                                                                    <textarea class="form-control" id="remarkTB"
                                                                              name="remarkTB"></textarea>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>

                                                                                                    <br><br>
                                                                                                    <div
                                                                                                        class="col-md-12 form-group text-center">
                                                                                                        <?php if($readOnly != 'true'): ?>
                                                                                                            <button
                                                                                                                id="btnSaveReferToTBnew"
                                                                                                                class="btn btn-lg btn-default"
                                                                                                                style="width: 15rem;background-color: #a8a830;">
                                                                                                                Save
                                                                                                            </button>
                                                                                                        <?php endif; ?>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <!-- Refer To Other tab-->
                                                                                        <div role="tabpanel"
                                                                                             class="tab-pane"
                                                                                             id="referToOther">
                                                                                            <div class="col-md-12">
                                                                                                <div
                                                                                                    id="validateDivOther">
                                                                                                    <div
                                                                                                        class="col-md-12 form-group">

                                                                                                        <div
                                                                                                            class="row form-group">
                                                                                                            <div
                                                                                                                class="col-md-3">
                                                                                                                <lable><span
                                                                                                                        class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Registration
                                                                                                                    No
                                                                                                                </lable>
                                                                                                                <select
                                                                                                                    class="form-control selectTo"
                                                                                                                    id="regNoOther"
                                                                                                                    name="regNoOther"
                                                                                                                    validate="true"
                                                                                                                    error="* Registration No required."
                                                                                                                    onchange="checkValio();">
                                                                                                                    
                                                                                                                    
                                                                                                                    
                                                                                                                </select>
                                                                                                                <div
                                                                                                                    class="text-danger error"></div>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="row form-group">
                                                                                                            <div
                                                                                                                class="col-md-3">
                                                                                                                <lable><span
                                                                                                                        class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Doctor's
                                                                                                                    Name
                                                                                                                </lable>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    name="DoctorName"
                                                                                                                    id='DoctorName'
                                                                                                                    class="form-control"/>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="row form-group">
                                                                                                            <div
                                                                                                                class="col-md-3">
                                                                                                                <lable><span
                                                                                                                        class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Institute
                                                                                                                </lable>
                                                                                                                <input
                                                                                                                    type="text"
                                                                                                                    id="institute"
                                                                                                                    name="institute"
                                                                                                                    class="form-control"/>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                        <div
                                                                                                            class="row form-group">
                                                                                                            <div
                                                                                                                class="col-md-5">
                                                                                                                <lable><span
                                                                                                                        class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Remark
                                                                                                                </lable>
                                                                                                                <textarea
                                                                                                                    class="form-control"
                                                                                                                    rows="3"
                                                                                                                    id="remarkOther"
                                                                                                                    name="remarkOther"></textarea>
                                                                                                            </div>
                                                                                                        </div>

                                                                                                    </div>

                                                                                                    <br><br>
                                                                                                    <div
                                                                                                        class="col-md-12 form-group text-center">
                                                                                                        <?php if($readOnly != 'true'): ?>
                                                                                                            <button
                                                                                                                id="btnSaveReferToOther"
                                                                                                                class="btn btn-lg btn-default"
                                                                                                                style="width: 15rem; background-color: #a8a830;">
                                                                                                                Save
                                                                                                            </button>
                                                                                                        <?php endif; ?>
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
                                                        </div>

                                                        <!-- Refer To ER -->
                                                        <div role="tabpanel" class="tab-pane" id="referToER">
                                                            <div class="col-md-12">
                                                                <div id="">
                                                                    <div class="col">


                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        
                                                                        

                                                                        <div class="row form-group">
                                                                            <div class="col-md-12 row">
                                                                                <div class="col-md-2">
                                                                                    <label><span
                                                                                            class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Comment</label>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                <textarea class="form-control" rows="5"
                                                                          id="ERcomment"></textarea>
                                                                                </div>
                                                                                <div class="text-danger error"></div>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <br><br>
                                                                    <div class="col-md-12 form-group text-center">
                                                                        <?php if($readOnly != 'true'): ?>
                                                                            <button id="btnSaveReferToER"
                                                                                    class="btn btn-lg btn-default"
                                                                                    style="width: 15rem;background-color: #a8a830;">
                                                                                Save
                                                                            </button>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--Refer To DOC -->
                                                        <div role="tabpanel" class="tab-pane" id="referToDOC">
                                                            <div class="col-md-12">
                                                                <div id="validateDivM">
                                                                    <div class="card-header">


                                                                        <div class="col">

                                                                            
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            
                                                                            

                                                                            <div class="row form-group">
                                                                                <div class="col-md-12 row">
                                                                                    <div class="col-md-2">
                                                                                        <label><span
                                                                                                class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Comment</label>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                    <textarea class="form-control" rows="5"
                                                                              id="DOCcomment"></textarea>
                                                                                    </div>
                                                                                    <div
                                                                                        class="text-danger error"></div>
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>


                                                                    <div class="col-md-12 form-group text-center">
                                                                        <?php if($readOnly != 'true'): ?>
                                                                            <button id="btnSaveReferToDOC"
                                                                                    class="btn btn-lg btn-default"
                                                                                    style="width: 15rem;background-color: #a8a830;">
                                                                                Save
                                                                            </button>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <input type="hidden" id="oldSpu" value="">

                                        <div class="col-md-12 form-group text-center">
                                            <a href='javascript:void(0);' class="btn-lg btn-danger btn3d"
                                               id="printRadiologistReport" style="">Print
                                                Radiologist Report</a>
                                            <a href='javascript:void(0);' class="btn-lg btn-success btn3d" id="Tempsave"
                                               style="">Temporary
                                                Save</a>
                                            <a href='javascript:void(0);' class="btn-lg btn-success btn3d" id="save"
                                               style="">Complete
                                                Consultation</a>
                                            <a href='javascript:void(0);' class="btn-lg btn-info btn3d" id="print"
                                               style="">Print
                                                Summary</a>
                                            <a href='javascript:void(0);' class="btn-lg btn-warning btn3d"
                                               id="printCertificate1">Print
                                                Certificate 1</a>
                                            <a href='javascript:void(0);' class="btn-lg btn-warning btn3d"
                                               id="printCertificate2">Print
                                                Certificate 2</a>
                                        </div>
                                    </div>

                                </div>
                                <br><br>
                                <div class="col-md-12 form-group text-center">
                                    <?php if($readOnly != 'true'): ?>
                                        <button id="btnSaveIHUReco" class="btn btn-lg btn-success" style="width: 15rem">
                                            Save
                                        </button>
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <!-- /dashboard content -->

            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <!--JS files-->
    <script src="<?php echo e(asset('plugins/jqueryUI/jquery-ui-timepicker.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('jsPages/IHURecommendation.js')); ?>" type="text/javascript"></script>
    <script>
        var urlPath = '<?php echo e(url('/')); ?>';
        var imgPath = '<?php echo e(url('/tempFileUpload/photoBoothFiles')); ?>';
        var imgPathBlade = '<?php echo e(url('images/')); ?>';
        var fingerPrintPath = '<?php echo e(url('/tempFileUpload/')); ?>';
        const usergroup = "<?php echo e(Session::get('userGroup')); ?>";
        var usergroupname = ("<?php echo e(Session::get('GroupName')); ?>").replace('Consultation Counter', '');
        $('#curCounter').text(usergroupname)
    </script>
    <script>
        function checkValio() {
            validate('#validateDiv');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\IOM\resources\views/pages/ihuRecommendation.blade.php ENDPATH**/ ?>