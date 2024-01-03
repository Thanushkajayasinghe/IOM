@extends('layout')

@section('title', 'Radiologists Reporting')

@if($readWrite == 'true')
@section('header')
    <style>
        .clickedRow {
            background-color: aquamarine;
        }

        .prevClicked {
            background-color: #e0a57a;
        }

        .rowSaved {
            background-color: #ff0134;
        }

        #noshow {
            width: 40% !important;
        }

        .hidePanel {
            display: none;
        }
    </style>
@endsection
@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Radiologist
                    Reporting - COM Approval</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Radiologist Reporting - COM Approval </span>
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
                    <div class="card-header"></div>

                    <div class="card-body">

                        <div class="col-md-12">
                            <div class="col-md-12 form-group">
                                <div class="row justify-content-center"
                                     style="font-size: 1rem;text-align: center;">
                                    <div class="col-md-12">
                                        <div class="card card-table">
                                            <table class="table table-bordered" id="tblCompleteCOM">
                                                <thead>
                                                <tr>
                                                    <th style="background-color: #f98469"></th>
                                                    <th style="background-color: #f98469">Appointment No</th>
                                                    <th style="background-color: #f98469">Passport No</th>
                                                    <th style="background-color: #f98469">Full Name</th>
                                                    <th style="background-color: #f98469">Date Of Birth</th>
                                                    <th style="background-color: #f98469">Gender</th>
                                                </tr>
                                                </thead>
                                                <tbody id="appbodyCompleteCOM">
                                                </tbody>
                                            </table>
                                        </div>
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
    <script>
        var urlPath = '{{url('/')}}';
    </script>
    <script src={{asset('jsPages/RadiologistReportingCOM.js')}} type="text/javascript"></script>
@endsection
@endif
