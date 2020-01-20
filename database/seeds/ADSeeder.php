<?php

use Illuminate\Database\Seeder;

class ADSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ThemesSeeder::class,
            ProgramsSeeder::class,
            HousingSeeder::class,
            OrganisationTypeSeeder::class,
            RelationshipSeeder::class,
            RevenueSeeder::class
        ]);
    }
}
