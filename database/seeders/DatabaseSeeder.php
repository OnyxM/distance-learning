<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(CategoriesTableSeeder::class);
//        $this->call(UsersTableSeeder::class);
//        $this->call(TeachersTableSeeder::class);
//        $this->call(FieldsTableSeeder::class);
//        $this->call(UesTableSeeder::class);
        // $this->call(CoursesTableSeeder::class);
        // $this->call(ModulesTableSeeder::class);
        // $this->call(SectionsTableSeeder::class);

        User::create([
            'firstname' => "Admin", 'lastname' => "Account",
            'email' => "admin@domain.com",
            'email_verified_at' => time(),
            'password' => bcrypt("passwd1234"),
            'date_naissance' => "1995-06-25",
            'lieu_naissance' => "HomeCity",
            'priority' => User::USER_PRIORITY['admin']
        ]);
        User::create([
            'firstname' => "Onesime", 'lastname' => "Moffo",
            'email' => "onesimemoffo@gmail.com",
            'email_verified_at' => time(),
            'password' => bcrypt("passwd1234"),
            'date_naissance' => "1995-06-25",
            'lieu_naissance' => "HomeCity",
        ]);
        User::create([
            'firstname' => "Onyx", 'lastname' => "AcGrantcount",
            'email' => "onyx.dev27@gmail.com",
            'email_verified_at' => time(),
            'password' => bcrypt("passwd1234"),
            'date_naissance' => "1995-06-25",
            'lieu_naissance' => "HomeCity",
        ]);
    }
}
