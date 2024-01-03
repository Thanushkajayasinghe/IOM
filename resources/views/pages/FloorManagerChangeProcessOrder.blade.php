@extends('layout')

@section('title', 'Change Process Order')

@if($readWrite == 'true' || $readOnly == 'true')
@section('header')
    <style>

        .btn-arrow-right,
        .btn-arrow-left {
            position: relative;
            padding-left: 18px;
            padding-right: 18px;
        }

        .btn-arrow-right {
            padding-left: 36px;
        }

        .btn-arrow-left {
            padding-right: 36px;
        }

        .btn-arrow-right:before,
        .btn-arrow-right:after,
        .btn-arrow-left:before,
        .btn-arrow-left:after { /* make two squares (before and after), looking similar to the button */
            content: "";
            position: absolute;
            top: 5px; /* move it down because of rounded corners */
            width: 24px; /* same as height */
            height: 25px; /* button_outer_height / sqrt(2) */
            background: inherit; /* use parent background */
            border: inherit; /* use parent border */
            border-left-color: transparent; /* hide left border */
            border-bottom-color: transparent; /* hide bottom border */
            border-radius: 0px 4px 0px 0px; /* round arrow corner, the shorthand property doesn't accept "inherit" so it is set to 4px */
            -webkit-border-radius: 0px 4px 0px 0px;
            -moz-border-radius: 0px 4px 0px 0px;
        }

        .btn-arrow-right:before,
        .btn-arrow-right:after {
            transform: rotate(45deg); /* rotate right arrow squares 45 deg to point right */
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
        }

        .btn-arrow-left:before,
        .btn-arrow-left:after {
            transform: rotate(225deg); /* rotate left arrow squares 225 deg to point left */
            -webkit-transform: rotate(225deg);
            -moz-transform: rotate(225deg);
            -o-transform: rotate(225deg);
            -ms-transform: rotate(225deg);
        }

        .btn-arrow-right:before,
        .btn-arrow-left:before { /* align the "before" square to the left */
            left: -13px;
        }

        .btn-arrow-right:after,
        .btn-arrow-left:after { /* align the "after" square to the right */
            right: -13px;
        }

        .btn-arrow-right:after,
        .btn-arrow-left:before { /* bring arrow pointers to front */
            z-index: 1;
        }

        .btn-arrow-right:before,
        .btn-arrow-left:after { /* hide arrow tails background */
            background-color: white;
        }

        .btn-arrow-right.legitRipple {
            overflow: unset;
            z-index: unset;
        }
    </style>
@endsection

@section('content')

    <!-- Page content -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - FLOOR MANAGER
                    CHANGE PROCESS ORDER
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active"> FLOOR MANAGER CHANGE PROCESS ORDER
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
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 form-group" style="padding: 20px;border: 1px solid #e7e1e1;">
                            <div class="row align-items-center">
                                <div class="col-md-1">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input-styled" attr-i="1" name="type"
                                                   data-fouc>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-info btn-block btn-arrow-right">Registration
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-warning btn-block btn-arrow-right">Counseling
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger btn-block btn-arrow-right">Radiology
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success btn-block btn-arrow-right">Lab</button>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary btn-block btn-arrow-right">
                                        Consultation
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 form-group" style="padding: 20px;border: 1px solid #e7e1e1;">
                            <div class="row align-items-center">
                                <div class="col-md-1">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input-styled" attr-i="2" name="type"
                                                   data-fouc>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-info btn-block btn-arrow-right">Registration
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-warning btn-block btn-arrow-right">Counseling
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success btn-block btn-arrow-right">Lab</button>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger btn-block btn-arrow-right">Radiology
                                    </button>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary btn-block btn-arrow-right">
                                        Consultation
                                    </button>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 form-group text-center">
                            @if($readOnly != 'true')
                                <button type="button" id="saveProcessOrder" class="btn btn-success"><span
                                            class="fa fa-random"></span>&nbsp;&nbsp;Change
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>

@endsection

@section('scripts')
    <!--JS files-->
    <script src="{{asset('jsPages/ChangeProcessOrder.js')}}" type="text/javascript"></script>
@endsection
@endif