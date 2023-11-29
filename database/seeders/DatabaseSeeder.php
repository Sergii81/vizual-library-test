<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        Book::factory()
            ->has(Author::factory()->count(3))
            ->count(3)
            ->for($user1)
            ->create();
        Book::factory()
            ->has(Author::factory()->count(3))
            ->count(3)
            ->for($user2)
            ->create();
    }
}
