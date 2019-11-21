<?php

use Illuminate\Database\Seeder;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relationships')->truncate();

        $relationships = ['Huurder kantoor', 'Huurder vergaderruimte', 'Programma deelnemer', 'Ontvanger innovatie financiering', 'Bezoeker', 'Expert/Coach', 'Eigenaar van een project', 'Alumnus'];

        foreach ($relationships as $relationship) {
            DB::table('relationships')->insert([
                'relationship' => $relationship
            ]);
        }
    }
}
