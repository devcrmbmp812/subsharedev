@extends('layouts.admin')
@section('title','Users')

@section('content')
    <aside class="right-side">
    <ol class="breadcrumb">
        <li><a href="{{url('/admin')}}">Dashboard</a></li>
        <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#">Users</a></li>
    </ol>

    @include('layouts.inc.messages')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 top-right-content">
                {{ Form::open(array('url' => '/admin/user/search', 'method' => 'POST')) }}

                    <div class="form-group">

                        <div class="row">
                            <div class="col-md-8">
                                <div class="table-search">
                                        <input type="search" name="search" id="search" value="{{( isset($search) ? $search : "") }}" placeholder="Search" onchange="this.form.submit()">
                                </div>
                            </div>

                            <div class="col-md-2 table-select">
                                <select class="form-control" name='status' id="status" onchange="this.form.submit()">
                                    <option value=''>Order By</option>
                                    <option value="Active" <?php echo ($status) == 'Active' ? 'selected' : "" ;  ?>>Active</option>
                                    <option value="Censor" <?php echo ($status) == 'Censor' ? 'selected' : "" ;  ?>>Censor</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <a href="{{url('admin/export')}}" class="add-user" target="_blank" id="export">Export Users</a>
                            </div>

                        </div>
                    </div>

                {{ Form::close() }}

                <div class="user-area subshare-table-area">

                    <div class="subshare-stats-area">

                        <div class="panel panel-primary ">

                            <div class="panel-body table-responsive">

                                <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                                    <div class="table-top">

                                        <div class="dataTables_info" id="table1_info" role="status" aria-live="polite">{{count($users)}} results</div>

                                    </div>

                                    <table class="table dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">

                                        <thead>

                                            <tr role="row">

                                                <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 188px;"></th>

                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 78px;"></th>

                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 78px;"></th>

                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 78px;"></th>

                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 78px;"></th>

                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 100px;"></th>

                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 245px;"></th>

                                            </tr>

                                        </thead>



                                        <tbody>

                                        @if($users )
                                            @foreach ($users as $user)

                                            <tr role="row" class="odd">
                                                <td class="sorting_1">
                                                    <div class="table-area-one">

                                                        <img style="height: 50px;width: 50px;" class="img-circle img-responsive pull-left" src="{{ \Helpers::avatarURLret( $user->image ) }}" ><h3>{{ $user->first_name }} {{ $user->last_name }}</h3>


                                                    </div>

                                                </td>

                                                <td>

                                                    <div class="details-div">

                                                        <h4>uploads</h4>

                                                        <span>@if($user->num_uploads != ""){{$user->num_uploads}}@else{{0}}@endif</span>

                                                    </div>

                                                </td>

                                                <td>

                                                    <div class="details-div">

                                                        <h4>following</h4>

                                                        <span>@if($user->num_followings != ""){{$user->num_followings}}@else{{0}}@endif</span>

                                                    </div>

                                                </td>

                                                <td>

                                                    <div class="details-div">

                                                        <h4>follow</h4>

                                                        <span>@if($user->num_followers != ""){{$user->num_followers}}@else{{0}}@endif</span>

                                                    </div>

                                                </td>

                                                <td>

                                                    <div class="details-div">

                                                        <h4>subshares</h4>

                                                        <span>{{ \Helpers::getTotalSubsharesbyUserID($user->id) }}</span>

                                                    </div>

                                                </td>

                                                <td>

                                                    <div class="details-div">

                                                        <h4>wanted</h4>

                                                        <span>0</span>

                                                    </div>

                                                </td>
                                                <td>
                                                    <div class="last-table-area user-btn-area">
                                                        <a href="{{url('admin/profile/'.$user->id)}}" class="view-pro">View Profile</a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="last-table-area user-btn-area">
                                                         <div class="dropdown wave-btn">
                                                             <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                 <img src="{{ url('assets/admin/img/three-dots.png')}}">
                                                             </button>
                                                             <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                 <a class="dropdown-item" href="{{url('admin/user/'.$user->id)}}">Edit</a>
                                                                 @if($user->status =='Active')
                                                                 <a class="dropdown-item" href="{{url('admin/user/censor/'.$user->id)}}">Censor</a>
                                                                 @elseif($user->status =='Censor')
                                                                 <a class="dropdown-item" href="{{url('admin/user/active/'.$user->id)}}">Active</a>
                                                                 @endif
                                                                 <!-- {!! Form::open(['action'=>['admin\UsersController@destroy',$user->id],'method'=>'POST','class'=>' ' ]) !!}
                                                                 {!! Form::hidden('_method','DELETE') !!} -->
                                                                 <a class="dropdown-item" href="{{url('admin/user/destroy/'.$user->id)}}"  onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                                                 <!-- {!! Form::submit('DELETE',['class'=>'dropdown-item margin-top','onclick'=>"return confirm('Are you sure you want to delete this item?');" ]) !!}
                                                                 {!! Form::close() !!} -->
                                                             </div>
                                                         </div>
                                                    </div>
                                                </td>
                                            </tr>@endforeach

                                                @else
                                            <p>No record found </p>
                                            @endif


                                        </tbody>

                                    </table>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                    {{-- $users->links() --}}
            </div>

        </div>

    </section>

</aside>

@endsection