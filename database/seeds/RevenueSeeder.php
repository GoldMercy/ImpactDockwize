<?php

use Illuminate\Database\Seeder;

class RevenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('revenues')->truncate();

        $revenues = ['€0 - €100.000', '€100.000 - €500.000', '€500.000 - €1.000.000', '> €1.000.000'];

        foreach ($revenues as $revenue) {
            DB::table('revenues')->insert([
                'revenue' => $revenue
            ]);
        }
    }
}
