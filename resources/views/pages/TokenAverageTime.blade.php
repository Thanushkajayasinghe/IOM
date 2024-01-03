@extends('layout')

@section('title', 'DIE')
@if($readWrite == 'true')

@section('header')

@endsection

@section('content')

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Token Average
                    Time
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Token Average Time</span>
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

                <div class="card border-y-2 border-top-slate border-bottom-slate rounded-0">
                    <div class="card-header">
                        <h6 class="card-title"><span class="font-weight-semibold"></span></h6>
                    </div>
                    <div class="card-body">

                        <!-- Content area -->
                        <div class="col-md-12 form-group">
                            <div class="row">


                                <div class="col-md-2">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Date From: </label>
                                    <input type="text" class="form-control dppicker " readonly id="txtDateFrom">
                                </div>


                                <div class="col-md-1" style="position: relative;">
                                    <button type="button" id="btnSearch" class="btn btn-warning btn-sm"
                                            style="position: absolute;bottom: 4px;"><span
                                            class="fa fa-search"></span></button>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="table-responsive">
                                    <table id="tblAvgTime" class="table table-bordered table-hover table-striped text-center">



                                    </table>
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
    <script src={{asset('jsPages/TimeDifference.js')}} type="text/javascript"></script>
    <script type="text/javascript">
        var imgPathBlade = '{{url('images/')}}';
    </script>
@endsection

@endif
