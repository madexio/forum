<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Thread;

class ChannelController extends Controller
{
    public function show(String $channel_slug){
        $threads = Channel::whereSlug($channel_slug)->first()->threads()->latest()->get();
        return view("threads.channel.show")->with("threads", $threads);
    }
}