<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="">

        <title>User Admin Subshare | {{Request::segment(1)}}</title>
        <link rel="icon" href="{{url('assets/img/logo.ico')}}">

        <!--CSS -->
        <link rel="stylesheet" type="text/css" href="{{url('assets/admin/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('assets/admin/css/bootstrap.min.css')}}">

        <!-- Google Font -->
        <link href="{{url('assets/cdn/googleapis.com_css family=Lato 300,400,400i,700.css')}}" rel="stylesheet">
        <link href="{{url('assets/cdn/family=Roboto.css')}}" rel="stylesheet">
        <link href="{{url('assets/cdn/family=Raleway 400,500,700,800.css')}}" rel="stylesheet">
        <link href="{{url('assets/cdn/family=Montserrat 400,600,700,800.css')}}" rel="stylesheet">
          <script src="{{url('assets/cdn/jquery.min.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{url('assets/css/tokenfield-typeahead.min.css')}}">
        <!-- Add custom CSS here -->
            <link rel="stylesheet" type="text/css" href="{{ url('assets/css/carousel.css') }} ">
        <link rel="stylesheet" type="text/css" href="{{url('assets/admin/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('assets/admin/css/custom.css')}}">

        <script src="{{url('assets/wavesurfer/wavesurfer.min.js')}}"></script>
        <script src="{{url('assets/wavesurfer/regions.min.js')}}"></script>
        <script src="{{url('assets/wavesurfer/wavesurfer.timeline.min.js')}}"></script>



<!-- search start  -->
<script type="text/javascript">
$(function()
{
    $("#searchid").keyup(function()
    {

        var searchid = $(this).val();
        var dataString = 'search='+ searchid;

        if(searchid!='')
        {

             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/search') }}",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {
                         $("#result").html(html).show();
                    }
            });
            }return false;
        });

        jQuery("#result").on("click",function(e){
            var $clicked = $(e.target);
            var $name = $clicked.find('.name').html();
            var decoded = $("<div/>").html($name).text();
            $('#searchid').val(decoded);
        });

        jQuery(document).on("click", function(e) {
            var $clicked = $(e.target);
            if (! $clicked.hasClass("search")){
            jQuery("#result").fadeOut();
            }
        });

        $('#searchid').click(function(){
            jQuery("#result").fadeIn();
        });

});
</script>
<style>
.tokenfield{
                height: auto !important;
        }
</style>
<!-- search end -->
    </head>
    <body>
        <header class="admin-header">
            <!--Container-->
            <div class="container-fluid">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="{{ url('') }}" target="_blank"><img src="{{url('assets/admin/img/logo.png')}}"></a>
                        </div>
                        <div class="navigation-area">
                            <div id="navbar" class="navbar-collapse collapse">

                             <ul class="nav navbar-nav navbar-right">
                                <li class="search-bar">


                                    <form action="" class="widget-search">
                                        <input type="search" name="" placeholder="Search" id="searchid" class="search" >
                                    </form>

                                </li>
                                <li class="button-bar">
                                    <button type="button" class="btn btn-success" onclick="location.href='{{ url('/track') }}'"><span>Submit</span><img src="{{url('assets/img/upload.png')}}"></button>
                                </li>
                            </ul>

                            <style type="text/css">
                                #result div {
                                    float: left;
                                    width: 100%;
                                    padding: 0px 14px 9px;
                                }
                            </style>
                            <div id="result" style="z-index:9999;width: 322px;position: absolute;top: 61px;background: #fff;margin: 0px 0px 0px 43px;border-radius: 10px;box-shadow: 5px 2px 14px -2px #000;""></div>


                            </div><!--/.nav-collapse -->
                            <div class="top-nav-right">
                                <ul>
                                    <li class="dropdown messages-menu">
                                        {{ \Helpers::getAdminTotalNotification() }}
                                    </li>
                                    <li class="dropdown notifications-menu">
                                        {{ \Helpers::getAdminTotalMessages() }}
                                    </li>

                                    <li class="dropdown user user-menu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            {{--<img src="{{url('assets/admin/img/avatar.png')}}" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">--}}
                                            @if( isset(Auth::user()->image) && !empty(Auth::user()->image) && Auth::user()->image != "")
                                                <img src="{{ url( Config::get('app.avatars_url') )}}/{{Auth::user()->image}}" class="img-circle img-responsive pull-left" alt="riot" style="width: 35px;height: 35px">
                                            @else
                                                <img src="{{ url( Config::get('app.avatars_url').'default-avatar.png')}}" class="img-circle img-responsive pull-left" alt="riot" style="width: 35px;height: 35px">
                                            @endif
                                            <div class="riot">
                                                <div>
                                                    <span class="dropdown profile-top-menu">
                                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="dropdown-menu drop-down-message" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item"  href="{{ url('/profile') }}/{{ Auth::user()->id }}"><i class="fa fa-user" aria-hidden="true"></i><div class="profile-nav-area"><h5>My Profile</h5></div></a>
                                                        <a class="dropdown-item" href="{{ url('/user-dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i><div class="profile-nav-area"><h5>User Dashboard</h5></div></a>
                                                        <a class="dropdown-item" href="{{ url('/settings')}}"><i class="fa fa-cog" aria-hidden="true"></i><div class="profile-nav-area"><h5>Account Settings</h5></div></a>
                                                        <a class="dropdown-item" href="#"><i class="fa fa-question-circle" aria-hidden="true"></i><div class="profile-nav-area"><h5>Help</h5></div></a>
                                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>
                                                        <div class="profile-nav-area"><h5>Log Out</h5></div></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>                                                                                            <!--/.container-fluid -->
                </nav>
                <!--nav ends-->
            </div>
              <style>

        #style_btn:hover{

            background-color: #eff3f6 !important;

        }

        .ajax-loader {


            background-color: rgba(255,255,255,0.7);

            position: fixed;
            top:0;

            z-index: +100 !important;

            width: 100%;

            height:100%;

        }



        .ajax-loader img {

            position: relative;

            top:50%;

            left:50%;

        }

    </style>
            <!--Container Ends-->
        </header>

              @include('layouts.sections.user_sidebar')

              @yield('content')


    <div class="ajax-loader">

        <img src="https://cdn-us-east.velaro.com/Content/Images/loading.gif" width="100px" class="img-responsive" />

    </div>
        </section>



        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        <script type="text/javascript" src="{{url('assets/admin/js/bootstrap.min.js')}}"></script>
        <!-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script> -->

        <script src="{{url('assets/cdn/jquery-1.11.3.min.js')}}"></script>
        <script src="{{url('assets/cdn/raphael-min.js')}}"></script>

        <script src="{{url('assets/js/bootstrap-tokenfield.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/admin/js/jQuery.circleProgressBar.js')}}"></script>
        <script type="text/javascript" src="{{url('js/jQuery.circleProgressBar.js')}}"></script>


         <script src="{{ url('assets/js/carousel.js') }} "></script>
        <script>
            $(window).ready(function() {
                $('.ajax-loader').hide();
            });

            jQuery(document).ready(function () {

                jQuery(".notif-close").click(function () {
                    jQuery(this).closest('.feed-notification').addClass('er-red');
                    jQuery(this).closest('.feed-notification-green').addClass('er-red');
                    jQuery(this).closest('.feed-notification-blue').addClass('er-red');
                    jQuery(this).closest('.feed-notification-pink').addClass('er-red');
                    jQuery(this).closest('.feed-notification-grey').addClass('er-red');
                });
            });

            $(function () {
                $('.percent').percentageLoader({
                    valElement: 'p',
                    strokeWidth: 13,
                    bgColor: '#ccd6dc',
                    ringColor: '#cb46a4',
                    textColor: '#ccd6dc',
                    fontSize: '24px',
                    radius: '8px',
                    fontWeight: '900',
                    fontfamily: 'Raleway'
                });

            });
        </script>
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-36251023-1']);
            _gaq.push(['_setDomainName', 'jqueryscript.net']);
            _gaq.push(['_trackPageview']);

            (function () {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

        </script>
        <script type="text/javascript" src="{{url('assets/js/bootstrap-notify.js')}}"></script>
        <script>
$(window).on('load',function () {

    setInterval(create_notifications, 1000000);
});
function create_notifications() {
    var call_url = "{{url('/fetchNotification')}}";
    $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': "{{ csrf_token() }}"
			}
		});
		$.ajax({
			dataType: 'json',
			 type:'POST',
			url: call_url,
			async:true,
			data: {}
		}).done(function(data){
		if(data != "no") {
		            for (var i = 0; i < data.length; i++) {
		                var print = 'Subshare Created <br>  Agreement : ' + data[i].custom_agreement + ' | Percentage : ' + data[i].percentage + '';
		                live_notify(print, data[i].id);
		            }
		        }
		});

}
function live_notify(data,id){
    $.notify('<div class="alert_box"><a href="#"><span class="icon_box"><i class="fa fa-bell"></i></span> <span class="notify_txt" style="height: 100%; width:100%; overflow: hidden !important; font-size: 10px; padding: 0px; !important; margin-top:0px;"> '+ data +' </span></a></div>', {
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
}
</script>


        @yield('script')

    </body>
</html>