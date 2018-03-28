<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Upload;
use Helpers;
use Auth;
use Illuminate\Support\Facades\Input;
class SubsharesController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('AuthorizeAdmin');
    }
    public function index(){
        $subshares = DB::table('subshare')->select('subshare.*', 'subshare.id as subshare_id','users.*','uploads.*' ,'subshare.track_id as uploadID','subshare.status as subshare_status' )
			->leftJoin('users', 'users.id', '=', 'subshare.user_id')
			->leftJoin('uploads', 'uploads.id', '=', 'subshare.track_id')
			->orderBy('subshare.id','desc')->paginate(10);

        $data = array(
            'search'=> '',
            'status'=> ''
        );
        return view("admin.subshare.index")
            ->with('subshares', $subshares)
            ->with($data);
    }
    public function search()
    {
        $subshares = DB::table('subshare')->select('subshare.*', 'subshare.id as subshare_id','users.*','uploads.*'  ,'subshare.track_id as uploadID','subshare.status as subshare_status')
            ->leftJoin('users', 'subshare.user_id', '=', 'users.id')
            ->leftJoin('uploads', 'subshare.track_id', '=', 'uploads.id')
            ->orderBy('subshare.id','desc');

        if(Input::post('search')!=''){
            $search = Input::post('search');
            //$subshares->where('uploads.track_title',$search);
            $subshares->where('uploads.track_title', 'like', '%' .$search.'%' );
        }else{
            $search='';
        }

        if(Input::post('status')!=''){
            $status = Input::post('status');
            $subshares->where('subshare.status', 'like', '%' .$status.'%');
        }else{
            $status = '';
        }
        $media = $subshares->paginate(10);
        $data = array(
            'search'=> $search,
            'status'=> $status
        );
        return view("admin.subshare.index")
            ->with('subshares', $media)
            ->with($data);
    }
    public function show($id)
    {
  //  dd( $id  ); 
    DB::enableQueryLog();

        //$user= Helpers::userLog('login_activity','Awais Login','Awais Login',5);
        ## get media for specific media id
        $media = DB::table('uploads')
		->leftJoin('users', 'users.id', '=', 'uploads.user_id')
		->where('uploads.id', $id)
		->first();


// dd(DB::getQueryLog());

	
        ## get all upload against this upload user
        $userID = $media->user_id;
        $userUpload = DB::table('uploads')
            ->where('uploads.user_id', $userID)->limit(5)
            ->get();
        $audio_tags = DB::table('audio_tags')
            ->where('audio_tags.audio_id', $id)
            ->get();
        return  view('admin.subshare.show')
            ->with('media', $media)
            ->with('audio_tags', $audio_tags)
            ->with('userUpload',$userUpload);
   }
    public function pause($id){
        $updated = DB::table('subshare')
            ->where('id',$id)
            ->update(['status' => 'Pause']);
        if($updated ){
            return redirect('admin/subshare')->with('success','Status Changed Successfully!');
        }else{
            return redirect('admin/subshare')->with('error','Error Occured,Please try again later!');
        }
    }
    public function censor($id){
        $updated = DB::table('subshare')
            ->where('id',$id)
            ->update(['status' => 'Censor']);
        if($updated ){
            return redirect('admin/subshare')->with('success','Status Changed Successfully!');
        }else{
            return redirect('admin/subshare')->with('error','Error Occured,Please try again later!');
        }
    }
    public function active($id){
        $updated = DB::table('subshare')
            ->where('id',$id)
            ->update(['status' => 'Completed']);
        if($updated ){
            return redirect('admin/subshare')->with('success','Status Changed Successfully!');
        }else{
            return redirect('admin/subshare')->with('error','Error Occured,Please try again later!');
        }
    }
    public function destroy($id){
        $updated = DB::table('subshare')
            ->where('id',$id)
            ->update(['status' => 'Deleted']);
        if($updated ){
            return redirect('admin/subshare')->with('success','Status Changed Successfully!');
        }else{
            return redirect('admin/subshare')->with('error','Error Occured,Please try again later!');
        }
    }
}

