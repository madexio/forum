@component("profiles.activities.activity")
    @slot("heading")
        {{$activity->user->name}} replied to
        <a href="/threads/{{$activity->subject->thread->channel->slug}}/{{$activity->subject->thread->id}}">
            {{$activity->subject->thread->title}}
        </a>
    @endslot
    @slot("body")
        <div class="body">{{$activity->subject->body}}</div>
    @endslot
@endcomponent
