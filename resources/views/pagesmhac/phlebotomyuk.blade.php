@extends('layout')

@section('title', 'Phlebotomy')

@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css"
    integrity="sha512-O03ntXoVqaGUTAeAmvQ2YSzkCvclZEcPQu1eqloPaHfJ5RuNGiS4l+3duaidD801P50J28EHyonCV06CUlTSag=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{asset('css/3dbuttons.css')}}" rel="stylesheet" type="text/css">
<style>
    .selectedCell {
        background: burlywood;
    }

    td[title="Booked Out"] {
        background-color: #e38787 !important;
        border-radius: 6px !important;
        margin: 1px;
    }

    td[title="Booked Out"] span {
        color: black !important;
    }

    .holiDay span {
        background-color: #774105 !important;
        border-radius: 6px !important;
        color: white !important;
        margin: 1px;
    }

    td {
        position: relative;
    }

    td[title]:hover:after {
        content: attr(title);
        position: absolute;
        top: -60%;
        left: -20px;
        border: 1px solid black;
        background: black;
        color: white;
        z-index: 10000 !important;
        border-radius: 18px;
        padding: 1px 5px;
        width: 180% !important;
    }



    .cardX {
        background: white;
        height: 85%;
        width: 88%;
        justify-self: center;
        display: flex;
        flex-direction: column;
        box-shadow: 1px 1px 10px rgba(128, 128, 128, 0.4);
        border-radius: 0.3rem;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .cardX:first-child {
        margin-left: 1rem;
    }

    .cardX:nth-child(3) {
        margin-right: 1rem;
    }

    .cardX>* {
        transition: all 0.3s ease-in-out;
    }

    .cardX:hover {
        -webkit-transform: scale(1.04);
        transform: scale(1.04);
    }

    .cardX:hover .cardX-top {
        background: #d64000;
    }

    .cardX:hover .cardX-value {
        color: #d64000;
    }

    .cardX-1:hover~.bars>.stat>.bar-1>span {
        width: 10%;
    }

    .cardX-1:hover~.bars>.stat>.bar-2>span {
        width: 10%;
    }

    .cardX-1:hover~.bars>.stat>.bar-3>span {
        width: 10%;
    }

    .cardX-2:hover~.bars>.stat>.bar-1>span {
        width: 30%;
    }

    .cardX-2:hover~.bars>.stat>.bar-2>span {
        width: 60%;
    }

    .cardX-2:hover~.bars>.stat>.bar-3>span {
        width: 40%;
    }

    .cardX-3:hover~.bars>.stat>.bar-1>span {
        width: 100%;
    }

    .cardX-3:hover~.bars>.stat>.bar-2>span {
        width: 100%;
    }

    .cardX-3:hover~.bars>.stat>.bar-3>span {
        width: 100%;
    }

    .cardX-top {
        height: 10%;
        width: 100%;
        color: white;
        font-weight: 600;
        border-top-left-radius: 0.3rem;
        border-top-right-radius: 0.3rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .cardX-top.available {
        background: #488656;
    }

    .cardX-top.notAvailable {
        background: red;
    }

    .cardX-info {
        height: 75%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .cardX-info>* {
        text-align: center;
    }

    .cardX-value {
        font-weight: 700;
        font-size: 1.6rem;
    }

    .cardX-month {
        font-size: 0.8rem;
    }

    .cardX-lines {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding-bottom: 10px;
        width: 95%;
    }

    .cardX-line {
        margin-bottom: 3px;
        height: 4px;
        background: #e0e0e0;
    }

    .progressLineContainer {
        width: 100%;
        background-color: #ddd;
    }

    .progressLine {
        width: 1%;
        height: 5px;
        background-color: #E04242;
    }

    .SelectedDate:not(.notAvaiDate) a {
        background-color: #bbce70 !important;
        border-radius: 6px !important;
    }

    .selectedTime {
        transform: scale(1.12);
    }

    .selectedTime .cardX-top {
        background: #d64000;
    }

    .selectedMember {
        background: #bcbcbc !important;
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

<!-- /page header -->

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
                            <h2 class="card-title text-center" style="font-size: 2rem; color: green;">Phlebotomy</h2>
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
                <div id="clearingID" class="col-md-9" style="display: none">
                
                    <div class="content" style="padding: 1.25rem 0;">
                        <div class="card">
                            <div class="card-header">
                            <div class="row">
                            <div class="col-md-9 form-group">
                            <div class = "row"> 
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
                            <div class = "row">
                            <div class="showHideDiv" style="display: none" >

                                   <div class="row justify-content-center" >
                                       <div class="col-md-12 form-group">
                                           <div class="row">
                                           <div class="col-md-4 form-group" >
                                                   <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;AppointmentNo</label>
                                                   <div class="form-group">
                                                       <input type="text" class="form-control" 
                                                           id="AppointmentNo" disabled>
                                                   </div>
                                           </div>
                                         
                                           <div class="col-md-4 form-group">
                                               <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;PassPort No</label>
                                               <div class="form-group">
                                                   <input type="text" class="form-control" 
                                                          id="PassportNo" disabled >
                                               </div>
                                           </div>

                                           <div class="col-md-4 form-group">
                                               <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Age</label>
                                               <div class="form-group">
                                                   <input type="text" class="form-control" 
                                                          id="Age" disabled >
                                               </div>
                                           </div>

                                           
                                       </div>
                                           
                                       </div>
                                       
                                       
                                       <div class="row justify-content-center">
                                           <div class="col-md-3 form-group">
                                               <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Blood Pressure</label>
                                               <div class="form-group">
                                                   <input type="text" class="form-control" 
                                                          id="bloodpressure">
                                               </div>
                                           </div>
                                         
                                           <div class="col-md-3 form-group">
                                               <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Height(cm)</label>
                                               <div class="form-group">
                                                   <input type="text" class="form-control" 
                                                          id="height" >
                                               </div>
                                           </div>
                                           <div class="col-md-3 form-group">
                                               <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Weight(Kg)</label>
                                               <div class="form-group">
                                                   <input type="text" class="form-control"
                                                          id="weight">
                                               </div>
                                           </div>

                                           <div class="col-md-3 form-group">
                                               <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;BMI</label>
                                               <div class="form-group">
                                                   <input type="text" class="form-control" 
                                                          id="bmi">
                                               </div>
                                           </div>


                                       </div>
                                   </div>

                            </div>
                            </div>
                            </div>
                            <div class="col-md-3 form-group ">
                            <div class ="showHideDiv" style="display: none">
                            
                            <img id="photoBoothImgChange" src="{{url('images/PhotoBooth.png')}}"
                                                         style="border: 2px solid black;width: 100%;">
                              </div> 
                          
                            </div> 
                            </div>
                            

                                    <br><br>
                            <div class="col-md-12 form-group text-center">
                             <div class = "showHideDiv" style="display: none">
                             <div class="row justify-content-center">
                                    
                                    <div class="col-md-2">
                                        <button type="button" id="btnSave" class="btn-success btn-graygreen btn-lg btn3d btn-block" style="font-weight: bolder;">
                                            Complete
                                        </button>
                                    </div>
                                    <div class="col-md-2">
                                    <button type="button" id="btnCancle" class="btn-warning btn-yellow btn-lg btn3d btn-block" style="font-weight: bolder;">
                                            Cancel
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
            </div>
            <div id="noshow" data-izimodal-group="group1p" data-izimodal-loop="" data-izimodal-title="Call Again Tokens"
                 data-izimodal-subtitle="Call Again Tokens">
                <div class="col-md-12 form-group">
                    <div class="row" style="font-size: 1rem;text-align: center;">
                        <table class="table table-bordered">
                            <tbody id="appNotAvblBody">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /page content -->    
@endsection
@section('scripts')
<script>
        const usergroup = "{{Session::get('userGroup')}}";
        const country = location.href.substring(location.href.lastIndexOf('/') + 1);
        var usergroupname = ("{{Session::get('GroupName')}}");
        $('#curCounter').text(usergroupname);
     
        $('#noshow').iziModal({
            headerColor: '#26A69A',
            width: '90%',
            overlayColor: 'rgba(0, 0, 0, 0.5)',
            fullscreen: true,
            transitionIn: 'fadeInUp',
            transitionOut: 'fadeOutDown'
        });
    </script>
    <script src="{{asset('js/progressbar.js')}}" type="text/javascript"></script>
    <script src="{{asset('jsPagesMhac/PhlebotomyUk.js')}}" type="text/javascript"></script>
    
    <script>
    // Function to calculate BMI
    function calculateBMI() {
        const height = parseFloat(document.getElementById('height').value);
        const weight = parseFloat(document.getElementById('weight').value);

        if (isNaN(height) || isNaN(weight) || height <= 0 || weight <= 0) {
            document.getElementById('bmi').value = '';
            return;
        }

        const bmi = weight / ((height / 100) * (height / 100));
        document.getElementById('bmi').value = bmi.toFixed(2);
    }

    // Event listeners for height and weight inputs
    document.getElementById('height').addEventListener('input', calculateBMI);
    document.getElementById('weight').addEventListener('input', calculateBMI);
</script>

@endsection

