<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Thread;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RepliesController extends Controller
{

    public function store(String $channel_slug, Thread $thread): RedirectResponse
    {
        $this->validate(request(), [
            "body" => ["required"]
        ]);
        $thread->addReply([
            "body"=>request("body"),
            "user_id"=>auth()->id()
        ]);

        return back();
    }
}
