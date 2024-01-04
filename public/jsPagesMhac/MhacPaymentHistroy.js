$(document).ready(function(){
  
    $('#add').on('click', function () {
        var date = $("#datePref").val();
        var country = $("#country").val();
        $('#familyMemTable').DataTable().destroy();
    if(date==""){
        Swal.fire({
            title: 'Please select date',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',

        })
    }
    else if(country==""){
        Swal.fire({
            title: 'Please select country',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',

        })
    }
    else{
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
    
        var todayDate = yyyy + "/" + mm + "/" + dd;
    
        $.ajax({
            url: `/${getUrl()}/LoadPaymentHistoryURL`,
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                function: 'LodePayment',
                date: date,
                country: country
            },
            success: function (data) {
                var html = "";
                var amount = data.amount;
    
                $(data.result).each(function (key, val) {
    
                    if (val.passport_no != null) {
                        var today = new Date();
                        var birthDate = new Date(val.dob);
                        var age = today.getFullYear() - birthDate.getFullYear();
                        var m = today.getMonth() - birthDate.getMonth();
                        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                            age--;
                        }
    
                        html += '<tr>';
                        html += '<td></td>';
                        html += '<td>' + val.country + '</td>';
                        html += '<td>' + date + '</td>';
                        html += '<td>' + val.passport_no + '</td>';
                        html += '<td>' + val.pc_app_no + '</td>';
                        html += '<td>' + val.first_name + '</td>';
                        html += '<td>' + val.last_name + '</td>';
                        html += '<td>' + val.dob + '</td>';
                        html += '<td>' + age + '</td>';
                        html += '<td>' + val.gender + '</td>';
                        html += '<td>' + amount + '</td>';
                        html += '</tr>';
                    }
                });
    
                $('#RTBody').html("");
                $('#RTBody').html(html);
    
    
            }, complete: function () {
                loadDataTable();
            }
    
        });
    }
       
    });
    
    
    //Data Table Plugin Initiate
    function loadDataTable() {
    
        var table1 = $('#familyMemTable').DataTable({
            "pageLength": 25,
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            dom: 'Blfrtip',
            buttons: [
                'csv', 'excel'
            ],
            "order": [[1, 'asc']]
        });
    
        table1.on('order.dt search.dt', function () {
            table1.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    }
    
});