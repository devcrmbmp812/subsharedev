@extends('layouts.user')
@section('title','Subshares')

@section('content')
    <script src="//cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.4.0/wavesurfer.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.1.3/plugin/wavesurfer.regions.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.2.3/plugin/wavesurfer.timeline.min.js"></script>

    <aside class="right-side">
        <ol class="breadcrumb">
            <li><a href="{{ url('/user-dashboard') }}">Dashboard</a></li>
            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Subshare</li>
        </ol>
    </aside>


