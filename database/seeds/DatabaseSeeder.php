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
            HousingSeed::class,
            OrganisationTypeSeeder::class,
            SurveysTableSeeder::class,
            BusinessTableSeeder::class,
            old_business_dataTableSeeder::class,
            OpenqsTableSeeder::class,
            RelationshipSeeder::class,
        ]);
    }
}
