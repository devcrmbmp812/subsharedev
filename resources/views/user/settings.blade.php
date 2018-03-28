@extends('layouts.user')
@section('title','Settings')

@section('content')

<aside class="right-side">
<ol class="breadcrumb">
    <li><a href="{{ url('/user-dashboard') }}">Dashboard</a></li>
    <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Settings</li>
</ol>
        <form action="<?php echo action('SettingsController@update'); ?>" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <section class="setting-content">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
                        <li><a data-toggle="tab" href="#notifications">Notifications</a></li>
                        <li><a data-toggle="tab" href="#social">Social Media</a></li>
                        <li><a data-toggle="tab" href="#preferences">Preferences</a></li>
                        <li style="float: right;"><button type="submit" class="btn btn-success" style=""><span>Save</span><img></button></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class=" profile-top-area">
                                <div class="col-md-2">

                                    @if( isset(Auth::user()->image) && !empty(Auth::user()->image) && Auth::user()->image != "")
                                        <img src="{{ url( Config::get('app.avatars_url') )}}/{{Auth::user()->image}}" width="130" height="130" class="img-circle img-responsive pull-left">
                                    @else
                                        <img src="{{ url( Config::get('app.avatars_url').'default-avatar.png')}}" width="130" height="130" class="img-circle img-responsive pull-left">
                                    @endif

                                </div>

                                <div class="col-md-10">
                                    <h4>Upload avator</h4>
                                        <input name="avator" class="file" type="file">
                                        <div class="input-group">
                                            <input class="form-control input-lg" disabled="" placeholder="Select file" type="text">
                                              <span class="input-group-btn">
                                                <button class="browse btn btn-primary input-lg" type="button"><i class="fa fa-upload" aria-hidden="true"></i></button>
                                              </span>
                                    </div>
                                </div>

                            </div>
                            <div class="edit-form-area">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input type="text" class="form-control" placeholder="User" value="{{ Auth::user()->first_name }}" name="first_name">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" placeholder="user@user.com" value="{{ Auth::user()->email }}" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" autocomplete="off">
                                    </div>

                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" id="" placeholder="Williams" value="{{ Auth::user()->last_name }}" name="last_name">
                                    </div>
                                    <div class="form-group">
                                        <label>Language</label>
                                        <select class="form-control" id="sel1" name="language">
                                            <option value="English" <?php echo ( isset(Auth::user()->language) && Auth::user()->language == "English" ) ? 'selected' : '' ; ?>>English</option>
                                            <option value="French" <?php echo ( isset(Auth::user()->language) && Auth::user()->language == "French") ? 'selected' : '' ; ?>>French</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                       <!-- notifications -->
                        <div id="notifications" class="tab-pane fade">
                            <div class="edit-form-area">
                                <div class="col-sm-12 col-md- 6 col-lg-6">
                                    <div class="notification-area">
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="notification" value="notice_from_anyone" <?php echo ( $notification == true ) ? 'checked="checked"' : '' ; ?>>
                                                <span>Notification form everyone</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="notification" value="notice_only_people_follow" <?php echo ( $notification == false) ? 'checked="checked"' : '' ; ?>>
                                                <span>Only people I follow</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- social -->
                        <div id="social" class="tab-pane fade">
                            <div class="edit-form-area">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="toggle-area">
                                        <label>
                                            <input type="checkbox" data-toggle="toggle" name="facebook" value="facebook" <?php echo ( $social_facebook == true ) ? 'checked="checked"' : '' ; ?>>
                                            Connect Facebook
                                        </label>
                                        <label>
                                            <input type="checkbox" data-toggle="toggle" name="twitter" value="twitter" <?php echo ( $social_twitter == true ) ? 'checked="checked"' : '' ; ?>>
                                            Connect  Twitter
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- preferences -->
                        <div id="preferences" class="tab-pane fade">
                            <div class="edit-form-area">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                      <div class="question-area">
                                        <h2>How often do you purchase music in a digital format?</h2>
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="purchase_music_in_a_digital_format" value="1" <?php echo ( $preference_digital_format == '1' ) ? 'checked="checked"' : '' ; ?>>
                                                <span>Very often</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="purchase_music_in_a_digital_format" value="2" <?php echo ( $preference_digital_format == '2' ) ? 'checked="checked"' : '' ; ?>>
                                                <span>Moderately often</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="purchase_music_in_a_digital_format" value="3" <?php echo ( $preference_digital_format == '3' ) ? 'checked="checked"' : '' ; ?>>
                                                <span>Never</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="question-area">
                                        <h2>How often do you purchase music in a physical format (CDs, records, cassettes, etc.)?</h2>
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="purchase_music_in_a_physical_format" value="1" <?php echo ( $purchase_music_in_a_physical_format == '1' ) ? 'checked="checked"' : '' ; ?>>
                                                <span>Very often</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="purchase_music_in_a_physical_format" value="2" <?php echo ( $purchase_music_in_a_physical_format == '2' ) ? 'checked="checked"' : '' ; ?>>
                                                <span>Moderately often</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="purchase_music_in_a_physical_format" value="3" <?php echo ( $purchase_music_in_a_physical_format == '3' ) ? 'checked="checked"' : '' ; ?>>
                                                <span>Never</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="question-area">
                                        <h2>What are you willing to spend money on?</h2>
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="willing_to_spend_money_on" value="1" <?php echo ( $willing_to_spend_money_on == '1' ) ? 'checked="checked"' : '' ; ?>>
                                                <span>CD</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="willing_to_spend_money_on" value="2" <?php echo ( $willing_to_spend_money_on == '2' ) ? 'checked="checked"' : '' ; ?>>
                                                <span>Vinyl</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="willing_to_spend_money_on" value="3" <?php echo ( $willing_to_spend_money_on == '3' ) ? 'checked="checked"' : '' ; ?>>
                                                <span>Digital download</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="question-area">
                                        <h2>How often do you stream music online?</h2>
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="stream_music_online" value="1" <?php echo ( $stream_music_online == '1' ) ? 'checked="checked"' : '' ; ?>>
                                                <span>Very often</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="stream_music_online" value="2" <?php echo ( $stream_music_online == '2' ) ? 'checked="checked"' : '' ; ?>>
                                                <span>Moderately often</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="stream_music_online" value="3"<?php echo ( $stream_music_online == '3' ) ? 'checked="checked"' : '' ; ?>>
                                                <span>Never</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
        </form>
    </aside>

@endsection

@section('script')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
    // jQuery(document).on('click', '.browse', function(){
    //     var file = $(this).parent().parent().parent().find('.file');
    //     file.trigger('click');
    // });
    // jQuery(document).on('change', '.file', function(){
    //     $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    // });
</script>

@endsection