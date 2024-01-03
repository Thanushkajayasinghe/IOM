@extends('layout')

@section('title', 'Phlebotomy')

@if($readWrite == 'true' || $readOnly == 'true')

@section('header')
<style>
    .button_wrap {
        /* max-width: 1190px; */
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        /* padding: 80px 20px; */
    }

    .button_wrap h1 {
        font-size: 50px;
        font-weight: 700;
        text-align: center;
        padding-bottom: 70px;
    }

    .button_wrap button {
        width: 100%;
        height: 180px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        margin: 0 5px;
        background: #e5e9f4;
        box-shadow: -.5rem -.5rem 1rem rgb(255 255 255 / 75%),
            .5rem .5rem 1rem rgb(128 128 128 / 50%);
        border: 10px solid transparent;
        border-radius: 10px;
        transition: .4s;
        cursor: pointer;
    }

    .button_wrap button:hover {
        box-shadow: -.5rem -.5rem 1rem rgb(255 255 255 / 75%),
            .5rem .5rem 1rem rgb(128 128 128 / 50%), inset .5rem .5rem 1rem hsl(0 0% 50% / .5), inset -.5rem -.5rem 1rem hsl(0 0% 100% / .75);
    }

    .button_wrap button:hover i {
        color: red;
    }

    .button_wrap button i {
        font-size: 50px;
        margin-bottom: 20px;
        transition: .4s;
    }

    .button_wrap button span {
        font-size: 18px;
        font-weight: 500;
        transition: .4s;
    }

    .button_wrap button:hover span {
        color: red;
    }

    .hidden{
        display: none;
    }
</style>
@endsection

@section('content')

<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>Phlebotomy</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Phlebotomy</span>
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
            <div class="card border-y-2 border-top-slate border-bottom-slate rounded-0">
                <div class="card-header">

                    <div class="col-md-12 form-group">
                        <div class="button_wrap row" style="justify-content: center;">
                            <div class="col-md-2 form-group hidden">
                                <button type="button" class="btnContry" attr-country="UK" style="background: bisque;">
                                    <i style="background-image: url(&quot;https://cdn-icons-png.flaticon.com/512/303/303219.png&quot;);width: 70px;height: 62px;background-size: cover;"></i>
                                    <span>United Kingdom</span>
                                </button>
                            </div>
                            <div class="col-md-2 form-group">
                                <button type="button" class="btnContry" attr-country="CA" style="background: #6adf6a;">
                                    <i style="background-image: url(&quot;https://cdn-icons-png.flaticon.com/512/303/303013.png&quot;);width: 70px;height: 62px;background-size: cover;"></i>
                                    <span>Canada</span>
                                </button>
                            </div>
                            <div class="col-md-2 form-group">
                                <button type="button" class="btnContry" attr-country="AU" style="background: aqua;">
                                    <i style="background-image: url(&quot;https://cdn-icons-png.flaticon.com/512/302/302986.png&quot;);width: 70px;height: 62px;background-size: cover;"></i>
                                    <span>Australia</span>
                                </button>
                            </div>
                            <div class="col-md-2 form-group" >
                                <button type="button" class="btnContry" attr-country="NZ" style="background: darkkhaki;">
                                    <i style="background-image: url(&quot;https://cdn-icons-png.flaticon.com/512/303/303130.png&quot;);width: 70px;height: 62px;background-size: cover;"></i>
                                    <span>New Zealand</span>
                                </button>
                            </div>
                            <div class="col-md-2 form-group">
                                <button type="button" class="btnContry" attr-country="IHAP" style="background: plum;">
                                    <i style="background-image: url(&quot;https://upload.wikimedia.org/wikipedia/id/thumb/b/bd/IOM.svg/200px-IOM.svg.png&quot;);width: 70px;height: 62px;background-size: cover;"></i>
                                    <span>IHAP</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <div class="button_wrap row" style="justify-content: center;">
                            <div class="col-md-2 form-group">
                                <button type="button" class="btnContry" attr-country="OT" style="background: orange;">
                                <i style="background-image: url(&quot;https://cdn-icons-png.flaticon.com/512/455/455885.png&quot;);width: 70px;height: 62px;background-size: cover;"></i>
                                    <span>Others</span>
                                </button>
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
<script>
    var path = "{{url('/')}}";
</script>
<script src="{{asset('jsPagesMhac/PhlebotomyLanding.js')}}" type="text/javascript"></script>
@endsection
@endif