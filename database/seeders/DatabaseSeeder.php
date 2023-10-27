<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(1)->create([
            'name' => 'Admin',
            'email' => "admin@admin.ex",
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);

        User::factory(1)->create([
            'name' => 'Author',
            'email' => "author@ex.ex",
            'password' => bcrypt('123456'),
        ]);

       Author::factory(1)->create([
        'name'=> 'Author',
        'user_id' => 2,
       ]);

       Author::factory(3)->create();

    }
}
