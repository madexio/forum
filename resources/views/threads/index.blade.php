@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($threads as $thread)
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="level">
                                    <a href="/threads/{{$thread->channel->slug}}/{{$thread->id}}"
                                    class="flex" style="font-size: 30px">
                                    {{$thread->title}}
                                </a>

                                <a href="/threads/{{$thread->channel->slug}}/{{$thread->id}}">
                                    <strong>{{$thread->replies_count}} {{Str::plural("comment", $thread->replies_count)}}</strong>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="body">{{$thread->body}}</div>
                            <div class="small border-bottom">
                                Created
                                by @include("threads._details", ["type"=>"index"])  {{$thread->created_at->diffForHumans()}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
