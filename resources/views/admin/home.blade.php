@extends('layouts.admin')
@section('content')
<style>
    .post-show{
        background: #d8dde0 !important;
        border: 0px !important;
        padding:  6px !important;
        border-radius: 6px !important;
    }
.titleBox {
    background-color:#fdfdfd;
    padding:10px;
}
.titleBox label{
  color:#444;
  margin:0;
  display:inline-block;
}

.commentBox {
    padding:10px;
    border-top:1px dotted #bbb;
}


.actionBox .form-group * {
    width:100%;
}
.taskDescription {
    margin-top:10px 0;
}
.commentList {
    padding:0;
    list-style:none;
    max-height:200px;
    overflow:auto;
}
.commentList li {
    margin:0;
    margin-top:10px;
}
.commentList li > div {
    display:table-cell;
}
.commenterImage {
    width:30px;
    margin-right:5px;
    height:100%;
    float:left;
}
.commenterImage img {
    width:100%;
    border-radius:50%;
}
.commentText p {
    margin:0;
}
.sub-text {
    color:#aaa;
    font-family:verdana;
    font-size:11px;
}
.actionBox {
    padding:10px;
}
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
		width: 100%;
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



                            <div class="col-md-8">

                                <ul class="nav nav-tabs" style="width:100%;">

                                    <li class=""><a data-toggle="tab" href="#feed" aria-expanded="false">All</a></li>

                                    <li><a data-toggle="tab" href="#menu1">{{count($offers)}} Offers</a></li>

                                    <li class="active"><a data-toggle="tab" href="#menu2" aria-expanded="true">{{count($responses)}}  Responses</a></li>

                                    <li><a data-toggle="tab" href="#menu3">{{count($uploads)}}  Uploads</a></li>

                                </ul>



                            </div>

                        </div>

                        <!-- top tabs ends -->

                        <div class="tab-content">

                            <div id="feed" class="tab-pane fade">
                            @foreach($subshares as $val)

                                <div class="inner-feed-area">

                                    <ul>

                                        <li><img src="{{ \Helpers::avatarURL($val->image) }}" style="width: 50px;height: 50px;border-radius: 50%;"></li>

                                        <li class="feed-details"><h2>{{ $val->first_name }} {{$val->last_name}} is offering to track

                                            {{$val->track_title}} for {{$val->percentage}}</h2>

                                            <p>{{$val->custom_agreement}}</p>

                                        </li>

                                        <li><p>{{ \Helpers::get_time_ago(strtotime($val->created_at)) }}</p></li>

                                        <li>
                                        <input type="hidden" id="user_imageold_subshare_{{$val->sub_id}}" value="{{$val->image}}">
                                            <input type="hidden" id="user_nameold_subshare_{{$val->sub_id}}" value="{{$val->first_name}} {{$val->last_name}}">
                                            <input type="hidden" id="track_titleold_subshare_{{$val->sub_id}}" value="{{$val->track_title}}">
                                            <input type="hidden" id="track_insold_subshare_{{$val->sub_id}}" value="{{$val->track_inspiration}}">
                                            <input type="hidden" id="track_perold_subshare_{{$val->sub_id}}" value="{{$val->track_percentage}}">

                                            <button type="button" class="btn btn-info btn-lg small-green" data-toggle="modal" data-target="#myModalp" onclick="open_track('{{$val->file_name}}','{{$val->sub_id}}','{{$val->sub_id}}','subshare')">read</button>
                                        </li>

                                    </ul>

                                </div>
                            @endforeach

                            </div>

                            <div id="menu1" class="tab-pane fade">

                                @foreach($offers as $val)

                                <div class="inner-feed-area">

                                    <ul>

                                        <li><img src="{{ \Helpers::avatarURL($val->image) }}" style="width: 50px;height: 50px;border-radius: 50%;"></li>

                                        <li class="feed-details"><h2>{{ $val->first_name }} {{$val->last_name}} is offering to track

                                            {{$val->track_title}} for {{$val->percentage}}</h2>

                                            <p>{{$val->custom_agreement}}</p>

                                        </li>

                                        <li><p>{{ \Helpers::get_time_ago(strtotime($val->created_at)) }}</p></li>

                                        <li>
                                       <input type="hidden" id="user_imageold_offers_{{$val->sub_id}}" value="{{$val->image}}">
                                            <input type="hidden" id="user_nameold_offers_{{$val->sub_id}}" value="{{$val->first_name}} {{$val->last_name}}">
                                            <input type="hidden" id="track_titleold_offers_{{$val->sub_id}}" value="{{$val->track_title}}">
                                            <input type="hidden" id="track_insold_offers_{{$val->sub_id}}" value="{{$val->track_inspiration}}">
                                            <input type="hidden" id="track_perold_offers_{{$val->sub_id}}" value="{{$val->track_percentage}}">

                                            <button type="button" class="btn btn-info btn-lg small-green" data-toggle="modal" data-target="#myModalp" onclick="open_track('{{$val->file_name}}','{{$val->sub_id}}','{{$val->sub_id}}','offers')">read</button>
                                        </li>

                                    </ul>

                                </div>
                            @endforeach

                            </div>

                            <div id="menu2" class="tab-pane fade active in">

                                @foreach($responses as $val)

                                <div class="inner-feed-area">

                                    <ul>

                                        <li><img src="{{ \Helpers::avatarURL($val->image) }}" style="width: 50px;height: 50px;border-radius: 50%;"></li>

                                        <li class="feed-details"><h2>{{ $val->first_name }} {{$val->last_name}} is offering to track

                                            {{$val->track_title}} for {{$val->percentage}}</h2>

                                            <p>{{$val->custom_agreement}}</p>

                                        </li>

                                        <li><p>{{ \Helpers::get_time_ago(strtotime($val->created_at)) }}</p></li>

                                        <li>
                                        <input type="hidden" id="user_imageold_response_{{$val->sub_id}}" value="{{$val->image}}">
                                            <input type="hidden" id="user_nameold_response_{{$val->sub_id}}" value="{{$val->first_name}} {{$val->last_name}}">
                                            <input type="hidden" id="track_titleold_response_{{$val->sub_id}}" value="{{$val->track_title}}">
                                            <input type="hidden" id="track_insold_response_{{$val->sub_id}}" value="{{$val->track_inspiration}}">
                                            <input type="hidden" id="track_perold_response_{{$val->sub_id}}" value="{{$val->track_percentage}}">

                                            <button type="button" class="btn btn-info btn-lg small-green" data-toggle="modal" data-target="#myModalp" onclick="open_track('{{$val->file_name}}','{{$val->sub_id}}','{{$val->sub_id}}','response')">read</button>
                                        </li>

                                    </ul>

                                </div>
                            @endforeach

                            </div>

                            <div id="menu3" class="tab-pane fade">
                                @foreach($uploads as $val)
                                <div class="inner-feed-area">

                                    <ul>

                                        <li><img src="{{ \Helpers::avatarURL($val->image) }}" style="width: 50px;height: 50px;border-radius: 50%;"></li>

                                        <li class="feed-details"><h2>{{ $val->first_name }} {{$val->last_name}} has Uploaded track

                                            {{$val->track_title}} for {{$val->track_percentage}}%</h2>

                                            <p>{{$val->track_inspiration}}</p>

                                        </li>

                                        <li><p>{{ \Helpers::get_time_ago(strtotime($val->created_at)) }}</p></li>

                                        <li>
                                            <input type="hidden" id="user_imageold_uploads_{{$val->track_id}}" value="{{$val->image}}">
                                            <input type="hidden" id="user_nameold_uploads_{{$val->track_id}}" value="{{$val->first_name}} {{$val->last_name}}">
                                            <input type="hidden" id="track_titleold_uploads_{{$val->track_id}}" value="{{$val->track_title}}">
                                            <input type="hidden" id="track_insold_uploads_{{$val->track_id}}" value="{{$val->track_inspiration}}">
                                            <input type="hidden" id="track_perold_uploads_{{$val->track_id}}" value="{{$val->track_percentage}}">

                                            <button type="button" class="btn btn-info btn-lg small-green" data-toggle="modal" data-target="#myModalp" onclick="open_track('{{$val->file_name}}','{{$val->track_id}}','{{$val->track_id}}','uploads')">read</button>
                                        </li>

                                    </ul>

                                </div>
                                @endforeach

                            </div>

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

<!-- chat css -->
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/user-admin-dashbaord.css') }}">

<!-- col-md-6-end -->
<div class="col-md-3 center-area">
<?php
$post  = \Helpers::posts( Auth::user()->id ); // get posts.

?>
      <!-- display post -->
      <div class="white-small-tabs" style="background: none; margin-top: 0;height: 600px;overflow-y: scroll;padding: 0px;" id="facebook-posts">

        @foreach($post as $row)

            <?php $time_ago = ( !empty($row->status_time) ) ? $row->status_time : ''; ?>

            <div class="post-show">
                <div class="post-show-inner">
                    <div class="post-header">
                        <div class="post-left-box">
                            <div class="id-img-box"> <a href="{{ url('/profile') }}/{{ $row->id }}"><img style="border-radius: 50%;" src="{{  \Helpers::avatarURLret( $row->image ) }}" /></a> </div>
                            <div class="id-name">
                                <ul style="padding:7px;">
                                    <li><a href="{{ url('/profile') }}/{{ $row->id }}" style="margin-left:5px;">{{  $row->first_name }}</a></li>
                                    <li ><small style="color:black; margin-left: 5px; ">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($time_ago))->diffForHumans() }}</small></li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-right-box"></div>
                    </div>

                    <!-- post box -->
                    <div class="post-body">
                        <div class="post-header-text">{{ $row->status }}</div>
                        @if ( ($row->status_image != 'NULL') )
                           <div class="post-img"><img style="width:150px;height:150px" src="{{\Helpers::statusURL($row->status_image)}} " /></div>
                        @endif
                        <hr style="margin-bottom:3px">
                        <?php  $likee = DB::table('facebook_likes')->where('user_id',Auth::user()->id)->get();
                        if(count($likee)){ ?>
                              <a href="javascript:void(0);" class="like" id="like_<?php echo $row->post_id; ?>" data-id="<?php echo $row->post_id; ?>" style="display: none;">Like</a>
                        <a href="javascript:void(0);" class="unlike" id="unlike_<?php echo $row->post_id; ?>" data-id="<?php echo $row->post_id; ?>" >Unlike</a>

                        <?php }else{?>
                              <a href="javascript:void(0);" class="like" id="like_<?php echo $row->post_id; ?>" data-id="<?php echo $row->post_id; ?>">Like</a>
                        <a href="javascript:void(0);" class="unlike" id="unlike_<?php echo $row->post_id; ?>" data-id="<?php echo $row->post_id; ?>" style="display: none;">Unlike</a>

                        <?php }
                        ?>

                         | <a href="#" class="comment" id="<?php echo $row->post_id; ?>">Comment</a>
                    </div> <!-- post box end -->
                    <hr style="margin-top: 3px; margin-bottom: 0px;">
                    <!-- comments -->
<!--                    <div id="comment-box-<?php echo $row->post_id; ?>" data-id="<?php echo $row->post_id; ?>" style="display: none;">
                      <textarea id="commentbox_<?php echo $row->post_id; ?>" style="resize: none" placeholder="Enter Comment." name="comment_<?php echo $row->post_id; ?>" class="comment-box" data-comment-box-id="<?php echo $row->post_id; ?>"></textarea>
                    </div>-->
                    <div id="comment-box-<?php echo $row->post_id; ?>" data-id="<?php echo $row->post_id; ?>" style="display:none;">
                    <div class="detailBox">

                        <div class="actionBox">
                            <ul class="commentList" id="commentList_{{ $row->post_id }}">
                           <?php $comm = DB::table('facebook_posts_comments')->join('users','users.id','=','facebook_posts_comments.user_id')->where('facebook_posts_comments.post_id',$row->post_id)->get();

                           ?>
                                @foreach($comm as $val)
                                <li id="comment_{{$val->comment_id}}">
                                    <div class="commenterImage">
                                      <img src="{{ \Helpers::avatarURL($val->image)}}" />
                                    </div>
                                    <div class="commentText" style="display: inline;">
                                        <p class=""><a href="{{ url('/profile/').'/'.$val->id }}">{{$val->first_name}}</a>
                                            <button type="button" class="close" onclick="removeComment('{{ $val->comment_id }}','{{ $val->post_id }}')" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </p> <span class="">{{$val->comments}} </span><br><span class="date sub-text" style="float: right;color: black;">{{ explode(' ',$val->date_created)[0]}}</span>

                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <form class="form-inline" role="form">
                                <div class="form-group">
                                    <textarea class="form-control comment-box" id="commentbox_<?php echo $row->post_id; ?>" name="comment_<?php echo $row->post_id; ?>" data-comment-box-id="<?php echo $row->post_id; ?>" placeholder="Your comments" ></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                         </div>



                </div>
            </div>
            <br>
          @endforeach



        @if( count(DB::table('facebook_posts')->where('user_id',Auth::user()->id)->orWhere('visibility', 'public')->get()) > 3 )
          <!-- Load More start -->
          <div class="post-show" id="show-loadmore-button">
            <div class="post-show-inner">
                <div class="post-body">
                    <div class="post-header-text" style="text-align: center;"><span id="loadmore" style="cursor:pointer;">Load More</span></div>
                </div>
            </div>
          </div>
          <!-- Load More end -->
        @endif


      </div><!-- chat window end -->
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

                   <form method="post" enctype="multipart/form-data" id="ff">
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
                               <textarea class="text-type" name="status" id="status" style="margin:0px; height: 100px;width: 100%;" placeholder="What's on your mind?"></textarea>
                          </div>
                          <div id="body-bottom">
                            <img src="#"  id="preview"/>
                          </div>
                      </div>

                      <div class="c-footer">
                           <div class="right-box">
                                <ul>
                                    <li style="display: inline-flex; float: right;">
                                        <select class="form-control" style="width: 70px;height: 26px; font-size: 12px; padding-left: 10px; padding-top: 5px;" name="visibility">
                                   <option value="public" selected>Public</option>
                                   <option value="private">Private</option>
                                 </select>
                                 <input type="button" name="submit" value="Post" class="btn2" id="postButton" />
                               </li>
                             </ul>
                           </div>
                      </div>
        </form>
     </div>
   </div>
<!--  Model for Track -->
<!--  Model for Track -->

<div class="modal fade in" id="myModalp" style="top:20%; display: none;" role="modal-dialog" data-keyboard="false" data-backdrop="static" style="">
    <div class="modal-dialog" style="width: 740px !important;">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="closewave()" data-dismiss="modal"><i id="myclose" class="fa fa-times-circle" aria-hidden="true"></i>
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

        </div>
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

 /**
   *
   *  Load More clicked.
   *
   */
$(document).on('click', '#loadmore', function() {

  var customformData = new FormData();
  customformData.append('showCounter', $('#loadMoreCounter').val());

    $.ajaxSetup({
    				headers: {
    					'X-CSRF-TOKEN': '<?php echo csrf_token() ?>'
    				}
    			});

    $.ajax({
        type:'POST',
        url: 'loadmorefbposts',
        data: customformData,
        cache:false,
        contentType: false,
        processData: false,
        async: true,

        success:function(data)
        {
           if(data)
           {
         		  $('#facebook-posts').html(data); // replace data.
              var v = $('#loadMoreCounter').val() ; // empty status value.
              var result = +v + 3
              $('#loadMoreCounter').val(result);
           }
        },
    });
  });
  /**
   *
   *  Post Button clicked.
   *
   */
    $("#postButton").click(function () {

	   facebookFormData = new FormData(document.getElementById('ff'))
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': '<?php echo csrf_token() ?>'
				}
			});

 			$.ajax({
              type:'POST',
              url: 'saveUserPost',
              data: facebookFormData, // all form data
              cache:false,
              contentType: false,
              processData: false,
              async: true,
              success:function(data)
              {
                 if(data)
                 {
                 	$('#facebook-posts').html(data);
                 	$('#status').val(''); // empty status value.
                 }
              },
          });
  });
  function removeComment(comment_id,post_id){
  	$.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': '<?php echo csrf_token() ?>'
                    }
            });

 	$.ajax({
              type:'POST',
              url: 'removeComment',
              data: {'comment_id':comment_id,'post_id':post_id}, // all form data
              async: true,
              success:function(data)
              {
                 $("#comment_"+comment_id).hide();
              },
          });

  }
/**
 *
 *  Like
 *
 */
$(document).on('click', '.like', function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': '<?php echo csrf_token() ?>'
      }
    });

    var likeID = $(this).attr("data-id");         // get clicked like id.
    $("#like_"+likeID).css("display", "none");    // hide like.
    $("#unlike_"+likeID).css("display", "inline-block"); // show unlike.

    $.ajax({
        type: 'POST',
        url: '{{ url("fbLike") }}',
        data: { postid: likeID},
        async: false,

        success:function(data)
        {
        },
    });
  });
/**
 *
 *  unlike
 *
 */
$(document).on('click', '.unlike', function() {
    $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': '<?php echo csrf_token() ?>'
            }
    });

    var unlikeID = $(this).attr("data-id");               // get clicked like id.
    $("#like_"+unlikeID).css("display", "inline-block");  // display like.
    $("#unlike_"+unlikeID).css("display", "none");        // hide unlike.

    $.ajax({
        type: 'POST',
        url: '{{ url("fbUnLike") }}',
        data: { postid: unlikeID },
        async: false,
        success:function(data)
        {
        },
    });
  });
/**
 *
 *  Comment
 *
 */
$(document).on('click', '.comment', function() {
    var comment_box_id = $(this).attr("id");     // get clicked comment box.
    $("#comment-box-"+comment_box_id).toggle();  // display like.
});

// Enter key press save comments.
$(".comment-box").on('keydown',function(evt){
  evt = evt || window.event;

  if (evt.keyCode == 13)
  {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': '<?php echo csrf_token() ?>'
          }
        });

        var post_id = $(this).attr("data-comment-box-id");  // get commented box post id.
        var comments = $(this).val().trim();                // get User comments.


 // appent message on enter.


        $.ajax({
            type: 'POST',
            dataType:'html',
            url: '{{ url("fbcomment") }}',
            data: { postid: post_id, comment: comments },
            async: false,
            success:function(data)
            {
                $("#commentList_"+post_id).append(data);
            }
        });
        // clear comment box.
        $("#commentbox_"+post_id).val('').blur();
  }
});
var wavesurfer1="";
    function open_track(song_name,id,sub_id,prefix){
            $("#loadd").show();
           $("#userimg").html('<img src="{{ \Helpers::avatarURL('+$("#user_imageold_"+prefix+"_"+id).val()+') }}" style="width: 50px;height: 50px;border-radius: 50%;">');
             $("#nametext").html($("#user_nameold_"+prefix+"_"+id).val());
             $("#nametext").html($("#user_nameold_"+prefix+"_"+id).val() + "has Uploaded track "+$("#track_titleold_"+prefix+"_"+id).val() + " for " + $("#track_perold_"+prefix+"_"+id).val()+"%");
             $("#track_ins").html($("#track_insold_"+prefix+"_"+id).val());

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
       }

</script>
<input type="hidden" value="6" style="display: none;" id="loadMoreCounter">
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
   $userName = $getuserdetails->first_name ."  ". $getuserdetails->last_name;
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