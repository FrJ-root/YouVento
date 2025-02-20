<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory; 
use App\Models\RegisterNotification;
use App\Models\Event;
use App\Models\User;

class RegisterNotificationFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'event_id' => Event::inRandomOrder()->first()->id,
            'message' => $this->faker->sentence(),
            'is_sent' => $this->faker->boolean(),
        ];
    }
}