@extends('layouts.admin')
@section('title', 'Subshares')

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



<aside class="right-side">
<ol class="breadcrumb">
    <li><a href="{{ url('/admin') }}">Dashboard</a></li>
    <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#">Subshare</a></li>
</ol>

@include('layouts.inc.messages')
<section class="content">
<div class="row">
    <div class="col-lg-12 top-right-content">
        {{ Form::open(array('url' => '/admin/subshare/search', 'method' => 'POST')) }}
            <div class="form-group">
                <div class="row">
                    <div class="col-md-10">
                        <div class="table-search">

                            <input name="search" placeholder="Search" type="search" value="{{( isset($search) ? $search : "") }}">
                            <input class="fa" value="" type="submit">

                        </div>
                    </div>
                    <div class="col-md-2 table-select">
                        <select class="form-control" id="bpm" name="status">
                            <option value="" >Order By</option>
                            <option value="Pending" <?php echo ($status) =='Pending' ? 'selected' : "" ;  ?>>Pending</option>
                            <option value="Pause" <?php echo ($status) =='Pause' ? 'selected' : "" ;  ?>>Pause</option>
                            <option value="Censor" <?php echo ($status) =='Censor' ? 'selected' : "" ;  ?>>Censor</option>
                            <option value="Completed" <?php echo ($status) =='Completed' ? 'selected' : "" ;  ?>>Completed</option>
                            <option value="Canceled" <?php echo ($status) =='Canceled' ? 'selected' : "" ;  ?>>Canceled</option>
                            <option value="Suspended" <?php echo ($status) =='Suspended' ? 'selected' : "" ;  ?>>Suspended</option>
                        </select>
                    </div>
                </div>
            </div>
        {{ Form::close() }}

        <div class="res-subshare subshare-table-area">
        <div class="subshare-stats-area">
        <div class="row tab-heading-table">
        <div class="inner-table-tab-heading">
            <div class="col-md-9">
                <h3>Media ({{count($subshares)}})</h3>
            </div>
            <div class="col-md-3">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home" aria-expanded="true">All</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- top tabs ends -->

    <div class="tab-content">
        <div id="home" class="tab-pane fade active in">
            <div class="panel panel-primary ">
                <div class="panel-body table-responsive">
                    <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <table class="table table-striped table-bordered dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 188px;">User</th>
                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 370px;">Track Title</th>
                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 168px;">Status</th>
                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 121px;">Date</th>
                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 255px;">Action</th>
                            </tr>
                            </thead>

                            <tbody>                            
                            @if($subshares)
                                @foreach($subshares as $subshare)
                            <tr role="row" class="odd">
                                <td class="sorting_1">

                                <div class="subtable-area-one">
                                    @if($subshare->image)
                                    <img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/'.$subshare->image)}}"><h3>{{ str_limit($subshare->first_name." ".$subshare->last_name,25)}}</h3>
                                        @else
                                        <img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/default-avatar.png')}}"><h3>{{ str_limit($subshare->first_name." ".$subshare->last_name,25 )}}</h3>
                                    @endif
                                </div>
                                </td>
                                <td>
                                    <p>{{$subshare->track_title}}</p>
                                </td>
                                <td>
                                    <p>{{$subshare->subshare_status}}</p>
                                </td>
                                <td>
                                    <p>{{ \Carbon\Carbon::parse($subshare->created_at)->format('d.M.Y') }} </p>
                                </td>
                                <td>
                                    <div class="dropdown wave-btn">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="{{url('assets/admin/img/three-dots.png')}}">
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            
                                            <a class="dropdown-item" href="{{url('admin/subshare/show/'.$subshare->uploadID )}}">View Details</a>
                                            
                                            @if($subshare->subshare_status == 'Completed' || $subshare->subshare_status == 'Pending' || $subshare->subshare_status=='Active')
	                                            <a class="dropdown-item" href="{{url('admin/subshare/pause/'.$subshare->subshare_id)}}">Pause</a>
	                                            <a class="dropdown-item" href="{{url('admin/subshare/Censor/'.$subshare->subshare_id)}}">Censor</a>
                                            @elseif($subshare->subshare_status == 'Canceled' || $subshare->subshare_status == 'Pause' || $subshare->subshare_status == 'Censor' )
                                                    <a class="dropdown-item" href="{{url('admin/subshare/active/'.$subshare->subshare_id)}}">Active</a>
                                            @endif
                                            
                                            <a class="dropdown-item" href="{{ url('/admin/subshare/destroy/'.$subshare->subshare_id) }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                        </div>
                                    </div>
                                    <div class="last-table-area">
                                        <button type="button" class="btn btn-info btn-lg load_music" data-url="{{ url('server/php/files/'. $subshare->file_name) }}" data-music='{{$subshare->file_name}}' data-trackid='{{$subshare->track_id}}' data-image="{{ isset($subshare->image) ?  $subshare->image : 'default-avatar.png'}}"  data-date="{{ dateHumans($subshare->created_at)}}" data-trackid="{{$subshare->uploadID}}" data-music="{{$subshare->file_name}}" data-user="{{$subshare->first_name." ".$subshare->last_name}}" data-title="{{$subshare->custom_agreement}}" data-desc="{{$subshare->custom_agreement}}" data-toggle="modal" data-target="#myModal"><span><img src="{{url('/resources/assets/img/play-all.png')}}"></span></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                                @else
                            <p>No Record Found</p>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <div class="panel panel-primary ">
                <div class="panel-body table-responsive">
                    <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                        <table class="table table-striped table-bordered dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 188px;">User <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 370px;">Track Title <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 168px;">Status <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 121px;">Date <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 255px;">Action <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                            </tr>
                            </thead>

                            <tbody>
                            <tr role="row" class="odd">
                                <td class="sorting_1">
                                    <div class="subtable-area-one">
                                        <img src="img/Face2.png"><h3>Alice Smith</h3>
                                    </div>
                                </td>
                                <td>
                                    <p>Blues on Honey</p>
                                </td>
                                <td>
                                    <p>Completed</p>
                                </td>
                                <td>
                                    <p>05.05.17</p>
                                </td>
                                <td>
                                    <div class="last-table-area">
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="img/play-all.png"></span></button>
                                    </div>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td class="sorting_1">
                                    <div class="subtable-area-one">
                                        <img src="img/Face2.png"><h3>Alice Smith</h3>
                                    </div>
                                </td>
                                <td>
                                    <p>Blues on Honey</p>
                                </td>
                                <td>
                                    <p>Completed</p>
                                </td>
                                <td>
                                    <p>05.05.17</p>
                                </td>
                                <td>
                                    <div class="last-table-area">
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="img/play-all.png"></span></button>
                                    </div>
                                </td>
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="panel panel-primary ">
                            <div class="panel-body table-responsive">
                                <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                    <table class="table table-striped table-bordered dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 188px;">User <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 370px;">Track Title <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 168px;">Status <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 121px;">Date <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 255px;">Action <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">
                                                <div class="subtable-area-one">
                                                    <img src="img/Face2.png"><h3>Alice Smith</h3>
                                                </div>
                                            </td>
                                            <td>
                                                <p>Blues on Honey</p>
                                            </td>
                                            <td>
                                                <p>Completed</p>
                                            </td>
                                            <td>
                                                <p>05.05.17</p>
                                            </td>
                                            <td>
                                                <div class="last-table-area">
                                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="img/play-all.png"></span></button>
                                                </div>
                                            </td>
                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($subshares)
        {{$subshares->links()}}
        @endif
    </div>
</div>
</section>
</aside>

<!-- Modal -->
<div class="modal fade in" id="myModal" role="dialog" data-keyboard="false" data-backdrop="static" style='margin-top: 67px;'>
<div class="modal-dialog" style='width: 740px !important;'>

<!-- Modal content-->
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
        <h4 class="modal-title">Subshare Details</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-1" id="userImage">
                <img src="{{url('/resources/assets/img/face2.png')}}">
            </div>
            <div class="col-md-9">
                <h4 id="subshare_title"></h4>
                <p id="desc"></p>
            </div>
            <div class="col-md-2">
                <span id="datee"> </span>
            </div>
            <div class="col-md-12">
                <div class="wave-graph">
                   <div class="adv-player-bottom-area"></div>
                   <div class="waveform"></div>
                </div>

                <div class="advance-btn">
                    <p class="total-time">-4:08</p>
                </div>
                <div class='wave-graph'>
                    <button style="height: 100px;width: 100px;border: 0px white;border-radius: 103px;" class="play_audio custome_button"  onclick="customplayPause()" >
                        <img class="img1" src="{{ url('assets/img/big-player.png') }}" style="height: 100px;width: 100px;margin-left: -11px;margin-top: -3px; border: 0px none white;border-radius: 74px;"> 
                        <img class="img2" src="{{ url('assets/img/big-player-pause.png') }}" style=" display:none; height: 100px;width: 100px;margin-left: -11px;margin-top: -3px; border: 0px none white;border-radius: 74px; ">
                    </button>
                </div>
                
            </div>
        </div>

    </div>
</div>

</div>
</div>
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
                                maxCanvasWidth: 10
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

            wavesurfer.enableDragSelection({
                drag: false,
                slop: 5
            });

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


        $('.load_music').on('click', function(e){
            $('#userImage').html('');
            var user = $(this).data('user');
            var desc = $(this).data('desc');
            var title = $(this).data('title');
            var music = $(this).data('music');
            var trackid = $(this).data('trackid');
            var date = $(this).data('date');
            var image = $(this).data('image');
            var imagehtml = "<img style='height:40px; width:40px;' src='{{url('/assets/avatars/')}}/"+image+"'>";
            
            var url = $(this).data('url');
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
                url: '{{ url("/admin/getags")}}',
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
        });

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
