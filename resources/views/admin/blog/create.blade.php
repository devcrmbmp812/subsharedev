@extends('layouts.admin')
@section('title','Create Post')

@section('content')
    <aside class="right-side">
        <ol class="breadcrumb">
            <li><a href="{{url('/admin')}}">Dashboard</a></li>
            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#">Add Post</a></li>
        </ol>
        {!! Form::open(['url' => '/admin/blog/store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
        {{ csrf_field() }}

        @include('layouts.inc.messages')
        <section class="setting-content">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Add Post</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class=" profile-top-area">                                
                                <div class="col-md-10">
                                    <h4>Upload photo</h4>
                                    <div class="input-group">
                                        {{Form::file('cover_image' )}}</div>
                                </div>
                            </div>
                            <div class="edit-form-area">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        {{Form::label('title','Title')}}
                                        {{Form::text('title','',['class'=>'form-control','placeholder'=>'Please enter title here!'] )}}
                                    </div>
                                    
                                     <div class="form-group">
                                        <div class="form-group">
                                            {{Form::label('body','Body')}}
                                            {{Form::textarea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Please enter description here!'] )}}
                                        </div>
                                    </div>
                                    
                                </div>
                               
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="col-md-12">
                                    {{Form::Submit('Add',['class'=>'btn btn-primary'] )}}
                                    {{Form::Button('Cancel',['class'=>'btn btn-danger','onClick'=> 'window.location.href="'. url("admin/blog"). '"' ] )}}
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