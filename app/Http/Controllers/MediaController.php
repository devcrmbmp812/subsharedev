<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Upload;
use Helpers;
use Auth;
use Illuminate\Support\Facades\Input;
use Log;

class MediaController extends Controller
{
   public function __construct()
   {
        $this->middleware('auth');
        $this->middleware('AuthorizeUser');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     ## get all songs uploaded by users
    public function index(){
        $playlist = DB::table('playlists')->where('user_id',Auth::user()->id)->get();
        $media = DB::table('uploads')->select('uploads.*', 'uploads.id as uploads_id','users.*')
                                    ->leftJoin('users', 'users.id', '=', 'uploads.user_id')
                                    ->where('uploads.user_id', Auth::user()->id )->orderBy('uploads.id','desc')->paginate(5);
       $allmedia = DB::table('uploads')->select('uploads.*', 'uploads.id as uploads_id','users.*')
                                    ->leftJoin('users', 'users.id', '=', 'uploads.user_id')
                                    ->where('uploads.user_id', Auth::user()->id )->orderBy('uploads.id','desc')->get();

        $data = array(
            'search_track'=>"",
            'percentage'=> "" ,
            'genre'=>"",
            'bpm'=>"",
            'tokenfield'=>'',
            'playlist'=>$playlist,
            'allmedia'=>$allmedia
        );
        return view("user.yourmusic.index")
            ->with('media', $media)
            ->with($data);
    }

    public function search()
    {


    if ( empty(Input::post('search_track')) && empty(Input::post('sel1')) && empty(Input::post('key_signature')) && empty(Input::post('artist_name')) && empty(Input::post('cos')) &&  empty(Input::post('genre')) &&  empty(Input::post('bpm')) &&  empty(Input::post('tokenfield'))  )
    {
      return redirect('/your-music');
    }

    $playlist = DB::table('playlists')->where('user_id',Auth::user()->id)->get();
    $result = DB::table('uploads')->select('uploads.*', 'uploads.id as uploads_id','users.*')
                ->leftJoin('users', 'users.id', '=', 'uploads.user_id')
                ->leftJoin('audio_tags', 'audio_tags.audio_id', '=', 'uploads.id')
                ->groupBy('uploads.id')
                ->orderBy('uploads.id','desc');

        if(Input::post('search_track')){
            $search_track = Input::post('search_track');
            $result->where('track_title','like'  , '%' . $search_track .'%');
        }else{
            $search_track='';
        }
        if(Input::post('sel1')){
            $percentage = Input::post('sel1');
            $result->where('track_percentage', 'like'  , $percentage );
        }else{
            $percentage ='';
        }
        if(Input::post('genre')){
            $genre = Input::post('genre');
            $result->where('track_genre','like'  , '%' . $genre .'%');
        }else{
            $genre ='';
        }
        if(Input::post('bpm')){
            $bpm = Input::post('bpm');
            $result->where('track_bpm', 'like'  ,'%' .$bpm .'%');
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

              $page = Input::get('searchPage', 1); // Get the ?page=1 from the url
              $limit = 10; // Number of items per page

              $start_from = ($page-1) * $limit;
            $ks = (Input::post('key_signature')) ? Input::post('key_signature') : "%%";
            $tg = (Input::post('genre')) ? Input::post('genre') : "%%";
            $tp = (Input::post('sel1')) ? Input::post('sel1') : "%%";
            $bpm = (Input::post('bpm')) ? Input::post('bpm') : "%%";

            $cos = (Input::post('cos')) ? Input::post('cos') : "%%";
            $filter_str = "AND key_signature like '".$ks."' AND track_title like '%".Input::post('search_track')."%' AND track_genre like '".$tg."' AND track_percentage like '".$tp."' AND track_bpm like '".$bpm."' AND cos like '".$cos."'";
              // $media = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id HAVING count(tag_id) = ".count($searchTags).")"))->paginate(5);
              $media = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id,users.id as id from users inner join uploads on users.id = uploads.user_id where uploads.user_id = ". Auth::user()->id ." AND  uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id ) ".$filter_str." LIMIT ".$start_from.",". $limit.""));
              $allmedia = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id,users.id as id from users inner join uploads on users.id = uploads.user_id where uploads.user_id = ". Auth::user()->id ." AND  uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id ) ".$filter_str."  "));

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

            return view("user.yourmusic.index")->with('media', $media)->with($data);

        }else{
            $tokenfield='';
        }

        $result->where('uploads.user_id', Auth::user()->id );
        $allmedia = $result->get();
        $media = $result->paginate(10);
        $data = array(
	            'search_track'=>$search_track,
	            'percentage'=> $percentage ,
	            'genre'=>$genre,
	            'bpm'=>$bpm,
	            'tokenfield'=>$tokenfield,
	            'playlist'=>$playlist,
	            'allmedia'=>$allmedia
                );

        return view("user.yourmusic.index")
                ->with('media', $media)
                ->with($data);
    }

    public function show($id)
    {
        ## get media for specific media id
        $media = DB::table('uploads')->where('id', $id)->first();

        return view("user.yourmusic.show")->with('media', $media);
    }

    public function destroy($id)
    {
        $upload = \App\Upload::find($id);
        $upload->delete();
        return redirect('/media')->with('success','Media Deleted!');
    }
    public function paginate(Request $request)
    {
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
          //$results = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id from users inner join uploads on users.id = uploads.user_id where uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id HAVING count(tag_id) = ".count($searchTags).")"));
          $media = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id,users.id as id from users inner join uploads on users.id = uploads.user_id where uploads.user_id = ". Auth::user()->id ." AND uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id ) ".$filter_str." LIMIT ".$start_from.",". $limit.""));
          $allmedia = DB::select(DB::raw("select users.*,uploads.*,uploads.id as uploads_id,users.id as id from users inner join uploads on users.id = uploads.user_id where uploads.user_id = ". Auth::user()->id ." AND uploads.id IN (select audio_id from `audio_tags` where ".$query_str." GROUP BY audio_id ) ".$filter_str." "));
          $total_pages = ceil( count($allmedia)  / $limit);

        }

        $playlist = DB::table('playlists')->where('user_id',Auth::user()->id)->get();
        $data = array(
            'total_pages' => $total_pages,
            'playlist'=>$playlist,
            'allmedia'=>$allmedia
        );

        $pag = View::make("user.yourmusic.pagination")->with('media', $media)->with($data);
        $pag = $pag->render();
        return $pag;
    }
}