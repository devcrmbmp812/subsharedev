@extends('layouts.guest')

@section('title', 'Signup')



@section('content')

<section class="login-area">

    <div class="container">

        <div class="login-div">

            <h1>Sign Up</h1>

            <div class="account_box">

                <a href="login.html">Already a member,login?</a>

            </div>

            <div class="sign-up-area">



                <form role="form" action="" method="post">

                    <div class="signup_box">

                            <div class="avtar-area">

                                <div class="avatar-image">

                                    <img src="img/person.png">

                                </div>

                                <div class="avator-upload">

                                    <h4>Upload Avatar</h4>

                                    <input name="img[]" class="file" type="file">



                                    <div class="input-group">

                                        <input class="form-control input-lg" disabled="" placeholder="Select file" type="text">

                                                  <span class="input-group-btn">

                                                    <button class="browse btn btn-primary input-lg" type="button"><i class="fa fa-upload" aria-hidden="true"></i></button>

                                                  </span>

                                    </div>

                                </div>

                            </div>

                            <label>First name</label>

                            <input class="form-control" placeholder="mark@gmail.com" type="text">

                            <label>Last name</label>

                            <input class="form-control" placeholder="mark@gmail.com" type="text">

                            <label>Email</label>

                            <input class="form-control" placeholder="mark@gmail.com" type="email">

                            <label>Password</label>

                            <input class="form-control" type="password">

                            <label>Pepeat password</label>

                            <input class="form-control" type="password">

                             <button type="submit" class="login-btn">Submit</button>

                            <div class="social-login">

                                <a href="#" class="fb-login btn btn-default"><i class="fa fa-facebook-f"></i> LOGIN WITH FACEBOOK</a>

                                <a href="#" class="google-login btn btn-default"><i class="fa fa-google"></i> LOGIN WITH GOOGLE</a>

                            </div>

                    </div>









                </form>

        </div>

        </div>

    </div>

</section>

@endsection