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
        // $this->call(FieldsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(TeachersTableSeeder::class);
        //$this->call(UesTableSeeder::class);
        // $this->call(CoursesTableSeeder::class);
        // $this->call(ModulesTableSeeder::class);
        // $this->call(SectionsTableSeeder::class);

    }
}
