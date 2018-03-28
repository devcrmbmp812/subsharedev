<?php



namespace App\Http\Controllers\admin;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;

use Helpers;

use App\Genres;



class GenresController extends Controller

{

    public function __construct()

    {

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

        $posts = Genres::orderBy('created_at','desc')->paginate(10);

        $data = array(

            'search'=>"",

            'status'=> ""

        );

        return view('admin.genres.index')

            ->with($data)

            ->with('posts',$posts);

    }



    public function search()

    {

        if(Input::post('search')){

            $search = Input::post('search');

            //Post::where('title',$search);

        }else{

            $search='';

        }



        if(Input::post('status')){

            $status = Input::post('status');

            //Post::where('status',$status);

        }else{

            $status='';

        }

        $posts = Genres::where('title', $search)

            ->where('status', $status   )

            ->paginate(10);



        $data = array(

            'search'=>$search,

            'status'=> $status

        );

        return view('admin.genres.index')

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

        return view('admin.genres.create');

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

            'status'=>'required'

        ]);

        $post = new Genres;

        $post->title = $request->input('title');

        $post->status =$request->input('status');

        $post->save();

        return redirect('admin/genres')->with('success','Genres Created!');

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $post = Genres::find($id);

        return view('admin.genres.view')->with('post',$post);

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $post = Genres::find($id);

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

        //dd($request);

        $this->validate($request,[

            'title'=>'required',

            'status'=>'required'

        ]);



        $post = Genres::find($id);

        $post->title = $request->input('title');

        $post->status = $request->input('status');

        $post->save();

        return redirect('admin/genres')->with('success','Post Updated!');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $post = Genres::find($id);

        $post->delete();

        return redirect('admin/genres')->with('success','Post Deleted!');

    }

}

