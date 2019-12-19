<?php

use Illuminate\Database\Seeder;

class ProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->truncate();

        $programs = ['Bootcamp: Lead', 'Bootcamp: Lead kwalificeren', 'Bootcamp: Prospect', 'Bootcamp: Deelnemer', 'Bootcamp: Alumnus',
        'Kickstart: Lead', 'Kickstart: Lead kwalificeren', 'Kickstart: Prospect', 'Kickstart: Deelnemer', 'Kickstart: Alumnus',
        'Accelerator: Lead', 'Accelerator: Lead kwalificeren', 'Accelerator: Prospect', 'Accelerator: Deelnemer', 'Accelerator: Alumnus',
        'Scale up light: Lead', 'Scale up light: Lead kwalificeren', 'Scale up light: Lead - geen programma', 'Scale up light: Prospect',
        'Scale up light: Deelnemer', 'Scale up light: Alumnus', 'Scale up: Lead', 'Scale up: Lead Kwalificeren', 'Scale up: Prospect',
        'Scale up: Deelnemer', 'Scale up: Alumnus', 'Maatwerk: Lead', 'Maatwerk: Lead Kwalificeren', 'Maatwerk: Prospect', 'Maatwerk: Deelnemer',
        'Maatwerk: Alumnus', 'Challenge: Lead', 'Challenge: Lead kwalificeren', 'Challenge: Prospect', 'Challenge: Deelnemer', 'Challenge: Alumnus',
        'Validatieprogramma: Lead', 'Validatieprogramma: Lead kwalificeren', 'Validatieprogramma: Prospect', 'Validatieprogramma: Deelnemer',
        'Validatieprogramma: Alumnus', 'Lead genereren', 'Parkeerplaats Koud', 'Parkeerplaats Warm', 'Geen'];

        foreach ($programs as $program) {
            DB::table('programs')->insert([
                'name' => $program
            ]);
        }
    }
}
