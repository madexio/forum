<?php

namespace Database\Seeders;

use App\Models\Channel;
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
        Channel::factory(5)->create();
        //$user = User::factory()->create();
        $thread = Thread::factory(10)->create();
        //Reply::factory(10)->create(["user_id"=>$user, "thread_id"=>$thread[0]]);
    }
}
