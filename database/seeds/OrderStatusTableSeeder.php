<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert([
            'name' => 'Waiting Payment'
        ]);

        DB::table('order_status')->insert([
            'name' => 'Payment Ok'
        ]);

        DB::table('order_status')->insert([
            'name' => 'Transport'
        ]);

        DB::table('order_status')->insert([
            'name' => 'Delivered'
        ]);
    }
}
