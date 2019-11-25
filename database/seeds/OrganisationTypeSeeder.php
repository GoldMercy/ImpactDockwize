<?php

use Illuminate\Database\Seeder;

class OrganisationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organisation_types')->truncate();

        $organisation_types = ['Student starter', 'Idee eigenaar', 'Startup', 'Scaleup', 'MKB onderneming', 'Grootbedrijf', 'Overheidsinstelling'];

        foreach ($organisation_types as $organisation_type) {
            DB::table('organisation_types')->insert([
                'organisation_type' => $organisation_type
            ]);
        }
    }
}
