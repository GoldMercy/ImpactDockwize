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
            HousingSeeder::class,
            OrganisationTypeSeeder::class,
            ProgramsSeeder::class,
            RelationshipSeeder::class,
            ThemesSeeder::class
        ]);
    }
}
