<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => config('mail.from.address'),
            'is_admin' => true,
            'pin' => '1234'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Demo User'
        ]);
    }
}
