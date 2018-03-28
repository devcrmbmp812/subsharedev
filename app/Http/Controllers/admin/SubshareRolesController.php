<?php



namespace App\Http\Controllers\admin;



use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;

use Helpers;

use App\SubshareRoles;



class SubshareRolesController extends Controller

{

    public function __construct()

    {

        $this->middleware('auth');
        $this->middleware('AuthorizeAdmin'); // LoggedIn User verification.

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $posts = SubshareRoles::orderBy('created_at','desc')->paginate(10);

        $data = array(

            'search'=>"",

            'status'=> ""

        );

        return view('admin.roles.index')

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

        $posts = SubshareRoles::where('title', $search)

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

        return view('admin.roles.create');

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

        $post = new SubshareRoles;

        $post->title = $request->input('title');

        $post->status =$request->input('status');

        $post->save();

        return redirect('admin/roles')->with('success','Role Created!');

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $post = SubshareRoles::find($id);

        return view('admin.roles.view')->with('post',$post);

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $post = SubshareRoles::find($id);

        return view('admin.roles.edit')->with('post',$post);

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



        $post = SubshareRoles::find($id);

        $post->title = $request->input('title');

        $post->status = $request->input('status');

        $post->save();

        return redirect('admin/roles')->with('success','Role Updated!');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $post = SubshareRoles::find($id);

        $post->delete();

        return redirect('admin/roles')->with('success','Role Deleted!');

    }

}

