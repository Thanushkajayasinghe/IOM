$(document).ready(function () {
    Loaddata();


    // Load Data
    function Loaddata() {

        $.ajax({
            url: 'RecommendationLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                function: 'LoadData',
            },
            success: function (data) {
                var html = "";
                var no = 0;

                $(data.result).each(function (key, val) {
                    var dt = val.created_at;
                    dt = dt.split(" ")[0];

                    no++;
                    html += '<tr>';
                    html += '<td style="display: none">' + val.id + '</td>';
                    html += '<td>' + val.CurrentPassportNumber + '</td>';
                    html += '<td>' + val.FirstName + '</td>';
                    html += '<td>' + val.LastName + '</td>';
                    html += '<td></td>';
                    html += '<td>' + dt + '</td>';
                    html += '<td></td>';
                    html += '<td><input class="form-control userPerSelect cb-element" name="tblchk" id="userPerSelectId' + no + '" type="checkbox"><label for="userPerSelectId' + no + '" style="padding: 7px 12px;"></label></td>';
                    html += '</tr>';
                });

                $('#RTBody').html("");
                $('#RTBody').html(html);
            }
        });

    }


    // Save
    $('#savbtn').on('click', function () {

        Swal.fire({
            title: 'Are you sure?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Submit!'
        }).then((result) => {
            if (result.value) {

                var fields = $("input[name='tblchk']").serializeArray();

                if (fields.length != 0) {
                    var arr = [];
                    var idd = 0;

                    $('#RTBody tr').each(function () {
                        if ($(this).find(':checkbox').is(':checked')) {
                            idd = $(this).find('td:nth-child(1)').text();

                            arr.push(idd);
                        }
                    });


                    var arrayToSend = JSON.stringify(arr);

                    $.ajax({
                        url: 'RecommendationLoadData',
                        type: 'post',
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            function: 'SaveData',
                            arrayToSend: arrayToSend,

                        },
                        success: function (data) {

                            if (data.result == true) {

                                Swal.fire({
                                    type: 'success',
                                    title: 'Data Verify Successfully!',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'ok'
                                }).then((result) => {
                                    if (result.value) {
                                        location.reload();
                                    }
                                })

                            }
                        }
                    });

                } else {
                    Swal.fire(
                        'Empty Select',
                        '',
                        'warning'
                    )
                }

            }
        });
    });


    // table head chekbox
    $("#Alltblchk").on('click', function () {
        if ($("#Alltblchk").prop('checked') == true) {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        } else {
            $("input:checkbox").prop('checked', false);
        }
    });


});