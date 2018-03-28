@extends('layouts.admin')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.1.5/wavesurfer.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.1.3/plugin/wavesurfer.regions.min.js"></script>

<style>


/* Regions */
.wavesurfer-region {
  border: 1px solid #ddd !important;
  box-sizing: border-box;
}

/* Region handles */
.wavesurfer-handle {
  width: 10px !important;
  max-width: 10px !important;
  border: 1px solid #ddd;
  background: rgba(0, 0, 0, 0.1);
  box-sizing: border-box;
}


.wavesurfer-handle:before,
.wavesurfer-handle:after {
  content: '';
  display: block;
  position: absolute;
  z-index: 1;
  border-top: 1px solid #fff;
  border-bottom: 1px solid #fff;
  height: 4px;
  left: 5%;
  right: 5%;
  top: 50%;
  transform: translateY(-50%);
}

.wavesurfer-handle:before {
  margin-top: -3px;
}

/* Labels */
.labels-container {
  position: relative;
}
.wavesurfer-region{
    opacity: 0.3!important;
}
.wavesurfer-label {
  display: none;
  position: absolute;
  transform: translateY(-100%);
  z-index: 10;

}

.wavesurfer-label input {
  margin: 3%;
  width: 94%;
}
.album-buttom2 .album-buttoms{
	border-radius: 14px;
    background-color: #e72b91;
    position: relative;
    width: 111px;
    height: 29px;
    z-index: 483;
    font-size: 14px;
    font-weight: bold;
    color: #fff;
    border: none;
    margin-top: 9px;
    margin-bottom: 10px;
    margin-left: 40px;
}
.album-buttom3 .album-buttoms{
	    border-radius: 14px;
    background-color: #3ecdd2;
    position: relative;
    width: 111px;
    height: 29px;
    z-index: 483;
    font-size: 14px;
    font-weight: bold;
    color: #fff;
    border: none;
    margin-top: 9px;
    margin-bottom: 10px;
    margin-left: 40px;
}

.album-buttom1 .album-buttoms:after {
    content: "";
    position: absolute;
    width: 3px;
    height: 2px;
    background: #000;
    bottom: -8px;
    left: 46px;
    right: 0;
    text-align: center;
    border-left: 4px solid #fff;
    border-top: 8px solid #91c21d;
    border-right: 4px solid #fff;
}
.album-buttom2 .album-buttoms:after {
    content: "";
    position: absolute;
    width: 3px;
    height: 2px;
    background: #000;
    bottom: -8px;
    left: 46px;
    right: 0;
    text-align: center;
    border-left: 4px solid #fff;
    border-top: 8px solid #e72b91;
    border-right: 4px solid #fff;
}
.album-buttom3 .album-buttoms:after {
    content: "";
    position: absolute;
    width: 3px;
    height: 2px;
    background: #000;
    bottom: -8px;
    left: 46px;
    right: 0;
    text-align: center;
    border-left: 4px solid #fff;
    border-top: 8px solid #3ecdd2;
    border-right: 4px solid #fff;
}



.album-buttom1 .album-buttoms {
    border-radius: 14px;
    background-color: #91c21d;
    position: relative;
    width: 111px;
    height: 29px;
    z-index: 483;
    font-size: 14px;
    font-weight: bold;
    color: #fff;
    border: none;
    margin-top: 9px;
    margin-bottom: 10px;
    margin-left: 0px;
}
.labels-container {
    position: relative;
    margin: 70px 0px;
}
.btn-primary:active,
.btn-primary:hover,
.btn-primary,
.btn-primary:active:focus{
	color: #fff!important;
    background-color: #fff!important;
    border-color: #fff!important;
    box-shadow: inset 0 0px 0px rgba(0,0,0,0)!important;
}
.active-module{
	    display: block!important;
    visibility: visible!important;
}
#playModal{
    display: block!important;
    visibility: hidden;
}
</style>
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
                                        <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-alice.png"></li>
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
                                        <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/joe.png"></li>
                                        <li class="feed-details"><h2>Joe Miller uploaded Blues On Honey</h2>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button type="button" class="btn btn-info btn-lg small-green play-green" id="buttonClick" data-toggle="modal" data-target="#playModal">
                                            <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-play.png">
                                        </button> </li>
                                    </ul>
                                </div>
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-alice.png"></li>
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
                                        <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/joe.png"></li>
                                        <li class="feed-details"><h2>Joe Miller uploaded Blues On Honey</h2>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button class="small-green"><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-play.png"></button> </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-alice.png"></li>
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
                                        <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/joe.png"></li>
                                        <li class="feed-details"><h2>Joe Miller uploaded Blues On Honey</h2>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button type="button" class="btn btn-info btn-lg small-green play-green" data-toggle="modal" data-target="#playModal"><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-play.png"></button> </li>
                                    </ul>
                                </div>
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-alice.png"></li>
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
                                        <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/joe.png"></li>
                                        <li class="feed-details"><h2>Joe Miller uploaded Blues On Honey</h2>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button class="small-green"><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-play.png"></button> </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-alice.png"></li>
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
                                        <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/joe.png"></li>
                                        <li class="feed-details"><h2>Joe Miller uploaded Blues On Honey</h2>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button type="button" class="btn btn-info btn-lg small-green play-green" data-toggle="modal" data-target="#playModal"><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-play.png"></button> </li>
                                    </ul>
                                </div>
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-alice.png"></li>
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
                                        <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/joe.png"></li>
                                        <li class="feed-details"><h2>Joe Miller uploaded Blues On Honey</h2>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button class="small-green"><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-play.png"></button> </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-alice.png"></li>
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
                                        <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/joe.png"></li>
                                        <li class="feed-details"><h2>Joe Miller uploaded Blues On Honey</h2>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button type="button" class="btn btn-info btn-lg small-green play-green" data-toggle="modal" data-target="#playModal"><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-play.png"></button> </li>
                                    </ul>
                                </div>
                                <div class="inner-feed-area">
                                    <ul>
                                        <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-alice.png"></li>
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
                                        <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/joe.png"></li>
                                        <li class="feed-details"><h2>Joe Miller uploaded Blues On Honey</h2>
                                        </li>
                                        <li><p>3h ago</p></li>
                                        <li><button class="small-green"><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-play.png"></button> </li>
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
                                            <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/Line%20chart.png" class="img-responsive">
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
                                            <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/Line%20chart.png" class="img-responsive">
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
                                            <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/Line%20chart.png" class="img-responsive">
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
                                                <td><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/joe.png"><span>Joe Miller</span> </td>
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
                    <h3>765</h3><div class="icon-graph"> <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/graph-icon.png" class="img-responsive"></div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:45%">
                        </div>
                    </div>
                    <h4>SALES GROW</h4><span class="progress-percentage"> 45%</span>
                </div>
                    <div class="white-small-tabs">
                        <h3>23</h3><div class="icon-graph"> <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/responses.png"></div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:45%">
                            </div>
                        </div>
                        <h4>Responses</h4><span class="progress-percentage"> 45%</span>
                    </div>
                    <div class="graph-grow">
                        <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/graph-grow.png" class="img-responsive">
                    </div>
                </div>
                <!-- col-md-3-end -->
                <div class="col-md-3 last-sales">
                    <div class="feed-notification">
                            <span>5%</span>
                            <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-alice.png">
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
                        <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/allison.png">
                        <div class="notif-text">
                            <h2>Alice Green</h2>
                            <p>Uploaded track Blues on Honey</p>
                        </div>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification">
                        <span>5%</span>
                        <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-alice.png">
                        <div class="notif-text">
                            <h2>Alice Smith</h2>
                            <p>Is now following you</p>
                        </div>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification">
                        <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/joe.png">
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
                        <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/allison.png">
                        <div class="notif-text">
                            <h2>Allison Green</h2>
                            <p>Requests Mastering to
                                Track<a href="#">Blues On Honey...</a> </p>
                        </div>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification">
                        <span>5%</span>
                        <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/small-alice.png">
                        <div class="notif-text">
                            <h2>Alice Smith</h2>
                            <p>Wants to offer Vocals to
                                Track<a href="#">Ambient Song...</a> </p>
                        </div>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification">
                        <span>3%</span>
                        <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/joe.png">
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
                        <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/joe.png">
                        <div class="notif-text">
                            <h2>Joe Miller</h2>
                            <p>Uploaded track<a href="#">Ambient Song...</a> </p>
                        </div>
                        <button class="notif-close"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                    </div>
                    <div class="feed-notification">
                        <span>3%</span>
                        <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/allison.png">
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


<!-- Modal -->
<!-- SONG PLAY -->
<div class="songplay">
        <div class="modal fade in" id="playModal" role="dialog" style="display: block!important; padding-right: 17px;">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-down-area">
                        <div class="row">
                            <div class="col-md-2 modal-left">
                                <div class="modal-title-area">
                                    <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/allison.png">
                                    <div class="modal-text">
                                        <h2>Blues on Honey</h2>
                                        <p>by Allison Green</p>
                                    </div>
                                </div>
                                <div class="album-pic">
                                    <img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/album-pic.png" class="img-responsive">
                                </div>
                            </div>
							<div class="col-md-8 modal-center">
								<div>
									<!--<div id="slider-handles4" class="noUi-target noUi-ltr noUi-horizontal"></div> -->
								<div class="labels-container">

                                    <div class="wavesurfer-label col-md-4" id="stanza1-label"><span class="play_rigion album-buttom1" onclick="play_rigion(1,10)"><button type="button" class="album-buttoms">BASS 1<img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/gray-play-controller.png" style="width: 27px;float: right;/*! background-color: none; */"></button></span></div>
									<div class="wavesurfer-label col-md-4" id="stanza12-label"><span class="play_rigion album-buttom2" onclick="play_rigion(11,20)"><button type="button" class="album-buttoms">BASS 2<img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/gray-play-controller.png" style="width: 27px;float: right;/*! background-color: none; */"></button></span></div>
									<div class="wavesurfer-label col-md-4" id="stanza13-label"><span class="play_rigion album-buttom3" onclick="play_rigion(30,40)"><button type="button" class="album-buttoms">BASS 3<img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/gray-play-controller.png" style="width: 27px;float: right;/*! background-color: none; */"></button></span></div>
									<div class="waveform"></div>
								</div>


							</div>
								<div class="player-area">
	                                <div class="row">
	                                    <div class="col-md-4">
	                                        <div class="album-timer"><p>0:00</p></div>
	                                    </div>
	                                    <div class="col-md-8">
	                                        <div class="inner-player-controller">
	                                            <ul>
	                                                <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/shuffle.png"></li>
	                                                <li><button class="btn btn-primary" onclick="wavesurfer.skipBackward()"><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/backwrd.png"> </button></li>
													<li>
														<button class="btn btn-primary" onclick="wavesurfer.playPause()">
															<img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/play-controller.png">
														</button>
													</li>
	                                                <li><button class="btn btn-primary" onclick="wavesurfer.skipForward()"><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/farword.png"></button></li>
	                                                <li><img src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/loop.png"></li>
	                                            </ul>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>

							</div>


                            <div class="col-md-2 modal-right">
                                <div class="advance-btn">
                                    <div class="toggle-area">
                                        <label>
                                            <input type="checkbox" checked data-toggle="toggle">
                                            Advanced
                                        </label>
                                        <p>-4:08</p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



</div>




    <script>
     function getMessage(){
            $.ajax({
               type:'POST',
               url:'/getmsg',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data){
                  $("#msg").html(data.msg);
               }
            });
         }


$(window).on('load',function(){
  $("#playModal").hide();
});
var wavesurfer = WaveSurfer.create({
  container: '.waveform',
  waveColor: 'violet',
        barWidth: 2,
                normalize: true,
                minimap: true,
                barHeight: 5,
                maxCanvasWidth: 10
});

wavesurfer.load('https://ia902606.us.archive.org/35/items/shortpoetry_047_librivox/song_cjrg_teasdale_64kb.mp3');

/* Update labels */
var updateLabel = function (region) {
  var regionEl = document.querySelector('region[data-id="' + region.id + '"]');
  var labelEl = document.querySelector('#' + region.id + '-label');
  console.log(labelEl );
  if (!labelEl) return;
  labelEl.style.display = 'block';
  labelEl.style.width = regionEl.clientWidth + 'px';
  labelEl.style.left = regionEl.offsetLeft + 'px';
};

wavesurfer.enableDragSelection({
  drag: false,
  slop: 5
});

wavesurfer.on('region-created', updateLabel);
wavesurfer.on('region-updated', updateLabel);

wavesurfer.on('ready', function () {

  var region = wavesurfer.addRegion({
    id: 'stanza1',
    start: 1,
    end: 10,
    color:'hsla(200, 100%, 30%, 0.1)'
  });

    var region = wavesurfer.addRegion({
    id: 'stanza12',
    start: 11,
    end: 20,
    color: 'rgb(145,194,29)',
	opacity:0.3
  });

    var region = wavesurfer.addRegion({
    id: 'stanza13',
    start: 30,
    end: 40,
    color: 'hsla(200, 100%, 30%, 0.1)'
  });

});
function play_rigion(strat_time,end_time){

  wavesurfer.play(strat_time,end_time);
  }


$(document).ready(function(){
$('.play-green').click(function(){
	var div_id=$(this).attr('data-target');
	$(div_id).addClass('active-module');
	});

$('.inner-feed-area').on('click', '#buttonClick', function(event){
	event.preventDefault()
	var data={'action':'testing is here'}
	$.ajax({
		type: "POST",
		url: "{{ url('/feed') }}",
		data: '_token = <?php echo csrf_token() ?>',
		function(data){
            alert("okkkkk");
        }
	}
	);
});

});

   </script>

<!--@extends('home.layouts.footer')-->


@endsection