@extends('layout')

@section('title', 'Consultation')


@section('header')
<link href="{{asset('css/3dbuttons.css')}}" rel="stylesheet" type="text/css">
<style>
    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }

    .btn-circle.btn-lg {
        width: 50px;
        height: 50px;
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 25px;
    }

    .btn-circle.btn-xl {
        width: 70px;
        height: 70px;
        padding: 10px 16px;
        font-size: 24px;
        line-height: 1.33;
        border-radius: 35px;
    }

    #noshow {
        width: 40% !important;
    }


    .clickedRow {
        background-color: aquamarine !important;
    }

    .prevClicked {
        background-color: #e0a57a;
    }

    .rowSaved {
        background-color: #ff0134;
    }

    #noshow {
        width: 40% !important;
    }

</style>
@endsection

@section('content')

<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">

        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <div class="breadcrumb">

            </div>
        </div>
    </div>
</div>
<!-- Page header -->


<!-- Page content -->
<div class="page-content pt-0">

    <!-- Main content -->
    <div class="content-wrapper" style="padding: 0 5px;">

        <div class="row justify-content-center">
            <div class="col-sm-3">
                <div class="card border-top-3 border-top-warning border-bottom-3 border-bottom-warning rounded-0">
                    <div class="card-header" style="padding: 8px;">
                        <h2 class="card-title text-center" style="font-size: 2rem;">CURRENT TOKEN</h2>
                    </div>
                    <div class="card-body" style="padding: 0;">
                        <h2 class="card-title text-center" id="currentTokenNo"
                            style="font-size: 3rem;font-weight: 900;color: #e4a525;"> - </h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card border-top-3 border-top-success border-bottom-3 border-bottom-success rounded-0">
                    <div class="card-header" style="padding: 8px;">
                        <h2 class="card-title text-center" style="font-size: 2rem;">SECTION</h2>
                    </div>
                    <div class="card-body" style="padding: 12px;">
                        <h2 class="card-title text-center" style="font-size: 2rem; color: green;">Consultation</h2>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card border-top-3 border-top-slate border-bottom-3 border-bottom-slate rounded-0">
                    <div class="card-header" style="padding: 8px;">
                        <h2 class="card-title text-center" style="font-size: 2rem;">COUNTER</h2>
                    </div>
                    <div class="card-body" style="padding: 0;">
                        <h2 class="card-title text-center" id="curCounter"
                            style="font-size: 3rem;font-weight: 900;color: #e4a525;"> - </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col-md-2">
                <button type="button" class="btn-block btn-success btn-lg btn3d" id="next">
                    <span class="fa fa-arrow-right" style="font-size: 2rem;display: block;"></span> <span
                        style="font-size: 2rem;display: block;position: relative;top: 4px;">Call Next</span>
                </button>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn-block btn-info btn-lg btn3d" id="recall">
                    <span class="fa fa-volume-up" style="font-size: 2rem;display: block;"></span> <span
                        style="font-size: 2rem;display: block;position: relative;top: 4px;">Call Again</span>
                </button>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn-block btn-danger btn-lg btn3d" id="notAvailable">
                    <span class="fa fa-close" style="font-size: 2rem;display: block;"></span> <span
                        style="font-size: 2rem;display: block;position: relative;top: 4px;">No Show</span>
                </button>
            </div>
            <div class="col-md-2">

                <div class="card card-body">
                    <div class="row text-center">
                        <div class="col-6" id="Temporary" style="display: none;">
                            <p><i class="icon-users2 icon-2x d-inline-block text-info"></i></p>
                            <span class="text-muted font-size-sm">Temp Show</span>
                        </div>

                        <div class="col-12" id="History">
                            <p><i class="icon-point-up icon-2x d-inline-block text-warning"></i></p>
                            <span class="text-muted font-size-sm">History</span>
                        </div>
                    </div>
                </div>
            </div>
            {{--//Temporary--}}
            <div class="col-md-3 ">
                <div class="row row-tile no-gutters">
                    <div class="col-6">
                        <button type="button" class="btn btn-light btn-block btn-float m-0" style="padding: 6px;">
                            <i class="icon-hour-glass text-warning-400 icon-2x mt-1"></i>
                            <span style="font-size: 1rem;padding: 4px;">Pending Tokens</span>
                            <span style="font-size: 1.5rem;padding: 1px;" id="CTNumber"> - </span>
                            <div id="pendingTokenProgress" style="margin-top: 4px;"></div>
                        </button>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-light btn-block btn-float m-0" style="padding: 6px;">
                            <i class="icon-volume-high text-pink-400 icon-2x mt-1"></i>
                            <span style="font-size: 1rem;padding: 4px;">Call Again Tokens</span>
                            <span style="font-size: 1.5rem;padding: 1px;" id="callAgainTokens"> - </span>
                            <div id="callAgainTokenProgress" style="margin-top: 4px;"></div>
                        </button>
                    </div>
                </div>

            </div>

        </div>

        <!-- Content area -->
        <div class="row justify-content-center">
            <div id="clearingID" class="col" style="display: none;">
                <div class="content" style="padding: 1.25rem 0;">
                    <div class="card">

                        <div class="card-header">

                            <div class="col-md-12 form-group">
                                <div class="row">
                                    <div class="col col-lg-3">
                                        <span id="noOfFamily" style="display: none;">
                                            <label><span class="fa fa-users"></span>&nbsp;&nbsp;No Of Family
                                                Members</label>
                                            <div class="form-group">
                                                <input type="number" id="noOfFamilyMembers" value="" min="1"
                                                    class="form-control">
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="row justify-content-center" style="font-size: 1rem;text-align: center;">
                                    <div class="col-md-4">
                                        <div class="card card-table">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="background-color: #f98469">Appointment No</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="appbody">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-body detailbody" >
                            <div class="col">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="col-md-12 form-group">
                                            <div class="row form-group">
                                                <div class="col-md-3" style="display: none;">
                                                    <label><span
                                                            class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Registration
                                                        No</label>
                                                    <div class="form-group">
                                                        <input id="registration_id" type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-12">
                                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Name
                                                        in
                                                        Full</label>
                                                    <div class="form-group">
                                                        <input id="NameInFull" readonly type="text"
                                                            class="form-control col-md-9">
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-4">
                                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Current
                                                        Passport Number</label>
                                                    <div class="form-group">
                                                        <input id="PassportNumber" readonly type="text"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><span
                                                            class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Birthday</label>
                                                    <div class="form-group">
                                                        <input type="text" readonly id="birthdayCon"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row form-group">
                                                <div class="col-md-4">
                                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Current
                                                        Gender</label>
                                                    <div class="form-group">
                                                        <input id="gender" readonly type="text"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label><span
                                                            class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Age</label>
                                                    <div class="form-group">
                                                        <input type="text" readonly id="age"
                                                            class="form-control">
                                                    </div>
                                                </div>

                                            </div>

                                        </div>


                                        <div class="card card-collapsed">
                                            <div class="card-header header-elements-inline">
                                                <h6 class="card-title"><b>Additional Details</b></h6>
                                                <div class="header-elements">
                                                    <div class="list-icons">
                                                        <a class="list-icons-item" data-action="collapse"></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="col-md-12 form-group">
                                                    <div class="row form-group">

                                                        <div class="col-md-6" style="padding-left: 0;">
                                                            <div class="col-md-12">
                                                                <h5>Address during staying in Sri Lanka</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label><span
                                                                        class="fa fa-address-card"></span>&nbsp;&nbsp;Address</label>
                                                                <div class="form-group">
                                                                    <input id="SlAddress" readonly type="text"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label><span
                                                                        class="fa fa-road"></span>&nbsp;&nbsp;Street</label>
                                                                <div class="form-group">
                                                                    <input id="SlStreet" readonly type="text"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label><span
                                                                        class="fa fa-building"></span>&nbsp;&nbsp;City</label>
                                                                <div class="form-group">
                                                                    <input id="SlCity" readonly type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="col-md-12">
                                                                <label><span
                                                                        class="fa fa-envelope"></span>&nbsp;&nbsp;Postal
                                                                    Code</label>
                                                                <div class="form-group">
                                                                    <input id="SlPostalCode" readonly type="text"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <label><span
                                                                        class="fa fa-phone"></span>&nbsp;&nbsp;Telephone-Fixed
                                                                    Line</label>
                                                                <div class="form-group">
                                                                    <input id="SlTelephoneFixedLine" type="text"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label><span
                                                                        class="fa fa-mobile"></span>&nbsp;&nbsp;Mobile</label>
                                                                <div class="form-group">
                                                                    <input id="SlMobile" readonly type="text"
                                                                        class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="col-md-12 form-group">
                                            <div class="col-md-12 form-group">
                                                <img id="img" class="img-thumbnail"
                                                    src="{{url('images/PhotoBooth.png')}}"
                                                    style="border: 2px solid black; height: auto; width: 100%;">
                                            </div>

                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card detailbody" >
                        <div class="card-body">
                            <div class="col-md-12 form-group">

                                <div class="row form-group">
                                    <div class="col-md-6 form-group">
                                        <p>Has the applicant (or their child) had any of the following symptoms in
                                            the last
                                            three months.</p>
                                        <div class="row form-group">
                                            <div class="col-2 form-group">
                                                Yes
                                            </div>
                                            <div class="col-2 form-group">
                                                No
                                            </div>
                                            <div class="col-2 form-group">
                                                Unknown
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="ty1"
                                                            value="1" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="ty1"
                                                            value="2" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="ty1"
                                                            value="3" checked data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 form-group">
                                                <h4>Cough</h4>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled radi"
                                                            name="ty2" value="1" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled radi"
                                                            name="ty2" value="2" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled radi"
                                                            name="ty2" value="3" checked data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 form-group">
                                                <h4>Haemoptysis</h4>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="ty3"
                                                            value="1" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="ty3"
                                                            value="2" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="ty3"
                                                            value="3" checked data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 form-group">
                                                <h4>Night Sweats</h4>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="ty4"
                                                            value="1" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="ty4"
                                                            value="2" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="ty4"
                                                            value="3" checked data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 form-group">
                                                <h4>Weight Loss</h4>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="ty5"
                                                            value="1" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="ty5"
                                                            value="2" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="ty5"
                                                            value="3" checked data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 form-group">
                                                <h4>Fever</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 form-group hidpan">
                                        <p>For children only, is there any history of the following,</p>
                                        <div class="row form-group">
                                            <div class="col-md-2 form-group">
                                                Yes
                                            </div>
                                            <div class="col-md-2 form-group">
                                                No
                                            </div>
                                            <div class="col-md-2 form-group">
                                                Unknown
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled chil"
                                                            name="tyr1" value="1" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled chil"
                                                            name="tyr1" value="2" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled chil"
                                                            name="tyr1" value="3" checked data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 form-group">
                                                <h4>Any chronic respiratory disease, such as cystic fibrosis</h4>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled chil"
                                                            name="tyr2" value="1" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled chil"
                                                            name="tyr2" value="2" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled chil"
                                                            name="tyr2" value="3" checked data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 form-group">
                                                <h4>Previous thoracic surgery</h4>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled chil"
                                                            name="tyr3" value="1" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled chil"
                                                            name="tyr3" value="2" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled chil"
                                                            name="tyr3" value="3" checked data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 form-group">
                                                <h4>Cyanosis</h4>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled chil"
                                                            name="tyr4" value="1" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled chil"
                                                            name="tyr4" value="2" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled chil"
                                                            name="tyr4" value="3" checked data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 form-group">
                                                <h4>Respiratory insufficiency that limits activity</h4>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-12 form-group">
                                        <p>For all applicants.</p>
                                        <div class="row form-group">
                                            <div class="col-2 form-group">
                                                Yes
                                            </div>
                                            <div class="col-2 form-group">
                                                No
                                            </div>
                                            <div class="col-2 form-group">
                                                Unknown
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="tyg1"
                                                            value="1" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="tyg1"
                                                            value="2" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="tyg1"
                                                            value="3" checked data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col form-group">
                                                <h4>Is there any history of previous TB?</h4>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="tyg2"
                                                            value="1" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="tyg2"
                                                            value="2" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="tyg2"
                                                            value="3" checked data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col form-group">
                                                <h4>Has anyone in the Household been diagnosed with TB in the past 2
                                                    years?</h4>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="tyg3"
                                                            value="1" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="tyg3"
                                                            value="2" data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-2 form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="radio" class="form-check-input-styled" name="tyg3"
                                                            value="3" checked data-fouc>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col form-group">
                                                <h4>Is there any history of recent contact with a case of active
                                                    pulmonary
                                                    TB
                                                    (shared the same enclosed air space or household or other
                                                    enclosed
                                                    environment for prolonged period for days or weeks )?</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="row form-group">
                                    <div class="col-md-2">
                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Examination
                                            Remarks</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea id="examsresults" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="checkbox-parent" class="col-md-12 form-group">
                                <div class="row form-group">
                                    <div class="col-md-2">
                                        <div class="col-md-12 form-group">
                                            <img class="img-thumbnail" style="width: 200px; height: 200px;"
                                                src={{asset('images/Lungs.png')}}>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <img class="img-thumbnail" style="width: 200px; height: 200px;"
                                                src={{asset('images/xray.png')}}>
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row" style="margin-top: 30px;">
                                            <div class="col-md-4">
                                                <label><b>Minor findings</b></label>

                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox1" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox1" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>1.1 Single fibrous streak/band/scar</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox2" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox2" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>1.2 Bony islets</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox3" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox3" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>2.1 Pleural capping with a smooth inferior border(&lt;1cm
                                                                thick at all points)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox4" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox4" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>2.2 Unilateral or bilateral costophrenic angle
                                                                blunting
                                                                (below the horizontal)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox5" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox5" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>2.3 calcified nodule(s) in the hilum/ mediastinum
                                                                with no
                                                                pulmonary granulomas</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-4">
                                                <label><b>Minor Finding(occasionally assoclated with TB
                                                        infection)</b></label>

                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox6" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox6" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>3.1 Solitary granuloma(&lt;1cm and of any lobe) with
                                                                an
                                                                unremarkable hilum</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox7" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox7" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>3.2 Solitary granuloma(&lt;1cm and of any lobe) with
                                                                calcified/ enlarged hllar lymph nodes</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox8" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox8" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>3.3 Single/ Multiple calcified pulmonary
                                                                nodules/micronodules
                                                                with distinct borders</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox9" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox9" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>3.4 Calcified pleural lesions</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox10" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox10" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>3.5 Costophrenic Angle blunting(either side above the
                                                                horizontal)</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-4">
                                                <label><b>Findings sometines seen in active TB(or other
                                                        conditions)</b></label>

                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox11" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox11" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>4.0 Notable apical pleural capping(rough or rangged
                                                                inferior
                                                                borderand/or_&gt;1cm thick at any point)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox12" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox12" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>4.1 Aplcal fbronodualar/ fibrocalcific lesions or
                                                                apical
                                                                microcalcifications</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox13" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox13" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>4.2 Multiple/ single pulmonary nodules/
                                                                micronodules(noncalcified or poorly defined)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox14" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox14" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>4.3 Isolated hilar or mediastinal
                                                                mass/lymphadenopathy(noncalcified)</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox15" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox15" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>4.4 Single / Multiple pulmonary noduies/ masses _&gt;1cm
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox16" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox16" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>4.5 Non-calcified pleural fibrosos and/ or
                                                                effuslon</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox17" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox17" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>4.6 Interstltial fbrosos/parenchymal lung disease/
                                                                acute
                                                                pulmoneary disease</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox18" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox18" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <p>4.7 Any cavitating lesion OR "fluffy" or "Soft"
                                                            lesions felt
                                                            likely to represent active TB</p>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                </div>


                                            </div>

                                            <div class="col-md-5">
                                                <label><b>Other findings (describe the abnormality in descriptive
                                                        findings/comments below)</b></label>

                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox19" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox19" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>Skeleton and soft tissue</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox20" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox20" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>cardiac or major vessels</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox21" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox21" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>lung fields</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="row">
                                                        {{-- <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="rchkbox22" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                disabled data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div> --}}
                                                        <div class="col-1">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <div class="uniform-checker"><span><input
                                                                                id="chkbox22" type="checkbox"
                                                                                class="form-check-input-styled chk"
                                                                                data-fouc=""></span>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <p>other</p>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="row form-group">
                                        <div class="col-md-2">
                                            <label><span class="fa fa-hand-o-right"></span>&nbsp; Comment</label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <textarea id="rad_comment2" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Chest X-Ray</label>
                                        <div class="form-group">
                                            <select class="form-control" id="CXRay">
                                                <option>Select</option>
                                                <option selected>Normal</option>
                                                <option>Abnormal</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 form-group" style="border: solid 1px black;">
                                <div class="row form-group"></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="row form-group">
                                    <div class="col-md-12 row">
                                        <div class="col-md-12">
                                            <center>
                                                <h4>History</h4>
                                            </center>
                                        </div>
                                        <div class="col-md-4">
                                            <h5><u>HIV</u></h5>
                                        </div>
                                        <div class="col-md-4">
                                            <h5><u>Malaria</u></h5>
                                        </div>
                                        <div class="col-md-4">
                                            <h5><u>Filaria</u></h5>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>1.Have you ever been tested for HIV, the virus that causes
                                                    AIDS? </p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox70"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}

                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>2.Have you ever been screened for hepatitis or syphilis any time
                                                    in the past?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox71"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>3.At any age have you engaged in casual unprotected oral,
                                                    vaginal, or anal sex (with anyone other than spousal partner)
                                                    ?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox72"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>4.If yes for 1.3: </p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>i.have you used condom or any barrier methods?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox73"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>ii.Is he/she infected with sexually transmitted diseases? </p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox74"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>5.Does your partner engage in casual oral, vaginal, or anal sex
                                                    with others ? </p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox75"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>i.have you used condom or any barrier methods?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox76"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{-------------------------------------------}}
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>6.Have you ever received any injections with a potentially
                                                    contaminated needle or syringe?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox77"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>7.Have you ever used drugs through shared needles ?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox78"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>8.Have you ever had sexual relationship with an injection drug
                                                    user?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox79"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>9.Have you ever treated with blood or blood products ? </p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox80"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>If yes , do you know whether the blood or blood products have
                                                    been tested for HIV ?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox81"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>10.Do you have tattoos or have undergone a tattoo with
                                                    potentially contaminated tattoo needles or other skin-piercing
                                                    instruments ?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox82"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>11.Are you a health care worker who come into contact with blood,
                                                    blood products, unclean needles, or surgical instruments ?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox83"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>12.Were you born to a HIV infected mother ?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox84"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>13.Were you breast fed by a HIV infected mother ?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox85"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}


                                    </div>

                                    {{--======================================END HIV Strat Faslria===--}}
                                    <div class="col-md-4">
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>14. Do you have fever or had fever over the last one year ?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox86"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>15. Are you having headache, weakness, muscle pains and joint
                                                    pains? </p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox87"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>16.Have travelled to or lived in a country with Malaria (endemic
                                                    country) ?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox88"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>17. If yes; have you used insecticide-treated bed nets while in
                                                    that country ?
                                                </p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox89"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>18. Have you ever diagnosed with Malaria ?
                                                </p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox90"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>19. If yes; have you undergone drug treatment ?

                                                </p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox91"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>20. If yes; for how long have you been treated ?

                                                </p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox92"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}

                                    </div>
                                    {{--======================================END Faleria Strat Malaria===--}}

                                    <div class="col-md-4">
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>21. Have travelled to or lived in a country with Filariasis
                                                    (endemic country) ?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox93"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>22. Have you ever diagnosed with Filariasis ?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox94"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>23. If yes; have you undergone drug treatment ?</p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox95"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}
                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p> 24. If yes; for how long have you been treated ?
                                                </p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox96"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}

                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>25. Have you ever suffered from leg/ scrotal/ hand swelling in
                                                    relation to Filariasis (Lymphoedema) ?
                                                </p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox97"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}

                                        {{-----------------------------start checkbox modifi anja------------------------------------------------------}}
                                        <div class="col-md-12 row">
                                            <div class="col">
                                                <p>26. Do you have dry cough and wheezing which worse at night?
                                                </p>
                                            </div>

                                            <div class="col-1">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <div class="uniform-checker"><span><input id="chkbox98"
                                                                    type="checkbox" class="form-check-input-styled chk"
                                                                    data-fouc=""></span>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--------------------------------------end checkbox modifi anja--------------------------------------------}}


                                    </div>


                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="row form-group">
                                    <div class="col-md-2">
                                        <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;DPP'S
                                            Comment</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea id="cm_dpp_comment" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            

                            <div class="col-md-12 form-group">
                                <div id="tableContainer" class="table-responsive" style="display: none;">
                                    <table class="table table-bordered table-hover table-striped text-center"
                                        id="rapidTestResultsTbl" style="">
                                        <thead style="background-color: darkslategray;color: wheat;">
                                            <tr>
                                                <th style="display: none;"></th>
                                                <th>No</th>
                                                <th nowrap>Test</th>
                                                <th nowrap>Result</th>
                                                <th nowrap>Comment</th>
                                            </tr>
                                        </thead>
                                        <tbody id="rapidTestResultsTBody">
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                           

                        </div>

                        <input type="hidden" id="oldSpu" value="">

                        <div class="col-md-12 form-group text-center">
                           
                            <a href='javascript:void(0);' class="btn-lg btn-success btn3d" id="save" style="">Complete
                                Consultation</a>
                            <a href='javascript:void(0);' class="btn-lg btn-info btn3d" id="print" style="">Print
                                Summary</a>
                            <a href='javascript:void(0);' class="btn-lg btn-warning btn3d" id="printCertificate1">Print
                                Certificate 1</a>
                            <a href='javascript:void(0);' class="btn-lg btn-warning btn3d" id="printCertificate2">Print
                                Certificate 2</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

<div id="noshow" data-izimodal-group="group1" data-izimodal-loop="" data-izimodal-title="Notavailble Tokens"
    data-izimodal-subtitle="Not Available">
    <div class="col-md-12 form-group">
        <div class="row" style="font-size: 1rem;text-align: center;">
            <table class="table table-bordered">
                <tbody id="appNotAvblBody">

                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="noshow2" data-izimodal-group="group11" data-izimodal-loop="" data-izimodal-title="Temporary Save Data"
    data-izimodal-subtitle="Not Available">
    <div class="col-md-12 form-group">
        <div class="row" style="font-size: 1rem;text-align: center;">
            <table class="table table-bordered">
                <tbody id="appNotAvblBody2">

                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="noshow3" data-izimodal-group="group155" data-izimodal-loop="" data-izimodal-title="History"
    data-izimodal-subtitle="History">

    <div class="col-md-12 form-group" style="margin-top: 30px;">
        <div class="row">

            <div class="col-md-4">
                <label for="txtPassportNo"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                    Passport No (Main Member)</label>
                <div class="form-group">
                    <input type="text" id="txtPassportNo" class="form-control formS caps">
                </div>
            </div>

            <div class="col-md-4">
                <label for="txtAppointmentNo"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;
                    Appointment No (Main Member)</label>
                <div class="form-group">
                    <input type="text" id="txtAppointmentNo" class="form-control">
                </div>
            </div>
            <div class="col-md-1">
                <label>&nbsp;&nbsp;</label>
                <div class="form-group">
                    <button type="button" id="btnVerify" class="btn btn-warning btn-sm" title="Verify">
                        <span class="fa fa-search"></span>
                    </button>
                </div>
            </div>
            <div class="col-md-2">
                <label>&nbsp;&nbsp;</label>
                <div class="form-group">
                    <input class="form-control" id="verfiBox" readonly="readonly"
                        style="border: 0;pointer-events: none;font-size: 1.5rem;text-align: center;">
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="row">
            <div class="col-md-12 form-group table-responsive">
                <table class="table table-bordered table-hover table-striped text-center" id="fultbl">
                    <thead style="background-color: darkslategray;color: wheat;">
                        <tr>
                            <th style="display: none;"></th>
                            <th style="width: 3%;"></th>
                            <th>Appointment No</th>
                            <th>Name</th>
                            <th>Date</th>

                        </tr>
                    </thead>
                    <tbody id="verifyStatTable">
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

</div>

<div id="biometricVerification" data-izimodal-group="group13" data-izimodal-loop=""
    data-izimodal-title="Biometric Verification" data-izimodal-subtitle="Finger Print Verify">
    <div class="card">
        <div class="card-body">

            <div class="col-md-12 row form-group" style="margin-top: 2%;">
                <div class="col-md-4 offset-md-4 form-group">
                    <div class="row row-tile no-gutters">
                        <div class="col-6">
                            <button id="flatRightThumbVerify" type="button"
                                class="btn btn-light btn-block btn-float m-0">
                                <i class="icon-thumbs-up2 text-blue-400 icon-2x"></i>
                                <span>Flat Right Thumb</span>
                            </button>
                        </div>
                        <div class="col-6">
                            <button id="flatLeftThumbVerify" type="button"
                                class="btn btn-light btn-block btn-float m-0">
                                <i class="icon-thumbs-up2 text-success-400 icon-2x" style="transform: scaleX(-1);"></i>
                                <span>Flat Left Thumb</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 showFingerVeriPanel" style="display: none;">
                <div class="row align-items-center justify-content-center">
                    <div class="col-3">
                        <div class="card">
                            <a href="javascript:void(0);">
                                <img id="loadImageSavedVeri" class="img-fluid" alt="">
                            </a>

                            <div class="card-body">
                                <div class="list-feed">
                                    <div class="list-feed-item border-warning-400">
                                        <div class="text-muted font-size-sm mb-1">Appointment Number:</div>
                                        <span id="verAppNo"></span>
                                    </div>

                                    <div class="list-feed-item border-warning-400">
                                        <div class="text-muted font-size-sm mb-1"></div>
                                        <span id="fingerName"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn-warning btn-lg btn3d" id="startFingerPrintProcessVerification"
                            style="width: 15rem; color: black;position: relative;left: 7px; font-weight: bold;">
                            <span class="fa fa-play"></span>&nbsp;&nbsp;Start Process
                        </button>


                        <button type="button" id="veriOk" class="btn-success btn-lg btn3d"
                            style="width: 15rem; color: black;position: relative;left: 7px; font-weight: bold; display: none;">
                            <span class="fa fa-check"></span>&nbsp;&nbsp;OK
                        </button>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <a href="javascript:void(0);" id="loadImageSavedVeriCurrent" style="text-align: center;">

                            </a>

                            <div class="card-body">
                                <div class="list-feed">
                                    <div class="list-feed-item border-warning-400">
                                        <div class="text-muted font-size-sm mb-1">Appointment Number:</div>
                                        <span id="verAppNoVe"></span>
                                    </div>

                                    <div class="list-feed-item border-warning-400">
                                        <div class="text-muted font-size-sm mb-1"></div>
                                        <span id="fingerNameVe"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-12" id="responseText">

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- /page content -->
@endsection

@section('scripts')
<script src="{{asset('js/progressbar.js')}}" type="text/javascript"></script>
<script>
   
</script>
<script src={{asset('jsPagesMhac/Consultation.js')}} type="text/javascript"></script>
<script>
    $('#noshow').iziModal({
        headerColor: '#26A69A',
        width: '90%',
        overlayColor: 'rgba(0, 0, 0, 0.5)',
        fullscreen: true,
        transitionIn: 'fadeInUp',
        transitionOut: 'fadeOutDown'
    });
    $('#noshow2').iziModal({
        headerColor: '#26A69A',
        width: '50%',
        overlayColor: 'rgba(0, 0, 0, 0.5)',
        fullscreen: true,
        transitionIn: 'fadeInUp',
        transitionOut: 'fadeOutDown'
    });
    $('#noshow3').iziModal({
        headerColor: '#26A69A',
        width: '90%',
        overlayColor: 'rgba(0, 0, 0, 0.5)',
        fullscreen: true,
        transitionIn: 'fadeInUp',
        transitionOut: 'fadeOutDown'
    });


    $('#biometricVerification').iziModal({
        headerColor: '#26A69A',
        width: '90%',
        overlayColor: 'rgba(0, 0, 0, 0.5)',
        fullscreen: true,
        transitionIn: 'fadeInUp',
        transitionOut: 'fadeOutDown'
    });
    var urlPath = '{{url('/')}}';
    var path = '{{url('/mhacPhotobooth')}}';
    var imgPathBlade = '{{url('images/')}}';
</script>

<script>
    function checkValio() {
        validate('#validateDiv');
    }

</script>
@endsection
