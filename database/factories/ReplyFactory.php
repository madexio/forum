<?php

namespace Database\Factories;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            "thread_id"=>function () {
                return Thread::factory()->create();
            },
            "user_id"=>function () {
                return User::factory()->create();
            },
            "body"=>$this->faker->paragraph(20)
        ];
    }
}
