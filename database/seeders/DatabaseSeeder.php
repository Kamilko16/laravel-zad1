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
        // Kod do wpisania do authenticatora: I2C4MAVQNRJ2KL46
        $code = 'eyJpdiI6Ilc5RGt2c2xxTUtvemZEZ3lOcXc3ZEE9PSIsInZhbHVlIjoiK1NjQTU3bWgyQmIwdlJsbTduSVhDYUw4UnVjZ09ISWVsdjRyUXExbmU5MD0iLCJtYWMiOiJlYmU5MjkxZDAwYmU2Zjc0ZDAzMzFhZmYwYTVmMjZlOGVlZjFhYWE2Mzg5MjdmMzQ4MWE4MjQ5MDc4YTVjYTNiIiwidGFnIjoiIn0=';
        $recovery = 'eyJpdiI6Im4vS20wTktuOUtkNnpJVytsazhyT0E9PSIsInZhbHVlIjoiY0pMb2k3S21QUjlRZGtpV3VxaWk5VlVPS0dZK05hRE83clEycThrZ2djTXRSanY1UDcxSTQzNGJVYUk0dXNneXo3aTJ4YTZzemk4cnE4bStUdXhMeUdPUG45MDVYT1pUWDVRcnpnOW1nM01JVklacWFoY1R2Rm96NnNkb052blIzc3grY1Fxamx1T3gybjNrT3hCS0pHczRxYmhVajBHalpHRFFoeDJjMHBpU2NnKzNtRW5yYzFkbVhlbEpET2llSlVVem9lczVEaC8wMnVaakN6U3FmRE1pVFZGc3AzS3A0UmJqaDRvK3h3WTd0Ui9mekNDMmowL3NVQjBlUlJ1TjVqNmM5QzBnQldueW10bENLRG1GaUE9PSIsIm1hYyI6Ijg3OGNkMTY5ODZhM2Q1ZmMzZGQ5MWM0ZGE4Zjk1MDYzYzEyMjI4ZTY3NjI1ZDViMjgzYzZmOTNmYWMyODQ1ZWYiLCJ0YWciOiIifQ==';

        // Użytkownicy test1, test2, test3, admin
        \App\Models\User::factory()->create([
            'name' => 'test1',
            'email' => 'test1@example.com',
            'password' => Hash::make('test1'),
            'two_factor_secret' => $code,
            'two_factor_recovery_codes' => $recovery
        ]);

        \App\Models\User::factory()->create([
            'name' => 'test2',
            'email' => 'test2@example.com',
            'password' => Hash::make('test2'),
            'two_factor_secret' => $code,
            'two_factor_recovery_codes' => $recovery
        ]);

        // test3 bez 2FA, żeby mogli zalogować się tylko test1, test2, admin z 2FA
        \App\Models\User::factory()->create([
            'name' => 'test3',
            'email' => 'test3@example.com',
            'password' => Hash::make('test3')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'two_factor_secret' => $code,
            'two_factor_recovery_codes' => $recovery
        ]);

        // 100K randomowych postów
        \App\Models\Post::factory(100000)->create();
    }
}
