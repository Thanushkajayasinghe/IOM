$(document).ready(function () {

    loadTable();

    function loadTable() {

        wait();

        $.ajax({
            url: 'AppointmentNoStatusLoadTable',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {},
            success: function (data) {

                var html = "";
                var co = 0;

                $(data.result).each(function (key, val) {
                    co++;
                    html += "<tr>";
                    var token = val.temp_token_no;
                    html += "<td>" + token + "</td>";
                    html += "<td>" + val.temp_app_no + "</td>";
                    if (token < 500) {
                        if (val.temp_reg == 4) {
                            var dt = new Date(val.regitration);
                            var timeReg = (dt.getHours() < 10 ? "0" : "") + dt.getHours() + ":" + (dt.getMinutes() < 10 ? "0" : "") + dt.getMinutes() + ":" + (dt.getSeconds() < 10 ? "0" : "") + dt.getSeconds();
                            html += "<td class='tooltipx'><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"><span class=\"tooltiptext\"> Time: " + timeReg + "</span></td>";
                        } else {
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                        }
                        if (val.temp_counsel == 4) {
                            var dtCou = new Date(val.counselling);
                            var timeCou = (dtCou.getHours() < 10 ? "0" : "") + dtCou.getHours() + ":" + (dtCou.getMinutes() < 10 ? "0" : "") + dtCou.getMinutes() + ":" + (dtCou.getSeconds() < 10 ? "0" : "") + dtCou.getSeconds();
                            html += "<td class='tooltipx'><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"><span class=\"tooltiptext\"> Time: " + timeCou + "</span></td>";
                        } else {
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                        }
                        if (val.temp_payment == 4) {
                            html += "<td><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"></td>";
                        } else {
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                        }
                        if (val.temp_cxr == 4) {
                            var dtCxr = new Date(val.cxr);
                            var timeCxr = (dtCxr.getHours() < 10 ? "0" : "") + dtCxr.getHours() + ":" + (dtCxr.getMinutes() < 10 ? "0" : "") + dtCxr.getMinutes() + ":" + (dtCxr.getSeconds() < 10 ? "0" : "") + dtCxr.getSeconds();
                            html += "<td class='tooltipx'><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"><span class=\"tooltiptext\"> Time: " + timeCxr + "</span></td>";
                        } else {
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                        }
                        if (val.temp_radiology == 4) {
                            html += "<td><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"></td>";
                        } else {
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                        }
                        if (val.temp_phlebotomy == 4) {
							
							if(val.lab != null){
								if (val.phlbotomy == null) {
									html += "<td><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"></td>";
								} else {
									var dtPhl = new Date(val.phlbotomy);
									var timePhl = (dtPhl.getHours() < 10 ? "0" : "") + dtPhl.getHours() + ":" + (dtPhl.getMinutes() < 10 ? "0" : "") + dtPhl.getMinutes() + ":" + (dtPhl.getSeconds() < 10 ? "0" : "") + dtPhl.getSeconds();
									html += "<td class='tooltipx'><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"><span class=\"tooltiptext\"> Time: " + timePhl + "</span></td>";
								}
								var dtLab = new Date(val.lab);
								var timeLab = (dtLab.getHours() < 10 ? "0" : "") + dtLab.getHours() + ":" + (dtLab.getMinutes() < 10 ? "0" : "") + dtLab.getMinutes() + ":" + (dtLab.getSeconds() < 10 ? "0" : "") + dtLab.getSeconds();
								html += "<td class='tooltipx'><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"><span class=\"tooltiptext\"> Time: " + timeLab + "</span></td>";
							}else{
								var dtPhl = new Date(val.phlbotomy);
								var timePhl = (dtPhl.getHours() < 10 ? "0" : "") + dtPhl.getHours() + ":" + (dtPhl.getMinutes() < 10 ? "0" : "") + dtPhl.getMinutes() + ":" + (dtPhl.getSeconds() < 10 ? "0" : "") + dtPhl.getSeconds();
								html += "<td class='tooltipx'><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"><span class=\"tooltiptext\"> Time: " + timePhl + "</span></td>";
								html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
							}							
                            
                        } else if (val.temp_phlebotomy == 5) {
                            var dtPhl = new Date(val.phlbotomy);
                            var timePhl = (dtPhl.getHours() < 10 ? "0" : "") + dtPhl.getHours() + ":" + (dtPhl.getMinutes() < 10 ? "0" : "") + dtPhl.getMinutes() + ":" + (dtPhl.getSeconds() < 10 ? "0" : "") + dtPhl.getSeconds();
                            html += "<td class='tooltipx'><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"><span class=\"tooltiptext\"> Time: " + timePhl + "</span></td>";
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                        } else {
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                        }
                        if (val.temp_consult == 4) {
                            var dtCon = new Date(val.consultation);
                            var timeCon = (dtCon.getHours() < 10 ? "0" : "") + dtCon.getHours() + ":" + (dtCon.getMinutes() < 10 ? "0" : "") + dtCon.getMinutes() + ":" + (dtCon.getSeconds() < 10 ? "0" : "") + dtCon.getSeconds();
                            html += "<td class='tooltipx'><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"><span class=\"tooltiptext\"> Time: " + timeCon + "</span></td>";
                        } else {
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                        }
                    } else {
                        if (val.temp_reg == 4) {
                            html += "<td><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"></td>";
                        } else {
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                        }
                        if (val.temp_counsel == 4) {
                            html += "<td><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"></td>";
                        } else {
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                        }
                        if (val.temp_payment == 4) {
                            html += "<td><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"></td>";
                        } else {
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                        }
                        if (val.temp_cxr == 4) {
                            html += "<td><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"></td>";
                        } else {
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                        }
                        if (val.temp_radiology == 4) {
                            html += "<td><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"></td>";
                        } else {
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                        }
                        if (val.temp_phlebotomy == 4) {
							if(val.lab != null){
								html += "<td><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"></td>";
								html += "<td><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"></td>";
							}else{
								html += "<td><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"></td>";
								html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
							}
                        } else if (val.temp_phlebotomy == 5) {
                            html += "<td><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"></td>";
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                        } else {
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                        }
                        if (val.temp_consult == 4) {
                            html += "<td><img src='" + imgPathBlade + "/statCheck.png' style=\"width: 26px;\"></td>";
                        } else {
                            html += "<td><img src='" + imgPathBlade + "/statClose.png' style=\"width: 26px;\"></td>";
                        }
                    }

                    html += "</tr>";
                });

                closewait();

                var table = $('#tableCoN').DataTable();
                table.destroy();
                $('#appNoStatTbody').html('');
                $('#appNoStatTbody').html(html);

            }, complete: function () {
                loadDataTable();
            }
        });
    }

    var bar1 = new ProgressBar.Line('#pendingStat', {
        strokeWidth: 2,
        easing: 'easeInOut',
        duration: 300000,
        color: '#FFEA82',
        trailColor: '#eee',
        trailWidth: 1,
        svgStyle: {width: '100%', height: '100%'},
        from: {color: '#FFEA82'},
        to: {color: '#ED6A5A'},
        step: (state, bar) => {
            bar.path.setAttribute('stroke', state.color);
        }
    });

    bar1.animate(1.0);

    var myVar = setInterval(function () {
        loadTable();
        bar1.set(0);
        bar1.animate(1);
    }, 300000);


    //Data Table Plugin Initiate
    function loadDataTable() {
        var table1 = $('#tableCoN').DataTable({
            "pageLength": 25,
            dom: 'Blfrtip',
            buttons: [
                'csv', 'excel'
            ]
        });
    }

    $(document).on('keyup', '#tableCoN_filter input', function () {

        $('#resetDT').remove();
        $('#tableCoN_filter').append('<button class="btn btn-secondary" id="resetDT" style="position: relative;left: 10px;" tabindex="0" aria-controls="tableCoN" type="button"><span>Reset</span></button>');

        clearInterval(myVar);
        bar1.stop();
    });

    $(document).on('click', '#resetDT', function () {

        bar1.destroy();

        bar1 = new ProgressBar.Line('#pendingStat', {
            strokeWidth: 2,
            easing: 'easeInOut',
            duration: 300000,
            color: '#FFEA82',
            trailColor: '#eee',
            trailWidth: 1,
            svgStyle: {width: '100%', height: '100%'},
            from: {color: '#FFEA82'},
            to: {color: '#ED6A5A'},
            step: (state, bar) => {
                bar.path.setAttribute('stroke', state.color);
            }
        });

        loadTable();
        bar1.set(0);
        bar1.animate(1);

        myVar = setInterval(function () {
            loadTable();
            bar1.set(0);
            bar1.animate(1);
        }, 300000);
    });

    $('#btnRefresh').on('click', function () {

        bar1.destroy();

        bar1 = new ProgressBar.Line('#pendingStat', {
            strokeWidth: 2,
            easing: 'easeInOut',
            duration: 300000,
            color: '#FFEA82',
            trailColor: '#eee',
            trailWidth: 1,
            svgStyle: {width: '100%', height: '100%'},
            from: {color: '#FFEA82'},
            to: {color: '#ED6A5A'},
            step: (state, bar) => {
                bar.path.setAttribute('stroke', state.color);
            }
        });

        loadTable();
        bar1.set(0);
        bar1.animate(1);

        myVar = setInterval(function () {
            loadTable();
            bar1.set(0);
            bar1.animate(1);
        }, 300000);
    });
});
