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

    protected function getActivities(User $user): \Illuminate\Database\Eloquent\Collection
    {
        return $user->activities()
            ->with("subject")->with("subject.user")
            ->latest()->take(50)->get()
            ->groupBy(function ($activity) {
                return $activity->created_at->format("Y-m-d");
            });
    }
}