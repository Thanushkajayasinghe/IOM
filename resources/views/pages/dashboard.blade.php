@extends('layout')

@section('title', 'Dashboard')

@section('header')
    <style>
        #currentlyIssuedProg {

            width: 30px;
            height: 30px;
        }

        .counterRow .qqq:not(:nth-child(1)) {
            border-left: 2px solid #17810b;
        }
    </style>
@endsection

@section('content')


    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Dashboard
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Dashboard
                </span>
                </div>
            </div>
        </div>
    </div>


    <!-- Page content -->
    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Dashboard content -->

                <div class="card border-y-2 border-top-slate border-bottom-slate rounded-0">
                    <div class="card-header">
                        <h6 class="card-title"><span class="font-weight-semibold"></span></h6>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">

                            <div class="col-10 form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-xl-3">
                                        <div class="card card-body bg-blue-400 has-bg-image">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h3 class="mb-0" style="font-weight: bolder;" id="totalQueue"></h3>
                                                    <span class="text-uppercase font-size-sm">Total Queue</span>
                                                </div>

                                                <div class="ml-3 align-self-center">
                                                    <i class="icon-stack-text icon-3x opacity-75"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xl-3">
                                        <div class="card card-body bg-indigo-400 has-bg-image">
                                            <div class="media">
                                                <div class="media-body">
                                                    <div class="row">
                                                        <h3 style="font-weight: bolder;display: flex;" class="col-3">
                                                            <span id="currentlyIssuedForToday"></span>
                                                        </h3>
                                                        <span id="currentlyIssuedProg" style="width: 6px;"
                                                              class="col-4"></span>
                                                    </div>
                                                    <span class="text-uppercase font-size-sm">Currently Issued</span>
                                                </div>

                                                <div class="mr-3 align-self-center">
                                                    <i class="icon-stack-play icon-3x opacity-75"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xl-3">
                                        <div class="card card-body bg-success-400 has-bg-image">
                                            <div class="media">
                                                <div class="media-body">
                                                    <div class="row">
                                                        <h3 style="font-weight: bolder;" class="col-3">
                                                            <span id="currentlyServedForToday"></span>
                                                        </h3>
                                                        <span id="currentlyServedProg" style="width: 6px;"
                                                              class="col-4"></span>
                                                    </div>
                                                    <span class="text-uppercase font-size-sm">Currently Completed</span>
                                                </div>

                                                <div class="ml-3 align-self-center">
                                                    <i class="icon-stack-check icon-3x opacity-75"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xl-3">
                                        <div class="card card-body bg-danger-400 has-bg-image">
                                            <div class="media">
                                                <div class="media-body">
                                                    <div class="row">
                                                        <h3 style="font-weight: bolder;" class="col-3">
                                                            <span id="notAvailableList"></span>
                                                        </h3>
                                                        <span id="notAvailableProg" style="width: 6px;"
                                                              class="col-4"></span>
                                                    </div>
                                                    <span class="text-uppercase font-size-sm">Not Available</span>
                                                </div>

                                                <div class="mr-3 align-self-center">
                                                    <i class="icon-stack-cancel icon-3x opacity-75"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-10 form-group">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card border-success">
                                            <div
                                                class="card-header alpha-success text-success-800 border-bottom-success header-elements-inline">
                                                <span class="currentTokensCounUpdateProg" style="width: 24px;"></span>
                                                <h6 class="card-title">Current Token - Registration Counters</h6>
                                                <div class="header-elements">
                                                    <div class="list-icons">
                                                        <a class="list-icons-item" data-action="collapse"></a>
                                                        <a class="list-icons-item" data-action="reload"></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="card card-body">
                                                    <div class="row counterRow text-center" style="margin-top: 16px;">

                                                        <div class="col-2 qqq">
                                                            <p>
                                                                <span id="regCou1"
                                                                      style="border: 3px solid green;padding: 10px 24px;border-radius: 20px;font-size: 16px;font-weight: bold;">-</span>
                                                            </p>
                                                            <h5 class="font-weight-semibold mb-0">Registration</h5>
                                                            <span class="text-muted font-size-sm">Counter 1</span>
                                                        </div>

                                                        <div class="col-2 qqq">
                                                            <p>
                                                                <span id="regCou2"
                                                                      style="border: 3px solid green;padding: 10px 24px;border-radius: 20px;font-size: 16px;font-weight: bold;">-</span>
                                                            </p>
                                                            <h5 class="font-weight-semibold mb-0">Registration</h5>
                                                            <span class="text-muted font-size-sm">Counter 2</span>
                                                        </div>

                                                        <div class="col-2 qqq">
                                                            <p>
                                                                <span id="regCou3"
                                                                      style="border: 3px solid green;padding: 10px 24px;border-radius: 20px;font-size: 16px;font-weight: bold;">-</span>
                                                            </p>
                                                            <h5 class="font-weight-semibold mb-0">Registration</h5>
                                                            <span class="text-muted font-size-sm">Counter 3</span>
                                                        </div>

                                                        <div class="col-2 qqq">
                                                            <p>
                                                                <span id="regCou4"
                                                                      style="border: 3px solid green;padding: 10px 24px;border-radius: 20px;font-size: 16px;font-weight: bold;">-</span>
                                                            </p>
                                                            <h5 class="font-weight-semibold mb-0">Registration</h5>
                                                            <span class="text-muted font-size-sm">Counter 4</span>
                                                        </div>

                                                        <div class="col-2 qqq">
                                                            <p>
                                                                <span id="regCou5"
                                                                      style="border: 3px solid green;padding: 10px 24px;border-radius: 20px;font-size: 16px;font-weight: bold;">-</span>
                                                            </p>
                                                            <h5 class="font-weight-semibold mb-0">Registration</h5>
                                                            <span class="text-muted font-size-sm">Counter 5</span>
                                                        </div>

                                                        <div class="col-2 qqq">
                                                            <p>
                                                                <span id="regCou6"
                                                                      style="border: 3px solid green;padding: 10px 24px;border-radius: 20px;font-size: 16px;font-weight: bold;">-</span>
                                                            </p>
                                                            <h5 class="font-weight-semibold mb-0">Registration</h5>
                                                            <span class="text-muted font-size-sm">Counter 6</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-10 form-group">
                                <div class="row">

                                    <div class="col-7">
                                        <div class="card border-warning">
                                            <div
                                                class="card-header alpha-warning text-warning-800 border-bottom-warning header-elements-inline">
                                                <span class="currentTokensCounUpdateCounselling" style="width: 24px;"></span>
                                                <h6 class="card-title">Current Token/s - Counselling Counters</h6>
                                                <div class="header-elements">
                                                    <div class="list-icons">
                                                        <a class="list-icons-item" data-action="collapse"></a>
                                                        <a class="list-icons-item" data-action="reload"></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="card card-body">
                                                    <div class="row counterRow text-center" style="margin-top: 16px;">

                                                        <div class="col-6 qqq">
                                                            <p>
                                                                <span id="counCou1"
                                                                      style="border: 3px solid green;padding: 10px 24px;border-radius: 20px;font-size: 16px;font-weight: bold;">-</span>
                                                            </p>
                                                            <h5 class="font-weight-semibold mb-0">Counselling</h5>
                                                            <span class="text-muted font-size-sm">Counter 1</span>
                                                        </div>

                                                        <div class="col-6 qqq">
                                                            <p>
                                                                <span id="counCou2"
                                                                      style="border: 3px solid green;padding: 10px 24px;border-radius: 20px;font-size: 16px;font-weight: bold;">-</span>
                                                            </p>
                                                            <h5 class="font-weight-semibold mb-0">Counselling</h5>
                                                            <span class="text-muted font-size-sm">Counter 2</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-5">
                                        <div class="card border-primary">
                                            <div
                                                class="card-header alpha-primary text-primary-800 border-bottom-primary header-elements-inline">
                                                <span class="currentTokensCounUpdateCXR" style="width: 24px;"></span>
                                                <h6 class="card-title">Current Token - CXR Counters</h6>
                                                <div class="header-elements">
                                                    <div class="list-icons">
                                                        <a class="list-icons-item" data-action="collapse"></a>
                                                        <a class="list-icons-item" data-action="reload"></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="card card-body">
                                                    <div class="row counterRow text-center" style="margin-top: 16px;">

                                                        <div class="col-6 qqq">
                                                            <p>
                                                                <span id="cxrCou1"
                                                                      style="border: 3px solid green;padding: 10px 24px;border-radius: 20px;font-size: 16px;font-weight: bold;">-</span>
                                                            </p>
                                                            <h5 class="font-weight-semibold mb-0">CXR</h5>
                                                            <span class="text-muted font-size-sm">Counter 1</span>
                                                        </div>

                                                        <div class="col-6 qqq">
                                                            <p>
                                                                <span id="cxrCou2"
                                                                      style="border: 3px solid green;padding: 10px 24px;border-radius: 20px;font-size: 16px;font-weight: bold;">-</span>
                                                            </p>
                                                            <h5 class="font-weight-semibold mb-0">CXR</h5>
                                                            <span class="text-muted font-size-sm">Counter 2</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-10 form-group">
                                <div class="row">

                                    <div class="col-5">
                                        <div class="card border-info">
                                            <div
                                                class="card-header alpha-info text-info-800 border-bottom-info header-elements-inline">
                                                <span class="currentTokensCounUpdatePhlebotomy" style="width: 24px;"></span>
                                                <h6 class="card-title">Current Token/s - Phlebotomy Counters</h6>
                                                <div class="header-elements">
                                                    <div class="list-icons">
                                                        <a class="list-icons-item" data-action="collapse"></a>
                                                        <a class="list-icons-item" data-action="reload"></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="card card-body">
                                                    <div class="row counterRow text-center" style="margin-top: 16px;">

                                                        <div class="col-6 qqq">
                                                            <p>
                                                                <span id="phlCou1"
                                                                      style="border: 3px solid green;padding: 10px 24px;border-radius: 20px;font-size: 16px;font-weight: bold;">-</span>
                                                            </p>
                                                            <h5 class="font-weight-semibold mb-0">Phlebotomy</h5>
                                                            <span class="text-muted font-size-sm">Counter 1</span>
                                                        </div>

                                                        <div class="col-6 qqq">
                                                            <p>
                                                                <span id="phlCou2"
                                                                      style="border: 3px solid green;padding: 10px 24px;border-radius: 20px;font-size: 16px;font-weight: bold;">-</span>
                                                            </p>
                                                            <h5 class="font-weight-semibold mb-0">Phlebotomy</h5>
                                                            <span class="text-muted font-size-sm">Counter 2</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-7">
                                        <div class="card border-dark">
                                            <div
                                                class="card-header alpha-dark text-dark-800 border-bottom-dark header-elements-inline">
                                                <span class="currentTokensCounUpdateConsultation" style="width: 24px;"></span>
                                                <h6 class="card-title">Current Token - Consultation Counters</h6>
                                                <div class="header-elements">
                                                    <div class="list-icons">
                                                        <a class="list-icons-item" data-action="collapse"></a>
                                                        <a class="list-icons-item" data-action="reload"></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="card card-body">
                                                    <div class="row counterRow text-center" style="margin-top: 16px;">

                                                        <div class="col-3 qqq">
                                                            <p>
                                                                <span id="conCou1"
                                                                      style="border: 3px solid green;padding: 10px 24px;border-radius: 20px;font-size: 16px;font-weight: bold;">-</span>
                                                            </p>
                                                            <h5 class="font-weight-semibold mb-0">Consultation</h5>
                                                            <span class="text-muted font-size-sm">Counter 1</span>
                                                        </div>

                                                        <div class="col-3 qqq">
                                                            <p>
                                                                <span id="conCou2"
                                                                      style="border: 3px solid green;padding: 10px 24px;border-radius: 20px;font-size: 16px;font-weight: bold;">-</span>
                                                            </p>
                                                            <h5 class="font-weight-semibold mb-0">Consultation</h5>
                                                            <span class="text-muted font-size-sm">Counter 2</span>
                                                        </div>

                                                        <div class="col-3 qqq">
                                                            <p>
                                                                <span id="conCou3"
                                                                      style="border: 3px solid green;padding: 10px 24px;border-radius: 20px;font-size: 16px;font-weight: bold;">-</span>
                                                            </p>
                                                            <h5 class="font-weight-semibold mb-0">Consultation</h5>
                                                            <span class="text-muted font-size-sm">Counter 3</span>
                                                        </div>

                                                        <div class="col-3 qqq">
                                                            <p>
                                                                <span id="conCou4"
                                                                      style="border: 3px solid green;padding: 10px 24px;border-radius: 20px;font-size: 16px;font-weight: bold;">-</span>
                                                            </p>
                                                            <h5 class="font-weight-semibold mb-0">Consultation</h5>
                                                            <span class="text-muted font-size-sm">Counter 4</span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-10 form-group"
                                 style="margin-top: 30px;border: 1px solid;padding: 12px;border-radius: 16px;">
                                <div class="row">
                                    <div class="col" id="mapContainer"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- /dashboard content -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

@section('scripts')
    <script src="http://code.highcharts.com/maps/highmaps.js"></script>
    <script src="http://code.highcharts.com/mapdata/custom/world.js"></script>
    <script src="{{asset('js/progressbar.js')}}" type="text/javascript"></script>
    <script src="{{asset('jsPages/dashboard.js')}}" type="text/javascript"></script>
@endsection

@endsection
