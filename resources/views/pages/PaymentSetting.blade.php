@extends('layout')

@section('title', 'Payment Setting')

@if($readWrite == 'true')

@section('header')

@endsection

@section('content')

<!-- Page content -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Payment Setting
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active"> Payment Setting
                </span>
            </div>
        </div>
    </div>
</div>


<!-- Page content -->
<div class="page-content pt-0">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content">


            <!-- Dashboard content -->
            <div class="row">
                <div class="col-xl-12">

                    <!-- Marketing campaigns -->
                    <div class="card" style="padding-left: 20px;">
                        <div class="col-md-12 form-group text-left" style="margin-top: 20px;">
                            <lable><b>IHAP</b></lable>
                        </div>
                        <div id="Mancon">
                            <div id="frmvali">
                                <div class="col-xl-12 col-md-12 row form-group">
                                    <div class="col-xl-3 col-md-3">
                                        <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Effective Date:
                                        </lable>
                                        <div class="col-12">
                                            <input id="txtEffectiveDate" type="text" readonly
                                                class="form-control dppicker">
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3">
                                        <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Payment Amount for
                                            each person:
                                        </lable>
                                        <div class="col-12 input-group">
                                            <div class="input-group-append">
                                                <div class="input-group-text"
                                                    style="border: 1px solid rgb(221, 221, 221); padding: 0.4375rem 0.875rem;">
                                                    Rs.
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" id="txtPayment" placeholder="0.00"
                                                required name="price" min="0" step="0.01" title="Currency">
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="col-xl-12 col-md-12 row form-group">
                            <div class="col" style="margin-top: 20px; text-align: center;">
                                <button type="button" id="btnSave" class="btn btn-primary"><span
                                        class="fa fa-send"></span>&nbsp;Save
                                </button>
                                <button type="button" id="loadCurrentSettings" class="btn btn-warning"><span
                                        class="fa fa-cogs"></span>&nbsp;Load Current Settings
                                </button>
                                <button type="button" id="btnclear" class="btn btn-info"><span
                                        class="fa fa-flash"></span>&nbsp;Clear
                                </button>

                            </div>
                        </div>

                    </div>


                </div>
                <div class="col-xl-12">

                    <!-- Marketing campaigns -->
                    <div class="card" style="padding-left: 20px;">

                        <div class="col-md-12 form-group text-left" style="margin-top: 20px;">
                            <lable><b>MHAC</b></lable>
                        </div>
                        <div id="ManconMhac">
                            <div id="frmvaliMhac">
                                <div class="col-xl-12 col-md-12 row form-group">
                                    <div class="col-xl-3 col-md-3">
                                        <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Country:
                                        </lable>
                                        <div class="col-12">
                                            <select id="dropdownCountry" class="form-control">
                                                <option value="">Select</option>
                                                <option value="UK">UK</option>
                                                <option value="CA">CA</option>
                                                <option value="AU">AU</option>
                                                <option value="NZ">NZ</option>
                                                <option value="OT">Other</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3" id="datehide1">
                                        <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Effective Date:
                                        </lable>
                                        <div class="col-12">
                                            <input id="txtEffectiveDateMhac" type="text" readonly
                                                class="form-control dppicker">
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-md-3">
                                        <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Payment Amount for
                                            each person:
                                        </lable>
                                        <div class="col-12 input-group">
                                            <div class="input-group-append">
                                                <div class="input-group-text"
                                                    style="border: 1px solid rgb(221, 221, 221); padding: 0.4375rem 0.875rem;">
                                                    Rs.
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" id="txtPaymentMhac"
                                                placeholder="0.00" required name="price" min="0" step="0.01"
                                                title="Currency">
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>


                        <div class="col-xl-12 col-md-12 row form-group">
                            <div class="col" style="margin-top: 20px; text-align: center;">
                                <button type="button" id="btnSaveMhac" class="btn btn-primary"><span
                                        class="fa fa-send"></span>&nbsp;Save
                                </button>
                                <button type="button" id="loadCurrentSettingsMhac" class="btn btn-warning"><span
                                        class="fa fa-cogs"></span>&nbsp;Load Current Settings
                                </button>
                                <button type="button" id="btnclearMhac" class="btn btn-info"><span
                                        class="fa fa-flash"></span>&nbsp;Clear
                                </button>

                            </div>
                        </div>

                    </div>
                    <div id="loadModal" data-izimodal-group="group1p" data-izimodal-loop=""
                        data-izimodal-title="Mhac Load Current Settings" data-izimodal-subtitle="Mhac Load Current Settings">
                        <div class="col-md-12 form-group">
                            <div class="row" style="font-size: 1rem;text-align: center;">
                                <div class="col-xl-12 col-md-12 row form-group">
                                    <div class="col-xl-4 col-md-4">
                                        <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Country:
                                        </lable>
                                        <div class="col-12 mt-2">
                                            <select id="dropdownCountryMhacModal" class="form-control">
                                                <option value="">Select</option>
                                                <option value="UK">UK</option>
                                                <option value="CA">CA</option>
                                                <option value="AU">AU</option>
                                                <option value="NZ">NZ</option>
                                                <option value="OT">Other</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-4" id="datehide1">
                                        <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Effective Date:
                                        </lable>
                                        <div class="col-12 mt-2">
                                            <input id="txtEffectiveDateMhacModal" type="text" readonly 
                                                class="form-control dppicker">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-md-4">
                                        <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Payment Amount
                                            for
                                            each person:
                                        </lable>
                                        <div class="col-12 input-group mt-2">
                                            <div class="input-group-append">
                                                <div class="input-group-text"
                                                    style="border: 1px solid rgb(221, 221, 221); padding: 0.4375rem 0.875rem;">
                                                    Rs.
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" id="txtPaymentMhacModal"
                                                placeholder="0.00" required name="price" min="0" step="0.01"
                                                title="Currency">
                                        </div>

                                    </div>
                                    <div class="col-xl-4 col-md-4">
                                        <lable style="display:none"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;ID
                                        </lable>
                                        <div class="col-12 input-group mt-2">
                                            <input type="text" class="form-control" id="txtidMhacModal" style="display:none">
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 row form-group">
                            <div class="col" style="margin-top: 20px; text-align: center;">
                                <button type="button" id="btnSaveMhacModal" class="btn btn-primary"><span
                                        class="fa fa-send"></span>&nbsp;Save
                                </button>
                                <button type="button" id="btnclearMhacModal" class="btn btn-info"><span
                                        class="fa fa-flash"></span>&nbsp;Clear
                                </button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /dashboard content -->

        </div>
        <!-- /content area -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->

@endsection

@section('scripts')
<!--JS files-->
<script src="{{asset('js/FaceDetector.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/Cropper/cropper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/progressbar.js')}}" type="text/javascript"></script>
<script src="{{asset('jsPagesMhac/MhacRegistration.js')}}" type="text/javascript"></script>
<script src="{{asset('jsPages/PaymentSetting.js')}}" type="text/javascript"></script>
<script>
    $('#loadModal').iziModal({
        headerColor: '#26A69A',
        width: '80%',
        overlayColor: 'rgba(0, 0, 0, 0.5)',
        fullscreen: true,
        transitionIn: 'fadeInUp',
        transitionOut: 'fadeOutDown'
    });
</script>
@endsection

@endif