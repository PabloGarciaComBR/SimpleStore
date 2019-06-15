<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'callcode' => 1,
            'iso_2' => 'US',
            'iso_3' => 'USA',
            'name' => 'United States Of America'
        ]);

        DB::table('countries')->insert([
            'callcode' => 55,
            'iso_2' => 'BR',
            'iso_3' => 'BRA',
            'name' => 'Brazil'
        ]);

        DB::table('countries')->insert([
            'callcode' => 351,
            'iso_2' => 'PT',
            'iso_3' => 'PRT',
            'name' => 'Portugal'
        ]);
    }
}
