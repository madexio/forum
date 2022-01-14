<?php

namespace Tests\Feature;

use App\Models\Reply;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class FavouritesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guests_cannot_favourite()
    {
        $this->post("replies/1/favourites")->assertRedirect("/login");
    }

    /** @test */
    public function an_authenticated_user_can_favourite_any_reply()
    {
        $this->withoutExceptionHandling();
        $this->signIn();
        $reply = Reply::factory()->create();
        $this->post("replies/$reply->id/favourites");
        $this->assertCount(1, $reply->favourites);
    }

    /** @test */
    public function an_authenticated_user_can_only_favourite_once()
    {
        $this->withoutExceptionHandling();
        $this->signIn();
        $reply = Reply::factory()->create();
        $this->post("replies/$reply->id/favourites");
        $this->post("replies/$reply->id/favourites");
        $this->assertCount(1, $reply->favourites);
    }
}