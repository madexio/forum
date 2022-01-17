<article class="border-bottom pt-2">
    <div class="body">{{$reply->body}}</div>
    <div class="pt-2">
        <div class="level">
            <div class="flex">Posted by
                @include("threads._details", ["type"=>"reply"])
                {{$reply->created_at->diffForHumans()}}
            </div>
            <div>
                <form action="/replies/{{$reply->id}}/favourites"
                      method="post">
                    @csrf
                    <button type="submit"
                            class="btn btn-outline-secondary"
                            {{$reply->isFavourited() ? "disabled" : ""}}>
                        {{$reply->favourites()->count()}} {{Str::plural("favourite", $reply->favourites()->count())}}
                    </button>
                </form>
            </div>
        </div>
    </div>
</article>