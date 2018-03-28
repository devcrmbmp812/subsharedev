@extends('layouts.guest')
@section('title', 'Subshare | Subshare')
@section('content')
 <style type="text/css">
@font-face {
    font-family: 'MYRIADPROREGULAR';
    src: url('assets/fonts/MYRIADPROREGULAR.eot'); /* IE9 Compat Modes */
    src: url('assets/fonts/MYRIADPROREGULAR.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */ url('assets/fonts/MYRIADPROREGULAR.woff') format('woff'), /* Pretty Modern Browsers */ url('../fonts/MYRIADPROREGULAR.ttf') format('truetype'); /* Safari, Android, iOS */
}
</style>

<div class="ipad-banner-div">
    <div class="ipad-banner-content">
                        <h1>
                    collaborative<br>production                </h1>
                <a href="{{ url('/register') }}" class="sign-up-btn btn btn-default btn_bs">Sign up</a>    </div>
<img src="{{ url('assets/optima/images/landing-ipad.png') }}" class="img-responsive" alt="">    <!--ipad-banner-content Ends -->
</div>


<section class="play-section land2_pg_play">
    <div class="container-fluid">
        <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-6 xs-full">
                <div class="play_img_holder">
                 <img src="{{ url('assets/optima/images/landscape2-1.png') }}" class="img-responsive" alt="">
                </div>
            </div>
                  <div class="col-md-5 col-sm-5 col-xs-6 xs-full">
                <div class="play_content_box">
                    <h3>Creative collaboration</h3>
                      <p>Subshare is your share of the Subscription Revenue and as the fastest growth area in music our platform allows you the user to be involved and rewarded for the actual value your media or service is bringing the track. Our next generation contracts allow you to directly collaborate with others and agree a percentage share in relation to the value it brings to that composition.</p>
                  </div>
            </div>

        </div>
    </div>
</section>


<section class="land_page_slider land2_page_slider subshare-post-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="blog-slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

            <div class="item">
                               <img src="{{ url('assets/optima/images/slide1.png') }}" class="img-responsive" alt=" Maecenas faucibus libero nulla">
                                               <div class="header-text">
                            <div class="col-md-7 text-left">
                                    <span class="date_box">
                  02.10.2017</span>
                                <h2>
                                  Maecenas faucibus libero nulla                                </h2>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec convallis ex purus, at euismod est vulputate et. </p>
                                <a href="#" class="btn btn-default readmore_btn btn_bs">Read more</a>
                            </div>
                        </div>
                    </div>

            <div class="item active">
                               <img src="{{ url('assets/optima/images/slide1.png') }}" class="img-responsive" alt=" Vivamus lobortis venenatis risus">
                                               <div class="header-text">
                            <div class="col-md-7 text-left">
                                    <span class="date_box">
                  02.10.2017</span>
                                <h2>
                                  Vivamus lobortis venenatis risus                                </h2>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec convallis ex purus, at euismod est vulputate et. </p>
                                <a href="#" class="btn btn-default readmore_btn btn_bs">Read more</a>
                            </div>
                        </div>
                    </div>

            <div class="item">
                               <img src="{{ url('assets/optima/images/slide1.png') }}" class="img-responsive" alt=" Lorem ipsum dolor sit amet">
                                               <div class="header-text">
                            <div class="col-md-7 text-left">
                                    <span class="date_box">
                  02.10.2017</span>
                                <h2>
                                  Lorem ipsum dolor sit amet                                </h2>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec convallis ex purus, at euismod est vulputate et. </p>
                                <a href="#" class="btn btn-default readmore_btn btn_bs">Read more</a>
                            </div>
                        </div>
                    </div>

            <div class="item">
                               <img src="{{ url('assets/optima/images/slide1.png') }}" class="img-responsive" alt=" Lorem ipsum dolor sit amet">
                                               <div class="header-text">
                            <div class="col-md-7 text-left">
                                    <span class="date_box">
                  02.10.2017</span>
                                <h2>
                                  Lorem ipsum dolor sit amet                                </h2>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec convallis ex purus, at euismod est vulputate et. </p>
                                <a href="#" class="btn btn-default readmore_btn btn_bs">Read more</a>
                            </div>
                        </div>
                    </div>
                                        </div>

                    <a class="left carousel-control" href="#blog-slider" data-slide="prev">
                        <span class="left_arrow"><i class="fa fa-chevron-left"></i></span>
                    </a>
                    <a class="right carousel-control" href="#blog-slider" data-slide="next">
                        <span class="right_arrow"><i class="fa fa-chevron-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="sell-section share_box land2_share_box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-6 xs-full">
                <div class="sell_content_box">
                  <h3>Creative power</h3>
                  <p>Subshare brings the power to you, by taking control of almost completed works or completed works. With your input and access to an abundance of skill sets and knowledge you can build a composition quickly, efficiently and in a fair environment that puts content creators at the forefront of the industry. Subshare have created an environment where you could take part of the structure or individual elements from a track that met your search criteria, allowing a new composition to be created or complete a track that you may have needed addition inspiration. There are millions of samples and partially completed tunes in the world, we give you access to every piece of the puzzle reducing your workflow process and increasing your productive creativity.</p>
                  <a href="{{ url('/register') }}" class="btn btn-default more_btn btn_bs">Sign Up</a>                      </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-6 xs-full">
        <div class="sell_img_holder">
            <img src="{{ url('assets/optima/images/SubshareTabletImage1.png') }}" class="img-responsive" alt=""></div>
            </div>

        </div>
    </div>
    <div class="layer_feature"><img src="{{ url('assets/optima/images/layer2.png') }}" class="img-responsive" alt=""></div>
</section>



<section class="play-section video_section ripple-video-section land2_play_page">
    <div class="container">
        <div class="row">
                <div class="col-md-7 col-sm-6 col-xs-6 xs-full">
                <div class="play_img_holder">
                  <p><img src="{{ url('assets/optima/images/Subshare1.jpg') }}" alt="" width="800" height="450" class="alignnone size-full wp-image-515"></p>
                </div>
            </div>

                  <div class="col-md-5 col-sm-6 col-xs-6 xs-full">
                <div class="play_content_box">
                     <br>
<h3>A relevant solution</h3>
<p>Subshare embraces the new world we live in, where we didn’t need a record label to succeed but we do often needs skills and resources that are unobtainable. By removing the ownership challenges and allowing a set of individuals to negotiate on their own merit, we believe Subshare will directly influence the volume of music produced being it new or old, the value people are willing to pay for your rights to media and of course challenging the value gap that currently even the most talented artists can’t get exposure to make it onto the most popular playlists in the industry. WATCH VIDEO
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection