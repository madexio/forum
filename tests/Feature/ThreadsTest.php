<?php

namespace Tests\Feature;

use App\Models\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @test
     */
    public function view_all_threads()
    {
        $threads = Thread::factory(10)->create();
        $response = $this->get('/threads');
        foreach ($threads as $thread){
            $response->assertSee($thread->title);
        }
    }
    /**
     * @test
     */
    public function view_single_thread()
    {
        $thread = Thread::factory()->create();

        $response = $this->get("/threads/{$thread->id}");
        $response->assertSee($thread->title);
    }
}
