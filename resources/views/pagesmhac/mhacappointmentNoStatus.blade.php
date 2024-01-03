@extends('layout')

@section('title', 'Appointment No Status')

@section('header') 
    <link href="{{asset('css/3dbuttons.css')}}" rel="stylesheet" type="text/css">
    <style>
        .tooltipx {
            position: relative;
        }

        .tooltipx .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 95%;
            left: 50%;
            margin-left: -60px;
        }

        .tooltipx .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: black transparent transparent transparent;
        }

        .tooltipx:hover .tooltiptext {
            visibility: visible;
        }
    </style>
@endsection

@section('content')

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Appointment
                    No Status
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Appointment No Status</span>
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
                <div class="row" style="height: 5px;">
                    <div class="col">
                        <div id="pendingStat">

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <div class="col-12 text-center">
                            <button type="button" id="btnRefresh" class="btn-info" style="padding: 6px 16px;"><span
                                    class="fa fa-refresh"></span>&nbsp;&nbsp;Refresh
                            </button>
                        </div>
                        <div class="col-12">
                            <table id="tableCoN"
                                   class="table table-bordered table-hover table-striped text-center dataTable">
                                <thead>
                                <tr>
                                    <th rowspan="2">
                                        Token No
                                    </th>
                                    <th rowspan="2">
                                        Appointment No
                                    </th>
                                    <th colspan="8">
                                        Status
                                    </th>
                                </tr>
                                <tr>
                                    <th>Registration</th>
                                    <th>Payment</th>
                                    <th>Vitals</th>
                                    <th>CXR</th>
                                    <th>Phlebotomy</th>
                                    <th>Lab</th>
                                    <th>Consultation</th>
                                </tr>
                                </thead>
                                <tbody id="appNoStatTbody">

                                </tbody>
                            </table>
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
    <script src="{{asset('js/progressbar.js')}}" type="text/javascript"></script>
    <script src="{{asset('jsPagesMhac/MhacAppointmentNoStatus.js')}}" type="text/javascript"></script>
    <script>
        var imgPathBlade = '{{url('images/')}}';


    </script>
@endsection


