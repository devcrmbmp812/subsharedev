<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\DatabaseManager;
use Carbon\Carbon;

class Helpers {

    public function __construct(DatabaseManager $database)
    {
        $this->db = $database;
    }
    public static function userLog($type,$title,$description,$followerID=NULL,$actor=NULL)
    {
        $link = url()->current();
        if($followerID!=NULL){
            $followerID =$followerID;
        }else{
            $followerID ='0';
        }

        if( $type == "Follow" )
        {
         $link = url('profile').'/';
        }
        DB::table('logs_notifications')->insert(
                ['type' => $type ,
                 'title' => $title,
                 'description' => $description,
                 'link' => $link,
                 'user_id'=>$followerID,
                 'actor'=>$actor,
                 'created_at'=> Carbon::now()
                ]
        );

        // echo \Helpers::userLog( $type, $title, $description, $followerID = NULL, $actor = NULL);
        // echo \Helpers::userLog();
    }

    // get subshare track uploader id.
    public static function SubshareUploaderID($subshareID = '')
    {
          $uploadUserID  =  DB::table('uploads')
                  ->join('subshare', 'subshare.track_id', '=', 'uploads.id')
                  ->select('uploads.user_id')
                  ->where('subshare.id', $subshareID )
                  ->first();
          return ( !empty($uploadUserID->user_id) ) ? $uploadUserID->user_id : 0 ;
      // \Helpers::SubshareUploaderID( $subshareID );
    }

    // get list of not read messages. ( LoggedIn User top Message notification )
    public static function getCalenderNotification()
    {
        $notifications = $subshare_responses = DB::table('subshare_responses')
                            ->select('subshare.*','subshare_responses.*','users.*','subshare_responses.id as subshare_responses','subshare_responses.created_at as response_date')
                            ->leftJoin('users', 'users.id', '=', 'subshare_responses.user_id')
                            ->leftJoin('subshare', 'subshare.id', '=', 'subshare_responses.subshare_id')
                            ->orderBy('subshare_responses.id','desc')->limit(4)->get();
        $notification_ = "";
        foreach ($notifications as $notification)
        {
            $notification_ .= '<a target="_blank" class="dropdown-item" href="'.url("messages/read/").'/'.$notification->id.'"><i class="fa fa-envelope-o" aria-hidden="true"></i><div class="top-notification"><h5>Subshare Response From '. $notification->first_name." ".$notification->last_name.'!</h5><span>'.dateHumans($notification->response_date).'</span></div></a>';
        }
        return $notification_;
    }
    // get total calender.
    public static function getTotalCalenders()
    {
        $results = $subshare_responses = DB::table('subshare_responses')
                                ->select('subshare.*','subshare_responses.*','users.*','subshare_responses.id as subshare_responses','subshare_responses.created_at as response_date')
                                ->leftJoin('users', 'users.id', '=', 'subshare_responses.user_id')
                                ->leftJoin('subshare', 'subshare.id', '=', 'subshare_responses.subshare_id')
                                ->orderBy('subshare_responses.id','desc')->limit(4)->get();
        $output ='';
        if ( count($results) > 0 )
        {
            $output = '
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="'.url('assets/img/calendar.png').'">
                <span class="label label-success">'. count($results) .'</span>
                <div class="down-arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
            </a>
            <div class="dropdown-menu drop-down-message" aria-labelledby="dropdownMenuButton">
                '. \Helpers::getCalenderNotification() .'
            </div>
            ';
        }else {

            $output = ' <img src="'.url('assets/img/calendar.png').'">';
        }
        echo $output;
    }
    public static function getMusicGenres($status='Active')
    {
        $genres = DB::table('genres')->where('status', $status)->get();
        return $genres;
    }
    // get total number of subshares.
    public static function getTotalSubsharesbyUserID($userID)
    {
        $count = DB::table('subshare')->where('user_id', $userID)->get();
        return count($count);
        // echo \Helpers::getTotalSubshares();
    }
    public static function getSubsharesbyUserID( $subshare_id = 0 )
    {
        $userid = DB::table('subshare')->select('user_id')->where('id', $subshare_id)->first();
        return $userid->user_id;
        // echo \Helpers::getSubsharesbyUserID();
    }
     // get list of not read messages.
     public static function getAdminMessageNotification()
     {
         $notifications = DB::table('messages')->where('isRead', '0')->get();
         $notification_ = "";
         foreach ($notifications as $notification)
         {
             $notification_ .= '<a target="_blank" class="dropdown-item" href="'.url("messages/read/").'/'.$notification->id.'"><i class="fa fa-envelope-o" aria-hidden="true"></i><div class="top-notification"><h5>Message From '. Helpers::getUserFullName($notification->fromUser).'!</h5><span>'.dateHumans( $notification->created_at ).'</span></div></a>';
         }
         return $notification_;
     }
     public static function getAdminTotalMessages()
     {
         $results = DB::table('messages')->where('isRead', '0')->get();
         $output ='';
         if ( count($results) > 0 )
         {
             $output = '
             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <img src="'.url('assets/img/message.png').'">
                 <span class="label label-success">'. count($results) .'</span>
                 <div class="down-arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
             </a>
             <div class="dropdown-menu drop-down-message" aria-labelledby="dropdownMenuButton">
             '. \Helpers::getAdminMessageNotification() .'
             </div>
             ';
         }else {
             $output = ' <img src="'.url('assets/img/message.png').'">';
         }
         echo $output;
     }


      // get list of not read messages.
      public static function getAdminNotification()
      {
          $notifications = DB::table('logs_notifications')->where('is_read','0')->get();
          $notification_ = "";
          foreach ($notifications as $notification)
          {
              $notification_ .= '<a target="_blank" class="dropdown-item" href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i><div class="top-notification"><h5>'.  $notification->title.'!</h5><span>'.dateHumans( $notification->created_at ).'</span></div></a>';
          }
          return $notification_;
      }
      public static function getAdminTotalNotification()
      {
          $results = DB::table('logs_notifications')->where('is_read','0')->get();
          $output ='';
          if ( count($results) > 0 )
          {
              $output = '
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="'.url('assets/img/notifications.png').'">
                    <span class="label label-success">'. count($results) .'</span>
                    <div class="down-arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
              </a>
              <div class="dropdown-menu drop-down-message" aria-labelledby="dropdownMenuButton">
              '. \Helpers::getAdminNotification() .'
              </div>
              ';
          }else {
              $output = ' <img src="'.url('assets/img/notifications.png').'">';
          }
          echo $output;
      }

//    public static function dateFormat($date){
//        return \Carbon\Carbon::parse($date)->format('d.m.Y');
//    }
//
//    public function dateHumans($date){
//        return \Carbon\Carbon::parse($date)->diffForHumans();
//    }
    /* last : updated on friday */
    public static function genRandomString()
    {
        $length = 5;
        $characters = "0123456789ABCDEFGHIJKLMNOPQRSTUVWZYZ";

        $real_string_length = strlen($characters) ;
        $string="id";

        for ($p = 0; $p < $length; $p++)
        {
            $string .= $characters[mt_rand(0, $real_string_length-1)];
        }
        $string = $string . "_".time();
        return strtolower($string);
    }
    // Tracks total number of tracks.
    public static function getTotalTracks($userID = 0)
    {
        $tracks = DB::table('uploads')->where('user_id', $userID )->get();
        // Total LoggedIn User tracks.
        if ( count($tracks) > 0) {
            return count($tracks);
        }
        return '0';
        // echo \Helpers::getTotalTracks();
    }
    // get tracks with limit.
    public static function getTracks($limit=0)
    {
        $tracks = DB::table('uploads')->where('user_id', Auth::user()->id)->limit($limit)->get();
        return $tracks;
        // echo \Helpers::getTracks();
    }

    // get track user based on track id.
    public static function getTrackUser($trackID = 0)
    {
        $user = DB::table('uploads')->select('user_id')->where('id', $trackID )->first();
        return ( !empty($user->user_id) ) ? $user->user_id : 0;
        // echo \Helpers::getTrackUser( $trackID );
    }
    // get total number of subshares.
    public static function getTotalSubshares($userID = 0)
    {
        $subshares = DB::table('subshare')->where('user_id', Auth::user()->id)->get();
        if ( count($subshares) > 0) {
            return count($subshares);
        }
        return '0';
        // echo \Helpers::getTotalSubshares();
    }
    // get subshare with limit.
    public static function getSubshare($limit=0)
    {
        $tracks = DB::table('subshare')->where('user_id', Auth::user()->id)->limit($limit)->get();
        return $tracks;
        // echo \Helpers::getSubshare();
    }
    // get user tracks images and there id.
    public static function getTracksImages( $userID = 0 )
    {
        $tracks = DB::table('uploads')->where('user_id', $userID)
                                    ->select(array('id', 'cover_img'))
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        $output ='';
        if ( count($tracks) > 0 )
        {
            foreach ($tracks as $image)
            {
                // $img = ( isset($image->cover_img) && !empty($image->cover_img) )? $image->cover_img : 'audio-placeholder.jpg';
                // $output .= '<li><img style="width:124px;height:124px" src="'. url('assets/audios/'). '/' . $img .'"></li>';
                $url = \Helpers::audioCoverPath( $image->cover_img );
                $output .= '<li><img style="width:124px;height:124px" src="'. $url .'"></li>';
            }

        } else {
          $output = "No Track Uploaded yet.";
        }

         echo  $output;
        // echo \Helpers::getTracksImages();
    }

    // get user profile tracks images based on id.
    public static function getTracksImagesProfile( $userID = 0 )
    {
        $tracks = DB::table('uploads')->where('user_id', $userID)
                                    ->select(array('id', 'cover_img','track_title'))
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        $output ='';
        if ( count($tracks) > 0 )
        {
            foreach ($tracks as $image)
            {
                $url = \Helpers::audioCoverPath( $image->cover_img );
                $output .= '<li><img title="'. $image->track_title .'" style="width:124px;height:124px" src="'. $url .'"></li>';
            }

        } else {
          $output = "No Track Uploaded yet.";
        }

         echo $output;
        // echo \Helpers::getTracksImages();
    }


    // get user tracks images and there id.
    public static function getLatestTwoTracks( $userID = 0 )
    {
        $tracks = DB::table('uploads')->where('user_id', $userID)
                                    ->select(array('id', 'cover_img'))
                                    ->limit(5)
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        $output ='';
        foreach ($tracks as $image)
        {
            $img = ( isset($image->cover_img) && !empty($image->cover_img) )? $image->cover_img : 'audio-placeholder.jpg';
            $output .= '<li><img style="width:80px;height:80px" src="'. url('assets/audios/'). '/' . $img .'"></li>';
        }
        echo $output;
        // echo \Helpers::getTracksImages();
    }
    // get recent two profile Recent tracks.
    public static function getProfileRecentTracks( $userID = 0 )
    {

        $result = DB::table('uploads')->where('user_id', $userID )
                                    ->select(array('id', 'file_name', 'song_name','track_title'))
                                    ->limit(2)
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        return $result;
        // echo \Helpers::getProfileRecentTracks();
    }
    // get Total Follower based on userID.
    public static function getTotalFollower( $userID=0 )
    {
        $follower = DB::table('followings')->select('follower_id')->where('follower_id' , $userID)->count();
        return ( $follower > 0 ) ? $follower : '0';
        // echo \Helpers::getTotalFollower();
    }
        // get Total Following based on userID.
    public static function getTotalFollowing( $userID=0 )
    {
        $following = DB::table('followings')->select('following_id')->where('following_id' , $userID)->count();
        return ( $following > 0 ) ? $following : '0';
        // echo \Helpers::getTotalFollowing();
    }
    // get list of not read messages.
    public static function getMessageNotification()
    {
        $notifications = DB::table('messages')->where('toUser', Auth::user()->id)->where('isRead', '0')->get();
        $notification_ = "";
        foreach ($notifications as $notification)
        {
            if ( !empty($notification->fromUser) )
            {
              $notification_ .= '<a target="_blank" class="dropdown-item" href="'.url("messages/read/").'/'.$notification->id.'"><i class="fa fa-envelope-o" aria-hidden="true"></i><div class="top-notification"><h5>Message From '. Helpers::getUserFullName($notification->fromUser).'!</h5><span>June 20, 2015</span></div></a>';
            }
        }
        return $notification_;
    }
    public static function getTotalMessages()
    {
        $results = DB::table('messages')->where('toUser', Auth::user()->id)->where('isRead', '0')->get();
        $output ='';
        if ( count($results) > 0 )
        {
            $output = '
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                <img src="'.url('assets/img/message.png').'">
                <span class="label label-success">'. count($results) .'</span>
                <div class="down-arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
            </a>
            <div class="dropdown-menu drop-down-message" aria-labelledby="dropdownMenuButton">
                '. \Helpers::getMessageNotification() .'
            </div>
            ';
        }else {

            $output = ' <img src="'.url('assets/img/message.png').'">';
        }
        echo $output;
    }
    public static function getUserEmail($userID = 0)
    {
        $user = DB::table('users')->where('id', $userID)->first();
        return $user->email;
         // \Helpers::getUserEmail()
    }
    /* User table helper methods */
    // full username based on userID.
    public static function getUserFullName($userID = 0)
    {
        $user = DB::table('users')->where('id', $userID)->first();

      if ( is_object($user) ) {
           return $user->first_name .'  '. $user->last_name;
      }

       return '';
        // \Helpers::getUserFullName(Auth::user()->id)
    }
    public static function getUserID($userEmail = "")
    {
        $user = DB::table('users')->where('email', $userEmail)->first();
        return $user->id;
    }
    public static function getUserDetails($userID)
    {
        return DB::table('users')->where('id', $userID)->first();
        // \Helpers::getUserDetails( $user_id )
    }
    public static function getSubshareRoles( $default = '1' )
    {
        $output = "";
        $roles = DB::table('subshare_roles')->get();
        foreach( $roles as $role)
        {
            // only active status will be visible.
            if( $role->status == "Active" )
            {
              $selected = ( $default == $role->id ) ? 'selected="selected"' : '' ;
              $output .= "<option value='".$role->id."'" . $selected .">". $role->title ."</option>";
            }
        }
        echo $output;
        // \Helpers::getSubshareRoles();
    }
    public static function getTrackName($trackID = 0)
    {
        $track = DB::table('uploads')->where('id', $trackID)->select("track_title")->first();

        if ( (!empty($track->track_title) ) )
        {
          $track_name = $track->track_title;
        } else {
          $track_name = '';
        }
        return $track_name;
        // \Helpers::getTrackName( $track_id );
    }

    public static function audioCoverURL($audio_cover_name = '')
    {
        if ( !empty($audio_cover_name) )
        {
            $audioCoverURL =  base_path().Config::get('app.audio_url') . $audio_cover_name ;

            // check file exist.
            if ( !file_exists($audioCoverURL) )
            {
                // set default image.
                $audioCoverURL =   url( Config::get('app.audio_url') . 'audio-placeholder.jpg');
            } else {
                $audioCoverURL =  url( Config::get('app.audio_url') . $audio_cover_name ) ;
            }
        } else {
            // set default image.
            $audioCoverURL =  url( Config::get('app.audio_url') . 'audio-placeholder.jpg');
        }
        echo $audioCoverURL;
        // \Helpers::audioCoverURL()
    }

    public static function audioCoverPath($audio_cover_name = '')
    {
        if ( !empty($audio_cover_name) )
        {
            $audioCoverURL =  base_path().Config::get('app.audio_url') . $audio_cover_name ;

            // check file exist.
            if ( !file_exists($audioCoverURL) )
            {
                // set default image.
                $audioCoverURL =   url( Config::get('app.audio_url') . 'audio-placeholder.jpg');
            } else {
                $audioCoverURL =  url( Config::get('app.audio_url') . $audio_cover_name ) ;
            }
        } else {
            // set default image.
            $audioCoverURL =  url( Config::get('app.audio_url') . 'audio-placeholder.jpg');
        }
        return $audioCoverURL;
        // \Helpers::audioCoverURL()
    }

    /* post image helper */
    public static function PostImage($post_image = '')
    {
        if ( !empty($post_image) )
        {
            $post_image_url =  ('storage/app/public/post_images/'. $post_image );

            // check file exist.
            if ( !file_exists($post_image_url) )
            {
                // set default image.
                $post_image_url =  url( 'storage/app/public/post_images/' . 'default-post.png' );
            } else {
                $post_image_url =  url( 'storage/app/public/post_images/' . $post_image  ) ;
            }

        } else {
            // set default image.
            $post_image_url =  url( 'storage/app/public/post_images/' . 'default-post.png');
        }
        echo $post_image_url;
        // \Helpers::PostImage()
    }

    public static function avatarURL($user_avatar_name = '')
    {
        if ( !empty($user_avatar_name) )
        {
            $user_avatar_url =  base_path() . Config::get('app.avatars_url') . $user_avatar_name ;

            // check file exist.
            if ( !file_exists($user_avatar_url) )
            {
                // set default image.
                $avatar_url =   url( Config::get('app.avatars_url') . 'male-avatar.jpg');
            } else {
                $avatar_url =   url( Config::get('app.avatars_url') . $user_avatar_name );
            }
        } else {
            // set default image.
            $avatar_url =  url( Config::get('app.avatars_url') . 'male-avatar.jpg');
        }
        echo $avatar_url;

        // \Helpers::avatarURL()
    }
    public static function avatarURLret($user_avatar_name = '')
    {
        if ( !empty($user_avatar_name) )
        {
            $user_avatar_url =  base_path() . Config::get('app.avatars_url') . $user_avatar_name ;

            // check file exist.
            if ( !file_exists($user_avatar_url) )
            {
                // set default image.
                $avatar_url =   url( Config::get('app.avatars_url') . 'male-avatar.jpg');
            } else {
                $avatar_url =   url( Config::get('app.avatars_url') . $user_avatar_name );
            }
        } else {
            // set default image.
            $avatar_url =  url( Config::get('app.avatars_url') . 'male-avatar.jpg');
        }
        return $avatar_url;

        // \Helpers::avatarURLret()
    }
    public static function usersAvatar( $UserID = 0 )
    {
        // get use image.
        $UserImage =  \Helpers::getUserAvatar($UserID);

        if ( !empty($UserImage) )
        {
            // user avatar path.
            $userAvatarPath =  base_path().Config::get('app.avatars_url') . $UserImage ;

            // replace forward slash with backslash so file_exist method will run correctly.
            $userAvatarPath = str_replace("/","\\", $userAvatarPath); // on localhost
             // replace forward slash with backslash so file_exist method will run correctly.
            // $userAvatarPath = str_replace("\\","/", $userAvatarPath); // on live

            // Check file exist.
            if ( !file_exists($userAvatarPath) )
            {
                // set default image.
                $usersAvatarPath =   url( Config::get('app.avatars_url') . 'default-avatar.jpg');
            } else {
                 $usersAvatarPath =  url( Config::get('app.avatars_url') . $UserImage ) ;
            }
        } else {
            // set default image.
            $usersAvatarPath =  url( Config::get('app.avatars_url') . 'default-avatar.jpg');
        }
        echo $usersAvatarPath;
        // \Helpers::usersAvatar()
    }
    /* get user avatar by use id */
    public static function getUserAvatar($userID = 0)
    {
        $user = DB::table('users')->where('id', $userID)->select('image')->first();
        return $user->image;
    }

            // get currently loggedIn user Flagged Tracks
        public static function getUserFlaggedTracks()
        {
            DB::enableQueryLog();
            $flagged_media = DB::table('flag_media')->select('upload_id')->where('flag_by', Auth::user()->id )->get();

            $uploads = array();

            if ( count($flagged_media) > 0 ) {

                foreach ($flagged_media as $row) {
                    $uploads[] = $row->upload_id;
                }
            }

            return $uploads;
            // \Helpers::getUserFlaggedTracks()
        }

        public static function checkFlaggedTrack( $mediaID = 0)
        {
            $flagged_media = DB::table('flag_media')->where('upload_id', $mediaID  )->where('flag_by', Auth::user()->id )->count();
            return ( $flagged_media > 0 ) ? false : true ;
            // \Helpers::checkFlaggedTrack()
        }

		public static function followingCheck( $profileID = 0 )
    {
        $user = DB::table('followings')->where('follower_id', Auth::user()->id )->where('following_id', $profileID )->first();
        if ($user === null) {
           return true;
        }
        return false;
        // \Helpers::followingCheck( $profileID = 0 );
    }

    // profile link.
    public static function profile_url( $userID ='' )
    {
      echo url('/profile/') . '/' .$userID;
      // \Helpers::profile_url();
    }

    public static function admin_profile_url( $userID ='' )
    {
      echo url('admin/profile/') . '/' .$userID;
      // \Helpers::admin_profile_url();
    }
    /* digits only, no dots */
    public static function validate($element) {

       if ($element == null) {
            return false;
        }

      return !preg_match ("/[^0-9]/", $element);
      // \Helpers::is_digits();
    }

	// User Notification.
	public static function getUserNotification()
	{
	  $notifications = DB::table('logs_notifications')->where('is_read','0')->where('user_id', Auth::user()->id)->orderBy('created_at','desc')->get();
	  $notification_ = "";
	  foreach ($notifications as $notification)
	  {
	      $notification_ .= '<a target="_blank" class="dropdown-item" href="javascript:void(0)"><i class="fa fa-envelope-o" aria-hidden="true"></i><div class="top-notification"><h5>'.  $notification->title.'!</h5><span>'.dateHumans( $notification->created_at ).'</span></div></a>';
	  }
	  return $notification_;
	}
	public static function getUserTotalNotification()
	{
	  $results = DB::table('logs_notifications')->where('is_read','0')->where('user_id', Auth::user()->id)->get();
	  $output ='';
	  if ( count($results) > 0 )
	  {
	      $output = '
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="'.url('assets/img/notifications.png').'">
	            <span class="label label-success">'. count($results) .'</span>
	            <div class="down-arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
	      </a>
	      <div class="dropdown-menu drop-down-message" aria-labelledby="dropdownMenuButton">
	      '. \Helpers::getUserNotification() .'
	      </div>
	      ';
	  }else {
	      $output = ' <img src="'.url('assets/img/notifications.png').'">';
	  }
	  echo $output;
	}

  //------------------------------------------------------------------------------------
	//--------------------- Subshare helpers ---------------------------------------------
  //------------------------------------------------------------------------------------

	// get last subshare of currently loggedin user.
	public static function getLastSubshare( $subshare_id)
	{
		$LastSubshare = array();
		$subshare = DB::table('uploads')->select('*','user_parent_track.track_id as track_id','uploads.user_id as user_id','uploads.created_at as created_at')->join('user_parent_track','user_parent_track.track_id','=','uploads.id')->where('user_parent_track.user_id', $subshare_id)->first();
		// check if last subshare found in database.
		if ($subshare === null) {
		   // subshare doesn't exist
		   return false;
		}

		$lastSubshare['subshare_id'] = $subshare->id;
		$lastSubshare['custom_agreement'] = $subshare->track_inspiration;
		$lastSubshare['track_file_name'] = \Helpers::getTrackFileName($subshare->track_id);
		$lastSubshare['created_at'] = ( !is_null($subshare->created_at) && !empty($subshare->created_at) && isset($subshare->created_at)) ? \Carbon\Carbon::createFromTimeStamp(strtotime($subshare->created_at))->diffForHumans() : '' ;
    $lastSubshare['title'] = \Helpers::getSubshareStatement( $subshare->user_id , $subshare->track_id , $subshare->track_title , $subshare->track_percentage);

    // get track
    $lastSubshare['titlet_text'] = $subshare->track_title;
    $lastSubshare['track_percentage'] = $subshare->track_percentage;
    $lastSubshare['track_bpm'] = $subshare->track_bpm;
    $lastSubshare['track_percentage'] = $subshare->track_percentage;
    $lastSubshare['cover_img'] = $subshare->cover_img;

		return $lastSubshare;
	}
  public static function getsubsharetrack($subshare_id){
//      $subshare = DB::table('subshare')
//                      ->select('uploads.*','subshare.*','user_parent_track.track_id as track_id','uploads.user_id as user_id','subshare.user_id as sub_user','subshare.percentage as percentage')
//                      ->join('uploads','subshare.track_id','=','uploads.id')
//                      ->join('user_parent_track','user_parent_track.user_id','=','uploads.user_id')
//                      ->where('user_parent_track.user_id',Auth::user()->id)
//                      ->first();
      $subshare = DB::table('uploads')
                  ->select('*')
                  ->join('user_parent_track','user_parent_track.track_id','=','uploads.id')
                  ->where('user_parent_track.user_id',Auth::user()->id)
                  ->first();
      return $subshare;
  }

  /**
   * Get Subshare Detail
   * @param  integer $subshare_id subshare id
   * @return object               subshare details
   */
  public static function getSubshareDetail( $subshare_id = 0 )
  {
      $subshare = DB::table('subshare')
                      ->select('uploads.*','subshare.*','user_parent_track.track_id as track_id','uploads.user_id as user_id','subshare.user_id as sub_user','subshare.percentage as percentage')
                      ->join('uploads','subshare.track_id','=','uploads.id')
                      ->join('user_parent_track','user_parent_track.user_id','=','uploads.user_id')
                      ->where('subshare.id', $subshare_id )
                      ->first();
      return $subshare;
     //  \Helpers::getSubshareDetail( $subshare_id = 0 );
  }

  public static function getsubsharetrack1($subshare_id,$role)
  {
      if($role =="prod")
      {
          $subshare = DB::table('subshare')->select('uploads.*','subshare.*','subshare.track_id as track_id','uploads.user_id as user_id')
                                          ->join('uploads','subshare.track_id','=','uploads.id')
                                          ->where('subshare.id',$subshare_id)
                                          ->first();
          return $subshare;
      }else{
          $subshare = DB::table('uploads')
                  ->select('*')
                  ->join('user_parent_track','user_parent_track.track_id','=','uploads.id')
                  ->where('user_parent_track.user_id',Auth::user()->id)
                  ->first();
          return $subshare;
      }
  }

  // get track file name based on track id.
	public static function getTrackFileName($trackID = 0)
	{
  	$track = DB::table('uploads')->where('id', $trackID)->select("file_name")->first();
  	return (!empty($track->file_name)) ? $track->file_name : '';
  	// \Helpers::getTrackFileName();
	}
      // get roles names that are added by admin panel.
      public static function getSubshareRoleName($roleid = 0)
      {
        $subshareRole = DB::table('subshare_roles')->where('id', $roleid)->select("title")->first();
        return (!empty($subshareRole->title)) ? $subshareRole->title : '';
        // \Helpers::getSubshareRoleName(1)
      }

      // it will generate subshare statement. Return statement will be: ex: // Alice Smith is offering vocals to track Blues On Honey for 3%
      public static function getSubshareStatement($userID = 0, $trackID = 0, $track_title = 0, $percentage = 0)
      {
        $name = \Helpers::getUserFullName($userID);
        $custom_agreement = $name . " has uploaded track " . $track_title . " for " . $percentage."%";
        return $custom_agreement;
      }

        // display subshare notification on user end only.
	public static function getUserSubshareNotification()
	{
	  $notifications = DB::table('calendar_notification')->where('user_id', Auth::user()->id)->get();
	  $notification_ = "";
	  foreach ($notifications as $notifications)
	  {
	      $notification_ .= '<a target="_blank" class="dropdown-item" href="javascript:void(0)"><i class="fa fa-envelope-o" aria-hidden="true"></i><div class="top-notification"><h5>'.  $notifications->notification .'!</h5><span></span></div></a>';
	  }
	  return $notification_;
	}
	// subshare total notifications.
	public static function getUserSubshareTotalNotification()
	{
	  // Based on user id get calender notifications.
	  $results = DB::table('calendar_notification')->where('user_id', Auth::user()->id)->get();
	  $output ='';
	  if ( count($results) > 0 )
	  {
	      $output = '
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="'.url('assets/img/notifications.png').'">
	            <span class="label label-success">'. count($results) .'</span>
	            <div class="down-arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
	      </a>
	      <div class="dropdown-menu drop-down-message" aria-labelledby="dropdownMenuButton">
	      '. \Helpers::getUserSubshareNotification() .'
	      </div>
	      ';
	  }else {
	      $output = ' <img src="'.url('assets/img/calendar.png').'">';
	  }
	  echo $output;
	  // \Helpers::getUserSubshareTotalNotification();
	}
	public static function get_time_ago( $time )
	{
	    $time_difference = strtotime(Carbon::now()->format('Y-m-d H:i:s')) - $time;

	    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
	    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
	                30 * 24 * 60 * 60       =>  'month',
	                24 * 60 * 60            =>  'day',
	                60 * 60                 =>  'hour',
	                60                      =>  'minute',
	                1                       =>  'second'
	    );

	    foreach( $condition as $secs => $str )
	    {
	        $d = $time_difference / $secs;

	        if( $d >= 1 )
	        {
	            $t = round( $d );
	            return '' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
	        }
	    }

      // \Helpers::get_time_ago();
	}
  // \Helpers::get_time_ago();
    ///////////////////////////////////////////////////
    /////////////// User - Admin Helpers //////////////
    ///////////////////////////////////////////////////

		// get posts.
		public static function posts( $user_id = 0 , $showCounter = 3)
		{
			// Custom raw query to get user status.
       // return DB::select( DB::raw("SELECT *,`facebook_posts`.post_id as post_id,facebook_posts.status as status FROM `facebook_posts` inner join `users` on `users`.`id` = `facebook_posts`.`user_id` where users.id = $user_id OR facebook_posts.visibility = 'public' order by `facebook_posts`.`post_id` desc limit $showCounter") );
      $posts_results =  " SELECT *,`facebook_posts`.post_id as post_id,facebook_posts.status as status ";
      $posts_results .= " FROM `facebook_posts`";
      $posts_results .= " inner join `users` on `users`.`id` = `facebook_posts`.`user_id` ";
      $posts_results .= " where users.id = $user_id OR facebook_posts.visibility = 'public' ";
      $posts_results .= " order by `facebook_posts`.`post_id` ";
      $posts_results .= " desc limit $showCounter ";
      $posts_resultsx = DB::raw($posts_results);

      return $posts_resultsx;
			// \Helpers::posts();
		}
		// Save post.
		public static  function add_postx( $user_id, $status="", $file_path = "", $visibility = "public" )
		{
			if(empty($file_path))
			{
				$file_path = 'NULL';
			}

			DB::insert('insert into `facebook_posts` (`post_id`, `user_id`, `status`, `status_image`, `status_time`, `visibility`) VALUES (NULL, ?, ?, ?, ? , ?)', [$user_id, $status, $file_path, \Carbon\Carbon::now() , $visibility]);
			// \Helpers::add_post();
		}
    // User-admin dashboard status updated images.
    public static function statusURL($user_avatar_name = '')
    {
        if ( !empty($user_avatar_name) )
        {
            $user_avatar_url =  base_path() . Config::get('app.status_images') . $user_avatar_name;

            // check file exist.
            if ( !file_exists($user_avatar_url) )
            {
                // set default image.
                $avatar_url =   url( Config::get('app.status_images') . 'male-avatar.jpg');
            } else {
                $avatar_url =   url( Config::get('app.status_images') . $user_avatar_name );
            }
        } else {
            // set default image.
            $avatar_url =  url( Config::get('app.status_images') . 'male-avatar.jpg');
        }
        return $avatar_url;
        // \Helpers::avatarURL()
    }

  // Messages helpers.
  // get inbox counter
  public static function getInboxCount( $user_id = 0 )
  {
       $inbox = \App\Message::where('toUser', $user_id )->where('status', 'normal' )->get();
       echo ( count($inbox) > 0 ) ? count($inbox) : '0';
       // \Helpers::getInboxCount()
  }
  // get trash messages.
  public static function getTrashedCount( $user_id = 0 )
  {
      $trash = \App\Message::where('toUser', $user_id )->onlyTrashed()->get();
      echo ( count($trash) > 0 ) ? count($trash) : '0';
      // \Helpers::getTrashedCount()
  }
}