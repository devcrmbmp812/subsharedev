<?php



namespace App\Http\Controllers;



use App\Upload;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Auth;

use Illuminate\Support\Facades\Input;
use Carbon\Carbon;


class AudioController extends Controller

{

    public function index(){



    }

    public function saveAudio(Request $request){

        $audio = new Upload;

        $audio->file_name = $request->input('name');

        $audio->duration =$request->input('duration');

        $audio->user_id = 1;

        $audio->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $audio->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        $audio->save();

        $insertedId = $audio->id;
        
        if($request->input('resub')){
            DB::table('subshare_tracks')->where('subshare_id',$request->input('resub'))
            ->update([
                'resubmit_id' => $insertedId
            ]);
        }
        echo $insertedId;

    }



    public function saveTrack(Request $request)

    {

        // get track form values.

        $track_title        =  (Input::has('track_title'))       ? $request->track_title         : '' ;
        $track_inspiration  =  (Input::has('track_inspiration')) ? $request->track_inspiration   : '' ;
        $track_bpm          =  (Input::has('track_bpm'))         ? $request->track_bpm           : '' ;
        $track_genre        =  (Input::has('track_genre'))       ? $request->track_genre         : '' ;
        $track_age          =  (Input::has('track_age'))         ? $request->track_age           : '' ;
        $last_id            =  (Input::has('last_id'))           ? $request->last_id             : '' ;
        $track_per          =  (Input::has('track_percentage'))  ? $request->track_percentage    : '' ;
        $key_signature      =  (Input::has('key_signature'))     ? $request->key_signature       : '' ;
        $cos                =  (Input::has('cos'))               ? $request->cos       : '' ;



        $data = array(

            'track_title'       => $track_title,

            'track_inspiration' => $track_inspiration,

            'track_bpm'         => $track_bpm,

            'track_genre'       => $track_genre,

            'track_age'         => $track_age,

            'last_id'           => $last_id,

            'track_percentage'  => $track_per,

            'key_signature'  => $key_signature,

            'key_signature'  => $cos

        );



        // Upload track cover_img.

        if ($request->has('cover_img'))
        {
            $imageName = \Helpers::genRandomString() . '.' . $request->file('cover_img')->getClientOriginalExtension();
            $request->file('cover_img')->move( base_path() . Config('app.audio_url'), $imageName );
        }



        $audio =  Upload::find($data['last_id']);
        $audio->track_title        = $track_title;
        $audio->track_inspiration  = $track_inspiration;
        $audio->track_bpm          = $track_bpm;
        $audio->track_age          = $track_age;
        $audio->track_genre        = $track_genre;
        $audio->track_percentage   = $track_per;
        $audio->key_signature      = $key_signature; // key_signature
        $audio->cos                = $cos;           // key_signature

        $audio->cover_img          = (isset($imageName)) ? $imageName : '';  // cover_img
        $audio->user_id            = Auth::user()->id;
        $audio->created_at         = Carbon::now()->format('Y-m-d H:i:s');
        $audio->updated_at         = Carbon::now()->format('Y-m-d H:i:s');
        $audio->save();
        echo '1';
    }

    public function saveTrack_old(Request $request){

        $data = array(

            'track_title'=>$request->input('track_title'),

            'track_inspiration'=>$request->input('track_inspiration'),

            'track_bpm'=>$request->input('track_bpm'),

            'track_genre'=>$request->input('track_genre'),

            'track_age'=>$request->input('track_age'),

            'last_id'=>$request->input('last_id')

        );

        $audio =  Upload::find($data['last_id']);

        $audio->track_title = $request->input('track_title');

        $audio->track_inspiration =$request->input('track_inspiration');

        $audio->track_bpm = $request->input('track_bpm');

        $audio->track_age = $request->input('track_age');

        $audio->track_genre = $request->input('track_genre');

        $audio->track_percentage = $request->input('track_range');

        $audio->user_id = Auth::user()->id;



        $audio->save();

        echo '1';

    }

    public function loadtrack( $filename){

        $audio =  Upload::find($filename);

        return view('user.player',compact('audio'));

    }

    public function saveTag(Request $request){

        // if no save tag are submitted.

        if ( $request->input('audio_value') != null )

        {

            foreach ($request->input('audio_value') as $val){

                $data_validate = DB::table('audio_tags')->insert(

                    [

                        'audio_id' => $request->input('last_id'),

                        'tag_data' => $val

                    ]



                );



            }

        }

        return 1;

    }

}

