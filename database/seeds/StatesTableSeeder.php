<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            'country_id' => 2,
            'iso_2' => 'PR',
            'name' => 'Paraná'
        ]);

        DB::table('states')->insert([
            'country_id' => 1,
            'iso_2' => 'FL',
            'name' => 'Florida'
        ]);

        DB::table('states')->insert([
            'country_id' => 1,
            'iso_2' => 'GA',
            'name' => 'Georgia'
        ]);

        DB::table('states')->insert([
            'country_id' => 1,
            'iso_2' => 'VA',
            'name' => 'Virginia'
        ]);

        DB::table('states')->insert([
            'country_id' => 1,
            'iso_2' => 'WA',
            'name' => 'Washington'
        ]);

        DB::table('states')->insert([
            'country_id' => 2,
            'iso_2' => 'SP',
            'name' => 'São Paulo'
        ]);
    }
}
