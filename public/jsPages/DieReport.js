$(document).ready(function () {

    $('#datePref').on('change', function () {

        var date = $(this).val();

        $.ajax({
            url: 'RecommendationLoadData',
            type: 'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                function: 'LoadDataDieReport',
                date: date
            },
            success: function (data) {

                var html = "";
                var no = 0;

                $(data.result).each(function (key, val) {

                    no++;
                    html += '<tr>';
                    html += '<td style="display: none">' + val.id + '</td>';
                    html += '<td>' + val.CurrentPassportNumber + '</td>';
                    html += '<td>' + val.FirstName + '</td>';
                    html += '<td>' + val.LastName + '</td>';
                    html += '<td><img style="width: 135px;height: 100px;" src="' + imgPathBlade + '/photoBoothFiles/' + val.reg_photo_booth + '" class="img-thumbnail" ><span></span></td>';
                    html += '<td>' + val.SponsorName + '</td>';
                    html += '<td>' + val.FinalReview + '</td>';
                    html += '</tr>';
                });

                $('#RTBody').html("");
                $('#RTBody').html(html);
            }
        });

    });


    $('#btnPrint').on('click', function () {

        var date = $('#datePref').val();
        window.open(urlPath + '/dieReportGen?date=' + date);
    });


});
