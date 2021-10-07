@extends('layouts.master')
@section('title','Update Topic')
@section('content')

    <div class="container">
        <h1>Update Topic</h1>

        @if(Session::has('topic_updated'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('topic_updated') }}
            </div>
        @endif

        <form method="POST" action="{{ route('topic.update', [$topic['id']]) }}">
            @csrf
            <div class="form-group">
                <label>Topic</label>
                <input type="text" class="form-control" name="topic" placeholder="Input Topic" value="{{ $topic['topic']}}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" placeholder="Input Description">{{ $topic['description'] }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update</button>

            <a href="{{ URL::route('topic.topiclist') }}" class="btn btn-primary">
                Back
            </a>

        </form>
    </div>

@endsection
