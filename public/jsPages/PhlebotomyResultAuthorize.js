LoadData();

function LoadData() {
    wait();

    $.ajax({
        url: 'PhlResAproData',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {command: "loadDataTj"},
        success: function (data) {

            var html = "";
            $(data.res).each(function (k, v) {
                k++;

                if (v.HIV == "Positive" || v.Filaria == "Positive" || v.Malaria == "Positive" || v.SHCG == "Positive") {
                    html += '<tr style="background-color: #fb0101 !important;color: white;font-weight: bold;">';
                } else {
                    html += '<tr>';
                }
                html += '<td>' + k + '</td>';
                html += '<td>' + v.barcode + '</td>';

                if (v.HIV != null) {
                    html += '<td>' + v.HIV + '</td>';
                } else {
                    html += '<td> - </td>';
                }
                if (v.HIVComment != null) {
                    html += '<td>' + v.HIVComment + '</td>';
                } else {
                    html += '<td> - </td>';
                }
                if (v.Filaria != null) {
                    html += '<td>' + v.Filaria + '</td>';
                } else {
                    html += '<td> - </td>';
                }
                if (v.FilariaComment != null) {
                    html += '<td>' + v.FilariaComment + '</td>';
                } else {
                    html += '<td> - </td>';
                }
                if (v.Malaria != null) {
                    html += '<td>' + v.Malaria + '</td>';
                } else {
                    html += '<td> - </td>';
                }
                if (v.MalariaComment != null) {
                    html += '<td>' + v.MalariaComment + '</td>';
                } else {
                    html += '<td> - </td>';
                }
                if (v.SHCG != null) {
                    html += '<td>' + v.SHCG + '</td>';
                } else {
                    html += '<td> - </td>';
                }
                if (v.SHCGComment != null) {
                    html += '<td>' + v.SHCGComment + '</td>';
                } else {
                    html += '<td> - </td>';
                }

                html += '<td>';
                html += '<input class="form-control userPerSelect cb-element" name="tblchk" id="userPerSelectId' + k + '"  type="checkbox">';
                html += '<label for="userPerSelectId' + k + '" style="padding: 7px 12px;"></label> ';
                html += '</div>';
                html += '</td>';
                html += '</tr>';
            });

            $('#verifyStatTable').html("");
            $('#verifyStatTable').html(html);

            closewait();
        }, 
        complete: function(d){
            
        }
    });
}


// All Checkbox Select
$("#userPerSelectIdAll").on('click', function () {
    if ($("#userPerSelectIdAll").prop('checked') == true) {
        $("input:checkbox").prop('checked', true);
    } else {
        $("input:checkbox").prop('checked', false);
    }
})


// Approval Butoon
$('#btnDispatch').on('click', function () {

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
                $('#verifyStatTable tr').each(function () {
                    if ($(this).find(':checkbox').is(':checked')) {
                        var idd = $(this).find('td:nth-child(2)').text();
                        arr.push([idd]);
                    }
                });

                var arrayToSend = JSON.stringify(arr);

                $.ajax({
                    url: 'PhlResAproData',
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        arrayToSend: arrayToSend,
                        command: "approval"
                    },
                    success: function (data) {
                        if (data.result == true) {
                            swal({
                                title: "Approval Successfully!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonClass: 'btn-success',
                                confirmButtonText: 'OK!'
                            });
                        } else {
                            swal({
                                title: "Not Approval!",
                                type: "warning",
                                showCancelButton: false,
                                confirmButtonClass: 'btn-success',
                                confirmButtonText: 'OK!'
                            });
                        }
                        $("input:checkbox").prop('checked', false);
                    },complete: function(){
                        LoadData();
                    }
                });
            } else {
                swal({
                    title: "Empty Select",
                    type: "warning",
                    showCancelButton: false,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'OK!'
                });
            }
        }
    });

});
