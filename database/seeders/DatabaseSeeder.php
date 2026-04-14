<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin System',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password123'),
            'plain_password' => 'password123',
            'role' => 'admin'
        ]);

        Category::factory(5)->create();
        Item::factory(20)->create();
        User::factory(10)->create();
    }
}
