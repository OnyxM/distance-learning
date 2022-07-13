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
        $users =[
            [
                'firstname' => "Admin",
                'lastname' => "Account",
                'email' => "admin@domain.com",
                'email_verified_at' => time(),
                'password' => bcrypt("passwd1234"),
                'date_naissance' => "1995-06-25",
                'lieu_naissance' => "HomeCity",
                'priority' => '5',
            ],
            [
                'firstname' => "User",
                'lastname' => "Account",
                'email' => "user@domain.com",
                'email_verified_at' => time(),
                'password' => bcrypt("passwd1234"),
                'date_naissance' => "1995-06-25",
                'lieu_naissance' => "HomeCity",
                'priority' => '0',
            ],
            [
                'firstname' => "Dan",
                'lastname' => "Account",
                'email' => "dan@domain.com",
                'email_verified_at' => time(),
                'password' => bcrypt("passwd1234"),
                'date_naissance' => "1995-06-25",
                'lieu_naissance' => "HomeCity",
                'priority' => '0',
            ],
            [
                'firstname' => "Leonel",
                'lastname' => "MOYOU",
                'email' => "moyouleonel@gmail.com",
                'email_verified_at' => time(),
                'password' => bcrypt("passwd1234"),
                'date_naissance' => "1995-06-25",
                'lieu_naissance' => "HomeCity",
                'priority' => '2',
            ],
            [
                'firstname' => "Alidou",
                'lastname' => "AMINOU",
                'email' => "alidouamino@gmail.com",
                'email_verified_at' => time(),
                'password' => bcrypt("passwd1234"),
                'date_naissance' => "1995-06-25",
                'lieu_naissance' => "HomeCity",
                'priority' => '2',
            ],
            [
                'firstname' => "Corneille",
                'lastname' => "TCHIO",
                'email' => "corneilletchio@gmail.com",
                'email_verified_at' => time(),
                'password' => bcrypt("passwd1234"),
                'date_naissance' => "1995-06-25",
                'lieu_naissance' => "HomeCity",
                'priority' => '2',
            ],
            [
                'firstname' => "Thomas",
                'lastname' => "MESSI",
                'email' => "thomasmessi@gmail.com",
                'email_verified_at' => time(),
                'password' => bcrypt("passwd1234"),
                'date_naissance' => "1995-06-25",
                'lieu_naissance' => "HomeCity",
                'priority' => '2',
            ],
            [
                'firstname' => "Mike",
                'lastname' => "TAPAMO",
                'email' => "miketapamo@gmail.com",
                'email_verified_at' => time(),
                'password' => bcrypt("passwd1234"),
                'date_naissance' => "1995-06-25",
                'lieu_naissance' => "HomeCity",
                'priority' => '2',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

//        User::create([
//            'firstname' => "Admin", 'lastname' => "Account",
//            'email' => "admin@domain.com",
//            'email_verified_at' => time(),
//            'password' => bcrypt("passwd1234"),
//            'date_naissance' => "1995-06-25",
//            'lieu_naissance' => "HomeCity",
//            'priority' => User::USER_PRIORITY['admin']
//        ]);
//        User::create([
//            'firstname' => "Onesime", 'lastname' => "Moffo",
//            'email' => "onesimemoffo@gmail.com",
//            'email_verified_at' => time(),
//            'password' => bcrypt("passwd1234"),
//            'date_naissance' => "1995-06-25",
//            'lieu_naissance' => "HomeCity",
//        ]);
//        User::create([
//            'firstname' => "Onyx", 'lastname' => "Grant",
//            'email' => "onyx.dev27@gmail.com",
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

//        $path = 'database/sql/users.sql';
//        DB::unprepared(file_get_contents($path));

    }
}
