@extends('layout')

@section('title', 'Recommendation')

@if($readWrite == 'true' || $readOnly == 'true')

@section('header')

@endsection

@section('content')


    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM -
                    Recommendation</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Recommendation</span>
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
                                <div class="table-responsive" style="max-height: 500px; overflow: auto;">
                                    <table class="table table-bordered table-hover table-striped text-center"
                                           id="familyMemTable" style="">
                                        <thead style="background-color: darkslategray;color: wheat;">
                                        <tr>
                                            <th nowrap>Passport NO</th>
                                            <th nowrap>First Name</th>
                                            <th nowrap>Last Name</th>
                                            <th nowrap>Assessment Date</th>
                                            <th nowrap>Date of Recommendation</th>
                                            <th nowrap>Status</th>
                                            <th><input class="form-control userPerSelect" id="Alltblchk"
                                                       type="checkbox"><label for="Alltblchk"
                                                                              style="padding: 7px 12px;"></label></th>
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
                            @if($readOnly != 'true')
                                <button class="btn btn-lg btn-success" id="savbtn" style="width: 15rem">Save</button>
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
    <script src="{{asset('jsPages/Recommendation.js')}}" type="text/javascript"></script>
@endsection

@endif
