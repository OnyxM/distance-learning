<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['Ing', 'Prof', 'Dr'];
        for ($i = 1; $i<5; $i++){
            $user = User::factory()->create(['priority' => '2']);

            Teacher::create([
                'title' => $titles[rand(0,2)],
                'name' => $user->name,
                'poste' => "Lecturer",
                'user_id' => $user->id
            ]);
        }
    }
}
