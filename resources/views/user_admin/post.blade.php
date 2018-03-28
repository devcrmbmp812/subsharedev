

        @foreach($post as $row)



            <?php $time_ago = ( !empty($row->status_time) ) ? $row->status_time : ''; ?>



            <div class="post-show">

                <div class="post-show-inner">

                    <div class="post-header">

                        <div class="post-left-box">

                            <div class="id-img-box"><a href="{{ url('/profile') }}/{{ $row->id }}"><img style="border-radius: 50%;" src="{{  \Helpers::avatarURLret( $row->image ) }}" /></a></div>

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

                                <li>

                                    <div class="commenterImage">

                                      <img src="{{ \Helpers::avatarURL($val->image)}}" />

                                    </div>

                                    <div class="commentText" style="display: inline;">

                                        <p class=""><a href="{{ url('/profile/').'/'.$val->id }}">{{$val->first_name}}</a> </p> <span class="">{{$val->comments}} </span><br><span class="date sub-text" style="float: right;color: black;">{{ explode(' ',$val->date_created)[0]}}</span>



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
<script>
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
</script>