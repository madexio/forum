<article class="border-bottom pt-2">
    <div class="body">{{$reply->body}}</div>
    <div class="pt-2">
        <div class="small">Posted by
            @include("threads._details", ["type"=>"reply"])
            {{$reply->created_at->diffForHumans()}}
        </div>
    </div>
</article>