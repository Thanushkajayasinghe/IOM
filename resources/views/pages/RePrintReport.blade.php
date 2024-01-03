@extends('layout')

@section('title', 'Re Print Report')

@if($readWrite == 'true' || $readOnly == 'true')

@section('header')

@endsection

@section('content')

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>Re Print Report</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{ url('/home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Re Print Report</span>
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
                        <div id="pvali">
                            <div class="col-md-12 form-group row">
                                <div class="col-md-2">
                                    <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Appointment No</label>

                                </div>

                                <div class="col-md-3">

                                    <select class="form-control selectTo" id="appno" match="^.+$" validate="true" error="* App No required">

                                        <option selected="selected" value="">--Select--</option>

                                    </select>

                                </div>


                                <div class="col-md-7 panel panel-info">

                                    <div class="col-md-12 panelname" style="display: none;"> <label><b>Name :</b> </label> <span id="appname"></span> </div>
                                    <div class="col-md-4 panelname" style="display: none;">  <label><b>Time &nbsp;:</b> </label> <span id="apptime"></span>  </div>
                                    <div class="col-md-4 panelname" style="display: none;"> <label><b>Date &nbsp;&nbsp;:</b> </label> <span id="appdate"></span>  </div>

                                </div>


                            </div>




                            <div class="col-md-12 form-group row">
                                <div class="col-md-2">
                                    <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Payment Counter</label>

                                </div>

                                <div class="col-md-3">

                                    <button id="paymentCounter" class="btn-success btn-graygreen btn-lg btn3d btn-block" type="button" >Re Print</button>

                                </div>

                            </div>



                            <div class="col-md-12 form-group row">
                                <div class="col-md-2">
                                    <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Radiologist Reporting</label>

                                </div>

                                <div class="col-md-3">

                                    <button id="RadiologistReporting" class="btn-success btn-graygreen btn-lg btn3d btn-block" type="button" >Re Print</button>

                                </div>

                            </div>


                            <div class="col-md-12 form-group row">
                                <div class="col-md-2">
                                    <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Consultant Print Report</label>

                                </div>

                                <div class="col-md-3">

                                    <button id="ConsultantPtint" class="btn-success btn-graygreen btn-lg btn3d btn-block" type="button" >Re Print</button>

                                </div>

                            </div>



                            <div class="col-md-12 form-group row">
                                <div class="col-md-2">
                                    <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Consultant Print Summery</label>

                                </div>

                                <div class="col-md-3">

                                    <button id="ConsultantSummery" class="btn-success btn-graygreen btn-lg btn3d btn-block" type="button" >Re Print</button>

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
    <!--JS files-->

    <script src="{{asset('plugins/jqueryUI/jquery-ui-timepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('jsPages/RePrintReport.js')}}" type="text/javascript"></script>
@endsection
@endif
