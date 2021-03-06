<?php

namespace Tests\Feature;


use App\Models\Activity;
use App\Models\Reply;
use App\Models\Thread;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ActivityTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_records_activity_when_a_thread_is_created()
    {
        $this->signIn();

        $thread = Thread::factory()->create();

        $this->assertDatabaseHas('activities', [
            'type' => 'created_thread',
            'user_id' => $thread->user->id,
            'subject_id' => $thread->id,
            'subject_type' => 'App\Models\Thread'
        ]);

        $activity = Activity::first();

        $this->assertEquals($activity->subject->id, $thread->id);
    }

    /** @test */
    function it_records_activity_when_a_reply_is_created()
    {
        $this->signIn();

        $reply = Reply::factory()->create();

        $this->assertEquals(2, Activity::count());
    }
    /** @test */
    public function it_fetches_a_feed_for_a_user()
    {
        $this->signIn();
        $thread = Thread::factory()->create(["user_id" => auth()->id()]);
        $thread2 = Thread::factory()->create(["user_id" => auth()->id(), "created_at" => Carbon::now()->subWeek()]);
        auth()->user()->activities()->first()->update(["created_at" => Carbon::now()->subWeek()]);
        $feed = Activity::feed(auth()->user(), 50);
        $this->assertTrue($feed->keys()->contains(Carbon::now()->format("Y-m-d")));
        $this->assertTrue($feed->keys()->contains(Carbon::now()->subWeek()->format("Y-m-d")));

    }
}