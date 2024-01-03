@extends('layout')

@section('title', 'IHU Report')

@section('header')

    <link href="{{asset('js/DataTables/css/select.bootstrap.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        /* Base for label styling */
        [type="checkbox"]:not(:checked):not(.kv-toggle),
        [type="checkbox"]:checked:not(.kv-toggle) {
            position: absolute;
            left: -9999px;
        }

        [type="checkbox"]:not(:checked) + label,
        [type="checkbox"]:checked + label {
            position: relative;
            padding: 3px 11px;
            cursor: pointer;
        }

        /* checkbox aspect */
        [type="checkbox"]:not(:checked) + label:before,
        [type="checkbox"]:checked + label:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 24px;
            height: 24px;
            border: 2px solid #378dc3;
            background: #fff;
            border-radius: 4px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, .1);
        }

        /* checked mark aspect */
        [type="checkbox"]:not(:checked) + label:after,
        [type="checkbox"]:checked + label:after {
            content: '✔';
            position: absolute;
            top: 5px;
            left: 6px;
            font-size: 1.3em;
            line-height: 0.8;
            color: #09ad7e;
            transition: all .2s;
        }

        /* checked mark aspect changes */
        [type="checkbox"]:not(:checked) + label:after {
            opacity: 0;
            transform: scale(0);
        }

        [type="checkbox"]:checked + label:after {
            opacity: 1;
            transform: scale(1);
        }

        /* disabled checkbox */
        [type="checkbox"]:disabled:not(:checked) + label:before,
        [type="checkbox"]:disabled:checked + label:before {
            box-shadow: none;
            border-color: #bbb;
            background-color: #ddd;
        }

        [type="checkbox"]:disabled:checked + label:after {
            color: #999;
        }

        [type="checkbox"]:disabled + label {
            color: #aaa;
        }

        /* accessibility */
        [type="checkbox"]:checked:focus + label:before,
        [type="checkbox"]:not(:checked):focus + label:before {
            border: 2px dotted blue;
        }


        .control-group {
            display: inline-block;
            vertical-align: top;
            background: #fff;
            text-align: left;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 200px;
            height: 210px;
            margin: 10px;
        }

        .control {
            display: inline-block;
            position: relative;
            padding-left: 20px;
            margin-bottom: 15px;
            cursor: pointer;
            font-size: 18px;
        }

        .control input {
            position: absolute;
            z-index: -1;
            opacity: 0;
        }

        .control__indicator {
            position: absolute;
            top: 2px;
            left: 0;
            height: 20px;
            width: 20px;
            background: #bed3e1;
        }

        .control--radio .control__indicator {
            border-radius: 50%;
        }

        .control:hover input ~ .control__indicator,
        .control input:focus ~ .control__indicator {
            background: #ccc;
        }

        .control input:checked ~ .control__indicator {
            background: #2aa1c0;
        }

        .control:hover input:not([disabled]):checked ~ .control__indicator,
        .control input:checked:focus ~ .control__indicator {
            background: #0e647d;
        }

        .control input:disabled ~ .control__indicator {
            background: #e6e6e6;
            opacity: 0.6;
            pointer-events: none;
        }

        .control__indicator:after {
            content: '';
            position: absolute;
            display: none;
        }

        .control input:checked ~ .control__indicator:after {
            display: block;
        }

        .control--radio .control__indicator:after {
            left: 7px;
            top: 7px;
            height: 6px;
            width: 6px;
            border-radius: 50%;
            background: #fff;
        }

        .control--radio input:disabled ~ .control__indicator:after {
            background: #7b7b7b;
        }

    </style>
@endsection

@section('content')

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM -
                    IHU Report</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">IHU Report</span>
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
                            <div class="col-md-3">
                                <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Date</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control dppicker" readonly="" id="datePref">
                                        <div class="input-group-append">
                                            <div class="input-group-text"
                                                 style="border: 1px solid rgb(221, 221, 221); padding: 0.4375rem 0.875rem;">
                                                <span class="fa fa-calendar"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <div id="tableContainer" class="table-responsive">
                                <div id="familyMemTable">




                                </div>
                            </div>
                        </div>


                        <br><br>
                        <div class="col-md-12 form-group text-center">
                            <button class="btn btn-lg btn-outline-success" id="btnSave" style="width: 7rem"><span
                                    class="fa fa-floppy-o"></span>&nbsp;Save
                            </button>
                            <button class="btn btn-lg btn-outline-warning" id="btnPrint" style="width: 7rem"><span
                                    class="fa fa-print"></span>&nbsp;Print
                            </button>
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
    <script src="{{asset('plugins/DataTable/js/buttons.colVis.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/DataTable/js/dataTables.select.js')}}" type="text/javascript"></script>
    <script src="{{asset('jsPages/ihuReport.js')}}" type="text/javascript"></script>
    <script>
        var imgPathBlade = '{{url('/tempFileUpload/')}}';
        var urlPath = '{{url('/')}}';
    </script>

@endsection

{{--@endif--}}


