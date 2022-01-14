<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function index()
    {
        $threads = Thread::latest()->get();
        return view("threads.index")->with("threads", $threads);
    }

    public function create()
    {
        $channels = Channel::latest()->get();
        return view("threads.create")->with("channels", $channels);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            "title"=>["required"],
            "body"=>["required"],
            "channel_id"=>["required", "exists:channels,id"]
        ]);

        $thread = Thread::factory()->create([
            "user_id"    => auth()->id(),
            "channel_id" => request("channel_id"),
            "title"      => request("title"),
            "body"       => request("body"),
        ]);

        return redirect("/threads/{$thread->channel->slug}/$thread->id");
    }

    public function show(String $channel_slug, Thread $thread)
    {
        return view("threads.show")->with("thread", $thread);
    }

    public function edit(Thread $thread)
    {
        //
    }

    public function update(Request $request, Thread $thread)
    {
        //
    }

    public function destroy(Thread $thread)
    {
        //
    }
}
