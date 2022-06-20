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
        $from = Carbon::instance($this -> faker -> dateTimeBetween('-2 months', '+1 years'));
        $to = (clone $from) -> addDays(random_int(1, 10));
        return [
            'from' => $from,
            'to' => $to,
        ];
    }
}
