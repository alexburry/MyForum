<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $subforum_ids = DB::table('subforums')->pluck('id');
        return [
            'title' => fake()->word(),
            'content' => fake()->sentence(),
            'subforum_id' => fake()->randomElement($subforum_ids),
        ];
    }
}
