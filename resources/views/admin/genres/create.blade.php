@extends('layouts.admin')

@section('title','Create Genres')


@section('content')
    <aside class="right-side">
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}">Dashboard</a></li>
            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#"> Music Genres</a></li>
        </ol>
        {!! Form::open(['url' => '/admin/genres/store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
        {{ csrf_field() }}
        @include('layouts.inc.messages')
        <section class="setting-content">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Genre</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">

                            <div class="col-md-8 form-line">
                                <div class="form-group">
                                    {{Form::label('title','Title')}}
                                    {{Form::text('title','',['class'=>'form-control','placeholder'=>'Please enter title here!'] )}}
                                </div>
                                <div class="form-group">
                                    {{Form::label('status','Status')}}
                                    <select class="selectpicker form-control"  name="status">
                                        <option>------Post Status------</option>
                                        <option value="Active" selected>Active</option>
                                        <option value="Suspended">Suspended</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="col-md-12">
                                    {{Form::Submit('Submit',['class'=>'btn btn-primary'] )}}
                                    {{Form::Button('Cancel',['class'=>'btn btn-danger','onClick'=> 'window.location.href="'. url("admin/genres"). '"' ] )}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        {!! Form::close() !!}
    </aside>

@endsection