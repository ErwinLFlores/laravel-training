@extends('layouts.master')
@section('title','Comment')
@section('content')

    <div class="container">

    <h1>Edit Comment </h1>

    @if(Session::has('comment_updated'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('comment_updated') }}
        </div>
    @endif

    <form method="POST" action="{{ route('comment.update' , [$comment['id']]) }}">
            @csrf
            <div class="form-group">
                <label>Comment</label>
                <textarea class="form-control" name="comment" placeholder="Enter Comment">{{ $comment['comment'] }}</textarea>

                <button type="submit" class="btn btn-success">Submit</button>

                <a href="{{ URL::route('comment.commentform', [$comment['topic_id']]) }}" class="btn btn-primary">
                Back
            </a>
            </div>
        </form>

    </div>


@endsection
