@component("profiles.activities.activity")
    @slot("heading")
        {{$activity->user->name}} posted
        <a href="/threads/{{$activity->subject->channel->slug}}/{{$activity->subject->id}}">
            {{$activity->subject->title}}
        </a>
    @endslot
    @slot("body")
        <div class="body">{{$activity->subject->body}}</div>
    @endslot
@endcomponent