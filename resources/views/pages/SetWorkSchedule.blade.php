@extends('layout')

@section('title', 'Set Work Schedule')

@if($readWrite =='true')

@section('header')
<link href="{{asset('css/setWorkSchedule.css')}}" rel="stylesheet" type="text/css" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
    .rna-table__tr .rna-table__td:last-of-type {
        border-right: 1px solid #d9d9d9
    }

    .ui-datepicker .ui-datepicker-calendar td.ui-datepicker-current-day .ui-state-active {
        color: #333;
        background-color: white !important;
    }

    #calenderPanelSel .ui-datepicker-prev,
    #calenderPanelSel .ui-datepicker-next {
        display: none;
    }

    #calenderPanelSel .ui-datepicker-prev,
    #calenderPanelSel .ui-datepicker-next {
        display: block !important;
    }

    .highlightHoliday {
        background-color: #e38b8b;
        border-radius: 20px;
    }

    .ui-datepicker-title {
        font-family: Segoe Print !important;
        font-size: 1.2rem !important;
    }

    .ui-datepicker-today {
        background-color: cadetblue !important;
        border-radius: 4px;
    }

    .ui_tpicker_unit_hide {
        display: none;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .btn-secondary.active {
        background: #8e4c4c;
    }

    .selectedDateWorkSchedule {
        background: #17acac;
        border: 3px solid black;
    }

    .Closed {
        background: #9b1f1f;
        border-radius: 22px;
    }

    .Closed span {
        color: floralwhite !important;
        border: none !important;
    }

    td {
        position: relative;
    }

    td[title]:hover:after {
        content: attr(title);
        position: absolute;
        top: -70%;
        left: -10%;
        border: 1px solid black;
        background: black;
        color: white;
        z-index: 10000 !important;
        border-radius: 18px;
        padding: 1px 5px;
        width: 120% !important;
    }
</style>
@endsection

@section('content')

<!-- Page content -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - SET WORK
                SCHEDULE
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">SET WORK SCHEDULE
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

            <div class="card border-y-2 border-top-slate border-bottom-slate rounded-0">
                <div class="card-header">
                    <h6 class="card-title"><span class="font-weight-semibold"></span></h6>
                </div>
                <div class="card-body">

                    <div class="row justify-content-center form-group">
                        <div class="col-md-3">
                            <label for="drpYear">Year</label>
                            <select id='drpYear' class="form-control text-center">
                                <option value='' disabled="disabled" selected>--Select Year--</option>
                            </select>
                        </div>
                    </div>


                    <ul class="nav nav-pills nav-pills-bordered nav-pills-toolbar justify-content-center nav-justified">
                        <li class="nav-item"><a href="#WorkingSchdule" class="nav-link legitRipple active show rounded-left-round" data-toggle="tab">Working Schedule</a></li>
                        <li class="nav-item"><a href="#HolidayCalender" class="nav-link legitRipple" data-toggle="tab">Holiday Calender</a></li>
                        <li class="nav-item"><a href="#MasterSettings" class="nav-link legitRipple" data-toggle="tab">Master Settings</a></li>
                        <li class="nav-item"><a href="#ManageSchedule" class="nav-link legitRipple" data-toggle="tab">Manage Schedule</a></li>
                        <li class="nav-item"><a href="#ChaWebNote" class="nav-link legitRipple rounded-right-round" data-toggle="tab">Change Web Site Notice</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="WorkingSchdule">
                            <div class="row justify-content-center form-group" style="margin-top: 40px;">
                                <div class="col-md-3">
                                    <label for="drpMonth">Month</label>
                                    <select id='drpMonth' class="form-control text-center">
                                        <option value='' disabled="disabled" selected="selected">--Select Month--
                                        </option>
                                        <option value='1'>January</option>
                                        <option value='2'>February</option>
                                        <option value='3'>March</option>
                                        <option value='4'>April</option>
                                        <option value='5'>May</option>
                                        <option value='6'>June</option>
                                        <option value='7'>July</option>
                                        <option value='8'>August</option>
                                        <option value='9'>September</option>
                                        <option value='10'>October</option>
                                        <option value='11'>November</option>
                                        <option value='12'>December</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-12">

                                    <div class="rna-matrix-outer-container">
                                        <div id="js-rna-matrix-view" class="rna-matrix-container" data-render-id="rna-matrix">
                                            <div class="rna-matrix-inner-container js-scroll-target">
                                                <div class="rna-table rna-matrix">
                                                    <div class="rna-table__tbody rna-room js-observe-visibility" data-render-id="rna-room-block" data-room-id="124006801">

                                                        <div class="rna-room__anchor"></div>

                                                        <div class="rna-table__tr rna-room__info" style="background-color: aliceblue;">

                                                        </div>

                                                        <div class="rna-table__tr rna-room__month">

                                                        </div>

                                                        <div class="rna-table__tr rna-room__dates">

                                                        </div>

                                                        <div class="rna-table__tr rna-room__status">

                                                        </div>

                                                        <div class="rna-table__tr rna-room__noofregappointments">

                                                        </div>

                                                        <div class="rna-table__tr rna-room__noofpriorityappointments">

                                                        </div>

                                                        <div class="rna-table__tr rna-room__noofsputumcollections">

                                                        </div>

                                                        <div class="rna-table__tr rna-room__noofvisaextentions">

                                                        </div>

                                                        <div class="rna-table__tr rna-matrix__spacer"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="tab-pane fade" id="HolidayCalender">
                            <div class="row justify-content-center align-items-center form-group" style="margin-top: 60px;">
                                <p style="font-size: 1rem;">Disable Dates</p>
                                <p>
                                    <button type="button" id="disableSat" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round legitRipple" style="margin-left: 20px;margin-top: 5px;"><b><img src="{{asset('images/saturday.png')}}" style="width: 20px;position: relative;top: -2px;"></b> Saturday
                                    </button>
                                    <button type="button" id="disableSun" class="btn bg-teal-400 btn-labeled btn-labeled-left rounded-round legitRipple" style="margin-left: 20px;margin-top: 5px;"><b><img src="{{asset('images/sunday.png')}}" style="width: 20px;position: relative;top: -2px;"></b> Sunday
                                    </button>
                                </p>
                            </div>
                            <div class="row justify-content-center form-group" style="margin-top: 60px;">
                                <div class="col-md-3 col-12 dateHolder" attr-mon="January" id="datepickerJanuary"></div>
                                <div class="col-md-3 col-12 dateHolder" attr-mon="February" id="datepickerFebruary"></div>
                                <div class="col-md-3 col-12 dateHolder" attr-mon="March" id="datepickerMarch"></div>
                                <div class="col-md-3 col-12 dateHolder" attr-mon="April" id="datepickerApril"></div>
                                <div class="col-md-3 col-12 dateHolder" attr-mon="May" id="datepickerMay"></div>
                                <div class="col-md-3 col-12 dateHolder" attr-mon="June" id="datepickerJune"></div>
                                <div class="col-md-3 col-12 dateHolder" attr-mon="July" id="datepickerJuly"></div>
                                <div class="col-md-3 col-12 dateHolder" attr-mon="August" id="datepickerAugust"></div>
                                <div class="col-md-3 col-12 dateHolder" attr-mon="September" id="datepickerSeptember"></div>
                                <div class="col-md-3 col-12 dateHolder" attr-mon="October" id="datepickerOctomber"></div>
                                <div class="col-md-3 col-12 dateHolder" attr-mon="November" id="datepickerNovember"></div>
                                <div class="col-md-3 col-12 dateHolder" attr-mon="December" id="datepickerDecember"></div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="MasterSettings">
                            <div class="row" style="margin-top: 60px;">

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col row form-group align-items-center">
                                                <label for="txtNoOfRegularAppointments" class="col-6"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                                    Default No Of Regular Appointments :</label>
                                                <div class="col-6">
                                                    <input id="txtNoOfRegularAppointments" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col row form-group align-items-center">
                                                <label for="txtNoOfPriorityAppointments" class="col-6"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                                    Default No Of Priority Appointments :</label>
                                                <div class="col-6">
                                                    <input id="txtNoOfPriorityAppointments" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col row form-group align-items-center">
                                                <label for="txtNoOfSputumCollections" class="col-6"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                                    Default No Of Sputum Collections :</label>
                                                <div class="col-6">
                                                    <input id="txtNoOfSputumCollections" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col row form-group align-items-center">
                                                <label for="txtNoOfVisaExtensions" class="col-6"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                                    Default No Of Visa Extensions :</label>
                                                <div class="col-6">
                                                    <input id="txtNoOfVisaExtensions" type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="col row form-group align-items-center" style="display: none;">
                                                <label for="txtTimeSlotForOneUser" class="col-6"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                                    Time Slot Per One User (Minutes) :</label>
                                                <div class="col-6">
                                                    <input id="txtTimeSlotForOneUser" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col row form-group align-items-center" style="display: none;">
                                                <label for="txtRegStartTime" class="col-6"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                                    Times Slots :</label>
                                                <div class="col-6">
                                                    <input id="txtRegStartTime" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col row form-group align-items-center">
                                                <label for="txtRegEndTime" class="col-6"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                                    Users Per slot :</label>
                                                <div class="col-6">
                                                    <input id="txtRegEndTime" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col row form-group align-items-center">
                                                <label for="txtEffectiveDate" class="col-6"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                                    Effective Date :</label>
                                                <div class="col-6">
                                                    <input id="txtEffectiveDate" readonly type="text" class="form-control dppicker">
                                                </div>
                                            </div>
                                            <div class="col row form-group align-items-center">
                                                <label for="txtTokenExpTime" class="col-6"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                                    Token Expire Time :</label>
                                                <div class="col-6">
                                                    <input id="txtTokenExpTime" type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col row form-group align-items-center">
                                                <label for="txtTokenExpTime" class="col-6"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                                    Radiology Validation :</label>
                                                <div class="col-6">
                                                    <label class="switch">
                                                        <input type="checkbox" id="radiologyValidation" checked>
                                                        <span class="slider round"></span>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
                                        <input type="hidden" id="hiddenIdMasterSettings">
                                        <button type="button" id="mastersettingssave" class="btn btn-outline-success legitRipple">
                                            <span class="fa fa-floppy-o"></span>&nbsp; Save
                                        </button>
                                        <button type="button" id="loadCurrentSettings" class="btn btn-outline-warning legitRipple">
                                            <span class="fa fa-cogs"></span>&nbsp; Load Current Settings
                                        </button>
                                        <button type="button" id="btnClear" class="btn btn-outline-primary legitRipple">
                                            <span class="fa fa-refresh"></span>&nbsp; New
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="ManageSchedule">
                            <div class="row" style="margin-top: 60px;">
                                <div class="col-md-4">
                                    <h2>Disable Whole Day</h2>
                                    <div class="col-md-12 text-center" style="display: none;">
                                        <select id="drpChangeType" class="form-control">
                                            <option value="wholeDay">Whole Day</option>
                                        </select>
                                    </div>

                                    <div id="calenderPanelSel" class="form-group" style="border: 2px solid black; margin-top: 16px;"></div>

                                    <div class="row" style="margin-top: 60px;">
                                        <div class="col-12">
                                            <div class="text-center">
                                                <button type="button" id="saveManageSchedule" class="btn btn-outline-success legitRipple">
                                                    <span class="fa fa-floppy-o"></span>&nbsp; Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 offset-md-1">
                                    <h2>Disable Time Slot</h2>

                                    <div class="col-md-12 row">
                                        <div class="col-6 form-group">
                                            <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                                Start Date* :</label>
                                            <input id="txtDateStartDate" type="text" class="form-control chgDate datepicker">
                                        </div>

                                        <div class="col-6 form-group">
                                            <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                                End Date* :</label>
                                            <input id="txtDateEndDate" type="text" class="form-control chgDate datepicker">
                                        </div>
                                    </div>

                                    <div class="col-md-12 row">
                                        <div class="col-12 form-group">
                                            <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                                Users Per slot (If empty default will be taken) :</label>
                                            <input id="txtMembers" type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="max-height: 200px; overflow: auto;">
                                        <table class="table table-bordered table-condensed table-striped table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th>Disable Time Slot</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody id="timeContainer">

                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row" style="margin-top: 60px;">
                                        <div class="col-12">
                                            <div class="text-center">
                                                <button type="button" id="saveManageScheduleTime" class="btn btn-outline-success legitRipple">
                                                    <span class="fa fa-floppy-o"></span>&nbsp; Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                        <div class="tab-pane fade" id="ChaWebNote">
                            <div class="row" style="margin-top: 60px;">

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col row form-group">
                                                <label class="col-1"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                                                    Title :</label>
                                                <div class="col-6">
                                                    <input id="titleweb" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col row form-group ">
                                                <textarea id="summernote" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
                                        <button type="button" id="saveUpdateWebNotice" class="btn btn-outline-success legitRipple">
                                            <span class="fa fa-floppy-o"></span>&nbsp; Save
                                        </button>
                                        <button type="button" id="loadContent" class="btn btn-outline-warning legitRipple">
                                            <span class="fa fa-cogs"></span>&nbsp; Load Content
                                        </button>
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

@endsection

@section('scripts')
<!--JS files-->
<script src="{{asset('plugins/fullCalender/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/twix.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/notifications/noty.min.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{asset('plugins/jqueryUI/jquery-ui-timepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('jsPages/SystemConfigurations.js')}}" type="text/javascript"></script>
@endsection

@endif