<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BusinessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('nl_NL');
        for($i=0; $i<=100; $i++):
        DB::table('business')->insert([
            'Ondernemer' => $faker->name,
            'Onderneming' => $faker->company,
            'Telefoonnummer' => $faker->phoneNumber,
            'Email' => $faker->email,
            'Plaats' => $faker->city,
            'Idee' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            'Jaar' => $faker->year,
            'Doelgroep' => $faker->word,
            'created_at' => '2019-11-07',
        ]);
        endfor;
    }
}
