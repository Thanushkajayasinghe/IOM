@extends('layout')
@section('title', 'Control Panel')

@if($readWrite == 'true' || $readOnly == 'true')

@section('header')
<link href="{{asset('css/strength-meter.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/iziToast.min.css')}}" rel="stylesheet" type="text/css" />
<style>
    .image-upload>input {
        display: none;
    }

    .image-upload img {
        width: 80px;
        cursor: pointer;
    }

    .kv-verdict>.label {
        background: white !important;
    }

    .list-group {
        overflow: hidden;
        border-left: 1px solid rgb(221, 221, 221);
        border-right: 1px solid rgb(221, 221, 221);
    }

    .list-group-item:first-child,
    .list-group-item:last-child {
        border-top-right-radius: 0px;
        border-top-left-radius: 0px;
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 0px;
        overflow: hidden;
    }

    .list-group-item {
        border-left: 0px solid rgb(221, 221, 221);
        border-right: 0px solid rgb(221, 221, 221);
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        -ms-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .list-group-item>.show-menu {
        position: absolute;
        height: 100%;
        width: 24px;
        top: 0px;
        right: 0px;
        background-color: rgba(51, 51, 51, 0.2);
        cursor: pointer;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        -ms-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .list-group-item>.show-menu>span {
        position: absolute;
        top: 50%;
        margin-top: -7px;
        padding: 0px 5px;
    }

    .list-group-submenu {
        position: absolute;
        top: 0px;
        right: -88px;
        white-space: nowrap;
        list-style: none;
        padding-left: 0px;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        -ms-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .list-group-submenu .list-group-submenu-item {
        float: right;
        white-space: nowrap;
        display: block;
        padding: 10px 15px;
        margin-bottom: -1px;
        background-color: rgb(51, 51, 51);
        color: rgb(235, 235, 235);
    }

    .list-group-item.open {
        margin-left: -88px;
    }

    .list-group-item.open>.show-menu {
        right: 88px;
    }

    .list-group-item.open .list-group-submenu {
        right: 0px;
    }

    .list-group-submenu .list-group-submenu-item.primary {
        color: rgb(255, 255, 255);
        background-color: rgb(50, 118, 177);
    }

    .list-group-submenu .list-group-submenu-item.success {
        color: rgb(255, 255, 255);
        background-color: rgb(92, 184, 92);
    }

    .list-group-submenu .list-group-submenu-item.info {
        color: rgb(255, 255, 255);
        background-color: rgb(57, 179, 215);
    }

    .list-group-submenu .list-group-submenu-item.warning {
        color: rgb(255, 255, 255);
        background-color: rgb(240, 173, 78);
    }

    .list-group-submenu .list-group-submenu-item.danger {
        color: rgb(255, 255, 255);
        background-color: rgb(217, 83, 79);
    }

    .ActiveClaz {
        background-color: gainsboro;
    }

    .hideCell {
        display: none;
    }

    .btn-xs {
        padding: .25rem .4rem;
        font-size: .875rem;
        line-height: .5;
        border-radius: .2rem;
    }

    .table td {
        padding: 0.2rem 1.25rem;
    }

    .list-group-item {
        border: 1px;
        border-bottom: 1px solid #d2c5c5;
        padding: .62rem 1.25rem;
    }
</style>
@endsection

@section('content')

<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Control Panel
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Control Panel</span>
            </div>
        </div>
    </div>
</div>


<div class="page-content pt-0">

    <!-- Main content -->
    <div class="content-wrapper">

        <div class="content">
            <div class="card border-y-2 border-top-slate border-bottom-slate rounded-0">
                <div class="card-header">
                    <h6 class="card-title"><span class="font-weight-semibold"></span></h6>
                </div>
                <div class="card-body">
                    {{--<div class="panel-heading" style="background-color: #47B49D; border-radius: 3px 3px 0 0;">--}}
                        <!--Tabs Starts Here-->
                        <ul class="nav nav-pills nav-pills-bordered nav-pills-toolbar justify-content-center nav-justified"
                            id="controlPanelTabs">
                            <li class="nav-item"><a href="#newUserGroup"
                                    class="nav-link legitRipple active show rounded-left-round" data-toggle="tab"><span
                                        class="fa fa-users"></span>&nbsp;&nbsp;New User Group</a></li>
                            <li class="nav-item"><a href="#userDetails" class="nav-link legitRipple"
                                    data-toggle="tab"><span class="fa fa-vcard"></span>&nbsp;&nbsp;User Details</a></li>
                            <li class="nav-item"><a href="#loginDetails" class="nav-link legitRipple"
                                    data-toggle="tab"><span class="fa fa-user-plus"></span>&nbsp;&nbsp;Login Details</a>
                            </li>
                            {{--<li class="nav-item"><a href="#loginHistory" class="nav-link legitRipple" --}}
                                    {{--data-toggle="tab"><span--}} {{--class="fa fa-history"></span>&nbsp;&nbsp;Login
                                        History</a></li>--}}
                            <li class="nav-item"><a href="#userPermission"
                                    class="nav-link legitRipple rounded-right-round" data-toggle="tab"><span
                                        class="fa fa-id-badge"></span>&nbsp;&nbsp;User Permission</a></li>
                        </ul>
                        {{--
                    </div>--}}

                    <div class="panel-body">
                        <!--Tab Content Starts Here-->
                        <div id="myTabContent" class="tab-content">

                            <!-- New User Group Tab -->
                            <div role="tabpanel" class="tab-pane active" id="newUserGroup">
                                <form action="" id="userGroupFrm">
                                    <div class="col-md-8">
                                        <div class="form-horizontal">
                                            <div class="form-group">
                                                <label for="groupID" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;Group
                                                    Id:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="txtgroupID" type="text"
                                                        validate="true" match="^.+$" error="* Group Id required."
                                                        onkeyup="checkVali();">
                                                    <div class="text-danger error"></div>
                                                    <select id="drpgroupID" name="drpgroupID" class="form-control"
                                                        style="display: none;">
                                                        <option disabled="disabled" selected="selected">Select
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="userGrpName" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;User Group
                                                    Name:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="userGrpName" type="text"
                                                        validate="true" match="^.+$" error="* User Group Name required."
                                                        onkeyup="checkVali();">
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="grpStatus" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;Status:</label>
                                                <div class="col-sm-9">
                                                    <select id="grpStatus" name="grpStatus" class="form-control"
                                                        validate="true" error="* Group Status required."
                                                        onchange="checkVali()">
                                                        <option disabled="disabled" selected="selected">Select
                                                        </option>
                                                        <option>Active</option>
                                                        <option>Inactive</option>
                                                    </select>
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>

                                            <div class="form-group" style="border-top: 1px solid #ddd1d1;">
                                                <center style="margin-top: 20px;">
                                                    <button type="button" class="btn btn-info" id="grpRefresh"><span
                                                            class="fa fa-refresh"></span>&nbsp;New
                                                    </button>
                                                    @if($readOnly != 'true')
                                                    <button type="button" class="btn btn-success" id="grpSave"><span
                                                            class="fa fa-floppy-o"></span>&nbsp;Save
                                                    </button>
                                                    @endif
                                                    <button type="button" class="btn btn-warning" id="grpLookup"
                                                        data-toggle="modal" data-target=".userGroupLookup"><span
                                                            class="fa fa-search"></span>&nbsp;Lookup
                                                    </button>

                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!-- User Deatils Tab -->
                            <div role="tabpanel" class="tab-pane" id="userDetails">
                                {{--<form action="" id="userDetForm">--}}
                                    <div class="col-md-12 form-group row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtUserId" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;User
                                                    Id:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="txtUserId" name="txtUserId"
                                                        type="text" validate="true" match="^.+$"
                                                        error="* User Id required." onkeyup="checkvali3();">
                                                    <div class="text-danger error"></div>
                                                    <select id="drpuserID" name="drpuserID" class="form-control"
                                                        style="display: none;">
                                                        <option disabled="disabled" selected="selected">Select
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="drpTitle" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;Title:</label>
                                                <div class="col-sm-9">
                                                    <select id="drpTitle" name="drpTitle" class="form-control"
                                                        validate="true" error="* Title required."
                                                        onchange="checkvali3();">
                                                        <option disabled="disabled" selected="selected">Select
                                                        </option>
                                                        <option>Dr.</option>
                                                        <option>Mr.</option>
                                                        <option>Mrs.</option>
                                                        <option>Miss.</option>
                                                        <option>Ms.</option>
                                                    </select>
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtFirstName" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;First
                                                    Name:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="txtFirstName" name="txtFirstName"
                                                        type="text" validate="true" match="^.+$"
                                                        error="* First Name required." onkeyup="checkvali3();">
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtLastName" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;Last
                                                    Name:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="txtLastName" name="txtLastName"
                                                        type="text" validate="true" match="^.+$"
                                                        error="* Last Name required." onkeyup="checkvali3();">
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="txtEmail" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;E-mail:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="txtEmail" name="txtEmail"
                                                        type="text" validate="true" match="^.+$"
                                                        error="* E-mail required." onkeyup="checkvali3();">
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtTelNo" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;Tel
                                                    No:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="txtTelNo" name="txtTelNo"
                                                        type="text" validate="true" match="^$|^[0-9]{10}$"
                                                        error="* Wrong Telephone no" onkeyup="checkvali3();">
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtUserAddress" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;Address:</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" id="txtUserAddress"
                                                        name="txtUserAddress"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="drpUserStatus" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;Status:</label>
                                                <div class="col-sm-9">
                                                    <select id="drpUserStatus" name="drpUserStatus" class="form-control"
                                                        validate="true" error="* Status required."
                                                        onchange="checkvali3();">
                                                        <option disabled="disabled" selected="selected">Select
                                                        </option>
                                                        <option>Active</option>
                                                        <option>Inactive</option>
                                                    </select>
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                    <div class="col-md-12 form-group text-center">
                                        {{--<center style="margin-top: 20px;">--}}
                                            {{--<input type="hidden" class="form-control" id="serialHidden" --}}
                                                {{--name="serialHidden" value="">--}}
                                            <button type="button" class="btn btn-info" id="userRefresh"><span
                                                    class="fa fa-refresh"></span>&nbsp;New
                                            </button>
                                            @if($readOnly != 'true')
                                            <button type="button" class="btn btn-success" id="userSave"><span
                                                    class="fa fa-floppy-o"></span>&nbsp;Save
                                            </button>
                                            @endif
                                            <button type="button" class="btn btn-warning" id="userLookUp"><span
                                                    class="fa fa-search"></span>&nbsp;Lookup
                                            </button>

                                            {{--
                                        </center>--}}
                                    </div>
                                    {{--
                                </form>--}}
                            </div>

                            <!--Login Details-->
                            <div role="tabpanel" class="tab-pane" id="loginDetails">
                                <form action="" id="loginDet">
                                    <div class="col-md-8">
                                        <div class="form-horizontal" id="LoginDetailsTapPane">
                                            <div class="form-group">
                                                <label for="drpLogDetUser" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;User:</label>
                                                <div class="col-sm-9">
                                                    <select id="drpLogDetUser" name="drpLogDetUser" class="form-control"
                                                        validate="true" error="* User required."
                                                        onchange="checkvali4();">
                                                        <option disabled="disabled" selected="selected">Select
                                                        </option>
                                                    </select>
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtLogDetUserName" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;User
                                                    Name:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="txtEmailLogin" name="txtEmailLogin"
                                                        type="text" validate="true" match="^.+$"
                                                        error="* E-mail required." onkeyup="checkvali4();">
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtLogDetFloor" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;Floor:</label>
                                                <div class="col-sm-9">
                                                    <select id="drpLogDetFloor" name="drpLogDetFloor"
                                                        class="form-control" error="* Floor required."
                                                        onchange="checkvali4();">
                                                        <option disabled="disabled" selected="selected">Select</option>
                                                        <option value="9">9<sup>th</sup> Floor</option>
                                                        <option value="11">11<sup>th</sup> floor</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtLogDetFloor" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;Counter:</label>
                                                <div class="col-sm-9">
                                                    <select id="drpSelectCounter" name="drpSelectCounter"
                                                        class="form-control">
                                                        <option disabled="disabled" selected="selected">Select</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="drpLogDetUserGroup" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;User
                                                    Group:</label>
                                                <div class="col-sm-9">
                                                    <select id="drpLogDetUserGroup" name="drpLogDetUserGroup"
                                                        class="form-control" validate="true"
                                                        error="* User Group required." onchange="checkvali4();">
                                                        <option disabled="disabled" selected="selected">Select
                                                        </option>
                                                    </select>
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none;" id="showHidePwd">
                                                <label for="txtLogDetCurrPassword" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;Current
                                                    Password:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="txtLogDetCurrPassword"
                                                        name="txtLogDetCurrPassword" type="password" validate="false"
                                                        match="^[0-9A-Za-z]+$" error="*Current Password required."
                                                        onkeyup="checkvali4();">
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtLogDetPassword" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;<span class="newPwd"
                                                        style="display: none;">New</span>&nbsp;Password:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="txtLogDetPassword"
                                                        name="txtLogDetPassword" type="password" validate="false"
                                                        match="^[0-9A-Za-z]+$" error="* Password required."
                                                        onkeyup="checkvali4();">
                                                    <div class="text-danger error"></div>
                                                    <div style="padding-bottom: 5px;color: darkcyan;">-- Good
                                                        Password Should,
                                                    </div>
                                                    <div class="conditions" id="eight-plus"><span
                                                            class="fa fa-check"></span>&nbsp;Minimum 8
                                                        characters long.
                                                    </div>
                                                    <div class="conditions" id="uppercase"><span
                                                            class="fa fa-check"></span>&nbsp;Contains
                                                        uppercase
                                                        letters.
                                                    </div>
                                                    <div class="conditions" id="lowercase"><span
                                                            class="fa fa-check"></span>&nbsp;Contains
                                                        lowercase
                                                        letters.
                                                    </div>
                                                    <div class="conditions" id="numbers"><span
                                                            class="fa fa-check"></span>&nbsp;Contains
                                                        numbers.
                                                    </div>
                                                    <div class="conditions" id="punctuation"><span
                                                            class="fa fa-check"></span>&nbsp;Contains
                                                        punctuation.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtLogDetConPassword" class="col-sm-3 control-label"
                                                    style="text-align: left;"><span
                                                        class='fa fa-hand-o-right'></span>&nbsp;Confirm
                                                    <span class="newPwd" style="display: none;">New
                                                    </span>Password:</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" id="txtLogDetConPassword"
                                                        name="txtLogDetConPassword" type="password" validate="false"
                                                        match="^[0-9A-Za-z]+$" error="* Confirm Password required."
                                                        onkeyup="checkvali4();">
                                                    <div class="text-danger error"></div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <p class="wrongPwd text-danger"></p>
                                                    <p class="NotMatchPwd text-danger"></p>
                                                </div>
                                            </div>
                                            <div class="form-group" style="border-top: 1px solid #ddd1d1;">
                                                <center style="margin-top: 20px;">
                                                    <input type="hidden" class="form-control" id="serialHiddenLD"
                                                        name="serialHiddenLD">
                                                    <button type="button" class="btn btn-info" id="loginRefresh">
                                                        <span class="fa fa-refresh"></span>&nbsp;New
                                                    </button>
                                                    @if($readOnly != 'true')
                                                    <button type="button" class="btn btn-success" id="loginSave">
                                                        <span class="fa fa-floppy-o"></span>&nbsp;Save
                                                    </button>
                                                    @endif

                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <!--User Permission-->
                            <div role="tabpanel" class="tab-pane" id="userPermission">
                                <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12 pull-left">
                                    <div class="paneld panel-default" style="max-height: 500px; overflow: auto;">
                                        <div class="panel-heading" style="border: 1px solid #ddd; text-align: center">
                                            <strong>UserGroup
                                                Name</strong>
                                        </div>
                                        <ul class="list-group" id="userGroupPanelBody" style="padding: 0;">
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9 col-lg-9 col-xs-12 col-sm-12 pull-right"
                                    style="max-height: 500px; overflow: auto;">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-striped" style="border: 1px solid #ddd;"
                                            id="logTable">
                                            <thead style="background-color: antiquewhite;">
                                                <tr>
                                                    <th class="hideCell"
                                                        style="text-align: center; border-right: 1px solid #ddd;">
                                                        Permission
                                                    </th>
                                                    <th style="text-align: left;">File Name</th>
                                                    <th class="hideCell" style="text-align: center;">Read Only</th>
                                                    <th class="hideCell" style="text-align: center;">Read & Write</th>
                                                    <th style="display: none;"></th>
                                                    <th style="display: none;"></th>
                                                </tr>
                                            </thead>
                                            @if($readOnly != 'true')
                                            <tbody id="userPermissionTbody">
                                            </tbody>
                                            @endif
                                        </table>
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
<script src="{{asset('js/iziToast.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/jqueryUI/jquery-ui-timepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('jsPages/ControlPanel.js')}}" type="text/javascript"></script>
<script src="{{asset('js/strength-meter.min.js')}}" type="text/javascript"></script>

<script>
    function checkVali() {
        validate('#newUserGroup');
    }

    function checkvali3() {
        validate('#userDetails');
    }

    function checkvali4() {
        validate('#loginDetails');
    }


    $(document).on('mouseover', '.list-group-item', function (event) {
        event.preventDefault();
        $(this).closest('li').addClass('open');
    });
    $(document).on('mouseout', '.list-group-item', function (event) {
        event.preventDefault();
        $(this).closest('li').removeClass('open');
    });


    $(document).on('click', '.list-group-item', function () {
        $('.hideCell').show();
        $('.hideCell').attr('style', 'text-align: center; display: table-cell;border-right: 1px solid rgb(221, 221, 221);');
    });

    $('#selectAll').click(function (event) {
        if (this.checked) {
            $('.chkBoxSelect').each(function () {
                this.checked = true;
            });
        } else {
            $('.chkBoxSelect').each(function () {
                this.checked = false;
            });
        }
    });
</script>
@endsection

@endif