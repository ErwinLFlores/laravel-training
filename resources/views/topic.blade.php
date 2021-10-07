@extends('layouts.master')
@section('title','Topic list')
@section('content')

<div class="container">
        <h1>Topic List</h1>

        @if(Session::has('topic_deleted'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('topic_deleted') }}
            </div>
        @endif

        <a href="/topic-form" class="btn btn-success">
            Create Topic
        </a>

        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col" width="250">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach($topics as $topic)
                    <tr>
                        <th scope="row">{{ $topic->id }}</th>
                        <td>{{ $topic->topic }}</td>
                        <td>{{ $topic->description }}</td>
                        <td>

                            <a href="{{ URL::route('comment.commentform',  [$topic->id]) }}" class="btn btn-secondary btn-sm">
                                Comment
                            </a>

                            <a href="{{ URL::route('topic.topicupdate',  [$topic->id]) }}" class="btn btn-primary btn-sm">
                                Update
                            </a>

                            <a href="{{ URL::route('topic.delete',  [$topic->id]) }}" class="btn btn-danger btn-sm">
                                Delete
                            </a>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

@endsection
