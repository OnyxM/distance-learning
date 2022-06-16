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
        User::create([
            'firstname' => "Admin", 'lastname' => "Account",
            'email' => "admin@domain.com",
            'email_verified_at' => time(),
            'password' => bcrypt("passwd1234"),
            'date_naissance' => "1995-06-25",
            'lieu_naissance' => "HomeCity",
            'priority' => '3',
        ]);

        User::create([
            'firstname' => "Manager", 'lastname' => "Account",
            'email' => "manager@domain.com",
            'email_verified_at' => time(),
            'password' => bcrypt("passwd1234"),
            'date_naissance' => "1995-06-25",
            'lieu_naissance' => "HomeCity",
            'priority' => User::USER_PRIORITY['manager'],
        ]);

        User::create([
            'firstname' => "User", 'lastname' => "Account",
            'email' => "user@domain.com",
            'email_verified_at' => time(),
            'password' => bcrypt("passwd1234"),
            'date_naissance' => "1995-06-25",
            'lieu_naissance' => "HomeCity",
        ]);

        User::create([
            'firstname' => "Dan", 'lastname' => "Account",
            'email' => "dan@domain.com",
            'email_verified_at' => time(),
            'password' => bcrypt("passwd1234"),
            'date_naissance' => "1995-06-25",
            'lieu_naissance' => "HomeCity",
        ]);

    }
}
