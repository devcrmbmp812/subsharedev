@extends('layouts.user')

@section('content')

<!-- third step code start  -->
    <link rel="stylesheet" href="{{url('assets/peak/assets/nouislider.css')}}">
   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> -->
    <script src="{{url('assets/peak/assets/nouislider.js')}}"></script>
    <script src="{{url('assets/peak/assets/wNumb.js')}}"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <style>
	 /* gap between region/tags div */
     #dynamic_inputs div {
		 margin-bottom: 50px;
	 }

      #titles, [id*="waveform-visualiser"] {
        margin: 24px auto;
        /* width: 1000px; */
      }
     aside.left-side {
    position: fixed;
    top: 78px;
    width: 0px !important;
  }
      [id*="waveform-visualiser"]  {
        box-shadow: 3px 3px 20px #919191;
        margin: 0 0 24px 0;
        -moz-box-shadow: 3px 3px 20px #919191;
        -webkit-box-shadow: 3px 3px 20px #919191;
        line-height: 0;
      }

      .overview-container {
        margin-bottom: -24px;
        height: inherit;
      }

      .overview-container .konvajs-content{
        display:none;
      }

      #second-waveform-visualiser-container [class*="-horizontal"] {
        background: #111;
      }

      #demo-controls {
        margin: 0 auto 24px auto;
        /*width: 1000px;*/
      }

      #demo-controls > * {
        vertical-align: middle;
      }

      #demo-controls button {
        background: #fff;
        border: 1px solid #919191;
        cursor: pointer;
      }

      #seek-time {
        width: 4em;
      }

      #controls {
        float: right;
      }

      .log {
        margin: 0 auto 24px auto;
        width: 1000px;
      }

      table {
        width: 100%;
      }

      table th {
        text-align: left;
      }

      table th, table td {
        padding: 0.5em;
      }

      .navy-1 {
        background: #00e180;
      }

      .navy-2 {
        background: #7fdbff;
      }

      .navy-3 {
        background: #0074d9;
      }

      .navy-4 {
        background: #01ff70;
      }

      .navy-5 {
        background: #001f3f;
      }

      .navy-6 {
        background: #39cccc;
      }

      .navy-7 {
        background: #3d9970;
      }

      .navy-8 {
        background: #2ecc40;
      }
      .navy-9 {
        background: #ff4136;
      }
      .navy-10 {
        background: #85144b;
      }
      .navy-11 {
        background: #ff851b;
      }
      .navy-12 {
        background: #b10dc9;
      }
      .navy-13 {
        background: #ffdc00;
      }
      .navy-14 {
        background: #f012be;
      }
      .navy-15 {
        background: #aaaaaa;
      }
      .navy-16 {
        background: #ffffff;
      }
      .navy-17 {
        background: #111111;
      }
      .navy-18 {
        background: #dddddd;
      }

    .noUi-horizontal{
      height: 30px;
      margin-bottom: 12px;
      margin-top: 20px;
    }
      *, *:before, *:after {
          -webkit-box-sizing: border-box;
          box-sizing: border-box;
      }
      .range-slider {
          margin: 60px 0 0 0%;
      }

      .range-slider {
          width: 100%;
      }

      .range-slider__range {
          -webkit-appearance: none;
          width: calc(100% - (73px));
          height: 10px;
          border-radius: 5px;
          background: #d7dcdf;
          outline: none;
          padding: 0;
          margin: 0;
      }
      .range-slider__range::-webkit-slider-thumb {
          -webkit-appearance: none;
          appearance: none;
          width: 30px;
          height: 30px;
          border-radius: 50%;
          background: #2ae281;
          cursor: pointer;
          -webkit-transition: background .15s ease-in-out;
          transition: background .15s ease-in-out;
      }
      .range-slider__range::-webkit-slider-thumb:hover {
          background: #1abc9c;
      }
      .range-slider__range:active::-webkit-slider-thumb {
          background: #1abc9c;
      }
      .range-slider__range::-moz-range-thumb {
          width: 20px;
          height: 40px;
          border: 0;
          border-radius: 50%;
          background: #2ae281;
          cursor: pointer;
          -webkit-transition: background .15s ease-in-out;
          transition: background .15s ease-in-out;
      }
      .range-slider__range::-moz-range-thumb:hover {
          background: #1abc9c;
      }
      .range-slider__range:active::-moz-range-thumb {
          background: #1abc9c;
      }

      .range-slider__value {
          display: inline-block;
          position: relative;
          width: 60px;
          color: #fff;
          line-height: 30px;
          font-size: 18px;
          text-align: center;
          border-radius: 3px;
          background: #2ae281;
          padding: 5px 10px;
          margin-left: 8px;
      }
      .range-slider__value:after {
          position: absolute;
          top: 8px;
          left: -7px;
          width: 0;
          height: 0;
          border-top: 7px solid transparent;
          border-right: 7px solid #2ae281;
          border-bottom: 7px solid transparent;
          content: '';
      }

      ::-moz-range-track {
          background: #d7dcdf;
          border: 0;
      }

      input::-moz-focus-inner,
      input::-moz-focus-outer {
          border: 0;
      }

    </style>







<!-- third step code end  -->





    <style>
        #style_btn:hover{
            background-color: #eff3f6 !important;
            border: 1px solid #2ae281   !important;
            color: #2ae281   !important;
        }
        .ajax-loader {
            visibility: hidden;
            background-color: rgba(255,255,255,0.7);
            position: absolute;
            z-index: +100 !important;
            width: 100%;
            height:100%;
        }

        .ajax-loader img {
            position: relative;
            top:50%;
            left:50%;
        }
    </style>
<div class="ajax-loader">
    <img src="https://cdn-us-east.velaro.com/Content/Images/loading.gif" width="100px" class="img-responsive" />
</div>
    <aside class="right-side">
        <ol class="breadcrumb">
            <li><a href="#">Breadcrumb item 1</a></li>
            <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Breadcrumb item 2</a></li>
        </ol>
        <section class="submit-content" id="invoice-page">
            <div class="row">

                <div class="col-lg-12 top-right-content" id="dropzone_div">
                    <div id="dropzone">
                        <form action="javascript:;" class="dropzone needsclick" id="demo-upload">
                            <div class="inner-submit-content">

							    <div class="top-submit-nav">
                                    <a href="#step-1" type="button" class="btn btn-primary-nav btn-circle-nav">1</a>
                                    <p>Upload file</p>
                                </div>

                                <div class="submit-top-area">
                                    <div class=" dz-default dz-message">

									  <!--
									  <span class="input-group-btn">
                                            <button class="upload-btn btn btn-primary input-lg" type="button"><img src="img/up-img.png" class="img-responsive"></button>
                                          </span>
                                        <h4 class="upload_btn">Upload File</h4>
										-->

									 <span id="style_btn" style="background: #eff3f6;
                                                        border: 0px;
                                                        border-radius: 0px;
                                                        padding: 10px;
                                                        margin-bottom: 16px;" class="btn btn-default fileinput-button">
                                            {{--  <i class="glyphicon glyphicon-plus"></i>
                                            <span>Select files...</span>  --}}
                                                                        <!-- The file input field used as target for the file upload widget -->
                                             <label for="fileupload">
                                                {{--  <img src="http://novaturesol.com/subsharefile/subsharefile/img/up-img.png"/>  --}}
                                                     <img src="{{url('assets/admin/img/up-img.png')}}"/>

                                            </label>

											 <h4 class="upload_btn">Upload File</h4>

                                            <input id="fileupload"  type="file" name="files[]" multiple>
                                        </span>


                                        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                                    </div>
                                    <button type="btn" class="pro-sub-btn" disabled="true">Submit & Proceed</button>
                                    <p id="files"> </p>
                                    <div class="progress"  id="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <style>
                        .progress {
                            position: relative; /* remove this and title works */
                            overflow: visible;
                            height:25px;
                        }
                        .progress-bar{
                            height: 25px;
                            font-size: 15px;
                            border-radius: 6px;
                            background-color: #cccdce;
                            color: #2a95c4;
                            font-weight: bold;
                        }
                    </style>
                    <form action="javascript:;" id="track_form" method="POST" style="display:none;">

                        <div class="inner-submit-content">
                            <div class="second-submit-area">
                                <div class="top-submit-nav">
                                    <a href="#step-2" type="button" class="btn btn-primary-nav btn-circle-nav">2</a>
                                    <p>Track details</p>
                                </div>
                                <div class="alert alert-danger" style="display:none;" id="error_percent">
                                    <strong>Error!</strong> Please Complete all Inputs.
                                </div>
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label>Track Title<a href="#" class="sub-tip" data-toggle="tooltip" title="The offical name of the track"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                                        <input type="text" class="blur_check" name="track_title" class="form-control" id="track_title" value="track title">
                                    </div>
                                    <input type="hidden" id="last_id">
                                    <div class="col-md-6">
                                        <label>BPM<a href="#" class="sub-tip" data-toggle="tooltip" title="The offical name of the track"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                                        <input type="text" class="blur_check" name="track_bpm" class="form-control" id="track_bpm" value="track bmp">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Genre<a href="#" class="sub-tip" data-toggle="tooltip" title="The offical name of the track"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                                        <input type="text" class="blur_check" name="track_genre" class="form-control" id="track_genre" value="track genre">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Track age<a href="#" class="sub-tip" data-toggle="tooltip" title="The offical name of the track"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                                        <input type="text" class="blur_check" name="track_age" class="form-control" id="track_age" value="track age">
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <label>Cover Image<a href="#" class="sub-tip" data-toggle="tooltip" title="Track Cover Image"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                                        <input type="file" class="blur_check" name="track_cover_img" class="form-control" id="track_cover_img">
                                    </div>
                                </div>


                                <div class="range-area"><label class="fulllenght-label">Percent complete<a href="#" class="sub-tip" data-toggle="tooltip" title="The offical name of the track"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                                    <!--<img src="img/percentage-range.png" class="img-responsive"> -->

                                    <div class="range-slider" style="    display: inline-flex; width: 100%;">
                                        <input class="range-slider__range" style="    width: 100% !important;
    height: 20px !important;" type="range" value="0" min="0" max="100">
                                        <span class="range-slider__value">0</span>
                                    </div>
                                    <div class="progress" style="display: none;">
                                        <div class="progress-bar  bg-secondary" role="progressbar" id="progress_complete" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                            <div style="padding-top: 2px;" id="percentage_done">
                                                0%
                                            </div>
                                        </div>
                                        <div id="progress_slider" style="width: 20px; height: 20px; position: absolute; background: #2a95c4; padding:15px !important; margin-top:-2px;" title="Progress">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="fulllenght-label">Track inspiration<a href="#" class="sub-tip" data-toggle="tooltip" title="The offical name of the track"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                                    <textarea class="form-control blur_check" name="track_inspiration" rows="5" id="track_inspiration">track inspiration </textarea>
                                </div>
                                <button type="submit" class="pro-sub-btn" id="btn_second" onclick="javascript:;">Submit & Proceed</button>
                            </div>
                            {{--<div class="third-submit-area">--}}
                                {{--<div class="top-submit-nav">--}}
                                    {{--<a href="#step-3" type="button" class="btn btn-primary-nav btn-circle-nav">3</a>--}}
                                    {{--<p>Tagging</p>--}}
                                {{--</div>--}}

                                {{--<div class="bottom-range-area">--}}

                                    {{--<img src="img/bottom-range.png" class="img-responsive">--}}
                                    {{--<a href="#" class="new-tag"><i class="fa fa-plus" aria-hidden="true"></i><span>Add tag</span></a>--}}
                                {{--</div>--}}
                                {{--<div class="form-group row">--}}
                                    {{--<div class="col-md-6">--}}
                                        {{--<label class="red-tag-label">Tag 1<a href="#" class="sub-tip" data-toggle="tooltip" title="The offical name of the track"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>--}}
                                        {{--<input type="text" class="form-control" id="usr" placeholder="Bass">--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-6">--}}
                                        {{--<label class="green-tag-label">Tag 2<a href="#" class="sub-tip" data-toggle="tooltip" title="The offical name of the track"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>--}}
                                        {{--<input type="text" class="form-control" id="bpmr" placeholder="Need help with this intro">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<button type="btn" class="pro-sub-btn">Submit & Proceed</button>--}}

                            {{--</div>--}}
                        </div>
                    </form>

                    <div  id="tag_form"  style="display:block;">


                    </div>
                </div>
            </div>
        </section>
    </aside>


        <br>
<script>

    var rangeSlider = function(){
        var slider = $('.range-slider'),
            range = $('.range-slider__range'),
            value = $('.range-slider__value');

        slider.each(function(){

            value.each(function(){
                var value = $(this).prev().attr('value');
                $(this).html(value);
            });

            range.on('input', function(){
                $(this).next(value).html(this.value);
            });
        });
    };

    rangeSlider();
</script>

@endsection