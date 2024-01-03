$(document).ready(function () {
    $('#btnSave').on('click', function () {
                var country = $('#txtcountry').val();
                var code = $('#txtcode').val();
                if (validate('#validateDiv')) {
                    $.ajax({
                        url: 'Country',
                        type: 'POST',
                        dataType: 'json', 
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            country: country,
                            code: code,
                            function: 'saveCountry'
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
                                if(data.message=='1'){
                                    Swal.fire({
                                        type: 'error',
                                        title: 'Country name already exists!',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'ok'
                                    });
                                }
                                if(data.message=='2'){
                                    Swal.fire({
                                        type: 'error',
                                        title: 'Code already exists!',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'ok'
                                    });
                                }
                               
                            }
    
                        }
                    });
                }
               
    });
    loadCountry()
    function loadCountry() {
        $.ajax({
            url: 'Country',
            type: 'POST',
            dataType: 'json',
            data: {
                function: 'loadCountry'
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                var html = '';
                var i = 0;
                $(data.result).each(function (key, val) {
                    i++;
                    html += '<tr>';
                    html += '<td style="display: none;">' + val.id + '</td>';
                    html += '<td>' + val.country_name + '</td>';
                    html += '<td>' + val.code + '</td>';
                    html += '<td style="text-align: center;"><button type="button" class="btn btn-danger btn-xs btnDelete"><span class="fa fa-close"></span></button></td>';
                    html += '</tr>';
                });
                $('#countrytbl').html("");
                $('#countrytbl').html(html);
            }
        });
    }
    $(document).on("click", ".btnDelete", function () {
        var ID = $(this).parents('tr').children('td:first').text();
        var $this = $(this);

        Swal.fire({
            title: 'Are you sure?',
            text: 'Your will not be able to recover this data!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'No',
            confirmButtonText: 'Yes',
        }).then(function (result) {
            if (result.value) {
                // User clicked 'Yes'
                if (ID == "") {
                    $this.parents('tr').remove();
                } else {
                    $.ajax({
                        url: 'Country',
                        type: 'POST',
                        data: {ID: ID, function: 'deleteCountry'},
                       
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
                        dataType: 'json',
                        success: function (data) {
                            $this.parents('tr').remove();
                            Swal.fire({text: 'Your data has been deleted!', icon: 'success'});
                        }
                    });
                }
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // User clicked 'No' or closed the modal
                // Close the Swal alert without performing any action
                Swal.close();
            }
        });
    });
});