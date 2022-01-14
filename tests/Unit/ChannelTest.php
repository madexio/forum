<?php

namespace Tests\Unit;

use App\Models\Channel;
use App\Models\Thread;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ChannelTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->channel = Channel::factory()->create();
    }

    /** @test */
    public function it_has_threads()
    {
        $thread = Thread::factory()->create(["channel_id" => $this->channel->id]);
        $this->assertInstanceOf(Collection::class, $this->channel->threads);
        $this->assertTrue($this->channel->threads->contains($thread));
    }
}