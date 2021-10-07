@extends('layouts.master')
@section('title','Create Topic')
@section('content')

    <div class="container">
        <h1>Topic Form</h1>

        @if(Session::has('topic_created'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('topic_created') }}
            </div>
        @endif

        <form method="POST" action="{{ route('topic.save') }}">
            @csrf
            <div class="form-group">
                <label>Topic</label>
                <input type="text" class="form-control" name="topic" placeholder="Input Topic">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description" placeholder="Input Description"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            <a href="{{ URL::route('topic.topiclist') }}" class="btn btn-primary">
                Back
            </a>
        </form>

    </div>

@endsection

