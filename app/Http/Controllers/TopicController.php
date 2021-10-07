<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    public function index($name = null)
    {
        return "Hi " . $name;
    }

    public function home(){

        $navigation = "home";

        return view('home', compact('navigation'));
    }

    public function about(){
        $navigation = "about";

        return view('about', compact('navigation'));
    }

    public function topicForm(){
        $navigation = "topic";

        return view('topic-form', compact('navigation'));
    }

    public function topicList()
    {
        $navigation = "topic";
        $topics = Topic::all();

        return view('topic', compact('topics', 'navigation'));
    }

    public function topicGetId($id){
        $topic = Topic::where('id', $id)->first();

        return view('topic-update', compact('topic'));
    }

    public function save(Request $request)
    {
        $topic = New Topic;

        $topic->topic = $request->topic;
        $topic->description = $request->description;
        $topic->save();

        return back()->with('topic_created','Topic has been created');
    }

    public function update(Request $request)
    {
        Topic::where('id', $request->id)->update([
            'topic' => $request->topic,
            'description' => $request->description
        ]);

        return back()->with('topic_updated','Topic has been updated');
    }

    public function delete($id)
    {
        Topic::where('id', $id)->delete();

        return back()->with('topic_deleted','Topic has been deleted');
    }
}
