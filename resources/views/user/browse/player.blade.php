@extends('layouts.user')
@section('title','You Music')

@section('content')

<style>
.modal {
    display: block;
    visibility: hidden;
    height: 0px;
    width: 0px;
}
.modal-open .modal{
    visibility: visible;
    height: auto;
    width: auto;

}
    li.player-adv-btn button {
    border: 0px;
    background: no-repeat;
}

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
.btn-primary:active,
.btn-primary:hover,
.btn-primary,
.btn-primary:active:focus{
    color: #fff!important;
    background-color: #fff!important;
    border-color: #fff!important;
    box-shadow: inset 0 0px 0px rgba(0,0,0,0)!important;
}
.active-module{
        display: block!important;
    visibility: visible!important;
}
.songplay.adv-player,
.notification-popup{
        visibility: hidden;
    height: 0px;
    width: 0px;
}
.songplay.adv-player.active-link,
.notification-popup.active-link{
        visibility: visible;
    height: auto;
    width: auto;
}
.songplay.adv-player .modal-down-area {
    background: #eff3f5;
    padding: 54px 0px 0px;
}
.progress-bar ,
ul.player-icon-right li.active img:nth-child(1),
ul.player-icon-right li img:nth-child(2),
.player-icon-left li.active img:first-child,
.player-icon-left li img:last-child{
    display:none;
}
ul.player-icon-right li.active img:nth-child(2),
.player-icon-left li.active img:last-child{
            display: inline-block;
}
ul.player-icon-left li {

    vertical-align: middle;
}
</style>

    <script src="//cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.4.0/wavesurfer.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.css" rel="stylesheet" type="text/css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.2.3/plugin/wavesurfer.regions.min.js"></script>


    <aside class="right-side">
    <ol class="breadcrumb">
        <li><a href="{{ url('/user-dashboard') }}">Dashboard</a></li>
        <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Player</li>
    </ol>
    <section class="content">


        <div class="row">
            <div class="col-lg-12 media-div top-right-content player-bg">
                <!-- content  -->

                    <!-- player area start -->
                        <div class="top-player-area">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img src="{{ url('assets/img/allison.png') }}">
                                        <h1>{{ $media->track_title }}</h1>
                                        <span>by {{ $media->first_name }} {{ $media->last_name }}</span>
                                    </div>
                                    <div class="col-md-4">
                                       <a href="{{ url('/browse') }}" class="info-div">Back to Browse</a>
                                    </div>
                                </div>


                                <div class="player-inner-area">

                                    <!-- player start -->
                                    <div class="wave-graph">
                                       <div class="adv-player-bottom-area"></div>
                                       <div class="waveform"></div>
                                    </div>

                                    <div class="advance-btn">
                                        <p class="total-time">-4:08</p>
                                    </div>
                                    <div class='wave-graph'>
                                        <button style="background:none;border:none;" onclick="customplayPause()" >
                                        <img class="img1" src="{{url('assets/img/player-play-button.png')}}">
                                        <img class="img2" src="{{url('assets/img/player-pause-button.png')}}" style="display:none;">
                                     </button>
                                    </div>
                                    <!-- player end -->



                                </div>
                            </div>

                        <!-- player area end -->


                <!-- content end -->
            </div>

            <!-- row -->
        </div>
    </section>
</aside>
@endsection



@section('script')

<script>
    var user_id="";
    var track_id="";
    var wavesurfer = WaveSurfer.create({
                        container: '.waveform',
                        waveColor: '#575757',
                        barWidth: 2,
                        progressColor: '#000',
                        normalize: true,
                        minimap: true,
                        barHeight: 5,
                        maxCanvasWidth: 10,
                        hideScrollbar: false
                        });
  // $(document).ready(function () {

        $('#search_track').on('change', function(e){
            $(this).closest('form').submit();
        });

        $('#bpm').on('change', function(e){
            $(this).closest('form').submit();
        });
    function getDuration(src, cb) {
        var audio = new Audio();
        $(audio).on("loadedmetadata", function(){
            cb(audio.duration);
        });
        audio.src = src;
    }
    function secondsTimeSpanToHMS(s) {
        var h = Math.floor(s/3600); //Get whole hours
        s -= h*3600;
        var m = Math.floor(s/60); //Get remaining minutes
        s -= m*60;
        return (m < 10 ? '0'+m : m)+":"+(s < 10 ? '0'+s : s); //zero padding on minutes and seconds
    }

    function show_play_track(track_url, region_id1,region_id2){
            wavesurfer.load(track_url);
            var duration;
            getDuration(track_url, function(length) {
                duration = parseInt(length);
                $('.total-time').html(secondsTimeSpanToHMS(duration));
            });
            /* Update labels */
            var updateLabel = function (region) {
                var regionEl = document.querySelector('region[data-id="' + region.id + '"]');
                var labelEl = document.querySelector('#' + region.id + '-label');
                if (!labelEl) return;
                    labelEl.style.display = 'block';
                    labelEl.style.width = regionEl.clientWidth + 'px';
                    labelEl.style.left = regionEl.offsetLeft + 'px';
            };

            wavesurfer.on('region-created', updateLabel);
            wavesurfer.on('region-updated', updateLabel);
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
        function create_region(region_id,start_time,end_time,tag_name){
                var colortag=getRandomColor();
                $('.adv-player-bottom-area').prepend('<div class="wavesurfer-label col-md-4" id="'+region_id+'-label"><span class="play_rigion album-buttom1" onclick="play_rigion('+start_time+','+end_time+')"><button type="button" class="album-buttoms" style="background-color:'+colortag+';">'+tag_name+'</button></span></div>');

                var region = wavesurfer.addRegion({
                    id:region_id,
                    start:start_time,
                    end:end_time,
                    drag:false,
                    resize:false,
                    color: colortag
                });
        }

        function play_rigion(strat_time,end_time){
            wavesurfer.play(strat_time,end_time);
        }

        function customplayPause(){
            wavesurfer.playPause();
            if(wavesurfer.isPlaying() == true){
                $('.img2').show();
                $('.img1').hide();
            }else {
                $('.img1').show();
                $('.img2').hide();
            }
        }


        // $('.load_music').on('load', function(e){
            $('#userImage').html('');
            var user = "user";
            var desc = "description ";
            var title = "title ";
            var music = "{{$media->file_name}}";
            var trackid = {{$media->trackID}};
            var date = "{{ dateHumans($media->created_at) }}";
            var image = "{{ isset($media->cover_img) ?  $media->cover_img : 'default-avatar.png'}}" ;
            var imagehtml = "<img style='height:40px; width:40px;' src='{{url('/assets/avatars/')}}/"+image+"'>";
            var url = "{{ url('server/php/files/'. $media->file_name) }}";
            show_play_track(url,'stanza1','stanza12');

                wavesurfer.on('ready', function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    dataType: 'json',
                    type:'POST',
                    url: '{{ url("/browse/getags")}}',
                    data: {trackid:trackid}

                }).done(function(data){
                    $('.player-icon-left li').removeClass('active');
                    $('.loader-parent').hide();
                    if(data.slun != 0)
                    $('.'+data.slun[0].slun).addClass('active');

                    var tag_data=data.success;
                    user_id=data.user_id;
                    track_id=data.track_id;

                        for(var i=0; i < tag_data.length; i++){
                            create_region('stanza'+i,data.success[i].start_time,data.success[i].end_time,data.success[i].tag_name);
                        }
                });

            });

            $('.songplay.adv-player').addClass('active-link');
            $('.notification-popup').addClass('active-link');


            $('#userImage').html(imagehtml);
            $('#desc').html(desc);
            $('#datee').html(date);
            $('#subshare_title').html(title);
        // });

        $('#myModal').on('hidden.bs.modal', function () {
            if(wavesurfer.isPlaying() == true){
                wavesurfer.pause();
                $('.img1').show();
                $('.img2').hide();
            }
        })
    //});
    </script>

@endsection