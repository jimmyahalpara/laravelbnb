<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'content' => $this -> faker -> sentence(5, true),
            'rating' => random_int(1, 5),

            // random created at date
            'created_at' => $this -> faker -> dateTimeBetween('-1 month', '-1 day'),
        ];

        

    }
}
