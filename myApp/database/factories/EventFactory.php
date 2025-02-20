<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Club;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'date' => $this->faker->dateTimeBetween('+1 week', '+1 year'),
            'location' => $this->faker->address,
            'description' => $this->faker->paragraph,
            'capacity' => $this->faker->numberBetween(10, 200),
            'club_id' => Club::factory(), // Ensure this references an existing club
        ];
    }
}