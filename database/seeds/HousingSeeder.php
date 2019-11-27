<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HousingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('housings')->truncate();

        $housings = ['Kantoor', 'Flex', 'Loodsunit', 'Geen'];

        foreach ($housings as $housing) {
            DB::table('housings')->insert([
                'housing_name' => $housing
            ]);
        }
    }
}
