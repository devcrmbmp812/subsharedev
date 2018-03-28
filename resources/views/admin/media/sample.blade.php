<div class="inner-submit-content">
    <!-- tagging start -->
    <div class="third-submit-area">
        <div class="top-submit-nav">
            <a href="#step-3" type="button" class="btn btn-primary-nav btn-circle-nav">3</a>
            <p>Tagging</p>
        </div>


        <div class="form-group row">

            <!-- sermad code  -->
            <section>
                <div class="view">
                    <div id="waveform-timeline"></div>
                    <div class="labels-container">

                    </div>

                    <div id="waveform"> </div>

                    <div class="player-area" style="margin-bottom:0px !important;">
                        <div class="row" style="margin-top:40px;">
                            <div class="col-md-8">
                                <div class="inner-player-controller">
                                    <ul>
                                        <li><button class="btn btn-primary add-tag-btn" id="append-tag" data-id="0" onclick="add_tag_wave(this.id);"> <h3 style="color: #2ae281;">+ Add Tag</h3>
                                            </button></li>
                                        <li><button id="play-main-btn" class="btn btn-primary" data-id="1" onclick="customplayPause()">
                                                <img class="img1" src="http://18.217.71.177/subshare/assets/admin/img/play-controller.png">
                                                <img class="img2" src="http://novaturesol.com/subsharefile/subsharefile/assets/admin/img/pause-controller.png" style="display:none;">

                                            </button></li>
                                    </ul>
                                </div>
                            </div>
                            {{--<table class="table dataTable no-footer" id="table1" role="grid" aria-describedby="table1_info">--}}
                            {{--<thead>--}}
                            {{--<tr role="row">--}}
                            {{--<th class="sorting_asc" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" style="width: 188px;">Start Time</th>--}}
                            {{--<th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 78px;">End Time</th>--}}
                            {{--<th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 78px;">Tag Name</th>--}}
                            {{--<th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 78px;">Play</th>--}}
                            {{--<th class="sorting" tabindex="0" aria-controls="table1" rowspan="1" colspan="1" aria-label="" style="width: 78px;">Remove</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}

                            {{--<tbody id="tbody_track">--}}

                            {{--</tbody>--}}
                            {{--</table>--}}


                        </div>
                    </div>
                </div>
                <br />
                <br />
                {{--<button id="addtag" class="btn btn-primary" onclick="doTheChange();">Add Tag</button>    <button id="btn_do_pp" class="btn btn-info" onclick="wavesurfer.playPause();">Play/Pause</button>--}}
                {{--<br />--}}
                {{--<!-- <div class="row" id="tagSections"> -->--}}
                <br />
                <!-- example -->
            </section>
            <!-- Minimum tag<span class="example-val" id="slider-margin-value-min">00</span>
            <br> Maximum tag<span class="example-val" id="slider-margin-value-max">00</span> -->
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
                    opacity: 0.4!important;
                }
                .wavesurfer-label {
                    display: none;
                    position: absolute;
                    transform: translateY(-100%);
                    z-index: 10;
                    top: 0px;

                }
                .album-buttom:after{
                    background:none!important;
                }
                .wavesurfer-label input {
                    margin: 3%;
                    width: 94%;
                }
                .album-buttom {
                    border-radius: 14px;
                    background-color: #FFF;
                    position: relative;
                    width: 47px;
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
                    margin: 0px 0px;
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
                .start-time{
                    float: right;
                    position: absolute;
                    bottom: -164px;
                    left: -15px;
                    /* background: #000; */
                    width: 39px;
                    border-radius: 4px;
                    background-color: #91c21d;
                    color: #fff;
                    text-align: center;
                }
                span.start-time:after {

                    content: "";
                    position: absolute;
                    width: 0px;
                    height: 0px;
                    background: #000;
                    bottom: -14px;
                    left: 16px;
                    right: 0;
                    text-align: center;
                    border-left: 0px solid #fff;
                    border-top: 0px solid #fff;
                    border-right: 0px solid #fff;
                    border-bottom: 0px solid #91c21d;
                    top: -10px;
                }
                .end-time{
                    float: right;
                    position: absolute;
                    bottom: -164px;
                    right: -26px;
                    /* background: #000; */
                    width: 39px;
                    border-radius: 4px;
                    background-color: #91c21d;
                    color: #fff;
                    text-align: center;
                }
                span.end-time:after {

                    content: "";
                    position: absolute;
                    width: 0px;
                    height: 0px;
                    background: #000;
                    bottom: -14px;
                    left: 16px;
                    right: 0;
                    text-align: center;
                    border-left: 0px solid #fff;
                    border-top: 0px solid #fff;
                    border-right: 0px solid #fff;
                    border-bottom: 0px solid #91c21d;
                    top: -10px;
                }
                #waveform{
                    border-bottom: 0px solid #D3D3D3;
                    position: relative;
                    z-index: 99999;
                    padding: 0px 0px 3px;

                }
                .wavesurfer-handle:before, .wavesurfer-handle:after{
                    border-top: 0px solid #fff;
                    border-bottom: 0px solid #fff;
                }
                .close-btn:hover,
                .close-btn{
                    color: #f00;
                }
                .button_play .fa-pause,
                .button_play .fa-play{
                    position: relative;
                    z-index: -1;
                }
                .button_play.btn:active,
                .button_play{
                    background: #fff;
                    border: 0px;
                    box-shadow: 0px 0px 0px 0px #fff !important;
                    color: #2ae281!important;
                    font-size: 20px;
                    padding: 0px;
                    z-index: 2;
                    position: relative;
                    cursor: pointer;
                }
                .range-slider .range-slider__value::after {
                    position: absolute;
                    top: 14px!important;
                    left: -7px!important;
                    width: 0!important;
                    height: 0!important;
                    border-top: 7px solid transparent;
                    border-right: 7px solid #2ae281!important;
                    border-bottom: 7px solid transparent!important;
                    content: '';
                }
                .range-slider .range-slider__value {
                    display: inline-block!important;
                    position: relative;
                    width: 60px!important;
                    color: #fff!important;
                    line-height: 30px!important;
                    font-size: 18px!important;
                    text-align: center!important;
                    border-radius: 3px!important;
                    background: #2ae281!important;
                    padding: 5px 10px!important;
                    margin-left: 8px!important;
                    margin-top: -12px!important;
                    height: 40px!important;
                }
                .player-area{
                    margin-bottom: 0px !important;
                    border-top: 12px solid #D3D3D3;
                    position: relative;
                    z-index: 2;
                    top: -2px;
                }
                #waveform wave{
                    overflow-x: inherit!important;
                    overflow-y: inherit!important;
                }
            </style>
            <script>
                var info_arr = [];
                var wavesurfer = WaveSurfer.create({
                    container: '#waveform',
                    barWidth: 2,
                    normalize: true,
                    minimap: true,
                    barHeight:5,
                    maxCanvasWidth: 10,
                    progressColor: '#575757',
                    waveColor: 'violet'

                });

                wavesurfer.load('server/php/files/{{ $audio->file_name }}');
                wavesurfer.on('ready', function() {

                    var timeline = Object.create(WaveSurfer.Timeline);

                    timeline.init({
                        wavesurfer: wavesurfer,
                        container: '#waveform-timeline'
                    });
                });
                function secondsTimeSpanToHMS(s) {
                    var h = Math.floor(s/3600); //Get whole hours
                    s -= h*3600;
                    var m = Math.floor(s/60); //Get remaining minutes
                    s -= m*60;
                    return (m < 10 ? '0'+m : m)+":"+(s < 10 ? '0'+s : s); //zero padding on minutes and seconds
                }
                /* Update labels */
                var updateLabel = function (region) {
                    var regionEl = document.querySelector('region[data-id="' + region.id + '"]');
                    var labelEl = document.querySelector('#' + region.id + '-label');
                    //console.log(region.start );


                    var start_time=secondsTimeSpanToHMS(region.start.toFixed(0));
                    var end_time=secondsTimeSpanToHMS(region.end.toFixed(0));


                    if (!labelEl) return;
                    labelEl.style.display = 'block';
                    labelEl.style.width = regionEl.clientWidth + 'px';
                    labelEl.style.left = regionEl.offsetLeft + 'px';

                    //$('#'+region.id+'-label .start-time').html(region.start);
                    $('#'+region.id+'-label .start-time').html(start_time);
                    $('#'+region.id+'-label .end-time').html(end_time);

                    $('#tag-name'+region.id+' .play_rigion').attr('start_time_attr',region.start);
                    $('#tag-name'+region.id+' .play_rigion').attr('end_time_attr',region.end);

                    $('#tag-name'+region.id+' .start-time-chg').text(start_time);
                    $('#tag-name'+region.id+' .end-time-chg').text(end_time);;


                    //console.log(region.id);
                    var label = $('#'+region.id+'-label span button').text();
                    if($("#"+region.id+"i").val()){
                        $("#"+region.id+"i").val(""+start_time+"," + end_time +","+label +"");
                    }
                    // <input class='form-control' type='text' id='"+region.id+"i' value='"+start_time+","+end_time+",'>";
//            var newHtmlContent1 = '<tr role="row" class="odd"><td class="sorting_1"><div class="table-area-one">'+ start_time +'</div></td><td class="sorting_1"><div class="table-area-one">'+  end_time +'</div></td><td class="sorting_1"><div class="table-area-one">'+ labelEl +'</div></td><td class="sorting_1"><div class="table-area-one"><button onclick="wavesurfer.play(' +start_time+',' + end_time +');">Play</button></div></tr>';
//            $("#tbody_track").append(newHtmlContent1);

                };

                wavesurfer.enableDragSelection({
                    drag: false,
                    slop: 5
                });

                wavesurfer.on('region-created', updateLabel);
                wavesurfer.on('region-updated', updateLabel);

                var counter=0;
                function add_tag_wave(btnid){

                    var counter_num=$('#'+btnid).attr('data-id');

                    var current_time=wavesurfer.getCurrentTime();
                    var start_time1 =secondsTimeSpanToHMS(current_time.toFixed(0));
                    var end_time1 = parseInt(current_time)+parseInt(2);
                    var end_time1 =secondsTimeSpanToHMS(end_time1.toFixed(0));

                    //wavesurfer.pause();
                    customplayPause();
                    var tag_name = prompt("Please Enter Tag Name", "");
                    var total_div=counter_num;


                    var color_scheme = ['hsla(338, 92%, 51%, 1)', 'hsla(78, 90%, 46%, 1)', 'hsla(120, 100%, 25%, 1)', 'hsla(240, 100%, 50%, 1)', 'hsla(300, 100%, 25%, 1)', 'hsla(338, 92%, 51%, 1)', 'hsla(78, 90%, 46%, 1)', 'hsla(120, 100%, 25%, 1)', 'hsla(240, 100%, 50%, 1)', 'hsla(300, 100%, 25%, 1)'];
                    //alert();
                    if(tag_name){
                        var end_time_attr=(current_time)+parseInt(2);
                        $('.labels-container').append('	<div class="wavesurfer-label col-md-4" id="stanza3'+total_div+'-label"><span class="start-time" style="background-color:'+color_scheme[counter]+';">Start time</span><span class="end-time" style="background-color:'+color_scheme[counter]+';">End time</span></div>')


                        //alert(current_time);
                        var region = wavesurfer.addRegion({
                            id:'stanza3'+total_div,
                            start: current_time,
                            end: parseInt(current_time)+parseInt(2) ,
                            color: color_scheme[counter]
                        });





                        var inpute = '<div id="tag-name'+region.id+'" class="col-md-6"><label class="red-tag-label">Tag title<button type="button" play_check="fa-play" class="button_play btn play_rigion album-buttom" start_time_attr='+current_time+' end_time_attr='+end_time_attr+'  onclick="play_rigion('+total_div+')"><i class="fa fa-play"></i></button><a class="close-btn" href="javascript:;" onclick=remove_tag("'+region.id+'") data-toggle="tooltip" title="" data-original-title="The offical name of the track"><i class="fa fa-times" aria-hidden="true"></i></a><a href="#" class="sub-tip" data-toggle="tooltip" title="" data-original-title="The offical name of the track"><i class="fa fa-question-circle" aria-hidden="true"></i></a> </label> <input type="text" class="form-control" placeholder="Bass" value="'+ tag_name +'"><span class="col-sm-3 start-title" style="font-size: 14px;font-weight: 600;padding: 10px 0px 0px;color: #f50e64;">Start Time:</span><span class="col-sm-3 start-time-chg" style="font-size: 14px;font-weight: 600;padding: 10px 0px 0px;">'+start_time1+'</span> <span class="col-sm-3 end-title" style="font-size: 14px;font-weight: 600;padding: 10px 0px 0px;color: #f50e64;">End Time: </span> <span class="col-sm-3 end-time-chg" style="font-size: 14px;font-weight: 600;padding: 10px 0px 0px;">'+end_time1+'</span><input type="hidden" id="'+region.id+'i" name="audio_value[]" class="form-control" value="'+start_time1+','+ end_time1 +','+ tag_name +'"> </div>';

                        $("#dynamic_inputs").append(inpute);
                    }
                    customplayPause();
                    counter++;
                    counter_num++;
                    $('#'+btnid).attr('data-id',counter_num);
                }
                function play_rigion(total_div){

                    var start_time_attr=$('#tag-namestanza3'+total_div+' .play_rigion').attr('start_time_attr');

                    var end_time_attr=$('#tag-namestanza3'+total_div+' .play_rigion').attr('end_time_attr');
                    var play_check=$('#tag-namestanza3'+total_div+' .play_rigion').attr('play_check');
                    if(play_check=='fa-play'){
                        wavesurfer.play(parseFloat(start_time_attr),parseFloat(end_time_attr));
                        $('#tag-namestanza3'+total_div+' .play_rigion').html('<i class="fa fa-pause"></i>');
                        $('#tag-namestanza3'+total_div+' .play_rigion').attr('play_check','fa-pause');
                    }
                    else if(play_check=='fa-pause'){
                        wavesurfer.pause(parseFloat(start_time_attr),parseFloat(end_time_attr));
                        $('#tag-namestanza3'+total_div+' .play_rigion').html('<i class="fa fa-play"></i>');
                        $('#tag-namestanza3'+total_div+' .play_rigion').attr('play_check','fa-play');
                        wavesurfer.pause();
                    }

                    //alert(total_div);
                }
                //Custom play pause...

                function customplayPause(){
                    wavesurfer.playPause();

                    if(wavesurfer.isPlaying() == true){
                        $('.img2').show();
                        $('.img1').hide();

                    }else {
                        $('.img1').show();
                        $('.img2').hide();
                    }

                }



                function show_div(){
                    alert("okk");
                }
                function remove_tag(rid){
                    //alert(rid);
                    $('#'+rid+'-label').remove();
                    $('#tag-name'+rid).remove();
                    $("region[data-id='"+rid+"']").remove();
                }
                $(document).ready(function(){
                    $('.play-green').click(function(){
                        var div_id=$(this).attr('data-target');
                        $(div_id).addClass('active-module');
                    });



                });
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/wavesurfer.js/1.2.3/plugin/wavesurfer.regions.min.js"></script>

            <form action="javascript:;" method="post" id="input_forms_data" >

                <div class="form-group row" id="dynamic_inputs">

                </div>
                <div class="alert alert-success" id="success_tag" style="display: none;">
                    <strong>Success!</strong> Your tags has been uploaded.
                </div>
                <button type="submit" class="pro-sub-btn" id="btn_third" onclick="save_form_data()">Submit & Proceed</button>


            </form>
        </div>

    </div>







</div>

</div>
