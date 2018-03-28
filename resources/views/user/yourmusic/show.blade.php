@extends('layouts.user')
@section('title','You Music')

@section('content')

    <script src="//cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.4.0/wavesurfer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.1.3/plugin/wavesurfer.regions.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.2.3/plugin/wavesurfer.timeline.min.js"></script>

    <aside class="right-side">
        <ol class="breadcrumb">
            <li><a href="{{ url('/user-dashboard') }}">Dashboard</a></li>
            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Show Media</li>
        </ol>
        <section class="profile-content">
            <div class="row">
                <div class="col-md-12 col-lg-12 top-right-content">
                    <div class="profile-top-detail-div">
                        <div class="profile-image-div" >
                            @if( isset(Auth::user()->image) && !empty(Auth::user()->image) && Auth::user()->image != "")
                                <img src="{{ url( Config::get('app.avatars_url') )}}/{{Auth::user()->image}}" style="width: 130px;height: 130px;" class="img-circle img-responsive pull-left">
                            @else
                                <img src="{{ url( Config::get('app.avatars_url').'default-avatar.png')}}" style="width: 130px;height: 130px;">
                            @endif
                        </div>
                        <div class="profile-text-div">
                            <div class="profil-right-area">
                                <h2>{{ \Helpers::getUserFullName( Auth::user()->id ) }}</h2>
                            </div>
                        </div>
                    </div>

                    <!-- show player -->
                    <div class="wave-graph">
                        <div class="profil-graph-area">
                            <div class="profile-graph-area-heading"><h3><?php echo (!empty($media->song_name)) ? $media->song_name : '&nbsp;' ; ?></h3></div>
                            <div id="waveform" class="js-wave" data-path="{{ url('server/php/files/'. $media->file_name) }}"></div>
                            <a href="javascript:;" class="play" id="play-{{$media->id}}" data-id="{{$media->id}}">
                                <img class="img1" src="{{url('assets/img/Play%20button.png')}}">
                                <img class="img2" src="{{url('assets/img/big-player-pause_.png')}}" style="display:none;">
                            </a>
                        </div>
                    </div>
                    <!-- #show player -->

                    <div class="upload-div">
                        <h4>All uploads</h4>
                        <ul>
                            {{ \Helpers::getTracksImages( Auth::user()->id ) }}
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </aside>
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

<style>
.profil-graph-area a {
    position: absolute;
    top: 118px;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 1000;
}
.profile-graph-area-heading {
    margin-top: 0 !important;
    margin-bottom: 0 !important;
}
</style>
@endsection