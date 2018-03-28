<aside class="left-side sidebar-offcanvas affix-top" data-spy="affix" data-offset-top="197">

        <section class="sidebar ">

            <div class="page-sidebar  sidebar-nav">

                <div class="clearfix"></div>

                <!-- BEGIN SIDEBAR MENU -->

                <ul id="menu" class="page-sidebar-menu">

                    <li class="{{ Request::is('user-dashboard') ? 'active' : '' }}">

                        <a href="{{url('/user-dashboard')}}">

                            <img src="{{url('assets/img/home.png')}}">

                            <span class="title">Home</span>

                        </a>

                    </li>

                    <li class="{{ Request::is('subshare-process/*') || Request::is('subshares') ? 'active' : '' }}">

                        <a href="{{url('/subshares')}}">

                            <img src="{{url('assets/img/subshare.png')}}">

                            <span class="title">Subshares</span>

                        </a>

                    </li>

                    <li class="{{ Request::is('transaction') ? 'active' : '' }}">

                        <a href="{{url('/transaction')}}">

                            <img src="{{url('assets/img/user.png')}}">

                            <span class="title">Transactions</span>

                        </a>

                    </li>

                    <li class="{{ Request::is('track') ? 'active' : '' }}">

                        <a href="{{url('/track')}}">

                            <img src="{{url('assets/img/submit.png')}}">

                            <span class="title">Submit</span>

                        </a>

                    </li>

                    <li class="{{ (  Request::is('browse')  || Request::is('browse/search')  ) ? 'active' : '' }}">

                        <a href="{{url('/browse')}}">

                            <img src="{{url('assets/img/browse.png')}}">

                            <span class="title">Browse</span>

                        </a>

                    </li>

                </ul>

                <ul id="menu" class="page-sidebar-menu">

                    <li>

                        <a href="#">

                            <img src="{{url('assets/img/ripple.png')}}">

                            <span class="title">Ripple</span>

                        </a>

                    </li>

                    <li>

                        <a href="#">

                            <img src="{{url('assets/img/neptune.png')}}">

                            <span class="title">Neptune</span>

                        </a>

                    </li>

                    <li class="{{ (  Request::is('your-music') || Request::is('your-music/search')  ) ? 'active' : '' }}">

                        <a href="{{url('/your-music')}}">

                            <img src="{{url('assets/img/music.png')}}">

                            <span class="title">Your Music</span>

                        </a>

                    </li>

                    <li class="{{ Request::is('settings') ? 'active' : '' }}">

                        <a href="{{url('/settings')}}">

                            <img src="{{url('assets/img/grey-setting.png')}}">

                            <span class="title">Settings</span>

                        </a>

                    </li>

					<li class="{{ Request::is('messages/sent_message') || Request::is('messages/compose') || Request::is('messages/starred') || Request::is('messages/draft') || Request::is('messages/trash') || Request::is('messages') || Request::is('messages/read/*') || Request::is('messages/reply/*') ? 'active' : '' }}">

                        <a href="{{url('/messages')}}">

                            <img src="{{url('assets/img/grey-setting.png')}}">

                            <span class="title">Messages</span>

                        </a>

                    </li>

                </ul>

                <!-- END SIDEBAR MENU -->

            </div>

        </section>

        <!-- /.sidebar -->

    </aside>