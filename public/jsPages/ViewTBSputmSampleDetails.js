

LodeReciveAllLabNo();


function LodeReciveAllLabNo() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'reciveAllLabNo',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
        },
        success: function (data) {

            var html = "";
            html += "<option></option>";
            $(data.result).each(function (key, val) {
                 html += "<option>" +  val.labno+ "</option>";
            });
            $('#LabNo').html(html);
        }
    });
}

$('#btnSearch').on('click',function () {
    var LabNo=$('#LabNo').val();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: 'LabNoWiseSearch',
        type: 'POST',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            LabNo:LabNo
        },
        success: function (data) {
            // var html = "";
            var html="";
            var i=0;
            $(data.result).each(function (key, val) {
                // html += "<option>" +  val.labno+ "</option>";
                i++;
                html+='<tr>';
                html+='<td style="display: none;">HIDE_detail</td>';
                html+='<td>'+i+'</td>';
                html+='<td>'+val.barcode+'</td>';
                html+='<td>'+val.Gender+'</td>';
                html+='<td>'+val.date+'</td>';
                html+='<td>'+val.time+'</td>';
                html+='<td>'+val.labno+'</td>';
                html+='<td><button class="btn btn-info">View</button></td>';
                html+='</tr>';
            });
            $('#familyMemTBody').html(html);
        }
    });
});

