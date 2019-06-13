<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrierPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        DB::table('carrier_prices')->insert([
            'carrier_id' => 1,
            'postalcode_id' => 1,
            'price' => 4.9,
            'delivery_time' => 1,
            'created_at' => $now
        ]);
    }
}
