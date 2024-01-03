<?php $__env->startSection('title', 'Appointment Cancel/Re Schedule'); ?>

<?php if($readWrite == 'true' || $readOnly == 'true'): ?>

<?php $__env->startSection('header'); ?>
    <link href="<?php echo e(asset('css/3dbuttons.css')); ?>" rel="stylesheet" type="text/css">
    <!-- Page content -->
    <style>
        .ui-datepicker-title {
            z-index: 200 !important;
        }

        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
        }

        legend.scheduler-border {
            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
            width: auto;
            padding: 0 10px;
            border-bottom: none;
        }

        #familyMemTable tbody tr td {
            vertical-align: middle;
        }

        .ui-datepicker-month, .ui-datepicker-year {
            color: black;
        }
    </style>

    <title>IOM - CHANGE UPDATE APPOINTMENT DETAILS</title>

    <!-- Page content -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>IOM - CHANGE UPDATE
                    APPOINTMENT DETAILS
                </h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none py-0 mb-3 mb-md-0">
                <div class="breadcrumb">
                    <a href="<?php echo e(url('/')); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active"> CHANGE UPDATE APPOINTMENT DETAILS
                </span>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Dashboard content -->
                <div class="row">
                    <div class="col-xl-12">

                        <!-- Marketing campaigns -->
                        <div class="card" style="padding: 30px;">

                            <div class="col-md-12 form-group row">
                                <div class="col-md-3">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;Appointment No</label>
                                    <select id="dropMainUserAppointmentNo" class="form-control selectTo">
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn-block btn-grr btn-lg btn3d"
                                            id="btnChangeMainMember"
                                            style="color: #322a2a;">
                                        <span class="fa fa-user-circle"></span>&nbsp;
                                        <span>Change Main Member</span>
                                    </button>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn-block btn-grr btn-lg btn3d"
                                            id="btnChangeMemberPhoto"
                                            style="color: #322a2a;background-color: #009688">
                                        <span class="fa fa-camera"></span>&nbsp;
                                        <span>Change Member Photo</span>
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-12 form-group row">
                                <div class="col-md-3">
                                    <label><span class="fa fa-calendar"></span>&nbsp;Actual Date Of Arrival</label>
                                    <input type="text" style="background-color: gray;color: white" disabled
                                           id="DateOfArrival" class="form-control dppicker"
                                           id="DateExpected"/>
                                </div>
                                <div class="col-md-3">
                                    <label><span class="fa fa-calendar"></span>&nbsp;Appointment Date & Time &nbsp;&nbsp;<span
                                                id="timePlaceholder" style="color: #2721ff;"></span></label>
                                    <input type="text" style="background-color: gray; color: white" id="AppointmentDate"
                                           disabled class="form-control"
                                           id="DateAppointment"/>
                                </div>
                                <div class="col-md-3">
                                    <label><span class="fa fa-globe"></span>&nbsp;&nbsp;Country Of Origin</label>
                                    <div class="form-group">
                                        <select name="CountryOfOrigin"
                                                id="CountryOfOrigin"
                                                class="form-control selectTo">
                                            <option disabled selected></option>
                                            <option>Afghanistan</option>
                                            <option>Albania</option>
                                            <option>American Samoa</option>
                                            <option>Algeria
                                            </option>
                                            <option>Andorra
                                            </option>
                                            <option>Angola</option>
                                            <option>Anguilla
                                            </option>
                                            <option>Antarctica
                                            </option>
                                            <option>Antigua &amp; Barbuda</option>
                                            <option>Argentina
                                            </option>
                                            <option>Armenia
                                            </option>
                                            <option>Aruba</option>
                                            <option>Australia
                                            </option>
                                            <option>Austria
                                            </option>
                                            <option>Azerbaijan
                                            </option>
                                            <option>Bahamas
                                            </option>
                                            <option>Bahrain
                                            </option>
                                            <option>Bangladesh
                                            </option>
                                            <option>Barbados
                                            </option>
                                            <option>Belarus
                                            </option>
                                            <option>Belgium
                                            </option>
                                            <option>Belize</option>
                                            <option>Benin</option>
                                            <option>Bermuda
                                            </option>
                                            <option>Bhutan</option>
                                            <option>Bolivia
                                            </option>
                                            <option>Bosnia Herzegovina
                                            </option>
                                            <option>Botswana
                                            </option>
                                            <option>Bouvet Island</option>
                                            <option>Brazil</option>
                                            <option>British Indian Ocean Territory
                                            </option>
                                            <option>Brunei</option>
                                            <option>Bulgaria
                                            </option>
                                            <option>Burkina Faso</option>
                                            <option>Burundi
                                            </option>
                                            <option>Cambodia
                                            </option>
                                            <option>Cameroon
                                            </option>
                                            <option>Canada</option>
                                            <option>Cape Verde Islands
                                            </option>
                                            <option>Cayman Islands</option>
                                            <option>Central African Republic
                                            </option>
                                            <option>Chad</option>
                                            <option>Chile</option>
                                            <option>China</option>
                                            <option>"Christmas Island
                                            </option>
                                            <option>Cocos (Keeling) Islands
                                            </option>
                                            <option>Colombia
                                            </option>
                                            <option>Comoros
                                            </option>
                                            <option>Congo</option>
                                            <option>Congo, The Democratic Republic of
                                                the
                                            </option>
                                            <option>Cook Islands</option>
                                            <option>Costa Rica
                                            </option>
                                            <option>Croatia
                                            </option>
                                            <option>Cuba</option>
                                            <option>Cyprus North</option>
                                            <option>Cyprus South</option>
                                            <option>Czech Republic</option>
                                            <option>Denmark
                                            </option>
                                            <option>Djibouti
                                            </option>
                                            <option>Dominica
                                            </option>
                                            <option>Dominican
                                                Republic
                                            </option>
                                            <option>Ecuador
                                            </option>
                                            <option>Egypt</option>
                                            <option>El Salvador
                                            </option>
                                            <option>Equatorial Guinea
                                            </option>
                                            <option>Eritrea
                                            </option>
                                            <option>Estonia
                                            </option>
                                            <option>Ethiopia
                                            </option>
                                            <option>Falkland Islands
                                            </option>
                                            <option>Faroe Islands</option>
                                            <option>Fiji</option>
                                            <option>Finland
                                            </option>
                                            <option>France</option>
                                            <option>French Guiana</option>
                                            <option>French Polynesia
                                            </option>
                                            <option>French Southern Territories
                                            </option>
                                            <option>Gabon</option>
                                            <option>Gambia</option>
                                            <option>Georgia
                                            </option>
                                            <option>Germany
                                            </option>
                                            <option>Ghana</option>
                                            <option>Gibraltar
                                            </option>
                                            <option>Greece</option>
                                            <option>Greenland
                                            </option>
                                            <option>Grenada
                                            </option>
                                            <option>Guadeloupe
                                            </option>
                                            <option>Guam</option>
                                            <option>Guatemala
                                            </option>
                                            <option>Guernsey</option>
                                            <option>Guinea</option>
                                            <option>Guinea - Bissau
                                            </option>
                                            <option>Guyana</option>
                                            <option>Haiti</option>
                                            <option>Honduras
                                            </option>
                                            <option>Heard Island and Mcdonald Islands
                                            </option>
                                            <option>Hong Kong
                                            </option>
                                            <option>Hungary
                                            </option>
                                            <option>Iceland
                                            </option>
                                            <option>India</option>
                                            <option>Indonesia
                                            </option>
                                            <option>Iran</option>
                                            <option>Iraq</option>
                                            <option>Ireland
                                            </option>
                                            <option>Israel</option>
                                            <option>Italy</option>
                                            <option>Jamaica
                                            </option>
                                            <option>Japan</option>
                                            <option>Jersey</option>
                                            <option>Jordan</option>
                                            <option>Kazakhstan
                                            </option>
                                            <option>Kenya</option>
                                            <option>Kiribati
                                            </option>
                                            <option>Korea North
                                            </option>
                                            <option>Korea South
                                            </option>
                                            <option>Kuwait</option>
                                            <option>Kyrgyzstan
                                            </option>
                                            <option>Laos</option>
                                            <option>Latvia</option>
                                            <option>Lebanon
                                            </option>
                                            <option>Lesotho
                                            </option>
                                            <option>Liberia
                                            </option>
                                            <option>Libya</option>
                                            <option>Liechtenstein</option>
                                            <option>Lithuania
                                            </option>
                                            <option>Luxembourg
                                            </option>
                                            <option>Macao</option>
                                            <option>Macedonia
                                            </option>
                                            <option>Madagascar
                                            </option>
                                            <option>Malawi</option>
                                            <option>Malaysia
                                            </option>
                                            <option>Maldives
                                            </option>
                                            <option>Mali</option>
                                            <option>Malta</option>
                                            <option>Marshall Islands
                                            </option>
                                            <option>Martinique
                                            </option>
                                            <option>Mauritania
                                            </option>
                                            <option>Mauritius
                                            </option>
                                            <option>Mayotte
                                            </option>
                                            <option>Mexico</option>
                                            <option>Micronesia
                                            </option>
                                            <option>Moldova
                                            </option>
                                            <option>Monaco</option>
                                            <option>Mongolia
                                            </option>
                                            <option>Montenegro
                                            </option>
                                            <option>Montserrat
                                            </option>
                                            <option>Morocco
                                            </option>
                                            <option>Mozambique
                                            </option>
                                            <option>Myanmar
                                            </option>
                                            <option>Namibia
                                            </option>
                                            <option>Nauru</option>
                                            <option>Nepal</option>
                                            <option>Netherlands
                                            </option>
                                            <option>Netherlands
                                                Antilles
                                            </option>
                                            <option>New Caledonia</option>
                                            <option>New Zealand
                                            </option>
                                            <option>Nicaragua
                                            </option>
                                            <option>Niger</option>
                                            <option>Nigeria
                                            </option>
                                            <option>Niue</option>
                                            <option>Norfolk Islands
                                            </option>
                                            <option>Northern Marianas
                                            </option>
                                            <option>Norway</option>
                                            <option>Oman</option>
                                            <option>Pakistan
                                            </option>
                                            <option>Palestinian Territory, Occupied
                                            </option>
                                            <option>Palau</option>
                                            <option>Panama</option>
                                            <option>Papua New Guinea
                                            </option>
                                            <option>Paraguay
                                            </option>
                                            <option>Peru</option>
                                            <option>Philippines
                                            </option>
                                            <option>Poland</option>
                                            <option>Portugal
                                            </option>
                                            <option>Puerto Rico</option>
                                            <option>Qatar</option>
                                            <option>Romania
                                            </option>
                                            <option>Romania
                                            </option>
                                            <option>Russia</option>
                                            <option>Rwanda</option>
                                            <option>Saint Lucia
                                            </option>
                                            <option>Saint Pierre and
                                                Miquelon
                                            </option>
                                            <option></option>
                                            <option>San Marino
                                            </option>
                                            <option>Sao Tome &amp; Principe
                                            </option>
                                            <option>Saudi Arabia</option>
                                            <option>Senegal
                                            </option>
                                            <option>Serbia</option>
                                            <option>Seychelles
                                            </option>
                                            <option>Sierra Leone</option>
                                            <option>Singapore
                                            </option>
                                            <option>Slovak Republic
                                            </option>
                                            <option>Slovenia
                                            </option>
                                            <option>Solomon Islands
                                            </option>
                                            <option>Somalia
                                            </option>
                                            <option>South Africa</option>
                                            <option>South Georgia and the South
                                                Sandwich Islands
                                            </option>
                                            <option>Spain</option>
                                            <option>Sri Lanka
                                            </option>
                                            <option>Saint Helena</option>
                                            <option>Saint Kitts and
                                                Nevis
                                            </option>
                                            <option>St. Lucia
                                            </option>
                                            <option>Sudan</option>
                                            <option>Suriname
                                            </option>
                                            <option>Svalbard and Jan
                                                Mayen
                                            </option>
                                            <option>Swaziland
                                            </option>
                                            <option>Sweden</option>
                                            <option>Switzerland
                                            </option>
                                            <option id="Syrian Arab Republic">Syrian Arab Republic
                                            </option>
                                            <option id="Syria">Syria</option>
                                            <option>Taiwan</option>
                                            <option>Tajikstan
                                            </option>
                                            <option>Tanzania, United Republic of
                                            </option>
                                            <option>Thailand
                                            </option>
                                            <option>Togo</option>
                                            <option>Tonga</option>
                                            <option>Trinidad &amp; Tobago
                                            </option>
                                            <option>Tunisia
                                            </option>
                                            <option>Turkey</option>
                                            <option>Turkmenistan
                                            </option>
                                            <option>Turkmenistan</option>
                                            <option>Turks and Caicos Islands
                                            </option>
                                            <option>Tuvalu</option>
                                            <option>Uganda
                                            </option>
                                            <option>UK</option>
                                            <option>Ukraine
                                            </option>
                                            <option>United Arab
                                                Emirates
                                            </option>
                                            <option>United States Minor
                                                Outlying Islands
                                            </option>
                                            <option>Uruguay
                                            </option>
                                            <option>United States</option>
                                            <option>Uzbekistan
                                            </option>
                                            <option>Vanuatu
                                            </option>
                                            <option>Vatican City</option>
                                            <option>Venezuela
                                            </option>
                                            <option>Vietnam</option>
                                            <option>Virgin Islands - British
                                            </option>
                                            <option>Virgin Islands -
                                                US
                                            </option>
                                            <option>Wallis &amp;
                                                Futuna
                                            </option>
                                            <option>Western Sahara</option>
                                            <option>Yemen</option>
                                            <option>Zambia</option>
                                            <option>Zimbabwe
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group row">
                                <div class="col-md-3">
                                    <label
                                            for="drpTitle"><span
                                                class='fa fa-hand-o-right'></span>&nbsp;Title</label>
                                    <select name="drpTitle"
                                            id="drpTitle"
                                            class="form-control">
                                        <option disabled
                                                selected>Select
                                        </option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Miss">Miss
                                        </option>
                                        <option value="Ms">Ms</option>
                                        <option value="Dr">Dr</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="gender"><span
                                                class='fa fa-hand-o-right'></span>&nbsp;Gender</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option disabled selected>Select</option>
                                        <option value="Male">Male
                                        </option>
                                        <option value="Female">Female
                                        </option>
                                        <option value="Other">Other
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="txtDob"><span
                                                class='fa fa-hand-o-right'></span>&nbsp;Date
                                        Of Birth:</label>
                                    <input type="text"
                                           name="txtDob"
                                           id="txtDob"
                                           class="form-control dppicker"
                                           readonly>
                                </div>

                                <div class="col-md-3">
                                    <label
                                            for="drpNationality"><span
                                                class='fa fa-hand-o-right'></span>&nbsp;Nationality</label>
                                    <select name="drpNationality"
                                            id="drpNationality"
                                            class="form-control selectTo">
                                        <option disabled selected></option>
                                        <option>Afghan
                                        </option>
                                        <option>
                                            Albanian
                                        </option>
                                        <option>
                                            Algerian
                                        </option>
                                        <option>
                                            American
                                        </option>
                                        <option>
                                            Andorran
                                        </option>
                                        <option>
                                            Angolan
                                        </option>
                                        <option>
                                            Antiguans
                                        </option>
                                        <option>
                                            Argentinean
                                        </option>
                                        <option>
                                            Armenian
                                        </option>
                                        <option>
                                            Australian
                                        </option>
                                        <option>
                                            Austrian
                                        </option>
                                        <option>
                                            Azerbaijani
                                        </option>
                                        <option>
                                            Bahamian
                                        </option>
                                        <option>
                                            Bahraini
                                        </option>
                                        <option>
                                            Bangladeshi
                                        </option>
                                        <option>
                                            Barbadian
                                        </option>
                                        <option>
                                            Barbudans
                                        </option>
                                        <option>
                                            Batswana
                                        </option>
                                        <option>
                                            Belarusian
                                        </option>
                                        <option>
                                            Belgian
                                        </option>
                                        <option>
                                            Belizean
                                        </option>
                                        <option>
                                            Beninese
                                        </option>
                                        <option>
                                            Bhutanese
                                        </option>
                                        <option>
                                            Bolivian
                                        </option>
                                        <option>
                                            Bosnian
                                        </option>
                                        <option>
                                            Brazilian
                                        </option>
                                        <option>
                                            British
                                        </option>
                                        <option>
                                            Bruneian
                                        </option>
                                        <option>
                                            Bulgarian
                                        </option>
                                        <option>
                                            Burkinabe
                                        </option>
                                        <option>
                                            Burmese
                                        </option>
                                        <option>
                                            Burundian
                                        </option>
                                        <option>
                                            Cambodian
                                        </option>
                                        <option>
                                            Cameroonian
                                        </option>
                                        <option>
                                            Canadian
                                        </option>
                                        <option>
                                            Cape Verdean
                                        </option>
                                        <option>
                                            Central African
                                        </option>
                                        <option>
                                            Chadian
                                        </option>
                                        <option>
                                            Chilean
                                        </option>
                                        <option>
                                            Chinese
                                        </option>
                                        <option>
                                            Colombian
                                        </option>
                                        <option>
                                            Comoran
                                        </option>
                                        <option>
                                            Congolese
                                        </option>
                                        <option>
                                            Costa Rican
                                        </option>
                                        <option>
                                            Croatian
                                        </option>
                                        <option>Cuban
                                        </option>
                                        <option>
                                            Cypriot
                                        </option>
                                        <option>Czech
                                        </option>
                                        <option>Danish
                                        </option>
                                        <option>
                                            Djibouti
                                        </option>
                                        <option>
                                            Dominican
                                        </option>
                                        <option>Dutch
                                        </option>
                                        <option>
                                            East Timorese
                                        </option>
                                        <option>
                                            Ecuadorean
                                        </option>
                                        <option>
                                            Egyptian
                                        </option>
                                        <option>
                                            Emirian
                                        </option>
                                        <option>
                                            Equatorial Guinean
                                        </option>
                                        <option>
                                            Eritrean
                                        </option>
                                        <option>
                                            Estonian
                                        </option>
                                        <option>
                                            Ethiopian
                                        </option>
                                        <option>Fijian
                                        </option>
                                        <option>
                                            Filipino
                                        </option>
                                        <option>
                                            Finnish
                                        </option>
                                        <option>French
                                        </option>
                                        <option>
                                            Gabonese
                                        </option>
                                        <option>
                                            Gambian
                                        </option>
                                        <option>
                                            Georgian
                                        </option>
                                        <option>German
                                        </option>
                                        <option>
                                            Ghanaian
                                        </option>
                                        <option>Greek
                                        </option>
                                        <option>
                                            Grenadian
                                        </option>
                                        <option>
                                            Guatemalan
                                        </option>
                                        <option>
                                            Guinea-Bissauan
                                        </option>
                                        <option>
                                            Guinean
                                        </option>
                                        <option>
                                            Guyanese
                                        </option>
                                        <option>
                                            Haitian
                                        </option>
                                        <option>
                                            Herzegovinian
                                        </option>
                                        <option>
                                            Honduran
                                        </option>
                                        <option>
                                            Hungarian
                                        </option>
                                        <option>
                                            Icelander
                                        </option>
                                        <option>Indian
                                        </option>
                                        <option>
                                            Indonesian
                                        </option>
                                        <option>
                                            Iranian
                                        </option>
                                        <option>Iraqi
                                        </option>
                                        <option>Irish
                                        </option>
                                        <option>
                                            Israeli
                                        </option>
                                        <option>
                                            Italian
                                        </option>
                                        <option>
                                            Ivorian
                                        </option>
                                        <option>
                                            Jamaican
                                        </option>
                                        <option>
                                            Japanese
                                        </option>
                                        <option>
                                            Jordanian
                                        </option>
                                        <option>
                                            Kazakhstani
                                        </option>
                                        <option>Kenyan
                                        </option>
                                        <option>
                                            Kittian and Nevisian
                                        </option>
                                        <option>
                                            Kuwaiti
                                        </option>
                                        <option>Kyrgyz
                                        </option>
                                        <option>
                                            Laotian
                                        </option>
                                        <option>
                                            Latvian
                                        </option>
                                        <option>
                                            Lebanese
                                        </option>
                                        <option>
                                            Liberian
                                        </option>
                                        <option>Libyan
                                        </option>
                                        <option>
                                            Liechtensteiner
                                        </option>
                                        <option>
                                            Lithuanian
                                        </option>
                                        <option>
                                            Luxembourger
                                        </option>
                                        <option>
                                            Macedonian
                                        </option>
                                        <option>
                                            Malagasy
                                        </option>
                                        <option>
                                            Malawian
                                        </option>
                                        <option>
                                            Malaysian
                                        </option>
                                        <option>
                                            Maldivan
                                        </option>
                                        <option>Malian
                                        </option>
                                        <option>
                                            Maltese
                                        </option>
                                        <option>
                                            Marshallese
                                        </option>
                                        <option>
                                            Mauritanian
                                        </option>
                                        <option>
                                            Mauritian
                                        </option>
                                        <option>
                                            Mexican
                                        </option>
                                        <option>
                                            Micronesian
                                        </option>
                                        <option>
                                            Moldovan
                                        </option>
                                        <option>
                                            Monacan
                                        </option>
                                        <option>
                                            Mongolian
                                        </option>
                                        <option>
                                            Moroccan
                                        </option>
                                        <option>
                                            Mosotho
                                        </option>
                                        <option>
                                            Motswana
                                        </option>
                                        <option>
                                            Mozambican
                                        </option>
                                        <option>
                                            Namibian
                                        </option>
                                        <option>
                                            Nauruan
                                        </option>
                                        <option>
                                            Nepalese
                                        </option>
                                        <option>
                                            New Zealander
                                        </option>
                                        <option>
                                            Ni-Vanuatu
                                        </option>
                                        <option>
                                            Nicaraguan
                                        </option>
                                        <option>
                                            Nigerien
                                        </option>
                                        <option>
                                            North Korean
                                        </option>
                                        <option>
                                            Northern Irish
                                        </option>
                                        <option>
                                            Norwegian
                                        </option>
                                        <option>Omani
                                        </option>
                                        <option>
                                            Pakistani
                                        </option>
                                        <option>
                                            Palauan
                                        </option>
                                        <option>
                                            Panamanian
                                        </option>
                                        <option>
                                            Papua New Guinean
                                        </option>
                                        <option>
                                            Paraguayan
                                        </option>
                                        <option>
                                            Peruvian
                                        </option>
                                        <option>Polish
                                        </option>
                                        <option>
                                            Portuguese
                                        </option>
                                        <option>Qatari
                                        </option>
                                        <option>
                                            Romanian
                                        </option>
                                        <option>
                                            Russian
                                        </option>
                                        <option>
                                            Rwandan
                                        </option>
                                        <option>
                                            Saint Lucian
                                        </option>
                                        <option>
                                            Salvadoran
                                        </option>
                                        <option>Samoan
                                        </option>
                                        <option>San
                                            Marinese
                                        </option>
                                        <option>Sao
                                            Tomean
                                        </option>
                                        <option>Saudi
                                        </option>
                                        <option>
                                            Scottish
                                        </option>
                                        <option>
                                            Senegalese
                                        </option>
                                        <option>
                                            Serbian
                                        </option>
                                        <option>
                                            Seychellois
                                        </option>
                                        <option>
                                            Sierra Leonean
                                        </option>
                                        <option>
                                            Singaporean
                                        </option>
                                        <option>
                                            Slovakian
                                        </option>
                                        <option>
                                            Slovenian
                                        </option>
                                        <option>
                                            Solomon Islander
                                        </option>
                                        <option>Somali
                                        </option>
                                        <option>
                                            South African
                                        </option>
                                        <option>
                                            South Korean
                                        </option>
                                        <option>
                                            Spanish
                                        </option>
                                        <option>Sri
                                            Lankan
                                        </option>
                                        <option>
                                            Sudanese
                                        </option>
                                        <option>
                                            Surinamer
                                        </option>
                                        <option>Swazi
                                        </option>
                                        <option>
                                            Swedish
                                        </option>
                                        <option>Swiss
                                        </option>
                                        <option>Syrian
                                        </option>
                                        <option>
                                            Taiwanese
                                        </option>
                                        <option>Tajik
                                        </option>
                                        <option>
                                            Tanzanian
                                        </option>
                                        <option>Thai
                                        </option>
                                        <option>
                                            Togolese
                                        </option>
                                        <option>Tongan
                                        </option>
                                        <option>
                                            Trinidadian or Tobagonian
                                        </option>
                                        <option>
                                            Tunisian
                                        </option>
                                        <option>
                                            Turkish
                                        </option>
                                        <option>
                                            Tuvaluan
                                        </option>
                                        <option>
                                            Ugandan
                                        </option>
                                        <option>
                                            Ukrainian
                                        </option>
                                        <option>
                                            Uruguayan
                                        </option>
                                        <option>
                                            Uzbekistani
                                        </option>
                                        <option>
                                            Venezuelan
                                        </option>
                                        <option>
                                            Vietnamese
                                        </option>
                                        <option>Welsh
                                        </option>
                                        <option>
                                            Yemenite
                                        </option>
                                        <option>
                                            Zambian
                                        </option>
                                        <option>
                                            Zimbabwean
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 form-group row">
                                <div class="col-md-3">
                                    <label for="txtFirstName"><span
                                                class='fa fa-hand-o-right'></span>&nbsp;First
                                        Name</label>
                                    <input type="text"
                                           name="txtFirstName"
                                           id="txtFirstName"
                                           class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="txtLastName"><span
                                                class='fa fa-hand-o-right'></span>&nbsp;Last
                                        Name</label>
                                    <input type="text"
                                           name="txtLastName"
                                           id="txtLastName"
                                           class="form-control">
                                </div>

                                <div class="col-md-3">
                                    <label for="txtPassport"><span
                                                class='fa fa-hand-o-right'></span>&nbsp;Passport
                                        Number</label>
                                    <input type="text"
                                           name="txtPassport"
                                           id="txtPassport"
                                           class="form-control formS caps">
                                </div>

                                <div class="col-md-3">
                                    <label for="txtPrevPassport"><span
                                                class='fa fa-hand-o-right'></span>&nbsp;Previous
                                        Passport if Any</label>
                                    <input type="text"
                                           name="txtPrevPassport"
                                           id="txtPrevPassport"
                                           class="form-control caps formS">
                                </div>
                            </div>

                            <div class="col-md-12 form-group row">
                                <div class="col-md-3">
                                    <label
                                            for="drpCountry"><span
                                                class='fa fa-hand-o-right'></span>&nbsp;Country</label>
                                    <select name="drpCountry"
                                            id="drpCountry"
                                            class="form-control selectTo">
                                        <option disabled selected></option>
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>American Samoa</option>
                                        <option>Algeria
                                        </option>
                                        <option>Andorra
                                        </option>
                                        <option>Angola</option>
                                        <option>Anguilla
                                        </option>
                                        <option>Antarctica
                                        </option>
                                        <option>Antigua &amp; Barbuda</option>
                                        <option>Argentina
                                        </option>
                                        <option>Armenia
                                        </option>
                                        <option>Aruba</option>
                                        <option>Australia
                                        </option>
                                        <option>Austria
                                        </option>
                                        <option>Azerbaijan
                                        </option>
                                        <option>Bahamas
                                        </option>
                                        <option>Bahrain
                                        </option>
                                        <option>Bangladesh
                                        </option>
                                        <option>Barbados
                                        </option>
                                        <option>Belarus
                                        </option>
                                        <option>Belgium
                                        </option>
                                        <option>Belize</option>
                                        <option>Benin</option>
                                        <option>Bermuda
                                        </option>
                                        <option>Bhutan</option>
                                        <option>Bolivia
                                        </option>
                                        <option>Bosnia Herzegovina
                                        </option>
                                        <option>Botswana
                                        </option>
                                        <option>Bouvet Island</option>
                                        <option>Brazil</option>
                                        <option>British Indian Ocean Territory
                                        </option>
                                        <option>Brunei</option>
                                        <option>Bulgaria
                                        </option>
                                        <option>Burkina Faso</option>
                                        <option>Burundi
                                        </option>
                                        <option>Cambodia
                                        </option>
                                        <option>Cameroon
                                        </option>
                                        <option>Canada</option>
                                        <option>Cape Verde Islands
                                        </option>
                                        <option>Cayman Islands</option>
                                        <option>Central African Republic
                                        </option>
                                        <option>Chad</option>
                                        <option>Chile</option>
                                        <option>China</option>
                                        <option>"Christmas Island
                                        </option>
                                        <option>Cocos (Keeling) Islands
                                        </option>
                                        <option>Colombia
                                        </option>
                                        <option>Comoros
                                        </option>
                                        <option>Congo</option>
                                        <option>Congo, The Democratic Republic of
                                            the
                                        </option>
                                        <option>Cook Islands</option>
                                        <option>Costa Rica
                                        </option>
                                        <option>Croatia
                                        </option>
                                        <option>Cuba</option>
                                        <option>Cyprus North</option>
                                        <option>Cyprus South</option>
                                        <option>Czech Republic</option>
                                        <option>Denmark
                                        </option>
                                        <option>Djibouti
                                        </option>
                                        <option>Dominica
                                        </option>
                                        <option>Dominican
                                            Republic
                                        </option>
                                        <option>Ecuador
                                        </option>
                                        <option>Egypt</option>
                                        <option>El Salvador
                                        </option>
                                        <option>Equatorial Guinea
                                        </option>
                                        <option>Eritrea
                                        </option>
                                        <option>Estonia
                                        </option>
                                        <option>Ethiopia
                                        </option>
                                        <option>Falkland Islands
                                        </option>
                                        <option>Faroe Islands</option>
                                        <option>Fiji</option>
                                        <option>Finland
                                        </option>
                                        <option>France</option>
                                        <option>French Guiana</option>
                                        <option>French Polynesia
                                        </option>
                                        <option>French Southern Territories
                                        </option>
                                        <option>Gabon</option>
                                        <option>Gambia</option>
                                        <option>Georgia
                                        </option>
                                        <option>Germany
                                        </option>
                                        <option>Ghana</option>
                                        <option>Gibraltar
                                        </option>
                                        <option>Greece</option>
                                        <option>Greenland
                                        </option>
                                        <option>Grenada
                                        </option>
                                        <option>Guadeloupe
                                        </option>
                                        <option>Guam</option>
                                        <option>Guatemala
                                        </option>
                                        <option>Guernsey</option>
                                        <option>Guinea</option>
                                        <option>Guinea - Bissau
                                        </option>
                                        <option>Guyana</option>
                                        <option>Haiti</option>
                                        <option>Honduras
                                        </option>
                                        <option>Heard Island and Mcdonald Islands
                                        </option>
                                        <option>Hong Kong
                                        </option>
                                        <option>Hungary
                                        </option>
                                        <option>Iceland
                                        </option>
                                        <option>India</option>
                                        <option>Indonesia
                                        </option>
                                        <option>Iran</option>
                                        <option>Iraq</option>
                                        <option>Ireland
                                        </option>
                                        <option>Israel</option>
                                        <option>Italy</option>
                                        <option>Jamaica
                                        </option>
                                        <option>Japan</option>
                                        <option>Jersey</option>
                                        <option>Jordan</option>
                                        <option>Kazakhstan
                                        </option>
                                        <option>Kenya</option>
                                        <option>Kiribati
                                        </option>
                                        <option>Korea North
                                        </option>
                                        <option>Korea South
                                        </option>
                                        <option>Kuwait</option>
                                        <option>Kyrgyzstan
                                        </option>
                                        <option>Laos</option>
                                        <option>Latvia</option>
                                        <option>Lebanon
                                        </option>
                                        <option>Lesotho
                                        </option>
                                        <option>Liberia
                                        </option>
                                        <option>Libya</option>
                                        <option>Liechtenstein</option>
                                        <option>Lithuania
                                        </option>
                                        <option>Luxembourg
                                        </option>
                                        <option>Macao</option>
                                        <option>Macedonia
                                        </option>
                                        <option>Madagascar
                                        </option>
                                        <option>Malawi</option>
                                        <option>Malaysia
                                        </option>
                                        <option>Maldives
                                        </option>
                                        <option>Mali</option>
                                        <option>Malta</option>
                                        <option>Marshall Islands
                                        </option>
                                        <option>Martinique
                                        </option>
                                        <option>Mauritania
                                        </option>
                                        <option>Mauritius
                                        </option>
                                        <option>Mayotte
                                        </option>
                                        <option>Mexico</option>
                                        <option>Micronesia
                                        </option>
                                        <option>Moldova
                                        </option>
                                        <option>Monaco</option>
                                        <option>Mongolia
                                        </option>
                                        <option>Montenegro
                                        </option>
                                        <option>Montserrat
                                        </option>
                                        <option>Morocco
                                        </option>
                                        <option>Mozambique
                                        </option>
                                        <option>Myanmar
                                        </option>
                                        <option>Namibia
                                        </option>
                                        <option>Nauru</option>
                                        <option>Nepal</option>
                                        <option>Netherlands
                                        </option>
                                        <option>Netherlands
                                            Antilles
                                        </option>
                                        <option>New Caledonia</option>
                                        <option>New Zealand
                                        </option>
                                        <option>Nicaragua
                                        </option>
                                        <option>Niger</option>
                                        <option>Nigeria
                                        </option>
                                        <option>Niue</option>
                                        <option>Norfolk Islands
                                        </option>
                                        <option>Northern Marianas
                                        </option>
                                        <option>Norway</option>
                                        <option>Oman</option>
                                        <option>Pakistan
                                        </option>
                                        <option>Palestinian Territory, Occupied
                                        </option>
                                        <option>Palau</option>
                                        <option>Panama</option>
                                        <option>Papua New Guinea
                                        </option>
                                        <option>Paraguay
                                        </option>
                                        <option>Peru</option>
                                        <option>Philippines
                                        </option>
                                        <option>Poland</option>
                                        <option>Portugal
                                        </option>
                                        <option>Puerto Rico</option>
                                        <option>Qatar</option>
                                        <option>Romania
                                        </option>
                                        <option>Romania
                                        </option>
                                        <option>Russia</option>
                                        <option>Rwanda</option>
                                        <option>Saint Lucia
                                        </option>
                                        <option>Saint Pierre and
                                            Miquelon
                                        </option>
                                        <option></option>
                                        <option>San Marino
                                        </option>
                                        <option>Sao Tome &amp; Principe
                                        </option>
                                        <option>Saudi Arabia</option>
                                        <option>Senegal
                                        </option>
                                        <option>Serbia</option>
                                        <option>Seychelles
                                        </option>
                                        <option>Sierra Leone</option>
                                        <option>Singapore
                                        </option>
                                        <option>Slovak Republic
                                        </option>
                                        <option>Slovenia
                                        </option>
                                        <option>Solomon Islands
                                        </option>
                                        <option>Somalia
                                        </option>
                                        <option>South Africa</option>
                                        <option>South Georgia and the South
                                            Sandwich Islands
                                        </option>
                                        <option>Spain</option>
                                        <option>Sri Lanka
                                        </option>
                                        <option>Saint Helena</option>
                                        <option>Saint Kitts and
                                            Nevis
                                        </option>
                                        <option>St. Lucia
                                        </option>
                                        <option>Sudan</option>
                                        <option>Suriname
                                        </option>
                                        <option>Svalbard and Jan
                                            Mayen
                                        </option>
                                        <option>Swaziland
                                        </option>
                                        <option>Sweden</option>
                                        <option>Switzerland
                                        </option>
                                        <option id="Syrian Arab Republic">Syrian Arab Republic
                                        </option>
                                        <option id="Syria">Syria</option>
                                        <option>Taiwan</option>
                                        <option>Tajikstan
                                        </option>
                                        <option>Tanzania, United Republic of
                                        </option>
                                        <option>Thailand
                                        </option>
                                        <option>Togo</option>
                                        <option>Tonga</option>
                                        <option>Trinidad &amp; Tobago
                                        </option>
                                        <option>Tunisia
                                        </option>
                                        <option>Turkey</option>
                                        <option>Turkmenistan
                                        </option>
                                        <option>Turkmenistan</option>
                                        <option>Turks and Caicos Islands
                                        </option>
                                        <option>Tuvalu</option>
                                        <option>Uganda
                                        </option>
                                        <option>UK</option>
                                        <option>Ukraine
                                        </option>
                                        <option>United Arab
                                            Emirates
                                        </option>
                                        <option>United States Minor
                                            Outlying Islands
                                        </option>
                                        <option>Uruguay
                                        </option>
                                        <option>United States</option>
                                        <option>Uzbekistan
                                        </option>
                                        <option>Vanuatu
                                        </option>
                                        <option>Vatican City</option>
                                        <option>Venezuela
                                        </option>
                                        <option>Vietnam</option>
                                        <option>Virgin Islands - British
                                        </option>
                                        <option>Virgin Islands -
                                            US
                                        </option>
                                        <option>Wallis &amp;
                                            Futuna
                                        </option>
                                        <option>Western Sahara</option>
                                        <option>Yemen</option>
                                        <option>Zambia</option>
                                        <option>Zimbabwe
                                        </option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label
                                            for="drpCountriesLast3Years"><span
                                                class='fa fa-hand-o-right'></span>&nbsp;Country/countries
                                        visited during the last three
                                        years</label>

                                    <select name="drpCountriesLast3Years"
                                            id="drpCountriesLast3Years"
                                            class="form-control selectTo"
                                            multiple>
                                        <option></option>
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>American Samoa</option>
                                        <option>Algeria
                                        </option>
                                        <option>Andorra
                                        </option>
                                        <option>Angola</option>
                                        <option>Anguilla
                                        </option>
                                        <option>Antarctica
                                        </option>
                                        <option>Antigua &amp; Barbuda</option>
                                        <option>Argentina
                                        </option>
                                        <option>Armenia
                                        </option>
                                        <option>Aruba</option>
                                        <option>Australia
                                        </option>
                                        <option>Austria
                                        </option>
                                        <option>Azerbaijan
                                        </option>
                                        <option>Bahamas
                                        </option>
                                        <option>Bahrain
                                        </option>
                                        <option>Bangladesh
                                        </option>
                                        <option>Barbados
                                        </option>
                                        <option>Belarus
                                        </option>
                                        <option>Belgium
                                        </option>
                                        <option>Belize</option>
                                        <option>Benin</option>
                                        <option>Bermuda
                                        </option>
                                        <option>Bhutan</option>
                                        <option>Bolivia
                                        </option>
                                        <option>Bosnia Herzegovina
                                        </option>
                                        <option>Botswana
                                        </option>
                                        <option>Bouvet Island</option>
                                        <option>Brazil</option>
                                        <option>British Indian Ocean Territory
                                        </option>
                                        <option>Brunei</option>
                                        <option>Bulgaria
                                        </option>
                                        <option>Burkina Faso</option>
                                        <option>Burundi
                                        </option>
                                        <option>Cambodia
                                        </option>
                                        <option>Cameroon
                                        </option>
                                        <option>Canada</option>
                                        <option>Cape Verde Islands
                                        </option>
                                        <option>Cayman Islands</option>
                                        <option>Central African Republic
                                        </option>
                                        <option>Chad</option>
                                        <option>Chile</option>
                                        <option>China</option>
                                        <option>"Christmas Island
                                        </option>
                                        <option>Cocos (Keeling) Islands
                                        </option>
                                        <option>Colombia
                                        </option>
                                        <option>Comoros
                                        </option>
                                        <option>Congo</option>
                                        <option>Congo, The Democratic Republic of
                                            the
                                        </option>
                                        <option>Cook Islands</option>
                                        <option>Costa Rica
                                        </option>
                                        <option>Croatia
                                        </option>
                                        <option>Cuba</option>
                                        <option>Cyprus North</option>
                                        <option>Cyprus South</option>
                                        <option>Czech Republic</option>
                                        <option>Denmark
                                        </option>
                                        <option>Djibouti
                                        </option>
                                        <option>Dominica
                                        </option>
                                        <option>Dominican
                                            Republic
                                        </option>
                                        <option>Ecuador
                                        </option>
                                        <option>Egypt</option>
                                        <option>El Salvador
                                        </option>
                                        <option>Equatorial Guinea
                                        </option>
                                        <option>Eritrea
                                        </option>
                                        <option>Estonia
                                        </option>
                                        <option>Ethiopia
                                        </option>
                                        <option>Falkland Islands
                                        </option>
                                        <option>Faroe Islands</option>
                                        <option>Fiji</option>
                                        <option>Finland
                                        </option>
                                        <option>France</option>
                                        <option>French Guiana</option>
                                        <option>French Polynesia
                                        </option>
                                        <option>French Southern Territories
                                        </option>
                                        <option>Gabon</option>
                                        <option>Gambia</option>
                                        <option>Georgia
                                        </option>
                                        <option>Germany
                                        </option>
                                        <option>Ghana</option>
                                        <option>Gibraltar
                                        </option>
                                        <option>Greece</option>
                                        <option>Greenland
                                        </option>
                                        <option>Grenada
                                        </option>
                                        <option>Guadeloupe
                                        </option>
                                        <option>Guam</option>
                                        <option>Guatemala
                                        </option>
                                        <option>Guernsey</option>
                                        <option>Guinea</option>
                                        <option>Guinea - Bissau
                                        </option>
                                        <option>Guyana</option>
                                        <option>Haiti</option>
                                        <option>Honduras
                                        </option>
                                        <option>Heard Island and Mcdonald Islands
                                        </option>
                                        <option>Hong Kong
                                        </option>
                                        <option>Hungary
                                        </option>
                                        <option>Iceland
                                        </option>
                                        <option>India</option>
                                        <option>Indonesia
                                        </option>
                                        <option>Iran</option>
                                        <option>Iraq</option>
                                        <option>Ireland
                                        </option>
                                        <option>Israel</option>
                                        <option>Italy</option>
                                        <option>Jamaica
                                        </option>
                                        <option>Japan</option>
                                        <option>Jersey</option>
                                        <option>Jordan</option>
                                        <option>Kazakhstan
                                        </option>
                                        <option>Kenya</option>
                                        <option>Kiribati
                                        </option>
                                        <option>Korea North
                                        </option>
                                        <option>Korea South
                                        </option>
                                        <option>Kuwait</option>
                                        <option>Kyrgyzstan
                                        </option>
                                        <option>Laos</option>
                                        <option>Latvia</option>
                                        <option>Lebanon
                                        </option>
                                        <option>Lesotho
                                        </option>
                                        <option>Liberia
                                        </option>
                                        <option>Libya</option>
                                        <option>Liechtenstein</option>
                                        <option>Lithuania
                                        </option>
                                        <option>Luxembourg
                                        </option>
                                        <option>Macao</option>
                                        <option>Macedonia
                                        </option>
                                        <option>Madagascar
                                        </option>
                                        <option>Malawi</option>
                                        <option>Malaysia
                                        </option>
                                        <option>Maldives
                                        </option>
                                        <option>Mali</option>
                                        <option>Malta</option>
                                        <option>Marshall Islands
                                        </option>
                                        <option>Martinique
                                        </option>
                                        <option>Mauritania
                                        </option>
                                        <option>Mauritius
                                        </option>
                                        <option>Mayotte
                                        </option>
                                        <option>Mexico</option>
                                        <option>Micronesia
                                        </option>
                                        <option>Moldova
                                        </option>
                                        <option>Monaco</option>
                                        <option>Mongolia
                                        </option>
                                        <option>Montenegro
                                        </option>
                                        <option>Montserrat
                                        </option>
                                        <option>Morocco
                                        </option>
                                        <option>Mozambique
                                        </option>
                                        <option>Myanmar
                                        </option>
                                        <option>Namibia
                                        </option>
                                        <option>Nauru</option>
                                        <option>Nepal</option>
                                        <option>Netherlands
                                        </option>
                                        <option>Netherlands
                                            Antilles
                                        </option>
                                        <option>New Caledonia</option>
                                        <option>New Zealand
                                        </option>
                                        <option>Nicaragua
                                        </option>
                                        <option>Niger</option>
                                        <option>Nigeria
                                        </option>
                                        <option>Niue</option>
                                        <option>Norfolk Islands
                                        </option>
                                        <option>Northern Marianas
                                        </option>
                                        <option>Norway</option>
                                        <option>Oman</option>
                                        <option>Pakistan
                                        </option>
                                        <option>Palestinian Territory, Occupied
                                        </option>
                                        <option>Palau</option>
                                        <option>Panama</option>
                                        <option>Papua New Guinea
                                        </option>
                                        <option>Paraguay
                                        </option>
                                        <option>Peru</option>
                                        <option>Philippines
                                        </option>
                                        <option>Poland</option>
                                        <option>Portugal
                                        </option>
                                        <option>Puerto Rico</option>
                                        <option>Qatar</option>
                                        <option>Romania
                                        </option>
                                        <option>Romania
                                        </option>
                                        <option>Russia</option>
                                        <option>Rwanda</option>
                                        <option>Saint Lucia
                                        </option>
                                        <option>Saint Pierre and
                                            Miquelon
                                        </option>
                                        <option>San Marino
                                        </option>
                                        <option>Sao Tome &amp; Principe
                                        </option>
                                        <option>Saudi Arabia</option>
                                        <option>Senegal
                                        </option>
                                        <option>Serbia</option>
                                        <option>Seychelles
                                        </option>
                                        <option>Sierra Leone</option>
                                        <option>Singapore
                                        </option>
                                        <option>Slovak Republic
                                        </option>
                                        <option>Slovenia
                                        </option>
                                        <option>Solomon Islands
                                        </option>
                                        <option>Somalia
                                        </option>
                                        <option>South Africa</option>
                                        <option>South Georgia and the South
                                            Sandwich Islands
                                        </option>
                                        <option>Spain</option>
                                        <option>Sri Lanka
                                        </option>
                                        <option>Saint Helena</option>
                                        <option>Saint Kitts and
                                            Nevis
                                        </option>
                                        <option>St. Lucia
                                        </option>
                                        <option>Sudan</option>
                                        <option>Suriname
                                        </option>
                                        <option>Svalbard and Jan
                                            Mayen
                                        </option>
                                        <option>Swaziland
                                        </option>
                                        <option>Sweden</option>
                                        <option>Switzerland
                                        </option>
                                        <option>Syrian Arab Republic
                                        </option>
                                        <option>Syria</option>
                                        <option>Taiwan</option>
                                        <option>Tajikstan
                                        </option>
                                        <option>Tanzania, United Republic of
                                        </option>
                                        <option>Thailand
                                        </option>
                                        <option>Togo</option>
                                        <option>Tonga</option>
                                        <option>Trinidad &amp; Tobago
                                        </option>
                                        <option>Tunisia
                                        </option>
                                        <option>Turkey</option>
                                        <option>Turkmenistan
                                        </option>
                                        <option>Turkmenistan</option>
                                        <option>Turks and Caicos Islands
                                        </option>
                                        <option>Tuvalu</option>
                                        <option>Uganda
                                        </option>
                                        <option>UK</option>
                                        <option>Ukraine
                                        </option>
                                        <option>United Arab
                                            Emirates
                                        </option>
                                        <option>United States Minor
                                            Outlying Islands
                                        </option>
                                        <option>Uruguay
                                        </option>
                                        <option>United States</option>
                                        <option>Uzbekistan
                                        </option>
                                        <option>Vanuatu
                                        </option>
                                        <option>Vatican City</option>
                                        <option>Venezuela
                                        </option>
                                        <option>Vietnam</option>
                                        <option>Virgin Islands - British
                                        </option>
                                        <option>Virgin Islands -
                                            US
                                        </option>
                                        <option>Wallis &amp;
                                            Futuna
                                        </option>
                                        <option>Western Sahara</option>
                                        <option>Yemen</option>
                                        <option>Zambia</option>
                                        <option>Zimbabwe
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12 form-group row">
                                <div class="col-md-5">
                                    <label><span class="fa fa-hand-o-right"></span>&nbsp;Email</label>
                                    <div class="form-group">
                                        <input id="EmailAdd" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 form-group row">
                                <div class="col-md-12">
                                    <h5>Address during staying in Sri Lanka</h5>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label><span class="fa fa-address-card"></span>&nbsp;&nbsp;Address</label>
                                    <div class="form-group">
                                        <input id="SlAddress" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label><span class="fa fa-road"></span>&nbsp;&nbsp;Street</label>
                                    <div class="form-group">
                                        <input id="SlStreet" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label><span class="fa fa-building"></span>&nbsp;&nbsp;City</label>
                                    <div class="form-group">
                                        <input id="SlCity" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label><span class="fa fa-envelope"></span>&nbsp;&nbsp;Postal Code</label>
                                    <div class="form-group">
                                        <input id="SlPostalCode" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label><span class="fa fa-phone"></span>&nbsp;&nbsp;Telephone-Fixed Line</label>
                                    <div class="form-group">
                                        <input id="SlTelephoneFixedLine" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label><span class="fa fa-mobile"></span>&nbsp;&nbsp;Mobile</label>
                                    <div class="form-group">
                                        <input id="SlMobile" type="text" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Sponsor Details</legend>
                                    <div class="col-md-12 row">
                                        <div class="col-md-4 form-group">
                                            <label><span class="fa fa-handshake-o"></span>&nbsp;&nbsp;Sponsor
                                                Name</label>
                                            <input id="SponsorName" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label><span class="fa fa-phone-square"></span>&nbsp;&nbsp;Telephone - Fixed
                                                Line</label>
                                            <input id="SponsorTelephoneFixedLine" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label><span class="fa fa-envelope-open"></span>&nbsp;&nbsp;Email</label>
                                            <input id="SponsorEmailAddress" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label><span class="fa fa-mobile"></span>&nbsp;&nbsp;Mobile</label>
                                            <input id="SponsorMobile" type="text" class="form-control">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label><span class="fa fa-address-book-o"></span>&nbsp;&nbsp;Address</label>
                                            <input id="SponsorAddress" type="text" class="form-control">
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-12">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Member Details</legend>
                                    <div class="row">
                                        <div class="col-md-12 row" id="memberContainer">

                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-12 form-group text-center">
                                <input type="hidden" id="Mainid"/>
                                <?php if($readOnly != 'true'): ?>
                                    <button type="button" id="UpdateDetails" class="btn btn-warning"><span
                                                class="fa fa-floppy-o"></span>&nbsp;Update
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /dashboard content -->

    </div>
    <!-- /content area -->


    <div class="modal memberEditModal" style="border-color: #0f960b; overflow:auto;">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header"
                     style="background-color: #5a8db5; color: white;border-radius: 0px;padding-bottom: 20px;">
                    <div class="col-md-6">
                        <h4 class="modal-title">Member Details</h4>
                    </div>
                    <button type="button" class="close" data-dismiss="modal"><img
                                src="<?php echo e(asset('images/colse.png')); ?>" width="20px;" height="20px;"/></button>
                </div>

                <!-- Modal body -->
                <div class="card-body" id="MyD">
                    <div class="col-md-12 form-group">

                        <div class="col-md-12 form-group">
                            <label for="memFirstName"><span
                                        class="fa fa-hand-o-right"></span>&nbsp;First&nbsp;Name </label>
                            <div class="form-group">
                                <input type="text" id="memFirstName" name="memFirstName" class="form-control"
                                       match="^.+$"
                                       validate="true"
                                       error="* First Name required">
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="memLastName"><span
                                        class="fa fa-hand-o-right"></span>&nbsp;Last&nbsp;Name </label>
                            <div class="form-group">
                                <input type="text" id="memLastName" name="memLastName" class="form-control"
                                       match="^.+$" validate="true"
                                       error="* Last Name required">
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="memDOB"><span class="fa fa-hand-o-right"></span>&nbsp;Date Of Birth</label>
                            <div class="input-group"><input type="text" class="form-control dppicker dateOfbirth100"
                                                            readonly id="memDOB">
                                <div class="input-group-append">
                                    <div class="input-group-text"
                                         style="border: 1px solid rgb(221, 221, 221); padding: 0.4375rem 0.875rem;"> <span
                                                class="fa fa-calendar"></span></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="memGender"><span
                                        class="fa fa-hand-o-right"></span>&nbsp;Gender</label>

                            <select class="form-control col-md-12" id="memGender">
                                <option disabled="" selected="">Select
                                </option>
                                <option value="Male">Male
                                </option>
                                <option value="Female">Female
                                </option>
                                <option value="Other">Other
                                </option>
                            </select>
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="memPreg"><span class="fa fa-hand-o-right"></span>&nbsp;Pregnancy </label>
                            <div class="form-group">
                                <select class="form-control inpt-control select" id="memPreg">
                                    <option selected="selected">No</option>
                                    <option>Yes</option>
                                </select>

                            </div>
                            <strong id="memPregMessage" style="display: none;">Please bring along with you a
                                recommendation
                                from your gynecologist to undergo a Chest X-Ray with double abdominal shielding</strong>
                        </div>

                        <div class="col-md-12  form-group">
                            <label for="memNationality"><span
                                        class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Nationality</label>
                            <div class="form-group">
                                <select name="memNationality"
                                        id="memNationality"
                                        class="form-control selectToDiv inpt-control select">
                                    <option>Afghan
                                    </option>
                                    <option>
                                        Albanian
                                    </option>
                                    <option>
                                        Algerian
                                    </option>
                                    <option>
                                        American
                                    </option>
                                    <option>
                                        Andorran
                                    </option>
                                    <option>
                                        Angolan
                                    </option>
                                    <option>
                                        Antiguans
                                    </option>
                                    <option>
                                        Argentinean
                                    </option>
                                    <option>
                                        Armenian
                                    </option>
                                    <option>
                                        Australian
                                    </option>
                                    <option>
                                        Austrian
                                    </option>
                                    <option>
                                        Azerbaijani
                                    </option>
                                    <option>
                                        Bahamian
                                    </option>
                                    <option>
                                        Bahraini
                                    </option>
                                    <option>
                                        Bangladeshi
                                    </option>
                                    <option>
                                        Barbadian
                                    </option>
                                    <option>
                                        Barbudans
                                    </option>
                                    <option>
                                        Batswana
                                    </option>
                                    <option>
                                        Belarusian
                                    </option>
                                    <option>
                                        Belgian
                                    </option>
                                    <option>
                                        Belizean
                                    </option>
                                    <option>
                                        Beninese
                                    </option>
                                    <option>
                                        Bhutanese
                                    </option>
                                    <option>
                                        Bolivian
                                    </option>
                                    <option>
                                        Bosnian
                                    </option>
                                    <option>
                                        Brazilian
                                    </option>
                                    <option>
                                        British
                                    </option>
                                    <option>
                                        Bruneian
                                    </option>
                                    <option>
                                        Bulgarian
                                    </option>
                                    <option>
                                        Burkinabe
                                    </option>
                                    <option>
                                        Burmese
                                    </option>
                                    <option>
                                        Burundian
                                    </option>
                                    <option>
                                        Cambodian
                                    </option>
                                    <option>
                                        Cameroonian
                                    </option>
                                    <option>
                                        Canadian
                                    </option>
                                    <option>
                                        Cape Verdean
                                    </option>
                                    <option>
                                        Central African
                                    </option>
                                    <option>
                                        Chadian
                                    </option>
                                    <option>
                                        Chilean
                                    </option>
                                    <option>
                                        Chinese
                                    </option>
                                    <option>
                                        Colombian
                                    </option>
                                    <option>
                                        Comoran
                                    </option>
                                    <option>
                                        Congolese
                                    </option>
                                    <option>
                                        Costa Rican
                                    </option>
                                    <option>
                                        Croatian
                                    </option>
                                    <option>Cuban
                                    </option>
                                    <option>
                                        Cypriot
                                    </option>
                                    <option>Czech
                                    </option>
                                    <option>Danish
                                    </option>
                                    <option>
                                        Djibouti
                                    </option>
                                    <option>
                                        Dominican
                                    </option>
                                    <option>Dutch
                                    </option>
                                    <option>
                                        East Timorese
                                    </option>
                                    <option>
                                        Ecuadorean
                                    </option>
                                    <option>
                                        Egyptian
                                    </option>
                                    <option>
                                        Emirian
                                    </option>
                                    <option>
                                        Equatorial Guinean
                                    </option>
                                    <option>
                                        Eritrean
                                    </option>
                                    <option>
                                        Estonian
                                    </option>
                                    <option>
                                        Ethiopian
                                    </option>
                                    <option>Fijian
                                    </option>
                                    <option>
                                        Filipino
                                    </option>
                                    <option>
                                        Finnish
                                    </option>
                                    <option>French
                                    </option>
                                    <option>
                                        Gabonese
                                    </option>
                                    <option>
                                        Gambian
                                    </option>
                                    <option>
                                        Georgian
                                    </option>
                                    <option>German
                                    </option>
                                    <option>
                                        Ghanaian
                                    </option>
                                    <option>Greek
                                    </option>
                                    <option>
                                        Grenadian
                                    </option>
                                    <option>
                                        Guatemalan
                                    </option>
                                    <option>
                                        Guinea-Bissauan
                                    </option>
                                    <option>
                                        Guinean
                                    </option>
                                    <option>
                                        Guyanese
                                    </option>
                                    <option>
                                        Haitian
                                    </option>
                                    <option>
                                        Herzegovinian
                                    </option>
                                    <option>
                                        Honduran
                                    </option>
                                    <option>
                                        Hungarian
                                    </option>
                                    <option>
                                        Icelander
                                    </option>
                                    <option>Indian
                                    </option>
                                    <option>
                                        Indonesian
                                    </option>
                                    <option>
                                        Iranian
                                    </option>
                                    <option>Iraqi
                                    </option>
                                    <option>Irish
                                    </option>
                                    <option>
                                        Israeli
                                    </option>
                                    <option>
                                        Italian
                                    </option>
                                    <option>
                                        Ivorian
                                    </option>
                                    <option>
                                        Jamaican
                                    </option>
                                    <option>
                                        Japanese
                                    </option>
                                    <option>
                                        Jordanian
                                    </option>
                                    <option>
                                        Kazakhstani
                                    </option>
                                    <option>Kenyan
                                    </option>
                                    <option>
                                        Kittian and Nevisian
                                    </option>
                                    <option>
                                        Kuwaiti
                                    </option>
                                    <option>Kyrgyz
                                    </option>
                                    <option>
                                        Laotian
                                    </option>
                                    <option>
                                        Latvian
                                    </option>
                                    <option>
                                        Lebanese
                                    </option>
                                    <option>
                                        Liberian
                                    </option>
                                    <option>Libyan
                                    </option>
                                    <option>
                                        Liechtensteiner
                                    </option>
                                    <option>
                                        Lithuanian
                                    </option>
                                    <option>
                                        Luxembourger
                                    </option>
                                    <option>
                                        Macedonian
                                    </option>
                                    <option>
                                        Malagasy
                                    </option>
                                    <option>
                                        Malawian
                                    </option>
                                    <option>
                                        Malaysian
                                    </option>
                                    <option>
                                        Maldivan
                                    </option>
                                    <option>Malian
                                    </option>
                                    <option>
                                        Maltese
                                    </option>
                                    <option>
                                        Marshallese
                                    </option>
                                    <option>
                                        Mauritanian
                                    </option>
                                    <option>
                                        Mauritian
                                    </option>
                                    <option>
                                        Mexican
                                    </option>
                                    <option>
                                        Micronesian
                                    </option>
                                    <option>
                                        Moldovan
                                    </option>
                                    <option>
                                        Monacan
                                    </option>
                                    <option>
                                        Mongolian
                                    </option>
                                    <option>
                                        Moroccan
                                    </option>
                                    <option>
                                        Mosotho
                                    </option>
                                    <option>
                                        Motswana
                                    </option>
                                    <option>
                                        Mozambican
                                    </option>
                                    <option>
                                        Namibian
                                    </option>
                                    <option>
                                        Nauruan
                                    </option>
                                    <option>
                                        Nepalese
                                    </option>
                                    <option>
                                        New Zealander
                                    </option>
                                    <option>
                                        Ni-Vanuatu
                                    </option>
                                    <option>
                                        Nicaraguan
                                    </option>
                                    <option>
                                        Nigerien
                                    </option>
                                    <option>
                                        North Korean
                                    </option>
                                    <option>
                                        Northern Irish
                                    </option>
                                    <option>
                                        Norwegian
                                    </option>
                                    <option>Omani
                                    </option>
                                    <option>
                                        Pakistani
                                    </option>
                                    <option>
                                        Palauan
                                    </option>
                                    <option>
                                        Panamanian
                                    </option>
                                    <option>
                                        Papua New Guinean
                                    </option>
                                    <option>
                                        Paraguayan
                                    </option>
                                    <option>
                                        Peruvian
                                    </option>
                                    <option>Polish
                                    </option>
                                    <option>
                                        Portuguese
                                    </option>
                                    <option>Qatari
                                    </option>
                                    <option>
                                        Romanian
                                    </option>
                                    <option>
                                        Russian
                                    </option>
                                    <option>
                                        Rwandan
                                    </option>
                                    <option>
                                        Saint Lucian
                                    </option>
                                    <option>
                                        Salvadoran
                                    </option>
                                    <option>Samoan
                                    </option>
                                    <option>San
                                        Marinese
                                    </option>
                                    <option>Sao
                                        Tomean
                                    </option>
                                    <option>Saudi
                                    </option>
                                    <option>
                                        Scottish
                                    </option>
                                    <option>
                                        Senegalese
                                    </option>
                                    <option>
                                        Serbian
                                    </option>
                                    <option>
                                        Seychellois
                                    </option>
                                    <option>
                                        Sierra Leonean
                                    </option>
                                    <option>
                                        Singaporean
                                    </option>
                                    <option>
                                        Slovakian
                                    </option>
                                    <option>
                                        Slovenian
                                    </option>
                                    <option>
                                        Solomon Islander
                                    </option>
                                    <option>Somali
                                    </option>
                                    <option>
                                        South African
                                    </option>
                                    <option>
                                        South Korean
                                    </option>
                                    <option>
                                        Spanish
                                    </option>
                                    <option>Sri
                                        Lankan
                                    </option>
                                    <option>
                                        Sudanese
                                    </option>
                                    <option>
                                        Surinamer
                                    </option>
                                    <option>Swazi
                                    </option>
                                    <option>
                                        Swedish
                                    </option>
                                    <option>Swiss
                                    </option>
                                    <option>Syrian
                                    </option>
                                    <option>
                                        Taiwanese
                                    </option>
                                    <option>Tajik
                                    </option>
                                    <option>
                                        Tanzanian
                                    </option>
                                    <option>Thai
                                    </option>
                                    <option>
                                        Togolese
                                    </option>
                                    <option>Tongan
                                    </option>
                                    <option>
                                        Trinidadian or Tobagonian
                                    </option>
                                    <option>
                                        Tunisian
                                    </option>
                                    <option>
                                        Turkish
                                    </option>
                                    <option>
                                        Tuvaluan
                                    </option>
                                    <option>
                                        Ugandan
                                    </option>
                                    <option>
                                        Ukrainian
                                    </option>
                                    <option>
                                        Uruguayan
                                    </option>
                                    <option>
                                        Uzbekistani
                                    </option>
                                    <option>
                                        Venezuelan
                                    </option>
                                    <option>
                                        Vietnamese
                                    </option>
                                    <option>Welsh
                                    </option>
                                    <option>
                                        Yemenite
                                    </option>
                                    <option>
                                        Zambian
                                    </option>
                                    <option>
                                        Zimbabwean
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 form-group">
                            <label><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Passport Number
                                <small style="color: red;">*</small>
                            </label>
                            <div class="form-group">
                                <input type="text" id="memPassport" name="memPassport"
                                       class="form-control caps formS" match="^.+$" validate="true"
                                       error="* Passport required">
                            </div>
                        </div>

                        <div class="col-md-12  form-group">
                            <label for="memPreviousPassportifAny"><span
                                        class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Previous Passport if Any</label>
                            <div class="form-group">
                                <input type="text" id="memPreviousPassportifAny"
                                       name="memPreviousPassportifAny" class="form-control caps formS">
                            </div>
                        </div>

                        <div class="col-md-12  form-group">
                            <label for="memCountryOfBirth"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Country
                                Of
                                Birth</label>
                            <div class="form-group">
                                <select name="memCountryOfBirth" class="selectToDiv form-control inpt-control select"
                                        id="memCountryOfBirth">
                                    <option>Afghanistan</option>
                                    <option>land Islands
                                    </option>
                                    <option>Albania</option>
                                    <option>American Samoa</option>
                                    <option>Algeria
                                    </option>
                                    <option>Andorra
                                    </option>
                                    <option>Angola</option>
                                    <option>Anguilla
                                    </option>
                                    <option>Antarctica
                                    </option>
                                    <option>Antigua &amp; Barbuda</option>
                                    <option>Argentina
                                    </option>
                                    <option>Armenia
                                    </option>
                                    <option>Aruba</option>
                                    <option>Australia
                                    </option>
                                    <option>Austria
                                    </option>
                                    <option>Azerbaijan
                                    </option>
                                    <option>Bahamas
                                    </option>
                                    <option>Bahrain
                                    </option>
                                    <option>Bangladesh
                                    </option>
                                    <option>Barbados
                                    </option>
                                    <option>Belarus
                                    </option>
                                    <option>Belgium
                                    </option>
                                    <option>Belize</option>
                                    <option>Benin</option>
                                    <option>Bermuda
                                    </option>
                                    <option>Bhutan</option>
                                    <option>Bolivia
                                    </option>
                                    <option>Bosnia Herzegovina
                                    </option>
                                    <option>Botswana
                                    </option>
                                    <option>Bouvet Island</option>
                                    <option>Brazil</option>
                                    <option>British Indian Ocean Territory
                                    </option>
                                    <option>Brunei</option>
                                    <option>Bulgaria
                                    </option>
                                    <option>Burkina Faso</option>
                                    <option>Burundi
                                    </option>
                                    <option>Cambodia
                                    </option>
                                    <option>Cameroon
                                    </option>
                                    <option>Canada</option>
                                    <option>Cape Verde Islands
                                    </option>
                                    <option>Cayman Islands</option>
                                    <option>Central African Republic
                                    </option>
                                    <option>Chad</option>
                                    <option>Chile</option>
                                    <option>China</option>
                                    <option>"Christmas Island
                                    </option>
                                    <option>Cocos (Keeling) Islands
                                    </option>
                                    <option>Colombia
                                    </option>
                                    <option>Comoros
                                    </option>
                                    <option>Congo</option>
                                    <option>Congo, The Democratic Republic of
                                        the
                                    </option>
                                    <option>Cook Islands</option>
                                    <option>Costa Rica
                                    </option>
                                    <option>Croatia
                                    </option>
                                    <option>Cuba</option>
                                    <option>Cyprus North</option>
                                    <option>Cyprus South</option>
                                    <option>Czech Republic</option>
                                    <option>Denmark
                                    </option>
                                    <option>Djibouti
                                    </option>
                                    <option>Dominica
                                    </option>
                                    <option>Dominican
                                        Republic
                                    </option>
                                    <option>Ecuador
                                    </option>
                                    <option>Egypt</option>
                                    <option>El Salvador
                                    </option>
                                    <option>Equatorial Guinea
                                    </option>
                                    <option>Eritrea
                                    </option>
                                    <option>Estonia
                                    </option>
                                    <option>Ethiopia
                                    </option>
                                    <option>Falkland Islands
                                    </option>
                                    <option>Faroe Islands</option>
                                    <option>Fiji</option>
                                    <option>Finland
                                    </option>
                                    <option>France</option>
                                    <option>French Guiana</option>
                                    <option>French Polynesia
                                    </option>
                                    <option>French Southern Territories
                                    </option>
                                    <option>Gabon</option>
                                    <option>Gambia</option>
                                    <option>Georgia
                                    </option>
                                    <option>Germany
                                    </option>
                                    <option>Ghana</option>
                                    <option>Gibraltar
                                    </option>
                                    <option>Greece</option>
                                    <option>Greenland
                                    </option>
                                    <option>Grenada
                                    </option>
                                    <option>Guadeloupe
                                    </option>
                                    <option>Guam</option>
                                    <option>Guatemala
                                    </option>
                                    <option>Guernsey</option>
                                    <option>Guinea</option>
                                    <option>Guinea - Bissau
                                    </option>
                                    <option>Guyana</option>
                                    <option>Haiti</option>
                                    <option>Honduras
                                    </option>
                                    <option>Heard Island and Mcdonald Islands
                                    </option>
                                    <option>Hong Kong
                                    </option>
                                    <option>Hungary
                                    </option>
                                    <option>Iceland
                                    </option>
                                    <option>India</option>
                                    <option>Indonesia
                                    </option>
                                    <option>Iran</option>
                                    <option>Iraq</option>
                                    <option>Ireland
                                    </option>
                                    <option>Israel</option>
                                    <option>Italy</option>
                                    <option>Jamaica
                                    </option>
                                    <option>Japan</option>
                                    <option>Jersey</option>
                                    <option>Jordan</option>
                                    <option>Kazakhstan
                                    </option>
                                    <option>Kenya</option>
                                    <option>Kiribati
                                    </option>
                                    <option>Korea North
                                    </option>
                                    <option>Korea South
                                    </option>
                                    <option>Kuwait</option>
                                    <option>Kyrgyzstan
                                    </option>
                                    <option>Laos</option>
                                    <option>Latvia</option>
                                    <option>Lebanon
                                    </option>
                                    <option>Lesotho
                                    </option>
                                    <option>Liberia
                                    </option>
                                    <option>Libya</option>
                                    <option>Liechtenstein</option>
                                    <option>Lithuania
                                    </option>
                                    <option>Luxembourg
                                    </option>
                                    <option>Macao</option>
                                    <option>Macedonia
                                    </option>
                                    <option>Madagascar
                                    </option>
                                    <option>Malawi</option>
                                    <option>Malaysia
                                    </option>
                                    <option>Maldives
                                    </option>
                                    <option>Mali</option>
                                    <option>Malta</option>
                                    <option>Marshall Islands
                                    </option>
                                    <option>Martinique
                                    </option>
                                    <option>Mauritania
                                    </option>
                                    <option>Mauritius
                                    </option>
                                    <option>Mayotte
                                    </option>
                                    <option>Mexico</option>
                                    <option>Micronesia
                                    </option>
                                    <option>Moldova
                                    </option>
                                    <option>Monaco</option>
                                    <option>Mongolia
                                    </option>
                                    <option>Montenegro
                                    </option>
                                    <option>Montserrat
                                    </option>
                                    <option>Morocco
                                    </option>
                                    <option>Mozambique
                                    </option>
                                    <option>Myanmar
                                    </option>
                                    <option>Namibia
                                    </option>
                                    <option>Nauru</option>
                                    <option>Nepal</option>
                                    <option>Netherlands
                                    </option>
                                    <option>Netherlands
                                        Antilles
                                    </option>
                                    <option>New Caledonia</option>
                                    <option>New Zealand
                                    </option>
                                    <option>Nicaragua
                                    </option>
                                    <option>Niger</option>
                                    <option>Nigeria
                                    </option>
                                    <option>Niue</option>
                                    <option>Norfolk Islands
                                    </option>
                                    <option>Northern Marianas
                                    </option>
                                    <option>Norway</option>
                                    <option>Oman</option>
                                    <option>Pakistan
                                    </option>
                                    <option>Palestinian Territory, Occupied
                                    </option>
                                    <option>Palau</option>
                                    <option>Panama</option>
                                    <option>Papua New Guinea
                                    </option>
                                    <option>Paraguay
                                    </option>
                                    <option>Peru</option>
                                    <option>Philippines
                                    </option>
                                    <option>Poland</option>
                                    <option>Portugal
                                    </option>
                                    <option>Puerto Rico</option>
                                    <option>Qatar</option>
                                    <option>Romania
                                    </option>
                                    <option>Romania
                                    </option>
                                    <option>Russia</option>
                                    <option>Rwanda</option>
                                    <option>Saint Lucia
                                    </option>
                                    <option>Saint Pierre and
                                        Miquelon
                                    </option>
                                    <option></option>
                                    <option>San Marino
                                    </option>
                                    <option>Sao Tome &amp; Principe
                                    </option>
                                    <option>Saudi Arabia</option>
                                    <option>Senegal
                                    </option>
                                    <option>Serbia</option>
                                    <option>Seychelles
                                    </option>
                                    <option>Sierra Leone</option>
                                    <option>Singapore
                                    </option>
                                    <option>Slovak Republic
                                    </option>
                                    <option>Slovenia
                                    </option>
                                    <option>Solomon Islands
                                    </option>
                                    <option>Somalia
                                    </option>
                                    <option>South Africa</option>
                                    <option>South Georgia and the South
                                        Sandwich Islands
                                    </option>
                                    <option>Spain</option>
                                    <option>Sri Lanka
                                    </option>
                                    <option>Saint Helena</option>
                                    <option>Saint Kitts and
                                        Nevis
                                    </option>
                                    <option>St. Lucia
                                    </option>
                                    <option>Sudan</option>
                                    <option>Suriname
                                    </option>
                                    <option>Svalbard and Jan
                                        Mayen
                                    </option>
                                    <option>Swaziland
                                    </option>
                                    <option>Sweden</option>
                                    <option>Switzerland
                                    </option>
                                    <option id="Syrian Arab Republic">Syrian Arab Republic
                                    </option>
                                    <option id="Syria">Syria</option>
                                    <option>Taiwan</option>
                                    <option>Tajikstan
                                    </option>
                                    <option>Tanzania, United Republic of
                                    </option>
                                    <option>Thailand
                                    </option>
                                    <option>Togo</option>
                                    <option>Tonga</option>
                                    <option>Trinidad &amp; Tobago
                                    </option>
                                    <option>Tunisia
                                    </option>
                                    <option>Turkey</option>
                                    <option>Turkmenistan
                                    </option>
                                    <option>Turkmenistan</option>
                                    <option>Turks and Caicos Islands
                                    </option>
                                    <option>Tuvalu</option>
                                    <option>Uganda
                                    </option>
                                    <option>UK</option>
                                    <option>Ukraine
                                    </option>
                                    <option>United Arab
                                        Emirates
                                    </option>
                                    <option>United States Minor
                                        Outlying Islands
                                    </option>
                                    <option>Uruguay
                                    </option>
                                    <option>United States</option>
                                    <option>Uzbekistan
                                    </option>
                                    <option>Vanuatu
                                    </option>
                                    <option>Vatican City</option>
                                    <option>Venezuela
                                    </option>
                                    <option>Vietnam</option>
                                    <option>Virgin Islands - British
                                    </option>
                                    <option>Virgin Islands -
                                        US
                                    </option>
                                    <option>Wallis &amp;
                                        Futuna
                                    </option>
                                    <option>Western Sahara</option>
                                    <option>Yemen</option>
                                    <option>Zambia</option>
                                    <option>Zimbabwe
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12  form-group">
                            <label for="memCountryvisitedduringlast3years"><span class="fa fa-hand-o-right"></span>&nbsp;&nbsp;Country/countries
                                visited during the
                                last three years</label>
                            <div class="form-group">
                                <select name="memCountryvisitedduringlast3years"
                                        class="selectToDiv form-control" multiple="multiple"
                                        id="memCountryvisitedduringlast3years">
                                    <option>Afghanistan</option>
                                    <option>land Islands
                                    </option>
                                    <option>Albania</option>
                                    <option>American Samoa</option>
                                    <option>Algeria
                                    </option>
                                    <option>Andorra
                                    </option>
                                    <option>Angola</option>
                                    <option>Anguilla
                                    </option>
                                    <option>Antarctica
                                    </option>
                                    <option>Antigua &amp; Barbuda</option>
                                    <option>Argentina
                                    </option>
                                    <option>Armenia
                                    </option>
                                    <option>Aruba</option>
                                    <option>Australia
                                    </option>
                                    <option>Austria
                                    </option>
                                    <option>Azerbaijan
                                    </option>
                                    <option>Bahamas
                                    </option>
                                    <option>Bahrain
                                    </option>
                                    <option>Bangladesh
                                    </option>
                                    <option>Barbados
                                    </option>
                                    <option>Belarus
                                    </option>
                                    <option>Belgium
                                    </option>
                                    <option>Belize</option>
                                    <option>Benin</option>
                                    <option>Bermuda
                                    </option>
                                    <option>Bhutan</option>
                                    <option>Bolivia
                                    </option>
                                    <option>Bosnia Herzegovina
                                    </option>
                                    <option>Botswana
                                    </option>
                                    <option>Bouvet Island</option>
                                    <option>Brazil</option>
                                    <option>British Indian Ocean Territory
                                    </option>
                                    <option>Brunei</option>
                                    <option>Bulgaria
                                    </option>
                                    <option>Burkina Faso</option>
                                    <option>Burundi
                                    </option>
                                    <option>Cambodia
                                    </option>
                                    <option>Cameroon
                                    </option>
                                    <option>Canada</option>
                                    <option>Cape Verde Islands
                                    </option>
                                    <option>Cayman Islands</option>
                                    <option>Central African Republic
                                    </option>
                                    <option>Chad</option>
                                    <option>Chile</option>
                                    <option>China</option>
                                    <option>"Christmas Island
                                    </option>
                                    <option>Cocos (Keeling) Islands
                                    </option>
                                    <option>Colombia
                                    </option>
                                    <option>Comoros
                                    </option>
                                    <option>Congo</option>
                                    <option>Congo, The Democratic Republic of
                                        the
                                    </option>
                                    <option>Cook Islands</option>
                                    <option>Costa Rica
                                    </option>
                                    <option>Croatia
                                    </option>
                                    <option>Cuba</option>
                                    <option>Cyprus North</option>
                                    <option>Cyprus South</option>
                                    <option>Czech Republic</option>
                                    <option>Denmark
                                    </option>
                                    <option>Djibouti
                                    </option>
                                    <option>Dominica
                                    </option>
                                    <option>Dominican
                                        Republic
                                    </option>
                                    <option>Ecuador
                                    </option>
                                    <option>Egypt</option>
                                    <option>El Salvador
                                    </option>
                                    <option>Equatorial Guinea
                                    </option>
                                    <option>Eritrea
                                    </option>
                                    <option>Estonia
                                    </option>
                                    <option>Ethiopia
                                    </option>
                                    <option>Falkland Islands
                                    </option>
                                    <option>Faroe Islands</option>
                                    <option>Fiji</option>
                                    <option>Finland
                                    </option>
                                    <option>France</option>
                                    <option>French Guiana</option>
                                    <option>French Polynesia
                                    </option>
                                    <option>French Southern Territories
                                    </option>
                                    <option>Gabon</option>
                                    <option>Gambia</option>
                                    <option>Georgia
                                    </option>
                                    <option>Germany
                                    </option>
                                    <option>Ghana</option>
                                    <option>Gibraltar
                                    </option>
                                    <option>Greece</option>
                                    <option>Greenland
                                    </option>
                                    <option>Grenada
                                    </option>
                                    <option>Guadeloupe
                                    </option>
                                    <option>Guam</option>
                                    <option>Guatemala
                                    </option>
                                    <option>Guernsey</option>
                                    <option>Guinea</option>
                                    <option>Guinea - Bissau
                                    </option>
                                    <option>Guyana</option>
                                    <option>Haiti</option>
                                    <option>Honduras
                                    </option>
                                    <option>Heard Island and Mcdonald Islands
                                    </option>
                                    <option>Hong Kong
                                    </option>
                                    <option>Hungary
                                    </option>
                                    <option>Iceland
                                    </option>
                                    <option>India</option>
                                    <option>Indonesia
                                    </option>
                                    <option>Iran</option>
                                    <option>Iraq</option>
                                    <option>Ireland
                                    </option>
                                    <option>Israel</option>
                                    <option>Italy</option>
                                    <option>Jamaica
                                    </option>
                                    <option>Japan</option>
                                    <option>Jersey</option>
                                    <option>Jordan</option>
                                    <option>Kazakhstan
                                    </option>
                                    <option>Kenya</option>
                                    <option>Kiribati
                                    </option>
                                    <option>Korea North
                                    </option>
                                    <option>Korea South
                                    </option>
                                    <option>Kuwait</option>
                                    <option>Kyrgyzstan
                                    </option>
                                    <option>Laos</option>
                                    <option>Latvia</option>
                                    <option>Lebanon
                                    </option>
                                    <option>Lesotho
                                    </option>
                                    <option>Liberia
                                    </option>
                                    <option>Libya</option>
                                    <option>Liechtenstein</option>
                                    <option>Lithuania
                                    </option>
                                    <option>Luxembourg
                                    </option>
                                    <option>Macao</option>
                                    <option>Macedonia
                                    </option>
                                    <option>Madagascar
                                    </option>
                                    <option>Malawi</option>
                                    <option>Malaysia
                                    </option>
                                    <option>Maldives
                                    </option>
                                    <option>Mali</option>
                                    <option>Malta</option>
                                    <option>Marshall Islands
                                    </option>
                                    <option>Martinique
                                    </option>
                                    <option>Mauritania
                                    </option>
                                    <option>Mauritius
                                    </option>
                                    <option>Mayotte
                                    </option>
                                    <option>Mexico</option>
                                    <option>Micronesia
                                    </option>
                                    <option>Moldova
                                    </option>
                                    <option>Monaco</option>
                                    <option>Mongolia
                                    </option>
                                    <option>Montenegro
                                    </option>
                                    <option>Montserrat
                                    </option>
                                    <option>Morocco
                                    </option>
                                    <option>Mozambique
                                    </option>
                                    <option>Myanmar
                                    </option>
                                    <option>Namibia
                                    </option>
                                    <option>Nauru</option>
                                    <option>Nepal</option>
                                    <option>Netherlands
                                    </option>
                                    <option>Netherlands
                                        Antilles
                                    </option>
                                    <option>New Caledonia</option>
                                    <option>New Zealand
                                    </option>
                                    <option>Nicaragua
                                    </option>
                                    <option>Niger</option>
                                    <option>Nigeria
                                    </option>
                                    <option>Niue</option>
                                    <option>Norfolk Islands
                                    </option>
                                    <option>Northern Marianas
                                    </option>
                                    <option>Norway</option>
                                    <option>Oman</option>
                                    <option>Pakistan
                                    </option>
                                    <option>Palestinian Territory, Occupied
                                    </option>
                                    <option>Palau</option>
                                    <option>Panama</option>
                                    <option>Papua New Guinea
                                    </option>
                                    <option>Paraguay
                                    </option>
                                    <option>Peru</option>
                                    <option>Philippines
                                    </option>
                                    <option>Poland</option>
                                    <option>Portugal
                                    </option>
                                    <option>Puerto Rico</option>
                                    <option>Qatar</option>
                                    <option>Romania
                                    </option>
                                    <option>Romania
                                    </option>
                                    <option>Russia</option>
                                    <option>Rwanda</option>
                                    <option>Saint Lucia
                                    </option>
                                    <option>Saint Pierre and
                                        Miquelon
                                    </option>
                                    <option>San Marino
                                    </option>
                                    <option>Sao Tome &amp; Principe
                                    </option>
                                    <option>Saudi Arabia</option>
                                    <option>Senegal
                                    </option>
                                    <option>Serbia</option>
                                    <option>Seychelles
                                    </option>
                                    <option>Sierra Leone</option>
                                    <option>Singapore
                                    </option>
                                    <option>Slovak Republic
                                    </option>
                                    <option>Slovenia
                                    </option>
                                    <option>Solomon Islands
                                    </option>
                                    <option>Somalia
                                    </option>
                                    <option>South Africa</option>
                                    <option>South Georgia and the South
                                        Sandwich Islands
                                    </option>
                                    <option>Spain</option>
                                    <option>Sri Lanka
                                    </option>
                                    <option>Saint Helena</option>
                                    <option>Saint Kitts and
                                        Nevis
                                    </option>
                                    <option>St. Lucia
                                    </option>
                                    <option>Sudan</option>
                                    <option>Suriname
                                    </option>
                                    <option>Svalbard and Jan
                                        Mayen
                                    </option>
                                    <option>Swaziland
                                    </option>
                                    <option>Sweden</option>
                                    <option>Switzerland
                                    </option>
                                    <option>Syrian Arab Republic
                                    </option>
                                    <option> Syria</option>
                                    <option>Taiwan</option>
                                    <option>Tajikstan
                                    </option>
                                    <option>Tanzania, United Republic of
                                    </option>
                                    <option>Thailand
                                    </option>
                                    <option>Togo</option>
                                    <option>Tonga</option>
                                    <option>Trinidad &amp; Tobago
                                    </option>
                                    <option>Tunisia
                                    </option>
                                    <option>Turkey</option>
                                    <option>Turkmenistan
                                    </option>
                                    <option>Turkmenistan</option>
                                    <option>Turks and Caicos Islands
                                    </option>
                                    <option>Tuvalu</option>
                                    <option>Uganda
                                    </option>
                                    <option>UK</option>
                                    <option>Ukraine
                                    </option>
                                    <option>United Arab
                                        Emirates
                                    </option>
                                    <option>United States Minor
                                        Outlying Islands
                                    </option>
                                    <option>Uruguay
                                    </option>
                                    <option>United States</option>
                                    <option>Uzbekistan
                                    </option>
                                    <option>Vanuatu
                                    </option>
                                    <option>Vatican City</option>
                                    <option>Venezuela
                                    </option>
                                    <option>Vietnam</option>
                                    <option>Virgin Islands - British
                                    </option>
                                    <option>Virgin Islands -
                                        US
                                    </option>
                                    <option>Wallis &amp;
                                        Futuna
                                    </option>
                                    <option>Western Sahara</option>
                                    <option>Yemen</option>
                                    <option>Zambia</option>
                                    <option>Zimbabwe
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 form-group text-center">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                    style="padding-top: 6px;padding-bottom: 6px;"><span
                                        class="fa fa-close">&nbsp;&nbsp;Close</span></button>
                            <button type="button" class="btn btn-success" id="save"
                                    style="padding-top: 6px;padding-bottom: 6px;"><span
                                        class="fa fa-save">&nbsp;&nbsp;Save</span></button>
                        </div>


                    </div>
                </div>


                <!-- Modal footer -->
                <div class="modal-footer">

                </div>

            </div>
        </div>
    </div>

    <div class="modal changeMemberModal" style="border-color: #0f960b;">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius: 25px 25px 12px 12px;">

                <!-- Modal Header -->
                <div class="modal-header"
                     style="background-color: #5a8db5; color: white;border-radius: 12px 12px 0 0;padding-bottom: 20px;">
                    <div class="col-md-6">
                        <h4 class="modal-title">Change Main Member</h4>
                    </div>
                    <button type="button" class="close" data-dismiss="modal"><img
                                src="<?php echo e(asset('images/colse.png')); ?>" width="20px;" height="20px;"/></button>
                </div>

                <!-- Modal body -->
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>
                                Appointment No
                            </th>
                            <th nowrap>
                                Passport No
                            </th>
                            <th>Member</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="appNoList">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    

    <div class="modal changeMemberPhoteModal" style="border-color: #0f960b;">
        <div class="modal-dialog" style="max-width: 80% !important;">
            <div class="modal-content" style="border-radius: 25px 25px 12px 12px;">

                <!-- Modal Header -->
                <div class="modal-header"
                     style="background-color: #5a8db5; color: white;border-radius: 12px 12px 0 0;padding-bottom: 20px;">
                    <div class="col-md-6">
                        <h4 class="modal-title">Change Member Photo</h4>
                    </div>
                    <button type="button" class="close" data-dismiss="modal"><img src="<?php echo e(asset('images/colse.png')); ?>"
                                                                                  width="20px;" height="20px;"/>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="card-body">

                    <label for="memDOB"><b>Appointment No :</b></label>
                    <div class="col-md-6 form-group row">
                        <select id="photoAppNo" class="form-control selectTo">
                        </select>
                    </div>

                    <div id="CrPtoView" style="display: none">
                        <div class="col-md-12 form-group row">
                            <div class="col-md-4 form-group">
                                <label for="memDOB"><span class="fa fa-hand-o-right"></span>&nbsp;<b>Current
                                        Photo</b></label>
                                <div>
                                    <img id="img" src="<?php echo e(asset('images/user.jpg')); ?>" width="200px;" height="200px;"/>
                                </div>


                            </div>
                            <div class="col-md-4 form-group">
                                <button class="btn btn-info" id="TakePhotoBtn"
                                        style="margin-top: 10%;width: 100%;font-size: 150%"><span
                                            class="fa fa-camera"></span>&nbsp;Take a Photo
                                </button>
                                <br>

                                <button class="btn btn-info" id="UploadPhotoBtn"
                                        style="margin-top: 10%;width: 100%;font-size: 150%"><span
                                            class="fa fa-upload"></span>&nbsp;Upload Photo
                                </button>
                                <input id="photoUpload" type="file" src="" accept=".jpg" style="display: none;"/>
                            </div>
                        </div>
                    </div>

                    <div id="ptoView" style="display: none">
                        <div class="col-md-12 form-group">
                            <div class="row">

                                <div class="col-md-6">
                                    <p style="text-align: center;font-size: 1rem;font-weight: bold;">Live Feed</p>
                                    <div class="row justify-content-center">
                                        <div class='col-md-10'
                                             style="margin: 20px;padding: 20px;border: 4px solid #8c5136;background: #f5f5f5; text-align: center;">
                                            <div style="position: relative;">
                                                <video controls autoplay style="width: 350px; height: 330px;"></video>
                                                <canvas id="detectFace" width="440" height="330"
                                                        style="position: absolute; left: 0px; top: 0px;"></canvas>
                                            </div>
                                        </div>
                                        <div class='col-md-12'>
                                            <div class='col-md-4 offset-md-4'>
                                                <button type="button" class="btn-block btn-success btn-lg btn3d"
                                                        id="capturePhoto">
                                                    <span class="fa fa-camera" style=""></span>&nbsp;&nbsp;
                                                    <span style="">Capture</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p style="text-align: center;font-size: 1rem;font-weight: bold;">Captured Image</p>
                                    <div class="row justify-content-center">
                                        <div class='col-md-10'
                                             style="margin: 20px;padding: 20px;border: 4px solid #8c5136;background: #f5f5f5; text-align: center;">
                                            <canvas id="captureImage" style="width: 350px; height: 330px;"></canvas>
                                            <img id="showEditedImage" src=""
                                                 style="width: 440px; height: 330px; display: none"/>
                                        </div>
                                        <div class='col-md-12'>
                                            <div class='row justify-content-center'>
                                                <div class='col-md-12 text-center'>
                                                    <button type="button" id="editPhoto"
                                                            class="btn-primary btn-lg btn3d"
                                                            style="padding-left: 24px; padding-right: 24px;"><i
                                                                class="fa fa-pencil"></i> <span>Edit</span></button>
                                                    <button type="button" id="savePhoto"
                                                            class="btn-success btn-lg btn3d"
                                                            style="padding-left: 20px; padding-right: 20px;"><i
                                                                class="fa fa-floppy-o"></i> <span>Save</span></button>
                                                    <button type="button" id="cancelPhoto"
                                                            class="btn-danger btn-lg btn3d"
                                                            style="padding-left: 15px; padding-right: 15px;"><i
                                                                class="fa fa-close"></i> <span>Cancel</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div id="savebtnView" style="display: none">
                        <div class="col-md-12 form-group">
                            <div class="col text-center">
                                <button class="btn-info btn-lg btn3d" style="width: 40%;" id="changePhotoSaveBtn">Save
                                    Image
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        var path = '<?php echo e(url('/tempFileUpload/photoBoothFiles/')); ?>';

    </script>
    <!--JS files-->
    <script src="<?php echo e(asset('plugins/jqueryUI/jquery-ui-timepicker.js')); ?>" type="text/javascript"></script>

    <script src="<?php echo e(asset('js/FaceDetector.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/Cropper/cropper.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/fullCalender/moment.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('plugins/notifications/noty.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('jsPages/ChangeUpdateAppointmentDetails.js')); ?>" type="text/javascript"></script>
    <script>
        var imgPathBlade = '<?php echo e(url('/images/numbers/')); ?>';
    </script>
    <script>
        var enforceModalFocusFn = $.fn.modal.Constructor.prototype._enforceFocus;
        $.fn.modal.Constructor.prototype._enforceFocus = function () {
        };

        // ---------------------------------------------------------------------------------------------
        document.querySelector("#SlTelephoneFixedLine").addEventListener("keypress", function (e) {

            var allowedChars = '0123456789+';

            function contains(stringValue, charValue) {
                return stringValue.indexOf(charValue) > -1;
            }

            var invalidKey = e.key.length === 1 && !contains(allowedChars, e.key) || e.key === '.' && contains(e.target.value, '.');
            invalidKey && e.preventDefault();
        });
        // ---------------------------------------------------------------------------------------------
        document.querySelector("#SlMobile").addEventListener("keypress", function (e) {
            var allowedChars = '0123456789+';

            function contains(stringValue, charValue) {
                return stringValue.indexOf(charValue) > -1;
            }

            var invalidKey = e.key.length === 1 && !contains(allowedChars, e.key) || e.key === '.' && contains(e.target.value, '.');
            invalidKey && e.preventDefault();
        });

        // ---------------------------------------------------------------------------------------------
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
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

        // $('#msg1').hide();
        $('#msg2').hide();

        // $('#prg1').on('change',function () {
        //
        //     var prg1=$('#prg1').val();
        //     if(prg1=="Yes"){
        //         $('#msg1').show();
        //     }else{
        //         $('#msg1').hide();
        //     }
        // });

        // $('#prg2').on('change',function () {
        //
        //     var prg2=$('#prg2').val();
        //     if(prg2=="Yes"){
        //         $('#msg2').show();
        //     }else{
        //         $('#msg2').hide();
        //     }
        // });
        $('#IdDomicile').hide();


        // =============================================================
        // =============================================================

        $('#TakePhotoBtn').on('click', function () {

            $('#ptoView').show();
            loadWebCamera();

            //Face Detection
            setTimeout(function () {

                var videoTag = document.getElementsByTagName("video")[0];
                var canvas = document.querySelector("#detectFace");

                var VIEW_WIDTH = 440;
                var VIEW_HEIGHT = 330;

                var faceDetector = new FaceDetector(
                    {
                        video: videoTag,
                        flipLeftRight: false,
                        flipUpsideDown: false
                    }
                );

                faceDetector.setOnFaceAddedCallback(function (addedFaces, detectedFaces) {
                    for (var i = 0; i < addedFaces.length; i++) {
                        console.log("[facedetector] New face detected id=" + addedFaces[i].faceId + " index=" + addedFaces[i].faceIndex);
                    }
                });

                faceDetector.setOnFaceLostCallback(function (lostFaces, detectedFaces) {
                    var ctx = canvas.getContext("2d");
                    ctx.clearRect(0, 0, VIEW_WIDTH, VIEW_HEIGHT);

                    for (var i = 0; i < lostFaces.length; i++) {
                        console.log("[facedetector] Face removed id=" + lostFaces[i].faceId + " index=" + lostFaces[i].faceIndex);
                    }
                });

                faceDetector.setOnFaceUpdatedCallback(function (detectedFaces) {

                    var ctx = canvas.getContext("2d");
                    ctx.clearRect(0, 0, VIEW_WIDTH, VIEW_HEIGHT);

                    ctx.strokeStyle = "red";
                    ctx.lineWidth = 3;
                    ctx.fillStyle = "red";
                    ctx.font = "italic small-caps bold 20px arial";

                    for (var i = 0; i < detectedFaces.length; i++) {

                        var face = detectedFaces[i];

                        // ctx.fillText(face.faceId, face.x * VIEW_WIDTH, face.y * VIEW_HEIGHT);
                        ctx.strokeRect(face.x * VIEW_WIDTH, face.y * VIEW_HEIGHT + 10, face.width * VIEW_WIDTH, face.height * VIEW_HEIGHT);
                    }
                });

                //after getUserMedia
                faceDetector.startDetecting();
            }, 2000)


            function loadWebCamera() {


                // Put variables in global scope to make them available to the browser console.
                const video = document.querySelector('video');
                const canvas = window.canvas = document.querySelector('#captureImage');
                canvas.width = 340;
                canvas.height = 230;

                const button = document.querySelector('#capturePhoto');
                button.onclick = function () {
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
                };

                const constraints = {
                    audio: false,
                    video: true
                };

                function handleSuccess(stream) {
                    window.stream = stream;
                    video.srcObject = stream;
                }

                function handleError(error) {
                    console.log('navigator.MediaDevices.getUserMedia error: ', error.message, error.name);
                }

                navigator.mediaDevices.getUserMedia(constraints).then(handleSuccess).catch(handleError);
            }


        });

    </script>

<?php $__env->stopSection(); ?>

<?php endif; ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\iom\resources\views/pages/ChangeUpdateAppointmentDetails.blade.php ENDPATH**/ ?>