<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;
use phpDocumentor\Reflection\Types\Integer;
use Socialite;
use App\Settings;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as Carbon; // for date and time.
use App\Role;
class AuthController extends Controller
{
    // Some methods which were generated with the app
    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
		
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that 
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
              
		try{
			$obj = Socialite::driver($provider);
		
			$user = $obj->stateless()->user();
		}
		catch(Exception $ex){
			echo 'exc eption';
			dd($ex);
		}

        $authUser = $this->findOrCreateUser($user);
        if (Auth::attempt(['email' => $authUser['email'], 'password' => $authUser['email']])) {
            // Authentication passed...
            return redirect('/user-dashboard');
        }
        return redirect('login')->with(['status'=>'Your Account has been created with Same Email & Password as Email']);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user)
    {
    
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            return $authUser;
        }
        $name = explode(' ',$user->name);
        $uemail = $user->email;
       $user =  User::create([
            'first_name'     => $name[0],
            'last_name'     => $name[1],
            'email'    => $user->email,
	        'password' => bcrypt($user->email),
	        'token' => 'hdjfhjdhfjdhfjdhf'
			
        ]);
         $lastInsertedId = DB::table('users')->where('email', $uemail)->first();
        $lastInsertedId = $lastInsertedId->id;
        // On Register add settings for each user.
        $options = '{"notification":{"notice_from_anyone":"0","notice_only_people_follow":"1"},"social":{"connect_facebook":"0","connect_twitter":"1"},"preferences":{"purchase_music_in_a_digital_format":"1","purchase_music_in_a_physical_format":"2","willing_to_spend_money_on":"3","stream_music_online":"3"}}';
        DB::table('settings')->insert([
            'user_id'    => $lastInsertedId,
            'options'    => trim($options),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

       $user->roles()->attach(Role::where('name', 'User')->first());
       return $user;
    }
}