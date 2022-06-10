<?php

namespace Database\Seeders;

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
    }
}
