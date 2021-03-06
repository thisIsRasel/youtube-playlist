@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Youtube Playlist</div>

                <div class="panel-body">

                    {{ Form::open(['method'=>'POST', 'url'=>'playlist']) }}

                        <input type="text" class="form-control" name="youtube_url" placeholder="Playlist url"/>
                        <br/>
                        <input type="submit" class="btn btn-primary" value="Get playlist" />

                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
