<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        User::create([
//            'firstname' => "Admin", 'lastname' => "Account",
//            'email' => "admin@domain.com",
//            'email_verified_at' => time(),
//            'password' => bcrypt("passwd1234"),
//            'date_naissance' => "1995-06-25",
//            'lieu_naissance' => "HomeCity",
//            'priority' => User::USER_PRIORITY['admin']
//        ]);
//
//        User::create([
//            'firstname' => "User", 'lastname' => "Account",
//            'email' => "user@domain.com",
//            'email_verified_at' => time(),
//            'password' => bcrypt("passwd1234"),
//            'date_naissance' => "1995-06-25",
//            'lieu_naissance' => "HomeCity",
//        ]);
//
//        User::create([
//            'firstname' => "Dan", 'lastname' => "Account",
//            'email' => "dan@domain.com",
//            'email_verified_at' => time(),
//            'password' => bcrypt("passwd1234"),
//            'date_naissance' => "1995-06-25",
//            'lieu_naissance' => "HomeCity",
//        ]);

        $path = 'database/sql/users.sql';
        DB::unprepared(file_get_contents($path));

    }
}
