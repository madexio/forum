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
        $this->post("/threads");
    }

    /** @test */
    public function an_authenticated_user_can_create_thread()
    {
        $this->signIn();
        $thread = Thread::factory()->make();
        $this->post("/threads", $thread->toArray());
        $this->get("/threads/$thread->id")->assertSee($thread->title)->assertSee($thread->body);
    }

    /** @test */
    public function guests_cannot_see_create_thread_page()
    {
        $this->get("/threads/create")->assertRedirect("/login");
    }
}