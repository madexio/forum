<?php

namespace Tests\Unit;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ReplyTest extends TestCase
{

    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->reply = Reply::factory()->create();
    }
    /** @test **/
    public function has_an_user()
    {
        $this->assertInstanceOf(User::class, $this->reply->user);
    }

    /** @test */
    public function has_a_thread()
    {
        $this->assertInstanceOf(Thread::class, $this->reply->thread);
    }

}
