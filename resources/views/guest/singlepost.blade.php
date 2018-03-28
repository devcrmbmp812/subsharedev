@extends('layouts.guest')

<?php
$page_title = (!empty($posts['title'])) ? $posts['title'] : '' ;
?>

@section('title',  $page_title . ' | Subshare')
@section('content')
    <style>

        body{

            background: #fff !important;

        }

    </style>

    <div class="banner-div">

        <div class="container">

            <div class="inner-banner-div" style="background-image: url({{ url('assets/optima/images/slide1.png') }})">

                <div class="banner-text-area">

                    <span class="banner-date">{{ explode(' ',$posts['created_at'])[0] }}</span>

                    <h4 class="single-title" style="margin-top: 15px; margin-bottom: 15px; font-size: 30px;">{{$posts['title']}}</h4>

                    <span>by {{$comments[0]->first_name}} {{$comments[0]->last_name}}</span>

                </div>

            </div>

            <!--inner-banner Ends -->

        </div>

        <!--container Ends -->

    </div>

    <section class="blog-content-area">

        <div class="container" style="margin-bottom: 50px;background: #fff;">



            <div class="inner-blog-content">



                <br>

                <p>{{$posts['text']}}</p>

                <div class="comment-area">



                        <div class="fb-comments" data-href="http://optimabranding.com<?= $_SERVER['REQUEST_URI'] ?>" data-order-by="social" data-numposts="3" data-width="100%" style="display:block;"></div>



                </div>

            </div>

        </div>

        <script>

            $(document).ready(function () {

                $('#new_comment').keyup(function(e){

                    if(e.keyCode == 13 && $('#new_comment').val())

                    {

                        $comm = $("#new_comment").val();

                        $.post( '{{url('saveComment')}}' ,{'_token': '{{csrf_token()}}' ,'comment': $comm,'post_id':'{{$post_id}}'}, function(data){

                                if(data != ""){

                                    $("#comments_panel").append(data);

                                }

                        });

                        $("#new_comment").val('');

                    }

                });

            })

            <!-- Load Facebook SDK for JavaScript -->





        </script>

        <script>(function(d, s, id) {

          var js, fjs = d.getElementsByTagName(s)[0];

          if (d.getElementById(id)) return;

          js = d.createElement(s); js.id = id;

          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=366942033727904&version=v2.3";

          fjs.parentNode.insertBefore(js, fjs);

        }(document, 'script', 'facebook-jssdk'));</script>



         <div id="fb-root"></div>



    </section>

@endsection