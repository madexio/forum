<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    protected $guarded = [];

    public static function feed(User $user, int $take = 50)
    {
        return $user->activities()
            ->with("subject")->with("subject.user")
            ->latest()->take($take)->get()
            ->groupBy(function ($activity) {
                return $activity->created_at->format("Y-m-d");
            });
    }

    public function subject()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}