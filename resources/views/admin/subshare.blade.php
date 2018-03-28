@extends('layouts.user')



@section('content')
<!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <ol class="breadcrumb">
            <li><a href="#">Breadcrumb item 1</a></li>
            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#">Breadcrumb item 2</a></li>
        </ol>
        <section class="content">
            <div class="row">
                <div class="col-lg-12 top-right-content">
                    <form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="table-search">
                                        <form class="navbar-form" role="search">
                                            <input type="search" name="" placeholder="Search">
                                            <input type="submit" class="fa" value="">
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-2 table-select">
                                    <select class="form-control" id="bpm">
                                        <option>Order By</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="res-subshare subshare-table-area">
                        <div class="subshare-stats-area">
                            <div class="row tab-heading-table">
                                <div class="inner-table-tab-heading">
                                    <div class="col-md-9">
                                        <h3>Media</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#home">All</a></li>
                                            <li><a data-toggle="tab" href="#menu1">Other</a></li>
                                            <li><a data-toggle="tab" href="#menu2">Responsive</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- top tabs ends -->

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <div class="panel panel-primary ">
                                        <div class="panel-body table-responsive">
                                            <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table class="table table-striped table-bordered dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 188px;">User <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 370px;">Track Title <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 168px;">Status <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 121px;">Date <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 255px;">Action <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <div class="subtable-area-one">
                                                                <img src="assets/img/Face2.png"><h3>Alice Smith</h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                           <p>Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <p>Completed</p>
                                                        </td>
                                                        <td>
                                                           <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <div class="last-table-area">
                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="assets/img/play-all.png"></span></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <div class="subtable-area-one">
                                                                <img src="assets/img/Face2.png"><h3>Alice Smith</h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p>Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <p>Completed</p>
                                                        </td>
                                                        <td>
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <div class="last-table-area">
                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="assets/img/play-all.png"></span></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <div class="subtable-area-one">
                                                                <img src="assets/img/Face2.png"><h3>Alice Smith</h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p>Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <p>Completed</p>
                                                        </td>
                                                        <td>
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <div class="last-table-area">
                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="assets/img/play-all.png"></span></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <div class="subtable-area-one">
                                                                <img src="assets/img/Face2.png"><h3>Alice Smith</h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p>Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <p>Completed</p>
                                                        </td>
                                                        <td>
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <div class="last-table-area">
                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="assets/img/play-all.png"></span></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <div class="subtable-area-one">
                                                                <img src="assets/img/Face2.png"><h3>Alice Smith</h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p>Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <p>Completed</p>
                                                        </td>
                                                        <td>
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <div class="last-table-area">
                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="assets/img/play-all.png"></span></button>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <div class="panel panel-primary ">
                                        <div class="panel-body table-responsive">
                                            <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table class="table table-striped table-bordered dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 188px;">User <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 370px;">Track Title <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 168px;">Status <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 121px;">Date <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 255px;">Action <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <div class="subtable-area-one">
                                                                <img src="assets/img/Face2.png"><h3>Alice Smith</h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p>Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <p>Completed</p>
                                                        </td>
                                                        <td>
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <div class="last-table-area">
                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="assets/img/play-all.png"></span></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <div class="subtable-area-one">
                                                                <img src="assets/img/Face2.png"><h3>Alice Smith</h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p>Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <p>Completed</p>
                                                        </td>
                                                        <td>
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <div class="last-table-area">
                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="assets/img/play-all.png"></span></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <div class="subtable-area-one">
                                                                <img src="assets/img/Face2.png"><h3>Alice Smith</h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p>Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <p>Completed</p>
                                                        </td>
                                                        <td>
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <div class="last-table-area">
                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="assets/img/play-all.png"></span></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <div class="subtable-area-one">
                                                                <img src="assets/img/Face2.png"><h3>Alice Smith</h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p>Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <p>Completed</p>
                                                        </td>
                                                        <td>
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <div class="last-table-area">
                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="assets/img/play-all.png"></span></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <div class="subtable-area-one">
                                                                <img src="assets/img/Face2.png"><h3>Alice Smith</h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p>Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <p>Completed</p>
                                                        </td>
                                                        <td>
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <div class="last-table-area">
                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="assets/img/play-all.png"></span></button>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <div class="panel panel-primary ">
                                        <div class="panel-body table-responsive">
                                            <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                <table class="table table-striped table-bordered dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 188px;">User <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 370px;">Track Title <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 168px;">Status <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 121px;">Date <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 255px;">Action <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <div class="subtable-area-one">
                                                                <img src="assets/img/Face2.png"><h3>Alice Smith</h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p>Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <p>Completed</p>
                                                        </td>
                                                        <td>
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <div class="last-table-area">
                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="assets/img/play-all.png"></span></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <div class="subtable-area-one">
                                                                <img src="assets/img/Face2.png"><h3>Alice Smith</h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p>Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <p>Completed</p>
                                                        </td>
                                                        <td>
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <div class="last-table-area">
                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="assets/img/play-all.png"></span></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <div class="subtable-area-one">
                                                                <img src="assets/img/Face2.png"><h3>Alice Smith</h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p>Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <p>Completed</p>
                                                        </td>
                                                        <td>
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <div class="last-table-area">
                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="assets/img/play-all.png"></span></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <div class="subtable-area-one">
                                                                <img src="assets/img/Face2.png"><h3>Alice Smith</h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p>Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <p>Completed</p>
                                                        </td>
                                                        <td>
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <div class="last-table-area">
                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="assets/img/play-all.png"></span></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <div class="subtable-area-one">
                                                                <img src="assets/img/Face2.png"><h3>Alice Smith</h3>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <p>Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <p>Completed</p>
                                                        </td>
                                                        <td>
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <div class="last-table-area">
                                                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><p>View Details</p><span><img src="assets/img/play-all.png"></span></button>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                </div>
            </div>
        </section>
    </aside>
    <!-- right-side -->



<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                <h4 class="modal-title">Subshare Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-1"><img src="assets/img/face2.png"></div>
                    <div class="col-md-9">
                    <h4>Alice Smith is offering vocals to track Blues
                        On Honey for 3%</h4>
                        <p>Hi, I’m interested in collaborating lorem ipsum dolor sit amet, ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                    </div>
                    <div class="col-md-2">
                        <span>3h ago</span>
                    </div>
                    <div class="col-md-12">
                        <div class="wave-graph">
                            <img src="assets/img/wave%20copy.png">
                            <a href="#"><img src="assets/img/Play%20button.png"></a>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection