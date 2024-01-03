@extends('layout')

@section('title', 'Pending Tokens')

@section('header')

@endsection

@section('content')

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Pending
                    Tokens
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Pending Tokens</span>
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
                            <div class="progressBar"></div>
                            <div class="card-body">
                                <div class="row">

                                <div class="col-1"></div>
                                    <div class="col-2">
                                        <table class="table table-bordered table-hover text-center">
                                            <thead>
                                            <tr>
                                                <th>Registration Pending Tokens</th>
                                            </tr>
                                            </thead>
                                            <tbody id="regPendingTokenTbody">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-2">
                                        <table class="table table-bordered table-hover text-center">
                                            <thead>
                                            <tr>
                                                <th>Vitals Pending Tokens</th>
                                            </tr>
                                            </thead>
                                            <tbody id="vitalsPendingTokenTbody">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-2">
                                        <table class="table table-bordered table-hover text-center">
                                            <thead>
                                            <tr>
                                                <th>CXR Pending Tokens</th>
                                            </tr>
                                            </thead>
                                            <tbody id="cxrPendingTokenTbody">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-2">
                                        <table class="table table-bordered table-hover text-center">
                                            <thead>
                                            <tr>
                                                <th>Phlebotomy Pending Tokens</th>
                                            </tr>
                                            </thead>
                                            <tbody id="phlPendingTokenTbody">

                                            </tbody>
                                        </table>
                                    </div>
                                   
                                    <div class="col-2">
                                        <table class="table table-bordered table-hover text-center">
                                            <thead>
                                            <tr>
                                                <th>Consultation Pending Tokens</th>
                                            </tr>
                                            </thead>
                                            <tbody id="conPendingTokenTbody">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-1"></div>

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
    <script src="{{asset('js/progressbar.js')}}" type="text/javascript"></script>
    <script src="{{asset('jsPagesMhac/MhacPendingTokens.js')}}" type="text/javascript"></script>
    <script>
        var imgPathBlade = '{{url('images/')}}';
    </script>
@endsection


