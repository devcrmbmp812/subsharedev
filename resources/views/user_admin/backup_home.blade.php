@extends('layouts.user_admin')
@section('content')
<style>
.create-post {
  width: 260px !important;
}
/*--------top head start--------*/

.h-1{
	color: white;
	font-size: 44px;
}
.right{
	float:right;
	width:430px;
	height:auto;
	margin: 10px 0px;
	font-size:13px;
}
.right ul{
	list-style:none;
}

.right ul li{
	margin:5px 5px;
}
.right ul li input{
	padding: 4px;
}
.right-email{
	float:left;
}

.right-pass{
	float:left;
}
/*.btn{
	margin: 25px 1px;
	padding:0px;
	border:none;
	background:#8fc400;
	color:white;
	border: 1px solid rgb(40, 77, 39);
	padding: 2px 3px;
}*/

.right-btn{
	line-height: 6;}

	.white{
		color:white;
	}

	/*--------header Start--------*/
	.center{
		margin:0px auto;
	}

	.posts{
		height:auto;
	}

	.create-posts{
		background: #FFF none repeat scroll 0% 0%;
		border-radius: 2px;
		border: 1px solid #E1E0E0;
		margin-bottom:10px;
	}

	.c-header{
		width:100%;
		height:auto;
		padding-top:5px;
	}

	.c-h-inner{
		width:95%;
		height:25px;
		margin:0px 15px;
		border-bottom:1px solid #E5E5E5;
		font-size:12px;
		font-weight:bold;
	}

	.c-h-inner ul{
		list-style:none;
		margin-top:2px;
	}

	.c-h-inner ul li{
		display:inline;
		border-right: 1px solid #E9E3E3;
		padding-right:10px;
	}
	.c-h-inner  ul li a{
		color: rgb(59, 89, 152);
		text-decoration: none;
	}
	.c-h-inner ul li a:hover{
		text-decoration:underline;
	}

	.c-h-inner ul li img{
		margin: -2px 3px;
	}
	.c-body{
		width:100%;
		height:auto;
		border-bottom:1px solid #E5E5E5;
		overflow: auto;
	}
	#body-bottom{
		border-top: 1px solid #8fc400;
		margin: 10px;
		display: none;
	}
	#body-bottom img{
		margin: 10px;
		height: 95px;
		width: 95px;
	}
	.iconw-margin{
		margin: -2px 4px;
	}
	.iconp-margin{
		margin: -3px 1px;
	}
	.body-left{
		width:62px;
		height:auto;
		float:left;
		margin-left:15px;
	}


	.img-box {
		width:50px;
		height:50px;
		margin: 10px 0px;
		border: 1px solid #F5F1F1;
	}

	.img-box img{
		width:100%;
		height:100%;
	}

	.body-right{
		width:
	}

	.text-type{
		width: 400px;
		height: auto;
		resize: none;
		margin: 23px 0px;
		font-size: 14px;
		color: #959698;
		border:none;
		overflow:hidden;
	}

	.c-footer{
		overflow:auto;
		margin-top: 20px;
	}
	.right-box{
		float:right;
	}

	.right-box ul {
		list-style:none;

	}

	.right-box ul li{
		display:inline;
	}
	.btn1{
		width: 88px;
		border:1px solid #ccc ;
		background: white none repeat scroll 0% 0%;
		font-weight: bolder;
		color: rgb(87, 87, 87);
		border-radius: 2px;
		margin: 10px 0px;
		height: 25px;
		font-size:12px;
	}

	/*.btn1:active{
		bordeR:1px solid rgb(71, 100, 159);
	}*/


	.btn2{
		background: rgb(71, 100, 159) none repeat scroll 0% 0%;
		color: white;
		font-weight: bolder;
		font-size: 12px;
		margin: 0px 7px;
		width: 65px;
		height: 25px;
		border: 1px solid rgb(204, 204, 204);
		border-radius: 4px;
	}

	.btn2:active{
		border:2px solid rgba(71, 100, 159, 0.55);
	}

	.btn2:hoveR{
		cursor:pointer;
	}

/*	.btn1:hoveR{
		cursor:pointer;
	}*/

	.post-show{
		width: 260px;
		background: #FFF none repeat scroll 0% 0%;
		border-radius: 2px;
		border: 1px solid #E1E0E0;
	}

	.post-show-inner{
		width:95%;
		margin:10px auto;
	}

	.post-header{
		width:100%;
		height:60px;
	}
	.post-header  a:hover{
		text-decoration:underline;
	}
	.post-header-text{
		margin:8px 0px;
	}

	.post-img{
		width:100%;
		height:auto;
		max-height:400px;
	}

	.post-img img{
		max-width:470px;
		max-height:394px;
	}

	.post-img-footer{
		border: 1px solid #CCC;
		margin: -5px 0px 10px auto;
	}

	.post-footer-text{
		padding:10px;
	}
	.post-footer-text h3{
		color: rgb(20, 24, 76);
		font-weight: normal;
		font-size: 18px;
	}
	.post-footer-text p{
		font-size: 13px;
		color: #333;
	}

	.post-footer-text small{
		color: rgb(204, 204, 204);
		font-family: sans-serif;
		font-size: 11px;
	}

	.post-footer-text ul{ list-style:none;}

	.post-footer-text ul li{

	}

	.post-left-box{
		width:80%;
		height:auto;
	}

	.post-left-box ul{list-style:none;}

	.post-left-box ul li{
		display:block;

	}

	.post-left-box ul li a{
		text-decoration: none;
		font-size: 15px;
		font-weight: bold;
		color: #3F66B7;
	}

	.post-left-box ul li small{
		font-size: 12px;
		color: #D2D1D1;
	}


	.id-img-box{
		width:50px;
		height:50px;
		float:left;
	}

	.id-img-box img{
		width:100%;
		height:100%;
	}

	.id-name{
		/*padding: 8px 55px;*/
	}


	.post-footer{
		width:100%;
		height:20px;
		margin-top:5px;
	}

	.post-footer ul {list-style:none}

	.post-footer ul li{display:inline; margin:0px 4px;}

	.post-footer a{text-decoration:none; font-size:13px; color:#3F66B7;}
	.post-footer a:hover{text-decoration:underline;}
</style>

<aside class="right-side">

  <ol class="breadcrumb">
    <li><a href="{{ url('admin/') }}">Dashboard</a></li>
  </ol>

  <section class="home-content content">
    <div class="row">
      <div class="col-md-6">
        <div class="sub-feed-area">
          <div class="row tab-heading">
            <div class="col-md-4">
              <h3>Subshares</h3>
            </div>
            <div class="col-md-8">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#feed">All</a></li>
                <li><a data-toggle="tab" href="#offers">{{count($subshares)}} Offers</a></li>
                <li><a data-toggle="tab" href="#responses">{{count($subshare_responses)}} Responses</a></li>
                <li><a data-toggle="tab" href="#uploads">{{count($uploads)}} Uploads</a></li>
              </ul>

            </div>
          </div>
          <!-- top tabs ends -->
          <div class="tab-content">

            <div id="feed" class="tab-pane fade in active">

             @if($allSubshare)

               @foreach($allSubshare as $allSubshare )

                 <div class="inner-feed-area">
                  <ul>
                    <li>
                      <a href="{{ url('profile') }}/{{ $allSubshare->id }}">
                        @if($allSubshare->image)
                          <img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/'.$allSubshare->image)}}">
                            @else
                          <img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/default-avatar.png')}}">
                        @endif
                      </a>
                    </li>
                    <li class="feed-details"><h2>{{$allSubshare->custom_agreement}}</h2>
                      <p>{{$allSubshare->custom_agreement}}</p>
                    </li>
                    <li><p style="font-size: 11px">{{ \Helpers::get_time_ago( strtotime($allSubshare->created_at) ) }}</p></li>
                    <li><button type="button" class="btn btn-info btn-lg small-green" data-toggle="modal" data-target="#myModal1">read</button></li>

                  </ul>
                </div>

              @endforeach

            @endif


            @if($allUpload)

            @foreach($allUpload as $allUploads)

            <div class="inner-feed-area">
              <ul>
                <li>
                  <a href="{{ url('profile') }}/{{ $allUploads->id }}">
                    @if($allUploads->image)
                    <img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/'.$allUploads->image)}}">
                    @else
                    <img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/default-avatar.png')}}">
                    @endif
                  </a>
                </li>
                <li class="feed-details"><h2><a href="{{ url('profile') }}/{{ $allUploads->id }}">{{$allUploads->first_name."".$allUploads->last_name}}</a> uploaded {{ $allUploads->track_title }}</h2>
                </li>
                <li><p style="font-size: 11px">{{ \Helpers::get_time_ago( strtotime($allUploads->created_at) )  }}</p></li>
                <li><button type="button" style='width: 70px;' class="btn btn-info btn-lg small-green play-green playbutton" data-url="{{ url('server/php/files/'. $allUploads->file_name) }}" data-music='{{$allUploads->file_name}}' data-trackid='{{$allUploads->trackid}}' data-starttime="1" data-toggle="modal" data-target="#playModal"><img src="{{ url('resources/assets/img/small-play.png') }}"></button> </li>
              </ul>
            </div>

            @endforeach
            @endif
          </div>

          <!-- offers tab content -->
          <div id="offers" class="tab-pane fade">
            @if($subshares != null)

            @foreach($subshares as $subshare)

            <div class="inner-feed-area">
              <ul>

                <li>
                  <a href="{{ url('profile') }}/{{ $subshare->id }}">
                    @if($subshare->image)
                    <img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/'.$subshare->image)}}">
                    @else
                    <img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/default-avatar.png')}}">
                    @endif
                  </li>
                </a>
                <li class="feed-details">
                  <h2>{{$subshare->custom_agreement}}</h2>
                  <p>{{$subshare->custom_agreement}}</p>
                </li>

                <li><p style="font-size: 11px">{{ \Helpers::get_time_ago( strtotime($subshare->created_at) )  }} </p></li>
                <li><button type="button" class="btn btn-info btn-lg small-green" data-toggle="modal" data-target="#myModal1">read</button></li>


              </ul>
            </div>

            @endforeach

            @endif
          </div>
          <!-- #offers -->


          <!-- responses tab content -->
          <div id="responses" class="tab-pane fade">

            @if($subshare_responses)

            @foreach($subshare_responses as $response)
            <div class="inner-feed-area">
              <ul>
                <li>
                  <a href="{{ url('profile') }}/{{ $response->user_id }}">
                    @if($response->image)
                    <img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/'.$response->image)}}">
                    @else
                    <img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/default-avatar.png')}}">
                    @endif
                  </a>
                </li>
                <li class="feed-details"><h2>{{$response->custom_agreement}}</h2>
                  <p>{{$response->custom_agreement}}</p>
                </li>
                <li> <p style="font-size: 11px">{{       \Helpers::get_time_ago( strtotime($response->response_date) )  }} </p></li>
              </ul>
            </div>
            @endforeach

            @else

            <div class="inner-feed-area">
              <ul>
                <li><img src="{{ url('resources/assets/img/small-alice.png') }}"></li>
                <li class="feed-details"><h2>There is no latest responses on subshare</h2>
                </li>
              </ul>

            </div>
            @endif

          </div>
          <!--# responses tab content -->


          <!-- uploads tab content -->
          <div id="uploads" class="tab-pane fade">
            @if($uploads)

            @foreach($uploads as $upload)

            <div class="inner-feed-area">
              <ul>
                <li>
                  <a href="{{ url('profile') }}/{{ $upload->id }}">
                    @if($upload->image)
                    <img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/'. $upload->image)}}">
                    @else
                    <img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/default-avatar.png')}}">
                    @endif
                  </a>
                </li>
                <li class="feed-details"><h2> <a href="{{ url('profile') }}/{{ $upload->id }}">{{ $upload->first_name." ".$upload->last_name }}</a> uploaded {{ $upload->track_title }}</h2>
                </li>
                <li><p style="font-size: 10px">{{  \Helpers::get_time_ago( strtotime($upload->created_at) ) }}</p></li>
                <li><button type="button" class="btn btn-info btn-lg small-green play-green playbutton" data-url="{{ url('server/php/files/'. $upload->file_name) }}" data-music='{{$upload->file_name}}' data-trackid='{{$upload->trackid}}' data-toggle="modal" data-target="#playModal"><img src="{{ url('resources/assets/img/small-play.png') }}"></button> </li>
              </ul>
            </div>

            @endforeach

            @endif
          </div>

          <!-- @uploads tab content -->
        </div>

      </div>
      <div class="sales-area">
        <div class="stats-area">
          <div class="row tab-heading">
            <div class="col-md-6">
              <h3>Stats</h3>
            </div>
            <div class="col-md-6">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#today">Today</a></li>
                <li><a data-toggle="tab" href="#week">Week</a></li>
                <li><a data-toggle="tab" href="#month">Month</a></li>
              </ul>
            </div>
          </div>
          <!-- top tabs ends -->

          <div class="tab-content">
            <div id="today" class="tab-pane fade in active">
              <div class="row">
                <div class="col-md-6">
                  <h3>Sales Grow</h3>
                  <div class="circular-pro">
                    <div class="progress blue">
                      <span class="progress-left">
                        <span class="progress-bar"></span>
                      </span>
                      <span class="progress-right">
                        <span class="progress-bar"></span>
                      </span>
                      <div class="progress-value">75%</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <img src="{{ url('resources/assets/img/Line%20chart.png') }}" class="img-responsive">
                </div>
              </div>
            </div>
            <div id="week" class="tab-pane fade">
              <div class="row">
                <div class="col-md-6">
                  <h3>Sales Grow</h3>
                  <div class="circular-pro">
                    <div class="progress blue">
                      <span class="progress-left">
                        <span class="progress-bar"></span>
                      </span>
                      <span class="progress-right">
                        <span class="progress-bar"></span>
                      </span>
                      <div class="progress-value">75%</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <img src="img/Line%20chart.png" class="img-responsive">
                </div>
              </div>
            </div>
            <div id="month" class="tab-pane fade">
              <div class="row">
                <div class="col-md-6">
                  <h3>Sales Grow</h3>
                  <div class="circular-pro">
                    <div class="progress blue">
                      <span class="progress-left">
                        <span class="progress-bar"></span>
                      </span>
                      <span class="progress-right">
                        <span class="progress-bar"></span>
                      </span>
                      <div class="progress-value">75%</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <img src="img/Line%20chart.png" class="img-responsive">
                </div>
              </div>
            </div>
          </div>
        </div>
        <section class="content">
          <div class="portlet box primary">
            <div class="portlet-body">
              <div class="panel-body table-responsive">
                <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                  <div class="table-scrollable">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Member</th>
                          <th>Earnings</th>
                          <th>Cases</th>
                          <th>Closed</th>
                          <th>Rate</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><img src="{{ url('resources/assets/img/joe.png') }}"><span>Joe Miller</span> </td>
                          <td>$345</td>
                          <td>45</td>
                          <td>224</td>
                          <td>80%</td>
                        </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
    <!-- col-md-6-end -->
    <div class="col-md-3 center-area">

      <div class="white-small-tabs" style="background: none; margin-top: 0">

        <!-- display post -->
        <?php
        // Fetching posts from database.
        $post  = \Helpers::posts( Auth::user()->id );
        ?>
        @foreach($post as $row)

            <?php $time_ago = ( !empty($row->status_time) ) ? $row->status_time : ''; ?>

            <div class="post-show">
                <div class="post-show-inner">
                    <div class="post-header">
                        <div class="post-left-box">
                            <div class="id-img-box"><img src="{{  \Helpers::avatarURLret( Auth::user()->image ) }}" /></div>
                            <div class="id-name">
                                <ul>
                                    <li><a href="#">{{  Auth::user()->first_name }}</a></li>
                                    <li><small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($time_ago))->diffForHumans() }}</small></li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-right-box"></div>
                    </div>

                    <div class="post-body">
                        <div class="post-header-text">{{ $row->status }} </div>

                            @if ( ($row->status_image != 'NULL') )
                               <div class="post-img"><img style="width:150px;height:150px" src="{{\Helpers::statusURL($row->status_image)}} " /></div>
                            @endif
                    </div>
                </div>
            </div><br>
          @endforeach

      </div>
      <br>
      <?php
      // Get LoggedIn user id.
      $user_id = Auth::user()->id;
      ?>
      <!-- #facbook like post -->
      <div class="white-small-tabs" style="margin-top: 0">
        <div class="wrapper">
          <!--content -->
          <div class="content">
            <!--left-content-->
            <div class="center">
              <div class="posts">
               <div class="create-posts">

                <?php echo Form::open(array('url' => 'saveUserPost', 'method' => 'post',"enctype" => "multipart/form-data") ) ?>

                        <div class="c-header">
                             <div class="c-h-inner">
                              <ul>
                               <li style="border-right:none;"><img src="{{ url('assets/icons/icon3.png') }}" /><a href="javascript:void(0);">Update Status</a></li>
                               <li>
                                <input type="file" onchange="readURL(this);" style="display:none;" name="post_image" id="uploadFile">
                                <img src="{{ url('assets/icons/icon1.png') }}" /><a href="#" id="uploadTrigger" name="post_image">Add</a>
                               </li>
                             </ul>
                           </div>
                       </div>
                       <div class="c-body">
                           <div class="body-right" style="overflow: hidden;">
                            <textarea class="text-type" name="status" placeholder="What's on your mind?"></textarea>
                          </div>
                          <div id="body-bottom">
                            <img src="#"  id="preview"/>
                          </div>
                      </div>
                      <div class="c-footer">
                           <div class="right-box">
                                <ul>
                                 <li>
                                  <select style="width: 70px;" name="visibility">
                                   <option value="public" selected>Public</option>
                                   <option value="private">Private</option>
                                 </select>
                                 <input type="submit" name="submit" id="submit" value="Post" class="btn2"/>
                               </li>
                             </ul>
                           </div>
                      </div>
        </form>

     </div>
   </div>



   <script type="text/javascript">
   //Image Preview Function
   $("#uploadTrigger").click(function(){
     $("#uploadFile").click();
   });
   function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
       $('#body-bottom').show();
       $('#preview').attr('src', e.target.result);
     }

     reader.readAsDataURL(input.files[0]);
   }
 }
</script>

<script type="text/javascript">
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }

    // });

    // $(".submit").click(function(e){
    //     e.preventDefault();

    //     var name = $("input[name=name]").val();
    //     var password = $("input[name=password]").val();
    //     var email = $("input[name=email]").val();

    //     $.ajax({
    //        type:'POST',
    //        url:'/ajaxRequest',
    //        data:{name:name, password:password, email:email},
    //        success:function(data){
    //           alert(data.success);
    //        }
    //     });
    // });
</script>



</div>
</div>
</div>

</div><!-- small stories area end here-->

<!-- Stories-area-end -->
<div class="white-small-tabs">
  <h3>765</h3><div class="icon-graph"> <img src="{{ url('resources/assets/img/graph-icon.png') }}" class="img-responsive"></div>
  <div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:45%">
    </div>
  </div>
  <h4>SALES GROW</h4><span class="progress-percentage"> 45%</span>
</div>
<div class="white-small-tabs">
  <h3>23</h3><div class="icon-graph"> <img src="{{ url('resources/assets/img/responses.png') }}"></div>
  <div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:45%">
    </div>
  </div>
  <h4>Responses</h4><span class="progress-percentage"> 45%</span>
</div>
<div class="graph-grow">
  <img src="{{ url('resources/assets/img/graph-grow.png') }}" class="img-responsive">
  <h4>Monthly Subshares</h4>
</div>

<div class="graph-grow">
  <img src="{{ url('resources/assets/img/graph-grow.png') }}" class="img-responsive">
  <h4>Monthly Earnings</h4>
</div>
</div>
<!-- col-md-3-end -->
<div class="col-md-3 last-sales">
  @if($notifications)
  @foreach($notifications as $notification)
  <?php
  $getuserdetails = \Helpers::getUserDetails($notification->user_id);

  if( is_object($getuserdetails) )
  {
   $userImage = (!empty($getuserdetails->image))? $getuserdetails->image : '';
   $userName = $getuserdetails->first_name." ".$getuserdetails->last_name;
 } else {
   $userImage = '';
   $userName = '';
 }
 ?>
 @if($notification->type =='Follow')
 <div class="feed-notification">
   @if($userImage)
   <a href="{{ url('profile/') }}/{{$notification->actor}}" target="_blank"><img class="avatar-image avatar-image-p" src="{{url('assets/avatars/'.$userImage)}}"></a>
   @else
   <a href="{{ url('profile/') }}/{{$notification->actor}}" target="_blank"><img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/default-avatar.png')}}"></a>
   @endif
   <div class="notif-text">
	                            <!--
	                            <h2><a href="javascript:void(0)" target="_blank" style="text-decoration: none !important;color: black;">{{$notification->title}}</a></h2>

	                            <p>

					{!!html_entity_decode($notification->description)!!}

	                            </p>
                           -->

                           <h2>{!!html_entity_decode($notification->description)!!}</h2>

                         </div>
                         <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                       </div>

                       @elseif($notification->type=='upload_a_track')
                       <div class="feed-notification">
                         @if($userImage)
                         <img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/'.$userImage)}}">
                         @else
                         <img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/default-avatar.png')}}">
                         @endif
                         <div class="notif-text">
                           <h2><a href="{{ \Helpers::admin_profile_url($notification->user_id) }}" target="_blank" style="text-decoration: none !important;color: black;">{{$notification->title}}</a></h2>
                           <p>
                             {!!html_entity_decode($notification->description)!!}
                           </p>
                         </div>
                         <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                       </div>
                       @elseif($notification->type=='Register')
                       <div class="feed-notification">
                         @if($userImage)
                         <a href="{{ \Helpers::admin_profile_url($notification->user_id) }}" target="_blank" style="text-decoration: none !important;color: black;"><img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/'.$userImage)}}"></a>
                         @else
                         <a href="{{ \Helpers::admin_profile_url($notification->user_id) }}" target="_blank" style="text-decoration: none !important;color: black;"><img  class="avatar-image avatar-image-p" src="{{url('assets/avatars/default-avatar.png')}}"></a>
                         @endif
                         <div class="notif-text">
                           <h2><a href="{{ \Helpers::admin_profile_url($notification->user_id) }}" target="_blank" style="text-decoration: none !important;color: black;">{{$notification->title}}</a></h2>
                           <p>{{$notification->title}}</p>
                         </div>
                         <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                       </div>
                       @endif
                       @endforeach
                       @else
                       <p>Sorry! There is no new activity</p>
                       @endif

                       @if($data_count)
                       <div class="feed-notification-blue">
                        <p>+{{$data_count['total_uploads_today']}} tracks uploaded to Neptune today.</p>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                      </div>
                      <div class="feed-notification-pink">
                        <p>+{{$data_count['total_subshares_today']}} subshares started today. {{$data_count['total_subshares_month']}} this month</p>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                      </div>
                      <div class="feed-notification-grey">
                        <p>+{{$data_count['total_uploads_today']}} track uploaded this week. Total {{$data_count['total_uploads_month']}}</p>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                        <div></div></div>
                        @endif
                      </div>
                      <!-- col-md-3-end -->
                    </div>
                  </section>
                </aside>

                <div class="notification-popup" >

                </div>

                <style type="text/css">
                .send-btn {
                  background: #2ae281;
                  font-family: 'Raleway', sans-serif;
                  color: #fff;
                  font-weight: bold;
                  font-size: 16px;
                  letter-spacing: 1px;
                  border-radius: 35px;
                  width: 103px;
                  height: 38px;
                  border: none;
                  text-transform: uppercase;
                }
              </style>
              <div class="modal fade" id="myModal1" role="dialog" style="display: none;position: absolute; top:20%">
                <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" style="margin-top: -22px;margin-right: 0px;">&times;</button>
                      <h4 class="modal-title">Subshare creation</h4>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <select class="form-control" id="sel1">
                          <?php \Helpers::getSubshareRoles(); ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <select class="form-control" id="sel1">
                          <?php for ($i=1; $i < 100; $i++) {
                           echo "<option>$i%</option>";
                         } ?>
                       </select>
                     </div>
                     <div class="form-group">
                      <textarea class="form-control" rows="5" id="comment"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default send-btn" data-dismiss="modal">Send</button>
                  </div>
                </div>

              </div>
            </div>
            <!-- Modal -->
            @include('admin.inc.inc')
            <!-- End Modal -->
            @endsection