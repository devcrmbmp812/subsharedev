<?php



namespace App\Http\Controllers\admin;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use App\Post;

use Helpers;

use Illuminate\Support\Facades\Input;



class BlogController extends Controller

{

    public function __construct()

    {

        $this->middleware('auth',['except'=>['index','show'] ]);

        $this->middleware('auth');
$this->middleware('AuthorizeAdmin');

        //$request->user()->authorizeRoles(['admin']); // only user is allowed to see it.

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $posts = Post::orderBy('created_at','desc')->paginate(10);

        $data = array(

            'search'=>"",

            'status'=> ""

        );

        return view('admin.blog.index')

            ->with($data)

            ->with('posts',$posts);

    }



    public function search()

    {

        $result = DB::table('posts')

            ->orderBy('posts.id','desc');

        if(Input::post('search')){

            $search = Input::post('search');

            $result->where('title','like', '%'.$search.'%');

        }else{

            $search='';

        }



        if(Input::post('status')){

            $status = Input::post('status');

            $result->where('status',$search);

        }else{

            $status='';

        }

        $posts =$result->paginate(10);



        $data = array(

            'search'=>$search,

            'status'=> $status

        );

        return view('admin.blog.index')

            ->with($data)

            ->with('posts',$posts);

    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('admin.blog.create');

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $this->validate($request,[

            'title'=>'required',

            'body'=>'required',

            'cover_image'=>'image|nullable|max:1999'

        ]);



        if($request->hasFile('cover_image')){

            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get just filename

            $fileName =  pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            // get extension

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $fileName."_".time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/post_images',$fileNameToStore);

        }else{

            $fileNameToStore = 'noimage.jpg';

        }



        $post = new Post;

        $post->title = $request->input('title');

        $post->text = $request->input('body');

        $post->status = "Active";

        $post->image = $fileNameToStore;

        $post->save();

        return redirect('admin/blog')->with('success','Post Created!');

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $post = Post::find($id);

        return view('admin.blog.view')->with('post',$post);

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $post = Post::find($id);

        return view('admin.blog.edit')->with('post',$post);

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

        //dd($request);

        $this->validate($request,[

            'title'=>'required',

            'body'=>'required',

            'cover_image'=>'image|nullable|max:1999'

        ]);



        if($request->hasFile('cover_image')){

            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // Get just filename

            $fileName =  pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            // get extension

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $fileName."_".time().'.'.$extension;

            $path = $request->file('cover_image')->storeAs('public/post_images',$fileNameToStore);

        }else{

            $fileNameToStore = 'noimage.jpg';

        }

        $post = Post::find($id);

        $post->title = $request->input('title');

        $post->text = $request->input('body');

        $post->status = $request->input('status');

        if($request->hasFile('cover_image')) {

            $post->image = $fileNameToStore;

        }

        $post->save();

        return redirect('admin/blog')->with('success','Post Updated!');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $post = Post::find($id);

        $post->delete();

        return redirect('admin/blog')->with('success','Post Deleted!');

    }

}

