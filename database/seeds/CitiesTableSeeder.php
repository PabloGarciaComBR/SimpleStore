<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'state_id' => 1,
            'callcode' => '41',
            'IATA_3' => 'CWB',
            'name' => 'Curitiba'
        ]);
    }
}
