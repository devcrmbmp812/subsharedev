<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Role;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as Carbon; // for date and time.
use Illuminate\Support\Facades\Input;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //'name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',

            'language' => 'string|max:255',  // language validation.

            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

            'cover_image'=>'image|nullable|max:1999'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if (isset($data['cover_image']))
        {
            $file = $data['cover_image'];

            // Build the input for validation
            $fileArray = array('cover_image' => $file);


            $rules = array(
              'cover_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000' // max 10000kb
            );

            // Now pass the input and rules into the validator
            $validator = Validator::make($fileArray, $rules);

            // Check to see if validation fails or passes
            if ($validator->fails())
            {
                  return response()->json(['error' => $validator->errors()->getMessages()], 400);
            }
            $imageName = \Helpers::genRandomString() . '.' . $file->getClientOriginalExtension();
            $file->move( base_path() . Config('app.avatars_basepath'), $imageName );

        } else {
          $imageName = "";
        }

        // create a normal user.
    		$user = User::create([
              'first_name'  => (isset($data['first_name'])) ? $data['first_name'] : '',  // first_name.
              'last_name'   => (isset($data['last_name'])) ? $data['last_name'] : '',    // last_name.
              'email'       => $data['email'],
              'status'      => 'Active',                                                 // status by default active .
              'image'       => (isset($imageName)) ? $imageName : '',                    // image.
              'language'    => '',                                                       // language.
    		      'password'    => bcrypt($data['password']),
    		]);

        $lastInsertedId = $user->id;

        // On Register add settings for each user.
        $options = '{"notification":{"notice_from_anyone":"0","notice_only_people_follow":"1"},"social":{"connect_facebook":"0","connect_twitter":"1"},"preferences":{"purchase_music_in_a_digital_format":"1","purchase_music_in_a_physical_format":"2","willing_to_spend_money_on":"3","stream_music_online":"3"}}';
        DB::table('settings')->insert([
            'user_id'    => $lastInsertedId,
            'options'    => trim($options),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        // attach user role.
        $user->roles()->attach(Role::where('name', 'User')->first());

        // Log notification
        $json = "{'user': $lastInsertedId, 'UserProfileUrl': 'user/'.$lastInsertedId, 'UserImage': $imageName }";
        \Helpers::userLog('Register', $user->first_name. ' ' . $user->last_name . ' is now Registerd', $json, $lastInsertedId);

        return $user;
    }
}