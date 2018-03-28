@extends('layouts.guest')
@section('title','Register')
@section('content')
<section class="login-area">
    <div class="container">

        <div class="login-div">

            <h1>Sign Up</h1>

            <div class="account_box">

                <a href="login.html">Already a member,login?</a>

            </div>

            <div class="sign-up-area">
<form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
{{ csrf_field() }}

                            <div class="signup_box">
                                    <div style="color: red;margin-bottom: 10px">

                                        @if ($errors->has('first_name'))

                                                <strong>{{ $errors->first('first_name') }}</strong>

                                        @endif

                                        @if ($errors->has('email'))

                                                <strong>{{ $errors->first('email') }}</strong>

                                        @endif



                                        @if ($errors->has('last_name'))

                                                <strong>{{ $errors->first('last_name') }}</strong>

                                        @endif

                                        @if ($errors->has('password'))

                                                <strong>{{ $errors->first('password') }}</strong>

                                        @endif

                                    </div>



                            <div class="avtar-area">

                                <div class="avatar-image">

                                    <img src="{{'assets/img/person.png'}}">

                                </div>



                                <div class="avator-upload">

                                    <h4>Upload Avatar</h4>

                                    <input type="file" name="cover_image" class="file">



                                    <div class="input-group">

                                        <input type="text" class="form-control input-lg" disabled="" placeholder="Select file">

                                                  <span class="input-group-btn">

                                                    <button class="browse btn btn-primary input-lg" type="button"><i class="fa fa-upload" aria-hidden="true"></i></button>

                                                  </span>

                                    </div>

                                </div>
                        </div>

<script>

    jQuery(document).on('click', '.browse', function () {

        var file = $(this).parent().parent().parent().find('.file');

        file.trigger('click');

    });

    jQuery(document).on('change', '.file', function () {

        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));

    });

</script>
                        <label>First name</label>
                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus placeholder="First Name">
                        <label>Last name</label>
                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus placeholder="Last Name">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="mark@gmail.com">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        <label>Repeat password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        <button type="submit" class="login-btn">Submit</button>
                        <ul class="social-login">
                            <li><a href="{{url('auth/facebook')}}" class="fb-login btn btn-default"><i class="fa fa-facebook-f"></i> LOGIN WITH FACEBOOK</a></li>
                            <li><a href="{{url('auth/google')}}" class="google-login btn btn-default"><i class="fa fa-google"></i> LOGIN WITH GOOGLE</a></li>
                        </ul>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
                    <!--

                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">

                        {{ csrf_field() }}





                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" style="display: none;">

                            <label for="name" class="col-md-4 control-label">Name</label>



                            <div class="col-md-6">

                                <input id="name" type="text" class="form-control" name="name" value="test" required autofocus>



                                @if ($errors->has('name'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('name') }}</strong>

                                    </span>

                                @endif

                            </div>

                        </div>



                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">

                            <label for="first_name" class="col-md-4 control-label">First Name</label>



                            <div class="col-md-6">

                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>



                                @if ($errors->has('first_name'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('first_name') }}</strong>

                                    </span>

                                @endif

                            </div>

                        </div>



                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">

                            <label for="last_name" class="col-md-4 control-label">Last Name</label>



                            <div class="col-md-6">

                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>



                                @if ($errors->has('last_name'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('last_name') }}</strong>

                                    </span>

                                @endif

                            </div>

                        </div>



                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>



                            <div class="col-md-6">

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>



                                @if ($errors->has('email'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('email') }}</strong>

                                    </span>

                                @endif

                            </div>

                        </div>



                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <label for="password" class="col-md-4 control-label">Password</label>



                            <div class="col-md-6">

                                <input id="password" type="password" class="form-control" name="password" required>



                                @if ($errors->has('password'))

                                    <span class="help-block">

                                        <strong>{{ $errors->first('password') }}</strong>

                                    </span>

                                @endif

                            </div>

                        </div>



                        <div class="form-group">

                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>



                            <div class="col-md-6">

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                            </div>

                        </div>



                        <div class="form-group">

                            <div class="col-md-6 col-md-offset-4">

                                <button type="submit" class="btn btn-primary">

                                    Register

                                </button>

                            </div>

                        </div>

                    </form>

 -->
@endsection