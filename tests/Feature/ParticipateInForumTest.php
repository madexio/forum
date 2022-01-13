<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Auth\AuthenticationException;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function unauthorized_users_may_not_participate()
    {
        $this->expectException(AuthenticationException::class);
        $this->withoutExceptionHandling();
        $thread = Thread::factory()->create();
        $this->post("/threads/{$thread->channel->slug}/{$thread->id}/replies");
    }

    /** @test */
    public function auth_user_may_participate_in_thread()
    {
        $this->signIn();
        $thread = Thread::factory()->create();
        $reply = Reply::factory()->create();
        $this->post("/threads/{$thread->channel->slug}/{$thread->id}/replies", $reply->toArray());
        $this->get("/threads/{$thread->channel->slug}/{$thread->id}")->assertSee($reply->body);
    }

    /** @test */
    public function a_reply_requires_a_body()
    {
        $this->signIn();
        $thread = Thread::factory()->create();
        $reply = Reply::factory()->make(["body"=>null]);

        $this->post("/threads/{$thread->channel->slug}/{$thread->id}/replies")->assertSessionHasErrors("body");
    }
}