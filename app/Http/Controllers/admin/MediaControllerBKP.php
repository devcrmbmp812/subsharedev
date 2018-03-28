<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Upload;
use Helpers;

class MediaController extends Controller
{

    ## get all songs uploaded by users
    public function index(){

        $media = DB::table('uploads')->select('uploads.*', 'uploads.id as uploads_id','users.*')
            ->leftJoin('users', 'users.id', '=', 'uploads.user_id')
            ->orderBy('uploads.id','desc')->limit(5)->get();

        return view("admin.media.index")->with('media', $media);

    }

    public function show($id){
       // $user= Helpers::userLog();

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

        return  view('admin.media.show')
                ->with('media', $media)
                ->with('userUpload',$userUpload);

    }

    public function destroy($id){
        $upload = \App\Upload::find($id);
        $upload->delete();
        return redirect('/admin/media')->with('success','Post Deleted!');
    }


}
