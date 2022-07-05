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
        $user = User::create([
            'firstname' => "Manager", 'lastname' => "Account",
            'email' => "manager@domain.com",
            'email_verified_at' => time(),
            'password' => bcrypt("passwd1234"),
            'date_naissance' => "1995-06-25",
            'lieu_naissance' => "HomeCity",
            'priority' => User::USER_PRIORITY['manager'],
        ]);

        Teacher::create([
            'title' => "Dr",
            'name' => $user->name,
            'poste' => "Lecturer",
            'user_id' => $user->id
        ]);
    }
}
