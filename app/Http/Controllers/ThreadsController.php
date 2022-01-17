<?php

namespace App\Http\Controllers;

use App\Filters\ThreadFilters;
use App\Models\Channel;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    public function index(ThreadFilters $filters)
    {
        $threads = Thread::latest()
            ->filter($filters)->get();
        if (request()->wantsJson()){
            return $threads;
        }
        return view("threads.index")->with("threads", $threads);

    }

    public function create()
    {
        return view("threads.create");
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
        $replies = $thread->replies()->paginate(5);
        return view("threads.show")->with([
            "thread"=>$thread,
            "replies"=>$replies,
            "slug"=>$channel_slug]);
    }

    public function edit(Thread $thread)
    {
        //
    }

    public function update(Request $request, Thread $thread)
    {
        //
    }

    public function destroy(String $channel_slug, Thread $thread)
    {
        $thread->replies()->delete();
        $thread->delete();
        if (request()->wantsJson())
        {
            return response([], 204);
        }
        return redirect("/threads");
    }
}
