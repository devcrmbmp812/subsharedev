<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {

    }

    public function index(){
        $posts = \App\Post::paginate(10);
        $top_two = DB::table('posts')->orderBy('id','desc')->limit(2)->get();
        return view("guest/blog",compact('posts','top_two'));

    }
    public function SinglePost($index){
        
        $posts = \App\Post::find($index);
        DB::enableQueryLog();
        $comments = DB::table('posts')
            ->select('*')
            ->join('users','users.id','=','posts.user_id')
            ->where('posts.id', $index)
            ->limit(1)
            ->get();
        $post_id = $posts->id;
        $login = false;
        if(Auth::check()){
            $login = !$login;
        }
        return view("guest/singlepost",compact('posts','comments','post_id','login'));
    }
    public function saveComment(Request $request){
        $comment  = $request->input('comment');
        $post_id = $request->input('post_id');
       $html = "";
        $add = DB::table('comments')->insert(['text'=>$comment,'user_id'=> auth::user()->id,'post_id'=>$post_id]);
        if($add){
            $html = "<ul><li><img src=". url('assets/img/sample-img.png')."></li><li style='margin-left:10px;width:85%'>".$comment."<span style='float:right;'></span></li></ul>";
        }
        return $html;
    }
}
