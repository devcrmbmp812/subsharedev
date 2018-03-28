@extends('layouts.admin')
@section('title','View Media')

@section('content')
    <aside class="right-side">
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}">Dashboard</a></li>
            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#">Media View</a></li>
        </ol>
        <section class="profile-content">
            <div class="row">
                @if(isset($media)== true)
                <div class="col-md-12 col-lg-12 top-right-content">
                    <div class="profile-top-detail-div">
                        <div class="profile-image-div" >
                            <!-- <img src="{{url('resources/assets/img/large-alic-image.png')}}"> -->
                        @if($media->image)
                            <img style="height: 80px; width: 80px;" class="img-circle img-responsive pull-left" src="{{ url('assets/avatars/'. $media->image) }}" >
                        @else
                            <img style="height: 80px; width: 80px;" class="avatar-image-p" src="{{url('assets/avatars/default-avatar.png')}}" >
                        @endif
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
                        
                            <div id="waveform" class="img-responsive"></div>
                            <div id="waveform-timeline"></div>
                        <a href="" onClick="wavesurfer.playPause();  return false;" id="playpause">
                            <img class="img1" src="{{url('assets/admin/img/Play%20button.png')}}"> 
							<img class="img2" src="{{url('assets/admin/img/big-player-pause.png')}}" style="display:none;height:57px;width:57px">
                        </a>
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
                @else
                    <p>No post to show</p>
                @endif
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
        @if(isset($media)== true)
        wavesurfer.load('{{url("/server/php/files/".$media->file_name)}}');
        @endif
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
        $('#playpause').click(function(){
            if(wavesurfer.isPlaying() == true){
                $('.img2').show();
                $('.img1').hide();
            }else {
                $('.img1').show();
                $('.img2').hide();
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
