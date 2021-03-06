@extends('layouts.admin')

@section('content')
 <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <ol class="breadcrumb">
            <li><a href="#">Breadcrumb item 1</a></li>
            <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Breadcrumb item 2</a></li>
        </ol>
        <section class="setting-content">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">Account</a></li>
                        <li><a data-toggle="tab" href="#menu1">Profile</a></li>
                        <li><a data-toggle="tab" href="#menu2">Notifications</a></li>
                        <li><a data-toggle="tab" href="#menu3">Social Media</a></li>
                        <li><a data-toggle="tab" href="#menu4">Preferences</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class=" profile-top-area">
                                <div class="col-md-2">
                                    <img src="assets/img/profile-large.png">
                                </div>
                                <div class="col-md-10">
                                    <h4>Upload avator</h4>
                                        <input type="file" name="img[]" class="file">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-lg" disabled placeholder="Select file">
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
                                        <input type="text" class="form-control" id="usr" placeholder="Mark">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" id="usr" placeholder="markwilliams@gmail.com">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="pwd">
                                    </div>
                                    <div class="toggle-area">
                                        <label>
                                            <input type="checkbox" checked data-toggle="toggle">
                                            Connect Facebook
                                        </label>
                                        <label>
                                            <input type="checkbox" data-toggle="toggle">
                                            Connect  Twitter
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" id="usr" placeholder="Williams">
                                    </div>
                                    <div class="form-group">
                                        <label>Language</label>
                                        <select class="form-control" id="sel1">
                                            <option>English</option>
                                            <option>English</option>
                                            <option>English</option>
                                            <option>English</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm password</label>
                                        <input type="password" class="form-control" id="pwd">
                                    </div>
                                    <div class="notification-area">
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="sex" value="male" checked>
                                                <span>Notification form everyone</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="sex" value="female">
                                                <span>Only people I follow</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <div class=" profile-top-area">
                                <div class="col-md-2">
                                    <img src="assets/img/profile-large.png">
                                </div>
                                <div class="col-md-10">
                                    <h4>Upload avator</h4>
                                    <input type="file" name="img[]" class="file">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-lg" disabled placeholder="Select file">
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
                                        <input type="text" class="form-control" id="usr" placeholder="Mark">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" id="usr" placeholder="markwilliams@gmail.com">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="pwd">
                                    </div>
                                    <div class="toggle-area">
                                        <label>
                                            <input type="checkbox" checked data-toggle="toggle">
                                            Connect Facebook
                                        </label>
                                        <label>
                                            <input type="checkbox" data-toggle="toggle">
                                            Connect  Twitter
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md- 6 col-lg-6">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" id="usr" placeholder="Williams">
                                    </div>
                                    <div class="form-group">
                                        <label>Language</label>
                                        <select class="form-control" id="sel1">
                                            <option>English</option>
                                            <option>English</option>
                                            <option>English</option>
                                            <option>English</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm password</label>
                                        <input type="password" class="form-control" id="pwd">
                                    </div>
                                    <div class="notification-area">
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="sex" value="male" checked>
                                                <span>Notification form everyone</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="sex" value="female">
                                                <span>Only people I follow</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <div class=" profile-top-area">
                                <div class="col-md-2">
                                    <img src="assets/img/profile-large.png">
                                </div>
                                <div class="col-md-10">
                                    <h4>Upload avator</h4>
                                    <input type="file" name="img[]" class="file">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-lg" disabled placeholder="Select file">
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
                                        <input type="text" class="form-control" id="usr" placeholder="Mark">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" id="usr" placeholder="markwilliams@gmail.com">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="pwd">
                                    </div>
                                    <div class="toggle-area">
                                        <label>
                                            <input type="checkbox" checked data-toggle="toggle">
                                            Connect Facebook
                                        </label>
                                        <label>
                                            <input type="checkbox" data-toggle="toggle">
                                            Connect  Twitter
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md- 6 col-lg-6">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" id="usr" placeholder="Williams">
                                    </div>
                                    <div class="form-group">
                                        <label>Language</label>
                                        <select class="form-control" id="sel1">
                                            <option>English</option>
                                            <option>English</option>
                                            <option>English</option>
                                            <option>English</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm password</label>
                                        <input type="password" class="form-control" id="pwd">
                                    </div>
                                    <div class="notification-area">
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="sex" value="male" checked>
                                                <span>Notification form everyone</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="sex" value="female">
                                                <span>Only people I follow</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <div class=" profile-top-area">
                                <div class="col-md-2">
                                    <img src="assets/img/profile-large.png">
                                </div>
                                <div class="col-md-10">
                                    <h4>Upload avator</h4>
                                    <input type="file" name="img[]" class="file">
                                    <div class="input-group">
                                        <input type="text" class="form-control input-lg" disabled placeholder="Select file">
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
                                        <input type="text" class="form-control" id="usr" placeholder="Mark">
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" id="usr" placeholder="markwilliams@gmail.com">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="pwd">
                                    </div>
                                    <div class="toggle-area">
                                        <label>
                                            <input type="checkbox" checked data-toggle="toggle">
                                            Connect Facebook
                                        </label>
                                        <label>
                                            <input type="checkbox" data-toggle="toggle">
                                            Connect  Twitter
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md- 6 col-lg-6">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" id="usr" placeholder="Williams">
                                    </div>
                                    <div class="form-group">
                                        <label>Language</label>
                                        <select class="form-control" id="sel1">
                                            <option>English</option>
                                            <option>English</option>
                                            <option>English</option>
                                            <option>English</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm password</label>
                                        <input type="password" class="form-control" id="pwd">
                                    </div>
                                    <div class="notification-area">
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="sex" value="male" checked>
                                                <span>Notification form everyone</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="sex" value="female">
                                                <span>Only people I follow</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu4" class="tab-pane fade">
                            <div class="edit-form-area">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="question-area">
                                        <h2>How often do you purchase music in a digital format?</h2>
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="sex" value="male" checked>
                                                <span>Very often</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="sex" value="female">
                                                <span>Moderately often</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="sex" value="female">
                                                <span>Never</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="question-area">
                                        <h2>How often do you purchase music in a physical format (CDs, records, cassettes, etc.)?</h2>
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="music" value="Very often" checked>
                                                <span>Very often</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="music" value="Moderately">
                                                <span>Moderately often</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="music" value="Never">
                                                <span>Never</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="question-area">
                                        <h2>What are you willing to spend money on?</h2>
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="money" value="CD" checked>
                                                <span>CD</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="money" value="Vinyl">
                                                <span>Vinyl</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="money" value="download">
                                                <span>Digital download</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="question-area">
                                        <h2>How often do you stream music online?</h2>
                                        <div class="maxl">
                                            <label class="radio inline">
                                                <input type="radio" name="online" value="often" checked>
                                                <span>Very often</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="online" value="Moderately">
                                                <span>Moderately often</span>
                                            </label>
                                            <label class="radio inline">
                                                <input type="radio" name="online" value="Never">
                                                <span>Never</span>
                                            </label>
                                        </div>
                                    </div>
                                    <a href="#" class="save-div"><span>save preferences</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </aside>
    <!-- right-side -->
@endsection

@section('script')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
      // Tab code.
      jQuery(document).on('click', '.browse', function(){
          var file = $(this).parent().parent().parent().find('.file');
          file.trigger('click');
      });
      jQuery(document).on('change', '.file', function(){
          $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
      });
    </script>
@endsection