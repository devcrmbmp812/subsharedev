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
                <div class="col-lg-12 top-right-content">
                    <div class="res-subshare subshare-table-area">
                        <div class="subshare-stats-area">
                            <div class="row tab-heading-table">
                                <div class="inner-table-trans-heading">
                                    <div class="col-md-9">
                                        <h3>Transactions</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#home">All</a></li>
                                            <li><a data-toggle="tab" href="#menu1">Pending</a></li>
                                            <li><a data-toggle="tab" href="#menu2">Invoices</a></li>
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
                                                        <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 116px;">DATE <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 558px;">INVOICE <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 99px;">PDF <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 176px;">CURRENCY <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 146px;">AMOUNT <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>


                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">
                                                                <p>05.05.17</p>
                                                            </td>
                                                            <td>
                                                                <p class="color-trans-div">Membership annual fee</p>
                                                            </td>
                                                            <td>
                                                                <img src="assets/img/pdf.png">
                                                            </td>
                                                            <td>
                                                               <p>USD</p>
                                                            </td>
                                                            <td>
                                                                <p class="color-trans-div">-10</p>
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
                                                        <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 116px;">DATE <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 558px;">INVOICE <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 99px;">PDF <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 176px;">CURRENCY <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 146px;">AMOUNT <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Membership annual fee</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Sale Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Membership annual fee</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Sale Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Membership annual fee</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Sale Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Membership annual fee</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Sale Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Membership annual fee</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Sale Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
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
                                                        <th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 116px;">DATE <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 558px;">INVOICE <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 99px;">PDF <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 176px;">CURRENCY <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                        <th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 146px;">AMOUNT <i class="fa fa-angle-down" aria-hidden="true"></i></th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Membership annual fee</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Sale Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Membership annual fee</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Sale Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Membership annual fee</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Sale Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Membership annual fee</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Sale Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Membership annual fee</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
                                                        </td>
                                                    </tr>
                                                    <tr role="row" class="even">
                                                        <td class="sorting_1">
                                                            <p>05.05.17</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">Sale Blues on Honey</p>
                                                        </td>
                                                        <td>
                                                            <img src="assets/img/pdf.png">
                                                        </td>
                                                        <td>
                                                            <p>USD</p>
                                                        </td>
                                                        <td>
                                                            <p class="color-trans-div">-10</p>
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
                <button type="button" class="close" data-dismiss="modal">&times;</button>
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


@section('script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
@endsection