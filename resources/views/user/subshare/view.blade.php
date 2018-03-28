@extends('layouts.user')



@section('title', 'Subshare Details')



@section('content')

<style type="text/css">

    #subshareTitle {

        text-align: left;

        font-family: 'Raleway', sans-serif;

        color: #253346;

        font-size: 18px;

        font-weight: 700;

        margin-bottom: 32px;

    }

</style>



<aside class="right-side">

    <ol class="breadcrumb">

        <li><a href="{{ url('/user-dashboard') }}">Dashboard</a>

        </li>

        <li> <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="{{ url('/subshares') }}">Subshares</a>

        </li>

        <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#">Subshare Details</a>

        </li>

    </ol>

<section class="profile-content">
    <div class="row">
        <div class="col-md-12 col-lg-12 top-right-content">
            <div class="profil-graph-area">
                <div class="profile-graph-area-heading">
                    <h3 style="text-align: center;">

                        <?php // dd($subshare); ?>

                        @if( count($subshare) > 0 )
                            {{ \Helpers::getSubshareStatement($subshare->user_id, $subshare->track_id, $subshare->roles, $subshare->percentage) }}
                        @endif

                    </h3>
                </div>
                @if( !empty($response) )
                <p>
                    <button type="button" class="btn-lg btn-success" onclick="location.href='{{ url('subshares/response/?response=1&subshare='.\Request::segment(3). '') }}'">Accept</button>
                    <button type="button" class="btn-lg btn-danger" onclick="location.href='{{ url('subshares/response/?response=0&subshare='.\Request::segment(3) . '') }}'">Decline</button>
                </p>
                @else
                 <p>
                    Current Subshare Response is already given.                    

                 </p>
                 <p>
                  <button type="button" class="btn-lg btn-success" onclick="location.href='{{ url('subshares/') }}'">Go Back</button>
                 </p>
                @endif
            </div>
        </div>
    </div>
</section>


@endsection