<?php

namespace App\Filters;

use App\Models\User;
use Illuminate\Http\Request;

class ThreadFilters extends Filters
{
    protected $filters = ["by", "popular"];
    //Filter the query by the a given username
    public function by($username)
    {
        $user = User::where("name", $username)->firstOrFail();
        return $this->builder->where("user_id", $user->id);
    }
    //Filter the query by the most replies
    public function popular()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->orderBy("replies_count", "desc");
    }
}