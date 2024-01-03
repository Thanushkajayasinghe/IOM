@extends('layout')

@section('title', 'Cancel No Show Applicants')

@if($readWrite == 'true' || $readOnly == 'true')

@section('content')


    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Cancel No
                    Show Applicant</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Cancel No Show Applicant</span>
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
                                <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Appointment Date -
                                    From:</label>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control dppicker" id="appointmentDateFrom"
                                               name="appointmentDateFrom">
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
                                        <input type="text" class="form-control dppicker" id="appointmentDateTo"
                                               name="appointmentDateTo">
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
                                       id="cancelNoShowAppTbl" style="">
                                    <thead style="background-color: darkslategray;color: wheat;">
                                    <tr>
                                        <th></th>
                                        <th style="display: none;"></th>
                                        <th nowrap>Appointment No</th>
                                        <th nowrap>Passport No</th>
                                        <th nowrap>Full Name</th>
                                        <th nowrap>Country</th>
                                        <th nowrap>Payment Status</th>
                                        <th nowrap></th>
                                    </tr>
                                    </thead>
                                    <tbody id="cancelNoShowAppTbody">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br><br>
                        <div class="col-md-12 form-group text-center">
                            @if($readOnly != 'true')
                                <button class="btn btn-lg btn-warning" id="btnCancel" style="width: 15rem">Cancel
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
    <script src="{{asset('jsPages/CancelApplicants.js')}}" type="text/javascript"></script>
@endsection
@endif