<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class News_TeamsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'team_id' => Team::all()->random()->id,
            'news_id' => News::all()->random()->id,
        ];
    }
}
