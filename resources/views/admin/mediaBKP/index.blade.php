@extends('layouts.admin')

@section('content')
    <script src="//cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.4.0/wavesurfer.min.js"></script>

    <aside class="right-side">
    <ol class="breadcrumb">
        <li><a href="#">Breadcrumb item 1</a></li>
        <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#">Breadcrumb item 2</a></li>
    </ol>
    <section class="content">
        <div class="row">
            <div class="col-lg-12 media-div top-right-content">
                <form>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="media-table-select">
                                    <input type="text" class="form-control" id="usr" placeholder="Title">
                                </div>
                            </div>
                            <div class="col-md-2 media-table-select">
                                <select class="form-control" id="sel1">
                                    <option>Percent</option>
                                    <option>Percent</option>
                                    <option>Percent</option>
                                    <option>Percent</option>
                                </select>
                            </div>
                            <div class="col-md-2 media-table-select">
                                <select class="form-control" id="Genre">
                                    <option>Genre</option>
                                    <option>Genre</option>
                                    <option>Genre</option>
                                    <option>Genre</option>
                                </select>
                            </div>
                            <div class="col-md-2 media-table-select">
                                <select class="form-control" id="bpm">
                                    <option>BPM</option>
                                    <option>BPM</option>
                                    <option>BPM</option>
                                    <option>BPM</option>
                                </select>
                            </div>
                            <div class="col-md-4 table-tokenizer">
                                <input type="text" class="form-control" id="tokenfield" value="blues,drums,blues on honey" />
                                <div class="form-data"></div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="panel panel-primary filterable">
                    <div class="panel-body table-responsive">
                        <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                            @if( count($media) > 0 )
                                <div class="table-top">
                                    <div class="dataTables_info" id="table1_info" role="status" aria-live="polite">423 results</div>
                                    <div class="top-play-btn"><a href="#" class="play-green"><span>Play All</span><img src="{{url('assets/admin/img/play-all.png')}}"> </a> </div>
                                </div>
                            @endif

                            <table class="table dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 87px;"></th>
                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 346px;"></th>
                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 471px;"></th>
                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 216px;"></th>
                                    </tr>
                                </thead>

                                <tbody>
                                @if( count($media) > 0 )
                                    @foreach ($media as $med)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><img src="{{ url('resources/assets/img/blues1.png')}}"></td>
                                        <td>
                                            <div class="wave-text-area">
                                               <img src="{{url('resources/assets/img/Face1.png')}}" style="height: 41px;width: 41px;">
                                            </div>
                                                    <div class="wave-text-area">
                                                       <h3>{{ $med->song_name }} </h3>
                                                        <p>by
                                                            {{-- {{$med->first_name." ".$med->last_name}} --}}
                                                        </p>
                                                <span>{{$med->track_percentage}}%  complete</span>
                                            </div>
                                        </td>
                                        <td style="width: 586px">
                                            <div class="wave-graph">
                                                {{--<img src="{{url('assets/admin/img/wave%20copy.png')}}">--}}
                                                <div id="waveform" class="js-wave" data-path="{{ url('server/php/files/'. $med->file_name) }}">

                                                </div>
                                                {{--<button class="btn btn-primary" onclick="wavesurfer.playPause()">--}}
                                                <a href="#" class="play" id="play-{{$med->id}}" data-id="{{$med->id}}"><img src="{{url('assets/admin/img/Play%20button.png')}}"></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="dropdown wave-btn">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <img src="{{url('assets/admin/img/three-dots.png')}}">
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    {{--<a class="dropdown-item" href="#">Flag</a>--}}
                                                    <a class="dropdown-item" href="{{url('admin/media/show/'.$med->uploads_id)}}">View Details</a>
                                                    <a class="dropdown-item" href="{{url('/admin/media/destroy/'.$med->uploads_id)}}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach
                            @else
                                <td> No Media Found.</td>
                            @endif


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @if( count($media) > 0 )

                    <div class="dataTables_paginate paging_simple_numbers" id="table1_paginate"><ul class="pagination">
                            <li class="paginate_button previous disabled" id="table1_previous"><a href="#" aria-controls="table1" data-dt-idx="0" tabindex="0"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li><li class="paginate_button active"><a href="#" aria-controls="table1" data-dt-idx="1" tabindex="0">1</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="3" tabindex="0">3</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="4" tabindex="0">4</a></li>
                            <li class="paginate_button"><a href="#" aria-controls="table1" data-dt-idx="1" tabindex="0">5</a></li>
                            <li class="paginate_button nav-dot-div"><a href="#" aria-controls="table1" data-dt-idx="2" tabindex="0">...</a></li><li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="3" tabindex="0">10</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="4" tabindex="0">20</a></li><li class="paginate_button next" id="table1_next"><a href="#" aria-controls="table1" data-dt-idx="5" tabindex="0">30</a></li>
                            <li class="paginate_button next" id="table1_next"><a href="#" aria-controls="table1" data-dt-idx="5" tabindex="0"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </section>
</aside>
    <script>
        {{--var wavesurfer = WaveSurfer.create({--}}
            {{--container: '#waveform',--}}

        {{--});--}}
        {{--wavesurfer.load('{{url("public/storage/music/Subah.mp3")}}');--}}
        {{--wavesurfer.on('ready', function () {--}}
            {{--wavesurfer.play();--}}
        {{--});--}}

        $(document).ready(function () {
            $('.js-wave').each(function (i, el) {
                var wavesurfer = Object.create(WaveSurfer);

                wavesurfer.init({
                    container: el,
                    progressColor: 'red',
                    audioRate: 1,
                    barWidth: 3,
                    height: 150,
                    pixelRatio:1
                });

                wavesurfer.load($(el).data('path'));
                $(el) .siblings('.play').bind('click', function () {
                    wavesurfer.playPause();
                })
            });
        });
    </script>
@endsection