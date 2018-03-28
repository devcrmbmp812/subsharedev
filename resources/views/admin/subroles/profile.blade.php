@extends('admin.layouts.layout1')

@section('content')

<aside class="right-side">
    <ol class="breadcrumb">
        <li><a href="#">Breadcrumb item 1</a></li>
        <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#">Breadcrumb item 2</a></li>
    </ol>
    <section class="profile-content">
        <div class="row">
            <div class="col-md-12 col-lg-12 top-right-content">
                <div class="profile-top-detail-div">
                    <div class="profile-image-div">
                        <img src="{{ url('public/images/avatars/'.$user->image) }}">
                    </div>
                    <div class="profile-text-div">
                        <div class="profil-right-area">
                            <h2>{{ $user->first_name  }} {{ $user->last_name  }}</h2>
                            <a href="#" class="message-btn"><span>MESSAGE</span></a>
                        </div>
                        <div class="profile-right-bottom-area">
                            <ul class="profile-following-div">
                                <li>uploads
                                    <span>{{ $uploadCount  }}</span></li>
                                <li>following
                                    <span>{{ $followingCount  }}</span></li>
                                <li>follow
                                    <span>{{ $followerCount  }}</span></li>
                                <li>subshares
                                    <span>98</span></li>
                                <li>wanted
                                    <span>7</span></li>
                                <li>neptune
                                    <span>6</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="profil-graph-area">
                    <div class="profile-graph-area-heading"><h3>Alice Smith is offering vocals to track Blues On Honey for 3%</h3></div>
                    <img src="{{url('assets/admin/img/profile-graph.png')}}" class="img-responsive">
                    <a href="#"><img src="{{url('assets/admin/img/Play%20button.png')}}"></a>

                </div>
                <div class="profil-graph-area">
                    <div class="profile-graph-area-heading"><h3>Alice Smith is offering vocals to track Blues On Honey for 3%</h3></div>
                    <img src="{{url('assets/admin/img/profile-graph.png')}}" class="img-responsive">
                    <a href="#"><img src="{{url('assets/admin/img/Play%20button.png')}}"></a>

                </div>
                <div class="upload-div">
                    <h4>All uploads</h4>
                    <ul>
                        <li><img src="{{url('assets/admin/img/pic1.png')}}"></li>
                        <li><img src="{{url('assets/admin/img/pic2.png')}}"></li>
                        <li><img src="{{url('assets/admin/img/pic3.png')}}"></li>
                        <li><img src="{{url('assets/admin/img/pic4.png')}}"></li>
                        <li><img src="{{url('assets/admin/img/pic5.png')}}"></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
</aside>
@endsection