<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default test user
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'     => 'Admin',
                'password' => Hash::make('12345678'),
            ]
        );

        $this->call(BlogSeeder::class);
        $this->call(TestimonialSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(Gallery::class);
    }
}