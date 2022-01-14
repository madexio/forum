<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Reply;
use Illuminate\Support\Facades\DB;

class FavouritesController extends Controller
{
    public function store(Reply $reply)
    {
        return $reply->favourite();
    }
}