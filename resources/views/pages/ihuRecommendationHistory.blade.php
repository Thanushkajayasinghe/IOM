@extends('layout')

@section('title', 'IHU - RECOMMENDATION HISTORY')

@if($readWrite == 'true' || $readOnly == 'true')

@section('content')

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IHU -
                    RECOMMENDATION HISTORY
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="{{url('/')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">IHU - RECOMMENDATION HISTORY
                </span>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <div class="content">


                <!-- Dashboard content -->
                <div class="row">
                    <div class="col-xl-12">

                        <!-- Marketing campaigns -->
                        <div class="card" style="padding-left: 20px; padding-top: 20px;">
                            <div class="col-md-12 col-xl-12 row">

                                <div class="col-md-12 form-group row">
                                    <div class="col-md-9 ">

                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <lable><span class="fa fa-book"></span>&nbsp;&nbsp;Passport
                                                    No.
                                                </lable>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="RegisterNo"
                                                           id="PassportNo" >
                                                    <div class="input-group-append" id="btnSearch3">

                                                        <div class="input-group-text"><span class="fa fa-search"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;AppointmentNumber
                                                    No.
                                                </lable>

                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="RegisterNo"
                                                           id="RegisterNo">
                                                    <div class="input-group-append" id="btnSearch4">

                                                        <div class="input-group-text"><span class="fa fa-search"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-12 row">

                                            <div class="col-md-4">
                                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;
                                                    &nbsp;First Name
                                                </lable>
                                                <input type="text" disabled="disabled" class="form-control" name="NameInFull"
                                                       id="NameInFull">
                                            </div>
                                            <div class="col-md-4">
                                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;
                                                    &nbsp;Last Name
                                                </lable>
                                                <input type="text" disabled="disabled" class="form-control" name="LastName"
                                                       id="LastName">
                                            </div>

                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <lable><span class="fa fa-hand-o-right" ></span>&nbsp;&nbsp;Current
                                                    passport number
                                                </lable>
                                                <input type="text" class="form-control" name="CurrentPassportNo"
                                                       id="CurrentPassportNo" disabled="disabled">
                                            </div>
                                            <div class="col-md-4">
                                                <lable><span class="fa fa fa-hand-o-right"></span>&nbsp;&nbsp;Previous
                                                    passport number,If Any
                                                </lable>
                                                <input type="text" class="form-control" name="PrePassportNo"
                                                       disabled="disabled"  id="PrePassportNo">
                                            </div>

                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <lable><span class="fa fa fa-hand-o-right"></span>&nbsp;&nbsp;Country
                                                </lable>
                                                <select disabled="disabled" class="form-control selectTo" id="Country">
                                                    <option value="">Select</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="American Samoa">American Samoa</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Anguilla">Anguilla</option>
                                                    <option value="Antartica">Antarctica</option>
                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Aruba">Aruba</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bermuda">Bermuda</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina
                                                    </option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Bouvet Island">Bouvet Island</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="British Indian Ocean Territory">British Indian
                                                        Ocean
                                                        Territory
                                                    </option>
                                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Cape Verde">Cape Verde</option>
                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                    <option value="Central African Republic">Central African
                                                        Republic
                                                    </option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Christmas Island">Christmas Island</option>
                                                    <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo">Congo</option>
                                                    <option value="Congo">Congo, the Democratic Republic of the
                                                    </option>
                                                    <option value="Cook Islands">Cook Islands</option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                                                    <option value="Croatia">Croatia (Hrvatska)</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czech Republic">Czech Republic</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="East Timor">East Timor</option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Falkland Islands">Falkland Islands (Malvinas)
                                                    </option>
                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="France Metropolitan">France, Metropolitan
                                                    </option>
                                                    <option value="French Guiana">French Guiana</option>
                                                    <option value="French Polynesia">French Polynesia</option>
                                                    <option value="French Southern Territories">French Southern
                                                        Territories
                                                    </option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Gibraltar">Gibraltar</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Greenland">Greenland</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                    <option value="Guam">Guam</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Heard and McDonald Islands">Heard and Mc Donald
                                                        Islands
                                                    </option>
                                                    <option value="Holy See">Holy See (Vatican City State)</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hong Kong">Hong Kong</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Iran">Iran (Islamic Republic of)</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Democratic People's Republic of Korea">Korea,
                                                        Democratic
                                                        People's Republic of
                                                    </option>
                                                    <option value="Korea">Korea, Republic of</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Lao">Lao People's Democratic Republic</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya
                                                    </option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Macau">Macau</option>
                                                    <option value="Macedonia">Macedonia, The Former Yugoslav
                                                        Republic of
                                                    </option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                    <option value="Martinique">Martinique</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mayotte">Mayotte</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Micronesia">Micronesia, Federated States of
                                                    </option>
                                                    <option value="Moldova">Moldova, Republic of</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montserrat">Montserrat</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar">Myanmar</option>
                                                    <option value="Namibia">Namibia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="Netherlands Antilles">Netherlands Antilles
                                                    </option>
                                                    <option value="New Caledonia">New Caledonia</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="Niue">Niue</option>
                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                    <option value="Northern Mariana Islands">Northern Mariana
                                                        Islands
                                                    </option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau">Palau</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Pitcairn">Pitcairn</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Reunion">Reunion</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Russia">Russian Federation</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis
                                                    </option>
                                                    <option value="Saint LUCIA">Saint LUCIA</option>
                                                    <option value="Saint Vincent">Saint Vincent and the Grenadines
                                                    </option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="San Marino">San Marino</option>
                                                    <option value="Sao Tome and Principe">Sao Tome and Principe
                                                    </option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Slovakia">Slovakia (Slovak Republic)</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="South Georgia">South Georgia and the South
                                                        Sandwich
                                                        Islands
                                                    </option>
                                                    <option value="Span">Spain</option>
                                                    <option value="SriLanka">Sri Lanka</option>
                                                    <option value="St. Helena">St. Helena</option>
                                                    <option value="St. Pierre and Miguelon">St. Pierre and Miquelon
                                                    </option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                                                    <option value="Swaziland">Swaziland</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syria">Syrian Arab Republic</option>
                                                    <option value="Taiwan">Taiwan, Province of China</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania">Tanzania, United Republic of</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tokelau">Tokelau</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Turks and Caicos">Turks and Caicos Islands
                                                    </option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates
                                                    </option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States">United States</option>
                                                    <option value="United States Minor Outlying Islands">United
                                                        States
                                                        Minor
                                                        Outlying Islands
                                                    </option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Vietnam">Viet Nam</option>
                                                    <option value="Virgin Islands (British)">Virgin Islands
                                                        (British)
                                                    </option>
                                                    <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)
                                                    </option>
                                                    <option value="Wallis and Futana Islands">Wallis and Futuna
                                                        Islands
                                                    </option>
                                                    <option value="Western Sahara">Western Sahara</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Yugoslavia">Yugoslavia</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <lable><span class="fa fa fa-hand-o-right"></span>&nbsp;&nbsp;City
                                                </lable>
                                                <input type="text" disabled="disabled" class="form-control" name="City" id="City">
                                            </div>
                                            {{--<div class="col-md-4">--}}
                                            {{--<lable><span class="fa fa fa-hand-o-right"></span>&nbsp;&nbsp;Ethnicity--}}
                                            {{--</lable>--}}
                                            {{--<input type="text" class="form-control" name="Ethnicity"--}}
                                            {{--id="Ethnicity">--}}
                                            {{--</div>--}}

                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <lable><span class="fa fa-calendar"></span>&nbsp;&nbsp;Date of birth
                                                </lable>
                                                <input type="text" class="form-control dppicker" name="DateofBirth"
                                                       id="DateofBirth" disabled="disabled">
                                            </div>
                                            <div class="col-md-4">
                                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Gender
                                                </lable>
                                                <select disabled="disabled" class="form-control selectTo" id="Gender" name="Gender">
                                                    <option value="">Select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>

                                            {{--<div class="col-md-4">--}}
                                            {{--<lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Civil--}}
                                            {{--status--}}
                                            {{--</lable>--}}
                                            {{--<select class="form-control selectTo" id="ClivilStatus" name="CivilStatus">--}}
                                            {{--<option value="">Select</option>--}}
                                            {{--<option value="Male">Single</option>--}}
                                            {{--<option value="Female">Married</option>--}}
                                            {{--</select>--}}
                                            {{--</div>--}}
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Address
                                                    if
                                                    the country of domicile
                                                </lable>
                                                <input type="text" class="form-control " name="AddressifDomicile"
                                                       id="AddressifDomicile" disabled="disabled">
                                            </div>
                                            {{--<div class="col-md-8">--}}
                                            {{--<lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Address,during--}}
                                            {{--staying in sri lanka--}}
                                            {{--</lable>--}}
                                            {{--<input type="text" class="form-control " name="AddressSriLanka"--}}
                                            {{--id="AddressSriLanka">--}}
                                            {{--</div>--}}
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <lable><span class="fa fa-phone"></span>&nbsp;&nbsp;Telephone
                                                </lable>
                                                <input type="text" class="form-control " name="Telephone"
                                                       id="Telephone" disabled="disabled">
                                            </div>
                                            <div class="col-md-4">
                                                <lable><span class="fa fa-mobile"></span>&nbsp;&nbsp;Mobile</lable>
                                                <input type="text" class="form-control " name="Mobile" disabled="disabled" id="Mobile">
                                            </div>
                                            <div class="col-md-4">
                                                <lable><span class="fa fa-mail-forward"></span>&nbsp;&nbsp;Email
                                                </lable>
                                                <input type="text" class="form-control" name="Email" disabled="disabled" id="Email">
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Sponsor
                                                    name
                                                </lable>
                                                <input type="text" class="form-control" disabled="disabled" name="SponsorName"
                                                       id="SponsorName">
                                            </div>

                                            <div class="col-md-8">
                                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Address,during
                                                    staying in sri lanka
                                                </lable>
                                                <input type="text" class="form-control"
                                                       name="AddressSriLankaSponsor"
                                                       id="AddressSriLankaSponsor" disabled="disabled">
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-4">
                                                <lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Nationality
                                                </lable>
                                                <input type="text" class="form-control " name="Nationality"
                                                       id="Nationality" disabled="disabled">
                                            </div>
                                            {{--<div class="col-md-4">--}}
                                            {{--<lable><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Passport--}}
                                            {{--No--}}
                                            {{--</lable>--}}
                                            {{--<input type="text" class="form-control " name="PassportNoSponsor"--}}
                                            {{--id="PassportNoSponsor">--}}
                                            {{--</div>--}}

                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="card-body" style="">
                                                <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
                                                    <li class="nav-item"><a href="#justified-left-tab1"
                                                                            class="nav-link active show"
                                                                            data-toggle="tab"><i
                                                                    class="fa fa-book mr-2"></i>Counselling Details</a>
                                                    </li>
                                                    <li class="nav-item"><a href="#justified-left-tab2"
                                                                            class="nav-link"
                                                                            data-toggle="tab"><i
                                                                    class="fa fa-indent  mr-2"></i> Consultation
                                                            Details</a>
                                                    </li>
                                                    <li class="nav-item"><a href="#justified-left-tab3"
                                                                            class="nav-link"
                                                                            data-toggle="tab"><i
                                                                    class="fa fa-university  mr-2"></i> Test Result
                                                            Details</a></li>

                                                </ul>

                                                <div class="tab-content">
                                                    <div class="tab-pane fade active show" id="justified-left-tab1">
                                                        &nbsp;&nbsp;<span id="descript1">Counselling Details</span>
                                                    </div>
                                                    <div class="tab-pane fade " id="justified-left-tab2">
                                                        {{--&nbsp;&nbsp;<span id="descript2"> Consultation Details</span>--}}
                                                        <table id="descript2"
                                                               class="table table-bordered table-hover table-striped text-center">
                                                            <tr>
                                                                <th>Examination Remark</th>
                                                                <th>DPP'S Comment</th>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="tab-pane fade" id="justified-left-tab3">
                                                        <table id="descript3"
                                                               class="table table-bordered table-hover table-striped text-center">
                                                            <tr>
                                                                <th></th>
                                                                <th>Result</th>
                                                                <th>Comment</th>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-3">
                                                &nbsp;&nbsp; Final review
                                            </div>
                                            <div class="col-md-2">
                                                <select class="form-control" id="CATEGORY">
                                                    <option>CATEGORY A</option>
                                                    <option>CATEGORY B</option>
                                                    <option>CATEGORY C</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                &nbsp;&nbsp;Remark
                                            </div>
                                            <div class="col-md-5">
                                                <textarea class="form-control" id="Remark" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <img src="{{url('/images/imgcou.png')}}" class="img-thumbnail"
                                             style="width: 80%; height: 200px;  margin-top: 10px;"/>
                                    </div>
                                </div>
                                <br><br>
                                <div class="col-md-12 form-group text-center">
                                    {{--@if($readOnly != 'true')--}}
                                        {{--<button id="btnSaveIHUReco" class="btn btn-lg btn-success" style="width: 15rem">--}}
                                            {{--Save--}}
                                        {{--</button>--}}
                                    {{--@endif--}}
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <!-- /dashboard content -->

            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <!--JS files-->
    <script src="{{asset('plugins/jqueryUI/jquery-ui-timepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('jsPages/IHURecommendation.js')}}" type="text/javascript"></script>

    <script>
        function checkValio() {
            validate('#validateDiv');
        }
    </script>
@endsection

@endif