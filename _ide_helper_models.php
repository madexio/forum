<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Activity
 *
 * @property int $id
 * @property int $user_id
 * @property int $subject_id
 * @property string $subject_type
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $subject
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereSubjectType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUserId($value)
 */
	class Activity extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Channel
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Thread[] $threads
 * @property-read int|null $threads_count
 * @method static \Database\Factories\ChannelFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Channel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Channel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Channel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Channel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Channel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Channel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Channel whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Channel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Channel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Favourite
 *
 * @property int $id
 * @property int $user_id
 * @property int $favourited_id
 * @property string $favourited_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite query()
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite whereFavouritedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite whereFavouritedType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favourite whereUserId($value)
 */
	class Favourite extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Activity[] $activity
 * @property-read int|null $activity_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Favourite[] $favourites
 * @property-read int|null $favourites_count
 */
	class Reply extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Thread
 *
 * @property int $id
 * @property int $user_id
 * @property int $channel_id
 * @property string $title
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Channel|null $channel
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reply[] $replies
 * @property-read int|null $replies_count
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\ThreadFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Thread newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Thread newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Thread query()
 * @method static \Illuminate\Database\Eloquent\Builder|Thread whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thread whereChannelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thread whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thread whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thread whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thread whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thread whereUserId($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Activity[] $activity
 * @property-read int|null $activity_count
 * @method static \Illuminate\Database\Eloquent\Builder|Thread filter($filters)
 */
	class Thread extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Reply[] $replies
 * @property-read int|null $replies_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Thread[] $threads
 * @property-read int|null $threads_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Activity[] $activities
 * @property-read int|null $activities_count
 */
	class User extends \Eloquent {}
}

