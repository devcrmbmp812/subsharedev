@extends('layouts.user')
@section('title','Messages')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/custom-style.css') }}">
<aside class="right-side">
    <ol class="breadcrumb">
        <li><a href="{{ url('/user-dashboard') }}">Dashboard</a>
        </li>
        <li class="active"><a href="{{ url('/messages/') }}"><i class="fa fa-angle-right" aria-hidden="true"></i>Message</a>
        </li>
        <li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Read Message</a>
        </li>
    </ol>

    <section class="submit-content" id="inbox-page">
            <div class="row">
                <div class="col-md-3 sidebar2" style="height: 804px;">
                    <div class="mailbox-content">

                       @include('user.messages.left-sidebar')

                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-9 table-wrap">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">

                                <div class="btn-toolbar" role="toolbar">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary" onclick="location.href='{{ url('messages/') }}'"><img src="{{ url('assets/images/back.png') }}" alt=""></button>
                                    </div>

                                    <div class="btn-group ml-1 file-btn">
                                        <button type="button" class="btn btn-primary btn-click" aria-expanded="false"><img src="{{ url('assets/images/file.png') }}" alt=""></button>
                                        <ul id="filedd">
                                            <li><a href="#">Mark as read</a></li>
                                            <li><a href="#">Add star</a></li>
                                            <li><a href="#">Mute</a></li>
                                        </ul>
                                    </div>

                                    <div class="btn-group ml-1">
                                        <button onclick="location.href='{{ url('/messages/destroy/') }}/<?php echo $readMessage['MessageID']; ?>'" type="button" class="btn btn-primary btn-danger" aria-expanded="false"><img src="{{ url('assets/images/top_trash.png') }}" alt=""></button>
                                    </div>
                                </div>


                                <div class="btm_cont">
                                    <!-- subject -->
                                    <h4><?php echo (!empty($readMessage['Subject'])) ? $readMessage['Subject'] : ''; ?></h4>
                                    <!-- subject end -->

                                    <div class="cont_pnl">
                                        <div class="authore_chat">
                                            <div class="img_chat">
                                                <img alt="" src="{{ url('assets/images/thomas.png') }}">
                                            </div>
                                            <div class="author_name_chat"><span>{{  \Helpers::getUserFullName($readMessage['fromUser']) }}</span><span><a href="mail:<?php echo (!empty($readMessage['Email'])) ? $readMessage['Email'] : ''; ?>"><?php echo (!empty($readMessage['Email'])) ? $readMessage['Email'] : ''; ?></a></span></div>
                                        </div>
                                        <p>
                                        </p><p><?php echo (!empty($readMessage['Message'])) ? $readMessage['Message'] : '' ; ?>
                                        </p>
                                    </div>

                                    <!-- attachment -->
                                        <div class="attachment">
                                            <div class="col-lg-7 col-sm-7">
                                                <!--
                                                    <img class="attach-img" src="images/attachted.png" alt=""> <span class="att_txt">Attachments (2)</span>
                                                    <span class="attach_file">
                                                        <img src="images/attach1.jpg" alt=""><img src="images/attach2.jpg" alt="">
                                                    </span>
                                                -->
                                            </div>
                                            <div class="col-lg-5 col-sm-5 col_smr">

                                              <!--
                                                <span class="replay">
                                                    <img src="images/forward.png" alt="">
                                                    <h6><a href="#">Forward</a></h6>
                                                </span>
                                               -->
                                                <span class="replay">
                                                    <img src="images/replay.png" alt="">
                                                    <h6><a href="{{ url('/messages/reply') }}/<?php echo $readMessage['MessageID']; ?>">Reply</a></h6>
                                                </span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    <!-- attachment end -->

                                </div>
                            </div>
                        </div>

                    </div>
           </div>
        </div></section>

</aside>
@include('user.messages.common-js')
@endsection