@extends('layout')

@section('title', 'User Audit Log')

@if($readWrite == 'true' || $readOnly == 'true')

@section('content')


    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - User Audit Log</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">User Audit Log</span>
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

                        <div class="col-md-12 row">
                            <div class="col-md-12">
                                <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Select Date -
                                    From:</label>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control dppicker" id="FromDate"
                                               name="FromDate">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><span class="fa fa-calendar"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" style="margin-top: -28px;">
                                <label>&nbsp;To:</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control dppicker" id="ToDate"
                                               name="ToDate">
                                        <div class="input-group-append">
                                            <div class="input-group-text"><span class="fa fa-calendar"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button id="btnSearch" type="button" class="btn btn-sm btn-cudd">
                                    <span class="fa fa-search"></span>
                                </button>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div id="tableContainer" class="table-responsive">
                                <table class="table table-bordered table-hover table-striped text-center"
                                       id="userauditlogTbl" style="">
                                    <thead style="background-color: darkslategray;color: wheat;">
                                    <tr>
                                        <th></th>
                                        <th style="display: none;"></th>
                                        <th nowrap>Name</th>
                                        <th nowrap>User Name</th>
                                        <th nowrap>User Id</th>
                                        <th nowrap>Counter Name</th>
                                        <th nowrap>Counter No</th>
                                        <th nowrap>Floor</th>
                                        <th nowrap>Login DateTime</th>
                                       
                                    </tr>
                                    </thead>
                                    <tbody id="userauditAppBody">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br><br>
                        <div class="col-md-12 form-group text-center">
                            @if($readOnly != 'true')
                                <button class="btn btn-lg btn-warning" id="btnCancel" style="width: 15rem">Refresh
                                </button>
                            @endif
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
    <script src="{{asset('jsPagesMhac/UserAuditLog.js')}}" type="text/javascript"></script>
@endsection
@endif