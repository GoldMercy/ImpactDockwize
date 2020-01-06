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
            UsersTableSeeder::class,
            ThemesSeeder::class,
            ProgramsSeeder::class,
            HousingSeeder::class,
            OrganisationTypeSeeder::class,
            // BusinessTableSeeder::class,
            // SurveysTableSeeder::class,
            // old_business_dataTableSeeder::class,
            // ScaleqsTableSeeder::class,
            // DropdownqsTableSeeder::class,
            // OpenqsTableSeeder::class,
            RelationshipSeeder::class
        ]);
    }
}
