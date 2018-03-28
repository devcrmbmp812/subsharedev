@extends('layouts.admin')

@section('content')
<!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <ol class="breadcrumb">
            <li><a href="#">Breadcrumb item 1</a></li>
            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#">Breadcrumb item 2</a></li>
        </ol>
        <section class="home-content content">
            <div class="row">
                <div class="col-md-6">
                    <div class="sales-area">
                        <div class="stats-area">
                            <div class="row tab-heading">
                                <div class="col-md-6">
                                    <h3>Stats</h3>
                                </div>
                                <div class="col-md-6">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#home">Today</a></li>
                                        <li><a data-toggle="tab" href="#menu1">Week</a></li>
                                        <li><a data-toggle="tab" href="#menu2">Month</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- top tabs ends -->

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Sales Grow</h3>
                                            <div class="circular-pro">
                                                <div class="progress blue">
                                                    <span class="progress-left">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <div class="progress-value">75%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="assets/img/Line%20chart.png" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Sales Grow</h3>
                                            <div class="circular-pro">
                                                <div class="progress blue">
                                                    <span class="progress-left">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <div class="progress-value">75%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="assets/img/Line%20chart.png" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h3>Sales Grow</h3>
                                            <div class="circular-pro">
                                                <div class="progress blue">
                                                    <span class="progress-left">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <span class="progress-right">
                                                        <span class="progress-bar"></span>
                                                    </span>
                                                    <div class="progress-value">75%</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="assets/img/Line%20chart.png" class="img-responsive">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section class="content">
                            <div class="portlet box primary">
                                <div class="portlet-body">
                                    <div class="panel-body table-responsive">
                                        <div id="table1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                                 <div class="table-scrollable">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Member</th>
                                                <th>Earnings</th>
                                                <th>Cases</th>
                                                <th>Closed</th>
                                                <th>Rate</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><img src="assets/img/joe.png"><span>Joe Miller</span> </td>
                                                <td>$345</td>
                                                <td>45</td>
                                                <td>224</td>
                                                <td>80%</td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/img/joe.png"><span>Joe Miller</span> </td>
                                                <td>$345</td>
                                                <td>45</td>
                                                <td>224</td>
                                                <td>80%</td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/img/joe.png"><span>Joe Miller</span> </td>
                                                <td>$345</td>
                                                <td>45</td>
                                                <td>224</td>
                                                <td>80%</td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/img/joe.png"><span>Joe Miller</span> </td>
                                                <td>$345</td>
                                                <td>45</td>
                                                <td>224</td>
                                                <td>80%</td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/img/joe.png"><span>Joe Miller</span> </td>
                                                <td>$345</td>
                                                <td>45</td>
                                                <td>224</td>
                                                <td>80%</td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/img/joe.png"><span>Joe Miller</span> </td>
                                                <td>$345</td>
                                                <td>45</td>
                                                <td>224</td>
                                                <td>80%</td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/img/joe.png"><span>Joe Miller</span> </td>
                                                <td>$345</td>
                                                <td>45</td>
                                                <td>224</td>
                                                <td>80%</td>
                                            </tr>
                                            <tr>
                                                <td><img src="assets/img/joe.png"><span>Joe Miller</span> </td>
                                                <td>$345</td>
                                                <td>45</td>
                                                <td>224</td>
                                                <td>80%</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- col-md-6-end -->
                <div class="col-md-3 center-area">
                    <div class="grey-area">
                        <div class="row">
                            <div class="col-md-7">
                                <ul>
                                    <li><span>$</span><h3>23.5</h3>
                                    <p>Lorem ipsum</p></li>
                                    <li><h3>38</h3><span class="curency-h-div">h</span>
                                        <p>Dolor amet</p></li>
                                    <li><span>$</span><h3>45.5</h3>
                                        <p>Lorem ipsum</p></li>

                                </ul>
                            </div>
                            <div class="col-md-5">
                                <ul class="grey-right">
                                    <li><img src="assets/img/arrow-up.png"><span>4%</span></li>
                                    <li class="second-list"><img src="assets/img/down-arrow.png"><span>7%</span></li>
                                    <li><img src="assets/img/arrow-up.png"><span>2%</span></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <!-- grey-area-end -->
                    <div class="white-small-tabs">
                    <h3>765</h3><div class="icon-graph"> <img src="assets/img/graph-icon.png"></div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:45%">
                        </div>
                    </div>
                    <h4>SALES GROW</h4><span class="progress-percentage"> 45%</span>
                </div>
                    <div class="white-small-tabs">
                        <h3>23</h3><div class="icon-graph"> <img src="assets/img/responses.png"></div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:45%">
                            </div>
                        </div>
                        <h4>Responses</h4><span class="progress-percentage"> 45%</span>
                    </div>
                    <div class="graph-grow">
                        <img src="assets/img/graph-grow.png" class="img-responsive">
                    </div>
                </div>
                <!-- col-md-3-end -->
                <div class="col-md-3 last-sales">
                    <div class="top-white-box white-small-tabs">
                        <h3>765</h3><div class="icon-graph"> <img src="assets/img/graph-icon.png"></div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:45%">
                            </div>
                        </div>
                        <h4>SALES GROW</h4><span class="progress-percentage"> 45%</span>
                    </div>
                    <div class="white-small-tabs">
                        <h3>23</h3><div class="icon-graph"> <img src="assets/img/responses.png"></div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:45%">
                            </div>
                        </div>
                        <h4>Responses</h4><span class="progress-percentage"> 45%</span>
                    </div>
                    <div class="graph-grow">
                        <img src="assets/img/graph-grow.png" class="img-responsive">
                    </div>
                    <div class="grey-area">
                        <div class="row">
                            <div class="col-md-7">
                                <ul>
                                    <li><span>$</span><h3>23.5</h3>
                                        <p>Lorem ipsum</p></li>
                                    <li><h3>38</h3><span class="curency-h-div">h</span>
                                        <p>Dolor amet</p></li>
                                    <li><span>$</span><h3>45.5</h3>
                                        <p>Lorem ipsum</p></li>

                                </ul>
                            </div>
                            <div class="col-md-5">
                                <ul class="grey-right">
                                    <li><img src="assets/img/arrow-up.png"><span>4%</span></li>
                                    <li class="second-list"><img src="assets/img/down-arrow.png"><span>7%</span></li>
                                    <li><img src="assets/img/arrow-up.png"><span>2%</span></li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    <!-- grey-area-end -->

                </div>
                <!-- col-md-3-end -->
            </div>
        </section>
    </aside>
    <!-- right-side -->
@endsection