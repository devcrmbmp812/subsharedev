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

        <title>Subshare | {{Request::segment(1)}}</title>
        <!--<link rel="icon" href="{{url('assets/img/logo.ico')}}">-->

        <!--CSS -->
        <link rel="stylesheet" type="text/css" href="{{url('assets/admin/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('assets/admin/css/bootstrap.min.css')}}">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700,800" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link rel="stylesheet" type="text/css" href="{{url('assets/admin/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('assets/css/tokenfield-typeahead.min.css')}}">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
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
                            <a class="navbar-brand" href="#"><img src="{{url('assets/admin/img/logo.png')}}"></a>
                        </div>
                        <div class="navigation-area">
                            <div id="navbar" class="navbar-collapse collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="search-bar">
                                        <form action="" class="widget-search">
                                            <input type="search" name="" placeholder="Search">
                                            <input type="submit" class="fa" value="&#xf002;">
                                        </form>
                                    </li>
                                    <li class="button-bar">
                                        <button type="button" class="btn btn-success"><span>Submit</span><img src="{{url('assets/admin/img/upload.png')}}"></button>
                                    </li>
                                </ul>

                            </div><!--/.nav-collapse -->
                            <div class="top-nav-right">
                                <ul>
                                    <li class="dropdown messages-menu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="{{url('assets/admin/img/notifications.png')}}">
                                            <span class="label label-success">4</span>
                                            <div class="down-arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                                        </a>
                                        <div class="dropdown-menu drop-down-message" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i><div class="top-notification"><h5>Renov Leonga is now following you!</h5><span>June 20, 2015</span></div></a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i><div class="top-notification"><h5>Renov Leonga is now following you!</h5><span>June 18, 2015</span></div></a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i><div class="top-notification"><h5>Zaham Sindil is now following you!</h5><span>June 16, 2015</span></div></a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i><div class="top-notification"><h5>Rey Reslaba is now following you!</h5> <span>June 16, 2015</span><p>HTML For Beginners Capter 1</p></div></a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-comment" aria-hidden="true"></i><div class="top-notification"><h5>Socrates commented on your post</h5><span>June 16, 2015</span><p>Temporibus autem et officiis debittis..</p></div></a>
                                        </div>
                                    </li>
                                    <li class="dropdown notifications-menu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <img src="{{url('assets/admin/img/message.png')}}">
                                            <span class="label label-success">23</span>
                                            <div class="down-arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                                        </a>
                                        <div class="dropdown-menu drop-down-message" aria-labelledby="dropd                                                        ownMenuButton">
                                            <a class="dropdown-item" href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i><div class="top-notification"><h5>Renov Leonga is now following you!</h5><span>June 20, 2015</span></d                                                                iv></a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i><div class="top-notification"><h5>Renov Leonga is now following you!</h5><span>June 18, 2015</                                                                span></div></a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i><div class="top-notification"><h5>Zaham Sindil is now following you!</h5><span>June 16, 2015</span></d                                                        iv></a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i><div class="top-notification"><h5>Rey Reslaba is now following you!</h5> <span>June 16, 2015</span><p>HTML For Beginners Capter 1</p></div></a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i><div class="top-notification"><h5>Socrates commented on your post</h5><span>June 16, 2015</span><p>Temporibus autem et officiis debittis..</p></div></a>
                                        </div>
                                    </li>
                                    <li class="dropdown calender-menu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <img src="{{url('assets/admin/img/calendar.png')}}">
                                            <span class="label label-success">17</span>
                                            <div class="down-arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></div>

                                        </a>
                                        <div class="dropdown-menu drop-down-message" aria-labelledby="d                                                                        ropdownMenuButton">
                                            <a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i><div class="top-notification"><h5>Renov Leonga is now following you!</h5><span>June 20, 2015</span></div></a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i><div class="top-notification"><h5>Renov Leonga is now following you!</h5><span>June 18, 2015</span></div></a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i><div class="top-notification"><h5>Zaham Sindil is now following you!</h5><span>June 16, 2015</span></div></a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i><div class="top-notification"><h5>Rey Reslaba is now following you!</h5> <span>June 16, 2015</span><p>HTML For Beginners Capter 1</p></div></a>
                                            <a class="dropdown-item" href="#"><i class="fa fa-comment" aria-hidden="true"></i><div class="top-notification"><h5>Socrates commented on your post</h5><span>June 16, 2015</span><p>Temporibus autem et officiis debittis..</p></div></a>
                                        </div>
                                    </li>
                                    <li class="dropdown user user-menu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <img src="{{url('assets/admin/img/avatar.png')}}" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                                            <div class="riot">
                                                <div>
                                                    <span class="dropdown profile-top-menu">
                                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                                    </span>
                                                    <div class="dropdown-menu drop-down-message" aria-labelledby="dropdownMenuButton">
                                                        <a                                                                                                             class="dropdown-item" href="profile.html"><i class="fa fa-user" aria-hidden="true"></i><div class="profile-nav-area"><h5>My Profile</h5></div></a>
                                                        <a class="dropdown-item" href="{{url('/setting/1')}}"><i class="fa fa-cog" aria-hidden="true"></i><div class="profile-nav-area"><h5>Account Settings</h5></div></a>
                                                        <a class="dropdown-item" href="#"><i class="fa fa-question-circle" aria-hidden="true"></i><div class="profile-nav-area"><h5>Help</h5></div></a>
                                                        <a class="dropdown-item" href="../login.html"><i class="fa fa-sign-out" aria-hidden="true"></i><div class="profile-nav-area"><h5>Log Out</h5></div></a>
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
            <!--Container Ends-->
        </header>

        <section class="wrapper row-offcanvas row-offcanvas-left" >
            <!--//@yield('sidebar')-->
            <!--@yield('sidebar')-->
            <aside class="left-side sidebar-offcanvas" data-spy="affix" data-offset-top="197">
                <section class="sidebar ">
                    <div class="page-sidebar  sidebar-nav">
                        <div class="clearfix"></div>
                        <!-- BEGIN SIDEBAR MENU -->
                        <ul id="menu" class="page-sidebar-menu">
                            <li class="active">
                                <a href="{{url('/admin')}}">
                                    <img src="{{url('assets/admin/img/green-admin.png')}}">
                                    <span class="title">Admin</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/subshare')}}">
                                    <img src="{{url('assets/admin/img/subshare.png')}}">
                                    <span class="title">Subshares</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/user')}}">
                                    <img src="{{url('assets/admin/img/user.png')}}">
                                    <span class="title">Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/settings')}}">
                                    <img src="{{url('assets/admin/img/profile.png')}}">
                                    <span class="title">Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/media')}}">
                                    <img src="{{url('assets/admin/img/media.png')}}">
                                    <span class="title">Media</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/transactions')}}">
                                    <img src="{{url('assets/admin/img/Transactions.png')}}">
                                    <span class="title">Transactions</span>
                                </a>
                            </li>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            @yield('content')
            <!-- right-side -->
        </section>

        <script type="text/javascript" src="{{url('assets/admin/js/bootstrap.min.js')}}"></script>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
        <script src="{{url('assets/js/bootstrap-tokenfield.min.js')}}"></script>
        <script type="text/javascript" src="{{url('assets/admin/js/jQuery.circleProgressBar.js')}}"></script>
        <script>
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


        @yield('script')

    </body>
</html>