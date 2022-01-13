<?php

namespace App\Http\Controllers;

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
        return view("threads.create");
    }


    public function store(Request $request)
    {
        $thread = Thread::factory()->create([
            "user_id" => auth()->id(),
            "title"=>request("title"),
            "body"=>request("body")
        ]);

        return redirect("/threads/$thread->id");
    }

    public function show(Thread $thread)
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
