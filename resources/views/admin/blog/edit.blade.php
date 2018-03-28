@extends('layouts.admin')
@section('title','Edit Post')

@section('content')

<aside class="right-side">
    <ol class="breadcrumb">
        <li><a href="{{url('/admin')}}">Dashboard</a></li>
        <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#">Edit Post</a></li>
    </ol>
    {!! Form::open(['action' => ['admin\BlogController@update',$post->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
    {{ csrf_field() }}
    <section class="setting-content">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Edit Post</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class=" profile-top-area">
                            <div class="col-md-2">                                
     					<img alt="Image" src="{{ \Helpers::PostImage( $post->image ) }}" width="130" height="130">     
                            </div>
                            <div class="col-md-8">
                                <h4>Upload avator</h4>
                                <div class="input-group">
                                    {{Form::file('cover_image')}}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 form-line">
                            <div class="form-group">
                                {{Form::label('title','Title')}}
                                {{Form::text('title',$post->title ,['class'=>'form-control','placeholder'=>'Please enter title here!'] )}}
                            </div>
                            <div class="form-group">
                                {{Form::label('body','Body')}}
                                {{Form::textarea('body',$post->text,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Please enter description here!'] )}}
                            </div>
                            <div class="form-group">
                            
                                {{Form::label('status','Status')}}
                                
                                <select class="selectpicker form-control"  name="status">
                                    <option>------Post Status------</option>
                                    <option value="Active" <?php echo ( $post->status == 'Active') ? 'selected'  : '' ; ?>>Active</option>
                                    <option value="Suspended" <?php echo ( $post->status == 'Suspended') ? 'selected'  : '' ; ?>>Suspended</option>
                                </select>
                                
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="container">
                            <div class="col-md-12">
                                {{Form::hidden('_method','PUT')}}
                                {{Form::Submit('Edit',['class'=>'btn btn-primary'] )}}
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