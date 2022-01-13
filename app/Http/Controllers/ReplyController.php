<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReplyController extends Controller
{

    public function store(Thread $thread): RedirectResponse
    {
        $thread->addReply([
            "body"=>request("body"),
            "user_id"=>auth()->id()
        ]);

        return back();
    }
}
