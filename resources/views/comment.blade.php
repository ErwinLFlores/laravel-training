@extends('layouts.master')
@section('title','Comment')
@section('content')

    <div class="container">
        <h1>TOPIC: {{ $topic['topic'] }} </h1>
        <h2>Description: {{ $topic['description'] }} </h2>

        @if(Session::has('comment_created'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('comment_created') }}
            </div>
        @endif

        @if(Session::has('comment_deleted'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('comment_deleted') }}
            </div>
        @endif


        <form method="POST" action="{{ route('comment.save' , [$topic['id']]) }}">
            @csrf
            <div class="form-group">
                <label>Comment</label>
                <textarea class="form-control" name="comment" placeholder="Enter Comment"></textarea>

                <div style="margin-top:10px">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ URL::route('topic.topiclist') }}" class="btn btn-primary">
                        Back
                    </a>
                </div>
            </div>
        </form>


        <h1>Comment List</h1>
        <hr>
        @foreach($comments as $comment)
        <div>
           <b> Name: Erwin Flores</b>
           <div>Created Date: {{  date("F j, Y - H:i:s", strtotime($comment->created_at)); }}</div>

            <div>
                <a href="{{ URL::route('comment.updateform',  [$comment->id]) }}" class="btn btn-primary btn-sm">
                    Update
                </a>

                <a href="{{ URL::route('comment.delete',  [$comment->id]) }}" class="btn btn-danger btn-sm">
                    Delete
                </a>
            </div>

           <p><b>Comment: </b>{{ $comment->comment }}</p>
        </div>
        <hr>
        @endforeach

    </div>

@endsection
