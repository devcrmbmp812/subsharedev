<h2>Add to playlist</h2>
                                <ul style="list-style:none;" id="sel2">
                                <?php $playlist_index = 0; ?>
                                @foreach($playlist as $play)
                                   <?php
                                    if($playlist_index == 0)
                                      $playlist_index = $play->id; 
                                    ?> 
                                   
                               	  			
                                   <li class="listing" onclick="change_playlist({{$play->id }})" id="listing{{$play->id}}" value="{{$play->id }}"><img style="width: 16px;margin-right: 10px; margin-left: -25px;" src="{{ url('assets/img/close.png')}}" onclick=delete_list('{{$play->id}}')>{{$play->name}}</li> 
                                
                                   <?php $list = DB::table('uploads')->leftjoin('playlists_tracks','playlists_tracks.track_id','uploads.id')->where('playlists_tracks.playlist_id',$play->id)->get();  ?>
                                 
                                @foreach($list as $val)
                              <li class="listing" style="margin-left: 0px;" > <span><img style="width: 16px;" src="{{ url('assets/img/close.png')}}" onclick=delete_song_fromlist('{{$val->track_id}}','{{$play->id}}')> <img style="width: 18px;" onclick="play_all_tracks_func('{{$val->track_id}}','{{$val->file_name}}','{{ url("server/php/files/". $val->file_name."")}}')" src="{{url('assets/img/Play%20button.png')}}"> {{ $val->track_title}}</span></li>
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