<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChannelFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->unique->word;
        return [
            "name"=> $name,
            "slug"=>$name
        ];
    }
}
