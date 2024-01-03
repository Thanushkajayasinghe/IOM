@extends('layout')

@section('title', 'User Signature')

@if($readWrite == 'true' || $readOnly == 'true')


@section('header')
    <style>


        .wrapper {
            position: relative;
            width: 120%;
            height: 200px;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .signature-pad {
            position: absolute;
            left: 0;
            top: 0;
            width: 85%;
            height: 200px;
            background-color: white;
        }


    </style>
@endsection

@section('content')

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - User
                    Signature
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Floor Manager</span>
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
                <div class="card">
                    <div class="card-header">
                        <div id="valifrm">

                            <div class="col-md-12 form-group">
                                <div class="row form-group">

                                    <div class="col-md-4">
                                        <label>&nbsp;&nbsp;User Name :</label>
                                        <input id="Uun" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label>&nbsp;&nbsp;Password :</label>
                                        <input id="Upw" type="password" class="form-control">
                                    </div>
                                    <div class="col-md-2" style="margin-top: 2%;">
                                        <button id="Vbtn" type="button" class="btn btn-warning">Verify</button>
                                    </div>
                                    {{--<div class="col-md-2" style="margin-top: 2%;">--}}
                                        {{--<span class="badge bg-primary">Primary badge</span>--}}
                                    {{--</div>--}}


                                </div>

                                <div class="row form-group">
                                    <div class="col-md-6 dd">
                                        <label for="txtUserAddress" class="col-sm-2 control-label"
                                               style="text-align: left;"><b>Signature</b></label>
                                        <div class="col-sm-10">
                                            <div class="wrapper">
                                                <canvas id="signature-pad" class="signature-pad"
                                                        style="border: 1px solid black"></canvas>
                                            </div>
                                            <button type="button" class="btn btn-default"
                                                    id="Sinclear">Clear
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group justify-content-center">
                                    <div class="col-2 dd">
                                        <button type="button" class="btn btn-success btn-block" id="btnsave"> Save</button>
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
    <script src={{asset('plugins/signature_pad/signature_pad.umd.js')}} type="text/javascript"></script>
    <script src="{{asset('jsPages/UserSignature.js')}}" type="text/javascript"></script>
@endsection

@endif
