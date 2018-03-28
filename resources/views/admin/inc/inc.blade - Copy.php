<div class="songplay adv-player">
    <div class="modal fade" id="playModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="top-adv-area">
                    <div class="container modal-adv-area">
                        <div class="row">
                            <div class="col-md-2 playlist-div">
                                <h2>Add to playlist</h2>
                                <select multiple class="form-control" id="sel2">
                                    <option>My favorites</option>
                                    <option>Best blues</option>
                                    <option>Lorem ipsum</option>
                                    <option>My favorites</option>
                                    <option>Best blues</option>
                                    <option>Lorem ipsum</option>
                                    <option>My favorites</option>
                                    <option>Best blues</option>
                                    <option>Lorem ipsum</option>
                                    <option>My favorites</option>
                                    <option>Best blues</option>
                                </select>
                                <a href="#" class="new-list-div"><i class="fa fa-plus-circle" aria-hidden="true"></i><span> Create new Playlist</span></a>

                            </div>
                            <div class="col-md-2 tracklist-div">
                                <h2>Track details</h2>
                                <img src="{{ url('assets/img/small-blue-honey.png') }}" class="img-responsive">
                                <ul class="track-list">
                                    <li>Blues on Honey</li>
                                    <li>by Allison Green</li>
                                    <li>128 bpm</li>
                                    <li>added 2 days ago</li>
                                    <li>78% complete</li>
                                    <li>Blues</li>
                                    <li>Ripple involved</li>
                                </ul>
                            </div>
                            <div class="col-md-2 current-list">
                                <h2>Current search</h2>
                                <ul class="tab-blues">
                                    <li>blues</li>
                                    <li>drums</li>
                                    <li>drums</li>
                                    <li>blues on honey</li>
                                </ul>
                            </div>
                            <div class="col-md-3 adv-artist-div">
                                <div class="artist-div">
                                    <h2>Artist MI</h2>
                                    <a href="#" class="follow-div">FOLLOW</a>
                                </div>
                                <div class="artist-img">
                                    <img src="{{ url('assets/img/small-blue-honey.png') }}">
                                </div>
                                {{--<div class="artist-text">--}}
                                    {{--<h4>Allison Green</h4>--}}
                                    {{--<img src="{{ url('assets/img/small-blue-honey.png') }}">--}}
                                {{--</div>--}}
                                <ul class="artist-list">
                                    <li>FOLLOW<span>154</span></li>
                                    <li>FOLLOWING<span>24</span></li>
                                    <li>SUBSHARES<span>24</span></li>
                                </ul>
                                <ul class="latest-song-list">
                                    <li><img src="{{ url('assets/img/latest-pro.png') }}"><span>Latest project</span></li>
                                    <li><img src="{{ url('assets/img/other-pro.png') }}"><span>Other project</span></li>
                                </ul>
                            </div>
                            <div class="col-md-3 adv-carosal-div">
                                <h2>Track inspiration</h2>
                                <section class="adv-carosal">
                                    <div class="owl-carousel owl-theme">
                                        <div class="item">
                                            <img src="{{ url('assets/img/sumer1.png') }}">
                                            <img src="{{ url('assets/img/summer-night.png') }}">
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-down-area">

                    <div class="row">

                        <div class="col-md-12 modal-center">
                            <div class="adv-player-bottom-area"> <img src="{{ url('assets/img/upper-player-adv.png') }}" class="img-responsive"></div>
                            <div class="audio-player">
                                <audio id="audio-player" src="{{ url('assets/img/evidence-song.mp3') }}" type="audio/mp3" controls="controls"></audio>
                            </div><!-- @end .audio-player -->
                        </div>
                    </div>
                    <div class="model-progress progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:29.6%">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="modal-right">
                                <div class="advance-btn">
                                    <p>-4:08</p>
                                </div>

                            </div>

                            <div class="player-area">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="player-icon-left">
                                            <li><img src="{{ url('assets/img/Picture1.png') }}"></li>
                                            <li><img src="{{ url('assets/img/Picture2.png') }}"></li>
                                            <li><img src="{{ url('assets/img/Picture3.png') }}"></li>
                                        </ul>
                                        <ul class="bottom-player-icon">
                                            <li><span>Later</span></li>
                                            <li><span>Unidecided</span></li>
                                            <li><span>No interest</span></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="inner-player-controller">
                                            <ul>
                                                <li><img src="{{ url('assets/img/backwrd-nw-play.png') }}"></li>
                                                <li class="player-adv-btn"><img src="{{ url('assets/img/big-player.png') }}"><span>
                                                            <img src="{{ url('assets/img/shuffle.png') }}"></span></li>
                                                <li><img src="{{ url('assets/img/farwrd-player.png') }}"></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="player-icon-right">
                                            <li><img src="{{ url('assets/img/Picture4.png') }}"></li>
                                            <li class="middle-player-icon"><img src="{{ url('assets/img/Picture5.png') }}"><p>974</p></li>
                                            <li><img src="{{ url('assets/img/Picture6.png') }}"><p>6</p></li>
                                        </ul>
                                        <ul class="span-player-right">
                                            <li><span>Subshare</span></li>
                                            <li><span>Like</span></li>
                                            <li><span>Dislike</span></li>
                                        </ul>
                                    </div>
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



</script>