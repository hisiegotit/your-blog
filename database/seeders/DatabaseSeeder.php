<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Customer::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Category::create([
            'title' => 'Technology',
            'short_desc' => 'Exploring the cutting-edge realm of technology, where innovation and advancement converge.',
        ]);

        \App\Models\Category::create([
            'title' => 'Food',
            'short_desc' => 'Explore a delightful world of culinary excellence in our Food category.',
        ]);
        \App\Models\Category::create([
            'title' => 'Music',
            'short_desc' => 'Explore the vibrant world of music, where rhythm meets emotion.',
        ]);
    }
}
