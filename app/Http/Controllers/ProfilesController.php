<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;

class ProfilesController extends Controller
{
    public function index()
    {
        //
    }

    public function show(User $user)
    {
        return view("profiles.show")
            ->with(["profileUser"=>$user, "activities"=> Activity::feed($user)]);
    }
}