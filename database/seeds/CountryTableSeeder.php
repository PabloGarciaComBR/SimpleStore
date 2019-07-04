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
            'name' => 'United States Of America'
        ]);

        DB::table('countries')->insert([
            'name' => 'Brazil'
        ]);

        DB::table('countries')->insert([
            'name' => 'Portugal'
        ]);
    }
}
