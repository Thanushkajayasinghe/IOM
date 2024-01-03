@extends('layout')

@section('title', 'Referral Approval - IHU')

@if($readWrite == 'true' || $readOnly == 'true')

@section('header')
    <style>
        .form-check {
            padding: 0px !important;
        }
    </style>
@endsection

@section('content')


    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>REFERRAL
                    APPROVAL - IHU</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Referral Approval</span>
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


                        <div class="col-md-12 form-group">
                            <div id="tableContainer" class="table-responsive">
                                <table class="table table-bordered table-hover table-striped text-center referralAppIHUTbl"
                                >
                                    <thead style="background-color: darkslategray;color: wheat;">
                                    <tr>
                                        <th></th>
                                        <th nowrap>Referred Date</th>
                                        <th nowrap>Registration No</th>
                                        <th nowrap>NSACP(HIV)</th>
                                        <th nowrap>AFC</th>
                                        <th nowrap>Malaria</th>
                                        <th nowrap>TB</th>
                                        <th nowrap class="text-center">
                                        <th style="display: none;"></th>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody id="referralApprovalsIHUTbody">

                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <br><br>
                        <div class="col-md-12 form-group text-center">
                            @if($readOnly != 'true')
                                <button class="btn btn-lg btn-success" id="btnReferralAppIHU" style="width: 15rem">
                                    Approve
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
    <script src="{{asset('jsPages/ReferralApprovalsIHU.js')}}" type="text/javascript"></script>
@endsection

@endif

