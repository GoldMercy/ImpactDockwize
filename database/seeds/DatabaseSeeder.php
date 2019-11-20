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
            OrganisationTypeSeeder::class,
            ProgramsSeeder::class,
            RelationshipSeeder::class,
            ThemesSeeder::class,
            HousingSeeder::class,
        ]);
    }
}
