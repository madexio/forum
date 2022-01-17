<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Thread;

class ChannelsController extends Controller
{
    public function show(String $channel_slug){
        $threads = Channel::whereSlug($channel_slug)->first()->threads()->latest()->get();
        return view("threads.channels.show")->with("threads", $threads);
    }
}