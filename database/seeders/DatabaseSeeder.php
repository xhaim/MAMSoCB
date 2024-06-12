<?php

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;   
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(1)->create();

         \App\Models\User::factory()->create([
            'name' => 'Juan Dela Cruz',
            'email' => 'test@gmail.com',
            'role' => 'superad',
            'password' => Hash::make('test12345678')
         ]);

         \App\Models\User::factory()->create([
            'name' => 'Juan Dedo Cruz',
            'email' => 'testing@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('test12345678')
         ]);
    }
}
