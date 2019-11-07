<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
class old_business_dataTableSeeder extends Seeder
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
            DB::table('old_business_data')->insert([
                'business_id' => $faker->numberBetween(1, 100),
                'Ondernemer' => $faker->name,
                'Onderneming' => $faker->company,
                //'Telefoonnnummer' => $faker->phoneNumber,
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
