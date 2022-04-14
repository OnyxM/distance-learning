<?php

namespace Database\Factories;

use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->realText($maxNbChars  = 20);

        return [
            'title' => $name ,
            'slug' => Str::slug($name),
            'content' => $this->faker->realText($maxNbChars  = 10000),
            'uuid' => Str::uuid(),
            'module_id' => rand(1, Module::count())
        ];
    }
}
