@extends('layouts.user')
@section('title', 'Subshare')
@section('content')
<style type="text/css">
   @include('user.subshare.css.grid_custom_css')
</style>
<aside class="right-side">
    <ol class="breadcrumb">
        <li><a href="{{ url('/user-dashboard') }}">Dashboard</a>
        </li>
        <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="{{ url('/subshares') }}">Subshare</a>
        </li>
    </ol>

    <section class="content">
        <div class="row">

            <div class="col-lg-12 top-right-content">{{ Form::open(array('url' => '/subshares/search', 'method' => 'POST')) }}
                <div class="form-group">
                    <div class="row">
                        <?php if(Session::has('flashSuccessMessages')){?>
                                <div class="alert alert-success">
                                    <strong>Success!</strong> {{ Session::get('flashSuccessMessages')}}.
                                  </div>
                                <?php } ?>

                        <div class="col-md-10">

                            <div class="table-search">
                                <input name="search" placeholder="Search by track title" type="search" value="{{( isset($search) ? $search : " ") }}">
                                <input class="fa" value="" type="submit">
                            </div>
                        </div>
                        <div class="col-md-2 table-select">
                            <select class="form-control" id="bpm" name="status">
                                <option value="">Order By</option>
                                <option value="Pending" <?php echo ($status)=='Pending' ? 'selected' : "" ; ?>>Pending</option>
                                <option value="Pause" <?php echo ($status)=='Pause' ? 'selected' : "" ; ?>>Pause</option>
                                <option value="Censor" <?php echo ($status)=='Censor' ? 'selected' : "" ; ?>>Censor</option>
                                <option value="Completed" <?php echo ($status)=='Completed' ? 'selected' : "" ; ?>>Completed</option>
                                <option value="Canceled" <?php echo ($status)=='Canceled' ? 'selected' : "" ; ?>>Canceled</option>
                                <option value="Suspended" <?php echo ($status)=='Suspended' ? 'selected' : "" ; ?>>Suspended</option>
                            </select>
                        </div>
                    </div>
                </div>{{ Form::close() }}
                <div class="res-subshare subshare-table-area">
                    <div class="subshare-stats-area">
                        <div class="row tab-heading-table">
                            <div class="inner-table-tab-heading">
                                @if( count($subshares) > 0 )

                                    <div class="col-md-9">
                                        <h3>subshares ( {{ count($subshares) }} )</h3>
                                    </div>

                                    <div class="col-md-3">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#home" aria-expanded="true">All</a>
                                            </li>
                                        </ul>
                                    </div>

                                 @endif
                            </div>
                        </div>
                        <!-- top tabs ends -->
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade active in">
                                <div class="panel panel-primary ">
                                    <div class="panel-body table-responsive">
                                        <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                                            @if( count($subshares) > 0 )

                                            <table class="table table-striped table-bordered dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 188px;">User <i class="" aria-hidden="true"></i>
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 370px;">Track Title <i class="" aria-hidden="true"></i>
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 168px;">Status <i class="" aria-hidden="true"></i>
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 121px;">Date <i class="" aria-hidden="true"></i>
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 255px;">Action <i class="" aria-hidden="true"></i>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @foreach($subshares as $subshare)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">
                                                                <div class="subtable-area-one">
                                                                    @if($subshare->image)
                                                                        <img class="img-circle img-responsive pull-left" style="width: 50px;height: 50px;" class="avatar-image avatar-image-p" src="{{url('assets/avatars/'.$subshare->image)}}">
                                                                        <h3>{{ str_limit($subshare->first_name." ".$subshare->last_name,20)}}</h3>
                                                                    @else
                                                                        <img class="img-circle img-responsive pull-left" style="width: 50px;height: 50px;" class="avatar-image avatar-image-p" src="{{url('assets/avatars/default-avatar.png')}}">
                                                                        <h3>{{ str_limit($subshare->first_name." ".$subshare->last_name,20)}}</h3>
                                                                    @endif</div>
                                                            </td>
                                                            <td>
                                                                <!-- track title -->
                                                                <p>{{ \Helpers::getTrackName( $subshare->track_id ) }}</p>
                                                            </td>
                                                            <td>
                                                                <!-- status -->
                                                                <p>{{ $subshare->status }}</p>
                                                            </td>
                                                            <td>
                                                                <!-- created_at date -->
                                                                <p>{{ \Carbon\Carbon::parse($subshare->created_at)->format('d.M.Y') }}</p>
                                                            </td>
                                                            <td>

                                                             <div class="last-table-area">
                                                                 <?php $subshare_userid = DB::table('subshare')->select('user_id')->where('id',$subshare->subshare_id)->first();?>
                                                                 <?php if(strtolower($subshare->status)=="active"){?><a href="{{ url('subshare-process/') .'/'. $subshare->subshare_id }}" id="last-table-area" style="color:#40b3e5;">View Details</a><?php }else if($subshare_userid->user_id == Auth::user()->id){ ?> <a href="{{url('/offer/edit').'/'.$subshare->subshare_id}}" id="last-table-area" title="Change Offer" style="color:#40b3e5;">Edit Details</a> <?php }else{ ?> <a href="javascript:;" id="last-table-area" title="Please Accept the offer to view details" style="cursor: default;">View Details</a>  <?php }?>
                                                                <!--<button type="button" class="btn btn-info btn-lg load_music" data-url="{{ url('server/php/files/'. $subshare->file_name) }}" data-music='{{$subshare->file_name}}' data-trackid='{{$subshare->track_id}}' data-image="{{ isset($subshare->image) ?  $subshare->image : 'default-avatar.png'}}"  data-date="{{ dateHumans($subshare->created_at)}}" data-trackid="{{$subshare->uploadID}}" data-music="{{$subshare->file_name}}" data-user="{{$subshare->first_name." ".$subshare->last_name}}" data-title="{{$subshare->custom_agreement}}" data-desc="{{$subshare->custom_agreement}}" data-toggle="modal" data-target="#myModal"><span><img src="{{url('/resources/assets/img/play-all.png')}}"></span></button>
                                                            -->
                                                                 <input type="hidden" id="user_imageold_{{$subshare->subshare_id}}" value="{{\Helpers::avatarURL($subshare->image)}}">
                                                                <input type="hidden" id="user_nameold_{{$subshare->subshare_id}}" value="{{$subshare->first_name}} {{$subshare->last_name}}">
                                                                <input type="hidden" id="track_titleold_{{$subshare->subshare_id}}" value="{{$subshare->track_title}}">
                                                                <input type="hidden" id="track_insold_{{$subshare->subshare_id}}" value="{{$subshare->custom_agreement}}">
                                                                <input type="hidden" id="track_perold_{{$subshare->subshare_id}}" value="{{$subshare->percentage}}">
                                                                <input type="hidden" id="track_statusold_{{$subshare->subshare_id}}" value="{{$subshare->status}}">

                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="open_track('{{$subshare->file_name}}','{{$subshare->subshare_id}}','{{$subshare->subshare_id}}','{{$subshare->usersub}}' )"><span><img src="{{ url('assets/img/play-all.png')}}"></span></button>
                                                             </div>

                                                            </td>
                                                        </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>


                                            @else
                                                <p>No Record Found</p>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{$subshares->links()}}

            </div>
        </div>
    </section>
</aside>

<!--  Model for Track -->

<div class="modal fade in" id="myModal" role="modal-dialog" data-keyboard="false" data-backdrop="static" style="">
    <div class="modal-dialog" style="width: 740px !important;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="closewave()" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i>
                </button>
                <h4 class="modal-title">Subshare Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                   <div class="inner-feed-area">
                        <ul>
                            <li id="userimg" style="position: relative;top: -40px;left: 25px;"></li>

                            <li class="feed-details" style="width: 85%;padding: 25px; position: relative; top: -45px;"><h2 id="nametext"></h2>

                                <p id="track_ins"></p>

                            </li>

                            <li id="created_date" style="float: right; padding-right: 50px;"><p></p></li>
                        </ul>
                    </div>
                    <div class="col-md-12" id="load_track_here" style="margin-bottom: 20px;">

                    </div>
                </div>
            </div>
            <div class="modal-footer" id="acc_rej_btn">
                <button type="button" class="btn btn-default my_btn" data-dismiss="modal">Accept the Offer</button>
                <button type="button" class="btn btn-default my_btn" data-dismiss="modal">Discuss Offer</button>
            </div>
        </div>
    </div>
</div>


<script>

       var wavesurferr='';
    function open_track(song_name,id,sub_id,track_id){
      $("#loadd").show();
      $("#userimg").html('<img src="'+$("#user_imageold_"+id).val()+'" style="width: 50px;height: 50px;border-radius: 50%;">');
      $("#nametext").html($("#user_nameold_"+id).val());
      $("#nametext").html($("#user_nameold_"+id).val() + "has Uploaded track "+$("#track_titleold_"+id).val() + " for " + $("#track_perold_"+id).val()+"");
      $("#track_ins").html($("#track_insold_"+id).val());

      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        $.ajax({
            type: "POST",
            dataType:'html',
            url: "{{ url('/subshare_load_track') }}",
            data: {'subshare_id':id,'song_name':song_name},
            success: function(data)
            {
               $("#load_track_here").html(data);
                $("#loadd").hide();
            }
        });

      if($("#track_statusold_"+id).val() != 'active' && track_id != {{Auth::user()->id}} ){
         $("#acc_rej_btn").html('<button type="button" class="btn btn-default my_btn" onclick="accept_offer('+sub_id+')">Accept the Offer</button><button type="button" class="btn btn-default my_btn" data-dismiss="modal" onclick="location.href=\'{{url("/messages")}}\'">Discuss Offer</button>');
      }else{
          $("#acc_rej_btn").html("");
      }
    }


    function customplayPause1()
        {
            var cuurent_id= $(this).attr('id');
            wavesurferr.playPause();

            if(wavesurferr.isPlaying() == true)
            {
                $('.img4').show();
                $('.img3').hide();
            }else {

                $('.img3').show();
                $('.img4').hide();
            }

            // On finish place play icon.
            wavesurferr.on('finish', function () {
                $('.img3').show(); // display play icon.
                $('.img4').hide();
            });
        }

 function accept_offer(id){
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        $.ajax({
            type: "POST",
            dataType:'html',
            url: "{{ url('/subshare_active') }}",
            data: {'subshare_id':id},
            success: function(data)
            {
               window.location.reload();
            }
        });
    }

        //});
</script>
@endsection