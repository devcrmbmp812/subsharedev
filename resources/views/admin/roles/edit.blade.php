@extends('layouts.admin')
@section('title','Edit Role')

@section('content')

<aside class="right-side">
    <ol class="breadcrumb">
        <li><a href="{{url('/admin')}}">Dashboard</a></li>
        <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#">Subshare Roles</a></li>
    </ol>
    {!! Form::open(['action' => ['admin\SubshareRolesController@update',$post->id],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
    {{ csrf_field() }}
    <section class="setting-content">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Edit Roles</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div class="col-md-8 form-line">
                            <div class="form-group">
                                {{Form::label('title','Title')}}
                                {{Form::text('title',$post->title ,['class'=>'form-control','placeholder'=>'Please enter title here!'] )}}
                            </div>
                            <div class="form-group">
                                {{Form::label('status','Status')}}
                                <select class="selectpicker form-control"  name="status">                                    
                                    <option value="Active" <?php echo ( $post->status == "Active")? 'selected' : '' ; ?>>Active</option>
                                    <option value="Suspended" <?php echo ( $post->status != "Active")? 'selected' : '' ; ?>>Suspended</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="container">
                            <div class="col-md-12">
                                {{Form::hidden('_method','PUT')}}
                                {{Form::Submit('Update',['class'=>'btn btn-primary'] )}}                               
                                
				<button type="button" class="btn btn-danger" onclick="location.href='{{ url('/admin/roles') }}'">
				 <span>Cancel</span>
				</button>

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