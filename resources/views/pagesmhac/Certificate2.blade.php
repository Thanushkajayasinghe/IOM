<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        p {
            font-size: 17px;
            font-family: 'Calibri (Body)';
            margin: 0 0 0 0 !important;
        }

        label {
            font-size: 15px;
            font-family: 'Calibri (Body)';
        }

        span {
            font-size: 15px;
            font-family: 'Calibri (Body)';
        }

        .details {
            margin-top: 30px;
            margin-left: 18px;
        }

        table {
            border-collapse: collapse;
        }

        input[type='checkbox'] {
            position: relative;
            margin-top: 5px;
        }
        @page {
            margin-top: 10px;
        }

    </style>


</head>
<body>

<div class="page">

	<table width="20%" style="margin-top: 10px;" align='right'>
        <tr style="width: 100%; text-align: center; margin-top: 10px;">
            <td style="width: 100%; text-align: center; padding-top: 5px; padding-bottom: 8px; border: 1px solid black; background: black; color: white;">
                Applicant’s copy
            </td>
        </tr>
    </table>
	
    <table width="100%">
        <tr width="100%">
            <td width="30%"></td>
            <td width="40%" style="text-align: center;">
                <img src="{{asset('images/logonew2.jpg')}}"
                     style="height: 80px;display: inline-block;position: relative;">
            </td>
            <td width="30%"></td>
        </tr>
        <tr width="100%">
            <td width="10%"></td>
            <td width="80%" style="text-align: center;">
                <p style="text-align: center"><b>HEALTH EXAMINATION SUMMARY</b></p>
                <span style="text-align: center; margin-top: 5px;"><b>Confidential</b></span>
                <div style="text-align: center;margin-top: 7px;">(If found, please return to IHA Unit, c/o
                    IOM, No. 80A, Elvitigala Mawatha, Colombo 08, Sri Lanka)
                </div>
            </td>
            <td width="10%"></td>
        </tr>
    </table>
    <br>


    @foreach($memberDetails as $data)
        <table width="100%">
            <tr width="100%">
                <td width="25%" rowspan="6" style="border: solid 1px black ; ">
                    <center>
                        @if($data->image == null || $data->image == "")
                            <img src="{{asset('images/blank-user.jpg')}}"
                                 style="height: 140px;display: inline-block;position: relative;border: 2px solid black;">
                        @else
                            <img src="{{ asset('mhacPhotobooth/'. $data->image) }}"
                                 style="height: 140px;position: relative;border: 2px solid black;">
                        @endif
                    </center>
                </td>
                <td width="20%" style="border: solid 1px black; border-right: 2px solid white; margin-left: 15px;">
                    <label><span class="fa fa-users"></span>Name&nbsp;&nbsp;</label>
                </td>
                <td width="55%" style="border: solid 1px black; border-left: 2px solid white;">
                    <label><span
                            style="font-weight:normal;">: {{strtoupper($data->first_name)}} {{strtoupper($data->last_name)}}</span></label>
                </td>
            </tr>
            <tr width="100%">
                <td width="20%" style="border: solid 1px black;">
                    <label><span class="fa fa-users"></span>Gender&nbsp;</label>

                </td>
                <td width="55%" style="border: solid 1px black;border-left: 2px solid white;">
                    <label><span style="font-weight:normal;">: {{$data->gender}}</span></label>
                </td>

            </tr>
            <tr width="100%">
                <td width="20%" style="border: solid 1px black;">
                    <label><span class="fa fa-users"></span>Date of Birth&nbsp;</label>

                </td>
                <td width="55%" style="border: solid 1px black;border-left: 2px solid white;">
                    <label><span style="font-weight:normal;">: {{$data->dob}}</span></label>
                </td>

            </tr>
            <tr width="100%">
                <td width="20%" style="border: solid 1px black;">
                    <label><span class="fa fa-users"></span>Passport No&nbsp;</label>

                </td>
                <td width="55%" style="border: solid 1px black;border-left: 2px solid white;">
                    <label><span style="font-weight:normal;">: {{$data->passport_no}}</span></label>
                </td>
            </tr>
            <tr width="100%">
                <td width="20%" style="border: solid 1px black;">
                    <label><span class="fa fa-users"></span>Address</label>
                </td>
                <td width="55%" style="border: solid 1px black;border-left: 2px solid white;">
                    <label><span
                            style="font-weight:normal;">: {{$data->address1}}  {{$data->address2}}  {{$data->city}}</span></label>
                </td>
            </tr>
            <tr width="100%">
                <td width="20%" style="border: solid 1px black;">
                    <label><span class="fa fa-users"></span>Examination Date&nbsp;</label>
                </td>
                <td width="55%" style="border: solid 1px black;border-left: 2px solid white;">
                    <label><span style="font-weight:normal;">: {{$data->appointment_date}}</span></label>
                </td>
            </tr>
        </table>
    
        @foreach($results as $data2)
            <table width="100%" style="margin-top: 10px;">
                <tr width="100%">
                    <td width="100%" style="border: 1px solid #0c0c0c;padding: 5px;">
                        <p style="text-align: left;"><b><u>Rapid Test Results</u></b></p>
                        <label><span
                                class="fa fa-users"></span>Malaria&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        @if($data2->malaria_result != '')
                                @if($data2->malaria_result == 'Negative')
                                    <label for="chkbox_001"><span
                                            class="fa fa-users"></span>Negative</label>
                                    <input id="chkbox_001" type="checkbox"
                                        class="form-check-input-styled"
                                        data-fouc="" checked>
                                    <label for="chkbox_002"><span
                                            class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                                    <input id="chkbox_002" type="checkbox"
                                        class="form-check-input-styled"
                                        data-fouc="">
                                @elseif($data2->malaria_result == 'Positive')
                                    <label for="chkbox_001"><span
                                            class="fa fa-users"></span>Negative</label>
                                    <input id="chkbox_001" type="checkbox"
                                        class="form-check-input-styled"
                                        data-fouc="">
                                    <label for="chkbox_002"><span
                                            class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                                    <input id="chkbox_002" type="checkbox"
                                        class="form-check-input-styled"
                                        data-fouc="" checked>
                                @endif
                        @else
                            <label for="chkbox_001"><span
                                    class="fa fa-users"></span>Negative</label>
                            <input id="chkbox_001" type="checkbox"
                                class="form-check-input-styled"
                                data-fouc="">
                            <label for="chkbox_002"><span
                                    class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                            <input id="chkbox_002" type="checkbox"
                                class="form-check-input-styled"
                                data-fouc="">
                        @endif
                        <br>

                        {{------------------------------------}}
                        @if($age>14)
                            <label><span class="fa fa-users">
                                </span>HIV &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            @if($data2->hiv_result != '')
                                @if($data2->hiv_result == 'Negative')
                                        <label for="chkbox_003"><span
                                                class="fa fa-users"></span>Negative</label>
                                        <input id="chkbox_003" type="checkbox"
                                            class="form-check-input-styled"
                                            data-fouc="" checked>

                                        <label for="chkbox_004"><span
                                                class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                                        <input id="chkbox_004" type="checkbox"
                                            class="form-check-input-styled"
                                            data-fouc="">
                                    @elseif($data2->hiv_result == 'Positive')
                                        <label for="chkbox_003"><span
                                                class="fa fa-users"></span>Negative</label>
                                        <input id="chkbox_003" type="checkbox"
                                            class="form-check-input-styled"
                                            data-fouc="">
                                        <label for="chkbox_004"><span
                                                class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                                        <input id="chkbox_004" type="checkbox"
                                            class="form-check-input-styled"
                                            data-fouc="" checked>
                                    @endif
                            @else
                                <label for="chkbox_003"><span
                                        class="fa fa-users"></span>Negative</label>
                                <input id="chkbox_003" type="checkbox"
                                    class="form-check-input-styled"
                                    data-fouc="">
                                <label for="chkbox_004"><span
                                        class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                                <input id="chkbox_004" type="checkbox"
                                    class="form-check-input-styled"
                                    data-fouc="">
                            @endif
                            <br>
                        @endif
                        {{--------------------------------}}
                        <label><span class="fa fa-users"></span>Filariasis&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        @if($data2->filaria_result != '')
                            @if($data2->filaria_result == 'Negative')
                                    <label for="chkbox_005"><span
                                            class="fa fa-users"></span>Negative</label>
                                    <input id="chkbox_005" type="checkbox"
                                        class="form-check-input-styled"
                                        data-fouc="" checked>
                                    <label for="chkbox_006"><span
                                            class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                                    <input id="chkbox_006" type="checkbox"
                                        class="form-check-input-styled"
                                        data-fouc="">
                                @elseif($data2->filaria_result == 'Positive')
                                    <label for="chkbox_005"><span
                                            class="fa fa-users"></span>Negative</label>
                                    <input id="chkbox_005" type="checkbox"
                                        class="form-check-input-styled"
                                        data-fouc="">
                                    <label for="chkbox_006"><span
                                            class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                                    <input id="chkbox_006" type="checkbox"
                                        class="form-check-input-styled"
                                        data-fouc="" checked>
                                @endif
                        @else
                            <label for="chkbox_005"><span
                                    class="fa fa-users"></span>Negative</label>
                            <input id="chkbox_005" type="checkbox"
                                class="form-check-input-styled"
                                data-fouc="">
                            <label for="chkbox_006"><span
                                    class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                            <input id="chkbox_006" type="checkbox"
                                class="form-check-input-styled"
                                data-fouc="">
                        @endif
                        <br>
                        <label><span class="fa fa-users"></span>SHCG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        @if($data2->shcg_result != '')
                            @if($data2->shcg_result == 'Negative')
                                    <label for="chkbox_005"><span
                                            class="fa fa-users"></span>Negative</label>
                                    <input id="chkbox_005" type="checkbox"
                                        class="form-check-input-styled"
                                        data-fouc="" checked>
                                    <label for="chkbox_006"><span
                                            class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                                    <input id="chkbox_006" type="checkbox"
                                        class="form-check-input-styled"
                                        data-fouc="">
                                @elseif($data2->shcg_result == 'Positive')
                                    <label for="chkbox_005"><span
                                            class="fa fa-users"></span>Negative</label>
                                    <input id="chkbox_005" type="checkbox"
                                        class="form-check-input-styled"
                                        data-fouc="">
                                    <label for="chkbox_006"><span
                                            class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                                    <input id="chkbox_006" type="checkbox"
                                        class="form-check-input-styled"
                                        data-fouc="" checked>
                                @endif
                        @else
                            <label for="chkbox_005"><span
                                    class="fa fa-users"></span>Negative</label>
                            <input id="chkbox_005" type="checkbox"
                                class="form-check-input-styled"
                                data-fouc="">
                            <label for="chkbox_006"><span
                                    class="fa fa-users"></span>&nbsp;&nbsp;&nbsp;&nbsp;Positive</label>
                            <input id="chkbox_006" type="checkbox"
                                class="form-check-input-styled"
                                data-fouc="">
                        @endif
                        <br>
                        {{----------------------------------------------------------------------------------------}}
                        <label><span class="fa fa-users"></span>Urine&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        @if($data2->urine_result != '')
                            <label for="chkbox_005"><span class="fa fa-users">{{$data2->urine_result}}</span></label>
                        @else
                            
                           
                        @endif
                        {{--------------------------------------------------------------------------------------------    --}}

                    </td>
                    
                </tr>

            </table>
    @endforeach

    <table width="100%" style="margin-top: 10px;">
        <tr width="100%">
            <td width="100%" style="border: 1px solid #0c0c0c;padding: 5px;">
                <p style="text-align: left;"><b><u>DPP'S Remarks</u></b></p>
                @if($data->cm_dpp_comment != null)
                    <span style="font-weight:normal;">{{$data->cm_dpp_comment}}</span>
                @else
                    <span style="font-weight:normal;">&nbsp;&nbsp;</span>
                @endif
                <p style="text-align: left;"><b><u>Other Remarks</u></b></p>
                @if($data->cm_exams_results != null)
                    <span style="font-weight:normal;">{{$data->cm_exams_results}}</span>
                @else
                    <span style="font-weight:normal;">&nbsp;&nbsp;</span>
                @endif
            </td>
        </tr>
    </table>
{{-- 
    <table width="100%" style="margin-top: 10px;">
        <tr width="100%">
            <td width="100%" style="border: 1px solid #0c0c0c;padding: 5px;">
                <p style="text-align: left;"><b><u>Referrals</u></b></p>
                <ol type="a">
                    @if($refTb != null)
                        <li> Tb: <span>{{ /*$refTb*/}}</span></li>
                    @else
                        <li> Tb: <span></span></li>
                    @endif

                  
                    @if($age>15)
                        @if($HIVres->count() > 0)
                            @foreach($HIVres as $data)
                                @if($data->prtr_result == 'Negative')
                                    <li> HIV: <span>Not Done</span></li>
                                @elseif($data->prtr_result == 'Positive')
                                    <li> HIV: <span>Referred</span>
                                @endif
                            @endforeach
                        @else
                            <li> HIV: <span>Not Done</span></li>
                        @endif
                    @endif

                  
                    @if($Malres->count() > 0)
                        @foreach($Malres as $data)
                            @if($data->prtr_result == 'Negative')
                                <li> Malaria: <span>Not Done</span></li>
                            @elseif($data->prtr_result == 'Positive')
                                <li> Malaria: <span>Referred</span></li>
                            @endif
                        @endforeach
                    @else
                        <li> Malaria: <span>Not Done</span></li>
                    @endif
                    
                    @if($FilRes->count() > 0)
                        @foreach($FilRes as $data)
                            @if($data->prtr_result == 'Negative')
                                <li> Filariasis: <span>Not Done</span></li>
                            @elseif($data->prtr_result == 'Positive')
                                <li> Filariasis: <span>Referred</span></li>
                            @endif
                        @endforeach
                    @else
                        <li> Filariasis: <span>Not Done</span></li>
                    @endif
                   

                    @if($refOther != null)
                        <li> Any other: <span>{{$refOther}}</span></li>
                    @else
                        <li> Any other: <span>Not Done</span></li>
                    @endif
                </ol>
            </td>
        </tr>
    </table> --}}
    @endforeach
    <br>
    <table style="width: 100%; margin-top: 13px;">
        <tr>
            <td width="50%" style="text-align: center;">
                <span>.........................................................................</span>
                <br>
                <span>Signature - Panel Physician</span>
            </td>
            <td width="50%" style="text-align: center;">
                <span>......................................</span>
                <br>
                <span>Date</span>
            </td>
        </tr>
    </table>

    <p style="text-align: left; font-size: 14px; border: 1px solid black; text-align: justify; padding: 5px;">
        I have read and understood the instructions provided at the
        counselling session and
        consented
        for medical examination and laboratory investigations. I am aware for the fact that
        my
        medical examination and investigation results shall be shared with the Immigration
        Health
        Unit of Ministry of Health and Department of Immigration and Emigration.
    </p>

    <table style="width: 100%; margin-top: 22px;">
        <tr>
            <td width="50%" style="text-align: center;">
                <span>.........................................................................</span>
                <br>
                <span>Signature - Client</span>
            </td>
            <td width="50%" style="text-align: center;">
                <span>......................................</span>
                <br>
                <span>Date</span>
            </td>
        </tr>
    </table>
    <div class="footer" style="position: absolute;bottom: 0;right: 0;left: 0;">
    </div>
</div>
</body>

@section('scripts')
    <script src="{{asset('js/formCheckboxesRadios.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/main/jquery.min.js')}}" type="text/javascript"></script>
@endsection

</html>

