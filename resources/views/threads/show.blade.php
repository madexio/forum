@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$thread->title}}</div>

                    <div class="card-body">
                        <article>
                            <div class="body">{{$thread->body}}</div>
                        </article>
                    </div>
                </div>
                <div class="row justify-content-center pt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Replies</div>
                            <div class="card-body">
                                @foreach($thread->replies as $reply)
                                    <article class="border-top pt-4 pb-4">
                                        <div class="body">{{$reply->body}}</div>
                                        <div class="pt-2">
                                            <div class="small">By: <a href="#">{{$reply->user->name}}</a></div>
                                            <div class="small">Created: {{$reply->created_at->diffForHumans()}}</div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
