
@if($type=="post")
    <a href="#">{{$thread->user->name}}</a> in <a href="/threads/{{$thread->channel->slug}}">{{$thread->channel->name}}</a>
@elseif($type=="reply")
    <a href="#">{{$reply->user->name}}</a>
@endif