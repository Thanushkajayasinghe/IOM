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

</style>


<div class="page" style="position: relative;">
    <div class="header">
        <div class="col-md-12 form-group row" style="height: 80px;">
            <div class="col-md-6" style="float: left;">
                <div class="col"></div>
                <img src="{{asset('images/logonew2.jpg')}}"
                     style="height: 80px;display: inline-block;position: relative;">
                {{--<img src="{{ public_path('img/logo.png')}}"--}}
            </div>
            <div class="col-md-6" style="float: right;">
                <div class="col"></div>
                <img src="{{asset('images/IOM-Logo.jpg')}}"
                     style="height: 80px;display: inline-block;position: relative;margin-top: 5px;">
            </div>
        </div>
        <div class="col-md-12 form-group">
            <p style="text-align: center"><b>HEALTH EXAMINATION SUMMARY</b></p>
        </div>
        <div class="col-md-12" style="text-align: center;margin-top: 20px;font-size: 15px;"><b>Confidential</b></div>
        <div class="col-md-12" style="text-align: center;margin-top: 7px;">(If found, please return to IHA Unit, c/o
            IOM, No. 80A, Elvitigala Mawatha, Colombo 08, Sri Lanka)
        </div>
    </div>
    @foreach($memberDetails as $data)
        <div class="bodyContainer" style="margin-top: 20px;">
            <div class="col-md-12 form-group row">
                <div class="col-md-9 form-group"></div>
                <div class="col-md-3 form-group" style="height: 150px;">
                    <div class="col"></div>
                    @if($data->image = null)
                        <img src="{{asset('images/blank-user.jpg')}}" class="img-thumbnail"
                             style="border: 2px solid black;height: 150px;float: right;margin-right: 30px;">
                    @else
                        <img src="{{asset('mhacPhotobooth/'.$data->image)}}" class="img-thumbnail"
                             style="border: 2px solid black;height: 150px;float: right;margin-right: 30px;">
                    @endif
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="col-md-12 details">
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>1.&nbsp;&nbsp;Full Name:&nbsp;&nbsp;</label>
                        <span>{{ strtoupper($data->first_name)}} {{strtoupper($data->last_name)}}</span>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>2.&nbsp;&nbsp;Passport number:&nbsp;&nbsp;</label>
                        <span>{{$data->passport_no}}</span>
                    </div>
                    <br>
                    
                    <br>
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>4.&nbsp;&nbsp;Date of Birth:&nbsp;&nbsp;</label>
                        <span>{{$data->dob}}</span>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>5.&nbsp;&nbsp;IHA number:&nbsp;&nbsp;</label>
                        <span>{{$data->appointment_no}}</span>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>6.&nbsp;&nbsp;Address:&nbsp;&nbsp;</label>
                        @if($data->address1 != null)
                            <span>{{$data->address1}}, {{$data->address2}}, {{$data->city}}</span>
                        @else
                            <span></span>
                        @endif
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>8.&nbsp;&nbsp;Examination Date:&nbsp;&nbsp;</label>
                        <span>{{$data->appointment_date}}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-12 form-group">
                <div class="col-md-12 details">
                    <div class="col-md-12 form-group" style="
                    text-align: center;font-size: 15px;"><b>Health
                            examinations</b></div>
                    <br>
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>1.&nbsp;&nbsp;Details of any regular medications:&nbsp;&nbsp;</label>
                        <span></span>
                    </div>
                    <br>
                    @if($data->cm_exams_results != null)
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>2.&nbsp;&nbsp;Medical
                            Examination:&nbsp;&nbsp;</label>
                        <span>{{$data->cm_exams_results}}</span>
                    </div>
                    <br>

                @else
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>2.&nbsp;&nbsp;Medical
                            Examination:&nbsp;&nbsp;</label>
                        <span></span>
                    </div>
                    <br>

                @endif

                @if($data->cm_cxray != null)
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>3.Chest x-ray Remark:&nbsp;&nbsp;</label>
                        <span>{{$data->cm_cxray}}</span>
                    </div>
                    <br>

                @else
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>3.&nbsp;Chest x-ray Remark:&nbsp;&nbsp;</label>
                        <span></span>
                    </div>
                    <br>

                @endif


                @if($data->cm_dpp_comment != null)
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>4.DPP'S Remark:&nbsp;&nbsp;</label>
                        <span>{{$data->cm_dpp_comment}}</span>
                    </div>
                    <br>

                @else
                    <div class="col-md-12 form-group row">
                        <label><span class="fa fa-users"></span>4.DPP'S Remark:&nbsp;&nbsp;</label>
                        <span></span>
                    </div>
                    <br>

                @endif
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <div class="col-md-6" style="text-align: center;float: left;">
                            <span>.........................................................................</span>
                            <br>
                            <span>Signature - Panel Physician</span>
                        </div>
                        <div class="col-md-6" style="text-align: center;float: right;">
                            <span>......................................</span>
                            <br>
                            <span>Date</span>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <p style="text-align: left; font-size: 14px; border: 1px solid black; text-align: justify; padding: 10px;">
                            I have read and understood the instructions provided at the counselling session and
                            consented
                            for medical examination and laboratory investigations. I am aware for the fact that
                            my
                            medical examination and investigation results shall be shared with the Immigration
                            Health
                            Unit of Ministry of Health and Department of Immigration and Emigration.
                        </p>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12 form-group row">
                        <div class="col-md-6" style="text-align: center;float: left;">
                            <span>.........................................................................</span>
                            <br>
                            <span>Signature - Client</span>
                        </div>
                        <div class="col-md-6" style="text-align: center;float: right;">
                            <span>......................................</span>
                            <br>
                            <span>Date</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="footer" style="position: absolute;bottom: 0;right: 0;left: 0;">
    </div>
</div>


@section('scripts')

<script src="{{asset('js/main/jquery.min.js')}}" type="text/javascript"></script>
<script>
    // ===============================

    function getAge(birthDateString) {
        var today = new Date();
        var birthDate = new Date(birthDateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    // ========================================================================
</script>


@endsection