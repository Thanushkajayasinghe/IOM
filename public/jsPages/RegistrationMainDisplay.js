$(document).ready(function () {

    // LoadData();

    // function LoadData() {
    //     $.ajax({
    //         url: 'DisplayDataRead',
    //         type: 'post',
    //         dataType: 'json',
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         data: {command: 'register'},
    //         success: function (data) {
    //
    //             $("#Diplay").html('');
    //             $.each(data, function (key, val) {
    //
    //                 var center = 'Registration Counter ' + (key + 1) + '';
    //
    //                 $.ajax({
    //                     url: 'DisplayDataRead',
    //                     type: 'post',
    //                     dataType: 'json',
    //
    //                     headers: {
    //                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                     },
    //                     data: {
    //                         command: 'loadUserGroups',
    //                         userGrpName: center
    //                     },
    //                     success: function (data) {
    //                         $(data.result).each(function (key, val) {
    //                             $("#Diplay").append('<div class="col-12 row ww align-items-center"><div class="col-md-6 eachDiv" attr-group="' + val.group_serial + '"> <div class="col" style="font-size: 3rem; font-weight: bold;"> <span class="aaa">' + center + '</span> </div> </div> <div class="col-md-6 text-center" style="font-size: 3rem; font-weight: bold;" id="Token_' + (key + 1) + '"><h2>Not Operating</h2> </div></div>');
    //                         });
    //                     }
    //                 });
    //
    //
    //             });
    //         }
    //     });
    // }

    /////////////////////////////////////////////////////

    setInterval(function () {
        loadToken();
    }, 3000);

    var audioQueue = [];
    var index = 0;
    var co = 0;
    var status = 5;

    function loadToken() {

        $('#Diplay .eachDiv').each(function () {

            var userCounter = $(this).attr('attr-group');
            var $this = $(this);
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
                    command: 'tokensRegister'
                },
                // async: false,
                success: function (data) {

                    if (data.result.length == 0) {
                        if ($this.next().find('h2').text() === 'Not Opening') {
                        } else {
                            $this.next().html('');
                            $this.next().html('<h2 style="font-size: 2.5em; font-weight: bold;">-</h2>');
                        }
                    }

                    $(data.result).each(function (key, val) {

                        var tokenUpdate = $this.next().text();

                        if (tokenUpdate != val.temp_token_no) {

                            co++;

                            audioQueue.push(val['temp_token_no'] + "@" + counterText);

                            if (co == 1) {
                                playNext(index);
                            }
                            $this.next().html('');
                            $this.next().html('<h2 style="font-size: 3.5em; font-weight: bold;">' + val['temp_token_no'] + '</h2>');
                        }
                    });
                }, complete: function () {

                    if (co != 0 && co != 1) {
                        if (audioQueue.length == 0) {
                            status = 1;
                        }
                    }
                }
            });
        });

        if (status == 1 && audioQueue.length > 0) {
            status = 5;
            playNext(index);
        }

        function playNext(index) {

            if (audioQueue.length != 0) {

                var audio = new Audio(path);
                audio.play();

                audio.onended = function () {
                    function voiceStartCallback() {
                        console.log("Voice started");
                    }

                    function voiceEndCallback() {
                        console.log("Voice ended");
                        audioQueue.shift();
                        playNext(index);
                    }

                    var parameters = {
                        onstart: voiceStartCallback,
                        onend: voiceEndCallback,
                        rate: 0.9
                    };

                    var data = audioQueue[index].split("@");
                    responsiveVoice.speak("Token Number " + data[0] + " - Please Proceed to " + data[1] + "", "US English Female", parameters);

                };
            }
        }

    }

    ////////////////////////////////////////////////////////////////

    checkCounterOperating();


    function checkCounterOperating() {

        $.ajax({
            url: 'DisplayDataRead',
            type: 'post',
            dataType: 'json',

            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                counterName: 'Registration',
                command: 'checkCounterOperating'
            },
            success: function (data) {
                $(data.result).each(function (key, val) {
                    $('#Diplay .eachDiv').each(function () {
                        var userGrp = $(this).attr('attr-group');
                        var counter;

                        if (userGrp == 2) {
                            counter = 1;
                        } else if (userGrp == 3) {
                            counter = 2;
                        } else if (userGrp == 4) {
                            counter = 3;
                        } else if (userGrp == 5) {
                            counter = 4;
                        } else if (userGrp == 6) {
                            counter = 5;
                        } else if (userGrp == 7) {
                            counter = 6;
                        }

                        if (counter == val.qms_counter_no) {
                            $(this).next().html('');
                            $(this).next().html('<h2 style="font-size: 2.5em; font-weight: bold;">Not Opening</h2>');
                        } else {
                            if ($(this).next().find('h2').text() !== 'Not Opening') {
                                $(this).next().html('');
                                $(this).next().html('<h2 style="font-size: 2.5em; font-weight: bold;">-</h2>');
                            }
                        }
                    });
                });
            }
        });

    }

});
