@extends('layout')

@section('title', 'Add Lab Test Results')
@if($readWrite == 'true')

@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
    integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{asset('css/3dbuttons.css')}}" rel="stylesheet" type="text/css">
<style>
    .equal-size {
        width: 25%;
        float: left;
        box-sizing: border-box;
        padding: 10px;
        text-align: center;
    }

    @media (max-width: 576px) {
        .equal-size {
            width: 100%;
            float: none;
            margin-bottom: 5px;
        }
    }

    @media (min-width: 577px) {
        .equal-size {
            width: 25%;
        }
    }
</style>
@endsection

@section('content')

<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span> Add Lab Test
                Results</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <a href="home" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active"> Add Lab Test Results</span>
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
                                <input type="text" class="form-control" id="txtBarcode">
                                <div class="d-block form-text text-right">
                                    <span id="lblStatusBarcode" class="badge badge-success text-right"></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 form-group" id="desPanelShowHide">
                        <div class="row">
                            <div class="col-md-2"><span><b>Age: <lable id="lblAge" style="color: blue;"></lable>
                                        </b></span></div>
                            <div class="col-md-2"><span><b>Gender: <lable id="lblGen" style="color: blue;"></lable>
                                        </b></span></div>
                            <div class="col-md-2" style="display:none;"><span><b>Appointment No: <lable id="lblAppno"
                                            style="color: blue;"></lable></b></span></div>
                            <div class="col-md-2" style="display:none;"><span><b>Passport: <lable id="lblPass" style="color: blue;"></lable>
                                        </b></span></div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="equal-size" id="panelHiv">
                            <div class="col-md-12 row">
                                <h4><b>HIV</b></h4>
                            </div>
                            <div class="col-md-12 row form-group">
                                <label>Result</label>
                                <select class="form-control" id="drpHivResult">
                                    <option disabled="disabled" selected="selected" value="">Select</option>
                                    <option value="Positive">Positive</option>
                                    <option value="Negative">Negative</option>
                                </select>
                            </div>
                            <div class="col-md-12 row">
                                <label>Remarks</label>
                                <textarea class="form-control" rows="5" id="txtHivRemark"></textarea>
                            </div>
                        </div>
                        <div class="equal-size" id="panelMalaria">
                            <div class="col-md-12 row">
                                <h4><b>Malaria</b></h4>
                            </div>
                            <div class="col-md-12 row form-group">
                                <label>Result</label>
                                <select class="form-control" id="drpMalariaResult">
                                    <option disabled="disabled" selected="selected" value="">Select</option>
                                    <option value="Positive">Positive</option>
                                    <option value="Negative">Negative</option>
                                </select>
                            </div>
                            <div class="col-md-12 row">
                                <label>Remarks</label>
                                <textarea class="form-control" rows="5" id="txtMalariaRemark"></textarea>
                            </div>
                        </div>
                        <div class="equal-size" id="panelFilaria">
                            <div class="col-md-12 row">
                                <h4><b>Filaria</b></h4>
                            </div>
                            <div class="col-md-12 row form-group">
                                <label>Result</label>
                                <select class="form-control" id="drpFilariaResult">
                                    <option disabled="disabled" selected="selected" value="">Select</option>
                                    <option value="Positive">Positive</option>
                                    <option value="Negative">Negative</option>
                                </select>
                            </div>
                            <div class="col-md-12 row">
                                <label>Remarks</label>
                                <textarea class="form-control" rows="5" id="txtFilariaRemark"></textarea>
                            </div>
                        </div>
                        <div class="equal-size" id="panelSHCG">
                            <div class="col-md-12 row">
                                <h4><b>S.HCG</b></h4>
                            </div>
                            <div class="col-md-12 row form-group">
                                <label>Result</label>
                                <select class="form-control" id="drpShcgResult">
                                    <option disabled="disabled" selected="selected" value="">Select</option>
                                    <option value="Positive">Positive</option>
                                    <option value="Negative">Negative</option>
                                </select>
                            </div>
                            <div class="col-md-12 row">
                                <label>Remarks</label>
                                <textarea class="form-control" rows="5" id="txtShcgRemark"></textarea>
                            </div>
                        </div>
                        <div class="equal-size" id="panelUrine">
                            <div class="col-md-12 row">
                                <h4><b>Urine</b></h4>
                            </div>
                            <div class="col-md-12 row form-group">
                                <label>Result</label>
                                <input type="text" class="form-control" id="txtUrineResult" />
                            </div>
                            <div class="col-md-12 row">
                                <label>Remarks</label>
                                <textarea class="form-control" rows="5" id="txtUrineRemark"></textarea>
                            </div>
                        </div>
                        <div style="clear:both;"></div>
                    </div>

                    <div class="col-md-12 text-center">
                        <div class="row justify-content-center">
                            <div class="col-md-1">
                                <button type="button" class="btn-block btn-success btn-lg btn3d legitRipple"
                                    id="btnSaveResults">Save
                                </button>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn-block btn-danger btn-lg btn3d legitRipple"
                                    id="btnClear">Clear</button>
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
    var path = "{{url('/')}}";
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"
    integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('jsPagesMhac/AddLabTestResults.js')}}" type="text/javascript"></script>
@endsection


@endif