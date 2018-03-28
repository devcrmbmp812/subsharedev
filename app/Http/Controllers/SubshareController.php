<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Upload;
use Helpers;
use Auth;
use Illuminate\Support\Facades\Input;
use Session;
use Carbon\Carbon;
use \Validator;
use Illuminate\Support\Facades\View;

class SubshareController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('AuthorizeUser'); // LoggedIn User verification.
    }
    // save response.
    public function response( Request $request )
    {
        // query parameters.
	$response = $request->input('response');
	$subshare = $request->input('subshare');

	$subshare= DB::table('subshare_responses')->where('subshare_id', $subshare)->first();

	// check if subshare response is already exist.
	if ($subshare === null)
	{
		// save subshare response.
		DB::table('subshare_responses')->insert(
		    ['subshare_id' => $request->input('subshare'), 'response' => $request->input('response'), 'created_at' => Carbon::now() ]
		);

		// get subshare created date( created ) from subshare table..
		$subshareCreatedAt = DB::table('subshare')->select('created_at')->where('id', $request->input('subshare'))->first();

		// if subshare created_at is not empty.
		if ( !empty($subshareCreatedAt->created_at)  )
		{
			// calculate subshare response time interval.
			$datetime1 = new \DateTime($subshareCreatedAt->created_at);
			$datetime2 = new \DateTime();
			$interval = $datetime1->diff($datetime2);
			$interval = $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
			$notification = "Subshare response was given ". $interval ." ago.";
		} else {
                       $notification = "";
		}

		// add calendar_notification.
		DB::table('calendar_notification')->insert(
		    [ 'user_id' => Auth::user()->id , 'notification' => $notification ]
		);

	} else {

	  // update response.
	  DB::table('subshare_responses')
	            ->where('subshare_id', $request->input('subshare') )
	            ->update(['response' => $request->input('response'),  'updated_at' => Carbon::now()  ]);
	}

	// redirect with message.
	Session::flash('flashSuccessMessages', 'Subshare response saved Successfully!!');
	return redirect('/subshares');
    }

    public function index()
    {
        $subshares = DB::table('subshare')->select('subshare.*', 'subshare.id as subshare_id','users.*','uploads.*' ,'subshare.track_id as uploadID','subshare.status as status','uploads.id as tracks_id','subshare.user_id as usersub' )
                        ->leftJoin('users', 'users.id', '=', 'subshare.user_id')
                        ->leftJoin('uploads', 'uploads.id', '=', 'subshare.track_id')

                        ->orwhere('uploads.user_id', Auth::user()->id )
                        ->orwhere('subshare.user_id', Auth::user()->id )
                        ->orderBy('subshare.id','desc')
                      // ->where('subshare.user_id','!=',Auth::user()->id)
                        ->paginate(10);


        $data = array('search'=> '','status'=> '');
        return view("user.subshare.index")->with('subshares', $subshares)->with($data);
    }
    public function search()
    {
        $subshares = DB::table('subshare')->select('subshare.*', 'subshare.id as subshare_id','users.*','uploads.*'  ,'subshare.track_id as uploadID')
            ->leftJoin('users', 'subshare.user_id', '=', 'users.id')
            ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')
            ->orderBy('subshare.id','desc')->where('subshare.user_id', Auth::user()->id );

        if(  Input::post('search') !='' )
        {
            $search = Input::post('search');
            // $subshares->where('uploads.track_title',$search);
            $subshares->where('uploads.track_title', 'like', '%'. $search .'%');
        }else{
            $search='';
        }

        if(Input::post('status')!=null){
            $status = Input::post('status');
            $subshares->where('subshare.status',$status);
        }else{
            $status = '';
        }

        $media = $subshares->paginate(10);

        $data = array(
            'search'=> $search,
            'status'=> $status
        );

        return view("user.subshare.index")->with('subshares', $media)->with($data);
    }
    public function show($id)
    {
        // $user= Helpers::userLog('login_activity','Awais Login','Awais Login',5);
        ## get media for specific media id
        $media = DB::table('uploads')
            ->leftJoin('users', 'users.id', '=', 'uploads.user_id')
            ->where('uploads.id', $id)
            ->first();

        ## get all upload against this upload user
        $userID = $media->user_id;
        $userUpload = DB::table('uploads')
            ->where('uploads.user_id', $userID)->limit(5)
            ->get();
        $audio_tags = DB::table('audio_tags')
            ->where('audio_tags.audio_id', $id)
            ->get();
        return view('user.subshare.show')
            ->with('media', $media)
            ->with('audio_tags', $audio_tags)
            ->with('userUpload',$userUpload);
    }

    /*
      offer form.
    */
    public function sub_share()
    {
        $parent_check = DB::table('user_parent_track')->where('user_id',Auth::user()->id)->first();
        if(count($parent_check))
        {
                //->where('subshare.track_id',$parent_check->track_id)
                // get recent 4 subshares.
                $subshares = DB::table('subshare')
                                ->select('*','subshare.created_at as created_at','uploads.id as track_id')
                                ->leftJoin('users', 'users.id', '=', 'subshare.user_id')
                                ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')
                                ->orderBy('subshare.id','desc')
                                ->limit(4)
                                ->get();

                $responses = DB::table('subshare')
                                ->select('*','subshare.created_at as created_at','uploads.id as track_id')
                                ->leftJoin('users', 'users.id', '=', 'subshare.user_id')
                                ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')
                                ->where('subshare.status','pending')
                                ->where('subshare.track_id',$parent_check->track_id)
                                ->orderBy('subshare.id','desc')
                                ->limit(4)
                                ->get();

                $offers = DB::table('subshare')
                                ->select('*','subshare.created_at as created_at','uploads.id as track_id')
                                ->leftJoin('users', 'users.id', '=', 'subshare.user_id')
                                ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')
                                ->where('subshare.status','pending')
                                ->where('subshare.track_id',$parent_check->track_id)
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

                return view('user.subshare.subshare-2',
                       ['subshares' => $subshares,
                        'uploads' => $uploads,
                        'offers' => $offers,
                        'responses'=>$responses
                ]);

        }else{
           Session::flash('error', 'Please add parent track first.');
           return redirect('/your-music');
        }
    }

    /* offer store data */
    public function subshareStore(Request $request)
    {
        if($request->input('myradio') == '1')
        {
            $request->validate([
              'agreement' => 'required|max:255',
            ]);

       }else if($request->input('myradio') == '2') {

           $request->validate([
                'agreement' => 'required|max:255',
                'com2'=>'required',
                'amount2'=>'required',
                'percentage2'=>'required'
            ],[
                'percentage2.required'=>'Percentage is Required',
		        'com2.required'=>'Section Name is Required',
                'amount2.required'=>'Amount is Required',
            ]);

       }else if($request->input('myradio') == '3') {

           $request->validate([
                'agreement' => 'required|max:255',
                'com3'=>'required',
                'amount3'=>'required',
                'percentage3'=>'required'
            ],[
                'percentage3.required'=>'Percentage is Required',
		        'com3.required'=>'Section Name is Required',
                'amount3.required'=>'Amount is Required',
            ]);
       }else if($request->input('myradio') == '4') {
            $request->validate([
                'agreement' => 'required|max:255',
                'amount4'=>'required'
            ],[
                'amount4.required'=>'Amount is Required',
            ]);
       }
        // Save offers in subshare table.
       $id = DB::table('subshare')->insertGetId(
            [
                'user_id'             => Auth::user()->id, // LoggedIn User id.
                'track_id'            => (isset($request->track_id)) ? $request->track_id: '' ,
                'roles'               => (isset($request->role)) ? $request->role : '' ,
                'percentage'          => (isset($request->percentage)) ? $request->percentage : '',
                'custom_agreement'    => (isset($request->agreement)) ? $request->agreement : '',
                'created_at'          => Carbon::now(),
                'status' => 'Pending'
            ]
        );

       if($request->input('myradio') == '1')
       {
           DB::table('subshare')->where('id',$id)->update(
                [
                    'type'             => '1',
                ]
            );
       }else if($request->input('myradio') == '2') {

            DB::table('subshare')->where('id',$id)->update(
                [
                    'type'             => '2',
                    'tsection' => $request->input('com2'),
                    'tamount' => $request->input('amount2'),
                    'tpercentage' => $request->input('percentage2')
                ]
            );

       }else if($request->input('myradio') == '3') {

             DB::table('subshare')->where('id',$id)->update(
                [
                    'type'             => '3',
                    'tsection' => $request->input('com3'),
                    'tamount' => $request->input('amount3'),
                    'tpercentage' => $request->input('percentage3')
                ]
            );

       }else if($request->input('myradio') == '4') {

            DB::table('subshare')->where('id',$id)->update(
                [
                    'type'             => '4',
                    'tamount' => $request->input('amount4')
                ]
            );

       }

        // get track user id.
        $track_user_id =  \Helpers::getTrackUser( $request->track_id );
        // Send email notification to the track uploader/owner.

        // Composed Message notification.
        DB::table('messages')->insert([
            'fromUser'   => Auth::User()->id,
            'toUser'    =>  $track_user_id,   // send message to track owner.
            'subject'    => 'Offer Received',
            'message'    => 'Offer Received From ' . \Helpers::getUserFullName( Auth::user()->id ) ,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

         // Top notification on user-dashbaord of track owner.
         \Helpers::userLog( "Subshare", "Offer Received", "New offer on your track.", $track_user_id , Auth::user()->id );
         // Explanation :
         // $actor - is the person who carry out the action
         // $target - is the person that will receive notification


        // Save user location to display on /user-dashboard map.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://freegeoip.net/json/".$_SERVER['REMOTE_ADDR']."");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = json_decode(curl_exec($ch));
        curl_close($ch);
        // Save locatoni in locations table.
        DB::table('locations')->insert([
            'ip'=>$output->ip,
            'city'=>$output->city,
            'region'=>$output->region_name,
            'country' =>$output->country_name,
            'lat'=>$output->latitude,
            'long'=>$output->longitude,
            'zipcode'=>$output->zip_code
        ]);

        // flash notification.
        Session::flash('flashSuccessMessages', 'Offer Sent Successfully!');
        return redirect("/subshares");
    }

    // Subshare single subshare record to display in subshare detail page.
    public function view( $subshare = '' )
    {
       	$subshareResponse = DB::table('subshare_responses')->where('subshare_id', $subshare)->first();

    	// check if subshare response is already exist.
    	if ($subshareResponse === null)
    	{
          // get records and display the form and subshare statement.
    	  $subshare = DB::table('subshare')->where('id', $subshare)->first();
              return view('user.subshare.view', [ 'subshare' => $subshare, 'response' => 'Response already given for this subshare.' ]);
    	} else {
    	  $subshare = DB::table('subshare')->where('id', $subshare)->first();
              return view('user.subshare.view', [ 'subshare' => $subshare, 'response' => '' ]);
    	}
    }
    // url http://novaturesol.com/subshares/subshare-process/159
    public function subshare_process( $subshare_id = 0 )
    {
        // get IsChanged value.
        $IsChanged = DB::table('subshare')->select('IsChanged')->where('id', $subshare_id )->first();

        $count = DB::table('subshare_tracks')->where('subshare_id',$subshare_id)->get();
        if(!count($count)){
            DB::table('subshare_tracks')->insert([
                'subshare_id'=>$subshare_id
            ]);
        }

        return view('user.subshare.subshare_process', [ 'IsChanged' => $IsChanged->IsChanged ]);
    }
    public function saveSourceTrack(Request $request){
        $result = DB::table('subshare_tracks')->where('subshare_id',$request->input('subshare_id'))->get();

        if(count($result)){
               DB::table('subshare_tracks')->where('subshare_id',$request->input('subshare_id'))
                       ->update([
                           'user_id'=>Auth::user()->id,
                                'source_track'=>$request->input('name'),
                                'source_duration'=>$request->input('duration')
                            ]);
        }else{
            DB::table('subshare_tracks')->insert([
                'user_id'=>Auth::user()->id,
                'subshare_id'=>$request->input('subshare_id'),
                'source_track'=>$request->input('name'),
                'source_duration'=>$request->input('duration'),
                'new_track'=>0,
                'new_duration'=>0
            ]);
        }
        echo '1';
    }
    public function saveNewTrack(Request $request){
        $result = DB::table('subshare_tracks')->where('subshare_id',$request->input('subshare_id'))->get();
        if(count($result)){
               DB::table('subshare_tracks')->where('subshare_id',$request->input('subshare_id'))

                       ->update([
                           'user_id'=>Auth::user()->id,
                                'new_track'=>$request->input('name'),
                                'new_duration'=>$request->input('duration')
                            ]);
        }else{
            DB::table('subshare_tracks')->insert([
                'user_id'=>Auth::user()->id,
                'subshare_id'=>$request->input('subshare_id'),
                'new_track'=>$request->input('name'),
                'new_duration'=>$request->input('duration'),
                'source_track'=>0,
                'source_duration'=>0
            ]);
        }
        echo '1';
    }
     public function producerNewtrack(Request $request){
        if($request->input('producer_new_track1')){
             DB::table('subshare_tracks')->where('subshare_id',$request->input('subshare_id'))
                    ->update([
                         'producer_new_track1'=>$request->input('name'),
                      ]);
        }else{
            DB::table('subshare_tracks')->where('subshare_id',$request->input('subshare_id'))
                    ->update([
                         'producer_new_track'=>$request->input('name'),
                      ]);
        }
        echo '1';
    }
    public function saveProcessInfo(Request $request){

        if($request->input('save1')){
            $result = DB::table('subshare_tracks')->where('subshare_id',$request->input('save1'))->get();
            if(count($result)){
                 DB::table('subshare_tracks')->where('subshare_id',$request->input('save1'))
                               ->update([
                                       'source_initial'=> $request->input('initial_source'),
                                        'source_changes'=>$request->input('changes_source')
                                    ]);
            }else{
                 DB::table('subshare_tracks')
                               ->insert([
                                       'subshare_id',$request->input('save1'),
                                       'source_initial'=> $request->input('initial_source'),
                                        'source_changes'=>$request->input('changes_source')
                                    ]);
            }
            return redirect('/subshare-process/'.$request->input('save1'));
        }else if($request->input('save2')){
            $result = DB::table('subshare_tracks')->where('subshare_id',$request->input('save2'))->get();
            if(count($result)){
                 DB::table('subshare_tracks')->where('subshare_id',$request->input('save2'))
                               ->update([
                                       'new_initial'=>$request->input('initial_new'),
                                        'new_changes'=>$request->input('changes_new')
                                    ]);
            }else{
                 DB::table('subshare_tracks')
                               ->insert([
                                       'subshare_id',$request->input('save2'),
                                       'new_initial'=>$request->input('initial_new'),
                                        'new_changes'=>$request->input('changes_new')
                                    ]);
            }
            return redirect('/subshare-process/'.$request->input('save2'));
        }else if($request->input('producer')=='0'){
                       DB::table('subshare_tracks')->where('subshare_id',$request->input('subshare_id'))
                               ->update([
                                        'streams'=>$request->input('streams'),
                                        'date_achieved'=>$request->input('date_achieved')
                                    ]);
        }else{

            DB::table('subshare_tracks')->where('subshare_id',$request->input('subshare_id'))
                               ->update([
                                        'streams_producer'=>$request->input('streams1'),
                                        'date_achieved_producer'=>$request->input('date_achieved1')
                                    ]);
        }

        echo '1';
    }

    public function subshareUpdate(Request $request)
    {
        // Update all three fileds.
        DB::table('subshare')->where('id',$request->input('subshare_id'))->update(
            [
                'roles'               => (isset($request->roles)) ? $request->roles : '' ,
                'percentage'          => (isset($request->percentage)) ? $request->percentage : '',
                'custom_agreement'    => (isset($request->agreement)) ? $request->agreement : '',
            ]
        );

        // Check If producer change it again.
        if ( isset($request->agreement) )
        {
            if ( $request->input('user_role') == 'prod' )
            {
                // producer.
                DB::table('subshare')->where('id',$request->input('subshare_id'))->update( [
                        'IsChanged'      => '1'  // update 1 is custom agreement is changed again from `producer`.
                ]);

            } else {

                // contributer.
                DB::table('subshare')->where('id', $request->input('subshare_id'))->update( [
                       'IsChanged'      => '0'  // update 1 is custom agreement is changed again from `contributer`.
                ]);
            }
        }
        if($request->input('proceed')){
            return redirect('subshare_proceed/'.$request->input('subshare_id').'');
        }
        // redirect to next step.
        return redirect('subshare-process/'.$request->input('subshare_id').'');
    }
    public function subshare_proceed($id)
    {
        //->where('subshare.track_id',$parent->track_id)
        $parent = DB::table('user_parent_track')->where('user_id',Auth::user()->id)->first();
         // get recent 4 subshares.
        $subshares = DB::table('subshare')
                        ->select('*','subshare.created_at as created_at','uploads.id as track_id','subshare.id as sub_id')
                        ->leftJoin('users', 'users.id', '=', 'subshare.user_id')
                        ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')
                        ->orderBy('subshare.id','desc')

                        ->limit(4)
                        ->get();

        $responses = DB::table('subshare')
                        ->select('*','subshare.created_at as created_at','uploads.id as track_id','subshare.id as sub_id')
                        ->leftJoin('users', 'users.id', '=', 'subshare.user_id')
                        ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')
                        ->where('subshare.status','active')
                        ->where('subshare.track_id',$parent->track_id)
                        ->orderBy('subshare.id','desc')
                        ->limit(4)
                        ->get();

        $offers = DB::table('subshare')
                        ->select('*','subshare.created_at as created_at','uploads.id as track_id','subshare.id as sub_id')
                        ->leftJoin('users', 'users.id', '=', 'subshare.user_id')
                        ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')
                        ->where('subshare.status','pending')
                        ->where('subshare.track_id',$parent->track_id)
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
        $subshare_userid = \Helpers::SubshareUploaderID($id);

        if($subshare_userid == Auth::user()->id){
            $media = DB::table('uploads')
                    ->select('*','uploads.id as uploads_id','uploads.user_id as uploader','subshare.user_id as sub_user')
                    ->join('subshare','subshare.track_id','=','uploads.id')
                    ->join('users','users.id','=','subshare.user_id')
                    ->whereRaw('subshare.track_id = (select track_id from subshare where id = '.$id.')')
                    ->get();
        }else{
            $media = DB::table('uploads')
                    ->select('*','uploads.id as uploads_id','uploads.user_id as uploader','subshare.user_id as sub_user')
                    ->join('subshare','subshare.track_id','=','uploads.id')
                    ->join('users','users.id','=','subshare.user_id')
                    ->where('subshare.id',$id)
                    ->get();
        }
       $user_id = \Helpers::SubshareUploaderID($id);
        $subshare_tracks = DB::table('uploads')
                ->select('*')
                ->leftJoin('user_parent_track','uploads.id','=','user_parent_track.track_id')
                ->where('user_parent_track.user_id',$user_id)
                ->first();

        return view('user.subshare.subshare_proceed',
               ['subshares' => $subshares,
                'uploads' => $uploads,
                'offers' => $offers,
                'responses'=>$responses,
                   'media'=>$media,
                   'subshare_tracks'=>$subshare_tracks
        ]);
    }
    public function subshare_active(Request $request){
        DB::table('subshare')->where('id',$request->input('subshare_id'))
                ->update([
                   'status'=>'active'
                ]);
        return '1';
    }
    public function subshare_load_track(Request $request){
          $pag = View::make("user.subshare.single_track")->with('id', $request->input('subshare_id'))->with('song_name', $request->input('song_name'));
          $pag = $pag->render();
          return $pag;
    }
    public function subshare_submit($id){
//->where('subshare.track_id',$parent->track_id)
        $parent = DB::table('user_parent_track')->where('user_id',Auth::user()->id)->first();
         // get recent 4 subshares.
        $subshares = DB::table('subshare')
                        ->select('*','subshare.created_at as created_at','uploads.id as track_id','subshare.id as sub_id')
                        ->leftJoin('users', 'users.id', '=', 'subshare.user_id')
                        ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')
                        ->orderBy('subshare.id','desc')
                        ->limit(4)
                        ->get();

        $responses = DB::table('subshare')
                        ->select('*','subshare.created_at as created_at','uploads.id as track_id','subshare.id as sub_id')
                        ->leftJoin('users', 'users.id', '=', 'subshare.user_id')
                        ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')
                        ->where('subshare.status','active')
                ->where('subshare.track_id',$parent->track_id)
                        ->orderBy('subshare.id','desc')
                        ->limit(4)
                        ->get();

        $offers = DB::table('subshare')
                        ->select('*','subshare.created_at as created_at','uploads.id as track_id','subshare.id as sub_id')
                        ->leftJoin('users', 'users.id', '=', 'subshare.user_id')
                        ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')
                        ->where('subshare.status','pending')
                        ->where('subshare.track_id',$parent->track_id)
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

        $subshare_userid = \Helpers::SubshareUploaderID($id);

        if($subshare_userid == Auth::user()->id){
            $media = DB::table('uploads')
                    ->select('*','uploads.id as uploads_id','uploads.user_id as uploader','subshare.user_id as sub_user')
                    ->join('subshare','subshare.track_id','=','uploads.id')
                    ->join('users','users.id','=','subshare.user_id')
                    ->whereRaw('subshare.track_id = (select track_id from subshare where id = '.$id.')')
                    ->get();
        }else{
            $media = DB::table('uploads')
                    ->select('*','uploads.id as uploads_id','uploads.user_id as uploader','subshare.user_id as sub_user')
                    ->join('subshare','subshare.track_id','=','uploads.id')
                    ->join('users','users.id','=','subshare.user_id')
                    ->where('subshare.id',$id)

                    ->get();
        }

         $user_id = \Helpers::SubshareUploaderID($id);
        $subshare_tracks = DB::table('uploads')
                ->select('*')
                ->leftJoin('user_parent_track','uploads.id','=','user_parent_track.track_id')
                ->where('user_parent_track.user_id',$user_id)
                ->first();

        return view('user.subshare.subshare_submit',
               ['subshares' => $subshares,
                'uploads' => $uploads,
                'offers' => $offers,
                'responses'=>$responses,
                   'media'=>$media,
                   'subshare_tracks'=>$subshare_tracks
        ]);
    }
    public function subshare_save($id){
        DB::table('subshare')->where('id',$id)
                ->update([
                   'status'=>'completed'
                ]);
        return redirect("/subshares");
    }
    public function add_parent_track(Request $request){
        $result = DB::table('user_parent_track')->where('user_id', Auth::user()->id)->get();
        if(count($result)){
            DB::table('user_parent_track')->where('user_id',Auth::user()->id)
                ->update([
                   'track_id'=>$request->input('track_id')
                ]);
        }else{
            DB::table('user_parent_track')->insert([
                'track_id'=>$request->input('track_id'),
                'user_id'=> Auth::user()->id
            ]);
        }
        return '1';
    }

    public function subshareLastStep( $subshareID = 0 )
    {
        // check if subshare id is not given.
        if ( !empty($subshareID) && $subshareID == 0 ) {
            return redirect('/');  // Redirect to the homepage.
        }

        // get subshare track id based on subshare id.
        $track = DB::table('subshare')->where('id', $subshareID )->select('track_id')->first();

        if ( count($track) > 0 )
        {
            // get list of subshares based on track id.
            $subshareCollection = DB::table('subshare')->join('users','users.id','=','subshare.user_id')->where('track_id', $track->track_id )->get();
        }
        $subshare_tracks = DB::table('uploads')
                        ->select('*')
                        ->leftJoin('subshare','subshare.track_id','=','uploads.id')
                        ->where('subshare.id',$subshareID)
                        ->first();
        $final_track = DB::table('uploads')
                       ->select('uploads.*')
                       ->join('subshare_tracks','subshare_tracks.resubmit_id','=','uploads.id')
                       ->where('subshare_tracks.subshare_id',$subshareID)
                       ->first();

        return view('user.subshare.last_step', ["subshareCollection"=> $subshareCollection,'subshare_tracks'=>$subshare_tracks,'final_track'=>$final_track]);
    }

    // edit offer.
    public function editOffer( $offer_id = '' )
    {
        // check if offer id is not given.
        if ( !empty($offer_id) && $offer_id == 0 ) {
            return redirect('/');  // Redirect to the homepage.
        }


        $parent_check = DB::table('user_parent_track')->where('user_id',Auth::user()->id)->first();
        if(count($parent_check))
        {
                // get recent 4 subshares.
                $subshares = DB::table('subshare')
                                ->select('*','subshare.created_at as created_at','uploads.id as track_id')
                                ->leftJoin('users', 'users.id', '=', 'subshare.user_id')
                                ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')
                                ->orderBy('subshare.id','desc')
                                ->limit(4)
                                ->get();
                // responses tab.
                $responses_tab = DB::table('subshare')
                                ->select('*','subshare.created_at as created_at','uploads.id as track_id')
                                ->leftJoin('users', 'users.id', '=', 'subshare.user_id')
                                ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')
                                ->where('subshare.status','pending')
                                ->where('subshare.track_id',$parent_check->track_id)
                                ->orderBy('subshare.id','desc')
                                ->limit(4)
                                ->get();
                // offer tab.
                $offers_tab = DB::table('subshare')
                                ->select('*','subshare.created_at as created_at','uploads.id as track_id')
                                ->leftJoin('users', 'users.id', '=', 'subshare.user_id')
                                ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')
                                ->where('subshare.status','pending')
                                ->where('subshare.track_id',$parent_check->track_id)
                                ->orderBy('subshare.id','desc')
                                ->limit(4)
                                ->get();

                // Upload tab.
                // get recent 4 uploads.
                $uploads_tab = DB::table('uploads')
                                ->select('*','uploads.id as track_id')
                                ->leftJoin('users', 'users.id', '=', 'uploads.user_id')
                                ->orderBy('uploads.id','desc')
                                ->limit(4)
                                ->get();

                // get offer by offer_id.
                $offer = DB::table('subshare')->where('id', $offer_id )->first();

                return view('user.subshare.edit_offer',
                       ['subshares' => $subshares,
                        'uploads'   => $uploads_tab,
                        'offers'    => $offers_tab,
                        'responses' => $responses_tab,
                        'offer'     => $offer,
                ]);

        }else{
           Session::flash('error', 'Please add parent track first.');
           return redirect('/your-music');
        }

    }
    // update offer.
    public function offerUpdate(Request $request)
    {

       // validation.
       if($request->input('myradio') == '1')
       {
            $request->validate([
              'agreement' => 'required|max:255',
            ]);

       }else if($request->input('myradio') == '2') {

           $request->validate([
                'agreement' => 'required|max:255',
                'com2'=>'required',
                'amount2'=>'required',
                'percentage2'=>'required'
            ],[
                'percentage2.required' => 'Percentage is Required',
                'com2.required'        => 'Section Name is Required',
                'amount2.required'     => 'Amount is Required',
            ]);

       }else if($request->input('myradio') == '3') {

           $request->validate([
                'agreement' => 'required|max:255',
                'com3'=>'required',
                'amount3'=>'required',
                'percentage3'=>'required'
            ],[
                'percentage3.required'=>'Percentage is Required',
                'com3.required'=>'Section Name is Required',
                'amount3.required'=>'Amount is Required',
            ]);

       }else if($request->input('myradio') == '4') {

            $request->validate([
                'agreement' => 'required|max:255',
                'amount4'=>'required'
            ],[
                'amount4.required'=>'Amount is Required',
            ]);

       }

        // offer id.
        $offer_id = $request->offer_id;


DB::enableQueryLog();
        // subshare update.
        DB::table('subshare')
            ->where('id', $offer_id)
            ->update(
                    [
                        'user_id'             => Auth::user()->id, // LoggedIn User id.
                        'track_id'            => (isset($request->track_id)) ? $request->track_id: '' ,
                        'roles'               => (isset($request->role)) ? $request->role : '' ,
                        'percentage'          => (isset($request->percentage)) ? $request->percentage : '',
                        'custom_agreement'    => (isset($request->agreement)) ? $request->agreement : '',
                        'created_at'          => Carbon::now(),
                        'status'              => 'Pending'
                    ]
            );

dd(DB::getQueryLog());

       if($request->input('myradio') == '1')
       {
            DB::table('subshare')->where('id', $offer_id)->update(
                [
                    'type'             => '1',
                ]
            );
       }else if($request->input('myradio') == '2') {

            DB::table('subshare')->where('id', $offer_id)->update(
                [
                    'type'             => '2',
                    'tsection' => $request->input('com2'),
                    'tamount' => $request->input('amount2'),
                    'tpercentage' => $request->input('percentage2')
                ]
            );

       }else if($request->input('myradio') == '3') {

            DB::table('subshare')->where('id', $offer_id)->update(
                [
                    'type'             => '3',
                    'tsection' => $request->input('com3'),
                    'tamount' => $request->input('amount3'),
                    'tpercentage' => $request->input('percentage3')
                ]
            );

       }else if($request->input('myradio') == '4') {

            DB::table('subshare')->where('id', $offer_id)->update(
                [
                    'type'             => '4',
                    'tamount' => $request->input('amount4')
                ]
            );
       }

       // flash notification.
       Session::flash('flashSuccessMessages', 'Offer Updated Successfully!');
       return redirect("/subshares");
    }
}