$(document).ready(function () {

    //load groups
    loadGroups();

    function loadGroups() {
        $.ajax({
            url: 'ControlPanel',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { function: 'loadUserGroups' },
            success: function (data) {
                var options = '';
                options += '<option disabled="disabled" selected="selected">Select</option>';
                $(data.result).each(function (key, val) {
                    options += '<option value="' + val.group_serial + '">' + val.group_id + '</option>';
                });

                $('#drpgroupID').html("");
                $('#drpgroupID').html(options);
            }
        });
    }

    //user group save
    $('#grpSave').on('click', function () {
        if (validate('#newUserGroup')) {

            if (!$('#drpgroupID').is(':visible')) {

                var grpId = $('#txtgroupID').val();
                var grpName = $('#userGrpName').val();
                var status = $('#grpStatus').val();

                $.ajax({
                    url: 'ControlPanel',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        grpId: grpId,
                        grpName: grpName,
                        status: status,
                        function: 'saveUserGroup'
                    },
                    success: function (data) {
                        if (data.result == true) {
                            Swal.fire({
                                type: 'success',
                                title: 'Data Saved Successfully!',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ok'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error Saving Data!',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ok'
                            });
                        }

                        loadGroups();

                    }
                });
            } else {

                var grpSerial = $('#drpgroupID').val();
                var grpName = $('#userGrpName').val();
                var status = $('#grpStatus').val();

                $.ajax({
                    url: 'ControlPanel',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        grpSerial: grpSerial,
                        grpName: grpName,
                        status: status,
                        function: 'updateUserGroup'
                    },
                    success: function (data) {
                        if (data.result == true) {
                            Swal.fire({
                                type: 'success',
                                title: 'Data Updated Successfully!',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ok'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error Saving Data!',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ok'
                            });
                        }

                        loadGroups();

                    }
                });

            }
        }
    });

    //user group lookup
    $('#grpLookup').on('click', function () {

        $('#drpgroupID').show();
        $('#txtgroupID').hide();

        $('#txtgroupID').attr('validate', false);
        loadGroups();
    });

    //user groupID dropdown change
    $('#drpgroupID').on('change', function () {

        var grpID = $(this).val();

        $.ajax({
            url: 'ControlPanel',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                grpID: grpID,
                function: 'loadUserGroupDetails'
            },
            success: function (data) {
                $(data.result).each(function (key, val) {
                    $('#userGrpName').val(val.group_name);
                    $('#grpStatus').val(val.status);
                });
            }
        });
    });

    //user group clear
    $('#grpRefresh').on('click', function () {
        location.reload();
    });

    //user details clear
    $('#userRefresh').on('click', function () {
        location.reload();
    });

    //load users
    loadUsers();
    function loadUsers() {
        $.ajax({
            url: 'ControlPanel',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { function: 'loadUsers' },
            success: function (data) {
                var options = '';
                options += '<option disabled="disabled" selected="selected">Select</option>';
                $(data.result).each(function (key, val) {
                    options += '<option value="' + val.user_serial + '">' + val.user_id + '</option>';
                });

                $('#drpuserID').html("");
                $('#drpuserID').html(options);
            }
        });
    }

    //user details save
    $('#userSave').on('click', function () {
        if (validate('#userDetails')) {

            if (!$('#drpuserID').is(':visible')) {

                var userId = $('#txtUserId').val();
                var title = $('#drpTitle').val();
                var firstName = $('#txtFirstName').val();
                var lastName = $('#txtLastName').val();
                var email = $('#txtEmail').val();
                var telNo = $('#txtTelNo').val();
                var address = $('#txtUserAddress').val();
                var status = $('#drpUserStatus').val();

                $.ajax({
                    url: 'ControlPanel',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        userId: userId,
                        title: title,
                        firstName: firstName,
                        lastName: lastName,
                        email: email,
                        telNo: telNo,
                        address: address,
                        status: status,
                        function: 'saveUserDetails'
                    },
                    success: function (data) {
                        if (data.result == true) {
                            Swal.fire({
                                type: 'success',
                                title: 'Data Saved Successfully!',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ok'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error Saving Data!',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ok'
                            });
                        }

                        loadUsers();

                    }
                });
            } else {

                var userSerial = $('#drpuserID').val();
                var title = $('#drpTitle').val();
                var firstName = $('#txtFirstName').val();
                var lastName = $('#txtLastName').val();
                var email = $('#txtEmail').val();
                var telNo = $('#txtTelNo').val();
                var address = $('#txtUserAddress').val();
                var status = $('#drpUserStatus').val();


                $.ajax({
                    url: 'ControlPanel',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        userSerial: userSerial,
                        title: title,
                        firstName: firstName,
                        lastName: lastName,
                        email: email,
                        telNo: telNo,
                        address: address,
                        status: status,
                        function: 'updateUserDetails'
                    },
                    success: function (data) {
                        if (data.result == true) {
                            Swal.fire({
                                type: 'success',
                                title: 'Data Updated Successfully!',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ok'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error Saving Data!',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ok'
                            });
                        }

                        loadUsers();

                    }
                });

            }
        }
    });

    //user details lookup
    $('#userLookUp').on('click', function () {
        $('#drpuserID').show();
        $('#txtUserId').hide();

        $('#txtUserId').attr('validate', false);
        loadUsers();
    });

    //user Id dropdown change
    $('#drpuserID').on('change', function () {

        var userId = $(this).val();

        $.ajax({
            url: 'ControlPanel',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                userId: userId,
                function: 'loadUserDetails'
            },
            success: function (data) {
                $(data.result).each(function (key, val) {
                    $('#drpTitle').val(val.title);
                    $('#txtFirstName').val(val.first_name);
                    $('#txtLastName').val(val.last_name);
                    $('#txtEmail').val(val.email);
                    $('#txtTelNo').val(val.tel_no);
                    $('#txtUserAddress').val(val.address);
                    $('#drpUserStatus').val(val.status);
                });
            }
        });
    });


    //login details refresh
    $('#loginRefresh').on('click', function () {
        location.reload();
    });

    //Check for characters in password
    $("#txtLogDetPassword").keyup(checkPwd);

    function checkPwd() {
        var upperCase = new RegExp('[A-Z]');
        var lowerCase = new RegExp('[a-z]');
        var numbers = new RegExp('[0-9]');
        var punctuation = new RegExp('[!@#$%]');
        var str = document.getElementById('txtLogDetPassword').value;

        if (str.length >= 8) {
            $("#eight-plus").css("color", "#28C928");
        } else {
            $("#eight-plus").css("color", "black");
        }

        if ($('#txtLogDetPassword').val().match(upperCase)) {
            $("#uppercase").css("color", "#28C928");
        } else {
            $("#uppercase").css("color", "black");
        }

        if ($('#txtLogDetPassword').val().match(lowerCase)) {
            $("#lowercase").css("color", "#28C928");
        } else {
            $("#lowercase").css("color", "black");
        }

        if ($('#txtLogDetPassword').val().match(numbers)) {
            $("#numbers").css("color", "#28C928");
        } else {
            $("#numbers").css("color", "black");
        }

        if ($('#txtLogDetPassword').val().match(punctuation)) {
            $("#punctuation").css("color", "#28C928");
        } else {
            $("#punctuation").css("color", "black");
        }
    }

    //Strength Meter Init
    $("#txtLogDetPassword").strength({ showMeter: true, toggleMask: true });

    //load Users
    loadUsersForLoginDet();

    function loadUsersForLoginDet() {
        $.ajax({
            url: 'ControlPanel',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { function: 'loadUsers' },
            success: function (data) {
                var options = '';
                options += '<option disabled="disabled" selected="selected">Select</option>';
                $(data.result).each(function (key, val) {
                    options += '<option value="' + val.user_serial + '">' + val.first_name + ' ' + val.last_name + '</option>';
                });

                $('#drpLogDetUser').html("");
                $('#drpLogDetUser').html(options);
            }
        });
    }

    //load user groups for login details
    loadUserGroupsLogin();

    function loadUserGroupsLogin() {
        $.ajax({
            url: 'ControlPanel',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { function: 'loadUserGroups' },
            success: function (data) {
                var options = '';
                options += '<option disabled="disabled" selected="selected">Select</option>';
                $(data.result).each(function (key, val) {
                    options += '<option value="' + val.group_serial + '">' + val.group_name + '</option>';
                });

                $('#drpLogDetUserGroup').html("");
                $('#drpLogDetUserGroup').html(options);
            }
        });
    }

    //Check Password is Matched
    $('#txtLogDetConPassword').on('keyup', function () {

        var confirmPwd = $(this).val();
        var pwd = $('#txtLogDetPassword').val();
        if (pwd != confirmPwd) {
            $('.wrongPwd').parent().prev().addClass('has-error');
            $('.wrongPwd').text("* Confirm Password and Password Not Matching!");
        } else {
            $('.wrongPwd').parent().prev().removeClass('has-error');
            $('.wrongPwd').text("");
        }

    });


    $('#drpLogDetFloor').on('change', function () {
        var floor = $(this).val();
        loadAvailableCounters(floor);
    });

    function loadAvailableCounters(floor) {
        $.ajax({
            url: 'ControlPanel',
            type: 'POST',
            dataType: 'json',
            async: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { floor: floor, function: 'loadAvailableCounters' },
            success: function (data) {
                var options = '';
                options += '<option disabled="disabled" selected="selected">Select</option>';
                $(data.result).each(function (key, val) {
                    options += '<option value="' + val.id + '">' + val.counter_name + ' - Floor ' + val.floor + '</option>';
                });

                $('#drpSelectCounter').html("");
                $('#drpSelectCounter').html(options);
            }
        });
    }

    //login details save
    $('#loginSave').on('click', function () {

        if ($('#txtLogDetConPassword').val() == "" && passwordChecl == true) {
            Swal.fire({
                type: 'error',
                title: 'Confirm Password Required!',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'ok'
            });

            return;
        }

        var userSerial = $('#serialHiddenLD').val();

        if (!$('#txtLogDetConPassword').parent().hasClass('has-error')) {


            var name = $('#drpLogDetUser option:selected').text();
            var email = $('#txtEmailLogin').val();
            var userGrp = $('#drpLogDetUserGroup').val();
            var password = $('#txtLogDetConPassword').val();
            var floor = $('#drpLogDetFloor').val();
            var counter = $('#drpSelectCounter').val();

            if (userSerial == '') {
                var userSerial = $('#drpLogDetUser').val();

                $.ajax({
                    url: 'ControlPanel',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        userSerial: userSerial,
                        name: name,
                        email: email,
                        userGrp: userGrp,
                        password: password,
                        floor: floor,
                        counter: counter,
                        function: 'loginDetailsSave'
                    },
                    success: function (data) {
                        if (data.result == true) {
                            Swal.fire({
                                type: 'success',
                                title: 'Data Updated Successfully!',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Error Saving Data!',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK'
                            });
                        }
                    }
                });
            } else {

                var currPwd = $('#txtLogDetCurrPassword').val();
                if (currPwd == "") {
                    $.ajax({
                        url: 'ControlPanel',
                        type: 'POST',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            email: email,
                            user: userSerial,
                            userGrp: userGrp,
                            floor: floor,
                            counter: counter,
                            function: 'UpdateWithOutPWD'
                        },
                        success: function (data) {
                            if (data.result == true) {
                                Swal.fire({
                                    type: 'success',
                                    title: 'Data Updated Successfully!',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    if (result.value) {
                                        location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Error Saving Data!',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'OK'
                                });
                            }
                        }
                    });
                } else {

                    $.ajax({
                        url: 'ControlPanel',
                        type: 'POST',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            user: userSerial,
                            CurrentPwd: currPwd,
                            function: 'checkCurrentPwd'
                        },
                        success: function (data) {
                            if (data.result == true) {

                                var email = $('#txtEmailLogin').val();
                                var pword = $('#txtLogDetPassword').val();
                                var confirmpword = $('#txtLogDetConPassword').val();
                                var floor = $('#drpLogDetFloor').val();
                                //////////////////////////////////////////////////////////////////////////

                                $.ajax({
                                    url: 'ControlPanel',
                                    type: 'POST',
                                    dataType: 'json',
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        user: userSerial,
                                        email: email,
                                        pword: pword,
                                        userGrp: userGrp,
                                        confirmpword: confirmpword,
                                        floor: floor,
                                        counter: counter,
                                        function: 'UpdateWithCurrentPWD'
                                    },
                                    success: function (data) {
                                        if (data.result == true) {
                                            Swal.fire({
                                                type: 'success',
                                                title: 'Data Updated Successfully!',
                                                confirmButtonColor: '#3085d6',
                                                confirmButtonText: 'OK'
                                            }).then((result) => {
                                                if (result.value) {
                                                    location.reload();
                                                }
                                            });
                                        } else {
                                            Swal.fire({
                                                type: 'error',
                                                title: 'Error Saving Data!',
                                                confirmButtonColor: '#3085d6',
                                                confirmButtonText: 'OK'
                                            });
                                        }
                                    }
                                });
                                /////////////////////////////////////////////////////////////////
                            } else {
                                //alert("Password didn't Match.");
                                $('.NotMatchPwd').text("* Current Password Not Matching!");
                                $('#txtLogDetCurrPassword').val('');
                                $('#txtLogDetPassword').val('');
                                $('#txtLogDetConPassword').val('');
                            }
                        }
                    });
                }



            }

        }
    });


    //check user already exists
    var passwordChecl = true;
    $('#drpLogDetUser').on('change', function () {
        var $this = $(this);
        var text = $this.find('option:selected').text();

        $.ajax({
            url: 'ControlPanel',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                user: text,
                function: 'checkUserExist'
            },
            success: function (data) {
                if (data.result == true) {
                    $(data.res).each(function (key, val) {
                        $('#serialHiddenLD').val(val.user_serial);
                        $('#txtEmailLogin').val(val.email).keyup();
                        $('#drpLogDetUserGroup').val(val.user_group).change();
                        if (val.floor != null) { 
                            $('#drpLogDetFloor').val(val.floor); 
                            loadAvailableCounters(val.floor);
                        }                        
                        if (val.counter_id != null) { $('#drpSelectCounter').val(val.counter_id); }
                        $('#showHidePwd').show();
                        $('.newPwd').show();
                        passwordChecl = false;
                        $('#drpLogDetUser').attr('disabled', "disabled");
                    });
                }
            }
        });
    });

    //load user groups for user permission
    loadUserGroupValues();

    function loadUserGroupValues() {
        $.ajax({
            url: 'ControlPanel',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                function: 'loadUserGroups'
            },
            success: function (data) {
                var html = '';
                var dropDown = '<option selected="selected" disabled="disabled">Select</option>';

                $(data.result).each(function (key, val) {
                    html += '<li class="list-group-item" attr-val="' + val.group_serial + '"><span class="fa fa-check" style="color: red;color: red; padding-left: 0; padding-right: 6px;"></span>&nbsp;' + val.group_name + '';
                    html += '<ul class="list-group-submenu">';
                    html += '<li class="list-group-submenu-item"><span class="fa fa-vcard">&nbsp;View</span></li>';
                    html += '</ul></li>';

                    //                    dropDown += '<option value="' + val.GroupSerial + '">' + val.GroupName + '</option>';
                });
                $('#userGroupPanelBody').html("");
                $('#userGroupPanelBody').html(html);

                //Array Of Colors for group items
                var colors = ['success', 'info', 'warning', 'danger', 'inverse'];
                $('.list-group-submenu-item').each(function (index, element) {
                    $(element).addClass(colors[index % colors.length]);
                });

            }
        });
    }

    //Load UserPermission Table
    loadUserPermissions();

    function loadUserPermissions() {
        $.ajax({
            url: 'ControlPanel',
            type: 'POST',
            dataType: 'json',
            data: {
                function: 'loadUserPermissions'
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                var html = '';
                var i = 0;
                $(data.result).each(function (key, val) {
                    i++;

                    var pageNames = val.user_page_permission;
                    // var trrimmed = pageNames.slice(0, -1);
                    trrimmed = pageNames.replace(/([a-z])([A-Z])/g, '$1 $2');
                    var Title = trrimmed[0].toUpperCase() + trrimmed.slice(1);

                    if (pageNames == 'AppointmentCancelandReschedule') {
                        Title = 'Appointment Cancel And Reschedule';
                    } else if (pageNames == 'home1') {
                        Title = 'Dashboard';
                    }

                    html += '<tr>';
                    html += '<td class="hideCell" style="text-align: center; border-right: 1px solid #ddd;"><input class="form-control userPerSelect" id="userPerSelectId' + i + '" type="checkbox" /><label for="userPerSelectId' + i + '" style="padding: 7px 12px;"></label></td>';
                    html += '<td style="width: 266px;">' + Title + '</td>';
                    html += '<td class="hideCell" style="text-align: center;"><button type="button" class="btn btn-danger btn-xs btnReadOnly"><span class="fa fa-close"></span></button></td>';
                    html += '<td class="hideCell" style="text-align: center;"><button type="button" class="btn btn-danger btn-xs btnReadWrite"><span class="fa fa-close"></span></button></td>';
                    html += '<td style="display: none;">' + val.user_page_id + '</td>';
                    html += '<td style="display: none;">' + val.user_page_permission + '</td>';
                    html += '</tr>';
                });
                $('#userPermissionTbody').html("");
                $('#userPermissionTbody').html(html);
            }
        });
    }

    //Load Permissions for selected UserGroup
    $(document).on('click', '.list-group-item', function () {

        $('.list-group-item').not(this).removeClass('ActiveClaz');
        $(this).addClass('ActiveClaz');
        $('#userPermissionTbody tr').each(function () {
            $(this).find('td:nth-child(1)').find('.userPerSelect').prop('checked', false);
        });

        var userGroupId = $(this).attr("attr-val");

        $.ajax({
            url: 'ControlPanel',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                userGroupId: userGroupId,
                function: 'checkUserGroupPermission'
            },
            success: function (data) {
                $(data.result).each(function (key, val) {
                    var pageName = val.user_page_permission;
                    $('#userPermissionTbody tr').each(function () {
                        var tablePageName = $(this).find('td:nth-child(6)').text();
                        if (pageName == tablePageName) {
                            $(this).find('td:nth-child(1)').find('.userPerSelect').prop('checked', true);
                        }
                    });
                });
            }
        });
    });

    //Load Page Permissions on Usergroup click
    $(document).on('click', '.list-group-item', function () {

        var userGroupId = $('.ActiveClaz').attr('attr-val');

        $('#userPermissionTbody tr').each(function () {

            var rowLine = $(this);
            var pageId = $(this).find('td:nth-child(5)').text();

            rowLine.find('td:nth-child(3)').find('button').addClass('btnReadOnly btn-danger').removeClass('btnReadOnlyTrue btn-success');
            rowLine.find('td:nth-child(3)').find('button').find('span').addClass('fa-close').removeClass('fa-check');

            rowLine.find('td:nth-child(4)').find('button').addClass('btnReadWrite btn-danger').removeClass('btnReadWriteTrue btn-success');
            rowLine.find('td:nth-child(4)').find('button').find('span').addClass('fa-close').removeClass('fa-check');


            $.ajax({
                url: 'ControlPanel',
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    pageId: pageId,
                    userGroupId: userGroupId,
                    function: 'checkPagePermissions'
                },
                success: function (data) {
                    $(data.result).each(function (key, val) {

                        if (val.read_only == 'true') {
                            rowLine.find('td:nth-child(3)').find('button').addClass('btnReadOnlyTrue btn-success').removeClass('btnReadOnly btn-danger');
                            rowLine.find('td:nth-child(3)').find('button').find('span').addClass('fa-check').removeClass('fa-close');

                        } else if (val.read_write == 'true') {
                            rowLine.find('td:nth-child(4)').find('button').addClass('btnReadWriteTrue btn-success').removeClass('btnReadWrite btn-danger');
                            rowLine.find('td:nth-child(4)').find('button').find('span').addClass('fa-check').removeClass('fa-close');
                        }

                    });
                }
            });
        });
    });

    //Change User Permission
    $(document).on('change', '.userPerSelect', function () {
        var pageId = $(this).parent().parent().find('td:nth-child(5)').text();
        var userGroupId = $('.ActiveClaz').attr('attr-val');
        var functionFor = "";


        if ($(this).is(':checked')) {
            functionFor = 'insertUserPermission';
        } else {
            functionFor = "deleteUserPermission";

            $(this).parent().next().next().find('button').addClass('btnReadOnly btn-danger').removeClass('btnReadOnlyTrue btn-success');
            $(this).parent().next().next().find('button').find('span').addClass('fa-close').removeClass('fa-check');

            $(this).parent().next().next().next().find('button').addClass('btnReadWrite btn-danger').removeClass('btnReadWriteTrue btn-success');
            $(this).parent().next().next().next().find('button').find('span').addClass('fa-close').removeClass('fa-check');
        }

        $.ajax({
            url: 'ControlPanel',
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                pageId: pageId,
                userGroupId: userGroupId,
                function: functionFor
            },
            success: function (data) {
                if (data.result == true) {
                    iziToast.success({
                        // title: 'Caution',
                        // position: 'center',
                        message: 'Record Save Successfully!',
                    });
                    // showalert("success", " Record Save Successfully!", 2000);
                }

            }
        });
    });

    //Change ReadOnly Permission
    $(document).on('click', '.btnReadOnly,.btnReadOnlyTrue', function () {

        if ($(this).parent().parent().find('td:nth-child(1)').find('.userPerSelect').is(':checked')) {

            var ert = $(this);
            var pageId = $(this).parent().parent().find('td:nth-child(5)').text();
            var userGroupId = $('.ActiveClaz').attr('attr-val');
            var className = $(this).attr('class');

            $.ajax({
                url: 'ControlPanel',
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    pageId: pageId,
                    userGroupId: userGroupId,
                    className: className,
                    function: 'updateUserPermission'
                },
                success: function (data) {
                    if (data.result == true) {
                        if (className == "btn btn-xs btnReadOnlyTrue btn-success") {
                            ert.addClass('btnReadOnly btn-danger').removeClass('btnReadOnlyTrue btn-success');
                            ert.find('span').addClass('fa-close').removeClass('fa-check');
                        } else {
                            ert.addClass('btnReadOnlyTrue btn-success').removeClass('btnReadOnly btn-danger');
                            ert.find('span').addClass('fa-check').removeClass('fa-close');
                        }
                        iziToast.success({
                            // title: 'Caution',
                            // position: 'center',
                            message: 'Record Save Successfully!',
                        });
                    }
                }
            });


            //============================================


            var eew = ert.parent().next('td').find('button');

            $.ajax({
                url: 'ControlPanel',
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    pageId: pageId,
                    userGroupId: userGroupId,
                    className: 'btn btn-xs btnReadWriteTrue btn-success',
                    function: 'updatePagePermissionReadWrite'
                },
                success: function (data) {
                    if (data.result == true) {
                        eew.addClass('btnReadWrite btn-danger').removeClass('btnReadWriteTrue btn-success');
                        eew.find('span').addClass('fa-close').removeClass('fa-check');
                    }
                }
            });


        } else {
            swal({
                title: "Please First Select Permission!",
                type: "warning",
                showCancelButton: false,
                confirmButtonClass: 'btn-danger',
                confirmButtonText: 'OK!'
            });
        }
    });

    //Change Read/Write  Permission
    $(document).on('click', '.btnReadWrite,.btnReadWriteTrue', function () {

        if ($(this).parent().parent().find('td:nth-child(1)').find('.userPerSelect').is(':checked')) {

            var ert = $(this);
            var pageId = $(this).parent().parent().find('td:nth-child(5)').text();
            var userGroupId = $('.ActiveClaz').attr('attr-val');
            var className = $(this).attr('class');

            $.ajax({
                url: 'ControlPanel',
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    pageId: pageId,
                    userGroupId: userGroupId,
                    className: className,
                    function: 'updatePagePermissionReadWrite'
                },
                success: function (data) {
                    if (data.result == true) {
                        if (className == "btn btn-xs btnReadWriteTrue btn-success") {
                            ert.addClass('btnReadWrite btn-danger').removeClass('btnReadWriteTrue btn-success');
                            ert.find('span').addClass('fa-close').removeClass('fa-check');
                        } else {
                            ert.addClass('btnReadWriteTrue btn-success').removeClass('btnReadWrite btn-danger');
                            ert.find('span').addClass('fa-check').removeClass('fa-close');
                        }
                        // showalert("success", " Record Save Successfully!", 2000);
                        iziToast.success({
                            // title: 'Caution',
                            // position: 'center',
                            message: 'Record Save Successfully!',
                        });
                    }
                }
            });


            //============================================

            var eew = ert.parent().prev('td').find('button');

            $.ajax({
                url: 'ControlPanel',
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    pageId: pageId,
                    userGroupId: userGroupId,
                    className: 'btn btn-xs btnReadOnlyTrue btn-success',
                    function: 'updateUserPermission'
                },
                success: function (data) {
                    if (data.result == true) {
                        eew.addClass('btnReadOnly btn-danger').removeClass('btnReadOnlyTrue btn-success');
                        eew.find('span').addClass('fa-close').removeClass('fa-check');
                    }
                }
            });

        } else {
            swal({
                title: "Please First Select Permission!",
                type: "warning",
                showCancelButton: false,
                confirmButtonClass: 'btn-danger',
                confirmButtonText: 'OK!'
            });
        }

    });


});