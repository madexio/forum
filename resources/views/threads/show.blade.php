@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">

                        <div class="level">
                            <span class="flex">
                                {{$thread->title}}
                            </span>
                            <form action="/threads/{{$thread->channel->slug}}/{{$thread->id}}"
                                  method="post">
                                @csrf
                                {{method_field("DELETE")}}
                                <button type="submit"
                                        class="btn btn-link">Delete Post
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <article>
                            <div class="body">{{$thread->body}}</div>
                            {{--                            <div class="small border-bottom pt-1">--}}
                            {{--                                Created--}}
                            {{--                                by @include("threads._author", ["type"=>"show"])--}}
                            {{--                            </div>--}}
                        </article>
                    </div>
                </div>
                @if ($thread->replies->count() > 0)
                    <div class="row justify-content-center pt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Replies</div>

                                <div class="card-body">

                                    @foreach($replies as $reply)
                                        @include("threads._reply")
                                    @endforeach
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="pt-2">{{$replies->render()}}</div>
                @endif

                @auth
                    <div class="row justify-content-center pt-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Add Reply</div>
                                <div class="card-body">
                                    <form action="/threads/{{$slug}}/{{$thread->id}}/replies"
                                          method="post">
                                        @csrf
                                        <textarea name="body"
                                                  id="body"
                                                  type="text"
                                                  rows=3
                                                  class="form-control mb-2"
                                                  placeholder="Insert comment here"> </textarea>

                                        <button type="submit"
                                                class="btn btn-primary">Submit
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <article>
                            <div class="small border-bottom">
                                @include("threads._details", ["type"=>"show"])
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
