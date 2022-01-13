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
                                   class="form-control mb-2"
                                   id="title"
                                   name="title">
                            <label for="body">Body:</label>
                            <textarea
                                    class="form-control mb-2"
                                    id="body"
                                    name="body"
                                    rows=3></textarea>
                            <button type="submit"
                                    class="btn btn-primary">Publish
                            </button>
                            <label for="channel_id">Channel:</label>
                            <select id="channel_id" name="channel_id">
                                @foreach($channels as $channel)
                                    <option value="{{$channel->id}}">{{$channel->name}}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
