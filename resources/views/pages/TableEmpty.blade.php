@extends('layout')

@section('title', 'Database Table Empty')

@if($readWrite == 'true' || $readOnly == 'true')

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
                                <div class="row form-group justify-content-center" style="margin-top: 60px;">

                                    <div class="col-md-4">
                                        <label style="font-size: 15px;"><span class="fa fa-address-card"></span>&nbsp;
                                            Menu Name</label>
                                        <select class="form-control text-center" id="MenuName" style="font-size: 15px;">
                                            <option value="">Select</option>
                                            <option>Resident Visa Details From DIE</option>
                                            <option>System Configurations</option>
                                            <option>Booking an Appointment - Over the Phone/Online</option>
                                            <option>Appointment Cancel/Re Schedule</option>
                                            {{--<option>Cancel/Re Schedule Appointment List</option>--}}
                                            {{--<option>Token Issue</option>--}}
                                            {{--<option>Update Appointment Details</option>--}}
                                            {{--<option>Registration</option>--}}
                                            {{--<option>Cancel No Show Applicants</option>--}}
                                            {{--<option>Queue Management Settings</option>--}}
                                            {{--<option>Counseling Settings</option>--}}
                                            {{--<option>Counseling Main Display</option>--}}
                                            {{--<option>Counseling</option>--}}
                                            {{--<option>Payment Counter</option>--}}
                                            {{--<option>Change Process Order</option>--}}
                                            {{--<option>CXR Internal</option>--}}
                                            <option>CXR External</option>
                                            {{--<option>Radiologist Reporting</option>--}}
                                            {{--<option>Sample Collection Display</option>--}}
                                            {{--<option>Phlebotomy Sample Collection</option>--}}
                                            {{--<option>Phlebotomy Rapid Test Results</option>--}}
                                            {{--<option>Counsultation Settings</option>--}}
                                            {{--<option>Consultion Main Display</option>--}}
                                            {{--<option>Consultation</option>--}}
                                            {{--<option>Rapid Test Review By Dpp</option>--}}
                                            {{--<option>Sputum Collection</option>--}}
                                            {{--<option>Sputum Collection Reschedule</option>--}}
                                            {{--<option>Sputum Sample Dipatch To Tb Lab</option>--}}
                                            {{--<option>Sputum Sample Dipatch To Tb Lab Approvel</option>--}}
                                            {{--<option>TB Sputum Recive</option>--}}
                                            {{--<option>View TB Sputm Sample Details</option>--}}
                                            {{--<option>TB Test Result</option>--}}
                                            {{--<option>Blood Sample Dispatch For Malaria</option>--}}
                                            {{--<option>Blood Sample Receive Malaria</option>--}}
                                            {{--<option>Malaria Test Result</option>--}}
                                            {{--<option>Reffer To AFC</option>--}}
                                            {{--<option>Refer To NSACP (HIV Elisa)</option>--}}
                                            {{--<option>Refer To Malaria</option>--}}
                                            {{--<option>Reffer To TB</option>--}}
                                            {{--<option>Referal Approvals</option>--}}
                                            {{--<option>IHU Recommendation</option>--}}
                                            {{--<option>Recommendation</option>--}}
                                            {{--<option>Floor Manager</option>--}}
                                        </select>
                                        <div class="text-danger error"></div>
                                    </div>

                                </div>

                            </div>


                            <div class="col-md-12 form-group text-center">
                                @if($readOnly != 'true')
                                    <button type="button" id="btnTruncate"
                                            class="btn btn-outline-danger btn-lg legitRipple">
                                        <span class="fa fa-align-center"></span>&nbsp; Table Empty
                                    </button>
                                @endif
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
    <script src="{{asset('jsPages/EmptyTable.js')}}" type="text/javascript"></script>

@endsection

@endif