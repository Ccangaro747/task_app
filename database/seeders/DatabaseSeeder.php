<?php

namespace Database\Seeders;

use App\Models\Comment;
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

        User::factory(10)->create(); // Creo 10 usuarios con el factory
        Comment::factory(10)->create(); // Creo 10 comentarios con el factory

        // Puedo llamar a los seeders que quiera en el orden que quiera
        //$this->call(UsersSeeder::class);
        //$this->call(CommentSeeder::class);
    }
}
