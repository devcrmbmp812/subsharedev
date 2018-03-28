@section('sidebar')

<!-- Left side column. contains the logo and sidebar -->
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
                    <a href="{{url('/user')}}">
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
@endsection