@extends('layouts.admin')
@section('title','View Post')

@section('content')
<aside class="right-side">
    <style>
        .margin-top{
            margin-top: -44px;
        }
    </style>
    <ol class="breadcrumb">
        <li><a href="{{url('/admin')}}">Dashboard</a></li>
        <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#">View Post</a></li>
    </ol>
    <section class="profile-content">
        <div class="row">
            <div class="col-md-12 col-lg-12 top-right-content">
                <div class="container">
                    <div class="row">
                        @if($post!='')
                        <div class="col-md-8">
                            <div id="postlist">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="text-center">
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <h3 class="pull-left">{{ str_limit($post->title, 80)}}</h3>
                                                </div>
                                                <div class="col-sm-3">
                                                    <h4 class="pull-right">
                                                        <small><em>{{ \Carbon\Carbon::parse($post->created_at)->format('d.M.Y') }}</em></small>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <a href="#" class="thumbnail">
                                                                            
                                                                                 
                                            <img alt="Image" src="{{ \Helpers::PostImage( $post->image ) }}">                                         

					</a>
                                        {!! $post->text !!}
                                    </div>

                                    <div class="panel-footer">
                                        <div class="row">
                                            <div class="col-md-12" style="">
                                                <a class="btn btn-default btn-lg" href="{{url('admin/blog/'.$post->id.'/edit')}}">Edit</a>

                                                {!! Form::open(['action'=>['admin\BlogController@destroy',$post->id],'method'=>'POST','class'=>' ' ]) !!}
                                                {!! Form::hidden('_method','DELETE') !!}
                                                {!! Form::submit('DELETE',['class'=>'btn btn-danger btn-lg pull-right margin-top','onclick'=>"return confirm('Are you sure you want to delete this item?');"]) !!}
                                                {!! Form::close() !!}
                                            </div>

                                        </div>
                                        <div class="">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @else
                        <p>No Data to Show</p>
                            @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
</aside>
@endsection