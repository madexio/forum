<?php

namespace Tests\Feature;


use App\Models\Channel;
use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class ComposeThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_unauthenticated_user_cannot_create_new_thread()
    {
        $this->expectException(AuthenticationException::class);
        $this->withoutExceptionHandling();
        $this->post("/threads")->assertRedirect("/login");
        $this->get("/threads/create")->assertRedirect("/login");

    }

    /** @test */
    public function an_authenticated_user_can_create_thread()
    {
        $this->signIn();
        $this->withoutExceptionHandling();
        $thread   = Thread::factory()->make();
        $response = $this->post("/threads", $thread->toArray());
        $this->get($response->headers->get("Location"))->assertSee($thread->title)->assertSee($thread->body);
    }

    /** @test */
    public function a_thread_requires_a_title()
    {
        $this->publishThread(["title" => null])->assertSessionHasErrors("title");
    }

    /** @test */
    public function a_thread_requires_a_body()
    {
        $this->publishThread(["body" => null])->assertSessionHasErrors("body");
    }

    /** @test */
    public function a_thread_requires_a_valid_channel()
    {
        Channel::factory()->create();
        $this->publishThread(["channel_id" => null])->assertSessionHasErrors("channel_id");
        $this->publishThread(["channel_id" => 999])->assertSessionHasErrors("channel_id");
    }

    /** @test */
    public function it_can_be_deleted()
    {
        $threadToBeDeleted = Thread::factory()->create();
        $this->assertEquals(1, Thread::count());
        $threadToBeDeleted->delete();
        $this->assertEquals(0, Thread::count());
    }

    /** @test */
    public function it_can_be_deleted_by_auth_user()
    {
        $this->signIn();
        $threadToBeDeleted = Thread::factory()->create();
        Reply::factory()->create(["thread_id" => $threadToBeDeleted->id]);
        $this->assertEquals(1, Thread::count());
        $this->assertEquals(1, Reply::count());
        $this->json("DELETE", "threads/{$threadToBeDeleted->channel->slug}/$threadToBeDeleted->id", $threadToBeDeleted->toArray());
        $this->assertEquals(0, Thread::count());
        $this->assertEquals(0, Reply::count());

    }

    /** @test */
    public function it_cannot_be_deleted_by_unauthenticated_user()
    {
        $threadToBeDeleted = Thread::factory()->create();
        $this->assertEquals(1, Thread::count());
        $this->json("DELETE", "threads/{$threadToBeDeleted->channel->slug}/$threadToBeDeleted->id", $threadToBeDeleted->toArray());
        $this->assertEquals(1, Thread::count());
    }

    public function publishThread($overrides = []): TestResponse
    {
        $this->signIn();
        $thread = Thread::factory()->make($overrides);
        return $this->post("/threads", $thread->toArray());
    }
}