@extends('layouts.user')

@section('title','Subshare Process - Last Step')

@section('content')

<!-- <link rel="stylesheet" href="{{ url('assets/kalpana.css') }}"> -->

<link rel="stylesheet" href="{{ url('assets/kalpana.css') }}">



<style type="text/css">

  /******************************** SpectoWebia CSS Start ***************************/

.greyListing{ padding: 20px;}

.greyListing li{ margin-bottom: 20px;}

.greyListing-red{ font-size: 20px; color:#e8d8c2; font-weight: 600;}

.greyListing-white{ font-size: 18px; color:#ffffff;}

.mapNetwork{ width: 100%; float:left; margin-top: 86px;}

.mapNetwork img { max-width: 100%; width: auto; height: auto; border-radius: 5px;}

.btpadding{  padding-bottom: 30px;}

.margin-none{  margin: 0px !important;}

section.three_a .darkblue{ border-color:#2e6ca4;}



@media screen and (max-width: 991px){



    .mapNetwork img{ width: 100%; margin-bottom: 50px;}

}

</style>

<aside class="right-side">

            <ol class="breadcrumb pad">
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>Subshare
                    </a>
                </li>
                <li class="active">
                    <a href="#">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>Final
                    </a>
                    <!-- step 5 -->
                </li>
            </ol>


            <section class="subhare-home home-content content three_a process">

                <div class="row">

                    <div class="col-md-4">

                        <h1>Subshare Creation</h1>



                        <div class="sub-detail-area darkblue margin-none">

                            <div class="col-md-12 btpadding">

                                <h4>Leverage agile frameworks to provide

                                </h4>

                                <div class="clearfix"></div>

                                <p>A robust synopsis for high level overviews. Iterative approaches to corporate strategy foster

                                    collaborative thinking to further the overall value proposition. Organically grow the

                                    holistic world view of disruptive innovation via workplace diversity and empowerment.

                                </p>

                            </div>

                        </div>



                        <div class="sub-detail-area darkblue margin-none">
                            <div class="col-md-12 btpadding">
                                <h4>Bring to the table win-win survival strategies</h4>
                                <div class="clearfix"></div>
                                <p>To ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring
                                </p>
                            </div>
                        </div>

                        <div class="sub-detail-area darkblue margin-none">
                            <div class="col-md-12 btpadding">
                                <h4>Capitalize on low hanging fruit to identify</h4>
                                <div class="clearfix"></div>
                                <p>A ballpark value added activity to beta test. Override the digital divide with additional clickthrough's from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</p>
                            </div>
                        </div>

                        <div class="sub-detail-area darkblue margin-none">
                            <div class="col-md-12 btpadding">
                                <h4>Podcasting operational change management</h4>
                                <div class="clearfix"></div>
                                <p>Workflows to establish a framework. Taking seamless key performance indicators offline to maximize the long tail. Keeping your eye on the ball while performing a deep dive on the start-up mentality to derive convergence on cross-platform integration.</p>
                            </div>
                            </div>
                            <div class="sub-detail-area darkblue margin-none">
                                <div class="col-md-12 btpadding">
                                    <h4>Podcasting operational change management</h4>
                                    <div class="clearfix"></div>
                                    <p>workflows to establish a framework. Taking seamless key performance indicators offline to maximize the long tail. Keeping your eye on the ball while performing a deep dive on the start-up mentality to derive
                                        </p>
                                </div>
                            </div>
                            <div class="sub-detail-area darkblue margin-none">
                                <div class="col-md-12 btpadding">
                                    <h4>Collaboratively administrate</h4>
                                    <div class="clearfix"></div>
                                    <p>plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.
                                        </p>
                                </div>
                            </div>
                            <div class="sub-detail-area darkblue margin-none">
                                <div class="col-md-12 btpadding">
                                    <h4>Efficiently unleash cross-media</h4>
                                    <div class="clearfix"></div>
                                    <p>cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional
                                        </p>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-4">
                        <h1>Subshare Terms Of Use</h1>

                        <!-- Subshare Terms Of Use start -->
                        @foreach( $subshareCollection as $subshare )
                          <div class="creation-area">
                              <div class="form">
                                  <div class="form-group">
                                      <input class="form-control" placeholder="Submitter" type="text" value="{{ \Helpers::getSubshareRoleName( $subshare->roles ) }}">
                                  </div>
                                  <div class="form-group">
                                      <select class="form-control" id="sel1">
                                          <option value="{{ $subshare->percentage }}" selected>{{ $subshare->percentage }}</option>
                                      </select>
                                  </div>

                                  <div class="form-group">

                                      <textarea class="form-control" rows="5" id="com" placeholder="Custom agreement" style="resize: none;">{{ $subshare->custom_agreement }}</textarea>

                                  </div>

                              </div>

                              <button type="button" class="btn btn-default" data-dismiss="modal">Send</button>

                          </div>

                        @endforeach

                      <!-- Subshare Terms Of Use end -->



                        <div class="grey-area greyListing">

                            <div class="row">

                                <div class="col-md-5 col-xs-5">

                                    <ul class="greyListing-red">

                                        <li>Neptune:</li>

                                        <li>Spotify:</li>

                                        <li>iTunes:</li>



                                    </ul>

                                </div>

                                <div class="col-md-7 col-xs-7">

                                    <ul class="greyListing-white">

                                        <li>S Token 8474</li>

                                        <li>ISRC 2356</li>

                                        <li>90%</li>

                                    </ul>



                                </div>

                            </div>

                        </div>

                        <div class="mapNetwork">

                            <img src="{{ url('assets/images/map.jpg') }}" alt="map">

                        </div>

                    </div>





                    <div class="col-md-4 last-sub-div">

                        <h1 class="text-center">Subshare Details</h1>



                      <?php $counter = 1;  ?>



                      @foreach( $subshareCollection as $subshare )

                        <div class="sub-detail-area red">

                            <div class="col-md-12">

                                <h4>{{$subshare->first_name}} {{$subshare->last_name}}</h4>

                                <div class="col-md-9">

                                    <div class="row">

                                        <strong>{{ \Helpers::getUserFullName( $subshare->user_id ) }} is offering {{ \Helpers::getSubshareRoleName( $subshare->roles ) }} to track {{ \Helpers::getTrackName( $subshare->track_id ) }} for

                                            <span>{{ $subshare->percentage }}</span>

                                        </strong>

                                    </div>

                                </div>

                                <div class="col-md-3">

                                    <div class="row">

                                        <span class="time">{{ \Helpers::get_time_ago( strtotime($subshare->created_at) ) }}</span>

                                    </div>

                                </div>

                                <div class="clearfix"></div>

                                <p>{{ $subshare->custom_agreement }}</p>

                                <div class="wave-graph">

                                    <a href="#">

                                        <img src="{{ url('assets/images/small-player.png') }}" class="img-responsive sub-two-wave">

                                    </a>

                                </div>

                            </div>

                        </div>
                          <?php $counter++; ?>
                      @endforeach
                        <!-- Source Track -->
                        <div class="sub-detail-area extra blue">
						<div class="col-md-12">
							<h4>Source Track</h4>
							<span class="time">{{\Helpers::get_time_ago(strtotime($subshare_tracks->created_at))}}</span>
							<div class="clearfix"></div>
							<div class="wave-graph" style="width: 100%;" >

                                <div id="wave_sub<?php echo $subshare_tracks->id; ?>"></div>
                                <img style="height: 100px; width:100%;" id="playerimg_sub{{$subshare_tracks->id}}"  src="{{ url('assets/img/wave%20copy.png') }}">
                                <a href="javascript:void(0)" id="start_sub{{$subshare_tracks->id}}" onclick="loadPlayersub('{{ url('server/php/files/'. $subshare_tracks->file_name) }}', '{{ $subshare_tracks->id}}' );"><img src="{{ url('assets/img/Play%20button.png') }}"></a>
                                <a href="javascript:void(0)" class="play" id="play-sub{{ $subshare_tracks->id }}" style="display: none;" data-id='{{ $subshare_tracks->id }}'>
                                    <img class="img5" src="{{url('assets/img/player-play-button.png')}}">
                                    <img class="img6" src="{{url('assets/img/player-pause-button.png')}}" style="display:none;">
                                </a>
                            </div>
						</div>
					</div>
					<div class="sub-detail-area extra green">
						<div class="col-md-12">
							<h4>New Track</h4>
							<span class="time">{{\Helpers::get_time_ago(strtotime($final_track->created_at))}}</span>
							<div class="clearfix"></div>
							<div class="wave-graph" style="width: 100%;">
                                <div id="wave_new<?php echo $final_track->id; ?>"></div>
                                <img style="height: 100px; width:100%;" id="playerimg_new{{$final_track->id}}"  src="{{ url('assets/img/wave%20copy.png') }}">
                                <a href="javascript:void(0)" id="start_new{{$final_track->id}}" onclick="loadPlayernew('{{ url('server/php/files/'. $final_track->file_name) }}', '{{ $final_track->id}}' );"><img src="{{ url('assets/img/Play%20button.png') }}"></a>
                                <a href="javascript:void(0)" class="play" id="play-new{{ $final_track->id }}" style="display: none;" data-id='{{ $final_track->id }}'>
                                    <img class="img7" src="{{url('assets/img/player-play-button.png')}}">
                                    <img class="img8" src="{{url('assets/img/player-pause-button.png')}}" style="display:none;">
                                </a>
                            </div>
						</div>
					</div>
                        <!-- New Track end -->
                    </div>

                    <div class="row">
                        <div class="col-md-11">
                             <div class="sub_athree"><button type="button" class="btn btn-success" onclick="window.location.replace('{{url('/subshare_save/').'/'.Request::segment(2) }}')"><img class="align-left" src="../assets/images/icon-submit.png"> <span>Submit</span></button></div>
<!--                            <div class="sub_athree">

                                <button type="button" class="btn btn-success">

                                    <img class="align-left" src="{{ url('assets/images/icon-submit.png') }}">

                                    <span>Submit</span>

                                </button>

                            </div>-->

                        </div>

                    </div>

                    <!-- col-md-6-end -->
                </div>
            </section>
        </aside>
<script>
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
</script>
@endsection