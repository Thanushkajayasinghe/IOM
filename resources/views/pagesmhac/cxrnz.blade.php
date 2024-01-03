@extends('layout')

@section('title', 'CXR')


@section('header')
    <link href="{{asset('css/3dbuttons.css')}}" rel="stylesheet" type="text/css">
    <style>
        .clickedRow {
        background-color: aquamarine !important;
    }
    .prevClicked {
        background-color: #E0A57A;
    }
    .rowSaved {
        background-color: #FF0134;
    }
    #noshow {
        width: 40% !important;
    }

        .hidePanel {
            display: none;
        }

    .rowAlreadySaved{
        background-color: #FF4A4A;
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
    <!-- /page header -->



    <!-- Page content -->
    <div class="page-content pt-0">

        <div class="content-wrapper">

            <div class="row justify-content-center">

                <div class="col-sm-3">
                    <div
                            class="card border-top-3 border-top-warning border-bottom-3 border-bottom-warning rounded-0">
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
                    <div
                            class="card border-top-3 border-top-success border-bottom-3 border-bottom-success rounded-0">
                        <div class="card-header" style="padding: 8px;">
                            <h2 class="card-title text-center" style="font-size: 2rem;">SECTION - NZ</h2>
                        </div>
                        <div class="card-body" style="padding: 12px;">
                            <h2 class="card-title text-center" style="font-size: 2rem; color: green;">CXR</h2>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div
                            class="card border-top-3 border-top-slate border-bottom-3 border-bottom-slate rounded-0">
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
                
                

                <div class="col-md-3">
                    <div class="row row-tile no-gutters">
                        <div class="col-6">
                            <button type="button" class="btn btn-light btn-block btn-float m-0"
                                    style="padding: 6px;">
                                <i class="icon-hour-glass text-warning-400 icon-2x mt-1"></i>
                                <span style="font-size: 1rem;padding: 4px;">Pending Tokens</span>
                                <span style="font-size: 1.5rem;padding: 1px;" id="CTNumber"> - </span>
                                <div id="pendingTokenProgress" style="margin-top: 4px;"></div>
                            </button>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-light btn-block btn-float m-0"
                                    style="padding: 6px;">
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
                <div id="clearingID" class="col-md-11" style="display:none;" >
                    <div class="content" style="padding: 1.25rem 0;">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-md-12 row">

                                    <div class="col-md-10">

                                        <div class="col-md-12 form-group">
                                            <div class="row justify-content-center"
                                                 style="font-size: 1rem;text-align: center;">
                                                <div class="col-md-4">
                                                    <div class="card card-table">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th style="background-color: #f98469">Appointment No
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="appbody">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row form-group showHideDiv" style="display:none;" >

                                                <input type="hidden" id="fullnam" value="">
                                                <input type="hidden" id="gen" value="">
                                                <input type="hidden" id="dob" value="">

                                                <div class="col-md-3">
                                                    <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Appointment
                                                        No</label>
                                                    <input id="AppointmentNo" type="text" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Passport
                                                        No</label>
                                                    <input id="PassportNo" type="text" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Age
                                                        </label>
                                                    <input id="Age" type="text" class="form-control">
                                                </div>
                                               
                                            </div>


                                            <div class="row form-group showHideDiv" style="display:none;">
                                                <div class="col-md-4">
                                                    <img style="border: 1px solid black; width: 100%;"
                                                         src="{{url('/images/xray.png')}} "
                                                         height="300rem">
                                                </div>

                                                <div class="col-md-4 offset-md-1">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input id="cxr_not_done" type="radio" checked
                                                                   class="form-check-input-styled"
                                                                   name="stacked-radio-left" value="NotDone" data-fouc>
                                                            CXR Not Done
                                                        </label>
                                                    </div>

                                                    <div id="cxrNotDone">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_def" type="checkbox"
                                                                       class="form-check-input-styled notdone"
                                                                       data-fouc>
                                                                Deferred
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_preg_sc" type="checkbox"
                                                                       class="form-check-input-styled notdone"
                                                                       data-fouc>
                                                                Pregnant/SC Instead
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_app_dec" type="checkbox"
                                                                       class="form-check-input-styled notdone"
                                                                       data-fouc>
                                                                Applicant Decline CXR
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_no_show" type="checkbox"
                                                                       class="form-check-input-styled notdone"
                                                                       data-fouc>
                                                                No Show
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_child" type="checkbox"
                                                                       class="form-check-input-styled notdone"
                                                                       data-fouc>
                                                                Child <11 Years Old?>
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_unbl_unwill_sc" type="checkbox"
                                                                       class="form-check-input-styled notdone"
                                                                       data-fouc>
                                                                Unable/ Unwilling/ SC Instead
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_not_done_other" type="checkbox"
                                                                       class="form-check-input-styled notdone"
                                                                       data-fouc>
                                                                Other
                                                            </label>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                   id="not_done_other_text"
                                                                   style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input id="cxr_done" type="radio"
                                                                   class="form-check-input-styled"
                                                                   name="stacked-radio-left" value="Done" data-fouc>
                                                            CXR Done
                                                        </label>
                                                    </div>

                                                    <div id="cxrDone">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_done_plv_shld" type="checkbox"
                                                                       class="form-check-input-styled cxrdone"
                                                                       data-fouc>
                                                                With Pelvic Shielding
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_done_dbl_abd_shield" type="checkbox"
                                                                       class="form-check-input-styled cxrdone"
                                                                       data-fouc>
                                                                Double Abdominal Shielding
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input id="cxr_done_other" type="checkbox"
                                                                       class="form-check-input-styled cxrdone"
                                                                       data-fouc>
                                                                Other
                                                            </label>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                   id="cxr_done_others_details"
                                                                   style="display: none;">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <br><br>

                                        

                                        <div class="col-md-12 form-group text-center">
                                        <div class = "showHideDiv" style="display: none">
                                        <button class="btn-lg btn-success btn-graygreen btn3d"
                                                style="width: 13rem; font-weight: bold;"
                                                id="CXRCompleted"
                                                onclick="return false">
                                            CXR Completed
                                        </button></div>
                                                                    
                                        </div>

                                    </div>

                                    {{-----------------------------------------------}}

                                    <div class="col-md-2">
                                        <div class="row align-items-center showHideDiv" style="display:none;">

                                            <div>
                                                <div class="col-md-12 form-group" style="padding: 0;">
                                                    <img id="MemberImgTag" class="img-thumbnail"
                                                         src="{{url('images/PhotoBooth.png')}}"
                                                         style="border: 2px solid black;height: 210px;">
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



  

    <div id="noshow" data-izimodal-group="group12" data-izimodal-loop=""
         data-izimodal-title="Notavailble Tokens"
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

  
@endsection


@section('scripts')
    <script src="{{asset('js/progressbar.js')}}" type="text/javascript"></script>
    <script src="{{asset('jsPagesMhac/CXRnz.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        var path = '{{url('/mhacPhotobooth')}}';
        var imgPathBlade = '{{url('images/')}}';
        
        const usergroup = "{{Session::get('userGroup')}}";
        var usergroupname = ("{{Session::get('GroupName')}}");
        var country = location.href.substring(location.href.lastIndexOf('/') + 1);
        $('#curCounter').text(usergroupname)
        $('#noshow').iziModal({
            headerColor: '#26A69A',
            width: '90%',
            overlayColor: 'rgba(0, 0, 0, 0.5)',
            fullscreen: true,
            transitionIn: 'fadeInUp',
            transitionOut: 'fadeOutDown'
        });

      

    </script>
@endsection


