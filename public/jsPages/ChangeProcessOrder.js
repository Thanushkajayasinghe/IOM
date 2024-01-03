//On Save button Clck
$('#saveProcessOrder').on('click', function () {

    Swal.fire({
        title: 'Are you sure?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Submit!'
    }).then((result) => {
        if (result.value) {
            var selectedOrder = $('.form-check-input-styled:checked').attr('attr-i');

            $.ajax({
                url: 'ChangeProcessOrderInsert',
                type: 'post',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    selectedOrder: selectedOrder
                },
                success: function (data) {

                    if (data.result == true) {

                        Swal(
                            'Saved Successfully!',
                            '',
                            'success'
                        );
                    }
                }, complete: function () {

                }
            });
        }
    });
});

//On Page Load
$(function () {
    $.ajax({
        url: 'ChangeProcessOrderLoad',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {

            var type = data.result[0].type;
            //Uniform checkbox check
            $('.form-check-input-styled[attr-i="' + type + '"]').prop('checked', true).uniform();
        }
    });
});
