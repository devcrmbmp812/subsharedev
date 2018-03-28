<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    public function index(){

    }
    public function saveAudio(Request $request){
        $audio = new Upload;
        $audio->file_name = $request->input('name');
        $audio->duration =$request->input('duration');
        $audio->user_id = 1;
        $audio->save();
        $insertedId = $audio->id;
        echo $insertedId;
    }
    public function saveTrack(Request $request){
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

        $audio->save();
        echo '1';
    }
    public function loadtrack( $filename){
        $audio =  Upload::find($filename);
        return view('user.player',compact('audio'));
    }
    public function saveTag(Request $request){
          foreach ($request->input('audio_value') as $val){
              $data_validate = DB::table('audio_tags')->insert(
                  [
                      'audio_id' => $request->input('last_id'),
                      'tag_data' => $val
                  ]

              );

          }
        return 1;
    }
}
