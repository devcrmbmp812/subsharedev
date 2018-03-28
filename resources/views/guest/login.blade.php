@extends('layouts.guest')
@section('title', 'Login')

@section('content')

<section class="login-area">
    <div class="container">
        <div class="login-div">
            <h1>Login</h1>
            <div class="account_box">
                <a href="sign-up.html">Don't have an account sign up?</a>
            </div>
            <div class="login-form-area">
                <form>
                    @if (isset($status))
                        <div class="alert alert-success">
                            <li> <?php echo $status; ?> </li>
                        </div>
                    @endif
                    <label>Email</label>
                    <input class="form-control" placeholder="mark@gmail.com" type="text">
                    <label>Password</label><a href="#">Forget Password</a>
                    <input class="form-control" type="password">
                    <input type="hidden" name="_token" value="{{ csrf_field() }}">
                    <button type="button" class="login-btn btn btn-default">LOGIN</button>
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