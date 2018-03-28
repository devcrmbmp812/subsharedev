@extends('layouts.guest')
@section('title', 'Blog | Subshare')

@section('content')
    <style>
        body{
            background: #fff !important;
        }
    </style>
    <section class="banner-slider">
        <div class="container">
            <div class="row">
                <div id="blog-slider" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner"> 
                        
                        <?php 
                        $first = true;
                        foreach ($top_two as $val){?>
                        <?php if($first){?>
                        <div class="item active">
                        <?php $first = false;}else { ?>
                             <div class="item ">
                            <?php }?>
                                 
                            <img src="assets/blog/blog-banner.png" class="img-responsive" alt="Second slide">

                            <div class="header-text">
                                <div class="col-md-7 text-left">
                                    <span class="date_box">
                                         {{ explode(' ',$val->created_at)[0] }}
                                    </span>
                                    <div>
                                    <h2 class='append_dot' style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden !important; text-overflow: ellipsis;">
                                        {{$val->title}} 
                                    </h2>
                                    </div>
                                    <p class='append_dot' style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden !important; text-overflow: ellipsis;" > {{$val->text}} </p>
                                    <a href="{{url('/blog').'/'.$val->id}}" class="btn btn-default readmore_btn btn_bs">Read more</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                    </div>

                    <a class="left carousel-control" href="#blog-slider" data-slide="prev">
                        <span class="left_arrow"><i class="fa fa-chevron-left"></i></span>
                    </a>
                    <a class="right carousel-control" href="#blog-slider" data-slide="next">
                        <span class="right_arrow"><i class="fa fa-chevron-right"></i></span>
                    </a>
                </div>
                <!-- /carousel -->
            </div>

            <div class="clearfix"></div>
            <div class="blog-section">
                <div class="row">
                    <div class="blog-box">
                        @foreach($posts as $post)
                        <div class="panel panel-default">
                            <a href="{{url('/blog/'.$post->id.'')}}">
                                <div class="panel-body">
                                    <div class="blog_img_holder">
                                        <img src="assets/blog/{{$post->image}}" class="img-responsive" alt="">
                                    </div>
                                    <h3>{{ $post->title }}</h3>

                                    <p>{{ $post->text }}</p>

                                    <div class="msgs_box">

                                        <span class="date_box1">

                                        {{ explode(' ',$post->created_at)[0]}}

                            </span>
                                    </div>
                                </div>
                            </a>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-pagination">

                    <ul class="pagination pagination-sm">
                        {{ $posts->links() }}
                        {{--<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>--}}
                        {{--<li><a href="#">2</a></li>--}}
                        {{--<li><a href="#">3</a></li>--}}
                        {{--<li><a href="#">4</a></li>--}}
                        {{--<li><a href="#">5</a></li>--}}
                        {{--<li class="disabled"><a href="#">...</a></li>--}}
                        {{--<li><a href="#">10</a></li>--}}
                        {{--<li><a href="#">20</a></li>--}}
                        {{--<li><a href="#">30</a></li>--}}
                        {{--<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <script>
     
     
    </script>
@endsection