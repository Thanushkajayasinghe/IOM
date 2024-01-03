@extends('layout')

@section('title', 'Refer To Malaria')

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
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Refer To
                    Malaria
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Refer To Malaria
                </span>
                </div>
            </div>
        </div>
    </div>


    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
                <div class="card">
                    <div id="validateDiv">
                        <div class="card-header">


                            <div class="col">
                                <div class="row form-group">
                                    <div class="col-md-12 row">
                                        <div class="col-md-2">
                                            <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Registration
                                                No</label>
                                        </div>
                                        <div class="col-md-3">
                                            <select class="form-control selectTo" id="regNo" name="regNo"
                                                    validate="true"
                                                    error="* Registration No required." onchange="checkValio();">
                                                {{--<option disabled="disabled" selected="selected">Select</option>--}}
                                                {{--<option>001</option>--}}
                                                {{--<option>002</option>--}}
                                            </select>
                                            <div class="text-danger error"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12 row">
                                        <div class="col-md-2">
                                            <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Passport
                                                No</label>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="passNo" name="passNo"
                                                   validate="true" match="^.+$" error="* Passport No required."
                                                   onkeyup="checkValio();"/>
                                        </div>
                                        <div class="text-danger error"></div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12 row">
                                        <div class="col-md-2">
                                            <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Refered</label>
                                        </div>
                                        <div class="col-md-3">

                                            <div class="input-group">
                                                <input type="text" class="form-control dppicker" name="refered"
                                                       id="refered">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><span class="fa fa-calendar"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 row">
                                        <div class="col-md-2">
                                            <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Test
                                                Result</label>
                                        </div>
                                        <div class="col-md-3">
                                            {{--<input type="text" class="form-control" id="testRes" name="testRes"/>--}}
                                            <select class="form-control" id="testRes" name="testRes">
                                                <option>Select</option>
                                                <option value="Positive">Positive</option>
                                                <option value="Negative">Negative</option>
                                                {{--<option value="N/A">N/A</option>--}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 row">
                                        <div class="col-md-2">
                                            <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Comment</label>
                                        </div>
                                        <div class="col-md-5">
                                    <textarea class="form-control" rows="3" id="comment" name="comment">
                                    </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12 row">
                                        <div class="col-md-2">
                                            <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Remark</label>
                                        </div>
                                        <div class="col-md-5">
                                    <textarea class="form-control" rows="3" id="remark" name="remark">
                                    </textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <div class="col-md-12 form-group text-center">
                            @if($readOnly != 'true')
                                <button id="btnSaveReferToMalaria" class="btn btn-lg btn-success" style="width: 15rem">
                                    Save
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <!--JS files-->
    <script src="{{asset('plugins/jqueryUI/jquery-ui-timepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('jsPages/ReferToMalaria.js')}}" type="text/javascript"></script>

    <script>
        function checkValio() {
            validate('#validateDiv');
        }
    </script>
@endsection

@endif
