<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
class SurveysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('nl_NL');
        for($i=0; $i<=20; $i++):
            DB::table('surveys')->insert([
                'titel' => $faker->word,
                'beschrijving' => $faker->sentences($nbWords = 2, $variableNbWords = true),
                'created_at' => '2019-11-07',
            ]);
        endfor;
    }
}
