<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClubFactory extends Factory{
    public function definition(){
        return [
            'name' => $this->faker->unique()->company(),
            'description' => $this->faker->sentence(),
            'logo' => $this->faker->imageUrl(100, 100, 'sports', true, 'club'),
            'category' => $this->faker->randomElement(['Technology', 'Sports', 'Arts', 'Academic', 'Social']),
            'is_archived' => $this->faker->boolean(10),
        ];
    }
}