@extends('layouts.admin')

@section('content')
    <!-- Right side column. Contains the navbar and content of the page -->
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
                                <div class="table-top">
                                    <div class="dataTables_info" id="table1_info" role="status" aria-live="polite">423 results</div>
                                    <div class="top-play-btn"><a href="#" class="play-green"><span>Play All</span><img src="img/play-all.png"> </a> </div>
                                </div>
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
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><img src="img/blues1.png"></td>
                                        <td>
                                            <div class="wave-text-area">
                                                <img src="img/Face1.png">
                                            </div>
                                            <div class="wave-text-area">
                                                <h3>Blues on Honey</h3>
                                                <p>by Allison Green</p>
                                                <span>67%  complete</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="wave-graph">
                                                <img src="img/wave%20copy.png">
                                                <a href="#"><img src="img/Play%20button.png"></a>
                                            </div>
                                        </td>

                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="dataTables_paginate paging_simple_numbers" id="table1_paginate"><ul class="pagination">
                            <li class="paginate_button previous disabled" id="table1_previous"><a href="#" aria-controls="table1" data-dt-idx="0" tabindex="0"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li><li class="paginate_button active"><a href="#" aria-controls="table1" data-dt-idx="1" tabindex="0">1</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="table1" data-dt-idx="3" tabindex="0">3</a></li>
                            <li class="paginate_button next" id="table1_next"><a href="#" aria-controls="table1" data-dt-idx="5" tabindex="0"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </aside>
    <!-- right-side -->
    </section>



@endsection