<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'firstname' => "Admin", 'lastname' => "Account",
                'email' => "admin@domain.com",
                'email_verified_at' => time(),
                'password' => bcrypt("passwd1234"),
                'date_naissance' => "1995-06-25",
                'lieu_naissance' => "HomeCity",
                'priority' => '3',
            ],
            [
                'firstname' => "Manager", 'lastname' => "Account",
                'email' => "manager@domain.com",
                'email_verified_at' => time(),
                'password' => bcrypt("passwd1234"),
                'date_naissance' => "1995-06-25",
                'lieu_naissance' => "HomeCity",
                'priority' => '2',
            ],
            [
                'firstname' => "User", 'lastname' => "Account",
                'email' => "user@domain.com",
                'email_verified_at' => time(),
                'password' => bcrypt("passwd1234"),
                'date_naissance' => "1995-06-25",
                'lieu_naissance' => "HomeCity",
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
