@extends('layout')

@section('title', 'IOM - Rapid Test Review By DPP')


@section('content')

<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>Rapid Test Review By DPP</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <span class="breadcrumb-item active">Rapid Test Review By DPP</span>
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
            <div class="card" style="padding-left: 20px; padding-top: 20px;">
                <div class="card-body">

                    <div class="col-md-12 form-group">
                        <div id="tableContainer" class="table-responsive">
                            <table class="table table-bordered table-hover table-striped text-center" id="familyMemTable" style="">
                                <thead style="background-color: darkslategray;color: wheat;">
                                    <tr>
                                        <th>No</th>
                                        <th nowrap>Test</th>
                                        <th nowrap>Result</th>
                                        <th nowrap>Comment</th>
                                    </tr>
                                </thead>
                                <tbody id="familyMemTBody">
                                    <tr>
                                        <td>1</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <input type="text" name="" value="" class="form-control" />
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <input type="text" name="" value="" class="form-control" />
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <input type="text" name="" value="" class="form-control" />
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 row form-group">
                        <div class="col-md-2">
                            <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Comment</lable>
                        </div>
                        <div class="col-md-5">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 row form-group">

                        <div class="col-md-5">
                            <lable><span class="fa fa-dot-circle-o"></span>&nbsp;&nbsp;Referral for other Abnormalities</lable>
                        </div>
                    </div>
                    <div class="col-md-12 row form-group">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-3">
                            <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Doctor's Name</lable>
                            <input type="text" name="DoctorName" id='DoctorName' value="" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-12 row form-group">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-3">
                            <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Institute</lable>
                            <input type="text" name="" value="" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-12 row form-group">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-5">
                            <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Remark</lable>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 row form-group">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-lg btn-primary fa fa-print" style="width: 15rem">&nbsp;&nbsp;&nbsp;Print</button>
                        </div>
                        <div class="col-md-3">
                             <button class="btn btn-lg btn-success fa fa-window-restore " style="width: 15rem">&nbsp;&nbsp;&nbsp;Complete Review</button>
                        </div>
                        <div class="col-md-3">

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
    <script src={{asset('jsPages/RapidTestReviewByDpp.js')}} type="text/javascript"></script>
@endsection


