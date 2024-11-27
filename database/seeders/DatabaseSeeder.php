<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GenreSeeder::class,
        ]);

        $this->call([
            Movies_seed::class,
        ]);

        $this->call([
            events_type::class,
        ]);

        $this->call([
            events::class,
        ]);

        $this->call([
            sports_type::class,
        ]);

        $this->call([
            sports::class,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
        ]);
    }
}
