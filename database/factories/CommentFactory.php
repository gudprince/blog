<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [   
            'content' => $this->faker->text(),
            'user_id' => User::factory(),
            'post_id' => Post::factory(),
        ];
    }
}
