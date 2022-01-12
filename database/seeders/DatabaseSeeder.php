<?php

namespace Database\Seeders;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\User;
use Database\Factories\ThreadFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();
        $thread = Thread::factory()->create(["user_id"=>$user]);
        Reply::factory(10)->create(["user_id"=>$user, "thread_id"=>$thread]);
    }
}
