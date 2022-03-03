<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->realText($maxNbChars  = 20);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'price' => rand(0, 50000),
            'description' => $this->faker->realText($maxNbChars  = 500),
            'uuid' => Str::uuid(),
            'category_id' => rand(1, Category::count()),
            'user_id' => rand(1, User::count()),
        ];
    }
}
