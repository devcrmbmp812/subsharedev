@extends('layouts.user')
@section('title','Dashboard')
@section('content')
<aside class="right-side">
        <ol class="breadcrumb">
            <li><a href="#">DashBoard</a></li>
        </ol>
        <section class="home-content content">
            <div class="row">
                <div class="col-md-12">
                    <div class="grey-area" style="background: none;text-align: center;color: black;">
                        <div id="chartdiv" style="width: 98%; height:400px;"></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="home-content content">
            <div class="row">

                <div class="col-md-6">
                    <div class="sales-area">
                        <div class="stats-area">
                            <div class="row tab-heading">
                                <div class="col-md-6">
                                    <h3>Subshare Chart</h3>
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
                                            <img src="{{ url('assets/img/Line%20chart.png') }}" class="img-responsive">
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
                                            <img src="{{ url('assets/img/Line%20chart.png') }}" class="img-responsive">
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
                                            <img src="{{ url('assets/img/Line%20chart.png') }}" class="img-responsive">
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
                                                <td><img src="{{ url('assets/img/joe.png') }}"><span>Joe Miller</span> </td>
                                                <td>$345</td>
                                                <td>45</td>
                                                <td>224</td>
                                                <td>80%</td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{ url('assets/img/joe.png') }}"><span>Joe Miller</span> </td>
                                                <td>$345</td>
                                                <td>45</td>
                                                <td>224</td>
                                                <td>80%</td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{ url('assets/img/joe.png') }}"><span>Joe Miller</span> </td>
                                                <td>$345</td>
                                                <td>45</td>
                                                <td>224</td>
                                                <td>80%</td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{ url('assets/img/joe.png') }}"><span>Joe Miller</span> </td>
                                                <td>$345</td>
                                                <td>45</td>
                                                <td>224</td>
                                                <td>80%</td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{ url('assets/img/joe.png') }}"><span>Joe Miller</span> </td>
                                                <td>$345</td>
                                                <td>45</td>
                                                <td>224</td>
                                                <td>80%</td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{ url('assets/img/joe.png') }}"><span>Joe Miller</span> </td>
                                                <td>$345</td>
                                                <td>45</td>
                                                <td>224</td>
                                                <td>80%</td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{ url('assets/img/joe.png') }}"><span>Joe Miller</span> </td>
                                                <td>$345</td>
                                                <td>45</td>
                                                <td>224</td>
                                                <td>80%</td>
                                            </tr>
                                            <tr>
                                                <td><img src="{{ url('assets/img/joe.png') }}"><span>Joe Miller</span> </td>
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

 <style type="text/css">
.dashboad tr td {
    background: none !important;
    border: none !important;
}

.dashboad tr, .dashboad tbody {
    background: none !important;
    border: none !important;
}
#col_title {
    font-family: 'Raleway', sans-serif;
    font-size: 34px;
    font-weight: bold;
    margin-bottom: 5px;
    display: inline-block;
    margin-top: 0;
}
#col_percentage {
    font-family: 'Raleway', sans-serif;
    font-size: 30px;
    font-weight: bold;
    vertical-align: top;
    text-align: right;
}
 </style>
 <div class="col-md-12">
    <table class="table dashboad" style="margin-bottom: 0 !important;">
        <tr>
            <td id="col_title">Neptune</td>
            <td id="col_percentage"><img src="{{ url('assets/img/arrow-up.png') }}"> <span style="color: #99e8f1;">4%</span></td>
        </tr>
        <tr>
            <td id="col_title">Spotify</td>
            <td id="col_percentage"><img src="{{ url('assets/img/down-arrow.png') }}"> <span style="color: #f8deb7;">7%</span></td>
        </tr>
        <tr>
            <td id="col_title">Itunes</td>
            <td id="col_percentage"><img src="{{ url('assets/img/arrow-up.png') }}"> <span style="color: #99e8f1;">2%</span></td>
        </tr>
    </table>
 </div>

                        </div>
                    </div>
                    <!-- grey-area-end -->
                    <div class="white-small-tabs">
                        <h3>765</h3><div class="icon-graph"> <img src="{{ url('assets/img/graph-icon.png') }}"></div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:45%">
                            </div>
                        </div>
                        <h4>SALES GROW</h4><span class="progress-percentage"> 45%</span>
                    </div>
                    <div class="white-small-tabs">
                        <h3>23</h3><div class="icon-graph"> <img src="{{ url('assets/img/responses.png') }}"></div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:45%">
                            </div>
                        </div>
                        <h4>Successful Subshares</h4><span class="progress-percentage"> 45%</span>
                    </div>
                    <div class="graph-grow">
                        <img src="{{ url('assets/img/graph-grow.png') }}" class="img-responsive">
                        <h4>Monthly Subshares</h4>
                    </div>

                    <div class="graph-grow">
                        <img src="{{ url('assets/img/graph-grow.png') }}" class="img-responsive">
                        <h4>Monthly Earning</h4>
                    </div>
                </div>
                <!-- col-md-3-end -->

                <!-- right most column start -->
                <div class="col-md-3 last-sales">
                    <div class="top-white-box white-small-tabs">
                        <h3>Youtube + Instagram</h3><div class="icon-graph"> <img src="{{ url('assets/img/graph-icon.png') }}"></div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:45%">
                            </div>
                        </div>
                        <h4>SALES GROW</h4><span class="progress-percentage"> 45%</span>
                    </div>
                    <div class="white-small-tabs">
                        <h3>Sub Genre's</h3><div class="icon-graph"> <img src="{{ url('assets/img/responses.png') }}"></div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:45%">
                            </div>
                        </div>
                        <h4>Responses</h4><span class="progress-percentage"> 45%</span>
                    </div>

                   <!--
                        <div class="grey-area" style="background: none;text-align: center;color: black;">
                            <div class="row">
                                <div class="col-md-12">
                                     <div id="chartdiv" style="width: 100%; height:200px;"></div>
                                    <h4>Subshare Connections</h4>
                                </div>

                            </div>
                        </div>
                    -->
                    <!-- grey-area-end -->

                </div>
                <!-- right most column end -->
                <!-- col-md-3-end -->
            </div>
        </section>
     <style>
        circle{
         display: none;
        }
        #chartdiv .amcharts-main-div .amcharts-chart-div a {
         display: none !important;
        }
     </style>
     <script>
     $( document ).ready(function() {

/**
 * SVG path for target icon
 */
var targetSVG = "M9,0C4.029,0,0,4.029,0,9s4.029,9,9,9s9-4.029,9-9S13.971,0,9,0z M9,15.93 c-3.83,0-6.93-3.1-6.93-6.93S5.17,2.07,9,2.07s6.93,3.1,6.93,6.93S12.83,15.93,9,15.93 M12.5,9c0,1.933-1.567,3.5-3.5,3.5S5.5,10.933,5.5,9S7.067,5.5,9,5.5 S12.5,7.067,12.5,9z";

/**
 * SVG path for plane icon
 */
var planeSVG = "M448 708l231-196-231-196v392zM512 0Q373 0 255 68.5T68.5 255 0 512t68.5 257T255 955.5t257 68.5 257-68.5T955.5 769t68.5-257-68.5-257T769 68.5 512 0zm248 528L425 813q-7 6-16.5 6t-17-6-7.5-16V226q0-9 7.5-15.5t17-6.5 16.5 7l335 285q8 7 8 16t-8 16z";

/**
 * Create the map
 */
var map = AmCharts.makeChart( "chartdiv", {
"type": "map",
"theme": "light",
"projection": "winkel3",
"dataProvider": <?= $json_data ?>,

  "areasSettings": {
    "unlistedAreasColor": "#8dd9ef"
  },

  "imagesSettings": {
    "color": "#585869",
    "rollOverColor": "#585869",
    "selectedColor": "#585869",
    "pauseDuration": 0.2,
    "animationDuration": 4,
    "adjustAnimationSpeed": true
  },

  "linesSettings": {
    "color": "#585869",
    "alpha": 0.4
  },

  "export": {
    "enabled": true
  }

} );
           }); // document ready.
           $("#chartdiv a").css('display','none');
     </script>
    </aside>
@endsection

@section('script')
<!-- Resources -->
<script src="https://www.amcharts.com/lib/3/ammap.js"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
@endsection
