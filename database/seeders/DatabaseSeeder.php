<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Theme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
      // \App\Models\User::factory(10)->create();

      \App\Models\User::factory()->create([
        'name' => 'Alekseev Sergey',
        'email' => 'admin@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt('123456789'),
        'remember_token' => Str::random(10),
      ]);
      Theme::factory(6)->create();
      Order::factory(10)->create(); 
    }
}
