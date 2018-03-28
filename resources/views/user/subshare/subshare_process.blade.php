@extends('layouts.user')
@section('title','Subshare | Accepted Offer | Step-1 ')

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
.three_a .wave-graph a{position: static;}
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
<script>
  var track1_uploaded = false;
  var track2_uploaded = false;
</script>
<link rel="stylesheet" href="{{ url('assets/kalpana.css') }}">
    <aside class="right-side">

        <div class="breadcrumb feed-crumbs">
            <ol>
                <li><a href="{{ url('/user-dashboard') }}">Dashboard</a></li>
                <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="javascript:void">Subshare</a></li>
                <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="javascript:void">Accepted Offer</a></li>
                <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="javascript:void">Step 1</a></li>
                <!-- http://optimabranding.com/5/Subshare/subshareprocess3.html -->
            </ol>
        </div>
        <section class="subhare-home home-content content three_a process">
            <div class="row" style="margin-bottom: 45px;">
            <?php
              // get LoggedIn user last subshare.
              $lastSubshare = \Helpers::getSubshareDetail(Request::segment(2));
            ?>
        <!-- Subshare Creation box start -->
				<div class="col-md-6">
					<h1>Subshare Creation</h1>
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
                <div class="form-group" id="form-text">
                    <textarea class="form-control" rows="5" id="agreement" name="agreement" placeholder="Custom agreement" name="agreement" style="resize: none;">{{ trim($lastSubshare->custom_agreement) }}</textarea>
                </div>
						</div>
             @php
                $subshare_userid = \Helpers::getSubsharesbyUserID(Request::segment(2));
             @endphp

              @if (Auth::check())
                 @if( $subshare_userid == Auth::user()->id )
                    <button type="sbumit" class="btn btn-default" data-dismiss="modal">Send</button>
                 @endif
              @endif

              @if( $IsChanged == '1' && $subshare_userid != Auth::user()->id )
                <button type="sbumit" class="btn btn-default" data-dismiss="modal">Send</button>
              @endif

             <input type="hidden" name="current_url" value="{{$_SERVER['REQUEST_URI']}}">
             <input type='hidden' id="subshare_id" name="subshare_id" value="{{ Request::segment(2) }}">

  					</div>
				</div>
        <?php
          $offer_id = Request::segment(2); // get offer id from url.
          $offer_track_uploader_user_id = \Helpers::SubshareUploaderID( $offer_id ); // find offer track uploader id ( user id ).
          $user_role_name = ( Auth::user()->id != $offer_track_uploader_user_id )? 'cont' : 'prod' ; // display user role.
        ?>
        <!-- Subshare Role SAved in hidden field -->
        <!-- <input type="hidden" name="user_role" id="user_role" value="<?php // if(Auth::user()->id == $lastSubshare->sub_user){ echo 'cont'; }elseif(Auth::user()->id == $lastSubshare->user_id){ echo 'prod'; } ?>"> -->
        <input type="hidden" name="user_role" id="user_role" value="{{ $user_role_name }}">

        <!-- Subshare Creation box end -->
        <?php
          $rolee="";
          if(Auth::user()->id == $lastSubshare->sub_user)
          {
            $rolee = 'cont';
          } elseif(Auth::user()->id == $lastSubshare->user_id) {
            $rolee = 'prod';
          }
          // get LoggedIn user last subshare.
          $lastSubshare = \Helpers::getsubsharetrack(Request::segment(2));
        ?>
        {!! Form::close() !!}


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

          <div class="col-md-6 last-sub-div">
					<h1 class="text-center">Subshare Details</h1>
					<div class="sub-detail-area red">

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
                                  <td class="new_style">Track:
                                      <?php echo $lastSubshare->track_title; ?>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="new_style">
                                      <?php echo $lastSubshare->track_percentage; ?>% complete</td>
                              </tr>
                              <tr>
                                  <td class="new_style">
                                      <?php echo $lastSubshare->track_bpm; ?> BPM</td>
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

              <!-- parent track box start -->
              <div class="wave-graph">
                  <div id="waveform"></div>
                  <a href="javascript:void(0)" class="sub-anchor" onclick="customplayPause()" id="play-{{ $lastSubshare->id }}" data-id='{{ $lastSubshare->id }}'>
                      <img class="img1" src="{{ url('assets/img/player-play-button.png') }}" class="img-responsive sub-two-play">
                      <img class="img2" src="{{ url('assets/img/player-pause-button.png') }}" style="display: none">
                  </a>
              </div>
              <!-- parent track box end -->


						</div>
					</div>
				</div>
			</div>
          <?php
            // get LoggedIn user last subshare.
            $lastSubsharetrack = \Helpers::getsubsharetrack1(Request::segment(2),$rolee);
          ?>
          <!-- right top box player start -->
    			<div class="row adv-player-bottom-area" style="width: 100% !important; position: relative;">
            <div class="col-md-12">
              <div>
                <div class="creation-area shareprocess" style="">
                  <div class="wave-graph">
                    <div id="waveform1"></div>
                    <a href="javascript:void(0)" class="sub-anchor" onclick="customplayPause1()" id="play-{{ $lastSubsharetrack->track_id }}" data-id='{{ $lastSubsharetrack->track_id }}'>
                      <img class="img3" src="{{ url('assets/img/player-play-button.png') }}" class="img-responsive sub-two-play">
                      <img class="img4" src="{{ url('assets/img/player-pause-button.png') }}" style="display: none">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- right top box player end -->


            <?php
            $tracks_element = DB::table('subshare_tracks')->select('*')->where('subshare_id',Request::segment(2))->first();
            ?>

			<div class="row">
				<div class="col-md-6">
					<div class="creation-area no-margin">
						<div class="track one">
              <form method="post" action="{{url('/saveProcessInfo')}}" style="margin-bottom: 25px;">
      							<div class="col-md-1"><img src="{{ \Helpers::avatarURL(Auth::user()->image) }}" style="width: 40px; border-radius: 50%;"></div>
      							<div class="col-md-11">
                      {{csrf_field()}}
      							<div class="form-group">
      								<select class="form-control" id="initial_source" name="initial_source">
                        <option value="">Select initial track or element upload</option>
      									<option value="1"  <?php if($tracks_element->source_initial=="1"){ echo 'selected="selected"';}?>>1</option>
      									<option value="2" <?php if($tracks_element->source_initial=="2"){ echo 'selected="selected"';}?>>2</option>
      									<option value="3" <?php if($tracks_element->source_initial=="3"){ echo 'selected="selected"';}?>>3</option>
                      </select>
      							</div>
                    <input type="hidden" name="save1" value="{{Request::segment(2)}}">
      							<div class="form-group">
      								<textarea class="form-control" rows="5" id="changes_source" name="changes_source" placeholder="Required changes to media">{{ ($tracks_element->source_changes)?$tracks_element->source_changes:"" }}</textarea>
      							</div>
      							</div>
      							<div class="clearfix"></div>
                       @if( \Helpers::SubshareUploaderID(Request::segment(2)) == Auth::user()->id )
                         <button type="sbumit" class="btn btn-default" data-dismiss="modal">Send</button>
                       @endif
                  </form>
						</div>
						<div class="track">
            <form method="post" action="{{url('/saveProcessInfo')}}">
                {{csrf_field()}}
            <div class="col-md-1"><img src="{{ \Helpers::avatarURL(Auth::user()->image) }}" style="width: 40px; border-radius: 50%;"></div>
							<div class="col-md-11">
							<div class="form-group">
								<select class="form-control" id="initial_new" name="initial_new">
                  <option value="">Select initial track or element upload</option>
                  <option value="1"  <?php if($tracks_element->new_initial=="1"){ echo 'selected="selected"';}?>>1</option>
									<option value="2" <?php if($tracks_element->new_initial=="2"){ echo 'selected="selected"';}?>>2</option>
									<option value="3" <?php if($tracks_element->new_initial=="3"){ echo 'selected="selected"';}?>>3</option>
                </select>
							</div>
              <input type="hidden" name="save2" value="{{Request::segment(2)}}">
							<div class="form-group">
								<textarea class="form-control" rows="5" id="changes_new" name="changes_new" placeholder="Required changes to media">{{ ($tracks_element->new_changes)?$tracks_element->new_changes:"" }}</textarea>
							</div>
							</div>
							<div class="clearfix"></div>
              @if( \Helpers::SubshareUploaderID(Request::segment(2)) == Auth::user()->id )
                <button type="sbumit" class="btn btn-default" data-dismiss="modal">Send</button>
               @endif
                </form>
						</div>
					</div>
				</div>
				<div class="col-md-6 last-sub-div">
          <?php
            $sub_tracks = DB::table('subshare_tracks')
                            ->select('*')
                            ->leftJoin('subshare','subshare_tracks.subshare_id','=','subshare.id')
                            ->where('subshare.id',Request::segment(2))
                            ->first();
          ?>
          @if($sub_tracks->source_track)
          <script>
               track1_uploaded = true;
          </script>
         <div class="sub-detail-area extra blue">
						<div class="col-md-12">
							<h4>Source Track</h4>
							<span class="time">{{\Helpers::get_time_ago(strtotime($sub_tracks->created_at))}}</span>
							<div class="clearfix"></div>
							<div class="wave-graph" style="width: 100%;">
                  <div id="wave_sub<?php echo $sub_tracks->id; ?>"></div>
                  <img style="height: 100px; width:100%;" id="playerimg_sub{{$sub_tracks->id}}"  src="{{ url('assets/img/wave%20copy.png') }}">
                  <a href="javascript:void(0)" id="start_sub{{$sub_tracks->id}}" style="    position: absolute;" onclick="loadPlayersub('{{ url('server/php/files/'. $sub_tracks->source_track) }}', '{{ $sub_tracks->id}}' );"><img src="{{ url('assets/img/Play%20button.png') }}"></a>
                  <a href="javascript:void(0)" class="play" id="play-sub{{ $sub_tracks->id }}" style="display: none;    position: absolute;" data-id='{{ $sub_tracks->id }}'>
                      <img class="img5" src="{{url('assets/img/player-play-button.png')}}">
                      <img class="img6" src="{{url('assets/img/player-pause-button.png')}}" style="display:none;">
                  </a>
              </div>
               <a class="btn btn-info btn-lg small-green btn_custom" target="_blank" href="{{ url('server/php/files/'. $sub_tracks->source_track) }}" download> Download</a>
						</div>
					</div>
            @endif
            @if($sub_tracks->new_track)
            <script>
            track2_uploaded = true;
            </script>
					<div class="sub-detail-area extra green">
						<div class="col-md-12">
							<h4>New Track</h4>
							<span class="time">{{\Helpers::get_time_ago(strtotime($sub_tracks->created_at))}}</span>
							<div class="clearfix"></div>
							<div class="wave-graph" style="width: 100%;">
                  <div id="wave_new<?php echo $sub_tracks->id; ?>"></div>
                  <img style="height: 100px; width:100%;" id="playerimg_new{{$sub_tracks->id}}"  src="{{ url('assets/img/wave%20copy.png') }}">
                  <a href="javascript:void(0)" id="start_new{{$sub_tracks->id}}" style="    position: absolute;" onclick="loadPlayernew('{{ url('server/php/files/'. $sub_tracks->new_track) }}', '{{ $sub_tracks->id}}' );"><img src="{{ url('assets/img/Play%20button.png') }}"></a>
                  <a href="javascript:void(0)" class="play" id="play-new{{ $sub_tracks->id }}" style="display: none;     position: absolute;" data-id='{{ $sub_tracks->id }}'>
                      <img class="img7" src="{{url('assets/img/player-play-button.png')}}">
                      <img class="img8" src="{{url('assets/img/player-pause-button.png')}}" style="display:none;">
                  </a>
              </div>
              <a class="btn btn-info btn-lg small-green btn_custom" target="_blank" href="{{ url('server/php/files/'. $sub_tracks->new_track) }}" download> Download</a>
						</div>
					</div>
          @endif
          @if(!$sub_tracks->source_track)
					<div class="sub-detail-area extra blue submitter_div">
						<div class="col-md-12">
                  <h4>Source Track</h4>
                  <div class="upload_track_div">
                      <div class="inner-submit-content">
                          <div class="submit-top-area">
                              <div class=" dz-default dz-message">
                                <span id="style_btn" style="background: #eff3f6;border: 0px;border-radius: 0px;padding: 10px;margin-bottom: 10px;" class="btn btn-default fileinput-button">
                                     <label for="fileupload"><img src="{{ url('/assets/admin/img/up-img.png')}}" style="width:50px;"></label>
                                     <h4 class="upload_btn">Upload File</h4>
                                     <input id="fileupload_source" accept="audio/*" type="file" name="files[]" multiple="">
                                </span>
                                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                              </div>
                              <p id="files"> </p>
                              <div class="progress" id="progress_source" style="height:12px;">
                                     <div class="progress-bar"  role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                     </div>
                              </div>
                          </div>
                      </div>
                  </div>
						</div>
					</div>
          @endif
          @if(!$sub_tracks->new_track)
					<div class="sub-detail-area extra green submitter_div">
						<div class="col-md-12">
							<h4>New Track</h4>
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
						</div>
					</div>
            @endif
            @if(!$sub_tracks->source_track)
            <div class="sub-detail-area extra blue initiator_div">
						<div class="col-md-12">
                <h4>Source Track</h4>
                <div class="upload_track_div">
                    <div class="inner-submit-content">
                        <h4> No Track Uploaded. </h4>
                    </div>
                </div>
						</div>
					</div>
          @endif
          @if(!$sub_tracks->new_track)
					<div class="sub-detail-area extra green initiator_div">

						<div class="col-md-12">
							<h4>New Track</h4>
                <div class="upload_track_div">
                <div class="inner-submit-content">
                    <h4> No Track Uploaded. </h4>
                </div>
            </div>
						</div>
					</div>
           @endif
				</div>
			</div>
			<div class="row">
         <div id="msg_div"></div>
				<div class="col-md-6">
					<h1>Success criteria</h1>
					<div class="success">
						<div class="col-md-6">
							<div class="form-group">
                <input type="text" class="form-control" id="streams" value="{{$tracks_element->streams}}" placeholder="Number of streams">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="input-group date" id="datepicker">
                  <input type="date" class="form-control" id="date_achieved" value="{{$tracks_element->date_achieved}}" placeholder="Date achieved">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
            <div class="row">
           <div id="msg_div"></div>
				<div class="col-md-6">
					<h1>Target Release Date</h1>
					<div class="success">
						<div class="col-md-6">
							<div class="form-group">
                 <input type="text" class="form-control" id="streams1" value="{{$tracks_element->streams_producer}}" placeholder="Number of streams">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<div class="input-group date" id="datepicker">
                   <input type="date" class="form-control" id="date_achieved1" value="{{$tracks_element->date_achieved_producer}}" placeholder="Date achieved">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-11">
            <div class="sub_athree no_pad submitter_div"><button type="button" id="agree_subshare_btn" class="btn btn-success"><img class="align-left" src="../assets/images/icon-submit.png"> <span>AGREE SUBSHARE</span></button></div>
				    <div class="sub_athree no_pad initiator_div"><button type="button" id="agree_subshare_btn1" class="btn btn-success"><img class="align-left" src="../assets/images/icon-submit.png"> <span>AGREE SUBSHARE</span></button></div>
				</div>
			</div>
        </section>
    </aside>
    <!-- right-side -->
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="{{ url('assets/js/bootstrap.min.js')}}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="{{ url('js/vendor/jquery.ui.widget.js')}}"></script>
  <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="{{ url('js/jquery.iframe-transport.js')}}"></script>
<!-- The basic File Upload plugin -->
<script src="{{ url('js/jquery.fileupload.js')}}"></script>
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
      if($("#user_role").val()=="cont"){
          $(".initiator_div").hide();
          $("#initial_source").prop('disabled', true);
          $("#initial_new").prop('disabled', true);
          $("#changes_source").prop('disabled', true);
          $("#changes_new").prop('disabled', true);
          $("#streams1").prop('disabled',true);
          $("#date_achieved1").prop('disabled',true);
      }else{
          $(".submitter_div").hide();
          $("#streams").prop('disabled',true);
          $("#date_achieved").prop('disabled',true);
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
console.log('{{$lastSubshare->file_name}}');
      wavesurfer.load("{{ url('server/php/files/' . $lastSubshare->file_name )}}");

      var wavesurfer1 = WaveSurfer.create({
        container: '#waveform1',
        waveColor: 'gray',
        progressColor: 'red',
        audioRate: 1,
        barWidth: 3,
        height: 150,
        pixelRatio:1
      });
console.log('{{$lastSubsharetrack->file_name}}');
      wavesurfer1.load("{{ url('server/php/files/' . $lastSubsharetrack->file_name )}}");
      /* Update labels */
var updateLabel = function (region) {
  var regionEl = document.querySelector('region[data-id="' + region.id + '"]');
  var labelEl = document.querySelector('#' + region.id + '-label');

  if (!labelEl) return;
  labelEl.style.display = 'block';
  labelEl.style.width = regionEl.clientWidth + 'px';
  labelEl.style.left = regionEl.offsetLeft + 'px';
};

//wavesurfer.enableDragSelection({
//  drag: false,
//  slop: 5
//});

wavesurfer1.on('region-created', updateLabel);
wavesurfer1.on('region-updated', updateLabel);
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
                $(' .img3').show(); // display play icon.
                $(' .img4').hide();
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

    function create_region(region_id,start_time,end_time,tag_name){
        var colortag=getRandomColor();

        $('.adv-player-bottom-area').prepend('<div class="wavesurfer-label col-md-4" id="'+region_id+'-label"><span class="play_rigion album-buttom1" onclick="play_rigion('+start_time+','+end_time+')"><button type="button" class="album-buttoms" style="background-color:'+colortag+';">'+tag_name+'</button></span></div>');

        var region = wavesurfer1.addRegion({
          id:region_id,
          start:start_time,
          end:end_time,
          drag:false,
          color: colortag,
          resize:false
        });
}
var counter = 0;
function getRandomColor() {
  var color_scheme = ['hsla(338, 92%, 51%, 1)', 'hsla(78, 90%, 46%, 1)', 'hsla(120, 100%, 25%, 1)', 'hsla(240, 100%, 50%, 1)', 'hsla(300, 100%, 25%, 1)', 'hsla(338, 92%, 51%, 1)', 'hsla(78, 90%, 46%, 1)', 'hsla(120, 100%, 25%, 1)', 'hsla(240, 100%, 50%, 1)', 'hsla(300, 100%, 25%, 1)'];
  /* var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  } */
  if(counter == 9)
    counter =0;
  return color_scheme[counter++];
}
function play_rigion(strat_time,end_time){

  wavesurfer1.play(strat_time,end_time);

  $('.img4').show();
  $('.img3').hide();


  wavesurfer1.on('pause', function () {
    $('.img3').show();
    $('.img4').hide();
  });

}
var tags = [];
  </script>
  <?php

$tags = DB::table('audio_tags')->where('audio_id',$lastSubsharetrack->track_id)->get();
foreach($tags as $val){?>
  <script> tags.push('{{$val->tag_data}}'); </script>
<?php }?>


<script>
    wavesurfer1.on('ready',function(){
        for(i=tags.length-1;i>=0;i--){
            var tag_data = tags[i].split(',');
            tag_data[0] = parseInt((tag_data[0].split(':'))[0])*60 + parseInt((tag_data[0].split(':'))[1]);
            tag_data[1] = parseInt((tag_data[1].split(':'))[0])*60 + parseInt((tag_data[1].split(':'))[1]);
            console.log(tag_data);
            create_region('stanza'+i,tag_data[0],tag_data[1],tag_data[2]);
        }
    });

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
        $('#fileupload_source').fileupload({
            url: url,
            dataType: 'json',
            async: true,
            done: function (e, data) {

                $(".errorMsg").remove();
                $("#fileupload").after("<p class=success>Successfully Uploaded!</p>");
                var duration = 0;
                var name = 0;
                $.each(data.result.files, function (index, file) {

                    getDuration('../server/php/files/'+file.name, function(length) {
                        duration = parseInt(length)+1;

                        if(duration <= 0)
                            duration =1;
                        var subshare_id = $("#subshare_id").val();
                        $.post('../saveSourceTrack',{'_token': '{{csrf_token()}}' ,'name': file.name,'duration': duration,'subshare_id':subshare_id}, function(data){
                            track1_uploaded = true;
                        });
                    });

                    name = file.name;
                    $('<p/>').text(file.name).appendTo('#files');
                    $('.pro-sub-btn').prop('disabled', false);
                });
                //  console.log(file);

            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress_source .progress-bar').css(
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
                $("#fileupload_source").after("<p class=errorMsg>Invalid file type.</p>"+ "<p class=errorMsg>Allowed file types :"+ allowed +"</p>");
                return false;
            }

        })
        .prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });

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
                          var subshare_id = $("#subshare_id").val();
                        $.post('../saveNewTrack',{'_token': '{{csrf_token()}}' ,'name': file.name,'duration': duration,'subshare_id':subshare_id}, function(data){
                            track2_uploaded = true;
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

    $("#agree_subshare_btn").click(function(){
      var data = [];
          //data[0] = $("#initial_source").val();
          //data[1] = $("#initial_new").val();
          //data[2] = $("#changes_source").val();
          //data[3] = $("#changes_new").val(); 'initial_source': $("#initial_source").val(),'initial_new':$("#initial_new").val(),'changes_source':$("#changes_source").val(),'changes_new':$("#changes_new").val(),
          data[0] = $("#streams").val();
          data[1] = $("#date_achieved").val();

         // Checking any field is empty or not
        var empty = false;
            for(i=0;i<data.length;i++){
                 if(data[i] == ""){
                     empty = true;
                     break;
                 }
            }


        if(!empty && track2_uploaded && track1_uploaded){
             $.ajaxSetup({
                headers: {
                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
               }
             });
           $.ajax({
                dataType: 'json',
                async:false,
                type:'POST',
                url: '{{ url("/saveProcessInfo")}}',
                data: {'streams':$("#streams").val(),'date_achieved':$("#date_achieved").val(),'subshare_id':$("#subshare_id").val(),'producer':'0'}
              }).done(function(data){
                   $("#msg_div").html('<div class="alert alert-success"><strong>Success!</strong>Information is Saved. Now you will move towards the next step.');
                   window.location.replace('{{url("subshare_proceed/")}}/'+{{ Request::segment(2)}}+'');
              });
        }else{
            $("#msg_div").html('<div class="alert alert-danger">Please fill All data then proceed.<br> 1) Upload two tracks <br> 2) Elements information');
            setTimeout(function(){ $('#msg_div').html('') }, 5000);
        }
    });

     $("#agree_subshare_btn1").click(function(){
      var data = [];
          data[0] = $("#initial_source").val();
          data[1] = $("#initial_new").val();
          data[2] = $("#changes_source").val();
          data[3] = $("#changes_new").val();
          data[4] = $("#streams1").val();
          data[5] = $("#date_achieved1").val();

         // Checking any field is empty or not
        var empty = false;
            for(i=0;i<data.length;i++){
                 if(data[i] == ""){
                     empty = true;
                     break;
                 }
            }


        if(!empty){
             $.ajaxSetup({
                headers: {
                 'X-CSRF-TOKEN': "{{ csrf_token() }}"
               }
             });
           $.ajax({
                dataType: 'json',
                async:false,
                type:'POST',
                url: '{{ url("/saveProcessInfo")}}',
                data: {'initial_source': $("#initial_source").val(),'initial_new':$("#initial_new").val(),'changes_source':$("#changes_source").val(),'changes_new':$("#changes_new").val(),'streams1':$("#streams1").val(),'date_achieved1':$("#date_achieved1").val(),'subshare_id':$("#subshare_id").val(),'producer':'1'}
              }).done(function(data){
                   $("#msg_div").html('<div class="alert alert-success"><strong>Success!</strong>Information is Saved. Now you will move towards the next step.');
                   window.location.replace('{{url("subshare_proceed/")}}/'+{{ Request::segment(2)}}+'');
              });
        }else{
            $("#msg_div").html('<div class="alert alert-danger">Please provide all fields to proceed.');
            setTimeout(function(){ $('#msg_div').html('') }, 5000);
        }
    });
</script>
@endsection