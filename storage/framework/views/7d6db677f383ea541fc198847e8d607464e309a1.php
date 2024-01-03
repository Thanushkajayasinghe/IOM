<?php $__env->startSection('title', 'Over The Phone Registration'); ?>

<?php if($readWrite == 'true'): ?>

<?php $__env->startSection('header'); ?>
    <link href="<?php echo e(asset('css/3dbuttons.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('plugins/fullCalender/fullcalendar.min.css')); ?>" rel="stylesheet" type="text/css"/>

    <style>
        .available td:nth-child(2) {
            background: #67d1b7 !important;
        }

        .notavailable td:nth-child(2) {
            background: #d16767 !important;
        }

        .available td:nth-child(2) {
            background: #67d1b7 !important;
        }

        .notavailable td:nth-child(2) {
            background: #d16767 !important;
        }

        .highlightCell {
            background: cornflowerblue;
            color: white !important;
            font-weight: bold;
            border-radius: 22px;
        }

        .highlightHoliday {
            background-color: #e38b8b;
            border-radius: 20px;
            width: 0px;
        }

        .selectedCell {
            background: burlywood;
        }

        .highlightCell .ui-state-highlight {
            background-color: cornflowerblue !important;
        }
    </style>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>Applicant Over The
                    Phone Registration</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="<?php echo e(url('/home')); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Applicant Over The Phone Registration</span>
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
                        <div id="formvali">
                            <div class="col-md-12 form-group">
                                <div class="row ">
                                    <div class="col-12 col-lg-2">
                                        <input type="hidden" id="HidenComandUpdateORNewSave">
                                        <label><span class="fa fa-newspaper-o"></span>&nbsp;&nbsp;Application
                                            Type</label>
                                    </div>
                                    <div class="col-6 col-lg-2">
                                        <div class="form-check checkbox">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input-styled" checked
                                                       id="appDetTypeIndividual" name="stacked-radio-left" data-fouc>
                                                Individual
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-lg-2">
                                        <div class="form-check checkbox">
                                            <label class="form-check-label">
                                                <input type="radio" id="appDetTypeFamily"
                                                       class="form-check-input-styled"
                                                       name="stacked-radio-left" data-fouc>
                                                Family
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-3">
                                <span id="noOfFamily" style="display: none;">
                                    <label><span class="fa fa-users"></span>&nbsp;&nbsp;Number of Family Members (Excluding the main applicant)</label>
                                    <div class="form-group">
                                        <input type="number" id="noOfFamilyMembers" min="1" max="100"
                                               class="form-control">

                                    </div>
                                </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 form-group row">
                                <div class="col-md-2" data-toggle="tooltip" data-placement="bottom" title="This will take five to seven working days for the interpreter to be arranged!">
                                    
                                    <label><span class="fa fa-language"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

                                    <span class="checkbox">
                                                                                    <input class="checkboxLablePrefType"
                                                                                           type="checkbox"
                                                                                           id="RequestInterpreter">
                                                                                         <label    for="RequestInterpreter">
                                                                                            <strong>Request Interpreter&nbsp;&nbsp;&nbsp;<span class="icon icon-question4"></span>&nbsp;&nbsp;&nbsp;</strong>
                                                                                     </label>
                                         </span>

                                    
                                </div>
                                <div class="col-md-2 row " id="LangFlag">
                                    <div class="col-md-12">
                                        <label><span class="fa fa-flag"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

                                        <select class="form-control" id="LangFlagDrop">
                                            <option value="English">
                                                Arabic
                                            </option>
                                            <option value="Chinese">
                                                Chinese
                                            </option>
                                            <option value="French">
                                                French
                                            </option>
                                            <option value="German">
                                                German
                                            </option>
                                            <option value="Hindi">
                                                Hindi
                                            </option>
                                            <option value="Japanese">
                                                Japanese
                                            </option>

                                            <option value="Russian">
                                                Russian
                                            </option>
                                            <option value="Spanish">
                                                Spanish
                                            </option>
                                            <option value="Other">
                                                Other
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 10px;">
                                        <input type="text" id="dropOtherText" class="form-control" placeholder="Type Other ..."/>
                                    </div>
                                </div>
                            </div>

                            </div>

                            <div class="col-md-12 form-group" id="divContainer">
                                <div class="row">

                                    <div class="col-md-3">
                                        <label><span class="fa fa-calendar-times-o"></span>&nbsp;&nbsp;Date Of
                                            Arrival</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control dppicker" readonly
                                                       id="DateOfArrival" match="^.+$" validate="true"
                                                       error="* required">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><span class="fa fa-calendar"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="text-danger error"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label><span class="fa fa-calendar-plus-o"></span>&nbsp;&nbsp;Appointment
                                            Date</label> <span id="time" style="color: #140cff;"></span>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" readonly id="AppointmentDate"
                                                       match="^.+$" validate="true" error="* required">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><span class="fa fa-calendar"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="text-danger error"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input-styled" id="prioRequest"
                                                       data-fouc>
                                                Priority Request<br>
                                                <small style="color: #1b92f3">(Additional charges may be apply)
                                                </small>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label><span class="fa fa-globe"></span>&nbsp;&nbsp;Country Of Origin</label>
                                        <div class="form-group">
                                            <select class="form-control selectTo" id="CountryOfOrigin">
                                                <option value="">Select</option>
                                                <option data-countryCode="AF" value="Afghanistan" name="">Afghanistan</option>
                                                <option data-countryCode="AX" value="land Islands" name="">land Islands</option>
                                                <option data-countryCode="AL" value="Albania" name="">Albania</option>
                                                <option data-countryCode="AS" value="American Samoa" name="">American Samoa</option>
                                                <option data-countryCode="DZ" value="Algeria" name="213">Algeria</option>
                                                <option data-countryCode="AD" value="Andorra" name="376">Andorra </option>
                                                <option data-countryCode="AO" value="Angola" name="244">Angola</option>
                                                <option data-countryCode="AI" value="Anguilla" name="1264">Anguilla</option>
                                                <option data-countryCode="AQ" value="Antarctica" name="">Antarctica</option>
                                                <option data-countryCode="AG" value="Antigua" name="1268">Antigua &amp; Barbuda </option>
                                                <option data-countryCode="AR" value="Argentina" name="54">Argentina </option>
                                                <option data-countryCode="AM" value="Armenia" name="374">Armenia </option>
                                                <option data-countryCode="AW" value="Aruba" name="297">Aruba </option>
                                                <option data-countryCode="AU" value="Australia" name="61">Australia </option>
                                                <option data-countryCode="AT" value="Austria" name="43">Austria </option>
                                                <option data-countryCode="AZ" value="Azerbaijan" name="994">Azerbaijan </option>
                                                <option data-countryCode="BS" name="1242" value="Bahamas">Bahamas </option>
                                                <option data-countryCode="BH" name="973" value="Bahrain">Bahrain </option>
                                                <option data-countryCode="BD" name="880" value="Bangladesh">Bangladesh </option>
                                                <option data-countryCode="BB" name="1246" value="Barbados">Barbados </option>
                                                <option data-countryCode="BY" name="375" value="Belarus">Belarus </option>
                                                <option data-countryCode="BE" name="32" value="Belgium">Belgium </option>
                                                <option data-countryCode="BZ" name="501" value="Belize">Belize </option>
                                                <option data-countryCode="BJ" name="229" value="Benin">Benin </option>
                                                <option data-countryCode="BM" name="1441" value="Bermuda">Bermuda </option>
                                                <option data-countryCode="BT" name="975" value="Bhutan">Bhutan </option>
                                                <option data-countryCode="BO" name="591" value="Bolivia">Bolivia </option>
                                                <option data-countryCode="BA" name="387" value="Bosnia Herzegovina">Bosnia Herzegovina </option>
                                                <option data-countryCode="BW" name="267" value="Botswana">Botswana</option>
                                                <option data-countryCode="BV" name="" value="Bouvet Island">Bouvet Island</option>
                                                <option data-countryCode="BR" name="55" value="Brazil">Brazil</option>
                                                <option data-countryCode="IO" name="" value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                <option data-countryCode="BN" name="673" value="Brunei">Brunei</option>
                                                <option data-countryCode="BG" name="359" value="Bulgaria">Bulgaria </option>
                                                <option data-countryCode="BF" name="226" value="Burkina Faso">Burkina Faso </option>
                                                <option data-countryCode="BI" name="257" value="Burundi">Burundi</option>
                                                <option data-countryCode="KH" name="855" value="Cambodia">Cambodia </option>
                                                <option data-countryCode="CM" name="237" value="Cameroon">Cameroon</option>
                                                <option data-countryCode="CA" name="1" value="Canada">Canada</option>
                                                <option data-countryCode="CV" name="" value="Cape Verde Islands">Cape Verde Islands</option>
                                                <option data-countryCode="KY" name="1345" value="Cayman Islands">Cayman Islands </option>
                                                <option data-countryCode="CF" name="236" value="Central African Republic">Central African Republic </option>
                                                <option data-countryCode="TD" name="" value="Chad">Chad </option>
                                                <option data-countryCode="CL" name="56" value="Chile">Chile </option>
                                                <option data-countryCode="CN" name="86" value="China">China </option>
                                                <option data-countryCode="CX" name="" value="Christmas Island">"Christmas Island</option>
                                                <option data-countryCode="CC" name="1" value="Cocos Islands">Cocos (Keeling) Islands</option>
                                                <option data-countryCode="CO" name="57" value="Colombia">Colombia </option>
                                                <option data-countryCode="KM" name="269" value="Comoros">Comoros </option>
                                                <option data-countryCode="CG" name="242" value="Congo">Congo </option>
                                                <option data-countryCode="CD" name="" value="Congo, The Democratic Republic of the">Congo, The Democratic Republic of the</option>
                                                <option data-countryCode="CK" name="682" value="Cook Islands">Cook Islands </option>
                                                <option data-countryCode="CR" name="506" value="Costa Rica">Costa Rica</option>
                                                <option data-countryCode="HR" name="385" value="Croatia">Croatia </option>
                                                <option data-countryCode="CU" name="53" value="Cuba">Cuba </option>
                                                <option data-countryCode="CY" name="90392" value="Cyprus North">Cyprus North </option>
                                                <option data-countryCode="CY" name="357" value="Cyprus South">Cyprus South </option>
                                                <option data-countryCode="CZ" name="42" value="Czech Republic">Czech Republic </option>
                                                <option data-countryCode="DK" name="45" value="Denmark">Denmark </option>
                                                <option data-countryCode="DJ" name="253" value="Djibouti">Djibouti </option>
                                                <option data-countryCode="DM" name="1809" value="Dominica">Dominica</option>
                                                <option data-countryCode="DO" name="1809" value="Dominican Republic ">Dominican Republic </option>
                                                <option data-countryCode="EC" name="593" value="Ecuador">Ecuador</option>
                                                <option data-countryCode="EG" name="20" value="Egypt">Egypt</option>
                                                <option data-countryCode="SV" name="503" value="El Salvador">El Salvador</option>
                                                <option data-countryCode="GQ" name="240" value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option data-countryCode="ER" name="291" value="Eritrea">Eritrea</option>
                                                <option data-countryCode="EE" name="372" value="Estonia">Estonia</option>
                                                <option data-countryCode="ET" name="251" value="Ethiopia">Ethiopia</option>
                                                <option data-countryCode="FK" name="500" value="Falkland Islands">Falkland Islands</option>
                                                <option data-countryCode="FO" name="298" value="Faroe Islands">Faroe Islands </option>
                                                <option data-countryCode="FJ" name="679" value="Fiji">Fiji </option>
                                                <option data-countryCode="FI" name="358" value="Finland">Finland </option>
                                                <option data-countryCode="FR" name="33" value="France">France</option>
                                                <option data-countryCode="GF" name="594" value="French Guiana">French Guiana </option>
                                                <option data-countryCode="PF" name="689" value="French Polynesia">French Polynesia</option>
                                                <option data-countryCode="TF" name="" value="French Southern Territories">French Southern Territories</option>
                                                <option data-countryCode="GA" name="241" value="Gabon">Gabon </option>
                                                <option data-countryCode="GM" name="220" value="Gambia">Gambia </option>
                                                <option data-countryCode="GE" name="7880" value="Georgia">Georgia </option>
                                                <option data-countryCode="DE" name="49" value="Germany">Germany </option>
                                                <option data-countryCode="GH" name="233" value="Ghana">Ghana </option>
                                                <option data-countryCode="GI" name="350" value="Gibraltar">Gibraltar </option>
                                                <option data-countryCode="GR" name="30" value="Greece">Greece </option>
                                                <option data-countryCode="GL" name="299" value="Greenland">Greenland </option>
                                                <option data-countryCode="GD" name="1473" value="Grenada">Grenada </option>
                                                <option data-countryCode="GP" name="590" value="Guadeloupe">Guadeloupe </option>
                                                <option data-countryCode="GU" name="671" value="Guam">Guam </option>
                                                <option data-countryCode="GT" name="502" value="Guatemala">Guatemala </option>
                                                <option data-countryCode="GG" name="" value="Guernsey">Guernsey</option>
                                                <option data-countryCode="GN" name="224" value="Guinea">Guinea </option>
                                                <option data-countryCode="GW" name="245" value="Guinea - Bissau">Guinea - Bissau </option>
                                                <option data-countryCode="GY" name="592" value="Guyana">Guyana </option>
                                                <option data-countryCode="HT" name="509" value="Haiti">Haiti </option>
                                                <option data-countryCode="HN" name="504" value="Honduras">Honduras </option>
                                                <option data-countryCode="HM" name="" value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                <option data-countryCode="HK" name="852" value="Hong Kong">Hong Kong </option>
                                                <option data-countryCode="HU" name="36" value="Hungary">Hungary </option>
                                                <option data-countryCode="IS" name="354" value="Iceland">Iceland </option>
                                                <option data-countryCode="IN" name="91" value="India">India </option>
                                                <option data-countryCode="ID" name="62" value="Indonesia">Indonesia </option>
                                                <option data-countryCode="IR" name="98" value="Iran">Iran </option>
                                                <option data-countryCode="IQ" name="964" value="Iraq">Iraq </option>
                                                <option data-countryCode="IE" name="353" value="Ireland">Ireland </option>
                                                <option data-countryCode="IL" name="972" value="Israel">Israel </option>
                                                <option data-countryCode="IT" name="39" value="Italy">Italy </option>
                                                <option data-countryCode="JM" name="1876" value="Jamaica">Jamaica </option>
                                                <option data-countryCode="JP" name="81" value="Japan">Japan </option>
                                                <option data-countryCode="JE" name="" value="Jersey">Jersey </option>
                                                <option data-countryCode="JO" name="962" value="Jordan">Jordan </option>
                                                <option data-countryCode="KZ" name="7" value="Kazakhstan">Kazakhstan </option>
                                                <option data-countryCode="KE" name="254" value="Kenya">Kenya </option>
                                                <option data-countryCode="KI" name="686" value="Kiribati">Kiribati </option>
                                                <option data-countryCode="KP" name="850" value="Korea North">Korea North </option>
                                                <option data-countryCode="KR" name="82" value="Korea South">Korea South </option>
                                                <option data-countryCode="KW" name="965" value="Kuwait">Kuwait </option>
                                                <option data-countryCode="KG" name="996" value="Kyrgyzstan">Kyrgyzstan </option>
                                                <option data-countryCode="LA" name="856" value="Laos">Laos </option>
                                                <option data-countryCode="LV" name="371" value="Latvia">Latvia </option>
                                                <option data-countryCode="LB" name="961" value="Lebanon">Lebanon </option>
                                                <option data-countryCode="LS" name="266" value="Lesotho">Lesotho </option>
                                                <option data-countryCode="LR" name="231" value="Liberia">Liberia </option>
                                                <option data-countryCode="LY" name="218" value="Libya">Libya </option>
                                                <option data-countryCode="LI" name="417" value="Liechtenstein">Liechtenstein </option>
                                                <option data-countryCode="LT" name="370" value="Lithuania">Lithuania </option>
                                                <option data-countryCode="LU" name="352" value="Luxembourg">Luxembourg </option>
                                                <option data-countryCode="MO" name="853" value="Macao">Macao </option>
                                                <option data-countryCode="MK" name="389" value="Macedonia">Macedonia </option>
                                                <option data-countryCode="MG" name="261" value="Madagascar">Madagascar </option>
                                                <option data-countryCode="MW" name="265" value="Malawi">Malawi </option>
                                                <option data-countryCode="MY" name="60" value="Malaysia">Malaysia </option>
                                                <option data-countryCode="MV" name="" value="Maldives">Maldives </option>
                                                <option data-countryCode="ML" name="223" value="Mali">Mali </option>
                                                <option data-countryCode="MT" name="356" value="Malta">Malta </option>
                                                <option data-countryCode="MH" name="692" value="Marshall Islands ">Marshall Islands </option>
                                                <option data-countryCode="MQ" name="596" value="Martinique">Martinique </option>
                                                <option data-countryCode="MR" name="222" value="Mauritania">Mauritania </option>
                                                <option data-countryCode="MU" name="" value="Mauritius">Mauritius</option>
                                                <option data-countryCode="YT" name="269" value="Mayotte">Mayotte </option>
                                                <option data-countryCode="MX" name="52" value="Mexico">Mexico </option>
                                                <option data-countryCode="FM" name="691" value="Micronesia">Micronesia </option>
                                                <option data-countryCode="MD" name="373" value="Moldova">Moldova </option>
                                                <option data-countryCode="MC" name="377" value="Monaco">Monaco </option>
                                                <option data-countryCode="MN" name="976" value="Mongolia">Mongolia </option>
                                                <option data-countryCode="ME" name="" value="Montenegro">Montenegro </option>
                                                <option data-countryCode="MS" name="1664" value="Montserrat">Montserrat </option>
                                                <option data-countryCode="MA" name="212" value="Morocco">Morocco </option>
                                                <option data-countryCode="MZ" name="258" value="Mozambique">Mozambique </option>
                                                <option data-countryCode="MN" name="95" value="Myanmar">Myanmar </option>
                                                <option data-countryCode="NA" name="264" value="Namibia">Namibia </option>
                                                <option data-countryCode="NR" name="674" value="Nauru">Nauru </option>
                                                <option data-countryCode="NP" name="977" value="Nepal">Nepal </option>
                                                <option data-countryCode="NL" name="31" value="Netherlands">Netherlands</option>
                                                <option data-countryCode="AN" name="" value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option data-countryCode="NC" name="687" value="New Caledonia">New Caledonia </option>
                                                <option data-countryCode="NZ" name="64" value="New Zealand ">New Zealand </option>
                                                <option data-countryCode="NI" name="505" value="Nicaragua">Nicaragua </option>
                                                <option data-countryCode="NE" name="227" value="Niger">Niger </option>
                                                <option data-countryCode="NG" name="234" value="Nigeria">Nigeria </option>
                                                <option data-countryCode="NU" name="683" value="Niue">Niue </option>
                                                <option data-countryCode="NF" name="672" value="Norfolk Islands">Norfolk Islands </option>
                                                <option data-countryCode="MP" name="670" value="Northern Marianas">Northern Marianas </option>
                                                <option data-countryCode="NO" name="47" value="Norway">Norway </option>
                                                <option data-countryCode="OM" name="968" value="Oman">Oman </option>
                                                <option data-countryCode="PK" name="" value="Pakistan">Pakistan </option>
                                                <option data-countryCode="PS" name="" value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                <option data-countryCode="PW" name="680" value="Palau">Palau </option>
                                                <option data-countryCode="PA" name="507" value="Panama">Panama </option>
                                                <option data-countryCode="PG" name="675" value="Papua New Guinea">Papua New Guinea </option>
                                                <option data-countryCode="PY" name="595" value="Paraguay">Paraguay </option>
                                                <option data-countryCode="PE" name="51" value="Peru">Peru </option>
                                                <option data-countryCode="PH" name="63" value="Philippines">Philippines </option>
                                                <option data-countryCode="PL" name="48" value="Poland">Poland </option>
                                                <option data-countryCode="PT" name="351" value="Portugal">Portugal </option>
                                                <option data-countryCode="PR" name="1787" value="Puerto Rico ">Puerto Rico </option>
                                                <option data-countryCode="QA" name="974" value="Qatar">Qatar </option>
                                                <option data-countryCode="RE" name="262" value="Romania">Romania </option>
                                                <option data-countryCode="RO" name="40" value="Romania">Romania </option>
                                                <option data-countryCode="RU" name="7" value="Russia">Russia </option>
                                                <option data-countryCode="RW" name="250" value="Rwanda">Rwanda </option>
                                                <option data-countryCode="LC" name="" value="Saint Lucia">Saint Lucia</option>
                                                <option data-countryCode="VC" name="" value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                <option data-countryCode="WS" name="" value="Samoa"></option>
                                                <option data-countryCode="SM" name="378" value="San Marino ">San Marino </option>
                                                <option data-countryCode="ST" name="239" value="Sao Tome &amp; Principe ">Sao Tome &amp; Principe </option>
                                                <option data-countryCode="SA" name="966" value="Saudi Arabia">Saudi Arabia </option>
                                                <option data-countryCode="SN" name="221" value="Senegal">Senegal </option>
                                                <option data-countryCode="RS" name="" value="Serbia">Serbia</option>
                                                <option data-countryCode="SC" name="248" value="Seychelles">Seychelles </option>
                                                <option data-countryCode="SL" name="232" value="Sierra Leone">Sierra Leone </option>
                                                <option data-countryCode="SG" name="65" value="Singapore ">Singapore </option>
                                                <option data-countryCode="SK" name="421" value="Slovak Republic">Slovak Republic </option>
                                                <option data-countryCode="SI" name="386" value="Slovenia">Slovenia </option>
                                                <option data-countryCode="SB" name="677" value="Solomon Islands">Solomon Islands </option>
                                                <option data-countryCode="SO" name="252" value="Somalia">Somalia</option>
                                                <option data-countryCode="ZA" name="27" value="South Africa">South Africa </option>
                                                <option data-countryCode="GS" name="" value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands </option>
                                                <option data-countryCode="ES" name="34" value="Spain">Spain </option>
                                                <option data-countryCode="LK" name="94" value="Sri Lanka">Sri Lanka </option>
                                                <option data-countryCode="SH" name="290" value="Saint Helena">Saint Helena</option>
                                                <option data-countryCode="KN" name="1869" value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option data-countryCode="SC" name="1758" value="St. Lucia">St. Lucia</option>
                                                <option data-countryCode="SD" name="249" value="Sudan">Sudan</option>
                                                <option data-countryCode="SR" name="597" value="Suriname">Suriname </option>
                                                <option data-countryCode="SJ" name="" value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                <option data-countryCode="SZ" name="268" value="Swaziland">Swaziland </option>
                                                <option data-countryCode="SE" name="46" value="Sweden">Sweden</option>
                                                <option data-countryCode="CH" name="41" value="Switzerland">Switzerland </option>
                                                <option data-countryCode="SY" name="" id="Syrian Arab Republic">Syrian Arab Republic</option>
                                                <option data-countryCode="SI" name="963" id="Syria">Syria </option>
                                                <option data-countryCode="TW" name="886" value="Taiwan">Taiwan </option>
                                                <option data-countryCode="TJ" name="7" value="Tajikstan">Tajikstan</option>
                                                <option data-countryCode="TZ" name="" value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                <option data-countryCode="TH" name="66" value="Thailand">Thailand </option>
                                                <option data-countryCode="TG" name="228" value="Togo">Togo </option>
                                                <option data-countryCode="TO" name="676" value="Tonga">Tonga </option>
                                                <option data-countryCode="TT" name="1868" value="Trinidad &amp; Tobago ">Trinidad &amp; Tobago </option>
                                                <option data-countryCode="TN" name="216" value="Tunisia">Tunisia </option>
                                                <option data-countryCode="TR" name="90" value="Turkey">Turkey </option>
                                                <option data-countryCode="TM" name="7" value="Turkmenistan">Turkmenistan </option>
                                                <option data-countryCode="TM" name="993" value="Turkmenistan ">Turkmenistan </option>
                                                <option data-countryCode="TC" name="1649" value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                <option data-countryCode="TV" name="688" value="Tuvalu">Tuvalu </option>
                                                <option data-countryCode="UG" value="Uganda " name="256">Uganda </option>
                                                <option data-countryCode="GB" value="UK" name="44">UK</option>
                                                <option data-countryCode="UA" value="Ukraine " name="380">Ukraine </option>
                                                <option data-countryCode="AE" value="United Arab Emirates " name="971">United Arab Emirates </option>
                                                <option data-countryCode="UM" value="United States Minor Outlying Islands" name="">United States Minor Outlying Islands</option>
                                                <option data-countryCode="UY" value="Uruguay" name="598">Uruguay</option>
                                                <option data-countryCode="US"  value="United States" name="1">United States</option>
                                                <option data-countryCode="UZ" value="Uzbekistan" name="7">Uzbekistan </option>
                                                <option data-countryCode="VU" value="Vanuatu" name="678">Vanuatu</option>
                                                <option data-countryCode="VA" value="Vatican City" name="379">Vatican City </option>
                                                <option data-countryCode="VE" value="Venezuela" name="58">Venezuela </option>
                                                <option data-countryCode="VN" value="Vietnam" name="84">Vietnam</option>
                                                <option data-countryCode="VG" value="Virgin Islands - British" name="84">Virgin Islands - British </option>
                                                <option data-countryCode="VI" value="Virgin Islands - US" name="84">Virgin Islands - US </option>
                                                <option data-countryCode="WF" value="Wallis &amp; Futuna" name="681">Wallis &amp; Futuna</option>
                                                <option data-countryCode="EH" value="Western Sahara" name="">Western Sahara</option>
                                                <option data-countryCode="YE" value="Yemen" name="969/7">Yemen</option>
                                                <option data-countryCode="ZM" value="Zambia" name="260">Zambia </option>
                                                <option data-countryCode="ZW" value="Zimbabwe" name="263">Zimbabwe</option>
                                            </select>

                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <label><span class="fa fa-envelope-open"></span>&nbsp;&nbsp;Email</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="Email" match="^.+$"
                                                       validate="true" error="* required" onchange="checkVali();">
                                            </div>
                                            <div class="text-danger error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 row">

                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border"><b>Main Applicant Details</b></legend>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <label><span class="fa fa-pencil"></span>&nbsp;&nbsp;Title</label>
                                                <div class="form-group">
                                                  <select class="form-control" id="TitleOf">
                                                      <option value="">Select</option>
                                                      <option value="Mr">Mr</option>
                                                      <option value="Mrs">Mrs</option>
                                                      <option value="Miss">Miss</option>
                                                      <option value="Ms">Ms</option>
                                                      <option value="Dr">Dr</option>
                                                  </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <label><span class="fa fa-pencil"></span>&nbsp;&nbsp;First Name</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="fname" match="^.+$"
                                                           validate="true" error="* required">
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label><span class="fa fa-pencil"></span>&nbsp;&nbsp;Last Name</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="lname" match="^.+$"
                                                           validate="true" error="* required">
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <label><span class="fa fa-calendar"></span>&nbsp;&nbsp;Date of
                                                    Birth</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control dppicker" readonly id="DOB"
                                                           match="^.+$" validate="true" error="* required">
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label><span class="fa fa-gears"></span>&nbsp;&nbsp;Gender</label>
                                                <div class="form-group">
                                                    <select class="form-control" id="Gen">
                                                        <option value="">Select</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                        <option>Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><span class="fa fa-flag"></span>&nbsp;&nbsp;Nationality</label>
                                                <div class="form-group">
                                                    <select name="Nationality" validate="true" error="* Nationality required" onchange="checkVali();" class="form-control selectTo"
                                                            id="Nationality" validate="true"
                                                            error="* Nationality required">
                                                        <option value="" >Select</option>
                                                        <option value="afghan">Afghan</option>
                                                        <option value="albanian">Albanian</option>
                                                        <option value="algerian">Algerian</option>
                                                        <option value="american">American</option>
                                                        <option value="andorran">Andorran</option>
                                                        <option value="angolan">Angolan</option>
                                                        <option value="antiguans">Antiguans</option>
                                                        <option value="argentinean">Argentinean</option>
                                                        <option value="armenian">Armenian</option>
                                                        <option value="australian">Australian</option>
                                                        <option value="austrian">Austrian</option>
                                                        <option value="azerbaijani">Azerbaijani</option>
                                                        <option value="bahamian">Bahamian</option>
                                                        <option value="bahraini">Bahraini</option>
                                                        <option value="bangladeshi">Bangladeshi</option>
                                                        <option value="barbadian">Barbadian</option>
                                                        <option value="barbudans">Barbudans</option>
                                                        <option value="batswana">Batswana</option>
                                                        <option value="belarusian">Belarusian</option>
                                                        <option value="belgian">Belgian</option>
                                                        <option value="belizean">Belizean</option>
                                                        <option value="beninese">Beninese</option>
                                                        <option value="bhutanese">Bhutanese</option>
                                                        <option value="bolivian">Bolivian</option>
                                                        <option value="bosnian">Bosnian</option>
                                                        <option value="brazilian">Brazilian</option>
                                                        <option value="british">British</option>
                                                        <option value="bruneian">Bruneian</option>
                                                        <option value="bulgarian">Bulgarian</option>
                                                        <option value="burkinabe">Burkinabe</option>
                                                        <option value="burmese">Burmese</option>
                                                        <option value="burundian">Burundian</option>
                                                        <option value="cambodian">Cambodian</option>
                                                        <option value="cameroonian">Cameroonian</option>
                                                        <option value="canadian">Canadian</option>
                                                        <option value="cape verdean">Cape Verdean</option>
                                                        <option value="central african">Central African</option>
                                                        <option value="chadian">Chadian</option>
                                                        <option value="chilean">Chilean</option>
                                                        <option value="chinese">Chinese</option>
                                                        <option value="colombian">Colombian</option>
                                                        <option value="comoran">Comoran</option>
                                                        <option value="congolese">Congolese</option>
                                                        <option value="costa rican">Costa Rican</option>
                                                        <option value="croatian">Croatian</option>
                                                        <option value="cuban">Cuban</option>
                                                        <option value="cypriot">Cypriot</option>
                                                        <option value="czech">Czech</option>
                                                        <option value="danish">Danish</option>
                                                        <option value="djibouti">Djibouti</option>
                                                        <option value="dominican">Dominican</option>
                                                        <option value="dutch">Dutch</option>
                                                        <option value="east timorese">East Timorese</option>
                                                        <option value="ecuadorean">Ecuadorean</option>
                                                        <option value="egyptian">Egyptian</option>
                                                        <option value="emirian">Emirian</option>
                                                        <option value="equatorial guinean">Equatorial Guinean</option>
                                                        <option value="eritrean">Eritrean</option>
                                                        <option value="estonian">Estonian</option>
                                                        <option value="ethiopian">Ethiopian</option>
                                                        <option value="fijian">Fijian</option>
                                                        <option value="filipino">Filipino</option>
                                                        <option value="finnish">Finnish</option>
                                                        <option value="french">French</option>
                                                        <option value="gabonese">Gabonese</option>
                                                        <option value="gambian">Gambian</option>
                                                        <option value="georgian">Georgian</option>
                                                        <option value="german">German</option>
                                                        <option value="ghanaian">Ghanaian</option>
                                                        <option value="greek">Greek</option>
                                                        <option value="grenadian">Grenadian</option>
                                                        <option value="guatemalan">Guatemalan</option>
                                                        <option value="guinea-bissauan">Guinea-Bissauan</option>
                                                        <option value="guinean">Guinean</option>
                                                        <option value="guyanese">Guyanese</option>
                                                        <option value="haitian">Haitian</option>
                                                        <option value="herzegovinian">Herzegovinian</option>
                                                        <option value="honduran">Honduran</option>
                                                        <option value="hungarian">Hungarian</option>
                                                        <option value="icelander">Icelander</option>
                                                        <option value="indian">Indian</option>
                                                        <option value="indonesian">Indonesian</option>
                                                        <option value="iranian">Iranian</option>
                                                        <option value="iraqi">Iraqi</option>
                                                        <option value="irish">Irish</option>
                                                        <option value="israeli">Israeli</option>
                                                        <option value="italian">Italian</option>
                                                        <option value="ivorian">Ivorian</option>
                                                        <option value="jamaican">Jamaican</option>
                                                        <option value="japanese">Japanese</option>
                                                        <option value="jordanian">Jordanian</option>
                                                        <option value="kazakhstani">Kazakhstani</option>
                                                        <option value="kenyan">Kenyan</option>
                                                        <option value="kittian and nevisian">Kittian and Nevisian
                                                        </option>
                                                        <option value="kuwaiti">Kuwaiti</option>
                                                        <option value="kyrgyz">Kyrgyz</option>
                                                        <option value="laotian">Laotian</option>
                                                        <option value="latvian">Latvian</option>
                                                        <option value="lebanese">Lebanese</option>
                                                        <option value="liberian">Liberian</option>
                                                        <option value="libyan">Libyan</option>
                                                        <option value="liechtensteiner">Liechtensteiner</option>
                                                        <option value="lithuanian">Lithuanian</option>
                                                        <option value="luxembourger">Luxembourger</option>
                                                        <option value="macedonian">Macedonian</option>
                                                        <option value="malagasy">Malagasy</option>
                                                        <option value="malawian">Malawian</option>
                                                        <option value="malaysian">Malaysian</option>
                                                        <option value="maldivan">Maldivan</option>
                                                        <option value="malian">Malian</option>
                                                        <option value="maltese">Maltese</option>
                                                        <option value="marshallese">Marshallese</option>
                                                        <option value="mauritanian">Mauritanian</option>
                                                        <option value="mauritian">Mauritian</option>
                                                        <option value="mexican">Mexican</option>
                                                        <option value="micronesian">Micronesian</option>
                                                        <option value="moldovan">Moldovan</option>
                                                        <option value="monacan">Monacan</option>
                                                        <option value="mongolian">Mongolian</option>
                                                        <option value="moroccan">Moroccan</option>
                                                        <option value="mosotho">Mosotho</option>
                                                        <option value="motswana">Motswana</option>
                                                        <option value="mozambican">Mozambican</option>
                                                        <option value="namibian">Namibian</option>
                                                        <option value="nauruan">Nauruan</option>
                                                        <option value="nepalese">Nepalese</option>
                                                        <option value="new zealander">New Zealander</option>
                                                        <option value="ni-vanuatu">Ni-Vanuatu</option>
                                                        <option value="nicaraguan">Nicaraguan</option>
                                                        <option value="nigerien">Nigerien</option>
                                                        <option value="north korean">North Korean</option>
                                                        <option value="northern irish">Northern Irish</option>
                                                        <option value="norwegian">Norwegian</option>
                                                        <option value="omani">Omani</option>
                                                        <option value="pakistani">Pakistani</option>
                                                        <option value="palauan">Palauan</option>
                                                        <option value="panamanian">Panamanian</option>
                                                        <option value="papua new guinean">Papua New Guinean</option>
                                                        <option value="paraguayan">Paraguayan</option>
                                                        <option value="peruvian">Peruvian</option>
                                                        <option value="polish">Polish</option>
                                                        <option value="portuguese">Portuguese</option>
                                                        <option value="qatari">Qatari</option>
                                                        <option value="romanian">Romanian</option>
                                                        <option value="russian">Russian</option>
                                                        <option value="rwandan">Rwandan</option>
                                                        <option value="saint lucian">Saint Lucian</option>
                                                        <option value="salvadoran">Salvadoran</option>
                                                        <option value="samoan">Samoan</option>
                                                        <option value="san marinese">San Marinese</option>
                                                        <option value="sao tomean">Sao Tomean</option>
                                                        <option value="saudi">Saudi</option>
                                                        <option value="scottish">Scottish</option>
                                                        <option value="senegalese">Senegalese</option>
                                                        <option value="serbian">Serbian</option>
                                                        <option value="seychellois">Seychellois</option>
                                                        <option value="sierra leonean">Sierra Leonean</option>
                                                        <option value="singaporean">Singaporean</option>
                                                        <option value="slovakian">Slovakian</option>
                                                        <option value="slovenian">Slovenian</option>
                                                        <option value="solomon islander">Solomon Islander</option>
                                                        <option value="somali">Somali</option>
                                                        <option value="south african">South African</option>
                                                        <option value="south korean">South Korean</option>
                                                        <option value="spanish">Spanish</option>
                                                        <option value="sri lankan">Sri Lankan</option>
                                                        <option value="sudanese">Sudanese</option>
                                                        <option value="surinamer">Surinamer</option>
                                                        <option value="swazi">Swazi</option>
                                                        <option value="swedish">Swedish</option>
                                                        <option value="swiss">Swiss</option>
                                                        <option value="syrian">Syrian</option>
                                                        <option value="taiwanese">Taiwanese</option>
                                                        <option value="tajik">Tajik</option>
                                                        <option value="tanzanian">Tanzanian</option>
                                                        <option value="thai">Thai</option>
                                                        <option value="togolese">Togolese</option>
                                                        <option value="tongan">Tongan</option>
                                                        <option value="trinidadian or tobagonian">Trinidadian or
                                                            Tobagonian
                                                        </option>
                                                        <option value="tunisian">Tunisian</option>
                                                        <option value="turkish">Turkish</option>
                                                        <option value="tuvaluan">Tuvaluan</option>
                                                        <option value="ugandan">Ugandan</option>
                                                        <option value="ukrainian">Ukrainian</option>
                                                        <option value="uruguayan">Uruguayan</option>
                                                        <option value="uzbekistani">Uzbekistani</option>
                                                        <option value="venezuelan">Venezuelan</option>
                                                        <option value="vietnamese">Vietnamese</option>
                                                        <option value="welsh">Welsh</option>
                                                        <option value="yemenite">Yemenite</option>
                                                        <option value="zambian">Zambian</option>
                                                        <option value="zimbabwean">Zimbabwean</option>
                                                    </select>
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label><span class="fa fa-book"></span>&nbsp;&nbsp;Passport
                                                    Number</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="PassportNo" match="^.+$"
                                                           validate="true" error="* required">
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label><span class="fa fa-arrows-h"></span>&nbsp;&nbsp;Previous Passport
                                                    if
                                                    Any</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="PreviousPPA">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><span class="fa fa-flash"></span>&nbsp;&nbsp;Country Of
                                                    Birth</label>
                                                <div class="form-group">
                                                    
                                                    <select class="form-control selectTo" id="COBirth">
                                                        <option value="">Select</option>
                                                        <option data-countryCode="AF" value="Afghanistan" name="">Afghanistan</option>
                                                        <option data-countryCode="AX" value="land Islands" name="">land Islands</option>
                                                        <option data-countryCode="AL" value="Albania" name="">Albania</option>
                                                        <option data-countryCode="AS" value="American Samoa" name="">American Samoa</option>
                                                        <option data-countryCode="DZ" value="Algeria" name="213">Algeria</option>
                                                        <option data-countryCode="AD" value="Andorra" name="376">Andorra </option>
                                                        <option data-countryCode="AO" value="Angola" name="244">Angola</option>
                                                        <option data-countryCode="AI" value="Anguilla" name="1264">Anguilla</option>
                                                        <option data-countryCode="AQ" value="Antarctica" name="">Antarctica</option>
                                                        <option data-countryCode="AG" value="Antigua" name="1268">Antigua &amp; Barbuda </option>
                                                        <option data-countryCode="AR" value="Argentina" name="54">Argentina </option>
                                                        <option data-countryCode="AM" value="Armenia" name="374">Armenia </option>
                                                        <option data-countryCode="AW" value="Aruba" name="297">Aruba </option>
                                                        <option data-countryCode="AU" value="Australia" name="61">Australia </option>
                                                        <option data-countryCode="AT" value="Austria" name="43">Austria </option>
                                                        <option data-countryCode="AZ" value="Azerbaijan" name="994">Azerbaijan </option>
                                                        <option data-countryCode="BS" name="1242" value="Bahamas">Bahamas </option>
                                                        <option data-countryCode="BH" name="973" value="Bahrain">Bahrain </option>
                                                        <option data-countryCode="BD" name="880" value="Bangladesh">Bangladesh </option>
                                                        <option data-countryCode="BB" name="1246" value="Barbados">Barbados </option>
                                                        <option data-countryCode="BY" name="375" value="Belarus">Belarus </option>
                                                        <option data-countryCode="BE" name="32" value="Belgium">Belgium </option>
                                                        <option data-countryCode="BZ" name="501" value="Belize">Belize </option>
                                                        <option data-countryCode="BJ" name="229" value="Benin">Benin </option>
                                                        <option data-countryCode="BM" name="1441" value="Bermuda">Bermuda </option>
                                                        <option data-countryCode="BT" name="975" value="Bhutan">Bhutan </option>
                                                        <option data-countryCode="BO" name="591" value="Bolivia">Bolivia </option>
                                                        <option data-countryCode="BA" name="387" value="Bosnia Herzegovina">Bosnia Herzegovina </option>
                                                        <option data-countryCode="BW" name="267" value="Botswana">Botswana</option>
                                                        <option data-countryCode="BV" name="" value="Bouvet Island">Bouvet Island</option>
                                                        <option data-countryCode="BR" name="55" value="Brazil">Brazil</option>
                                                        <option data-countryCode="IO" name="" value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                        <option data-countryCode="BN" name="673" value="Brunei">Brunei</option>
                                                        <option data-countryCode="BG" name="359" value="Bulgaria">Bulgaria </option>
                                                        <option data-countryCode="BF" name="226" value="Burkina Faso">Burkina Faso </option>
                                                        <option data-countryCode="BI" name="257" value="Burundi">Burundi</option>
                                                        <option data-countryCode="KH" name="855" value="Cambodia">Cambodia </option>
                                                        <option data-countryCode="CM" name="237" value="Cameroon">Cameroon</option>
                                                        <option data-countryCode="CA" name="1" value="Canada">Canada</option>
                                                        <option data-countryCode="CV" name="" value="Cape Verde Islands">Cape Verde Islands</option>
                                                        <option data-countryCode="KY" name="1345" value="Cayman Islands">Cayman Islands </option>
                                                        <option data-countryCode="CF" name="236" value="Central African Republic">Central African Republic </option>
                                                        <option data-countryCode="TD" name="" value="Chad">Chad </option>
                                                        <option data-countryCode="CL" name="56" value="Chile">Chile </option>
                                                        <option data-countryCode="CN" name="86" value="China">China </option>
                                                        <option data-countryCode="CX" name="" value="Christmas Island">"Christmas Island</option>
                                                        <option data-countryCode="CC" name="1" value="Cocos Islands">Cocos (Keeling) Islands</option>
                                                        <option data-countryCode="CO" name="57" value="Colombia">Colombia </option>
                                                        <option data-countryCode="KM" name="269" value="Comoros">Comoros </option>
                                                        <option data-countryCode="CG" name="242" value="Congo">Congo </option>
                                                        <option data-countryCode="CD" name="" value="Congo, The Democratic Republic of the">Congo, The Democratic Republic of the</option>
                                                        <option data-countryCode="CK" name="682" value="Cook Islands">Cook Islands </option>
                                                        <option data-countryCode="CR" name="506" value="Costa Rica">Costa Rica</option>
                                                        <option data-countryCode="HR" name="385" value="Croatia">Croatia </option>
                                                        <option data-countryCode="CU" name="53" value="Cuba">Cuba </option>
                                                        <option data-countryCode="CY" name="90392" value="Cyprus North">Cyprus North </option>
                                                        <option data-countryCode="CY" name="357" value="Cyprus South">Cyprus South </option>
                                                        <option data-countryCode="CZ" name="42" value="Czech Republic">Czech Republic </option>
                                                        <option data-countryCode="DK" name="45" value="Denmark">Denmark </option>
                                                        <option data-countryCode="DJ" name="253" value="Djibouti">Djibouti </option>
                                                        <option data-countryCode="DM" name="1809" value="Dominica">Dominica</option>
                                                        <option data-countryCode="DO" name="1809" value="Dominican Republic ">Dominican Republic </option>
                                                        <option data-countryCode="EC" name="593" value="Ecuador">Ecuador</option>
                                                        <option data-countryCode="EG" name="20" value="Egypt">Egypt</option>
                                                        <option data-countryCode="SV" name="503" value="El Salvador">El Salvador</option>
                                                        <option data-countryCode="GQ" name="240" value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option data-countryCode="ER" name="291" value="Eritrea">Eritrea</option>
                                                        <option data-countryCode="EE" name="372" value="Estonia">Estonia</option>
                                                        <option data-countryCode="ET" name="251" value="Ethiopia">Ethiopia</option>
                                                        <option data-countryCode="FK" name="500" value="Falkland Islands">Falkland Islands</option>
                                                        <option data-countryCode="FO" name="298" value="Faroe Islands">Faroe Islands </option>
                                                        <option data-countryCode="FJ" name="679" value="Fiji">Fiji </option>
                                                        <option data-countryCode="FI" name="358" value="Finland">Finland </option>
                                                        <option data-countryCode="FR" name="33" value="France">France</option>
                                                        <option data-countryCode="GF" name="594" value="French Guiana">French Guiana </option>
                                                        <option data-countryCode="PF" name="689" value="French Polynesia">French Polynesia</option>
                                                        <option data-countryCode="TF" name="" value="French Southern Territories">French Southern Territories</option>
                                                        <option data-countryCode="GA" name="241" value="Gabon">Gabon </option>
                                                        <option data-countryCode="GM" name="220" value="Gambia">Gambia </option>
                                                        <option data-countryCode="GE" name="7880" value="Georgia">Georgia </option>
                                                        <option data-countryCode="DE" name="49" value="Germany">Germany </option>
                                                        <option data-countryCode="GH" name="233" value="Ghana">Ghana </option>
                                                        <option data-countryCode="GI" name="350" value="Gibraltar">Gibraltar </option>
                                                        <option data-countryCode="GR" name="30" value="Greece">Greece </option>
                                                        <option data-countryCode="GL" name="299" value="Greenland">Greenland </option>
                                                        <option data-countryCode="GD" name="1473" value="Grenada">Grenada </option>
                                                        <option data-countryCode="GP" name="590" value="Guadeloupe">Guadeloupe </option>
                                                        <option data-countryCode="GU" name="671" value="Guam">Guam </option>
                                                        <option data-countryCode="GT" name="502" value="Guatemala">Guatemala </option>
                                                        <option data-countryCode="GG" name="" value="Guernsey">Guernsey</option>
                                                        <option data-countryCode="GN" name="224" value="Guinea">Guinea </option>
                                                        <option data-countryCode="GW" name="245" value="Guinea - Bissau">Guinea - Bissau </option>
                                                        <option data-countryCode="GY" name="592" value="Guyana">Guyana </option>
                                                        <option data-countryCode="HT" name="509" value="Haiti">Haiti </option>
                                                        <option data-countryCode="HN" name="504" value="Honduras">Honduras </option>
                                                        <option data-countryCode="HM" name="" value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                        <option data-countryCode="HK" name="852" value="Hong Kong">Hong Kong </option>
                                                        <option data-countryCode="HU" name="36" value="Hungary">Hungary </option>
                                                        <option data-countryCode="IS" name="354" value="Iceland">Iceland </option>
                                                        <option data-countryCode="IN" name="91" value="India">India </option>
                                                        <option data-countryCode="ID" name="62" value="Indonesia">Indonesia </option>
                                                        <option data-countryCode="IR" name="98" value="Iran">Iran </option>
                                                        <option data-countryCode="IQ" name="964" value="Iraq">Iraq </option>
                                                        <option data-countryCode="IE" name="353" value="Ireland">Ireland </option>
                                                        <option data-countryCode="IL" name="972" value="Israel">Israel </option>
                                                        <option data-countryCode="IT" name="39" value="Italy">Italy </option>
                                                        <option data-countryCode="JM" name="1876" value="Jamaica">Jamaica </option>
                                                        <option data-countryCode="JP" name="81" value="Japan">Japan </option>
                                                        <option data-countryCode="JE" name="" value="Jersey">Jersey </option>
                                                        <option data-countryCode="JO" name="962" value="Jordan">Jordan </option>
                                                        <option data-countryCode="KZ" name="7" value="Kazakhstan">Kazakhstan </option>
                                                        <option data-countryCode="KE" name="254" value="Kenya">Kenya </option>
                                                        <option data-countryCode="KI" name="686" value="Kiribati">Kiribati </option>
                                                        <option data-countryCode="KP" name="850" value="Korea North">Korea North </option>
                                                        <option data-countryCode="KR" name="82" value="Korea South">Korea South </option>
                                                        <option data-countryCode="KW" name="965" value="Kuwait">Kuwait </option>
                                                        <option data-countryCode="KG" name="996" value="Kyrgyzstan">Kyrgyzstan </option>
                                                        <option data-countryCode="LA" name="856" value="Laos">Laos </option>
                                                        <option data-countryCode="LV" name="371" value="Latvia">Latvia </option>
                                                        <option data-countryCode="LB" name="961" value="Lebanon">Lebanon </option>
                                                        <option data-countryCode="LS" name="266" value="Lesotho">Lesotho </option>
                                                        <option data-countryCode="LR" name="231" value="Liberia">Liberia </option>
                                                        <option data-countryCode="LY" name="218" value="Libya">Libya </option>
                                                        <option data-countryCode="LI" name="417" value="Liechtenstein">Liechtenstein </option>
                                                        <option data-countryCode="LT" name="370" value="Lithuania">Lithuania </option>
                                                        <option data-countryCode="LU" name="352" value="Luxembourg">Luxembourg </option>
                                                        <option data-countryCode="MO" name="853" value="Macao">Macao </option>
                                                        <option data-countryCode="MK" name="389" value="Macedonia">Macedonia </option>
                                                        <option data-countryCode="MG" name="261" value="Madagascar">Madagascar </option>
                                                        <option data-countryCode="MW" name="265" value="Malawi">Malawi </option>
                                                        <option data-countryCode="MY" name="60" value="Malaysia">Malaysia </option>
                                                        <option data-countryCode="MV" name="" value="Maldives">Maldives </option>
                                                        <option data-countryCode="ML" name="223" value="Mali">Mali </option>
                                                        <option data-countryCode="MT" name="356" value="Malta">Malta </option>
                                                        <option data-countryCode="MH" name="692" value="Marshall Islands ">Marshall Islands </option>
                                                        <option data-countryCode="MQ" name="596" value="Martinique">Martinique </option>
                                                        <option data-countryCode="MR" name="222" value="Mauritania">Mauritania </option>
                                                        <option data-countryCode="MU" name="" value="Mauritius">Mauritius</option>
                                                        <option data-countryCode="YT" name="269" value="Mayotte">Mayotte </option>
                                                        <option data-countryCode="MX" name="52" value="Mexico">Mexico </option>
                                                        <option data-countryCode="FM" name="691" value="Micronesia">Micronesia </option>
                                                        <option data-countryCode="MD" name="373" value="Moldova">Moldova </option>
                                                        <option data-countryCode="MC" name="377" value="Monaco">Monaco </option>
                                                        <option data-countryCode="MN" name="976" value="Mongolia">Mongolia </option>
                                                        <option data-countryCode="ME" name="" value="Montenegro">Montenegro </option>
                                                        <option data-countryCode="MS" name="1664" value="Montserrat">Montserrat </option>
                                                        <option data-countryCode="MA" name="212" value="Morocco">Morocco </option>
                                                        <option data-countryCode="MZ" name="258" value="Mozambique">Mozambique </option>
                                                        <option data-countryCode="MN" name="95" value="Myanmar">Myanmar </option>
                                                        <option data-countryCode="NA" name="264" value="Namibia">Namibia </option>
                                                        <option data-countryCode="NR" name="674" value="Nauru">Nauru </option>
                                                        <option data-countryCode="NP" name="977" value="Nepal">Nepal </option>
                                                        <option data-countryCode="NL" name="31" value="Netherlands">Netherlands</option>
                                                        <option data-countryCode="AN" name="" value="Netherlands Antilles">Netherlands Antilles</option>
                                                        <option data-countryCode="NC" name="687" value="New Caledonia">New Caledonia </option>
                                                        <option data-countryCode="NZ" name="64" value="New Zealand ">New Zealand </option>
                                                        <option data-countryCode="NI" name="505" value="Nicaragua">Nicaragua </option>
                                                        <option data-countryCode="NE" name="227" value="Niger">Niger </option>
                                                        <option data-countryCode="NG" name="234" value="Nigeria">Nigeria </option>
                                                        <option data-countryCode="NU" name="683" value="Niue">Niue </option>
                                                        <option data-countryCode="NF" name="672" value="Norfolk Islands">Norfolk Islands </option>
                                                        <option data-countryCode="MP" name="670" value="Northern Marianas">Northern Marianas </option>
                                                        <option data-countryCode="NO" name="47" value="Norway">Norway </option>
                                                        <option data-countryCode="OM" name="968" value="Oman">Oman </option>
                                                        <option data-countryCode="PK" name="" value="Pakistan">Pakistan </option>
                                                        <option data-countryCode="PS" name="" value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                        <option data-countryCode="PW" name="680" value="Palau">Palau </option>
                                                        <option data-countryCode="PA" name="507" value="Panama">Panama </option>
                                                        <option data-countryCode="PG" name="675" value="Papua New Guinea">Papua New Guinea </option>
                                                        <option data-countryCode="PY" name="595" value="Paraguay">Paraguay </option>
                                                        <option data-countryCode="PE" name="51" value="Peru">Peru </option>
                                                        <option data-countryCode="PH" name="63" value="Philippines">Philippines </option>
                                                        <option data-countryCode="PL" name="48" value="Poland">Poland </option>
                                                        <option data-countryCode="PT" name="351" value="Portugal">Portugal </option>
                                                        <option data-countryCode="PR" name="1787" value="Puerto Rico ">Puerto Rico </option>
                                                        <option data-countryCode="QA" name="974" value="Qatar">Qatar </option>
                                                        <option data-countryCode="RE" name="262" value="Romania">Romania </option>
                                                        <option data-countryCode="RO" name="40" value="Romania">Romania </option>
                                                        <option data-countryCode="RU" name="7" value="Russia">Russia </option>
                                                        <option data-countryCode="RW" name="250" value="Rwanda">Rwanda </option>
                                                        <option data-countryCode="LC" name="" value="Saint Lucia">Saint Lucia</option>
                                                        <option data-countryCode="VC" name="" value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                        <option data-countryCode="WS" name="" value="Samoa"></option>
                                                        <option data-countryCode="SM" name="378" value="San Marino ">San Marino </option>
                                                        <option data-countryCode="ST" name="239" value="Sao Tome &amp; Principe ">Sao Tome &amp; Principe </option>
                                                        <option data-countryCode="SA" name="966" value="Saudi Arabia">Saudi Arabia </option>
                                                        <option data-countryCode="SN" name="221" value="Senegal">Senegal </option>
                                                        <option data-countryCode="RS" name="" value="Serbia">Serbia</option>
                                                        <option data-countryCode="SC" name="248" value="Seychelles">Seychelles </option>
                                                        <option data-countryCode="SL" name="232" value="Sierra Leone">Sierra Leone </option>
                                                        <option data-countryCode="SG" name="65" value="Singapore ">Singapore </option>
                                                        <option data-countryCode="SK" name="421" value="Slovak Republic">Slovak Republic </option>
                                                        <option data-countryCode="SI" name="386" value="Slovenia">Slovenia </option>
                                                        <option data-countryCode="SB" name="677" value="Solomon Islands">Solomon Islands </option>
                                                        <option data-countryCode="SO" name="252" value="Somalia">Somalia</option>
                                                        <option data-countryCode="ZA" name="27" value="South Africa">South Africa </option>
                                                        <option data-countryCode="GS" name="" value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands </option>
                                                        <option data-countryCode="ES" name="34" value="Spain">Spain </option>
                                                        <option data-countryCode="LK" name="94" value="Sri Lanka">Sri Lanka </option>
                                                        <option data-countryCode="SH" name="290" value="Saint Helena">Saint Helena</option>
                                                        <option data-countryCode="KN" name="1869" value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                        <option data-countryCode="SC" name="1758" value="St. Lucia">St. Lucia</option>
                                                        <option data-countryCode="SD" name="249" value="Sudan">Sudan</option>
                                                        <option data-countryCode="SR" name="597" value="Suriname">Suriname </option>
                                                        <option data-countryCode="SJ" name="" value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                        <option data-countryCode="SZ" name="268" value="Swaziland">Swaziland </option>
                                                        <option data-countryCode="SE" name="46" value="Sweden">Sweden</option>
                                                        <option data-countryCode="CH" name="41" value="Switzerland">Switzerland </option>
                                                        <option data-countryCode="SY" name="" id="Syrian Arab Republic">Syrian Arab Republic</option>
                                                        <option data-countryCode="SI" name="963" id="Syria">Syria </option>
                                                        <option data-countryCode="TW" name="886" value="Taiwan">Taiwan </option>
                                                        <option data-countryCode="TJ" name="7" value="Tajikstan">Tajikstan</option>
                                                        <option data-countryCode="TZ" name="" value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                        <option data-countryCode="TH" name="66" value="Thailand">Thailand </option>
                                                        <option data-countryCode="TG" name="228" value="Togo">Togo </option>
                                                        <option data-countryCode="TO" name="676" value="Tonga">Tonga </option>
                                                        <option data-countryCode="TT" name="1868" value="Trinidad &amp; Tobago ">Trinidad &amp; Tobago </option>
                                                        <option data-countryCode="TN" name="216" value="Tunisia">Tunisia </option>
                                                        <option data-countryCode="TR" name="90" value="Turkey">Turkey </option>
                                                        <option data-countryCode="TM" name="7" value="Turkmenistan">Turkmenistan </option>
                                                        <option data-countryCode="TM" name="993" value="Turkmenistan ">Turkmenistan </option>
                                                        <option data-countryCode="TC" name="1649" value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                        <option data-countryCode="TV" name="688" value="Tuvalu">Tuvalu </option>
                                                        <option data-countryCode="UG" value="Uganda " name="256">Uganda </option>
                                                        <option data-countryCode="GB" value="UK" name="44">UK</option>
                                                        <option data-countryCode="UA" value="Ukraine " name="380">Ukraine </option>
                                                        <option data-countryCode="AE" value="United Arab Emirates " name="971">United Arab Emirates </option>
                                                        <option data-countryCode="UM" value="United States Minor Outlying Islands" name="">United States Minor Outlying Islands</option>
                                                        <option data-countryCode="UY" value="Uruguay" name="598">Uruguay</option>
                                                        <option data-countryCode="US"  value="United States" name="1">United States</option>
                                                        <option data-countryCode="UZ" value="Uzbekistan" name="7">Uzbekistan </option>
                                                        <option data-countryCode="VU" value="Vanuatu" name="678">Vanuatu</option>
                                                        <option data-countryCode="VA" value="Vatican City" name="379">Vatican City </option>
                                                        <option data-countryCode="VE" value="Venezuela" name="58">Venezuela </option>
                                                        <option data-countryCode="VN" value="Vietnam" name="84">Vietnam</option>
                                                        <option data-countryCode="VG" value="Virgin Islands - British" name="84">Virgin Islands - British </option>
                                                        <option data-countryCode="VI" value="Virgin Islands - US" name="84">Virgin Islands - US </option>
                                                        <option data-countryCode="WF" value="Wallis &amp; Futuna" name="681">Wallis &amp; Futuna</option>
                                                        <option data-countryCode="EH" value="Western Sahara" name="">Western Sahara</option>
                                                        <option data-countryCode="YE" value="Yemen" name="969/7">Yemen</option>
                                                        <option data-countryCode="ZM" value="Zambia" name="260">Zambia </option>
                                                        <option data-countryCode="ZW" value="Zimbabwe" name="263">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label><span class="fa fa-arrow-circle-o-right"></span>&nbsp; Country/countries visited during the last three years</label>
                                                <div class="form-group">
                                                    
                                                    <select class="form-control form-control-select2-icons selectTo"
                                                            multiple="multiple" id="CVDL3years">
                                                        <option>Select</option>
                                                        <option data-countryCode="AF" value="Afghanistan" name="">Afghanistan</option>
                                                        <option data-countryCode="AX" value="land Islands" name="">land Islands</option>
                                                        <option data-countryCode="AL" value="Albania" name="">Albania</option>
                                                        <option data-countryCode="AS" value="American Samoa" name="">American Samoa</option>
                                                        <option data-countryCode="DZ" value="Algeria" name="213">Algeria</option>
                                                        <option data-countryCode="AD" value="Andorra" name="376">Andorra </option>
                                                        <option data-countryCode="AO" value="Angola" name="244">Angola</option>
                                                        <option data-countryCode="AI" value="Anguilla" name="1264">Anguilla</option>
                                                        <option data-countryCode="AQ" value="Antarctica" name="">Antarctica</option>
                                                        <option data-countryCode="AG" value="Antigua" name="1268">Antigua &amp; Barbuda </option>
                                                        <option data-countryCode="AR" value="Argentina" name="54">Argentina </option>
                                                        <option data-countryCode="AM" value="Armenia" name="374">Armenia </option>
                                                        <option data-countryCode="AW" value="Aruba" name="297">Aruba </option>
                                                        <option data-countryCode="AU" value="Australia" name="61">Australia </option>
                                                        <option data-countryCode="AT" value="Austria" name="43">Austria </option>
                                                        <option data-countryCode="AZ" value="Azerbaijan" name="994">Azerbaijan </option>
                                                        <option data-countryCode="BS" name="1242" value="Bahamas">Bahamas </option>
                                                        <option data-countryCode="BH" name="973" value="Bahrain">Bahrain </option>
                                                        <option data-countryCode="BD" name="880" value="Bangladesh">Bangladesh </option>
                                                        <option data-countryCode="BB" name="1246" value="Barbados">Barbados </option>
                                                        <option data-countryCode="BY" name="375" value="Belarus">Belarus </option>
                                                        <option data-countryCode="BE" name="32" value="Belgium">Belgium </option>
                                                        <option data-countryCode="BZ" name="501" value="Belize">Belize </option>
                                                        <option data-countryCode="BJ" name="229" value="Benin">Benin </option>
                                                        <option data-countryCode="BM" name="1441" value="Bermuda">Bermuda </option>
                                                        <option data-countryCode="BT" name="975" value="Bhutan">Bhutan </option>
                                                        <option data-countryCode="BO" name="591" value="Bolivia">Bolivia </option>
                                                        <option data-countryCode="BA" name="387" value="Bosnia Herzegovina">Bosnia Herzegovina </option>
                                                        <option data-countryCode="BW" name="267" value="Botswana">Botswana</option>
                                                        <option data-countryCode="BV" name="" value="Bouvet Island">Bouvet Island</option>
                                                        <option data-countryCode="BR" name="55" value="Brazil">Brazil</option>
                                                        <option data-countryCode="IO" name="" value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                        <option data-countryCode="BN" name="673" value="Brunei">Brunei</option>
                                                        <option data-countryCode="BG" name="359" value="Bulgaria">Bulgaria </option>
                                                        <option data-countryCode="BF" name="226" value="Burkina Faso">Burkina Faso </option>
                                                        <option data-countryCode="BI" name="257" value="Burundi">Burundi</option>
                                                        <option data-countryCode="KH" name="855" value="Cambodia">Cambodia </option>
                                                        <option data-countryCode="CM" name="237" value="Cameroon">Cameroon</option>
                                                        <option data-countryCode="CA" name="1" value="Canada">Canada</option>
                                                        <option data-countryCode="CV" name="" value="Cape Verde Islands">Cape Verde Islands</option>
                                                        <option data-countryCode="KY" name="1345" value="Cayman Islands">Cayman Islands </option>
                                                        <option data-countryCode="CF" name="236" value="Central African Republic">Central African Republic </option>
                                                        <option data-countryCode="TD" name="" value="Chad">Chad </option>
                                                        <option data-countryCode="CL" name="56" value="Chile">Chile </option>
                                                        <option data-countryCode="CN" name="86" value="China">China </option>
                                                        <option data-countryCode="CX" name="" value="Christmas Island">"Christmas Island</option>
                                                        <option data-countryCode="CC" name="1" value="Cocos Islands">Cocos (Keeling) Islands</option>
                                                        <option data-countryCode="CO" name="57" value="Colombia">Colombia </option>
                                                        <option data-countryCode="KM" name="269" value="Comoros">Comoros </option>
                                                        <option data-countryCode="CG" name="242" value="Congo">Congo </option>
                                                        <option data-countryCode="CD" name="" value="Congo, The Democratic Republic of the">Congo, The Democratic Republic of the</option>
                                                        <option data-countryCode="CK" name="682" value="Cook Islands">Cook Islands </option>
                                                        <option data-countryCode="CR" name="506" value="Costa Rica">Costa Rica</option>
                                                        <option data-countryCode="HR" name="385" value="Croatia">Croatia </option>
                                                        <option data-countryCode="CU" name="53" value="Cuba">Cuba </option>
                                                        <option data-countryCode="CY" name="90392" value="Cyprus North">Cyprus North </option>
                                                        <option data-countryCode="CY" name="357" value="Cyprus South">Cyprus South </option>
                                                        <option data-countryCode="CZ" name="42" value="Czech Republic">Czech Republic </option>
                                                        <option data-countryCode="DK" name="45" value="Denmark">Denmark </option>
                                                        <option data-countryCode="DJ" name="253" value="Djibouti">Djibouti </option>
                                                        <option data-countryCode="DM" name="1809" value="Dominica">Dominica</option>
                                                        <option data-countryCode="DO" name="1809" value="Dominican Republic ">Dominican Republic </option>
                                                        <option data-countryCode="EC" name="593" value="Ecuador">Ecuador</option>
                                                        <option data-countryCode="EG" name="20" value="Egypt">Egypt</option>
                                                        <option data-countryCode="SV" name="503" value="El Salvador">El Salvador</option>
                                                        <option data-countryCode="GQ" name="240" value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option data-countryCode="ER" name="291" value="Eritrea">Eritrea</option>
                                                        <option data-countryCode="EE" name="372" value="Estonia">Estonia</option>
                                                        <option data-countryCode="ET" name="251" value="Ethiopia">Ethiopia</option>
                                                        <option data-countryCode="FK" name="500" value="Falkland Islands">Falkland Islands</option>
                                                        <option data-countryCode="FO" name="298" value="Faroe Islands">Faroe Islands </option>
                                                        <option data-countryCode="FJ" name="679" value="Fiji">Fiji </option>
                                                        <option data-countryCode="FI" name="358" value="Finland">Finland </option>
                                                        <option data-countryCode="FR" name="33" value="France">France</option>
                                                        <option data-countryCode="GF" name="594" value="French Guiana">French Guiana </option>
                                                        <option data-countryCode="PF" name="689" value="French Polynesia">French Polynesia</option>
                                                        <option data-countryCode="TF" name="" value="French Southern Territories">French Southern Territories</option>
                                                        <option data-countryCode="GA" name="241" value="Gabon">Gabon </option>
                                                        <option data-countryCode="GM" name="220" value="Gambia">Gambia </option>
                                                        <option data-countryCode="GE" name="7880" value="Georgia">Georgia </option>
                                                        <option data-countryCode="DE" name="49" value="Germany">Germany </option>
                                                        <option data-countryCode="GH" name="233" value="Ghana">Ghana </option>
                                                        <option data-countryCode="GI" name="350" value="Gibraltar">Gibraltar </option>
                                                        <option data-countryCode="GR" name="30" value="Greece">Greece </option>
                                                        <option data-countryCode="GL" name="299" value="Greenland">Greenland </option>
                                                        <option data-countryCode="GD" name="1473" value="Grenada">Grenada </option>
                                                        <option data-countryCode="GP" name="590" value="Guadeloupe">Guadeloupe </option>
                                                        <option data-countryCode="GU" name="671" value="Guam">Guam </option>
                                                        <option data-countryCode="GT" name="502" value="Guatemala">Guatemala </option>
                                                        <option data-countryCode="GG" name="" value="Guernsey">Guernsey</option>
                                                        <option data-countryCode="GN" name="224" value="Guinea">Guinea </option>
                                                        <option data-countryCode="GW" name="245" value="Guinea - Bissau">Guinea - Bissau </option>
                                                        <option data-countryCode="GY" name="592" value="Guyana">Guyana </option>
                                                        <option data-countryCode="HT" name="509" value="Haiti">Haiti </option>
                                                        <option data-countryCode="HN" name="504" value="Honduras">Honduras </option>
                                                        <option data-countryCode="HM" name="" value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                        <option data-countryCode="HK" name="852" value="Hong Kong">Hong Kong </option>
                                                        <option data-countryCode="HU" name="36" value="Hungary">Hungary </option>
                                                        <option data-countryCode="IS" name="354" value="Iceland">Iceland </option>
                                                        <option data-countryCode="IN" name="91" value="India">India </option>
                                                        <option data-countryCode="ID" name="62" value="Indonesia">Indonesia </option>
                                                        <option data-countryCode="IR" name="98" value="Iran">Iran </option>
                                                        <option data-countryCode="IQ" name="964" value="Iraq">Iraq </option>
                                                        <option data-countryCode="IE" name="353" value="Ireland">Ireland </option>
                                                        <option data-countryCode="IL" name="972" value="Israel">Israel </option>
                                                        <option data-countryCode="IT" name="39" value="Italy">Italy </option>
                                                        <option data-countryCode="JM" name="1876" value="Jamaica">Jamaica </option>
                                                        <option data-countryCode="JP" name="81" value="Japan">Japan </option>
                                                        <option data-countryCode="JE" name="" value="Jersey">Jersey </option>
                                                        <option data-countryCode="JO" name="962" value="Jordan">Jordan </option>
                                                        <option data-countryCode="KZ" name="7" value="Kazakhstan">Kazakhstan </option>
                                                        <option data-countryCode="KE" name="254" value="Kenya">Kenya </option>
                                                        <option data-countryCode="KI" name="686" value="Kiribati">Kiribati </option>
                                                        <option data-countryCode="KP" name="850" value="Korea North">Korea North </option>
                                                        <option data-countryCode="KR" name="82" value="Korea South">Korea South </option>
                                                        <option data-countryCode="KW" name="965" value="Kuwait">Kuwait </option>
                                                        <option data-countryCode="KG" name="996" value="Kyrgyzstan">Kyrgyzstan </option>
                                                        <option data-countryCode="LA" name="856" value="Laos">Laos </option>
                                                        <option data-countryCode="LV" name="371" value="Latvia">Latvia </option>
                                                        <option data-countryCode="LB" name="961" value="Lebanon">Lebanon </option>
                                                        <option data-countryCode="LS" name="266" value="Lesotho">Lesotho </option>
                                                        <option data-countryCode="LR" name="231" value="Liberia">Liberia </option>
                                                        <option data-countryCode="LY" name="218" value="Libya">Libya </option>
                                                        <option data-countryCode="LI" name="417" value="Liechtenstein">Liechtenstein </option>
                                                        <option data-countryCode="LT" name="370" value="Lithuania">Lithuania </option>
                                                        <option data-countryCode="LU" name="352" value="Luxembourg">Luxembourg </option>
                                                        <option data-countryCode="MO" name="853" value="Macao">Macao </option>
                                                        <option data-countryCode="MK" name="389" value="Macedonia">Macedonia </option>
                                                        <option data-countryCode="MG" name="261" value="Madagascar">Madagascar </option>
                                                        <option data-countryCode="MW" name="265" value="Malawi">Malawi </option>
                                                        <option data-countryCode="MY" name="60" value="Malaysia">Malaysia </option>
                                                        <option data-countryCode="MV" name="" value="Maldives">Maldives </option>
                                                        <option data-countryCode="ML" name="223" value="Mali">Mali </option>
                                                        <option data-countryCode="MT" name="356" value="Malta">Malta </option>
                                                        <option data-countryCode="MH" name="692" value="Marshall Islands ">Marshall Islands </option>
                                                        <option data-countryCode="MQ" name="596" value="Martinique">Martinique </option>
                                                        <option data-countryCode="MR" name="222" value="Mauritania">Mauritania </option>
                                                        <option data-countryCode="MU" name="" value="Mauritius">Mauritius</option>
                                                        <option data-countryCode="YT" name="269" value="Mayotte">Mayotte </option>
                                                        <option data-countryCode="MX" name="52" value="Mexico">Mexico </option>
                                                        <option data-countryCode="FM" name="691" value="Micronesia">Micronesia </option>
                                                        <option data-countryCode="MD" name="373" value="Moldova">Moldova </option>
                                                        <option data-countryCode="MC" name="377" value="Monaco">Monaco </option>
                                                        <option data-countryCode="MN" name="976" value="Mongolia">Mongolia </option>
                                                        <option data-countryCode="ME" name="" value="Montenegro">Montenegro </option>
                                                        <option data-countryCode="MS" name="1664" value="Montserrat">Montserrat </option>
                                                        <option data-countryCode="MA" name="212" value="Morocco">Morocco </option>
                                                        <option data-countryCode="MZ" name="258" value="Mozambique">Mozambique </option>
                                                        <option data-countryCode="MN" name="95" value="Myanmar">Myanmar </option>
                                                        <option data-countryCode="NA" name="264" value="Namibia">Namibia </option>
                                                        <option data-countryCode="NR" name="674" value="Nauru">Nauru </option>
                                                        <option data-countryCode="NP" name="977" value="Nepal">Nepal </option>
                                                        <option data-countryCode="NL" name="31" value="Netherlands">Netherlands</option>
                                                        <option data-countryCode="AN" name="" value="Netherlands Antilles">Netherlands Antilles</option>
                                                        <option data-countryCode="NC" name="687" value="New Caledonia">New Caledonia </option>
                                                        <option data-countryCode="NZ" name="64" value="New Zealand ">New Zealand </option>
                                                        <option data-countryCode="NI" name="505" value="Nicaragua">Nicaragua </option>
                                                        <option data-countryCode="NE" name="227" value="Niger">Niger </option>
                                                        <option data-countryCode="NG" name="234" value="Nigeria">Nigeria </option>
                                                        <option data-countryCode="NU" name="683" value="Niue">Niue </option>
                                                        <option data-countryCode="NF" name="672" value="Norfolk Islands">Norfolk Islands </option>
                                                        <option data-countryCode="MP" name="670" value="Northern Marianas">Northern Marianas </option>
                                                        <option data-countryCode="NO" name="47" value="Norway">Norway </option>
                                                        <option data-countryCode="OM" name="968" value="Oman">Oman </option>
                                                        <option data-countryCode="PK" name="" value="Pakistan">Pakistan </option>
                                                        <option data-countryCode="PS" name="" value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                        <option data-countryCode="PW" name="680" value="Palau">Palau </option>
                                                        <option data-countryCode="PA" name="507" value="Panama">Panama </option>
                                                        <option data-countryCode="PG" name="675" value="Papua New Guinea">Papua New Guinea </option>
                                                        <option data-countryCode="PY" name="595" value="Paraguay">Paraguay </option>
                                                        <option data-countryCode="PE" name="51" value="Peru">Peru </option>
                                                        <option data-countryCode="PH" name="63" value="Philippines">Philippines </option>
                                                        <option data-countryCode="PL" name="48" value="Poland">Poland </option>
                                                        <option data-countryCode="PT" name="351" value="Portugal">Portugal </option>
                                                        <option data-countryCode="PR" name="1787" value="Puerto Rico ">Puerto Rico </option>
                                                        <option data-countryCode="QA" name="974" value="Qatar">Qatar </option>
                                                        <option data-countryCode="RE" name="262" value="Romania">Romania </option>
                                                        <option data-countryCode="RO" name="40" value="Romania">Romania </option>
                                                        <option data-countryCode="RU" name="7" value="Russia">Russia </option>
                                                        <option data-countryCode="RW" name="250" value="Rwanda">Rwanda </option>
                                                        <option data-countryCode="LC" name="" value="Saint Lucia">Saint Lucia</option>
                                                        <option data-countryCode="VC" name="" value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                        <option data-countryCode="WS" name="" value="Samoa"></option>
                                                        <option data-countryCode="SM" name="378" value="San Marino ">San Marino </option>
                                                        <option data-countryCode="ST" name="239" value="Sao Tome &amp; Principe ">Sao Tome &amp; Principe </option>
                                                        <option data-countryCode="SA" name="966" value="Saudi Arabia">Saudi Arabia </option>
                                                        <option data-countryCode="SN" name="221" value="Senegal">Senegal </option>
                                                        <option data-countryCode="RS" name="" value="Serbia">Serbia</option>
                                                        <option data-countryCode="SC" name="248" value="Seychelles">Seychelles </option>
                                                        <option data-countryCode="SL" name="232" value="Sierra Leone">Sierra Leone </option>
                                                        <option data-countryCode="SG" name="65" value="Singapore ">Singapore </option>
                                                        <option data-countryCode="SK" name="421" value="Slovak Republic">Slovak Republic </option>
                                                        <option data-countryCode="SI" name="386" value="Slovenia">Slovenia </option>
                                                        <option data-countryCode="SB" name="677" value="Solomon Islands">Solomon Islands </option>
                                                        <option data-countryCode="SO" name="252" value="Somalia">Somalia</option>
                                                        <option data-countryCode="ZA" name="27" value="South Africa">South Africa </option>
                                                        <option data-countryCode="GS" name="" value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands </option>
                                                        <option data-countryCode="ES" name="34" value="Spain">Spain </option>
                                                        <option data-countryCode="LK" name="94" value="Sri Lanka">Sri Lanka </option>
                                                        <option data-countryCode="SH" name="290" value="Saint Helena">Saint Helena</option>
                                                        <option data-countryCode="KN" name="1869" value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                        <option data-countryCode="SC" name="1758" value="St. Lucia">St. Lucia</option>
                                                        <option data-countryCode="SD" name="249" value="Sudan">Sudan</option>
                                                        <option data-countryCode="SR" name="597" value="Suriname">Suriname </option>
                                                        <option data-countryCode="SJ" name="" value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                        <option data-countryCode="SZ" name="268" value="Swaziland">Swaziland </option>
                                                        <option data-countryCode="SE" name="46" value="Sweden">Sweden</option>
                                                        <option data-countryCode="CH" name="41" value="Switzerland">Switzerland </option>
                                                        <option data-countryCode="SY" name="" id="Syrian Arab Republic">Syrian Arab Republic</option>
                                                        <option data-countryCode="SI" name="963" id="Syria">Syria </option>
                                                        <option data-countryCode="TW" name="886" value="Taiwan">Taiwan </option>
                                                        <option data-countryCode="TJ" name="7" value="Tajikstan">Tajikstan</option>
                                                        <option data-countryCode="TZ" name="" value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                        <option data-countryCode="TH" name="66" value="Thailand">Thailand </option>
                                                        <option data-countryCode="TG" name="228" value="Togo">Togo </option>
                                                        <option data-countryCode="TO" name="676" value="Tonga">Tonga </option>
                                                        <option data-countryCode="TT" name="1868" value="Trinidad &amp; Tobago ">Trinidad &amp; Tobago </option>
                                                        <option data-countryCode="TN" name="216" value="Tunisia">Tunisia </option>
                                                        <option data-countryCode="TR" name="90" value="Turkey">Turkey </option>
                                                        <option data-countryCode="TM" name="7" value="Turkmenistan">Turkmenistan </option>
                                                        <option data-countryCode="TM" name="993" value="Turkmenistan ">Turkmenistan </option>
                                                        <option data-countryCode="TC" name="1649" value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                        <option data-countryCode="TV" name="688" value="Tuvalu">Tuvalu </option>
                                                        <option data-countryCode="UG" value="Uganda " name="256">Uganda </option>
                                                        <option data-countryCode="GB" value="UK" name="44">UK</option>
                                                        <option data-countryCode="UA" value="Ukraine " name="380">Ukraine </option>
                                                        <option data-countryCode="AE" value="United Arab Emirates " name="971">United Arab Emirates </option>
                                                        <option data-countryCode="UM" value="United States Minor Outlying Islands" name="">United States Minor Outlying Islands</option>
                                                        <option data-countryCode="UY" value="Uruguay" name="598">Uruguay</option>
                                                        <option data-countryCode="US"  value="United States" name="1">United States</option>
                                                        <option data-countryCode="UZ" value="Uzbekistan" name="7">Uzbekistan </option>
                                                        <option data-countryCode="VU" value="Vanuatu" name="678">Vanuatu</option>
                                                        <option data-countryCode="VA" value="Vatican City" name="379">Vatican City </option>
                                                        <option data-countryCode="VE" value="Venezuela" name="58">Venezuela </option>
                                                        <option data-countryCode="VN" value="Vietnam" name="84">Vietnam</option>
                                                        <option data-countryCode="VG" value="Virgin Islands - British" name="84">Virgin Islands - British </option>
                                                        <option data-countryCode="VI" value="Virgin Islands - US" name="84">Virgin Islands - US </option>
                                                        <option data-countryCode="WF" value="Wallis &amp; Futuna" name="681">Wallis &amp; Futuna</option>
                                                        <option data-countryCode="EH" value="Western Sahara" name="">Western Sahara</option>
                                                        <option data-countryCode="YE" value="Yemen" name="969/7">Yemen</option>
                                                        <option data-countryCode="ZM" value="Zambia" name="260">Zambia </option>
                                                        <option data-countryCode="ZW" value="Zimbabwe" name="263">Zimbabwe</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">

                                                                <span id="Countryvisitedduringlast3yearse">
                                                                     <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Special Needs</label>


                                                                                 <div class="col-md-12">
                                                                                 <span class="checkbox">
                                                                                    <input class="checkboxLablePrefType"
                                                                                           type="checkbox"
                                                                                           id="MainApplicantspecialMedicalNeedsCheck">
                                                                                         <label    for="MainApplicantspecialMedicalNeedsCheck">
                                                                                            <strong>Special Medical Needs ( wheelchair accessibility, feeding room etc.)</strong>
                                                                                     </label>
                                                                                 </span>

                                                                </div>
                                                                </span>
                                            </div>

                                        </div>
                                    </div>

                                </fieldset>
                            </div>

                            <div class="col-md-12 form-group" id="IdDomicile">

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <h5>Address of the country of domicile</h5>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Address</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="CdAddress" >
                                            <div class="text-danger error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label><span class="fa fa-road"></span>&nbsp;&nbsp;Street</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="CdStreet">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label><span class="fa fa-building"></span>&nbsp;&nbsp;City</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="CdCity">
                                        </div>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-4">
                                        <label><span
                                                    class="fa fa-address-book"></span>&nbsp;&nbsp;State/Province</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="CdStateProvince">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label><span class="fa fa-envelope"></span>&nbsp;&nbsp;Postal Code</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="CdPostalCode">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label><span class="fa fa-globe"></span>&nbsp;&nbsp;Country</label>
                                        <div class="form-group">
                                            
                                            <select class="form-control" id="CdCountry" >
                                                <option disabled selected value="">Select</option>
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
                                                <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean
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
                                                <option value="Central African Republic">Central African Republic
                                                </option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo">Congo, the Democratic Republic of the</option>
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
                                                <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="France Metropolitan">France, Metropolitan</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories
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
                                                <option value="Heard and McDonald Islands">Heard and Mc Donald Islands
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
                                                <option value="Democratic People's Republic of Korea">Korea, Democratic
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
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macau">Macau</option>
                                                <option value="Macedonia">Macedonia, The Former Yugoslav Republic of
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
                                                <option value="Micronesia">Micronesia, Federated States of</option>
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
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands
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
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint LUCIA">Saint LUCIA</option>
                                                <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
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
                                                <option value="South Georgia">South Georgia and the South Sandwich
                                                    Islands
                                                </option>
                                                <option value="Span">Spain</option>
                                                <option value="SriLanka">Sri Lanka</option>
                                                <option value="St. Helena">St. Helena</option>
                                                <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
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
                                                <option value="Turks and Caicos">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor
                                                    Outlying Islands
                                                </option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Viet Nam</option>
                                                <option value="Virgin Islands (British)">Virgin Islands (British)
                                                </option>
                                                <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                                                <option value="Wallis and Futana Islands">Wallis and Futuna Islands
                                                </option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Yugoslavia">Yugoslavia</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                            <div class="text-danger error"></div>
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12" style="padding-left: 0;">

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label><span class="fa fa-share-alt"></span>&nbsp;&nbsp;Preferred Contact
                                            Method</label>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input-styled"
                                                       id="prefConModeEmail" data-fouc>
                                                Email
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input-styled"
                                                       id="prefConModeMobile" data-fouc>
                                                Mobile
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border"><b>Sponsor Details</b></legend>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><span class="fa fa-handshake-o"></span>&nbsp;&nbsp;Sponsor
                                                    Name</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="SponsorName"
                                                           match="^.+$" validate="true" error="* required"
                                                           onchange="checkVali();">
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label><span class="fa fa-phone-square"></span>&nbsp;&nbsp;Telephone -
                                                    Fixed
                                                    Line</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                           id="SponsorTelephoneFixedLine">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><span
                                                            class="fa fa-envelope-open"></span>&nbsp;&nbsp;Email</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="SponsorEmailAddress"
                                                           match="^.+$" validate="true" error="* required"
                                                           onchange="checkVali();">
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label><span class="fa fa-mobile"></span>&nbsp;&nbsp;Mobile</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="SponsorMobile"
                                                           match="^.+$" validate="true" error="* required"
                                                           onchange="checkVali();">
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><span
                                                            class="fa fa-address-book"></span>&nbsp;&nbsp;Address</label>
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="SponsorAddress"
                                                           match="^.+$" validate="true" error="* required"
                                                           onchange="checkVali();">
                                                    <div class="text-danger error"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </fieldset>
                            </div>



                            <div class="col-md-12 form-group text-center">
                               <div class="row justify-content-center">
                                    <div class="col-md-2">
                                        <button type="button" class="btn-success btn-graygreen btn-lg btn3d btn-block" style="font-weight: bolder;"
                                                id="btnsubmit">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- /content area -->


            <!--//////////////////////////////////////////////////////////////////////////////////////////////////-->

            <div class="modal" id="myModal2">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div>
                                <div class="col-md-12 form-group">

                                    <div class="form-group text-center calenderDiv">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="col-md-12"> <h4><strong>Schedule Appointment</strong> </h4> </div>
                                                <div class="col-md-12 row">
                                                    <div class="col-md-6"><strong>Booking Appoiment Count :&nbsp;<lable id="BookedAppoimentCount"></lable></strong></div>
                                                    <div class="col-md-6"><strong>Schedule Appointment Count :&nbsp;<lable id="TotalAppoimentCount"></lable></strong></div>

                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-7 col-12">
                                                        <div id='calendar'
                                                             style="box-shadow: 0 5px 5px -5px rgba(0, 0, 0, 0.1);border: 1px solid #f3dfdf;"></div>
                                                    </div>
                                                    <div class="col-md-5 col-12"
                                                         style="max-height: 300px;overflow: auto;">
                                                        <table class="table table-bordered table-hover">
                                                            <thead style="background: cadetblue;color: white;">
                                                            <tr>
                                                                <th>Time</th>
                                                                <th style="width: 10%;">Availability</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="timeTableBody">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal" style="width: 100px;">
                                OK
                            </button>
                        </div>

                    </div>
                </div>
            </div>

            

            <div class="modal modalAddData" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                <span class="checkbox">
                                    <input class="checkboxLablePrefType" type="checkbox" id="interPretServicesCheck">
                                    <label for="interPretServicesCheck">
                                        <strong>Interpretation Services</strong>
                                    </label>
                                </span>
                                </div>
                                <div class="col-md-12">
                                <span class="checkbox">
                                    <input class="checkboxLablePrefType" type="checkbox" id="over60YearsCheck">
                                    <label for="over60YearsCheck">
                                        <strong>Over 60 Years</strong>
                                    </label>
                                </span>
                                </div>
                                <div class="col-md-12">
                                <span class="checkbox">
                                    <input class="checkboxLablePrefType" type="checkbox" id="specialMedicalNeedsCheck">
                                    <label for="specialMedicalNeedsCheck">
                                        <strong>Special Medical Needs</strong>
                                    </label>
                                </span>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                        <span class="checkbox">
                                            <input class="checkboxLablePrefType" type="checkbox" id="otherCheck">
                                            <label for="otherCheck">
                                                <strong>Other</strong>
                                            </label>
                                        </span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <!--JS files-->
    <script src="<?php echo e(asset('plugins/fullCalender/moment.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/fullCalender/fullcalendar.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/notifications/noty.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('jsPages/OverThePhoneRegistration.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('js/common.js')); ?>" type="text/javascript"></script>

    <script>

        $(".dppicker").datepicker({
            dateFormat: 'yy/mm/dd',
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+100"
            /*,
        maxDate: 0*/
        });

        function checkVali() {
            validate('#formvali');
        }

        $('input[type=text]').change(function() {
            validate('#divContainer');
            validate('#divContainer3');
            validate('#divdomi');
            validate('#SponserDiv');

        });
        $('#CdCountry').on('change',function () {
            validate('#divContainer');
            validate('#divContainer3');
            validate('#divdomi');
            validate('#SponserDiv');

            var options = $('option:selected', this).attr('name');
            options='+'+options;
            $('#CNCode').text(options);
            validate('#formvali');

        });

        $('#DateOfArrival').on('change',function () {
            validate('#divContainer');
            validate('#divContainer3');
            validate('#divdomi');
            validate('#SponserDiv');
            validate('#formvali');
        });
        $('#AppointmentDate').on('change',function () {
            validate('#divContainer');
            validate('#divContainer3');
            validate('#divdomi');
            validate('#SponserDiv');
            validate('#formvali');
        });
        // ------------------------------TELE PHONE NUMBER VALIDATION-------------------

         document.querySelector("#SponsorMobile").addEventListener("keypress", function (e) {
            var allowedChars = '0123456789+';

            function contains(stringValue, charValue) {
                return stringValue.indexOf(charValue) > -1;
            }

            var invalidKey = e.key.length === 1 && !contains(allowedChars, e.key) || e.key === '.' && contains(e.target.value, '.');
            invalidKey && e.preventDefault();
        });
        // ---------------------------------------------------------------------------------------------
        document.querySelector("#SponsorTelephoneFixedLine").addEventListener("keypress", function (e) {
            var allowedChars = '0123456789+';

            function contains(stringValue, charValue) {
                return stringValue.indexOf(charValue) > -1;
            }

            var invalidKey = e.key.length === 1 && !contains(allowedChars, e.key) || e.key === '.' && contains(e.target.value, '.');
            invalidKey && e.preventDefault();
        });
        // ---------------------------------------------------------------------------------------------
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
        // --------------------------------------------------------------
        $('#msg').hide();

        $('#prg1').on('change',function () {

              var prg1=$('#prg1').val();
              if(prg1=="Yes"){
                  $('#msg').show();
              }else{
                  $('#msg').hide();
              }
        });


        // -----------------------------------------------------------------------------


        $('#IdDomicile').hide();



    </script>
<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iom\resources\views/pages/OverThePhoneRegistration.blade.php ENDPATH**/ ?>