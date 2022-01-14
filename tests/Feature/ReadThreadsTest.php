<?php

namespace Tests\Feature;

use App\Models\Channel;
use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->threads = Thread::factory(2)->create();
        $this->replies = Reply::factory(2)->create(["thread_id" => $this->threads[0]]);
    }

    /** @test * */
    public function view_all_threads()
    {
        $response = $this->get('/threads');
        foreach ($this->threads as $thread)
        {
            $response->assertSee($thread->title);
        }
    }

    /** @test * */
    public function view_single_thread()
    {
        $thread = $this->threads[0];

        $response = $this->get("/threads/{$thread->channel->slug}/{$thread->id}");
        $response->assertSee($thread->title);
    }

    /** @test * */
    public function view_replies_of_thread()
    {
        $thread = $this->threads[0];

        $response = $this->get("/threads/{$thread->channel->slug}/{$thread->id}");
        foreach ($this->replies as $reply)
        {
            $response->assertSee($reply->body);
        }
    }

    /** @test */
    public function it_does_not_show_other_thread_replies()
    {
        $thread          = $this->threads[1];
        $reply_in_thread = Reply::factory()->create(["thread_id" => $thread]);
        $response        = $this->get("/threads/{$thread->channel->slug}/{$thread->id}");
        foreach ($this->replies as $reply)
        {
            $response->assertDontSee($reply->body);
        }
        $response->assertSee($reply_in_thread->body);
    }

    /** @test */
    public function a_user_can_filter_threads_according_to_channel()
    {
        $channel            = Channel::factory()->create();
        $threadChannel      = Thread::factory()->create(["channel_id" => $channel->id]);
        $threadNotInChannel = Thread::factory()->create();
        $this->get("/threads/$channel->slug")
            ->assertSee($threadChannel->title)
            ->assertDontSee($threadNotInChannel->title);
    }

    /** @test */
    public function a_user_can_filter_by_own_username()
    {
        $this->signIn(User::factory()->create(["name"=>"JohnDoe"]));
        $threadByUser = Thread::factory()->create(["user_id" => auth()->id()]);
        $threadNotByUser = Thread::factory()->create();

        $this->get("threads?by=JohnDoe")
            ->assertSee($threadByUser->title)
            ->assertDontSee($threadNotByUser->title);
    }

    /** @test */
    public function a_user_can_filter_by_other_username()
    {
        $this->withoutExceptionHandling();
        $this->signIn(User::factory()->create(["name"=>"JohnDoe"]));
        $other = User::factory()->create(["name"=>"JaneDoe"]);
        $threadNotByOther = Thread::factory()->create(["user_id" => $other->id]);
        $threadByOther = Thread::factory()->create(["user_id" => auth()->user()->id]);

        $this->get("threads?by=JaneDoe")
            ->assertSee($threadNotByOther->title)
            ->assertDontSee($threadByOther->title);
    }

    /** @test */
    public function an_unauthenticated_user_can_filter_by_other_username()
    {
        $this->withoutExceptionHandling();
        $other = User::factory()->create(["name"=>"JaneDoe"]);
        $thread = Thread::factory()->create(["user_id" => $other->id]);

        $this->get("threads?by=JaneDoe")
            ->assertSee($thread->title);
    }
}
