jQuery(function ($) {

    $.notify('<div class="alert_box"><a href="#"><span class="icon_box"><i class="fa fa-bell"></i></span> <span class="notify_txt"><strong> Justin just subshared deal with Olivia </strong></span></a></div>', {
        allow_dismiss: false,
        type: 'default',
        placement: {
            from: 'bottom',
            align: 'left'
        }
    });
    setTimeout(function() {
        $.notifyClose('top-right');
    }, 60000);
});
