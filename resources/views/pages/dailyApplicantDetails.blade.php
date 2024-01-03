@extends('layout')

@section('title', 'Daily Payment Details')

@section('header')

@endsection

@section('content')


    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM -
                    Daily Payment Details</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Daily Payment Details</span>
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
                            <div class="col-md-4">
                                <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Date</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control dppicker" readonly="" id="datePref">
                                        <div class="input-group-append">
                                            <div class="input-group-text"
                                                 style="border: 1px solid rgb(221, 221, 221); padding: 0.4375rem 0.875rem;">
                                                <span class="fa fa-calendar"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div id="tableContainer" class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped text-center dataTable"
                                           id="familyMemTable" style="">
                                        <thead
                                            style="background: linear-gradient(40deg, #45cafc, #303f9f) !important; color: white;">
                                        <tr>
                                            <th nowrap></th>
                                            <th nowrap>Date</th>
                                            <th nowrap>Passport NO</th>
                                            <th nowrap>Appointment No</th>
                                            <th nowrap>First Name</th>
                                            <th nowrap>Last Name</th>
                                            <th nowrap>Date Of Birth</th>
                                            <th nowrap>Age</th>
                                            <th nowrap>Gender</th>
                                            <th nowrap>Country Of Origin</th>
                                            <th nowrap>Nationality</th>
                                            <th nowrap>Amount</th>
                                            <th nowrap>Sponsor Name</th>
                                            <th nowrap>Sponsor Address</th>
                                            <th nowrap>Sponsor Telephone</th>
                                            <th nowrap>Sponsor Mobile</th>
                                            <th nowrap>Sponsor Email</th>
                                            <th nowrap>Image</th>
                                            <th nowrap>Image Name</th>
                                        </tr>
                                        </thead>
                                        <tbody id="RTBody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                        <br><br>
                        <div class="col-md-12 form-group text-center">
                            {{--<button class="btn btn-lg btn-outline-warning" id="btnPrint" style="width: 15rem"><span class="fa fa-print"></span>&nbsp;Print--}}
                            {{--</button>--}}
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
    <script src="{{asset('jsPages/dailyApplicantDetails.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        var path = '{{url('/tempFileUpload/photoBoothFiles')}}';
    </script>
@endsection

{{--@endif--}}

