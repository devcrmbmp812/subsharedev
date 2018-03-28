<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Log;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AuthorizeUser'); // LoggedIn User verification.
        DB::enableQueryLog();
    }
     /* compose message */
    public function compose()
    {
       return view('user.messages.compose');
    }
    public function autoCompleteEmail(Request $request)
    {
      $query = $request->get('term','');

      $users = \App\User::where('first_name','LIKE','%'.$query.'%')->get();

      $data=array();
      foreach ($users as $user)
      {
          if ( $user->email != "admin@admin.com") {
              $data[]= array('email'=> $user->email ,'value'=> $user->first_name . ' '. ' - '. $user->email,'id'=>$user->id);
          }
      }
      if(count($data))
           return $data;
      else
          return ['value' => 'No Result Found' , 'email' => '' ,'id' => ''];
    }
    // Inbox Messages.
    public function index()
    {
        // get list of messages.
        $messages = \App\Message::where('toUser', Auth::user()->id )->where('status', 'normal' )->orderBy('id','desc')->paginate(10);
        return view('user.messages.list', ['messages' => $messages]);
    }
    // Sent Messages.
    public function sentMessage()
    {
        // get list of sent messages.
        $sent_messages = \App\Message::where('fromUser', Auth::user()->id )->orderBy('id','desc')->paginate(10);
        return view('user.messages.sent_messages', ['sent_messages' => $sent_messages ]);
    }
     // Starred Messages.
    public function starredMessages()
    {
        $starred = \App\Message::where('toUser', Auth::user()->id )->where('starred', '1' )->where('status', 'normal' )->orderBy('id','desc')->paginate(10);
        return view('user.messages.starred', [ 'starred_messages' => $starred]);
    }
    // Draft Messages.
    public function draft()
    {
        $draft = \App\Message::where('toUser', Auth::user()->id )->where('status', 'draft' )->orderBy('id','desc')->paginate(10);
        return view('user.messages.draft', ['draft_messages' => $draft ]);
    }
    // Trashed Messages.
    public function trash()
    {
        $trashed_messages = \App\Message::where('toUser', Auth::user()->id )->onlyTrashed()->paginate(10);
        return view('user.messages.trash', ['messages' => $trashed_messages ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = \App\Message::find($id);
        $message->delete();
        Session::flash('flashSuccessMessages', 'Message Deleted Successfully!!');
        return redirect('/messages');
    }
    /* Reply Save. */
    public function replyUpdate(Request $request)
    {
        $message_id = Input::get('message_id');
        $toUser = Input::get('toUser');
        $this->validate($request,[
            'email' => 'required|email',
            'message' => 'required|min:5|max:800',
        ],[
            'email.required' => ' The email field is required.',
            'message.required' => ' The message field must have at least 5 characters.',
        ]);
        $result = $this->validateEmail( $request->email );
        if ( $result === true ) {
            Session::flash('flashErrorMessages', 'Email does not exist!!');
            return redirect('/messages/reply/'.$message_id);
        }
        // Save messages.
        DB::table('messages')->insert([
            'fromUser'   => Auth::user()->id,
            'toUser'    =>  $result,  // save send email user id.
            'subject'    => (isset($request->subject)) ? $request->subject : '',
            'message'    => (isset($request->message)) ? $request->message : '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        Session::flash('flashSuccessMessages', 'Reply Sent Successfully!!');
        return redirect('/messages');
    }
    /* Read message */
    public function reply($message_id)
    {
        $readMessage = array();
        $messages = \App\Message::where('id', $message_id )->get()->toArray();
        $readMessage['MessageID']   = (isset($messages['0']['id'])) ? $messages['0']['id'] : '' ;
        $readMessage['Email']       = (isset($messages['0']['toUser'])) ?  $this->getEmail($messages['0']['fromUser']) : '' ; // get toUser email.
        $readMessage['toUser']      = (isset($messages['0']['toUser'])) ?  $messages['0']['toUser'] : '' ; // get toUser email.
        $readMessage['Subject']     = (isset($messages['0']['subject'])) ? $messages['0']['subject'] : '' ;
        $readMessage['Message']     = (isset($messages['0']['message'])) ? $messages['0']['message'] : '' ;
        return view('user.messages.reply', ['readMessage' => $readMessage ]);
    }
    /* Read message */
    public function read($message_id)
    {
        // update read message flag.
        DB::table('messages')->where('id', $message_id)->update(['isRead' => '1']);
        $readMessage = array();
        $messages = \App\Message::where('id', $message_id )->get()->toArray();
        $readMessage['MessageID']   =  (isset($messages['0']['id'])) ? $messages['0']['id'] : '' ;
        $readMessage['Email']       = (isset($messages['0']['toUser'])) ?  $this->getEmail($messages['0']['fromUser']) : '' ; // get toUser email.
        $readMessage['Subject']     = (isset($messages['0']['subject'])) ? $messages['0']['subject'] : '' ;
        $readMessage['Message']     = (isset($messages['0']['message'])) ? $messages['0']['message'] : '' ;
        $readMessage['fromUser']       = (isset($messages['0']['fromUser'])) ?  $this->getEmail($messages['0']['fromUser']) : '' ;
       return view('user.messages.read', ['readMessage' => $readMessage]);
    }
    /* Compose message save */
    public function save(Request $request)
    {
        $this->validate($request,[
                'email' => 'required|email',
                'message' => 'required|min:5|max:800',
            ],[
                'email.required' => ' The email field is required.',
                'message.required' => ' The message field must have at least 5 characters.',
            ]);
            $toEmail = $this->validateEmail( $request->email );
        if ( $toEmail === true ) {
            Session::flash('flashErrorMessages', 'Email does not exist!!');
            return redirect('/messages/compose');
        }
        // Save messages.
        DB::table('messages')->insert([
            'fromUser'   => Auth::user()->id,
            'toUser'    =>  $toEmail,  // save send email user id.
            'subject'    => (isset($request->subject)) ? $request->subject : '',
            'message'    => (isset($request->message)) ? $request->message : '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        // Send email notice.
        $message = (isset($request->message)) ? $request->message : '';

        $to   = $request->email;
        $from = "info@subshare.com";
        $subject = 'New Message Received';
        $headers = "From: " . strip_tags($from) . "\r\n";
        $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        @mail($to, $subject, $message, $headers);

        Session::flash('flashSuccessMessages', 'Message Sent Successfully!!');
        return redirect('/messages');
    }
    // Validate and return email id.
    public function validateEmail($Email='')
    {
        $user = \App\User::where('email', $Email)->first();
        if ($user === null)
        {
          return true;
        }
        $email = \App\User::where('email', $Email )->first()->toArray();
        return $email['id'];
    }
    // get email based on id,.
    public function getEmail($userID='')
    {
        $email = \App\User::where('id', $userID )->first()->toArray();
        return $email['email'];
    }
    public function starred(Request $request)
    {
        $input = $request->all();
        DB::table('messages')->where('id', $input["message"])->update(['starred' => $input["starred"]]);
        return $input["message"] . $input["starred"] ;
    }

    // ajax request save message as draft.
    public function draftSave(Request $request)
    {
        $input = $request->all();
        $email = $input["compose_email"];
        $subject = $input["compose_subject"];
        $message = $input["compose_message"];

        // Save draft message.
        DB::table('messages')->insert([
            'fromUser'   => '',
            'toUser'     => Auth::user()->id,  // save send email user id.
            'subject'    => (isset($input["compose_subject"])) ? $input["compose_subject"] : '',
            'message'    => (isset($input["compose_message"])) ? $input["compose_message"] : '',
            'status'     => 'draft',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
    // mark messages as read. ( Ajax request )
    public function isRead(Request $request)
    {
        if($request->ajax())
        {
            $input = $request->all();
            $messages = $input["messages"];

            // return var_dump($messages);
            if ( count($messages) > 0 ) {
                foreach ($messages as $key => $message_id) {
                    // Update messages as read.
                    DB::table('messages')->where('id', $message_id)->update(['isRead' => '1']);
                }
            }
        }
    }
    // btn starred checkboxes in grid. ( Ajax request )
    public function btnStarred(Request $request)
    {
        if($request->ajax())
        {
            $input = $request->all();
            $messages = $input["starredMessages"];

            // return var_dump($messages);
            if ( count($messages) > 0 ) {
                foreach ($messages as $key => $message_id) {
                    // Update messages as read.
                    DB::table('messages')->where('id', $message_id)->update(['starred' => '1']);
                }
            }
        }
    }
    // btn delete checkboxes in grid. ( Ajax request )
    public function btnDelete(Request $request)
    {
        if($request->ajax())
        {
            $input = $request->all();
            $messages = $input["deleteMessages"];

            // return var_dump($messages);
            if ( count($messages) > 0 ) {
                foreach ($messages as $key => $message_id) {
                    // Update messages as read.
                    DB::table('messages')->where('id', $message_id)->delete();
                }
            }
        }
    }
    // get list of all emails to show as a suggestion list in compose messages.
    public function getEmails()
    {
        $emails = DB::table('messages')->select('email');
        return json_encode($emails);
    }
    // display chat screen.
    public function chat()
    {
        // get list of users to display on right side of the chat.
        $usersCollection = DB::table('messages')->select('toUser','created_at')->groupBy('toUser')->get();
        return view('user.messages.chat', ['usersCollection' => $usersCollection]);
    }
    // get list of messages.
    public function getUserMessages(Request $request)
    {
        if($request->ajax())
        {
            $input = $request->all();
            $user_id = $input["userid"];  // user_id

            // get from messages that are send to the user.
            $usersCollection = DB::table('messages')->where('toUser', $user_id )->orderBy('id','asc')->get();
            $out = "";

            // chat-content start.
            $out .= '  <div class="chat-content">';

            // heading.
            $out .= '            <div class="heading">';
            $out .= '                <div class="chatimg">';
            $out .= '                    <img alt="" src="'. \Helpers::avatarURLret( $user_id ) .'" style="width: 51px;height: 51px">';
            $out .= '                </div>';
            $out .= '                <div class="cahtcont">';
            $out .=                      \Helpers::getUserFullName( $user_id );
            $out .= '                </div>';
            $out .= '                <div class="clearfix"></div>';
            $out .= '           </div>';


            if ( count($usersCollection) > 0 )
            {
                foreach ($usersCollection as $fromMessages)
                {
                    // chat contents.
                    $out .= '           <div class="main-cont">';
                    $out .= '                    <div class="imgchat">';
                    $out .= '                        <img alt="" src="'. \Helpers::avatarURLret( $fromMessages->fromUser ) .'" style="width:51px;height:51px;">';
                    $out .= '                    </div>';
                    $out .= '                    <div class="cont-chat">';
                    $out .= '                        <div class="cont">';
                    $out .= '                        <p> '. $fromMessages->message .'</p>';
                    $out .= '                        </div>';
                    $out .= '                        <div class="datetime">'.  \Carbon\Carbon::parse( $fromMessages->created_at )->format('d/m/y'). ' at ' .\Carbon\Carbon::parse( $fromMessages->created_at )->format('h:i')  .'</div>';
                    $out .= '                    </div>';
                    $out .= '                    <div class="clearfix"></div>';
                    $out .= '           </div>';
                } // foreach end.
            } else {
                    // if no message.
                    if (  empty($out) )
                    {
                        $out .= '           <div class="main-cont">';
                        $out .= '                    <div class="imgchat">';
                        $out .= '                        <img alt="" src="images/side-img-4.jpg">';
                        $out .= '                    </div>';
                        $out .= '                    <div class="cont-chat">';
                        $out .= '                        <div class="cont">';
                        $out .= '                        <p>No messages found.</p>';
                        $out .= '                        </div>';
                        $out .= '                    </div>';
                        $out .= '                    <div class="clearfix"></div>';
                        $out .= '           </div>';
                    }
                }

            $out .= '</div>';  // chat content end.

             // chat/message send box with button.
             $out .= '           <div class="bot-form">';
             $out .= '               <form onSubmit="return false;">';
             $out .= '                   <input placeholder="Your message..." type="text" name="send_message" id="send_message">';
             $out .= '                   <input value="Submit" type="Submit" id="send_button">';
             $out .= '                   <input value="'.$user_id.'" type="hidden" id="user_id">';
             $out .= '                   <div class="clearfix"></div>';
             $out .= '               </form>';
             $out .= '           </div>';

            return $out;

        } // ajax request end.
    }

    public function sendMessage(Request $request)
    {
        if($request->ajax())
        {
            $input = $request->all();
            $user_id = $input["userid"];  // user_id.
            $send_message = $input["sendmessage"];  // send_message.

            // Send/Save message.
           $return = DB::table('messages')->insert([
                'fromUser'   => Auth::user()->id,
                'toUser'     => $user_id,  // save send email user id.
                'subject'    => 'Chat Message',
                'message'    => (isset($send_message)) ? $send_message : '',
                'status'     => 'normal',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            // get from messages that are send to the user.
            $usersCollection = DB::table('messages')->where('toUser', $user_id )->orderBy('id','asc')->get();
            $out = "";
            // chat-content start.
            $out .= '  <div class="chat-content">';
            // heading.
            $out .= '            <div class="heading">';
            $out .= '                <div class="chatimg">';
            $out .= '                    <img alt="" src="'. \Helpers::avatarURLret( $user_id ) .'" style="width: 51px;height: 51px">';
            $out .= '                </div>';
            $out .= '                <div class="cahtcont">';
            $out .=                      \Helpers::getUserFullName( $user_id );
            $out .= '                </div>';
            $out .= '                <div class="clearfix"></div>';
            $out .= '           </div>';

            if ( count($usersCollection) > 0 )
            {
                foreach ($usersCollection as $fromMessages)
                {
                    // chat contents.
                    $out .= '           <div class="main-cont">';
                    $out .= '                    <div class="imgchat">';
                    $out .= '                        <img alt="" src="'. \Helpers::avatarURLret( $fromMessages->fromUser ) .'" style="width:51px;height:51px;">';
                    $out .= '                    </div>';
                    $out .= '                    <div class="cont-chat">';
                    $out .= '                        <div class="cont">';
                    $out .= '                        <p> '. $fromMessages->message .'</p>';
                    $out .= '                        </div>';
                    $out .= '                        <div class="datetime">'.  \Carbon\Carbon::parse( $fromMessages->created_at )->format('d/m/y'). ' at ' .\Carbon\Carbon::parse( $fromMessages->created_at )->format('h:i')  .'</div>';
                    $out .= '                    </div>';
                    $out .= '                    <div class="clearfix"></div>';
                    $out .= '           </div>';
                } // foreach end.
            } else {
                    // if no message.
                    if (  empty($out) )
                    {
                        $out .= '           <div class="main-cont">';
                        $out .= '                    <div class="imgchat">';
                        $out .= '                        <img alt="" src="images/side-img-4.jpg">';
                        $out .= '                    </div>';
                        $out .= '                    <div class="cont-chat">';
                        $out .= '                        <div class="cont">';
                        $out .= '                        <p>No messages found.</p>';
                        $out .= '                        </div>';
                        $out .= '                    </div>';
                        $out .= '                    <div class="clearfix"></div>';
                        $out .= '           </div>';
                    }
                }

            $out .= '</div>';  // chat content end.

             // chat/message send box with button.
             $out .= '           <div class="bot-form">';
             $out .= '               <form onSubmit="return false;">';
             $out .= '                   <input placeholder="Your message..." type="text" name="send_message" id="send_message">';
             $out .= '                   <input value="Submit" type="Submit" id="send_button">';
             $out .= '                   <input value="'.$user_id.'" type="hidden" id="user_id">';
             $out .= '                   <div class="clearfix"></div>';
             $out .= '               </form>';
             $out .= '           </div>';

            return $out;


            return ( $return==true ) ? '1' : '0';

        }
    }
}