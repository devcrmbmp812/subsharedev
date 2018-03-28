<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;use DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function search( Request $request )
    {
    if(request()->ajax())
    {
        $q = $request->search;

        $users = DB::table('users')
                ->where('first_name', 'like', '%'.$q.'%')
                ->orWhere('email', 'like','%'.$q.'%')
                ->orWhere('last_name', 'like','%'.$q.'%')
                ->limit(5)
                ->orderBy('id', 'desc')
                ->get();

        $output="";
        foreach ($users as $title)
        {
            $username= $title->first_name;
            $email=     $title->email;
            $b_username='<strong>'.$q.'</strong>';
            $b_email='<strong>'.$q.'</strong>';
            $final_username = str_ireplace($q, $b_username, $username);
            $final_email = str_ireplace($q, $b_email, $email);


        if ( empty($title->image) )
        {
            // set default image.
            $avatar_url =   url( '/assets/avatars/' . 'default-avatar.png');
        } else {
            $avatar_url =   url( '/assets/avatars/' . $title->image );
        }

		$output .=' <div class="show" align="left" style="padding:6px 16px 0px;">';
		$output  .=" <a href='".url('profile/').'/'.$title->id."'><img src='". $avatar_url ."' style='border-radius:50%; width:50px; height:50px; float:left; margin-right:6px;' /><span class=name style='color:#53595d;display: inline-block;'>".  ucfirst($final_username) ."&nbsp;<hr style='margin:0px;'>". $final_email .'</span><hr>';
		$output .=' </div>';

        }
        echo $output;

    }
}

    /**
     * Display user profile.
     *
     */
    public function profile($id = null )
    {

        if ( ! \Helpers::validate($id) ) {
            return redirect("");
        }

        $user = DB::table('users')->where('id', $id)->get();
        return view('user.profile')->with('user', $user);
    }

    // follower_id following_id
    public function follow(Request $request)
    {
        if(request()->ajax())
        {
            $following_id = (!empty($request->id)) ? $request->id : '' ;
            DB::table('followings')->insert(['follower_id' => Auth::user()->id , 'following_id' => $following_id]);

            // Follow save notification.

            \Helpers::userLog("Follow",
		              \Helpers::getUserFullName( Auth::user()->id ) . " is now following you",
		             "<a target='_blank' href='". url('profile/').'/'.Auth::user()->id."'>" . \Helpers::getUserFullName(Auth::user()->id) ."</a>" ." is now following " . "<a target='_blank' href='". url('profile/').'/'.$following_id."'>". \Helpers::getUserFullName($following_id) ."</a>"  ,
		             $following_id ,
		             Auth::user()->id
		             );
        }
        $following = \Helpers::getTotalFollowing( $request->id );
	        $follower = \Helpers::getTotalFollower( $request->id );
	        $subshare = \Helpers::getTotalSubshares( $request->id );
	        return json_encode(array('follow'=>$follower,'following'=>$following,'subshare'=>$subshare));
    }

    public function unfollow(Request $request)
    {
        // Remove Record.
        if(request()->ajax())
        {
            $following_id = (!empty($request->id)) ? $request->id : '' ;

			\Helpers::userLog("Unfollow",
		              \Helpers::getUserFullName( Auth::user()->id ) . " is now following you",
		             "<a target='_blank' href='". url('profile/').'/'.Auth::user()->id."'>" . \Helpers::getUserFullName(Auth::user()->id) ."</a>" ." unfollowed you " . \Helpers::getUserFullName($following_id),
		             $following_id ,
		             Auth::user()->id
		             );


           // remove unfollowed user.
           DB::table('followings')->where('follower_id', Auth::user()->id )->where('following_id', $following_id )->delete();

        }
         $following = \Helpers::getTotalFollowing( $request->id );
	        $follower = \Helpers::getTotalFollower( $request->id );
	        $subshare = \Helpers::getTotalSubshares( $request->id );
	        return json_encode(array('follow'=>$follower,'following'=>$following,'subshare'=>$subshare));
    }

    public function index()
    {
        $users = App\User::all();
        return view('user.profile', ['user' => $users ]);
    }
    /**
     * Display user dashboard.
     *
     */
    public function dashboard()
    {
        ini_set('serialize_precision', '-1');
        $targetSVG = "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z";
        $planeSVG = "M68 13l558 476q12 11 12 26t-12 26L68 1017q-19 16-43.5 7T0 991V39Q0 15 24.5 6T68 13z";
        $data = array();
        $result = DB::table('locations')->get();

        $counter = 1;
        $lat   = array();
        $long  = array();
        $ret = array();
        $images = array();


        // loop lines and images.
        for($i=0;$i<count($result);$i+=1)
        {
           $lat[]= floatval($result[$i]->lat);
           $long[]=floatval($result[$i]->long);
           $images[]= array("svgPath"=> $targetSVG,
                            "title"=>$result[$i]->city,
                            "latitude"=>floatval($result[$i]->lat),
                            "longitude"=>floatval($result[$i]->long)
                      );
        }

       $ret = array(
            "map"=> "worldLow",
           'lines'=>array(array(
                    "id"=>"line1",
                    // "arc"=> -0.85,
                    "alpha"=> 0.3,
                    "latitudes"=> $lat,
                    "longitudes"=> $long
                  ),array (
                    "id"=> "line2",
                    "alpha"=> 0,
                    "color"=> "#000000",
                    "latitudes"=> $lat,
                    "longitudes"=> $long
                  )),'images'=> array_merge($images,array(
                    array(
                    "svgPath"=> $planeSVG,
                    "positionOnLine"=> 0,
                    "color"=> "#000000",
                    "alpha"=>0.1,
                    "animateAlongLine"=> true,
                    "lineId"=> "line2",
                    "flipDirection"=> true,
                    "loop"=> true,
                    "scale"=> 0.01,
                    "positionScale"=> 1.3
                  ),array("svgPath"=> $planeSVG,
                    "positionOnLine"=> 0,
                    "color"=> "#585869",
                    "animateAlongLine"=> true,
                    "lineId"=> "line1",
                    "flipDirection"=> true,
                    "loop"=> true,
                    "scale"=> 0.01,
                    "positionScale"=> 1.8)
                  )),
            );
            $data = array('json_data'=>json_encode($ret));
        return view('user.user-dashboard')->with($data);
    }
}
