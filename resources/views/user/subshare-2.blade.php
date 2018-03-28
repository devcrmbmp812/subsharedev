@extends('layouts.user')

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
        <section class="subhare-home home-content content">
            <div class="row">
                <div class="col-md-6">
                    <h1>Subshare Creation</h1>
                    <div class="creation-area">
                        <div class="form-group">
                            <select class="form-control" id="sel1">
                                <option>Choose role</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" id="sel1">
                                <option>Percentage </option>
                                <option>English</option>
                                <option>English</option>
                                <option>English</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="com" placeholder="Custom agreement"></textarea>
                        </div>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Send</button>
                    </div>
                    <h1>Subshare Stats</h1>
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
                                            <img src="assets/img/Line%20chart.png" class="img-responsive">
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
                <div class="col-md-6 last-sub-div">
                    <h1>Subshare Details</h1>
                        <div class="sub-detail-area">
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
                                    <img src="assets/img/wave%20copy.png" class="img-responsive sub-two-wave">
                                    <a href="#" class="sub-anchor"><img src="assets/img/Play%20button.png" class="img-responsive sub-two-play"></a>
                                </div>

                            </div>
                        </div>
                    <h1>Subshare User</h1>
                    <div class="sub-feed-area">
                        <div class="row tab-heading">
                            <div class="col-md-4">
                                <h3>Subshares User</h3>
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
                </div>
                <!-- col-md-6-end -->
            </div>
        </section>
    </aside>
    <!-- right-side -->



<div class="notification-popup">
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Subshare creation</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <select class="form-control" id="sel1">
                        <option>Choose role</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" id="sel1">
                        <option>Percentage </option>
                        <option>English</option>
                        <option>English</option>
                        <option>English</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="5" id="comment"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Send</button>
            </div>
        </div>

    </div>
</div>
</div>
<!-- Modal -->
<!-- SONG PLAY -->
<div class="songplay">
        <div class="modal fade" id="playModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-down-area">
                      <div class="row">
                          <div class="col-md-2 modal-left">
                              <div class="modal-title-area">
                                  <img src="assets/img/allison.png">
                                  <div class="modal-text">
                                      <h2>Blues on Honey</h2>
                                      <p>by Allison Green</p>
                                  </div>
                              </div>
                              <div class="album-pic">
                                  <img src="assets/img/album-pic.png" class="img-responsive">
                              </div>
                          </div>
                          <div class="col-md-8 modal-center">
                              <div class="btn-area">
                                  <div class="row">
                                  <div class="col-md-4">
                                      <button type="button" class="album-buttom">BASS</button>
                                  </div>
                                  <div class="col-md-4">
                                      <button type="button" class="red-album-buttom">BASS</button>
                                  </div>
                                  <div class="col-md-4">
                                      <button type="button" class="blue-album-buttom">BASS</button>
                                  </div>
                              </div>
                              </div>
                              <div class="album-wave-area">
                                  <img src="assets/img/popup-wave.png">
                              </div>
                              <div class="player-area">
                                  <div class="row">
                                      <div class="col-md-4">
                                          <div class="album-timer"><p>0:00</p></div>
                                      </div>
                                      <div class="col-md-8">
                                          <div class="inner-player-controller">
                                              <ul>
                                                  <li><img src="assets/img/shuffle.png"></li>
                                                  <li><img src="assets/img/backwrd.png"></li>
                                                  <li><img src="assets/img/play-controller.png"></li>
                                                  <li><img src="assets/img/farword.png"></li>
                                                  <li><img src="assets/img/loop.png"> </li>
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
@endsection

@section('script')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  <script>
      jQuery(document).ready(function () {
          jQuery(".notif-close").click(function () {
              jQuery(this).closest('.feed-notification').addClass('er-red');
              jQuery(this).closest('.feed-notification-green').addClass('er-red');
              jQuery(this).closest('.feed-notification-blue').addClass('er-red');
              jQuery(this).closest('.feed-notification-pink').addClass('er-red');
              jQuery(this).closest('.feed-notification-grey').addClass('er-red');
          });
      });
  </script>
@endsection