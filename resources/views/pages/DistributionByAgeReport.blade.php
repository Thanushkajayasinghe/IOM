@extends('layout')

@section('title', 'Distribution By Age Report')

@section('header')
    <style>
        .dataTables_wrapper {
            width: 95% !important;
        }

        #TBodyBarcodeList tr td:nth-child(5){
            color: #3b82c1;
            font-weight: bold;
            font-size: 12px;
        }

        #TBodyBarcodeList tr td:nth-child(8){
            color: #3b82c1;
            font-weight: bold;
            font-size: 12px;
        }

        #TBodyBarcodeList tr td:nth-child(11){
            color: #3b82c1;
            font-weight: bold;
            font-size: 12px;
        }
    </style>
@endsection

@section('content')

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>Distribution By Age Report
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{ url('/home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Distribution By Age Report</span>
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

                        <div class="row justify-content-center form-group">
                            <div class="col-sm-3">
                                <label>Date From: </label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepickerSe" readonly id="barcodeDateFrom">
                                    <div class="input-group-append" for="barcodeDateFrom">
                                        <div class="input-group-text"><span class="fa fa-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label>Date To: </label>
                                <div class="input-group">
                                    <input type="text" class="form-control datepickerSe" readonly id="barcodeDateTo">
                                    <div class="input-group-append" for="barcodeDateTo">
                                        <div class="input-group-text"><span class="fa fa-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">                                
                                <button type="button" id="btnSearch" class="btn btn-warning btn-sm" style="position: absolute;bottom: 2px;"><span class="fa fa-search"></span></button>
                            </div>
                        </div>

                        <div class="row justify-content-center" id="rtyu" style="margin-top: 50px;">

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
    <script src="{{asset('jsPages/DistibutionByAgeReport.js')}}" type="text/javascript"></script>
@endsection

