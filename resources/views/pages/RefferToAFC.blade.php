@extends('layout')
@section('title', 'Refer To AFC')

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
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Refer To AFC
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Refer To AFC</span>
                </div>
            </div>
        </div>
    </div>


    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <div class="content">
                <div class="card">
                    <div class="card-header">

                        <div id="validateDiv">
                            <div class="col-md-12 form-group">
                                <div class="row form-group">

                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;Registration No</label>
                                        <select class="form-control selectTo" id="regNo" name="regNo" validate="true"
                                                error="* Registration No required." onchange="checkValio();">
                                            {{--<option disabled="disabled" selected="selected">Select</option>--}}
                                            {{--<option>001</option>--}}
                                            {{--<option>002</option>--}}
                                        </select>
                                        <div class="text-danger error"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;Passport No</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="passNo" name="passNo"
                                                   validate="true" match="^.+$" error="* Passport No required."
                                                   onkeyup="checkValio();">
                                        </div>
                                        <div class="text-danger error"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;Refered</label>
                                        <div class="input-group">
                                            {{--<input type="text" class="form-control" id="refferd" name="refferd">--}}
                                            <input type="text" class="form-control dppicker" name="refferd"
                                                   id="refferd">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><span class="fa fa-calendar"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;Test Result</label>
                                        <select class="form-control" id="testRes" name="testRes">
                                            <option>Select</option>
                                            <option value="Positive">Positive</option>
                                            <option value="Negative">Negative</option>
                                            <option value="N/A">N/A</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label>&nbsp;&nbsp;Comment</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <textarea class="form-control" id="comment" name="comment"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label>&nbsp;&nbsp;Remark</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <textarea class="form-control" id="remark" name="remark"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br><br>
                            <div class="col-md-12 form-group text-center">
                                @if($readOnly != 'true')
                                    <button id="btnSaveAFC" class="btn btn-lg btn-success" style="width: 15rem">Save
                                    </button>
                                @endif
                            </div>
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
    <script src="{{asset('jsPages/RefferToAFC.js')}}" type="text/javascript"></script>

    <script>
        function checkValio() {
            validate('#validateDiv');
        }
    </script>
@endsection

@endif
