@extends('layout')

@section('title', 'Appointment Cancel/Re Schedule')

{{--@if($readWrite == 'true' || $readOnly == 'true')--}}

@section('header')

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Phlebotomy Result Approval
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Phlebotomy Result Approval
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
                                <div class="col-md-12 form-group table-responsive">
                                    <table class="table table-bordered table-hover table-striped text-center"
                                           id="fultbl">
                                        <thead style="background-color: darkslategray;color: wheat;">
                                        <tr>
                                            <th>No</th>
                                            <th>Barcode</th>
                                            <th>HIV</th>
                                            <th>HIV Comment</th>
                                            <th>Filaria</th>
                                            <th>Filaria Comment</th>
                                            <th>Malaria</th>
                                            <th>Malaria Comment</th>
                                            <th>SHCG</th>
                                            <th>SHCG Comment</th>
                                            <th>
                                                <label class="form-check-label">
                                                    <input class="form-control userPerSelect cb-element"
                                                           name="tblchk" id="userPerSelectIdAll" type="checkbox">
                                                    <label for="userPerSelectIdAll"
                                                           style="padding: 7px 12px;"></label>
                                                </label>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody id="verifyStatTable" style="">

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="col-md-12 form-group text-center">
                        <button class="btn btn-lg btn-primary fa fa-cubes " id="btnDispatch">
                            &nbsp;&nbsp;&nbsp;Approval
                        </button>
                        </button>
                    </div>

                </div>
            </div>

        </div>


        <!------------------------->


    </div>



@endsection

@section('scripts')
    <!--JS files-->
    <script src="{{asset('plugins/fullCalender/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/notifications/noty.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jqueryUI/jquery-ui-timepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('jsPages/PhlebotomyResultAuthorize.js')}}" type="text/javascript"></script>

@endsection

{{--@endif--}}
