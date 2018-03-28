@extends('layouts.user')
@section('title','Profile')
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
    <li><a href="{{ url('/user-dashboard') }}">Dashboard</a></li>
    <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Profile</li>
</ol>

    <section class="profile-content">
        <div class="row">
            <div class="col-md-12 col-lg-12 top-right-content">
                <div class="profile-top-detail-div">
                    <div class="profile-image-div">
                        @if( is_object( $user[0] ) )
                            <img src="{{ \Helpers::avatarURL( $user[0]->image ) }}" style="width: 130px;height: 130px;" class="img-circle img-responsive pull-left">
                         @endif
                    </div>
                    <div class="profile-text-div">

                            <div class="profil-right-area">
                                <h2>{{ \Helpers::getUserFullName( $user[0]->id ) }} </h2>
                                <a href="{{ url('messages/compose')}}" class="message-btn"><span>MESSAGE</span></a>
                                @if( Auth::user()->id != $user[0]->id )
                                    @if( \Helpers::followingCheck( $user[0]->id ) )
                                        <a href="javascript:void(0);" class="message-btn" onclick="follow" id="follow"><span>follow</span></a>
                                        <a href="javascript:void(0);" class="message-btn" onclick="unfollow" id="unfollow" style="display:none"><span>unfollow</span></a>
                                    @else
                                        <a href="javascript:void(0);" class="message-btn" onclick="unfollow" id="unfollow"><span>unfollow</span></a>
                                        <a href="javascript:void(0);" class="message-btn" onclick="follow" id="follow" style="display:none"><span>follow</span></a>
                                    @endif
                                  @endif
                            </div>


                        <div class="profile-right-bottom-area">
                            <ul class="profile-following-div">
                                <li>uploads
                                    <span>{{ \Helpers::getTotalTracks( $user[0]->id ) }}</span></li>
                                <li>follow
                                    <span id="following">{{ \Helpers::getTotalFollowing( $user[0]->id ) }}</span></li>
                                <li>following
                                   <span id="follower">{{ \Helpers::getTotalFollower( $user[0]->id ) }}</span></li>
                                <li >subshares
                                    <span id="subshares">{{ \Helpers::getTotalSubshares( $user[0]->id ) }}</span></li>
                                <li>wanted
                                        <span>0</span></li>
                                 <li>neptune
                                        <span>0</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                @foreach(\Helpers::getProfileRecentTracks( $user[0]->id ) as $track)
                    @if( isset($track->file_name) && !empty($track->file_name) )
                        <div class="wave-graph">
                            <div class="profil-graph-area">
                                <div class="profile-graph-area-heading"><h3><?php echo (!empty($track->track_title)) ? $track->track_title : '&nbsp;' ; ?></h3></div>
                                <div id="waveform" class="js-wave" data-path="{{ url('server/php/files/'. $track->file_name) }}"></div>
                                <a href="javascript:;" class="play" id="play-{{$track->id}}" data-id="{{$track->id}}">
                                   <img class="img1" src="{{url('assets/img/player-play-button.png')}}">
                                   <img class="img2" src="{{url('assets/img/player-pause-button.png')}}" style="display:none;">
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="upload-div">
                    <h4>All uploads</h4>
                    <div id="container">
	                    <ul id="imgs">
	                        {{ \Helpers::getTracksImagesProfile( $user[0]->id ) }}
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

<script type="text/javascript">
    $('.js-wave').each(function (i, el)
    {
        var wavesurfer = Object.create(WaveSurfer);

        wavesurfer.init({
            container: el,
            progressColor: 'red',
            audioRate: 1,
            barWidth: 3,
            height: 150,
            pixelRatio:1
        });

        wavesurfer.load($(el).data('path'));
        $(el) .siblings('.play').bind('click', function () {
            var cuurent_id= $(this).attr('id');
            wavesurfer.playPause();

                if(wavesurfer.isPlaying() == true)
                {
                    $('#'+cuurent_id+' .img2').show();
                    $('#'+cuurent_id+' .img1').hide();
                }else {
                    $('#'+cuurent_id+' .img1').show();
                    $('#'+cuurent_id+' .img2').hide();
                }

                // on finish place play icon.
                wavesurfer.on('finish', function () {
                    $('#'+cuurent_id+' .img1').show(); // display play icon.
                    $('#'+cuurent_id+' .img2').hide();
                });
        })
    });
</script>

<style type="text/css">
.profil-graph-area a
{
    top: 115px !important;
}
.profile-graph-area-heading
{
     margin-top: 0 !important;
     margin-bottom: 0 !important;
}
</style>
@endsection


@section('script')

    <script type="text/javascript">
     // follow ajax request.
      $("#follow").click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });

        $.ajax({
                type: 'post',
                dataType:'json',
                url: '{{ url('user/follow') }}',
                data: { id : '{{$user[0]->id}}' },
                success: function (data) {
                    // button
                    $("#follow").css("display", "none");
                    $("#unfollow").css("display", "inline-block");

			              // update follow/unfollow counter.
              			$("#follower").html(data.follow);
              			$("#following").html(data.following);
                }
            });
      });

      // unfollow ajax request.
      $("#unfollow").click(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });

        $.ajax({
                type: 'post',
                dataType:'json',
                url: '{{ url('user/unfollow') }}',
                data: { id : '{{$user[0]->id}}' },
                success: function (data) {
                // button
                    $("#follow").css("display", "inline-block");
                    $("#unfollow").css("display", "none");

			              // update follow/unfollow counter.
              			$("#follower").html(data.follow);
              			$("#following").html(data.following);
                }
            });
      });
    </script>
@endsection