<?php

namespace Tests\Unit;

use App\Models\Channel;
use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->thread=Thread::factory(2)->create();
        Reply::factory()->create(["thread_id"=>$this->thread[1]]);
    }

    /** @test */
    public function has_an_owner()
    {
        $this->assertInstanceOf(User::class, $this->thread[1]->user);
    }

    /** @test */
    public function has_replies()
    {
        $this->assertInstanceOf(Collection::class, $this->thread[1]->replies);
    }

    /** @test */
    public function it_can_add_a_reply()
    {
        $this->thread[0]->addReply([
            "body"=>"foobar",
            "user_id"=>1
        ]);
        $temp = $this->thread[0]->replies;
        $this->assertCount(1, $this->thread[0]->replies);
    }

    /** @test */
    public function a_thread_belongs_to_a_channel()
    {
        $thread = Thread::factory()->create();
        $this->assertInstanceOf(Channel::class, $thread->channel);
    }
}