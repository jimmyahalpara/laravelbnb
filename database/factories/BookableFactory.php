<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookableFactory extends Factory
{
    public $suffix = [
        'Villa',
        'House',
        'Cottage',
        'Luxuty Villas',
        'Cheap House',
        'Rooms',
        'Cheap Rooms',
        'Luxury Rooms',
        'Fancy Rooms',
    ];
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->city . ' ' . $this->faker->randomElement($this->suffix),
            'description' => $this->faker->paragraph,
        ];
    }
}
