<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        TeamTableSeeder::run();
        PlayerTableSeeder::run();
        UserTableSeeder::run();
        CommentSeeder::run();
        NewsTableSeeder::run();
        News_TeamsTableSeeder::run();
    }
}
