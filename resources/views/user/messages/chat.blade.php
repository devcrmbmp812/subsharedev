@extends('layouts.user')
@section('title','Chat')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/custom-style.css') }}">

<aside class="right-side">
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Mail</a></li>
            <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Compose</a></li>
        </ol>

        <section class="submit-chat" id="inbox-page">
            <div class="row">

                <div class="alert alert-success" id="message_send" style="display: none;">
                    <strong>Success!</strong>.
                    <br>
                    Message Sent Successfully!!
                </div>

                <div class="col-md-3">
                    <div class="col-md-12 chat-sidebar">
                        <form>
                            <input placeholder="search..." type="text" id="search">
                        </form>
                         <!-- chat left panel start. -->
                        <div class="chat-sec">

                            @if ($usersCollection->count())
                                @foreach($usersCollection as $user)

                                      <div class="chat-pnl" id="{{ $user->toUser }}" style="cursor: pointer">
                                          <div class="row">
                                          <div class="panel_chat">
                                              <div class="img_chat">
                                                  <img alt="" src="{{ \Helpers::usersAvatar( $user->toUser ) }}" style="width: 51px;height: 51px">
                                              </div>
                                              <div class="name_chat"><span><p>{{ \Helpers::getUserFullName( $user->toUser ) }}</p></span></div>
                                          </div>
                                          <div class="date_time">
                                             {{ \Carbon\Carbon::parse( $user->created_at )->format('d/m/y') }}
                                          </div>
                                          </div>
                                      </div>

                                  @endforeach
                            @endif

                        </div>
                        <!-- chat left panel end. -->
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="chatcontent" style="display: none;overflow-y: scroll;height: 600px;"></div>
                </div>
      </div>
    </section>
</aside>

<script type="text/javascript">
  $(document).ready(function(){

        // Search and filter in left-sidebar.
        $("#search").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $(".chat-pnl").filter(function() {
             $(this).toggle( $(this).text().toLowerCase().indexOf(value) > -1 )
          });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $(".chat-pnl").click(function(e){
            e.preventDefault();

            // remove active class from element `.chat-pnl`.
            $('.chat-pnl').removeClass('active');

            // add active class to element `.chat-pnl`.
            $(this).addClass('active');

            // get clicked user id on left panel.
            var user_id = $(this).attr('id');

            $.ajax({
               type:'POST',
               url:'{{ url('/getUserMessages') }}',
               data:{userid:user_id},
               async: false,
               success:function(data) {
                  // console.log( data );
                  $(".chatcontent").css('display','block');
                  $(".chatcontent").html(data);
               }
            });
      });

      // send message.
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
      });

      // if send button clicked.
      $(document).on("click", "#send_button", function(e){

          var send_message = $('#send_message').val(); // get chat / message.
          var user_id = $('#user_id').val();  // get user id.

          // send message.
          $.ajax({
               type:'POST',
               url:'{{ url('/sendMessage') }}',
               data:{userid:user_id,sendmessage:send_message },
               async: false,
               success:function(data) {

                  // $("#message_send").css('display','block');
                  // setTimeout(function() {
                  //      $('#message_send').fadeOut();

                  //     }, 10000 );

                  $(".chatcontent").html(data);
                  $('#message_send').animate({scrollBottom: document.body.scrollHeight},"fast");
               }
            });
      });
});
</script>
@endsection