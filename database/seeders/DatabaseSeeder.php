<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::create([
            'name' => 'Hisie',
            'email' => 'admin@example.com',
            'password' => bcrypt('123123123'),
        ]);

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

        \App\Models\Post::factory(20)->create();
    }
}
