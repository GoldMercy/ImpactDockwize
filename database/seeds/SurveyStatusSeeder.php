<?php

use Illuminate\Database\Seeder;

class SurveyStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('survey_statuses')->truncate();

        $survey_statuses = ['Nog niet verstuurd', 'Verstuurd', 'Ontvangen'];

        foreach ($survey_statuses as $surstat) {
            DB::table('survey_statuses')->insert([
                'status' => $surstat
            ]);
        }
    }
}
