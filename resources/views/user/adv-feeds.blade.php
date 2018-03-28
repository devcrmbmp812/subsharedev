@extends('layouts.user')
@section('title','Adv feeds')

@section('content')
<!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <div class="breadcrumb feed-crumbs">
            <ol>
                <li><a href="#">Breadcrumb item 1</a></li>
                <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i><a href="#">Breadcrumb item 2</a></li>
            </ol>
            <div class="activation-btn">
                <div class="toggle-area">
                    <label>
                        <input type="checkbox" checked data-toggle="toggle">
                        Activities feed
                    </label>
                </div>

            </div>
        </div>
        <section class="home-content content">
            <div class="row">
                <div class="col-md-6">
                    <div class="sub-feed-area">
                        <div class="row tab-heading">
                            <div class="col-md-4">
                                <h3>Subshares</h3>
                            </div>
                            <div class="col-md-8">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#feed">All</a></li>
                                    <li><a data-toggle="tab" href="#menu1">34 Offers</a></li>
                                    <li><a data-toggle="tab" href="#menu2">12 Responses</a></li>
                                    <li><a data-toggle="tab" href="#menu3">14 Uploads</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- top tabs ends -->
                        <div class="tab-content">
                            <div id="feed" class="tab-pane fade in active">
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="assets/img/small-alice.png"></li>
                                        <li class="feed-details"><h2>Alice Smith is offering vocals to track
                                            Blues On Honey for 3%</h2>
                                            <p>Hi, I’m interested in collaborating lorem ipsum dolor sit amet, cosec....</p>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button type="button" class="btn btn-info btn-lg small-green" data-toggle="modal" data-target="#myModal">read</button> </li>
                                    </ul>
                                </div>
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="assets/img/joe.png"></li>
                                        <li class="feed-details"><h2>Joe Miller uploaded Blues On Honey</h2>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button type="button" class="btn btn-info btn-lg small-green play-green" data-toggle="modal" data-target="#playModal"><img src="assets/img/small-play.png"></button> </li>
                                    </ul>
                                </div>
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="assets/img/small-alice.png"></li>
                                        <li class="feed-details"><h2>Alice Smith is offering vocals to track
                                            Blues On Honey for 3%</h2>
                                            <p>Hi, I’m interested in collaborating lorem ipsum dolor sit amet, cosec....</p>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button class="small-green">read</button> </li>
                                    </ul>
                                </div>
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="assets/img/joe.png"></li>
                                        <li class="feed-details"><h2>Joe Miller uploaded Blues On Honey</h2>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button class="small-green"><img src="assets/img/small-play.png"></button> </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="assets/img/small-alice.png"></li>
                                        <li class="feed-details"><h2>Alice Smith is offering vocals to track
                                            Blues On Honey for 3%</h2>
                                            <p>Hi, I’m interested in collaborating lorem ipsum dolor sit amet, cosec....</p>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button type="button" class="btn btn-info btn-lg small-green" data-toggle="modal" data-target="#myModal">read</button> </li>
                                    </ul>
                                </div>
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="assets/img/joe.png"></li>
                                        <li class="feed-details"><h2>Joe Miller uploaded Blues On Honey</h2>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button type="button" class="btn btn-info btn-lg small-green play-green" data-toggle="modal" data-target="#playModal"><img src="assets/img/small-play.png"></button> </li>
                                    </ul>
                                </div>
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="assets/img/small-alice.png"></li>
                                        <li class="feed-details"><h2>Alice Smith is offering vocals to track
                                            Blues On Honey for 3%</h2>
                                            <p>Hi, I’m interested in collaborating lorem ipsum dolor sit amet, cosec....</p>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button class="small-green">read</button> </li>
                                    </ul>
                                </div>
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="assets/img/joe.png"></li>
                                        <li class="feed-details"><h2>Joe Miller uploaded Blues On Honey</h2>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button class="small-green"><img src="assets/img/small-play.png"></button> </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="assets/img/small-alice.png"></li>
                                        <li class="feed-details"><h2>Alice Smith is offering vocals to track
                                            Blues On Honey for 3%</h2>
                                            <p>Hi, I’m interested in collaborating lorem ipsum dolor sit amet, cosec....</p>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button type="button" class="btn btn-info btn-lg small-green" data-toggle="modal" data-target="#myModal">read</button> </li>
                                    </ul>
                                </div>
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="assets/img/joe.png"></li>
                                        <li class="feed-details"><h2>Joe Miller uploaded Blues On Honey</h2>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button type="button" class="btn btn-info btn-lg small-green play-green" data-toggle="modal" data-target="#playModal"><img src="assets/img/small-play.png"></button> </li>
                                    </ul>
                                </div>
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="assets/img/small-alice.png"></li>
                                        <li class="feed-details"><h2>Alice Smith is offering vocals to track
                                            Blues On Honey for 3%</h2>
                                            <p>Hi, I’m interested in collaborating lorem ipsum dolor sit amet, cosec....</p>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button class="small-green">read</button> </li>
                                    </ul>
                                </div>
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="assets/img/joe.png"></li>
                                        <li class="feed-details"><h2>Joe Miller uploaded Blues On Honey</h2>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button class="small-green"><img src="assets/img/small-play.png"></button> </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="assets/img/small-alice.png"></li>
                                        <li class="feed-details"><h2>Alice Smith is offering vocals to track
                                            Blues On Honey for 3%</h2>
                                            <p>Hi, I’m interested in collaborating lorem ipsum dolor sit amet, cosec....</p>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button type="button" class="btn btn-info btn-lg small-green" data-toggle="modal" data-target="#myModal">read</button> </li>
                                    </ul>
                                </div>
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="assets/img/joe.png"></li>
                                        <li class="feed-details"><h2>Joe Miller uploaded Blues On Honey</h2>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button type="button" class="btn btn-info btn-lg small-green play-green" data-toggle="modal" data-target="#playModal"><img src="assets/img/small-play.png"></button> </li>
                                    </ul>
                                </div>
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="assets/img/small-alice.png"></li>
                                        <li class="feed-details"><h2>Alice Smith is offering vocals to track
                                            Blues On Honey for 3%</h2>
                                            <p>Hi, I’m interested in collaborating lorem ipsum dolor sit amet, cosec....</p>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button class="small-green">read</button> </li>
                                    </ul>
                                </div>
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="assets/img/joe.png"></li>
                                        <li class="feed-details"><h2>Joe Miller uploaded Blues On Honey</h2>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button class="small-green"><img src="assets/img/small-play.png"></button> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="sales-area">
                        <div class="stats-area">
                            <div class="row tab-heading">
                                <div class="col-md-6">
                                    <h3>Stats</h3>
                                </div>
                                <div class="col-md-6">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#today">Today</a></li>
                                        <li><a data-toggle="tab" href="#week">Week</a></li>
                                        <li><a data-toggle="tab" href="#month">Month</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- top tabs ends -->

                            <div class="tab-content">
                                <div id="today" class="tab-pane fade in active">
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
                                <div id="week" class="tab-pane fade">
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
                                            <img src="assets/img/Line%20chart.png">
                                        </div>
                                    </div>
                                </div>
                                <div id="month" class="tab-pane fade">
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
                                            <img src="assets/img/Line%20chart.png">
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
                    <div class="stories-area">
                        <p>2h ago</p>
                        <h2>Success stories</h2>
                        <span>by Joe Miller</span>
                    </div>
                    <div class="small-stories-area">
                        <p>2h ago</p>
                        <h2>Lorem ipsum<br>
                            dolor sit amet</h2>
                        <span>by Alice Smith</span>
                    </div>
                    <!-- Stories-area-end -->
                    <div class="white-small-tabs">
                    <h3>765</h3><div class="icon-graph"> <img src="assets/img/graph-icon.png" class="img-responsive"></div>
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
                    <div class="feed-notification">
                        <span>5%</span>
                        <img src="assets/img/small-alice.png">
                        <div class="notif-text">
                            <h2>Alice Smith</h2>
                            <p>Is requiring Mastering to
                                <a href="#">Ambient Song...</a> </p>
                        </div>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification-green">
                        <h2>Sale</h2>
                        <p>Blues On Honey sold for $10</p>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification">
                        <img src="assets/img/allison.png">
                        <div class="notif-text">
                            <h2>Alice Green</h2>
                            <p>Uploaded track Blues on Honey</p>
                        </div>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification">
                        <span>5%</span>
                        <img src="assets/img/small-alice.png">
                        <div class="notif-text">
                            <h2>Alice Smith</h2>
                            <p>Is now following you</p>
                        </div>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification">
                        <img src="assets/img/joe.png">
                        <div class="notif-text">
                            <h2>Joe Miller</h2>
                            <p>Is requiring Mastering to
                                <a href="#">Ambient Song...</a> </p>
                        </div>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification-blue">
                        <p>+110 tracks uploaded to Neptune today.</p>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification">
                        <span>3%</span>
                        <img src="assets/img/allison.png">
                        <div class="notif-text">
                            <h2>Allison Green</h2>
                            <p>Requests Mastering to
                                Track<a href="#">Blues On Honey...</a> </p>
                        </div>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification">
                        <span>5%</span>
                        <img src="assets/img/small-alice.png">
                        <div class="notif-text">
                            <h2>Alice Smith</h2>
                            <p>Wants to offer Vocals to
                                Track<a href="#">Ambient Song...</a> </p>
                        </div>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification">
                        <span>3%</span>
                        <img src="assets/img/joe.png">
                        <div class="notif-text">
                            <h2>Joe Miller</h2>
                            <p>Requests Mastering to
                                Track <a href="#">Blues On Honey...</a> </p>
                        </div>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification-pink">
                        <p>+32 subshares started today. 455 this month</p>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification">
                        <img src="assets/img/joe.png">
                        <div class="notif-text">
                            <h2>Joe Miller</h2>
                            <p>Uploaded track<a href="#">Ambient Song...</a> </p>
                        </div>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification">
                        <span>3%</span>
                        <img src="assets/img/allison.png">
                        <div class="notif-text">
                            <h2>Allison Green</h2>
                            <p>Requests Mastering to
                                Track <a href="#">Blues On Honey...</a> </p>
                        </div>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification-grey">
                        <p>+2003 track uploaded this week. Total 88K</p>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>

                    <!-- grey-area-end -->

                </div>
                <!-- col-md-3-end -->
            </div>
        </section>
    </aside>
    <!-- right-side -->
@endsection