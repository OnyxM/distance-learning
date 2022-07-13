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
        \DB::insert('
            INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `date_naissance`, `lieu_naissance`, `priority`, `photo`, `teacher_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
            (1, \'Admin\', \'Account\', \'admin@domain.com\', \'2022-07-13 21:09:49\', \'$2y$10$rXb7NTlWNM5vFWmedafnve3JJxDjHW4wvTxPqVt4TWeQajRD4EdKS\', \'1995-06-25\', \'HomeCity\', \'5\', \'avatar.png\', NULL, NULL, NULL, \'2022-07-13 21:09:50\', \'2022-07-13 21:09:50\'),
            (2, \'User\', \'Account\', \'user@domain.com\', \'2022-07-13 21:09:49\', \'$2y$10$wHgB9pL9fBjJ7ed4mbXA.Ou./aeL1o5tc964tBZFCC96Ck7ktzSEm\', \'1995-06-25\', \'HomeCity\', \'0\', \'avatar.png\', NULL, NULL, NULL, \'2022-07-13 21:09:50\', \'2022-07-13 21:09:50\'),
            (3, \'Dan\', \'Account\', \'dan@domain.com\', \'2022-07-13 21:09:49\', \'$2y$10$Y.byy3vbyv7Lp712P.L42uJcpiK1WwFQMMpHRg6FCG5FywQWN1Jc.\', \'1995-06-25\', \'HomeCity\', \'0\', \'avatar.png\', NULL, NULL, NULL, \'2022-07-13 21:09:50\', \'2022-07-13 21:09:50\')
        ');

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
