@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Forum Threads</div>
                    <div class="card-body">
                        @foreach ($threads as $thread)
                            <article>
                                <div class="level">
                                    <a href="/threads/{{$thread->channel->slug}}/{{$thread->id}}" class="flex">
                                        <h4>{{$thread->title}}</h4>
                                    </a>
                                    <a href="/threads/{{$thread->channel->slug}}/{{$thread->id}}">
                                    <strong>{{$thread->replies->count()}} {{Str::plural("comment", $thread->replies->count())}}</strong>
                                    </a>
                                </div>

                                <div class="body">{{$thread->body}}</div>
                                <div class="small pt-1 border-bottom mb-4">
                                    Created
                                    by @include("threads._details", ["type"=>"index"])  {{$thread->created_at->diffForHumans()}}
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
