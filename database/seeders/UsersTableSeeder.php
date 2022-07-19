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
//        \DB::insert('
//            INSERT INTO users (id, firstname, lastname, email, email_verified_at, password, date_naissance, lieu_naissance, priority, photo, teacher_id, remember_token, deleted_at, created_at, updated_at) VALUES
//            (1, \'Admin\', \'Account\', \'admin@domain.com\', \'2022-07-13 21:09:49\', \'$2y$10$rXb7NTlWNM5vFWmedafnve3JJxDjHW4wvTxPqVt4TWeQajRD4EdKS\', \'1995-06-25\', \'HomeCity\', \'5\', \'avatar.png\', NULL, NULL, NULL, \'2022-07-13 21:09:50\', \'2022-07-13 21:09:50\'),
//            (2, \'User\', \'Account\', \'user@domain.com\', \'2022-07-13 21:09:49\', \'$2y$10$wHgB9pL9fBjJ7ed4mbXA.Ou./aeL1o5tc964tBZFCC96Ck7ktzSEm\', \'1995-06-25\', \'HomeCity\', \'0\', \'avatar.png\', NULL, NULL, NULL, \'2022-07-13 21:09:50\', \'2022-07-13 21:09:50\'),
//            (3, \'Dan\', \'Account\', \'dan@domain.com\', \'2022-07-13 21:09:49\', \'$2y$10$Y.byy3vbyv7Lp712P.L42uJcpiK1WwFQMMpHRg6FCG5FywQWN1Jc.\', \'1995-06-25\', \'HomeCity\', \'0\', \'avatar.png\', NULL, NULL, NULL, \'2022-07-13 21:09:50\', \'2022-07-13 21:09:50\'),
//            (4, \'Leonel\', \'MOYOU\', \'moyouleonel@gmail.com\', \'2022-07-13 21:09:49\', \'$2y$10$N.lLgQ4z74lHLJRACS/MQeImWuveuMcpOiQJzkI5yNkLaNKkwyFLm\', \'1995-06-25\', \'HomeCity\', \'2\', \'avatar.png\', NULL, NULL, NULL, \'2022-07-13 21:09:50\', \'2022-07-13 21:09:50\'),
//            (5, \'Alidou\', \'AMINOU\', \'alidouamino@gmail.com\', \'2022-07-13 21:09:49\', \'$2y$10$Tm1G0y/SGCDJh1xjDKd.yeZAIlUxm0p/acGL7VGv0rRs6B7yTKOpq\', \'1995-06-25\', \'HomeCity\', \'2\', \'avatar.png\', NULL, NULL, NULL, \'2022-07-13 21:09:50\', \'2022-07-13 21:09:50\'),
//            (6, \'Corneille\', \'TCHIO\', \'corneilletchio@gmail.com\', \'2022-07-13 21:09:49\', \'$2y$10$pov/v/h5Il3UuW0gzSjCquU6QqvQomLkb7KbDuPozTP5i75M918Eu\', \'1995-06-25\', \'HomeCity\', \'2\', \'avatar.png\', NULL, NULL, NULL, \'2022-07-13 21:09:50\', \'2022-07-13 21:09:50\'),
//            (7, \'Thomas\', \'MESSI\', \'thomasmessi@gmail.com\', \'2022-07-13 21:09:50\', \'$2y$10$ioQKHUuzSmVx.T/.coHJj.5QHRQRYuWzyOEci1CK6fXUokJhflhA.\', \'1995-06-25\', \'HomeCity\', \'2\', \'avatar.png\', NULL, NULL, NULL, \'2022-07-13 21:09:50\', \'2022-07-13 21:09:50\'),
//            (8, \'Mike\', \'TAPAMO\', \'miketapamo@gmail.com\', \'2022-07-13 21:09:50\', \'$2y$10$lMa3U5wxBgu340u.Z68KCOxH6FPUR0a6ppvLzQBMcwT/O0GjPmEsC\', \'1995-06-25\', \'HomeCity\', \'2\', \'avatar.png\', NULL, NULL, NULL, \'2022-07-13 21:09:50\', \'2022-07-13 21:09:50\'),
//            (9, \'Xaveira\', \'Kimbi\', \'xaveirakimbi@gmail.com\', NULL, \'$2y$10$Uq59UR7KjadFHQIJeTinQO80s6HmVuj3l57GTFzjLfkMwsV7gP9Gu\', NULL, NULL, \'2\', \'avatar.png\', NULL, NULL, NULL, \'2022-07-13 21:15:29\', \'2022-07-13 21:15:29\'),
//            (10, \'Valéry\', \'Monthe\', \'valerymonthe@gmail.com\', NULL, \'$2y$10$QqeY4oLbwglmb3gP.38KCuhQYy6oNgeaZPglNGVBgfuFHdQGSPZIu\', NULL, NULL, \'2\', \'avatar.png\', NULL, NULL, NULL, \'2022-07-13 21:17:38\', \'2022-07-13 21:17:38\'),
//            (11, \'Njine\', \'Chuangueu\', \'njinechuangueu@gmail.com\', NULL, \'$2y$10$LoM08J..tfhnKlDWw3AfBOLTBjXbxEU2thtLyjD7OLyjue/gzGTnu\', NULL, NULL, \'2\', \'avatar.png\', NULL, NULL, NULL, \'2022-07-13 21:19:41\', \'2022-07-13 21:19:41\')
//        ');
//
//        \DB::statement("ALTER TABLE `users`
//                    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
//                    COMMIT;");

        User::create([
            'firstname' => "Admin", 'lastname' => "Account",
            'email' => "admin@domain.com",
            'email_verified_at' => time(),
            'password' => bcrypt("passwd1234"),
            'date_naissance' => "1995-06-25",
            'lieu_naissance' => "HomeCity",
            'priority' => User::USER_PRIORITY['admin']
        ]);
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
