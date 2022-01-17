@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h1>{{$profileUser->name}}</h1>
                        </div>
                        <div>
                            <small>Member since {{$profileUser->created_at->diffForHumans()}}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($threads as $thread)
                    <div class="card mb-4">
                        <div class="card-header">
                            <div class="level">
                                <a href="/threads/{{$thread->channel->slug}}/{{$thread->id}}"
                                   class="flex"
                                   style="font-size: 30px">
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
