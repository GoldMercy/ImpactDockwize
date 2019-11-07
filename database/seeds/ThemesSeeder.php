<?php

use Illuminate\Database\Seeder;

class ThemesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('themes')->truncate();

        $themes = ['Circulair & Biobased', 'Water & Energie', 'Social Impact', 'Industrie & Maintenance',
            'Technisch Innovatief', 'Haven & Logisitiek', 'Agro, Food & Landbouw', 'ICT/app/platform', 'Energie & Offshore',
            'Logistiek & Maintenance', 'Zorg en Gezondheid', 'Toerisme en vrijetijd', 'Haven & Maritiem', 'Chemie en Bioindustrie',
            'Biobased', 'Zakelijke dienstverlening en overheid', 'Overig'];

        foreach ($themes as $theme) {
            DB::table('themes')->insert([
                'name' => $theme
            ]);
        }


    }
}
