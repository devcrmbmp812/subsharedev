<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Notify;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('AuthorizeAdmin');
    }
    public function index( Request $request )
    {
        $this->middleware('auth');
        $request->user()->authorizeRoles(['user','admin']);

		// if admin then redirect to login again.
		if( $request->user()->hasRole(['admin'])  )
		{
			// Auth::logout(); // logout user.
			return redirect('/admin'); // redirect to login page.
		}

		if( $request->user()->hasRole(['user']) )
		{
			return redirect('/user-dashboard');
		}
    }
    public function fetchNotification(Request $request ) {
        //$request->user()->authorizeRoles(['user','admin']);
        // if admin then redirect to login again.
        //if( $request->user()->hasRole(['user'])  ) {
        $result = DB::table('subshare')
            ->select('*')
            ->whereRaw("id NOT IN (SELECT subshare_id FROM notifystatus )")
            ->inRandomOrder()
            ->limit(1)
            ->get();
            return $result;
        //}else{
         //   return "no";
       // }
    }
     public function fetchguestNotification(Request $request ) {
        //$request->user()->authorizeRoles(['user','admin']);
        // if admin then redirect to login again.
        //if( $request->user()->hasRole(['user'])  ) {
        $result = DB::table('subshare')
            ->select('*')
            ->whereRaw("id NOT IN (SELECT subshare_id FROM notifystatus )")
            ->inRandomOrder()
            ->limit(1)
            ->get();
            return $result;
        //}else{
         //   return "no";
       // }
    }
}