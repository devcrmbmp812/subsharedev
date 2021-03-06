@extends('layouts.user')

@section('title','Messages')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/custom-style.css') }}">

<aside class="right-side">

    <ol class="breadcrumb">

        <li><a href="{{ url('/user-dashboard') }}">Dashboard</a>

        </li>

        <li class="active"><a href="{{ url('/messages/') }}"><i class="fa fa-angle-right" aria-hidden="true"></i>Message</a>

        </li>

        <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Reply Message</a>

        </li>

    </ol>


 <section class="submit-content" id="inbox-page">
       @if( Session::get('flashErrorMessages') != null)
            <div class="alert alert-danger">
                <strong>Error!</strong>.
                <br/>
                {{ Session::get('flashErrorMessages') }}
            </div>
        @endif

        @if(count($errors))
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <br/>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="alert alert-info fade in alert-dismissible" style="display: none;" id="autoSave">
            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            <strong>Info!</strong> Message save as draft.
        </div>


        <div class="row">
            <div class="col-md-3 sidebar2" style="height: 610px;">
                <div class="mailbox-content">

                    @include('user.messages.left-sidebar')

                    <div class="clearfix"></div>
                </div>
            </div>
                <div class="col-md-9 table-wrap composeform">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <h2>Reply message</h2>
                                    {{ Form::open(array('url' => 'messages/replyUpdate','id' => 'sendForm' )) }}

                                    {{ Form::token() }}
                                    <!-- email -->
                                    <input class="form-control" placeholder="Email" type="text" name="email" required value="<?php echo $readMessage['Email'] ?>">
                                    <!-- subject -->
                                    <input class="form-control" placeholder="Subject" type="subject" name="subject" value="<?php echo $readMessage['Subject']; ?>">
                                    <!-- message -->
                                    <div class="mess_pnl">
                                        <textarea placeholder="Your message…" id="message" name="message" required><?php echo $readMessage['Message']; ?></textarea>
                                    </div>

                                <!-- message id and touser hidden fields -->
                                <input type="hidden" name="message_id" value="<?php echo $readMessage['MessageID']; ?>">
                                <input type="hidden" name="toUser" value="<?php echo $readMessage['toUser']; ?>">
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row form_pnl">
                        <div class="col-lg-12">
                            <div class="row">
                                <button id="send" type="button" class="btn btn-default" data-dismiss="modal">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

</aside>



<style type="text/css">
  /* Remove help icon from tinymce editor*/
  #mceu_28 , .mce-notification-inner , .mce-close {
    display: none;
  }
</style>



<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {

    var form = document.getElementById("sendForm");
    document.getElementById("send").addEventListener("click", function () {
      form.submit();
    });

    // attach tinymce to the textarea id.
    tinymce.init({
      selector: '#message',
      height: 500,
      menubar: false,
      branding: false,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor textcolor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code help wordcount'
      ],
      toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css']
    });

});
</script>

</aside>
@endsection