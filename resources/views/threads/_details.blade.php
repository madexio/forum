@if($type=="index")
    <a href="/profiles/{{$thread->user->name}}">
        {{$thread->user->name}}
    </a> in
    <a href="/threads/{{$thread->channel->slug}}">
        {{$thread->channel->name}}
    </a>
@elseif($type=="show")
    <div>
        Created {{$thread->created_at->diffForHumans()}}
    </div>
    <div>By
        <a href="/profiles/{{$thread->user->name}}">
            {{$thread->user->name}}
        </a>
    </div>
    <div>In
        <a href="/threads/{{$thread->channel->slug}}">
            {{$thread->channel->name}}
        </a>
    </div>
    <div>{{$thread->replies->count()}} {{Str::plural("comment", $thread->replies_count)}}</div>
@elseif($type=="reply")
    <a href="/profiles/{{$reply->user->name}}">
        {{$reply->user->name}}
    </a>
@endif