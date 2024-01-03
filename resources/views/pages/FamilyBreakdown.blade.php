@extends('layout')

@section('title', 'Family Breakdown')

@section('header')

@endsection

@section('content')

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Family
                    Breakdown
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Family Breakdown</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Page content -->
    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <div class="content">
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-12 form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label><span class="fa fa-hand-o-right"></span>&nbsp;Appointment
                                                    No</label>
                                                <select id="dropMainUserAppointmentNo" class="form-control selectTo">
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label><span class="fa fa-hand-o-right"></span>&nbsp;Appointment
                                                    Date</label>
                                                <input type="text" id="appDate" class="form-control" readonly style="pointer-events: none;background: #eee;border: 1px solid cadetblue;"/>
                                            </div>
                                            <div class="col-md-3">
                                                <label><span class="fa fa-hand-o-right"></span>&nbsp;Appointment
                                                    Time</label>
                                                <input type="text" id="appTime" class="form-control" readonly style="pointer-events: none;background: #eee;border: 1px solid cadetblue;"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <div class="row" id="memContainer">

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row justify-content-center">
                                            <button id="separate" type="button" class="btn btn-success"><span class="fa fa-user"></span>&nbsp;&nbsp;Separate</button>
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

    <!--JS files-->
    <script src="{{asset('jsPages/FamilyBreakdown.js')}}" type="text/javascript"></script>
    <script>
        var imgPathBlade = '{{url('images/')}}';
    </script>
@endsection


