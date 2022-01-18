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
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($activities as $date => $activity)
                    <h3 class="header">{{$date}}</h3>
                    @foreach ($activity as $record)

                        @include("profiles.activities." . $record->type, ["activity" => $record])
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection
