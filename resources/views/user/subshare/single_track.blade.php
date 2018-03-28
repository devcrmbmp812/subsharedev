 <div class="wave-graph">
                                      <div id="waveformp{{$id}}"></div>

                                      <a href="javascript:void(0)" class="sub-anchor" onclick="customplayPausep()" style="margin-top: 35px;" id="play-74" data-id='74'>
                                              <img class="img3" src="{{ url('assets/img/player-play-button.png') }}" class="img-responsive sub-two-play">
                                              <img class="img4" src="{{ url('assets/img/player-pause-button.png') }}" style="display: none">
                                          </a>

</div>

<script>
 var wavesurferp = WaveSurfer.create({
        container: '#waveformp{{$id}}',
        waveColor: 'gray',
        progressColor: 'red',
        audioRate: 1,
        barWidth: 3,
        height: 150,
        pixelRatio:1
      });
      wavesurferp.load("{{ url('server/php/files/').'/'.$song_name}}");
     
     wavesurferp.on('ready',function(){
        $("#loadd").hide(); 
     });
    

    function customplayPausep()
        {
            var cuurent_id= $(this).attr('id');
            wavesurferp.playPause();

            if(wavesurferp.isPlaying() == true)
            {
                $('.img4').show();
                $('.img3').hide();
            }else {

                $('.img3').show();
                $('.img4').hide();
            }

            // On finish place play icon.
            wavesurferp.on('finish', function () {
                $('.img3').show(); // display play icon.
                $('.img4').hide();
            });
        }
        function closewave(){
          wavesurferp.destroy();
        }
 </script>