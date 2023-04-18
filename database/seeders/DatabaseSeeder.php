<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Użytkownicy test1, test2, test3, admin
        \App\Models\User::factory()->create([
            'name' => 'test1',
            'email' => 'test1@example.com',
            'password' => Hash::make('test1')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'test2',
            'email' => 'test2@example.com',
            'password' => Hash::make('test2')
        ]);


        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin')
        ]);

        // 100K randomowych postów
        \App\Models\Post::factory(100000)->create();
    }
}
