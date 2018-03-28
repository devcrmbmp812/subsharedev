jQuery(function ($) {

    // $.notify('<div class="alert_box"><a href="#"><span class="icon_box"><i class="fa fa-bell"></i></span> <span class="notify_txt"><strong> Justin just subshared deal with Olivia </strong></span></a></div>', {
    //     allow_dismiss: false,
    //     type: 'default',
    //     placement: {
    //         from: 'bottom',
    //         align: 'left'
    //     }
    // });
    // setTimeout(function() {
    //     $.notifyClose('top-right');
    // }, 20000000000);

});

/*$(window).on('load',function () {

    setInterval(create_notifications, 10000);
});
function create_notifications() {
    var call_url = '/fetchNotification';
    $.post(call_url,{'_token': '{{csrf_token()}}'}, function(data){
        if(data != "no") {
            for (var i = 0; i < data.length; i++) {
                var print = 'Subshare Created <br>  Agreement : ' + data[i].custom_agreement + ' | Percentage : ' + data[i].percentage + '';
                live_notify(print, data[i].id);
            }
        }
    });
}
function live_notify(data,id){
    $.notify('<div class="alert_box" ><a href="#"><span class="icon_box"><i class="fa fa-bell"></i></span> <span class="notify_txt" style="height: 100%; width:100%; overflow: hidden !important; font-size: 10px; padding: 0px; !important;"> '+ data +' </span></a></div>', {
        allow_dismiss: false,
        type: 'default',
        placement: {
            from: 'bottom',
            align: 'left'
        }
    });
    setTimeout(function() {
        $.notifyClose('top-right');
    }, 20000000000);
}*/
