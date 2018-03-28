<!doctype html>
<html>
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <link rel="icon" href="{{url('assets/img/favicon.png')}}" type="image/png" sizes="16x16">
    <title>Dashboard - @yield('title')</title>

    <!--CSS -->
    <link rel="stylesheet" type="text/css" href="{{url('assets/admin/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/admin/css/bootstrap.min.css')}}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/carousel.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{url('assets/admin/css/style.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/jquery.fileupload.css')}}">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="{{url('assets/cdn/jquery.min.js')}}"></script>

    <script src="{{url('assets/js/custom.js')}}"></script>
    <script src="{{url('assets/wavesurfer/wavesurfer.min.js')}}"></script>
    <script src="{{url('assets/wavesurfer/regions.min.js')}}"></script>
    <script src="{{url('assets/wavesurfer/wavesurfer.timeline.min.js')}}"></script>


    <!-- Carousel start
        <link rel="stylesheet" type="text/css" href="{{ url('assets/css/carousel.css') }} ">
        <script src="{{ url('assets/js/carousel.js') }} "></script>
     -->
    <!-- Carousel end -->

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
                    url: "{{ url('/search') }}",
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
<!-- search end -->
</head>
<body>
     <div id="loadd">
    <div id="loader"></div>
</div>
<header class="admin-header" style="z-index: 999999;">
    <style>
        /* Center the loader */
        #loadd{
            position: fixed;
            top: 0;
            bottom: 0;
            content: "";
            background: rgb(239, 243, 246);
            height: 120%;
            width: 100%;
            z-index: 999999;
            right: 0;
            left: 0;
            opacity: 0.8;
        }
        #loader {
            position: fixed;
            left: 53%;
            top: 60%;
            z-index: 1;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border: 20px solid #fff;
            border-radius: 50%;
            border-top: 20px solid #2ae281;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            background-color: #333;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Add animation to "page content" */
        .animate-bottom {
            position: relative;
            -webkit-animation-name: animatebottom;
            -webkit-animation-duration: 1s;
            animation-name: animatebottom;
            animation-duration: 1s
        }

        @-webkit-keyframes animatebottom {
            from { bottom:-100px; opacity:0 }
            to { bottom:0px; opacity:1 }
        }

        @keyframes animatebottom {
            from{ bottom:-100px; opacity:0 }
            to{ bottom:0; opacity:1 }
        }

        #myDiv {
            display: none;
            text-align: center;
        }
        .tokenfield{
                height: auto !important;
        }
    </style>
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
                    <a class="navbar-brand" href="{{ url('/') }}" target="_blank"><img src="{{url('assets/img/logo.png')  }}"></a>
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

                            <!-- display user results start -->
                            <style type="text/css">
                                #result div
                                {
                                    float: left;
                                    width: 100%;
                                    padding: 0px 14px 9px;
                                 }
                            </style>
                            <div id="result" style="z-index:9999;width: 322px;position: absolute;top: 61px;background: #fff;margin: 0px 0px 0px 43px;border-radius: 10px;box-shadow: 5px 2px 14px -2px #000;"></div>
                            <!-- display user results end -->


                    </div><!--/.nav-collapse -->
                    <div class="top-nav-right">
                        <ul>

                            <!-- notification menu start. -->
                            <li class="dropdown messages-menu">
                                {{ \Helpers::getUserTotalNotification() }}
                            </li>
                            <!-- notification menu end. -->

                            <!-- Messages  -->
                            <li class="dropdown notifications-menu">
                                {{ \Helpers::getTotalMessages() }}
                            </li>
                            <!-- #Messages -->

                            <li class="dropdown calender-menu">
                               {{ (\Helpers::getUserSubshareTotalNotification()) }}
                            </li>

                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    @if( isset(Auth::user()->image) && !empty(Auth::user()->image) && Auth::user()->image != "")
                                        <img src="{{ url( Config::get('app.avatars_url') )}}/{{Auth::user()->image}}" class="img-circle img-responsive pull-left" style="width: 35px; height: 35px;" alt="riot">
                                    @else
                                        <img src="{{ url( Config::get('app.avatars_url').'default-avatar.png')}}" class="img-circle img-responsive pull-left" style="width: 35px; height: 35px;" alt="riot">
                                    @endif


                                    <div class="riot">
                                        <div>
                                            <span class="dropdown profile-top-menu">
                                               <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            </span>
                                            <div class="dropdown-menu drop-down-message" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{ url('/profile') }}/{{ Auth::user()->id }}"><i class="fa fa-user" aria-hidden="true"></i><div class="profile-nav-area"><h5>My Profile</h5></div></a>
                                                <a class="dropdown-item" href="{{ url('/user_admin') }}"><i class="fa fa-home" aria-hidden="true"></i><div class="profile-nav-area"><h5>User Admin</h5></div></a>
                                                 <a class="dropdown-item" href="{{ url('/settings') }}"><i class="fa fa-cog" aria-hidden="true"></i><div class="profile-nav-area"><h5>Account Settings</h5></div></a>
                                               <a class="dropdown-item" href="#"><i class="fa fa-question-circle" aria-hidden="true"></i><div class="profile-nav-area"><h5>Help</h5></div></a>



                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out" aria-hidden="true"></i><div class="profile-nav-area"><h5>Logout</h5></div>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!--/.container-fluid -->
        </nav>
        <!--nav ends-->
    </div>
    <!--Container Ends-->
</header>


<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

<section class="wrapper row-offcanvas row-offcanvas-left">
    @include('layouts.sections.user_sidebar')

    @yield('content')
</section>




<script type="text/javascript" src="{{url('assets/admin/js/bootstrap.min.js')}}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="{{ url('js/vendor/jquery.ui.widget.js') }}"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="{{ url('js/jquery.iframe-transport.js') }}"></script>
<!-- The basic File Upload plugin -->
<script src="{{ url('js/jquery.fileupload.js') }}"></script>
<script type="text/javascript" src="{{url('assets/js/bootstrap-notify.js')}}"></script>
<!-- Bootstrap JS is not required, but included for the responsive demo navigation
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->

 <script src="{{ url('assets/js/carousel.js') }} "></script>
<script>
    /*jslint unparam: true */
    $(window).ready(function() {
                $("#loadd").hide();
    });

    /* global window, $ */
    $(function () {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url ='server/php/index.php';
        $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            async: true,
            done: function (e, data) {

                $(".errorMsg").remove();
                $("#fileupload").after("<p class=success>Successfully Uploaded!</p>");

                $("#loadd").hide();
                var duration = 0;
                var name = 0;
                $.each(data.result.files, function (index, file) {

                    getDuration('server/php/files/'+file.name, function(length) {
                        duration = parseInt(length)+1;

                        if(duration <= 0)
                            duration =1;

                        $.post('saveAudio',{'_token': '{{csrf_token()}}' ,'name': file.name,'duration': duration,'resub':'<?php if(isset($_GET["resub"])) { echo $_GET["resub"];}else{ echo "0";} ?>'}, function(data){
                            $("#last_id").val(data);
                        });
                    });

                    name = file.name;
                    $('<p/>').text(file.name).appendTo('#files');
                    $('.pro-sub-btn').prop('disabled', false);
                });
                //  console.log(file);

            },
            progressall: function (e, data) {
                $("#loadd").show();
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        })
         .bind('fileuploadadd', function (e, data) {

            var allowed = ['mp3','wav','ogg','aac','flac','alac','aiff','pcm'];
            var ext = data.files[0].name.split('.').pop().toLowerCase();
            if($.inArray(ext, allowed) == -1)
            {
                $("#fileupload").after("<p class=errorMsg>Invalid file type.</p>"+ "<p class=errorMsg>Allowed file types :"+ allowed +"</p>");
                return false;
            }

        })
        .prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
    function getDuration(src, cb) {
        var audio = new Audio();
        $(audio).on("loadedmetadata", function(){
            cb(audio.duration);
        });
        audio.src = src;
    }
</script>

<script>
    jQuery(document).on('click', '.browse', function () {
        var file = $(this).parent().parent().parent().find('.file');
        file.trigger('click');
    });
    jQuery(document).on('change', '.file', function () {
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
    $(".pro-sub-btn").click(function () {
        $("#track_form").show();
    });
    $("#btn_second").click(function () {
        $('.ajax-loader').css("visibility", "visible");
        if($("#percentage_done").html() == "100%")
        {
            $("#loadd").show();
            $("#error_percent").hide();

            // get all form data to send to save track method.
            var myform = document.getElementById("track_form");  // get track form all data.
            var formData = new FormData(myform);
                formData.append('last_id', $("#last_id").val() );

            $.ajax({
                type:'POST',
                url: 'saveTrack',
                data: formData, // all form data
                cache:false,
                contentType: false,
                processData: false,
                '_token': '{{csrf_token()}}' ,
                success:function(data)
                {
                      if(data)
                      {
                        $.get('loadtrack/'+ $("#last_id").val() +'',function(data){
                            if(data)
                            {
                                $("#tag_form").html(data);
                                //$("#loadd").hide();
                                $("#input_forms_data").append("<input type='hidden' name='last_id' value='"+$("#last_id").val()+"'>");
                            }
                        });
                    }
                },

            });


        }else{
            $("#error_percent").show();
        }
        $('.ajax-loader').css("visibility", "hidden");
    });
    function save_form_data(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });

        $.ajax({
            type: 'post',
            url: '{{ url("/saveTag") }}',
            data: $("#input_forms_data").serialize(),
            success: function (data) {
                // $("#success_tag").show();
                // redirect user to
                var ret_url = "<?php if(isset($_GET["resub"])) { echo url("/subshare_submit")."/".$_GET["resub"]; }else{ echo url('/your-music/?msg=Track Uploaded Successfully!! ');}?>";

                window.location.replace(ret_url);
            }
        });
    }
</script>
<script>
    var track_list = 0;
    $(document).ready(function(){
        $(".blur_check").blur(function () {
            var count = 0;

            if($("#track_title").val())
                count++;
            if($("#track_bpm").val())
                count++;
            if($("#track_genre").val())
                count++;
            if($("#track_age").val())
                count++;
            if($("#track_inspiration").val())
                count++;

            $("#progress_complete").css("width", (count*20)+'%');
            $("#progress_slider").css("left", (count*20)+'%');
            $("#percentage_done").html((count*20)+'%');

        });
        $("#create_list_btn").on('click',function(){
            $("#newlist").toggle();
        });
        $('#newlist').keypress(function (e) {
            var key = e.which;
            if(key == 13)  // the enter key code
            {
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                $.ajax({
			dataType: 'html',
			 type:'POST',
			url: '<?= url('/savenewlists')?>',
			async:false,
                        data:{'list':$("#newlist").val()},
		}).done(function(data){
                    $('#newlist').toggle();
                    $("#cplaylists").html(data);
		});
            }
        });

    });
    function get_playlist(id){
        track_list = id;
        console.log(track_list);
                $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': "{{ csrf_token() }}"
			}
		});
		$.ajax({
			dataType: 'html',
			 type:'POST',
			url: '<?= url('/fetch_lists')?>',
			async:false,
		}).done(function(data){
                    $("#cplaylists").html(data);
		   showlistmodal();
		});
    }
   var ajax_send = false;
     function add_to_myplaylist(id){

                $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': "{{ csrf_token() }}"
			}
		});
                if(!ajax_send){
                    $.ajax({
                            dataType: 'html',
                             type:'POST',
                            url: '<?= url('/add_to_playlist')?>',
                            async:false,
                            data: {'track_id':track_list,'list_id':id}
                    }).done(function(data){

                        $("#msg_div").html(data);
                        $("#msg_div").show();
                        $('#msg_div').delay(3000).fadeOut('slow');
                    });
                    ajax_send = true;
                }else{
                    ajax_send = false;
                }
    }
    function showlistmodal(){
         $("#listmodel").toggle();
       }
       function delete_playlist(id){
            $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });
                $.ajax({
			dataType: 'html',
			 type:'POST',
			url: '<?= url('/deletecurrentlist')?>',
			async:false,
                        data:{'list':id},
		}).done(function(data){
                    $("#cplaylists").html(data);
		});
       }
</script>
<div >
  <div class="modal fade in" id="listmodel" role="dialog" style="display:none;position: fixed; top: 21%; z-index: 999999999;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="showlistmodal()" >×</button>
          <h4 class="modal-title">Playlist</h4>
        </div>
        <div class="modal-body">

          <div id="msg_div"></div>
          <div class="form-group" id="cplaylists"></div>
          <input type="text" class="form-control" style="display:none; width: 75%; margin-bottom: 10px; padding: 5px;" id="newlist">
          <input class="btn btn-success" type="button" id="create_list_btn" style="border: 0px; background: #3fe38c; padding: 11px;" value="Create New Playlist">

        </div>
        <div class="modal-footer">
          <button type="button" onclick="showlistmodal()" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>

    </div>
  </div>
</div>

   @yield('script')


<script type="text/javascript" src="{{url('assets/js/bootstrap-notify.js')}}"></script>
<script>
$(window).on('load',function ()
{
    create_notifications();
    setInterval(create_notifications, 10000);
});

function create_notifications()
{
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

function live_notify(data,id)
{
    $.notify('<div class="alert_box"><a href="#"><span class="icon_box"><i class="fa fa-bell"></i></span> <span class="notify_txt" style="height: 25px; width:100%; overflow: hidden !important; font-size: 10px; padding: 0px; !important; margin-top:0px;"> '+ data +' </span></a></div>', {
        allow_dismiss: false,
        type: 'default',
        placement: {
            from: 'bottom',
            align: 'left'
        }
    });
    setTimeout(function() {
        $.notifyClose('top-right');
    }, 2000000);
}
</script>
</body>
</html>