<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Upload;
use Helpers;
use Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Session;
use Log;
use Carbon\Carbon;
class BrowseController extends Controller
{

   public function checkMedia( $mediaID = 0)
   {
        if ( gettype($mediaID) === 'integer' )
        {
            $media = DB::table('uploads', $mediaID )->first();
            if ($media === null) {
                return abort(404);
            }
        }
    }

    public function flag($trackId='')
    {
        // check media id exist.
        $this->checkMedia( $trackId );

        if (!empty($trackId)) {

            if ( \Helpers::checkFlaggedTrack( $trackId ))
            {
                DB::table('flag_media')->insert(array(
                    array('flag_by' => Auth::user()->id , 'upload_id' => $trackId, 'created_at' => date("Y-m-d H:i:s") ),
                ));
            }
        }

        Session::flash('flashSuccessMessages', 'Media marked as flagged!!');
        return redirect("/browse");
    }
    public function unflag($trackId='')
    {
        DB::table('flag_media')->where('flag_by' , Auth::user()->id)->where('upload_id' , $trackId)->delete();
        Session::flash('flashSuccessMessages', 'UnFlagged media!!');
        return redirect("/browse");
    }
    // Display media in player.
    public function player( $id = 0 )
    {
        $media = DB::table('uploads')
                    ->select('uploads.*','users.*','uploads.id as trackID')
                    ->leftJoin('users', 'users.id', '=', 'uploads.user_id')
                    ->where('uploads.id', $id)->first();

        // $userUpload = DB::table('uploads')->where('uploads.user_id', $userID)->limit(5)->get();
        $audio_tags = DB::table('audio_tags')->where('audio_tags.audio_id', $id)->get();

        // return view("user.browse.player")->with('media', $media)->with('audio_tags', $audio_tags)->with('userUpload',$userUpload);
        return view("user.browse.player")->with('media', $media)->with('audio_tags', $audio_tags);
    }

    public function getTags()
    {
        $trackid=Input::post('trackid');
        $user_id="";
        $track_id="";

        $audio_tags = DB::table('uploads')
        ->join('audio_tags', 'uploads.id', '=', 'audio_tags.audio_id')
        ->where('uploads.id', '=', $trackid)
        ->select('uploads.file_name','uploads.id','uploads.user_id', 'uploads.song_name','audio_tags.tag_data')
        ->get();

        function time_to_second($time){
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
        $track_info = DB::table("uploads")->join('users', 'uploads.user_id', '=', 'users.id')->where('uploads.id',$trackid)->get();
        if(!$slun)
            $slun = 0;
        return  json_encode(array('success' =>  $audio_tags, 'user_id' =>$user_id, 'track_id'=> $track_id,'likes'=>$likes, 'dislike' => $dlikes ,'slun' =>$slun,'track_info'=>$track_info ));
    }
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('AuthorizeUser');
    }

    public function index()
    {
        $playlist = DB::table('playlists')->where('user_id',Auth::user()->id)->get();
        $media = DB::table('uploads')->select('uploads.*', 'uploads.id as uploads_id','users.*')
        ->leftJoin('users', 'users.id', '=', 'uploads.user_id')
        ->orderBy('uploads.id','desc')->paginate(10);
        $allmedia = DB::table('uploads')->select('uploads.*', 'uploads.id as uploads_id','users.*')
        ->leftJoin('users', 'users.id', '=', 'uploads.user_id')
        ->orderBy('uploads.id','desc')->get();

        $data = array(
            'search_track'=>"",
            'percentage'=> "" ,
            'genre'=>"",
            'bpm'=>"",
            'tokenfield'=>'',
            'playlist'=>$playlist,
            'allmedia'=>$allmedia

        );
        return view("user.browse.index")->with('media', $media)->with($data);
    }

    public function search()
    {
          if ( empty(Input::post('search_track')) && empty(Input::post('sel1')) && empty(Input::post('artist_name')) && empty(Input::post('cos')) && empty(Input::post('genre')) && empty(Input::post('bpm')) && empty(Input::post('key_signature')) && empty(Input::post('tokenfield')) && empty(Input::get('page'))  )
          {
              return redirect('/browse');
          }

          $playlist = DB::table('playlists')->where('user_id',Auth::user()->id)->get();
          $result   = DB::table('uploads')->select('uploads.*', 'uploads.id as uploads_id','users.*')
          ->leftJoin('users', 'users.id', '=', 'uploads.user_id')
          ->leftJoin('audio_tags', 'audio_tags.audio_id', '=', 'uploads.id')
          ->groupBy('uploads.id')
          ->orderBy('uploads.id','desc');

            if(Input::post('search_track'))
            {
                $search_track = Input::post('search_track');
                $result->where('track_title', 'like'  , '%' . $search_track .'%' );

            }else{
                $search_track='';
            }

            if(Input::post('sel1'))
            {
                $percentage = Input::post('sel1');
                $result->where('track_percentage', 'like'  ,  $percentage  );
            }else{

                $percentage ='';

            }

            if(Input::post('genre'))
            {
                $genre = Input::post('genre');
                $result->where('track_genre', 'like'  , '%' .$genre .'%' );
            }else{
                $genre ='';
            }

            if(Input::post('bpm'))
            {
                $bpm = Input::post('bpm');
                $result->where('track_bpm', $bpm);
            }else{
                $bpm='';
            }
            // Artist_name
            if(Input::post('artist_name'))
            {
                $artist_name = Input::post('artist_name');

                $checkUser = DB::table('users')
                                ->join('uploads', 'uploads.user_id', '=', 'users.id') // uploads and user_id join.
                                ->select('uploads.user_id')
                                ->where('users.first_name','like', '%'.trim($artist_name).'%')
                                ->orwhere('users.last_name','like', '%'.trim($artist_name).'%')
                                ->orwhere(  DB::raw("CONCAT(`first_name`, ' ', `last_name`)")  ,'like', '%'.trim($artist_name).'%')
                                ->limit(1)
                                ->get();

                                if( ( count($checkUser) > 0 ) && ( !empty( $checkUser[0]->user_id ) )  )
                                {
                                    $result->where('user_id', $checkUser[0]->user_id);
                                } else {
                                    $artist_name='';
                                }

                }else{
                    $artist_name='';
                }

                // key signature filter
                if(Input::post('key_signature'))
                {

                    $key_signature = Input::post('key_signature');
                    $result->where('key_signature', 'like',  $key_signature );

                }else{
                    $key_signature='';
                }

                // combined or single filter
                if(Input::post('cos'))
                {
                   $cos = Input::post('cos');
                   $result->where('cos', 'like', '' . $cos . '');

               }else{
                   $cos='';
               }


                $artist_name = ( Input::post('artist_name') ) ? Input::post('artist_name') : "";

                            // Tag search.
                            if(Input::post('tokenfield'))
                            {
                                    $tokenfield = Input::post('tokenfield');
                                    $query_str ="";
                                    $searchTags = explode(",",$tokenfield);

                                    if ( count($searchTags) > 0)
                                    {
                                        $counter = 1;
                                        foreach ($searchTags as $tag)
                                        {
                                           $tags = trim($tag);

                                           if ( count($searchTags) == $counter )
                                           {

                                            $query_str .= ' `tag_data` like "%'.$tags.'%" ';

                                            }else{
                                                $query_str .= ' `tag_data` like "%'.$tags.'%" OR';
                                            }

                                            $counter++;
                                        }

                                        $page = Input::get('searchPage', 1); // Get the ?page=1 from the url
                                        $limit = 10; // Number of items per page
                                        $start_from = ($page-1) * $limit;

                                        $ks = (Input::post('key_signature')) ? Input::post('key_signature') : "%%";
                                        $tg = (Input::post('genre')) ? Input::post('genre') : "%%";
                                        $tp = (Input::post('sel1')) ? Input::post('sel1') : "%%";
                                        $bpm = (Input::post('bpm')) ? Input::post('bpm') : "%%";
                                        $cos = (Input::post('cos')) ? Input::post('cos') : "%%";


                                        // artisht name.
                                        $artist_name = ( !empty($artist_name) ) ? $artist_name : "%%";

                                        $filter_str = "AND key_signature like '".$ks."' AND track_title like '%".Input::post('search_track')."%' AND track_genre like '".$tg."' AND track_percentage like '".$tp."' AND track_bpm like '".$bpm."' AND cos like '".$cos."' AND users.first_name like '".$artist_name."'";
                                        $media = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id,users.id as id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id ) ".$filter_str." LIMIT ".$start_from.",". $limit.""));
                                        $allmedia = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id,users.id as id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id ) ".$filter_str." "));
                                        $total_pages = ceil( count($allmedia)  / $limit);

                                    }

                                    $data = array(
                                        'search_track'=>$search_track,
                                        'percentage'=> $percentage ,
                                        'genre'=>$genre,
                                        'bpm'=>$bpm,


                                        'cos'           => $cos,
                                        'key_signature' => $ks,
                                        'artist_name'   => ( $artist_name != "%%") ?  $artist_name : '' ,  // artist name.

                                        'tokenfield'=>$tokenfield,
                                        'playlist'=>$playlist,
                                        'total_pages' => $total_pages,
                                        'total' => count($allmedia),
                                        'allmedia' => $allmedia
                                    );
                                return view("user.browse.index")->with('media', $media)->with($data);

                            }else{
                                $tokenfield='';
                            }


                    $allmedia = $result->get();
                    $media = $result->paginate(5);

                    $data = array(
                        'search_track'=>$search_track,
                        'percentage'=> $percentage ,
                        'genre'=>$genre,
                        'bpm'=>$bpm,
                        'tokenfield'=>$tokenfield,
                        'playlist'=>$playlist,
                        'allmedia' => $allmedia,
                        'cos' => $cos,


                        'artist_name' => $artist_name,

                        'key_signature' => $key_signature,
                        'artist_name' => $artist_name  // artist_name
                    );

                    return view("user.browse.index")
                            ->with('media', $media)
                            ->with($data);
                }

                public function show($id)
                {
    ## get media for specific media id

                    $media = DB::table('uploads')

                    ->leftJoin('users', 'users.id', '=', 'uploads.user_id')

                    ->where('uploads.id', $id)

                    ->first();

    # get all upload against this upload user.
                    $userID = $media->user_id;
                    $userUpload = DB::table('uploads')
                    ->where('uploads.user_id', $userID)->limit(5)
                    ->get();

                    $audio_tags = DB::table('audio_tags')

                    ->where('audio_tags.audio_id', $id)

                    ->get();

                    return view("user.browse.show")

                    ->with('media', $media)

                    ->with('audio_tags', $audio_tags)

                    ->with('userUpload',$userUpload);

                }



                public function destroy($id)

                {

                    $upload = \App\Upload::find($id);

                    $upload->delete();

                    Session::flash('flashSuccessMessages', 'Media Deleted Successfully !!');

                    return redirect('/browse');

                }
                public function paginate(Request $request){

                    $tokenfield = Input::post('tags');
                    $query_str ="";
                    $searchTags = explode(",",$tokenfield);

                    if ( count($searchTags) > 0)
                    {
                        $counter = 1;
                        foreach ($searchTags as $tag)
                        {
                           $tags = trim($tag);

                           if ( count($searchTags) == $counter ) {

                            $query_str .= ' `tag_data` like "%'.$tags.'%" ';

                        }else{
                            $query_str .= ' `tag_data` like "%'.$tags.'%" OR';
                        }
                        $counter++;
                    }

              $page = Input::post('next', 1); // Get the ?page=1 from the url
              $limit = 10; // Number of items per page

              $start_from = ($page-1) * $limit;
            $ks = (Input::post('key_signature')) ? Input::post('key_signature') : "%%";
            $tg = (Input::post('genre')) ? Input::post('genre') : "%%";
            $tp = (Input::post('sel1')) ? Input::post('sel1') : "%%";
            $bpm = (Input::post('bpm')) ? Input::post('bpm') : "%%";
            $cos = (Input::post('cos')) ? Input::post('cos') : "%%";
            $filter_str = "AND key_signature like '".$ks."' AND track_title like '%".Input::post('search_track')."%' AND track_genre like '".$tg."' AND track_percentage like '".$tp."' AND track_bpm like '".$bpm."' AND cos like '".$cos."'";

              $results = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id )"));


              // $media = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id HAVING count(tag_id) = ".count($searchTags).")"))->paginate(5);
              $media = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id,users.id as id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id ) ".$filter_str." LIMIT ".$start_from.",". $limit.""));
              $allmedia = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id,users.id as id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id ) ".$filter_str." "));

              // echo $results;

              $total_pages = ceil( count($results)  / $limit);

              // dd(DB::getQueryLog());

              // select users.*,uploads.*,uploads.id as uploads_id from users inner join uploads     on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id HAVING count(tag_id) = ".count($searchTags)."
              // select count(*) as                                from `users` inner join `uploads` on `users`.`id` = `uploads`.`user_id` where uploads.id IN (select audio_id from `audio_tags` where  `tag_data` like "%Bass%"  GROUP BY audio_id HAVING count(tag_id) = 1) is null

          }
          $playlist = DB::table('playlists')->where('user_id',Auth::user()->id)->get();
          $data = array(
            'total_pages' => $total_pages,
            'playlist'=>$playlist,
            'allmedia'=>$allmedia
        );

          $pag = View::make("user.browse.pagination")->with('media', $media)->with($data);
          $pag = $pag->render();
          return $pag;

      }
      public function fetch_lists(){

           $playlist = DB::table('playlists')->where('user_id', Auth::user()->id)->get();
           $playlist_html = "<ul class='tab-blues'>";
            foreach ($playlist as $list) {
               $playlist_html .= '<li class="fuse_li" style="background: #3fe38c; padding: 15px; height: 43px; width: auto; font-size: 16px;"><img style="width: 15px;margin-top: -4px;" src="'. url("assets/img/close.png").'" onclick="delete_playlist('.$list->id.')"><label class="radio-inline" onclick="add_to_myplaylist(' . $list->id . ')"><input style="display:none;" type="radio" name="optradio">' . $list->name . '</label></li>';
            }
            if (!count($playlist) > 0) {
                $playlist_html .= '<li>No Playlist Found.</li>';
            }
            $playlist_html .= "</ul>";
          return $playlist_html;
      }
       public function savenewlists(Request $request) {

        $id = DB::table('playlists')->insertGetId([
            'user_id' => Auth::user()->id,
            'name' => $request->input('list'),
            'created_at' => Carbon::today(),
            'updated_at' => Carbon::today()
        ]);
        $lists = $this->fetch_lists();
        return $lists;
    }
    public function deletecurrentlist(Request $request){
        DB::table('playlists')->where('id', $request->input('list'))->delete();
        $lists = $this->fetch_lists();
        return $lists;
    }
    public function add_to_playlist(Request $request){
        $result = DB::table('playlists_tracks')->where('playlist_id', $request->input('list_id'))->where('track_id', $request->input('track_id'))->get();

        if (count($result)) {
            return '<div class="alert alert-danger"><strong>Error!</strong> Track already exists in playlist.</div>';
        } else {

            DB::table('playlists_tracks')->insert([
                'playlist_id' => $request->input('list_id'),
                'track_id' => $request->input('track_id')
            ]);

            return '<div class="alert alert-success"><strong>Success!</strong> Track Added to playlist.</div>';;
        }
    }

  }