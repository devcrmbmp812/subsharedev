@extends('layouts.user')
@section('title','Your Music')

@section('content')

<!-- for search tags -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.css" rel="stylesheet" type="text/css" />


    <aside class="right-side">
    <ol class="breadcrumb">
        <li><a href="{{ url('/user-dashboard') }}">Dashboard</a></li>
        <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Your Music</li>
    </ol>
    <section class="content">
        <div class="row">

        @if( Request::get('msg') != null)
            <div class="alert alert-success">
                <strong>Success!</strong>.
                <br/>
                {{ Request::get('msg') }}

            </div>
        @endif

            <div class="col-lg-12 media-div top-right-content">
                {{ Form::open(array('url' => '/your-music/search', 'method' => 'POST')) }}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="media-table-select">
                                    <input type="text" class="form-control" name="search_track" id="search_track" placeholder="Title" value="{{( isset($search_track) ? $search_track : "") }}">
                                </div>
                            </div>
                            <div class="col-md-2 media-table-select">
                                <select class="form-control" name="sel1" id="sel1">
                                <option value="">Percentage</option>
                                      @for($i=1; $i<=100;$i++)
                                      <option value="{{$i}}" <?php echo ($percentage) == $i ? 'selected' : "" ;  ?>> {{$i}} %</option>
                                    @endfor
                                </select>
                            </div>

                            <?php
                            $musicGenres = \Helpers::getMusicGenres();
                            ?>
                            <div class="col-md-2 media-table-select">
                                <select class="form-control" name="genre" id="genre">
                                    <option value="">Genre</option>
				        @if($musicGenres)
				            @foreach($musicGenres as $genres)
				                <option value="{{$genres->title}}" <?php echo ($genre) == $genres->title ? 'selected' : "" ;  ?>> {{ ucfirst($genres->title)}}</option>
				            @endforeach
				        @endif
                                </select>
                            </div>
                            <div class="col-md-2 media-table-select">
                                <select class="form-control" name="bpm" id="bpm">
                                <option value="">BPM</option>
                                    @for($j=70; $j<=180;$j++)
                                       <option value="{{$j}}" <?php echo ($bpm) == $j ? 'selected' : "" ;  ?>> {{$j}} </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4 table-tokenizer">
                                <input type="text" class="form-control" placeholder="Tags" name="tokenfield" id="tokenfield" value="{{( isset($tokenfield) ? $tokenfield : "") }}" />
                                <div class="form-data"></div>
                            </div>
                        </div>
                    </div>



                     <!-- Second filter row -->
                <div class="form-group">

                    <div class="row">

                        <!-- artist name -->
                        <div class="col-md-2">
                            <div class="media-table-select">
                                <input type="text" class="form-control" name="artist_name" id="artist_name" placeholder="Artist Name" value="{{( isset($artist_name) ? $artist_name : "") }}">
                            </div>
                        </div>

                        <!-- Key Signature -->
                        <div class="col-md-2 media-table-select">
                            <select class="form-control" name="key_signature" id="key_signature">
                                <option value="">Key Signature</option>
                                <?php
                                $letters = range('a', 'z');
                                foreach ($letters as $letter)
                                {
                                    $selected = ( !empty($key_signature) && $key_signature == $letter ) ? 'selected' : "";

                                    echo '<option value="'.$letter.'" '.$selected.'> Key of '. strtoupper($letter) .'</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Neptune rating -->
                        <div class="col-md-2 media-table-select">
                            <select class="form-control" name="naptune_rating" id="naptune_rating">
                                <option value="">Neptune rating</option>
                            </select>
                        </div>

                        <!-- Combined Single -->
                        <div class="col-md-2 media-table-select">
                            <select class="form-control" name="cos" id="cos">
                                <option value="">Single or Combined</option>
                                <option value="combined" <?php echo ( !empty($cos) && $cos == "combined" )? 'selected' : "" ;  ?>>Combined</option>
                                <option value="single" <?php echo ( !empty($cos) && $cos == "single"   )? 'selected' : "" ;  ?>>Single</option>
                            </select>
                        </div>


                    </div>

                </div>
                <!-- second filter row end -->


                {{ Form::close() }}
                <div class="panel panel-primary filterable" id="filterable">
                    <div class="panel-body table-responsive">
                        <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                            <?php if(Session::has('error')){?>
                                <div class="alert alert-info">
                                    <strong>Alert!</strong> {{ Session::get('error')}}.
                                  </div>
                                <?php } ?>
                            @if( count($media) > 0 )
                            <?php
				$play_all_tracks = "";
				$urls_all_track = "";
				$name_all_track ="";
                            ?>
                                <div class="table-top" style="margin-bottom: 40px !important;">
                                    <div class="dataTables_info" id="table1_info" role="status" aria-live="polite">
                                    @if (  empty( app('request')->input('tokenfield') )   )

                                          {{ $media->total() }}

                                    @else
                                    	{{ $total }}

                                    @endif
                                     results

                                    	   <button type="button" class="btn btn-default btn-sm" onClick='window.location.replace("{{ url('/your-music') }}");'>
				            <span class="glyphicon glyphicon-filter"></span>Clear Filter
				           </button>

                                    </div>
                                    <div class="pull-right">
                                        <div class="top-play-btn"><a href="javascript:void(0);" class="play-green1" id='play_all'><span>Play All</span><img style='' src="{{url('assets/img/xa.png')}}"> </a> </div>
                                </div>
                            @else

                                <div class="table-top">
                                    <div class="dataTables_info" id="table1_info" role="status" aria-live="polite">

                                    	   <button type="button" class="btn btn-default btn-sm" onClick='window.location.replace("{{ url('/your-music') }}");'>
				            <span class="glyphicon glyphicon-filter"></span>Clear Filter
				           </button>

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
                                    @foreach ($media as $med)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><img style="width: 80px;height: 80px;" src="{{ \Helpers::audioCoverURL($med->cover_img) }}"></td>
                                        <td>
                                            <div class="wave-text-area">
                                              <img src="{{ \Helpers::avatarURL( $med->image ) }}" style="height: 41px;width: 41px;" class="img-circle img-responsive pull-left">
                                            </div>
                                                    <div class="wave-text-area">
                                                       <h3>{{ $med->track_title }} </h3>
                                                        <p>by
                                                            <a target="_blank" href="{{ url('profile/') }}/{{ $med->id }}">{{$med->first_name." ".$med->last_name}}</a>
                                                        </p>
                                                <span>{{$med->track_percentage}}%  complete</span>
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

                                                    <a class="dropdown-item" href='javascript:;' onclick="get_playlist('{{$med->uploads_id}}')">Add to Playlist</a>
                                                   <!-- <a class="dropdown-item" href="{{url('/media/show/'.$med->uploads_id)}}">View Details</a> -->
                                                      <a class="dropdown-item play-green" href="javascript:;" data-url="{{ url('server/php/files/'. $med->file_name) }}" data-music='{{$med->file_name}}' data-trackid='{{$med->uploads_id}}' data-starttime="1" data-toggle="modal" data-target="#playModal" >View Details</a>
                                                    <a class="dropdown-item" href="{{url('/media/destroy/'.$med->uploads_id)}}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach
                                    <!-- advance player start -->
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
                                    <!-- advance player end -->
                                @else
                                    <td> No Media Found.</td>
                                @endif


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



@if (  empty( app('request')->input('tokenfield') )   )

     {{ $media->links() }}

@else

<?php

$pagLink ="";
echo $pagLink . "<ul class='pagination'>";
for ($i=1; $i<=$total_pages; $i++) {
             $pagLink .= "<li onclick=change_tracks('".$i."')><a href='javascript:void(0)'>".$i."</a></li>";
    };
    echo $pagLink . "</ul>";

?>


@endif

            </div>
        </div>
    </section>
</aside>
    <script>

        $(document).ready(function () {

            $('#search_track').on('change', function(e){
                $(this).closest('form').submit();
            });

            $('#sel1').on('change', function(e){
                $(this).closest('form').submit();
            });
            $('#genre').on('change', function(e){
                $(this).closest('form').submit();
            });
            $('#bpm').on('change', function(e){
                $(this).closest('form').submit();
            });
            $('#tokenfield').on('change', function(e){
                $(this).closest('form').submit();
            });
            $('#key_signature').on('change', function(e){
                $(this).closest('form').submit();
            });

            $('#artist_name').on('change', function(e){
                $(this).closest('form').submit();
            });
            $('#cos').on('change', function(e){
                $(this).closest('form').submit();
            });
            // $('#tokenfield').tokenfield({
            //     showAutocompleteOnFocus: true
            // });

            $('.js-wave').each(function (i, el) {
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
                        $('#'+cuurent_id+' .img4').show();
                        $('#'+cuurent_id+' .img3').hide();
                    }else {
                        $('#'+cuurent_id+' .img3').show();
                        $('#'+cuurent_id+' .img4').hide();
                    }

                    // on finish place play icon.
                    wavesurfer.on('finish', function () {
                        $('#'+cuurent_id+' .img3').show(); // display play icon.
                        $('#'+cuurent_id+' .img4').hide();
                    });


                })
            });
        });

        // load player/
        function loadPlayer(file_name, upload_id )
        {
            var wavesurfer = Object.create(WaveSurfer);
                wavesurfer.init({
                    container: '#wave_'+upload_id,
                    progressColor: 'red',
                    audioRate: 1,
                    barWidth: 3,
                    height: 150,
                    pixelRatio:1

                });
                $("#playerimg_"+upload_id).hide();
                $("#start_"+upload_id).hide();
                $("#play-"+upload_id).show();
                wavesurfer.load(file_name);

                $('#wave_'+upload_id) .siblings('.play').bind('click', function () {
                    var cuurent_id= 'play-'+upload_id;
                    wavesurfer.playPause();
                    if(wavesurfer.isPlaying() == true)
                    {
                        $('#'+cuurent_id+' .img4').show();
                        $('#'+cuurent_id+' .img3').hide();
                    }else {
                        $('#'+cuurent_id+' .img3').show();
                        $('#'+cuurent_id+' .img4').hide();
                    }
                });
                wavesurfer.on('finish', function () {
                    $('#play-'+upload_id+' .img3').show();
                    $('#play-'+upload_id+' .img4').hide();
                });
                wavesurfer.on('ready', function () {
                   wavesurfer.play();
                   $('#play-'+upload_id+' .img4').show();
                    $('#play-'+upload_id+' .img3').hide();
                });
        }
function change_tracks(id)
{
    search_tags = $(".token-label").map(function() {
      return this.innerHTML;
  }).get();

 search_tags = search_tags.join();

 $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                }
            });
                $.ajax({
                    type: "POST",
                    dataType:'html',
                    url: "{{ url('your_music/paginate') }}",
                    data: {'next':id,'tags':search_tags},
                    cache: false,
                    success: function(data)
                    {
                        // alert('aa');
                         $("#filterable").html(data);
                    }
            });
}

    </script>

    <style type="text/css">
        .wave-graph a {
            position: absolute;
            left: 0;
            right: 0;
            text-align: center;
            width: 0%;
            height: 55px;
            top: 30px;
            z-index: 99999;
            margin:0px auto;
        }
    </style>

<script src="{{ url('assets/js/bootstrap-tokenfield.min.js') }}"></script>
<script src="{{ url('assets/js/bootstrap-tokenfield.js') }}"></script>

<script>


	$('#tokenfield').on('change', function (e) {
		$(this).closest('form').submit();
	});

	$('#tokenfield').tokenfield({
		showAutocompleteOnFocus: true
	});


</script>


<!-- Modal -->
@include('admin.inc.inc')
<!-- End Modal -->


@endsection