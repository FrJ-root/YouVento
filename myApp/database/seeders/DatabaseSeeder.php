<?php
namespace Database\Seeders;
use App\Models\RegisterNotification;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;
use App\Models\Club;

class DatabaseSeeder extends Seeder{   
    public function run(){
        Club::factory()->count(5)->create();
        User::factory()->count(10)->create();
        Event::factory()->count(10)->create();
        RegisterNotification::factory()->count(10)->create();
    }    
}