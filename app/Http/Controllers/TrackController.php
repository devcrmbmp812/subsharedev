<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Auth;



class TrackController extends Controller

{

    public function __construct()

    {

        $this->middleware('auth');

        $this->middleware('AuthorizeUser'); // LoggedIn User verification.

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        return view('user.submit');

    }

}