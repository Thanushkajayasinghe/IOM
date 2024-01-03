@extends('layout')

@section('title', 'Confirmatory Test Results')
@if($readWrite == 'true')

@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span> Confirmatory Test
                    Results</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active"> Confirmatory Test Results</span>
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
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Barcode</label>
                                    <input type="text" class="form-control" name="" id="BC" value="">
                                    <div class="d-block form-text text-right">
                                        <span id="BClable" class="badge badge-success text-right"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label>Appointment No</label>
                                    <input type="text" class="form-control" id="appointmentNo" >                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 form-group" id="genbar">
                            <div class="row">
                                <div class="col-md-2"><span><b>Age:<lable id="age"></lable></b></span></div>
                                <div class="col-md-2"><span><b>Gender:<lable id="gen"></lable></b></span></div>
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="row form-group rr">

                                        <div class="col-md-3" id="hivHeader" style="display: none;">
                                            <h4><b>HIV </b></h4>
                                        </div>
                                        <div class="col-md-3" id="malariaHeader" style="display: none;">
                                            <h4><b>Malaria</b></h4>
                                        </div>
                                        <div class="col-md-3" id="filariaHeader" style="display: none;">
                                            <h4><b>Filaria</b></h4>
                                        </div>
                                        <div class="col-md-3" id="shcgHeader" style="display: none;">
                                            <h4><b>S.HCG</b></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 form-group" id="validateDiv">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row form-group">
                                        <div class="col-md-3" id="hivRes" style="display: none;">
                                            <label>Result</label>
                                            <select class="form-control" id="Hres" validate="true"
                                                    error="* Result required."
                                                    onchange="checkvali4();">
                                                <option disabled="disabled" selected="selected" value="">Select</option>
                                                <option value="Positive">Positive</option>
                                                <option value="Negative">Negative</option>
                                            </select>
                                            <div class="text-danger error"></div>
                                        </div>
                                        <div class="col-md-3" id="malariaRes" style="display: none;">
                                            <label>Result</label>
                                            <select class="form-control" id="Mres" validate="true"
                                                    error="* Result required."
                                                    onchange="checkvali4();">
                                                <option disabled="disabled" selected="selected" value="">Select</option>
                                                <option value="Positive">Positive</option>
                                                <option value="Negative">Negative</option>
                                            </select>
                                            <div class="text-danger error"></div>
                                        </div>
                                        <div class="col-md-3" id="filariaRes" style="display: none;">
                                            <label>Result</label>
                                            <select class="form-control" id="Fres" validate="true"
                                                    error="* Result required."
                                                    onchange="checkvali4();">
                                                <option disabled="disabled" selected="selected" value="">Select</option>
                                                <option value="Positive">Positive</option>
                                                <option value="Negative">Negative</option>
                                            </select>
                                            <div class="text-danger error"></div>
                                        </div>
                                        <div class="col-md-3" id="shcgRes" style="display: none;">
                                            <label>Result</label>
                                            <select class="form-control" id="Sres" validate="true"
                                                    error="* Result required."
                                                    onchange="checkvali4();">
                                                <option disabled="disabled" selected="selected" value="">Select</option>
                                                <option value="Positive">Positive</option>
                                                <option value="Negative">Negative</option>
                                            </select>
                                            <div class="text-danger error"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row form-group">
                                        <div class="col-md-3" id="hivRemark" style="display: none;">
                                            <label>Remarks</label>
                                            <textarea class="form-control" rows="5" id="Hcom"></textarea>
                                        </div>
                                        <div class="col-md-3" id="malRemark" style="display: none;">
                                            <label>Remarks</label>
                                            <textarea class="form-control" rows="5" id="Mcom"></textarea>
                                        </div>
                                        <div class="col-md-3" id="filaRemark" style="display: none;">
                                            <label>Remarks</label>
                                            <textarea class="form-control" rows="5" id="Fcom"></textarea>
                                        </div>
                                        <div class="col-md-3" id="shcgRemark" style="display: none;">
                                            <label>Remarks</label>
                                            <textarea class="form-control" rows="5" id="Scom"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="row justify-content-center">
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-success legitRipple" id="confirmatoryTestSave">Save
                                    </button>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-info legitRipple" id="btnclear">Clear</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /content area -->


        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
@endsection

@section('scripts')
    <script>
        function checkvali4() {
            validate('#validateDiv');
        }
    </script>
    <script src={{asset('jsPages/ConfirmatoryTestResults.js')}} type="text/javascript"></script>
@endsection


@endif
