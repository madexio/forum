<?php

namespace Database\Factories;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => function () {
                return User::factory()->create();
            },
            "channel_id" => function () {
                return Channel::factory()->create();
            },
            "title"  => $this->faker->sentence(),
            "body"   => $this->faker->paragraph(20),
        ];
    }
}
