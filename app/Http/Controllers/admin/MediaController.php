<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Upload;
use Helpers;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;


class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AuthorizeAdmin');
    }

    ## get all songs uploaded by users
    public function index()
    {
        ## get user playlists
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
        return view("admin.media.index")
            ->with('media', $media)
            ->with($data);

    }
    public function search()
    {

        if ( empty(Input::post('search_track')) && empty(Input::post('sel1')) &&  empty(Input::post('genre')) &&  empty(Input::post('bpm')) &&  empty(Input::post('tokenfield'))  )
        {
          return redirect('/admin/media');
        }

       // DB::enableQueryLog();
       $playlist = DB::table('playlists')->where('user_id',Auth::user()->id)->get();
        $result = DB::table('uploads')->select('uploads.*', 'uploads.id as uploads_id','users.*')
            ->leftJoin('users', 'users.id', '=', 'uploads.user_id')
            ->leftJoin('audio_tags', 'audio_tags.audio_id', '=', 'uploads.id')
            ->groupBy('uploads.id')
            ->orderBy('uploads.id','desc');

        if(Input::post('search_track')){
            $search_track = Input::post('search_track');
            $result->where('uploads.track_title', 'like' ,'%' .$search_track.'%' );
        }else{
            $search_track='';
        }
        if(Input::post('sel1')){
            $percentage = Input::post('sel1');
            $result->where('uploads.track_percentage', 'like' , $percentage );
        }else{
            $percentage ='';
        }
        if(Input::post('genre')){
            $genre = Input::post('genre');
            $result->where('uploads.track_genre', 'like' ,'%' .$genre.'%');
        }else{
            $genre ='';
        }
        if(Input::post('bpm')){
            $bpm = Input::post('bpm');
            $result->where('uploads.track_bpm', 'like' , $bpm );
        }else{
            $bpm='';
        }
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

                    if ( count($searchTags) == $counter ) {

                        $query_str .= ' `tag_data` like "%'.$tags.'%" ';

                    }else{
                    $query_str .= ' `tag_data` like "%'.$tags.'%" OR';
                  }
                    $counter++;
                }

              // $media = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id HAVING count(tag_id) = ".count($searchTags).")"));

              $page = Input::get('searchPage', 1); // Get the ?page=1 from the url.
              $limit = 10; // Number of items per page

              $start_from = ($page-1) * $limit;

              // get total number of records.
              //$results = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id,users.id as id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id )"));

              // $media = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id HAVING count(tag_id) = ".count($searchTags).")"))->paginate(5);
              $media = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id, users.id as id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id ) LIMIT ".$start_from.",". $limit.""));
               $allmedia = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id, users.id as id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id )"));

              $total_pages = ceil( count($allmedia)  / $limit);


            }
            $data = array(
                'search_track'=>$search_track,
                'percentage'=> $percentage ,
                'genre'=>$genre,
                'bpm'=>$bpm,
                'tokenfield'=>$tokenfield,
                'playlist'=>$playlist,
                'total_pages' => $total_pages,
                'total' => count($allmedia),
                'allmedia'=>$allmedia
            );

            return view("admin.media.index")->with('media', $media)->with($data);

        }else{
            $tokenfield='';
        }
        $allmedia =$result->get();
        $media =$result->paginate(10);
        //dd(DB::getQueryLog());
        $data = array(
            'search_track'=>$search_track,
            'percentage'=> $percentage ,
            'genre'=>$genre,
            'bpm'=>$bpm,
            'tokenfield'=>$tokenfield,
            'playlist'=>$playlist,
            'allmedia'=>$allmedia
                );
        return view("admin.media.index")
            ->with('media', $media)
            ->with($data);

    }

    public function show($id){

        //$user= Helpers::userLog('login_activity','Awais Login','Awais Login',5);

        ## get media for specific media id
        $media = DB::table('uploads')
            ->leftJoin('users', 'users.id', '=', 'uploads.user_id')
            ->where('uploads.id', $id)
            ->first();

        ## get all upload against this upload user

        if(isset($media->user_id)==true){
            $userID = $media->user_id;
        }else{
            $userID = '1';
        }
        $userUpload = DB::table('uploads')
            ->where('uploads.user_id', $userID)->limit(5)
            ->get();

        $audio_tags = DB::table('audio_tags')
            ->where('audio_tags.audio_id', $id)
            ->get();
        return  view('admin.media.show')
                ->with('media', $media)
                ->with('audio_tags', $audio_tags)
                ->with('userUpload',$userUpload);

    }

    public function destroy($id){
        $upload = \App\Upload::find($id);
        $upload->delete();
        return redirect('/admin/media')->with('success','Post Deleted!');
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

             // $results = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id )"));


              // $media = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id HAVING count(tag_id) = ".count($searchTags).")"))->paginate(5);
              $media = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id,users.id as id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id ) LIMIT ".$start_from.",". $limit.""));
              $allmedia = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id,users.id as id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id ) "));


              $total_pages = ceil( count($allmedia)  / $limit);

            }
            $playlist = DB::table('playlists')->where('user_id',Auth::user()->id)->get();
            $data = array(
                'total_pages' => $total_pages,
                'playlist'=>$playlist,
                'allmedia'=>$allmedia
            );

            $pag = View::make("admin.media.pagination")->with('media', $media)->with($data);
            $pag = $pag->render();
            return $pag;

    }


}
