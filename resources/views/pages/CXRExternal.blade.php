@extends('layout')

@section('title', 'Appointment Cancel/Re Schedule')

@if($readWrite == 'true')
@section('header')

@endsection

@section('content')

    <!-- Page content -->
    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
                <div class="card">
                    <div class="card-header">

                        <div id="PRegvali">
                            <div class="col-md-12">
                                <div class="row form-group">

                                    <div class="col-md-3">
                                        <label><span class="fa fa-address-card"></span>&nbsp;Registration No</label>
                                        <input type="text" class="form-control" id="Registrationno" match="^.+$"
                                               validate="true" error="* Registration No required">
                                        <div class="text-danger error"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <label><span class="fa fa-address-card"></span>&nbsp;CXR ID</label>
                                        <input type="text" class="form-control" id="CXRid" match="^.+$"
                                               validate="true" error="* CXR ID required">
                                        <div class="text-danger error"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Passport No</label>
                                        <input type="text" class="form-control" id="Passportno" match="^.+$"
                                               validate="true" error="* Passport No required">
                                        <div class="text-danger error"></div>
                                    </div>

                                </div>

                                <div class="row form-group">

                                    <div class="col-md-2">
                                        <label>&nbsp;Pregnancy</label>
                                        <select class="form-control" id="Pregnancy">
                                            <option value="">Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                            <option value="Possibly">Possibly</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Test Date</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control dppicker" id="Testdate">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><span class="fa fa-calendar"></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;LMP Date</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control dppicker" id="LMPdate">
                                            <div class="input-group-append">
                                                <div class="input-group-text"><span class="fa fa-calendar"></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <label>&nbsp;Result</label>
                                        <select class="form-control" id="Result">
                                            <option value="">Select</option>
                                            <option value="Negative">Negative</option>
                                            <option value="Positive">Positive</option>
                                            <option value="Declined">Declined</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input-styled"
                                                       id="PregnancyTestOffered" data-fouc>
                                                Pregnancy Test Offered
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input-styled"
                                                       id="CounselingDone"
                                                       data-fouc>
                                                Counseling Done
                                            </label>
                                        </div>
                                    </div>

                                </div>


                                <div class="row form-group">

                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled"
                                                       name="CXRTyp" id="CXRNotDon" value="no" data-fouc>
                                                CXR Not Done
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input-styled group1" id="Deferred"
                                                       data-fouc>
                                                Deferred
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input-styled group1" id="Pregnant"
                                                       data-fouc>
                                                Pregnant/SC Instead
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input-styled group1" id="Applicant"
                                                       data-fouc>
                                                Applicant Decline CXR
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input-styled group1" id="noShow"
                                                       data-fouc>
                                                No Show
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input-styled group1" id="Child"
                                                       data-fouc>
                                                Child <11 Years Old
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input-styled group1" id="Unable"
                                                       data-fouc>
                                                Unable/ Unwilling/ SC Instead
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input-styled group1" id="NotDoneother"
                                                       data-fouc>
                                                Other
                                            </label>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" id="NotDoneothertxt" class="form-control group1">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled"
                                                       name="CXRTyp" id="CXRDon" value="yes" data-fouc>
                                                CXR Done
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input-styled group2" name="Shielding"
                                                       id="Shielding" data-fouc>
                                                With Pelvic Shielding
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input-styled group2" id="DONEother"
                                                       data-fouc>
                                                Others
                                            </label>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" id="Doneothertxt" class="form-control group2">
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="col-md-12 form-group text-center">
                                <button class="btn btn-lg btn-success" style="width: 15rem" id="btnCompleted">CXR
                                    Completed
                                </button>
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
    <!--JS files-->
    <script src="{{asset('jsPages/CXRExternal.js')}}" type="text/javascript"></script>

@endsection
@endif