<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
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

        $response = $this->get("/threads/{$thread->id}");
        $response->assertSee($thread->title);
    }

    /** @test * */
    public function view_replies_of_thread()
    {
        $thread = $this->threads[0];

        $response = $this->get("/threads/{$thread->id}");
        foreach ($this->replies as $reply)
        {
            $response->assertSee($reply->body);
        }
    }

    /** @test */
    public function it_does_not_show_other_thread_replies()
    {
        $thread = $this->threads[1];
        $reply_in_thread = Reply::factory()->create(["thread_id" => $thread]);
        $response = $this->get("/threads/{$thread->id}");
        foreach ($this->replies as $reply)
        {
            $response->assertDontSee($reply->body);
        }
        $response->assertSee($reply_in_thread->body);
    }
}
