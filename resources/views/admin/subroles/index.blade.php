@extends('layouts.admin')@section('content')<aside class="right-side">    <ol class="breadcrumb">        <li><a href="{{url('/user')}}">{{Request::segment(1)}}</a></li>        <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#">List</a></li>    </ol>    <section class="content">        <div class="row">            <div class="col-lg-12 top-right-content">                <form class="user-form-area">                    <div class="form-group">                        <div class="row">                            <div class="col-md-8">                                <div class="table-search">                                    <form class="navbar-form" role="search">                                        <input type="search" name="" placeholder="Search">                                        <input type="submit" class="fa" value="">                                    </form>                                </div>                            </div>                            <div class="col-md-2 table-select">                                <select class="form-control" id="bpm">                                    <option>Order By</option>                                    <option>1</option>                                    <option>2</option>                                    <option>3</option>                                </select>                            </div>                            <div class="col-md-2">                                <a href="#" class="add-user">Add User</a>                            </div>                        </div>                    </div>                </form>                <div class="user-area subshare-table-area">                    <div class="subshare-stats-area">                        <div class="panel panel-primary ">                            <div class="panel-body table-responsive">                                <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">                                    <div class="table-top">                                        <div class="dataTables_info" id="table1_info" role="status" aria-live="polite">{{count($users)}} results</div>                                    </div>                                    <table class="table dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">                                        <thead>                                            <tr role="row">                                                <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 188px;"></th>                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 78px;"></th>                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 78px;"></th>                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 78px;"></th>                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 78px;"></th>                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 100px;"></th>                                                <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 245px;"></th>                                            </tr>                                        </thead>                                        <tbody>                                        @if($users )                                            @foreach ($users as $user)                                            <tr role="row" class="odd">                                                <td class="sorting_1">                                                    <div class="table-area-one">                                                        <!--<img src="img/big-img.png">-->                                                        @if($user->image)                                                        <img src="{{ url('public/images/avatars/small/'. $user->image) }}" ><h3>{{ $user->first_name }} {{ $user->last_name }}</h3>                                                        @else                                                            <img src="{{ url('/resources/assets/img/big-img.png') }}" ><h3>{{ $user->first_name }} {{ $user->last_name }}</h3>                                                        @endif                                                    </div>                                                </td>                                                <td>                                                    <div class="details-div">                                                        <h4>uploads</h4>                                                        <span>@if($user->num_uploads != ""){{$user->num_uploads}}@else{{0}}@endif</span>                                                    </div>                                                </td>                                                <td>                                                    <div class="details-div">                                                        <h4>following</h4>                                                        <span>@if($user->num_followings != ""){{$user->num_followings}}@else{{0}}@endif</span>                                                    </div>                                                </td>                                                <td>                                                    <div class="details-div">                                                        <h4>follow</h4>                                                        <span>@if($user->num_followers != ""){{$user->num_followers}}@else{{0}}@endif</span>                                                    </div>                                                </td>                                                <td>                                                    <div class="details-div">                                                        <h4>subshares</h4>                                                        <span>98</span>                                                    </div>                                                </td>                                                <td>                                                    <div class="details-div">                                                        <h4>wanted</h4>                                                        <span>7</span>                                                    </div>                                                </td>                                                <td>                                                    <div class="last-table-area user-btn-area">                                                        <a href="#" class=                                                                        "view-pro">View Profile</a>                                                        <div class="dropdown wave-btn">                                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                                                                <img src="{{ url('assets/admin/img/three-dots.png')}}">                                                            </button>                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">                                                                <a class="dropdown-item" href="{{url('/setting/'.$user->id)}}">Edit</a>                                                                <a class="dropdown-item" href="{{url('/user/delete/'.$user->id)}}" >Delete</a>                                                            </div>                                                        </div>                                                    </div>                                                </td>                                            </tr>@endforeach                                                @else                                            <p>No record found </p>                                            @endif                                        </tbody>                                    </table>                                </div>                            </div>                        </div>                    </div>                </div>                    {{--{{ $users->links() }}--}}                {{--<div class="dataTables_paginate paging_simple_numbers" id="table1_paginate"><ul class="pagination">--}}                        {{--<li class="paginate_button previous disabled" id="table1_previous"><a href="#" aria-controls="table1" data-dt-idx="0" tabindex="0"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li><li class="paginate_button active"><a href="#" aria-controls="table1" data-dt-idx="1" tabindex="0">1</a></li>--}}                        {{--<li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="3" tabindex="0">3</a></li>--}}                        {{--<li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="4" tabindex="0">4</a></li>--}}                        {{--<li class="paginate_button"><a href="#" aria-controls="table1" data-dt-idx="1" tabindex="0">5</a></li>--}}                        {{--<li class="paginate_button nav-dot-div"><a href="#" aria-controls="table1" data-dt-idx="2" tabindex="0">...</a></li><li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="3" tabindex="0">10</a></li>--}}                        {{--<li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="4" tabindex="0">20</a></li><li class="paginate_button next" id="table1_next"><a href="#" aria-controls="table1" data-dt-idx="5" tabindex="0">30</a></li>--}}                        {{--<li class="paginate_button next" id="table1_next"><a href="#" aria-controls="table1" data-dt-idx="5" tabindex="0"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>--}}                    {{--</ul>--}}                {{--</div>--}}            </div>        </div>    </section></aside>@endsection