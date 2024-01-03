@extends('layout')

@section('title', 'TB Test Result')

@if($readWrite == 'true' || $readOnly == 'true')

@section('header')
    <style>
        .ui_tpicker_unit_hide {
            display: none;
        }
    </style>
@endsection

@section('content')


    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - TB SPUTUM
                    RECIVE
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">TB SPUTUM RECEIVE
                </span>
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

                        <div class="col">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12 form-group">
                                        <div class="form-group">
                                            <div class="col-md-12 row">

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Barcode
                                                            (Sample No)</label>
                                                        <input type="text" class="form-control" name="BC" id="BC">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-group row">
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12 form-group table-responsive">
                                    <div class="table-responsive" style="max-height: 500px; overflow: auto;">
                                        <table class="table table-bordered table-hover table-striped text-center">
                                            <thead style="background-color: darkslategray;color: wheat;">
                                            <tr>
                                                <th>No</th>
                                                <th nowrap>Barcode</th>
                                                <th nowrap>Gender</th>
                                                <th nowrap>Sample Day</th>
                                                <th nowrap>Collected Time</th>
                                                <th nowrap>Lab No</th>
                                            </tr>
                                            </thead>
                                            <tbody id="verifyStatTable" style="">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 row">
                                    <div class="col-md-3">
                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Date</label>
                                        <div class="input-group">
                                            <input type="text" readonly class="form-control dppicker" disabled=""
                                                   name="date" id='date'>
                                            <div class="input-group-append">
                                                <div class="input-group-text"><span class="fa fa-calendar"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;TIME</label>
                                        <div class="input-group">
                                            <input type="text" readonly class="form-control " disabled="" name="time"
                                                   id='time'>
                                            <div class="input-group-append">
                                                <div class="input-group-text"><span class="fa fa-clock-o"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                    <div class="col-md-12 form-group text-center">
                        @if($readOnly != 'true')
                            <button class="btn btn-lg btn-primary fa fa-get-pocket " id="btnreceive"> &nbsp;&nbsp;&nbsp;Receive</button>
                        @endif
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!-- /page content -->

@endsection

@section('scripts')
    <!--JS files-->
    <script src="{{asset('jsPages/TBSputumRecive.js')}}" type="text/javascript"></script>
@endsection

@endif