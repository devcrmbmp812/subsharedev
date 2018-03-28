@extends('layouts.user')
@section('title','sub-share')

@section('content')
<style>
    /* Regions */
  .wavesurfer-region {
    border: 1px solid #ddd !important;
    box-sizing: border-box;
  }

  /* Region handles */
  .wavesurfer-handle {
    width: 10px !important;
    max-width: 10px !important;
    border: 1px solid #ddd;
    background: rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
  }


  .wavesurfer-handle:before,
  .wavesurfer-handle:after {
    content: '';
    display: block;
    position: absolute;
    z-index: 1;
    border-top: 1px solid #fff;
    border-bottom: 1px solid #fff;
    height: 4px;
    left: 5%;
    right: 5%;
    top: 50%;
    transform: translateY(-50%);
  }

  .wavesurfer-handle:before {
    margin-top: -3px;
  }

  /* Labels */
  .labels-container {
    position: relative;
  }
  .wavesurfer-region{
    opacity: 0.3!important;
  }
  .wavesurfer-label {
    display: block;
    position: absolute;
    transform: translateY(-100%);
    z-index: 10;

  }

  .wavesurfer-label input {
    margin: 3%;
    width: 94%;
  }
  .album-buttom2 .album-buttoms{
   border-radius: 14px;
   background-color: #e72b91;
   position: relative;
   width: 111px;
   height: 29px;
   z-index: 483;
   font-size: 14px;
   font-weight: bold;
   color: #fff;
   border: none;
   margin-top: 9px;
   margin-bottom: 10px;
   margin-left: 40px;
 }
 .album-buttom3 .album-buttoms{
   border-radius: 14px;
   background-color: #3ecdd2;
   position: relative;
   width: 111px;
   height: 29px;
   z-index: 483;
   font-size: 14px;
   font-weight: bold;
   color: #fff;
   border: none;
   margin-top: 9px;
   margin-bottom: 10px;
   margin-left: 40px;
 }


 .album-buttom1 .album-buttoms {
  border-radius: 14px;
  background-color: #91c21d;
  position: relative;
  width: 111px;
  height: 29px;
  z-index: 483;
  font-size: 14px;
  font-weight: bold;
  color: #fff;
  border: none;
  margin-top: 9px;
  margin-bottom: 10px;
  margin-left: 0px;
}
.labels-container {
  position: relative;
  margin: 70px 0px;
}
.wave-graph a.sub-anchor{
   position: absolute !important;
   top:30% !important;
}
.inner-submit-content {
    margin-top: 10px;
}
.sub-detail-area.extra h4 {
     float: inherit !important; 
     margin-bottom: 0px !important;
}
.three_a .creation-area{padding: 6px 6px 54px 0;}
.creation-area .track{padding-top: 30px;}
.creation-area .track.one{padding-top: 0px;}
section.three_a .creation-area.shareprocess{border-left: 7px solid #75952f;}
.creation-area.shareprocess{padding: 20px 6px 20px 16px;}
.creation-area.shareprocess .sub-two-wave{text-align: inherit;margin: 0px;}
.creation-area.shareprocess .wave-graph a.sub-anchor{bottom: 13px;left: 44px;top:auto;}
.three_a .creation-area .wave-graph a.sub-anchor{top: 18px;right: 22px;}

.success{padding-left: 35px;}
.success .form-control{background: #f2f2f2 !important;color: #9299a8;padding: 20px 12px;}
.three_a.process .creation-area .form-group select{border: 1px solid #ededed;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: url(../assets/images/drop-down-arrow.png) 98% 2% no-repeat #f2f2f2 !important;}
.chat{padding: 0px 40px;}
.chat .btn-success{width: 100%;text-align: left;border-radius: 220px;background-color: #2ae281; border-color: #2ae281;text-transform: uppercase;font-family: 'Raleway', sans-serif;padding: 6px 14px 0;font-size: 18px;}
.chat .btn-success img{width: 38px;display: inline-block;}
.chat .btn-success span{display: inline-block;margin-left: 20px;}
.creation-area.no-margin{margin-bottom: 0px;border-left: 7px solid #2e6ca4;padding: 6px 6px 54px 0;}
.three_a .creation-area textarea.form-control::-webkit-input-placeholder { color: #9299a8 !important;}
.three_a .creation-area textarea.form-control::-moz-placeholder {color: #9299a8 !important;}
.three_a .creation-area textarea.form-control:-ms-input-placeholder { color: #9299a8 !important;}
.three_a .creation-area textarea.form-control:-moz-placeholder { color: #9299a8 !important;}
.three_a .form-group {margin-bottom: 8px;}
.creation-area .track .col-md-1{padding: 0px 0px 0px 15px;}
.creation-area .track .col-md-1 img{max-width: 50px; width: 100%;}
.three_a .inner-feed-area ul li img{margin-right: 15px;}
</style>
<link rel="stylesheet" href="{{ url('assets/kalpana.css') }}">
<aside class="right-side">
		<ol class="breadcrumb pad">
			<li><a href="#">Home</a></li>
			<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Subshare</a></li>
			<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Final</a></li>
		</ol>
        <section class="subhare-home home-content content three_a process">
            <div class="">
                <div class="col-md-6">
                    <h1>Subshare Creation</h1>
                      <?php
                                        // get LoggedIn user last subshare.
                                        $lastSubshare = \Helpers::getSubshareDetail(Request::segment(2));
                                      ?>
                     
                    <div class="creation-area">
                                            {!! Form::open(['url' => 'subshareUpdate/']) !!}
						<div class="form">
							<div class="form-group">
								 <select class="form-control" id="roles" name="roles">
                                                                    {{ \Helpers::getSubshareRoles($lastSubshare->roles) }}
                                                                </select>
							</div>
							<div class="form-group">
								 <select class="form-control" id="percentage" name="percentage">
                                                                        @for ($i = 1; $i <= 100; $i++)
                                                                             <option value="{{ $i }}%" <?php if($lastSubshare->percentage == $i."%"){ echo 'selected="selected"';}?>>{{ $i }}%</option>
                                                                        @endfor
                                                                    </select>
							</div>
                                                    <input type="hidden" name="proceed" value="{{Request::segment(2)}}">
                                                        <div class="form-group">
                                                            <textarea  class="form-control" rows="5" id="agreement"  name="agreement" placeholder="Custom agreement" value="" name="agreement" style="resize: none">{{ $lastSubshare->custom_agreement }}</textarea>
                                                        </div>
						</div>
					
                           <?php
                           $subshare_userid = \Helpers::getSubsharesbyUserID(Request::segment(2));
                           if($subshare_userid == Auth::user()->id){?><button type="sbumit" class="btn btn-default" data-dismiss="modal">Send</button><?php }?>
                           <input type="hidden" name="current_url" value="{{$_SERVER['REQUEST_URI']}}">
                           <input type='hidden' id="subshare_id" name="subshare_id" value="{{ Request::segment(2) }}">      
                    
                    
                    {!! Form::close() !!}
					</div> 
                     <h1>Subshare History</h1>
					<div class="">
					  <div class="sub-feed-area">

                        <div class="row tab-heading">

                           

                            <div class="col-md-8">
                                <ul class="nav nav-tabs" style="width:100%">
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
					</div>
                </div>
                <div class="col-md-6 last-sub-div">
                    <h1 class="text-center">Subshare Details</h1>
                    <?php $index = 1;?>
                    @foreach($media as $med)
					<div class="sub-detail-area red">
						<div class="col-md-12">
							<h4>{{$med->first_name}} {{$med->last_name}}</h4>
							<div class="col-md-9">
								<div class="row">
									<strong>{{\Helpers::getUserDetails($med->uploader)->first_name}} {{\Helpers::getUserDetails($med->uploader)->last_name}} is offering Producer to track for <span>{{$med->track_percentage}}%</span></strong>
								</div>
							</div>
							<div class="col-md-3">
								<div class="row">
									<span class="time">{{\Helpers::get_time_ago(strtotime($med->created_at))}}</span>
								</div>
							</div>
							<div class="clearfix"></div>
							<p>{{$med->custom_agreement}}</p>
							<div class="wave-graph" style="width: 100%;" >


                                                        <div id="wave{{$index}}_<?php echo $med->uploads_id; ?>"></div>
                                                        <img style="height: 100px; width:100%;" id="playerimg{{$index}}_{{$med->uploads_id}}"  src="{{ url('assets/img/wave%20copy.png') }}">
                                                        <a href="javascript:void(0)" id="start{{$index}}_{{$med->uploads_id}}" onclick="loadPlayer('{{ url('server/php/files/'. $med->file_name) }}', '{{ $med->uploads_id}}','{{$index}}' );"><img src="{{ url('assets/img/Play%20button.png') }}"></a>
                                                        <a href="javascript:void(0)" class="play" id="play{{$index}}-{{ $med->uploads_id }}" style="display: none;" data-id='{{ $med->uploads_id }}'>
                                                            <img class="img3{{$index}}" src="{{url('assets/img/player-play-button.png')}}">
                                                            <img class="img4{{$index}}" src="{{url('assets/img/player-pause-button.png')}}" style="display:none;">
                                                        </a>
                                                    </div>
						</div>
					</div>
                    <?php $index = $index + 1; ?>
                    @endforeach
                    
                    <style>
                        
                        .btn_custom {
    background: #2ae281;
    border: 0px;
    border-radius: 35px;
    font-size: 15px;
    float: right;
    margin-top: 10px;}
                    </style>
					<div class="sub-detail-area extra blue">
						<div class="col-md-12">
							<h4>Source Track</h4>
							<span class="time">{{\Helpers::get_time_ago(strtotime($subshare_tracks->created_at))}}</span>
							<div class="clearfix"></div>
							<div class="wave-graph" style="width: 100%;" >
                                                            <div id="wave_sub<?php echo $subshare_tracks->id; ?>"></div>
                                                            <img style="height: 100px; width:100%;" id="playerimg_sub{{$subshare_tracks->id}}"  src="{{ url('assets/img/wave%20copy.png') }}">
                                                            <a href="javascript:void(0)" id="start_sub{{$med->uploads_id}}" onclick="loadPlayersub('{{ url('server/php/files/'. $subshare_tracks->file_name) }}', '{{ $subshare_tracks->id}}' );"><img src="{{ url('assets/img/Play%20button.png') }}"></a>
                                                            <a href="javascript:void(0)" class="play" id="play-sub{{ $subshare_tracks->id }}" style="display: none;" data-id='{{ $subshare_tracks->id }}'>
                                                                <img class="img5" src="{{url('assets/img/player-play-button.png')}}">
                                                                <img class="img6" src="{{url('assets/img/player-pause-button.png')}}" style="display:none;">
                                                            </a>
                                                       </div>
                                                        <a class="btn btn-info btn-lg small-green btn_custom" target="_blank" href="{{ url('/server/php/files/').'/'.$subshare_tracks->file_name}}" download=""> Download</a>
                                                        
						</div>
					</div>
                     <?php 
                     $new_one = DB::table('subshare_tracks')->where('subshare_id',Request::segment(2))->first();
                    ?>
                    <div class="sub-detail-area extra green" id="producer_div">
						<div class="col-md-12">
							<h4>New Track</h4>
                                                     @if($new_one->producer_new_track)
                                                     <span class="time">{{\Helpers::get_time_ago(strtotime($subshare_tracks->created_at))}}</span>
							<div class="clearfix"></div>
							<div class="wave-graph" style="width: 100%;" >
                                                            <div id="wave_new<?php echo $new_one->id; ?>"></div>
                                                            <img style="height: 100px; width:100%;" id="playerimg_new{{$new_one->id}}"  src="{{ url('assets/img/wave%20copy.png') }}">
                                                            <a href="javascript:void(0)" id="start_new{{$new_one->id}}" onclick="loadPlayernew('{{ url('server/php/files/'. $new_one->producer_new_track) }}', '{{ $new_one->id}}' );"><img src="{{ url('assets/img/Play%20button.png') }}"></a>
                                                            <a href="javascript:void(0)" class="play" id="play-new{{ $new_one->id }}" style="display: none;" data-id='{{ $new_one->id }}'>
                                                                <img class="img7" src="{{url('assets/img/player-play-button.png')}}">
                                                                <img class="img8" src="{{url('assets/img/player-pause-button.png')}}" style="display:none;">
                                                            </a>
                                                        </div>
                                                        @endif
                                                        @if(!$new_one->producer_new_track)
                                                        @if( \Helpers::SubshareUploaderID(Request::segment(2)) == Auth::user()->id )
                                                    <div class="upload_track_div">
                                                        <div class="inner-submit-content">
                                                            <div class="submit-top-area">
                                                                <div class=" dz-default dz-message">
                                                                  <span id="style_btn" style="background: #eff3f6;border: 0px;border-radius: 0px;padding: 10px;margin-bottom: 10px;" class="btn btn-default fileinput-button">
                                                                       <label for="fileupload"><img src="{{ url('/assets/admin/img/up-img.png')}}" style="width:50px;"></label>
                                                                       <h4 class="upload_btn">Upload File</h4>
                                                                       <input id="fileupload_new" accept="audio/*" type="file" name="files[]" multiple="">
                                                                  </span>
                                                                  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                                                </div>
                                                                <p id="files"> </p>
                                                                <div class="progress" id="progress_new" style="height:12px;">
                                                                       <div class="progress-bar"  role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                                                       </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                        @endif
                                                        @if( \Helpers::SubshareUploaderID(Request::segment(2)) != Auth::user()->id )
                                                        <h4> - No Track Uploaded</h4>
                                                        @endif
                                                        @endif
						</div>
					</div>
                </div>
				<div class="row">
				<div class="col-md-11">
                                    <div class="sub_athree"><button type="button" class="btn btn-success" onclick="window.location.replace('{{ url('/subshare_submit/').'/'.Request::segment(2) }}')"><img class="align-left" src="../assets/images/icon-submit.png"> <span>Submit</span></button></div>
				</div>
				</div>
                <!-- col-md-6-end -->
            </div>
        </section>
    </aside>
<script>
  // load player/
   function loadPlayer(file_name, upload_id,index )
   {
    var wavesurfer = Object.create(WaveSurfer);
    wavesurfer.init({
        container: '#wave'+index+'_'+upload_id,
        progressColor: 'red',
        audioRate: 1,
        barWidth: 3,
        height: 150,
        pixelRatio:1
    });
    $("#playerimg"+index+"_"+upload_id).hide();
    $("#start"+index+"_"+upload_id).hide();
    $("#play"+index+"-"+upload_id).show();
    wavesurfer.load(file_name);
    $('#wave'+index+'_'+upload_id) .siblings('.play').bind('click', function () {
        var cuurent_id= 'play'+index+'-'+upload_id;
        wavesurfer.playPause();
        if(wavesurfer.isPlaying() == true)
        {
            $('#'+cuurent_id+' .img4'+index).show();
            $('#'+cuurent_id+' .img3'+index).hide();
        }else {
            $('#'+cuurent_id+' .img3'+index).show();
            $('#'+cuurent_id+' .img4'+index).hide();
        }
    });
    wavesurfer.on('finish', function () {
      $('#play-'+upload_id+' .img3'+index).show();
      $('#play-'+upload_id+' .img4'+index).hide();

  });
    wavesurfer.on('ready', function () {
       wavesurfer.play();
       $('#play-'+upload_id+' .img4'+index).show();
       $('#play-'+upload_id+' .img3'+index).hide();
   });
$( "body").unbind( "keyup" );
$('body').on('keyup',function(e){
 var cuurent_id= 'play'+index+'-'+upload_id;
   if(e.keyCode == 32){
       e.preventDefault();
      wavesurfer.playPause();
      if(wavesurfer.isPlaying() == true)
        {
            $('#'+cuurent_id+' .img4'+index).show();
            $('#'+cuurent_id+' .img3'+index).hide();
        }else {
            $('#'+cuurent_id+' .img3'+index).show();
            $('#'+cuurent_id+' .img4'+index).hide();
        }
   }
});

}
  // load player/
   function loadPlayersub(file_name, upload_id )
   {
    var wavesurfer = Object.create(WaveSurfer);
    wavesurfer.init({
        container: '#wave_sub'+upload_id,
        progressColor: 'red',
        audioRate: 1,
        barWidth: 3,
        height: 150,
        pixelRatio:1
    });
    $("#playerimg_sub"+upload_id).hide();
    $("#start_sub"+upload_id).hide();
    $("#play-sub"+upload_id).show();
    wavesurfer.load(file_name);
    $('#wave_sub'+upload_id) .siblings('.play').bind('click', function () {
        var cuurent_id= 'play-sub'+upload_id;
        wavesurfer.playPause();
        if(wavesurfer.isPlaying() == true)
        {
            $('#'+cuurent_id+' .img6').show();
            $('#'+cuurent_id+' .img5').hide();
        }else {
            $('#'+cuurent_id+' .img5').show();
            $('#'+cuurent_id+' .img6').hide();
        }
    });
    wavesurfer.on('finish', function () {
      $('#play-sub'+upload_id+' .img5').show();
      $('#play-sub'+upload_id+' .img6').hide();

  });
    wavesurfer.on('ready', function () {
       wavesurfer.play();
       $('#play-sub'+upload_id+' .img6').show();
       $('#play-sub'+upload_id+' .img5').hide();
   });
$( "body").unbind( "keyup" );
$('body').on('keyup',function(e){
 var cuurent_id= 'play-'+upload_id;
   if(e.keyCode == 32){
       e.preventDefault();
      wavesurfer.playPause();
      if(wavesurfer.isPlaying() == true)
        {
            $('#'+cuurent_id+' .img6').show();
            $('#'+cuurent_id+' .img5').hide();
        }else {
            $('#'+cuurent_id+' .img5').show();
            $('#'+cuurent_id+' .img6').hide();
        }
   }
});

}

  // load player/
   function loadPlayernew(file_name, upload_id )
   {
    var wavesurfer = Object.create(WaveSurfer);
    wavesurfer.init({
        container: '#wave_new'+upload_id,
        progressColor: 'red',
        audioRate: 1,
        barWidth: 3,
        height: 150,
        pixelRatio:1
    });
    $("#playerimg_new"+upload_id).hide();
    $("#start_new"+upload_id).hide();
    $("#play-new"+upload_id).show();
    wavesurfer.load(file_name);
    $('#wave_new'+upload_id) .siblings('.play').bind('click', function () {
        var cuurent_id= 'play-new'+upload_id;
        wavesurfer.playPause();
        if(wavesurfer.isPlaying() == true)
        {
            $('#'+cuurent_id+' .img8').show();
            $('#'+cuurent_id+' .img7').hide();
        }else {
            $('#'+cuurent_id+' .img7').show();
            $('#'+cuurent_id+' .img8').hide();
        }
    });
    wavesurfer.on('finish', function () {
      $('#play-new'+upload_id+' .img7').show();
      $('#play-new'+upload_id+' .img8').hide();

  });
    wavesurfer.on('ready', function () {
       wavesurfer.play();
       $('#play-new'+upload_id+' .img8').show();
       $('#play-new'+upload_id+' .img7').hide();
   });
$( "body").unbind( "keyup" );
$('body').on('keyup',function(e){
 var cuurent_id= 'play-new'+upload_id;
   if(e.keyCode == 32){
       e.preventDefault();
      wavesurfer.playPause();
      if(wavesurfer.isPlaying() == true)
        {
            $('#'+cuurent_id+' .img8').show();
            $('#'+cuurent_id+' .img7').hide();
        }else {
            $('#'+cuurent_id+' .img7').show();
            $('#'+cuurent_id+' .img8').hide();
        }
   }
});

}
function open_track(song_name,id,sub_id,prefix){
     $("#loadd").show();
    $("#userimg").html('<img src="'+$("#user_imageold_"+prefix+"_"+id).val()+'" style="width: 50px;height: 50px;border-radius: 50%;">');
      $("#nametext").html($("#user_nameold_"+prefix+"_"+id).val());
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
</script>
<!--  Model for Track -->

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
<script>
     function getDuration(src, cb) {
        var audio = new Audio();
        $(audio).on("loadedmetadata", function(){
            cb(audio.duration);
        });
        audio.src = src;
    }
  /* global window, $ */
    $(function () {
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url ='{{ url("server/php/index.php")}}';
        $('#fileupload_new').fileupload({
            url: url,
            dataType: 'json',
            async: true,
            done: function (e, data) {

                $(".errorMsg").remove();
                $("#fileupload_new").after("<p class=success>Successfully Uploaded!</p>");
                var duration = 0;
                var name = 0;
                $.each(data.result.files, function (index, file) {

                    getDuration('../server/php/files/'+file.name, function(length) {
                        duration = parseInt(length)+1;

                        if(duration <= 0)
                            duration =1;
                          var subshare_id = $("#subshare_id").val(); //producerNewtrack
                        $.post('../producerNewtrack',{'_token': '{{csrf_token()}}' ,'name': file.name,'duration': duration,'subshare_id':subshare_id}, function(data){
                            
                        });
                    });

                    name = file.name;
                    $('<p/>').text(file.name).appendTo('#files');
                });
                //  console.log(file);

            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress_new .progress-bar').css(
                    'width',
                    progress + '%'
                );
            }
        })
         .bind('fileuploadadd', function (e, data) {

            var allowed = ['mp3','wav','ogg','aac','flac','alac','aiff','pcm'];
            var ext = data.files[0].name.split('.').pop().toLowerCase();
            if($.inArray(ext, allowed) == -1)
            {
                $("#fileupload_new").after("<p class=errorMsg>Invalid file type.</p>"+ "<p class=errorMsg>Allowed file types :"+ allowed +"</p>");
                return false;
            }

        })
        .prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });

</script>
@endsection