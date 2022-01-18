@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Forum Threads</div>
                    <div class="card-body">
                        @forelse ($threads as $activity)
                            <article>
                                <a href="/threads/{{$activity->channel->slug}}/{{$activity->id}}">
                                    <h4>{{$activity->title}}</h4>
                                </a>

                                <div class="body">{{$activity->body}}</div>
                                <div class="small pt-1 border-bottom mb-4">
                                    Created by @include("threads._details", ["type"=>"index"])  {{$activity->created_at->diffForHumans()}}
                                </div>
                            </article>
                        @empty
                            <p>These are not the posts you are looking for.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection