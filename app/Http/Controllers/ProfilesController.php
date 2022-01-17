<?php

namespace App\Http\Controllers;

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
            ->with(["profileUser"=>$user, "threads"=>$user->threads()->latest()->paginate(5)]);
    }
}