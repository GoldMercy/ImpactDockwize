<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
class OpenqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('nl_NL');
        for($i=0; $i<=250; $i++):
            DB::table('openqs')->insert([
                'openq_name' => $faker->word,
                'survey_id' => $faker->numberBetween(1, 20),
                'created_at' => '2019-11-07',
                'updated_at' => '2019-11-07',
            ]);
        endfor;
    }
}
