<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Cache;

/**
 * App\Models\Reply
 *
 * @property int $id
 * @property int $user_id
 * @property int $thread_id
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Thread|null $thread
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\ReplyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reply newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reply query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereThreadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reply whereUserId($value)
 * @mixin \Eloquent
 */
class Reply extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function thread(): BelongsTo
    {
        return $this->belongsTo(Thread::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function favourites(): MorphMany
    {
        return $this->morphMany(Favourite::class, "favourited");
    }

    public function favourite()
    {
        $attributes = ["user_id" => auth()->id()];
        $favourites = $this->favourites();
        if (!$favourites->where($attributes)->exists())
        {
            return $favourites->create(["user_id" => auth()->user()->id]);
        }
    }

    public function isFavourited(): bool
    {
        return $this->favourites()->where("user_id", auth()->id())->exists();
    }
}
