@extends('layout')

@section('title', 'Approve Test Results')
@if($readWrite == 'true')

@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
    integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{asset('css/3dbuttons.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')

<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span> Approve Test
                Results</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <a href="home" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active"> Approve Test Results</span>
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

                    <div class="col-md-12 form-group table-responsive">
                        <table class="table table-bordered table-hover table-striped text-center" id="tblTestResults"
                            style="    white-space: nowrap;">
                            <thead style="background-color: darkslategray;color: wheat;">
                                <tr>
                                    <th>No</th>
                                    <th>
                                        <label class="form-check-label">
                                            <input class="form-control userPerSelect cb-element" name="tblchk"
                                                id="userPerSelectIdAll" type="checkbox">
                                            <label for="userPerSelectIdAll" style="padding: 7px 12px;"></label>
                                        </label>
                                    </th>
                                    <th>Barcode</th>
                                    <th>HIV</th>
                                    <th>HIV Remark</th>
                                    <th>Filaria</th>
                                    <th>Filaria Remark</th>
                                    <th>Malaria</th>
                                    <th>Malaria Remark</th>
                                    <th>SHCG</th>
                                    <th>SHCG Remark</th>
                                    <th>Urine</th>
                                    <th>Urine Remark</th>
                                    <th>Date Time</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyTestResults">
                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-12 text-center">
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <button type="button" class="btn-block btn-success btn-lg btn3d legitRipple"
                                    id="btnApproveResults">Approve
                                </button>
                            </div>
                            <div class="col-md-2">
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
<script src="{{asset('jsPagesMhac/ApproveTestResults.js')}}" type="text/javascript"></script>
@endsection


@endif