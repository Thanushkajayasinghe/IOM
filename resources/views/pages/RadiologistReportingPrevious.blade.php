@extends('layout')

@section('title', 'Radiologists Reporting')

@if($readWrite == 'true')
@section('header')
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

        .hidePanel {
            display: none;
        }
    </style>
@endsection
@section('content')
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
                    <div class="card-header"></div>

                    <div class="card-body">



                        <ul class="nav nav-pills nav-pills-bordered nav-pills-toolbar justify-content-center nav-justified"
                            id="panelTabs">
                            <li class="nav-item"><a href="#schedule"
                                                    class="nav-link legitRipple active show rounded-left-round"
                                                    data-toggle="tab"><span
                                            class="fa fa-users"></span>&nbsp;&nbsp;Schedule</a>
                            </li>
                            <li class="nav-item"><a href="#reviewed" class="nav-link legitRipple"
                                                    data-toggle="tab"><span
                                            class="fa fa-vcard"></span>&nbsp;&nbsp;Reviewed</a>
                            </li>
                            <li class="nav-item"><a href="#completed"
                                                    class="nav-link legitRipple rounded-right-round"
                                                    data-toggle="tab"><span
                                            class="fa fa-id-badge"></span>&nbsp;&nbsp;Completed</a>
                            </li>
                        </ul>

                        <div class="panel-body">
                            <!--Tab Content Starts Here-->
                            <div id="myTabContent" class="tab-content">

                                <!-- Schedule Tab -->
                                <div role="tabpanel" class="tab-pane active" id="schedule">
                                    <div class="col-md-12">
                                        <div class="col-md-12 form-group">
                                            <div class="row justify-content-center"
                                                 style="font-size: 1rem;text-align: center;">
                                                <div class="col-md-12">
                                                    <div class="card card-table">
                                                        <table class="table table-bordered" id="tblCxrComplete">
                                                            <thead>
                                                            <tr>
                                                                <th style="background-color: #f98469"></th>
                                                                <th style="background-color: #f98469">Token No</th>
                                                                <th style="background-color: #f98469">Appointment No</th>
                                                                <th style="background-color: #f98469">Passport No</th>
                                                                <th style="background-color: #f98469">Full Name</th>
                                                                <th style="background-color: #f98469">Date Of Birth</th>
                                                                <th style="background-color: #f98469">Gender</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="appbody">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Reviewed Tab -->
                                <div role="tabpanel" class="tab-pane" id="reviewed">
                                    <div class="col-md-12">
                                        <div class="col-md-12 form-group">
                                            <div class="row justify-content-center"
                                                 style="font-size: 1rem;text-align: center;">
                                                <div class="col-md-12">
                                                    <div class="card card-table">
                                                        <table class="table table-bordered" id="tblReviwed">
                                                            <thead>
                                                            <tr>
                                                                <th style="background-color: #f98469"></th>
                                                                <th style="background-color: #f98469">Token No</th>
                                                                <th style="background-color: #f98469">Appointment No</th>
                                                                <th style="background-color: #f98469">Passport No</th>
                                                                <th style="background-color: #f98469">Full Name</th>
                                                                <th style="background-color: #f98469">Date Of Birth</th>
                                                                <th style="background-color: #f98469">Gender</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="reviewedappbody">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Completed Tab -->
                                <div role="tabpanel" class="tab-pane" id="completed">
                                    <div class="col-md-12">
                                        <div class="col-md-12 form-group">
                                            <div class="row justify-content-center"
                                                 style="font-size: 1rem;text-align: center;">
                                                <div class="col-md-12">
                                                    <div class="card card-table">
                                                        <table class="table table-bordered" id="tblRadioComplete">
                                                            <thead>
                                                            <tr>
                                                                <th style="background-color: #f98469"></th>
                                                                <th style="background-color: #f98469">Token No</th>
                                                                <th style="background-color: #f98469">Appointment No</th>
                                                                <th style="background-color: #f98469">Passport No</th>
                                                                <th style="background-color: #f98469">Full Name</th>
                                                                <th style="background-color: #f98469">Date Of Birth</th>
                                                                <th style="background-color: #f98469">Gender</th>
                                                                <th style="background-color: #f98469">Comment</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="appbodyComplete">
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

                    </div>
                </div>

            </div>


        </div>
    </div>
    <!-- /page content -->
@endsection


@section('scripts')
    <script>
        var urlPath = '{{url('/')}}';
    </script>
    <script src={{asset('jsPages/RadiologistReportingPrevious.js')}} type="text/javascript"></script>
@endsection
@endif
