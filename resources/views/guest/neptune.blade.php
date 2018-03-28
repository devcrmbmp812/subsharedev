@extends('layouts.guest')
@section('title', 'Neptune | Subshare')
@section('content')
<link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>


<section class="land-banner-section">
    <div class="land-img-holder">
        <img src="{{ url('assets/img/neptune/land_banner_img-1.png') }}" class="img-responsive" alt="">
    </div>
    <div class="top-box">
        <div class="mid-box">
            <div class="inner-box">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <h1>
                                play
                            </h1>
                            <p>
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla. Excepteur sint occaecat cupidatat no. </p>
                            <a href="{{ url('/register') }}" class="btn btn-default log_btn btn_bs">Sign up</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="layer_feature"><img src="{{ url('assets/img/neptune/layer2.png') }}" class="img-responsive" alt=""></div>
</section>



<section class="land-feature-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6 xs-full">
                <h3>featured</h3>
                <p style="font-size:16px;">Excepteur sint occaecat cupidatat non. proident, sunt in culpa.velit esse cillum dolore eu fugiat nulla. Excepteur sint occaecat cupidatat no.</p> <a href="#" class="btn btn-default more_btn btn_bs">More</a> </div>
            <div class="col_md_3 gallery-box  land_bs1 col-sm-6 col-xs-6 xs-full"><img src="{{ url('assets/img/neptune/1.jpg') }}" class="img-responsive" alt="" srcset="{{ url('assets/img/neptune/1.jpg') }} 300w, {{ url('assets/img/neptune/1-150x150.jpg') }} 150w" sizes="(max-width: 300px) 100vw, 300px" width="300" height="300"></div>
            <div class="col_md_3 gallery-box  land_bs1 col-sm-6 col-xs-6 xs-full"><img src="{{ url('assets/img/neptune/2-1.jpg') }}" class="img-responsive" alt="" srcset="{{ url('assets/img/neptune/2-1.jpg') }} 300w, {{ url('assets/img/neptune/2-1-150x150.jpg') }} 150w" sizes="(max-width: 300px) 100vw, 300px" width="300" height="300"></div>
            <div class="col_md_31 col-sm-6 col-xs-6 xs-full">
                <ul>
                    <div class="images_box1 land_img">
                        <li><img src="{{ url('assets/img/neptune/3.png') }}" class="img-responsive" alt="" width="124" height="124"></li>
                        <li><img src="{{ url('assets/img/neptune/4.png') }}" class="img-responsive" alt="" width="124" height="124"></li>
                        <li><img src="{{ url('assets/img/neptune/5.png') }}" class="img-responsive" alt="" width="124" height="124"></li>
                    </div>
                    <div class="images_box1 land_img">
                        <li><img src="{{ url('assets/img/neptune/About2.jpg.png') }}" class="img-responsive" alt="" width="124" height="124"></li>
                        <li><img src="{{ url('assets/img/neptune/Untitled-design-1.png') }}" class="img-responsive" alt="" width="124" height="124"></li>
                        <li><img src="{{ url('assets/img/neptune/Untitled-design-2.png') }}" class="img-responsive" alt="" width="124" height="124"></li>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</section>


    <section class="discover-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="discover_h">discover</h3>
                </div>


                <div class="col-md-12">
                  <div class="form_div">
                    <form action="#" class="discover_form">
                      <div class="form-group select_box">
                        <div class="select_icon">
                          <select class="form-control">
                            <option value="1">Genre</option>
                            <option value="2">Pop</option>
                            <option value="3">Genre</option>
                            <option value="4">Genre</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group token_fld" style="height: auto;">
                        <input type="text" class="form-control" id="tokenfield" value="red,drums,blues on honey" />
                      </div>
                    </form>
                  </div>
                </div>



                <div class="clearfix"></div>
                <div class="col-md-12 discover_gallery">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-41 text-center padding-0 img-b"><img alt="" src="{{ url('assets/img/neptune/Untitled-design-9-150x150.jpg') }}"></div>
                            <div class="col-md-41 text-center padding-0 img-b"><img alt="" src="{{ url('assets/img/neptune/Untitled-design-11-150x150.jpg') }}"></div>
                            <div class="col-md-41 text-center padding-0 img-b"><img alt="" src="{{ url('assets/img/neptune/Untitled-design-12-150x150.jpg') }}"></div>
                            <div class="col-md-41 text-center padding-0 img-b"><img alt="" src="{{ url('assets/img/neptune/Untitled-design-14-1-150x150.jpg') }}"></div>
                            <div class="col-md-41 text-center padding-0 img-b"><img alt="" src="{{ url('assets/img/neptune/Untitled-design-19-150x150.jpg') }}"></div>
                            <div class="col-md-41 text-center padding-0 img-b"><img alt="" src="{{ url('assets/img/neptune/Untitled-design-21-150x150.jpg') }}"></div>
                            <div class="col-md-41 text-center padding-0 img-b"><img alt="" src="{{ url('assets/img/neptune/Untitled-design-22-150x150.jpg') }}"></div>
                            <div class="col-md-41 text-center padding-0 img-b"><img alt="" src="{{ url('assets/img/neptune/Untitled-design-25-1-150x150.jpg') }}"></div>
                            <div class="col-md-41 text-center padding-0 img-b"><img alt="" src="{{ url('assets/img/neptune/Untitled-design-27-150x150.jpg') }}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="sell-section share_box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5 col-sm-5 col-xs-6 xs-full">
                <div class="sell_content_box">
                    <h3>share</h3>
                    <p>Excepteur sint occaecat cupidatat non. proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore.</p> <a href="{{ url('/subshare-page') }}" class="btn btn-default more_btn btn_bs">More</a> </div>
            </div>
            <div class="col-md-7 col-sm-7 col-xs-6 xs-full">
                <div class="sell_img_holder">
                    <img src="{{ url('assets/img/neptune/landscape_share-1.png') }}" class="img-responsive" alt="">
                </div>
            </div>

        </div>
    </div>
</section>

<section class="play-section video_section">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-6 col-xs-6 xs-full">
                <div class="play_img_holder">
                    <p><img src="{{ url('assets/img/neptune/NeptuneBottom-e1511118679122.jpg') }}" alt="" class="alignnone size-full wp-image-515" width="800" height="450"></p>
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-6 xs-full">
                <div class="play_content_box">
                    <br>
                    <h3>lorem ipsum</h3>
                    <p>Excepteur sint occaecat cupidatat non. proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde.
                    </p>
                    <p> <a href="#" class="btn btn-default play_more_btn btn_bs">More</a></p>
                </div>
            </div>
        </div>
    </div>
</section>



<script type="text/javascript" src="{{ url('assets/js/bootstrap-tokenfield.min.js') }}"></script>
<!-- <script type="text/javascript" src="{{ url('assets/js/bootstrap.min.js') }}"></script> -->
<!-- <script type="text/javascript" src="{{ url('assets/js/mislider.min.js') }}"></script> -->
<script>
    jQuery(document).ready(function ($) {
        $('#tokenfield').tokenfield({
            // autocomplete: {
            //     source: ['red','blue','green','yellow','violet','brown','purple','black','white'],
            //     delay: 100
            // }
        });
    });
</script>

@endsection