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
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - TB Test
                    Result</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">TB Test Result</span>
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
                        <div id="pvali">
                            <div class="col-md-12 form-group row">
                                <div class="col-md-3">
                                    <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Barcode No</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="labno" match="^.+$"
                                                   validate="true" error="* Barcode No required" readonly><br>
                                        </div>
                                        <div class="text-danger error"></div>
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Appointment No</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="appNoTxt" readonly><br>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 form-group">
                                <div id="tableContainer" class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped text-left"
                                           id="familyMemTable">
                                        <thead style="background-color: darkslategray;color: wheat;">
                                        <tr style="text-align: center">
                                            <th nowrap>Test</th>
                                            <th nowrap>Result</th>
                                        </tr>
                                        </thead>
                                        <tbody id="familyMemTBody">
                                        <tr>
                                            <td>Gene Xpert</td>
                                            <td><input type="text" class="form-control" id="genexpert"></td>
                                        </tr>
                                        <tr>
                                            <td>AFB</td>
                                            <td>
                                                <select class="form-control" id="afb">
                                                    <option value="">Select</option>
                                                    <option>Positive</option>
                                                    <option>Negative</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Culture</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" placeholder="Liquid Culture"
                                                               class="form-control" id="liquidculture">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" placeholder="Solid Culture"
                                                               class="form-control" id="solidculture">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Drug Sensitivity</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" class="form-control" id="drugsensitivity">
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" placeholder="Drug Details"
                                                               class="form-control" id="drugdetail">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Date</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" readonly class="form-control dppicker" id="date"
                                                       readonly disabled="">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><span class="fa fa-calendar"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label><span class="fa fa-clock-o"></span>&nbsp;&nbsp;Time</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" readonly class="form-control timePickerx" id="time"
                                                       readonly disabled="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br><br>
                            <div class="col-md-12 form-group text-center">
                                @if($readOnly != 'true')
                                    <button class="btn btn-lg btn-success" style="width: 15rem" id="btnsave">Save
                                    </button>
                                @endif
                                {{--<input type="submit" value="Save" class="btn btn-lg btn-success" style="width: 15rem"--}}
                                {{--id="btnsave">--}}
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
    <!--JS files-->

    <script src="{{asset('plugins/jqueryUI/jquery-ui-timepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('jsPages/TBTestResulr.js')}}" type="text/javascript"></script>
@endsection
@endif
