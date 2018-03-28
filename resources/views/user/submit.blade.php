@extends('layouts.user')
@section('title','Media')
@section('content')
    <!-- third step code start  -->
    <link rel="stylesheet" href="{{url('plugins/peak/assets/nouislider.css')}}">
    <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> -->
    <script src="{{url('plugins/peak/assets/nouislider.js')}}"></script>
    <script src="{{url('plugins/peak/assets/wNumb.js')}}"></script>
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

            <li><a href="{{ url('/user-dashboard') }}">Dashboard</a></li>

            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Submit Track</li>

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



                                            <input id="fileupload" accept="audio/*" type="file" name="files[]" multiple>

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

                                        <input type="text" class="blur_check" name="track_title" class="form-control" id="track_title">

                                    </div>

                                    <input type="hidden" id="last_id">

                                    <div class="col-md-6">

                                        <label>BPM<a href="#" class="sub-tip" data-toggle="tooltip" title="The offical name of the track"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>

                                        <!-- <input type="text" class="blur_check" name="track_bpm" class="form-control" id="track_bpm"> -->

                                        <select class="form-control blur_check" name="track_bpm" id="track_bpm" style="width: 90%;height: 37px;">
	                                <option value="">BPM</option>
	                                    @for($j=70; $j<=180;$j++)
	                                       <option value="{{$j}}" > {{$j}} </option>
	                                    @endfor
	                                </select>

                                    </div>

                                    <div class="col-md-6" style="height:10px;">

                                        <label>Genre<a href="#" class="sub-tip" data-toggle="tooltip" title="The offical name of the track"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>

                                       <!-- <input type="text" class="blur_check" name="track_genre" class="form-control" id="track_genre"> -->

                                       <select class="form-control" name="track_genre" id="track_genre" style="width: 90%;;height: 37px;padding: 5px;">

						<option value="Alternative Music"> Alternative Music</option>
						<option value="Blues"> Blues</option>
						<option value="Classical Music"> Classical Music</option>
						<option value="Country Music"> Country Music</option>
						<option value="Hip Hop / Rap"> Hip Hop / Rap</option>
						<option value="Indie Pop"> Indie Pop</option>
						<option value="Asian Pop (J-Pop, K-pop)"> Asian Pop (J-Pop, K-pop)</option>
						<option value="Jazz"> Jazz</option>
						<option value="Latin Music"> Latin Music</option>
						<option value="New Age"> New Age</option>
						<option value="Opera"> Opera</option>
						<option value="Pop (Popular music)"> Pop (Popular music)</option>
						<option value="R&amp;B / Soul"> R&amp;B / Soul</option>
						<option value="Rock"> Rock</option>
						<option value="World Music / Beats"> World Music / Beats</option>
						<option value="Inspirational (incl. Gospel)"> Inspirational (incl. Gospel)</option>
					</select>

                                    </div>

                                    <div class="col-md-6">

                                        <label>Track age<a href="#" class="sub-tip" data-toggle="tooltip" title="The offical name of the track"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>

                                        <input type="text" class="blur_check" name="track_age" class="form-control" id="track_age">

                                    </div>

                                    <!-- Track image upload -->

                                  <!--   <div class="col-md-6">

                                        <label>Cover Image<a href="#" class="sub-tip"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>


                                        <input type="file" accept="image/*" name="cover_img" class="file blur_check" id="cover_img" >
                                        <div class="input-group" >
                                              <input type="text" class="form-control input-lg" style="width: 200% !important;height: 46px !important;" placeholder="Select file">
                          					          <span class="input-group-btn" style="position: absolute;right: 0;">
                          					            <button class="browse btn btn-primary input-lg" type="button"><i class="fa fa-upload" aria-hidden="true"></i></button>
                          					          </span>
                                         </div>

                                    </div> -->

                                    <div class="col-md-6">
                                      <label>Cover Image<a href="#" class="sub-tip"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>

                                      <input type="file" accept="image/*" name="cover_img" id="cover_img" class="file">
                                      <div class="input-group" style="display: block;">
                                          <input type="text" class="form-control input-lg" disabled="" placeholder="Select file" style="    width: 83% !important;">
                                          <span class="input-group-btn">
                                            <button class="browse btn btn-primary input-lg" type="button" style="height: 34px !important;"><i class="fa fa-upload" aria-hidden="true"></i></button>
                                          </span>
                                      </div>
                                    </div>

                                    <!-- Key Signature -->
                                    <div class="col-md-6">
                                        <label>Key Signature<a href="#" class="sub-tip" data-toggle="tooltip" title="The offical name of the track"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                                        <select class="form-control" name="key_signature" id="key_signature" style="width: 90%;height: 37px;padding: 5px;">
                                            <?php
                                            $letters = range('a', 'z');
                                            foreach ($letters as $letter)
                                            {
                                                echo '<option value="'.$letter.'">Key of '. strtoupper($letter) .'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Key Signature end -->

                                    <!-- combined or single -->
                                    <div class="col-md-6">
                                        <label>Combined or Single <a href="#" class="sub-tip" data-toggle="tooltip" title="The offical name of the track"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                                        <select class="form-control" name="cos" id="cos" style="width: 90%;height: 37px;padding: 5px;">
                                            <option value="combined">Combined</option>
                                            <option value="single">Single</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="range-area"><label class="fulllenght-label">Percent complete<a href="#" class="sub-tip" data-toggle="tooltip" title="The offical name of the track"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>

                                    <div class="range-slider" style="display: inline-flex;width:100%;">

                                        <input class="range-slider__range" style="width: 100% !important; height: 20px !important;" type="range" value="0" min="0" max="100" name="track_percentage">

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

                                    <textarea class="form-control blur_check" name="track_inspiration" rows="5" id="track_inspiration"></textarea>

                                </div>

                                <button type="submit" class="pro-sub-btn" id="btn_second" onclick="javascript:;">Submit & Proceed</button>

                            </div>

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
@section('script')
@endsection