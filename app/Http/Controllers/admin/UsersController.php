<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Auth;
use App\User;
use Response;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AuthorizeAdmin');
    }
    public function searchResults( Request $request )
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
                $output  .=" <a href='".url('admin/profile/').'/'.$title->id."'><img src='". $avatar_url ."' style='border-radius:50%; width:50px; height:50px; float:left; margin-right:6px;' /><span class=name style='color:#53595d;display: inline-block;'>".  ucfirst($final_username) ."&nbsp;<hr style='margin:0px;'>". $final_email .'</span><hr>';
                $output .=' </div>';

            }
            echo $output;
        }
    }
    public function index(){

        $users1 = DB::table('users')
            //->select(array('users.id', 'users.first_name', 'users.last_name', 'users.image', DB::raw('COUNT(DISTINCT(followings.following_id)) as Following'), DB::raw('COUNT(DISTINCT(uploads.user_id)) as Total')))
            ->select(array('users.id', 'users.first_name', 'users.last_name', 'users.image', DB::raw('COUNT(followings.following_id) as Following')))
            //->leftjoin('uploads', 'users.id', '=', 'uploads.user_id')
            ->leftjoin('followings', 'users.id', '=', 'followings.following_id')
            ->groupby('users.id', 'users.first_name', 'users.last_name', 'users.image');


        $users2 = DB::table('users')
            //->select(array('users.id', 'users.first_name', 'users.last_name', 'users.image', DB::raw('COUNT(DISTINCT(followings.following_id)) as Following'), DB::raw('COUNT(DISTINCT(uploads.user_id)) as Total')))
            ->select(array('users.id', 'users.first_name', 'users.last_name', 'users.image', DB::raw('COUNT(uploads.user_id) as Total')))
            ->leftjoin('uploads', 'users.id', '=', 'uploads.user_id')
            //->leftjoin('followings', 'users.id', '=', 'followings.following_id')
            ->groupby('users.id', 'users.first_name', 'users.last_name', 'users.image')
            ->union($users1)
            ->get();


        $uploads = DB::raw("(SELECT user_id, count(*) AS num_uploads

		FROM uploads GROUP BY user_id) as uploads");

        $followers = DB::raw("(SELECT A.follower_id, count(*) AS num_followers

            FROM followings AS A GROUP BY A.follower_id) as followers");

        $following = DB::raw("(SELECT B.following_id, count(*) AS num_followings

		FROM followings AS B GROUP BY B.following_id) as followings");

        $users = DB::table('users')
                    ->select('users.id', 'users.status','users.first_name', 'users.last_name', 'users.image', 'uploads.num_uploads', 'followings.num_followings', 'followers.num_followers')
                    ->leftJoin($uploads, 'uploads.user_id', '=', 'users.id')
                    ->leftJoin($followers, 'followers.follower_id', '=', 'users.id')
                    ->leftJoin($following, 'followings.following_id', '=', 'users.id')
                    ->where('id', '!=', Auth::user()->id)
                    ->get();

        // $users = DB::table('users')->where('id', '!=', Auth::user()->id)->paginate(10)->get();

        $data = array('search'=> '','status'=> '');
        return view("admin.user.index")->with($data)->with('users', $users);
    }

    public function search()
    {

        $users1 = DB::table('users')
            //->select(array('users.id', 'users.first_name', 'users.last_name', 'users.image', DB::raw('COUNT(DISTINCT(followings.following_id)) as Following'), DB::raw('COUNT(DISTINCT(uploads.user_id)) as Total')))
            ->select(array('users.id', 'users.first_name', 'users.last_name', 'users.image', DB::raw('COUNT(followings.following_id) as Following')))
            //->leftjoin('uploads', 'users.id', '=', 'uploads.user_id')
            ->leftjoin('followings', 'users.id', '=', 'followings.following_id')
            ->groupby('users.id', 'users.first_name', 'users.last_name', 'users.image');

        $users2 = DB::table('users')
            //->select(array('users.id', 'users.first_name', 'users.last_name', 'users.image', DB::raw('COUNT(DISTINCT(followings.following_id)) as Following'), DB::raw('COUNT(DISTINCT(uploads.user_id)) as Total')))
            ->select(array('users.id', 'users.first_name', 'users.last_name', 'users.image', DB::raw('COUNT(uploads.user_id) as Total')))
            ->leftjoin('uploads', 'users.id', '=', 'uploads.user_id')
            //->leftjoin('followings', 'users.id', '=', 'followings.following_id')
            ->groupby('users.id', 'users.first_name', 'users.last_name', 'users.image')
            ->union($users1)
            ->get();


        $uploads = DB::raw("(SELECT user_id, count(*) AS num_uploads

		FROM uploads GROUP BY user_id) as uploads");

        $followers = DB::raw("(SELECT A.follower_id, count(*) AS num_followers

            FROM followings AS A GROUP BY A.follower_id) as followers");

        $following = DB::raw("(SELECT B.following_id, count(*) AS num_followings

		FROM followings AS B GROUP BY B.following_id) as followings");

        $users_s = DB::table('users')

            ->select('users.id', 'users.status','users.first_name', 'users.last_name', 'users.image', 'uploads.num_uploads', 'followings.num_followings', 'followers.num_followers')

            ->leftJoin($uploads, 'uploads.user_id', '=', 'users.id')

            ->leftJoin($followers, 'followers.follower_id', '=', 'users.id')

            ->leftJoin($following, 'followings.following_id', '=', 'users.id')
            ->where('id', '!=', Auth::user()->id);
            //->get();

        if(Input::post('search')!=null)
        {
            $search = Input::post('search');
            $users_s->where('users.first_name','like', '%'.$search.'%');
            $users_s->orwhere('users.last_name','like', '%'.$search.'%');
 	    $users_s->orwhere(  DB::raw("CONCAT(`first_name`, ' ', `last_name`)")  ,'like', '%'.$search.'%');

        }else{
            $search = '';
        }
        if(Input::post('status')!=null){
            $status = Input::post('status');
            $users_s->where('users.status','like', '%'.$status.'%');
        }else{
            $status = '';
        }
        $data = array(
            'search'=> $search,
            'status'=> $status,
        );
        $users = $users_s->get();

        return view("admin.user.index")
            ->with($data)
            ->with('users', $users);

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $user = User::find($id);
        $userUploads = DB::table('uploads')->where('uploads.user_id', $id)->limit(2)->orderBy('created_at', 'desc')->get();
        return view('admin.user.profile')->with('userUploads',$userUploads)->with('user',$user)->with('profile_id', $id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.user.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = User::find($id);
        return view('admin.genres.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'status'=>'required',
            'cover_image'=>'image|nullable|max:1999'
        ]);

        if($request->hasFile('cover_image')){
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $fileName =  pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            // get extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            $fileNameToStore = $fileName."_".time().'.'.$extension;
           // $path = $request->file('cover_image')->storeAs( base_path() . Config('app.avatars_basepath') ,$fileNameToStore);
           $request->file('cover_image')->move( base_path() . Config('app.avatars_basepath'), $fileNameToStore );

            //dd($fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        //  dd($fileNameToStore);

        $post = User::find($id);
        $post->first_name = $request->input('first_name');
        $post->last_name = $request->input('last_name');
        $post->email = $request->input('email');
        $post->image = $fileNameToStore;
        $post->status = $request->input('status');
        $post->save();
        return redirect('admin/user')->with('success','User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = User::find($id);        
        $post->status = 'Deleted';
        $post->save();

        return redirect('admin/user')->with('success','User Status changed to Deleted!');
    }

    public function censor($id){
        $post = User::find($id);
        $post->status = 'Censor';
        $post->save();

        return redirect('admin/user')->with('success','Status Changed Successfully!');

    }
    public function active($id){
        $post = User::find($id);
        $post->status = 'Active';
        $post->save();
        return redirect('admin/user')->with('success','Status Changed Successfully!');
    }

    public function export()
    {
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=users.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        $reviews = User::all()->where('id', '!=', Auth::user()->id);     
        $columns = array('ID', 'First Name', 'Last Name',  'Language', 'Email', 'Status', 'Cretaed at');
        $callback = function() use ($reviews, $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach($reviews as $review) {
                    fputcsv($file, array($review->id, $review->first_name, $review->last_name, $review->language, $review->email, $review->status, $review->created_at));
            }
            fclose($file);
        };
       return Response::stream($callback, 200, $headers);
    }
}