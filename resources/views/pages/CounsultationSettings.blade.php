@extends('layout')

@section('title', 'IOM - CONSULTATION SETTINGS')



@section('content')
<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>CONSULTATION SETTINGS</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">CONSULTATION SETTINGS</span>
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
                        <div class="row form-group">
                            <div class="col-md-4">
                                <h2><span class="badge badge-primary">Check List Items</span></h2>                                
                                <div class="col form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label>Description</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <table class="table table-bordered text-center">
                                        <thead style="background-color: darkslategray;color: wheat;">
                                            <tr>
                                                <th>Description</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td><button type="button" class="btn btn-danger" style="padding: .3rem 0.6rem;"><span class="fa fa-close"></span></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                <h2><span class="badge badge-dark">Main Display Messages</span></h2>                                
                                <div class="col form-group">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <label>Description</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <table class="table table-bordered text-center">
                                        <thead style="background-color: darkslategray;color: wheat;">
                                            <tr>
                                                <th>Description</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td><button type="button" class="btn btn-danger" style="padding: .3rem 0.6rem;"><span class="fa fa-close"></span></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="col-md-8">
                                <h2><span class="badge badge-warning">Upload Recordings</span></h2>
                                <div class="col form-group">
                                    <div class="row ">

                                        <div class="col-md-4">
                                            <label>Description</label>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <div class="file btn btn-lg btn-primary form-control fa fa-upload" style=" position: relative;
                                                 overflow: hidden;">
                                                Upload
                                                <input style=" position: absolute;
                                                       font-size: 50px;
                                                       opacity: 0;
                                                       right: 0;
                                                       top: 0;" type="file" name="file"/>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-primary btn-sm"><span class="fa fa-plus"></span></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col form-group table table-responsive">
                                    <table class="table table-bordered text-center ">
                                        <thead style="background-color: darkslategray;color: wheat;">
                                            <tr>
                                                <th>Language</th>
                                                <th>Description</th>
                                                <th>Play Back</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><a id="play-pause-button" class="fa fa-play-circle fa-2x"></a></td>
                                                <td><button type="button" class="btn btn-danger" style="padding: .3rem 0.6rem;"><span class="fa fa-close"></span></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        <div class="col text-center">
                            <button type="button" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-info">Clear</button>
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
<script src={{asset('jsPages/CounsultationSettings.js')}} type="text/javascript"></script>
@endsection
