@extends('layouts.user')
@section('title','Messages')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('assets/css/custom-style.css') }}">

    <aside class="right-side">
        <ol class="breadcrumb">
            <li><a href="{{ url('/user-dashboard') }}">Dashboard</a></li>
            <li class="active"><i class="fa fa-angle-right" aria-hidden="true"></i>Sent Messages</li>
        </ol>
    <section class="submit-content" id="inbox-page">
    <div class="row">
        @include('user.messages.left-sidebar')
        <div class="col-md-9 table-wrap">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="btn-toolbar" role="toolbar">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary"><img src="{{ url('assets/images/back.png') }}" alt=""></button>
                            </div>
                            <div class="btn-group ml-1">
                                <button id="delete" type="button" class="btn btn-primary btn-danger" aria-expanded="false"><img src="{{ url('assets/images/top_trash.png') }}" alt=""></button>
                            </div>
                        </div>
                    </div>
                </div>
                <table id="inbox-table" class="table table-striped table-hover">
                    <tbody>

                    @if( count($sent_messages) > 0 )
                        @foreach($sent_messages as $message)
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



<script type="text/javascript">
// Starred
$(".starred").on("click", function(e){
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    var starredStatus = "";
    var message_id = $(this).attr("data-id"); // get clicked message id.

    if ( $(this).hasClass("fa fa-star-o starred") )
    {
        $(this).removeClass();
        $(this).addClass("fa fa-star text-warning starred");
        starredStatus = 1;
    } else {
        $(this).removeClass();
        $(this).addClass("fa fa-star-o starred");
        starredStatus = 0;
    }
    $.ajax({

       type:'POST',
       url:  '{{url('/message/starred')}}',
       async:false,
       data:{ message:message_id ,starred:starredStatus},
       success:function(data){

       }
    });
});

// delete button checkbox list.
$("#delete").on("click", function(){
    var selected = new Array();

    $("input:checkbox[name=inbox]:checked").each(function(){
        selected.push($(this).val());

        $("#id_"+$(this).val()).closest("tr").remove();

    });

    if (selected.length == 0 )
    {
        alert("Please select any message to delete.");
    }
    console.log(  selected );
});
</script>

            <div class="col-lg-12 center-block pagination-center">
                {{ $sent_messages->links() }}
            </div>

        </div>

    </div>
</section>
</aside>
@endsection