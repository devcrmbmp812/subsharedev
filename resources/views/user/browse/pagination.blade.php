                    <div class="panel-body table-responsive">
                        <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            @if( count($media) > 0 )

                               <div class="table-top">
                                <div class="dataTables_info" id="table1_info" role="status" aria-live="polite">{{ count($allmedia) }} results
                                  <button type="button" class="btn btn-default btn-sm" onClick='window.location.replace("{{ url(' /browse ') }}");'> <span class="glyphicon glyphicon-filter"></span>Clear Filter</button>
                                </div>
                                <div class="pull-right">
                                  <div class="top-play-btn"><a href="javascript:void(0);" class="play-green1" id='play_all'><span>Play All</span><img style='' src="{{url('assets/img/xa.png')}}"> </a>
                                  </div>
                                </div>

			                     @else

                            			   <div class="table-top">
                                      <div class="dataTables_info" id="table1_info" role="status" aria-live="polite">
                                        <button type="button" class="btn btn-default btn-sm" onClick='window.location.replace("{{ url(' /browse ') }}");'> <span class="glyphicon glyphicon-filter"></span>Clear Filter</button>
                                      </div>

                            @endif

                            <table class="table dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 87px;"></th>
                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 346px;"></th>
                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 471px;"></th>
                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 216px;"></th>
                                    </tr>
                                </thead>
                                <tbody>

                                @if( count($media) > 0 )
                                <?php
                                    $play_all_tracks = "";
                                    $urls_all_track = "";
                                    $name_all_track ="";
                                ?>
                                    @foreach($media as $med)
                                            <tr role="row" class="odd">

                                                <td class="sorting_1"><img style="width: 80px;height: 80px;" src="{{ \Helpers::audioCoverURL( $med->cover_img ) }}">
                                                </td>
                                                <td>
                                                    <div class="wave-text-area">
                                                      <img src="{{ \Helpers::avatarURL( $med->image ) }}" style="height: 41px;width: 41px;">
                                                    </div>
                                                            <div class="wave-text-area">
                                                               <h3>{{ $med->track_title }} </h3>
                                                                <p>by
                                                                    <a href="{{ \Helpers::profile_url($med->id) }}" target="_blank">{{$med->first_name." ".$med->last_name}}</a>
                                                                </p>

                                                        <span>{{ $med->track_percentage }}%  complete</span>
                                                    </div>
                                                </td>

                                                <td style="width: 586px">

                                                    <div class="wave-graph">

<div id="wave_<?php echo $med->uploads_id; ?>"></div>
                            <img style="height: 100px" id="playerimg_{{$med->uploads_id}}"  src="{{ url('assets/img/wave%20copy.png') }}">
                            <a href="javascript:void(0)" id="start_{{$med->uploads_id}}" onclick="loadPlayer('{{ url('server/php/files/'. $med->file_name) }}', '{{ $med->uploads_id}}' );"><img src="{{ url('assets/img/Play%20button.png') }}"></a>
    <a href="javascript:void(0)" class="play" id="play-{{ $med->uploads_id }}" style="display: none;" data-id='{{ $med->uploads_id }}'>

            <img class="img3" src="{{url('assets/img/player-play-button.png')}}">
            <img class="img4" src="{{url('assets/img/player-pause-button.png')}}" style="display:none;">

    </a>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="dropdown wave-btn">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                            <img src="{{url('assets/admin/img/three-dots.png')}}">

                                                        </button>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                                            @if ( in_array( $med->uploads_id , \Helpers::getUserFlaggedTracks() ) )
                                                                <a class="dropdown-item" href="{{ url('/browse/unflag/'.$med->uploads_id) }}">Unflag</a>
                                                            @else
                                                                <a class="dropdown-item" href="{{ url('/browse/flag/' . $med->uploads_id) }}">Flag</a>
                                                            @endif
                                                           <!-- <a class="dropdown-item" href="{{url('/browse/player/'.$med->uploads_id)}}">View Details</a>-->
                                                           <a class="dropdown-item play-green" href="javascript:;" data-url="{{ url('server/php/files/'. $med->file_name) }}" data-music='{{$med->file_name}}' data-trackid='{{$med->uploads_id}}' data-starttime="1" data-toggle="modal" data-target="#playModal" >View Details</a>

    							                                        
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                    @endforeach
				@foreach($allmedia as $med)
				<?php
							if($play_all_tracks != "")
							{
								 $play_all_tracks = $play_all_tracks.','.$med->uploads_id;
								 $name_all_track =  $name_all_track.','.$med->file_name;
								 $urls_all_track  = $urls_all_track.','.url("server/php/files/". $med->file_name."");
							}else{
								 $play_all_tracks = $med->uploads_id;
								 $name_all_track =  $med->file_name;
								 $urls_all_track  = url("server/php/files/". $med->file_name."");
							}
						?>
				@endforeach
	                            <input type="hidden" id="play_all_tracks" value="{{$play_all_tracks}}">
                                    <input type="hidden" id="name_all_track" value="{{$name_all_track}}">
                                    <input type="hidden" id="urls_all_track" value="{{$urls_all_track}}">

                                @else

                                    <td> No Media Found.</td>

                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<?php
$pagLink ="";
echo $pagLink . "<ul class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
             $pagLink .= "<li onclick=change_tracks('".$i."')><a href='javascript:void(0)'>".$i."</a></li>";
    };
    echo $pagLink . "</ul>";
 ?>
<script>
    $('.play-green').on('click',function(){
       play_all_tracks_func($(this).data('trackid'),$(this).data('music'),$(this).data('url'));

    });
        var track_count = 0;
var play_all_tracks = $("#play_all_tracks").val();
 play_all_tracks = play_all_tracks.split(',');
 var urls_all_track = $("#urls_all_track").val();
 urls_all_track = urls_all_track.split(',');
 var name_all_track = $("#name_all_track").val();
 name_all_track = name_all_track.split(',');

 var search_tags;
  search_tags = $(".token-label").map(function() {
		    return this.innerHTML;
		}).get();

 search_tags = search_tags.join()
search_tags = search_tags.split(',');
console.log('bb'+$('.token-label').html());
//$('.token-label').html();
$("#play_all").click(function(){
 console.log(search_tags);
 if($(".token-label").length != 0){
   console.log('tag')
  play_all_tagtracks_func(parseInt(play_all_tracks[track_count]),name_all_track[track_count],urls_all_track[track_count],1,search_tags);
  track_count++;
 }else{
 play_all_tracks_func(parseInt(play_all_tracks[track_count]),name_all_track[track_count],urls_all_track[track_count],1);
 track_count++;
 }
});
</script>
</div>