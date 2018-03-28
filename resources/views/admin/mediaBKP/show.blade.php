@extends('layouts.admin')

@section('content')

<!--    --><?php
//    dd($userUpload);
//    ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.4.0/wavesurfer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.2.3/plugin/wavesurfer.timeline.min.js"></script>
    <aside class="right-side">
        <ol class="breadcrumb">
            <li><a href="#">Breadcrumb item 1</a></li>
            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#">Breadcrumb item 2</a></li>
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
                                <h2>{{-- $media->first_name." ".$media->last_name --}}</h2>
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
    </script>


@endsection
