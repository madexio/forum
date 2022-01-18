<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{

    protected $guarded = [];

    public static function feed(User $user)
    {
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