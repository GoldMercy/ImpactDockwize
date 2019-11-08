<?php

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
        $this->call([
            BusinessTableSeeder::class,
            SurveysTableSeeder::class,
            OpenqsTableSeeder::class,
            UsersTableSeeder::class,
            old_business_dataTableSeeder::class,
            ThemesSeeder::class,
            ProgramsSeeder::class
        ]);
    }
}
