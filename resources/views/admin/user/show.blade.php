@extends('layouts.admin')
@section('title','Edit User')

@section('content')
    <aside class="right-side">
        <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Edit Profile</li>
        </ol>
            <section class="setting-content">
                {!! Form::open(['action' => ['admin\UsersController@update',$user->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>

                        </ul>
                        @include('layouts.inc.messages')
                    </div>
                    <div class="col-lg-12">
                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <div class=" profile-top-area">
                                    <div class="col-md-2">
                                        
                                            <img src="{{ \Helpers::avatarURLret( $user->image ) }}" width="130" height="130">
                                        
                                    </div>
                                                        
	                                <div class="col-md-10">
	                                    <h4>Upload avator</h4>
	                                        <input type="file" name="cover_image" class="file">
	                                        <div class="input-group">
	                                          <input type="text" class="form-control input-lg" disabled="" placeholder="Select file">
					          <span class="input-group-btn">
					            <button class="browse btn btn-primary input-lg" type="button"><i class="fa fa-upload" aria-hidden="true"></i></button>
					          </span>
	                                    </div>
	                                </div>
                                
                                    
<script>
jQuery(document).on('click', '.browse', function(){
var file = $(this).parent().parent().parent().find('.file');
file.trigger('click');
});
jQuery(document).on('change', '.file', function(){
$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});
</script>
           
                                    
                                </div>
                                <div class="edit-form-area">
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>First name</label>
                                            <input class="form-control" placeholder="User" name="first_name" value="{{$user->first_name }}"  type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Email address</label>
                                            <input class="form-control"   value="{{$user->email}}"  name="email" type="email">
                                        </div>
                                        <div class="form-group">
                                            <label>Registration Date</label>
                                            <input class="form-control"  disabled value="{{\Carbon\Carbon::parse($user->created_at)->format('d.m.Y')}}"  name="email" type="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Last name</label>
                                            <input  class="form-control" id="" placeholder="Williams" value="{{ $user->last_name}}" name="last_name" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select  class="form-control" id="sel1" name="status">                                                                                            
                                                <option {{ ( $user->status == "Active" ) ? 'selected':'' }}>Active</option>
                                                <option {{ ( $user->status == "Censor" ) ? 'selected':'' }}>Censor</option>
                                            </select>                                                                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="container">
                        <div class="col-md-12">

                            {{Form::Submit('Update',['class'=>'btn btn-primary'] )}}
                            {{Form::Button('Cancel',['class'=>'btn btn-danger','onClick'=> 'window.location.href="'. url("admin/user"). '"' ] )}}
                            
                        </div>
                    </div>
                </div>
                {{Form::hidden('_method','PUT')}}
                {!! Form::close() !!}
            </section>
    </aside>
@endsection