<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ModuleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->realText($maxNbChars  = 20);
        $uuid = Str::uuid();
        $course = Course::find(rand(1, Course::count()));
        $course_uuid = $course->uuid;

        @mkdir("public/uploads/courses/$course_uuid");
        mkdir("public/uploads/courses/$course_uuid/$uuid");
        return [
            'name' => $name ,
            'slug' => Str::slug($name),
            'intro' => $this->faker->file("C:\Users\Onyx\Desktop\a1", "public/uploads/courses/$course_uuid/$uuid/", false),
            'td' => $this->faker->file("C:\Users\Onyx\Desktop\a2", "public/uploads/courses/$course_uuid/$uuid/", false),
            'tp' => $this->faker->file("C:\Users\Onyx\Desktop\a2", "public/uploads/courses/$course_uuid/$uuid/", false),
            'uuid' => $uuid,
            'course_id' => $course->id,
        ];
    }
}
