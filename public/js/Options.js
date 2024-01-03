$(document).ready(function () {

    //Toggle Boxed Layout
    $('#boxedLayOut').on('click', function () {
        $(this).toggleClass('active');
        if ($(this).hasClass('active')) {
            $('body').addClass('layout-boxed-bg');
            $('body').wrapInner('<div id="removeWrappedDivBoxedLayout" class="d-flex flex-column flex-1 layout-boxed">');
        } else {
            $('body').removeClass('layout-boxed-bg');
            $('#wrappingEle').unwrap();
        }
    });
    
    
});
