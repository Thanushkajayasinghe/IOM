$(document).ready(function () {

    LoadData();

    function LoadData() {
        $.ajax({
            url: 'DisplayDataRead',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {command: 'Coun'},
            success: function (data) {

                $("#displayPlaceHolder").html('');

                $.each(data, function (key, val) {

                    $("#displayPlaceHolder").append('<div class="row align-items-center ww"><div class="col-md-6"><div class="col" style="font-size: 3rem; font-weight: bold;"><span class="aaa">Counselling Counter ' + (key + 1) + '</span> </div></div><div class="col-md-6 tokenDiv" id="Token_' + (key + 1) + '"><h2>Not Operating</h2></div></div>');
                    var tokenDiv = "#Token_" + (key + 1);

                });
            },
            complete: function (data) {
                $('#displayPlaceHolder .ww').each(function () {
                    var $this = $(this);
                    var counter = $this.find('.aaa').text();

                    $.ajax({
                        url: 'DisplayDataRead',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            command: 'loadUserGroups',
                            userGrpName: counter
                        },
                        success: function (data) {
                            $(data.result).each(function (key, val) {
                                $this.attr('attr-group', val.group_serial);
                            });
                        }
                    })
                    ;
                });
            }
        });
    }

    setInterval(loadToken, 3000);

    var co = 0;

    function loadToken() {

        $('#displayPlaceHolder .ww').each(function (i) {

            var userCounter = $(this).attr('attr-group');
            var $this = $(this);
            var tokenDiv = $(this).find('.tokenDiv').attr('id');
            var counterText = $(this).find('.aaa').text();

            $.ajax({
                url: 'DisplayDataRead',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    counter: userCounter,
                    command: 'tokens'
                },
                success: function (data) {
                    if (data.result.length == 0) {

                        if ($this.find('.tokenDiv').find('h2').text() == 'Not Opening') {
                        } else {
                            $('#' + tokenDiv + '').html('');
                            $('#' + tokenDiv + '').html('<div class="col-md-12"><div class="col-md-12 text-center" style="font-size: 3rem; font-weight: bold;"><h2 style="font-size: 2.5em; font-weight: bold;">-</h2></div></div>');
                        }

                    } else if (data.result.length == 1) {
                        $.each(data.result, function (key, val) {

                            co++;
                            var tokenUpdate = $this.find('.tokenDiv h2').text();

                            if (tokenUpdate != val.temp_token_no) {

                                if (co == 1) {

                                    console.log('fir')
                                    var audio = new Audio(path);
                                    audio.play();

                                    audio.onended = function () {
                                        responsiveVoice.speak("Token Number " + val['temp_token_no'] + " - Please Proceed to " + counterText + "", "US English Female", {rate: 0.8});
                                    };

                                } else {

                                    window.setTimeout(function () {

                                        console.log('set')
                                        var audio = new Audio(path);
                                        audio.play();

                                        audio.onended = function () {
                                            responsiveVoice.speak("Token Number " + val['temp_token_no'] + " - Please Proceed to " + counterText + "", "US English Female", {rate: 0.8});
                                        };
                                    }, 6000);
                                }
                            }

                            $('#' + tokenDiv + '').html('');
                            $('#' + tokenDiv + '').html('<div class="col-md-12"><div class="col-md-12 text-center" style="font-size: 3rem; font-weight: bold;"><h2 style=" font-size: 1.2em; font-weight: bold; ">' + val['temp_token_no'] + '</h2></div></div>');
                        });

                    } else {

                        var div1 = '';
                        var div2 = '';
                        var div3 = '';
                        var tokenArray = [];
                        var tokenValArray = [];

                        $.each(data.result, function (key, val) {
                            if (key <= 3) {
                                div1 += '<div class="col text-center" style="font-size: 3rem; font-weight: bold;"><h2 style=" font-size: 1.2em; font-weight: bold; ">' + val['temp_token_no'] + '</h2></div>';
                            } else if (3 < key <= 7) {
                                div2 += '<div class="col text-center" style="font-size: 3rem; font-weight: bold;"><h2 style=" font-size: 1.2em; font-weight: bold; ">' + val['temp_token_no'] + '</h2></div>';
                            } else if (7 < key <= 11) {
                                div3 += '<div class="col text-center" style="font-size: 3rem; font-weight: bold;"><h2 style=" font-size: 1.2em; font-weight: bold; ">' + val['temp_token_no'] + '</h2></div>';
                            }

                            tokenArray.push(val['temp_token_no']);
                        });

                        $('#displayPlaceHolder .ww:eq(' + i + ') .tokenDiv .col').each(function (j) {
                            tokenValArray.push(parseInt($(this).text()));
                        });

                        if (JSON.stringify(tokenArray) !== JSON.stringify(tokenValArray)) {

                            co++;

                            if (co == 1) {
                                console.log('fir')
                                var audio = new Audio(path);
                                audio.play();

                                audio.onended = function () {
                                    var stringtoken = tokenArray.join(', ');
                                    var text = "Token Number " + stringtoken + "  - Please Proceed to " + counterText + "";

                                    responsiveVoice.speak(text, "US English Female", {rate: 0.8});
                                };
                            } else {

                                window.setTimeout(function () {

                                    console.log('set')
                                    var audio = new Audio(path);
                                    audio.play();

                                    audio.onended = function () {
                                        var stringtoken = tokenArray.join(', ');
                                        var text = "Token Number " + stringtoken + "  - Please Proceed to " + counterText + "";

                                        responsiveVoice.speak(text, "US English Female", {rate: 0.8});
                                    };
                                }, 10000);
                            }
                        }


                        $('#' + tokenDiv + '').html('');
                        if (div2 == '' && div3 == '') {
                            $('#' + tokenDiv + '').html('<div class="row">' + div1 + '</div>');
                        } else if (div2 != '' && div3 == '') {
                            $('#' + tokenDiv + '').html('<div class="row">' + div1 + '</div><div class="row">' + div2 + '</div>');
                        } else {
                            $('#' + tokenDiv + '').html('<div class="row">' + div1 + '</div><div class="row">' + div2 + '</div><div class="row">' + div3 + '</div>');
                        }
                    }
                }
            });
        });

    }

    ///////////////////////////////////////
    setTimeout(function () {
        checkCounterOperating();
    }, 1000);

    function checkCounterOperating() {

        $.ajax({
            url: 'DisplayDataRead',
            type: 'post',
            dataType: 'json',

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                counterName: 'Counseling',
                command: 'checkCounterOperating'
            },
            success: function (data) {
                $('#displayPlaceHolder .ww').each(function () {
                    var $this = $(this);
                    $(data.result).each(function (key, val) {
                        var userGrp = $this.attr('attr-group');
                        var counter;

                        if (userGrp == 8) {
                            counter = 1;
                        } else if (userGrp == 9) {
                            counter = 2;
                        }

                        if (counter == val.qms_counter_no) {
                            $this.find('.tokenDiv').html('');
                            $this.find('.tokenDiv').html('<h2 style="font-size: 2.5em; font-weight: bold;">Not Opening</h2>');
                        } else {
                            if ($this.find('.tokenDiv h2').text() !== 'Not Opening') {
                                $this.find('.tokenDiv').html('');
                                $this.find('.tokenDiv').html('<h2 style="font-size: 2.5em; font-weight: bold;">-</h2>');
                            }
                        }
                    });
                });
            }
        });

    }

});
