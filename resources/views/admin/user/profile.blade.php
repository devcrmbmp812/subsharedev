@extends('layouts.admin')
@section('title','User Profile')
@section('content')

<style>
#imgs {
  display: block;
  padding: 0;
  width: 200%;
}

#imgs li {
  padding-right: 10px;
  display: inline-block;
 *display:inline;
}

#imgs img {
  width: 160px;
  height: 120px;
}
#container {
  overflow: hidden;
  height: 124px;
  margin: 0 auto;
  cursor: pointer;
}
</style>


<aside class="right-side">
    <ol class="breadcrumb">
        <li><a href="#">Dashboard</a></li>
        <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>User Profile</li>
    </ol>
    <section class="profile-content">
        <div class="row">
            <div class="col-md-12 col-lg-12 top-right-content">
                <div class="profile-top-detail-div">
                    <div class="profile-image-div">
                                    
                         <img src="{{ \Helpers::avatarURLret( $user->image ) }}" style="width: 130px;height: 130px;">
                        
                    </div>
                    <div class="profile-text-div">
                        <div class="profil-right-area">
                            <h2>{{ $user->first_name  }} {{ $user->last_name  }}</h2>
                            <a href="#" class="message-btn"><span>MESSAGE</span></a>
                        </div>
                        <div class="profile-right-bottom-area">
                            <ul class="profile-following-div">
                                <li>uploads
                                    <span>{{ \Helpers::getTotalTracks( $user->id ) }}</span></li>
                                <li>following
                                    <span>{{ \Helpers::getTotalFollowing($user->id) }}</span></li>
                                <li>follow
                                    <span>{{ \Helpers::getTotalFollower( $user->id ) }}</span></li>
                                <li>subshares
                                    <span>{{ count($userUploads) }}</span></li>

                                <li>wanted

                                    <span>7</span></li>

                                <li>neptune

                                    <span>6</span></li>

                            </ul>

                        </div>

                    </div>

                </div>
                @if($userUploads)
                 @foreach($userUploads as $upload)
                    <div class="profil-graph-area">
                        <div class="profile-graph-area-heading">
                            <h3>{{$upload->track_title}}</h3>
                        </div>
                        <div id="waveform" class="js-wave" data-path="{{ url('server/php/files/'. $upload->file_name) }}">

                        </div>
                        <a style="top: 176px;" href="javascript:void(0)" class="play" data-file="{{ url('server/php/files/'. $upload->file_name) }}" id="play-{{$upload->id}}" data-id="{{$upload->id}}">
                            <img class="img1" src="{{url('assets/admin/img/Play%20button.png')}}">
                            <img class="img2" src="{{url('assets/admin/img/big-player-pause.png')}}" style="display:none; ">
                        </a>
                    </div>
                @endforeach
                @else
                    <li>No record found</li>
                @endif
               
               
               
                <div class="upload-div">
                    <h4>All uploads</h4>
                    <div id="container">
	                    <ul id="imgs">
	                        {{  \Helpers::getTracksImagesProfile( $profile_id ) }}
	                    </ul>
                    </div>
                </div>
               

            </div>

        </div>

    </section>

</aside>
<!-- image scroller code start. -->
<script type="text/javascript" src="{{ url('assets/js/imagescroll.js') }}"></script>
<script>
$('#imgs').imageScroll({

  // top,right,bottom,left optional
  orientation:"left",

  // animation speed
  speed:2000,

  // animation interval
  interval:1900,

  // pause on hover
  hoverPause:true,

  // callback function after every scroll motion
  callback:function(){ return false;}

});
</script>
<!-- image scroller code end. -->



<script>

        $(document).ready(function () {

            $('.js-wave').each(function (i, el) {
                var wavesurfer = Object.create(WaveSurfer);
                wavesurfer.init({
                    container: el,
                    progressColor: '#000',
                    audioRate: 1,
                    barWidth: 3,
                    height: 150,
                    pixelRatio: 1
                });

                wavesurfer.load($(el).data('path'));

                $(el).siblings('.play').bind('click', function () {
                    var cuurent_id= $(this).attr('id');
                    wavesurfer.playPause();
                    if(wavesurfer.isPlaying() == true){
                        $('#'+cuurent_id+' .img2').show();
                        $('#'+cuurent_id+' .img1').hide();
                    }else {
                        $('#'+cuurent_id+' .img1').show();
                        $('#'+cuurent_id+' .img2').hide();
                    }
                });

                wavesurfer.on('finish', function () {
                    $('.img1').show();
                    $('.img2').hide();
                });
            });




        });
    </script>
@endsection