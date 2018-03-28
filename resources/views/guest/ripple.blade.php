@extends('layouts.guest')

@section('title', 'Ripple | Subshare')

@section('content')
<section class="ripple-banner-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-5 xs-full">
                  <h1>About Ripple</h1>               <p>Ripple is the first educational music platform where you can pick your online Tutor by how their music sounds and relates to your own individual style, not just a profile or set of qualifications. Ripple allows Students in higher education of music to become an educator and earn money for giving structured or unstructured feedback to our users based on their learning criteria.

A one-degree change to your music or sound is often all it needs to succeed. Ripple allows the right people to find your music and you to take guidance to make that change. Your future lives and breaths in Subshare and Neptune with Ripple ensuring before your music gets there it's in the best completed and professional state possible for someone to collaborate with you.

</p>
                <a href="{{ url('/register') }}" class="btn btn-default signup_btn1 btn_bs">sign up</a>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-7 xs-full">
                <div class="ripple_img">
                    <img src="assets/img/ripple/new/ripple-banner-img.png" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </div>

</section>



<section class="land-feature-section ripple-feature-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col_md_4 col-sm-6 col-xs-6 xs-full">
                <ul>
                    <div class="images_box1">
                        <li><img width="124" height="124" src="assets/img/ripple/new/topcharts_img2.png" class="img-responsive" alt=""></li>
                        <li><img width="124" height="124" src="assets/img/ripple/new/about_img2.png" class="img-responsive" alt=""></li>
                        <li><img width="124" height="124" src="assets/img/ripple/new/about_img1-1.png" class="img-responsive" alt=""></li>
                        <li><img width="124" height="124" src="assets/img/ripple/new/about_img3.png" class="img-responsive" alt=""></li>
                    </div>
                    <div class="images_box1">
                        <li><img width="300" height="300" src="assets/img/ripple/new/5.jpg" class="img-responsive" alt="" srcset="assets/img/ripple/new/5.jpg 300w, assets/img/ripple/new/5-150x150.jpg 150w" sizes="(max-width: 300px) 100vw, 300px"></li>
                        <li><img width="300" height="300" src="assets/img/ripple/new/Untitled-design-32.jpg" class="img-responsive" alt="" srcset="assets/img/ripple/new/Untitled-design-32.jpg 300w, assets/img/ripple/new/Untitled-design-32-150x150.jpg 150w" sizes="(max-width: 300px) 100vw, 300px"></li>
                        <li><img width="300" height="300" src="assets/img/ripple/new/Untitled-design-18.jpg" class="img-responsive" alt="" srcset="assets/img/ripple/new/Untitled-design-18.jpg 300w, assets/img/ripple/new/Untitled-design-18-150x150.jpg 150w" sizes="(max-width: 300px) 100vw, 300px"></li>
                        <li><img width="300" height="300" src="assets/img/ripple/new/Untitled-design-16.jpg" class="img-responsive" alt="" srcset="assets/img/ripple/new/Untitled-design-16.jpg 300w, assets/img/ripple/new/Untitled-design-16-150x150.jpg 150w" sizes="(max-width: 300px) 100vw, 300px"></li>
                    </div>
                </ul>
            </div>
            <div class="col_md_3 col-sm-6 col-xs-6 xs-full blue_img"> <img src="assets/img/ripple/new/Untitled-design-21-1.jpg" class="img-responsive" alt=""> </div>
            <div class="col-md-3 col-sm-10 col-xs-10 xs-full">
                <h3>featured</h3>
                <p>People make content all the time however rarely fully complete the track before moving on to the next big idea, Ripple allows you to find that next step of inspiration from other like-minded users to ensure none of your great ideas go to waste.
                </p> <a href="{{ url('/register') }}" class="btn btn-default more_btn btn_bs">Sign Up</a> </div>
            <div class="col_md_2 col-sm-2 col-xs-2 xs-full">
                <div class="images_box2"> <img width="124" height="124" src="assets/img/ripple/new/topcharts_img3.png" class="img-responsive" alt=""><img width="124" height="124" src="assets/img/ripple/new/about_img2.png" class="img-responsive" alt=""> </div>
            </div>
        </div>
    </div>
</section>






<section class="testimonial-section">
    <div class="container-fluid">
        <div class="row">
                    <div class="col-md-3 col-sm-3 hidden-xs">
                <div class="ptr-fill" style="background:url('{{url('assets/img/ripple/new/vertical_slide_img.png')}}')"></div>
            </div>
                     <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="slider-bg">
                    <div id="myCarousel" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                                                    <li data-target="#myCarousel" data-slide-to="0" class="active"><img src="{{ url('assets/img/ripple/new/Icon1.png') }}" alt="" class="img-responsive"></li>
                                                        <li data-target="#myCarousel" data-slide-to="1"><img src="{{ url('assets/img/ripple/new/Icon2.png') }}" alt="" class="img-responsive"></li>
                                                        <li data-target="#myCarousel" data-slide-to="2"><img src="{{ url('assets/img/ripple/new/Icon3.png') }}" alt="" class="img-responsive"></li>
                                                        <li data-target="#myCarousel" data-slide-to="3"><img src="{{ url('assets/img/ripple/new/Icon4.png') }}" alt="" class="img-responsive"></li>
                                                      </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                                                            <div class="item active">
                                <div class="qoute_icon"><img src="{{ url('assets/img/ripple/new/qoute_icon.png') }}" class="img-responsive" alt=""></div>
                               <p class="views">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Excepteur sint occaecat cupidatat.</p>                            <p class="user_name">alice smith</p>                            </div>
                                                        <div class="item ">
                                <div class="qoute_icon"><img src="{{ url('assets/img/ripple/new/qoute_icon.png') }}" class="img-responsive" alt=""></div>
                               <p class="views">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Excepteur sint occaecat cupidatat.</p>                            <p class="user_name">Jon smith</p>                            </div>
                                                        <div class="item ">
                                <div class="qoute_icon"><img src="{{ url('assets/img/ripple/new/qoute_icon.png') }}" class="img-responsive" alt=""></div>
                               <p class="views">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Excepteur sint occaecat cupidatat.</p>                            <p class="user_name">Gareth smith</p>                            </div>
                                                        <div class="item ">
                                <div class="qoute_icon"><img src="{{ url('assets/img/ripple/new/qoute_icon.png') }}" class="img-responsive" alt=""></div>
                               <p class="views">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Excepteur sint occaecat cupidatat.</p>                            <p class="user_name">Jon doe</p>                            </div>

                           </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="feature-section ripple-f-bs">
    <div class="container">
        <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-6 xs-full">
                <div class="featur_box">
                   <h4>feature 1</h4>                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Excepteur sint occaecat cupidatat non. proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>               <a href="#" class="btn btn-default test_btn btn_bs">Test it</a>                          </div>
            </div>
                      <div class="col-md-4 col-sm-4 col-xs-6 xs-full">
                <div class="featur_box">
                   <h4>feature 2</h4>                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Excepteur sint occaecat cupidatat non. proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>               <a href="#" class="btn btn-default test_btn btn_bs">Test it</a>                          </div>
            </div>
                      <div class="col-md-4 col-sm-4 col-xs-6 xs-full">
                <div class="featur_box">
                   <h4>feature 3</h4>                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Excepteur sint occaecat cupidatat non. proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>               <a href="#" class="btn btn-default test_btn btn_bs">Test it</a>                          </div>
            </div>

        </div>
    </div>
    <div class="layer_feature"><img src="{{ url('assets/img/ripple/new/layer2.png') }}" class="img-responsive" alt=""></div>
</section>

<section class="play-section video_section ripple-video-section">
    <div class="container">
        <div class="row">
                      <div class="col-md-7 col-sm-6 col-xs-6 xs-full">
                <div class="play_img_holder">
                   <p><img src="{{ url('assets/img/ripple/new/RippleBottom-e1511116951490.jpg') }}" alt="" width="800" height="450" class="alignnone size-full wp-image-515"></p>
                </div>
            </div>
                      <div class="col-md-5 col-sm-6 col-xs-6 xs-full">
                <div class="play_content_box">
                 <h3>lorem ipsum</h3>    <p>Excepteur sint occaecat cupidatat non. proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>   <a href="{{ url('/register') }}" class="btn btn-default play_more_btn btn_bs">Sign Up</a>                    </div>
            </div>

        </div>
    </div>
</section>
@endsection