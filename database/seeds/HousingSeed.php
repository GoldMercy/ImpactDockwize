<?php

use Illuminate\Database\Seeder;

class HousingSeed extends Seeder
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
