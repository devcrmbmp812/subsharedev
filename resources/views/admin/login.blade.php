@extends('layouts.admin')
@section('content')
    <section class="login-area">
        <div class="container">
            <div class="login-div">
                <h1>Login</h1>
                <div class="account_box">
                    <a href="sign-up.html">Don't have an account sign up?</a>
                </div>
                <div class="login-form-area">
                    @if(count($errors))
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    @endif

                    <form method="POST" action="{{url('/verify')}}">

                        {{ csrf_field() }}
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="mark@gmail.com">
                        <label>Password</label><a href="#">Forget Password</a>
                        <input type="password" name="password" class="form-control">
                        <button type="submit" class="login-btn btn btn-default">LOGIN</button>
                    </form>
                    <ul class="social-login">

                        <li><a href="#" class="fb-login btn btn-default"><i class="fa fa-facebook-f"></i> LOGIN WITH FACEBOOK</a></li>
                        <li><a href="#" class="google-login btn btn-default"><i class="fa fa-google"></i> LOGIN WITH GOOGLE</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection