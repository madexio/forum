
@if($type=="post")
    <a href="/threads?by={{$thread->user->name}}">{{$thread->user->name}}</a> in <a href="/threads/{{$thread->channel->slug}}">{{$thread->channel->name}}</a>
@elseif($type=="reply")
    <a href="#">{{$reply->user->name}}</a>
@endif