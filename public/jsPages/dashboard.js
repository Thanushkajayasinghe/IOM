$(document).ready(function () {

    //Chart Data Load
    $.ajax({
        url: 'dashboardLoadData',
        type: 'POST',
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            command: 'countryChart'
        },
        success: function (data) {

            var readyDataArr = [];

            $.each(data, function (key, val) {

                var country = val.CountryOfOrigin;
                var count = val.count;

                var countries = [
                    {"name": "Afghanistan", "code": "AF"},
                    {"name": "land Islands", "code": "AX"},
                    {"name": "Albania", "code": "AL"},
                    {"name": "Algeria", "code": "DZ"},
                    {"name": "American Samoa", "code": "AS"},
                    {"name": "Andorra", "code": "AD"},
                    {"name": "Angola", "code": "AO"},
                    {"name": "Anguilla", "code": "AI"},
                    {"name": "Antarctica", "code": "AQ"},
                    {"name": "Antigua", "code": "AG"},
                    {"name": "Argentina", "code": "AR"},
                    {"name": "Armenia", "code": "AM"},
                    {"name": "Aruba", "code": "AW"},
                    {"name": "Australia", "code": "AU"},
                    {"name": "Austria", "code": "AT"},
                    {"name": "Azerbaijan", "code": "AZ"},
                    {"name": "Bahamas", "code": "BS"},
                    {"name": "Bahrain", "code": "BH"},
                    {"name": "Bangladesh", "code": "BD"},
                    {"name": "Barbados", "code": "BB"},
                    {"name": "Belarus", "code": "BY"},
                    {"name": "Belgium", "code": "BE"},
                    {"name": "Belize", "code": "BZ"},
                    {"name": "Benin", "code": "BJ"},
                    {"name": "Bermuda", "code": "BM"},
                    {"name": "Bhutan", "code": "BT"},
                    {"name": "Bolivia", "code": "BO"},
                    {"name": "Bosnia Herzegovina", "code": "BA"},
                    {"name": "Botswana", "code": "BW"},
                    {"name": "Bouvet Island", "code": "BV"},
                    {"name": "Brazil", "code": "BR"},
                    {"name": "British Indian Ocean Territory", "code": "IO"},
                    {"name": "Brunei", "code": "BN"},
                    {"name": "Bulgaria", "code": "BG"},
                    {"name": "Burkina Faso", "code": "BF"},
                    {"name": "Burundi", "code": "BI"},
                    {"name": "Cambodia", "code": "KH"},
                    {"name": "Cameroon", "code": "CM"},
                    {"name": "Canada", "code": "CA"},
                    {"name": "Cape Verde Islands", "code": "CV"},
                    {"name": "Cayman Islands", "code": "KY"},
                    {"name": "Central African Republic", "code": "CF"},
                    {"name": "Chad", "code": "TD"},
                    {"name": "Chile", "code": "CL"},
                    {"name": "China", "code": "CN"},
                    {"name": "Christmas Island", "code": "CX"},
                    {"name": "Cocos Islands", "code": "CC"},
                    {"name": "Colombia", "code": "CO"},
                    {"name": "Comoros", "code": "KM"},
                    {"name": "Congo", "code": "CG"},
                    {"name": "Congo, The Democratic Republic of the", "code": "CD"},
                    {"name": "Cook Islands", "code": "CK"},
                    {"name": "Costa Rica", "code": "CR"},
                    {"name": "Cote D\"Ivoire", "code": "CI"},
                    {"name": "Croatia", "code": "HR"},
                    {"name": "Cuba", "code": "CU"},
                    {"name": "Cyprus", "code": "CY"},
                    {"name": "Czech Republic", "code": "CZ"},
                    {"name": "Denmark", "code": "DK"},
                    {"name": "Djibouti", "code": "DJ"},
                    {"name": "Dominica", "code": "DM"},
                    {"name": "Dominican Republic", "code": "DO"},
                    {"name": "Ecuador", "code": "EC"},
                    {"name": "Egypt", "code": "EG"},
                    {"name": "El Salvador", "code": "SV"},
                    {"name": "Equatorial Guinea", "code": "GQ"},
                    {"name": "Eritrea", "code": "ER"},
                    {"name": "Estonia", "code": "EE"},
                    {"name": "Ethiopia", "code": "ET"},
                    {"name": "Falkland Islands (Malvinas)", "code": "FK"},
                    {"name": "Faroe Islands", "code": "FO"},
                    {"name": "Fiji", "code": "FJ"},
                    {"name": "Finland", "code": "FI"},
                    {"name": "France", "code": "FR"},
                    {"name": "French Guiana", "code": "GF"},
                    {"name": "French Polynesia", "code": "PF"},
                    {"name": "French Southern Territories", "code": "TF"},
                    {"name": "Gabon", "code": "GA"},
                    {"name": "Gambia", "code": "GM"},
                    {"name": "Georgia", "code": "GE"},
                    {"name": "Germany", "code": "DE"},
                    {"name": "Ghana", "code": "GH"},
                    {"name": "Gibraltar", "code": "GI"},
                    {"name": "Greece", "code": "GR"},
                    {"name": "Greenland", "code": "GL"},
                    {"name": "Grenada", "code": "GD"},
                    {"name": "Guadeloupe", "code": "GP"},
                    {"name": "Guam", "code": "GU"},
                    {"name": "Guatemala", "code": "GT"},
                    {"name": "Guernsey", "code": "GG"},
                    {"name": "Guinea", "code": "GN"},
                    {"name": "Guinea-Bissau", "code": "GW"},
                    {"name": "Guyana", "code": "GY"},
                    {"name": "Haiti", "code": "HT"},
                    {"name": "Heard Island and Mcdonald Islands", "code": "HM"},
                    {"name": "Vatican City", "code": "VA"},
                    {"name": "Honduras", "code": "HN"},
                    {"name": "Hong Kong", "code": "HK"},
                    {"name": "Hungary", "code": "HU"},
                    {"name": "Iceland", "code": "IS"},
                    {"name": "India", "code": "IN"},
                    {"name": "Indonesia", "code": "ID"},
                    {"name": "Iran", "code": "IR"},
                    {"name": "Iraq", "code": "IQ"},
                    {"name": "Ireland", "code": "IE"},
                    {"name": "Isle of Man", "code": "IM"},
                    {"name": "Israel", "code": "IL"},
                    {"name": "Italy", "code": "IT"},
                    {"name": "Jamaica", "code": "JM"},
                    {"name": "Japan", "code": "JP"},
                    {"name": "Jersey", "code": "JE"},
                    {"name": "Jordan", "code": "JO"},
                    {"name": "Kazakhstan", "code": "KZ"},
                    {"name": "Kenya", "code": "KE"},
                    {"name": "Kiribati", "code": "KI"},
                    {"name": "Korea North", "code": "KP"},
                    {"name": "Korea South", "code": "KR"},
                    {"name": "Kuwait", "code": "KW"},
                    {"name": "Kyrgyzstan", "code": "KG"},
                    {"name": "Laos", "code": "LA"},
                    {"name": "Latvia", "code": "LV"},
                    {"name": "Lebanon", "code": "LB"},
                    {"name": "Lesotho", "code": "LS"},
                    {"name": "Liberia", "code": "LR"},
                    {"name": "Libya", "code": "LY"},
                    {"name": "Liechtenstein", "code": "LI"},
                    {"name": "Lithuania", "code": "LT"},
                    {"name": "Luxembourg", "code": "LU"},
                    {"name": "Macao", "code": "MO"},
                    {"name": "Macedonia", "code": "MK"},
                    {"name": "Madagascar", "code": "MG"},
                    {"name": "Malawi", "code": "MW"},
                    {"name": "Malaysia", "code": "MY"},
                    {"name": "Maldives", "code": "MV"},
                    {"name": "Mali", "code": "ML"},
                    {"name": "Malta", "code": "MT"},
                    {"name": "Marshall Islands", "code": "MH"},
                    {"name": "Martinique", "code": "MQ"},
                    {"name": "Mauritania", "code": "MR"},
                    {"name": "Mauritius", "code": "MU"},
                    {"name": "Mayotte", "code": "YT"},
                    {"name": "Mexico", "code": "MX"},
                    {"name": "Micronesia", "code": "FM"},
                    {"name": "Moldova, Republic of", "code": "MD"},
                    {"name": "Monaco", "code": "MC"},
                    {"name": "Mongolia", "code": "MN"},
                    {"name": "Montenegro", "code": "ME"},
                    {"name": "Montserrat", "code": "MS"},
                    {"name": "Morocco", "code": "MA"},
                    {"name": "Mozambique", "code": "MZ"},
                    {"name": "Myanmar", "code": "MM"},
                    {"name": "Namibia", "code": "NA"},
                    {"name": "Nauru", "code": "NR"},
                    {"name": "Nepal", "code": "NP"},
                    {"name": "Netherlands", "code": "NL"},
                    {"name": "Netherlands Antilles", "code": "AN"},
                    {"name": "New Caledonia", "code": "NC"},
                    {"name": "New Zealand", "code": "NZ"},
                    {"name": "Nicaragua", "code": "NI"},
                    {"name": "Niger", "code": "NE"},
                    {"name": "Nigeria", "code": "NG"},
                    {"name": "Niue", "code": "NU"},
                    {"name": "Norfolk Islands", "code": "NF"},
                    {"name": "Northern Marianas", "code": "MP"},
                    {"name": "Norway", "code": "NO"},
                    {"name": "Oman", "code": "OM"},
                    {"name": "Pakistan", "code": "PK"},
                    {"name": "Palau", "code": "PW"},
                    {"name": "Palestinian Territory, Occupied", "code": "PS"},
                    {"name": "Panama", "code": "PA"},
                    {"name": "Papua New Guinea", "code": "PG"},
                    {"name": "Paraguay", "code": "PY"},
                    {"name": "Peru", "code": "PE"},
                    {"name": "Philippines", "code": "PH"},
                    {"name": "Pitcairn", "code": "PN"},
                    {"name": "Poland", "code": "PL"},
                    {"name": "Portugal", "code": "PT"},
                    {"name": "Puerto Rico", "code": "PR"},
                    {"name": "Qatar", "code": "QA"},
                    {"name": "Reunion", "code": "RE"},
                    {"name": "Romania", "code": "RO"},
                    {"name": "Russian Federation", "code": "RU"},
                    {"name": "RWANDA", "code": "RW"},
                    {"name": "Saint Helena", "code": "SH"},
                    {"name": "Saint Kitts and Nevis", "code": "KN"},
                    {"name": "Saint Lucia", "code": "LC"},
                    {"name": "Saint Pierre and Miquelon", "code": "PM"},
                    {"name": "Saint Vincent and the Grenadines", "code": "VC"},
                    {"name": "Samoa", "code": "WS"},
                    {"name": "San Marino", "code": "SM"},
                    {"name": "Sao Tome and Principe", "code": "ST"},
                    {"name": "Saudi Arabia", "code": "SA"},
                    {"name": "Senegal", "code": "SN"},
                    {"name": "Serbia", "code": "RS"},
                    {"name": "Seychelles", "code": "SC"},
                    {"name": "Sierra Leone", "code": "SL"},
                    {"name": "Singapore", "code": "SG"},
                    {"name": "Slovakia", "code": "SK"},
                    {"name": "Slovenia", "code": "SI"},
                    {"name": "Solomon Islands", "code": "SB"},
                    {"name": "Somalia", "code": "SO"},
                    {"name": "South Africa", "code": "ZA"},
                    {"name": "South Georgia and the South Sandwich Islands", "code": "GS"},
                    {"name": "Spain", "code": "ES"},
                    {"name": "Sri Lanka", "code": "LK"},
                    {"name": "Sudan", "code": "SD"},
                    {"name": "Suriname", "code": "SR"},
                    {"name": "Svalbard and Jan Mayen", "code": "SJ"},
                    {"name": "Swaziland", "code": "SZ"},
                    {"name": "Sweden", "code": "SE"},
                    {"name": "Switzerland", "code": "CH"},
                    {"name": "Syrian Arab Republic", "code": "SY"},
                    {"name": "Taiwan", "code": "TW"},
                    {"name": "Tajikistan", "code": "TJ"},
                    {"name": "Tanzania, United Republic of", "code": "TZ"},
                    {"name": "Thailand", "code": "TH"},
                    {"name": "Timor-Leste", "code": "TL"},
                    {"name": "Togo", "code": "TG"},
                    {"name": "Tokelau", "code": "TK"},
                    {"name": "Tonga", "code": "TO"},
                    {"name": "Trinidad and Tobago", "code": "TT"},
                    {"name": "Tunisia", "code": "TN"},
                    {"name": "Turkey", "code": "TR"},
                    {"name": "Turkmenistan", "code": "TM"},
                    {"name": "Turks and Caicos Islands", "code": "TC"},
                    {"name": "Tuvalu", "code": "TV"},
                    {"name": "Uganda", "code": "UG"},
                    {"name": "Ukraine", "code": "UA"},
                    {"name": "United Arab Emirates", "code": "AE"},
                    {"name": "United Kingdom", "code": "GB"},
                    {"name": "United States", "code": "US"},
                    {"name": "United States Minor Outlying Islands", "code": "UM"},
                    {"name": "Uruguay", "code": "UY"},
                    {"name": "Uzbekistan", "code": "UZ"},
                    {"name": "Vanuatu", "code": "VU"},
                    {"name": "Venezuela", "code": "VE"},
                    {"name": "Viet Nam", "code": "VN"},
                    {"name": "Virgin Islands - British", "code": "VG"},
                    {"name": "Virgin Islands - US", "code": "VI"},
                    {"name": "Wallis and Futuna", "code": "WF"},
                    {"name": "Western Sahara", "code": "EH"},
                    {"name": "Yemen", "code": "YE"},
                    {"name": "Zambia", "code": "ZM"},
                    {"name": "Zimbabwe", "code": "ZW"}
                ];

                for (var i = 0; i < countries.length; i++) {
                    if (countries[i].name == country) {
                        var countryCode = countries[i].code;
                        readyDataArr.push({'hc-key': countryCode.toLowerCase(), 'value': count});
                    }
                }
            });

            loadChart(JSON.stringify(readyDataArr));
        }
    });

    //Draw Chart
    function loadChart(data) {

        data = JSON.parse(data);

        $('#mapContainer').highcharts('Map', {
            chart: {
                map: 'custom/world',
                margin: 0
            },
            credits: {
                enabled: false
            },
            title: {
                text: 'Countries Visited',
                style: {
                    fontWeight: 'bold'
                }
            },
            mapNavigation: {
                enabled: true,
                buttonOptions: {
                    verticalAlign: 'bottom'
                }
            },
            colorAxis: {
                min: 0
            },
            series: [{
                data: data,
                joinBy: 'hc-key',
                name: 'Count',
                states: {
                    hover: {
                        color: '#BADA55'
                    }
                },
                dataLabels: {
                    enabled: true,
                    format: '{point.value}'
                }
            }]
        });

    }

    //Today Queue
    todayQueue();
    function todayQueue() {
        $.ajax({
            url: 'dashboardLoadData',
            type: 'POST',
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'todayQueue'
            },
            success: function (data) {

                $('#totalQueue').text(data.result[0].counttodayqueue);
            }
        });
    }

    //Currently Issued Tokens
    currentlyIssuedForToday();
    function currentlyIssuedForToday() {
        $.ajax({
            url: 'dashboardLoadData',
            type: 'POST',
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'currentlyIssuedForToday'
            },
            success: function (data) {

                $('#currentlyIssuedForToday').text(data.result);
            }
        });
    }

    //Currently Completed Tokens
    currentlyServedForToday();
    function currentlyServedForToday() {
        $.ajax({
            url: 'dashboardLoadData',
            type: 'POST',
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'currentlyServedForToday'
            },
            success: function (data) {

                $('#currentlyServedForToday').text(data.result);
            }
        });
    }

    //Not Available Tokens
    notAvailableList();
    function notAvailableList() {
        $.ajax({
            url: 'dashboardLoadData',
            type: 'POST',
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'notAvailableList'
            },
            success: function (data) {

                $('#notAvailableList').text(data.result);
            }
        });
    }

    //================================== Chart for Show Refreshing Progress ================================

    var bar1 = new ProgressBar.Circle(currentlyIssuedProg, {
        color: '#FFEA82',
        trailColor: '#eee',
        trailWidth: 1,
        duration: 10000,
        easing: 'easeInOut',
        strokeWidth: 15,
        from: {color: '#FFEA82', a: 0},
        to: {color: '#ED6A5A', a: 1},
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);

            // var value = Math.round(circle.value() * 100);
            // if (value === 0) {
            //     circle.setText('');
            // } else {
            //     circle.setText(value);
            // }

        }
    });

    var bar2 = new ProgressBar.Circle(currentlyServedProg, {
        color: '#FFEA82',
        trailColor: '#eee',
        trailWidth: 1,
        duration: 20000,
        easing: 'easeInOut',
        strokeWidth: 15,
        from: {color: '#aaa', a: 0},
        to: {color: '#333', a: 1},
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);
        }
    });

    var bar3 = new ProgressBar.Circle(notAvailableProg, {
        color: '#FFEA82',
        trailColor: '#eee',
        trailWidth: 1,
        duration: 60000,
        easing: 'easeInOut',
        strokeWidth: 15,
        from: {color: '#000', a: 0},
        to: {color: '#fff', a: 1},
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);
        }
    });

    var bar4 = new ProgressBar.Circle('.currentTokensCounUpdateProg', {
        color: '#FFEA82',
        trailColor: '#eee',
        trailWidth: 1,
        duration: 10000,
        easing: 'easeInOut',
        strokeWidth: 28,
        from: {color: '#EEEA82', a: 0},
        to: {color: '#886A5A', a: 1},
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);
        }
    });

    var bar5 = new ProgressBar.Circle('.currentTokensCounUpdateCounselling', {
        color: '#FFEA82',
        trailColor: '#eee',
        trailWidth: 1,
        duration: 10000,
        easing: 'easeInOut',
        strokeWidth: 28,
        from: {color: '#fbe9e7', a: 0},
        to: {color: '#d84315', a: 1},
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);
        }
    });

    var bar6 = new ProgressBar.Circle('.currentTokensCounUpdateCXR', {
        color: '#FFEA82',
        trailColor: '#eee',
        trailWidth: 1,
        duration: 10000,
        easing: 'easeInOut',
        strokeWidth: 28,
        from: {color: '#1565c0', a: 0},
        to: {color: '#BBDD5A', a: 1},
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);
        }
    });

    var bar7 = new ProgressBar.Circle('.currentTokensCounUpdatePhlebotomy', {
        color: '#FFEA82',
        trailColor: '#eee',
        trailWidth: 1,
        duration: 10000,
        easing: 'easeInOut',
        strokeWidth: 28,
        from: {color: '#CCEA82', a: 0},
        to: {color: '#00938f', a: 1},
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);
        }
    });

    var bar8 = new ProgressBar.Circle('.currentTokensCounUpdateConsultation', {
        color: '#FFEA82',
        trailColor: '#eee',
        trailWidth: 1,
        duration: 10000,
        easing: 'easeInOut',
        strokeWidth: 28,
        from: {color: '#BBBA82', a: 0},
        to: {color: '#33BB5A', a: 1},
        step: function (state, circle) {
            circle.path.setAttribute('stroke', state.color);
        }
    });

    bar1.animate(1);
    bar2.animate(1);
    bar3.animate(1);
    bar4.animate(1);
    bar5.animate(1);
    bar6.animate(1);
    bar7.animate(1);
    bar8.animate(1);

    setInterval(function () {
        bar1.set(0);
        bar1.animate(1);
        bar4.set(0);
        bar4.animate(1);
        bar5.set(0);
        bar5.animate(1);
        bar6.set(0);
        bar6.animate(1);
        bar7.set(0);
        bar7.animate(1);
        bar8.set(0);
        bar8.animate(1);
        currentlyIssuedForToday();
        registrationCountersCurrentTokens();
        counsellingCountersCurrentTokens();
        cxrCountersCurrentTokens();
        phlebotomyCountersCurrentTokens();
        consultationCountersCurrentTokens();
    }, 10000);

    setInterval(function () {
        bar2.set(0);
        bar2.animate(1);
        currentlyServedForToday();
    }, 20000);

    setInterval(function () {
        bar3.set(0);
        bar3.animate(1);
        notAvailableList();
    }, 60000);

    //======================================================================================================

    //Registration Counters Current Tokens
    registrationCountersCurrentTokens();
    function registrationCountersCurrentTokens() {

        $.ajax({
            url: 'dashboardLoadData',
            type: 'POST',
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'registrationCountersCurrentTokens'
            },
            success: function (data) {

                if (data.counter1 == null) {
                    $('#regCou1').text('-');
                } else {
                    $('#regCou1').text(data.counter1);
                }
                if (data.counter2 == null) {
                    $('#regCou2').text('-');
                } else {
                    $('#regCou2').text(data.counter2);
                }
                if (data.counter3 == null) {
                    $('#regCou3').text('-');
                } else {
                    $('#regCou3').text(data.counter3);
                }
                if (data.counter4 == null) {
                    $('#regCou4').text('-');
                } else {
                    $('#regCou4').text(data.counter4);
                }
                if (data.counter5 == null) {
                    $('#regCou5').text('-');
                } else {
                    $('#regCou5').text(data.counter5);
                }
                if (data.counter6 == null) {
                    $('#regCou6').text('-');
                } else {
                    $('#regCou6').text(data.counter6);
                }
            }
        });
    }


    //Counselling Counters Current Tokens
    counsellingCountersCurrentTokens();
    function counsellingCountersCurrentTokens() {

        $.ajax({
            url: 'dashboardLoadData',
            type: 'POST',
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'counsellingCountersCurrentTokens'
            },
            success: function (data) {

                if (data.counter1) {
                    $('#counCou1').text(data.counter1);
                } else {
                    $('#counCou1').text('-');
                }

                if (data.counter2) {
                    $('#counCou2').text(data.counter2);
                } else {
                    $('#counCou2').text('-');
                }
            }
        });
    }


    //CXR Counters Current Tokens
    cxrCountersCurrentTokens();
    function cxrCountersCurrentTokens() {

        $.ajax({
            url: 'dashboardLoadData',
            type: 'POST',
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'cxrCountersCurrentTokens'
            },
            success: function (data) {

                if (data.counter1) {
                    $('#cxrCou1').text(data.counter1);
                } else {
                    $('#cxrCou1').text('-');
                }

                if (data.counter2) {
                    $('#cxrCou2').text(data.counter2);
                } else {
                    $('#cxrCou2').text('-');
                }
            }
        });
    }


    //Phlebotomy Counters Current Tokens
    phlebotomyCountersCurrentTokens();
    function phlebotomyCountersCurrentTokens() {

        $.ajax({
            url: 'dashboardLoadData',
            type: 'POST',
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'phlebotomyCountersCurrentTokens'
            },
            success: function (data) {

                if (data.counter1) {
                    $('#phlCou1').text(data.counter1);
                } else {
                    $('#phlCou1').text('-');
                }

                if (data.counter2) {
                    $('#phlCou2').text(data.counter2);
                } else {
                    $('#phlCou2').text('-');
                }
            }
        });
    }


    //Consultation Counters Current Tokens
    consultationCountersCurrentTokens();
    function consultationCountersCurrentTokens() {

        $.ajax({
            url: 'dashboardLoadData',
            type: 'POST',
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                command: 'consultationCountersCurrentTokens'
            },
            success: function (data) {

                if (data.counter1) {
                    $('#conCou1').text(data.counter1);
                } else {
                    $('#conCou1').text('-');
                }

                if (data.counter2) {
                    $('#conCou2').text(data.counter2);
                } else {
                    $('#conCou2').text('-');
                }

                if (data.counter3) {
                    $('#conCou3').text(data.counter3);
                } else {
                    $('#conCou3').text('-');
                }

                if (data.counter4) {
                    $('#conCou4').text(data.counter4);
                } else {
                    $('#conCou4').text('-');
                }
            }
        });
    }

});
