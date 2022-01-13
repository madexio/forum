<article class="border-bottom pt-4">
    <div class="body">{{$reply->body}}</div>
    <div class="pt-2">
        <div class="small">Posted by
            @include("threads._author", ["type"=>"reply"])
            {{$reply->created_at->diffForHumans()}}
        </div>
    </div>
</article>