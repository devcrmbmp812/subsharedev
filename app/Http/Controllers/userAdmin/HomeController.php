<?php

namespace App\Http\Controllers\userAdmin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Auth;
use Helpers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
        // $this->middleware('AuthorizeUser');
    }

    public function index() {
        $merge_array = array();


         // get recent 4 subshares.
        $subshares = DB::table('subshare')
                        ->select('*','subshare.created_at as created_at','uploads.id as track_id','subshare.id as sub_id','subshare.status as status')
                        ->leftJoin('users', 'users.id', '=', 'subshare.user_id')
                        ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')

                        ->orderBy('subshare.id','desc')

                        ->limit(4)
                        ->get();

        $responses = DB::table('subshare')
                        ->select('*','subshare.created_at as created_at','uploads.id as track_id','subshare.id as sub_id','subshare.status as status')
                        ->leftJoin('users', 'users.id', '=', 'subshare.user_id')
                        ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')
                        ->where('subshare.status','active')
                        ->orderBy('subshare.id','desc')
                        ->limit(4)
                        ->get();

        $offers = DB::table('subshare')
                        ->select('*','subshare.created_at as created_at','uploads.id as track_id','subshare.id as sub_id','subshare.status as status')
                        ->leftJoin('users', 'users.id', '=', 'subshare.user_id')
                        ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')
                        ->where('subshare.status','pending')
                        ->orderBy('subshare.id','desc')
                        ->limit(4)
                        ->get();

        // Upload tab.
        // get recent 4 uploads.
        $uploads = DB::table('uploads')
                ->select('*','uploads.id as track_id')
                        ->leftJoin('users', 'users.id', '=', 'uploads.user_id')
                        ->orderBy('uploads.id','desc')
                        ->limit(4)
                        ->get();

        // Get all notifiaction.
        $notification = $this->notifications();



        // Get user playlists.
        $playlist = DB::table('playlists')->where('user_id', Auth::user()
                        ->id)
                ->get();
        // $tracks = DB::table('uploads')->leftJoin('playlist','playlist.track_id','=','uploads.id')->where('uploads.id','IN',$playlist)->get();
        // Get admin two latest posts
        $posts = DB::table('posts')->limit(2)
                ->get();

        // Get all counts.
        $data_count = $this->getCounts();

        return view('user_admin.home', ['subshares' => $subshares, 'uploads' => $uploads, 'notifications' => $notification, 'posts' => $posts, 'responses' => $responses,'offers'=>$offers,'data_count' => $data_count, 'playlist' => $playlist]);
    }

    public function subshare_responses() {
        $subshare_responses = DB::table('subshare_responses')->select('subshare.*', 'subshare_responses.*', 'users.*', 'subshare_responses.id as subshare_responses', 'subshare_responses.created_at as response_date')
                ->leftJoin('users', 'users.id', '=', 'subshare_responses.user_id')
                ->leftJoin('subshare', 'subshare.id', '=', 'subshare_responses.subshare_id')
                ->orderBy('subshare_responses.id', 'desc')
                ->limit(4)
                ->get();
        return $subshare_responses;
    }

    public function subshare() {
        return view('admin.subshare');
    }

    public function profile() {
        return view('admin.edit-profile');
    }

    public function media() {
        return view('admin.media.index');
    }

    public function transactions() {
        return view('admin.transaction');
    }

    public function user() {

        $users1 = DB::table('users')->select(array(
                    'users.id',
                    'users.first_name',
                    'users.last_name',
                    'users.image',
                    DB::raw('COUNT(followings.following_id) as Following')
                ))
                ->leftjoin('followings', 'users.id', '=', 'followings.following_id')
                ->groupby('users.id', 'users.first_name', 'users.last_name', 'users.image');

        $users2 = DB::table('users')->select(array(
                            'users.id',
                            'users.first_name',
                            'users.last_name',
                            'users.image',
                            DB::raw('COUNT(uploads.user_id) as Total')
                        ))
                        ->leftjoin('uploads', 'users.id', '=', 'uploads.user_id')
                        ->groupby('users.id', 'users.first_name', 'users.last_name', 'users.image')
                        ->union($users1)->get();

        $uploads = DB::raw("(SELECT user_id, count(*) AS num_uploads

          FROM uploads GROUP BY user_id) as uploads");

        $followers = DB::raw("(SELECT A.follower_id, count(*) AS num_followers

            FROM followings AS A GROUP BY A.follower_id) as followers");

        $following = DB::raw("(SELECT B.following_id, count(*) AS num_followings

          FROM followings AS B GROUP BY B.following_id) as followings");

        $users = DB::table('users')
                ->select('users.id', 'users.first_name', 'users.last_name', 'users.image', 'uploads.num_uploads', 'followings.num_followings', 'followers.num_followers')
                ->leftJoin($uploads, 'uploads.user_id', '=', 'users.id')
                ->leftJoin($followers, 'followers.follower_id', '=', 'users.id')
                ->leftJoin($following, 'followings.following_id', '=', 'users.id')
                ->get();

        return view("admin.user.index")
                        ->with('users', $users);
    }

    public function notifications() {
        $notification = DB::table("logs_notifications")->where("is_read", '!=', '1')
                ->inRandomOrder()
                ->limit(5)
                ->get();
        //dd($notification);
        return $notification;
    }

    public function getTags() {
        $trackid = Input::post('trackid');
        $user_id = Auth::user()->id;
        $track_id = Input::post('trackid');

        $audio_tags = DB::table('uploads')->join('audio_tags', 'uploads.id', '=', 'audio_tags.audio_id')
                ->where('uploads.id', '=', $trackid)->select('uploads.file_name', 'uploads.id', 'uploads.user_id', 'uploads.song_name', 'audio_tags.tag_data')
                ->get();

        function time_to_second($time) {
            $second = 0;
            $time = explode(':', $time);
            $second += $time[0] * 60;
            $second += $time[1];
            return $second;
        }

        if (count($audio_tags) > 0) {
            for ($i = 0; $i < count($audio_tags); $i++) {

                $single_tag_data = explode(',', $audio_tags[$i]->tag_data);
                $user_id = $audio_tags[$i]->user_id;
                $track_id = $audio_tags[$i]->id;
                $audio_tags[$i]->start_time = time_to_second($single_tag_data[0]);
                $audio_tags[$i]->end_time = time_to_second($single_tag_data[1]);
                $audio_tags[$i]->tag_name = $single_tag_data[2];
            }
        }

        $likes = DB::table("likes")->select('likes')
                        ->where(["likes" => '1', "track_id" => $track_id])->count();
        $dlikes = DB::table("likes")->select('likes')
                        ->where(["likes" => '0', "track_id" => $track_id])->count();

        $slun = DB::table("likes")->select('slun', 'likes')
                ->where(["track_id" => $track_id, "user_id" => Auth::user()
                    ->id])
                ->get();
        $track_info = DB::table("uploads")->select('uploads.*', 'users.*')
                        ->leftjoin('users', 'uploads.user_id', '=', 'users.id')
                        ->where('uploads.id', $trackid)->get();
        $track_date = DB::table('uploads')->select('created_at')
                        ->where('uploads.id', $trackid)->get();
        if (!$slun)
            $slun = 0;
        $follow = DB::table('followings')->where('follower_id', Auth::user()
                        ->id)
                ->where('following_id', $track_info[0]->id)
                ->first();
        if ($follow === null) {
            $follow = 1;
        } else {
            $follow = 0;
        }
        $following = \Helpers::getTotalFollowing($track_info[0]->id);
        $follower = \Helpers::getTotalFollower($track_info[0]->id);
        $subshare = \Helpers::getTotalSubshares($track_info[0]->id);

        $top_two = DB::table('uploads')->where('user_id', '=', $track_info[0]->id)
                ->limit(2)
                ->get();

        $top_two_html = View::make('admin/inc/two')->with('top_two', $top_two);
        $top_two_html = $top_two_html->render();
        $add_to_list = DB::table('playlists')->where('user_id', Auth::user()
                        ->id)
                ->get();

        $add_list_html = View::make('admin/inc/addlist')->with(['add_to_list' => $add_to_list, 'track_id' => $trackid]);
        $add_list_html = $add_list_html->render();

        $time_ago = $this->get_time_ago(strtotime($track_date[0]->created_at));
        $search_html = "<h2>Current search</h2><ul class='tab-blues'>";

        foreach ($audio_tags as $tags) {
            $str = explode(',', $tags->tag_data) [2];
            $search_html .= "<li>$str</li>";
        }
        $search_html .= "<ul>";
        $cover_path = \Helpers::audioCoverPath($track_info[0]->cover_img);
        $user_path = \Helpers::avatarURLret($track_info[0]->image);

        return json_encode(array(
            'success' => $audio_tags,
            'user_id' => $user_id,
            'track_id' => $track_id,
            'likes' => $likes,
            'dislike' => $dlikes,
            'slun' => $slun,
            'track_info' => $track_info,
            'follow' => array(
                'follow' => $follow,
                'following' => $following,
                'follower' => $follower,
                'subshare' => $subshare,
                'toptwo' => $top_two_html,
                'add_to_list' => $add_list_html,
                'search_html' => $search_html,
                'time_ago' => $time_ago,
                'cover_path' => $cover_path,
                'user_path' => $user_path
            )
        ));
    }

    public function addtolist(Request $request) {

        $result = DB::table('playlists_tracks')->where('playlist_id', $request->input('list_id'))
                ->where('track_id', $request->input('track_id'))
                ->get();

        if (count($result)) {
            return 'no';
        } else {

            DB::table('playlists_tracks')->insert(['playlist_id' => $request->input('list_id'), 'track_id' => $request->input('track_id')]);
            $playlist = DB::table('playlists')->where('user_id', Auth::user()
                            ->id)
                    ->get();
            $playlist_html = View::make('admin/inc/playlist')->with('playlist', $playlist);
            $playlist_html = $playlist_html->render();
            return $playlist_html;
        }
    }

    public function like_dislike_func() {
        $track_status = Input::post('track_status');
        $track_id = Input::post('track_id');
        $track_user = Auth::user()->id;
        $result = DB::table("likes")->where(["user_id" => $track_user, "track_id" => $track_id])->first();
        if ($result) {

            DB::table("likes")->where('user_id', $track_user)->where('track_id', $track_id)->update(['likes' => $track_status]);
        } else {
            DB::table("likes")->insert(["user_id" => $track_user, "track_id" => $track_id, "likes" => $track_status,]);
        }
        $likes = DB::table("likes")->select('likes')
                        ->where(["likes" => '1', "track_id" => $track_id])->count();
        $dlikes = DB::table("likes")->select('likes')
                        ->where(["likes" => '0', "track_id" => $track_id])->count();

        return json_encode(array(
            'likes' => $likes,
            'dislike' => $dlikes
        ));
    }

    public function later_unidecide_nointerest() {
        $currentstatus = Input::post('currentstatus');
        $track_id = Input::post('track_id');
        $track_user = Auth::user()->id;
        $result = DB::table("likes")->where(["user_id" => $track_user, "track_id" => $track_id])->first();
        if ($result) {

            DB::table("likes")->where('user_id', $track_user)->where('track_id', $track_id)->update(['slun' => $currentstatus]);
        } else {
            DB::table("likes")->insert(["user_id" => $track_user, "track_id" => $track_id, "slun" => $currentstatus,]);
        }
        $slun = DB::table("likes")->select('slun')
                        ->where(["track_id" => $track_id, "user_id" => $track_user])->get();

        return json_encode($slun);
    }

    public function later_unidecide_html() {

        $similar_html = View::make('admin/inc/similar');
        $similar_html = $similar_html->render();
        return $similar_html;
    }

    public function getnewtags() {

        $trackid = Input::post('trackid');
        $playlistid = Input::post('playlist_id');

        $user_id = "";
        $track_id = "";
        $track_new = DB::table('playlists_tracks')->select('track_id')
                        ->where('playlist_id', $playlistid)->where('track_id', '!=', $trackid)->get();

        $track_id = $trackid;

        if (!count($track_new))
            $track_id = $trackid;
        else
            $track_id = $track_new[0]->track_id;

        $audio_tags = DB::table('uploads')->where('uploads.id', '=', $track_id)->get();

        return json_encode(array(
            'track_info' => $audio_tags
        ));

        /* function time_to_second($time){
          $second=0;
          $time=explode(':',$time);
          $second+=$time[0]*60;
          $second+=$time[1];
          return $second;
          }


          if(count($audio_tags) > 0){
          for($i=0; $i < count($audio_tags); $i++){

          $single_tag_data=explode(',',$audio_tags[$i]->tag_data);
          $user_id=$audio_tags[$i]->user_id;
          $track_id=$audio_tags[$i]->id;
          $audio_tags[$i]->start_time=time_to_second($single_tag_data[0]);
          $audio_tags[$i]->end_time=time_to_second($single_tag_data[1]);
          $audio_tags[$i]->tag_name=$single_tag_data[2];


          }
          }

          $likes = DB::table("likes")->select('likes')->where(["likes"=>'1',"track_id"=>$track_id])->count();
          $dlikes = DB::table("likes")->select('likes')->where(["likes"=>'0',"track_id"=>$track_id])->count();

          $slun = DB::table("likes")->select('slun')->where(["track_id"=>$track_id,"user_id"=>$user_id])->get();
          $track_info = DB::table("uploads")->join('users', 'uploads.user_id', '=', 'users.id')->where('uploads.id',$track_id)->get();
          if(!$slun)
          $slun = 0;
          return  json_encode(array('success' =>  $audio_tags, 'user_id' =>$user_id, 'track_id'=> $track_id,'likes'=>$likes, 'dislike' => $dlikes ,'slun' =>$slun,'track_info'=>$track_info )); */
    }

    ## get all counts for admin dashboard

    public function getCounts() {
        ## get total registration for one day
        $total_registrations = DB::table('logs_notifications')->where('type', 'Register')->where('created_at', '>=', Carbon::today())->count();
        ## get total subshare for one day
        $total_subshares_today = DB::table('subshare')->where('created_at', '>=', Carbon::today())->count();
        ## get total subshare for one month
        $total_subshares_month = DB::table('subshare')->where('created_at', '>=', Carbon::now()->startOfMonth())
                ->count();
        ## get total subshare for one day
        $total_uploads_today = DB::table('uploads')->where('created_at', '>=', Carbon::today())->count();
        ## get total subshare for one month
        $total_uploads_month = DB::table('uploads')->where('created_at', '>=', Carbon::now()->startOfMonth())
                ->count();
        ## array of counts
        $data_count = array(
            'totalRegister' => $total_registrations,
            'total_subshares_today' => $total_subshares_today,
            'total_subshares_month' => $total_subshares_month,
            'total_uploads_today' => $total_uploads_today,
            'total_uploads_month' => $total_uploads_month,
        );
        return $data_count;
    }

    public function savelist(Request $request) {

        $id = DB::table('playlists')->insertGetId(['user_id' => Auth::user()->id, 'name' => $request->input('list'), 'created_at' => Carbon::today(), 'updated_at' => Carbon::today()]);

        return json_encode(array(
            'id' => $id
        ));
    }

    public function removelist(Request $request) {
        $result = DB::table('playlists')->where('id', $request->input('list_id'))->delete();
        $playlist = DB::table('playlists')->where('user_id', Auth::user()->id)->get();
        $playlist_html = View::make('admin/inc/playlist')->with('playlist', $playlist);
        $playlist_html = $playlist_html->render();

        return $playlist_html;
    }

    public function update_lists(Request $request) {
        $add_to_list = DB::table('playlists')->where('user_id', Auth::user()->id)->get();
        $add_list_html = View::make('admin/inc/addlist')->with(['add_to_list' => $add_to_list, 'track_id' => $request->input('track_id')]);
        $add_list_html = $add_list_html->render();
        return $add_list_html;
    }

    public function delete_song_fromlist(Request $request) {
        DB::table('playlists_tracks')->where('playlist_id', $request->input('list_id'))
                ->where('track_id', $request->input('track_id'))
                ->delete();

        $playlist = DB::table('playlists')->where('user_id', Auth::user()
                        ->id)
                ->get();
        $playlist_html = View::make('admin/inc/playlist')->with('playlist', $playlist);
        $playlist_html = $playlist_html->render();

        return $playlist_html;
    }

    public function get_time_ago($time) {
        $time_difference = strtotime(Carbon::now()->format('Y-m-d H:i:s')) - $time;

        if ($time_difference < 1) {
            return 'less than 1 second ago';
        }
        $condition = array(
            12 * 30 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        );

        foreach ($condition as $secs => $str) {
            $d = $time_difference / $secs;

            if ($d >= 1) {
                $t = round($d);
                return 'Added ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
            }
        }
    }

    public function shuffle_song() {
        $trackid = Input::post('track_id');

        $user_id = "";
        $track_id = "";
        $track_new = DB::table('playlists_tracks')->select('track_id')
                        ->where('track_id', '!=', $trackid)->get();

        $track_id = $trackid;

        if (!count($track_new))
            $track_id = $trackid;
        else
            $track_id = $track_new[0]->track_id;

        $audio_tags = DB::table('uploads')->where('uploads.id', '=', $track_id)->get();

        return json_encode(array(
            'track_info' => $audio_tags
        ));
    }


    //  Save User Posts.
    public function saveUserPost(Request $request) {
        if ($request->isMethod('post')) {
            // get custom facebook form data.
            $status = (Input::has('status')) ? $request->status : '';
            $visibility = (Input::has('visibility')) ? $request->visibility : '';

            // Save status and visibility.
            if (!empty($status) && !empty($visibility) && !$request->hasFile('post_image')) {
                // Save facebook post.
                \Helpers::add_postx(Auth::user()->id, $status, "", $visibility);
            }

            if ($request->has('post_image')) {

                $rules = array(
                    'post_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
                );

                $file = $request->file('post_image');
                $status = (Input::has('status')) ? $request->status : '';
                $visibility = (Input::has('visibility')) ? $request->visibility : '';

                // Build the input for validation
                $fileArray = array('post_image' => $file);

                // Now pass the input and rules into the validator
                $validator = Validator::make($fileArray, $rules);

                // Check to see if validation fails or passes
                if ($validator->fails()) {
                    return response()->json(['error' => $validator->errors()->getMessages()], 400);
                }

                // Rename and upload file.
                $imageName = \Helpers::genRandomString() . '.' . $file->getClientOriginalExtension();
                $file->move(base_path() . Config('app.status_images'), $imageName);

                // Save in database.
                \Helpers::add_postx(Auth::user()->id, $status, $imageName, $visibility);
            }

            // display all posts.
            $post = \Helpers::posts(Auth::user()->id);
            $output = "";
            $count_post = 1;
            $output = View::make('user_admin/post')->with('post', $post);
            $output = $output->render();
            return $output;
        } // post end.
    }
    // load more button.
    public function loadMoreFbPosts(Request $request) {
        $showCounter = (Input::has('showCounter')) ? $request->showCounter : 3;

        // display all posts.
        $post = \Helpers::posts(Auth::user()->id, $showCounter);
        $output = "";
        $count_post = 1;

        $output = View::make('user_admin/post')->with('post', $post);
        $output = $output->render();
        // Load More button end
        return $output;
    }

    // like facebook post.
    public function like(Request $request) {
        $input = $request->all();
        DB::table('facebook_likes')->insert(['post_id' => $input['postid'], 'user_id' => Auth::user()->id, 'likes' => 1]);
    }

    // unlike facebook post.
    public function unlike(Request $request) {
        $input = $request->all();
        DB::table("facebook_likes")->where('post_id', $input['postid'])->where('user_id', Auth::user()->id)->delete();
    }

    // facebook posts comments.
    public function comment(Request $request) {
        $input = $request->all();
        $id = DB::table('facebook_posts_comments')->insertGetId(['post_id' => $input['postid'], 'user_id' => Auth::user()->id, 'comments' => $input['comment'], 'date_created' => Carbon::now()]);

        $html = '<li><div class="commenterImage"><img src="'. \Helpers::avatarURLret(Auth::user()->image).'" /></div>';
        $html .= '<div class="commentText" style="display: inline;">';
        $html .= '<p class=""><a href="'. url("/profile/").'/'. Auth::user()->id .'">'.Auth::user()->first_name.'</a> <button type="button" class="close" onclick="removeComment(' .$id.','.$input['postid'].')" aria-label="Close"><span aria-hidden="true">&times;</span>';
        $html .= '</button>  </p> <span class="">'.$input['comment'].'</span><br><span class="date sub-text" style="float: right;color: black;">Just Now</span>';
        return $html;
    }
    public function removeComment(Request $request){

        DB::table('facebook_posts_comments')
                ->where('post_id',$request->input('post_id'))
                ->where('comment_id',$request->input('comment_id'))->delete();
        return 'ok';
    }

}
