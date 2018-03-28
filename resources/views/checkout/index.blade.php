@extends('layouts.guest')
@section('title', 'Pricing')



@section('content')

    <style>

        body{

            background: #ECF0F3 !important;

        }

    </style>

    <div class="image-banner-div">

        <div class="container">

            <div class="banner-heading">

                <h1>Pricing</h1>

            </div>

        </div>

        <!--inner-banner Ends -->

    </div>

    <!--container Ends -->

    <!--banner Ends -->

    <section class="pricing-area">

        <div class="container">

            <div class="row">

                <div class="col-md-4">

                    <div class="pricing-tab-area">

                        <span>Beginner</span>

                        <h2>$9.99</h2>

                        <p>Duis aute irure dolor

                            In reprehenderit in

                            Voluptate velit esse

                            Cillum dolore eu fugiat

                            Excepteur sint occaecat

                            Cupidatat non

                            Proident sunt in culpa </p>

                        <a href="{{url('/proceed/1')}}" type="button" class="join-us-btn btn btn-default">Join</a>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="pricing-tab-area medium-area">

                        <div class="best-area">BEST</div>

                        <span>medium</span>

                        <h2>$19.99</h2>

                        <p>Duis aute irure dolor

                            In reprehenderit in

                            Voluptate velit esse

                            Cillum dolore eu fugiat

                            Excepteur sint occaecat

                            Cupidatat non

                            Proident sunt in culpa </p>

                        <a href="{{url('/proceed/2')}}" type="button" class="join-us-btn btn btn-default btn_mid">Join</a>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="pricing-tab-area prof-tab-area">

                        <span>professional</span>

                        <h2>$49.99</h2>

                        <p>Duis aute irure dolor

                            In reprehenderit in

                            Voluptate velit esse

                            Cillum dolore eu fugiat

                            Excepteur sint occaecat

                            Cupidatat non

                            Proident sunt in culpa </p>

                        <a href="{{url('/proceed/3')}}" type="button" class="join-us-btn btn btn-default">Join</a>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <section class="bg-content-area">

        <img class="uper-wave-pricing img-responsive" src="assets/img/upper-waves.png">

        <div class="container">

            <div class="pricing-content">

                <h3> Lorem Ipsum </h3>

                <p>Duis aute irure dolor

                    In reprehenderit in

                    Voluptate velit esse

                    Cillum dolore eu fugiat

                    Excepteur sint occaecat

                    Cupidatat non

                    Proident sunt in culpa </p>

                <button type="button" class="more-pricing-btn btn_bs">More</button>

            </div>

        </div>

    </section>
@endsection