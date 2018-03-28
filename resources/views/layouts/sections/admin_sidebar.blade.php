        <section class="wrapper row-offcanvas row-offcanvas-left" >
            <aside class="left-side sidebar-offcanvas" data-spy="affix" data-offset-top="197">
                <section class="sidebar ">
                    <div class="page-sidebar  sidebar-nav">
                        <div class="clearfix"></div>
                        <!-- BEGIN SIDEBAR MENU -->
                        <ul id="menu" class="page-sidebar-menu">
                            <li class="{{ Request::is('admin') ? 'active' : '' }}">
                                <a href="{{url('/admin')}}">
                                    <img src="{{url('assets/admin/img/admin.png')}}">
                                    <span class="title">Admin</span>
                                </a>
                            </li>
                            <!--<li class="{{ (Request::is('admin/subshare') || Request::is('admin/subshare/search') )  ? 'active' : '' }}">
                                <a href="{{url('/admin/subshare')}}">
                                    <img src="{{url('assets/admin/img/subshare.png')}}">
                                    <span class="title">Subshares</span>
                                </a>
                            </li>-->
                            <li class="{{ ( Request::is('admin/user') || Request::is('admin/user/search') || Request::is('admin/profile/*') || Request::is('admin/user/*') ) ? 'active' : '' }}">
                                <a href="{{url('admin/user')}}">
                                    <img src="{{url('assets/admin/img/user.png')}}">
                                    <span class="title">Users</span>
                                </a>
                            </li>

                            <!-- settings page  -->
                            <li class="{{ Request::is('admin/settings') ? 'active' : '' }}">
                                <a href="{{url('/admin/settings')}}">
                                    <img src="{{url('assets/admin/img/profile.png')}}">
                                    <span class="title">Profile</span>
                                </a>
                            </li>

                            <!-- media  page 
                            <li class="{{ (Request::is('admin/media') || Request::is('admin/media/search') ) ? 'active' : '' }}">
                                <a href="{{url('/admin/media')}}">
                                    <img src="{{url('assets/admin/img/media.png')}}">
                                    <span class="title">Media</span>
                                </a>
                            </li>-->

                            <!-- transactions page -->
                            <li class="{{ Request::is('admin/transactions') ? 'active' : '' }}">
                                <a href="{{url('/admin/transactions')}}">
                                    <img src="{{url('assets/admin/img/Transactions.png')}}">
                                    <span class="title">Transactions</span>
                                </a>
                            </li>
                            <!-- blog page -->
                            <li class="{{ (Request::is('admin/blog') || Request::is('admin/blog/search') || Request::is('admin/blog/create') || Request::is('admin/blog/edit/*') || Request::is('admin/blog/*') ) ? 'active' : '' }}">
                                <a href="{{url('/admin/blog')}}">
                                    <img src="{{url('assets/admin/img/subshare.png')}}">
                                    <span class="title">Blog</span>
                                </a>
                            </li>

                            <!-- genres page -->
                            <li class="{{ (Request::is('admin/genres') || Request::is('admin/genres/search') || Request::is('admin/genres/*') || Request::is('admin/genres/create') ) ? 'active' : '' }}">
                                <a href="{{url('/admin/genres')}}">
                                    <img src="{{url('assets/admin/img/media.png')}}">
                                    <span class="title" style="font-size: 16px;">Music Genres</span>
                                </a>
                            </li>

                            <!-- roles page -->
                            <li class="{{ (Request::is('admin/roles') || Request::is('admin/roles/search') || Request::is('admin/roles/create') || Request::is('admin/roles/*') ) ? 'active' : '' }}">
                                <a href="{{url('/admin/roles')}}">
                                    <img src="{{url('assets/admin/img/user.png')}}">
                                    <span class="title" style="font-size: 14px;">Subshare Roles</span>
                                </a>
                            </li>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
                </section>
                <!-- /.sidebar -->
            </aside>

