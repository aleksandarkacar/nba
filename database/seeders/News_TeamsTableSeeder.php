<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Team;
use Database\Factories\News_TeamsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class News_TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        for ($i = 0; $i < 50; $i++)
        {
            DB::table('news_teams')->insert([
                'team_id' => Team::all()->random()->id,
                'news_id' => $i,
            ]);
        }
    }
}
