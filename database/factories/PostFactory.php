<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $title = $this->faker->sentence();
        $slug = Str::slug($title,'-');
        
        return [
            
            'title' =>  $title,
            'sub_title' =>  $this->faker->sentence(),
            'description'  => $this->faker->text(),
            'image'  => $this->faker->imageUrl(),
            'user_id'  => User::factory(),
            'category_id'  => Category::factory(),
            'published'  => 1,
            'slug' => $slug
        ];
    }
}
