@extends('layouts.guest')
@section('title', 'Subshare | Collaborative music production, sharing &amp; engagement')
@section('content')
<section class="banner-section" style="background-image: url('http://optimabranding.com/subshare/wp-content/uploads/2017/10/photo-1479087734076-99f93ef1acfd-1.jpg')">
    <div class="tpbg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="banner-h">A new way of creating, sharing &amp; buying music.</h1>
                </div>

                <div class="col-md-12 home-slid">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                            <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">

                            <div class="item">
                                <img src="{{ url('assets/img/home/SubshareModnew.png') }}" alt="">
                                <p>Our Next Generation Digital Terms Solve the issue of
                                    <br> ownership and allow collaboration on a level never seen before</p>
                            </div>

                            <div class="item active">
                                <img src="{{ url('assets/img/home/neptunenew.png') }}" alt="">
                                <p>Delivering music faster than any other system
                                    <br> Globally for unlimited discovery of New Genres, New Music and a new world...</p>
                            </div>

                            <div class="item">
                                <img src="{{ url('assets/img/home/Picture3new.png') }}" alt="">
                                <p>Get access to Music Education to learn an expansive wealth of musical knowledge
                                    <br> from our community of production specialists to achieve all your desired goals</p>
                            </div>

                        </div>

                        <!-- Left and right controls -->

                    </div>
                </div>
            </div>
        </div>
        <div class="layers_banner"><img src="{{ url('assets/img/home/layer.png') }}" class="img-responsive" alt=""></div>
    </div>
</section>

<section class="sell-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-6 xs-full">
                <div class="sell_content_box">
                    <div class="imagesssell"><img class="ribbonimage" src="{{ url('assets/img/home/RippleMod.png') }}"></div>
                    <h3>Ripple</h3>
                    <p>Ripple is the worlds first educational platform that you pick your Tutor just by how there music sounds, not based on just a profile or set of qualifications. Our Platform allows Students in higher education of music to become an educator and earn money for giving structured or unstructured feedback to our users</p>
                    <a href="{{ url('ripple') }}" class="btn btn-default more_btn btn_bs">More</a>
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-6 xs-full">
                <div class="sell_img_holder"><img src="{{ url('assets/img/home/landscape_img.png') }}" class="img-responsive" alt=""></div>
            </div>
        </div>
    </div>
</section>


<section class="feature-section">
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-sm-4 col-xs-6 xs-full">
                <div class="featur_box">
                    <img src="{{ url('assets/img/home/Speaker.png') }}" alt="" class="img-responsive">
                    <h4>Creative</h4>
                    <p>Creativity comes from an inner feeling and is often associated with your particular talent. By giving our users access to people who value each others talent, when they need inspiration we provide a unique opportunity for musicians and people new into the industry. That possibility would never have been possible without passionate people behind every collaboration or project involving music.</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-6 xs-full">
                <div class="featur_box">
                    <img src="{{ url('assets/img/home/Activity.png') }}" alt="" class="img-responsive">
                    <h4>Engaging</h4>
                    <p>Our platform allows more successful engagement using technology and a deeper understanding in Music to help you find that next person who will complete your musical picture, or the collective that may have passed by if you were using conventional seek and find technology.</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-6 xs-full">
                <div class="featur_box">
                    <img src="{{ url('assets/img/home/Headphones.png') }}" alt="" class="img-responsive">
                    <h4>Innovative</h4>
                    <p>Subshare revolutionises the current royalty system. By each party agreeing royalty shares associated with new media in a project, not only can you allow an exchange of Media, also purchase someone’s rights to media and provide input on collaborations on the biggest hits of this coming generation.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="layer_feature"><img src="{{ url('assets/img/home/layer2.png') }}" class="img-responsive" alt=""></div>
</section>

<section class="play-section">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-7 col-sm-7 col-xs-6 xs-full">
                <div class="play_img_holder">
                    <img src="{{ url('assets/img/home/landscape2.png') }}" class="img-responsive" alt="">
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-6 xs-full">
                <div class="play_content_box">
                    <div class="imagesssell"><img class="ribbonimage" src="{{ url('assets/img/home/SubshareMod.png') }}"></div>
                    <h3>Subshare</h3>
                    <p>Subshare is your share of Subscription Revenue and as the fastest growth area in music our platform allows you the user to be involved and rewarded for the actual value your media or service is bringing the track. Our next generation contract allows you to directly collaborate with others and agree a percentage share in relation to the VALUE it brings to that composition. The contract allows royalties to be collected for you, then you receive a payout for your percentage royalty within the project that got streamed whilst retaining all your rights to media. The Future is here and people that contribute in tracks (similar of feat.) or even just suggest media can now be integral to the success of a hit record.
                    </p>
                    <a href="{{ url('/subshare-page') }}" class="btn btn-default play_more_btn btn_bs">More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sell-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-6 xs-full">
                <div class="sell_content_box">
                    <div class="imagesssell"><img class="ribbonimage" src="{{ url('assets/img/home/NeptuneMod.png') }}"></div>
                    <h3>Neptune</h3>

                    <p>
                        Neptune is music steaming with a difference. With access to content increasing and the amount of time we spend listening to music increasing, not enough has been done to challenge the way we discover new music. You like all music lovers have a certain part in any song that you decide if it's for you or not. Using our next generation player you have a far greater choice through the advanced features and a faster-consuming method of media through intelligent tagging.
                    </p>
                    <a href="{{ url('neptune') }}" class="btn btn-default more_btn btn_bs">More</a>
                </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-6 xs-full">
                <div class="sell_img_holder"><img src="{{ url('assets/img/home/landscape3.png') }}" class="img-responsive" alt=""></div>
            </div>

        </div>
    </div>
</section>
@endsection