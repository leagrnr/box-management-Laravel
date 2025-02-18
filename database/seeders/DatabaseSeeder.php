<?php

namespace Database\Seeders;

use App\Models\Box;
use App\Models\Tenant;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Kéké',
            'email' => 'kevin@prof.com',
            'password' => bcrypt('password'),
        ]);

        Box::factory(10)->create();

        Tenant::factory(10)->create();
    }
}
