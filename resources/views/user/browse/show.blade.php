@extends('layouts.user')
@section('title','You Music')

@section('content')

    <script src="//cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.4.0/wavesurfer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.1.3/plugin/wavesurfer.regions.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.2.3/plugin/wavesurfer.timeline.min.js"></script>

    <aside class="right-side">
        <ol class="breadcrumb">
            <li><a href="{{ url('/user-dashboard') }}">Dashboard</a></li>
            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Your Music</li>
        </ol>
        <section class="profile-content">
            <div class="row">
                <div class="col-md-12 col-lg-12 top-right-content">
                    <div class="profile-top-detail-div">
                        <div class="profile-image-div" >
                            <img src="{{url('resources/assets/img/large-alic-image.png')}}">
                        </div>
                        <div class="profile-text-div">
                            <div class="profil-right-area">
                                <h2>{{$media->first_name." ".$media->last_name}}</h2>
                                <a href="#" class="message-btn"><span>MESSAGE</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="profil-graph-area">
                        <div class="profile-graph-area-heading"><h3>{{$media->first_name." ".$media->last_name}} DelbertHayes uploaded Grace Like Rain
                             {{$media->song_name}}</h3></div>
                        {{--<img src="{{url('resources/assets/img/profile-graph.png')}}" class="img-responsive">--}}
                        @if($audio_tags)
                            @foreach($audio_tags as $audio_tag)
                                <?php $string= $audio_tag->tag_data;
                                $tags = explode(',',$string);
                                foreach($tags as $key) { $tags[$key] = trim($key); }?>
                                <div class="wavesurfer-label col-md-4" id="stanza{{$audio_tag->tag_id}}-label"><span class="play_rigion album-buttom1" onclick="play_rigion('{{$tags[0]}}','{{$tags[1]}}')"><button type="button" class="album-buttoms">{{$tags[2]}}<img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/gray-play-controller.png" style="width: 10px;"></button></span></div>
                            @endforeach
                        @endif
                            <div id="waveform" class="img-responsive"></div>
                            <div id="waveform-timeline"></div>
                        <a href="" onClick="wavesurfer.playPause();  return false;"><img src="{{url('resources/assets/img/Play%20button.png')}}"></a>
                    </div>

                    <div class="upload-div">
                        <h4>All uploads</h4>
                        <ul>
                           @if($userUpload)
                               @foreach($userUpload as $upload)
                                    <a href="{{url('admin/media/show/'.$upload->id)}}">
                                        <li><img src="{{url('resources/assets/img/pic1.png')}}"></li>
                                    </a>
                                @endforeach
                            @else
                               <li>No record found</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </aside>
    <script>

        var wavesurfer = WaveSurfer.create({
            container: '#waveform',
            progressColor: 'red',
            audioRate: 1,
            barWidth: 3,
            height: 250,
            pixelRatio:1
        });
        wavesurfer.load('{{url("/server/php/files/".$media->file_name)}}');

        var updateLabel = function (region) {
            var regionEl = document.querySelector('region[data-id="' + region.id + '"]');
            var labelEl = document.querySelector('#' + region.id + '-label');
            //console.log(labelEl );
            if (!labelEl) return;
            labelEl.style.display = 'block';
            labelEl.style.width = regionEl.clientWidth + 'px';
            labelEl.style.left = regionEl.offsetLeft + 'px';
        };

        wavesurfer.enableDragSelection({
            drag: false,
            slop: 5
        });

        wavesurfer.on('region-created', updateLabel);
        wavesurfer.on('region-updated', updateLabel);

        wavesurfer.on('ready', function () {
            @if($audio_tags)
                @foreach($audio_tags as $audio_tag)
                <?php $string= $audio_tag->tag_data;
                $tags = explode(',',$string);
                foreach($tags as $key) { $tags[$key] = trim($key); }?>
                    var region = wavesurfer.addRegion({
                        id: 'stanza{{$audio_tag->tag_id}}',
                        start:secondsTimeSpanToHMS('{{$tags[0]}}') ,
                        end: secondsTimeSpanToHMS('{{$tags[1]}}'),
                        color:'hsla(200, 100%, 30%, 0.1)'
                    });
                @endforeach
            @endif
        });
        wavesurfer.on('audioprocess', function() {
            if(wavesurfer.isPlaying()) {
                var totalTime = wavesurfer.getDuration(),
                    currentTime = wavesurfer.getCurrentTime(),
                    remainingTime = totalTime - currentTime;

                // document.getElementById('time-total').innerText = Math.round(totalTime * 1000);
                // document.getElementById('time-current').innerText = Math.round(currentTime * 1000);
                // document.getElementById('time-remaining').innerText = Math.round(remainingTime * 1000);
            }
        });

        function play_rigion( strat_time,end_time){
            wavesurfer.play(strat_time,end_time);
        }
        function secondsTimeSpanToHMS(s) {
            var h = Math.floor(s/3600); //Get whole hours
            s -= h*3600;
            var m = Math.floor(s/60); //Get remaining minutes
            s -= m*60;
            return (m < 10 ? '0'+m : m)+":"+(s < 10 ? '0'+s : s); //zero padding on minutes and seconds
        }
    </script>


@endsection
