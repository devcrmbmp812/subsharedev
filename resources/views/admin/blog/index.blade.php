@extends('layouts.admin')
@section('title','Blog Posts')

@section('content')

<aside class="right-side">
<ol class="breadcrumb">
    <li><a href="{{url('/admin')}}">Dashboard</a></li>
    <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#">Blog</a></li>
</ol>
@include('layouts.inc.messages')
<section class="content">
    <div class="row">
        <div class="col-lg-12 top-right-content">
            {{ Form::open(array('url' => '/admin/blog/search', 'method' => 'POST')) }}
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="table-search">
                                <input name="search" placeholder="Search"  value="{{ ( isset($search) ? $search : '')}}" type="search">
                                <input class="fa" value="" type="submit">
                            </div>
                        </div>
                        <div class="col-md-2 table-select">
                            <select class="form-control" id="bpm" name="status">
                                <option value="" >Order By</option>
                                <option value="Active" <?php echo ($status) =='Active' ? 'selected' : "" ;  ?>>Active</option>
                                <option value="Suspended" <?php echo ($status) =='Suspended' ? 'selected' : "" ;  ?>>Suspended</option>
                            </select>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}

<div class="res-subshare subshare-table-area">
    <div class="subshare-stats-area">
        <div class="row tab-heading-table">
            <div class="inner-table-tab-heading">
                <div class="col-md-9">
                    <h3>Total ({{count($posts)}})</h3>
                </div>
                <div class="col-md-2 pull-right">
                    <a class="btn btn-info load_music" href="{{url('admin/blog/create')}}">Add Post</a>
                </div>
            </div>
        </div>
        <!-- top tabs ends -->
<div class="tab-content">
    <div id="home" class="tab-pane fade active in">
        <div class="panel panel-primary ">
            <div class="panel-body table-responsive">
                <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <table class="table table-striped table-bordered dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 188px;">ID  </th>
                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 370px;">Post Title  </th>
                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 168px;">Status </th>
                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 121px;">Date </th>
                            <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 255px;">Action </th>
                        </tr>
                        </thead>

                        <tbody>
                        @if( count($posts)>=1 )
                            @foreach($posts as $post)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{$post->id}}</td>
                            <td>
                                <p>{{$post->title}}</p>
                            </td>
                            <td>
                                <p>{{$post->status}}</p>
                            </td>
                            <td>
                                <p>{{ \Carbon\Carbon::parse($post->created_at)->format('d.m.Y')}}</p>
                            </td>
                            <td>
                                <div class="last-table-area">
                                    <a class="btn btn-info load_music" href="{{url('admin/blog/'.$post->id)}}"><p>View Details</p></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @else
                            <p>No post found</p>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
{{$posts->links()}}
        </div>
    </div>
</section>
</aside>
<script>

    $(document).ready(function () {

        $('#search').on('change', function(e){
            $(this).closest('form').submit();
        });
        $('#bpm').on('change', function(e){
            $(this).closest('form').submit();
        });

    });
</script>
@endsection