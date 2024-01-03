@extends('layout')
@section('title', 'Country')

@if($readWrite == 'true' || $readOnly == 'true')

@section('header')
<link href="{{asset('css/strength-meter.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/iziToast.min.css')}}" rel="stylesheet" type="text/css" />
<style>
    .image-upload>input {
        display: none;
    }

    .image-upload img {
        width: 80px;
        cursor: pointer;
    }

    .kv-verdict>.label {
        background: white !important;
    }

    .list-group {
        overflow: hidden;
        border-left: 1px solid rgb(221, 221, 221);
        border-right: 1px solid rgb(221, 221, 221);
    }

    .list-group-item:first-child,
    .list-group-item:last-child {
        border-top-right-radius: 0px;
        border-top-left-radius: 0px;
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 0px;
        overflow: hidden;
    }

    .list-group-item {
        border-left: 0px solid rgb(221, 221, 221);
        border-right: 0px solid rgb(221, 221, 221);
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        -ms-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .list-group-item>.show-menu {
        position: absolute;
        height: 100%;
        width: 24px;
        top: 0px;
        right: 0px;
        background-color: rgba(51, 51, 51, 0.2);
        cursor: pointer;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        -ms-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .list-group-item>.show-menu>span {
        position: absolute;
        top: 50%;
        margin-top: -7px;
        padding: 0px 5px;
    }

    .list-group-submenu {
        position: absolute;
        top: 0px;
        right: -88px;
        white-space: nowrap;
        list-style: none;
        padding-left: 0px;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        -ms-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
    }

    .list-group-submenu .list-group-submenu-item {
        float: right;
        white-space: nowrap;
        display: block;
        padding: 10px 15px;
        margin-bottom: -1px;
        background-color: rgb(51, 51, 51);
        color: rgb(235, 235, 235);
    }

    .list-group-item.open {
        margin-left: -88px;
    }

    .list-group-item.open>.show-menu {
        right: 88px;
    }

    .list-group-item.open .list-group-submenu {
        right: 0px;
    }

    .list-group-submenu .list-group-submenu-item.primary {
        color: rgb(255, 255, 255);
        background-color: rgb(50, 118, 177);
    }

    .list-group-submenu .list-group-submenu-item.success {
        color: rgb(255, 255, 255);
        background-color: rgb(92, 184, 92);
    }

    .list-group-submenu .list-group-submenu-item.info {
        color: rgb(255, 255, 255);
        background-color: rgb(57, 179, 215);
    }

    .list-group-submenu .list-group-submenu-item.warning {
        color: rgb(255, 255, 255);
        background-color: rgb(240, 173, 78);
    }

    .list-group-submenu .list-group-submenu-item.danger {
        color: rgb(255, 255, 255);
        background-color: rgb(217, 83, 79);
    }

    .ActiveClaz {
        background-color: gainsboro;
    }

    .hideCell {
        display: none;
    }

    .btn-xs {
        padding: .25rem .4rem;
        font-size: .875rem;
        line-height: .5;
        border-radius: .2rem;
    }

    .table td {
        padding: 0.2rem 1.25rem;
    }

    .list-group-item {
        border: 1px;
        border-bottom: 1px solid #d2c5c5;
        padding: .62rem 1.25rem;
    }
</style>
@endsection

@section('content')

<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - Country
            </h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Country</span>
            </div>
        </div>
    </div>
</div>


<div class="page-content pt-0">

    <!-- Main content -->
    <div class="content-wrapper">

        <div class="content">
            <div class="card border-y-2 border-top-slate border-bottom-slate rounded-0">
                <div class="card-header">
                    <h6 class="card-title"><span class="font-weight-semibold"></span></h6>
                </div>
                <div class="card-body">
                    <!-- Content area -->
                    <div class="row">
                        <div class="col-md-6 ">
                        <div id="validateDiv">
                            <form action="">
                            <div class="col-md-12 form-group">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Country: </label>
                                        <input type="text" class="form-control" id="txtcountry" 
                                        validate="true" match="^.+$" error="* Country required." onkeyup="checkcountry();"/>
                                        <div class="text-danger error"></div>
                                     </div>
                                   
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Code:
                                        </label>
                                        <input type="text" class="form-control" id="txtcode"
                                        validate="true" match="^.+$" error="* Code required." onkeyup="checkcountry();"/>
                                        <div class="text-danger error"></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <button type="button" id="btnSave" class="btn btn-success"><span
                                            class="fa fa-floppy-o"></span>&nbsp;Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                          
                           
                        </div>
                        <div class="col-md-6 ">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead style="background-color: darkslategray; color: wheat;">
                                        <tr>
                                            <th style="display: none;">ID</th>
                                            <th>Country</th>
                                            <th>Code</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="countrytbl">

                                    </tbody>
                                </table>
                            </div>
                        </div>
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
<script src="{{asset('js/iziToast.min.js')}}" type="text/javascript"></script>
<script src="{{asset('plugins/jqueryUI/jquery-ui-timepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('jsPagesMhac/Country.js')}}" type="text/javascript"></script>
<script src="{{asset('js/strength-meter.min.js')}}" type="text/javascript"></script>

<script>
    // function checkVali() {
    //     validate('#newUserGroup');
    // }

    // function checkvali3() {
    //     validate('#userDetails');
    // }

    // function checkvali4() {
    //     validate('#loginDetails');
    // }


    $(document).on('mouseover', '.list-group-item', function (event) {
        event.preventDefault();
        $(this).closest('li').addClass('open');
    });
    $(document).on('mouseout', '.list-group-item', function (event) {
        event.preventDefault();
        $(this).closest('li').removeClass('open');
    });


    $(document).on('click', '.list-group-item', function () {
        $('.hideCell').show();
        $('.hideCell').attr('style', 'text-align: center; display: table-cell;border-right: 1px solid rgb(221, 221, 221);');
    });

    // $('#selectAll').click(function (event) {
    //     if (this.checked) {
    //         $('.chkBoxSelect').each(function () {
    //             this.checked = true;
    //         });
    //     } else {
    //         $('.chkBoxSelect').each(function () {
    //             this.checked = false;
    //         });
    //     }
    // });

    
</script>
<script>
    function checkcountry() {
            validate('#validateDiv');
        }
</script>
@endsection

@endif