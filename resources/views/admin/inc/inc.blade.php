<div class="songplay adv-player">
  <style>
  .modal{
    display:block;
  }
  li.player-adv-btn button {
    border: 0px;
    background: no-repeat;
  }
  div, .form-control {
    transition: 0s all !important;
    -webkit-transition: 0s all !important;
    -moz-transition: 0s all !important;
    -ms-transition: 0s all !important;
    -o-transition: 0s all !important;
    outline: none !important;
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

.adv-player .modal{
	display:block!important;
	opacity:1;
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


.loader-parent{
  text-align: center;
  width: 100%;
  position: absolute;
  z-index: 999;


}
.loader {
  border: 10px solid #fff;
  border-radius: 50%;
  border-top: 10px solid #3fe58d;
  width: 80px;
  height: 80px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
  display: inline-block;

}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
img{
  cursor: pointer
}
input[type=range] {
  /*removes default webkit styles*/
  -webkit-appearance: media-enter-fullscreen-button;


  /*required for proper track sizing in FF*/
}
input[type=range]::-webkit-slider-runnable-track {
  width: 300px;
  height: 5px;
  background: #ddd;
  border: none;
  border-radius: 3px;
}
input[type=range]::-webkit-slider-thumb {
  -webkit-appearance: none;
  border: none;
  height: 16px;
  width: 16px;
  border-radius: 50%;
  background: #3ee38c;
  margin-top: -4px;
}
input[type=range]:focus {
  outline: none;
}
input[type=range]:focus::-webkit-slider-runnable-track {
  background: #ccc;
}

input[type=range]::-moz-range-track {
  width: 300px;
  height: 5px;
  background: #ddd;
  border: none;
  border-radius: 3px;
}
input[type=range]::-moz-range-thumb {
  border: none;
  height: 16px;
  width: 16px;
  border-radius: 50%;
  background: goldenrod;
}

/*hide the outline behind the border*/
input[type=range]:-moz-focusring{
  outline: 1px solid white;
  outline-offset: -1px;
}

input[type=range]::-ms-track {
  width: 300px;
  height: 5px;

  /*remove bg colour from the track, we'll use ms-fill-lower and ms-fill-upper instead */
  background: transparent;

  /*leave room for the larger thumb to overflow with a transparent border */
  border-color: transparent;
  border-width: 6px 0;

  /*remove default tick marks*/
  color: transparent;
}
input[type=range]::-ms-fill-lower {
  background: #777;
  border-radius: 10px;
}
input[type=range]::-ms-fill-upper {
  background: #ddd;
  border-radius: 10px;
}
input[type=range]::-ms-thumb {
  border: none;
  height: 16px;
  width: 16px;
  border-radius: 50%;
  background: goldenrod;
}
input[type=range]:focus::-ms-fill-lower {
  background: #888;
}
input[type=range]:focus::-ms-fill-upper {
  background: #ccc;
}
.close1 {
  position: absolute;
  right: 32px;
  top: 32px;
  width: 32px;
  height: 32px;
  opacity: 0.3;
  z-index: 200;
}
.close1:hover {
  opacity: 1;
}
.close1:before, .close1:after {
  position: absolute;
  left: 15px;
  content: ' ';
  height: 33px;
  width: 2px;
  background-color: #fff;
}
.close1:before {
  transform: rotate(45deg);
}
.close1:after {
  transform: rotate(-45deg);
}

#myform wave > wave:after {
  position: absolute;
  top: 123px;
  width: inherit;
  height: inherit;
  content: "";
  background: #3ee38c;
  border-top:10px solid #3ee38c;
  z-index: 99999;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #3ee38c;
}

input:focus + .slider {
  box-shadow: 0 0 1px #3ee38c;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.hide_slide{
	position: fixed;
  bottom: 0px !important;
  top: 60% !important;
}
.show_slide{
	position: absolute;
  bottom: 0;
  top: 0;
}
.add_list{
  color: white;
  background: #5a6267;
  border: 0px;
  width: 169px;
  height: 30px;
  border-radius: 6px;
  box-shadow: 0px 1px 1px #fbf4f4;
  display:none;
  padding:8px;
}
wave{
  overflow-x:hidden !important;
}
.listing{
  font-size: 15px;
  color: white;
  margin-bottom: 5px;
}
.li_style{
  background: #7f8fa4;
  padding: 2px;
}
.add_track_div:hover{
  background-color: #2ae281;
  color:#fff !important;
}
body::-webkit-scrollbar {
  width: 0.5em;
}

body::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}

body::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
}
#sel2::-webkit-scrollbar {
  width: 0.2em;
}

#sel2::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}

#sel2::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
}

.ctrl::-webkit-scrollbar {
  width: 0.2em;
}
.ctrl::-webkit-scrollbar-thumb {
  background-color: darkgrey;
  outline: 1px solid slategrey;
}
.owl-next{
  position: absolute !important;
  right: -22px !important;
}
.fuse_class{
  background: #3fe38c;
  padding: 15px;
  height: 43px;
  width: auto;
  font-size: 16px;
}
</style>

<div class="modal fade in" id="playModal" role="dialog" style="z-index: 999999; width: 102%;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="border: none;">
      <a href="#" class="close1"></a>
      <div class="top-adv-area">
        <div class="container modal-adv-area">
          <div class="row">
            <div class="col-md-2 playlist-div" id="playlist-div">
              <h2>Add to playlist</h2>
              <ul style="list-style:none; height: 280px !important; overflow-y: scroll !important;" id="sel2">
                <?php $playlist_index = 0; ?>
                @foreach($playlist as $play)
                <?php
                if($playlist_index == 0)
                  $playlist_index = $play->id;
                ?>


                <li class="listing" onclick="change_playlist({{$play->id }})" id="listing{{$play->id}}" value="{{$play->id }}"><img style="width: 16px;margin-right: 10px; margin-left: -25px;" src="{{ url('assets/img/close.png')}}" onclick=delete_list('{{$play->id}}')>{{$play->name}}</li>

                <?php $list = DB::table('uploads')->leftjoin('playlists_tracks','playlists_tracks.track_id','uploads.id')->where('playlists_tracks.playlist_id',$play->id)->get();  ?>

                @foreach($list as $val)
                <li class="listing" style="margin-left: 0px;"> <span>
                  <img style="width: 16px;" src="{{ url('assets/img/close.png')}}" onclick=delete_song_fromlist('{{$val->track_id}}','{{$play->id}}')>
                  <img style="width: 18px;" src="{{url('assets/img/Play%20button.png')}}" onclick="play_all_tracks_func('{{$val->track_id}}','{{$val->file_name}}','{{ url("server/php/files/". $val->file_name."")}}')"> {{ $val->track_title}}</span></li>
                  @endforeach



                  @endforeach

                </ul>
                <div style=" display: inline-grid;     position: absolute;bottom: 0px;">
                  <input type="text" class="add_list" placeholder="Playlist Name...">
                  <a href="#" class="new-list-div"><i class="fa fa-plus-circle" aria-hidden="true"></i><span> Create new Playlist</span></a>
                  <script>
                    $(".new-list-div").on('click',function(){
                     $(".add_list").toggle();
                   });
                    $('.add_list').keypress(function (e) {
                     var key = e.which;
				 if(key == 13)  // the enter key code
         {
          var flag = false;
          $.ajaxSetup({
           headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
          }
        });


          $.ajax({
           dataType: 'json',
           type:'POST',
           url: '{{ url("/admin/savelist")}}',
           data: {'list':$('.add_list').val()},
           success:function(data){
             var html_data = '<li class="listing" onclick="change_playlist('+data.id+')" id="listing'+data.id+'"><img style="width: 16px;margin-right: 10px; margin-left: -25px;" src={{ url("assets/img/close.png")}} onclick=delete_list('+data.id+')>'+$('.add_list').val()+'</li>';
             $('#sel2').append(html_data );
             $.ajaxSetup({
              headers: {
               'X-CSRF-TOKEN': "{{ csrf_token() }}"
             }
           });
             $.ajax({
              dataType: 'html',
              type:'POST',
              url: '{{ url("/admin/update_lists")}}',
              data: {'track_id':$('#latest_track').val()}
            }).done(function(data){
              $(".add_to_list").html(data);
            });
            $(".add_list").toggle();
          }
        }).done(function(data){
						//console.log(data);


          });

      }
    });
  </script>
</div>
             
<input type="hidden" id="latest_playlist" value="{{ $playlist_index }}">
</div>

<input type="hidden" id="latest_track">
<div class="col-md-2 tracklist-div">
  <h2>Track details</h2>
  <div id="track_cover">
    <img src="{{ url('assets/img/small-blue-honey.png') }}"  class="img-responsive">
  </div>
  <ul class="track-list">
    <li>Track: <span id="track_title"></span></li>
    <li>by <span id="track_user"></span></li>
    <li><span id="track_bpm"></span> bpm</li>
    <li id="time_ago">added 2 days ago</li>
    <li><span id="track_per"></span> % complete</li>
    <li id="track_gen">Genre</li>
  </ul>
</div>
<div class="col-md-2 current-list" >
  <h2>Current search</h2><br>

</div>
<div class="col-md-3 adv-artist-div">
  <div class="artist-div">

          
    <h2>Artist MI</h2>
    <a href="javascript:void(0);" class="follow-div" style="position: relative; top: 40px;" onclick="follow" id="follow">FOLLOW</a>
    <a href="javascript:void(0);" class="follow-div" style="position: relative; top: 40px;" onclick="unfollow" id="unfollow" style="display:none">UNFOLLOW</a>


    <div style="display: -webkit-box;">
     <div class="" id="track_userimg">

     </div>
     <h2 style="margin-top: 15px;"><span id="track_user1"></span></h2> <img src="{{url('assets/img/thumb-up.png')}}">
   </div>
   <input type="hidden" id="usere_id">
 </div>

 {{--<div class="artist-text">--}}
  {{--<h4>Allison Green</h4>--}}
  {{--<img src="{{ url('assets/img/small-blue-honey.png') }}">--}}
{{--</div>--}}
<ul class="artist-list">
  <li>FOLLOW<span id="following">0</span></li>
  <li>FOLLOWING<span id="follower">0</span></li>
  <li>SUBSHARES<span id="subshares">0</span></li>
</ul>
<ul class="latest-song-list">
  <li><img src="{{ url('assets/img/latest-pro.png') }}"><span id="latest1">Latest project</span></li>
  <li><img src="{{ url('assets/img/other-pro.png') }}"><span id="latest2">Other project</span></li>
</ul>
</div>
<div class="col-md-3 adv-carosal-div"  >
    <div id="new_subshare_div">
        
    
 <h2>Subshare Tracks</h2>

 <section class="adv-carosal">
     <div class="owl-carousel owl-theme" >
        <div class="item" >
            <img  src="{{ url('assets/img/sumer1.png') }}"  ><img  src="{{ url('assets/img/sumer1.png') }}">
        </div>
        <div class="item" >
            <img  src="{{ url('assets/img/summer-night.png') }}"><img  src="{{ url('assets/img/sumer1.png') }}">
        </div>
    </div>
</section>
 </div>
<div id="similar_new_div">
  <h2>Undecided Songs</h2>
  <?php
  $html ="";
  $undecided = DB::table('uploads')->select('*','uploads.id as upload_id')->leftjoin('likes','uploads.id','likes.track_id')->where('likes.slun','unidecided')->orderBy('uploads.id','desc')->get();

  ?>


  <section class="adv-carosal">
    <div class="owl-carousel owl-theme">
     @for($i=0;$i<count($undecided);$i+=2)
     <div class="item" >
       <span >
         <img onclick="play_all_tracks_func({{$undecided[$i]->upload_id}},'{{$undecided[$i]->file_name}}','{{ url('server/php/files/'.$undecided[$i]->file_name.'')}}')" style="width: 95px !important; height: 95px !important;" title="{{$undecided[$i]->track_title}}"  src="{{ \Helpers::audioCoverURL( $undecided[$i]->cover_img ) }}">

         @if($i+1 < count($undecided))
         <img onclick="play_all_tracks_func({{$undecided[$i+1]->upload_id}},'{{$undecided[$i+1]->file_name}}','{{ url('server/php/files/'.$undecided[$i+1]->file_name.'')}}')" title="{{$undecided[$i+1]->track_title}}" style="width: 95px !important; height: 95px !important;" title="{{$undecided[$i]->track_title}}"   src="{{ \Helpers::audioCoverURL( $undecided[$i+1]->cover_img ) }}">
         @endif

       </span>
     </div>
     @endfor
   </div>
 </section>
 <script>
  $(window).on('load',function() {
    $('.owl-carousel').owlCarousel({
      loop: true,
      autoplay:true,
      margin: 10,
      responsiveClass: true,

      responsive: {
        0: {
          items: 1,
          nav: true,
          loop: true,
          autoplay:true,
        },
        600: {
          items: 1,
          nav: true,
          autoplay:true,
          loop: true,
        },
        1000: {
          items: 1,
          nav: true,
          loop: true,
          autoplay:true,
          margin: 0,
        }
      }

    });
  });
</script>
</div>



<style>
.tip {
  margin: -5em;
  width: 10em;
  height: 160px;
  list-style: none;
}
.ctrl {
  position: relative;
  top: 82px;
  left: 55%;
  transition: .5s;
  width: 150px !important;
  font-size: 16px !important;
  overflow-y: scroll;
  z-index:999999999;
}

.tip a {
	display: block;
	opacity: .56; filter: alpha(opacity=56);
	background: #9da4a9;
	color: #fff;
	text-decoration: none;
	text-shadow: 0 -1px dimgrey;
	padding:6px;
}
.button:hover, .ctrl a:hover, .button:focus, .ctrl a:focus { opacity: 1; filter: alpha(opacity=100); /* For IE8 and earlier */}
.button:focus, .ctrl a:focus { outline: none; }
.button {
	position: relative;
	top: 0px;
	font-size: 17px;
  border: 1px solid #16b075;
  padding: 10px;
  color: #16b075;
  border-radius: 27px;left: 50%;
}
/* circular menu */



.slice{
  background:#1f272c;
}
/* make the menu appear on click */

.button:focus + .tip {
	transform: scale(1);
	opacity: 1;
}
.add_to_list{
  display:none;
}


</style>
<div class="alert alert-danger" style="height: 28px; font-size: 13px; padding: 5px; margin: 0;  position: absolute; top: 0px; display:none;    border-radius: 0px;" id="track_error">
  <strong>Error!</strong> Track already exists in Playlist.
</div>
<div class="alert alert-success" style="height: 28px; font-size: 13px; padding: 5px; margin: 0;  position: absolute; top: 200px; display:none;    border-radius: 0px;" id="track_success">
  <strong>Success!</strong> Track Added to Playlist.
</div>
<?php $parent = DB::table('user_parent_track')->where('user_id', Auth::user()->id)->get(); ?>
<a class='button ctrl parent_track_btn' style="right: 0px; left: 0px;font-size: 12px !important; padding: 7px;" href='#' onclick="add_parent_track()" tabindex='1'><span> <?php if(count($parent)){ ?> Change Parent Track <?php }else{ ?>Add Parent Track<?php } ?></span></a>

<a class='button ctrl' style="left:0px" href='#' onclick="show_hide_list()" tabindex='1'><i class="fa fa-plus-circle" aria-hidden="true"></i><span> Add to Playlist</span></a>
<ul class='tip ctrl add_to_list'>
					<!--<li class='slice'><a href='#'>✦</a></li>
					<li class='slice'><a href='#'>✿</a></li>
					<li class='slice'><a href='#'>✵</a></li>
					<li class='slice'><a href='#'>✪</a></li>
					<li class='slice'><a href='#'>☀</a></li> -->
				</ul>
       <!-- <a href="#" class="add_track_div" style="position: relative;top: 200px; font-size: 17px; border: 1px solid #16b075; padding: 10px; color: #16b075; border-radius: 27px;left: 50%;"><i class="fa fa-plus-circle" aria-hidden="true"></i><span> Add to Playlist</span></a> -->
     </div>
   </div>
 </div>
</div>
<div class="modal-down-area" style="box-shadow:0px -5px 14px rgba(30, 50, 50, 0.75)">

  <div class="row" style="margin-left:0px !important;">
    <div class="loader-parent"><div class="loader"></div></div>
					<!---- Player data is here --->
                        <div class="col-md-12 modal-center">

                            <div class="adv-player-bottom-area" style="width: 100% !important;">
                            <div class="col-md-11">
						<div id="waveform-timeline">
						</div>
                               <div id="myform">
                               <div class="waveform">
                               </div>
                               </div>
                               </div>
                               <div class="col-md-1">
							   <label>
	                                        <label class="switch">
											  <input type="checkbox" id="change_player" checked>
											  <span class="slider round"></span>
											</label>
	                                        Advanced
	                                    </label>
                               <input min="0" max="100" title="volume" style="display: inline-block; margin-top: -25px; height: 150px; transform: rotate(270deg); overflow:hidden; background:transparent;" type="range" id="volume_change"><button type="button" aria-controls="mep_0" title="Mute Toggle" id="toogle_mute" aria-label="Mute Toggle" style=""></button>

    </div>
</div>

                        </div>
                    </div>
                    <div class="model-progress progress">
                       <!-- <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:29.6%">
                       </div>-->
                     </div>
                     <div class="row">
                      <div class="col-md-12">
                        <div class="modal-right">
                          <div class="advance-btn">
                            <p class="total-time"> 00:00</p>
                          </div>

                        </div>

                        <div class="player-area">
                          <div class="row">
                            <div class="col-md-4">
                              <ul class="player-icon-left" style="display: inline-flex;">
                                <li class="later"><img onclick="slun_function('later')" src="{{ url('assets/img/Picture1.png') }}"> <img onclick="slun_function('later')" src="{{ url('assets/img/for_latter_green.png') }}"> </li>
                                <li class="unidecided"><img onclick="slun_function('unidecided')" src="{{ url('assets/img/Picture2.png') }}"> <img onclick="slun_function('unidecided')" src="{{ url('assets/img/sad_face_green.png') }}"></li>
                                <li class="no-interest"><img onclick="slun_function('no-interest')" src="{{ url('assets/img/Picture3.png') }}"> <img onclick="slun_function('no-interest')" src="{{ url('assets/img/block_green.png') }}"></li>
                                <li class="subfuse" style="width: 100px;">
                                  <img  style="width: 100px;" src="{{ url('assets/img/subfuse.png') }}">
                                  <div>
                                    <img class="imgplay" style="width:24px" src="http://novaturesol.com/subshares/assets/img/player-play-button.png">
                                    <img class="imgpause" style="width:24px; display:none;" src="http://novaturesol.com/subshares/assets/img/player-pause-button.png">
                                  </div>
                                  <audio id="audio" style="display:none;" controls="controls">
                                    <source id="audioSource" src=""></source>
                                    Your browser does not support the audio format.
                                  </audio>

                                </li>
                              </ul>
                              <ul class="bottom-player-icon" style="margin-left: 41px; display: inline-flex; width: 100%;">
                                <li><span>Later</span></li>
                                <li><span>Undecided</span></li>
                                <li><span>No interest</span></li>

                                <li><span><input type="button" id='subfuse_add' style="background: #3fe38c; border: 0px; border-radius: 20px;" onclick="showmodal()" class="btn btn-success" value="Add Subfuse"></span></li>
                              </ul>
                            </div>
                            <div class="col-md-4">
                              <div class="inner-player-controller">
                                <ul>
                                  <li><img onclick="farward_backward_funct('backward');" src="{{ url('assets/img/backwrd-nw-play.png') }}"></li>
                                  <li class="player-adv-btn">
                                    <button class="play_audio"  onclick="customplayPause()" >
                                     <img class="img1" src="{{ url('assets/img/big-player.png') }}">
                                     <img class="img2" autofocus src="{{ url('assets/img/big-player-pause.png') }}" style="display:none;" >
                                   </button>
                                   <span onclick="shuffle_song()">
                                    <img src="{{ url('assets/img/shuffle.png') }}" ></span></li>
                                    <li><img onclick="farward_backward_funct('farward');" src="{{ url('assets/img/farwrd-player.png') }}"></li>
                                  </ul>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <ul class="player-icon-right">
                                  <li><a href="javascript:;" onclick="slun_function('subshare')"><img src="{{ url('assets/img/Picture4.png') }}"></a></li>
                                  <li class="middle-player-icon"><img class="like_img" track_status="1" track_id="10" track_user="1" src="{{ url('assets/img/Picture5.png') }}"><img class="like_img" track_status="1" track_id="10" track_user="1" src="{{ url('assets/img/like_green.png') }}"><p class="track_likes_no">0</p></li>
                                  <li><img track_id="10" track_user="1" track_status="0" class="like_img"  src="{{ url('assets/img/Picture6.png') }}"><img track_id="10" track_user="1" track_status="0" class="like_img"  src="{{ url('assets/img/dislike_green.png') }}"><p class="track_dislikes_no">0</p></li>
                                  <div class="track_info"></div>

                                </ul>
                                <ul class="span-player-right">
                                  <li><span>Subshare</span></li>
                                  <li><span>Like</span></li>
                                  <li><span>Dislike</span></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <script type="text/javascript">

              $("#follow").click(function () {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                  }
                });

                $.ajax({
                  dataType: 'json',
                  type: 'post',
                  url: '{{ url("user/follow") }}',
                  data: { id : $('#usere_id').val() },
                  success: function (data) {
                   $("#follow").css("display", "none");
                   $("#unfollow").css("display", "inline-block");

                   $("#follower").html(data.follow);
                   $("#following").html(data.following);
                   $("#subshares").html(data.subshare);
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
            dataType: 'json',
            type: 'post',
            url: '{{ url("user/unfollow") }}',
            data: { id :  $('#usere_id').val()  },
            success: function (data) {
              $("#follow").css("display", "inline-block");
              $("#unfollow").css("display", "none");
              $("#follower").html(data.follow);
              $("#following").html(data.following);
              $("#subshares").html(data.subshare);
            }
          });


        });

      </script>
      <script>
        var start_fuse = 0;
        var end_fuse = 0;
        var fuse_tag = "";
        var start_fuse_array = [];
        var tag_name_array = [];
        var fuse_count= 0;
        function showmodal(){
         $("#myModal1").toggle();
       }
        function play_audio_fuse(){
                var audio = document.getElementById('audio');
                if(audio.paused){
                    audio.load();
                    audio.addEventListener('timeupdate', function (){
                     if (audio.currentTime >= end_fuse) {
                       audio.currentTime = start_fuse;
                       audio.play();
                     }

                   }, false);

                    audio.currentTime = start_fuse;
                    audio.play();
                    $(".imgplay").hide();
                    $(".imgpause").show();
                 }
        }
       $(".imgplay").click(function(){
         $(this).hide();
         $(".imgpause").show();
         var audio = document.getElementById('audio');
         audio.load();
         audio.addEventListener('timeupdate', function (){
          if (audio.currentTime >= end_fuse) {
            audio.pause();
            $(".imgplay").show();
            $(".imgpause").hide();
          }

        }, false);

         audio.currentTime = start_fuse;
         audio.play();
       });
       $(".imgpause").click(function(){
        $(this).hide();
        $(".imgplay").show();
        var audio = document.getElementById('audio');
        audio.pause();
      });

       function subshare_create(){

        window.location.replace("{{ url('/sub-share')}}/"+$("#latest_track").val()+"");
      }
        
        function open_subshare(id){
           window.location.replace("{{ url('/sub-share')}}/"+id+"");
               
           }



      var wavesurfer = WaveSurfer.create({
        container: '.waveform',
        waveColor: '#575757',
        barWidth: 2,
        progressColor: '#000',
        normalize: true,
        minimap: true,
        barHeight: 5,
        maxCanvasWidth: 10,
        pixelRatio:1
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

//alert(track_url);
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

//wavesurfer.enableDragSelection({
//  drag: false,
//  slop: 5
//});

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
  console.log(region_id);
  var colortag=getRandomColor();
  $('.adv-player-bottom-area').prepend('<div class="wavesurfer-label col-md-4" id="'+region_id+'-label"><span class="play_rigion album-buttom1" onclick="play_rigion('+start_time+','+end_time+')"><button type="button" class="album-buttoms" style="background-color:'+colortag+';">'+tag_name+'</button></span></div>');



  var region = wavesurfer.addRegion({
    id:region_id,
    start:start_time,
    end:end_time,
    drag:false,
    color: colortag,
    resize:false
  });
//alert(region );





}


function play_rigion(strat_time,end_time){

  wavesurfer.play(strat_time,end_time);

  $('.img2').show();
  $('.img1').hide();


  wavesurfer.on('pause', function () {
    $('.img1').show();
    $('.img2').hide();
  });

}



function customplayPause(){
 wavesurfer.playPause();

 if(wavesurfer.isPlaying() == true){
   if($(".token-label").length != 0){
     play_rigion(region_start[play_count-1],region_end[play_count-1]);
   }else{
     $('.img2').show();
     $('.img1').hide();
   }

 }else {
  $('.img1').show();
  $('.img2').hide();
}
}

var user_id="";
var track_id="";
$(document).ready(function(){

  $("#volume_change").on('change',function(){
    wavesurfer.setVolume($("#volume_change").val()/100);
  });
  var toogle = true;
  $("#toogle_mute").click(function(){
    if(toogle){
      $("#toogle_mute").css("background-position"," 0px -22px");
    }else{
      $("#toogle_mute").css("background-position"," 0px 0px");
    }
    wavesurfer.setMute(toogle);
    toogle = !toogle;

  });
  $('#change_player').change(function () {
    if($("#change_player").prop('checked') == true){
      $(".modal-backdrop").css('display','block');
      $(".top-adv-area").css('display','block');
      $("#playModal").removeClass("hide_slide");
    }else{
      $(".modal-backdrop").css('display','none');
      $(".top-adv-area").css('display','none');
      $("#playModal").addClass("hide_slide");
    }
  });
  $('.close1').click(function(){
    var audio = document.getElementById('audio');
    audio.pause();
    $('.songplay.adv-player').removeClass('active-link');
    $('.modal-backdrop').remove();
    $('body').removeClass('modal-open');
    play_all_flag = false;

    wavesurfer.destroy();
    wavesurfer.clearRegions();
    $('.adv-player-bottom-area .wavesurfer-label').remove();
    wavesurfer = WaveSurfer.create({
      container: '.waveform',
      waveColor: '#575757',
      barWidth: 2,
      progressColor: '#000',
      normalize: true,
      minimap: true,
      barHeight: 5,
      maxCanvasWidth: 10,
      pixelRatio:1
    });

  });
  $('.play-green').on('click',function(){
    play_all_tracks_func($(this).data('trackid'),$(this).data('music'),$(this).data('url'));

  });




  $('.like_img').click(function(){
   $('.player-icon-right li').removeClass('active');
   $(this).parent().addClass('active');
   var track_status=$(this).attr('track_status');
   console.log($("#latest_track").val()+'aaa');

   $.ajaxSetup({
     headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    }
  });
   $.ajax({
     dataType: 'json',
     type:'POST',
     url: '{{ url("/admin/like-dislike")}}',
     data: {track_status:track_status,track_id:$("#latest_track").val(),track_user:user_id}
   }).done(function(data){
     $('.track_likes_no').html(data.likes);
     $('.track_dislikes_no').html(data.dislike);

   });

 });


});
function slun_function(currentstatus){


 $.ajaxSetup({
   headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
  }
});

 $.ajax({
   dataType: 'json',
   type:'POST',
   url: '{{ url("/admin/slun-status")}}',
   async:false,
   data: {currentstatus:currentstatus,track_id:$("#latest_track").val(),track_user:user_id}
 }).done(function(data){
   $('.player-icon-left li').removeClass('active');
   $('.'+data[0].slun).addClass('active');
 });

 $.ajaxSetup({
   headers: {
    'X-CSRF-TOKEN': "{{ csrf_token() }}"
  }
});

 $.ajax({
   dataType: 'html',
   type:'POST',
   async:false,
   data:{'slun':currentstatus},
   url: '{{ url("/admin/later_unidecide_html")}}',
 }).done(function(data){
    if(currentstatus != "subshare")
      $("#similar_new_div").html(data);
    else
       $("#new_subshare_div").html(data); 
});

}

var global_tagname = "";
function farward_backward_funct(current_status){

  if(play_all_flag){
   if(play_type == 'all'){
     console.log(current_status );
     if(current_status == 'farward'){
       console.log('forward');
       if(track_count< ($("#play_all_tracks").val().split(',')).length){
        $(".imgpause").click();
        play_all_tracks_func(parseInt(play_all_tracks[track_count]),name_all_track[track_count],urls_all_track[track_count],1);
        track_count++;
      }else{
       $(".img1").show();
       $(".img2").hide();
     }
   }else if(current_status == 'backward'){
     console.log('backward');
     if(track_count < ($("#play_all_tracks").val().split(',')).length  && track_count > 1){
      track_count--;
      $(".imgpause").click();
      play_all_tracks_func(parseInt(play_all_tracks[track_count-1]),name_all_track[track_count-1],urls_all_track[track_count-1],1);

    }else{
     $(".img1").show();
     $(".img2").hide();
   }
 }
}else if(play_type == 'tag'){
  if(current_status == 'farward'){
   if(track_count< ($("#play_all_tracks").val().split(',')).length){
     region_start = [];
     region_end = [];
     total_count =0;
     play_count =0;
     $(".imgpause").click();
     play_all_tagtracks_func(parseInt(play_all_tracks[track_count]),name_all_track[track_count],urls_all_track[track_count],1,global_tagname);
     track_count++;
   }else{
    $(".img1").show();
    $(".img2").hide();
  }
}else if(current_status == 'backward'){
 if(track_count< ($("#play_all_tracks").val().split(',')).length && track_count > 1){
   region_start = [];
   region_end = [];
   total_count =0;
   play_count =0;
   track_count--;
   $(".imgpause").click();
   play_all_tagtracks_func(parseInt(play_all_tracks[track_count-1]),name_all_track[track_count-1],urls_all_track[track_count-1],1,global_tagname);

 }else{
  $(".img1").show();
  $(".img2").hide();
}
}
}
}else{

	if($("#latest_playlist").val() != 0){

   $.ajaxSetup({
    headers: {
     'X-CSRF-TOKEN': "{{ csrf_token() }}"
   }
 });
   $.ajax({
    dataType: 'json',
    type:'POST',
    url: '{{ url("/admin/getnewtags")}}',
    data: {'trackid':$('#latest_track').val(),'playlist_id':$('#latest_playlist').val()}
  }).done(function(data){
			   // if(data.track_info[0].id != $('#latest_track').val()){
         var urlr = "{{ url('server/php/files/') }}/"+data.track_info[0].file_name+"";
         play_all_tracks_func(data.track_info[0].id,data.track_info[0].file_name,urlr);
			     //  }else{
			     //    alert('No track found in current playlist..!');
			     //    $('.close1').trigger('click');
			    //   }
       });

}else{
 alert("You dont have any Playlist..!");
 $('.close1').trigger('click');
}
}

}
var track_count = 0;

var play_all_flag = false;
var play_type = 0;
var play_all_tracks = $("#play_all_tracks").val();
play_all_tracks = play_all_tracks.split(',');
var urls_all_track = $("#urls_all_track").val();
urls_all_track = urls_all_track.split(',');
var name_all_track = $("#name_all_track").val();
name_all_track = name_all_track.split(',');

var search_tags;
//$('.token-label').html();
$("#play_all").click(function(){
 play_all_flag = true;
 console.log(search_tags);
 if($(".token-label").length != 0){

   play_type ='tag';
   console.log(play_all_tracks[track_count]);
   play_all_tagtracks_func(parseInt(play_all_tracks[track_count]),name_all_track[track_count],urls_all_track[track_count],1,search_tags);
   track_count++;
 }else{
   play_type = 'all';
   play_all_tracks_func(parseInt(play_all_tracks[track_count]),name_all_track[track_count],urls_all_track[track_count],1);
   track_count++;
 }
});



// Origional Method for wave surfer

function play_all_tracks_func(id,name,url,play_all=0){
  wavesurfer.destroy();
  wavesurfer.clearRegions();
  $('.adv-player-bottom-area .wavesurfer-label').remove();
  wavesurfer = WaveSurfer.create({
    container: '.waveform',
    waveColor: '#575757',
    barWidth: 2,
    progressColor: '#000',
    normalize: true,
    minimap: true,
    barHeight: 5,
    maxCanvasWidth: 10,
    pixelRatio:1
  });
  wavesurfer.on('audioprocess', function() {

   if(wavesurfer.isPlaying()) {
     var totalTime = wavesurfer.getDuration();
     currentTime = wavesurfer.getCurrentTime();
     remainingTime = totalTime - currentTime;

     remainingTime  = remainingTime.toString();
     remainingTime  = remainingTime.split(".");

     var mint = parseInt(remainingTime[0]/60);
     var second = remainingTime[0] % 60;
     $(".total-time").html('- '+mint +' : ' + second);
     
     //if(tag_name_array.indexOf(fuse_tag.toLowerCase()) != -1 && start_fuse != 0){
       // if(parseInt(currentTime) == start_fuse_array[tag_name_array.indexOf(fuse_tag.toLowerCase())])
      //     play_audio_fuse();
     //}
   }
 });
  $(".modal-backdrop").css('display','block');
  $(".top-adv-area").css('display','block');
  $("#playModal").removeClass("hide_slide");
  $('#change_player').prop('checked', true);
  $(".loader-parent").show();
  var music = name;
  var url = url;
		//console.log(music);
		console.log(url);
		show_play_track(url,'stanza1','stanza12');

		var trackid = id;

   wavesurfer.on('ready', function () {
    var timeline = Object.create(WaveSurfer.Timeline);

    timeline.init({
      wavesurfer: wavesurfer,
      container: "#waveform-timeline"
    });
    $.ajaxSetup({
     headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    }
  });


    $.ajax({
     dataType: 'json',
     type:'POST',
     async:false,
     url: '{{ url("/admin/getags")}}',
     data: {'trackid':trackid}
   }).done(function(data){
    $("#track_title").html(data.track_info[0].track_title);
    $("#track_per").html(data.track_info[0].track_percentage);
    $("#track_bpm").html(data.track_info[0].track_bpm);
    $('.track_likes_no').html(data.likes);
    $('.track_dislikes_no').html(data.dislike);
    $("#track_user").html(data.track_info[0].first_name +" "+ data.track_info[0].last_name);
    $("#usere_id").val(data.track_info[0].user_id);
    $("#track_user1").html('<a href={{ url("profile/")}}'+'/'+data.track_info[0].user_id+' style="color:white;margin-left: 10px;">'+data.track_info[0].first_name +" "+ data.track_info[0].last_name +'</a>');
    $("#track_userimg").html("<a href={{ url('profile/') }}/"+data.track_info[0].user_id+"><img class='img-circle' style='width:50px;height:50px;' src='"+data.follow.user_path+"' ></a>");
    $('.add_to_list').html(data.follow.add_to_list);
    $("#track_gen").html(data.track_info[0].track_genre);
$("#new_subshare_div").html(data.subshare_html);

// Subfuse arrays
if(data.tag_data.tag_name){
    start_fuse_array = data.tag_data.start_time;
    tag_name_array = data.tag_data.tag_name;
    fuse_count = data.tag_data.tag_name.length;
    }
    
    $(".latest-song-list").html(data.follow.toptwo);
    $(".current-list").html(data.follow.search_html);
    $("#subfuse_tags").html(data.follow.fuse_html);
    $("#time_ago").html(data.follow.time_ago);
    if(data.track_info[0].user_id == {{Auth::user()->id}})
    {
     $("#unfollow").css("display", "none");
     $("#follow").css("display", "none");
   }else if(data.follow.follow)
   {
     $("#follow").css("display", "inline-block");
     $("#unfollow").css("display", "none");
   }
   else{
     $("#unfollow").css("display", "inline-block");
     $("#follow").css("display", "none");
   }
   if(data.follow.fuse_info != '0'){
    var fuseinfo = (data.follow.fuse_info[0].tag_data).split(',');

    start_fuse = fuseinfo[0].split(':');
    end_fuse = fuseinfo[1].split(":");

    start_fuse = parseInt(start_fuse[0]*60) + parseInt(start_fuse[1]);
    end_fuse = parseInt(end_fuse[0]*60) + parseInt(end_fuse[1]);
    console.log(start_fuse+'|'+end_fuse);
    fuse_tag = fuseinfo[2];
    $('.subfuse').prepend('<div class="wavesurfer-label col-md-4" style="margin-left: -38px;" id="fuse-label"><span class="play_rigion album-buttom1" ><button type="button" class="album-buttoms" style="background-color:#3fe38c;">'+fuse_tag+'</button></span></div>');

    var source = document.getElementById('audioSource');
    source.src = data.follow.fuse_url;
    $("#subfuse_add").prop('value','CHANGE SUBFUSE');
    $(".imgplay").show();
    $(".imgpause").hide();
  }else{
   $("#subfuse_add").prop('value','ADD SUBFUSE');
   $(".imgplay").hide();
   $(".imgpause").hide();
 }
 $("#follower").html(data.follow.follower);
 $("#following").html(data.follow.following);
 $("#subshares").html(data.follow.subshare);

 $("#track_cover").html("<img src='"+data.follow.cover_path+"' style='width:110px; height:110px;'  class='img-responsive'>");

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
play_audio_fuse();
 $(".wavesurfer-region").removeAttr('title');




});
   $("#latest_track").val(id);
   customplayPause();
 });
		//$(".modal-backdrop").css('visibility','visible');
		$('.songplay.adv-player').addClass('active-link');
		//$('.notification-popup').addClass('active-link');
   wavesurfer.on('finish', function () {
    if(play_all){
     if(track_count< ($("#play_all_tracks").val().split(',')).length){
       $(".imgpause").click();
       play_all_tracks_func(parseInt(play_all_tracks[track_count]),name_all_track[track_count],urls_all_track[track_count],1);
       track_count++;
     }else{
      $(".img1").show();
      $(".img2").hide();
    }
  }else{
    $(".img1").show();
    $(".img2").hide();
  }

});

 }
 var region_start = [];
 var region_end = [];
 var total_count =0;
 var play_count =0;
// Origional Method for Tag Search wave surfer

function play_all_tagtracks_func(id,name,url,play_all=0,tag_name){
  global_tagname = tag_name;
  wavesurfer.destroy();
  wavesurfer.clearRegions();
  $('.adv-player-bottom-area .wavesurfer-label').remove();
  wavesurfer = WaveSurfer.create({
    container: '.waveform',
    waveColor: '#575757',
    barWidth: 2,
    progressColor: '#000',
    normalize: true,
    minimap: true,
    barHeight: 5,
    maxCanvasWidth: 10,
    pixelRatio:1
  });
  wavesurfer.on('audioprocess', function() {

   if(wavesurfer.isPlaying()) {
     var totalTime = wavesurfer.getDuration();
     currentTime = wavesurfer.getCurrentTime();
     remainingTime = totalTime - currentTime;

     remainingTime  = remainingTime.toString();
     remainingTime  = remainingTime.split(".");

     var mint = parseInt(remainingTime[0]/60);
     var second = remainingTime[0] % 60;
     $(".total-time").html('- '+mint +' : ' + second);
     //if(tag_name_array.indexOf(fuse_tag.toLowerCase()) != -1 && start_fuse != 0){
      //  if(parseInt(currentTime) == start_fuse_array[tag_name_array.indexOf(fuse_tag.toLowerCase())])
       //    play_audio_fuse();
     //}
   }
 });
  $(".modal-backdrop").css('display','block');
  $(".top-adv-area").css('display','block');
  $("#playModal").removeClass("hide_slide");
  $('#change_player').prop('checked', true);
  $(".loader-parent").show();
  var music = name;
  var url = url;
		//console.log(music);
		//console.log(url);
		show_play_track(url,'stanza1','stanza12');

		var trackid = id;

   wavesurfer.on('ready', function () {
    var timeline = Object.create(WaveSurfer.Timeline);

    timeline.init({
      wavesurfer: wavesurfer,
      container: "#waveform-timeline"
    });
    $.ajaxSetup({
     headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    }
  });


    $.ajax({
     dataType: 'json',
     async:false,
     type:'POST',
     url: '{{ url("/admin/getags")}}',
     data: {'trackid':trackid}
   }).done(function(data){
    $("#track_title").html(data.track_info[0].track_title);
    $("#track_per").html(data.track_info[0].track_percentage);
    $("#track_bpm").html(data.track_info[0].track_bpm);
    $('.track_likes_no').html(data.likes);
    $('.track_dislikes_no').html(data.dislike);
    $("#track_user").html(data.track_info[0].first_name +" "+ data.track_info[0].last_name);
    $("#usere_id").val(data.track_info[0].user_id);
    $("#track_user1").html('<a href={{ url("profile/")}}'+'/'+data.track_info[0].user_id+' style="color:white;margin-left: 10px;">'+data.track_info[0].first_name +" "+ data.track_info[0].last_name +'</a>');
    $("#track_userimg").html("<a href={{ url('profile/') }}/"+data.track_info[0].user_id+"><img class='img-circle' style='width:50px;height:50px;' src={{ url('assets/avatars/')}}/"+data.track_info[0].image+" ></a>");
    $('.add_to_list').html(data.follow.add_to_list);
    $("#track_gen").html(data.track_info[0].track_genre);
    $("#new_subshare_div").html(data.subshare_html);

    $(".latest-song-list").html(data.follow.toptwo);

    var search_html = "<h2>Current search</h2><ul class='tab-blues'>";
    for(var i =0;i<search_tags.length;i++){
     search_html +="<li>"+search_tags[i]+"</li>";
   }
   search_html += "</ul>";

   $("#subfuse_tags").html(search_html);
   $(".current-list").html(search_html);
   $("#time_ago").html(data.follow.time_ago);
   if(data.track_info[0].user_id == {{Auth::user()->id}})
   {
     $("#unfollow").css("display", "none");
     $("#follow").css("display", "none");
   }else if(data.follow.follow)
   {
     $("#follow").css("display", "inline-block");
     $("#unfollow").css("display", "none");
   }
   else{
     $("#unfollow").css("display", "inline-block");
     $("#follow").css("display", "none");
   }
    if(data.follow.fuse_info != '0'){
    var fuseinfo = (data.follow.fuse_info[0].tag_data).split(',');
// Subfuse arrays
if(data.tag_data.tag_name){
    start_fuse_array = data.tag_data.start_time;
    tag_name_array = data.tag_data.tag_name;
    fuse_count = data.tag_data.tag_name.length;
    }
    
    start_fuse = fuseinfo[0].split(':');
    end_fuse = fuseinfo[1].split(":");

    start_fuse = parseInt(start_fuse[0]*60) + parseInt(start_fuse[1]);
    end_fuse = parseInt(end_fuse[0]*60) + parseInt(end_fuse[1]);
  
    fuse_tag = fuseinfo[2];
    $('.subfuse').prepend('<div class="wavesurfer-label col-md-4" style="margin-left: -38px;" id="fuse-label"><span class="play_rigion album-buttom1" ><button type="button" class="album-buttoms" style="background-color:#3fe38c;">'+fuse_tag+'</button></span></div>');
    var source = document.getElementById('audioSource');
    source.src = data.follow.fuse_url;
    $("#subfuse_add").prop('value','CHANGE SUBFUSE');
    $(".imgplay").show();
    $(".imgpause").hide();
    }else{
     $("#subfuse_add").prop('value','ADD SUBFUSE');
     $(".imgplay").hide();
     $(".imgpause").hide();
   }
   $("#follower").html(data.follow.follower);
   $("#following").html(data.follow.following);
   $("#subshares").html(data.follow.subshare);

   $("#track_cover").html("<img src='"+data.follow.cover_path+"' style='width:110px; height:110px;'  class='img-responsive'>");

   $('.player-icon-left li').removeClass('active');
   $('.loader-parent').hide();
   if(data.slun != 0)
     $('.'+data.slun[0].slun).addClass('active');

   var tag_data=data.success;
   user_id=data.user_id;
   track_id=data.track_id;
   console.log("beforel loop");
   for(var i=0; i < tag_data.length; i++)
   {
    console.log("in loop");
    var tag_name1 = data.success[i].tag_name;
    tag_name1 = tag_name1.toLowerCase();
    for(var a = 0; a < tag_name.length;a++)
    {
      tag_name[a] = tag_name[a].toLowerCase();


      if(!tag_name1.indexOf(tag_name[a]))
      {
       console.log("in if" + tag_name1.indexOf(tag_name[a])+tag_name[a]+tag_name1);

       region_start.push(data.success[i].start_time);
       region_end.push(data.success[i].end_time);
       total_count = total_count+1;
				// var wait_time = (region_end - region_start)*1000;
     }
     create_region('stanza'+i,data.success[i].start_time,data.success[i].end_time,data.success[i].tag_name);
   }
 }
play_audio_fuse();
 $(".wavesurfer-region").removeAttr('title');

});
   $("#latest_track").val(id);
   console.log(total_count);
   if(total_count>0){
     play_rigion(region_start[play_count],region_end[play_count]);
     play_count++;
   }
 });

		//$(".modal-backdrop").css('visibility','visible');
		$('.songplay.adv-player').addClass('active-link');
		//$('.notification-popup').addClass('active-link');

		wavesurfer.on('pause', function () {

     if(play_count < total_count){
			    //console.log(wavesurfer.getCurrentTime() +'time'+ region_end[play_count - 1]);
          if(parseInt(wavesurfer.getCurrentTime()) == region_end[play_count - 1]){
            play_rigion(region_start[play_count],region_end[play_count]);
            play_count = play_count + 1;
          }
        }else{

          if(parseInt(wavesurfer.getCurrentTime()) == region_end[play_count - 1]){
           if(play_all){
            if(track_count< ($("#play_all_tracks").val().split(',')).length){
              region_start = [];
              region_end = [];
              total_count =0;
              play_count =0;
              $(".imgpause").click();
              play_all_tagtracks_func(parseInt(play_all_tracks[track_count]),name_all_track[track_count],urls_all_track[track_count],1,tag_name);
              track_count++;
            }else{
             $(".img1").show();
             $(".img2").hide();
           }
         }else{
           $(".img1").show();
           $(".img2").hide();
         }
       }
     }
   });

  }

  function change_playlist(id){
    $("#latest_playlist").val(id);
    $(".listing").removeClass('li_style');
    $("#listing"+id).addClass('li_style');
  }
  function delete_list(id){
    if(confirm("Confirm Delete Playlist?")){
      $.ajaxSetup({
       headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      }
    });
      $.ajax({
       dataType: 'html',
       type:'POST',
       url: '{{ url("/admin/removelist")}}',
       data: {'list_id':id}
     }).done(function(data){
       $("#playlist-div").html(data);
       $.ajaxSetup({
        headers: {
         'X-CSRF-TOKEN': "{{ csrf_token() }}"
       }
     });
       $.ajax({
        dataType: 'html',
        type:'POST',
        url: '{{ url("/admin/update_lists")}}',
        data: {'track_id':$('#latest_track').val()}
      }).done(function(data){
        $(".add_to_list").html(data);
      });
    });
   }
 }
 var togg = true;
 function show_hide_list(){

  if(togg){
    $('.add_to_list').show();
  }else{
    $('.add_to_list').hide();
  }
  togg = !togg;
}

function delete_song_fromlist(track_id,list_id){
  if(confirm("Confirm Delete Track?")){
    $.ajaxSetup({
      headers: {
       'X-CSRF-TOKEN': "{{ csrf_token() }}"
     }
   });
    $.ajax({
      dataType: 'html',
      type:'POST',
      url: '{{ url("/admin/delete_song_fromlist")}}',
      data: {'track_id':track_id,'list_id':list_id}
    }).done(function(data){
     $("#playlist-div").html(data);
   });
  }
}


$(document).ready(function(){
  search_tags = $(".token-label").map(function() {
    return this.innerHTML;
  }).get();

  search_tags = search_tags.join()
  search_tags = search_tags.split(',');
  console.log('aa'+$('.token-label').html());
  
  $( "body").unbind( "keyup" );

$('body').on('keyup',function(e){
   if(e.keyCode == 32){
      $(".play_audio").click();
      }
});

});

function shuffle_song(){

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': "{{ csrf_token() }}"
		}
	});
	$.ajax({
		dataType: 'json',
   type:'POST',
   url: '{{ url("/admin/shuffle_song")}}',
   data: {'track_id':$('#latest_track').val()}
 }).done(function(data){
   console.log(data.track_info);
   var urlr = "{{ url('server/php/files/') }}/"+data.track_info[0].file_name+"";
   play_all_tracks_func(data.track_info[0].id,data.track_info[0].file_name,urlr);
 });
}


</script>
<div >
  <div class="modal fade in" id="myModal1" role="dialog" style="display:none;position: fixed; top: 21%; z-index: 999999999;">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="showmodal()" >×</button>
          <h4 class="modal-title">Subfuse</h4>
        </div>
        <div class="modal-body">
          <div class="form-group" id="subfuse_tags">

          </div>

        </div>
        <div class="modal-footer">
          <button type="button" onclick="showmodal()" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
 var fuse_url = "";
 function change_fuse(tag,track){
  $(".fuse_li").css('background','#3fe38c');
  $("#"+tag+'fuse').css('background','green');
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    }
  });
  $.ajax({
    dataType: 'json',
    async:false,
    type:'POST',
    url: '{{ url("/admin/save_fuse")}}',
    data: {'track_id': track, 'tag_id':tag}
  }).done(function(data){
   if(data.fuse_info != '0'){
    var fuseinfo = (data.fuse_info[0].tag_data).split(',');

    start_fuse = fuseinfo[0].split(':');
    end_fuse = fuseinfo[1].split(":");
   fuse_tag = fuseinfo[2];
   $('.subfuse .wavesurfer-label').remove();
    $('.subfuse').prepend('<div class="wavesurfer-label col-md-4" id="fuse-label"><span class="play_rigion album-buttom1" ><button type="button" class="album-buttoms" style="background-color:#3fe38c;">'+fuse_tag+'</button></span></div>');
   
    start_fuse = parseInt(start_fuse[0]*60) + parseInt(start_fuse[1]);
    end_fuse = parseInt(end_fuse[0]*60) + parseInt(end_fuse[1]);
    console.log(start_fuse+'|'+end_fuse);
    var source = document.getElementById('audioSource');
    source.src = data.fuse_url;
    console.log(fuse_url);
    $("#subfuse_add").prop('value','CHANGE SUBFUSE');
    $(".imgplay").show();
    $(".imgpause").hide();
  }else{
   $("#subfuse_add").prop('value','ADD SUBFUSE');
   $(".imgplay").hide();
   $(".imgpause").hide();
 }
 $('#myModal1').hide();
});
}

function add_parent_track(){
$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    }
  });
  $.ajax({
    dataType: 'json',
    async:false,
    type:'POST',
    url: '{{ url("/add_parent_track")}}',
    data: {'track_id': $("#latest_track").val()}
  }).done(function(data){
  alert('Saved your parent track...');
  });
}
</script>
    <script>
    
    window.addEventListener('keydown', function(e) {
        if(e.keyCode == 32 && e.target == document.body) {
          e.preventDefault();
        }
      });
      
      var url = $(location).attr('href').split("/");
      console.log(url[4]);
      if('{{Request::is('your-music') }}')
      {
          $(".parent_track_btn").show();
      }else{
       $(".parent_track_btn").hide();
            }
       </script>