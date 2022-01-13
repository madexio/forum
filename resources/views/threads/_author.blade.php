
@if($type=="post")
    <a href="#">{{$thread->user->name}}</a>
@elseif($type=="reply")
    <a href="#">{{$reply->user->name}}</a>
@endif