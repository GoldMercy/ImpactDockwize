<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
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
            RelationshipSeeder::class
        ]);
    }
}
