<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    
    public function definition()
    {
        $from = Carbon::instance($this -> faker -> dateTimeBetween('-1 years', '+1 years'));
        $to = Carbon::instance($this -> faker -> dateTimeBetween($from, '+1 years'));
        return [

        ];
    }
}
