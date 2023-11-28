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
        // \App\Models\User::factory(10)->create();

        $publisherOne = User::create([
            'name' => 'Publisher 1',
            'email' => 'pablisher1@example.com',
            'password' => Hash::make('password')
        ]);
        $publisherTwo =User::create([
            'name' => 'Publisher 2',
            'email' => 'pablisher2@example.com',
            'password' => Hash::make('password')
        ]);
        $authorOne = Author::create([
            'name' => 'Author 1'
        ]);
        $authorTwo = Author::create([
            'name' => 'Author 2'
        ]);
        $bookOne = Book::create([
            'title' => 'Title 1',
            'description' => 'Description',
            'user_id' => $publisherOne->id,
        ]);
        $bookTwo = Book::create([
            'title' => 'Title 2',
            'description' => 'Description',
            'user_id' => $publisherTwo->id,
        ]);
        $bookTree = Book::create([
            'title' => 'Title 3',
            'description' => 'Description',
            'user_id' => $publisherOne->id,
        ]);

        $bookOne->authors()->attach($authorOne->id);
        $bookTwo->authors()->attach($authorTwo->id);
        $bookTree->authors()->attach($authorOne->id);
        $bookTree->authors()->attach($authorTwo->id);
    }
}
