<?php

namespace Tests\Feature;


use App\Models\Thread;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
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
        $thread = Thread::factory()->create();
        $this->post("/threads", $thread->toArray());
        $this->get("/threads/{$thread->channel->slug}/$thread->id")->assertSee($thread->title)->assertSee($thread->body);
    }
}