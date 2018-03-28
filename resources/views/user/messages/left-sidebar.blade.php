<!-- left-sidebar start -->
<a class="btn btn-block btn-primary compose-mail" href="{{ url('/messages/compose') }}">Compose</a>
<ul class="list-unstyled">
    <li class="{{ Request::is('messages') ? 'active' : '' }}"><a href="{{ url('messages/') }}"><img src="{{ url('assets/images/inbox.png') }}" alt="Inbox"><span>Inbox (<?php \Helpers::getInboxCount( Auth::user()->id ); ?>)</span></a></li>
    <li class="{{ Request::is('messages/sent_message') ? 'active' : '' }}"><a href="{{ url('messages/sent_message') }}"><img src="{{ url('assets/images/sent_mail.png') }}" alt="Sent Mail"><span>Sent Mail</span></a></li>
    <li class="{{ Request::is('messages/starred') ? 'active' : '' }}"><a href="{{ url('messages/starred') }}"><img src="{{ url('assets/images/starred.png') }}" alt="Starred"><span>Starred</span></a></li>
    <li class="{{ Request::is('messages/draft') ? 'active' : '' }}"><a href="{{ url('messages/draft') }}"><img src="{{ url('assets/images/drafts.png') }}" alt="Drafts"><span>Drafts</span></a></li>
    <li class="{{ Request::is('messages/trash') ? 'active' : '' }}"><a href="{{ url('messages/trash') }}"><img src="{{ url('assets/images/trash.png') }}" alt="Trash"><span>Trash</span></a></li>
</ul>
<!-- left-sidebar end -->