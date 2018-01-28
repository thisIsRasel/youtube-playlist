@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Youtube Playlist</div>

                <div class="panel-body">

                    <h2>Total Result : {{ count($items) }}</h2>

                    <ul>
                    @foreach($items as $playlist) 
                        <li>{{ $playlist->snippet->title }} ({{ $playlist->snippet->resourceId->videoId }})</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
