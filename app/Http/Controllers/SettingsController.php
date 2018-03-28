<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
// use Illuminate\Http\Request;
use Hash;
use Validator;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AuthorizeUser'); // LoggedIn User verification.
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd( \Request::all() );

        // update social, preference, settings.
        $this->update_settings( \Request::all() );


        $current_time = Carbon::now()->timestamp;

        if ($request->has('avator'))
        {
            // echo $request->file('avator');
            $imageName = $current_time.'_' .$current_time . '.' . $request->file('avator')->getClientOriginalExtension();

            // $request->file('avator')->move( base_path() . '/public/avatars/', $imageName );
            $request->file('avator')->move( base_path() . Config('app.avatars_basepath'), $imageName );
        }
        // get user values.
        $email      = (  \Request::input('email') !== null     )? \Request::input('email') : '' ;
        $first_name = (  \Request::input('first_name') !== null)? \Request::input('first_name') : '' ;
        $last_name  = (  \Request::input('last_name') !== null )? \Request::input('last_name') : '' ;
        $password   = (  \Request::input('password') !== null  )? bcrypt(\Request::input('password')) : '' ;
        $language   = (  \Request::input('language') !== null  )? \Request::input('language') : '';  // get language.

        // find user and update.
        $id = Auth::user()->id;
        $user = User::find($id);

        if (!empty($user->email)) {
            $user->email = $email;
        }
        if (!empty($user->first_name)) {
            $user->first_name = $first_name;
        }
        if (!empty($user->last_name)) {
            $user->last_name = $last_name;
        }
        if ( !empty($password) ) {
            $user->password = $password;
        }
        if ( !empty($user->language)) {
            $user->language = $language;
        }
        if ( isset($imageName)) {
            $user->image = $imageName;
        }
        $user->save();
        // redirect to settings.
        return redirect('/settings');
    }

    public function update_settings($input=null)
    {
        if ( isset($input['notification']) )
        {
            if ( ( $input['notification'] == "notice_from_anyone") )
            {
               $this->update_value('notification', 'notice_from_anyone', '1'); // checked notice_from_anyone
               $this->update_value('notification', 'notice_only_people_follow', '0');
            } else { // opif
                $this->update_value('notification', 'notice_only_people_follow', '1');  // checked notice_only_people_follow
                $this->update_value('notification', 'notice_from_anyone', '0');
            }
        }

        // facebook update.
        if ( isset($input['facebook']) && ( $input['facebook'] == "facebook" )   )
        {
            $this->update_value('social', 'connect_facebook', '1'); // checked connect_facebook
        } else {
            $this->update_value('social', 'connect_facebook', '0');
        }

        // twitter update.
        if (  isset($input['twitter']) && ( $input['twitter'] == "twitter") )
        {
            $this->update_value('social', 'connect_twitter', '1');  // checked connect_twitter

        } else {
            $this->update_value('social', 'connect_twitter', '0');
        }

        // preference update.
        if (  isset($input['purchase_music_in_a_digital_format']) )
        {
            $this->update_value('preferences', 'purchase_music_in_a_digital_format', $input['purchase_music_in_a_digital_format']);  // checked connect_twitter
        }

        if (  isset($input['purchase_music_in_a_physical_format']) )
        {
            $this->update_value('preferences', 'purchase_music_in_a_physical_format', $input['purchase_music_in_a_physical_format']);
        }

        if (  isset($input['willing_to_spend_money_on']) )
        {
            $this->update_value('preferences', 'willing_to_spend_money_on', $input['willing_to_spend_money_on']);
        }

        if (  isset($input['stream_music_online']) )
        {
            $this->update_value('preferences', 'stream_music_online', $input['stream_music_online']);
        }
    }
    public function update_value($key='', $subkey='', $value='')
    {
       $result_notification = \App\Settings::where('user_id', Auth::user()->id)->select('options')->get()->toArray(); // checked
       $notification = json_decode($result_notification[0]['options'], true);

       // Update json;
       $notification[$key][$subkey] = $value;

       $json_encode = json_encode($notification);
       DB::table('settings')->where('user_id', Auth::user()->id)->update(['options' => $json_encode]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result_notification = \App\Settings::where('user_id', Auth::user()->id)->select('options')->get()->toArray(); // checked
        $data = json_decode($result_notification[0]['options'], true);

        // dd($data);
        $notification = ($data['notification']["notice_from_anyone"] == '1') ? true : false ;
        $social_facebook = ($data['social']["connect_facebook"] == '1') ? true : false ; // facebook
        $social_twitter = ($data['social']["connect_twitter"] == '1') ? true : false ; // facebook

        // purchase_music_in_a_digital_format
        if ( ($data['preferences']["purchase_music_in_a_digital_format"] == '1') ) {
            $preference_digital_format = '1';
        } elseif ( ($data['preferences']["purchase_music_in_a_digital_format"] == '2') ) {
            $preference_digital_format = '2';
        } elseif ( ($data['preferences']["purchase_music_in_a_digital_format"] == '3') ) {
            $preference_digital_format = '3';
        }

        // purchase_music_in_a_physical_format
        if ( ($data['preferences']["purchase_music_in_a_physical_format"] == '1') ) {
            $purchase_music_in_a_physical_format = '1';
        } elseif ( ($data['preferences']["purchase_music_in_a_physical_format"] == '2') ) {
            $purchase_music_in_a_physical_format = '2';
        } elseif ( ($data['preferences']["purchase_music_in_a_physical_format"] == '3') ) {
            $purchase_music_in_a_physical_format = '3';
        }

        //willing_to_spend_money_on
        if ( ($data['preferences']["willing_to_spend_money_on"] == '1') ) {
            $willing_to_spend_money_on = '1';
        } elseif ( ($data['preferences']["willing_to_spend_money_on"] == '2') ) {
            $willing_to_spend_money_on = '2';
        } elseif ( ($data['preferences']["willing_to_spend_money_on"] == '3') ) {
            $willing_to_spend_money_on = '3';
        }


            // stream_music_online
        if ( ($data['preferences']["stream_music_online"] == '1') ) {
            $stream_music_online = '1';
        } elseif ( ($data['preferences']["stream_music_online"] == '2') ) {
            $stream_music_online = '2';
        } elseif ( ($data['preferences']["stream_music_online"] == '3') ) {
            $stream_music_online = '3';
        }



         return view('user.settings')->with(['notification'=> $notification, 'social_facebook' => $social_facebook,
         'social_twitter' => $social_twitter,'preference_digital_format' => $preference_digital_format,
          'purchase_music_in_a_physical_format' => $purchase_music_in_a_physical_format
           ,'willing_to_spend_money_on' => $willing_to_spend_money_on
          ,'stream_music_online' => $stream_music_online
          ]); // edit-profile


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}