@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Forum Threads</div>
                    <div class="card-body">
                        <form action="/threads"
                              method="post">
                            @csrf
                            <label for="title">Title:</label>
                            <input type="text"
                                   class="form-control"
                                   id="title"
                                   name="title"
                                   value="{{old("title")}}"
                                    required>
                            @error("title")
                            <ul class="alert alert-danger">
                                {{$message}}
                            </ul>
                            @enderror

                            <label for="body"
                                   class="mt-2">Body:
                            </label>
                            <textarea
                                    class="form-control"
                                    id="body"
                                    name="body"
                                    rows=3
                                    required>{{old("body")}}</textarea>
                            @error("body")
                            <ul class="alert alert-danger">
                                {{$message}}
                            </ul>
                            @enderror
                            <div class="form-group">
                                <label for="channel_id"
                                       class="mt-2">Channel:
                                </label>
                                <select id="channel_id"
                                        name="channel_id"
                                        class="form-select"
                                        required>
                                    <option value="">Channels</option>
                                    @foreach($channels as $channel)
                                        <option value="{{$channel->id}}" {{old("channel_id") == $channel->id ? "selected" : ""}}>{{$channel->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error("channel_id")
                            <ul class="alert alert-danger">
                                {{$message}}
                            </ul>
                            @enderror
                            <button type="submit"
                                    class="btn btn-primary mt-2">Publish
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
