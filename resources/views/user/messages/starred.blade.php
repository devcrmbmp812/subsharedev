@extends('layouts.user')
@section('title','Messages')
@section('content')
    <link rel="stylesheet" type="text/css" href="{{ url('assets/css/custom-style.css') }}">

    <aside class="right-side">
        <ol class="breadcrumb">
            <li><a href="{{ url('/user-dashboard') }}">Dashboard</a></li>
            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Starred Messages</li>
        </ol>

    <section class="submit-content" id="inbox-page">
    <div class="row">

        <div class="col-md-3 sidebar2" style="height: 626px;">
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
                                <button id="delete" type="button" class="btn btn-primary btn-danger" aria-expanded="false"><img src="{{ url('assets/images/top_trash.png') }}" alt=""></button>
                            </div>
                        </div>

                    </div>
                </div>
                <table id="inbox-table" class="table table-striped table-hover">
                    <tbody>

                    @if( count($starred_messages) > 0 )
                        @foreach($starred_messages as $message)
                            <tr id="msg3" class="unread">
                                <td class="inbox-table-icon">
                                    <div class="checkbox">
                                        <label>
                                        <input class="checkbox style-2" type="checkbox" name="inbox" value="{{ $message->id }}" id="id_{{ $message->id }}">
                                        <span></span></label>
                                    </div>
                                </td>

                                <td class="inbox-data-starred hidden-xs">

                                    @if ( $message->starred == '1')
                                        <!-- empty star -->
                                        <i style="cursor: pointer;" class="fa fa-star text-warning starred" data-id="{{ $message->id }}"></i>
                                    @else
                                        <!-- starred message-->
                                         <i style="cursor: pointer;" class="fa fa-star-o starred" data-id="{{ $message->id }}"></i>
                                     @endif
                                </td>

                                <td class="inbox-data-from hidden-xs hidden-sm">
                                    <a href="{{ url('messages/read/') }}/{{ $message->id }}">{{ \Helpers::getUserFullName($message->fromUser) }}</a>
                                </td>
                                <td class="inbox-data-message">
                                    {{  $message->subject }}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr id="msg3" class="unread">
                            <td colspan="3">No message found.</td>
                        </tr>
                    @endif

                    </tbody>
                </table>
            </div>

            <div class="col-lg-12 center-block pagination-center">
                {{ $starred_messages->links() }}
            </div>

        </div>


    </div>
</section>
</aside>

@include('user.messages.common-js')
@endsection