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
            'name' => 'Paraná'
        ]);

        DB::table('states')->insert([
            'country_id' => 1,
            'name' => 'Florida'
        ]);

        DB::table('states')->insert([
            'country_id' => 1,
            'name' => 'Georgia'
        ]);

        DB::table('states')->insert([
            'country_id' => 1,
            'name' => 'Virginia'
        ]);

        DB::table('states')->insert([
            'country_id' => 1,
            'name' => 'Washington'
        ]);

        DB::table('states')->insert([
            'country_id' => 2,
            'name' => 'São Paulo'
        ]);

        DB::table('states')->insert([
            'country_id' => 2,
            'name' => 'Santa Catarina'
        ]);

        DB::table('states')->insert([
            'country_id' => 2,
            'name' => 'Pernambuco'
        ]);

        DB::table('states')->insert([
            'country_id' => 2,
            'name' => 'Minas Gerais'
        ]);
    }
}
