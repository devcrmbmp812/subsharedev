@extends('layouts.guest')
@section('title', 'Reset Password')


@section('content')



<section class="login-area">

    <div class="container">

        <div class="login-div">

            <h1>Recover password</h1>

            <div class="login-form-area recover-pas-div">



                    @if (session('status'))

                        <div class="alert alert-success">

                            {{ session('status') }}

                        </div>

                    @endif



                    @if ($errors->has('email'))

                        <span class="help-block" style="color: red;margin-bottom: 10px">

                            <strong>{{ $errors->first('email') }}</strong>

                        </span>

                    @endif



                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">

                        {{ csrf_field() }}

                            <label for="email">Email</label>

                            <input placeholder="mark@gmail.com" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            <button type="submit" class="pas-login-btn btn btn-default">

                             send password

                            </button>

                    </form>



            </div>

        </div>

    </div>

</section>

@endsection

