$(document).ready(function () {

    loadPendingTokens();
});

var bar1 = new ProgressBar.Line('.progressBar', {
    strokeWidth: 2,
    easing: 'easeInOut',
    duration: 60000,
    color: '#FFEA82',
    trailColor: '#eee',
    trailWidth: 1,
    svgStyle: {width: '100%', height: '25%'},
    from: {color: '#000'},
    to: {color: '#ED6A5A'},
    step: (state, bar) => {
        bar.path.setAttribute('stroke', state.color);
    }
});

bar1.animate(1.0);

setInterval(function () {
    loadPendingTokens();
    bar1.set(0);
    bar1.animate(1);
}, 60000);

function loadPendingTokens() {

    $.ajax({
        url: 'pendingTokensLoad',
        type: 'post',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {

            var cxr = '';
            $(data.cxr).each(function (key, val) {
                cxr += '<tr><td>' + val.temp_token_no + '</td></tr>';
            });

            $('#cxrPendingTokenTbody').html("");
            $('#cxrPendingTokenTbody').html(cxr);

            var phl = '';
            $(data.phl).each(function (key, val) {
                phl += '<tr><td>' + val.temp_token_no + '</td></tr>';
            });

            $('#phlPendingTokenTbody').html("");
            $('#phlPendingTokenTbody').html(phl);

            var con = '';
            $(data.con).each(function (key, val) {
                con += '<tr><td>' + val.temp_token_no + '</td></tr>';
            });

            $('#conPendingTokenTbody').html("");
            $('#conPendingTokenTbody').html(con);
        }
    });
}
