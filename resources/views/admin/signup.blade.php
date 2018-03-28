@extends('layouts.admin')

@section('content')
    <section class="login-area">
        <div class="container">
            <div class="login-div">
                <h1>Sign Up</h1>
                <div class="account_box">
                    <a href="{{url('/login')}}">Already a member,login?</a>
                </div>
                <div class="sign-up-area">
                    @if(count($errors))
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </div>
                    @endif
                    <form role="form"  method="post" action="{{url('/createAcc')}}">
                        {{ csrf_field() }}
                        <div class="signup_box">
                            <div class="avtar-area">
                                <div class="avatar-image">
                                    <img src="{{'assets/img/person.png'}}">
                                </div>
                                <div class="avator-upload">
                                    <h4>Upload Avatar</h4>
                                    <input type="file" class="file">

                                    <div class="input-group">
                                        <input type="text" class="form-control input-lg" disabled=""
                                               placeholder="Select file">
                                        <span class="input-group-btn">
                                                    <button class="browse btn btn-primary input-lg" type="button"><i
                                                                class="fa fa-upload" aria-hidden="true"></i></button>
                                                  </span>
                                    </div>
                                </div>
                            </div>
                            <label>First name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First">
                            <label>Last name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="mark@gmail.com">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <label>Repeat password</label>
                            <input type="password" name="RepeatPassword" class="form-control">
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