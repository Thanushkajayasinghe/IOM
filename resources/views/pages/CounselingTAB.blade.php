@extends('layout')

@section('title', 'Counselling')



@section('header')
    <link href={{asset('css/ArrowCssBtnCol3.css')}} rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/3dbuttons.css')}}" rel="stylesheet" type="text/css">


    <script src="{{asset('plugins/jSignature/flashcanvas.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jSignature/jSignature.min.js')}}" type="text/javascript"></script>

    <style>


        body {
            margin-top: 40px;
        }

        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;

        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 56px;
            height: 56px;
            text-align: center;
            padding: 12px 0;
            font-size: 20px;
            line-height: 1.428571429;
            border-radius: 35px;
            margin-top: -14px;
            border: solid 3px #ccc !important;
            opacity: 1 !important;
            -webkit-appearance: none !important;
            -webkit-box-shadow: inset 0px 0px 0px 3px #fff !important;
            -moz-box-shadow: inset 0px 0px 0px 3px #fff !important;
            -o-box-shadow: inset 0px 0px 0px 3px #fff !important;
            -ms-box-shadow: inset 0px 0px 0px 3px #fff !important;
            box-shadow: inset 0px 0px 0px 3px #fff !important;
            backgournd-color: #428bca;

        }

        .wrapper {
            position: relative;
            width: 120%;
            height: 200px;
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .signature-pad {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 200px;
            background-color: white;
        }

        .navbar-top {
            padding-top: 0.0rem;
        }

        .primary
    </style>
@endsection

@section('content')
    <!-- Page content -->

    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <div id="congif">
                    <center style="background-color: #e4f0f0">
                        <img src="{{asset('images/TabLoading.gif')}}" width="40%" height="40%">
                        <h5 style="color: #ff4646">Please Wait, Loading Member Details ... </h5>
                    </center>

                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" id="prgBar"
                             role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"
                             style="width: 0%"></div>
                    </div>
                </div>

                <!-- Dashboard content -->
                <div id="con">
                    <div class="row">
                        <div class="col-xl-12">

                            <!-- Marketing campaigns -->
                            <div class="card">

                                <div class="col-md-12 row" style="margin-top: 20px;">

                                    <div class="stepwizard">
                                        <div class="stepwizard-row setup-panel" id="membrsicon">

                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12 row" style="padding-bottom: 35px;">
                                    <div class="col-md-12">
                                        <br/>
                                        <div class="form-horizontal">
                                            <form role="form">
                                                <fieldset>
                                                    <legend><h3 style="color: #a5a5a5;">Member Basic Information</h3>
                                                    </legend>
                                                    <br/>

                                                    <div class="col-md-12 row form-group">
                                                        <table class="table" style="font-size: 15px;">
                                                            <tr>
                                                                <td><b>Name in full</b></td>
                                                                <td><b> : </b></td>
                                                                <td><span id="NameInFull"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Registration No</b></td>
                                                                <td><b> : </b></td>
                                                                <td><span id="regno"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Current passport number</b></td>
                                                                <td><b> : </b></td>
                                                                <td><span id="ppno"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Country</b></td>
                                                                <td><b> : </b></td>
                                                                <td><span id="country"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Date of birth</b></td>
                                                                <td><b> : </b></td>
                                                                <td><span id="DOB"></span></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Gender</b></td>
                                                                <td><b> : </b></td>
                                                                <td><span id="gender"></span></td>
                                                            </tr>

                                                        </table>
                                                    </div>

                                                    <div class="col-md-12 row form-group">

                                                    </div>

                                                    <div class="col-md-12 row form-group">
                                                      <div class="col-md-7">
                                                        <button type="button" onclick="Lode_PDF()" class="btn-block btn-info btn-lg btn3d" id="viewPdf" style="width: 18%;position: relative;left: 1%;">
                                                            <span class="fa fa-file-pdf-o"></span>&nbsp;View PDF
                                                        </button>
                                                      </div>
                                                        <div class="col-md-5">
                                                            <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Play Back Recoding
                                                            </lable>
                                                            <div class="table-responsive table-scrollable " style="margin-top: 10px;">
                                                                <table class="table table-bordered table-striped">
                                                                    <thead
                                                                            style="background-color: #002665; color: white; border-radius:10px 0 0 10px;">
                                                                    <tr style="line-height: 0.1cm;">
                                                                        <th style="text-align: center;">Description</th>
                                                                        <th style="text-align: center;"></th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody id="addTabeleData">

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 row form-group">
                                                        <div class="col-md-6">
                                                            <label for="txtUserAddress" class="col-sm-2 control-label"
                                                                   style="text-align: left;"><b>Remark</b></label>
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control" rows="5" id="txtremark"
                                                                          name="txtremark"></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="txtUserAddress" class="col-sm-2 control-label"
                                                                   style="text-align: left;"><b>Signature</b></label>
                                                            <div class="col-sm-10">
                                                                <div class="wrapper">
                                                                    <canvas id="signature-pad" class="signature-pad"
                                                                            style="border: 1px solid black"></canvas>
                                                                </div>
                                                                <button type="button" class="btn-block btn-primary btn-lg btn3d" id="Sinclear" style="width: 28%;">
                                                                    <span class="fa fa-refresh"></span>&nbsp;Clear
                                                                </button>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </fieldset>
                                            </form>
                                        </div>
                                        <button type="button" class="btn-block btn-danger nextBtn btn-lg btn3d pull-right" id="btnsavenext" style="width: 18%;">
                                            <span class="fa fa-floppy-o"></span>&nbsp;Save & Next
                                        </button>

                                    </div>

                                    <div class="col-md-12">
                                        <center>
                                            <button type="button" class="btn-block btn-success nextBtn btn-lg btn3d pull-right" id="btnAllSave" style="width: 18%; margin-top: 40px;">
                                                <span class="fa fa-floppy-o"></span>&nbsp;Complete
                                            </button>
                                        </center>
                                    </div>

                                </div>


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
    <script>
    var path = '{{url('/tempFileUpload/')}}';
    var pdfPath = '{{url('/plugins/')}}';
    </script>
    <script src={{asset('plugins/signature_pad/signature_pad.umd.js')}} type="text/javascript"></script>
    <script src={{asset('jsPages/CounselingTAB.js')}} type="text/javascript"></script>

@endsection

