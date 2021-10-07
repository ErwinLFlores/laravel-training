<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Comment;

class CommentController extends Controller
{
    //

    public function comment($id)
    {
        $navigation = "topic";

        $topic = Topic::where('id', $id)->first();

        $comments = Comment::where('topic_id', $id)->get();

        return view('comment', compact('topic','comments','navigation'));
    }

    public function updateForm($id)
    {
        $navigation = "topic";
        $comment = Comment::where('id', $id)->first();

        return view('comment-form', compact('comment','navigation'));
    }


    public function save(Request $request)
    {
        $comment = New Comment;

        $comment->topic_id = $request->topic_id;
        $comment->comment = $request->comment;
        $comment->save();

        return back()->with('comment_created','Comment has been created');
    }

    public function update(Request $request)
    {
        Comment::where('id', $request->id)->update([
            'comment' => $request->comment
        ]);

        return back()->with('comment_updated','Comment has been updated');
    }

    public function delete($id)
    {
        Comment::where('id', $id)->delete();

        return back()->with('comment_deleted', 'Comment has been deleted successfully!');
    }
}
