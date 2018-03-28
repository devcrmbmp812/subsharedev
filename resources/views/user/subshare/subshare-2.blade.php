@extends('layouts.user')
@section('title','Subshare')

@section('content')
<link rel="stylesheet" href="{{ url('assets/kalpana.css') }}">
    <aside class="right-side">

        <div class="breadcrumb feed-crumbs">
            <ol>
                <li><a href="{{ url('/user-dashboard') }}">Dashboard</a></li>
                <li class=""><i class="fa fa-angle-right" aria-hidden="true"></i><a href="javascript:void">Subshare</a></li>
                 <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="javascript:void">Offer</a></li>
                 <!-- http://optimabranding.com/5/Subshare/subshare-2.html -->
            </ol>
        </div>

        <section class="subhare-home home-content content">
            <div class="row">

    	    @if( Session::get('flashSuccessMessages') != null)
    	      <div class="alert alert-success">
    	          <strong>Success!</strong>.
    	          <br/>
    	          {{ Session::get('flashSuccessMessages') }}
    	      </div>
    	    @endif

                <div class="col-md-6">
                    <h1>Subshare Creation</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    {!! Form::open(['url' => 'subshareStore/']) !!}
                        <div class="creation-area">
                            <div class="form-group">

                                <select class="form-control" id="sel1" onchange="change_roles_text('sel1')" name="role">
                                    {{ \Helpers::getSubshareRoles() }}
                                </select>

                            </div>
                            <div class="form-group">
                                <select class="form-control" id="sel1" name="percentage">
                                    @for ($i = 1; $i <= 100; $i++)
                                         <option value="{{ $i }}%">{{ $i }}%</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea  class="form-control" rows="5" id="com" placeholder="Custom agreement" name="agreement" style="resize: none"></textarea>
                            </div>
<!--                            <button type="sbumit" class="btn btn-default" data-dismiss="modal">Send</button>-->
                        </div>

                <input type='hidden' name="track_id" value="{{ Request::segment(2) }}">
      		    <input type='hidden' name="offer_id" value="{{ Request::segment(2) }}">


                    <h1>How would you like to Subshare?</h1>
                    <div class="creation-area sub_two">

                        <div class="form-group">
							<div class="form-group">
                                <input type="radio" value="1" id="test1" name="myradio">
                                <label for="test1" id="text1">I want to give you all my media the way it is constructed</label>
							</div>
							<div class="form-group">
                                <input type="radio" value="2" id="test2" name="myradio" checked="">
    							<label for="test2" id="text2">I want to give you a section of my media the way it is constructed</label>
							</div>
                                                        <div id="form_section2" class="common-class">

                                                            <div class="form-group extra_pad">
                                                                    <textarea class="form-control" rows="5" name="com2" placeholder="Which Section?"></textarea>
                                                            </div>
                                                            <div class="form-group extra_pad">
                                                                    <div class="row">
                                                                            <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <input type="text" class="form-control" name="amount2" placeholder="Fixed amount">
                                                                                    </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <input type="text" class="form-control" name="percentage2" placeholder="Percent share">
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                        </div>
							<div class="form-group">
                                                            <input type="radio" value="3" id="test3" name="myradio" >
    							<label for="test3" id="text3">I want to give you an individual component</label>
							</div>
                                                        <div id="form_section3" class="common-class" style="display:none;">

                                                            <div class="form-group extra_pad">
                                                                    <textarea class="form-control" rows="5" name="com3" placeholder="Which Component?"></textarea>
                                                            </div>
                                                            <div class="form-group extra_pad">
                                                                    <div class="row">
                                                                            <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                            <input type="text" class="form-control" name="amount3" placeholder="Fixed amount">
                                                                                    </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                            <input type="text" class="form-control" name="percentage3" placeholder="Percent share">
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                        </div>
							<div class="form-group">
                                                            <input type="radio" value="4" id="test4" name="myradio">
    							<label for="test4" id="text3">I'll make you a straight offer</label>
							</div>
                                                        <div id="form_section4" class="common-class" style="display:none;">


                                                            <div class="form-group extra_pad">
                                                                    <div class="row">
                                                                            <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <input type="text" name="amount4" class="form-control" placeholder="Fixed amount">
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                        </div>
                        </div>
<!--                        <button type="button" class="btn btn-default" data-dismiss="modal">Send</button>-->
<button type="sbumit" class="btn btn-default" data-dismiss="modal">Send</button>

                    </div>
                    {!! Form::close() !!}
                    <h1>Subshare Stats</h1>
                    <div class="sales-area">

                        <div class="stats-area">

                            <div class="row tab-heading">

                                <div class="col-md-6">

                                    <h3>Stats</h3>

                                </div>

                                <div class="col-md-6">

                                    <ul class="nav nav-tabs">

                                        <li class="active"><a data-toggle="tab" href="#today">Today</a></li>

                                        <li><a data-toggle="tab" href="#week">Week</a></li>

                                        <li><a data-toggle="tab" href="#month">Month</a></li>

                                    </ul>

                                </div>

                            </div>

                            <!-- top tabs ends -->



                            <div class="tab-content">

                                <div id="today" class="tab-pane fade in active">

                                    <div class="row">

                                        <div class="col-md-6">

                                            <h3>Sales Grow</h3>

                                            <div class="circular-pro">

                                                <div class="progress blue">

                                                    <span class="progress-left">

                                                        <span class="progress-bar"></span>

                                                    </span>

                                                    <span class="progress-right">

                                                        <span class="progress-bar"></span>

                                                    </span>

                                                    <div class="progress-value">75%</div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <img src="img/Line%20chart.png" class="img-responsive">

                                        </div>

                                    </div>

                                </div>

                                <div id="week" class="tab-pane fade">

                                    <div class="row">

                                        <div class="col-md-6">

                                            <h3>Sales Grow</h3>

                                            <div class="circular-pro">

                                                <div class="progress blue">

                                                    <span class="progress-left">

                                                        <span class="progress-bar"></span>

                                                    </span>

                                                    <span class="progress-right">

                                                        <span class="progress-bar"></span>

                                                    </span>

                                                    <div class="progress-value">75%</div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <img src="img/Line%20chart.png" class="img-responsive">

                                        </div>

                                    </div>

                                </div>

                                <div id="month" class="tab-pane fade">

                                    <div class="row">

                                        <div class="col-md-6">

                                            <h3>Sales Grow</h3>

                                            <div class="circular-pro">

                                                <div class="progress blue">

                                                    <span class="progress-left">

                                                        <span class="progress-bar"></span>

                                                    </span>

                                                    <span class="progress-right">

                                                        <span class="progress-bar"></span>

                                                    </span>

                                                    <div class="progress-value">75%</div>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <img src="img/Line%20chart.png" class="img-responsive">

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <section class="content">

                            <div class="portlet box primary">

                                <div class="portlet-body">

                                    <div class="panel-body table-responsive">

                                        <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                                            <div class="table-scrollable">

                                                <table class="table table-hover">

                                                    <thead>

                                                    <tr>

                                                        <th>Member</th>

                                                        <th>Earnings</th>

                                                        <th>Cases</th>

                                                        <th>Closed</th>

                                                        <th>Rate</th>

                                                    </tr>

                                                    </thead>

                                                    <tbody>

                                                    <tr>

                                                        <td><img src="../assets/img/joe.png"><span>Joe Miller</span> </td>

                                                        <td>$345</td>

                                                        <td>45</td>

                                                        <td>224</td>

                                                        <td>80%</td>

                                                    </tr>



                                                    </tbody>

                                                </table>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>

                    </div>
                </div>


		<?php
		// get LoggedIn user last subshare.
		$lastSubshare = \Helpers::getsubsharetrack( Auth::user()->id );
		?>
                <div class="col-md-6 last-sub-div">

                       @if( gettype($lastSubshare) != false )
                        <!-- Subshare Details -->
                          <h1>Subshare Details</h1>
                        <div class="sub-detail-area red">
                                            <!-- Track Details -->
                                            <style>
                                                .new_style{
                                                        font-size: 14px;
                                                        font-weight: bold;
                                                        position: relative;
                                                        left:10px;
                                                }
                                                td{
                                                    border:0px !important;
                                                }
                                                .btn_custom{
                                                        background: #2ae281;
                                                        border: 0px;
                                                        border-radius: 35px;
                                                        font-size: 15px;
                                                        float: right;
                                                        margin-top: 10px;
                                                }
                                            </style>
<!-- // Track Details -->
						<div class="col-md-12">
							<div class="col-md-9">
                                                            <div class="row">
                                                                <h4>{{ \Helpers::getSubshareStatement( $lastSubshare->user_id , $lastSubshare->track_id, $lastSubshare->track_title, $lastSubshare->track_percentage) }}</h4>
                                                                <div class="col-md-9" style="padding-left: 0px;">
                                                                    <table border="0" style="border: 0px !important">
                                                                        <tr>
                                                                            <td rowspan="5"><img src="<?php echo \Helpers::audioCoverPath($lastSubshare->cover_img); ?>" style="width: 80px; height: 80px; border-radius: 50%;" /></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="new_style">Track: <?php echo $lastSubshare->track_title; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                         <td class="new_style"><?php echo $lastSubshare->track_percentage; ?>% complete</td>
                                                                        </tr>
                                                                        <tr>
                                                                         <td class="new_style"><?php echo $lastSubshare->track_bpm; ?> BPM</td>
                                                                        </tr>
                                                                         <tr>
                                                                         <td>&nbsp;</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
							<div class="col-md-3">
                                                            <div class="row">
                                                                <span><?php echo (!empty($lastSubshare->created_at) && isset($lastSubshare->created_at) ) ? \Helpers::get_time_ago(strtotime($lastSubshare->created_at)) : '' ; ?></span>
                                                            </div>
                                                        </div>
							<div class="clearfix"></div>
							<div class="wave-graph">
                                                            <div id="waveform"></div>

                                                            <a href="javascript:void(0)" class="sub-anchor" onclick="customplayPause()" style="top:25%" id="play-{{ $lastSubshare->id }}" data-id='{{ $lastSubshare->id }}'>
                                                                    <img class="img1" src="{{ url('assets/img/player-play-button.png') }}" class="img-responsive sub-two-play">
                                                                    <img class="img2" src="{{ url('assets/img/player-pause-button.png') }}" style="display: none">
                                                                </a>
                                                        </div>
						</div>
					</div>
                          <!-- Subshare Details end -->

                        @endif


                    <h1>Subshare User</h1>
                    <div class="sub-feed-area">

                        <div class="row tab-heading">
                            <div class="col-md-4">
                                <h3>Subshares User</h3>
                            </div>
                            <div class="col-md-8">
                                <ul class="nav nav-tabs">
                                    <li class=""><a data-toggle="tab" href="#feed" aria-expanded="false">All</a></li>
                                    <li><a data-toggle="tab" href="#offers">{{count($offers)}} Offers</a></li>
                                    <li class="active"><a data-toggle="tab" href="#Responses" aria-expanded="true">{{count($responses)}} Responses</a></li>
                                    <li><a data-toggle="tab" href="#Uploads">{{count($uploads)}}  Uploads</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- top tabs ends -->

                       <div class="tab-content">

                            <div id="feed" class="tab-pane fade">
                            @foreach($subshares as $val)

                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="{{ \Helpers::avatarURL($val->image) }}" style="width: 50px;height: 50px;border-radius: 50%;"></li>
                                        <li class="feed-details"><h2>{{ $val->first_name }} {{$val->last_name}} is offering to track
                                            {{$val->track_title}} for {{$val->percentage}}</h2>
                                            <p>{{$val->custom_agreement}}</p>
                                        </li>
                                        <li><p>{{ \Helpers::get_time_ago(strtotime($val->created_at)) }}</p></li>
                                        <li>
                                        <input type="hidden" id="user_imageold_subshare_{{$val->track_id}}" value="{{\Helpers::avatarURL($val->image)}}">
                                            <input type="hidden" id="user_nameold_subshare_{{$val->track_id}}" value="{{$val->first_name}} {{$val->last_name}}">
                                            <input type="hidden" id="track_titleold_subshare_{{$val->track_id}}" value="{{$val->track_title}}">
                                            <input type="hidden" id="track_insold_subshare_{{$val->track_id}}" value="{{$val->custom_agreement}}">
                                            <input type="hidden" id="track_perold_subshare_{{$val->track_id}}" value="{{$val->percentage}}">

                                            <button type="button" class="btn btn-info btn-lg small-green" data-toggle="modal" data-target="#myModalp" onclick="open_track('{{$val->file_name}}','{{$val->track_id}}','{{$val->track_id}}','subshare')">read</button>
                                        </li>

                                    </ul>

                                </div>
                            @endforeach

                            </div>



                            <!-- offer tab contents start -->
                            <div id="offers" class="tab-pane fade">
                                    @foreach($offers as $val)
                                        <div class="inner-feed-area">
                                            <ul>
                                                <li><img src="{{ \Helpers::avatarURL($val->image) }}" style="width: 50px;height: 50px;border-radius: 50%;"></li>
                                                <li class="feed-details"><h2>{{ $val->first_name }} {{$val->last_name}} is offering to track
                                                    {{$val->track_title}} for {{$val->track_percentage}}%</h2>
                                                    <p>{{$val->custom_agreement}}</p>
                                                </li>
                                                <li><p>{{ \Helpers::get_time_ago(strtotime($val->created_at)) }}</p></li>
                                                <li>
                                                    <input type="hidden" id="user_imageold_offers_{{$val->track_id}}" value="{{\Helpers::avatarURL($val->image)}}">
                                                    <input type="hidden" id="user_nameold_offers_{{$val->track_id}}" value="{{$val->first_name}} {{$val->last_name}}">
                                                    <input type="hidden" id="track_titleold_offers_{{$val->track_id}}" value="{{$val->track_title}}">
                                                    <input type="hidden" id="track_insold_offers_{{$val->track_id}}" value="{{$val->custom_agreement}}">
                                                    <input type="hidden" id="track_perold_offers_{{$val->track_id}}" value="{{$val->track_percentage}}">
                                                    <button type="button" class="btn btn-info btn-lg small-green" data-toggle="modal" data-target="#myModalp" onclick="open_track('{{$val->file_name}}','{{$val->track_id}}','{{$val->track_id}}','offers')">read</button>
                                                </li>
                                            </ul>
                                        </div>
                                    @endforeach
                            </div>
                            <!-- offer tab contents end -->


                            <!-- Responses tab content start  -->
                            <div id="Responses" class="tab-pane fade active in">
                                @foreach($responses as $val)
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="{{ \Helpers::avatarURL($val->image) }}" style="width: 50px;height: 50px;border-radius: 50%;"></li>
                                        <li class="feed-details"><h2>{{ $val->first_name }} {{$val->last_name}} is offering to track
                                            {{$val->track_title}} for {{$val->track_percentage}}%</h2>
                                            <p>{{$val->custom_agreement}}</p>
                                        </li>
                                        <li><p>{{ \Helpers::get_time_ago(strtotime($val->created_at)) }}</p></li>
                                        <li>
                                        <input type="hidden" id="user_imageold_{{$val->track_id}}" value="{{\Helpers::avatarURL($val->image)}}">
                                            <input type="hidden" id="user_nameold_{{$val->track_id}}" value="{{$val->first_name}} {{$val->last_name}}">
                                            <input type="hidden" id="track_titleold_{{$val->track_id}}" value="{{$val->track_title}}">
                                            <input type="hidden" id="track_insold_{{$val->track_id}}" value="{{$val->track_inspiration}}">
                                            <input type="hidden" id="track_perold_{{$val->track_id}}" value="{{$val->track_percentage}}">
                                           <!-- <button type="button" class="btn btn-info btn-lg small-green" data-toggle="modal" data-target="#myModal" onclick="open_track('{{$val->file_name}}','{{$val->track_id}}')">read</button> -->
                                           <button type="button" style="padding: 8px; font-size: 12px; width:auto;" class="btn btn-info btn-lg small-green"  onclick="">Discuss Offer</button>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                            </div>
                            <!-- Responses tab content end  -->


                            <!-- Uploads tab content start -->
                            <div id="Uploads" class="tab-pane fade">
                                @foreach($uploads as $val)
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="{{ \Helpers::avatarURL($val->image) }}" style="width: 50px;height: 50px;border-radius: 50%;"></li>
                                        <li class="feed-details"><h2>{{ $val->first_name }} {{$val->last_name}} has Uploaded track
                                            {{$val->track_title}} for {{$val->track_percentage}}%</h2>
                                            <p>{{$val->track_inspiration}}</p>
                                        </li>
                                        <li><p>{{ \Helpers::get_time_ago(strtotime($val->created_at)) }}</p></li>
                                        <li>
                                            <input type="hidden" id="user_imageold_uploads_{{$val->track_id}}" value="{{\Helpers::avatarURL($val->image)}}">
                                            <input type="hidden" id="user_nameold_uploads_{{$val->track_id}}" value="{{$val->first_name}} {{$val->last_name}}">
                                            <input type="hidden" id="track_titleold_uploads_{{$val->track_id}}" value="{{$val->track_title}}">
                                            <input type="hidden" id="track_insold_uploads_{{$val->track_id}}" value="{{$val->track_inspiration}}">
                                            <input type="hidden" id="track_perold_uploads_{{$val->track_id}}" value="{{$val->track_percentage}}">
                                            <button type="button" class="btn btn-info btn-lg small-green" data-toggle="modal" data-target="#myModalp" onclick="open_track('{{$val->file_name}}','{{$val->track_id}}','{{$val->track_id}}','uploads')">read</button>
                                        </li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                            <!-- Uploads tab content end -->
                        </div>

                    </div>
            </div>
        </section>
    </aside>


@endsection

@section('script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script>
      jQuery(document).ready(function () {
          jQuery(".notif-close").click(function () {
              jQuery(this).closest('.feed-notification').addClass('er-red');
              jQuery(this).closest('.feed-notification-green').addClass('er-red');
              jQuery(this).closest('.feed-notification-blue').addClass('er-red');
              jQuery(this).closest('.feed-notification-pink').addClass('er-red');
              jQuery(this).closest('.feed-notification-grey').addClass('er-red');
          });
      });
  </script>

  <script type="text/javascript">
    var wavesurfer = WaveSurfer.create({
    container: '#waveform',
    waveColor: 'gray',
    progressColor: 'red',
    audioRate: 1,
    barWidth: 3,
    height: 150,
    pixelRatio:1
    });

    wavesurfer.load("{{ url('server/php/files/' . $lastSubshare->file_name )}}");

    function customplayPause()
    {
        var cuurent_id= $(this).attr('id');
        wavesurfer.playPause();

        if(wavesurfer.isPlaying() == true)
        {
            $('.img2').show();
            $('.img1').hide();
        }else {

            $('.img1').show();
            $('.img2').hide();
        }

        // On finish place play icon.
        wavesurfer.on('finish', function () {
            $(' .img1').show(); // display play icon.
            $(' .img2').hide();
        });
    }

    $('input[type=radio][name=myradio]').change(function() {
        $(".common-class").hide();
        if (this.value == '1') {
            //alert("1");
        }
        else if (this.value == '2') {
            $("#form_section2").show();
        }
         else if (this.value == '3') {
            $("#form_section3").show();
        }
         else if (this.value == '4') {
            $("#form_section4").show();
        }
    });

    var wavesurfer1="";
    function open_track(song_name,id,sub_id,prefix){

     $("#loadd").show();
    $("#userimg").html('<img src="'+$("#user_imageold_"+prefix+"_"+id).val()+'" style="width: 50px;height: 50px;border-radius: 50%;">');

      $("#nametext").html($("#user_nameold_"+prefix+"_"+id).val() + " has Uploaded track "+$("#track_titleold_"+prefix+"_"+id).val() + " for " + $("#track_perold_"+prefix+"_"+id).val()+"%");
      $("#track_ins").html($("#track_insold_"+prefix+"_"+id).val());

       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        $.ajax({
            type: "POST",
            dataType:'html',
            url: "{{ url('/subshare_load_track') }}",
            data: {'subshare_id':id,'song_name':song_name},
            success: function(data)
            {
               $("#load_track_here").html(data);
                $("#loadd").hide();
            }
        });
}
    function customplayPause1()
    {
        var cuurent_id= $(this).attr('id');
        wavesurfer1.playPause();

        if(wavesurfer1.isPlaying() == true)
        {
            $('.img4').show();
            $('.img3').hide();
        }else {
            $('.img3').show();
            $('.img4').hide();
        }
        // On finish place play icon.
        wavesurfer1.on('finish', function () {
            $('.img3').show(); // display play icon.
            $('.img4').hide();
        });
    }
    $(".close").click(function(){
         wavesurfer1.destroy();
         $('.img3').show(); // display play icon.
         $('.img4').hide();
    });
    function change_roles_text(id)
    {
         var crole = $("#"+id).val();
         if(crole == "2"){
             $("#text1").html("I want all your media the way it is constructed");
             $("#text2").html("I want a section of your media the way it is constructed");
             $("#text3").html("I want an individual component");
             $("#text4").html("I will make you a straight offer");
         }else{
             $("#text1").html("I want to give you all my media the way it is constructed");
             $("#text2").html("I want to give you a section of my media the way it is constructed");
             $("#text3").html("I want to give you an individual component");
             $("#text4").html("I'll make you a straight offer");
         }
    }
  </script>


<div class="modal fade in" id="myModalp" style="top:20%" role="modal-dialog" data-keyboard="false" data-backdrop="static" style="">
    <div class="modal-dialog" style="width: 740px !important;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="closewave()" data-dismiss="modal"><i id="myclose" class="fa fa-times-circle" aria-hidden="true"></i>
                </button>
                <h4 class="modal-title">Subshare Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                   <div class="inner-feed-area">
                        <ul>
                            <li id="userimg" style="position: relative;top: -40px;left: 25px;"></li>

                            <li class="feed-details" style="width: 85%;padding: 25px; position: relative; top: -45px;"><h2 id="nametext"></h2>

                                <p id="track_ins"></p>

                            </li>

                            <li id="created_date" style="float: right; padding-right: 50px;"><p></p></li>
                        </ul>
                    </div>
                    <div class="col-md-12" id="load_track_here" style="margin-bottom: 20px;">

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection